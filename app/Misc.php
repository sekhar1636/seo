<?php

namespace App;

use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Model;
use App;
use Auth;

class Misc{
	
	public static $accountTypes = [
		'actor'   => 'Actor',
		'staff'   => 'Staff/Technician',		
		'theater' => 'Theater'
	];

	public static $primary_sought = [
        '1' => 'Accompanist',
        '2' => 'Administration',
        '3' => 'Box Office',
        '4' => 'Carpentry',
        '5' => 'Choreography',
        '6' => 'Costume Design',
        '7' => 'Sewing',
        '8' => 'Technical Director',
        '9' => 'Graphics',
        '10' => 'House Management',
        '11' => 'Lighting Design',
        '12' => 'Electrics',
        '13' => 'Director',
        '14' => 'Musical Director',
        '15' => 'Photography',
        '16' => 'Video',
        '17' => 'Props',
        '18' => 'Publicity',
        '19' => 'Running Crew',
        '20' => 'Scenic Artist',
        '21' => 'Scenic Artist',
        '22' => 'Sound',
        '23' => 'Stage Management',
        '24' => 'Company Management',
        ''   => ''
    ];

    public static $secondary_sought = [
        '1'  => 'Accompanist',
        '2'  => 'Administration',
        '3'  => 'Box Office',
        '4'  => 'Carpentry',
        '5'  => 'Choreography',
        '6'  => 'Costume Design',
        '7'  => 'Sewing',
        '8'  => 'Technical Director',
        '9'  => 'Graphics',
        '10' => 'House Management',
        '11' => 'Lighting Design',
        '12' => 'Electrics',
        '13' => 'Director',
        '14' => 'Musical Director',
        '15' => 'Photography',
        '16' => 'Video',
        '17' => 'Props',
        '18' => 'Publicity',
        '19' => 'Running Crew',
        '20' => 'Scenic Artist',
        '21' => 'Scenic Artist',
        '22' => 'Sound',
        '23' => 'Stage Management',
        '24' => 'Company Management',
        ''   => ''
    ];

    public static $musical_performers = [
		'1' => 'Non Musical Performers',
		'2' => 'Musical Performers',
		'3' => 'Not Certain',
		''  => 'Not selected Musical Performers'
    ];

    public static $view_musical_performers = [
        '1' => 'Yes',
        '2' => 'No',
        '3' => 'Not Certain',
        ''  => 'Theater User not selected this field.'
    ];

    public static $casting_dancers = [
        '1' => 'Casting Dancers',
        '2' => 'Non Casting Dancers',
        '3' => 'Not Certain',
        ''  => 'Not Selected Casting Dancer'
    ];

    public static $view_casting_dancers = [
        '1' => 'Yes',
        '2' => 'No',
        '3' => 'Not Certain',
        ''  => 'Theater User Not selected this field'
    ];

	public static $showPage = [
		'0' => 'No',
		'1' => 'Yes',	
	];

	public static $feet = [
		'1' => '1 ft',
		'2' => '2 ft',	
		'3' => '3 ft',	
		'4' => '4 ft',	
		'5' => '5 ft',	
		'6' => '6 ft',	
		'7' => '7 ft',	
		'8' => '8 ft',	
	];

	public static $inch = [
	    '0' => '0 inch',
		'1' => '1 inch',
		'2' => '2 inches',
		'3' => '3 inches',
		'4' => '4 inches',
		'5' => '5 inches',
		'6' => '6 inches',
		'7' => '7 inches',
		'8' => '8 inches',
		'9' => '9 inches',
		'10' => '10 inches',
		'11' => '11 inches',
		'12' => '12 inches',
	];

	public static $genders = [
		'Male' => 'Male',
		'Female' => 'Female',
	];

	public static $auditionType = [
		'Monologue Only' => 'Monologue Only',
		'Song & Monologue' => 'Song & Monologue',
		'Dancer Who Sings'=>'Dancer Who Sings'
	];

	public static $vocalRange = [
		'Soprano' => 'Soprano',
		'Mezzo' => 'Mezzo',		
		'Alto'=>'Alto',
		'Tenor' => 'Tenor',		
		'Baritone'=>'Baritone'
	];
	public static $jobTypes = [
		'Apprentice' => 'Apprentice',
		'Intern' => 'Intern'
	];
	public static $dance = [
		'Ballet' => 'Ballet',
		'Ballroom' => 'Ballroom',
		'Jazz'=>'Jazz',
		'Musical Theatre' => 'Musical Theatre',
		'Swing' => 'Swing',	
		'Tap'=>'Tap'
	];
	public static $technical = [
		'Set Design' => 'Set Design',
		'Lights' => 'Lights',		
		'Costume'=>'Costume',
		'Box Office' => 'Box Office',		
		'Props'=>'Props'
	];
	public static $ethnicity = [
		'Native Amer' => 'Native Amer',
		'Asian' => 'Asian',		
		'White_Caucasian'=>'White_Caucasian',
		'Black_African Amer' => 'Black_African Amer',		
		'Hispanic'=>'Hispanic',
		'European'=>'European',
		'Middle Eastern' => 'Middle Eastern',		
		'Indian'=>'Indian'
	];
	public static $instrument = [
		'Banjo'=>'Banjo',
		'Cello' => 'Cello',
		'Clarinet' => 'Clarinet',
		'Drums'=>'Drums',
		'Flute'=>'Flute',
		'Guitar'=>'Guitar',
		'Perc' => 'Perc',
		'Piano' => 'Piano',
		'Sax' => 'Sax',
		'Trombone'=>'Trombone',
		'Trumpet' => 'Trumpet',	
		'Violin' => 'Violin'
	];
	public static $misc = [
		'Shakespeare' => 'Shakespeare',
		'Cabaret' => 'Cabaret',		
		'Improv'=>'Improv',
		'Mime' => 'Mime',		
		'Standup'=>'Standup',
		'Acrobatics' => 'Acrobatics',
		'Juggling' => 'Juggling',		
		'Puppetry'=>'Puppetry',
		'Asl' => 'ASL',
		'Painting'=>'Painting',
		'Combat' => 'Combat'
	];

	public static $eyes = [
		'Black' => 'Black',
		'Blue' => 'Blue',		
		'Brown'=>'Brown',
		'Gray' => 'Gray',		
		'Green'=>'Green',
		'Hazel' => 'Hazel',
		'Pink' => 'Pink',		
		'Maroon'=>'Maroon',
	];

	public static $hair = [
		'Brown' => 'Brown',
		'Black' => 'Black',		
		'White'=>'White',
		'Sandy' => 'Sandy',		
		'Red' => 'Red',
		'Blond' => 'Blond',		
		'Blue'=>'Blue',
		'Green' => 'Green',
		'Orange' => 'Orange',		
		'Pink'=>'Pink',
		'Red' => 'Red',
		'Purple' => 'Purple',		
		'Blue'=>'Blue',
	];

	public static $auditionDay = [
		'Thursday' 	=> 'Thursday',
		'Friday' 	=> 'Friday',
		'Saturday' 	=> 'Saturday',
		'Sunday' 	=> 'Sunday',
		'Monday' 	=> 'Monday',
	];

    public static $employee_availability = [
        1 => 'Immediate',
        2 => 'Summer',
        3 => 'Fall',
        4 => 'Next Year'
    ];

    public static $available_positions = [
        '' => 'unav',
        1 => 'Accompanist',
        2 => 'Administration',
        3 => 'Box Office',
        4 => 'Carpentry',
        5 => 'Choreographer',
        6 => 'Costume Design',
        7 => 'Director',
        8 => 'Electrics',
        9 => 'Graphics',
        10 => 'House',
        11 => 'Light Ops',
        12 => 'Make-Up & Wig Design',
        13 => 'Music Director',
        14 => 'Paint Charge',
        15 => 'Photography',
        16 => 'Pit Musician',
        17 => 'Properties',
        18 => 'Publicity',
        19 => 'Running Crew',
        20 => 'Scenic Artist',
        21 => 'Set Design',
        22 => 'Sewing/Wardrobe',
        23 => 'Sound',
        24 => 'Stage Management',
        25 => 'Technical Direction',
        26 => 'Video'
    ];

    public static $states = [
        ''   => '--Select Your State--',
        'AL' => 'Alabama',
        'AK' => 'Alaska',
        'AZ' => 'Arizona',
        'AR' => 'Arkansas',
        'CA' => 'California',
        'CO' => 'Colorado',
        'CT' => 'Connecticut',
        'DE' => 'Delaware',
        'DC' => 'District Of Columbia',
        'FL' => 'Florida',
        'GA' => 'Georgia',
        'HI' => 'Hawaii',
        'ID' => 'Idaho',
        'IL' => 'Illinois',
        'IN' => 'Indiana',
        'IA' => 'Iowa',
        'KS' => 'Kansas',
        'KY' => 'Kentucky',
        'LA' => 'Louisiana',
        'ME' => 'Maine',
        'MD' => 'Maryland',
        'MA' => 'Massachusetts',
        'MI' => 'Michigan',
        'MN' => 'Minnesota',
        'MS' => 'Mississippi',
        'MO' => 'Missouri',
        'MT' => 'Montana',
        'NE' => 'Nebraska',
        'NV' => 'Nevada',
        'NH' => 'New Hampshire',
        'NJ' => 'New Jersey',
        'NM' => 'New Mexico',
        'NY' => 'New York',
        'NC' => 'North Carolina',
        'ND' => 'North Dakota',
        'OH' => 'Ohio',
        'OK' => 'Oklahoma',
        'OR' => 'Oregon',
        'PA' => 'Pennsylvania',
        'RI' => 'Rhode Island',
        'SC' => 'South Carolina',
        'SD' => 'South Dakota',
        'TN' => 'Tennessee',
        'TX' => 'Texas',
        'UT' => 'Utah',
        'VT' => 'Vermont',
        'VA' => 'Virginia',
        'WA' => 'Washington',
        'WV' => 'West Virginia',
        'WI' => 'Wisconsin',
        'WY' => 'Wyoming',
    ];


    public static $aea = [
		'None' => 'None',
		'ANTC' => 'ANTC',
		'Bay Area Theatre' => 'Bay Area Theatre',
		'Business Theatre & Events' => 'Business Theatre & Events',
		'Cabaret' => 'Cabaret',
		'Casino' => 'Casino',
		'CAT' => 'CAT',
		'CORST' => 'CORST',
		'COST' => 'COST',
		'Dinner Theatre' => 'Dinner Theatre',
		'Dinner Theatre Artist' => 'Dinner Theatre Artist',
		'Disney World' => 'Disney World',
		'Guest Artist' => 'Guest Artist',
		'HAT' => 'HAT',
		'LOA' => 'LOA',
		'LOA-NYC' => 'LOA-NYC',
		'LORT Non-Rep' => 'LORT Non-Rep',
		'LORT Rep' => 'LORT Rep',
		'LA 99-Seat Theatre Code' => 'LA 99-Seat Theatre Code',
		'Midsize Theatres' => 'Midsize Theatres',
		'Mini' => 'Mini',
		'Modified BAT' => 'Modified BAT',
		'MSUA' => 'MSUA',
		'NEAT' => 'NEAT',
		'NOLA' => 'NOLA',
		'OAT' => 'OAT',
		'Off-Broadway' => 'Off-Broadway',
		'Outdoor Drama' => 'Outdoor Drama',
		'Production (Disney)' => 'Production (Disney)',
		'Production (League)' => 'Production (League)',
		'RMTA' => 'RMTA',
		'Short Engagement Touring Agreement' => 'Short Engagement Touring Agreement',
		'Showcase-NY' => 'Showcase-NY',
		'Special Agreement' => 'Special Agreement',
		'Special Appearance' => 'Special Appearance',
		'Special Production-Central' => 'Special Production-Central',
		'Special Production-Eastern' => 'Special Production-Eastern',
		'Special Production-Western' => 'Special Production-Western',
		'SPT' => 'SPT',
		'Transition' => 'Transition',
		'TYA' => 'TYA',
		'URTA' => 'URTA',
		'WCLO' => 'WCLO',
		'Workshop' => 'Workshop'
    ];

	public static function arrayInsertBefore($key, array &$array, $new_key, $new_value) {
		if (array_key_exists($key, $array)) {
			$new = array();
			foreach ($array as $k => $value) {
				if ($k === $key) {
					$new[$new_key] = $new_value;
				}
				$new[$k] = $value;
			}
			return $new;
		}
		return FALSE;
	}

	public static function arrayInsertAfter($key, array &$array, $new_key, $new_value) {
		if (array_key_exists($key, $array)) {
			$new = array();
			foreach ($array as $k => $value) {
				$new[$k] = $value;
				if ($k === $key) {
					$new[$new_key] = $new_value;
				}
			}
			return $new;
		}
		return FALSE;
	}

	public static function handleDatatable($options){
		// initializing the response
		$responseData = [];

		// get stuff from model
		$request = $options["request"];
		$modelQuery = $options["model"];
		$modelClass = "";

		// if its a static class (passed as string)
		if(is_string($modelQuery)) {

			// convert it into a query
			// for a unified interface
			$model = (new $modelQuery);
			$modelClass = $modelQuery;
			$modelQuery = $modelQuery::query();
		} else {
			// or else, just use it.
			$model = $modelQuery->getModel();
			$modelClass = get_class($model);
		}

		// search for exempt stuff
		$exempt = [];

		if(property_exists($modelQuery, "exempt")) {
			$exempt = $modelQuery->exempt;
		}

		// if we have an action
		if($request->has("action")) {
			$action = $request->get("action");
			$group = $request->get("actionGroup");

			// make sure that the action is a string
			if(is_string($action)) {

				// hack to make sure that it doesnt throw exception
				// on empty whereIn
				if(count($group) == 0) {
					$group[] = -1;
				}

				// clone the query for use as action items
				$records = clone $modelQuery;
				$records = $records->whereIn("id", $group)->get();

				// if the options have a actions array
				if(isset($options["actions"]) && is_array($options["actions"])) {

					// and the user action is in that array
					if(isset($options["actions"][$action])) {

						// get the function needed
						$function = $options["actions"][$action];

						// apply it and return the stuff
						$returnedData = $function($records);
						$responseData["actionStatus"] = $returnedData["status"];
						$responseData["actionMessage"] = $returnedData["message"];

					}
				}
			}
		}

		// now getting stuff
		$count = $modelQuery->count();

		// pagination configuration
		$length = $request->get("length");
		$start = $request->get("start");
		if($length == -1) {
			$length = $count - $start;
		}

		// get the part of collection, according to pagination info
		$retrievedRecords = $modelQuery->skip($start)->take($length);

		// loop through the configured columns, and check for relations
		foreach ($options["columns"] as $key => $info) {

			// if the given info is string
			// and it has a `dot` in it
			// then split it up and store it as a relation
			if(is_string($info)) {
				$parts = explode(".", $info);
				if(count($parts) > 1) {

					// the dot notation is short form
					// this is complete form
					$info = [
						"relation" => $parts[0],
						"column" => $parts[1],
					];

					// overwriting it
					$options["columns"][$key] = $info;
				}
			}

			// now if its really a relation
			// apply it to a query as a join
			if(is_array($info)) {
				if(isset($info["relation"])) {

					// generate a random ID for this joined parameter
					$options["columns"][$key]["RNID"] = str_random(5);

					//execute the relation of the given model
					$data = $model->$info["relation"]();

					// get the type of the relation
					$class = get_class($data);
					$dataType = explode("\\", $class);
					$relationType = end($dataType);

					$options["columns"][$key]["relationType"] = $relationType;

					// if its a simple belongs-to statement
					if($relationType == "BelongsTo") {

						// get all belongs-to query info
						$otherTable = $data->getRelated()->getTable();
						$foreignKey = $data->getQualifiedForeignKey();
						$otherKey = $data->getOtherKey();

						// manually join using it
						$retrievedRecords->leftJoin($otherTable . ' as ' . $info["relation"], $info["relation"] . '.' . $otherKey, '=', $foreignKey);

					} else if($relationType == "HasMany" || $relationType == "HasOne") {

						// get all has-many query info
						$otherTable = $data->getRelated()->getTable();
						$foreignKey = $data->getPlainForeignKey();
						$parentKey = $data->getQualifiedParentKeyName();

						// manually join using it
						$retrievedRecords->leftJoin($otherTable . ' as ' . $info["relation"], $info["relation"] . '.' . $foreignKey, '=', $parentKey);

					}

				}
			}

		}

		// get the table name
		$tableName = $model->getTable();

		// filter the records
		$retrievedRecords = self::filterRecords($retrievedRecords, $request, $exempt);

		// get the secondary count, after filtering
		$filteredCount = $retrievedRecords->count();

		// sort all filtered things
		$retrievedRecords = self::orderFilteredRecords($retrievedRecords, $request, $exempt);

		// prepare the columns needed for this query
		// starting with table's own data
		$columnsData = [$tableName . '.*'];


		// loop through all relations
		// and add them to columns as well
		foreach ($options["columns"] as $key => $info) {
			if(is_array($info)) {
				if(isset($info["relation"])) {

					// Note RNID, that's the temporary ID

					if($info["relationType"] == "HasMany") {
						// if its a has-many relation, concatenate them by delimeter

						$delimeter = isset($info["delimeter"]) ? $info["delimeter"] : ", ";

						// GROUP_CONCAT does the job well!
						$columnsData[] = "GROUP_CONCAT(" . $info["relation"] . "." . $info["column"] . " SEPARATOR '" . $delimeter . "') AS " . $info["RNID"];

					} else {

						// else, just push em to columnsData
						$columnsData[] = $info["relation"] . "." . $info["column"] . " AS " . $info["RNID"];

					}

				}
			}
		}

		// group it by id. so that we don't see multiple rows in one-to-many situation
		$retrievedRecords->groupBy('id');

		// since $builder->get() does not support adding functions() in columns, we reverse engineer the whole thing!

		// firstly, extract the raw query, and remove the select keyword from start
		$partialQuery = substr($retrievedRecords->toSql(), strlen("SELECT *"));

		// now add the select keyword in start, and then add the columns data directly, and then the query
		$rebuiltQuery = "SELECT " . implode(", ", $columnsData) . " " . $partialQuery;

		// get the bindings from old query
		$bindings = $retrievedRecords->getBindings();

		// now execute it, and store the results
		$retrievedRecords = \DB::select($rebuiltQuery, $bindings);

		// convert array records from select() function, into eloquent collection
		$retrievedRecords = $modelClass::hydrate($retrievedRecords);

		// execute the query, old way
		//$retrievedRecords = $retrievedRecords->get($columnsData);

		$records = [];

		// loop through all retrieved records
		// and organize them for client
		foreach($retrievedRecords as $record) {

			// default item with data
			$entry = [
				"check" => $record->id,
				"id" => $record->id,
				"actions" => $record->id,
			];

			// now loop through all the columns specified
			foreach ($options["columns"] as $key => $info) {

				if(is_array($info)) {

					// if its a relation, get its value by RNID
					if(isset($info["relation"])) {
						$entry[$key] = $record->getAttribute($info["RNID"]);
					}

					// if a renderer is specified, call it
					if(isset($info["renderer"])) {
						$entry[$key] = $info["renderer"]($entry[$key]);
					}

				} else if(is_callable($info)) {

					// if its a function (renderer), just get the value, and pass into it
					$entry[$key] = $info($record->getAttribute($key));

				} else {

					// otherwise, just grab the value
					$entry[$key] = $record->getAttribute($info);
				}

			}


			// now ordering the entry according to the requested columns
			$records[] = self::sortResponseColumns($request, $entry);
		}

		// prepare response
		$responseData["draw"] = $request->get("draw");
		$responseData["recordsTotal"] = $count;
		$responseData["recordsFiltered"] = $count;
		//$responseData["recordsFiltered"] = $filteredCount;
		$responseData["data"] = $records;

		// voila!
		return $responseData;
	}

	private static function filterRecordValue($key, $value, $type, $records) {

		if(is_array($value)) {

			if($value["from"] != "" && $value["to"] != "") {
				if($type == "date") {
					$value["from"] = date("Y-m-d H:i:s", strtotime($value["from"]));
					$value["to"] = date("Y-m-d H:i:s", strtotime($value["to"]));
				}
				$records->whereBetween($key, [ $value["from"], $value["to"] ]);
			}
		} else {
			if(strtolower($value) == "null") {
				$records->whereNull($key);

			} else if($value != "") {

				if(is_numeric($value) || $type == "dropdown") {
					$records->where($key, '=', $value);
				} else {
					$records->where($key, 'LIKE', '%' . $value . '%');
				}
			}
		}

	}

	public static function filterRecords($records, $request, $exempt)
	{
		$filters = $request->get("filter");

		if($filters != null) {

			foreach($filters as $key => $filter) {
				
				if(isset($filter["value"])) {
					$value = $filter["value"];

					if(!in_array($key, $exempt)) {

						if(isset($filter["type"])) {
							$type = $filter["type"];

							/*if(strpos($key, '.') !== false) {
								// if the input[name] has a format `user.name`, then go deeper 1 level
								// fixed via join
								list($relatedTable, $relatedColumn) = explode(".", $key, 2);
								$records->whereHas($relatedTable, function($query) use(&$relatedColumn, &$value, &$type) {
								    self::filterRecordValue($relatedColumn, $value, $type, $query);
								});
							} else {*/
								$key = self::qualifyColumn($records, $key);
								self::filterRecordValue($key, $value, $type, $records);
							//}


						}
					}
				}
			}
		}

		return $records;

	}

	public static function accessProtected($obj, $prop) {
		$reflection = new \ReflectionClass($obj);
		$property = $reflection->getProperty($prop);
		$property->setAccessible(true);
		return $property->getValue($obj);
	}

	public static function qualifyColumn(&$query, $columnName) {

		if(strpos($columnName, '.') !== false) {
			return $columnName;
		} else {
			$table = $query->getModel()->getTable();
			return $table . "." . $columnName;
		}

	}

	public static function orderFilteredRecords($records, $request, $exempt)
	{
		// sorting stuff
		$orders = $request->get("order");
		foreach($orders as $order) {
			$columnName = $request->columns[$order["column"]]["name"];

			if(in_array($columnName, $exempt)) {
				// :o
			} else {
				$columnName = self::qualifyColumn($records, $columnName); // good practice
				$records->orderBy($columnName, $order["dir"]);
			}

		}

		return $records;
	}

	public static function sortResponseColumns($request, $columns)
	{
		$orderedRecord = [];

		foreach($request->columns as $column) {
			if(isset($columns[$column["name"]])) {
				$orderedRecord[] = $columns[$column["name"]];
			} else {
				$orderedRecord[] = "";
			}
		}

		return $orderedRecord;
	}

	public static function getUserAgent()
	{
		if (isset($_SERVER)) {
			return $_SERVER['HTTP_USER_AGENT'] ;
		} else {
			if (isset( $HTTP_SERVER_VARS )) {
				return $HTTP_SERVER_VARS['HTTP_USER_AGENT'] ;
			} else {
				return $HTTP_USER_AGENT ;
			}
		}
		return "";
	}

	public static function getMachineInfo() {

		// GET USERAGENT

		$user_agent = "";

		if (isset($_SERVER)) {
			$user_agent = $_SERVER['HTTP_USER_AGENT'] ;
		} else {
			global $HTTP_SERVER_VARS ;
			if (isset( $HTTP_SERVER_VARS )) {
				$user_agent = $HTTP_SERVER_VARS['HTTP_USER_AGENT'] ;
			} else {
				global $HTTP_USER_AGENT ;
				$user_agent = $HTTP_USER_AGENT ;
			}
		}

		// GET OS

		$os_platform    =   "Unknown OS Platform";

		$os_array       =   array(
								'/windows nt 10/i'     =>  'Windows 10',
								'/windows nt 6.3/i'     =>  'Windows 8.1',
								'/windows nt 6.2/i'     =>  'Windows 8',
								'/windows nt 6.1/i'     =>  'Windows 7',
								'/windows nt 6.0/i'     =>  'Windows Vista',
								'/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
								'/windows nt 5.1/i'     =>  'Windows XP',
								'/windows xp/i'         =>  'Windows XP',
								'/windows nt 5.0/i'     =>  'Windows 2000',
								'/windows me/i'         =>  'Windows ME',
								'/win98/i'              =>  'Windows 98',
								'/win95/i'              =>  'Windows 95',
								'/win16/i'              =>  'Windows 3.11',
								'/macintosh|mac os x/i' =>  'Mac OS X',
								'/mac_powerpc/i'        =>  'Mac OS 9',
								'/linux/i'              =>  'Linux',
								'/ubuntu/i'             =>  'Ubuntu',
								'/iphone/i'             =>  'iPhone',
								'/ipod/i'               =>  'iPod',
								'/ipad/i'               =>  'iPad',
								'/android/i'            =>  'Android',
								'/blackberry/i'         =>  'BlackBerry',
								'/webos/i'              =>  'Mobile'
							);

		foreach ($os_array as $regex => $value) { 
			if (preg_match($regex, $user_agent)) {
				$os_platform    =   $value;
			}
		}

		// GET BROWSER

		$browser        =   "Unknown Browser";
		$browser_array  =   array(
								'/msie/i'       =>  'Internet Explorer',
								'/firefox/i'    =>  'Firefox',
								'/safari/i'     =>  'Safari',
								'/chrome/i'     =>  'Chrome',
								'/opera/i'      =>  'Opera',
								'/netscape/i'   =>  'Netscape',
								'/maxthon/i'    =>  'Maxthon',
								'/konqueror/i'  =>  'Konqueror',
								'/mobile/i'     =>  'Handheld Browser'
							);

		foreach ($browser_array as $regex => $value) { 
			if (preg_match($regex, $user_agent)) {
				$browser    =   $value;
			}
		}

		// GET VERSION

	    $version= "";

	    $known = array('Version', $browser, 'other');
	    $pattern = '#(?<browser>' . join('|', $known) .
	    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
	    if (!preg_match_all($pattern, $user_agent, $matches)) {
	    }

	    // see how many we have
	    $i = count($matches['browser']);
	    if ($i != 1) {
	        if (strripos($user_agent,"Version") < strripos($user_agent, $browser)){
	            $version= $matches['version'][0];
	        }
	        else {
	            $version= $matches['version'][1];
	        }
	    }
	    else {
	        $version= $matches['version'][0];
	    }

	    if ($version==null || $version=="") {$version="?";}


		return [
			"OS" => $os_platform,
			"browser" => [
				"name" => $browser,
				"version" => $version,
			],
			"userAgent" => $user_agent,
		];
	}

	// deprecated in favor of wildcard search!
	/*public static function updateFieldCondition($condition, $hashPairs)
	{
		$parts = explode(",", $condition);

		foreach ($parts as $key => $part) {
			$token = explode("@", $part);
			$token[2] = "0";
			if($token[0] == "control") {
				$token[1] = $hashPairs[$token[1]]->id;
			}
			$parts[$key] = implode("@", $token);
		}

		$newCondition = implode(",", $parts);
		return $newCondition;
	}

	public static function updateControlIDs($config, $hashPairs) {

		// update visibility control
		if(isset($config["visibilityCondition"])) {
			if($config["visibilityCondition"] != "") {
				$config["visibilityCondition"] = App\Misc::updateFieldCondition($config["visibilityCondition"], $hashPairs);
			}
		}

		// update expression
		if(isset($config["expression"])) {
			if($config["expression"] != "") {
				$config["expression"] = App\Misc::updateFieldCondition($config["expression"], $hashPairs);
			}
		}

		// update shortlisting
		if(isset($config["shortlisting"])) {
			if($config["shortlisting"] != "") {
				$config["shortlisting"] = $hashPairs[$config["shortlisting"]]->id;
			}
		}

		return $config;
	}*/

	public static function getDifference($currentCollection, $newArray, $key = 'id')
	{
		$currentKeys = $currentCollection->lists($key)->toArray();
		$newKeys = [];

		foreach ($newArray as $value) {
			$newKeys[] = $value[$key];
		}

		return [
			"delete" => array_diff($currentKeys, $newKeys),
			"create" => array_diff($newKeys, $currentKeys),
		];
	}

	public static function nl2p($text)
	{
		$text = htmlspecialchars(trim($text));
		$text = preg_replace("/[\r\n]+/", "\n", $text);
		$text = "<p>" . preg_replace("/(\r?\n)/", "</p><p>", $text) . "</p>";

		return $text;
	}

	public static function array2KeyValue($array, $keyText = 'id', $valueText = 'name', $preserveKeys = false)
	{
		$newArray = [];
		if($preserveKeys) {
			foreach ($array as $key => $value) {
				$newArray[$key] = [
					$keyText => $key,
					$valueText => $value,
				];
			}
		} else {
			foreach ($array as $key => $value) {
				$newArray[] = [
					$keyText => $key,
					$valueText => $value,
				];
			}
		}
		return $newArray;
	}
}