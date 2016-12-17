<!-- Filename: deletetechie3 2005-->

<?php

if(!$sel_record) { 
	header("Location: http://localhost/Members03/admin_test/tech/deleteclient2.php");
	exit;
	}

//create connection
//substitute your own hostname, username and password

$connection = mysql_connect("127.0.0.1", "JayServer", "wombat") or die ("Couldn't connect to server.");

//select database

$db = mysql_select_db("mydata", $connection) or die("Couldn't select database.");


//SQL statement query to get uid from $sel_record
$sql = "DELETE FROM techies05 WHERE uid = \"$sel_record\" ";

$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");

	if (!$sql_result) {
	echo "<P>Couldn't Update Record!</P>";
	} else {

echo "
<HTML>
<HEAD>
<TITLE>Delete 2005 Techies Record</TITLE>
<link rel=\"stylesheet\" href=\"/Members05/admin_test/members.css\"
</HEAD>
<BODY>
<H1>You Have Deleted $sel_record $lastname_record from the 2005 Techies Database</H1>
<a href=\"../admin_menu05.htm\">Return to Main Menu</a>
</BODY>
</HTML>
";
}
?>