<?php


//check to see if (!$lastname) || (!$firstname) is there, and if not
// header("Location: http://www.strawhat-auditions.com/admin/techie_modifyrecord.php");


//create connection
include("../connect.inc");

//addslashes and trim
$lastname = addslashes(trim($lastname) );
$firstname = addslashes(trim($firstname) );
$other = addslashes(trim($other) );
$title1 = addslashes(trim($title1) );
$title2 = addslashes(trim($title2) );
$title3 = addslashes(trim($title3) );

//SQL statement to update record
$sql = "UPDATE techies11 SET lastname=\"$lastname\",
firstname=\"$firstname\",
job1=\"$job1\",
job2=\"$job2\",
other=\"$other\",
resume=\"$resume\",
portfolio=\"$portfolio\",
title1=\"$title1\",
title2=\"$title2\",
title3=\"$title3\",
audio=\"$audio\"
WHERE uid = \"$uid\"
 ";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


if (!$sql_result) {
	echo "<P>Couldn't update record!</P>";
	} else {
	
echo "
<HTML>
<HEAD>
<TITLE>2011 Updated Techie Record</TITLE>
<link rel=\"stylesheet\" href=\"/Members11/admin_test/members.css\"
</HEAD>
<BODY>
<h1>You have made these changes:</h1>
<FORM method = \"POST\" action = \"techie_modifyrecord3.php\">

<table width=\"75%\" border=1 align=\"center\">
  <tr> 
    <td><a href=\"../admin_menu.htm\">Main Menu</a></td>
    <td>Change Record</td>
    <td><a href=\"techie_modifyrecord.php\">Change Techie</a></td>
    
  </tr>
</table>

  <table width=\"97%\" border=\"0\">
    <tr> 
      <td width=\"13%\">First Name:</td>
      <td width=\"32%\">$firstname
      </td>
      <td width=\"14%\">Last Name: </td>
      <td width=\"41%\">$lastname</td>
    </tr>
    <tr> 
      <td width=\"13%\">Job1:</td>
      <td width=\"32%\">$job1
      </td>
      <td width=\"14%\">Job2:</td>
      <td width=\"41%\">$job2</td>
    </tr>
    <tr>
      <td width=\"13%\">Other: </td>
      <td width=\"32%\">$other</td>
	  
      <td width=\"14%\">Resume:</td>
      <td width=\"41%\">$resume</td>
    </tr>
    <tr>
	<td colspan=2></td>
	<td>Portfolio:</td>
	<td>$portfolio</td>
	</tr>

<tr> 
      <td width=\"13%\">Title 1:</td>
      <td colspan=3>$title1</td>
    </tr>
    
    <tr> 
      <td width=\"13%\">Title 2:</td>
      <td colspan=3>$title2</td>
    </tr>

    <tr> 
      <td width=\"13%\">Title 3:</td>
      <td colspan=3>$title3</td>
    </tr>

<tr>
	<td colspan=2></td>
	<td>Audio:</td>
	<td>$audio</td>
	</tr>	
	

    <tr> 
      <td colspan=\"4\" align=center>
        <a href=\"../admin_menu.htm\">Return to Admin Menu</a>
      </td>
    </tr>
  </table>
  
</FORM>
</BODY>
</HTML>
";
}
?>