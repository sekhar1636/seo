<?php
include("../session.inc");
?>


<?php

echo "
<HTML>
<HEAD>
<TITLE>StawHat Actor Search by Show or Role</TITLE>
<link rel=\"stylesheet\" href=\"/styles/members.css\" type=\"text/css\">
</HEAD>
<BODY BACKGROUND=\"../../graphics03/Bk10a.GIF\"><script src=\"navbar.js\"></script>
<H3 align = \"center\">Please Enter the Show and/or Role to be Searched:</H3>
<FORM method=\"POST\" action=\"/Members11/Actors/roleshow_search1.php\">
	<table align = \"center\">
	<tr>
		<td><b>Role: <b></td>
		<td><input type=\"text\" name=\"role\" size=\"30\"></td>
		<td><b>Show: <b></td>
		<td><input type=\"text\" name=\"show\" size=\"30\"></td>
		<td><INPUT type=\"submit\" value =\"Select\"></td>
	</tr>
	</table>
</form>
<p align = \"center\">Use this search to find partilar roles or shows. You can enter a role, a show or both.<BR><BR>
The resulting search will show results in the selection bar - with the names linked to their actor profiles.
<p>	
	
</BODY>
</HTML>
";

?>