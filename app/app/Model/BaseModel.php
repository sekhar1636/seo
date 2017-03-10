<?php namespace App\Model;

use Medoo\Medoo;
use PDO;

class BaseModel {

	public function initializeDB(){
		
		$database = new Medoo([
			'database_type' => 'mysql',
			'database_name' => DB_NAME,
			'server'        => DB_HOST,
			'username'      => DB_USER,
			'password'      => DB_PASS,
			'charset'       => 'utf8',
			'option'        => [
				PDO::ATTR_CASE => PDO::CASE_NATURAL
			]
		]);

		return $database;
	}
	
	public function dbTable($name){
		
		switch ($name){
			case 'actor':
				$table = 'actor11';
				break;
			case 'audition':
				$table = 'audition11';
				break;
			case 'physical':
				$table = 'physical11';
				break;
			case 'rec':
				$table = 'rec11';
				break;
			case 'roles':
				$table = 'roles11';
				break;
			case 'sched':
				$table = 'sched11';
				break;
			case 'skills':
				$table = 'skills11';
				break;
			default:
				$table = '';
		}
		
		return $table;
	}	
	
	public function dbColumns($type){
		
		switch ($type){
			case 'actors':
				$columns = ['actor_uid', 'firstname', 'midname', 'lastname', 'date_entered', 'app_type', 'address', 'city', 'state', 'zip', 'region', 'phone', 'fax', 'email', 'largecity', 'h_or_serv', 'url1', 'url2', 'audio_link', 'video_link', 'pix_link', 'resume_link'];
				break;
			default:
				$columns = ['id'];
		}
		
		return $columns;
	}
	
}