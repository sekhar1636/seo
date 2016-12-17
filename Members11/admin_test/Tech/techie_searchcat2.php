<?php
//include("../session.inc");

//techie_searchcat2.php
//create connection
include("../../../Comm/connect.inc");


//create new sql statements

$sql_part1 = "SELECT tech_uid, firstname, lastname, resume_link,
	techapp_uid, other, job1, job2
	FROM techies09, techapp09 
	WHERE techies09.tech_uid = techapp09.techapp_uid AND job1=\"";

$sql_part2 = "\" OR techies09.tech_uid = techapp09.techapp_uid AND job2=\"";

$sql_part3 = "\" ORDER BY lastname ASC";



$sql_final = $sql_part1 . $jobs . $sql_part2 . $jobs . $sql_part3;


//execute SQL query and get result

$sql_result = mysql_query($sql_final,$connection) or die("Couldn't execute query.");

//resulting count
//$sql_countall = "SELECT COUNT(*) FROM techies09";
//$sql_countresult = mysql_query($sql_countall,$connection) or die("Couldn't execute query.");

//assign variable to count result
//$count1 = mysql_result($sql_countresult,0);



//put heading on top

echo "<HTML> 
  <HEAD> 
	 <TITLE>StrawHat Auditions - Staff/Tech/Design By Category</TITLE>


<link rel=\"stylesheet\" href=\"techie.css\" type=\"text/css\">

</HEAD> 

  

<BODY BACKGROUND=\"../Bk10a.GIF\"><script src=\"navbar.js\"></script>

";



//put heading on top

echo "<H2 align=\"center\">Search Results for $jobs</H2>";





//start formatting the result

	echo "<table border=0 align=\"center\" cellspacing=\"4\" cellpadding=\"4\" width=\"850\">";

	echo "<tr>
	<th align=\"left\">Name</th>
	<th align=\"left\">Primary Job</th>
	<th align=\"left\">Secondary</th>
	<th align=\"left\">Other</th>
	<th align=\"left\">Resume</th>
	
	</tr>";

	

//format results by row

	while($row = mysql_fetch_array($sql_result) ) {
	$tech_uid = $row["tech_uid"];
	$lastname = $row["lastname"];
	$firstname = $row["firstname"];
	$job1 = $row["job1"];
	$job2 = $row["job2"];
	$other = $row["other"];
	$resume_link = $row["resume_link"];
	
	echo "<tr>
		<td>$lastname"; 

//what if we only have ONE name, don't print a comma



	if ($lastname =="" or $firstname=="") {

		echo ""; }

	else {

		echo ", ";}	

	

	echo "$firstname</td><td>$job1</td>
	<td>$job2</td>

	<td>$other</td>
	<td><a href=\"/Members09/Tech/tech_resume/$resume_link\">
	$resume_link</A></td>
	
	</tr>";

}



echo "</table>";





?>