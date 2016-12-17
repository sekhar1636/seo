<?php
//roles_addrecord1a.php

//if (!$sel_record) {
//	header("Location: http://localhost/Members05/admin_test/actors/roles_modifyrecord.php");
//	exit;
//	}

//create connection
$connection = mysql_connect("127.0.0.1", "JayServer", "wombat") or die ("Couldn't connect to server.");

//select database
$db = mysql_select_db("mydata", $connection) or die("Couldn't select database.");

//SQL statement to select record
//$sql = "SELECT actor_uid FROM actor05 WHERE actor_uid = \"$sel_record\"";

//execute SQL query and get result	
//$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


//if (!$sql_result) {
//	echo "<P>Couldn't get record!</P>";
//	} else {
	
//fetch row and assign to variables
//$row = mysql_fetch_array($sql_result);
$roles_uid = $uid;


echo "
<HTML>
<HEAD>
<TITLE>2004 Add Roles Record</TITLE>
<link rel=\"stylesheet\" href=\"/Members05/admin_test/members.css\" type=\"text/css\">
</HEAD>
<body bgcolor=\"#FFFFFF\" text=\"#000000\" background=\"/Members05/admin_test/Bk10a.GIF\">
<h1>Add the following 2005 Roles Record:</h1>
<FORM method = \"POST\" action = \"roles_addrecord2a.php\">

  <table width=\"76%\" border=\"1\" cellspacing=\"1\" cellpadding=\"1\" align=\"center\">
    <tr bgcolor=\"#FFCC00\"> 
      <td colspan=\"3\"> 
        <div align=\"center\"><b>Five Best Shows/Roles/Theatres to Date: (roles 
          table)<BR>Do Not Change UID!</b></div>
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
        <input type=\"text\" name=\"show1\" size=\"40\">
        <input type=\"text\" name=\"show2\" size=\"40\">
        <input type=\"text\" name=\"show3\" size=\"40\">
        <input type=\"text\" name=\"show4\" size=\"40\">
        <input type=\"text\" name=\"show5\" size=\"40\">
      </td>
      <td width=\"31%\"> 
        <input type=\"text\" name=\"role1\" size=\"30\">
        <input type=\"text\" name=\"role2\" size=\"30\">
        <input type=\"text\" name=\"role3\" size=\"30\">
        <input type=\"text\" name=\"role4\" size=\"30\">
        <input type=\"text\" name=\"role5\" size=\"30\">
      </td>
      <td width=\"37%\"> 
        <input type=\"text\" name=\"thea1\" size=\"30\">
        <input type=\"text\" name=\"thea2\" size=\"30\">
        <input type=\"text\" name=\"thea3\" size=\"30\">
        <input type=\"text\" name=\"thea4\" size=\"30\">
        <input type=\"text\" name=\"thea5\" size=\"30\">
      </td>
    </tr>
    <tr>
	  <td colspan=\"3\">School: <input type=\"text\" name=\"school\" size=\"25\"></td>
	</tr>
	<tr> 
      <td colspan=\"3\"> 
        <div align=\"center\"> 
          <input type=\"submit\" value=\"Add Record\" name=\"submit\">
          <input type=\"reset\" value=\"Clear Form\" name=\"reset\">
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
</form>
</body>
</html>
";

?>