<?php

//pwd_searchlastname.php 2012

include("banner.inc");

include("../../Comm/connect.inc");

echo "

<HTML>
<HEAD>
<TITLE>StrawHat Reset Password for Staff Tech Design</TITLE>
<link rel=\"stylesheet\" href=\"members.css\" type=\"text/css\">
</HEAD>
<BODY BACKGROUND=\"Bk10a.GIF\">
<H2 align = \"center\">Staff Tech Username and Password Reset</H2>

<TABLE width = \"50%\" align = \"center\">
<TR>
<TD>
<p>If you have forgotten your username and/or password, enter your email to reset them. 
They can be changed to your preferred settings by going into change Staff Tech Design application.</p>
</td>
</tr>
</table>

<FORM method=\"POST\" action=\"pwd_reset2.php\">

	<TABLE width = \"30%\" align = \"center\">

	<tr>
		<td>Email Address</td>
		<td><input type=\"text\" name=\"t_email\" size = \"30\"></td>
	</tr>
	</table>
    <p align = \"center\"><INPUT type=\"submit\" value =\"Continue\"></p>
	
</form>

</BODY>
</HTML>
";

