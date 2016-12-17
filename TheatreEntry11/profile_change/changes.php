<?php
$thea_uid = $_POST['thea_uid'];


if (!$thea_uid) {
	echo "No thea_uid";    
	exit;
	}

	
echo "

<html>
<head>
<title>StrawHat Theatre Update Profile</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
<link rel=\"stylesheet\" href=\"theatre.css\" type=\"text/css\">
</head>
<body>

<TABLE WIDTH=\"75%\" align=\"center\"> 
		<TR> 
  		
    <TD>
    <a href=\"/..\/../index.php\">
    <IMG SRC=\"/graphics03/straw99.gif\" ALT=\"StrawHat Auditions (logo)\" ALIGN=\"RIGHT\" BORDER=\"0\" width=\"127\" height=\"97\">
    </A>
    </TD> 
		
    <TD><IMG SRC=\"/graphics03/strawhat_banner17_dates-and-deadlines.jpg\" ALIGN=\"LEFT\" ALT=\"StrawHat Auditions\" width=\"590\" height=\"125\"></TD> 
		</TR> 
</TABLE> 


<p align = \"center\">Select the links and follow the prompts to make your changes.</p> 



<h2 align=\"center\">Update your Theatre Profile:</h1>



<table width=\"50%\" align = \"center\" border=\"2\" cellspacing=\"1\" cellpadding=\"1\">
  <tr>
    <td align=\"center\" colspan = \"2\">
      <form name=\"form1\" method=\"post\" action=\"thea_modifyrecord2.php\">
      <input type = \"hidden\" name = \"thea_uid\" value = \"$thea_uid\">
      <input type=\"submit\" name=\"Submit\" value=\"Contact Information\">
      </form>
    <p>Update your contact information: address, phone, email</p>
    </td>
";
/*    <td align=\"center\" width=\"50%\">

      
      <form name=\"form1\" method=\"post\" action=\"../app_theatre_printout.php\">
        <input type = \"hidden\" name = \"print_uid\" value = \"$thea_uid\">
        <input type=\"submit\" name=\"app_printout\" value=\"Print Your Theatre Application\">
        </form>
        <p>Preview your application and print it out!</p>
        
        
      </td>
*/      

      echo "      
  </tr>
  
  <tr>
    <td align=\"center\">
        <form name=\"form1\" method=\"post\" action=\"skills_modifyrecord2.php\">
        <input type = \"hidden\" name = \"thea_uid\" value = \"$thea_uid\">
        <input type=\"submit\" name=\"skills\" value=\"Technical Skills and Other Jobs\">
        </form>
        <p>Your Staff/Tech/Design Job Listing</p>
      </td>
    
  
    <td align=\"center\">
        <form name=\"form1\" method=\"post\" action=\"pwd_change.php\">
        <input type = \"hidden\" name = \"sel_record\" value = \"$thea_uid\">
        <input type=\"submit\" name=\"pass\" value=\"Username/Password\">
        </form>
        <p>Reset your Theatre username and password.<BR></p>
    </td>
      
  </tr>
  
  <tr>
    <td align=\"center\">
        <form name=\"form1\" method=\"post\" action=\"perfs_modifyrecord2.php\">
        <input type = \"hidden\" name = \"thea_uid\" value = \"$thea_uid\">
        <input type=\"submit\" name=\"performers\" value=\"Theatre Performers\">
        </form>
        <p>Your Job Listing for Actors, Interns, <br> 
        Apprentices, and Musicians.</p>      
    </td>
  
    <td align=\"center\">
        <form name=\"form1\" method=\"\" action=\"../../index.php\">
        <input type=\"submit\" value=\"Done\">
        </form>
        <p>Leave Change Theatre Application</p>    
       </td>
    </tr>

   
    <tr>
    <td colspan = \"2\">
    <div align = \"center\">
    <img src=\"../../graphics03/BALL3.GIF\" alt=\"[*]\" width=\"14\" height=\"14\" border=\"0\"> 
        <a href=\"2017_TheaReg_WRITABLE.pdf\" target=\"myNewWin\" onClick=\"sendme()\"    
        ONMOUSEOVER=\"this.style.color='red'\" ONMOUSEOUT=\"this.style.color='blue'\"> 
        Complete your Writable PDF Payment Form</a>
        </div>
    </td>
    </tr>
    
    
</table>


</body>
</html>
";

?>