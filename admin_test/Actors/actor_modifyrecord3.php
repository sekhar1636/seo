<?php


//check to see if (!$actor_uid) is there, and if not
// header("Location: http://www.strawhat-auditions.com/admin/actor_modifyrecord.php");

//create connection
$connection = mysql_connect("127.0.0.1", "JayServer", "wombat") or die ("Couldn't connect to server.");

//select database
$db = mysql_select_db("mydata", $connection) or die("Couldn't select database.");

/*parse values for selected checkboxes
supress error msg by using isset() to test is variable exists - 
variables from checkboxes are not forwarded unless checked -
assign to those not checked to avoid errors and notices
---------------------------------------------------------*/

if(!isset($u_none)) {
	$u_none = NULL;
}
if (!isset($u_sag)){
	$u_sag = NULL;
}
if(!isset($u_emc)) {
	$u_emc = NULL;
}
if(!isset($u_aftra)) {
	$u_aftra = NULL;
}
if(!isset($u_agva)) {
	$u_agva = NULL;
}
if(!isset($u_agma)) {
	$u_agma = NULL;
}


//SQL statement to update record
$sql = "UPDATE actor05 SET actor_uid = \"$actor_uid\",
lastname=\"$lastname\",
firstname=\"$firstname\",
midname=\"$midname\",
region=\"$region\",
phone=\"$phone\",
email=\"$email\",
large_city=\"$large_city\",
intern=\"$intern\",
apprentice=\"$apprentice\",
intern=\"$intern\",
availto=\"$availto\",
availfor=\"$availfor\",
h_or_serv=\"$h_or_serv\",
pix_link=\"$pix_link\",
resume_link=\"$resume_link\",
singing=\"$singing\",
gender=\"$gender\",
u_none=\"$u_none\",
u_sag=\"$u_sag\",
u_aftra=\"$u_aftra\",
u_agva=\"$u_agva\",
u_emc=\"$u_emc\",
u_agma=\"$u_agma\"

WHERE actor_uid = \"$actor_uid\"
 ";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


if (!$sql_result) {
	echo "<P>Couldn't update record!</P>";
	} else {


echo "
<HTML>
<HEAD>
<TITLE>2005 Updated Actor Record</TITLE>
<link rel=\"stylesheet\" href=\"/Members05/admin_test/members.css\" type=\"text/css\">
</HEAD>
<BODY>
";
	include("navbar.inc");
	
echo "	

<h1>You have made these changes:</h1>
<FORM method = \"POST\" action = \"actor_modifyrecord3.php\">

  <table width=\"97%\" border=\"0\">
    <tr> 
      <td width=\"13%\">First Name, Mid:</td>
      <td width=\"32%\">$firstname $midname</td>
      <td width=\"14%\">Last Name: </td>
      <td width=\"41%\">$lastname</td>
    </tr>
    <tr> 
      <td width=\"13%\">Email: $email</td>
      <td width=\"32%\">Phone (h/s/c): $phone ($h_or_serv)</td>
      <td width=\"14%\">Avail From: $availfor</td>
      <td width=\"41%\">Avail To: $availto</td>
    </tr>

    <tr>
      <td width=\"13%\">Gender:</td>
      <td width=\"32%\">$gender</td>
      <td width=\"14%\">Singing:</td>
      <td width=\"41%\">$singing</td>
    </tr>

    <tr>
      <td width=\"13%\">Union Status:</td>
      <td width=\"32%\">$u_none, $u_sag, $u_aftra, $u_agva, $u_emc, $u_agma</td>
      <td colspan=\"2\">App, Intern: $apprentice, $intern</td>
    </tr>

	
	<tr>
      <td width=\"13%\">Location:</td>
      <td width=\"32%\">$large_city</td>
      <td width=\"14%\">Region:</td>
      <td width=\"41%\">$region</td>
    </tr>


    <tr>
      <td width=\"13%\">Available From:</td>
      <td width=\"32%\">$availfor</td>
      <td width=\"14%\">Available To:</td>
      <td width=\"41%\">$availto</td>
    </tr>

    <tr>
      <td width=\"13%\">Picture Link:</td>
      <td width=\"32%\">$pix_link</td>
      <td width=\"14%\">Resume Link:</td>
      <td width=\"41%\">$resume_link</td>
    </tr>

  </table>
  
</FORM>
</BODY>
</HTML>
";
}
?>