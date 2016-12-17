<?php
/*
	if ((!$firstname)) {
	header("Location: http://localhost/Members10/admin_test/tech/add_techie.htm");
	exit;
}
*/
?>

<!-- <DOCTYPE HTML PUBLIC "-//W3C/DTD HTML 3.2//EN"> -->
<HTML>
<HEAD>
<TITLE>StrawHat 2011 Add Techie Record</TITLE>
</HEAD>
<BODY>

<?php
//parse lastname.firstname.pdf link
trim($lastname);
trim($firstname);

$newresume = $lastname . "_" . $firstname . ".pdf";
$resume = strtolower($newresume);

//was using this for parsing to database, save for further reference
//parse lastname.firstname.mp3
//if ($audio == 'Y') {
//		for ($index=0; $index < 3; $index++)
//		{
//		$arraysong[$index] = strtolower($lastname) . "_" . strtolower($firstname) . strtolower($index + 1) . ".mp3";
//		}
//	$song1 = $arraysong[0];
//	$song2 = $arraysong[1];
//	$song3 = $arraysong[2];	
//}	


//addslashes
$lastname = addslashes(trim($lastname) );
$firstname = addslashes(trim($firstname) );
$other = addslashes(trim($other) );
$title1 = addslashes(trim($title1) );
$title2 = addslashes(trim($title2) );
$title3 = addslashes(trim($title3) );

	$sql = "INSERT INTO techies11 (firstname, lastname, job1, job2, other, resume, entered, portfolio, title1, title2, title3, audio) VALUES
	('$firstname', '$lastname', '$job1', '$job2', '$other', '$resume', NULL, '$portfolio', '$title1', '$title2', '$title3', '$audio')";

//create connection
include("../connect.inc");


//execute SQL query and get result
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");

	if (!$sql_result) {
	echo "<P>Couldn't add record!</P>";
	} else {
	echo "
	<P>Record added!</P>

	<table cellspacing=5 cellpadding=5>

	<tr>
	<td valign=top><strong>First Name:</strong></td>
	<td valign=top>$firstname</td>
	<td valign=top><strong>Last Name:</strong></td>
	<td valign=top>$lastname</td>
	</tr>

	<tr>
	<td valign=top><strong>Job1:</strong></td>
	<td valign=top>$job1</td>
	<td valign=top><strong>Job2:</strong></td>
	<td valign=top>$job2</td>
	</tr>
	
	<tr>
	<td valign=top><strong>Other:</strong></td>
	<td valign=top>$other</td>
	<td valign=top><strong>Resume:</strong></td>
	<td valign=top>$resume</td>
	</tr>
	
	<tr>
	<td valign=top><strong>Portfolio:</strong></td>
	<td valign=top>$portfolio</td>
	<td valign=top></td>
	<td valign=top></td>
	</tr>
	
	<tr>
	<td valign=top><strong>Title1:</strong></td>
	<td colspan=3 valign=top>$title1</td>
	</tr>
	
	<tr>
	<td valign=top><strong>Title2:</strong></td>
	<td colspan=3 valign=top>$title2</td>
	</tr>
	
	<tr>
	<td valign=top><strong>Title3:</strong></td>
	<td colspan=3 valign=top>$title3</td>
	</tr>

//add audio and songs

<tr>
	<td valign=top><strong>Audio:</strong></td>
	<td valign=top>$audio</td>
	<td valign=top></td>
	<td valign=top></td>
	</tr>
	
	</table>
<table>	
<tr>
<td width=\"200\">
		
</td>
<td width=\"200\">
	<a href=\"add_techie.htm\">Add another Techie</a>

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
