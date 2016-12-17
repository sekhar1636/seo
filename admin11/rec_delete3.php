<?php
$sel_record = $_POST['sel_record'];

if ((!$sel_record)) {
	header("rec_delete2.php");
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
$item = $row["item"];


//stripslashes
$memo = htmlspecialchars(stripslashes($memo));

echo "
<html>
<head>
<title>StrawHat Delete Receipts</title>
<link rel=\"stylesheet\" href=\"../styles/actors.css\" type=\"text/css\">
</head>

<body>
";
include("../styles/banner.inc");
echo "
<h1 align = \"center\">Delete Receipt Information here?: ($rec_uid)</h1>
<form name=\"rec_change3\" method=\"post\" action=\"rec_delete4.php\">
<input type = \"hidden\" name = \"rec_uid\" value = \"$rec_uid\">  
<table border=\"1\" height=\"193\" align=\"center\" width=\"750\">
    <tr>
    <td><img src=\"../graphics03/straw99.gif\" width=\"127\" height=\"97\"></td>
    <td>
        <h1>Delete RECEIPTS ENTRY</h1>
    </td>
  </tr>

  <tr> 
      <td colspan=\"2\"><b>Enter Transaction: <INPUT type=\"submit\" value =\"Delete Reciept\"></b></td>
  </tr>
  <tr> 
    <td>
        Actor ID: 
        <input type=\"text\" name=\"actor_ID\" tabindex=\"1\" value=\"$actor_ID\">
    </td>
	  <td>Check Number: &nbsp; 
        <input type=\"text\" name=\"check_no\" maxlength=\"9\" tabindex=\"2\" value=\"$check_no\">
        <br>
        <br>
        Type of Payment: 
        <select name=\"item\" tabindex=\"3\">
 ";
		if($item == "AR") {
	  	echo "<option  selected value=\"AR\">Actor Registration</option>"; }
		else {echo "<option value=\"AR\">Actor Registration</option>";}
       
 		if($item == "AA") {
	  	echo "<option  selected value=\"AA\">Actor Audition</option>"; }
		else {echo "<option value=\"AA\">Actor Audition</option>";}
        
		if($item == "AC") {
	  	echo "<option  selected value=\"AC\">Actor Change Audition</option>"; }
		else {echo "<option value=\"AC\">Actor Change Audition</option>";}
        
		if($item == "AB") {
	  	echo "<option  selected value=\"AB\">Actor Bounced Check</option>"; }
		else {echo "<option value=\"AB\">Actor Bounced Check</option>";}
        
		if($item == "TR") {
	  	echo "<option  selected value=\"TR\">Thea Registration</option>"; }
		else {echo "<option value=\"TR\">Thea Registration</option>";}
		
		if($item == "TC") {
	  	echo "<option  selected value=\"TC\">Thea Callback Rm</option>"; }
		else {echo "<option value=\"TC\">Thea Callback Rm</option>";}
		
		if($item == "TP") {
	  	echo "<option  selected value=\"TP\">Thea Piano</option>"; }
		else {echo "<option value=\"TP\">Thea Piano</option>";}

		if($item == "BK") {
	  	echo "<option  selected value=\"BK\">Audition Books</option>"; }
		else {echo "<option value=\"BK\">Audition Books</option>";}
		
		if($item == "PT") {
	  	echo "<option  selected value=\"PT\">Tech Portfolio</option>"; }
		else {echo "<option value=\"PT\">Tech Portfolio</option>";}
		
		if($item == "MT") {
	  	echo "<option  selected value=\"MT\">Tech Music File</option>"; }
		else {echo "<option value=\"MT\">Tech Music File</option>";}
		
		if($item == "OT") {
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