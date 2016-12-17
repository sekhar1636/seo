<?php

if (!$sel_record) {
	header("Location: http://localhost/Members03/admin_test/tech/deleteclient1.php");
	exit;
	}

//create connection
$connection = mysql_connect("127.0.0.1", "JayServer", "wombat") or die ("Couldn't connect to server.");

//select database
$db = mysql_select_db("mydata", $connection) or die("Couldn't select database.");

//SQL statement to select record
$sql = "SELECT * FROM techies05 WHERE uid = \"$sel_record\"";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


if (!$sql_result) {
	echo "<P>Couldn't get record!</P>";
	} else {
	

//fetch row and assign to variables
$row = mysql_fetch_array($sql_result);
$uid = $row["uid"];
$lastname = $row["lastname"];
$firstname = $row["firstname"];
$job1 = $row["job1"];
$job2 = $row["job2"];
$other = $row["other"];
$resume = $row["resume"];
$entered = $row["entered"];
$portfolio = $row["portfolio"];
$title1 = $row["title1"];
$title2 = $row["title2"];
$title3 = $row["title3"];

echo "
<HTML>
<HEAD>
<TITLE>Delete 2005 Techies Record</TITLE>
<link rel=\"stylesheet\" href=\"/Members05/admin_test/members.css\"
</HEAD>
<BODY>
<h1>You have selected the following 2005 Techie to delete:</h1>
<FORM method = \"POST\" action = \"deletetechie3.php\">
<input type = \"hidden\" name = \"sel_record\" value = \"$uid\">

<input type = \"hidden\" name = \"lastname_record\" value = \"$lastname\">


<table cellspacing=5 cellpadding=5>

	<tr>
	<td><strong>UID:</strong></td>
	<td colspan=3>$uid</td>
	</tr>
	
	<tr>
	<td valign=top><strong>First Name:</strong></td>
	<td valign=top>$firstname</td>
	<td valign=top><strong>Last Name:</strong></td>
	<td valign=top>$lastname</td>
	</tr>

	<tr>
	<td valign=top><strong>Job1:</strong></td>
	<td valign=top>$job1</td>
	<td valign=top><strong>Job2:</strong></td>
	<td valign=top>$job2</td>
	</tr>
	
	<tr>
	<td valign=top><strong>Other:</strong></td>
	<td valign=top>$other</td>
	<td valign=top><strong>Resume:</strong></td>
	<td valign=top>$resume</td>
	</tr>
	
	<tr>
	<td valign=top><strong>Portfolio:</strong></td>
	<td valign=top>$portfolio</td>
	<td valign=top></td>
	<td valign=top></td>
	</tr>
	
	<tr>
	<td valign=top><strong>Title1:</strong></td>
	<td colspan=3 valign=top>$title1</td>
	</tr>
	
	<tr>
	<td valign=top><strong>Title2:</strong></td>
	<td colspan=3 valign=top>$title2</td>
	</tr>
	
	<tr>
	<td valign=top><strong>Title3:</strong></td>
	<td colspan=3 valign=top>$title3</td>
	</tr>
	
	<tr>
	<td colspan=3><input type=\"submit\" value=\"Delete Record\"></td>

	</table>

  
</FORM>
</BODY>
</HTML>
";
}
?>