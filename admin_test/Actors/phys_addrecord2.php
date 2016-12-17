<?php

	if ((!$phys_uid)) {
	header("Location: http://localhost/Members05/admin_test/actor/phys_addrecord2a.php");
	exit;
}

?>

<!-- <DOCTYPE HTML PUBLIC "-//W3C/DTD HTML 3.2//EN"> -->
<HTML>
<HEAD>
<TITLE>Adding 2005 Physical Record</TITLE>
</HEAD>
<BODY>

<?php
/*parse values for selected checkboxes
supress error msg by using isset() to test is variable exists - 
variables from checkboxes are not forwarded unless checked -
assign to those not checked to avoid errors and notices
---------------------------------------------------------*/

if(!isset($nativeam)) {
	$nativeam = NULL;
}
if (!isset($asian)){
	$asian = NULL;
}
if(!isset($white)) {
	$white = NULL;
}
if(!isset($black)) {
	$black = NULL;
}
if(!isset($hispanic)) {
	$hispanic = NULL;
}
if(!isset($eeurope)) {
	$eeurope = NULL;
}
if(!isset($mideast)) {
	$mideast = NULL;
}

if(!isset($indian)) {
	$indian = NULL;
}

//add LOCK TABLES to prevent crashes from others using server?
	
	$sql = "INSERT INTO physical05 (phys_uid, height, weight, eye, hair, age_range, nativeam, asian, white, black, hispanic, eeurope, mideast, indian) 
	VALUES ('$phys_uid', '$height', '$weight', '$eye', '$hair', '$age_range', '$nativeam', '$asian', '$white', '$black', '$hispanic', '$eeurope', '$mideast', '$indian')";
	
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
	include ("navbar.inc");
echo "	
	<table cellspacing=5 cellpadding=5>

	<tr>
	<td valign=top><strong>phys_uid:</strong></td>
	<td valign=top>$phys_uid</td>
	<td valign=top><strong> </strong></td>
	<td valign=top> </td>
	</tr>

	<tr>
	<td valign=top><strong>Height:</strong></td>
	<td valign=top>$height</td>
	<td valign=top><strong>Weight:</strong></td>
	<td valign=top>$weight</td>
	</tr>

	<tr>
	<td valign=top><strong>Hair and Eye:</strong></td>
	<td valign=top>$hair, $eye</td>
	<td valign=top><strong>Age Range and Role Type</strong></td>
	<td valign=top>$age_range, $type</td>
	</tr>

	<tr>
	<td valign=top><strong>Role Type:</strong></td>
	<td valign=top>$nativeam $asian $white $black $hispanic $eeurope $mideast $indian</td>
	<td colspan = \"2\" valign=top> </td>
	</tr>
	
	
</table>

<table>	
<tr>
<td width=\"200\">
		
</td>
<td width=\"200\">
	<a href=\"add_physical04.htm\">Add another Physical Record</a>

<td width=\"200\">
	<a href=\"../admin_menu05.htm\">Back to Main Menu</a>
</td>
</tr>
</table>

";
}
?>

</BODY>
</HTML>
