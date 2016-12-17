<?php
//skills_modifyrecord3.php 2005

//local site
if (!$skills_uid) {
	header("Location: http://localhost/Members05/admin_test/actors/skills_modifyrecord2.php");
	exit;
	}

//remote site
//check to see if (!$skills_uid)
// header("Location: http://www.strawhat-auditions.com/admin/skills_modifyrecord2.php");


//create connection
$connection = mysql_connect("127.0.0.1", "JayServer", "wombat") or die ("Couldn't connect to server.");

//select database
$db = mysql_select_db("mydata", $connection) or die("Couldn't select database.");

/*parse values for selected checkboxes
supress error msg by using isset() to test is variable exists - 
variables from checkboxes are not forwarded unless checked -
assign to those not checked to avoid errors and notices
---------------------------------------------------------*/

if(!isset($acrobatics)) {
	$acrobatics = NULL;
}
if (!isset($asl)){
	$asl = NULL;
}
if(!isset($juggling)) {
	$juggling = NULL;
}
if(!isset($painting)) {
	$painting = NULL;
}
if(!isset($puppetry)) {
	$puppetry = NULL;
}
if(!isset($combat)) {
	$combat = NULL;
}

//SQL statement to update record
$sql = "UPDATE skills05 SET skills_uid = \"$skills_uid\",
vocal=\"$vocal\",
ballet=\"$ballet\",
mus_thea=\"$mus_thea\",
ballroom=\"$ballroom\",
tap=\"$tap\",
swing=\"$swing\",
jazz=\"$jazz\",
perc=\"$perc\",
sax=\"$sax\",
banjo=\"$banjo\",
piano=\"$piano\",
drums=\"$drums\",
cello=\"$cello\",
clarinet=\"$clarinet\",
trombone=\"$trombone\",
trumpet=\"$trumpet\",
flute=\"$flute\",
violin=\"$violin\",
guitar=\"$guitar\",
set_design=\"$set_design\",
lights=\"$lights\",
costume=\"$costume\",
stagem=\"$stagem\",
box_office=\"$box_office\",
props=\"$props\",
acrobatics=\"$acrobatics\",
juggling=\"$juggling\",
puppetry=\"$puppetry\",
asl=\"$asl\",
painting=\"$painting\",
combat=\"$combat\"
WHERE skills_uid = \"$skills_uid\"
";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


if (!$sql_result) {
	echo "<P>Couldn't update record!</P>";
	} else {

echo "
<HTML>
<HEAD>
<TITLE>2005 Updated Skills Record</TITLE>
<link rel=\"stylesheet\" href=\"/Members05/admin_test/members.css\" type=\"text/css\">
</HEAD>
<BODY>
";
	include("navbar.inc");
	
echo "	
<h1>You have made these changes:</h1>
<FORM method = \"POST\" action = \"physical_modifyrecord3.php\">

	<table cellspacing=\"5\" cellpadding=\"5\">

	<tr>
	<td valign=top><strong>skills_uid:</strong></td>
	<td valign=top>$skills_uid</td>
	<td valign=top><strong>Vocal</strong></td>
	<td valign=top>$vocal</td>
	</tr>

	<tr>
	<td valign=top><strong>Dance:</strong></td>
	<td valign=top>Ballet: $ballet, Musical Thea: $mus_thea, Ballroom: $ballroom, Tap: $tap,
		Swing: $swing, Jazz: $jazz</td>
	<td valign=top><strong>Instruments:</strong></td>
	<td valign=top>Percussion: $perc, Sax: $sax, Banjo: $banjo, Piano: $piano, Drums: $drums,
		Cello: $cello, Clarinet: $clarinet, Trombone: $trombone, Trumpet: $trumpet, Flute: $flute,
		Violin: $violin, Guitar: $guitar</td>
	</tr>

	<tr>
	<td valign=top><strong>Other:</strong></td>
	<td valign=top>$acrobatics, $juggling, $puppetry, $asl,
		$painting, $combat</td>
	<td valign=top><strong>Technical Skills: </strong></td>
	<td valign=top>Sets: $set_design, Lighting: $lights, Costumes: $costume, SM: $stagem,
		Box Office: $box_office, Props: $props</td>
	</tr>
	
</table>
  
</FORM>
</BODY>
</HTML>
";
}
?>