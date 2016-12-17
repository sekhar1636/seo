<?php
//pwd_change for ACTOR!!
$actor_uid = $_POST['sel_record'];
$sel_record = $_POST['sel_record'];
//$actor_uid = $_POST['actor_uid'];
include("../../Comm/connect.inc");

if (!$actor_uid) {
	echo "<P>Couldn't find UID!</P>";
	} else {
$actor_uid = $sel_record;

//echo" $actor_uid, $sel_record";

echo "		
<HTML>
<HEAD>
<TITLE>StrawHat Actors Change Password</TITLE>
<link rel=\"stylesheet\" href=\"actors.css\" type=\"text/css\">
</HEAD>
<BODY>
";

//html for logo and strawhat banner
	include("banner.inc");


echo "

<table align=\"center\">
	<tr>	
    <td align = \"center\"> 
    <FORM method=\"POST\" action= \"/ActorEntry11/profile_change/changes.php\">
    <input type = \"hidden\" name = \"actor_uid\" value = \"$actor_uid\">
    <INPUT type=\"submit\" value =\"Back to Change Application Menu\">
    </FORM>
	
	<td align = \"center\">
	<FORM method=\"\" action=\"/index.php\">
	<input type=\"submit\" value=\"Leave Application (No Changes Recorded)\" name=\"endentry\">
	</form>
	</td>
	</tr>	
</table>

<H1 align = \"center\">Actor Change Password:</H1>
<FORM method=\"POST\" action=\"pwd_change2.php\">
<input type = \"hidden\" name = \"actor_uid\" value = \"$actor_uid\">
<input type = \"hidden\" name = \"thea_uid\" value = \"$thea_uid\">

<table cellspacing='5' cellpadding='5' align = \"center\">	
	<tr>
	<td><b>Please enter a new username (limit to 10 characters/numbers):</b></td>
	<td>Username: <input type=\"text\" name=\"u_entered\" size=\"10\" maxlength=\"10\"></td>
	</tr>
	
	<tr>
		<td><b>Please enter your new password: (limit to 10 characters/numbers)</b></td>
		<td>Password: <input type=\"PASSWORD\" name=\"p_entered\" size=\"10\" maxlength=\"10\"></td>
		
	</tr>
	<tr>
		<td><b>Re-enter your new password:</b></td>
		<td>Password: <input type=\"PASSWORD\" name=\"p_entered2\" size=\"10\" maxlength=\"10\"></td>
		
	</tr>
	
	<tr>
		<td><b>Enter a hint for the password: (limit to 25 characters/numbers)</b></td>
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