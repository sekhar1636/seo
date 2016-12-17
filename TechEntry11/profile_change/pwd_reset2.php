`<?php
$t_email = $_POST['t_email'];


echo "
<HTML>
<HEAD>
<TITLE>Strawhat Reset Staff Tech Design Username and Password</TITLE>
<link rel=\"stylesheet\" href=\"actors.css\" type=\"text/css\">
</HEAD>
<BODY>
";

include("banner.inc");
$t_mail = $t_email;

if(!$t_email) {
	echo" <h3 align = \"center\">Please enter an email address. 
    <BR>
    Use the Back button to get to previous screen.</h3>";
	exit;
}




$sql = "SELECT tech_uid, email
		FROM techies11 
		WHERE email = \"$t_email\"
		";

include("../../Comm/connect.inc");

$sql_result = mysql_query($sql,$connection) or 
	die("Couldn't execute query on $tech_uid") ;

$row = mysql_fetch_array($sql_result);
$email = $row["email"];
$tech_uid = $row["tech_uid"];

if(!$email)
{
	die("<P align = \"center\">No email address for $t_email. Please check the address and go back to re-enter the email address.</p>");    
}



//create new random username, passwords
$new_user = "tech" . rand(1000, 5000);
$new_pwd = "staff" . rand(6000, 8000);



/*

//add slashes to check for existing passwords
$c_username = addslashes(trim($u_entered));
$c_pass = addslashes(trim($p_entered));
//$c_hint = addslashes(trim($p_hint));

 //check to make sure password is unique
$c_pass = crypt(trim($p_entered), '.v');

//get the current password

	$checkname = "SELECT username, pass
		FROM pwd11 
		WHERE pass = '$c_pass'
		";

include("../connect.inc");

/*execute SQL query for checking duplicate passwords
$check_result = mysql_query($checkname,$connection) or die("Couldn't execute CheckName query on Pwd Table.");

	if (!$check_result){
	echo "<P>No CheckName Result.</P>";
	exit;}

	elseif(mysql_num_rows($check_result) !=0) {
		echo "<p>\"$p_entered\" already exists. Please use another password.<br>
		Use your back button to re-enter your username and password information.
		";
		echo "</p></BODY></HTML>";
		exit;}

	else {
*/
//crypt new password
$pass = crypt(trim($new_pwd), '.v');
$username = (trim($new_user) );

//SQL statement to update record
$sql = "UPDATE techpwd11 SET 
pass=\"$pass\",
username = \"$username\"
WHERE pass_uid = \"$tech_uid\"
 ";

include("../../Comm/connect.inc");

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");

if (!$sql_result) {
	echo "<P align = \"center\">Couldn't update record! Please try again and if you continue to have problems, please contact jay@strawhat-audiitons.com.</P>";
	} else {

//set up confirming email
$straw = "jay@strawhat-auditions.com";
$from = "From: info@strawhat-auditions.com \r \n";
$mesg = "Your StrawHat Auditions Member password
have been reset. This message is to confirm this to you in case the change
was made without your knowledge. In that case, please confirm that your
registration is okay and let us know if you need any help. \r \n
Regards \r \n
StrawHat";

trim($email);

if (mail($email, "StrawHat Auditions Password Change", $mesg, $from) ) 
{
	mail($straw, "StrawHat Auditions Password Change", $mesg, $from);
}	

echo "	

<table width=\"50%\" border=\"0\" align = \"center\">
<tr>
<td>
<h1>You have reset your username and password.</h1>
<p>Use the username and password below to login to change your Staff, Tech Design application, where you can then change your username and password as needed.</p>



<table width=\"50%\" border=\"0\" align = \"center\">
    <tr>
      <td>Username: <BR>$new_user</td>
      <td>Password: <br>$new_pwd</td>
    </tr>
  </table>
<p><a href = \"../profile_change/tech_searchlastname.php\">Reset Your Username and Password</a></p>
</td>
</tr>
</table>



</BODY>
</HTML>
";

	}
?>`