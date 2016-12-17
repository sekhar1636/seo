<?php
$gender = $_POST['gender'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$eye = $_POST['eye'];
$hair = $_POST['hair'];
$age_range = $_POST['age_range'];
$nativeam = $_POST['nativeam'];
$asian = $_POST['asian'];
$black = $_POST['black'];
$hispanic = $_POST['hispanic'];
$eeurope = $_POST['eeurope'];
$mideast = $_POST['mideast'];
$indian = $_POST['indian'];
$white = $_POST['white'];

include("../session.inc");
?>


<?php
echo "
<HTML>
<HEAD>
<TITLE>2012 Search for Physical Attributes</TITLE>
<link rel=\"stylesheet\" href=\"members.css\" type=\"text/css\">

<SCRIPT LANGUAGE=\"Javascript\" TYPE=\"text/javascript\">
<!--

function open_window(url) {
	var NEW_WIN = null;
	NEW_WIN = window.open (\"\", \"RecordViewer\",
							\"toolbar=\"no\", 
							width=\"300\",
							height=\"300\",
							directories=\"no\",
							status=\"no\",
							scrollbars=\"yes\",
							resize=\"yes\",
							menubar=\"no\");
	NEW_WIN.location.href = url;
}


function sendme() 
{ 
    window.open(\"\",\"myNewWin\",\"width=\"300\",height=\"300\",toolbar=\"0\"); 
    var a = window.setTimeout(\"document.form1.submit();\",500); 
} 
-->
</script>
</HEAD>
<BODY BACKGROUND=\"../../graphics03/Bk10a.GIF\">
";

//create connection
include("../../Comm/connect.inc");

//set checkboxes
//2010 mod

if(!isset($nativeam)) {
	$nativeam = "N";
}
else
{
	$nativeam = "Na";
}

if (!isset($asian)){
	$asian = "N";
}
else
{
	$asian = "As";
}

if(!isset($white)) {
	$white = "N";
}
else
{
	$white = "Ca";
}

if(!isset($black)) {
	$black = "N";
}
else
{
	$black = "Af";
}

if(!isset($hispanic)) {
	$hispanic = "N";
}
else
{
	$hispanic = "Hi";
}

if(!isset($eeurope)) {
	$eeurope = "N";
}
else
{
	$eeurope = "Ea";
}

if(!isset($mideast)) {
	$mideast = "N";
}
else
{
	$mideast = "Mi";
}

if(!isset($indian)) {
	$indian = "N";
}
else
{
	$indian = "In";
}

//----------------parse correct sql statements
//take out height, weight, has to be redone
$sqlA ="SELECT phys_uid, actor_uid, 
lastname, firstname, resume_link, 
gender, hair, eye, age_range,
nativeam, asian, white, black, hispanic,
eeurope, mideast, indian

FROM actor11, physical11 

WHERE phys_uid = actor_uid ";

//sql strings
$sql = $sqlA;

$sql_gender = "AND gender = \"$gender\" ";
$sql_hair = "AND hair = \"$hair\" ";
$sql_eye = "AND eye = \"$eye\" ";
$sql_age_range = "AND age_range = \"$age_range\" "; 
$sql_nativeam = "AND nativeam = \"$nativeam\" ";
$sql_asian = "AND asian = \"$asian\" ";
$sql_white = "AND white = \"$white\" ";
$sql_black = "AND black = \"$black\" ";
$sql_hispanic = "AND hispanic = \"$hispanic\" ";
$sql_eeurope = "AND eeurope = \"$eeurope\" ";
$sql_mideast = "AND mideast = \"$mideast\" ";
$sql_indian = "AND indian = \"$indian\" ";




if($gender !="Select") {$sql = $sql . $sql_gender;}
else {$sql_gender = "";} 

if($hair !="") 
{$sql = $sql . $sql_hair;} 

if($age_range != ""){$sql = $sql . $sql_age_range;}
if($eye !="") {$sql = $sql . $sql_eye;}
if($nativeam == "In") {$sql = $sql . $sql_nativeam;}
if($asian == "As") {$sql = $sql . $sql_asian;}
if($white == "Ca") {$sql = $sql . $sql_white;}
if($black == "Af") {$sql = $sql . $sql_black;}
if($hispanic == "Hi") {$sql = $sql . $sql_hispanic;}
if($eeurope == "Ea") {$sql = $sql . $sql_eeurope;}
if($mideast == "Mi") {$sql = $sql . $sql_mideast;}
if($indian == "In") {$sql = $sql . $sql_indian;}

$sql_B = "ORDER BY lastname ASC";

$sql = $sql . $sql_B;

//done with $sql strings
echo " $sql";


//execute SQL query and get result
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute physical input query.");

//test for empty values, warn

if($age_range == "" && $eye == "" &&
   $nativeam == "N" && $asian == "N" &&
   $white == "N" && $black == "N" &&
   $hispanic == "N" && $eeurope == "N" &&
   $mideast == "N" && $indian == "N" &&
   $hair == "" && $age_range == "" && $eye == "") 	
   {
	echo "<p><b>Please check at least physical attribute.</b></p>";
	echo "<p><a href=\"phys_allsearch.php\">Back</a></p>";
	exit;
   }




echo "
/* OLD CODE
<H1>OLD Select Search Results</H1>
<FORM method=\"POST\" action=\"/Members11/Actors/actor_searchlastname1.php\">

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

	echo "African-American ";

	} 	

if ($hispanic != "N") {

	echo "Hispanic ";

	} 	

if ($eeurope != "N"){

	echo "East-European ";

	} 	

if ($mideast != "N"){

	echo "Middle-Eastern ";

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
	<tr>
	<td><a href=\"/Members11/Actors11/ActorRes/$resume_link\">$lastname, $firstname</a></td>
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
	echo "Asian ";
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
//-------------end of listing portion
*/



echo "</table>";


/*end of if statement
 END OF OLD SECTION
*/

//new section//

echo "


<P align = \"center\">Please note: when you select a profile to review, it will open in a new window</p>

<table align = \"center\" cellspacing=\"1\" cellpadding=\"1\">
<tr>
<td align=\"center\"><H2>Search Results for Physical Attributes:</H2>
Selected: ";


//2011 code

if($gender == "M") {echo "Gender:(Male) ";}
elseif ($gender == "F") {echo "Gender:(Female) ";}
elseif ($gender == "") {echo "";}

if($eye == "BK") {echo "Eye Color:(Black) ";}
elseif ($eye == "BR") {echo "Eye Color:(Brown) ";}
elseif ($eye == "HZ") {echo "Eye Color:(Hazel) ";}
elseif ($eye == "BL") {echo "Eye Color:(Blue) ";}
elseif ($eye == "GR") {echo "Eye Color:(Green) ";}
elseif ($eye == "") {echo "";}

if($hair == "AU") {echo "Hair:(Auburn) ";}
elseif ($hair == "LB") {echo "Hair:(Light Brown) ";}
elseif ($hair == "DB") {echo "Hair:(Dark Brown) ";}
elseif ($hair == "BK") {echo "Hair:(Black) ";}
elseif ($hair == "RD") {echo "Hair:(Red) ";}
elseif ($hair == "BL") {echo "Hair:(Blonde) ";}
elseif ($hair == "GY") {echo "Hair:(Grey) ";}
elseif ($hair == "WT") {echo "Hair:(White) ";}
elseif ($hair == "BD") {echo "Hair:(No Hair) ";}

if($nativeam == "Na") {echo "Type:(Native-American) ";}
elseif ($asian == "As") {echo "Type:(Asian) ";}
elseif ($white == "Ca") {echo "Type:(White) ";}
elseif ($black == "Af") {echo "Type:(Black) ";}
elseif ($hispanic == "Hi") {echo "Type:(Hispanic) ";}
elseif ($eeurope == "Ea") {echo "Type:(Eastern-European) ";}
elseif ($mideast == "Mi") {echo "Type:(Middle-Eastern) ";}
elseif ($indian == "In") {echo "Type:(Indian) ";}


if($age_range) {echo "Age Range($age_range) ";}	

echo "
	</td>
	</tr>
	</table>

";



//set counter
$count = 0;	
		
//execute SQL query and get result
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute input query.");


//set heading for list

	echo "

	<table width = \"85%\" border=0 align=\"center\">
	<tr>
	<th align=\"center\">Pix</th>
	<th align=\"center\">Name</th>
	</tr>

";



//format results under the contol

	while($row = mysql_fetch_array($sql_result) ) {
	$actor_uid = $row["actor_uid"];
	$lastname = stripslashes($row["lastname"]);
	$firstname = stripslashes($row["firstname"]);
	$midname = stripslashes($row["midname"]);
	$pix_link = $row["pix_link"];
	
	$new_item = $row["item"];
	$count++;
	
	if(empty($lastname)) {
			echo "<H2>No Match Found: Please try again.</H2>";
			exit();
	}

	else {

	if($new_item == "AR") {
		



	
	
	
	echo "

	<tr>	
	<td align=\"left\"><IMG width=\"65\" SRC=\"ActorPix/$pix_link\"></td>
			<td>$lastname, $firstname $midname</td>

			
	<td>
	<form name=\"form1\" method=\"post\" action=\"actor_searchlastname1.php\" target=\"myNewWin\">
	<input type=\"hidden\" name=\"sel_record\" value=\"$actor_uid\">
	<input type=\"submit\" value=\"Select Profile\" name=\"submit\" onClick=\"sendme()\">
	</form>
	</td>
    </tr>

";
	}
}
	}
echo "</table>";





if(!$count) {
	echo "<p align = \"center\">No Match Found, please modify your search selections</p>";
	}
	else {
	echo "<p align = \"center\">Total Number of Records: $count</p>";	
	}
echo " 

</BODY>
</HTML>
";
?>