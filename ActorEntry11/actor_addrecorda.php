<?php
//POSTED DATA
$username = $_POST['username'];
$pass = $_POST['pass'];
$validpass = $_POST['validpass'];
$firstname = $_POST['firstname'];
$midname = $_POST['midname'];
$lastname = $_POST['lastname'];
$date_entered = $_POST['date_entered'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$region = $_POST['region'];

//phone 
$areacode = $_POST['areacode'];
$phone1 = $_POST['phone1'];
$phone2 = $_POST['phone2'];

$email = $_POST['email'];
$largecity = $_POST['largecity'];
$h_or_serv = $_POST['h_or_serv'];
//$pix_link = $_POST['pix_link'];
//$resume_link = $_POST['resume_link'];
$url1 = $_POST['url1'];
$url2 = $_POST['url2'];
$app_type = $_POST['app_type'];

//TRIM DATA FIRST 11_22_2012
//$resume_link = trim($resume_link);
$username = trim($username);
$pass = trim($pass);
$validpass = trim($validpass);
$firstname = trim($firstname);
$midname = trim($midname);
$lastname = trim($lastname);
//$date_entered = trim($date_entered);
$address = trim($address);
$city = trim($city);
//$state = trim($state);
$zip = trim($zip);
//$region = trim($region);
//$phone = trim($phone);
$email = trim($email);
//$largecity = trim($largecity);
//$h_or_serv = trim($h_or_serv);
//$pix_link = trim($pix_link);
//$resume_link = trim($resume);
$url1 = trim($url1);
$url2 = trim($url2);
//$app_type = trim($app_type);


//ADD SLASHES 11_22_2012
$c_username = addslashes($username);
$c_pass = addslashes($pass);
$c_validpass = addslashes($validpass);

$lastname = addslashes($lastname);
$firstname = addslashes($firstname);
$midname = addslashes($midname);
$address = addslashes($address);
$city = addslashes($city);
$zip = addslashes($zip);
$phone = addslashes(trim($phone) );
$email = addslashes($email);
$url1 = addslashes($url1);
$url2 = addslashes($url2);




echo "
<HTML>
<HEAD>
<TITLE>StrawHat Audition Application</TITLE>
<link rel=\"stylesheet\" href=\"actors.css\" type=\"text/css\">
</HEAD>
<BODY>
";

//logo and banner
	include("banner.inc");

//PARSE TYPE OF CONTACT RECORD - ACTOR
$app_type = "AC";	
	
//PARSING PHONE, RESUME, PICTURE LINKS
//parse phone parts into phone field, spacing?
$phone = $areacode . $phone1 . $phone2;

//parse lastname.firstname.pdf link for resume
$newresume = $lastname . "_" . $firstname . ".pdf";
$resume_link = strtolower($newresume);

//12/1/09 trim link before loading
$resume_link = trim($resume_link);

//parse lastname.firstname.jpg link for picture
$newpix = $lastname . "_" . $firstname . ".jpg";
$pix_link = strtolower($newpix);

//12/1/09 trim link before loading
$pix_link = trim($pix_link);

/*SET UP SQL QUERIES*/
/*ACTOR TABLE........................................*/
	$sql_contact = "INSERT INTO actor11 (firstname, midname, lastname, date_entered, address, city, state, zip, region, phone, email, largecity,  h_or_serv, pix_link, resume_link, url1, url2, app_type) VALUES ('$firstname','$midname', '$lastname', NULL, '$address', '$city', '$state', '$zip', '$region', '$phone', '$email', '$largecity', '$h_or_serv', '$pix_link', '$resume_link', '$url1', '$url2', '$app_type')";


if(!$username) {
	echo" <p>Please enter a username. Use Back button to get to previous screen.</p>";
	exit;
}

if(!$pass) {
	echo" <p>Please enter a password. Use Back button to get to previous screen.</p>";
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
/*Contact/Actor Table*/ 

//check to be added	
$c_first = $firstname;
$c_mid = $midname;
$c_last = $lastname;

//add slashes to check for existing names.
$c_first = addslashes($c_first);
$c_mid = addslashes($c_mid);
$c_last = addslashes($c_last);

	$checkname = "SELECT lastname, firstname, midname 
		FROM actor11 
		WHERE lastname = '$c_last'AND
		midname = '$c_mid'AND
		firstname = '$c_first'
		";

include("../Comm/connect.inc");

/*execute SQL query for checking duplicate names*/
$check_result = mysql_query($checkname,$connection) or die("<p>Couldn't execute CheckName query. If the error persists, take out any slashes, apostrophes, quotes, etc. and try again. Please report the error to us at jay@strawhat-auditions.com</p>");

	if (!$check_result){
	echo "<P>No CheckName Result</P>";
	exit;	
	}

	elseif(mysql_num_rows($check_result) !=0) {

		echo "<p>The Actor name $c_first $c_mid $c_last at $email already exists. If you are trying to change or complete your application, please use the <a href=\"/ActorEntry11/profile_change/actor_searchlastname.php\">change actor link</a>. If you are just starting an application and this name is already being used, please use another name or change it with an initial or middle name.<br><br>
		Use your back button to re-enter your contact information.</p>";
		exit;
	}
//else covers preparing actor data with trim and addslashes
	else {

		//execute SQL query and get result

if(!$connection) 
	include("../Comm/connect.inc");

//using addslashes and trim
$lastname = addslashes($lastname);
$firstname = addslashes(trim($firstname) );
$midname = addslashes(trim($midname) );
$address = addslashes(trim($address) );
$city = addslashes(trim($city) );
//$state = addslashes(trim($state) );
$zip = addslashes(trim($zip) );
$phone = addslashes(trim($phone) );
$email = addslashes(trim($email) );
//$largecity = addslashes(trim($largecity) );
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
		FROM pwd11 
		WHERE pass = '$c_pass'
		";

include("../Comm/connect.inc");

/*execute SQL query for checking duplicate passwords*/
$check_result = mysql_query($checkname,$connection) or die("Couldn't execute CheckName query on Pwd Table.");

	if (!$check_result){
	echo "<P>No CheckName Result. </P>";
	}
		
	elseif(mysql_num_rows($check_result) !=0) {
		echo "<p>The password \"$pass\" already exists. Please use the back button to re-enter your password.<br>
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
$type = 'A';


//add LOCK TABLES to prevent crashes from others using server?
	

include("../Comm/connect.inc");
/*..............................................................*/
//INSERT ACTOR AND PASSWORD DATA INTO DATABASE
$sql_result = mysql_query($sql_contact,$connection) or die("<p>Couldn't execute data insert $firstname $midname $lastname. If the problem persists, check for any apostrophes, quotes, slashes, etc and remove them; then try again. If the problem persists, please contact jay@strawhat-auditions.com</p>");

/*DID ACTOR INSERT SUCCEED*/
	if (!$sql_result) {
	echo "<P>Couldn't add ACTOR record! Use your back button to go back to the Actor entry and try again.</P>";
	exit();
	}
//----------------------------------------------------------------------------//
//GET LATEST ACTOR TABLE UID AND ASSIGN
$sql_num = mysql_insert_id();

//ASSIGN MYSQL_INSERT NUMBER TO  ALL TABLE UIDs...//
$skills_uid = $roles_uid = $phys_uid = $audition_uid = $actor_uid = $pwd_uid = $sql_num;

/*QUERIES*/
/*PASSWORD TABLE QUERY.....................................*/	
$sql_pwd = "INSERT INTO pwd11 (pass_uid, username, pass, type, hint) 
	VALUES ('$pwd_uid', '$username', '$pass', '$type', '$hint')";

/*ALL OTHER TABLES QUERIES
/*.....AUDITION TABLE.......*/
$sql_aud = "INSERT INTO audition11 (audition_uid) 
	VALUES ('$audition_uid')";

/*.....PHYSICAL TABLE .......*/
$sql_phys = "INSERT INTO physical11 (phys_uid) 
	VALUES ('$phys_uid')";

/*.....ROLES TABLE .......*/
$sql_roles = "INSERT INTO roles11 (roles_uid) 
	VALUES ('$roles_uid')";

/*.....SKILLS TABLE .......*/
$sql_skills = "INSERT INTO skills11 (skills_uid) 
	VALUES ('$skills_uid')";
/*...........................................................*/

//execute SQL PASSWORD query and get result
$sql_result = mysql_query($sql_pwd,$connection) or die("Couldn't execute query.");
	
	if (!$sql_result) {
	echo "<P>Couldn't add Password record!</P>";
	} 

	
//execute SQL AUDITION query and get result
$sql_result = mysql_query($sql_aud,$connection) or die("Couldn't execute Audition query.");
	
	if (!$sql_result) {
	echo "<P>Couldn't add Audition record!</P>";
	} 
	
//execute SQL PHYSICAL query and get result
$sql_result = mysql_query($sql_phys,$connection) or die("Couldn't execute query.");
	
	if (!$sql_result) {
	echo "<P>Couldn't add Physical record!</P>";
	} 
	
//execute SQL ROLES query and get result
$sql_result = mysql_query($sql_roles,$connection) or die("Couldn't execute query.");
	
	if (!$sql_result) {
	echo "<P>Couldn't add Roles record!</P>";
	} 
	
//execute SQL SKILLS query and get result
$sql_result = mysql_query($sql_skills,$connection) or die("Couldn't execute query.");
	
	if (!$sql_result) {
	echo "<P>Couldn't add Skills record!</P>";
	} 

echo "
<p>
	Please note your username and password if you have not done so. You can change it at any time by going to the change username/password link or change in the change application link. <br><br>
	
	Click the Finish Application to finish the application, make changes, review and printout your application. <br><br>	
	If you need to come back later to finish your application, use the End Entry button. When you return, go to the change application link to complete your application.</p>
	
<table align=\"center\">
	<tr>
	<td align = \"center\"> 
	<FORM method=\"POST\" action= \"/ActorEntry11/profile_change/changes.php\">
	<input type = \"hidden\" name = \"actor_uid\" value = \"$actor_uid\">
	<INPUT type=\"submit\" value =\"Finish Application\">
	</FORM>	
	</td>

	
	<td align = \"center\">
	<FORM method=\"\" action=\"/actorap.htm\">
	<input type=\"submit\" value=\"End Entry\" name=\"endentry\">
	</form>
	</td>
	
	</tr>	
</table>
</BODY>
</HTML>
";
	}
?>