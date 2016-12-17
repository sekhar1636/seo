<?php
$rec_uid = $_POST['rec_uid'];
$actor_ID = $_POST['actor_ID'];
$check_no = $_POST['check_no'];
$memo = $_POST['memo'];
$amount = $_POST['amount'];
$item = $_POST['item'];

if (!$rec_uid) {
	echo("Can't see rec_uid");
	exit;
	}

include("../Comm/connect.inc");



//SQL statement to delete record
$sql = "DELETE FROM rec11
WHERE rec_uid = \"$rec_uid\"
 ";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


if (!$sql_result) {
	echo "<P>Couldn't update record!</P>";
	} else {

echo "
<HTML>
<HEAD>
<TITLE>Strawhat Delete Reciept Information</TITLE>
<link rel=\"stylesheet\" href=\"../styles/actors.css\" type=\"text/css\">
</HEAD>
<BODY>
";
include("../styles/banner.inc");	


echo "	


<h1>You have deleted: </h1>

<P>
      Reciept UID: $rec_uid<BR>
      Actor ID: $actor_ID<BR>
      Check No: $check_no<BR>
      Item: $item<BR>
      Amount: $amount<BR>
      Memo: $memo
</P>
  
<P><a href = \"admin_menu.php\">Back to <b>Admin Menu</b></a></P>
</BODY>
</HTML>
";
}
?>