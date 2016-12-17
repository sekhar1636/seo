<?php

	if ((!$skills_uid)) {
	header("Location: http://localhost/Members05/admin_test/actor/add_skills04.php");
	exit;
}

?>

<!-- <DOCTYPE HTML PUBLIC "-//W3C/DTD HTML 3.2//EN"> -->
<HTML>
<HEAD>
<TITLE>Adding record to 2005 Skills table</TITLE>
</HEAD>
<BODY>

<?php
/*parse values for selected checkboxes
supress error msg by using isset() to test is variable exists - 
variables from checkboxes are not forwarded unless checked -
assign to those not checked to avoid errors and notices
---------------------------------------------------------*/

if(!isset($acrobatics)) {
	$acrobatics = NULL;
}
if (!isset($juggling)){
	$juggling = NULL;
}
if(!isset($puppetry)) {
	$puppetry = NULL;
}
if(!isset($asl)) {
	$u_aftra = NULL;
}
if(!isset($asl)) {
	$asl = NULL;
}
if(!isset($painting)) {
	$painting = NULL;
}
if(!isset($combat)) {
	$combat = NULL;
}


	$sql = "INSERT INTO skills05 (skills_uid, vocal, ballet, mus_thea, ballroom, tap, swing, jazz, perc, sax, banjo, piano, drums, 
		cello, clarinet, trombone, trumpet, acrobatics, juggling, puppetry, asl, painting,
		combat, flute, violin, guitar, set_design, lights, costume, stagem, box_office, props)
	VALUES ('$skills_uid', '$vocal', '$ballet', '$mus_thea', '$ballroom', '$tap', '$swing', '$jazz', '$perc', '$sax', '$banjo', '$piano', '$drums', 
		'$cello', '$clarinet', '$trombone', '$trumpet', '$acrobatics', '$juggling', '$puppetry', '$asl', '$painting',
		'$combat', '$flute', '$violin', '$guitar', '$set_design', '$lights', '$costume', '$stagem', '$box_office', '$props')";

//create connection
//substitute your own hostname, username and password

$connection = mysql_connect("127.0.0.1", "JayServer", "wombat") or die ("Couldn't connect to server.");

//select database

$db = mysql_select_db("mydata", $connection) or die("Couldn't select database.");

//execute SQL query and get result
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");

	if (!$sql_result) {
	echo "<P>Couldn't add record!</P>";
	} else {
	echo "
	<P>Record added!</P>
";
	include("navbar.inc");
	
echo "	
<FORM method=\"POST\" action=\"roles_addrecord1a.php\">
<input type = \"hidden\" name = \"uid\" value = \"$skills_uid\">
<input type=\"submit\" value=\"Add Roles\" name=\"submit\">
</form>	
	
	<table cellspacing=5 cellpadding=5>

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

<table>	
<tr>
<td width=\"200\">
		
</td>
<td width=\"200\">
	<a href=\"add_skills04.htm\">Add another Skills Record</a>

<td width=\"200\">
	<a href=\"../admin_menu05.htm\">Back to Main Menu</a>
</td>
</tr>
</table>
</BODY>
</HTML>

";
}
?>

