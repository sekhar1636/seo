<?php
session_start();

global $valid_user;
if(!session_is_registered("valid_user")){
	echo "Not a registered user $valid_user<a href=\"member_entry.php\">please login here.</a>";
	exit;
}

else {
	echo "Session $valid_user.";
	echo "<br>";
} 

//set up banner and navbar
//include("navbar.inc");

?>