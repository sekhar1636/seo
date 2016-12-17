<?php
session_start();

//global $valid_user;
//if(!session_is_registered("valid_user")){


    
if(!$_SESSION['sess_var']) {    
    echo "Not a registered user $sess_var<a href=\"../Members11/member_entrya.php\">please login here.</a>";
    exit;
}


//set up banner and navbar
include("navbar.inc");

?>