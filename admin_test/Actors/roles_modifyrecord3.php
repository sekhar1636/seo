<?php
//roles_modifyrecord3.php 2005

//check to see if (!$roles_uid)
// header("Location: http://www.strawhat-auditions.com/Members05/actor/roles_modifyrecord2.php");

//create connection
$connection = mysql_connect("127.0.0.1", "JayServer", "wombat") or die ("Couldn't connect to server.");

//select database
$db = mysql_select_db("mydata", $connection) or die("Couldn't select database.");

//SQL statement to update record
$sql = "UPDATE roles05 SET show1=\"$show1\",
show2=\"$show2\",
show3=\"$show3\",
show4=\"$show4\",
show5=\"$show5\",
role1=\"$role1\",
role2=\"$role2\",
role3=\"$role3\",
role4=\"$role4\",
role5=\"$role5\",
thea1=\"$thea1\",
thea2=\"$thea2\",
thea3=\"$thea3\",
thea4=\"$thea4\",
thea5=\"$thea5\",
school=\"$school\"
WHERE roles_uid = \"$roles_uid\"
 ";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


if (!$sql_result) {
	echo "<P>Couldn't update record!</P>";
	} else {

echo "
<HTML>
<HEAD>
<TITLE>2005 Updated Roles Record</TITLE>
<link rel=\"stylesheet\" href=\"/Members05/admin_test/members.css\" type=\"text/css\">
</HEAD>
<BODY>
";
	include("navbar.inc");
	
echo "	

<h1>You have made these changes:</h1>
<FORM method = \"POST\" action = \"physical_modifyrecord3.php\">

<table width=\"75%\" border=1 align=\"center\">
  <tr> 
    <td><a href=\"../admin_menu05.htm\">Return to Admin Menu</a></td>
    <td><a href=\"actor_modifyrecord.php\">Change Actor</a></td>
    <td></td>
  </tr>
</table>

  <table width=\"97%\" border=\"0\">
    <tr> 
      <td width=\"13%\">roles_uid:</td>
      <td width=\"32%\">$roles_uid</td>
      <td width=\"14%\">Shows: </td>
      <td width=\"41%\">$show1, $show2, $show3, $show4, $show5</td>
    </tr>
    <tr> 
      <td width=\"13%\">Roles:</td>
      <td width=\"32%\">$role1, $role2, $role3, $role4, $role5</td>
      <td width=\"14%\">Theatres:</td>
      <td width=\"41%\">$thea1, $thea2, $thea3, $thea4, $thea5</td>
    </tr>



  </table>
  
</FORM>
</BODY>
</HTML>
";
}
?>