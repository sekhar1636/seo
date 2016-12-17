<?php
//based on techie_modifyrecord.php
//2012

//create connection
include("../../Comm/connect.inc");

//SQL statement query to get lastname, firstname
$sql = "SELECT thea_uid, lastname, firstname, company FROM theatre11 ORDER BY company ASC";

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

<H1>Select Theatre Name from the Theatre Database</H1>
<FORM method=\"POST\" action=\"../../TheatreEntry11/profile_change/changes.php\">

<table cellspacing=5 cellpadding=5>
<tr>
<td align=right><strong>Theatre by Company Name</strong><td>
<td valign = top>
<select name=\"thea_uid\">
<option value=\"\"> -- Select Theatre -- </option>
";

	while ($row = mysql_fetch_array($sql_result) ) {
		$thea_uid = $row["thea_uid"];
		$lastname = $row["lastname"];
		$firstname = $row["firstname"];
        $company = $row["company"];
		echo "
			<option value=\"$thea_uid\">$thea_uid: $company: $lastname, $firstname</option>
			";
		}

echo "
	</select>
	</td>
	</tr>
	
	<tr>
	<td align = center colspan=2>
	<INPUT type=\"submit\" value =\"Select Theatre\"></td>
	</tr>
	
	</table>
	
</FORM>	
</BODY>
</HTML>
";
}
?>