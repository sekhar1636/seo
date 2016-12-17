<?php

if (!$sel_record) {
	header("Location: http://www.strawhat-auditions.com/admin/client_modifyrecord.php");
	exit;
	}

//create connection
$connection = mysql_connect("127.0.0.1", "JayServer", "wombat") or die ("Couldn't connect to server.");

//select database
$db = mysql_select_db("mydata", $connection) or die("Couldn't select database.");

//SQL statement to select record
$sql = "SELECT * FROM client WHERE lastname = \"$sel_record\"";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


if (!$sql_result) {
	echo "<P>Couldn't get record!</P>";
	} else {
	

//fetch row and assign to variables
$row = mysql_fetch_array($sql_result);
$uid = $row["uid"];
$lastname = $row["lastname"];
$firstname = $row["firstname"];
$add1 = $row["add1"];
$add2 = $row["add2"];
$city = $row["city"];
$state = $row["state"];
$zip = $row["zip"];
$phone = $row["phone"];
$svc = $row["svc"];
$zip = $row["zip"];
$email = $row["email"];

echo "
<HTML>
<HEAD>
<TITLE>Modify Actor Record</TITLE>
</HEAD>
<BODY>
<h1>You have selected the following Actor to modify:</h1>
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
		<td colspan=4><input type=\"text\" name=\"uid\" value=\"$uid\" maxlength=5 size=5>
      </td>
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
        <input type=\"submit\" value=\"Modify Record\" name=\"submit\">
      </td>
    </tr>
  </table>
  
</FORM>
</BODY>
</HTML>
";
}
?>