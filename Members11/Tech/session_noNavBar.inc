<?php
session_start();

global $valid_user;
if(!$_SESSION['sess_var']) {
	echo "Not a registered user $valid_user<a href=\"../member_entrya.php\">Please login here.</a>";
	exit;
}


?>

