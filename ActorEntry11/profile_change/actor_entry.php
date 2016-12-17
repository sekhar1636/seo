<?php

//actor_entry.php


include("../connect.inc");



//SQL statement query to get lastname, firstname

$sql = "SELECT actor_uid, lastname, firstname

FROM actor07

ORDER BY lastname ASC";



$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");



	if (!$sql_result) {

	echo "<P>Couldn't get list!</P>";

	} else {





echo "		



<HTML>

<HEAD>

<TITLE>StrawHat 2007 Actor Entry</TITLE>

<link rel=\"stylesheet\" href=\"actors.css\" type=\"text/css\">

</HEAD>

<BODY>

";



//html for logo and strawhat banner

	include("banner.inc");





echo "



<H1>Actor Entry</H1>

<FORM method=\"POST\" action=\"actor_entry2.php\">



<table cellspacing=5 cellpadding=5>



<tr>

<td align=left><strong>Actor by Lastname</strong></td>

<td valign = top>

<select name=\"sel_record\">

<option value=\"\"> -- Select Lastname -- </option>

";



	while ($row = mysql_fetch_array($sql_result) ) {

		$actor_uid = $row["actor_uid"];
		$lastname = $row["lastname"];
		$firstname = $row["firstname"];

		//stripslashes
		$lastname = stripslashes($lastname);
		$firstname = stripslashes($firstname);
		$midname = stripslashes($midname);
		
		
		echo "

			<option value=\"$actor_uid\">$lastname, $firstname $midname</option>

			";

		}	

		

echo "

	</select>

	</td>

	</tr>

	<tr colspan=\"2\" align=center><td>

	<b>Please enter your username and password:</b></td>

	</tr>

	<tr>

		<td>Username: <input type=\"text\" name=\"u_entered\" size=\"9\" maxlength=\"9\"></td>

		<td>Password: <input type=\"PASSWORD\" name=\"p_entered\" size=\"9\" maxlength=\"9\"></td>

	

	</tr>

	<tr>

	<td align = center colspan=2><INPUT type=\"submit\" value =\"Select Actor\"></td>

	</tr>

	

	</table>

	

</FORM>	

</BODY>

</HTML>

";

}

?>