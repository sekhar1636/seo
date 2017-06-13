<?php

namespace App;

use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Model;
use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;
use App;

class DataIO
{

	// DEPENDS ON CLOUD STORAGE
	// CHANGABLE

	public static function deleteFileByURL($url)
	{
		$path = str_replace(\Config::get("filesystems.parent_url"), "", $url);
		self::deleteFile($path);
	}

	public static function deleteFile($filepath)
	{
		try {
			\Storage::delete($filepath);
		} catch (\Exception $e) { }
	}

	public static function updateStream($filepath, $stream)
	{
		self::deleteFile($filepath);

		\Storage::writeStream($filepath, $stream);
		fclose($stream);

		//dd(\Config::get("filesystems.parent_url"));

		return \Config::get("filesystems.parent_url") . $filepath;
	}

	// MISC STUFF

	public static function formatBytes($bytes, $precision = 2) { 
	    $units = array('B', 'KB', 'MB', 'GB', 'TB'); 

	    $bytes = max($bytes, 0); 
	    $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
	    $pow = min($pow, count($units) - 1); 

	    // $bytes /= pow(1024, $pow);
	    $bytes /= (1 << (10 * $pow)); 

	    return round($bytes, $precision) . ' ' . $units[$pow]; 
	} 

	public static function guessMime($extension, $default = 'text/plain')
	{
		$mimes = \Config::get('mimes');
		if ( ! array_key_exists($extension, $mimes)) return $default;
		$cell = $mimes[$extension];
		return (is_array($cell)) ? $cell[0] : $cell;

		//$guesser = \Symfony\Component\HttpFoundation\File\MimeType\MimeTypeGuesser::getInstance();
		//$guess = $guesser->guess("file." . $extension);
		//return $guess;
	}

	public static function uploadFile($localPath, $cloudPath)
	{
		$fp;
		try {
			$fp = fopen($localPath, 'r');
			self::updateStream($cloudPath, $fp);

		} catch(\Exception $e) {
			@fclose($fp);
			throw $e;
		}
	}

	public static function expandResources($memory = '300M', $exectutionTime = 600)
	{
		ini_set('memory_limit', $memory);
		ini_set('max_execution_time', $exectutionTime);
	}

	public static function flattenData($path, $type, $name)
	{
		$type = strtolower($type);
		self::expandResources();

		if($type == "xml") {
			$data = self::flattenXML($path, $name);
		} else if($type == "csv") {
			$data = self::flattenCSV($path, $name);
		} else if($type == "txt") {
			$data = self::flattenTXT($path, $name);
		} else if($type == "json") {
			$data = self::flattenJSON($path, $name);
		} else if($type == "slk") {
			// Using PHPExcel
			$data = self::flattenLegacyExcel($path, $name, "SYLK");
		} else if(in_array($type, ["xls"])) {
			// Using legacy PHPExcel
			// "html", "htm", "gnumeric" are supported, but take too much server time + have specific formats
			$data = self::flattenLegacyExcel($path, $name);
		} else if($type == "xlsx") {
			// Using fast BoxSpout
			$data = self::flattenFastExcel($path, $name, Type::XLSX);
		} else if($type == "ods") {
			// Using fast BoxSpout
			$data = self::flattenFastExcel($path, $name, Type::ODS);
		}

		if(count($data["excerpt"]) == 0) {
			throw new \Exception("Empty dataset.");
		}

		if(count($data["columns"]) != count($data["excerpt"][0])) {
			throw new \Exception("Irregular column size. Please fix it and upload again.");
		}

		return $data;
	}

	// FOR CUSTOMER DATA I/O

	public static function flattenXML($path, $name)
	{
		/*
		//A hack, but takes toooooo much memory. + doesn't give enough info
		$xml = simplexml_load_string($contents, "SimpleXMLElement", LIBXML_NOCDATA);
		$json = json_encode($xml);
		$array = json_decode($json, true);
		$dotted = array_dot($array);
		var_dump($dotted);
		dd(1);*/

		ini_set('auto_detect_line_endings', TRUE);
		$contents = file_get_contents($path);

		// PREPARING FOR ETL
		$updateChunk = 1000;
		$AI = 0;
		$createRecordID = false;
		$columns = [];
		$excerpt = [];

		$fp;
		$fileName = $name . "-" . time();
		$stagedPath = "staged-data/" . $fileName . ".csv";

		try {
			$fp = fopen('php://temp/maxmemory:'. (20*1024*1024), 'r+');
			$c = 0;
			// GENERIC ETL END


			$oldDepth = -1;
			$columnNames = [];
			$row = [];

			$totalRecords = 0;
			$totalColumns = 0;
			$columnsRow = [];

			$xmlIterator = new \RecursiveIteratorIterator(new \SimpleXMLIterator($contents), \RecursiveIteratorIterator::SELF_FIRST);
			//$before = microtime(true);
			$nodeCount = 0;
			foreach ($xmlIterator as $nodeName => $node) {

				if($nodeCount == 0) {
					if($nodeName == "DocumentProperties") {
						$parent = $node->xpath("parent::*");
						if($parent[0]->ExcelWorkbook instanceof \SimpleXMLIterator) {
							// its an office XML file -_-
							@fclose($fp);

							// forward it to the other adapter
							return self::flattenLegacyExcel($path, $name, "Excel2003XML");
						}
					}
				}

				$currentDepth = $xmlIterator->getDepth();

				if($currentDepth == $oldDepth) {
					array_pop($columnNames);
				} else if($currentDepth < $oldDepth) {
					$cutOff = $oldDepth - $currentDepth - 3;
					$columnNames = array_splice($columnNames, 0, $cutOff);
				}

				if($currentDepth == 0) {
					$totalRecords++;
					if($totalRecords > 1) {

						// validate columns size
						if($totalRecords > 2) {
							// must have atleast 2 rows to compare size
							if($totalColumns != count($row)) {
								throw new \Exception("Irregular row size");
							}
						}

						// add a row to the CSV...

						if($c == 0) {
							$columns = array_keys($row);
							if(self::hasRecordID($columns) === FALSE) {
								$createRecordID = true;
								$AI = App\RuntimeConfig::increaseValue("RecordAI", $updateChunk * 5);
							}
						} else if($c < 5) {
							$excerpt[] = array_values($row);
						}

						if($c % $updateChunk === 0 && $createRecordID) {
							// after every 1000th one, update AI
							$AI = App\RuntimeConfig::increaseValue("RecordAI", $updateChunk);
						}

						if($c == 0) {
							// proper column based on row#
							$header = $columns;
							if($createRecordID) {
								array_unshift($header, "RecordID");
							}
							fputcsv($fp, $header);
						}

						if($createRecordID) {
							array_unshift($row, $AI);
						}

						fputcsv($fp, $row);
						$AI++;
						$c++;

						// end adding row to CSV


						// fill the new array with keys from first $columns
						// to maintain order (and peace xD)
						$row = array_fill_keys($columns, null);

					} else {
						$row = [];
					}
					$totalColumns = 0;
				}

				$flatName = implode("." , array_merge($columnNames, [$nodeName]) );

				// if it has no childern, use the value in it
				if(!$xmlIterator->hasChildren()) {
					$row[$flatName] = trim($node->__toString());
					if($totalRecords == 1) {
						$columns[] = $flatName;
					}
					$totalColumns++;
				}

				// flatten the attributes as well
				$attributes = $node->attributes();
				foreach($attributes as $key => $attribute) {
					if($currentDepth > 0) {
						$attrName = $flatName . "." . $key;
					} else {
						$attrName = $key;
					}
					$row[$attrName] = trim($attribute->__toString());
					if($totalRecords == 1) {
						$columns[] = $attrName;
					}
					$totalColumns++;
				}

				if($currentDepth > 0) {
					$columnNames[] = $nodeName;
				}
				$oldDepth = $currentDepth;

				$nodeCount++;
			}

			// GENERIC FINISH START
			$AI = App\RuntimeConfig::increaseValue("RecordAI", $updateChunk);

			rewind($fp);

			self::updateStream($stagedPath, $fp);

			@fclose($fp);

		} catch(\Exception $e) {
			@fclose($fp);
			throw $e;
		}

		self::removeRecordIDs($columns, $excerpt);

		return [
			"columns" => $columns,
			"excerpt" => $excerpt,
			"file" => $fileName,
			"totalRecords" => $c,
		];
		// GENERIC FINISH END
	}

	public static function flattenJSON($path, $name)
	{
		ini_set('auto_detect_line_endings', TRUE);
		$json = json_decode(file_get_contents($path), true);
		// PREPARING FOR ETL
		$updateChunk = 1000;
		$AI = 0;
		$createRecordID = false;
		$columns = [];
		$excerpt = [];

		$fp;
		$fileName = $name . "-" . time();
		$stagedPath = "staged-data/" . $fileName . ".csv";

		try {
			$fp = fopen('php://temp/maxmemory:'. (20*1024*1024), 'r+');
			$c = 0;
			// GENERIC ETL END

			foreach ($json as $value) {
				$row = array_dot($value);

				if($c == 0) {
					$columns = array_keys($row);
					if(self::hasRecordID($columns) === FALSE) {
						$createRecordID = true;
						$AI = App\RuntimeConfig::increaseValue("RecordAI", $updateChunk * 5);
					}
				} else if($c < 5) {
					$excerpt[] = array_values($row);
				}

				if($c % $updateChunk === 0 && $createRecordID) {
					// after every 1000th one, update AI
					$AI = App\RuntimeConfig::increaseValue("RecordAI", $updateChunk);
				}

				if($c == 0) {
					// proper column based on row#
					$header = $columns;
					if($createRecordID) {
						array_unshift($header, "RecordID");
					}
					fputcsv($fp, $header);
				}

				if(count($row) != count($columns)) {
					throw new Exception("Irregular row size: #" . $c);
				}
				if($createRecordID) {
					array_unshift($row, $AI);
				}

				fputcsv($fp, $row);
				$AI++;
				$c++;
			}

			// GENERIC FINISH START
			$AI = App\RuntimeConfig::increaseValue("RecordAI", $updateChunk);

			rewind($fp);

			self::updateStream($stagedPath, $fp);

			@fclose($fp);

		} catch(\Exception $e) {
			@fclose($fp);
			throw $e;
		}

		self::removeRecordIDs($columns, $excerpt);

		return [
			"columns" => $columns,
			"excerpt" => $excerpt,
			"file" => $fileName,
			"totalRecords" => $c,
		];
		// GENERIC FINISH END
	}

	public static function flattenTXT($path, $name)
	{
		return self::flattenCSV($path, $name, "\t");
	}

	public static function flattenCSV($path, $name, $delimiter = ",")
	{
		ini_set('auto_detect_line_endings', TRUE);
		// PREPARING FOR ETL
		$updateChunk = 1000;
		$AI = 0;
		$createRecordID = false;
		$columns = [];
		$excerpt = [];

		$file;
		$fp;
		$fileName = $name . "-" . time();
		$stagedPath = "staged-data/" . $fileName . ".csv";

		try {
			$fp = fopen('php://temp/maxmemory:'. (20*1024*1024), 'r+');
			$c = 0;
			// GENERIC ETL END

			$file = fopen($path, 'r');
			while (($row = fgetcsv($file, 0, $delimiter)) !== FALSE) {
				if($c == 0) {
					$columns = $row;
					if(self::hasRecordID($row) === FALSE) {
						$createRecordID = true;
						$AI = App\RuntimeConfig::increaseValue("RecordAI", $updateChunk * 5);
					}
				} else if($c < 5) {
					$excerpt[] = $row;
				} else if($createRecordID == false) {
					// record ID is already present in the source file
					// lets just upload it to the DAV and save us from the trouble :P

					while ((fgetcsv($file, 0, $delimiter)) !== FALSE) {
						// count total records :/
						$c++;
					}

					// rewind the source and update it to the DAV
					rewind($file);
					self::updateStream($stagedPath, $file);

					// do post processing and return.
					self::removeRecordIDs($columns, $excerpt);
					return [
						"columns" => $columns,
						"excerpt" => $excerpt,
						"file" => $fileName,
						"totalRecords" => $c,
					];
				}

				if($c % $updateChunk === 0 && $createRecordID) {
					// after every 1000th one, update AI
					$AI = App\RuntimeConfig::increaseValue("RecordAI", $updateChunk);
				}

				if($createRecordID) {
					if($c == 0) {
						// proper column based on row#
						array_unshift($row, "RecordID");
					} else {
						array_unshift($row, $AI);
					}
				}
				fputcsv($fp, $row);
				$AI++;
				$c++;
			}
			@fclose($file);

			// GENERIC FINISH START
			$AI = App\RuntimeConfig::increaseValue("RecordAI", $updateChunk);

			rewind($fp);

			self::updateStream($stagedPath, $fp);

			@fclose($fp);

		} catch(\Exception $e) {
			@fclose($fp);
			@fclose($file);
			throw $e;
		}

		self::removeRecordIDs($columns, $excerpt);

		return [
			"columns" => $columns,
			"excerpt" => $excerpt,
			"file" => $fileName,
			"totalRecords" => $c,
		];
		// GENERIC FINISH END
	}

	public static function flattenLegacyExcel($path, $name, $reader = 'Excel5')
	{
		//$type = \PHPExcel_IOFactory::identify($path);
		//dd($type); // to delect `reader` type

		// PREPARING FOR ETL
		$updateChunk = 1000;
		$AI = 0;
		$createRecordID = false;
		$columns = [];
		$excerpt = [];

		$fp;
		$fileName = $name . "-" . time();
		$stagedPath = "staged-data/" . $fileName . ".csv";

		try {
			$fp = fopen('php://temp/maxmemory:'. (20*1024*1024), 'r+');
			$c = 0;
			// GENERIC ETL END


			$objReader = \PHPExcel_IOFactory::createReader($reader);
			if(isset($objReader->listWorksheetNames)) {
				// if worksheets are supported, then...
				$worksheetList = $objReader->listWorksheetNames($path);
				$sheetname = $worksheetList[0]; 
				$objReader->setLoadSheetsOnly($sheetname);
			}
			$objPHPExcel = $objReader->load($path); 

			$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
			$highest_row = $objWorksheet->getHighestRow();
			$highest_col = $objWorksheet->getHighestColumn();
			

			for ($counter = 1; $counter <= $highest_row; $counter++)
			{
				$row = $objWorksheet->rangeToArray('A'.$counter.':'.$highest_col.$counter);
				$row = reset($row);

				if($c == 0) {
					$columns = array_values($row);
					if(self::hasRecordID($columns) === FALSE) {
						$createRecordID = true;
						$AI = App\RuntimeConfig::increaseValue("RecordAI", $updateChunk * 5);
					}
				} else if($c < 5) {
					$excerpt[] = $row;
				}

				if($c % $updateChunk === 0 && $createRecordID) {
					// after every 1000th one, update AI
					$AI = App\RuntimeConfig::increaseValue("RecordAI", $updateChunk);
				}

				if($createRecordID) {
					if($c == 0) {
						// proper column based on row#
						array_unshift($row, "RecordID");
					} else {
						array_unshift($row, $AI);
					}
				}
				fputcsv($fp, $row);
				$AI++;
				$c++;
			}

			// GENERIC FINISH START
			$AI = App\RuntimeConfig::increaseValue("RecordAI", $updateChunk);

			rewind($fp);

			self::updateStream($stagedPath, $fp);

			@fclose($fp);

		} catch(\Exception $e) {
			@fclose($fp);
			throw $e;
		}

		self::removeRecordIDs($columns, $excerpt);

		return [
			"columns" => $columns,
			"excerpt" => $excerpt,
			"file" => $fileName,
			"totalRecords" => $c,
		];
		// GENERIC FINISH END
	}

	public static function flattenFastExcel($path, $name, $type = 1)
	{
		// PREPARING FOR ETL
		$updateChunk = 1000;
		$AI = 0;
		$createRecordID = false;
		$columns = [];
		$excerpt = [];

		$fp;
		$reader;
		$fileName = $name . "-" . time();
		$stagedPath = "staged-data/" . $fileName . ".csv";

		try {
			$fp = fopen('php://temp/maxmemory:'. (20*1024*1024), 'r+');
			$c = 0;
			// GENERIC ETL END

			$reader = ReaderFactory::create($type);
			$reader->open($path);

			foreach ($reader->getSheetIterator() as $sheet) {
				foreach ($sheet->getRowIterator() as $row) {

					if($c == 0) {
						$columns = array_values($row);
						if(self::hasRecordID($columns) === FALSE) {
							$createRecordID = true;
							$AI = App\RuntimeConfig::increaseValue("RecordAI", $updateChunk * 5);
						}
					} else if($c < 5) {
						$excerpt[] = $row;
					}

					if($c % $updateChunk === 0 && $createRecordID) {
						// after every 1000th one, update AI
						$AI = App\RuntimeConfig::increaseValue("RecordAI", $updateChunk);
					}

					if($createRecordID) {
						if($c == 0) {
							// proper column based on row#
							array_unshift($row, "RecordID");
						} else {
							array_unshift($row, $AI);
						}
					}
					fputcsv($fp, $row);
					$AI++;
					$c++;
				}
				break;
			}

			// GENERIC FINISH START
			$AI = App\RuntimeConfig::increaseValue("RecordAI", $updateChunk);

			rewind($fp);

			self::updateStream($stagedPath, $fp);

			@$reader->close();
			@fclose($fp);

		} catch(\Exception $e) {
			@$reader->close();
			@fclose($fp);
			throw $e;
		}

		self::removeRecordIDs($columns, $excerpt);

		return [
			"columns" => $columns,
			"excerpt" => $excerpt,
			"file" => $fileName,
			"totalRecords" => $c,
		];
		// GENERIC FINISH END
	}

	public static function makeSummary(&$data, $size = 3)
	{
		if(count($data) <= $size * 2 + 6) {
			return [
				"start" => $data,
			];
		} else {
			return [
				"start" => array_slice($data, 0, $size),
				"end" => array_slice($data, - $size),
			];
		}
	}

	public static function hasRecordID(&$columns)
	{
		foreach ($columns as $index => $column) {
			if(trim(strtolower($column)) == "recordid") {
				return $index;
			}
		}
		return false;
	}

	public static function removeRecordIDs(&$columns, &$excerpt)
	{
		$recordIndex = self::hasRecordID($columns);
		if($recordIndex !== FALSE) {
			array_splice($columns, $recordIndex, 1);

			foreach ($excerpt as $key => $row) {
				//unset($excerpt[$key][$recordIndex]);
				array_splice($excerpt[$key], $recordIndex, 1);
			}
		}
	}

	public static function stageFlatData($flatData, $name)
	{
		// Deprecated
		// Because loading the entire array into memory is a terrible idea when it comes to performance
		$fp;

		try {
			$fp = fopen('php://temp/maxmemory:'. (20*1024*1024), 'r+');
			foreach ($flatData as $fields) {
				if($fields instanceof \SplFixedArray) {
					$fields = $fields->toArray();
				}
				fputcsv($fp, $fields);
			}

			rewind($fp);

			self::updateStream("staged-data/" . $name . "-" . time() . ".csv", $fp);

			@fclose($fp);
		} catch(\Exception $e) {
			@fclose($fp);
			throw $e;
		}

	}

	public static function exportFile($file, $format, $headerType, $rowChunks, $columns)
	{
		$format = strtolower($format);
		self::expandResources();

		if($format == "csv") {
			return self::exportCSV($file, $headerType, $rowChunks, $columns);
		} else if($format == "txt") {
			return self::exportTXT($file, $headerType, $rowChunks, $columns);
		} else if($format == "xml") {
			return self::exportXML($file, $headerType, $rowChunks, $columns);
		} else if($format == "json") {
			return self::exportJSON($file, $headerType, $rowChunks, $columns);
		} else if($format == "xlsx") {
			return self::exportXLSX($file, $headerType, $rowChunks, $columns);
		} else if($format == "ods") {
			return self::exportODS($file, $headerType, $rowChunks, $columns);
		}

	}

	public static function exportTXT($file, $headerType, $rowChunks, $columns)
	{
		return self::exportCSV($file, $headerType, $rowChunks, $columns, "\t", "txt");
	}

	public static function exportCSV($file, $headerType, $rowChunks, $columns, $delimiter = ",", $extension = "csv")
	{
		ini_set('auto_detect_line_endings', TRUE);

		if($rowChunks) {
			$zipFilePath = tempnam(sys_get_temp_dir(), 'erp');
			$zip = new \ZipArchive();
			$zip->open($zipFilePath, \ZipArchive::CREATE);
		}

		$outFile;
		$outFilePath;
		try {
			$outFilePath = tempnam(sys_get_temp_dir(), 'erp');
			$outFile = fopen($outFilePath, 'r+');

			$c = 0;
			$chunkNumber = 1;
			$columnsOrder = [];
			while (($row = fgetcsv($file)) !== FALSE) {

				if($c == 0) {
					$columnsOrder = self::matchColumnsOrder($columns, $row);
					if($headerType == 'yes' || $headerType == 'firstChunk' || $headerType === true) {
						fputcsv($outFile, $columns, $delimiter);
					}
				} else {
					$newRow = [];
					foreach ($columnsOrder as $columnKey) {
						$newRow[] = $row[$columnKey];
					}
					fputcsv($outFile, $newRow, $delimiter);

					if($rowChunks) {
						if($c % $rowChunks === 0) {
							$zip->addFile($outFilePath, 'data-' . $chunkNumber . "." . $extension);

							@fclose($outFile);
							$outFilePath = tempnam(sys_get_temp_dir(), 'erp');
							$outFile = fopen($outFilePath, 'r+');
							if( ($headerType == 'yes' || $headerType === true) && $headerType != 'firstChunk' ) {
								fputcsv($outFile, $columns, $delimiter);
							}

							$chunkNumber++;
						}

					}

				}

				$c++;
			}

			@fclose($outFile);
		} catch(\Exception $e) {
			@fclose($zipFile);
			@fclose($outFile);
			@unlink($outFilePath);
			throw $e;
		}

		if($rowChunks) {
			@fclose($outFile);
			$zip->addFile($outFilePath, 'data-' . $chunkNumber . "." . $extension);
			$zip->close();
		}

		return $rowChunks ? $zipFilePath : $outFilePath;
	}

	public static function exportXML($file, $headerType, $rowChunks, $columns)
	{
		ini_set('auto_detect_line_endings', TRUE);

		if($rowChunks) {
			$zipFilePath = tempnam(sys_get_temp_dir(), 'erp');
			$zip = new \ZipArchive();
			$zip->open($zipFilePath, \ZipArchive::CREATE);
		}

		$outFile;
		$outFilePath;
		try {
			$outFilePath = tempnam(sys_get_temp_dir(), 'erp');
			$outFile = fopen($outFilePath, 'r+');

			$c = 0;
			$chunkNumber = 1;
			$columnsOrder = [];
			$xmlColumns = [];
			while (($row = fgetcsv($file)) !== FALSE) {

				if($c == 0) {
					$columnsOrder = self::matchColumnsOrder($columns, $row);
					$xmlColumns = self::generateXmlColumns($columns);
					fputs($outFile, '<?xml version="1.0"?>' . "\r\n");
					fputs($outFile, '<main>' . "\r\n");
				} else {
					fputs($outFile, "\t<item>\r\n");
					foreach ($columnsOrder as $index => $columnKey) {
						fputs($outFile, "\t\t<" . $xmlColumns[$index] . ">" . htmlspecialchars($row[$columnKey]) . "</" . $xmlColumns[$index] . ">\r\n");
					}
					fputs($outFile, "\t</item>\r\n");

					if($rowChunks) {
						if($c % $rowChunks === 0) {
							fputs($outFile, '</main>' . "\r\n");
							$zip->addFile($outFilePath, 'data-' . $chunkNumber . ".xml");

							@fclose($outFile);
							$outFilePath = tempnam(sys_get_temp_dir(), 'erp');
							$outFile = fopen($outFilePath, 'r+');
							fputs($outFile, '<?xml version="1.0"?>' . "\r\n");
							fputs($outFile, '<main>' . "\r\n");

							$chunkNumber++;
						}

					}

				}

				$c++;
			}

		} catch(\Exception $e) {
			@fclose($zipFile);
			@fclose($outFile);
			@unlink($outFilePath);
			@unlink($zipFilePath);
			throw $e;
		}

		fputs($outFile, '</main>' . "\r\n");
		@fclose($outFile);
		if($rowChunks) {
			$zip->addFile($outFilePath, 'data-' . $chunkNumber . ".xml");
			$zip->close();
		}

		return $rowChunks ? $zipFilePath : $outFilePath;
	}

	public static function exportJSON($file, $headerType, $rowChunks, $columns)
	{
		ini_set('auto_detect_line_endings', TRUE);

		if($rowChunks) {
			$zipFilePath = tempnam(sys_get_temp_dir(), 'erp');
			$zip = new \ZipArchive();
			$zip->open($zipFilePath, \ZipArchive::CREATE);
		}

		$outFile;
		$outFilePath;
		try {
			$outFilePath = tempnam(sys_get_temp_dir(), 'erp');
			$outFile = fopen($outFilePath, 'r+');

			$c = 0;
			$chunkNumber = 1;
			$columnsOrder = [];
			$jsonColumns = [];
			$columnsLength = count($columns);
			$delimiter = '';
			while (($row = fgetcsv($file)) !== FALSE) {

				if($c == 0) {
					$columnsOrder = self::matchColumnsOrder($columns, $row);
					$jsonColumns = self::generateJsonColumns($columns);
					fputs($outFile, '[' . "\r\n");
				} else {
					fputs($outFile, $delimiter . "\t{\r\n");
					foreach ($columnsOrder as $index => $columnKey) {
						fputs($outFile, "\t\t" . $jsonColumns[$index] . " : " . json_encode($row[$columnKey]) . ($index < $columnsLength-1 ? "," : "" ) . "\r\n");
					}
					fputs($outFile, "\t}");
					$delimiter = ",\r\n";

					if($rowChunks) {
						if($c % $rowChunks === 0) {
							fputs($outFile, "\r\n]" . "\r\n");
							$zip->addFile($outFilePath, 'data-' . $chunkNumber . ".json");

							@fclose($outFile);
							$outFilePath = tempnam(sys_get_temp_dir(), 'erp');
							$outFile = fopen($outFilePath, 'r+');
							fputs($outFile, '[' . "\r\n");
							$delimiter = '';

							$chunkNumber++;
						}

					}

				}

				$c++;
			}

		} catch(\Exception $e) {
			@fclose($zipFile);
			@fclose($outFile);
			@unlink($outFilePath);
			@unlink($zipFilePath);
			throw $e;
		}

		fputs($outFile, "\r\n]" . "\r\n");
		@fclose($outFile);
		if($rowChunks) {
			$zip->addFile($outFilePath, 'data-' . $chunkNumber . ".json");
			$zip->close();
		}

		return $rowChunks ? $zipFilePath : $outFilePath;
	}

	public static function exportXLSX($file, $headerType, $rowChunks, $columns)
	{
		ini_set('auto_detect_line_endings', TRUE);

		if($rowChunks) {
			$zipFilePath = tempnam(sys_get_temp_dir(), 'erp');
			$zip = new \ZipArchive();
			$zip->open($zipFilePath, \ZipArchive::CREATE);
		}

		$outFilePath;
		try {
			$outFilePath = tempnam(sys_get_temp_dir(), 'erp');
			$writer = WriterFactory::create(Type::XLSX);
			$writer->openToFile($outFilePath);

			$c = 0;
			$chunkNumber = 1;
			$columnsOrder = [];
			while (($row = fgetcsv($file)) !== FALSE) {

				if($c == 0) {
					$columnsOrder = self::matchColumnsOrder($columns, $row);
					if($headerType == 'yes' || $headerType == 'firstChunk' || $headerType === true) {
						$writer->addRow($columns);
					}
				} else {
					$newRow = [];
					foreach ($columnsOrder as $columnKey) {
						$newRow[] = $row[$columnKey];
					}
					$writer->addRow($newRow);

					if($rowChunks) {
						if($c % $rowChunks === 0) {
							$zip->addFile($outFilePath, 'data-' . $chunkNumber . ".xlsx");

							$writer->close();
							$outFilePath = tempnam(sys_get_temp_dir(), 'erp');
							$writer = WriterFactory::create(Type::XLSX);
							$writer->openToFile($outFilePath);
							if( ($headerType == 'yes' || $headerType === true) && $headerType != 'firstChunk' ) {
								$writer->addRow($columns);
							}

							$chunkNumber++;
						}

					}

				}

				$c++;
			}

			$writer->close();
		} catch(\Exception $e) {
			$writer->close();
			@fclose($zipFile);
			@unlink($outFilePath);
			throw $e;
		}

		if($rowChunks) {
			$zip->addFile($outFilePath, 'data-' . $chunkNumber . ".xlsx");
			$zip->close();
		}

		return $rowChunks ? $zipFilePath : $outFilePath;
	}

	public static function exportODS($file, $headerType, $rowChunks, $columns)
	{
		ini_set('auto_detect_line_endings', TRUE);

		if($rowChunks) {
			$zipFilePath = tempnam(sys_get_temp_dir(), 'erp');
			$zip = new \ZipArchive();
			$zip->open($zipFilePath, \ZipArchive::CREATE);
		}

		$outFilePath;
		try {
			$outFilePath = tempnam(sys_get_temp_dir(), 'erp');
			$writer = WriterFactory::create(Type::ODS);
			$writer->openToFile($outFilePath);

			$c = 0;
			$chunkNumber = 1;
			$columnsOrder = [];
			while (($row = fgetcsv($file)) !== FALSE) {

				if($c == 0) {
					$columnsOrder = self::matchColumnsOrder($columns, $row);
					if($headerType == 'yes' || $headerType == 'firstChunk' || $headerType === true) {
						$writer->addRow($columns);
					}
				} else {
					$newRow = [];
					foreach ($columnsOrder as $columnKey) {
						$newRow[] = $row[$columnKey];
					}
					$writer->addRow($newRow);

					if($rowChunks) {
						if($c % $rowChunks === 0) {
							$zip->addFile($outFilePath, 'data-' . $chunkNumber . ".ods");

							$writer->close();
							$outFilePath = tempnam(sys_get_temp_dir(), 'erp');
							$writer = WriterFactory::create(Type::ODS);
							$writer->openToFile($outFilePath);
							if( ($headerType == 'yes' || $headerType === true) && $headerType != 'firstChunk' ) {
								$writer->addRow($columns);
							}

							$chunkNumber++;
						}

					}

				}

				$c++;
			}

			$writer->close();
		} catch(\Exception $e) {
			$writer->close();
			@fclose($zipFile);
			@unlink($outFilePath);
			throw $e;
		}

		if($rowChunks) {
			$zip->addFile($outFilePath, 'data-' . $chunkNumber . ".ods");
			$zip->close();
		}

		return $rowChunks ? $zipFilePath : $outFilePath;
	}

	public static function generateXmlName($name)
	{
		$name =  preg_replace("/([^a-zA-Z0-9\_]+)/i", '', $name);
		$name =  preg_replace("/^([0-9]*)/", '', $name);
		return $name;
	}

	public static function generateXmlColumns($columns)
	{
		$newColumns = [];
		foreach ($columns as $column) {
			$newColumns[] = self::generateXmlName($column);
		}
		return $newColumns;
	}

	public static function generateJsonColumns($columns)
	{
		$newColumns = [];
		foreach ($columns as $column) {
			$newColumns[] = json_encode($column);
		}
		return $newColumns;
	}

	public static function matchColumnsOrder($newColumns, $storedColumns)
	{
		$order = [];
		foreach ($newColumns as $column) {
			$order[] = array_search($column, $storedColumns);
		}
		return $order;
	}


}
