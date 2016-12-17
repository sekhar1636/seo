<?php

	if ((!$firstname) || (!$lastname) || (!$add1) || (!$city) || (!$state) || (!$zip)
	|| (!$phone)) {
	header("Location: http://www.strawhat-auditions.com/admin/add_client.htm");
	exit;
}

?>

<!-- <DOCTYPE HTML PUBLIC "-//W3C/DTD HTML 3.2//EN"> -->
<HTML>
<HEAD>
<TITLE>Adding record to CLIENT</TITLE>
</HEAD>
<BODY>

<?php

	$sql = "INSERT INTO client_example (firstname, lastname, add1, add2, city, state, zip, phone, svc, email) VALUES
	('$firstname', '$lastname', '$add1', '$add2', '$city', '$state', '$zip', '$phone', '$svc', '$email')";

//create connection
//substitute your own hostname, username and password

$connection = mysql_connect("db2.thebook.com", "strawhat", "ray83bin") or die ("Couldn't connect to server.");

//select database

$db = mysql_select_db("strawhat_auditions", $connection) or die("Couldn't select database.");

//execute SQL query and get result
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");

	if (!$sql_result) {
	echo "<P>Couldn't add record!</P>";
	} else {
	echo "
	<P>Record added!</P>
	<table cellspacing=5 cellpadding=5>

	<tr>
	<td valign=top><strong>First Name:</strong></td>
	<td valign=top>$firstname</td>
	</tr>

	<tr>
	<td valign=top><strong>Last Name:</strong></td>
	<td valign=top>$lastname</td>
	</tr>
	
	<tr>
	<td valign=top><strong>Address 1:</strong></td>
	<td valign=top>$add1</td>
	</tr>

	<tr>
	<td valign=top><strong>Address 2:</strong></td>
	<td valign=top>$add2</td>
	</tr>

	<tr>
	<td valign=top><strong>City:</strong></td>
	<td valign=top>$city</td>
	</tr>

	<tr>
	<td valign=top><strong>State:</strong></td>
	<td valign=top>$state</td>
	</tr>

	<tr>
	<td valign=top><strong>Zip:</strong></td>
	<td valign=top>$zip</td>
	</tr>

	<tr>
	<td valign=top><strong>Phone:</strong></td>
	<td valign=top>$phone</td>
	</tr>

	<tr>
	<td valign=top><strong>Service:</strong></td>
	<td valign=top>$svc</td>
	</tr>

	<tr>
	<td valign=top><strong>Email:</strong></td>
	<td valign=top>$email</td>
	</tr>


	</table>
";
}
?>

</BODY>
</HTML>
