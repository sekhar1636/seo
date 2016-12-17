<?php

$sel_record = $_POST['sel_record'];
$u_entered = $_POST['u_entered'];
$p_entered = $_POST['p_entered'];
$actor_uid = $_POST['actor_uid'];
?>

<HTML>
<HEAD>
<TITLE>StrawHat Actor Application Categories</TITLE>
<link rel="stylesheet" href="actors.css" type="text/css">
</HEAD>
<BODY BACKGROUND=\"Bk10a.GIF\">



<?php
include("../../Comm/connect.inc");

include("banner.inc");

if (!$sel_record) {

	echo "<p align = \"center\">
    <a href = http://localhost/ActorEntry11/profile_change/actor_searchlastname.php>
    No selection was made, please go back to the previous page and select an actor.</a></p>";
	//exit;
	}

//check input
if(!$p_entered)	{

	echo "<p align = \"center\">
    <a href = http://localhost/ActorEntry11/profile_change/actor_searchlastname.php>
    No Password entered: please enter your password.</a></p>";
	}
    
if(!$u_entered) {

	echo "<p align = \"center\">
    <a href = http://localhost/ActorEntry11/profile_change/actor_searchlastname.php>
    No Username entered: please go back and type your username.</a>
    </p>";
	}

if(!$p_entered || !$u_entered) {
	die();
}	
	
	
//check to see if the pass_uid exists
	
include("../../Comm/connect.inc");

//SQL statement to select record
$sql = "SELECT actor_uid, lastname, firstname, midname, username, pass_uid, pass
FROM actor11, pwd11  
WHERE actor_uid = \"$sel_record\" AND
actor11.actor_uid = pwd11.pass_uid
";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute Main query.");

//fetch row and assign to variables

$row = mysql_fetch_array($sql_result);
$actor_uid = $row["actor_uid"];
$lastname = $row["lastname"];
$firstname = $row["firstname"];
$midname = $row["midname"];
$pass_uid = $row["pass_uid"];
$pass = $row["pass"];
$username = $row["username"];

if (!$sql_result) {
	include("banner.inc");
	echo "
	<P>Could not get record (Error: $sql_result). Notify us at info@strawhat-auditions.com if you keep seeing this error</P>";
	} 
elseif (!$pass_uid){
	include("banner.inc");
	echo "Password record does not exist. Email administrator for help";
}
		
else {
//encrypt password
//prepare for slashes, trim
trim($p_entered);



if(crypt($p_entered,$pass)!= $pass) {

	echo "<p align = \"center\">Incorrect Password: <a href=\"../profile_change/actor_searchlastname_input.php\">
    Go back and try again.</a>.
    <BR> If you forgot your password, go to <a href=\"pwd_searchnamereset.php\">Reset Username/Password</a></p>";
	exit();
}


	elseif($username != $u_entered) {

	echo "<p align = \"center\">Incorrect Username. If you forgot your username, go to 
    <a href=\"pwd_searchnamereset.php\">Reset Username/Password</a></p>";
	exit();
	}
		
	else {	

//strip slashes from database
$lastname = stripslashes(trim($lastname));


echo "
 
<p align = \"center\"><font = \"arial\" size = '5'><b>Welcome $firstname $lastname!</b></br>
<b>Changing your Actor Profile:</font></b></p>
 
 
<TABLE WIDTH=\"65%\" align = \"center\">
<tr>
<td>Select the links and follow the prompts to make your changes. To review the instructions for finishing your application, please click 
";

echo "
<a href=\"app_instructions.php\" target=\"myNewWin\" onClick=\"sendme()\">
<em>HERE.</em></a>
";



echo "

  Please note that once you have mailed your completed StrawHat Application, you cannot change your audition day/time without calling or emailing your request. 
</td>
</tr>
</TABLE>

<table width=\"65%\" align = \"center\" border=\"2\" cellspacing=\"1\" cellpadding=\"1\">
  <tr>
    <td align=\"center\" >
      <form name=\"form1\" method=\"post\" action=\"actor_modifyrecord2.php\">
      <input type = \"hidden\" name = \"actor_uid\" value = \"$actor_uid\">
      <input type=\"submit\" name=\"Submit\" value=\"Contact Information\">
		</form>
	<p>Update your contact information: address, phone, email</p>
    </td>
  
    <td align=\"center\" width=\"50%\">
        <form name=\"form1\" method=\"post\" action=\"aud_modifyrecord2.php\">
		<input type = \"hidden\" name = \"actor_uid\" value = \"$actor_uid\">
        <input type=\"submit\" name=\"audition\" value=\"Audition Information\">
		</form>
		<p>Indicate your audition preferences, have you auditioned for us before, etc.</p>
      </td>
  </tr>
  <tr>
    <td align=\"center\">
        <form name=\"form1\" method=\"post\" action=\"physical_modifyrecord2.php\">
		<input type = \"hidden\" name = \"actor_uid\" value = \"$actor_uid\">
        <input type=\"submit\" name=\"physical\" value=\"Physical Attributes\">
		</form>
		<p>Height, weight, size, other information useful to casting and costume designers</p>
      </td>
    
  
    <td align=\"center\">
        <form name=\"form1\" method=\"post\" action=\"roles_modifyrecord2.php\">
		<input type = \"hidden\" name = \"actor_uid\" value = \"$actor_uid\">
        <input type=\"submit\" name=\"roles\" value=\"Favorite Roles\">
      </form>
      <p>Listing roles, shows, where you played and directors.</p>
	  </td>
	  
  </tr>
  <tr>
    <td align=\"center\">
        <form name=\"form1\" method=\"post\" action=\"skills_modifyrecord2.php\">
		<input type = \"hidden\" name = \"actor_uid\" value = \"$actor_uid\">
        <input type=\"submit\" name=\"skills\" value=\"Other Skills\">
        </form>
        <p>Rate your skills in technical theatre and other arts, abilities useful to our theatres.</p>
	  </td>
  
    <td align=\"center\">
        <form name=\"form1\" method=\"post\" action=\"../app_printout.php\">
		<input type = \"hidden\" name = \"print_uid\" value = \"$actor_uid\">
        <input type=\"submit\" name=\"app_printout\" value=\"Print Application\">
        </form>
        <p>Preview your application and print it out!<BR><BR></p>
	  </td>
  </tr>
  
  <tr>
  
    <td align=\"center\">
        <form name=\"form1\" method=\"post\" action=\"pwd_change.php\">
		<input type = \"hidden\" name = \"sel_record\" value = \"$actor_uid\">
        <input type=\"submit\" name=\"pass\" value=\"Username/Password\">
        </form>
        <p>Change your username and or password.<BR></p>
	  </td>

 	<td align=\"center\">
        <form name=\"form1\" method=\"\" action=\"../../index.php\">
        <input type=\"submit\" value=\"Done\">
        </form>
        <p>Leave Change Actor Application</p>
	  </td>	  
	  
	<tr>
</table>


	

</body>
</html>
";
}
}
?>