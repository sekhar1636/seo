<?php namespace App\Model;	

class ActorModel extends BaseModel {
	
	function __construct(){
		$this->dbInit = $this->initializeDB();
	}

	function getActors(){
	
		$data = $this->dbInit->select('actor11',
			[
				"[>]audition11" => ["actor_uid"  => "audition_uid"],
				"[>]physical11" => ["audition11.audition_uid" => "phys_uid"],				
				"[>]skills11" 	=> ["physical11.phys_uid" => "skills_uid"],
				"[>]roles11" 	=> ["skills11.skills_uid" => "roles_uid"]
			],
			[
				"actor11.actor_uid",
				"actor11.firstname",
				"actor11.lastname",
				
				"audition" => [
					"audition11.audition_2yr",
					"audition11.stock_lyr",	
					"audition11.availfor",	
					"audition11.availto",	
				],
				"physical" => [
					"physical11.height",
					"physical11.weight",
					"physical11.eye",
					"physical11.hair",
					"physical11.age_range",
					"physical11.gender",
				],
				"skills" => [
					"skills11.vocal",
				]
			],
			[
				"AND"   => [
					"actor11.app_type" => "AC",	
				],
				"ORDER" => [
					"actor11.actor_uid" => "ASC",
				],
				"LIMIT" => 1000
			]
		);
		return $data;
	}

	function getByID($id){
	
		$data = $this->dbInit->select($this->dbTable,
			$this->dbColumns,
			[
				"AND" => [
					"actor_uid"   => $id,
				]
			]
		);
		return $data;
	}
}