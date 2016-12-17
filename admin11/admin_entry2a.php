<?php
$sel_record = $_POST['sel_record'];
$u_entered= $_POST['u_entered'];
$p_entered = $_POST['p_entered'];
$app_type = $_POST['app_type'];
$new_actor_uid = $_POST['new_actor_uid'];

session_start();
$_SESSION['sess_var'] = rand(1,10000);
?>	

<?php

if (!$sel_record) {
	echo "<HTML>
<HEAD>
<link rel=\"stylesheet\" href=\"../styles/members.css\" type=\"text/css\">
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

$sql = "SELECT actor_uid, lastname, firstname, pass_uid, pass, username, app_type
FROM actor11, pwd11
WHERE actor11.actor_uid = \"$sel_record\" AND
actor11.actor_uid = pwd11.pass_uid
";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute Actor query.");

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
//Now check the rec11.actor_ID and item

$sql_rec11 = "SELECT actor_ID, item, date_entered
FROM rec11
WHERE rec11.actor_ID = \"$actor_uid\" AND
item = \"AR\"
";

//execute SQL query and get result	

$sql_recresult = mysql_query($sql_rec11,$connection) or die("Couldn't execute Check Rec11 query.");

//get results from receipts table
//fetch row and assign to variables

$row = mysql_fetch_array($sql_recresult);
$item = $row["item"];
$actor_ID = $row["actor_ID"];
$date_entered = $row["date_entered"];

//end of actor section

	}

/*} bracket not needed */



//Did they get an audition?

$sql_rec11Aud = "SELECT actor_ID, item, date_entered, audition_uid, mononly
FROM rec11, audition11
WHERE rec11.actor_ID = \"$actor_uid\" 
AND rec11.actor_ID = audition_uid
AND item = \"AA\"
";

//execute SQL query and get result	
$sql_audresult = mysql_query($sql_rec11Aud,$connection) or die("Couldn't execute query.");

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
<TITLE>StrawHat Acting and Theatre Member Entry - Login Failure</TITLE>
<link rel=\"stylesheet\" href=\"actors.css\" type=\"text/css\">
</HEAD>

<BODY BACKGROUND=\"../graphics03/Bk10a.GIF\">

";


//html for logo and strawhat banner
	include("banner.inc");

	echo "

<H2>StrawHat Actor Member Entry - Login Failure </H2>
	<P>Your Member Login Failed. It may be due to the following: </P>
	";

if($p_entered ==""){
	echo "<p>You did not enter a password.</p>";
}

if(!$u_entered){
	echo "<p>You did not enter a username.</p>";
}	

if($u_entered !="" && $u_entered != $username) {
	echo "<P>Incorrect username: $u_entered.</p>";
}

if ($p_entered != "" && crypt($p_entered,$pass)!= $pass){
	echo "<P>Incorrect password: $p_entered</P>";
}

echo "	

	<P>Please check your username and password. If you have questions about them, or your registration, please contact us at <a href=\"mailto:info@strawhat-auditions.com\">info@strawhat-auditions.com</a>

<BR><BR>

	<a href=\"member_entrya.php\">Please Try Again</a><BR>
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
<TITLE>StrawHat Member Entry - Login Failure</TITLE>
<link rel=\"stylesheet\" href=\"actors.css\" type=\"text/css\">
</HEAD>

<BODY BACKGROUND=\"../graphics03/Bk10a.GIF\">
";

//html for logo and strawhat banner
	include("banner.inc");

	echo "
<H2>StrawHat Member Entry - Login Failure</H2>

	<P>Your Member Login Failed. We have not received or have not yet processed your application.</P>

	<P>If you have questions about your registration, please contact us at <a href=\"mailto:info@strawhat-auditions.com\">info@strawhat-auditions.com</a>
    
</body>
<BR><BR>

	<a href=\"member_entrya.php\">Please Try Again</a><BR>
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
	 <TITLE>StrawHat Auditions Members</TITLE><LINK
	 REL=\"STYLESHEET\" HREF=\"/styles/members.css\">
<SCRIPT LANGUAGE=\"Javascript\" TYPE=\"text/javascript\">
<!--
function open_window(url) {
	var NEW_WIN = null;
	NEW_WIN = window.open (\"\", \"RecordViewer\",
							toolbar=\"no\", 
							width=\"400\",
							height=\"600\",
							directories=\"no\",
							status=\"no\",
							scrollbars=\"yes\",
							resize=\"yes\",
							menubar=\"no\");
	NEW_WIN.location.href = url;
}

function sendme() 
{ 
    window.open(\"\",\"myNewWin\",width=\"300\",height=\"300\",toolbar=\"0\"); 
    var a = window.setTimeout(\"document.form1.submit();\",500); 
} 

-->
</script>	 

  </HEAD> 
  <BODY BACKGROUND=\"../graphics03/Bk10a.GIF\"><SCRIPT SRC=\"navbar.js\"></SCRIPT>
";

include("navbar.inc");

/*LOCAL PARSINGS ONLY!!!

//parse date_entered for AR

$mo = substr($date_entered, 4,2);

$day = substr($date_entered, 6,2);

$year = substr($date_entered, 0, 4);

*/



//REMOTE PARSINGS ONLY!!!
//parse date_entered for AR
$mo = substr($date_entered, 5,2);
$day = substr($date_entered, 8,2);
$year = substr($date_entered, 0, 4);

$ar_entered = $mo . "-" . $day . "-" . $year;

//strip slashes
$firstname = stripslashes($firstname);
$lastname = stripslashes($lastname);

echo"

	 <h2 align = \"center\">Welcome $firstname $lastname</h2>";

// enter the theatre uid here so the registration info does not show	

	 if($actor_uid !=0 and $item = 'AR') {

	 echo "

	 	<p align = \"center\"><b>Registration processed:</b> $ar_entered</p>

";

	 }

//parse date_entered for AA

$aud_mo = substr($aud_date_entered, 5,2);

$aud_day = substr($aud_date_entered, 8,2);

$aud_year = substr($aud_date_entered, 0,4);



$aa_entered = $aud_mo ."-" . $aud_day . "-"  . $aud_year;



	if($aud_item) {

		echo "<p>
		<b>Congratulations $firstname</b>, you were accepted for a ";

		

	switch ($mononly){

		case "D":

			echo "<b>Dancers Audition.</b>";

			break;

		case "Y":

			echo "<b>Non-Singing Audition.</b>";

			break;

		case "N": 

		 	echo "<b>Singing Audition.</b>";

			break;

	}	

/*===================*/
echo "
Please review the copy of the confirmation sent to you by mail <a href =\"";

    

    switch ($mononly){

        case "D":

            echo "Dancer2014.pdf";

            break;

        case "Y":

            echo "NonSing2014.pdf";

            break;

        case "N": 

             echo "Singer2014.pdf";

            break;

    }    

echo " \"target=\"myNewWin\" onClick=\"sendme()\"><i><b>HERE.</b></i></a> <BR><BR>
To be sure you are fully prepared for your audition, we strongly suggest you read the <a href = \"FinalPrepActors.pdf\" target=\"myNewWin\" onClick=\"sendme()\"><b>Prep for Auditioning Actors</b></a> which covers when to show up, what to bring, what to wear and what to expect. A must read review! You should also take a look at <b>I Got An Audition, Now What</b> and review <b>The Dreaded List</b> in the Articles section of the site.

</p>";

		

/*	

	echo "		

 on $aa_entered!</b> 

*/ 

 echo "</b>

 <P><b>Please note the information on this page before using the links above</b> and 

 <a href = \"StrawHatBrowserSetup.pdf\" target=\"myNewWin\" onClick=\"sendme()\"> review our recommendations for using tabs with your browser</a>. The links below will open in a new window, that will reflect the content you select. The other links will go to new pages and you will have to log in again to see this page.</p>

 <p> 
 <b>Your audition day and time has been mailed to you</b>; when you receive it be sure to check that it is correct. Once finalized, you can review the complete Schedule of Actors Auditions by going to Actor Search, which lists all the auditioning actors by last name and includes day/time, type of audition and standbys.
 </p>

 

<P>Directions to the Auditions and Travel and Hotel Information can be found <a href = \"HotelTravel11.pdf\" target=\"myNewWin\" onClick=\"sendme()\"><i><b>HERE</b></i></a>.</P> 

 

 ";

	} 


/*
if($actor_uid != 0) {

echo "



	 <p>
	 <b>We are videotaping the auditions,</b> and your individual audition can be burned on DVD for your future use. The charge is $25 and includes the following:</p>

	 

	 <ul>

	 	<li>A DVD copy suitable to play in a DVD player.</li>

		<li>A CD with an mpeg2 file and an wmv file; suitable for editing and for emailing.</li>

		<li>Both discs are labeled and come in their own cases</li>

		<li>Please allow 1-2 weeks for delivery; shipping is included</li>

	</ul>

";

}
*/
//info for Theatres-----------------------------------------------
/*
if($actor_uid !=0) { 

echo "



<P>
<b>Theatres</b>, please take advange of our actor and tech databases. Use the actor searches to begine your search; and if you need more specific searches, please let us know. We can create custom searches in any combination that include the following categories:



<ul>

	<li>Geographic: City, State, Zip, Region

	<li>Physical: gender, height, weight, hair/eye color, age, ethnicity, suit/dress, chest/bust, waist

	<li>Audition Info: Song/Monologue Only/Dancer, availability to/from, apprentice/internship interest

	<li>Other Skills: Vocal Range, Dance: Styles, years studied; Instruments: types, years studied, technical skills: types, rating 1-3, other skills: types, rating 1-3.

	<li>Roles And Shows: Roles, Shows, Theatres, School Attended

</ul>

</p>



<p>So, if you want to find a <i>male baritone that juggles and does stage combat, 6', plays drums, is of Hispanic descent, interested in Apprenticeships and did West Side Story</i> you can find him!<BR>



Similar searches can also be done on Staff Tech Design people. Call us with your specific searches, we are happy to put them together.

</p>



<p><b>Also please note that the entire auditions are videotaped and can be made a available in a few days after the auditions on DVD's.</b> The set is organized by day, hour and the actor's names are listed by time, so you can use your book or the website to review the actors' pictures and resumes while you watch their auditions. The cost of the 3 Day, DVD set is only $75.

</p>



";

}
*/


if($item == 'AR') {

echo "	 
<table align = \"center\">
<tr>
<td> 
";

if(!$aud_item) {

echo "   

<p>Your application has been processed and is now under consideration for an audition appointment. You will be notified by email and snail mail with your audition details. Audition selection may take 2 to 4 weeks from your registration activation (see date above).</p>
";

}

echo "
<p>Meanwhile:</p>

<ul>
<li>Use <b>Actor Search</b> to search for your OnlIne Casting Profile and proofread your page.
<li>Refer to <b>FAQs</b> for how to correct or update your profile</li>

<li>If your photo or resume do not appear on your profile page, email us at info@strawhat-auditions.com and <b>resubmit</b> your photo .jpg and resume .pdf with <i>Last Name, First Name, ID Number, Incomplete Profile</i> in the subject line</li>

<li>Visit the <b>Theatres</b> page to learn about attending companies. This list will continue to grow right up until the audition weekend, so visit often!</li>

<li>The <b>Articles</b> section offers additional information of interest.</li>

<li>The <b>FAQs</b> section will answer pretty much any question you may have. Please check the FAQs before emailing us directly.</li>
</ul>
</td>
</tr>
</table>

";
		
}

echo "

</BODY>

</HTML>

";

}

?>