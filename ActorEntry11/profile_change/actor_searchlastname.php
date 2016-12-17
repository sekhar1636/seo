<?php

//actor_searchlastname.php 2012
//for entry into change actor application

include("banner.inc");

include("../../Comm/connect.inc");

echo "

<HTML>
<HEAD>
<TITLE>StrawHat Change Actor Application</TITLE>
<link rel=\"stylesheet\" href=\"members.css\" type=\"text/css\">
</HEAD>
<BODY background = \"Bk10a.GIF\">
<H1 align = \"center\">Please enter your lastname</H1>

<FORM method=\"POST\" action=\"actor_searchlastname_input.php\">

	<table align = \"center\">

	<tr>
		<td>Actor Last Name:</td>
		<td><input type=\"text\" name=\"type_lastname\" size'\"30\"></td>
		<td><INPUT type=\"submit\" value =\"Select Actor\"></td>
	</tr>
	</table>
</form>

<p align = \"center\">Select your name in the following page.<p>	
</BODY>
</HTML>
";

