<?php
//client_modifyrecord.php 2005
//

//create connection
//substitute your own hostname, username and password

$connection = mysql_connect("127.0.0.1", "JayServer", "wombat") or die ("Couldn't connect to server.");

//select database

$db = mysql_select_db("mydata", $connection) or die("Couldn't select database.");

//SQL statement query to get lastname, firstname
$sql = "SELECT uid, lastname, firstname FROM techies05 ORDER BY lastname ASC";

$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");

	if (!$sql_result) {
	echo "<P>Couldn't get list!</P>";
	} else {

echo "
<HTML>
<HEAD>
<TITLE>Delete Techie Record 2005</TITLE>
<link rel=\"stylesheet\" href=\"/Members05/admin_test/members.css\"</HEAD>
<BODY>
<H1>Select Lastname from the Techie Database 2005</H1>
<FORM method=\"POST\" action=\"deletetechie2.php\">
<table cellspacing=5 cellpadding=5>

<tr>
<td align=right><strong>Techie by Lastname</strong><td>
<td valign = top>
<select name=\"sel_record\">
<option value=\"\"> -- Select Lastname -- </option>
";

	while ($row = mysql_fetch_array($sql_result) ) {
		$uid = $row["uid"];
		$lastname = $row["lastname"];
		$firstname = $row["firstname"];
		echo "
			<option value=\"$uid\">$uid: $lastname, $firstname</option>
			";
		}

echo "
	</select>
	</td>
	</tr>
	
	<tr>
	<td align = center colspan=2><INPUT type=\"submit\" value =\"Select Techie\"></td>
	</tr>
	
	</table>
	
	
</BODY>
</HTML>
";
}
?>