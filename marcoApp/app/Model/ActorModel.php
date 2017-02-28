<?php namespace App\Model;	

class ActorModel extends BaseModel {
	
	function __construct(){
		$this->dbInit = $this->initializeDB();
		$this->dbColumns = $this->defineColumns('actors');
		$this->dbTable = "actor11";
	}

	function getActors(){
	
		$data = $this->dbInit->select($this->dbTable,
			$this->dbColumns,
			[
				"ORDER" => [
					"actor_uid" => "ASC",
				]	
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