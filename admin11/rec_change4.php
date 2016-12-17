<?php
include("../admin11/session.inc");

$rec_uid = $_POST['rec_uid'];
$actor_ID = $_POST['actor_ID'];
$check_no = $_POST['check_no'];
$memo = $_POST['memo'];
$amount = $_POST['amount'];
$item = $_POST['item'];
$date_entered = $_POST['date_entered'];



if (!$rec_uid) {
	echo("Can't see rec_uid");
	exit;
	}

include("../Comm/connect.inc");

//addslashes and trim
$memo = addslashes(trim($memo) );



//query to check if the actor_uid # exists
$sql_checkactor = "SELECT actor_uid
		FROM actor11
		WHERE actor_uid = $actor_ID
		";

include("../Comm/connect.inc");

$sql_result = mysql_query($sql_checkactor,$connection) or die("Couldn't execute Checkif Actor UID exists query. Actor ID: $actor_ID");

	if (mysql_num_rows($sql_result) == 0) {
	echo "<P>Couldn't add record! Actor ($actor_ID) does not exist.</P>";
	exit;
	}
//end of actor check

//check for duplicate AR
//set item to the new item


echo "
<HTML>
<HEAD>
<TITLE>Strawhat Updated Reciept Information</TITLE>
<link rel=\"stylesheet\" href=\"../styles/actors.css\" type=\"text/css\">
</HEAD>
<BODY>
";
include("../styles/banner.inc");	

$sql_checkdup = "SELECT actor_uid, firstname, lastname, actor_ID, item
		FROM actor11, rec11
		WHERE actor_uid = $actor_ID
		AND actor_uid = actor_ID
		AND item = 'AR'";

$sql_result = mysql_query($sql_checkdup,$connection) or die("Couldn't execute Checking Duplicate AR query. Actor ID: $actor_ID, $firstname $lastname");
/*
while ($row = mysql_fetch_array($sql_result) ) {
		$firstname = $row["firstname"];
		$lastname = $row["lastname"];
		$actor_uid = $row["actor_uid"];
		$item = $row["item"];
};
		
	if (mysql_num_rows($sql_result) > 1) {
	echo "<P>Couldn't change record! Actor ($actor_ID) $firstname $lastname AR record already exists!.
	<br>Use the backspace to re-enter.
	</P>";
	exit;
	}

if($new_item == "AR" && $item = "AR"){
	echo "<P>Couldn't change item! Actor ($actor_ID) $firstname $lastname AR record already exists!.
	<br>Use the backspace to re-enter.
	</P>";
	exit;
	}		
	
	
//end of AR duplicate check

//check for duplicate AA
$sql_checkdup = "SELECT actor_uid, firstname, lastname, actor_ID, item
		FROM actor11, rec11
		WHERE actor_uid = $actor_ID
		AND actor_uid = actor_ID
		AND item = 'AA'";

$sql_result = mysql_query($sql_checkdup,$connection) or die("Couldn't execute Checking Duplicate AA query. Actor ID: $actor_ID");

while ($row = mysql_fetch_array($sql_result) ) {
		$firstname = $row["firstname"];
		$lastname = $row["lastname"];
		$actor_uid = $row["actor_uid"];
};
	if (mysql_num_rows($sql_result) > 1) {
	echo "<P>Couldn't change record! Actor ($actor_ID) $firstname $lastname AA record already exists!.
	<br>Use the backspace to re-enter.
	</P>";
	exit;
	}
//end of AA duplicate check
*/
//SQL statement to update record
$sql = "UPDATE rec11 SET actor_ID = \"$actor_ID\",
check_no=\"$check_no\",
memo=\"$memo\",
amount=\"$amount\",
item=\"$item\",
date_entered=\"$date_entered\"
WHERE rec_uid = \"$rec_uid\"
 ";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


if (!$sql_result) {
	echo "<P>Couldn't update record!</P>";
	} else {



echo "	


<h1 align = \"center\">You have made these changes:</h1>

<P align = \"center\">
      Reciept UID: $rec_uid<BR>
      Actor ID: $actor_ID<BR>
      Check No: $check_no<BR>
      Item: $item<BR>
      Amount: $amount<BR>
      Memo: $memo<BR>
      Date: $date_entered
</P>
  
<P align = \"center\"><a href = \"rec_change.php\">Next Entry</a></P>
<P align = \"center\"><a href = \"admin_menu.php\">Admin Menu</a></P>
</BODY>
</HTML>
";
}
?>