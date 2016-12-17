<?php

//techie_portfolio.php 2009

//

//create connection
include("../../../Comm/connect.inc");


//---------------------------------create sql statement

//SQL statement query to get lastname, firstname

$sql = "SELECT tech_uid, lastname, firstname 
	FROM techies09 
	WHERE portfolio=\"Y\" 
	ORDER BY lastname ASC";



$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");



	if (!$sql_result) {

	echo "<P>Couldn't get list!</P>";

	} else {



echo "

<HTML>

<HEAD>

<TITLE>Staff Tech Design Portfolios 2009</TITLE>
<link rel=\"stylesheet\" href=\"portfolio.css\" type=\"text/css\">
</HEAD>
<BODY>

<H2>Select Portfolio Candidates</H2>
<FORM method=\"POST\" action=\"techie_portfolio2.php\">
<table cellspacing=5 cellpadding=5>

<tr>
<td><strong>Portfolios by Last Name</strong><td>
<td valign = top>

<select name=\"sel_record\">
<option value=\"\"> -- Select Lastname -- </option>

";

	while ($row = mysql_fetch_array($sql_result) ) {

		$tech_uid = $row["tech_uid"];

		$lastname = $row["lastname"];

		$firstname = $row["firstname"];

		echo "

			<option value=\"$tech_uid\">$lastname";

			

//what if we only have ONE name, don't print a comma



	if ($lastname =="" or $firstname=="") {

		echo ""; }

	else {

		echo ", ";}

		

					

		echo "$firstname</option>

			";

		}


echo "

	</select>

	</td>

	</tr>

	

	<tr>

	<td align = center colspan=2><INPUT type=\"submit\" value =\"Select\"></td>

	</tr>

	

	</table>

	

	

</BODY>

</HTML>

";

}

?>