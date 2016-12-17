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
//do not use this to get sched ll info on page 12/12/14
include("../Comm/connect.inc");

$sql = "SELECT actor_uid, lastname, firstname, pass_uid, pass, username, app_type
FROM actor11, pwd11
WHERE actor11.actor_uid = \"$sel_record\" 
AND actor11.actor_uid = pwd11.pass_uid 
";



//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute Actor query.");

if (!$sql_result) {
	echo "<P>Couldn't get record!</P>";exit();
	} else {

//actors
//fetch row and assign to variables
//set actor_uid to be available
$row = mysql_fetch_array($sql_result);
$actor_uid = $row["actor_uid"]; 
$lastname = $row["lastname"];   
$firstname = $row["firstname"]; 
$app_type = $row["app_type"];
$pass = $row["pass"];           
$username = $row["username"];   

//test
//echo"<BR>ACTOR_UID, LINE 64: $actor_uid<BR>";


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

    }



// includes sched11
$sql_rec11Aud = "SELECT actor_ID, item, date_entered, audition_uid, mononly
FROM rec11, audition11, sched11
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

//echo"<BR>Line 113, aud_item: $aud_item</BR>";
//echo"<BR>Line 114, item: $item</BR>";
//echo"<BR>Line 115, item: $mononly</BR>";

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
//this is it!    


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

//sched11
$sql_getSched11info = "SELECT actor_uid, sched_uid, name, day, time, type, standby, availfor, availto
FROM actor11, sched11 
WHERE sched11.sched_uid = \"$actor_uid\" 
";




// don't need this in this format: \"$actor_uid\" 

//execute SQL query and get result    
$sql_getSched11result = mysql_query($sql_getSched11info,$connection) or die("Couldn't execute query.");

//fetch row and assign to variables
$row = mysql_fetch_array($sql_getSched11result);
$day = $row["day"]; //sched11
$time = $row["time"]; //sched11
$type = $row["type"]; //sched11
$standby = $row["standby"]; //sched11
$name = $row["name"]; //sched11
$availfor = $row["availfor"]; //sched11
$availto = $row["availto"]; //sched11
//$actor_uid = $row["actor_uid"]; //actor
$sched_uid = $row["sched_uid"]; //sched11



//$actor_uid = $row["actor_uid"]; //actor11 DO NOT USE THIS ACTOR_UID, PULLING ANOTHER SOURCE
//$mononly = $row["standby"]; //audition


//TESTING 
//echo "<BR>LINE 310 actor_uid: $actor_uid, sched_uid: $sched_uid, Aud-actor-ID: $aud_actor_ID<BR>";

;


/* was testing variables 12/18/14 */
/* testing

echo"
<BR>
Day: $day, Time: $time, Type: $type, Standby: $standby, Aud_Item: $aud_item,<BR>
actor_uid: $actor_uid, Name: $name, Available: $availfor, AvailTo: $availto,<BR>
Sched_uid: $sched_uid, Actor_uid: $actor_uid 
<BR>";
*/

    
    $test_firstzero = substr($time, 0,1);
//echo "First #: $test_firstzero <BR>";

//times from 1 - 9. IF  hour = substr($time), echo
if($type != "SB" && $test_firstzero == 0) {
    $time = substr($time, 1,4);
    //$hour_time = substr($time, 0,1);
    /*echo "<B>$time(1)</B><BR>"; */
    }

//times from 10 - 12. IF  hour = substr($time), echo    
if($type != "SB" && $test_firstzero == 1) {
    $time = substr($time, 0,5);
    //$hour_time = substr($time, 0,2);
    /*echo "<B>$time(2)</B><BR>"; */
    }            
/* THIS IS NOT NEEDED, STANDBY WILL BE PULLED BY THE CODE            
if($type == "SB")     
    {echo "Standby: $standby";}  
*/

echo"



	 <h2 align = \"center\">Welcome $firstname $lastname 
     ($actor_uid)     
     </h2>";

     
// enter the theatre uid here so the registration info does not show	

	 if($actor_uid !=0 and $item = "AR") {

	 echo "

	 	<p align = \"center\"><b>Registration processed:</b> $ar_entered</p>
";

//using mononly
        echo"<P align = \"center\">You registered for the following:&nbsp";
        
            
    switch ($mononly){
    
        case "D":
            echo "<b>Dancers Audition.</b><BR>";
            /* on $day, at $time.*/
            break;

        case "Y":
            echo "<b>Monologue Audition.</b><BR>";
            /*on $day, at $time.*/
            break;

        case "N": 
             echo "<b>Song and Monologue Audition.</b><BR>";
             /*on $day, at $time.*/
            break;
    }    


echo "                
        <p align = \"center\">
        <a href=\"../Members11/2017_MemberConfirm.pdf\" target=\"myNewWin\" onClick=\"sendme()\"    
        ONMOUSEOVER=\"this.style.color='red'\" ONMOUSEOUT=\"this.style.color='blue'\">
        Your application has been received, click HERE for more info!</a>
        <br>
        "; 
	 }

     
//parse date_entered for AA

$aud_mo = substr($aud_date_entered, 5,2);
$aud_day = substr($aud_date_entered, 8,2);
$aud_year = substr($aud_date_entered, 0,4);
$aa_entered = $aud_mo ."-" . $aud_day . "-"  . $aud_year;

//this was set at aud_item, but it did not get a value - USE "item" 11/14/15

//$item = 'AR'

// 11/21/15 test: echo "<BR>Line 386: Item: $item<BR>";
//if($actor_uid !=0 and $item = "AA")
//put in nothing to omit for accepted actor info
//if ($aud_item) echo "<BR>Testing aud_item: $aud_item</BR>";
//if ($item) echo "<BR>Testing item: $item</BR>";


//echo "<BR>Item Line 418: $item<BR>";

if($aud_item == "AA")
    {

		echo "<p align = 'center'>";
        //echo "<BR>Audition: $type, Day: $day, Time: $time<BR>";
		echo "<b>$firstname</b>, you were accepted for a Audition.<BR>";


    
echo "
<br>
<B><FONT size = \"3\">Please review the copy of the confirmation sent to you by mail.<B>
";


/*
//testing 12/14/2015
echo "

 <a href =\"
 ";
//was mononly


/*turn off switch for type a/o/ 11/27/15 */
/*testing again 12/14/15*/
/*
    switch ($type){
        case "D":
            echo "Dancer2016.pdf"; 
            break;

        case "NS":
            echo "NonSing2016.pdf";
            break;

        case "S": 
             echo "Singer2016.pdf";
            break;
                  
        case "SB": 
             echo "Standby2016.pdf";
            break;            
    }    


    
//echo " \"target=\"myNewWin\" onClick=\"sendme()\"><i><b>HERE.</b></i></a>";
*/
echo "
<BR>
<BR>
<TABLE width = \"60%\" align = \"center\">
<TR>
<TD>

 <P align = 'left'>
 Make sure you are fully prepared for your audition. Read the <a href = \"FinalPrepActors.pdf\" target=\"myNewWin\" onClick=\"sendme()\"><b>Prep for Auditioning Actors.</b></a> Read <b>I Got An Audition, Now What</b> and review <b>The Dreaded List</b> in the Articles section of the site.
</P>

<P>Directions to the Auditions and Travel and Hotel Information can be found <a href = \"2016 InfoNY_HotelTravel.pdf\" target=\"myNewWin\" onClick=\"sendme()\"><i><b>HERE</b></i></a>.</P>
";

		

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

/*
if($item == 'AR') {

echo "	 
<table align = \"center\">
<tr>
<td> 
";
*/

//MESSAGE FOR AR'S THAT THEIR APPLICATION WAS PROCESSED
//TAKE OUT THE APPLICATION MESSAGE WHEN THE PROCESS IS OVER?
if($item =="AR") 
{

echo "   
<table width = \"80%\" align = \"center\">
<tr>
<td>
";
/* 3/8/15 Have to handle this for AR's. Should only be there for a short time - 
what does that mean?? 
HOW TO HANDLE THIS??

echo "
<p>Your application has been processed and is now under consideration for an audition appointment. You will be notified by email and snail mail with your audition details. Audition selection may take several weeks from your registration activation.
</p>
";
*/


echo "
<p>Meanwhile:</p>

<ul>
<li>Use <b>Actor Search</b> to search for your OnlIne Casting Profile and proofread your page.

<li>If your photo or resume do not appear on your profile page, email us at info@strawhat-auditions.com and <b>resubmit</b> your photo .jpg and resume .pdf with <i>Last Name, First Name, ID Number, Incomplete Profile</i> in the subject line</li>

<li>The <b>FAQs</b> section will answer most questions you may have.</li>

<li>The <b>Articles</b> section offers additional information of interest.</li>

<li>Visit the <b>Theatres</b> page to learn about attending companies. This list will continue to grow right up until the audition weekend, so visit often!</li>

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