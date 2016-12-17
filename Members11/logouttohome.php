<?php
include("session_logout.inc");
?>


<?php

//$old_user = $valid_user;
//$result = session_unregister("valid_user");
//session_destroy();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<HTML> 
  <HEAD> 
	 <TITLE>StrawHat Auditions Logout</TITLE><LINK
	 REL="STYLESHEET" HREF="/styles/members.css"> 
  </HEAD> 
  <BODY BACKGROUND="../graphics03/Bk10a.GIF"> <SCRIPT SRC="navbar.js"></SCRIPT>

<h2 align = "center">StrawHat Logout</h2>
<?php

/*
if(!empty($old_user) ) {
	if ($result) {
		//if they were logged in and are not logged out
		echo "<p>You have logged out of the Members Area.</p>";
		}
		else {
			echo "<p>Could not complete log out.</p>";
		}
		}
*/        
?>

<P align = "center">Thank you for visiting the StrawHat Members Area.</P> 

<P align = "center">
<!--for remote site <a href="http://www.strawhat-auditions.com">Back to Home Page</a><BR> -->    
<!--for local site -->     <a href="http://www.strawhat-auditions.com">Back to Home Page</a><BR> 
    </p>

</BODY>
</HTML>
