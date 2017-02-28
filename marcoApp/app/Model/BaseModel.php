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
	
	public function defineColumns($type){
		switch ($type){
			case 'actors':
				$columns = ['actor_uid', 'firstname', 'midname', 'lastname', 'date_entered', 'app_type', 'address', 'city', 'state', 'zip', 'region', 'phone', 'fax', 'email', 'largecity', 'h_or_serv', 'url1', 'url2', 'audio_link', 'video_link', 'pix_link', 'resume_link'];
				break;
			default:
				$columns = ['id'];
				break;
		}
		
		return $columns;
	}
}