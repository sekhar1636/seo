<?php

//pwd_searchlastname.php 2012

include("banner.inc");

include("../../ActorEntry11/connect.inc");

echo "

<HTML>
<HEAD>
<TITLE>StrawHat Change Password</TITLE>
<link rel=\"stylesheet\" href=\"members.css\" type=\"text/css\">
</HEAD>
<BODY BACKGROUND=\"Bk10a.GIF\">
<H1>Please enter your lastname</H1>

<FORM method=\"POST\" action=\"pwd_searchlastname_input.php\">

	<table>

	<tr>
		<td>Actor Last Name:</td>
		<td><input type=\"text\" name=\"type_lastname\" size'\"30\"></td>
		<td><INPUT type=\"submit\" value =\"Select Actor\"></td>
	</tr>
	</table>
</form>

<p>Select your name in the following page.<p>	
</BODY>
</HTML>
";

