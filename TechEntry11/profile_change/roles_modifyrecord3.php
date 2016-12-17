<?php
$roles_uid = $_POST['roles_uid'];


//shows
$show1 = $_POST['show1'];
$show2 = $_POST['show2'];
$show3 = $_POST['show3'];
$show4 = $_POST['show4'];
$show5 = $_POST['show5'];
$show6 = $_POST['show6'];
$show7 = $_POST['show7'];
$show8 = $_POST['show8'];
$show9 = $_POST['show9'];
$show10 = $_POST['show10'];

//roles
$role1 = $_POST['role1'];
$role2 = $_POST['role2'];
$role3 = $_POST['role3'];
$role4 = $_POST['role4'];
$role5 = $_POST['role5'];
$role6 = $_POST['role6'];
$role7 = $_POST['role7'];
$role8 = $_POST['role8'];
$role9 = $_POST['role9'];
$role10 = $_POST['role10'];

//directors
$dir1 = $_POST['dir1'];
$dir2 = $_POST['dir2'];
$dir3 = $_POST['dir3'];
$dir4 = $_POST['dir4'];
$dir5 = $_POST['dir5'];
$dir6 = $_POST['dir6'];
$dir7 = $_POST['dir7'];
$dir8 = $_POST['dir8'];
$dir9 = $_POST['dir9'];
$dir10 = $_POST['dir10'];

//theatres
$thea1 = $_POST['thea1'];
$thea2 = $_POST['thea2'];
$thea3 = $_POST['thea3'];
$thea4 = $_POST['thea4'];
$thea5 = $_POST['thea5'];
$thea6 = $_POST['thea6'];
$thea7 = $_POST['thea7'];
$thea8 = $_POST['thea8'];
$thea9 = $_POST['thea9'];
$thea10 = $_POST['thea10'];

//references
$ref1 = $_POST['ref1'];
$ref2 = $_POST['ref2'];
$ref3 = $_POST['ref3'];

//company
$co1 = $_POST['co1'];
$co2 = $_POST['co2'];
$co3 = $_POST['co3'];

//telephone
//$tel1 = $_POST['tel1'];
//$tel2 = $_POST['tel2'];
//$tel3 = $_POST['tel3'];

//emails
$email1 = $_POST['email1'];
$email2 = $_POST['email2'];
$email3 = $_POST['email3'];

//school
$prof = $_POST['prof'];
$profemail = $_POST['profemail'];
//$proftel = $_POST['proftel'];
$school = $_POST['school'];

//telephone
//proftel parts
//get area code
$areacode = $_POST['areacode'];
$phone1 = $_POST['phone1'];
$phone2 = $_POST['phone2'];

//reference phone1
$areacodea = $_POST['areacodea'];
$phone1a = $_POST['phone1a'];
$phone1b = $_POST['phone1b'];

//reference phone2
$areacodeb = $_POST['areacodeb'];
$phone2a = $_POST['phone2a'];
$phone2b = $_POST['phone2b'];

//reference phone3
$areacodec = $_POST['areacodec'];
$phone3a = $_POST['phone3a'];
$phone3b = $_POST['phone3b'];

//roles_modifyrecord3.php 
//FOR STAFF TECH DESIGN WORK HISTORY!!
//check to see if (!$roles_uid)
if (!$roles_uid) {
	echo "No roles_uid found (roles.modifyrecord3), if the error persists contact StrawHat Auditions";
	exit;
	}

include("../../Comm/connect.inc");

//variables for edit review only
$vshow1 = $show1;
$vshow2 = $show2;
$vshow3 = $show3;
$vshow4 = $show4;
$vshow5 = $show5;
$vshow6 = $show6;
$vshow7 = $show7;
$vshow8 = $show8;
$vshow9 = $show9;
$vshow10 = $show10;

$vrole1 = $role1;
$vrole2 = $role2;
$vrole3 = $role3;
$vrole4 = $role4;
$vrole5 = $role5;
$vrole6 = $role6;
$vrole7 = $role7;
$vrole8 = $role8;
$vrole9 = $role9;
$vrole10 = $role10;

$vthea1 = $thea1;
$vthea2 = $thea2;
$vthea3 = $thea3;
$vthea4 = $thea4;
$vthea5 = $thea5;
$vthea6 = $thea6;
$vthea7 = $thea7;
$vthea8 = $thea8;
$vthea9 = $thea9;
$vthea10 = $thea10;

$vdir1 = $dir1;
$vdir2 = $dir2;
$vdir3 = $dir3;
$vdir4 = $dir4;
$vdir5 = $dir5;
$vdir6 = $dir6;
$vdir7 = $dir7;
$vdir8 = $dir8;
$vdir9 = $dir9;
$vdir10 = $dir10;

$vref1 = $ref1;
$vref2 = $ref2;
$vref3 = $ref3;

$vco1 = $co1;
$vco2 = $co2;
$vco3 = $co3;

$vemail1 = $email1;
$vemail2 = $email2;
$vemail3 = $email3;

//parse phone entry							
$proftel = $areacode . $phone1 . $phone2;
//additional records 1/1/08
$tel1 = $areacodea . $phone1a . $phone1b;
$tel2 = $areacodeb . $phone2a . $phone2b;
$tel3 = $areacodec . $phone3a . $phone3b;

//parse phone for confirmation
$vproftel = $areacode . "-" . $phone1 . "-" . $phone2;
$vtel1 = $areacodea . "-" . $phone1a . "-" . $phone1b;
$vtel2 = $areacodeb . "-" . $phone2a . "-" . $phone2b;
$vtel3 = $areacodec . "-" . $phone3a . "-" . $phone3b;


$vschool = $school;
$vprofemail	= $profemail;
//9/28/09 proftel is overwriting the vproftel, want the parsing
//$vproftel = $proftel;

$vprof = $prof;

//trim, addslashes !!
$show1 = addslashes(trim($show1));
$show2 = addslashes(trim($show2));
$show3 = addslashes(trim($show3));
$show4 = addslashes(trim($show4));
$show5 = addslashes(trim($show5));
$show6 = addslashes(trim($show6));
$show7 = addslashes(trim($show7));
$show8 = addslashes(trim($show8));
$show9 = addslashes(trim($show9));
$show10 = addslashes(trim($show10));

$role1 = addslashes(trim($role1));
$role2 = addslashes(trim($role2));
$role3 = addslashes(trim($role3));
$role4 = addslashes(trim($role4));
$role5 = addslashes(trim($role5));
$role6 = addslashes(trim($role6));
$role7 = addslashes(trim($role7));
$role8 = addslashes(trim($role8));
$role9 = addslashes(trim($role9));
$role10 = addslashes(trim($role10));

$thea1 = addslashes(trim($thea1));
$thea2 = addslashes(trim($thea2));
$thea3 = addslashes(trim($thea3));
$thea4 = addslashes(trim($thea4));
$thea5 = addslashes(trim($thea5));
$thea6 = addslashes(trim($thea6));
$thea7 = addslashes(trim($thea7));
$thea8 = addslashes(trim($thea8));
$thea9 = addslashes(trim($thea9));
$thea10 = addslashes(trim($thea10));

$school = addslashes(trim($school));
$prof = addslashes(trim($prof));
$proftel = addslashes(trim($proftel));
$profemail = addslashes(trim($profemail));

//additional records 1/1/08
$ref1 = addslashes(trim($ref1));
$ref2 = addslashes(trim($ref2));
$ref3 = addslashes(trim($ref3));

$co1 = addslashes(trim($co1));
$co2 = addslashes(trim($co2));
$co3 = addslashes(trim($co3));

$tel1 = addslashes(trim($tel1));
$tel2 = addslashes(trim($tel2));
$tel3 = addslashes(trim($tel3));

$email1 = addslashes(trim($email1));
$email2 = addslashes(trim($email2));
$email3 = addslashes(trim($email3));


//SQL statement to update record
$sql = "UPDATE techroles11 SET 
show1=\"$show1\",
show2=\"$show2\",
show3=\"$show3\",
show4=\"$show4\",
show5=\"$show5\",
show6=\"$show6\",
show7=\"$show7\",
show8=\"$show8\",
show9=\"$show9\",
show10=\"$show10\",
role1=\"$role1\",
role2=\"$role2\",
role3=\"$role3\",
role4=\"$role4\",
role5=\"$role5\",
role6=\"$role6\",
role7=\"$role7\",
role8=\"$role8\",
role9=\"$role9\",
role10=\"$role10\",
thea1=\"$thea1\",
thea2=\"$thea2\",
thea3=\"$thea3\",
thea4=\"$thea4\",
thea5=\"$thea5\",
thea6=\"$thea6\",
thea7=\"$thea7\",
thea8=\"$thea8\",
thea9=\"$thea9\",
thea10=\"$thea10\",
dir1=\"$dir1\",
dir2=\"$dir2\",
dir3=\"$dir3\",
dir4=\"$dir4\",
dir5=\"$dir5\",
dir6=\"$dir6\",
dir7=\"$dir7\",
dir8=\"$dir8\",
dir9=\"$dir9\",
dir10=\"$dir10\",

school=\"$school\",
prof=\"$prof\",
proftel=\"$proftel\",
profemail=\"$profemail\",

ref1 = \"$ref1\",
ref2 = \"$ref2\",
ref3 = \"$ref3\",

co1 = \"$co1\",
co2 = \"$co2\",
co3 = \"$co3\",

tel1 = \"$tel1\",
tel2 = \"$tel2\",
tel3 = \"$tel3\",

email1 = \"$email1\",
email2 = \"$email2\",
email3 = \"$email3\"

WHERE techroles_uid = \"$roles_uid\"
 ";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


if (!$sql_result) {
	echo "<P>Couldn't update record!</P>";
	} else {

//SQL statement to select record
$sql2 = "SELECT * FROM techies11 WHERE tech_uid = \"$roles_uid\"";

//execute SQL query and get result	
$sql_result2 = mysql_query($sql2,$connection) or die("Couldn't execute query.");
	}

if (!$sql_result2) {
	echo "<P>Could not get 2nd query results!</P>";
	} else {		

echo "
<HTML>
<HEAD>
<TITLE>StrawHat Updated Work History Record</TITLE>
<link rel=\"stylesheet\" href=\"actors.css\" type=\"text/css\">

</HEAD>
<BODY>
";
include("banner.inc");
/*
echo "
<table align=\"center\">
    <tr>
    <td align = \"center\"> 
    <FORM method=\"POST\" action= \"/TechEntry11/profile_change/changes.php\">
    <input type = \"hidden\" name = \"tech_uid\" value = \"$tech_uid\">
    <INPUT type=\"submit\" value =\"Back to Change Application Menu\">
    </FORM>    
    </td>
    </tr>    
</table>
";
*/

echo "	
      
<h3 align = \"center\">You have made these changes: </h3>
<FORM method = \"POST\" action = \"changes.php\">
<input type = \"hidden\" name = \"sel_record\" value = \"$roles_uid\">
<input type = \"hidden\" name = \"tech_uid\" value = \"$roles_uid\">



  <table width=\"85%\" border=\"0\" align=\"center\">
    <tr> 
      <th align=\"left\">Shows</th>
      <th align=\"left\">Roles</th>
      <th align=\"left\">Theatre</th>
      <th align=\"left\">Director</th>
    </tr>
    <tr> 
      <td>$vshow1</td>
      <td>$vrole1</td>
      <td>$vthea1</td>
      <td>$vdir1</td>
      
    </tr>
	
    <tr> 
      <td>$vshow2</td>
      <td>$vrole2</td>
      <td>$vthea2</td>
        <td>$vdir2</td>
    </tr>
	
    <tr> 
      <td>$vshow3</td>
      <td>$vrole3</td>
      <td>$vthea3</td>
        <td>$vdir3</td>
    </tr>
	
    <tr> 
      <td>$vshow4</td>
      <td>$vrole4</td>
      <td>$vthea4</td>
        <td>$vdir4</td>
    </tr>

	<tr> 
      <td>$vshow5</td>
      <td>$vrole5</td>
      <td>$vthea5</td>
        <td>$vdir5</td>
    </tr>  
    <tr>
    
    <tr> 
      <td>$vshow6</td>
      <td>$vrole6</td>
      <td>$vthea6</td>
        <td>$vdir6</td>
    </tr>  
    <tr>
    
    <tr> 
      <td>$vshow7</td>
      <td>$vrole7</td>
      <td>$vthea7</td>
        <td>$vdir7</td>
    </tr>  
    <tr>
    
    <tr> 
      <td>$vshow8</td>
      <td>$vrole8</td>
      <td>$vthea8</td>
        <td>$vdir8</td>
    </tr>  
    <tr>
    
    <tr> 
      <td>$vshow9</td>
      <td>$vrole9</td>
      <td>$vthea9</td>
        <td>$vdir9</td>
    </tr>  
    <tr>
    
    <tr> 
      <td>$vshow10</td>
      <td>$vrole10</td>
      <td>$vthea10</td>
        <td>$vdir10</td>
    </tr>  
    
    <tr>   
    <td>
    <b>School:</b> $vschool
    </td>
    <td>
    <b>Prof:</b> $vprof
    </td>
    <td>
    <b>Tel:</b> $vproftel
    </td>
    <td>
    <b>Email:</b> $vprofemail
    </td>
    </tr>
    
    <tr>   
    <td>
    <b>Name:</b> $vref1
    </td>
    <td>
    <b>Position:</b> $vco1
    </td>
    <td>
    <b>Tel:</b> $vtel1
    </td>
    <td>
    <b>Email:</b> $vemail1
    </td>
    </tr>
    
    
    <tr>   
    <td>
    <b>Name:</b> $vref2
    </td>
    <td>
    <b>Position:</b> $vco2
    </td>
    <td>
    <b>Tel:</b> $vtel2
    </td>
    <td>
    <b>Email:</b> $vemail2
    </td>
    </tr>
    
    
    <tr>   
    <td>
    <b>Name:</b> $vref3
    </td>
    <td>
    <b>Position:</b> $vco3
    </td>
    <td>
    <b>Tel:</b> $vtel3
    </td>
    <td>
    <b>Email:</b> $vemail3
    </td>
    </tr>
    
    
    
    
  </table>
<P align = \"center\"><INPUT type=\"submit\" value =\"Done\">     
</FORM>
</BODY>
</HTML>
";
}
?>