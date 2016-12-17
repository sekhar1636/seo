<?php

$actor_uid = $_POST['actor_uid'];

if (!$actor_uid) {
	echo "No actor_uid";
    
    $sel_record = $_POST['sel_record'];

include("../../Comm/connect.inc");

if (!$sel_record) {
    echo "<P>Couldn't find UID!</P>";
    } else {
$actor_uid = $sel_record;    
    }

	exit;
	}

/*    
$sel_record = $_POST['sel_record'];

include("../../Comm/connect.inc");

if (!$sel_record) {
    echo "<P>Couldn't find UID!</P>";
    } else {
$actor_uid = $sel_record;    
    }
*/    	
echo "

<html>
<head>
<title>StrawHat Actor Update Profile</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
<link rel=\"stylesheet\" href=\"actors.css\" type=\"text/css\">
</head>
<body>
<TABLE  width = \"65%\" align = \"center\">
    <TR>   		
    
    <TD>    
    <a href=\"../../index.php\">
    <IMG SRC=\"/graphics03/straw99.gif\" ALT=\"StrawHat Auditions (logo)\" ALIGN=\"CENTER\" 
    BORDER=\"0\" width=\"127\" height=\"97\">
    </a>    
    </TD> 
		
    <TD><IMG SRC=\"/graphics03/strawhat_banner17_dates-and-deadlines.jpg\" ALIGN=\"CENTER\" ALT=\"StrawHat Auditions\">    
    </TD> 
    </TR> 
</TABLE> 

<h1 align = \"center\">Update your Actor Profile:</h1>

<TABLE  width = \"65%\" align = \"center\">
<TR>
<TD>
<p>Select the links and follow the prompts to make your changes. To review the instructions for finishing your application, please 

 
<a href=\"app_instructions.php\" target=\"myNewWin\" onClick=\"sendme()\"
        ONMOUSEOVER=\"this.style.color='red'\" 
        ONMOUSEOUT=\"this.style.color='blue'\">  
        Click Here.</a></p>
   
  Please note that once you have mailed your completed StrawHat Application, you cannot change your audition day/time without calling or emailing your request. 
</p>
</TD>
</TR>
</TABLE>

<table width=\"65%\" align = \"center\" border=\"2\" cellspacing=\"1\" cellpadding=\"1\">
  <tr>
    <td align=\"center\" >
      <form name=\"form1\" method=\"post\" action=\"actor_modifyrecord2.php\">
      <input type = \"hidden\" name = \"actor_uid\" value = \"$actor_uid\">
      <input type=\"submit\" name=\"Submit\" value=\"Contact Information\">
		</form>
	<p>Update your contact information: address, phone, email</p>
    </td>
  
    <td align=\"center\" width=\"50%\">
        <form name=\"form1\" method=\"post\" action=\"aud_modifyrecord2.php\">
		<input type = \"hidden\" name = \"actor_uid\" value = \"$actor_uid\">
        <input type=\"submit\" name=\"audition\" value=\"Audition Information\">
		</form>
		<p>Indicate your audition preferences, have you auditioned for us before, etc.</p>
      </td>
  </tr>
  <tr>
    <td align=\"center\">
        <form name=\"form1\" method=\"post\" action=\"physical_modifyrecord2.php\">
		<input type = \"hidden\" name = \"actor_uid\" value = \"$actor_uid\">
        <input type=\"submit\" name=\"physical\" value=\"Physical Attributes\">
		</form>
		<p>Height, weight, size, other information useful to casting and costume designers</p>
      </td>
    
  
    <td align=\"center\">
        <form name=\"form1\" method=\"post\" action=\"roles_modifyrecord2.php\">
		<input type = \"hidden\" name = \"actor_uid\" value = \"$actor_uid\">
        <input type=\"submit\" name=\"roles\" value=\"Favorite Roles\">
      </form>
      <p>Listing roles, shows, where you played and directors.</p>
	  </td>
	  
  </tr>
  <tr>
    <td align=\"center\">
        <form name=\"form1\" method=\"post\" action=\"skills_modifyrecord2.php\">
		<input type = \"hidden\" name = \"actor_uid\" value = \"$actor_uid\">
        <input type=\"submit\" name=\"skills\" value=\"Other Skills\">
        </form>
        <p>Rate your skills in technical theatre and other arts, abilities useful to our theatres.</p>
	  </td>
  
    <td align=\"center\">
        <form name=\"form1\" method=\"post\" action=\"../app_printout.php\">
		<input type = \"hidden\" name = \"print_uid\" value = \"$actor_uid\">
        <input type=\"submit\" name=\"app_printout\" value=\"Print Application\">
        </form>
        <p>Preview your application and print it out!<BR><BR></p>
	  </td>
  </tr>
  
  <tr>
  
    <td align=\"center\">
        <form name=\"form1\" method=\"post\" action=\"pwd_change.php\">
		<input type = \"hidden\" name = \"sel_record\" value = \"$actor_uid\">
        <input type=\"submit\" name=\"pwd_change\" value=\"Username/Password\">
        </form>
        <p>Change your username and or password.<BR></p>
	  </td>

 	<td align=\"center\">
        <form name=\"form1\" method=\"\" action=\"../../index.php\">
        <input type=\"submit\" value=\"Done\">
        </form>
        <p>Leave Change Actor Application</p>
	  </td>	  
	  
	<tr>
  
 
</table>


</body>
</html>
";

?>