<?php

/*--------
not a good test, there may be no roles
	if ((!$)) {
	header("Location: http://localhost/Members05/admin_test/actor/add_roles04.htm");
	exit;
}
--------------*/
?>

<!-- <DOCTYPE HTML PUBLIC "-//W3C/DTD HTML 3.2//EN"> -->
<HTML>
<HEAD>
<TITLE>Adding record to 2005 Roles table</TITLE>
<link rel="stylesheet" href="/Members05/admin_test/members.css" type="text/css">
</HEAD>
<BODY>

<?php

	$sql = "INSERT INTO roles05 (roles_uid, show1, show2, show3, show4, show5, role1, role2, role3, role4, role5, thea1, thea2, thea3, thea4, thea5, school) 
	VALUES ('$roles_uid', '$show1', '$show2', '$show3', '$show4', '$show5', '$role1', '$role2', '$role3', '$role4', '$role5', '$thea1', '$thea2', '$thea3', '$thea4', '$thea5', '$school')";

//create connection
//substitute your own hostname, username and password

$connection = mysql_connect("127.0.0.1", "JayServer", "wombat") or die ("Couldn't connect to server.");

//select database

$db = mysql_select_db("mydata", $connection) or die("Couldn't select database.");

//execute SQL query and get result
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");

	if (!$sql_result) {
	echo "<P>Couldn't add record!</P>";
	} else {
	echo "
	<P>Record added!</P>
";
	include("navbar.inc");
echo "	
<FORM method=\"POST\" action=\"../Actors/profile_addrecord.php\">
<input type = \"hidden\" name = \"uid\" value = \"$roles_uid\">
<input type=\"submit\" value=\"View Profile\" name=\"submit\">
</form>
	
	
	<table cellspacing=5 cellpadding=5>

	<tr>
	<td valign=top><strong>Show1:</strong></td>
	<td valign=top>$show1, $role1, $thea1</td>
	<td valign=top><strong>Show2:</strong></td>
	<td valign=top>$show2, $role2, $thea2</td>
	</tr>

	<tr>
	<td valign=top><strong>Show3:</strong></td>
	<td valign=top>$show3, $role3, $thea3</td>
	<td valign=top><strong>Show4:</strong></td>
	<td valign=top>$show4, $role4, $thea4</td>
	</tr>

	<tr>
	<td valign=top><strong>Show5</strong></td>
	<td valign=top>$show5, $role5, $thea5</td>
	<td valign=top colspan = \"2\"><strong></td>
	</tr>

	</table>
<table>	
<tr>
<td width=\"200\">
		
</td>
<td width=\"200\">
	<a href=\"add_roles04.htm\">Add another Role table</a>

<td width=\"200\">
	<a href=\"../admin_menu05.htm\">Back to Main Menu</a>
</td>
</tr>
</table>

";
}
?>

</BODY>
</HTML>
