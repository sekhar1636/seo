<?php

$type_lastname = $_POST['type_lastname'];

echo "
<HTML>
<HEAD>
<TITLE>StrawHat Select Lastname for Actor Application Change</TITLE>
<link rel=\"stylesheet\" href=\"actors.css\" type=\"text/css\">
</HEAD>
<BODY BACKGROUND=\"../Bk10a.GIF\">
";
include("banner.inc");

include("../../Comm/connect.inc");

//---------------------------------create sql statement
//add code to get select bar with added names



if(!$type_lastname) {
	echo "<p align=\"center\">
    <a href = http://localhost/ActorEntry11/profile_change/actor_searchlastname.php>
    No Last Name was entered. Please go back to enter the Last Name.</p><a/>
    "; 
    echo ".</p>";
	exit;
	}
	
//using addslashes twice to get correct result, do not know why!	
$type_lastname = addslashes(trim($type_lastname));
$type_lastname = addslashes($type_lastname);	

$sql = "SELECT actor_uid, lastname, firstname, midname
		FROM actor11 
		WHERE lastname LIKE '$type_lastname'
		ORDER BY lastname ASC";

//execute SQL query and get result

$sql_result = mysql_query($sql,$connection) or die("Couldn't execute input query.");
//9/18/07 change form to go directly to changes07.php
echo "

<H2 align = \"center\">Select Your Name to Change Your Actor Application</H2>

<FORM method=\"POST\" action=\"actor_entry2.php\">
<table cellspacing = 5 cellpadding=5  align = \"center\">
<tr>
<td><strong>Select your Name:</strong></td>
<td valign = top>
<select name=\"sel_record\">

<option value=\"\"> -- Select Your Name -- </option>

";
	while ($row = mysql_fetch_array($sql_result) ) {
		$new_actor_uid = $row["actor_uid"];
		$new_lastname = $row["lastname"];
		$new_midname = $row["midname"];
		$new_firstname = $row["firstname"];

//remove slashes for selection bar		
		$new_lastname = stripslashes($new_lastname);
		$new_midname = stripslashes($new_midname);
		$new_firstname = stripslashes($new_firstname);

		if($new_midname) {
		echo "
			<option value=\"$new_actor_uid\">$new_lastname, $new_firstname $new_midname</option>
			";}
		else {
		echo "
			<option value=\"$new_actor_uid\">$new_lastname, $new_firstname</option>
			";}	
		
		
		
		}
echo "
	</select>
	</td>
	</tr>
	<tr colspan=\"2\" align = \"center\"><td>
	<b>Please enter your username and password:</b></td>
	</tr>
	<tr>
		<td>Username: <input type=\"text\" name=\"u_entered\" size=\"10\" maxlength=\"10\"></td>
		<td>Password: <input type=\"PASSWORD\" name=\"p_entered\" size=\"10\" maxlength=\"10\"></td>
	</tr>
<p align = \"center\">If you forgot your password, go to <a href=\"pwd_searchnamereset.php\">Reset Username/Password</a>.
</p>	
	<tr>
	<td align = \"center\" colspan=2>

	<input type = \"hidden\" name = \"actor_uid\" value = \"$actor_uid\">

	<INPUT type=\"submit\" value =\"Select Actor\"></td>
	</tr>
	</table>
</form>	
";	

			if(empty($new_lastname)) {
			echo "
            <a href = http://localhost/ActorEntry11/profile_change/actor_searchlastname.php>
            <H3 align = \"center\">No Match Found: Go back and check your last name.</H3>            
";
			};

echo "
</BODY>
</HTML>
";
?>