<?php
//roles.modifyrecord2.php
$actor_uid = $_POST['actor_uid'];
?>

<HTML>
<HEAD>
<TITLE>Strawhat Update Roles Information</TITLE>
<link rel="stylesheet" href="actors.css" type="text/css">
</HEAD>
<BODY>
<?php

include("banner.inc");


if (!$actor_uid) {
	echo "No actor_uid found (roles.modifyrecord2), if the error persists contact StrawHat Auditions";
	exit;
	}

//121506 check to make sure roles exist
/*SQL statement to check if uid exists in module;
otherwise insert uid into module. */

/*if needed, insert roles_uid*/
$sql_insert_roles = "INSERT INTO roles11 (roles_uid) VALUES ('$actor_uid')";	
	
include("../../Comm/connect.inc");

/*execute SQL query for checking if roles_uid exists*/

	if (mysql_query($sql_insert_roles,$connection)) {
		echo "Record Inserted";
	}

	


//SQL statement to select record
$sql = "SELECT * FROM roles11 WHERE roles_uid = \"$actor_uid\"";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


if (!$sql_result) {
	echo "<P>Couldn't get record!</P>";
	} else {
//fetch row and assign to variables
$row = mysql_fetch_array($sql_result);
$roles_uid = $row["roles_uid"];
/*.....SHOWS...........*/
$show1 = $row["show1"];
$show2 = $row["show2"];
$show3 = $row["show3"];
$show4 = $row["show4"];
$show5 = $row["show5"];
$show6 = $row["show6"];
$show7 = $row["show7"];
$show8 = $row["show8"];
$show9 = $row["show9"];
$show10 = $row["show10"];

/*.......ROLES.......*/
$role1 = $row["role1"];
$role2 = $row["role2"];
$role3 = $row["role3"];
$role4 = $row["role4"];
$role5 = $row["role5"];
$role6 = $row["role6"];
$role7 = $row["role7"];
$role8 = $row["role8"];
$role9 = $row["role9"];
$role10 = $row["role10"];

/*......THEATRES......*/
$thea1 = $row["thea1"];
$thea2 = $row["thea2"];
$thea3 = $row["thea3"];
$thea4 = $row["thea4"];
$thea5 = $row["thea5"];
$thea6 = $row["thea6"];
$thea7 = $row["thea7"];
$thea8 = $row["thea8"];
$thea9 = $row["thea9"];
$thea10 = $row["thea10"];

/*......THEATRES......*/
$dir1 = $row["dir1"];
$dir2 = $row["dir2"];
$dir3 = $row["dir3"];
$dir4 = $row["dir4"];
$dir5 = $row["dir5"];
$dir6 = $row["dir6"];
$dir7 = $row["dir7"];
$dir8 = $row["dir8"];
$dir9 = $row["dir9"];
$dir10 = $row["dir10"];


$school = $row["school"];
$prof = $row["prof"];
$proftel = $row["proftel"];
$profemail = $row["profemail"];

//parse proftel
//get area code
$areacode = substr($proftel, 0, 3);
//prefix
$phone1 = substr($proftel, 3, 3);
//last 4 numbers
$phone2 = substr($proftel, 6, 4);

//stripslashes
//trim and add slashes to entries
//12/5/06 strips out characters, took out stripslashes "
/*.......SHOWS...............*/
$show1 = htmlspecialchars(stripslashes($show1));
$show2 = htmlspecialchars(stripslashes($show2));
$show3 = htmlspecialchars(stripslashes($show3));
$show4 = htmlspecialchars(stripslashes($show4));
$show5 = htmlspecialchars(stripslashes($show5));
$show6 = htmlspecialchars(stripslashes($show6));
$show7 = htmlspecialchars(stripslashes($show7));
$show8 = htmlspecialchars(stripslashes($show8));
$show9 = htmlspecialchars(stripslashes($show9));
$show10 = htmlspecialchars(stripslashes($show10));

/*.......ROLES............*/
$role1 = htmlspecialchars(stripslashes($role1));
$role2 = htmlspecialchars(stripslashes($role2));
$role3 = htmlspecialchars(stripslashes($role3));
$role4 = htmlspecialchars(stripslashes($role4));
$role5 = htmlspecialchars(stripslashes($role5));
$role6 = htmlspecialchars(stripslashes($role6));
$role7 = htmlspecialchars(stripslashes($role7));
$role8 = htmlspecialchars(stripslashes($role8));
$role9 = htmlspecialchars(stripslashes($role9));
$role10 = htmlspecialchars(stripslashes($role10));

/*........THEATRE...........*/
$thea1 = htmlspecialchars(stripslashes($thea1));
$thea2 = htmlspecialchars(stripslashes($thea2));
$thea3 = htmlspecialchars(stripslashes($thea3));
$thea4 = htmlspecialchars(stripslashes($thea4));
$thea5 = htmlspecialchars(stripslashes($thea5));
$thea6 = htmlspecialchars(stripslashes($thea6));
$thea7 = htmlspecialchars(stripslashes($thea7));
$thea8 = htmlspecialchars(stripslashes($thea8));
$thea9 = htmlspecialchars(stripslashes($thea9));
$thea10 = htmlspecialchars(stripslashes($thea10));

/*.........DIRECTORS...........*/
$dir1 = htmlspecialchars(stripslashes($dir1));
$dir2 = htmlspecialchars(stripslashes($dir2));
$dir3 = htmlspecialchars(stripslashes($dir3));
$dir4 = htmlspecialchars(stripslashes($dir4));
$dir5 = htmlspecialchars(stripslashes($dir5));
$dir6 = htmlspecialchars(stripslashes($dir6));
$dir7 = htmlspecialchars(stripslashes($dir7));
$dir8 = htmlspecialchars(stripslashes($dir8));
$dir9 = htmlspecialchars(stripslashes($dir9));
$dir10 = htmlspecialchars(stripslashes($dir10));


/*........SCHOOL/PROF.........*/
$school = htmlspecialchars(stripslashes($school));
$prof = htmlspecialchars(stripslashes($prof));
$proftel = htmlspecialchars(stripslashes($proftel));
$profemail = htmlspecialchars(stripslashes($profemail));

echo "

<table align=\"center\">
	<tr>
	<td align = \"center\"> 
	<FORM method=\"POST\" action= \"/ActorEntry11/profile_change/changes.php\">
	<input type = \"hidden\" name = \"actor_uid\" value = \"$actor_uid\">
	<INPUT type=\"submit\" value =\"Back to Change Application Menu\">
	</FORM>	
	</td>

	
	<td align = \"center\">
	<FORM method=\"\" action=\"/index.php\">
	<input type=\"submit\" value=\"Leave Application (No Changes Recorded)\" name=\"endentry\">
	</form>
	</td>
	</tr>	
</table>

<h1>Update your Roles Information:</h1>
<p>Please enter your roles, shows and theatres played. Add a director, choreographer, etc. of note. Enter up to 10 shows. You can also enter a teacher or professor that knows your work and will serve as a reference.</p>
<FORM method = \"POST\" action = \"roles_modifyrecord3.php\">
<input type=\"hidden\" name=\"roles_uid\" value=\"$actor_uid\">  



  <table width=\"76%\" border=\"0\" cellspacing=\"1\" cellpadding=\"1\" align=\"center\">
    <tr bgcolor=\"#FFCC00\"> 
      <td colspan=\"4\"> 
        <div align=\"center\"><b>10 Best Shows/Roles/Theatres:</b></div>
      </td>
    </tr>
    <tr> 
      <td width=\"32%\"><b><u>Show</u></b></td>
      <td width=\"31%\"><b><u>Role</u></b></td>
      <td width=\"37%\"><b><u>Theatre</u></b></td>
      <td width=\"37%\"><b><u>Director/Choreo/Other</u></b></td>
    </tr>
    <tr> 
      <td width=\"32%\"> 
        <input type=\"text\" name=\"show1\" size=\"40\" value=\"$show1\">
      </td>
      <td width=\"31%\"> 
        <input type=\"text\" name=\"role1\" size=\"25\" value=\"$role1\">
      </td>
      <td width=\"37%\"> 
        <input type=\"text\" name=\"thea1\" size=\"40\" value=\"$thea1\">
      </td>
      <td width=\"37%\"> 
        <input type=\"text\" name=\"dir1\" size=\"25\" value=\"$dir1\">
      </td>
    </tr>
    <tr> 
      <td width=\"32%\"> 
        <input type=\"text\" name=\"show2\" size=\"40\" value=\"$show2\">
      </td>
      <td width=\"31%\"> 
        <input type=\"text\" name=\"role2\" size=\"25\" value=\"$role2\">
      </td>
      <td width=\"37%\"> 
        <input type=\"text\" name=\"thea2\" size=\"40\" value=\"$thea2\">
      </td>
      <td width=\"37%\"> 
        <input type=\"text\" name=\"dir2\" size=\"25\" value=\"$dir2\">
      </td>
    </tr>
    <tr> 
      <td width=\"32%\"> 
        <input type=\"text\" name=\"show3\" size=\"40\" value=\"$show3\">
      </td>
      <td width=\"31%\"> 
        <input type=\"text\" name=\"role3\" size=\"25\" value=\"$role3\">
      </td>
      <td width=\"37%\"> 
        <input type=\"text\" name=\"thea3\" size=\"40\" value=\"$thea3\">
      </td>
      <td width=\"37%\"> 
        <input type=\"text\" name=\"dir3\" size=\"25\" value=\"$dir3\">
      </td>
    </tr>
    <tr> 
      <td width=\"32%\"> 
        <input type=\"text\" name=\"show4\" size=\"40\" value=\"$show4\">
      </td>
      <td width=\"31%\"> 
        <input type=\"text\" name=\"role4\" size=\"25\" value=\"$role4\">
      </td>
      <td width=\"37%\"> 
        <input type=\"text\" name=\"thea4\" size=\"40\" value=\"$thea4\">
      </td>
      <td width=\"37%\"> 
        <input type=\"text\" name=\"dir4\" size=\"25\" value=\"$dir4\">
      </td>
    </tr>
    <tr> 
      <td width=\"32%\"> 
        <input type=\"text\" name=\"show5\" size=\"40\" value=\"$show5\">
      </td>
      <td width=\"31%\"> 
        <input type=\"text\" name=\"role5\" size=\"25\" value=\"$role5\">
      </td>
      <td width=\"37%\"> 
        <input type=\"text\" name=\"thea5\" size=\"40\" value=\"$thea5\">
      </td>
      <td width=\"37%\"> 
        <input type=\"text\" name=\"dir5\" size=\"25\" value=\"$dir5\">
      </td>
    </tr>
    <tr> 
      <td width=\"32%\"> 
        <input type=\"text\" name=\"show6\" size=\"40\" value=\"$show6\">
      </td>
      <td width=\"31%\"> 
        <input type=\"text\" name=\"role6\" size=\"25\" value=\"$role6\">
      </td>
      <td width=\"37%\"> 
        <input type=\"text\" name=\"thea6\" size=\"40\" value=\"$thea6\">
      </td>
      <td width=\"37%\"> 
        <input type=\"text\" name=\"dir6\" size=\"25\" value=\"$dir6\">
      </td>
    </tr>
    <tr> 
      <td width=\"32%\"> 
        <input type=\"text\" name=\"show7\" size=\"40\" value=\"$show7\">
      </td>
      <td width=\"31%\"> 
        <input type=\"text\" name=\"role7\" size=\"25\" value=\"$role7\">
      </td>
      <td width=\"37%\"> 
        <input type=\"text\" name=\"thea7\" size=\"40\" value=\"$thea7\">
      </td>
      <td width=\"37%\"> 
        <input type=\"text\" name=\"dir7\" size=\"25\" value=\"$dir7\">
      </td>
    </tr>
    <tr> 
      <td width=\"32%\"> 
        <input type=\"text\" name=\"show8\" size=\"40\" value=\"$show8\">
      </td>
      <td width=\"31%\"> 
        <input type=\"text\" name=\"role8\" size=\"25\" value=\"$role8\">
      </td>
      <td width=\"37%\"> 
        <input type=\"text\" name=\"thea8\" size=\"40\" value=\"$thea8\">
      </td>
      <td width=\"37%\"> 
        <input type=\"text\" name=\"dir8\" size=\"25\" value=\"$dir8\">
      </td>
    </tr>
    <tr> 
      <td width=\"32%\"> 
        <input type=\"text\" name=\"show9\" size=\"40\" value=\"$show9\">
      </td>
      <td width=\"31%\"> 
        <input type=\"text\" name=\"role9\" size=\"25\" value=\"$role9\">
      </td>
      <td width=\"37%\"> 
        <input type=\"text\" name=\"thea9\" size=\"40\" value=\"$thea9\">
      </td>
      <td width=\"37%\"> 
        <input type=\"text\" name=\"dir9\" size=\"25\" value=\"$dir9\">
      </td>
    </tr>
    <tr> 
      <td width=\"32%\"> 
        <input type=\"text\" name=\"show10\" size=\"40\" value=\"$show10\">
      </td>
      <td width=\"31%\"> 
        <input type=\"text\" name=\"role10\" size=\"25\" value=\"$role10\">
      </td>
      <td width=\"37%\"> 
        <input type=\"text\" name=\"thea10\" size=\"40\" value=\"$thea10\">
      </td>
      <td width=\"37%\"> 
        <input type=\"text\" name=\"dir10\" size=\"25\" value=\"$dir10\">
      </td>
    </tr>
    <tr> 
      <td width=\"32%\" height=\"34\"> <b>School: </b> 
        <input type=\"text\" name=\"school\" size=\"40\" value=\"$school\">
      </td>
      <td width=\"31%\" height=\"34\"> <b>Professor: </b> 
        <input type=\"text\" name=\"prof\" size=\"30\" value=\"$prof\" maxlength=\"30\">
      </td>
      <td width=\"37%\" height=\"34\"> <b>Telephone:<br>
        <input type=\"text\" name=\"areacode\" size=\"3\" maxlength=\"3\" value=\"$areacode\">
        <input type=\"text\" name=\"phone1\" size=\"3\" maxlength=\"3\" value = \"$phone1\">
        <input type=\"text\" name=\"phone2\" size=\"4\" maxlength=\"4\" value = \"$phone2\">
        </b> </td>
      <td width=\"37%\" height=\"34\"><b>Professor's Email: </b> 
        <input type=\"text\" name=\"profemail\" size=\"30\" value=\"$profemail\" maxlength=\"30\">
      </td>
    </tr>
    <tr> 
      <td colspan=\"4\"> 
        <div align=\"center\"> 
          <input type=\"submit\" value=\"Change Record\" name=\"submit\">
        </div>
      </td>
    </tr>
  </table>

</FORM>
</BODY>
</HTML>
";
	}