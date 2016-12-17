<?php
//member_entrya.php

include("../Comm/connect.inc");
include("banner.inc");

echo "

<HTML>
<HEAD>
<TITLE>StrawHat Auditions Member Entry</TITLE>
<link rel=\"stylesheet\" href=\"/styles/members.css\" type=\"text/css\">
</HEAD>
<BODY BACKGROUND=\"../graphics03/Bk10a.GIF\">
<H1 align = \"center\">Access the StrawHat Members Area</H1> 

<table align = \"center\" width = \"70%\">
<tr>
<td>
<P align = \"center\"><b>If you are having problems with your login, Please note the following:</b><BR>
<b>The Members Area</b> is only available once we have received your complete application and all required materials. </P>

<P align = \"left\"> <b>Actors</b>, <b>to UPDATE</b> your application/profile, or <b>RESET</b> your username/password, go to 

<a href=\"../ActorEntry11/profile_change/actor_searchlastname.php\" target=\"myNewWin\" onClick=\"sendme()\"   
        ONMOUSEOVER=\"this.style.color='red'\" ONMOUSEOUT=\"this.style.color='blue'\">
        Change Actor Applications</a>
</p>

</td>
</tr>

<tr>
<td>
<P align = \"left\">
<BR><b>Staff/Tech/Design</b> to <b>UPDATE</b> your application/profile, or <b>RESET</b> your username/password, go to 

<a href=\"../TechEntry11/profile_change/tech_searchlastname.php\" target=\"myNewWin\" onClick=\"sendme()\"   
        ONMOUSEOVER=\"this.style.color='red'\" ONMOUSEOUT=\"this.style.color='blue'\">
        Staff Tech Design Change Application </a>

 <BR>Make sure you have submitted a pdf of your resume and any portfolio materials.
</P>
</td>
</tr>

<tr>
<td>
<P align = \"left\">
<BR><b>Producers</b> to <b>UPDATE</b> your company listing, or <b>RESET</b> your username/password, go to 

<a href=\"../TheatreEntry11/profile_change/thea_searchlastname.php\" target=\"myNewWin\" onClick=\"sendme()\"   
        ONMOUSEOVER=\"this.style.color='red'\" ONMOUSEOUT=\"this.style.color='blue'\">
        Theatre Change Application </a>

 </P>
</td>
</tr>

</table>

";


echo "


<FORM method=\"POST\" action=\"/Members11/member_entryb.php\">
<BR>
	<table align = \"center\" width = \"55%\">

	<tr>
		<td><b>Actors</b>, please enter your <b>last name</b> here:</td>
		<td><input type=\"text\" name=\"type_lastname\" size=\"30\"></td>
		<td><input type=\"submit\" value =\"Select Actor\"></td>
	</tr>
	
	<tr>
		<td><BR><BR><B>Staff/Tech/Design</b>, please enter your <b>last name</b> here:</td>
		<td><BR><BR></b><input type=\"text\" name=\"tech_lastname\" size=\"30\"></td>
		<td><BR><BR><INPUT type=\"submit\" value =\"Select Staff Tech Design\"></td>
	</tr>
    
        <tr>
        <td><BR><BR><B>Theatres</b>, please enter your <b>last name</b> here:</td>        
        <td><BR><BR></b><input type=\"text\" name=\"thea_lastname\" size=\"30\"></td>
        <td><BR><BR><INPUT type=\"submit\" value =\"Select Theatre Rep\"></td>
    </tr>
    
    
    <tr>
    <td colspan = \"3\"><a href=\"../index.php\"><BR>Back to Home Page</a></td>
    
    </tr>

	</table>
</form>
	
</BODY>
</HTML>

";

?>