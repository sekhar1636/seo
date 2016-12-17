<?php
include("session.inc");
?>

<?php

//tech_searchlastname.php 2012
//create connection
//substitute your own hostname, username and password

//create connection
include("../../Comm/connect.inc");

//---------------------------------create sql statement
//--prevent Jay Tech 2501 from showing in search for 2012 -----//

$sql = "SELECT  tech_uid, techapp_uid, firstname, lastname, job1, job2, resume_link, other
	FROM techies11, techapp11 
	WHERE techies11.tech_uid = techapp11.techapp_uid
	AND tech_uid != 0
	ORDER BY lastname ASC";


//get count for all techies
$sql_countall = "SELECT COUNT(*) FROM techies11";

//execute SQL query and get result
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute 1st query.");



//resulting count
$sql_countresult = mysql_query($sql_countall,$connection) or die("Couldn't execute Count query.");



//assign variable to count result
$count1 = mysql_result($sql_countresult,0);

//put heading on top

echo "<HTML> 
  <HEAD> 
	 <TITLE>StrawHat Staff Tech Design</TITLE>
<link rel=\"stylesheet\" href=\"techie.css\" type=\"text/css\">
";
//using the same file in Actor
include("../Actors/open_window.inc");

echo "
</HEAD> 
<BODY BACKGROUND=\"/graphics03/Bk10a.GIF\"><script src=\"navbar.js\"></script>
";



//put heading on top
echo "<H2 align=\"center\">List of Staff, Tech Design by Last Name($count1)</H2>";

//start formatting the result

	echo "<table width=\"75%\" border=0 align=\"center\" cellpadding = \"4\">";
	echo "<tr>
    <th align=\"left\" width=\"15%\" >Name</th>
    <th align=\"left\">Primary Job</th>
    <th align=\"left\">Secondary</th>
    <th align=\"left\">Other</th>
	<th align=\"center\">Profile</th></tr>";

//format results by row

	while($row = mysql_fetch_array($sql_result) ) {
	$tech_uid = $row["tech_uid"];
	$lastname = $row["lastname"];
	$firstname = $row["firstname"];
	$job1 = $row["job1"];
	$job2 = $row["job2"];
	$other = $row["other"];

	echo "<tr><td width=\"115\">$lastname";

//what if we only have ONE name, don't print a comma

	if ($lastname =="" or $firstname=="") {
		echo ""; }
	else {
		echo ", ";}

	echo "$firstname</td>
	<td>$job1</td>
	<td>$job2</td>
	<td>$other</td>
	<td align = \"center\">
	
	<form name=\"form1\" method=\"post\" action=\"techie_searchlastname1.php\" target=\"myNewWin\">
	<input type=\"hidden\" name=\"sel_record\" value=\"$tech_uid\">
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