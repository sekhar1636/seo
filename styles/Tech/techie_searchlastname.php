<?php
include("session.inc");
?>

<?php

//tech_searchlastname.php 2010
//create connection
//substitute your own hostname, username and password

//create connection
include("../../Comm/connect.inc");

//---------------------------------create sql statement

$sql = "SELECT  tech_uid, firstname, lastname, job1, job2, resume_link, techapp_uid, other
	FROM techies10, techapp10 
	WHERE techies10.tech_uid = techapp10.techapp_uid
	ORDER BY lastname ASC";


//get count for all techies
$sql_countall = "SELECT COUNT(*) FROM techies10";

//execute SQL query and get result
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute 1st query.");



//resulting count
$sql_countresult = mysql_query($sql_countall,$connection) or die("Couldn't execute Count query.");



//assign variable to count result
$count1 = mysql_result($sql_countresult,0);



//put heading on top

echo "<HTML> 

  <HEAD> 

	 <TITLE>StrawHat Auditions Staff Tech Design</TITLE>
<link rel=\"stylesheet\" href=\"/styles/members.css\" type=\"text/css\">


  



</HEAD> 

  

<BODY BACKGROUND=\"/graphics03/Bk10a.GIF\"><script src=\"navbar.js\"></script>

";



//put heading on top

echo "<H2 align=\"center\">List of Staff, Tech Design by Last Name($count1)</H2>";

//start formatting the result

	echo "<table border=0 align=\"center\" cellpadding = \"4\">";

	echo "<tr><th align=\"left\">Name</th><th align=\"left\">Primary Job</th><th align=\"left\">Secondary</th><th align=\"left\">Other</td>

	<th>Profile</th></tr>";

	

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
	
	<td>
			<form name=\"form1\" method=\"post\" action=\"techie_searchlastname1.php\" target=\"RecordViewer\">
	<input type=\"hidden\" name=\"sel_record\" value=\"$tech_uid\">
	<input type=\"submit\" value=\"Select Profile\" name=\"submit\" onClick=\"sendme()\">
	</form></td>
	
<!--old code	
	<td align = \"center\">
	<form name=\"form1\" method=\"post\" action=\"techie_searchlastname1.php\">
	<input type=\"hidden\" name=\"sel_record\" value=\"$tech_uid\">
	<input type=\"submit\" value=\"Select Profile\" name=\"submit\">
	</form>
	</td>
-->
";

}

echo "</table>";

//free resources and close connection

mysql_free_result($sql_result);		
mysql_close($connection);
?>