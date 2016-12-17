<?php
//TECH MODIFY RECORD 3
$tech_uid = $_POST['tech_uid'];

$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$midname = $_POST['midname'];
//$date_entered = $_POST['date_entered'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$region = $_POST['region'];
//$phone = $_POST['phone'];
$email = $_POST['email'];
$largecity = $_POST['largecity'];
$h_or_serv = $_POST['h_or_serv'];
$url1 = $_POST['url1'];
$url2 = $_POST['url2'];

//phone to be parsed
$areacode = $_POST['areacode'];
$phone1 = $_POST['phone1'];
$phone2 = $_POST['phone2'];


if (!$tech_uid) {
	echo("Can't see tech_uid");
	exit;
	}
	
//check for duplicate names - how to do without checking your existing name as duplicate?	
	

include("../../Comm/connect.inc");

//format strings to correct case
//1/16/07 take out, have to modify further
//$firstname = ucfirst(strtolower($firstname));
//$lastname = ucfirst(strtolower($lastname));
//$midname = ucfirst(strtolower($midname));
//$address = ucwords(strtolower($address));
//$city = ucwords(strtolower($city));
//$state = strtoupper($state);
//$email = strtolower($email);
//$largecity = ucwords(strtolower($largecity));

//parse phone
$phone = $areacode . $phone1 . $phone2;

//add variables to show actual data entry on confirmation
//system on remote uses stripslashes differently than local
$vlastname = htmlspecialchars(stripslashes($lastname));
$vfirstname = htmlspecialchars(stripslashes($firstname));
$vmidname = htmlspecialchars(stripslashes($midname));
$vaddress = htmlspecialchars(stripslashes($address));
$vcity = htmlspecialchars(stripslashes($city));
$vstate = htmlspecialchars(stripslashes($state));
$vzip = htmlspecialchars(stripslashes($zip));
$vphone = htmlspecialchars(stripslashes($phone));
$vemail = htmlspecialchars(stripslashes($email));
$vlargecity = htmlspecialchars(stripslashes($largecity));
$vurl1 = htmlspecialchars(stripslashes($url1));
$vurl2 = htmlspecialchars(stripslashes($url2));


//trim and addslashes for data insert
$lastname = addslashes(trim($lastname));
$firstname = addslashes(trim($firstname));
$midname = addslashes(trim($midname));
$address = addslashes(trim($address ));
$city = addslashes(trim($city));
$state = addslashes(trim($state));
$zip = addslashes(trim($zip));
$phone = addslashes(trim($phone));
$email = addslashes(trim($email));
$largecity = addslashes(trim($largecity));
$url1 = addslashes(trim($url1));
$url2 = addslashes(trim($url2));

//SQL statement to update record

$sql = "UPDATE techies11 SET tech_uid = \"$tech_uid\",
lastname=\"$lastname\",
firstname=\"$firstname\",
midname=\"$midname\",
address=\"$address\",
city = \"$city\",
state = \"$state\",
zip = \"$zip\",
region=\"$region\",
phone=\"$phone\",
email=\"$email\",
largecity=\"$largecity\",
h_or_serv=\"$h_or_serv\",
url1 = \"$url1\",
url2 = \"$url2\"
WHERE tech_uid = \"$tech_uid\"
 ";



//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");

if (!$sql_result) {

	echo "<P>Couldn't get record!</P>";

	} else {

	

//strip slashes for confirmation view
echo "

<HTML>

<HEAD>

<TITLE>Strawhat Updated Actor Information</TITLE>

<link rel=\"stylesheet\" href=\"actors.css\" type=\"text/css\">

</HEAD>

<BODY>

";

include("banner.inc");	




echo "	


<h3 align = 'center'>You have made these changes:</h3>
<FORM method = \"POST\" action = \"changes.php\">
<input type = \"hidden\" name = \"tech_uid\" value = \"$tech_uid\">

<table width=\"65%\" border=\"0\" align = \"center\">
    <tr> 
      <td><b>Name:</b> $vfirstname $vmidname $vlastname</td>
      <td><b>Address:</b> $vaddress</td>
      <td><b>City:</b> $vcity</td>
      <td></td>
    </tr>
    <tr> 
      <td><b>Email:</b> $vemail</td>
      <td><b>Phone (home/service/cell/office):</b> <BR>($h_or_serv) $areacode-$phone1-$phone2 </td>
      <td><b>State:</b> $vstate&nbsp; &nbsp; <b>Zip</b>: $vzip</td>
      <td></td>
    </tr>

	<tr>
      <td><b>Nearest Large City:</b>
";

	if ($largecity == "NA") {
	echo "Large City Shown<td><b>Region:</b>";		
	}
	else echo"
      
      $vlargecity</td>

      <td><b>Region:</b> 
";      
  	switch ($region) {
  		case $region == "MW":
			echo "Midwest";
			break;
		case $region == "NE":
			echo "Northeast";
			break;
		case $region == "NW":
			echo "Northwest";
			break;
		case $region == "S":
			echo "South";
			break;
		case $region == "SE":
			echo "Southeast";
			break;
		case $region == "SW":
			echo "Southwest";
			break;
   case $region == "W";
            echo "West";
            break;
    } 		
echo "  		   
      </td>
      
       <td><b>Website 1:</b> $vurl1<BR><b>Website 2:</b> $vurl2</td>
       <td></td>
      
      
      
    </tr>
  </table>
<p align = \"center\"><INPUT type=\"submit\" value =\"Done\">  </p>
</FORM>
</BODY>
</HTML>
";
}
?>