<?php

/*

	if ((!$skills_uid || !$actor_uid)) {

	header("Location: http://localhost/Members05/Actors/inst_search.php");

	exit;

}

*/



echo "



<HTML>

<HEAD>

<TITLE>2005 Search for Actors' Physical Attributes</TITLE>

<link rel=\"stylesheet\" href=\"members.css\" type=\"text/css\">

</HEAD>

<BODY>



";



//create connection

//substitute your own hostname, username and password



//----------------------------------connection - local

//$connection = mysql_connect("127.0.0.1", "JayServer", "wombat") or die ("Couldn't connect to server.");



//connection - remote

$connection = mysql_connect("db2.thebook.com", "strawhat", "sFM2hvnG3jAv4N") or die ("Couldn't connect to server.");





//-------------------------------select database - local

//$db = mysql_select_db("mydata", $connection) or die("Couldn't select database.");



//select database - remote

$db = mysql_select_db("strawhat_auditions", $connection) or die("Couldn't select database.");



//check to see if nothing was entered? - set items set to generic search default?



if(!isset($nativeam)) {

	$nativeam = "N";

}

if (!isset($asian)){

	$asian = "N";

}

if(!isset($white)) {

	$white = "N";

}

if(!isset($black)) {

	$black = "N";

}

if(!isset($hispanic)) {

	$hispanic = "N";

}

if(!isset($eeurope)) {

	$eeurope = "N";

}



if(!isset($mideast)) {

	$mideast = "N";

}



if(!isset($mideast)) {

	$mideast = "N";

}

if(!isset($indian)) {

	$indian = "N";

}







//----------------parse correct sql statements

$sql ="SELECT physical05.phys_uid , actor05.actor_uid, actor05.lastname, actor05.firstname, actor05.resume_link, actor05.gender,

physical05.height, physical05.weight, physical05.hair, physical05.eye, physical05.age_range,

physical05.nativeam, physical05.asian, physical05.white, physical05.black, physical05.hispanic,

physical05.eeurope, physical05.mideast, physical05.indian

FROM actor05, physical05 

WHERE physical05.phys_uid = actor05.actor_uid AND actor05.gender =\"$gender\" 

OR physical05.phys_uid = actor05.actor_uid AND physical05.height = \"$height\"

OR physical05.phys_uid = actor05.actor_uid AND physical05.weight = \"$weight\"

OR physical05.phys_uid = actor05.actor_uid AND physical05.hair = \"$hair\"

OR physical05.phys_uid = actor05.actor_uid AND physical05.eye = \"$eye\"

OR physical05.phys_uid = actor05.actor_uid AND physical05.age_range = \"$age_range\"

OR physical05.phys_uid = actor05.actor_uid AND physical05.nativeam = \"$nativeam\"

OR physical05.phys_uid = actor05.actor_uid AND physical05.asian = \"$asian\"

OR physical05.phys_uid = actor05.actor_uid AND physical05.white = \"$white\"

OR physical05.phys_uid = actor05.actor_uid AND physical05.black = \"$black\"

OR physical05.phys_uid = actor05.actor_uid AND physical05.hispanic = \"$hispanic\"

OR physical05.phys_uid = actor05.actor_uid AND physical05.eeurope = \"$eeurope\"

OR physical05.phys_uid = actor05.actor_uid AND physical05.mideast = \"$mideast\"

OR physical05.phys_uid = actor05.actor_uid AND physical05.indian = \"$indian\"

ORDER BY actor05.lastname ASC";







//execute SQL query and get result

$sql_result = mysql_query($sql,$connection) or die("Couldn't execute physical input query.");



echo "

<H1>Select Search Results</H1>

<FORM method=\"POST\" action=\"/Members05/Actors/actor_searchlastname1.php\">

<table cellspacing=5 cellpadding=5>



<tr>

<td align=left><strong>Search Results for Actors' Physical Attributes: </strong><br>

Gender($gender), Height($height), Weight($weight), Hair($hair), Eye($eye), Age Range($age_range),

Role Type(

";

/*previous code

if(!empty($nativeam) ){

	echo "Native American ";

	}

if (!empty($asian) ){

	$juggling2 = "Y";

	} 	

if (!empty($white) ){

	echo "Caucasian ";

	} 	

if (!empty($black) ){

	echo "African American ";

	} 	

if (!empty($hispanic) ){

	echo "Hispanic ";

	} 	

if (!empty($eeurope) ){

	echo "East European ";

	} 	

if (!empty($mideast) ){

	echo "Middle Eastern ";

	} 	

if (!empty($indian) ){

	echo "Indian ";

	} 

*/



//2005 code, ala otherskills_search1.php

if($nativeam != "N"){

	echo "Native American ";

	}

if ($asian != "N"){

	$juggling2 = "Y";

	} 	

if ($white != "N" ){

	echo "Caucasian ";

	} 	

if ($black != "N"){

	echo "African American ";

	} 	

if ($hispanic != "N") {

	echo "Hispanic ";

	} 	

if ($eeurope != "N"){

	echo "East European ";

	} 	

if ($mideast != "N"){

	echo "Middle Eastern ";

	} 	

if ($indian != "N"){

	echo "Indian ";

	} 



echo "



)

</td>

<td valign = top>

<select name=\"sel_record\">

<option value=\"\"> -- Select Actors Below -- </option>

";



	while ($row = mysql_fetch_array($sql_result) ) {

		$new_lastname = $row["lastname"];

		$new_actor_uid = $row["actor_uid"];

		$new_firstname = $row["firstname"];

		echo "

			<option value=\"$new_actor_uid\">$new_lastname, $new_firstname</option>

			";

		}

reset($row);

echo "

	</select>

	</td>

	</tr>

	<tr>

	<td align = center colspan=2><INPUT type=\"submit\" value =\"Select Actor\"></td>

	</tr>

	

	</table>



";

	if(empty($new_lastname)) {

			echo "<H2>No Match Found: Please try again.</H2>";

	}

;



/* take out listing portion a/o 3/12/04



	else {



//execute SQL query and get result

$sql_result = mysql_query($sql,$connection) or die("Couldn't execute input query.");



echo "

	<table border=0 align=\"center\">

	<tr><th align=\"center\">Name</th>

	<th align=\"center\">Height</th>

	<th align=\"center\">Weight</th>

	<th align=\"center\">Hair</td>

	<th align=\"center\">Eye</th>

	<th align=\"center\">Age Range</th>

	<th align=\"center\">Type</th>

	</tr>

";





//format results under the contol

	

	while($row = mysql_fetch_array($sql_result) ) {

	$lastname = $row["lastname"];

	$firstname = $row["firstname"];

	$height = $row["height"];

	$gender = $row["gender"];

	$weight = $row["weight"];

	$hair = $row["hair"];

	$eye = $row["eye"];

	$nativeam = $row["nativeam"];

	$asian = $row["asian"];

	$white = $row["white"];

	$black = $row["black"];

	$hispanic = $row["hispanic"];

	$eeurope = $row["eeurope"];

	$mideast = $row["mideast"];

	$indian = $row["indian"];

	$resume_link = $row["resume_link"];



trim($resume_link);

   

	echo "

	<tr><td><a href=\"/Members04/Actors04/ActorRes/$resume_link\">$lastname, $firstname</a></td>

			<td align=\"center\">$gender</td>

			<td  align=\"center\">$height</td>

			<td  align=\"center\">$weight</td>

			<td  align=\"center\">$hair</td>

			<td  align=\"center\">$eye</td>												

			<td align=\"center\">$age_range</td>

			<td align=\"center\">

";

if(!empty($nativeam) ){

	echo "Native American ";

	}

if (!empty($asian) ){

	$juggling2 = "Y";

	} 	

if (!empty($white) ){

	echo "Caucasian ";

	} 	

if (!empty($black) ){

	echo "African American ";

	} 	

if (!empty($hispanic) ){

	echo "Hispanic ";

	} 	

if (!empty($eeurope) ){

	echo "East European ";

	} 	

if (!empty($mideast) ){

	echo "Middle Eastern ";

	} 	

if (!empty($indian) ){

	echo "Indian ";

	} 	

echo "		

			

			</td>

		  </tr>

		  	

";

}



-------------end of listing portion*/



echo "</table>";

//}



echo " 

</form>

</BODY>

</HTML>

";

?>