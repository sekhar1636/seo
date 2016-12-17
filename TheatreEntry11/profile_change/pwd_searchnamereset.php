<?php

//pwd_searchlastname.php 2011

include("banner.inc");

include("../../Comm/connect.inc");

echo "

<HTML>
<HEAD>
<TITLE>StrawHat Reset Password for Theatres</TITLE>
<link rel=\"stylesheet\" href=\"members.css\" type=\"text/css\">
</HEAD>
<BODY BACKGROUND=\"Bk10a.GIF\">
<H2 align = 'center'>Theatre Username and Password Reset</H2>

<TABLE align = 'center' width = '50%'>
<tr>
<td align = 'center'>If you have forgotten your username and/or password, enter your email and zip to reset them. 
They can be changed to your preferred settings by going into change theatre application.</td>
<tr>
</table>



<FORM method=\"POST\" action=\"pwd_reset2.php\">
	<table align = 'center' width = '50%'>
	<tr>
		<td>Email Address (limit to 30 characters/numbers)</td>
		<td><input type=\"text\" name=\"t_email\" size = \"30\"> </td> 	
    </tr>
    
    <tr>
        <td>Zip (enter 5 numbers)</td>
        <td><input type=\"text\" name=\"t_zip\" size = \"5\"maxlength=\"5\"> </td>
    </tr>        

<tr>
<td>
<a href=\"../../index.php\">Go back to Home Page</a>


    
</td>
</tr>
</table>

    
	<p align = \"center\"><INPUT type=\"submit\" size = \"30\" value =\"Continue\"></p>

    
    </form>

</BODY>
</HTML>
";

