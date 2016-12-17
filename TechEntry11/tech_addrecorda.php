<?php

$username = $_POST['username'];
$firstname = $_POST['firstname'];
$midname = $_POST['midname'];
$lastname = $_POST['lastname'];
$date_entered = $_POST['date_entered'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$region = $_POST['region'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$areacode = $_POST['areacode'];
$phone1 = $_POST['phone1'];
$phone2 = $_POST['phone2'];
$largecity = $_POST['largecity'];
$h_or_serv = $_POST['h_or_serv'];
$pix_link = $_POST['pix_link'];
$resume_link = $_POST['resume'];
$url1 = $_POST['url1'];
$url2 = $_POST['url2'];
$app_type = $_POST['app_type'];

$pass = $_POST['pass'];
$username = $_POST['username'];
$validpass = $_POST['validpass'];

echo "
<HTML>
<HEAD>
<TITLE>StrawHat Staff Tech Design Information</TITLE>
<link rel=\"stylesheet\" href=\"actors.css\" type=\"text/css\">
</HEAD>
<BODY>
";

//logo and banner
	include("banner.inc");

//PARSE TYPE OF CONTACT RECORD - TECH
$app_type = "TE";	
	
//PARSING PHONE, RESUME, PICTURE LINKS
//parse phone parts into phone field, spacing?
$phone = trim($areacode) . trim($phone1) . $phone2;

//parse lastname.firstname.pdf link for resume
$newresume = trim($lastname) . "_" . trim($firstname) . ".pdf";
$resume_link = strtolower($newresume);

//parse lastname.firstname.jpg link for picture
$newpix = trim($lastname) . "_" . trim($firstname) . ".jpg";
$pix_link = strtolower($newpix);

/*SET UP SQL QUERIES*/
/*TECH TABLE........................................*/
	$sql_contact = "INSERT INTO techies11 (firstname, midname, lastname, date_entered, address, city, state, zip, region, phone, email, largecity,  h_or_serv, pix_link, resume_link, url1, url2, app_type) VALUES ('$firstname','$midname', '$lastname', NULL, '$address', '$city', '$state', '$zip', '$region', '$phone', '$email', '$largecity', '$h_or_serv', '$pix_link', '$resume_link', '$url1', '$url2', '$app_type')";


if(!$pass) {
	echo" <p>Please enter a password. Use Back button to get to previous screen.</p>";
	exit;
}
if(!$username) {
	echo" <p>Please enter a username. Use Back button to get to previous screen.</p>";
	exit;
}

if(!$validpass) {
	echo" <p>Please enter a confirming password. Use Back button to get to previous screen.</p>";
	exit;
}

if($pass != $validpass) {
	echo" <p>Your password and confirming password do not match. Use Back button to get to previous screen.</p>";
	exit;
}

/*CHECK DATA INTEGRITY*/
/*Contact/Techie11 Table*/ 

//check to be added	
$c_first = $firstname;
$c_mid = $midname;
$c_last = $lastname;

//---------------new section 011912
//add slashes to check for existing names.
//using addslashes twice to get correct result, do not know why!	

$c_first = addslashes(trim($c_first));
$c_first = addslashes($c_first);

$c_mid = addslashes(trim($c_mid));
$c_mid = addslashes($c_mid);

$c_last = addslashes(trim($c_last));
$c_last = addslashes($c_last);



//---------------end new section---
	$checkname = "SELECT lastname, firstname, midname 
		FROM techies11 
		WHERE lastname = '$c_last' 
		AND midname = '$c_mid'
		AND firstname = '$c_first'
		";

include("../Comm/connect.inc");

/*execute SQL query for checking duplicate names*/
$check_result = mysql_query($checkname,$connection) or die("<p>Couldn't execute CheckName query. If the error persists, take out any slashes, apostrophes, quotes, etc. and try again. Please report the error to us at info@strawhat-auditions.com</p>");

	if (!$check_result){
	echo "<P>No CheckName Result</P>";
	exit;	
	}

	elseif(mysql_num_rows($check_result) !=0) {

		echo "
        <table width = \"85%\" align = \"center\">
        <tr>
        <td>
        <p>The Staff Tech Design name $c_first $c_mid $c_last at $email already exists. If you are trying to change or complete your application, please use the 
        
        <a href=\"../TechEntry11/profile_change/techie_searchlastname.php\">

        
        change Staff Tech Design link</a>. If you are just starting an application and this name is already being used, please use another name or change it with an initial or middle name.<br><br>
		Use your back button to re-enter your contact information.</p>
</td>
</tr>
</table>        
        
";
		
        
        exit;
	}
//else covers preparing actor data with trim and addslashes
	else {

		//execute SQL query and get result

if(!$connection) 
	include("../Comm/connect.inc");

//using addslashes and trim
$lastname = addslashes(trim($lastname) );
$firstname = addslashes(trim($firstname) );
$midname = addslashes(trim($midname) );
$address = addslashes(trim($address) );
$city = addslashes(trim($city) );
$state = addslashes(trim($state) );
$zip = addslashes(trim($zip) );
$phone = addslashes(trim($phone) );
$email = addslashes(trim($email) );
$largecity = addslashes(trim($largecity) );
$url1 = addslashes(trim($url1) );
$url2 = addslashes(trim($url2) );


	}

//CHECK PASSWORD INTEGRITY BEFORE INSERTING
//check password uniqueness, check for validation and insert
/*check that username and password have been entered
---------------------------------------------------------*/


//add slashes to check for existing names.
$c_username = addslashes($username);
$c_pass = addslashes($pass);
$c_validpass = addslashes($validpass);
 //check to make sure password is unique
$c_pass = crypt(trim($pass), '.v');

//get the current password

	$checkname = "SELECT username, pass
		FROM techpwd11 
		WHERE pass = '$c_pass'
		";

include("../Comm/connect.inc");

/*execute SQL query for checking duplicate passwords*/
$check_result = mysql_query($checkname,$connection) or die("Couldn't execute CheckName query on Pwd Table.");

	if (!$check_result){
	echo "<P align = 'center'>No CheckName Result. Please let us know at info@strawhat-auditions.com</P>";
	}
		
	elseif(mysql_num_rows($check_result) !=0) {
		echo "<p align = \"center\">The password \"$pass\" already exists. Please use the back button to re-enter your password.<br>
		";
		echo "</p></BODY></HTML>";
		exit;
	}

	else {
	
		
//add slashes to username, password
//addslashes and trim
$username = addslashes(trim($username));
$pass = addslashes(trim($pass));
$hint = addslashes(trim($hint));
		
//crypt passwords
$pass = crypt(trim($pass), '.v');

//set password type - Actor, Techie or (D)Theatre
$type = 'TE';


//add LOCK TABLES to prevent crashes from others using server?
	

include("../Comm/connect.inc");
/*..............................................................*/
//INSERT TECH AND PASSWORD DATA INTO DATABASE
$sql_result = mysql_query($sql_contact,$connection) or die("<p>Couldn't execute data insert $firstname $midname $lastname. If the problem persists, check for any apostrophes, quotes, slashes, etc and remove them; then try again. If the problem persists, please contact jay@strawhat-auditions.com</p>");

/*DID TECH INSERT SUCCEED*/
	if (!$sql_result) {
	echo "<P align = 'center'>Couldn't add TECH record! Use your back button to go back to the Staff Tech Design entry and try again.</P>";
	exit();
	}
//----------------------------------------------------------------------------//
//GET LATEST TECHIES11 TABLE UID AND ASSIGN
$sql_num = mysql_insert_id();

//ASSIGN MYSQL_INSERT NUMBER TO  ALL TABLE UIDs...//
$techapp_uid = $techroles_uid = $pwd_uid = $tech_uid = $sql_num;

/*QUERIES*/
/*TECH PASSWORD TABLE QUERY.....................................*/	
$sql_pwd = "INSERT INTO techpwd11 (pass_uid, username, pass, type, hint) 
	VALUES ('$pwd_uid', '$username', '$pass', '$type', '$hint')";

/*.....APPLICATION TABLE.......*/
$sql_app = "INSERT INTO techapp11 (techapp_uid) 
	VALUES ('$techapp_uid')";

/*.....TECH ROLES TABLE .......*/
$sql_roles = "INSERT INTO techroles11 (techroles_uid) 
	VALUES ('$techroles_uid')";
/*...........................................................*/

//execute SQL PASSWORD query and get result
$sql_result = mysql_query($sql_pwd,$connection) or die("Couldn't execute query.");
	
	if (!$sql_result) {
	echo "<P>Couldn't add Password record!</P>";
	} 

	
//execute SQL ROLES query and get result
$sql_result = mysql_query($sql_app,$connection) or die("Couldn't execute Staff/Tech/Design Application query.");
	
	if (!$sql_result) {
	echo "<P>Couldn't add Staff/Tech/Design Application record!</P>";
	} 
	
//execute SQL PHYSICAL query and get result
$sql_result = mysql_query($sql_roles,$connection) or die("Couldn't execute Staff/Tech/Design Roles query.");
	
	if (!$sql_result) {
	echo "<P>Couldn't add Staff/Tech/Design Roles record!</P>";
	} 
	

echo "
<table width = \"75%\" align = \"center\">
<tr>
<td>
<p>
	Please note your username and password if you have not done so. You can change it at any time by going to the change username/password link or change in the change application link. </p>
	
<p>	Click the Finish Application to finish the application, make changes, review and printout your application. If you need to come back later to finish your application, use the End Entry button. When you return, go to the change application link to complete your appplication.</p>
</td>
</tr>
</table>
	
<table align=\"center\">
	<tr>
	<td align = \"center\"> 
	<FORM method=\"POST\" action= \"/TechEntry11/profile_change/changes.php\">
	<input type = \"hidden\" name = \"tech_uid\" value = \"$tech_uid\">
	<INPUT type=\"submit\" value =\"Back to Application Menu\">
	</FORM>	
	</td>

	
	<td align = \"center\">
	<FORM method=\"\" action=\"/tekrap.htm\">
	<input type=\"submit\" value=\"Leave Application\" name=\"endentry\">
	</form>
	</td>
	
	</tr>	
</table>
</BODY>
</HTML>
";
	}
?>