<?
$sel_record = $_POST['sel_record'];

session_start();
session_register("valid_user");
$valid_user = rand(1,10000);

//MEMBERS10REMOTE

?>	

<?php

/*IF NO SELECT RECORD, CHECK DROP DOWN LIST*/
//------------------------------------------------------------------
if (!$sel_record) {
	echo "<HTML>
<HEAD>
<link rel=\"stylesheet\" href=\"actors.css\" type=\"text/css\">
</HEAD>
</HTML>
";

//html for logo and strawhat banner
	include("banner.inc");
	echo "<p>Please select your name from the drop down list and enter your username and password.<BR><br>
	<a href=\"member_entrya.php.\">Please Try Again</a></p>
	";

	exit;
	}
//------------------------------------------------------------------------

include("../Comm/connect.inc");

//SQL statement to select record
//get the actor username and password first, test to see if they are okay

//actors vs techies
//TECH-------------------------------------------------------------
//DETERMINE APP TYPE - TECH
$sql_app_type = "SELECT app_type
FROM techies10
WHERE tech_uid = \"$sel_record\"
";

//execute SQL query for apptype
$sql_result = mysql_query($sql_app_type,$connection) or die("Couldn't execute app type query.");

//fetch row and assign to variables
$row = mysql_fetch_array($sql_result);
$app_type = $row["app_type"];

if ($app_type == "TE") {
$sql = "SELECT tech_uid, lastname, firstname, pass_uid, pass, username
FROM techies10, techpwd10
WHERE techies10.tech_uid = \"$sel_record\" AND
techies10.tech_uid = techpwd10.pass_uid
";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");
	
if (!$sql_result) {
	echo "<P>Couldn't get record!</P>";exit();
	} else {
		
//tech
//fetch row and assign to variables
$row = mysql_fetch_array($sql_result);
$tech_uid = $row["tech_uid"];
$lastname = $row["lastname"];
$firstname = $row["firstname"];
//$item = $row["item"];
$pass = $row["pass"];
$username = $row["username"];
	

//encrypt password
trim($p_entered);
trim($u_entered);

//techies section output
// check password, username

$pword = crypt($p_entered,$pass);


if( (crypt($p_entered,$pass)!= $pass) ||
	($username != $u_entered))
	{
	echo "
<HTML>
<HEAD>
<TITLE>StrawHat 2010 Member Staff/Tech/Design - Login Failure</TITLE>
<link rel=\"stylesheet\" href=\"actors.css\" type=\"text/css\">
</HEAD>
<BODY>
";

//html for logo and strawhat banner
	include("banner.inc");

	
	echo "

<H2>StrawHat 2010 Member Entry - Login Failure  (App type: $app_type)</H2>
	
	
	<P>Your Member Login Failed. It may be due to the following:</P>
	";
	
if($p_entered ==""){
	echo "<p>You did not enter a password.</p>";
}

if(!$u_entered){
	echo "<p>You did not enter a username.</p>";
}	
	
if($u_entered !="" && $u_entered != $username) {
	echo "<P>Incorrect username: $u_entered</p>";
}
if ($p_entered != "" && crypt($p_entered,$pass)!= $pass){
	echo "<P>Incorrect password: $p_entered, $pass</P>";
}


echo "	
	
	<P>Please check your username and password. Did you enter both fields? If you have questions about them, or your registration, please contact us at <a href=\"mailto:info@strawhat-auditions.com\">info@strawhat-auditions.com</a>
</body><BR><BR>
	
	
	
	<a href=\"member_entrya.php.\">Please Try Again</a><BR>
	<a href=\"../index.php\">Back to Home Page</a><BR>
	</P>
</FORM>	
</BODY>
</HTML>	
	";
	exit;}
	
else {
		
echo "
<HTML> 
  <HEAD> 
	 <TITLE>StrawHat Auditions Staff Tech Design Members 2010</TITLE><LINK
	 REL=\"STYLESHEET\" HREF=\"members.css\"> 
  </HEAD> 
  <BODY BACKGROUND=\"Bk10a.GIF\"> <SCRIPT SRC=\"navbar.js\"></SCRIPT>
";

include("navbar.inc");

echo"


	 <h2>Welcome $firstname $lastname. App type: $app_type</h2>
	 
	 <P>If you have not done so, please send us your resume in Word, rtf or Adobe pdf format. This is in addition to the online application and many attending theatres request resumes.
	 </P> 

		<P>Staff, tech, design people can find available positions, contract info,
		contacts and other items of interest. The theaters are actively looking for
		technical people, but if you don't hear from them (and want to), use the
		contact information to indicate your interest. <B>Please note: we do not conduct open interviews at the auditions; you must have an
		appointment to get in.</B></P> 

		<P> You can view <B>technical information</B> for
		these theaters by selecting the theatre name. Check out the<B> Links</B> for
		theatres that have web pages, provided at the top of the page.</A> Theatres
		listed who don't have links are being updated and will be linked shortly.</P> 

	<P> Also take advantage of our <B>StrawHat Forum</B> to use with your fellow techies and actors as a resource. We 
	    monitor the questions and weigh in as well on all sorts of questions. </P> 

	 
	 <p>These materials are for the continued use and reference of our participating theatres. If you are an actor or staff tech design candidate that 
	 wishes to update pictures, resumes and/or portfolios, please email them to us at <a href=\"mailto:jay@strawhat-auditions.com\">jay@strawhat-auditions.com</a></p>
</BODY>
</HTML>
";
exit();
}

	
	}
}

//actors section---------------------------------------------------------------

$sql_app_type = "SELECT app_type
FROM actor10
WHERE actor_uid = \"$sel_record\"
";

//execute SQL query for apptype
$sql_result = mysql_query($sql_app_type,$connection) or die("Couldn't execute app type query.");

//fetch row and assign to variables
$row = mysql_fetch_array($sql_result);
$app_type = $row["app_type"];

if ($app_type == "") {
	
	

$sql = "SELECT actor_uid, lastname, firstname, pass_uid, pass, username, app_type
FROM actor10, pwd10
WHERE actor10.actor_uid = \"$sel_record\" AND
actor10.actor_uid = pwd10.pass_uid
";





//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");
	
if (!$sql_result) {
	echo "<P>Couldn't get record!</P>";exit();
	} else {
		
//actors
//fetch row and assign to variables
$row = mysql_fetch_array($sql_result);
$actor_uid = $row["actor_uid"];
$lastname = $row["lastname"];
$firstname = $row["firstname"];
//$item = $row["item"];
$pass = $row["pass"];
$username = $row["username"];

//encrypt password
trim($p_entered);
trim($u_entered);

//SQL statement to select record
//Now check the rec10.actor_ID and item
$sql_rec10 = "SELECT actor_ID, item, date_entered
FROM rec10
WHERE rec10.actor_ID = \"$actor_uid\" AND
item = \"AR\"
";

//execute SQL query and get result	
$sql_recresult = mysql_query($sql_rec10,$connection) or die("Couldn't execute query.");

//get results from receipts table
//fetch row and assign to variables
$row = mysql_fetch_array($sql_recresult);
$item = $row["item"];
$actor_ID = $row["actor_ID"];
$date_entered = $row["date_entered"];
//end of actor section
	}
}

//Did they get an audition?
$sql_rec10Aud = "SELECT actor_ID, item, date_entered, audition_uid, mononly
FROM rec10, audition10
WHERE rec10.actor_ID = \"$actor_uid\" 
AND rec10.actor_ID = audition_uid
AND item = \"AA\"
";

//execute SQL query and get result	
$sql_audresult = mysql_query($sql_rec10Aud,$connection) or die("Couldn't execute query.");
//get results from receipts table for Audition
//fetch row and assign to variables
$row = mysql_fetch_array($sql_audresult);
$aud_item = $row["item"];
$aud_actor_ID = $row["actor_ID"];
$aud_date_entered = $row["date_entered"];
$mononly = $row["mononly"];


// check password, username, and whether Actor registration OR Theatre Registration has been paid
if( (crypt($p_entered,$pass)!= $pass) ||
	($username != $u_entered))
	{
	echo "
<HTML>
<HEAD>
<TITLE>StrawHat 2010 Acting and Theatre Member Entry - Login Failure</TITLE>
<link rel=\"stylesheet\" href=\"actors.css\" type=\"text/css\">
</HEAD>
<BODY>
";

//html for logo and strawhat banner
	include("banner.inc");

	
	echo "

<H2>StrawHat 2010 Actor Member Entry - Login Failure</H2>
	
	
	<P>Your Member Login Failed. It may be due to the following:</P>
	";
	
	

if($p_entered ==""){
	echo "<p>You did not enter a password.</p>";
}

if(!$u_entered){
	echo "<p>You did not enter a username.</p>";
}	
	
if($u_entered !="" && $u_entered != $username) {
	echo "<P>Incorrect username: $u_entered, $username.</p>";
}
if ($p_entered != "" && crypt($p_entered,$pass)!= $pass){
	echo "<P>Incorrect password: $p_entered, $pass</P>";
}

echo "	
	
	<P>Please check your username and password. If you have questions about them, or your registration, please contact us at <a href=\"mailto:info@strawhat-auditions.com\">info@strawhat-auditions.com</a>
</body><BR><BR>
	
	
	
	<a href=\"member_entrya.php.\">Please Try Again</a><BR>
	<a href=\"../index.htm.\">Back to Home Page</a><BR>
	</P>
</FORM>	
</BODY>
</HTML>	
	";
	exit;}
	

	
	
elseif ($item != "AR") {
echo"
<HTML>
<HEAD>
<TITLE>StrawHat 2010 Member Entry - Login Failure</TITLE>
<link rel=\"stylesheet\" href=\"actors.css\" type=\"text/css\">
</HEAD>
<BODY>
";

//html for logo and strawhat banner
	include("banner.inc");

	
	echo "

<H2>StrawHat 2010 Member Entry - Login Failure (App type: $app_type)</H2>
	
	
	<P>Your Member Login Failed. We have not received or have not yet processed your application.</P>
	
	<P>If you have questions about your registration, please contact us at <a href=\"mailto:info@strawhat-auditions.com\">info@strawhat-auditions.com</a>
</body><BR><BR>

	
	<a href=\"member_entrya.php.\">Please Try Again</a><BR>
	<a href=\"../index.php\">Back to Home Page</a><BR>
	</P>
</FORM>	
</BODY>
</HTML>	
	";
	
	
	
	
}

else {
		
echo "
<HTML> 
  <HEAD> 
	 <TITLE>StrawHat Auditions Acting Members 2010</TITLE><LINK
	 REL=\"STYLESHEET\" HREF=\"members.css\"> 
  </HEAD> 
  <BODY BACKGROUND=\"Bk10a.GIF\"> <SCRIPT SRC=\"navbar.js\"></SCRIPT>
";

include("navbar.inc");
//REMOTE PARSINGS ONLY!!!
//parse date_entered for AR
$mo = substr($date_entered, 4,2);
$day = substr($date_entered, 6,2);
$year = substr($date_entered, 0, 4);

$ar_entered = $mo . "-" . $day . "-" . $year;

//strip slashes
$firstname = stripslashes($firstname);
$lastname = stripslashes($lastname);


echo"

	 <h2>Welcome $firstname $lastname</h2>";
// enter the theatre uid here so the registration info does not show	
	 if($actor_uid != 7313) {
	 echo "
	 	<p><b>Registration processed:</b> $ar_entered</p>
";
	 }
//parse date_entered for AA
$aud_mo = substr($aud_date_entered, 5,2);
$aud_day = substr($aud_date_entered, 8,2);
$aud_year = substr($aud_date_entered, 0,4);

$aa_entered = $aud_mo ."-" . $aud_day . "-"  . $aud_year;


//if there is an audition AA and the theatre login does not appear
	if($aud_item && $actor_uid != 7313) {
		echo "<p>
		
		<b>Congratulations $firstname, you were accepted for a ";
		
	switch ($mononly){
		case "D":
			echo "<u>Dancers Audition</u>";
			break;
		case "Y":
			echo "<u>Non-Singing Audition</u>";
			break;
		case "N": 
		 	echo "<u>Singing Audition</u>";
			break;
	}	
		
	
	echo "		
 on $aa_entered!</b> 
 <BR><BR>
 
 <b>Your audition day and time has been mailed to you</b>; when you receive it be sure to check that it is correct. You can also review the complete <a href = \"sched_actors10.php\">Schedule of Actors Auditions</a> by going to Actor Search, which lists all the auditioning actors by last name and includes day/time, type of audition and standbys. Please take the opportunity to review <a href = \"why_list1.php\">The Dreaded List</a> in the articles section of the site; and a copy of the confirmation sent to you by mail <a href =\"";
	
	switch ($mononly){
		case "D":
			echo "dancer10.pdf";
			break;
		case "Y":
			echo "nonsing10.pdf";
			break;
		case "N": 
		 	echo "sing10.pdf";
			break;
	}	
 
 echo " \">here.</a> <BR><BR>If you have not done so, take a moment to review the <a href = \"Audition_Info10.pdf\"><b>Prep for Auditioning Actors</b></a> which covers when to show up, what to bring, what to wear and what to expect. A must read review!</p>
 
 ";
	} 

if($actor_uid != 7313) {
echo "

	 <p><b>We are videotaping the auditions,</b> and your individual audition can be burned on DVD for your future use. The charge is $35 and includes the following:</p>
	 
	 <ul>
	 	<li>A DVD copy suitable to play in a DVD player.</li>
		<li>A CD with an mpeg2 file and an wmv file; suitable for editing and for emailing.</li>
		<li>Both discs are labeled and come in their own cases</li>
		<li>Please allow 1-2 weeks for delivery; shipping is included</li>
	</ul>
";
}

if($actor_uid = 7313) {
echo "

<P><b>Theatres</b>, please take advange of our actor and tech databases. Use the actor searches to begine your search; and if you need more specific searches, please let us know. We can create custom searches in any combination that include the following categories:

<ul>
	<li>Geographic: City, State, Zip, Region
	<li>Physical: gender, height, weight, hair/eye color, age, ethnicity, suit/dress, chest/bust, waist
	<li>Audition Info: Song/Monologue Only/Dancer, availability to/from, apprentice/internship interest
	<li>Other Skills: Vocal Range, Dance: Styles, years studied; Instruments: types, years studied, technical skills: types, rating 1-3, other skills: types, rating 1-3.
	<li>Roles And Shows: Roles, Shows, Theatres, School Attended
</ul>
</p>

<p>So, if you want to find a <i>male baritone that juggles and does stage combat, 6', plays drums, is of Hispanic decent, interested in Apprenticeships and did West Side Story</i> you can find him!<BR>

Similar searches can also be done on Staff Tech Design people. Call us with your searches, we are happy to put them together.
</p>

";
}
echo "	 
 
	 <P> <b>Actors</b>, as you prepare for your audition, take a look at the theaters
		that have registered so far, and the shows they are doing. You may be right for
		many of these shows. Some you may not know, and now would be a good time to do
		some research. In addition, you'll find information on the theatres, including
		intern/apprentice programs, salaries, contract info, contacts and other items
		of interest.</P> 
		
		<P><b>Staff, Tech, Design</b> candidates can view <B>acting and technical information</B> for
		these theaters by selecting the theatre name. Check out the<B> Links</B> for
		theatres that have web pages, provided at the top of the page.</A> Theatres
		listed who don't have links are being updated and will be linked shortly.</P> 

	<P> Also take advantage of our <B>StrawHat Forum</B> to use your fellow actors as 
	a resource. We monitor the questions and weigh in as well on questions regarding audition 
	    material, how to dress, how to prepare for your auditions and other questions. 
	    </P> 

	 
	 <p>These materials are for the continued use and reference of our participating theatres. 
	 If you are an actor or staff tech design candidate that wishes to update pictures or resumes, 
	 please email them to us at <a href=\"mailto:jay@strawhat-auditions.com\">jay@strawhat-auditions.com</a><BR><BR>
	 
	 This site is constantly changing and we appreciate your suggestions for making it better!
	 </p>
</BODY>
</HTML>
";
}
?>