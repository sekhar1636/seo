<?php
//actor_modifyrecord.php

include("../admin11/session.inc");

include("../Comm/connect.inc");

//SQL statement query to get lastname, firstname
$sql = "SELECT actor_uid, lastname, firstname, midname
FROM actor11
ORDER BY lastname ASC";

$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");

	if (!$sql_result) {
	echo "<P>Couldn't get list!</P>";
	} else {


echo "		

<HTML>
<HEAD>
<TITLE>StrawHat Actor Admin Entry</TITLE>
<link rel=\"stylesheet\" href=\"../styles/actors.css\" type=\"text/css\">
</HEAD>
<BODY>
";

//html for logo and strawhat banner
	include("../styles/banner.inc");


echo "

<H1>Actor Admin Entry</H1>
<FORM method=\"POST\" action=\"actor_adminentry2.php\">

<table cellspacing=5 cellpadding=5>

<tr>
<td align=left><strong>Actor by Lastname</strong></td>
<td valign = top>
<select name=\"sel_record\">
<option value=\"\"> -- Select Lastname -- </option>
";

	while ($row = mysql_fetch_array($sql_result) ) {
		$actor_uid = $row["actor_uid"];
		$lastname = stripslashes($row["lastname"]);
		$firstname = stripslashes($row["firstname"]);
		$midname = stripslashes($row["midname"]);
		echo "
			<option value=\"$actor_uid\">$actor_uid: $lastname, $firstname $midname </option>
			";
		}	
		
echo "
	</select>
	</td>
	</tr>
	<tr>
	
	<td align = center colspan=2>
	<input type = \"hidden\" name = \"actor_uid\" value = \"$actor_uid\">
	<INPUT type=\"submit\" value =\"Select Actor\"></td>
	</tr>
	
	</table>
	
</FORM>	
</BODY>
</HTML>
";
}
?>