<?php

//tech_searchlastname.php
//create connection

//create connection
include("../../../Comm/connect.inc");

//---------------------------------create sql statement

$sql = "SELECT tech_uid, techapp_uid, firstname, lastname, 
		job1, job2, other, resume_link, portfolio
	FROM techies11, techapp11 
	WHERE tech_uid = techapp_uid
	ORDER BY lastname ASC";



//get count for all techies

$sql_countall = "SELECT COUNT(*) FROM techies11";





//execute SQL query and get result

$sql_result = mysql_query($sql,$connection) or die("Couldn't execute lastname query.");



//resulting count

$sql_countresult = mysql_query($sql_countall,$connection) or die("Couldn't execute count query.");



//assign variable to count result

$count1 = mysql_result($sql_countresult,0);



//put heading on top

echo "<HTML> 

  <HEAD>
  <TITLE>StrawHat Auditions Staff Tech Design</TITLE>
<link rel=\"stylesheet\" href=\"../styles/actors.css\" type=\"text/css\">
</HEAD>
<BODY>
";
   include("../styles/banner.inc");


//put heading on top

echo "<H2 align=\"center\">List of Staff, Tech Design by Last Name($count1)</H2>";





//start formatting the result

	echo "<table border=0 align=\"center\">";

	echo "<tr><th align=\"left\">Name</th><th align=\"left\">Primary Job</th><th align=\"left\">Secondary</th><th align=\"left\">Other</td>

	<th>Portfolio</th><th>Resume</th></tr>";

	

//format results by row

	while($row = mysql_fetch_array($sql_result) ) {

	$lastname = $row["lastname"];

	$firstname = $row["firstname"];

	$job1 = $row["job1"];

	$job2 = $row["job2"];

	$other = $row["other"];

	$portfolio = $row["portfolio"];

	$resume_link = $row["resume_link"];

	echo "<tr><td width=\"115\">$lastname";



//what if we only have ONE name, don't print a comma



	if ($lastname =="" or $firstname=="") {

		echo ""; }

	else {

		echo ", ";}

		

	

	echo "$firstname</td><td width=\"100\">$job1</td><td width=\"100\">$job2</td>

	<td width=\"75\">$other</td><td align=\"center\">$portfolio</td><td><a href=\"/Members10/Tech/tech_resume/$resume_link\">$resume_link</a></td></tr>";

}



echo "</table>";



//free resources and close connection

mysql_free_result($sql_result);		

mysql_close($connection);



?>