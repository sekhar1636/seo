<?php
function dateCheck($date){

	/*Parse availfor*/
	$mo = substr($availfor, 5,2);
	$day = substr($availfor, 8,2);
	$year = substr($availfor, 0,4);
	
	$datefrom_month = $mo;
	
	return $datefrom_month;
}
//echo dateCheck('2017-06-01');
echo substr('2017-06-01', 5,2);