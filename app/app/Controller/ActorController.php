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
		
		/*Initialize*/
		$actor = [];
		
		/*Define Actor Object*/
		$actorObject = $this->actorModel->getByID($this->actorID);
		
		if($this->actorID){
			$actor = [
				'active' 			=> TRUE,
				'object' 			=> $actorObject,
				'name'   			=> $this->actorProcess->processActorName($actorObject),
				'height'			=> $this->actorProcess->processActorHeight($actorObject['physical']['ht']),
				'hair'				=> $this->actorProcess->processHairColor($actorObject['physical']['hair']),
				'eyes'				=> $this->actorProcess->processEyeColor($actorObject['physical']['eye']),
				'image'				=> $this->actorProcess->processActorImage($actorObject),
				'resume'			=> $this->actorProcess->processActorResume($actorObject),
				'audition_type' 	=> $this->actorProcess->processAuditionType($actorObject['audition']['mononly']),
				'vocal'  			=> $this->actorProcess->processActorVocal($actorObject['skills']['vocal']),
				'instrumentSkills' 	=> $this->actorProcess->processCoreSkills($actorObject['skills'],'instrument'),
				'danceSkills' 		=> $this->actorProcess->processCoreSkills($actorObject['skills'],'dance'),
				'techSkills' 		=> $this->actorProcess->processSkillsList($actorObject['techSkills'],'count'),
				'miscSkills' 		=> $this->actorProcess->processSkillsList($actorObject['miscSkills']),
				'ethnicity' 		=> $this->actorProcess->processEthnicityList($actorObject,'label'),
				'availableFor'		=> $this->actorProcess->processDate($actorObject['audition']['availfor']),
				'availableTo' 		=> $this->actorProcess->processDate($actorObject['audition']['availto']),
				'roles' 			=> $this->actorProcess->processActorRoles($actorObject['roles']),
			];
		}else{
			$actor = [
				'active' 			=> FALSE,
			];
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
			
			/*Build MIX Class*/
			$mixClass = $actor['physical']['gender'] . ' ';
				$mixClass .= $this->actorProcess->processEthnicityList($actor,'slug') . ' ';
				$mixClass .= $this->actorProcess->processSkillsList($actor['skills']);
			
			/*Build the Output*/
			$actorList .= '<div class="mix ' . $mixClass . '" ';
				$actorList .= 'data-first-name="' . $actor['firstname'] . '" ';
				$actorList .= 'data-last-name="' . $actor['lastname'] . '" ';
				$actorList .= 'data-height="' . (int) $actor['physical']['ht'] . '" ';
				$actorList .= 'data-height-group="' . $this->actorProcess->processHeightGroup($actor['physical']['ht']) . '" ';
				$actorList .= 'data-audition-type="' . $actor['audition']['mononly'] . '" ';
				$actorList .= 'data-apprentice="' . $actor['audition']['apprentice'] . '" ';
				$actorList .= 'data-intern="' . $actor['audition']['intern'] . '" ';
				$actorList .= 'data-availability="' . $this->actorProcess->processActorAvailability($actor) . '" ';
				$actorList .= 'data-skill-vocal="' . $actor['skills']['vocal'] . '" ';
				
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

						$actorList .= '<strong>Employment Availability:</strong><br/>' . $this->actorProcess->processDate($actor['audition']['availfor']) . ' to ' . $this->actorProcess->processDate($actor['audition']['availto']) . '<br/>';
						
						if ($actorResume = $this->actorProcess->processActorResume($actor)){
							$actorList .= '<a href="' . $actorResume . '" class="btn btn-block btn-primary" target="_blank"><span class="glyphicon glyphicon-download"></span> ' . $actorName['short'] . '\'s Resume</a>';
						}

						$actorList .= '<a href="' . APP_URL . '?page=actor&actorID=' . $actor['actor_uid'] . '" class="btn btn-block btn-default" target="_blank"><span class="glyphicon glyphicon-user"></span> ' . $actorName['short'] . '\'s Profile</a>';
	
				$actorList .= '</div>';
			$actorList .= '</div>' . PHP_EOL;	
		}

		return $actorList;
	}
}