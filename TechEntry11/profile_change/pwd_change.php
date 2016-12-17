<?php
//pwd_change FOR TECH!!!!
$sel_record = $_POST['sel_record'];

include("../../Comm/connect.inc");

if (!$sel_record) {
	echo "<P>Couldn't find UID!</P>";
	} else {
$tech_uid = $sel_record;


echo "		

<HTML>
<HEAD>
<TITLE>StrawHat Staff Tech Design: Change Password</TITLE>
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
    <FORM method=\"POST\" action= \"/TechEntry11/profile_change/changes.php\">
    <input type = \"hidden\" name = \"tech_uid\" value = \"$tech_uid\">
    <INPUT type=\"submit\" value =\"Back to Change Application Menu\">
    </FORM>    
    </td>
    </tr>    
</table>
";    


echo "

<H3 align = 'center'>Staff Tech Design Change Password:</H3>
<FORM method=\"POST\" action=\"pwd_change2.php\">
<input type = \"hidden\" name = \"tech_uid\" value = \"$tech_uid\">

<table cellspacing=5 cellpadding=5 align = 'center'>	
	<tr>
	<td><b>Please enter a new username:</b></td>
	<td>Username: <input type=\"text\" name=\"u_entered\" size=\"9\" maxlength=\"9\"></td>
	</tr>
	
	<tr>
		<td><b>Please enter your new password:</b></td>
		<td>Password: <input type=\"PASSWORD\" name=\"p_entered\" size=\"9\" maxlength=\"9\"></td>
		
	</tr>
	<tr>
		<td><b>Re-enter your new password:</b></td>
		<td>Password: <input type=\"PASSWORD\" name=\"p_entered2\" size=\"9\" maxlength=\"9\"></td>
		
	</tr>
	
	<tr>
		<td><b>Enter a hint for the password:</b></td>
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