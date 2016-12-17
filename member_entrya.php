<?php
//member_entrya.php

include("../Comm/connect.inc");
include("banner.inc");

echo "

<HTML>
<HEAD>
<TITLE>StrawHat StrawHat Auditions Member Entry</TITLE>
<link rel=\"stylesheet\" href=\"/styles/members.css\" type=\"text/css\">
</HEAD>
<BODY BACKGROUND=\"../graphics03/Bk10a.GIF\">
<H1>Please enter your lastname to access the StrawHat Members Area</H1>
";


echo "


<FORM method=\"POST\" action=\"/Members11/member_entryb.php\">

	<table align = \"left\">

	<tr>
		<td><b>Actors and Theatres</b>, please enter your <b>last name</b> here:</td>
		
		<td><input type=\"text\" name=\"type_lastname\" size = \"30\"></td>
		<td><INPUT type=\"submit\" value =\"Select Actor, Theatre\"></td>
	</tr>
	
	<tr>
		<td><BR><BR><B>Staff/Tech/Design</b>, please enter your <b>last name</b> here:</td>
		
		<td><BR><BR></b><input type=\"text\" name=\"tech_lastname\" size = \"30\"></td>
		<td><BR><BR><INPUT type=\"submit\" value =\"Select Staff Tech Design\"></td>
	</tr>
	</table>
</form>
	
</BODY>
</HTML>

";

?>