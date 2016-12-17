<?php
//client_modifyrecord.php
//

//create connection
//substitute your own hostname, username and password

$connection = mysql_connect("db2.thebook.com", "strawhat", "ray83bin") or die ("Couldn't connect to server.");

//select database

$db = mysql_select_db("strawhat_auditions", $connection) or die("Couldn't select database.");

//SQL statement query to get lastname, firstname
$sql = "SELECT lastname, firstname FROM client ORDER BY lastname ASC";

$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");

	if (!$sql_result) {
	echo "<P>Couldn't get list!</P>";
	} else {

echo "
<HTML>
<HEAD>
<TITLE>Modify Actor Record</TITLE>
</HEAD>
<BODY>
<H1>Select Lastname from the Actor Database</H1>
<FORM method=\"POST\" action=\"modifyrecord2.php\">
<table cellspacing=5 cellpadding=5>

<tr>
<td align=right><strong>Actor by Lastname</strong><td>
<td valign = top>
<select name=\"sel_record\">
<option value=\"\"> -- Select Lastname -- </option>
";

	while ($row = mysql_fetch_array($sql_result) ) {
		$lastname = $row["lastname"];
		$firstname = $row["firstname"];
		echo "
			<option value=\"$lastname\">$lastname : $firstname</option>
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