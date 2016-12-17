<?php
include("../admin11/session.inc");

$sel_record = $_POST['sel_record'];
//$actor_ID = $_POST['actor_ID']; NOT NEEDED 8/22/13

if ((!$sel_record)) {
	header("rec_change3.php");
	echo " No sel_record";
	exit;
}

include("../Comm/connect.inc");

//SQL statement to select record
$sql = "SELECT * FROM rec11 WHERE rec_uid = \"$sel_record\"";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


if (!$sql_result) {
	echo "<P>Couldn't get record!</P>";
	} else {
	

//fetch row and assign to variables
$row = mysql_fetch_array($sql_result);
$rec_uid = $row["rec_uid"];
$actor_ID = $row["actor_ID"];
$check_no = $row["check_no"];
$memo = $row["memo"];
$amount = $row["amount"];
$old_item = $row["item"];
$date_entered = $row["date_entered"];

//stripslashes
$memo = htmlspecialchars(stripslashes($memo));

echo "
<html>
<head>
<title>StrawHat Change Receipt</title>
<link rel=\"stylesheet\" href=\"../styles/actors.css\" type=\"text/css\">
</head>

<body>
";
include("../styles/banner.inc");

//<h1 align = \"center\">Please change Receipt Record($rec_uid):</h1> taken out 8/22/13
echo "
<form name=\"rec_change3\" method=\"post\" action=\"rec_change4.php\">
<input type = \"hidden\" name = \"rec_uid\" value = \"$rec_uid\">
<input type = \"hidden\" name = \"actor_ID\" value = \"$actor_ID\">  

<table border=\"1\" height=\"193\" align=\"center\" width=\"750\">
    <tr>
    <td><img src=\"../graphics03/straw99.gif\" width=\"127\" height=\"97\"></td>
    <td>
        <h1 align = \"center\">Change RECEIPTS ENTRY</h1>
    </td>
  </tr>

  <tr> 
      <td colspan=\"2\" align = \"center\"><b>Enter Transaction: <INPUT type=\"submit\" value =\"Change Reciept\"></b></td>
  </tr>
  <tr> 
    <td>
        Actor ID: 
        <input type=\"text\" name=\"actor_ID\" tabindex=\"1\" value=\"$actor_ID\"><BR>
        Date Entered:
        <input type=\"text\" name=\"date_entered\" tabindex=\"1\" value=\"$date_entered\">
    </td>
	  <td>Check Number: &nbsp; 
        <input type=\"text\" name=\"check_no\" maxlength=\"9\" tabindex=\"2\" value=\"$check_no\">
        <br>
        <br>
        Type of Payment: 
        <select name=\"item\" tabindex=\"3\">
 ";
		if($old_item == "AR") {
	  	echo "<option  selected value=\"AR\">Actor Registration</option>"; }
		else {echo "<option value=\"AR\">Actor Registration</option>";}
       
 		if($old_item == "AA") {
	  	echo "<option  selected value=\"AA\">Actor Audition</option>"; }
		else {echo "<option value=\"AA\">Actor Audition</option>";}
        
		if($old_item == "AC") {
	  	echo "<option  selected value=\"AC\">Actor Change Audition</option>"; }
		else {echo "<option value=\"AC\">Actor Change Audition</option>";}
        
		if($old_item == "AB") {
	  	echo "<option  selected value=\"AB\">Actor Bounced Check</option>"; }
		else {echo "<option value=\"AB\">Actor Bounced Check</option>";}
        
		if($old_item == "TR") {
	  	echo "<option  selected value=\"TR\">Thea Registration</option>"; }
		else {echo "<option value=\"TR\">Thea Registration</option>";}
		
		if($old_item == "TC") {
	  	echo "<option  selected value=\"TC\">Thea Callback Rm</option>"; }
		else {echo "<option value=\"TC\">Thea Callback Rm</option>";}
		
		if($old_item == "TP") {
	  	echo "<option  selected value=\"TP\">Thea Piano</option>"; }
		else {echo "<option value=\"TP\">Thea Piano</option>";}

		if($old_item == "BK") {
	  	echo "<option  selected value=\"BK\">Audition Books</option>"; }
		else {echo "<option value=\"BK\">Audition Books</option>";}
		
		if($old_item == "PT") {
	  	echo "<option  selected value=\"PT\">Tech Portfolio</option>"; }
		else {echo "<option value=\"PT\">Tech Portfolio</option>";}
		
		if($old_item == "MT") {
	  	echo "<option  selected value=\"MT\">Tech Music File</option>"; }
		else {echo "<option value=\"MT\">Tech Music File</option>";}
		
		if($old_item == "OT") {
	  	echo "<option  selected value=\"OT\">Other</option>"; }
		else {echo "<option value=\"OT\">Other</option>";}
		
echo "		
        </select>
        &nbsp;Amount: 
        <input type=\"text\" name=\"amount\" maxlength=\"9\" size=\"9\" tabindex=\"4\" value=\"$amount\">
        <br>
        <br>
        Memo: 
        <input type=\"text\" name=\"memo\" maxlength=\"30\" size=\"30\" tabindex=\"5\" value=\"$memo\">
      </td>
  </tr>
</table>
  </form>
</body>
</html>
";
	}
?>