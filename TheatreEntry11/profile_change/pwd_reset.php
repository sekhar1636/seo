<?php

echo "
<HTML>
<HEAD>
<TITLE>Strawhat Update Actor Username and Password</TITLE>
<link rel=\"stylesheet\" href=\"actors.css\" type=\"text/css\">
</HEAD>
<BODY>
";

include("banner.inc");


if (!$actor_uid) {
	echo("Can't see $actor_uid");
	exit;
	}

if(!$p_entered) {
	echo" <p>Please enter a password. Use the Back button to get to previous screen.</p>";
	exit;
}

if(!$p_entered2) {
	echo" <p>Please confirm your password. Use the Back button to get to previous screen.</p>";
	exit;
}

if(!$u_entered) {
	echo"<p>Please enter a username. Use the Back button to get to previous screen.</p>";
	exit;
}

if(!$p_hint) {
	echo"<p>Please enter a hint for the password. Use the Back button to get to previous screen.</p>";
	exit;
}


if($p_entered != $p_entered2) {
	echo"<p>Confirming password does not match password. Use the Back button to get to previous screen. Please make sure your new password and the confirming password match.</p>";
	exit;
}




$sql = "SELECT actor11.actor_uid, actor11.email, pwd11.username, pwd11.pass_uid, pwd11.hint
		FROM actor11, pwd11 
		WHERE actor_uid = \"$actor_uid\"
		AND pass_uid = \"$actor_uid\"
		";

include("../../Comm/connect.inc");

$sql_result = mysql_query($sql,$connection) or 
	die("Couldn't execute query on $actor_uid") ;

$row = mysql_fetch_array($sql_result);
$email = $row["email"];
$username = $row["username"];
$pass_uid = $row["pass_uid"];
$hint = $row["hint"];


/* not needed unless you are checking if username is correct.
if($username != $u_entered) {
	echo "<p>Incorrect username, please use back button to try again.<br>
	actor_uid: $actor_uid. pass_uid: $pass_uid. username: $username email: $email
	
	</p>";		
	exit;
}
*/
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

include("../../Comm/connect.inc");

/*execute SQL query for checking duplicate passwords*/
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

//crypt passwords
$pass = crypt(trim($p_entered), '.v');
$username = addslashes(trim($u_entered) );
$hint = addslashes(trim($p_hint));

//set password type - Actor, Techie or (D)Theatre
$type = 'A';

//SQL statement to update record
$sql = "UPDATE pwd11 SET 
pass=\"$pass\",
type=\"$type\",
username = \"$username\",
hint = \"$hint\"
WHERE pass_uid = \"$actor_uid\"
 ";

include("../../Comm/connect.inc");

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");

if (!$sql_result) {
	echo "<P>Couldn't update record!</P>";
	} else {

//set up confirming email
$from = "From: info@strawhat-auditions.com \r \n";
$mesg = "Your StrawHat Auditions Member password
have been changed. This message is to confirm this to you in case the change
was made without your knowledge. In that case, please confirm that your
registration is okay and let us know if you need any help. \r \n
Regards \r \n
StrawHat";

trim($email);

if (mail($email, "StrawHat Auditions Password Change", $mesg, $from) ) 

{
/*
	return true;}
else {
	return false;		
*/
}	



/*echo "
<HTML>
<HEAD>
<TITLE>Strawhat 2010 Updated Actor Username and Password</TITLE>
<link rel=\"stylesheet\" href=\"actors.css\" type=\"text/css\">
</HEAD>
<BODY>
";

include("banner.inc");	
*/

echo "	


<h1>You have made these changes to your password:</h1>

<table width=\"50%\" border=\"0\">
    <tr> 
      <td>Username: <BR>$username</td>
      <td>Password: <br>$p_entered</td>
      <td>Hint:<br> $p_hint</td>
    </tr>
     
    <tr>
      <td colspan = \"3\"><FORM method = \"POST\" action = \"changes07.php\">
<input type = \"hidden\" name = \"actor_uid\" value = \"$actor_uid\">
<p align = \"center\"><INPUT type=\"submit\" value =\"Done\"> </p></FORM></td>
	</tr>
  </table>
  
</BODY>
</HTML>
";
}
	}
?>