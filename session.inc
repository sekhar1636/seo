<?php
session_start();

global $valid_user;
if(!session_is_registered("valid_user")){
	echo "Not a registered user $valid_user<a href=\"member_entrya.php\">please login here.</a>";
	exit;
}


//set up banner and navbar - refers to local navbar in Actors folder
include("navbar.inc");

?>