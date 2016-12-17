<?php

$sel_record = $_POST['sel_record'];
$u_entered = $_POST['u_entered'];
$p_entered = $_POST['p_entered'];
$thea_uid = $_POST['thea_uid'];
?>

<HTML>
<HEAD>
<TITLE>StrawHat Theatre Application Change</TITLE>
<link rel="stylesheet" href="theatre.css" type="text/css">
</HEAD>
<BODY BACKGROUND=\"Bk10a.GIF\">



<?php
include("../../Comm/connect.inc");

include("banner.inc");

if (!$sel_record) {

	echo "<p align = \"center\">No sel_record: please go back to the previous page and select an Theatre Rep Last Name.</p>";
	exit;
	}

//check input
if(!$p_entered)	{

	echo "<p align = \"center\">No Password entered: please go back and type your password.</p>";

	}
if(!$u_entered) {

	echo "<p align = \"center\">No Username entered: please go back and type your username.</p>";
	}

if(!$p_entered || !$u_entered) {
	die();
}	
	
	
//check to see if the pass_uid exists
	
include("../../Comm/connect.inc");

//SQL statement to select record
$sql = "SELECT thea_uid, lastname, firstname, midname, username, pass_uid, pass
FROM theatre11, theapwd11  
WHERE thea_uid = \"$sel_record\" AND
theatre11.thea_uid = theapwd11.pass_uid
";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute Main Theatre query.");

//fetch row and assign to variables

$row = mysql_fetch_array($sql_result);
$thea_uid = $row["thea_uid"];
$lastname = $row["lastname"];
$firstname = $row["firstname"];
$midname = $row["midname"];
$pass_uid = $row["pass_uid"];
$pass = $row["pass"];
$username = $row["username"];

if (!$sql_result) {
	include("banner.inc");
	echo "
	<P align = 'center'>Could not get Theatre record (Error: $sql_result). Notify us at info@strawhat-auditions.com if you keep seeing this error</P>";
	} 
elseif (!$pass_uid){
	include("banner.inc");
	echo "<P align = 'center'>Theatre Password record does not exist. Email info@strawhat-auditions.com for help.</P>";
}
		
else {
//encrypt password
//prepare for slashes, trim
trim($p_entered);





if(crypt($p_entered,$pass)!= $pass) {

	echo "<p align = 'center'>Incorrect Password: $p_entered. If you forgot your password, go to <a href=\"pwd_searchnamereset.php\">Reset Username/Password</a></p>";
	exit();
}


	elseif($username != $u_entered) {

	echo "<p align = 'center'>Incorrect Username: $u_entered. If you forgot your username, go to <a href=\"pwd_searchnamereset.php\">Reset Username/Password</a></p>";
	exit();
	}
		
	else {	

//strip slashes from database
$lastname = stripslashes(trim($lastname));


echo "

<h2 align = \"center\">Welcome $firstname $lastname!</h1>


<p align = \"center\">Select the links and follow the prompts to make your changes.</p> 


</TABLE> 
<h2 align=\"center\">Update your Theatre Profile:</h1>


<table width=\"50%\" align = \"center\" border=\"2\" cellspacing=\"1\" cellpadding=\"1\">
  <tr>
    <td align=\"center\" colspan = \"2\">
      <form name=\"form1\" method=\"post\" action=\"thea_modifyrecord2.php\">
      <input type = \"hidden\" name = \"thea_uid\" value = \"$thea_uid\">
      <input type=\"submit\" name=\"Submit\" value=\"Contact Information\">
      </form>
    <p>Update your contact information: address, phone, email</p>
    </td>
";
/*    <td align=\"center\" width=\"50%\">

      
      <form name=\"form1\" method=\"post\" action=\"../app_theatre_printout.php\">
        <input type = \"hidden\" name = \"print_uid\" value = \"$thea_uid\">
        <input type=\"submit\" name=\"app_printout\" value=\"Print Your Theatre Application\">
        </form>
        <p>Preview your application and print it out!</p>
        
        
      </td>
*/      

      echo "      
  </tr>
  
  <tr>
    <td align=\"center\">
        <form name=\"form1\" method=\"post\" action=\"skills_modifyrecord2.php\">
        <input type = \"hidden\" name = \"thea_uid\" value = \"$thea_uid\">
        <input type=\"submit\" name=\"skills\" value=\"Technical Skills and Other Jobs\">
        </form>
        <p>Your Staff/Tech/Design Job Listing</p>
      </td>
    
  
    <td align=\"center\">
        <form name=\"form1\" method=\"post\" action=\"pwd_change.php\">
        <input type = \"hidden\" name = \"sel_record\" value = \"$thea_uid\">
        <input type=\"submit\" name=\"pass\" value=\"Username/Password\">
        </form>
        <p>Reset your Theatre username and password.<BR></p>
    </td>
      
  </tr>
  
  <tr>
    <td align=\"center\">
        <form name=\"form1\" method=\"post\" action=\"perfs_modifyrecord2.php\">
        <input type = \"hidden\" name = \"thea_uid\" value = \"$thea_uid\">
        <input type=\"submit\" name=\"performers\" value=\"Theatre Performers\">
        </form>
        <p>Your Job Listing for Actors, Interns, <br>
        Apprentices, and Musicians.</p>      
    </td>
  
    <td align=\"center\">
        <form name=\"form1\" method=\"\" action=\"../../index.php\">
        <input type=\"submit\" value=\"Done\">
        </form>
        <p>Leave Change Theatre Application</p>    
       </td>
    </tr>
   
    <tr>
    <td colspan = \"2\">
    <div align = \"center\">
    <img src=\"../../graphics03/BALL3.GIF\" alt=\"[*]\" width=\"14\" height=\"14\" border=\"0\"> 
        <a href=\"2017_TheaReg_WRITABLE.pdf\" target=\"myNewWin\" onClick=\"sendme()\"    
        ONMOUSEOVER=\"this.style.color='red'\" ONMOUSEOUT=\"this.style.color='blue'\"> 
        Complete Your Writable PDF Payment Form</a>
        </div>
    </td>
    </tr>
  
</table>


	

</body>
</html>
";
}
}
?>