<?php namespace App\Controller;
	
use \App\Model\ActorModel;	
	
class ActorController extends BaseController {

	private $actorID;

	function __construct(){
		$this->actorID = filter_input(INPUT_GET, 'actorID', FILTER_SANITIZE_STRING);
		
		$this->actorModel = new ActorModel;		
	}

	
	function single(){
		
		if($this->actorID){
			$actor = $this->actorModel->getByID($this->actorID);
		}else{
			$actor = 'No Actor by that ID';
		}
		
		return $actor;
	}
	
	function actorList(){
		
		$actors = $this->actorModel->getActors();
		
		return $actors;
	}
}