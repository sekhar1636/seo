<?php
//modifyrecord3.php

//check to see if (!$lastname) || (!$firstname) is there, and if not
// header("Location: http://www.strawhat-auditions.com/admin/client_modifyrecord.php");

//create connection
$connection = mysql_connect("db2.thebook.com", "strawhat", "ray83bin") or die ("Couldn't connect to server.");

//select database
$db = mysql_select_db("strawhat_auditions", $connection) or die("Couldn't select database.");

//SQL statement to update record
$sql = "UPDATE client SET lastname=\"$lastname\",
firstname=\"$firstname\",
add1=\"$add1\",
add2=\"$add2\",
city=\"$city\",
state=\"$state\",
zip=\"$zip\",
phone=\"$phone\",
svc=\"$svc\",
email=\"$email\"
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
<TITLE>Updated Actor Record</TITLE>
</HEAD>
<BODY>
<h1>You have made these changes:</h1>
<FORM method = \"POST\" action = \"modifyrecord3.php\">

<table width=\"75%\" border=\"1\" align=\"center\">
  <tr> 
    <td><a href=\"admin_menu.htm\">Main Menu</a></td>
    <td>Change Record</td>
    <td><a href=\"client_modifyrecord.php\">List of Data</a></td>
    
  </tr>
</table>

  <table width=\"97%\" border=\"0\">
    <tr> 
      <td width=\"13%\">First Name:</td>
      <td width=\"32%\"> 
        <input type=\"text\" name=\"firstname\" value=\"$firstname\" maxlength=30 size=30>
      </td>
      <td width=\"14%\">Last Name: </td>
      <td width=\"41%\"> 
        <input type=\"text\" name=\"lastname\" value=\"$lastname\" size=30 maxlength=30>
      </td>
    </tr>
    <tr> 
      <td width=\"13%\">Address:</td>
      <td width=\"32%\"> 
        <input type=\"text\" name=\"add1\" size=30 value=\"$add1\">
      </td>
      <td width=\"14%\">&nbsp;</td>
      <td width=\"41%\">&nbsp; </td>
    </tr>
    <tr>
      <td width=\"13%\">Address 2:</td>
      <td width=\"32%\">
        <input type=\"text\" name=\"add2\" size=30 value=\"$add2\">
      </td>
      <td width=\"14%\">City: </td>
      <td width=\"41%\">
        <input type=\"text\" name=\"city\" value=\"$city\" size=30>
      </td>
    </tr>
    <tr> 
      <td width=\"13%\">Email:</td>
      <td width=\"32%\"> 
        <input type=\"text\" name=\"email\" value=\"$email\" size=30>
      </td>
      <td width=\"14%\">State:</td>
      <td width=\"41%\"> 
        <input type=\"text\" name=\"state\" value=\"$state\" size=2 maxlength=2>
        Zip: 
        <input type=\"text\" name=\"zip\" value=\"$zip\" size=13 maxlength=10>
      </td>
    </tr>
    <tr> 
      <td width=\"13%\">Phone:</td>
      <td width=\"32%\"> 
        <input type=\"text\" name=\"phone\" value=\"$phone\" maxlength=20>
      </td>
      <td width=\"14%\">Service:</td>
      <td width=\"41%\"> 
        <input type=\"text\" name=\"svc\" value=\"$svc\" maxlength=20>
      </td>
    </tr>
    <tr> 
      <td colspan=\"4\" align=center>
        <a href=\"admin_menu.htm\">Return to Admin Menu</a>
      </td>
    </tr>
  </table>
  
</FORM>
</BODY>
</HTML>
";
}
?>