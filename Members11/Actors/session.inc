<?php
session_start();
    
if(!$_SESSION['sess_var']) {    
    echo "No longer a registered user $sess_var<a href=\"/Members11/member_entrya.php\">please login here.</a>";
    exit;
}


//set up banner and navbar - refers to local navbar in Navbar Folder
include("navbar.inc");

?>