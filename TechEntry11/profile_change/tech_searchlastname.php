<?php

//tech_searchlastname.php 2012
//for entry into change tech application

include("banner.inc");

include("../../Comm/connect.inc");

echo "

<HTML>
<HEAD>
<TITLE>StrawHat Change Staff Tech Design Application</TITLE>
<link rel=\"stylesheet\" href=\"members.css\" type=\"text/css\">
</HEAD>
<BODY background=\"Bk10a.GIF\">
<H1 align = \"center\">Please enter your lastname</H1>

<FORM method=\"POST\" action=\"tech_searchlastname_input.php\">

	<table align = \"center\">

	<tr>
		<td>Staff Tech Design Last Name:</td>
		<td><input type=\"text\" name=\"type_lastname\" size'\"30\"></td>
		<td><INPUT type=\"submit\" value =\"Select Lastname\"></td>
	</tr>
	</table>
</form>

<p align = 'center'>Select your name in the following page.<p>	
</BODY>
</HTML>
";

