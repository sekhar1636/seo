<?php
include("../admin11/session.inc");

$actor_ID = $_POST['actor_ID'];
$item = $_POST['item'];
$other_amt = $_POST['other_amt'];
$check_no = $_POST['check_no'];
$memo = $_POST['memo'];	

?>

<!-- <DOCTYPE HTML PUBLIC "-//W3C/DTD HTML 3.2//EN"> -->
<HTML>
<HEAD>
<TITLE>Adding record to Reciepts Table</TITLE>
<link rel="stylesheet" href="../styles/actors.css" type="text/css">
</HEAD>
<BODY>


<?php

include("../styles/banner.inc");


//set up value for amount insertion
// a/o 11/12/2015 categories and pricing
switch ($item)
{
case "AR" : //actor registration
	$amount = 40;
	break;
case "AA" : //actor audition
	$amount = 55;
	break;
case "AB" : //actor bounced check
	$amount = 25;
	break;
case "AC" : //actor change audition
    $amount = 25;
    break;        
//THEATRE
case "TR" : //thea registration
	$amount = 130;
	break;
case "OD" : //ONE DAY THEA REG
    $amount = 60;
    break;
case "WO" : //WEB ONLY
    $amount = 35;
    break;
//CALLBACK ROOMS
case "AD" : //ALL DAY ACCESS
    $amount = 250;
    break;
case "DO" : //DAYTIME ONLY
    $amount = 150;
    break;
case "EV" : //EVENING AFTER DANCE CALL
    $amount = 150;
    break;
case "TC" : //thea callback room
	$amount = 150;
	break;
case "TP" : //THEATRE PIANO
	$amount = 250;
	break;
case "BK" : //BOOKS ADDITIONAL
	$amount = 50;
	break;
case "DV" : //DVD SET OF AUDTIONS
    $amount = 75;
    break;    
case "PT" : //tech portfolio
	$amount = 0;
	break;
case "TM" : //tech music file
	$amount = 0;
case "OT" : //other amount
	$amount = $other_amt;
	break;
default :
	$amount = 0;
	break;
} 

//using addslashes and trim
$memo = addslashes(trim($memo) );


//actor_ID is the actor_uid input from the previous page
//query to check if the actor_uid # exists in actor table
$sql_checkactor = "SELECT actor_uid
		FROM actor11
		WHERE actor_uid = $actor_ID
		";

include("../Comm/connect.inc");

$sql_result = mysql_query($sql_checkactor,$connection) or die("The Actor UID ($actor_ID) does not exist. Check the number and make sure that the number was entered in the correct field.");

	if (mysql_num_rows($sql_result) == 0) {
	echo "<P>Couldn't add record! Actor ($actor_ID) does not exist.</P>";
	exit;
	}
//end of actor check

//check for duplicate AR

$sql_checkdup = "SELECT actor_uid, firstname, lastname, actor_ID, item
		FROM actor11, rec11
		WHERE actor_uid = $actor_ID
		AND actor_uid = actor_ID
		AND item = 'AR'";

$sql_result = mysql_query($sql_checkdup,$connection) or die("Couldn't execute Checking Duplicate AR query. Actor ID: $actor_ID, $firstname $lastname");

while ($row = mysql_fetch_array($sql_result) ) {
		$firstname = $row["firstname"];
		$lastname = $row["lastname"];
		$actor_uid = $row["actor_uid"];
};
if($item == "AR") {		
	if (mysql_num_rows($sql_result) > 0) {
	echo "<P>Couldn't add record! Actor ($actor_ID) $firstname $lastname AR record already exists!.
	<br>Use the backspace to re-enter.
	</P>";
	exit;
	}
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

if($item == "AA") {
	if (mysql_num_rows($sql_result) > 0) {
	echo "<P>Couldn't add record! Actor ($actor_ID) $firstname $lastname AA record already exists!.
	<br>Use the backspace to re-enter.
	</P>";
	exit;
	}
}
//end of AA duplicate check

/*set up sql queries*/
	$sql = "INSERT INTO rec11 (actor_ID, date_entered, check_no, memo, item, amount) 
	VALUES ('$actor_ID', NULL, '$check_no', '$memo', '$item', '$amount')";
	



		//execute SQL query and get result
if(!$connection) 
	include("../Comm/connect.inc");

//using addslashes and trim
$check_no = addslashes(trim($check_no) );
$memo = addslashes(trim($memo) );

$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");

	if (!$sql_result) {
	echo "<P>Couldn't add record!</P>";
	} else {

$sql_getname = "SELECT actor_uid, firstname, lastname
		FROM actor11
		WHERE actor_uid = $actor_ID
";

$sql_result = mysql_query($sql_getname,$connection) or die("Couldn't execute Checking Duplicate AA query. Actor ID: $actor_ID");

while ($row = mysql_fetch_array($sql_result) ) {
		$firstname = $row["firstname"];
		$lastname = $row["lastname"];
		$actor_uid = $row["actor_uid"];
};

//stripslashes
	$firstname = stripslashes($firstname);
	$lastname = stripslashes($lastname);

	
			echo "
	<P><B>Record added!</B>
	Actor ID: $actor_ID, $firstname $lastname<BR>
	Check Number: $check_no<BR>
	Memo: $memo<BR>
	Item: $item <BR>
	Amount: $amount
</P>

<P><a href=\"rec.php\">Return to Receipts Entry</a>

</BODY>
</HTML>	
";
  }
?>
