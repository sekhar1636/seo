<?php namespace App\Process;

class ActorProcess extends BaseProcess {
	
	function __construct(){
	}
	
	function processDate($date){
	
		$output = date('m-d-y', strtotime($date));
		
		return $output;
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

	function processActorHeight($height){
	
		$feet = floor(($height/12));
		$inches = $height - ($feet * 12);
		$output = $feet."&prime;".$inches."&Prime;";
		
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
	
	function processHeightGroup($height){
	
		/*Initialize*/
		$height = (int) $height;
		
		/*Check which group the value falls under*/
		if($height < 60){//Under 5ft
			$output = 'under5';	
		}elseif( ($height >= 60)&&($height < 66) ){//Between 5ft & 5ft 6inch
			$output = 'bet5and56';
		}elseif( ($height >= 66)&&($height < 72) ){//Between 5ft 6inch & 6ft
			$output = 'bet56and6';
		}elseif( ($height >= 72)&&($height < 78) ){//Between 6ft & 6ft 5inch
			$output = 'bet6and66';
		}elseif($height >= 78){//6ft 6inch or taller
			$output = 'over66';
		}
		
		return $output;
	}
	
	function processHairColor($value){
		
		switch(strtolower($value)){
			case 'au':
				$output = 'Auburn';
				break;
			case 'lb':
				$output = 'Light Brown';
				break;
			case 'db':
				$output = 'Dark Brown';
				break;
			case 'bk':
				$output = 'Black';
				break;
			case 'rd':
				$output = 'Red';
				break;
			case 'bl':
				$output = 'Blonde';
				break;
			case 'gy':
				$output = 'Grey';
				break;
			case 'bd':
				$output = 'No Hair';
				break;
			default:
				$output = 'White';
		}
		
		return $output;
	}	
	
	function processEyeColor($value){
		
		switch(strtolower($value)){
			case 'bk':
				$output = 'Black';
				break;
			case 'br':
				$output = 'Brown';
				break;
			case 'hz':
				$output = 'Hazel';
				break;
			case 'bl':
				$output = 'Blue';
				break;
			case 'gr':
				$output = 'Green';
				break;
			default:
				$output = 'N/A';
		}
		
		return $output;
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
	
	function processActorVocal($value){
		
		switch(strtolower($value)){
			case 's':
				$output = 'Soprano';
				break;
			case 'ms':
				$output = 'Mezzo';
				break;
			case 'a':
				$output = 'Alto';
				break;
			case 't':
				$output = 'Tenor';
				break;
			case 'b':
				$output = 'Baritone';
				break;
			default:
				$output = 'N/A';
		}
		
		return $output;
	}
                
	function processEthnicity($value){
		
		switch(strtolower($value)){
			case 'na':
				$output = 'Native American';
				break;
			case 'as':
				$output = 'Asian';
				break;
			case 'ca':
				$output = 'White/Caucasian';
				break;
			case 'af':
				$output = 'Black/African American';
				break;
			case 'hi':
				$output = 'Hispanic';
				break;
			case 'ea':
				$output = 'European';
				break;
			case 'mi':
				$output = 'Middle Eastern';
				break;
			case 'in':
				$output = 'Indian';
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
	
	function processActorEthnicity($actor){
		
		/*Initialize*/
		$ethnicityList = [];
		$ethnicityOutput = '';
		
		foreach ($actor['ethnicity'] as $ethnicity){
			if($ethnicity){
				$ethnicityList[] = $ethnicity;
			}
		}
		if ($ethnicityList){
			$ethnicityOutput = implode(" ", $ethnicityList);
		}
	
		return $ethnicityOutput;
	}
	
	function processEthnicityList($actor,$type){
		
		/*Initialize*/
		$ethnicityList = [];
		$ethnicityOutput = '';
		
		foreach ($actor['ethnicity'] as $ethnicity){
			if($ethnicity){
				$ethnicityList['slug'][] = $ethnicity;
				$ethnicityList['label'][] = $this->processEthnicity($ethnicity);
			}
		}
		if ($ethnicityList){
			if($type == 'slug'){
				$ethnicityOutput = implode(" ", $ethnicityList['slug']);
			}elseif($type == 'label'){
				$ethnicityOutput = implode(", ", $ethnicityList['label']);	
			}
		}
	
		return $ethnicityOutput;
	}
	
	function processCoreSkills($skills, $type){
		
		/*Initialize*/
		$list = [];
		$output = '';
		
		foreach ($skills as $key => $skill){
			if($skill){
				if(in_array($key, $this->defineSkills($type))){
					$list[] = ucfirst($key) . '(' . $skill . ')';
				}
			}
		}
		
		if($list){
			$output = implode(", ", $list);
		}
		
		return $output;
	}
	
	function defineSkills($type){
		
		switch(strtolower($type)){
			case 'instrument':
				$output = ['perc','bass','sax','banjo','piano','drums','cello','clarinet','trombone','trumpet','flute','violin','guitar'];
				break;
			case 'dance':
				$output = ['ballet','mus_thea','ballroom','tap','swing','jazz'];
				break;
			default:
				$output = [];
		}

		return $output;
	}

	
	function processSkillsList($skills, $type = NULL){
		
		/*Initialize*/
		$skillList = [];
		$skillOutput = '';
		
		foreach ($skills as $key => $skill){
			if($skill){
				if($type == 'count'){
					$skillList[] = ucfirst($key) . '(' . $skill . ')';
				}else{
					$skillList[] = $key;
				}
			}
		}
		if($skillList){
			if(!is_null($type)){
				$skillOutput = implode(" ", $skillList);
			}else{
				$skillOutput = implode(", ", $skillList);
			}
		}
		
		return $skillOutput;
	}
	
	function processActorRoles($roles){
		
		/*Initialize*/
		$roleList = [];
		$i = 0;

		for( $i = 1; $i < 11; $i++ ) {
			$roleList[] = [
				'show'      => $roles['show' . $i],
				'role'      => $roles['role' . $i],
				'theater'   => $roles['thea' . $i],
				'director'  => $roles['dir' . $i],
			];
		}
		
		return $roleList;
	}
}