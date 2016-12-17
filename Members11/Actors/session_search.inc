<?php
//Replacing code below with above, 8/16/13

session_start();
    
if(!$_SESSION['sess_var']) {    
    echo "Not a registered user $sess_var<a href=\"../Members11/member_entrya.php\">please login here.</a>";
    exit;
}


//set up banner and navbar - refers to local navbar in Navbar Folder
include("navbar.inc");
?>



<?php
/*
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
*/
?>
