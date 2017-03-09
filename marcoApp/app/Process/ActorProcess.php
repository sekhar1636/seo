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
	
	function processActorHeight($actorHeight){
	
		/*Initialize*/
		$actorHeight = (int) $actorHeight;
		
		/*Check which group the value falls under*/
		if($actorHeight < 60){//Under 5ft
			$output = 'under5';	
		}elseif( ($actorHeight >= 60)&&($actorHeight < 66) ){//Between 5ft & 5ft 6inch
			$output = 'bet5and56';
		}elseif( ($actorHeight >= 66)&&($actorHeight < 72) ){//Between 5ft 6inch & 6ft
			$output = 'bet56and6';
		}elseif( ($actorHeight >= 72)&&($actorHeight < 78) ){//Between 6ft & 6ft 5inch
			$output = 'bet6and66';
		}elseif($actorHeight >= 78){//6ft 6inch or taller
			$output = 'over66';
		}
		
		return $output;
	}

	function processDate($date){
	
		$output = date('m-d-y', strtotime($date));
		
		return $output;
	}	
	
	function processActorAvailability($actor){
		
		$output = '';
		
		$today = date('m-d-y');
		$forDate = $this->processDate($actor['audition']['availfor']);
		$toDate = $this->processDate($actor['audition']['availto']);
		
		if( ($today >= $forDate) && ($today <= $toDate) ){
			$output = 'Y';
		}else{
			$output = 'N';
		}
		
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
	
	function processActorEthnicity($actor){
		
		/*Initialize*/
		$ethnicityList = [];
		$ethnicityOutput = '';
		
		foreach ($actor['ethnicity'] as $key => $ethnicity){
			if($ethnicity){
				$ethnicityList[] = $ethnicity;
			}
		}
		if ($ethnicityList){
			$ethnicityOutput = implode(" ", $ethnicityList);
		}
	
		return $ethnicityOutput;
	}
	
	function processActorSkills($actor){
		
		/*Initialize*/
		$skillList = [];
		$skillOutput = '';
		
		foreach ($actor['skills'] as $key => $skill){
			if($skill){
				$skillList[] = $key;
			}
		}
		if($skillList){
			$skillOutput = implode(" ", $skillList);
		}
		
		return $skillOutput;
	}
}