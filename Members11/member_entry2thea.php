<?php
    
$sel_record = $_POST['sel_record'];
$u_entered = $_POST['u_entered'];
$p_entered = $_POST['p_entered'];

session_start();
$_SESSION['sess_var'] = rand(1,10000);
//updated session code 1/21/13
//$valid_user = rand(1,10000);
//session_register("valid_user");

//unset($_SESSION['sess_var']);

//session_register("valid_user");
//$valid_user = rand(1,10000);

//MEMBERS11REMOTE - MEMBERENTRY2T, FOR THEATRE ENTRY

?>	

<?php

/*IF NO SELECT RECORD, CHECK DROP DOWN LIST*/
//------------------------------------------------------------------
if (!$sel_record) {
	echo "
<HTML>
<HEAD>
<TITLE>StrawHat Theatres - Login Failure</TITLE>
<link rel=\"stylesheet\" href=\"/styles/members.css\" type=\"text/css\">
</HEAD>
<BODY BACKGROUND=\"../graphics03/Bk10a.GIF\">
";

//html for logo and strawhat banner
	include("banner.inc");
	echo "<p>Please select your name from the drop down list and enter your username and password.<BR><br>
	<a href=\"member_entrya.php\">Please Try Again</a></p>
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
FROM techies11
WHERE tech_uid = \"$sel_record\"
";

//execute SQL query for apptype
$sql_result = mysql_query($sql_app_type,$connection) or die("Couldn't execute app type query.");

//fetch row and assign to variables
$row = mysql_fetch_array($sql_result);
$app_type = $row["app_type"];
---------------------------------------------------------------*/

$sql = "SELECT thea_uid, lastname, firstname, pass_uid, pass, username
FROM theatre11, theapwd11
WHERE theatre11.thea_uid = \"$sel_record\" AND
theatre11.thea_uid = theapwd11.pass_uid
";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");
	
if (!$sql_result) {
	echo "<P>Couldn't get record!</P>";exit();
	} else {
		
//tech
//fetch row and assign to variables
$row = mysql_fetch_array($sql_result);
$thea_uid = $row["thea_uid"];
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
<TITLE>StrawHat Theatre - Login Failure</TITLE>
<link rel=\"stylesheet\" href=\"/styles/members.css\" type=\"text/css\">
</HEAD>
<BODY BACKGROUND=\"../graphics03/Bk10a.GIF\">
";

//html for logo and strawhat banner
	include("banner.inc");

	
	echo "

<H2>StrawHat Theatre Entry - Login Failure</H2>
	
	
	<P>Your Member Theatre Failed. It may be due to the following:</P>
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
	echo "<P>Incorrect password: $p_entered</P>";
}


echo "	
	
	<P>Please check your username and password. Did you enter both fields? If you have questions about them, or your registration, please contact us at <a href=\"mailto:info@strawhat-auditions.com\">info@strawhat-auditions.com</a>
</body><BR><BR>
	
	
	
	<a href=\"member_entrya.php\">Please Try Again</a><BR>
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
	 <TITLE>StrawHat Auditions Theatre Members</TITLE><LINK
	 REL=\"STYLESHEET\" HREF=\"/styles/members.css\"> 
  </HEAD> 
  <BODY BACKGROUND=\"../graphics03/Bk10a.GIF\"> <SCRIPT SRC=\"navbar.js\"></SCRIPT>
";

include("navbar.inc");

echo"


	 <h2 align = \"center\">Welcome $firstname $lastname.</h2>
	 
<table width = \"70%\" align = \"center\">
<tr>	 
<td>
<p>Theatre companies, please send your theatre description page in Word, rtf or Adobe pdf format for the attending actors to use at the auditions. This is in addition to the online application that you provided about your theatre.
</p>

<p>	 <a href = \"StrawHatBrowserSetup.pdf\" target=\"myNewWin\" onClick=\"sendme()\"> Please review our recommendations for using tabs with your browser</a>.
</p>

<p>
		Staff, tech, design people will find your theatre information, available positions, contract info,
		contacts and other items of interest that you provide. As you may know, StrawHats do not conduct open interviews at the auditions; companies make appointments with prospective applicants during the auditions and provide a list to StrawHat and Security at Pace.
</p>         

<p>
Also take advantage of our FAQ's or forum to use as a resource to reach out to candiates coming to StrawHat.
</P> 

<p>Let us know what we can do to make StrawHats to work for you. Email us at
 <a href=\"mailto:info@strawhat-auditions.com\">info@strawhat-auditions.com</a>
</p>
</td>
</tr>
</table>

</BODY>
</HTML>
";
exit();
}

	
	}
?>