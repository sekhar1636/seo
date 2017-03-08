<?php namespace App\Process;

class ActorProcess extends BaseProcess {
	
	function __construct(){
	}
	
	function processActorName($actor){
		
		$actorName = [];
		
		if( ($actor['firstname']) && ($actor['lastname']) ){
			$actorName = [
				'main'  => $actor['firstname'] . ' ' . $actor['lastname'],
				'short' => $actor['firstname']
			];
		}elseif( ($actor['firstname']) && (empty($actor['lastname'])) ){
			$actorName = [
				'main'  => $actor['firstname'],
				'short' => $actor['firstname']
			];
		}elseif( (empty($actor['firstname'])) && ($actor['lastname']) ){
			$actorName = [
				'main'  => $actor['lastname'],
				'short' => $actor['lastname']
			];
		}else{
			$actorName = [
				'main'  => 'NA',
				'short' => 'NA',
			];
		}
		
		return $actorName;
	}
	
	function processDate($date){
	
		$output = date('m-d-y', strtotime($date));
		
		return $output;
	}	
		
	function processYesNoMaybe($value){
		
		switch(strtolower($value)){
			case 'y':
				$output = 'Yes';
				break;
			case 'n':
				$output = 'No';
				break;
			case 'm':
				$output = 'Maybe';
				break;
			default:
				$output = 'N/A';
		}

		return $output;	
	}
		
	function processActorImage($actor){
		
		/*Initialize*/
		$actorImage = $actorImageOutput = '';
		
		/*Define Actor Image*/
		$actorImage = ACTOR_IMAGE_PATH . $actor['pix_link'];
		
		/*Check if Image Exists*/
		if (file_exists(BASE_PATH . $actorImage)){
			$actorImageOutput = BASE_URL . $actorImage;
		}else{
			$actorImageOutput = BASE_URL . ACTOR_IMAGE_PATH . 'noImage.png';
		}
		
		return $actorImageOutput;
	}

	function processActorResume($actor){
		
		/*Initialize*/
		$actorResume = $actorResumeOutput = '';
		
		/*Define Actor Image*/
		$actorResume = ACTOR_RESUME_PATH . $actor['resume_link'];
		
		/*Check if Image Exists*/
		if (file_exists(BASE_PATH . $actorResume)){
			$actorResumeOutput = BASE_URL . $actorResume;
		}
		
		return $actorResumeOutput;
	}
	
	function processAuditionType($value){
		
		switch(strtolower($value)){
			case 'y':
				$output = 'Monologue Only';
				break;
			case 'n':
				$output = 'Song & Monologue';
				break;
			case 'd':
				$output = 'Dancer Who Sings';
				break;
			default:
				$output = 'N/A';
		}
		
		return $output;
	}
}