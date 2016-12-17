<?php
//roles_modifyrecord.php 2005
//

//create connection
//substitute your own hostname, username and password

$connection = mysql_connect("127.0.0.1", "JayServer", "wombat") or die ("Couldn't connect to server.");

//select database

$db = mysql_select_db("mydata", $connection) or die("Couldn't select database.");

//SQL statement query to get lastname, firstname
$sql = "SELECT actor_uid, lastname, firstname FROM actor05 ORDER BY lastname ASC";

$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");

	if (!$sql_result) {
	echo "<P>Couldn't get list!</P>";
	} else {

echo "
<HTML>
<HEAD>
<TITLE>Modify \"Roles\" Actor Record 2005</TITLE>
<link rel=\"stylesheet\" href=\"/Members05/admin_test/members.css\" type=\"text/css\">
</HEAD>
<BODY>
<H1>Select Lastname from the Actor 2005 Database</H1>
<FORM method=\"POST\" action=\"roles_modifyrecord2.php\">
<table cellspacing=5 cellpadding=5>

<tr>
<td align=right><strong>Actor by Lastname</strong><td>
<td valign = top>
<select name=\"sel_record\">
<option value=\"\"> -- Select Lastname -- </option>
";

	while ($row = mysql_fetch_array($sql_result) ) {
		$actor_uid = $row["actor_uid"];
		$lastname = $row["lastname"];
		$firstname = $row["firstname"];
		echo "
			<option value=\"$actor_uid\">$actor_uid: $lastname, $firstname</option>
			";
		}

echo "
	</select>
	</td>
	</tr>
	
	<tr>
	<td align = center colspan=2><INPUT type=\"submit\" value =\"Select Actor\"></td>
	</tr>
	
	</table>
	
	
</BODY>
</HTML>
";
}
?>