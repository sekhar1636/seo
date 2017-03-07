<?php namespace App\Process;

class ActorProcess extends BaseProcess {
	
	function __construct(){
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
		$actorImage = ACTOR_IMAGE_PATH . strtolower($actor['lastname']) . '_' . strtolower($actor['firstname']) . '.jpg';
		
		/*Check if Image Exists*/
		if (file_exists(BASE_PATH . $actorImage)){
			$actorImageOutput = BASE_URL . $actorImage;
		}else{
			$actorImageOutput = BASE_URL . ACTOR_IMAGE_PATH . 'noImage.png';
		}
		
		return $actorImageOutput;
	}
}