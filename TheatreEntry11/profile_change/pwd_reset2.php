<?php
$t_email = $_POST['t_email'];
$t_zip = $_POST['t_zip'];
echo "
<HTML>
<HEAD>
<TITLE>Strawhat Reset Theatre Username and Password</TITLE>
<link rel=\"stylesheet\" href=\"members.css\" type=\"text/css\">
</HEAD>
<BODY>
";

include("banner.inc");
//$t_email = $t_email;

if(!$t_email) {
	echo" <div align = 'center'><p>Please enter an email address. Use the Back button to get to previous screen.</p>";
	exit;
}

if(!$t_zip) {
    echo" <div align = 'center'><p>Please enter a five digit zip code. Use the Back button to get to previous screen.</p>";
    exit;
}



$sql = "SELECT thea_uid, email
		FROM theatre11 
		WHERE email = \"$t_email\"
        AND zip = \"$t_zip\"
		";

include("../../Comm/connect.inc");

$sql_result = mysql_query($sql,$connection) or 
	die("Couldn't execute query on $thea_uid") ;

$row = mysql_fetch_array($sql_result);

$thea_uid = $row["thea_uid"];
$email = $row["email"];
$zip = $row["zip"];

if(!$t_email){
	die("<p align = 'center'>No email address for $t_email. Please check the address and go back to re-enter the email address.</p>");
    exit;
}

if(!$t_zip) {
    echo" <p \"center\">Please enter a 5 digit zip code. Use the Back button to get to previous screen.</p>";
    exit;
}

//create new random username, passwords
$new_user = "theac" . rand(1000, 5000);
//echo "$new_user"; for testing
$new_pwd = "thea" . rand(6000, 8000);
//echo "$new_pwd"; for testing


//crypt new password
$pass = crypt(trim($new_pwd), '.v');
$username = (trim($new_user) );

//SQL statement to update record
$sql = "UPDATE theapwd11 SET 
pass=\"$pass\",
username = \"$username\"
WHERE pass_uid = \"$thea_uid\"
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


<h1 align = \"center\">You have reset your username and password</h1>
<p align = \"center\">Use the username and password below to login to change theatre application, 
<BR> where you can then change your username and password as needed.</p>



<table width=\"30%\" border=\"0\" align = \"center\">
    <tr>
      <td>Username: <BR>$new_user</td>
      <td>Password: <br>$new_pwd</td>
    </tr>
  </table>
<p align = \"center\"><a href = \"http://strawhat-auditions.com/newtheater.htm\">Back to Theatre Applications</a></p>

</BODY>
</HTML>
";

	}
?>