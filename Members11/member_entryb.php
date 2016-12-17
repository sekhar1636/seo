<?php

//actor
$type_lastname = $_POST['type_lastname'];
//tech
$tech_lastname = $_POST['tech_lastname'];
//theatre
$thea_lastname = $_POST['thea_lastname'];


echo "
<HTML>
<HEAD>
<TITLE>StrawHat Search by Lastname Input</TITLE>
<link rel=\"stylesheet\" href=\"/styles/members.css\" type=\"text/css\">
</HEAD>
<BODY BACKGROUND=\"Bk10a.GIF\">
";

include("../Comm/connect.inc");

//-----01-19-12--still-a-question!---create sql statement
//add code to get select bar with added names
//doing 2 addslashes, don't know why!!

$type_lastname = trim($type_lastname);
$type_lastname = addslashes($type_lastname);


//old code
//$type_lastname = addslashes(trim($type_lastname));
//$type_lastname = trim($type_lastname);
//$type_lastname=addslashes($type_lastname);

//tech members entry
//$tech_lastname = addslashes(trim($tech_lastname));
$tech_lastname = trim($tech_lastname);
$tech_lastname=addslashes($tech_lastname);

//theatre members entry
$thea_lastname = trim($thea_lastname);
$thea_lastname = addslashes($thea_lastname);

//if no entries
if(!$type_lastname && !$tech_lastname && !$thea_lastname) {
	include("banner.inc");
	echo "<P align = \"center\"><b>No Last Name was entered in Actors, Staff Tech Entry or Theatres.</b><br><br> 
    <a href=\"member_entrya.php\">
    Please go back</a> to enter the Last Name</p>";
	exit;
	}

//if there are multiple entries	
if($type_lastname && $tech_lastname) {
	include("banner.inc");
	echo "<P align = \"center\"><b>Please do not enter your lastname in both The Actor and Staff Tech Entry.
	</b><br><br><a href=\"member_entrya.php\">Please go back</a> to enter your Last Name in either the Actor or Staff Tech Entry.</p>";
	exit;
	}
	
if($type_lastname && $tech_lastname && $thea_lastname) {
    include("banner.inc");
    echo "<P align = \"center\"><b>Please do not enter your lastname in The Actor, Staff Tech and Theatre Entry.
    </b><br><br><a href=\"member_entrya.php\">Please go back</a> to enter your Last Name in either the Actor, Staff Tech Entry or Theatre Entry.</p>";
    exit;
    }
    
if($tech_lastname && $thea_lastname) {
    include("banner.inc");
    echo "<P align = \"center\"><b>Please do not enter your lastname in Staff Tech and Theatre Entry.
    </b><br><br><a href=\"member_entrya.php\">Please go back</a> to enter your Last Name in either the Actor, Staff Tech Entry or Theatre Entry.</p>";
    exit;
    }
    
if($type_lastname && $thea_lastname) {
    include("banner.inc");
    echo "<P align = \"center\"><b>Please do not enter your lastname in Actor and Theatre Entry.
    </b><br><br><a href=\"member_entrya.php\">Please go back</a> to enter your Last Name in either the Actor, Staff Tech Entry or Theatre Entry.</p>";
    exit;
    }

    
//actor sql    
if($type_lastname) {
// search checks that actor has paid registration fee IS THIS RIGHT?? Yes, must have a AR to get into Members 
$sql = "SELECT actor_uid, lastname, firstname, midname, app_type
		FROM actor11
		WHERE lastname LIKE '$type_lastname' 
		ORDER BY lastname ASC";

}
//tech sql
if($tech_lastname) {
// search checks that atech has paid registration fee (currently we don't charge tech. TIME TO?? 8/22/13
$sql = "SELECT tech_uid, lastname, firstname, midname, app_type
		FROM techies11
		WHERE lastname LIKE '$tech_lastname'
		ORDER BY lastname ASC";

}
//theatre sql
if($thea_lastname) {
// search checks that theatre has paid registration fee IS THIS RIGHT??
$sql = "SELECT thea_uid, lastname, firstname, midname, app_type
        FROM theatre11
        WHERE lastname LIKE '$thea_lastname'
        ORDER BY lastname ASC";

}



//execute SQL query and get result

$sql_result = mysql_query($sql,$connection) or die("Couldn't execute input query.");

//html for logo and strawhat banner
	include("banner.inc");
	
/*
echo "
<H1>Select Lastname Search Results</H1>
<FORM method=\"POST\" action=\"/Members11/member_entry2.php\">
<!-- <INPUT type=\"hidden\" value = \"$type_lastname\"> -->

<table cellspacing=5 cellpadding=5>
<tr>
";
*/
//for actor entry
if($type_lastname) {
	
    echo " 
	<H3 align=\"center\"><b></b></H3>
    
    <FORM method=\"POST\" action=\"/Members11/member_entry2a.php\">
<INPUT type=\"hidden\" value = \"app_type\">

<table align = \"center\" cellspacing=5 cellpadding=5>
<tr>
	<td align=\"center\"><strong>==></strong><td>

    <td valign = top>
    <select name=\"sel_record\">

    <option value=\"\"> -- Select Actor Lastname -- </option>";
	
	while ($row = mysql_fetch_array($sql_result) ) {
		$new_actor_uid = $row["actor_uid"];
		$new_lastname = stripslashes($row["lastname"]);	
		$new_firstname = stripslashes($row["firstname"]);
		$new_midname = stripslashes($row["midname"]);
		$app_type = stripslashes($row["app_type"]);
        
        $new_sched_uid = stripslashes($row["sched_uid"]);
        $new_day = stripslashes($row["day"]);
        $new_type = stripslashes($row["time"]);
        
        
		echo "
			<option value=\"$new_actor_uid\">$new_lastname, $new_firstname $new_midname</option>
			";
		}
}

//for techies entry

if($tech_lastname) {    
echo "
<H3 align = \"center\"><b>Staff/Tech/Design</b></H3>    
<FORM method=\"POST\" action=\"/Members11/member_entry2t.php\">
<INPUT type=\"hidden\" value = \"app_type\">

<table  align = \"center\" cellspacing=5 cellpadding=5>
<tr>
	<td align=left><strong>Lastname:</strong><td>
<td valign = top>
<select name=\"sel_record\">
	
<option value=\"\"> -- Select Tech Lastname -- </option>
";
	
	while ($row = mysql_fetch_array($sql_result) ) {
		$new_tech_uid = $row["tech_uid"];
		$new_lastname = stripslashes($row["lastname"]);	
		$new_firstname = stripslashes($row["firstname"]);
		$new_midname = stripslashes($row["midname"]);
		$tech_app_type = stripslashes($row["app_type"]);

		echo "
			<option value=\"$new_tech_uid\">$new_lastname, $new_firstname $new_midname</option>
			";
		}
}

//for theatre entry
if($thea_lastname) {
    echo " 
    <H1 align = \"center\">Select Lastname Search Results for Theatres</H1>
<FORM method=\"POST\" action=\"/Members11/member_entry2thea.php\">
<INPUT type=\"hidden\" value = \"app_type\">

<table align = \"center\" cellspacing=5 cellpadding=5>
<tr>
    <td align=left><strong>Lastname:</strong><td>
<td valign = top>
<select name=\"sel_record\">

<option value=\"\"> -- Select Theatre Rep Lastname -- </option>";
    
    while ($row = mysql_fetch_array($sql_result) ) {
        $new_thea_uid = $row["thea_uid"];
        $new_lastname = stripslashes($row["lastname"]);    
        $new_firstname = stripslashes($row["firstname"]);
        $new_midname = stripslashes($row["midname"]);
        $app_type = stripslashes($row["app_type"]);
        echo "
            <option value=\"$new_thea_uid\">$new_lastname, $new_firstname $new_midname</option>
            ";
        }
}



echo "
	</select>
	</td>
	</tr>
		</tr>
	</table>
";
	
if(empty($new_lastname)) {
			echo "
<TABLE align = \"center\">
<TR>
<TD>            
            <P align = \"left\">No Match Found: <a href=\"member_entrya.php\">Please go back</a> and try again
            or go back to <a href=\"../index.php\">the home page and start again</a>.
            </P>
            
            <P align = \"left\"><B>Actors, Please note: Your Members Area access is activated 
            once the following have been received:</B>
            
            <UL align = \"left\">
            <li><b>Your email files (resume pdf and headshot jpg)</li>
            <li>Your complete hard copy application</b></li>
            </UL>
            </P>
            
            ";
            
            
			}	

			
else {			
echo "	

<table align = \"center\">
<tr colspan=\"2\"><td>
	<b>Please enter your username and password:</b></td>
	</tr>
	<tr>
		<td>Username: <input type=\"text\" name=\"u_entered\" size=\"11\" maxlength=\"11\"></td>
		<td>Password: <input type=\"PASSWORD\" name=\"p_entered\" size=\"9\" maxlength=\"9\"></td>
	
	</tr>
	<tr>
	<td align = center colspan=2><INPUT type=\"submit\" value =\"Enter Member Area\"></td>
	</tr>
	
	</table>
	
</form>	
";	

			if(empty($new_lastname)) {
			echo "<H3>No Match Found: Please try again.</H3>";
			};
}
echo "
</BODY>
</HTML>
";
?>