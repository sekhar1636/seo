<?php

	if ((!$firstname)) {
	header("Location: http://localhost/Members05/admin_test/actor/add_actor04.htm");
	exit;
}

?>

<!-- <DOCTYPE HTML PUBLIC "-//W3C/DTD HTML 3.2//EN"> -->
<HTML>
<HEAD>
<TITLE>Adding record to 2005 Actor table</TITLE>
<link rel=\"stylesheet\" href=\"members.css\" type=\"text/css\">
</HEAD>
<BODY>

<?php
//parse lastname.firstname.pdf link for resume
$newresume = $lastname . "_" . $firstname . ".pdf";
$resume_link = strtolower($newresume);

//parse lastname.firstname.jpg link for picture
$newpix = $lastname . "_" . $firstname . ".jpg";
$pix_link = strtolower($newpix);

/*parse values for selected checkboxes
supress error msg by using isset() to test is variable exists - 
variables from checkboxes are not forwarded unless checked -
assign to those not checked to avoid errors and notices
---------------------------------------------------------*/

if(!isset($u_none)) {
	$u_none = NULL;
}
if (!isset($u_emc)){
	$u_emc = NULL;
}
if(!isset($u_sag)) {
	$u_sag = NULL;
}
if(!isset($u_aftra)) {
	$u_aftra = NULL;
}
if(!isset($u_agva)) {
	$u_agva = NULL;
}
if(!isset($u_agma)) {
	$u_agma = NULL;
}

/* ----------------------Another approach to parsing
$arrayunion[0] = $u_none;
$arrayunion[1] = $u_emc;
$arrayunion[2] = $u_sag;
$arrayunion[3] = $u_aftra;
$arrayunion[4] = $u_agva;
$arrayunion[5] = $u_agma;

		for ($index=0; $index < 5; $index++) {
			if ($arrayunion[$index]=="") {
				$arrayunion[$index] = NULL;
				}
			}
-----------------------------------------------------*/

	$sql = "INSERT INTO actor05 (firstname, midname, lastname, date_entered, region, phone, email, large_city, intern, apprentice, availfor, availto, h_or_serv, pix_link, resume_link, gender, singing, u_none, u_emc, u_sag, u_aftra, u_agva, u_agma) 
	VALUES ('$firstname', '$midname', '$lastname', NULL, '$region', '$phone', '$email', '$large_city', '$intern', '$apprentice', '$availfor', '$availto', '$h_or_serv', '$pix_link', '$resume_link', '$gender', '$singing', '$u_none', '$u_emc', '$u_sag', '$u_aftra', '$u_agva', '$u_agma')";

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


	<table cellspacing=5 cellpadding=5>

	<tr>
	<td valign=top><strong>First Name, Mid:</strong></td>
	<td valign=top>$firstname $midname</td>
	<td valign=top><strong>Last Name:</strong></td>
	<td valign=top>$lastname</td>
	</tr>

	<tr>
	<td valign=top><strong>Email:</strong></td>
	<td valign=top>$email</td>
	<td valign=top><strong>Phone:</strong></td>
	<td valign=top>($h_or_serv) $phone</td>
	</tr>

	<tr>
	<td valign=top><strong>Gender:</strong></td>
	<td valign=top>$gender</td>
	<td valign=top><strong>Singing:</strong></td>
	<td valign=top>$singing</td>
	</tr>

	
	<tr>
	<td valign=top><strong>Union:</strong></td>
	<td valign=top> </td>
	<td valign=top> </td>
	<td valign=top> </td>
	</tr>
	
	<tr>
	<td valign=top><strong>Large City:</strong></td>
	<td valign=top>$large_city</td>
	<td valign=top><strong>Region:</strong></td>
	<td valign=top>$region</td>
	</tr>
	
	<tr>
	<td valign=top><strong>Resume Link:</strong></td>
	<td valign=top>$resume_link</td>
	<td valign=top><strong>Pix Link:</strong></td>
	<td valign=top>$pix_link</td>
	</tr>

	<tr>
	<td valign=top><strong>Available From:</strong></td>
	<td valign=top>$availfor</td>
	<td valign=top><strong>Available To:</strong></td>
	<td valign=top>$availto</td>
	</tr>
		
	</table>
<table>	
<tr>
<td width=\"200\">
		
</td>
<td width=\"200\">
	<a href=\"add_actor04a.htm\">Add another Actor</a>

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
