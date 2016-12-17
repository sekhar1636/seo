<?php

//thea_searchlastname.php 2012
//for entry into change theatre application

include("banner.inc");

include("../../Comm/connect.inc");

echo "

<HTML>
<HEAD>
<TITLE>StrawHat Change Theatre Application</TITLE>
<link rel=\"stylesheet\" href=\"theatre.css\" type=\"text/css\">
</HEAD>
<BODY background = \"Bk10a.GIF\">
<H1 align = 'center'>Please enter your lastname</H1>

<FORM method=\"POST\" action=\"thea_searchlastname_input.php\">

	<TABLE WIDTH=\"65%\" align=\"CENTER\"> 

	<tr>
		<td><b>Theatre Representative Last Name:</b></td>
		<td><input type=\"text\" name=\"type_lastname\" size'\"30\"></td>
		<td><INPUT type=\"submit\" value =\"Select Theatre Rep\"></td>
	</tr>
	</table>
</form>

<p align = \"center\">Select your name in the following page.<p>	
</BODY>
</HTML>
";

