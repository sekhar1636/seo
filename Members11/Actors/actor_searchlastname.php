<?php
include("../session.inc");
?>

<?php

include("../../Comm/connect.inc");

echo "

<HTML>
<HEAD>
<TITLE>StrawHat Search Actor by Last Name</TITLE>
<link rel=\"stylesheet\" href=\"/styles/members.css\" type=\"text/css\">
</HEAD>
<BODY BACKGROUND=\"../../graphics03/Bk10a.GIF\"><script src=\"navbar.js\"></script>
<H1 align = \"center\">Select Lastname from the Actor Database</H1>

<FORM method=\"POST\" action=\"/Members11/Actors/actor_searchlastname_input.php\">

	<table align = \"center\">

	<tr>
		<td>Please type your last name:</td>
		<td><input type=\"text\" name=\"type_lastname\" size'\"30\"></td>
		<td><INPUT type=\"submit\" value =\"Select Actor\"></td>
	</tr>
	
	</table>
</form>


<p align = \"center\">Use this search to find an actor by lastname. <BR>
 The results will show in the in the selection bar - selecting an actor takes you to his/her profile, picture and resume.</p>	
</BODY>
</HTML>

";

?>