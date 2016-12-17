<?php

$type_lastname = $_POST['type_lastname'];

echo "
<HTML>
<HEAD>
<TITLE>StrawHat Select Lastname for Theatre Application Change</TITLE>
<link rel=\"stylesheet\" href=\"theatre.css\" type=\"text/css\">
</HEAD>
<BODY BACKGROUND=\"Bk10a.GIF\">
";
include("banner.inc");

include("../../Comm/connect.inc");

//---------------------------------create sql statement
//add code to get select bar with added names



if(!$type_lastname) {
	echo "<H3 align = 'center'>
    No Last Name was entered. 
    <A HREF='thea_searchlastname.php'>Please go back to enter the Last Name.</A>
    </H3>";
	exit;
	}
	
//using addslashes twice to get correct result, do not know why!	
$type_lastname = addslashes(trim($type_lastname));
$type_lastname = addslashes($type_lastname);	

$sql = "SELECT thea_uid, lastname, firstname, midname
		FROM theatre11 
		WHERE lastname LIKE '$type_lastname'
		ORDER BY lastname ASC";

//execute SQL query and get result

$sql_result = mysql_query($sql,$connection) or die("Couldn't execute Theatre input query.");
//9/18/07 change form to go directly to changes07.php
echo "

<H2 align = 'center'>Select Your Name to Change Your Theatre Application</H1>

<FORM method=\"POST\" action=\"thea_entry2.php\">
<table cellspacing=5 cellpadding=5 align= 'center'>
<tr>
<td align = 'center'><strong>Theatre Representatives by Lastname:</strong></td>
<td valign = top align = 'center'>
<select name=\"sel_record\">

<option value=\"\"> -- Select Your Name -- </option>

";
	while ($row = mysql_fetch_array($sql_result) ) {
		$new_thea_uid = $row["thea_uid"];
		$new_lastname = $row["lastname"];
		$new_midname = $row["midname"];
		$new_firstname = $row["firstname"];

//remove slashes for selection bar		
		$new_lastname = stripslashes($new_lastname);
		$new_midname = stripslashes($new_midname);
		$new_firstname = stripslashes($new_firstname);

		if($new_midname) {
		echo "
			<option value=\"$new_thea_uid\">$new_lastname, $new_firstname $new_midname</option>
			";}
		else {
		echo "
			<option value=\"$new_thea_uid\">$new_lastname, $new_firstname</option>
			";}	
		
		
		
		}
echo "
	</select>
	</td>
	</tr>
	<tr colspan=\"2\" align = 'center'><td>
	<b>Please enter your Theatre username and password:</b></td>
	</tr>
	<tr>
		<td>Username: <input type=\"text\" name=\"u_entered\" size=\"15\" maxlength=\"15\"></td>
		<td>Password: <input type=\"PASSWORD\" name=\"p_entered\" size=\"14\" maxlength=\"14\"></td>
	</tr>
<p align= 'center'>If you forgot your password, go to <a href=\"pwd_searchnamereset.php\">Reset Username/Password</a>.
</p>	
	<tr>
	<td align = 'center' colspan = '2'>

	<input type = \"hidden\" name = \"thea_uid\" value = \"$thea_uid\">

	<INPUT type=\"submit\" value =\"Select Theatre\"></td>
	</tr>
	</table>
</form>	
";	

			if(empty($new_lastname)) {
			echo "<H3 align = 'center'>No Match Found: Please try again or use the other Last Name search.</H3>";
			};

echo "
</BODY>
</HTML>
";
?>