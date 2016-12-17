<?php
$t_email = $_POST['t_email'];
$t_zip = $_POST['t_zip'];
echo "
<HTML>
<HEAD>
<TITLE>Strawhat Reset Actor Username and Password</TITLE>
<link rel=\"stylesheet\" href=\"actors.css\" type=\"text/css\">
</HEAD>
<BODY>
";

include("banner.inc");
$t_mail = $t_email;

if(!$t_email) {
	echo" <p align = \"center\">Please enter an email address. Use the Back button to get to previous screen.</p>";
	exit;
}

if(!$t_zip) {
    echo" <p \"center\">Please enter a 5 digit zip code. Use the Back button to get to previous screen.</p>";
    exit;
}



$sql = "SELECT actor_uid, firstname, lastname, email, zip
		FROM actor11 
		WHERE email = \"$t_email\" AND
        zip = \"$t_zip\"
		";

include("../../Comm/connect.inc");

$sql_result = mysql_query($sql,$connection) or 
	die("Couldn't execute query on $actor_uid") ;

$row = mysql_fetch_array($sql_result);
$actor_uid = $row["actor_uid"];
$firstname = $row["firstname"];
$lastname = $row["lastname"];

$email = $row["email"];
$zip = $row["zip"];


if(!$email){
	die("<p align = \"center\">No email address found for $t_email. Please check the address and 
     <a href=\"pwd_searchnamereset.php\">Go back to re-enter the email address.</a>");
}

if(!$zip){
    die("<p align = \"center\">No zip code found for $t_zip. Please check the address and go back to re-enter the email address.");
}


//create new random username, passwords
$new_user = "actor" . rand(1000, 5000);
$new_pwd = "thea" . rand(6000, 8000);



//crypt new password
$pass = crypt(trim($new_pwd), '.v');
$username = (trim($new_user) );

//SQL statement to update record
$sql = "UPDATE pwd11 SET 
pass=\"$pass\",
username = \"$username\"
WHERE pass_uid = \"$actor_uid\"
 ";

include("../../Comm/connect.inc");

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");

if (!$sql_result) {
	echo "<P align = \"center\">Couldn't update record! Please try again and if you continue to have problems, please contact jay@strawhat-auditions.com.</P>";
	} else {

//set up confirming email
$straw = "jay@strawhat-auditions.com";
$from = "From: info@strawhat-auditions.com \r \n";
$mesg = "
Atn: $firstname $lastname ($actor_uid)  \r \n
Your StrawHat Auditions Member password
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


<h1 align = \"center\">You have reset your username and password</h1>
<p align = \"center\">Use the username and password below to login to change actor application.<BR>
 You can then change your username and password as needed.</p>



<table width=\"40%\" border=\"0\" align = \"center\">
    <tr>
      <td>Username: <BR>$new_user</td>
      <td>Password: <br>$new_pwd</td>
    </tr>
  </table>
<p align = \"center\"><a href = \"../../actorap.htm\">Back to Actor Applications</a></p>

</BODY>
</HTML>
";

	}
?>