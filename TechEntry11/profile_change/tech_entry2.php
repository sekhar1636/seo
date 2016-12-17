<?php
$sel_record = $_POST['sel_record'];
$u_entered = $_POST['u_entered'];
$p_entered = $_POST['p_entered'];

$tech_uid = $_POST['tech_uid'];
//$lastname = $_POST['lastname'];
//$midname = $_POST['midname'];
//$firstname = $_POST['firstname'];
?>

<HTML>
<HEAD>
<TITLE>StrawHat Staff/Tech/Design Application Change</TITLE>
<link rel="stylesheet" href="actors.css" type="text/css">
</HEAD>
<BODY BACKGROUND=../../TechEntry11/profile_change/Bk10a.GIF>



<?php

include("banner.inc");

if (!$sel_record) {

	echo "<p align = 'center'>No name was chosen in the selection box: please go back to the previous page and select an Staff/Tech/Design candidate.</p>";
	exit;
	}

//check input
if(!$p_entered)	{

	echo "<p align = 'center'>No Password entered: please go back and type your password.</p>";

	}
if(!$u_entered) {

	echo "<p align = 'center'>No Username entered: please go back and type your username.</p>";
	}

if(!$p_entered || !$u_entered) {
	die();
}	
	
	
//check to see if the pass_uid exists
	
include("../../Comm/connect.inc");

//SQL statement to select record
$sql = "SELECT tech_uid, lastname, firstname, midname, username, pass, pass_uid
FROM techies11, techpwd11  
WHERE tech_uid = \"$sel_record\" AND
techies11.tech_uid = techpwd11.pass_uid
";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute Main query.");

//fetch row and assign to variables

$row = mysql_fetch_array($sql_result);
$tech_uid = $row["tech_uid"];
$lastname = $row["lastname"];
$firstname = $row["firstname"];
$midname = $row["midname"];
$pass_uid = $row["pass_uid"];
$pass = $row["pass"];
$username = $row["username"];

if (!$sql_result) {
	include("banner.inc");
	echo "
	<P align = 'center'>Could not get record (Error: $sql_result). Notify us at info@strawhat-auditions.com if you keep seeing this error</P>";
	} 
elseif (!$pass_uid){
	echo "Password record does not exist. Email administrator for help";
}
		
else {
//encrypt password
//prepare for slashes, trim
trim($p_entered);





if(crypt($p_entered,$pass)!= $pass) {

	echo "<p align = 'center'>Incorrect Password: $p_entered. If you forgot your username, go back and try again, or go to <a href=\"pwd_searchnamereset.php\">Reset Username/Password</a></p>";
	exit();
}


	elseif($username != $u_entered) {

	echo "<p align = 'center'>Incorrect Username: $u_entered. If you forgot your username, go back and try again, or go to <a href=\"pwd_searchnamereset.php\">Reset Username/Password</a></p>";
	exit();
	}
		
	else {	

echo "
<TABLE WIDTH=\"95%\" align = \"center\"> 
<h1 align = 'center'>Welcome $firstname $lastname!</h1>
<h2 align = 'center'>Changing your Staff/Tech/Design Profile:</h2>
<p align = 'center'>Select the links and follow the prompts to make your changes.</p>
</TABLE>

<table width=\"65%\" align = \"center\" border=\"2\" cellspacing=\"1\" cellpadding=\"1\">
  <tr>
    <td align=\"center\" >
      <form name=\"form1\" method=\"post\" action=\"tech_modifyrecord2.php\">
      <input type = \"hidden\" name = \"tech_uid\" value = \"$tech_uid\">
      <input type=\"submit\" name=\"Submit\" value=\"Contact Information\">
		</form>
	<p>Update your contact information.</p>
    </td>
  
    <td align=\"center\" width=\"50%\">
        <form name=\"form1\" method=\"post\" action=\"techapp_modifyrecord2.php\">
		<input type = \"hidden\" name = \"tech_uid\" value = \"$tech_uid\">
        <input type=\"submit\" name=\"info\" value=\"Staff Tech Design Information\">
		</form>
		<p>Indicate your preferences.</p>
      </td>
  </tr>
  <tr>
    <td align=\"center\">
        <form name=\"form1\" method=\"post\" action=\"roles_modifyrecord2.php\">
		<input type = \"hidden\" name = \"tech_uid\" value = \"$tech_uid\">
        <input type=\"submit\" name=\"roles\" value=\"Work History\">
		</form>
		<p>Highlights, work history, references</p>
      </td>
    
	<td align=\"center\">
        <form name=\"form1\" method=\"post\" action=\"tech_modifyportfolio.php\">
		<input type = \"hidden\" name = \"tech_uid\" value = \"$tech_uid\">
        <input type=\"submit\" name=\"portfolio\" value=\"Portfolio\">
		</form>
		<p>Enter information describing your portfolio.</p>
      </td>
   </tr>   
   <tr>

   <td align=\"center\">
        <form name=\"form1\" method=\"post\" action=\"pwd_change.php\">
		<input type = \"hidden\" name = \"sel_record\" value = \"$tech_uid\">
        <input type=\"submit\" name=\"reset\" value=\"Username/Password\">
        </form>
        <p>Change your username and or password.<BR></p>
	  </td>

     
<td align=\"center\">
        <form name=\"form1\" method=\"post\" action=\"../techapp_printout.php\">
		<input type = \"hidden\" name = \"print_uid\" value = \"$tech_uid\">
        <input type=\"submit\" name=\"printout\" value=\"Print Application\">
        </form>
        <p>Print your Staff Tech Design Application for you records</p>
	  </td>	  
  </tr>
  
 <tr>
	<td colspan = \"2\" align=\"center\">
        <form name=\"form1\" method=\"\" action=\"../../index.php\">
        <input type=\"submit\" name=\"home\" value=\"Done\">
        </form>
        <p>Leave Change Staff Tech Design Application</p>
	  </td>	  
 
 </tr> 
 
</table>

	

</body>
</html>
";
}
}
?>