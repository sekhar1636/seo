<?php

$type_lastname = $_POST['type_lastname'];
$tech_lastname = $_POST['tech_lastname'];

echo "
<HTML>
<HEAD>
<TITLE>StrawHat Search by Lastname Input</TITLE>
<link rel=\"stylesheet\" href=\"/styles/members.css\" type=\"text/css\">
</HEAD>
<BODY BACKGROUND=\"Bk10a.GIF\">

";

include("../Comm/connect.inc");

//---------------------------------create sql statement
//add code to get select bar with added names
//doing 2 addslashes, don't know why!!

//$type_lastname = trim($type_lastname);
//$type_lastname = addslashes($type_lastname);

//old code
//$type_lastname = addslashes(trim($type_lastname));
//$type_lastname = trim($type_lastname);
//$type_lastname=addslashes($type_lastname);

//tech members entry
$tech_lastname = addslashes(trim($tech_lastname));
//$tech_lastname = trim($tech_lastname);
$tech_lastname=addslashes($tech_lastname);


if(!$type_lastname && !$tech_lastname) {
	include("banner.inc");
	echo "<P><b>No Last Name was entered in Actors or Staff Tech Entry.</b><br><br> <a href=\"member_entrya.php\">Please go back</a> to enter the Last Name</p>";
	exit;
	}
	
if($type_lastname && $tech_lastname) {
	include("banner.inc");
	echo "<P><b>Please do not enter your lastname in both The Actor and Staff Tech Entry.
	</b><br><br><a href=\"member_entrya.php\">Please go back</a> to enter your Last Name in either the Actor or Staff Tech Entry.</p>";
	exit;
	}
	

if($type_lastname) {
// search checks that actor has paid registration fee IS THIS RIGHT??
$sql = "SELECT actor_uid, lastname, firstname, midname, app_type
		FROM actor11
		WHERE lastname LIKE '$type_lastname'
		ORDER BY lastname ASC";

}

if($tech_lastname) {
// search checks that actor has paid registration fee IS THIS RIGHT??
$sql = "SELECT tech_uid, lastname, firstname, midname, app_type
		FROM techies11
		WHERE lastname LIKE '$tech_lastname'
		ORDER BY lastname ASC";

}


//execute SQL query and get result

$sql_result = mysql_query($sql,$connection) or die("Couldn't execute input query.");

//html for logo and strawhat banner
	include("banner.inc");
	
/*
echo "
<H1>Select Lastname Search Results</H1>
<FORM method=\"POST\" action=\"/Members11/member_entry2.php\">
<!-- <INPUT type=\"hidden\" value = \"$type_lastname\"> -->

<table cellspacing=5 cellpadding=5>
<tr>
";
*/
//for actor entry
if($type_lastname) {
	echo " 
	<H1>Select Lastname Search Results for Actors</H1>
<FORM method=\"POST\" action=\"/Members11/member_entry2a.php\">
<!-- <INPUT type=\"hidden\" value = \"app_type\"> -->

<table cellspacing=5 cellpadding=5>
<tr>
	<td align=left><strong>Lastname:</strong><td>
<td valign = top>
<select name=\"sel_record\">

<option value=\"\"> -- Select Actor Lastname -- </option>";
	
	while ($row = mysql_fetch_array($sql_result) ) {
		$new_actor_uid = $row["actor_uid"];
		$new_lastname = stripslashes($row["lastname"]);	
		$new_firstname = stripslashes($row["firstname"]);
		$new_midname = stripslashes($row["midname"]);
		$app_type = stripslashes($row["app_type"]);
		echo "
			<option value=\"$new_actor_uid\">$new_lastname, $new_firstname $new_midname</option>
			";
		}
}

//for techies entry
if($tech_lastname) {
	echo "
	<H1>Select Lastname Search Results for Staff/Tech/Design</H1>
<FORM method=\"POST\" action=\"/Members11/member_entry2t.php\">
<!-- <INPUT type=\"hidden\" value = \"app_type\"> -->

<table cellspacing=5 cellpadding=5>
<tr>
	<td align=left><strong>Lastname:</strong><td>
<td valign = top>
<select name=\"sel_record\">
	

<option value=\"\"> -- Select Tech Lastname -- </option>";
	
	while ($row = mysql_fetch_array($sql_result) ) {
		$new_tech_uid = $row["tech_uid"];
		$new_lastname = stripslashes($row["lastname"]);	
		$new_firstname = stripslashes($row["firstname"]);
		$new_midname = stripslashes($row["midname"]);
		$tech_app_type = stripslashes($row["app_type"]);

		echo "
			<option value=\"$new_tech_uid\">$new_lastname, $new_firstname $new_midname</option>
			";
		}
}

echo "
	</select>
	</td>
	</tr>
		</tr>
	</table>
";
	
if(empty($new_lastname)) {
			echo "<P>No Match Found: <a href=\"member_entrya.php\">Please go back</a> and try again.</P>";
			}	

			
else {			
echo "	

<table>
<tr colspan=\"2\" align=center><td>
	<b>Please enter your username and password:</b></td>
	</tr>
	<tr>
		<td>Username: <input type=\"text\" name=\"u_entered\" size=\"9\" maxlength=\"9\"></td>
		<td>Password: <input type=\"PASSWORD\" name=\"p_entered\" size=\"9\" maxlength=\"9\"></td>
	
	</tr>
	<tr>
	<td align = center colspan=2><INPUT type=\"submit\" value =\"Enter Member Area\"></td>
	</tr>
	
	</table>
	
</form>	
";	

			if(empty($new_lastname)) {
			echo "<H3>No Match Found: Please try again.</H3>";
			};
}
echo "
</BODY>
</HTML>
";
?>