<?php
$tech_uid = $_POST['tech_uid'];

if (!$tech_uid) {
	echo "No tech_uid";

	exit;
	}

	
echo "

<html>
<head>
<title>StrawHat Staff / Tech / Design Update Profile</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
<link rel=\"stylesheet\" href=\"actors.css\" type=\"text/css\">
</head>
<body>
<TABLE WIDTH=\"95%\" align = 'center'> 
		<TR> 
     
<TD>    
<a href=\"../../index.php\"><IMG SRC=\"../../graphics03/straw99.gif\"
              ALT=\"Back to Home Page... Strawhat Actors, Singers, Dancers, Staff, Tech, Design Apply Now!\" 
              WIDTH=\"127\" HEIGHT=\"97\" border=\"0\" align = \"right\">
        </a>
</TD>    
		
    <TD><IMG SRC=\"/graphics03/strawhat_banner17_dates-and-deadlines.jpg\" ALIGN=\"CENTER\" ALT=\"StrawHat Auditions\" width=\"590\" height=\"125\"></TD> 
		</TR> 
</TABLE> 
<h2 align = \"center\">Update your Staff/Tech/Design Profile:</h2>
<p align = 'center'>You can update your profile at any time. Select the links and follow 
  the prompts to make your changes.  
</p>


<table width=\"65%\" align = \"center\" border=\"2\" cellspacing=\"1\" cellpadding=\"1\">
<tr>
    <td align=\"center\" >
      <form name=\"form1\" method=\"post\" action=\"tech_modifyrecord2.php\">
      <input type = \"hidden\" name = \"tech_uid\" value = \"$tech_uid\">
      <input type=\"submit\" name=\"Submit\" value=\"Contact Information\">
		</form>
	<p>Update your contact information.</p>
    </td>
  
    <td align=\"center\" width=\"50%\">
        <form name=\"form1\" method=\"post\" action=\"techapp_modifyrecord2.php\">
		<input type = \"hidden\" name = \"tech_uid\" value = \"$tech_uid\">
        <input type=\"submit\" name=\"info\" value=\"Staff Tech Design Information\">
		</form>
		<p>Indicate your preferences.</p>
      </td>
  </tr>
  <tr>
    <td align=\"center\">
        <form name=\"form1\" method=\"post\" action=\"roles_modifyrecord2.php\">
		<input type = \"hidden\" name = \"tech_uid\" value = \"$tech_uid\">
        <input type=\"submit\" name=\"roles\" value=\"Work History\">
		</form>
		<p>Highlights, work history, references</p>
      </td>
    
	<td align=\"center\">
        <form name=\"form1\" method=\"post\" action=\"tech_modifyportfolio.php\">
		<input type = \"hidden\" name = \"tech_uid\" value = \"$tech_uid\">
        <input type=\"submit\" name=\"portfolio\" value=\"Portfolio\">
		</form>
		<p>Enter information describing your portfolio.</p>
      </td>
   </tr>   
   <tr>

   <td align=\"center\">
        <form name=\"form1\" method=\"post\" action=\"pwd_change.php\">
		<input type = \"hidden\" name = \"sel_record\" value = \"$tech_uid\">
        <input type=\"submit\" name=\"reset\" value=\"Username/Password\">
        </form>
        <p>Change your username and or password.<BR></p>
	  </td>
 
     
<td align=\"center\">
        <form name=\"form1\" method=\"post\" action=\"../techapp_printout.php\">
		<input type = \"hidden\" name = \"print_uid\" value = \"$tech_uid\">
        <input type=\"submit\" name=\"printout\" value=\"Print Application\">
        </form>
        <p>Print your Staff Tech Design Application for you records</p>
	  </td>	  
  </tr>


 <tr>
	<td colspan = \"2\" align=\"center\">
        <form name=\"form1\" method=\"\" action=\"../../index.php\">
        <input type=\"submit\" name=\"home\" value=\"Done\">
        </form>
        <p>Leave Change Staff Tech Design Application</p>
	  </td>	  
 
 </tr>	    
	  	  
	  
  </tr>
</table>


</body>
</html>
";

?>