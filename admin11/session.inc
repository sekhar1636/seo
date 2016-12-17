<?php
session_start();

//global $valid_user;
//if(!session_is_registered("valid_user")){


    
if(!$_SESSION['sess_var']) {    
    echo "Not a registered user $sess_var<a href=\"http://www.strawhat-auditions.com\">Contact admin.</a>";
    exit;
}


//set up banner and navbar
//include("navbar.inc");

?>