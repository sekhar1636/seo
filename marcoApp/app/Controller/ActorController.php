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
			
			/*Determine Output Name*/
			$actorName = $this->actorProcess->processActorName($actor);
			
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
					$actorList .= '<h2>' . $actorName['main'] . '</h2>';
					
					if($actorImage){
						$actorList .= '<img src="' . $actorImage . '" height="130" style="height:130px;" class="actorThumb">' . '<br/>';
					}

						$actorList .= $this->actorProcess->processAuditionType($actor['audition']['mononly']) . '<br/>';
						
						if($actor['audition']['apprentice'] != 'N'){
							$actorList .= '<strong>Apprentice: </strong>' . $this->actorProcess->processYesNoMaybe($actor['audition']['apprentice']) . '<br/>';
						}

						if($actor['audition']['intern'] != 'N'){
							$actorList .= '<strong>Internship: </strong>' . $this->actorProcess->processYesNoMaybe($actor['audition']['intern']) . '<br/>';
						}

						$actorList .= '<strong>Available: </strong><br/>' . $this->actorProcess->processDate($actor['audition']['availfor']) . ' to ' . $this->actorProcess->processDate($actor['audition']['availto']) . '<br/>';
						
						if ($actorResume = $this->actorProcess->processActorResume($actor)){
							$actorList .= '<a href="' . $actorResume . '" class="btn btn-block btn-primary" target="_blank"><span class="glyphicon glyphicon-download"></span> ' . $actorName['short'] . '\'s Resume</a>';
						}

						$actorList .= '<a href="' . APP_URL . '?page=actor&actorID=' . $actor['actor_uid'] . '" class="btn btn-block btn-default" target="_blank"><span class="glyphicon glyphicon-user"></span> ' . $actorName['short'] . '\'s Profile</a>';
	
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