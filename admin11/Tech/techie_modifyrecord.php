<?php
//techie_modifyrecord.php
//2012

//create connection
include("../../Comm/connect.inc");

//SQL statement query to get lastname, firstname
$sql = "SELECT tech_uid, lastname, firstname FROM techies11 ORDER BY lastname ASC";

$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");

	if (!$sql_result) {
	echo "<P>Couldn't get list!</P>";
	} else {

		
include("../../styles/banner.inc");		
echo "
<html>
<head>
<title>StrawHat Admin Menu</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
<link rel=\"stylesheet\" href=\"../../styles/members.css\" type=\"text/css\">

</head>
<BODY>

<H1>Select Lastname from the Techie Database</H1>
<FORM method=\"POST\" action=\"../../TechEntry11/profile_change/changes.php\">

<table cellspacing=5 cellpadding=5>
<tr>
<td align=right><strong>Techie by Lastname</strong><td>
<td valign = top>
<select name=\"tech_uid\">
<option value=\"\"> -- Select Lastname -- </option>
";

	while ($row = mysql_fetch_array($sql_result) ) {
		$tech_uid = $row["tech_uid"];
		$lastname = $row["lastname"];
		$firstname = $row["firstname"];
		echo "
			<option value=\"$tech_uid\">$tech_uid: $lastname, $firstname</option>
			";
		}

echo "
	</select>
	</td>
	</tr>
	
	<tr>
	<td align = center colspan=2>
	<INPUT type=\"submit\" value =\"Select Techie\"></td>
	</tr>
	
	</table>
	
</FORM>	
</BODY>
</HTML>
";
}
?>