<?php
session_start();
//changed 8/13/13 
//global $valid_user;
if(!$_SESSION['sess_var']) {
	echo "Not a registered user $valid_user<a href=\"member_entry.php\">please login here.</a>";
	exit;
}

//set up banner and navbar
include("navbar.inc");

?>
