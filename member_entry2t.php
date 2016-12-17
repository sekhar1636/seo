<?
$sel_record = $_POST['sel_record'];
$u_entered = $_POST['u_entered'];
$p_entered = $_POST['p_entered'];

session_start();
session_register("valid_user");
$valid_user = rand(1,10000);

//MEMBERS10REMOTE - MEMBERENTRY2T, FOR TECH ENTRY

?>	

<?php

/*IF NO SELECT RECORD, CHECK DROP DOWN LIST*/
//------------------------------------------------------------------
if (!$sel_record) {
	echo "
<HTML>
<HEAD>
<TITLE>StrawHat 2010 Member Staff/Tech/Design - Login Failure</TITLE>
<link rel=\"stylesheet\" href=\"/styles/members.css\" type=\"text/css\">
</HEAD>
<BODY BACKGROUND=\"../graphics03/Bk10a.GIF\">
";

//html for logo and strawhat banner
	include("banner.inc");
	echo "<p>Please select your name from the drop down list and enter your username and password.<BR><br>
	<a href=\"member_entrya.php.\">Please Try Again</a></p>
</BODY>
</HTML>	
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
/* code no longer needed 11/2/09
$sql_app_type = "SELECT app_type
FROM techies10
WHERE tech_uid = \"$sel_record\"
";

//execute SQL query for apptype
$sql_result = mysql_query($sql_app_type,$connection) or die("Couldn't execute app type query.");

//fetch row and assign to variables
$row = mysql_fetch_array($sql_result);
$app_type = $row["app_type"];
---------------------------------------------------------------*/

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
<link rel=\"stylesheet\" href=\"/styles/members.css\" type=\"text/css\">
</HEAD>
<BODY BACKGROUND=\"../graphics03/Bk10a.GIF\">
";

//html for logo and strawhat banner
	include("banner.inc");

	
	echo "

<H2>StrawHat 2010 Member Entry - Login Failure</H2>
	
	
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
	 REL=\"STYLESHEET\" HREF=\"/styles/members.css\"> 
  </HEAD> 
  <BODY BACKGROUND=\"../graphics03/Bk10a.GIF\"> <SCRIPT SRC=\"navbar.js\"></SCRIPT>
";

include("navbar.inc");

echo"


	 <h2>Welcome $firstname $lastname.</h2>
	 
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
