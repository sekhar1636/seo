<?php
//roles.modifyrecord2.php

if (!$sel_record) {
	header("Location: http://localhost/Members05/admin_test/actors/roles_modifyrecord.php");
	exit;
	}

//create connection
$connection = mysql_connect("127.0.0.1", "JayServer", "wombat") or die ("Couldn't connect to server.");

//select database
$db = mysql_select_db("mydata", $connection) or die("Couldn't select database.");

//SQL statement to select record
$sql = "SELECT * FROM roles05 WHERE roles_uid = \"$sel_record\"";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


if (!$sql_result) {
	echo "<P>Couldn't get record!</P>";
	} else {
//fetch row and assign to variables
$row = mysql_fetch_array($sql_result);
$roles_uid = $row["roles_uid"];
$show1 = $row["show1"];
$show2 = $row["show2"];
$show3 = $row["show3"];
$show4 = $row["show4"];
$show5 = $row["show5"];
$role1 = $row["role1"];
$role2 = $row["role2"];
$role3 = $row["role3"];
$role4 = $row["role4"];
$role5 = $row["role5"];
$thea1 = $row["thea1"];
$thea2 = $row["thea2"];
$thea3 = $row["thea3"];
$thea4 = $row["thea4"];
$thea5 = $row["thea5"];
$school = $row["school"];

if ($roles_uid != $sel_record) {
	echo "<P><B>Warning:</B> UID not equal to Actor UID. Check databases.</p>";
	}
echo "
<HTML>
<HEAD>
<TITLE>2005 Modify Actor Record</TITLE>
<link rel=\"stylesheet\" href=\"/Members05/admin_test/members.css\" type=\"text/css\">
</HEAD>
<body bgcolor=\"#FFFFFF\" text=\"#000000\" background=\"/Members05/admin_test/Bk10a.GIF\">
<h1>You have selected the following Actor to modify:</h1>
<FORM method = \"POST\" action = \"roles_modifyrecord3.php\">

  <table width=\"76%\" border=\"1\" cellspacing=\"1\" cellpadding=\"1\" align=\"center\">
    <tr bgcolor=\"#FFCC00\"> 
      <td colspan=\"3\"> 
        <div align=\"center\"><b>Five Best Shows/Roles/Theatres to Date: (roles 
          table)</b></div>
      </td>
    </tr>
    <tr>
      <td width=\"32%\"><b>roles_uid:</b>
<input type=\"text\" name=\"roles_uid\" maxlength=\"5\" size=\"5\" value=\"$roles_uid\">
      </td>
      <td width=\"31%\">&nbsp;</td>
      <td width=\"37%\">&nbsp;</td>
    </tr>
    <tr> 
      <td width=\"32%\"><b>Show</b></td>
      <td width=\"31%\"><b>Role</b></td>
      <td width=\"37%\"><b>Theatre</b></td>
    </tr>
    <tr> 
      <td width=\"32%\"> 
        <input type=\"text\" name=\"show1\" size=\"40\" value=\"$show1\">
        <input type=\"text\" name=\"show2\" size=\"40\" value=\"$show2\">
        <input type=\"text\" name=\"show3\" size=\"40\" value=\"$show3\">
        <input type=\"text\" name=\"show4\" size=\"40\" value=\"$show4\">
        <input type=\"text\" name=\"show5\" size=\"40\" value=\"$show5\">
      </td>
      <td width=\"31%\"> 
        <input type=\"text\" name=\"role1\" size=\"30\" value=\"$role1\">
        <input type=\"text\" name=\"role2\" size=\"30\" value=\"$role2\">
        <input type=\"text\" name=\"role3\" size=\"30\" value=\"$role3\">
        <input type=\"text\" name=\"role4\" size=\"30\" value=\"$role4\">
        <input type=\"text\" name=\"role5\" size=\"30\" value=\"$role5\">
      </td>
      <td width=\"37%\"> 
        <input type=\"text\" name=\"thea1\" size=\"30\" value=\"$thea1\">
        <input type=\"text\" name=\"thea2\" size=\"30\" value=\"$thea2\">
        <input type=\"text\" name=\"thea3\" size=\"30\" value=\"$thea3\">
        <input type=\"text\" name=\"thea4\" size=\"30\" value=\"$thea4\">
        <input type=\"text\" name=\"thea5\" size=\"30\" value=\"$thea5\">
      </td>
    </tr>
    <tr>
	  <td colspan=\"3\"><b>School: </b><input type=\"text\" name=\"school\" size=\"30\" value=\"$school\"> 
	  </td>
	</tr>
	<tr> 
      <td colspan=\"3\"> 
        <div align=\"center\"> 
          <input type=\"submit\" value=\"Change Record\" name=\"submit\">
        </div>
      </td>
    </tr>
    <tr> 
      <td colspan=\"3\"> 
        <div align=\"center\"><a href=\"/Members05/admin_test/admin_menu05.htm\">Back 
          to Main Menu</a></div>
      </td>
    </tr>
  </table>
 
</FORM>
</BODY>
</HTML>
";
}
?>