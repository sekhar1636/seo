<?php
session_start();

/*
global $valid_user;
if(!session_is_registered("valid_user")){
	echo "Not a registered user $valid_user<a href=\"member_entrya.php\">please login here.</a>";
	exit;
}
*/


if(!$_SESSION['sess_var']) {    
    echo "Not a registered user. <a href=\"../Members11/member_entrya.php\">
    Please login here.</a>";

    
//session_destroy();    
    exit;
}


echo "
<TABLE WIDTH=\"95%\" align = \"center\"> 
		<TR> 
  		<TD><IMG SRC=\"../../graphics03/straw99.gif\" ALT=\"StrawHat Auditions (logo)\"ALIGN=\"RIGHT\" BORDER=\"0\"></TD> 
		<TD><IMG SRC=\"../../graphics03/strawhat_banner17_dates-and-deadlines.jpg\" ALIGN=\"CENTER\" ALT=\"StrawHat Auditions\"></TD> 
		</TR> 
</TABLE> 
";  

//set up banner and navbar - refers to local navbar in Actors folder
//include("navbar.inc");

?>