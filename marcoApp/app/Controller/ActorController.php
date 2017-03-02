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
		
		/*Initialize*/
		$actorList = '';
		
		$actors = $this->actorModel->getActors();
		
		/*Loop through the Actors*/
		foreach($actors as $actor){
			$actorList .= '<div class="mix ' . $actor['physical']['gender'] . '"';
				$actorList .= 'data-age="' . $actor['physical']['age_range'] . '"';
				$actorList .= 'data-name="' . $actor['firstname'] . '"';
			$actorList .= '>';
			$actorList .= '<h4>' . $actor['firstname'] . ' ' . $actor['lastname'] . '</h4>';
			$actorList .= '</div>';	
		}

		return $actorList;
	
	}
}