<?php
//POSTED DATA

//$type_lastname = addslashes(trim($type_lastname));
//12/17/14 added this style of slashes, trim, etc. WORKS!!
$company = addslashes(trim($_POST['company']));
$username = addslashes(trim($_POST['username']));
$pass = addslashes(trim($_POST['pass']));
$hint = addslashes(trim($_POST['hint']));
$validpass = addslashes(trim($_POST['validpass']));
$firstname = addslashes(trim($_POST['firstname']));
$midname = addslashes(trim($_POST['midname']));
$lastname = addslashes(trim($_POST['lastname']));
//$date_entered = $_POST['date_entered'];
$address = addslashes(trim($_POST['address']));
$city = addslashes(trim($_POST['city']));
$state = addslashes(trim($_POST['state']));
$zip = addslashes(trim($_POST['zip']));
$region = addslashes(trim($_POST['region']));

//phone 
$areacode = $_POST['areacode'];
$phone1 = $_POST['phone1'];
$phone2 = $_POST['phone2'];

$email = $_POST['email'];
$largecity = $_POST['largecity'];
$h_or_serv = $_POST['h_or_serv']; 
// 8/30/13 was no home or service choice on form, restored.
//$pix_link = $_POST['pix_link'];
//$resume_link = $_POST['resume_link'];
$url1 = $_POST['url1'];
$url2 = $_POST['url2'];
//$app_type = $_POST['app_type'];

//theatre names, titles of REPS
$rep1 = $_POST['rep1'];
$rep2 = $_POST['rep2'];
$rep3 = $_POST['rep3'];
$rep4 = $_POST['rep4'];
$rep5 = $_POST['rep5'];

$title1 = $_POST['title1'];
$title2 = $_POST['title2'];
$title3 = $_POST['title3'];
$title4 = $_POST['title4'];
$title5 = $_POST['title5'];
/*
$sat = $_POST['sat'];
$sun = $_POST['sun'];
$mon = $_POST['mon'];
$web_only = $_POST['web_only'];
echo "DAY: $sat";
*/

//TRIM DATA FIRST 11_22_2012
//$resume_link = trim($resume_link);
$username = trim($username);
$pass = trim($pass);
$hint = trim($hint);
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

//days will be attending

//trim reps, titles
$rep1 = trim($rep1);
$rep2 = trim($rep2);
$rep3 = trim($rep3);
$rep4 = trim($rep4);
$rep5 = trim($rep5);

$title1 = trim($title1);
$title2 = trim($title2);
$title3 = trim($title3);
$title4 = trim($title4);
$title5 = trim($title5);

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
//$phone = addslashes(trim($phone) );
$email = addslashes($email);
$url1 = addslashes($url1);
$url2 = addslashes($url2);



echo "
<HTML>
<HEAD>
<TITLE>StrawHat Auditions Theatre Application</TITLE>
<link rel=\"stylesheet\" href=\"members.css\" type=\"text/css\">
</HEAD>
<BODY>
";

//logo and banner
	include("banner.inc");

//PARSE TYPE OF CONTACT RECORD - THEATRE
$app_type = "TH";	
	
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
	$sql_contact = "INSERT INTO theatre11 (company, firstname, midname, lastname, date_entered, address, city, state, zip, region, phone, email, largecity, h_or_serv, pix_link, resume_link, url1, url2, app_type, 
    rep1, rep2, rep3, rep4, rep5, title1, title2, title3, title4, title5)
     
    VALUES ('$company','$firstname','$midname', '$lastname', NULL, '$address', '$city', '$state', '$zip', '$region', '$phone', '$email', '$largecity', '$h_or_serv', '$pix_link', '$resume_link', '$url1', '$url2', '$app_type',
    '$rep1', '$rep2', '$rep3', '$rep4', '$rep5', '$title1', '$title2', '$title3', '$title4', '$title5')";


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
/*Do we need this for theatres?*/
/*Company/Theatre Table*/ 

//check to be added	
$c_first = $firstname;
$c_mid = $midname;
$c_last = $lastname;

//add slashes to check for existing names.
$c_first = addslashes($c_first);
$c_mid = addslashes($c_mid);
$c_last = addslashes($c_last);

	$checkname = "SELECT lastname, firstname, midname 
		FROM theatre11 
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

		echo "<p>The Theatre Contact name $c_first $c_mid $c_last at $email already exists. If you are trying to change or complete your application, please use the <a href=\"/TheatreEntry11/profile_change/thea_searchlastname.php\">change theatre link</a>. If you are just starting an application and this name is already being used, please use another name or change it with an initial or middle name.<br>
        <br>
		Use your back button to re-enter your contact information.</p>";
		exit;
	}
//else covers preparing actor data with trim and addslashes
	else {

		//execute SQL query and get result

if(!$connection) 
	include("../Comm/connect.inc");

//using addslashes and trim
$company = addslashes($company);
$lastname = addslashes($lastname);
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

$rep1 = addslashes(trim($rep1) );
$rep2 = addslashes(trim($rep2) );
$rep3 = addslashes(trim($rep3) );
$rep4 = addslashes(trim($rep4) );
$rep5 = addslashes(trim($rep5) );

$title1 = addslashes(trim($title1) );
$title2 = addslashes(trim($title2) );
$title3 = addslashes(trim($title3) );
$title4 = addslashes(trim($title4) );
$title5 = addslashes(trim($title5) );
    
    
    
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
		FROM theapwd11 
		WHERE pass = '$c_pass'
		";

include("../Comm/connect.inc");

/*execute SQL query for checking duplicate passwords*/
$check_result = mysql_query($checkname,$connection) or die("Couldn't execute CheckName query on Theatre Pwd Table.");

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

//set password type - Actor, Techie or (TH)Theatre
$type = 'TH';


//add LOCK TABLES to prevent crashes from others using server?
	

include("../Comm/connect.inc");
/*..............................................................*/
//INSERT THEATRE AND PASSWORD DATA INTO DATABASE
$sql_result = mysql_query($sql_contact,$connection) or die("<p>Couldn't execute theatre data insert $firstname $midname $lastname ($rep1, $title1, $rep2, $title2). If the problem persists, check for any apostrophes, quotes, slashes, etc and remove them; then try again. If the problem persists, please contact jay@strawhat-auditions.com.</p>");

/*DID THEATRE INSERT SUCCEED*/
	if (!$sql_result) {
	echo "<P>Couldn't add THEATRE record! Use your back button to go back to the Theatre Entry and try again.</P>";
	exit();
	}
//----------------------------------------------------------------------------//
//GET LATEST THEATRE TABLE UID AND ASSIGN
$sql_num = mysql_insert_id();

//ASSIGN MYSQL_INSERT NUMBER TO ALL TABLE UIDs...//
$thea_uid = $skills_uid = $pass_uid = $perf_uid = $sql_num;

/*QUERIES*/
/*PASSWORD TABLE QUERY.....................................*/	
$sql_theapwd = "INSERT INTO theapwd11 (pass_uid, username, pass, type, hint) 
	VALUES ('$pass_uid', '$username', '$pass', '$type', '$hint')";
    
$sql_theaskills  = "INSERT INTO theaskills12 (skills_uid) 
    VALUES ('$skills_uid')";
        
$sql_theaperf  = "INSERT INTO theaperf11 (perf_uid) 
    VALUES ('$perf_uid')";    
    
/*ALL OTHER TABLES QUERIES
/*.....AUDITION TABLE.......*/
/*$sql_aud = "INSERT INTO audition11 (audition_uid) 
	VALUES ('$audition_uid')";
10/25/12 */

/*.....PHYSICAL TABLE .......*/
/*$sql_phys = "INSERT INTO physical11 (phys_uid) 
	VALUES ('$phys_uid')";
10/25/12 */
/*.....ROLES TABLE .......*/
/*$sql_roles = "INSERT INTO roles11 (roles_uid) 
	VALUES ('$roles_uid')";
10/25/12 */
/*.....SKILLS TABLE .......*/
/*$sql_skills = "INSERT INTO skills11 (skills_uid) 
	VALUES ('$skills_uid')";
10/25/12 */    
/*10/25/12 not needed...........................................................*/

//execute SQL PASSWORD query and get result
$sql_result = mysql_query($sql_theapwd,$connection) or die("Couldn't execute query.");
	
	if (!$sql_result) {
	echo "<P>Couldn't add Password record!</P>";
	}
    
//sql_theaskills     
$sql_result = mysql_query($sql_theaskills,$connection) or die("Couldn't execute query.");
    
    if (!$sql_result) {
    echo "<P>Couldn't add Thea Skill record!</P>";
    } 

//sql_theaperf     
$sql_result = mysql_query($sql_theaperf,$connection) or die("Couldn't execute query.");
    
    if (!$sql_result) {
    echo "<P>Couldn't add Thea Perf record!</P>";
    } 

	
//execute SQL AUDITION query and get result
/*
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
*/
echo "
<p align = \"center\">
	Please note your username and password. To change it go to the change username/password link or the change application link.
</p>
	
<p align = \"center\">	
    Click the Finish Application to go to the other sections of the application;  or make changes, review and printout your application. </p>

<p align = \"center\">        	
	If you need to come back later to finish your application, use the End Entry button. When you return, go to the change application link to complete your appplication.</p>
	
<table align=\"center\">
	<tr>
	<td align = \"center\"> 
	<FORM method=\"POST\" action= \"/TheatreEntry11/profile_change/changes.php\">
	<input type = \"hidden\" name = \"thea_uid\" value = \"$thea_uid\">
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