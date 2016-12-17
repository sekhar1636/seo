<?php
$sel_record = $_POST['sel_record'];

if (!$sel_record) {
	echo "No sel_record";

	exit;
	}

include("../Comm/connect.inc");

//SQL statement to select record
$sql = "SELECT * FROM actor11, pwd11  
WHERE actor_uid = \"$sel_record\" AND
actor11.actor_uid = pwd11.pass_uid
";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


if (!$sql_result) {
	echo "<P>Couldn't get record!</P>";
	} else {
	

//fetch row and assign to variables
$row = mysql_fetch_array($sql_result);
$actor_uid = $row["actor_uid"];
$lastname = stripslashes($row["lastname"]);
$firstname = stripslashes($row["firstname"]);
$midname = stripslashes($row["midname"]);
$date_entered = $row["date_entered"];
$address = stripslashes($row["address"]);
$city = stripslashes($row["city"]);
$state = $row["state"];
$zip = $row["zip"];
$username = stripslashes($row["username"]);
$pass = $row["pass"];
$region = $row["region"];
$phone = $row["phone"];
$email = $row["email"];
$largecity = stripslashes($row["largecity"]);
$h_or_serv = $row["h_or_serv"];
	}

echo "
<html>
<head>
<title>StrawHat 2011 Actor Admin Entry</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
<link rel=\"stylesheet\" href=\"../styles/actors.css\" type=\"text/css\">
</head>
<body>
";

include("../styles/banner.inc");

echo "

<h2>Welcome $firstname $midname $lastname!</h2>
<p>Click below to make your changes.</p>

<form name=\"form1\" method=\"post\" action=\"/ActorEntry11/profile_change/changes.php\">
      <input type = \"hidden\" name = \"actor_uid\" value = \"$actor_uid\">
      <input type=\"submit\" name=\"Submit\" value=\"Make Changes\">
		</form>
</body>
</html>
";

?>