<?php
include("session.inc");
?>

<?php

//theatres_searchlastname.php 2012
//create connection
//substitute your own hostname, username and password

//create connection
include("../../Comm/connect.inc");

//---------------------------------create sql statement
//--prevent Jay Tech 2501 from showing in search for 2012 -----//

$sql = "SELECT  thea_uid, company, address, city, state, zip
	FROM theatre11
	ORDER BY company ASC";


//get count for all techies
$sql_countall = "SELECT COUNT(*) FROM theatre11";

//execute SQL query and get result
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute 1st query.");



//resulting count
$sql_countresult = mysql_query($sql_countall,$connection) or die("Couldn't execute Count query.");



//assign variable to count result
$count1 = mysql_result($sql_countresult,0);

//put heading on top

echo "<HTML> 
  <HEAD> 
	 <TITLE>StrawHat Auditions Theatres</TITLE>
<link rel=\"stylesheet\" href=\"../../styles/members.css\" type=\"text/css\">
";
//using the same file in Actor
include("../Actors/open_window.inc");

echo "
</HEAD> 
<BODY BACKGROUND=\"/graphics03/Bk10a.GIF\"><script src=\"navbar.js\"></script>
";



//put heading on top
echo "<H2 align=\"center\">List of Theatres by Company Name($count1)</H2>";

//start formatting the result

	echo "<table border=0 align=\"center\" cellpadding = \"4\">";
	echo "<tr>
    <th align=\"left\">Company</th>
    <th align=\"left\">Address</th>
    <th align=\"left\">City</th>
    <th align=\"left\">State</th>
    <th align=\"left\">Zip</th>
    
    </tr>";

//format results by row

	while($row = mysql_fetch_array($sql_result) ) {
	$thea_uid = $row["tech_uid"];
	$company = $row["company"];
	$address = $row["address"];
	$city = $row["city"];
	$state = $row["state"];
	$zip = $row["zip"];

	echo "<tr>
    <td>$company</td>";

//what if we only have ONE name, don't print a comma
/*
	if ($lastname =="" or $firstname=="") {
		echo ""; }
	else {
		echo ", ";}
*/
	echo "<td>$address</td>
	<td>$city</td>
	<td>$state</td>
	<td>$zip</td>
	<td align = \"center\">
	
	<form name=\"form1\" method=\"post\" action=\"theatres_searchlastname1.php\" target=\"myNewWin\">
	<input type=\"hidden\" name=\"sel_record\" value=\"$thea_uid\">
	<input type=\"submit\" value=\"Select Profile\" name=\"submit\" target = \"myNewWin\" onClick=\"sendme()\">
	
	
	</form>
	</td>
";

}

echo "</table>";

//free resources and close connection
mysql_free_result($sql_result);		
mysql_close($connection);
?>