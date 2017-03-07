<?php namespace App\Controller;
	
use \App\Model\ActorModel;	
use \App\Process\ActorProcess;
	
class ActorController extends BaseController {

	private $actorID;

	function __construct(){
		$this->actorID = filter_input(INPUT_GET, 'actorID', FILTER_SANITIZE_STRING);
		
		$this->actorModel = new ActorModel;		
		$this->actorProcess = new ActorProcess;	
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
		
		/*Get the Actor List*/
		$actors = $this->actorModel->getActors();
		
		/*Loop through the Actors*/
		foreach($actors as $actor){
			
			/*Define Actor Image URL*/
			$actorImage = $this->actorProcess->processActorImage($actor);
			
			/*Build the Output*/
			$actorList .= '<div class="mix ' . $actor['physical']['gender'] . '" ';
				$actorList .= 'data-age="' . (int) $actor['physical']['age_range'] . '" ';
				$actorList .= 'data-first-name="' . $actor['firstname'] . '" ';
				$actorList .= 'data-last-name="' . $actor['lastname'] . '" ';
				$actorList .= 'data-height="' . (int) $actor['physical']['ht'] . '" ';
				$actorList .= 'data-apprentice="' . $actor['audition']['apprentice'] . '" ';
				$actorList .= 'data-intern="' . $actor['audition']['intern'] . '" ';
				$actorList .= 'data-standby="' . $actor['audition']['standby'] . '" ';
				$actorList .= 'data-availfor="' . $actor['audition']['availfor'] . '" ';
				$actorList .= 'data-availto="' . $actor['audition']['availto'] . '" ';
			$actorList .= '>';
				$actorList .= '<div class="mix-content">';
					$actorList .= '<h4>' . $actor['firstname'] . ' ' . $actor['lastname'] . '</h4>';
					
					if($actorImage){
						$actorList .= '<img src="' . $actorImage . '" height="130" style="height:130px;">';	
					}

					$actorList .= '<ul>';
						$actorList .= '<li><strong>Age: </strong>' . (int) $actor['physical']['age_range'] . '</li>';
						$actorList .= '<li><strong>Height: </strong>' . (int) $actor['physical']['ht'] . '</li>';
						$actorList .= '<li><strong>Audition Type: </strong>'  . $actor['audition']['mononly'] . '</li>';
						$actorList .= '<li><strong>Availability: </strong>';
							$actorList .='<ul>';
								$actorList .= '<li>Apprentice: ' . $this->actorProcess->processYesNoMaybe($actor['audition']['apprentice']) . '</li>';
								$actorList .= '<li>Internship: ' . $this->actorProcess->processYesNoMaybe($actor['audition']['intern']) . '</li>';
								$actorList .= '<li>Standbye: ' . $this->actorProcess->processYesNoMaybe($actor['audition']['standby']) . '</li>';
							$actorList .= '</ul></li>';
						$actorList .= '<li><strong>Employment availability : </strong>';
							$actorList .= $actor['audition']['availfor'] . ' to ' . $actor['audition']['availto'] . '</li>';	
					$actorList .= '</ul>';
				$actorList .= '</div>';
			$actorList .= '</div>' . PHP_EOL;	
		}
		/*
			Gender
			Audition type (Song &Monologue, Dancer Who Sings, Non-Singer)
			Employment Availability
			Role Type (ethnicity)
			Vocal Range
			Height
			
			Dance
			Instrumental
			Other Skills	
		*/	

		return $actorList;
	}
}