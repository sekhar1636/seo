<?php
//pwd_change
$sel_record = $_POST['sel_record'];

//$thea_uid = $_POST['thea_uid'];
//echo "$thea_uid";

include("../../Comm/connect.inc");

if (!$sel_record) {
	echo "<P>Couldn't find UID!</P>";
	} else {
$thea_uid = $sel_record;


echo "		

<HTML>
<HEAD>
<TITLE>StrawHat Theatre Application: Change Password</TITLE>
<link rel=\"stylesheet\" href=\"members.css\" type=\"text/css\">
</HEAD>
<BODY>
";

//html for logo and strawhat banner
	include("banner.inc");


echo "

<table align=\"center\">
	<tr>
	<td align = \"center\"> 
	<FORM method=\"POST\" action= \"/TheatreEntry11/profile_change/changes.php\">
	<input type = \"hidden\" name = \"thea_uid\" value = \"$thea_uid\">
	<INPUT type=\"submit\" value =\"Back to Change Theatre Application Menu\">
	</FORM>	
	</td>

	
	<td align = \"center\">
	<FORM method=\"\" action=\"/index.php\">
	<input type=\"submit\" value=\"Leave Theatre Application (No Changes Recorded)\" name=\"endentry\">
	</form>
	</td>
	</tr>	
</table>

<H1 align = 'center'>Theatre Change Password:</H1>
<FORM method=\"POST\" action=\"pwd_change2.php\">
<input type = \"hidden\" name = \"thea_uid\" value = \"$thea_uid\">

<table cellspacing='5' cellpadding='5' align = 'center'>	
	<tr>
	<td><b>Please enter a new username: </b>(no more than 11 characters)</td>
	<td>Username: <input type=\"text\" name=\"u_entered\" size=\"11\" maxlength=\"11\"></td>
	</tr>
	
	<tr>
		<td><b>Please enter your new password: </b>(no more than 9 characters)</td>
		<td>Password: <input type=\"PASSWORD\" name=\"p_entered\" size=\"9\" maxlength=\"9\"></td>
		
	</tr>
	<tr>
		<td><b>Re-enter your new password:</b> (no more than 9 characters)</td>
		<td>Password: <input type=\"PASSWORD\" name=\"p_entered2\" size=\"9\" maxlength=\"9\"></td>
		
	</tr>
	
	<tr>
		<td><b>Enter a hint for the password: </b>(no more than 25 characters)</td>
		<td>Password: <input type=\"text\" name=\"p_hint\" size=\"25\" maxlength=\"25\"></td>
		
	</tr>
	
	
	<tr>
	<td align = center colspan=2><INPUT type=\"submit\" value =\"Change Password\"></td>
	</tr>
	
	</table>
	
</FORM>	
</BODY>
</HTML>
";
}
?>