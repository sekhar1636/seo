<?php
//physical_modifyrecord3.php 2005

//check to see if (!$phys_uid)
// header("Location: http://www.strawhat-auditions.com/members05/admin_test/actors/actor_modifyrecord.php");

//create connection
$connection = mysql_connect("127.0.0.1", "JayServer", "wombat") or die ("Couldn't connect to server.");

//select database
$db = mysql_select_db("mydata", $connection) or die("Couldn't select database.");

/*parse values for selected checkboxes
supress error msg by using isset() to test is variable exists - 
variables from checkboxes are not forwarded unless checked -
assign to those not checked to avoid errors and notices
---------------------------------------------------------*/

if(!isset($nativeam)) {
	$nativeam = NULL;
}
if (!isset($asian)){
	$asian = NULL;
}
if(!isset($white)) {
	$white = NULL;
}
if(!isset($black)) {
	$black = NULL;
}
if(!isset($hispanic)) {
	$hispanic = NULL;
}
if(!isset($eeurope)) {
	$eeurope = NULL;
}

if(!isset($mideast)) {
	$mideast = NULL;
}

if(!isset($indian)) {
	$indian = NULL;
}

//SQL statement to update record
$sql = "UPDATE physical05 SET height=\"$height\",
weight=\"$weight\",
eye=\"$eye\",
hair=\"$hair\",
age_range=\"$age_range\",
nativeam=\"$nativeam\",
asian=\"$asian\",
white=\"$white\",
black=\"$black\",
hispanic=\"$hispanic\",
eeurope=\"$eeurope\",
mideast=\"$mideast\",
indian=\"$indian\"
WHERE phys_uid = \"$phys_uid\"
 ";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


if (!$sql_result) {
	echo "<P>Couldn't update record!</P>";
	} else {


echo "
<HTML>
<HEAD>
<TITLE>2005 Updated Physical Record</TITLE>
<link rel=\"stylesheet\" href=\"/Members05/admin_test/members.css\" type=\"text/css\">
</HEAD>
<BODY>
";
	include("navbar.inc");
	
echo "	

<h1>You have made these changes:</h1>
<FORM method = \"POST\" action = \"physical_modifyrecord3.php\">

  <table width=\"97%\" border=\"0\">
    <tr> 
      <td width=\"13%\">phys_uid:</td>
      <td width=\"32%\">$phys_uid</td>
      <td width=\"14%\">Height, Weight: </td>
      <td width=\"41%\">$height, $weight</td>
    </tr>
    <tr> 
      <td width=\"13%\">Eye, Hair:</td>
      <td width=\"32%\">$eye, $hair</td>
      <td width=\"14%\">Age Range:</td>
      <td width=\"41%\">$age_range</td>
    </tr>

    <tr>
      <td width=\"13%\">Type:</td>
      <td colspan=\"3\">$nativeam $asian $white $black $hispanic $eeurope $mideast $indian</td>

    </tr>

  </table>
  
</FORM>
</BODY>
</HTML>
";
}
?>