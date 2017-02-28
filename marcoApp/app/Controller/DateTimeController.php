<?php namespace App\Controller;
	
class DateTimeController extends BaseController{
	
	/*Define the TODAY Date Format*/
	function today(){
		$today = date("Y-m-d");
		return $today;
	}
	function now(){
		$now = date("Y-m-d H:i:s");
		return $now;
	}
	
	/*Check if Date is Saturday or Sunday*/
	function isWeekend() {
		$currentDate = $this->today();
	    return (date('N', strtotime($currentDate)) >= 6);
	}
	
	/*Cleanup Time Output*/
	function nicetime($date){
		
	    if(empty($date)){
	        return "No date provided";
	    }
	    
		$periods    = ["second", "min", "hour", "day", "week", "month", "year", "decade"];
		$lengths    = ["60","60","24","7","4.35","12","10"];
		
		$now        = time();
		$unix_date  = $date;
	
	    /* Check if FUTURE date | PAST date*/
	    if($now > $unix_date){    
	        $difference  = $now - $unix_date;
	        $tense       = "";
	        
	    }else{
	        $difference  = $unix_date - $now;
	        $tense       = "from now";
	    }
	    
	    for($count = 0; $difference >= $lengths[$count] && $count < count($lengths)-1; $count++){
	        $difference /= $lengths[$count];
	    }
	    
	    $difference = round($difference);
	    
	    if($difference != 1){
	        $periods[$count].= "s";
	    }
	    
	    /*Output*/
	    $dateOutput = "$difference $periods[$count] {$tense}";
	    
	    return $dateOutput;
	}
}	