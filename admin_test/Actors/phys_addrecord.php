<?php

	if ((!$phys_uid)) {
	header("Location: http://localhost/Members04/admin_test/actor/add_physical04.htm");
	exit;
}

?>

<!-- <DOCTYPE HTML PUBLIC "-//W3C/DTD HTML 3.2//EN"> -->
<HTML>
<HEAD>
<TITLE>Adding record to Physical table</TITLE>
</HEAD>
<BODY>

<?php
//add LOCK TABLES to prevent crashes from others using server?
	
	$sql = "INSERT INTO physical (phys_uid, height, weight, eye, hair, age_range, type) 
	VALUES ('$phys_uid', '$height', '$weight', '$eye', '$hair', '$age_range', '$type')";
	
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
	
</table>

<table>	
<tr>
<td width=\"200\">
		
</td>
<td width=\"200\">
	<a href=\"add_physical04.htm\">Add another Physical Record</a>

<td width=\"200\">
	<a href=\"../admin_menu.htm\">Back to Main Menu</a>
</td>
</tr>
</table>

";
}
?>

</BODY>
</HTML>
