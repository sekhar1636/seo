<?php namespace App\Process;

class ActorProcess extends BaseProcess {
	
	function __construct(){
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
				$output = 'Song & Monologue';
				break;
			case 'n':
				$output = 'Non-Singing';
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