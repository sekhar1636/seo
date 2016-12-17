<?php

//create connection
//substitute your own hostname, username and password

$connection = mysql_connect("db2.thebook.com", "strawhat", "ray83bin") or die ("Couldn't connect to server.");

//select database

$db = mysql_select_db("strawhat_auditions", $connection) or die("Couldn't select database.");

//create sql statement
$sql = "SELECT uid, firstname, lastname, city, state, zip, phone
	FROM client ORDER BY firstname ASC";

//execute SQL query and get result
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");

//put heading on top
echo "<H2>List of Actors in Database by UID no.</H2>";

//start formatting the result
	echo "<table border=1>";
	echo "<tr><th>UID</th><th>First Name</th><th>Last Name</th><th>City</th>
	<th>State</th><th>Zip</th><th>Phone</th></tr>";
	
//format results by row
	while($row = mysql_fetch_array($sql_result) ) {
	$id = $row["uid"];
	$firstn = $row["firstname"];
	$last = $row["lastname"];
	$city = $row["city"];
	$state = $row["state"];
	$zip = $row["zip"];
	$phone = $row["phone"];
	echo "<tr><td>$id</td><td>$firstn</td><td>$last</td><td>$city</td>
	<td>$state</td><td>$zip</td><td>$phone</td></tr>";
}

echo "</table>";

//free resources and close connection
mysql_free_result($sql_result);		
mysql_close($connection);

?>