<?php
//selected skills for actors
$acrobatics = $_POST['acrobatics'];
$juggling = $_POST['juggling'];
$puppetry = $_POST['puppetry'];
$asl = $_POST['asl'];
$painting = $_POST['painting'];
$combat = $_POST['combat'];
$shakes = $_POST['shakes'];
$cabaret = $_POST['cabaret'];
$improv = $_POST['improv'];
$mime = $_POST['mime'];
$standup = $_POST['standup'];



include("../session.inc");
?>

<?php

include("open_window.inc");

echo "

<TITLE>Strawhat Search for Other Skills</TITLE>
<link rel=\"stylesheet\" href=\"/styles/members.css\" type=\"text/css\">
</HEAD>
<BODY BACKGROUND=\"../../graphics03/Bk10a.GIF\"><script src=\"navbar.js\"></script>
";


//create connection
include("../../Comm/connect.inc");

//---------------------------------create sql statement

//check to see if nothing was entered? - set items set to generic search default?
//2011 - not pretty, but basically if checkbox not set, assign value that won't equal 
//the database field; otherwise make it equal and use OR's to get more than one combo


if(!isset($acrobatics)) {
	$acrobatics = "N";
}
else
{
	$acrobatics = "A";
}

if (!isset($juggling)){
	$juggling = "N";
}

else
{
	$juggling = "J";
}

if(!isset($puppetry)) {
	$puppetry = "N";      
}

else
{
	$puppetry = "P";
}

if(!isset($asl)) {
	$asl = "N";
}
else
{
	$asl = "A";
}

if(!isset($painting)) {
	$painting = "N";
}
else
{
	$painting = "P";
}

if(!isset($combat)) {
	$combat = "N";
}
else
{
	$combat = "S";
}

if(!isset($shakes)) {
	$shakes = "N";
}
else
{
	$shakes = "S";
}

if(!isset($cabaret)) {
	$cabaret = "N";
}
else
{
	$cabaret = "C";
}

if(!isset($improv)) {
	$improv = "N";
}
else
{
	$improv = "I";
}
	
if(!isset($mime)) {
	$mime = "N";
}
else
{
	$mime = "M";
}
	
if(!isset($standup)) {
	$standup = "N";
}
else
{
	$standup = "S";
}

$sql_otherskills_start ="SELECT skills11.skills_uid, 
actor11.actor_uid, actor11.lastname, actor11.firstname, actor11.midname, actor11.resume_link, actor11.pix_link, skills11.acrobatics, skills11.juggling, skills11.puppetry, skills11.asl, skills11.painting, skills11.combat, skills11.shakes, skills11.cabaret, skills11.improv, skills11.mime, skills11.standup,
rec11.actor_ID, rec11.item

FROM actor11, skills11, rec11

WHERE skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND rec11.item = \"AR\"

";


if ($acrobatics == "A") {
	$acrobatics_p = " AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
	AND acrobatics = \"$acrobatics\" ";
	}
else {
	$acrobatics_p = "";
	} 

if ($juggling == "J") {
	$juggling_p = " AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID 
	AND juggling = \"$juggling\" ";
	}
else {
	$juggling_p = "";
	} 

if ($painting == "P") {
	$painting_p = " AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID 
	AND painting = \"$painting\" ";
	}
else {
	$painting_p = "";
	} 

if ($puppetry == "P") {
	$puppetry_p = " AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID 
	AND puppetry = \"$puppetry\" ";
	}
else {
	$puppetry_p = "";
	} 	

if ($asl == "A") {
	$asl_p = " AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID 
	AND asl = \"$asl\" ";
	}
else {
	$asl_p = "";
	} 	
		
	
if ($combat == "S") {
	$combat_p = " AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID 
	AND combat = \"$combat\" ";
	}
else {
	$combat_p = "";
	} 		

if ($shakes == "S") {
	$shakes_p = " AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID 
	AND shakes = \"$shakes\" ";
	}
else {
	$shakes_p = "";
	} 		

if ($cabaret == "C") {
	$cabaret_p = " AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID 
	AND cabaret = \"$cabaret\" ";
	}
else {
	$cabaret_p = "";
	} 		
	
if ($improv == "I") {
	$improv_p = " AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID 
	AND improv = \"$improv\" ";
	}
else {
	$improv_p = "";
	} 		
	
if ($mime == "M") {
	$mime_p = " AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID 
	AND mime = \"$mime\" ";
	}
else {
	$mime_p = "";
	} 		
	
if ($standup == "S") {
	$standup_p = " AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID 
	AND standup = \"$standup\" ";
	}
else {
	$standup_p = "";
	} 		
	


$sql_otherskills_end = "ORDER BY actor11.lastname ASC";

//concatenate the strings
$sql = $sql_otherskills_start . $acrobatics_p . $juggling_p . $puppetry_p . $asl_p . $painting_p . $combat_p . $shakes_p . $cabaret_p . $improv_p . $mime_p . $standup_p . $sql_otherskills_end;


//execute SQL query and get result

$sql_result = mysql_query($sql,$connection) or die("Couldn't execute input query.");

//test for all empty checkboxes, warn

	if ($acrobatics == "N" && $juggling == "N" && $puppetry == "N" && $asl == "N"
		&& $painting == "N" && $combat == "N"  && $shakes == "N" && 
		$cabaret == "N" && $improv == "N" && $mime == "N" && $standup == "N"
		) {
	echo "<p><b>Please check at least one skill.</b></p>";
	echo "<p><a href=\"otherskills_search.php\">Back</a></p>";
	exit;
}


//search results for other skills
echo "


<P align = \"center\">Please note: when you select a profile to review, it will open in a new window</p>

<table align = \"center\" cellspacing=\"1\" cellpadding=\"1\" width = \"80%\">
<tr>
<td align=\"center\"><H2>Search Results for Other Skills:</H2>
<B>Selected:</B> ";
	

//if test if variables are empty. Also assign Y/N values for table
$acrobatics2 = "";
$juggling2 = "";
$puppetry2 = "";
$asl2 = "";
$painting2 = "";
$combat2 = "";
$shakes2 = "";
$cabaret2 = "";
$improv2 = "";
$mime2 = "";
$standup2 = "";


//2011 code
//2013 code for showing selections for query
if($acrobatics != "N") {
	echo "<B>Acrobatics, </B>";
	}

if ($juggling != "N" ){
	echo "<B>Juggling, </B>";
	} 	

if ($puppetry != "N"){
	echo "<B>Puppetry, </B>";
	} 	

if ($asl != "N"){
	echo "<B>American Sign, </B>";
	} 	

if ($painting != "N"){
	echo "<B>Painting, </B>";
	} 	

if ($combat != "N"){
	echo "<B>Stage Combat, </B>";
	} 	

if ($shakes != "N"){
	echo "<B>Shakespeare, </B>";
	} 	

if ($cabaret != "N"){
	echo "<B>Cabaret, </B>";
	} 		
	
if ($improv != "N"){
	echo "<B>Improv, </B>";
	} 		
	
if ($mime != "N"){
	echo "<B>Mime, </B>";
	} 	

if ($standup != "N"){
	echo "<B>Standup Comedy </B>";
	} 		
	

echo "
	</td>
	</tr>
	</table>

";

//end of search items chosen

//set counter
$count = 0;	
		
//execute SQL query and get result
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute input query.");


//set heading for list

	echo "

	<table width = \"85%\" border=0 align=\"center\">
";
/*
	<tr>
	<th align=\"center\">Pix</th>
	<th align=\"center\">Name</th>
	<th align=\"center\">Acrobat</th>
	<th align=\"center\">Juggling</th>
	<th align=\"center\">Puppets</td>
	<th align=\"center\">ASL</th>
	<th align=\"center\">Paint</th>
	<th align=\"center\">Combat</th>
	<th align=\"center\">Shakes</th>
	<th align=\"center\">Cabaret</th>
	<th align=\"center\">Improv</th>
	<th align=\"center\">Mime</th>
	<th align=\"center\">Standup</th>	
	</tr>

*/



//format results under the control

	while($row = mysql_fetch_array($sql_result) ) {
	$actor_uid = $row["actor_uid"];
	$lastname = stripslashes($row["lastname"]);
	$firstname = stripslashes($row["firstname"]);
	$midname = stripslashes($row["midname"]);
	$pix_link = $row["pix_link"];
	$acrobatics = $row["acrobatics"];
	$juggling = $row["juggling"];
	$puppetry = $row["puppetry"];
	$asl = $row["asl"];
	$painting = $row["painting"];
	$combat = $row["combat"];
	$shakes = $row["shakes"];
	$cabaret = $row["cabaret"];
	$improv = $row["improv"];
	$mime = $row["mime"];
	$standup = $row["standup"];
	$new_item = $row["item"];
	$count++;
/*
echo "<BR>Acro: $acrobatics, Jugg: $juggling, Pupp:$puppetry, Asl: $asl, <BR>
Paint: $painting, Combat: $combat, ShakesP $shakes, Cab: $cabaret, Improv: $improv, Mime: $mime, 
Standup:$standup, New: $new_item<BR>";
*/	
	if(empty($lastname)) {
			echo "<H2>No Match Found: Please try again.</H2>";
			exit();
	}

	else {

	if($new_item == "AR") {
		
//format Y/N data - note variables are now info from the database !!!

if($acrobatics == "A"){
	$acrobatics2 = "Acrobatics";
	}
else { $acrobatics2 = "";}       
		
if ($juggling == "J") {
	$juggling2 = "Juggling";
	}
else {$juggling2 = "";}                     	

if ($puppetry == "P") {
	$puppetry2 = "Puppetry";
	}
else {$puppetry2 = "";}            	

if ($asl == "A"){
	$asl2 = "ASL";
	}
else {$asl2 = "";}     	

if ($painting == "P") {
	$painting2 = "Painting";
	} 	
else {$painting2 = "";}         
    
if ($combat == "S") {
	$combat2 = "Combat";
	} 	
else {$combat2 = "";}

if ($shakes == "S") {
	$shakes2 = "Shakespeare";
	}
else {$shakes2 = "";}

if ($cabaret  == "C") {
	$cabaret2 = "Cabaret";
	} 	
else {$cabaret2 = "";}

if ($improv == "I") {
	$improv2 = "Improv";
	}
else {$improv2 = "";}     	

if ($mime == "M") {
	$mime2 = "Mime";
	} 	
else {$mime2 = "";}

if ($standup == "S") {
	$standup2 = "Standup";
	} 	
else {$standup2 = "";}	
	echo "

	<tr>	<td align=\"left\"><IMG width=\"65\" SRC=\"ActorPix/$pix_link\">
            </td>
			<td><B>$lastname, $firstname $midname</B><BR> 
    ";        
            
    echo "            
    <form name=\"form1\" method=\"post\" action=\"actor_searchlastname1.php\" target=\"myNewWin\">
    <input type=\"hidden\" name=\"sel_record\" value=\"$actor_uid\">
    <input type=\"submit\" value=\"Select Profile\" name=\"submit\" onClick=\"sendme()\">
    </form>
    </td>

";
            
           
           echo "
			<td align=\"center\">$acrobatics2</td>
			<td  align=\"center\">$juggling2</td>
			<td  align=\"center\">$puppetry2</td>
			<td  align=\"center\">$asl2</td>
			<td  align=\"center\">$painting2</td>										
			<td align=\"center\">$combat2</td>
			<td align=\"center\">$shakes2</td>
			<td align=\"center\">$cabaret2</td>
			<td align=\"center\">$improv2</td>
			<td align=\"center\">$mime2</td>
			<td align=\"center\">$standup2</td>			
			<td>
";
/* - movning select to picture side
echo "			
	<form name=\"form1\" method=\"post\" action=\"actor_searchlastname1.php\" target=\"myNewWin\">
	<input type=\"hidden\" name=\"sel_record\" value=\"$actor_uid\">
	<input type=\"submit\" value=\"Select Profile\" name=\"submit\" onClick=\"sendme()\">
	</form></td>
    </tr>

";

---- end of blanking code */
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