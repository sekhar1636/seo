<?php
//roles_modifyrecord3.php 
$roles_uid = $_POST['roles_uid'];
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

$school = $_POST['school'];
$prof = $_POST['prof'];
//$proftel = $_POST['proftel'];
$profemail = $_POST['profemail'];

//phone
$areacode = $_POST['areacode'];
$phone1 = $_POST['phone1'];
$phone2 = $_POST['phone2'];

//check to see if (!$actor_uid)
if (!$roles_uid) {
	echo "No roles_uid found (roles.modifyrecord3), if the error persists contact StrawHat Auditions";
	exit;
	}

include("../../Comm/connect.inc");

//format strings to correct case
//1/16/07 have to make this more specific, fix 
/*$show1 = ucwords(strtolower($show1));
$show2 = ucwords(strtolower($show2));
$show3 = ucwords(strtolower($show3));
$show4 = ucwords(strtolower($show4));
$show5 = ucwords(strtolower($show5));

$role1 = ucwords(strtolower($role1));
$role2 = ucwords(strtolower($role2));
$role3 = ucwords(strtolower($role3));
$role4 = ucwords(strtolower($role4));
$role5 = ucwords(strtolower($role5));

$thea1 = ucwords(strtolower($thea1));
$thea2 = ucwords(strtolower($thea2));
$thea3 = ucwords(strtolower($thea3));
$thea4 = ucwords(strtolower($thea4));
$thea5 = ucwords(strtolower($thea5));

$school = ucwords(strtolower($school));
*/
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

//parse phone entry							
$proftel = $areacode . $phone1 . $phone2;
$vproftel = $areacode . $phone1 . $phone2;


$vschool = $school;
$vprofemail	= $profemail;
$vproftel = $proftel;
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

$dir1 = addslashes(trim($dir1));
$dir2 = addslashes(trim($dir2));
$dir3 = addslashes(trim($dir3));
$dir4 = addslashes(trim($dir4));
$dir5 = addslashes(trim($dir5));
$dir6 = addslashes(trim($dir6));
$dir7 = addslashes(trim($dir7));
$dir8 = addslashes(trim($dir8));
$dir9 = addslashes(trim($dir9));
$dir10 = addslashes(trim($dir10));


$school = addslashes(trim($school));
$prof = addslashes(trim($prof));
$proftel = addslashes(trim($proftel));
$profemail = addslashes(trim($profemail));

//SQL statement to update record
$sql = "UPDATE roles11 SET 
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
profemail=\"$profemail\"
WHERE roles_uid = \"$roles_uid\"
 ";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("
<B>Couldn't execute query.</B> If you see this message, try removing quotes or other special characters from your entries. 
If you still have trouble please contact us at StrawHat Auditions. <BR>Go to the Contact Page for info. 
Use your Back button on your browser to return to the previous form.");


if (!$sql_result) {
	echo "<P>Couldn't update record!</P>";
	} else {

//SQL statement to select record
$sql2 = "SELECT * FROM actor11 WHERE actor_uid = \"$roles_uid\"";

//execute SQL query and get result	
$sql_result2 = mysql_query($sql2,$connection) or die("Couldn't execute query.");
	}

if (!$sql_result2) {
	echo "<P>Could not get 2nd query results!</P>";
	} else {		

echo "
<HTML>
<HEAD>
<TITLE>StrawHat Updated Roles Record</TITLE>
<link rel=\"stylesheet\" href=\"actors.css\" type=\"text/css\">

</HEAD>
<BODY>
";
include("banner.inc");

echo "	
      
<h1>You have made these changes: </h1>
<FORM method = \"POST\" action = \"changes.php\">
<input type = \"hidden\" name = \"actor_uid\" value = \"$roles_uid\">



  <table width=\"95%\" border=\"0\" align=\"center\">
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
    <b>Tel:</b> ($areacode) $phone1-$phone2
    </td>
    <td>
    <b>Email:</b> $vprofemail
    </td>
    
    </tr>
  </table>
<P><INPUT type=\"submit\" value =\"Done\">     
</FORM>
</BODY>
</HTML>
";
}
?>