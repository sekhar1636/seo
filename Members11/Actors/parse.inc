<?php

/*parse hair, eye, height, weight, age values */

	switch($hair)
	{
		case "AU" :
			$hair = "Auburn";
			break;
		case "BK" :
			$hair = "Black";
			break;
		case "BL" :
			$hair = "Blonde";
			break;
		case "DB" :
			$hair = "Dark Brown";
			break;
		case "GY" :
			$hair = "Grey";
			break;
		case "BD" :
			$hair = "No Hair";
			break;
		case "RD" :
			$hair = "Red";
			break;
		case "WT" :
			$hair = "White";
			break;
		default: 
			$hair = "Light Brown";
			break;
	}
//eye
	switch($eye)
	{
		case "BK" :
			$eye = "Black";
			break;
		case "BL" :
			$eye = "Blue";
			break;
		case "GR" :
			$eye = "Green";
			break;
		case "HZ" :
			$eye = "Hazel";
			break;
		default: 
			$eye = "Brown";
			break;
	}	
	
	switch($age_range)
	{
		case "16" :
			$age_range = "Under 16";
			break;
		case "20" :
			$age_range = "16-20";
			break;
		case "25" :
			$age_range = "21-25";
			break;
		case "30" :
			$age_range = "26-30";
			break;
		case "35" :
			$age_range = "31-35";
			break;
		case "40" :
			$age_range = "36-40";
			break;
		default: 
			$age_range = "Over 40";
			break;
	}	
/*
	switch($weight)
	{
		case "110" :
			$weight = "Up to 110 lbs";
			break;
		case "130" :
			$weight = "111 to 130 lbs";
			break;
		case "150" :
			$weight = "131 to 150 lbs";
			break;
		case "170" :
			$weight = "151 to 170 lbs";
			break;
		case "195" :
			$weight = "171 to 195 lbs";
			break;
		default: 
			$weight = "Over 195 lbs";
			break;
}		
*/
$inches = $ht % 12;
$feet = ($ht - $inches)/12;


/*OLD FORM
	switch($height)
	{
		case "46" :
			$height = "4.6 - 4.11";
			break;
		case "5" :
			$height = "5-5 - 6";
			break;
		case "57" :
			$height = "5.7 - 5.11";
			break;
		default: 
			$height = "6 - 6.6";
			break;
}		
*/
	switch($region)
	{
		case "NE" :
			$region = "Northeast";
			break;
		case "NW" :
			$region = "Northwest";
			break;
		case "S" :
			$region = "South";
			break;
		case "SE" :
			$region = "Southeast";
			break;
        case "SW" :
            $region = "Southwest";
            break;            
		case "MW" :
			$region = "Midwest";
			break;
        case "MA" :
            $region = "Mid-Atlantic";
            break;
        case "W" :
            $region = "West";
            break;            
		default: 
			$region = "Northest";
			break;
}	


	switch($vocal)
	{
		case "A" :
			$vocal = "Alto";
			break;
		case "B" :
			$vocal = "Baritone";
			break;
		case "BR" :
			$vocal = "Bass-Baritone";
			break;
		case "MS" :
			$vocal = "Mezzo-Soprano";
			break;
		case "S" :
			$vocal = "Soprano";
			break;
		case "" :
			$vocal = "Not Indicated";
			break;	
		default: 
			$vocal = "Tenor";
			break;
	}

//new form for availfor

$mo = substr($availfor, 5,2);
$day = substr($availfor, 8,2);
$year = substr($availfor, 0, 4);

$availfor_ps = $mo . "-" . $day . "-" . $year;
	
/*old form

	switch($availfor)
	{
		case "N" :
			$availfor = "Now";
			break;
		case "A" :
			$availfor = "April";
			break;
		case "M" :
			$availfor = "May";
			break;
		case "Jn" :
			$availfor = "June";
			break;
		case "Jl" :
			$availfor = "July";
			break;
		case "Au" :
			$availfor = "August";
			break;			
		default: 
			$availfor = "September";
			break;
}		
*/
/*new form*/
$mo = substr($availto, 5,2);
$day = substr($availto, 8,2);
$year = substr($availto, 0, 4);

$availto_ps = $mo . "-" . $day . "-" . $year;

/*OLD FORM
	switch($availto)
	{
		case "O" :
			$availto = "Open";
			break;
		case "A" :
			$availto = "April";
			break;
		case "M" :
			$availto = "May";
			break;
		case "Jn" :
			$availto = "June";
			break;
		case "Jl" :
			$availto = "July";
			break;
		case "Au" :
			$availto = "August";
			break;			
		case "S" :
			$availto = "September";
			break;			
		default: 
			$availto = "Beyond September";
			break;
}
*/		
?>