<?php
$type_lastname = $_POST['type_lastname'];
echo "
<HTML>
<HEAD>
<TITLE>StrawHat Select Lastname for Staff Tech Design Application Change</TITLE>
<link rel=\"stylesheet\" href=\"actors.css\" type=\"text/css\">
</HEAD>
<BODY BACKGROUND=\"Bk10a.GIF\">
";
include("banner.inc");

include("../../Comm/connect.inc");

//---------------------------------create sql statement
//add code to get select bar with added names

$type_lastname = addslashes(trim($type_lastname));

if(!$type_lastname) {
	echo "<H3 align = 'center'>No Last Name was entered. Please go back to enter the Last Name.</H3>";
	exit;
	}

//$type_lastname = addslashes($type_lastname);	

$sql = "SELECT tech_uid, lastname, firstname, midname
		FROM techies11 
		WHERE lastname LIKE '$type_lastname'
		ORDER BY lastname ASC";

//execute SQL query and get result

$sql_result = mysql_query($sql,$connection) or die("Couldn't execute input query.");
//9/18/07 change form to go directly to changes07.php
echo "

<H1 align = \"center\">Select Your Name to Change Your Staff/Tech/Design Application</H1>

<FORM method=\"POST\" action=\"tech_entry2.php\">
<table align = \"center\" cellspacing=5 cellpadding=5>
<tr>
<td align = \"center\"><strong>Staff/Tech/Design by Lastname:</strong></td>
<td valign = top>
<select name=\"sel_record\">

<option value=\"\"> -- Select Your Name -- </option>

";
	while ($row = mysql_fetch_array($sql_result) ) {
		$new_tech_uid = $row["tech_uid"];
		$new_lastname = $row["lastname"];
		$new_midname = $row["midname"];
		$new_firstname = $row["firstname"];

//remove slashes for selection bar		
		$new_lastname = stripslashes($new_lastname);
		$new_midname = stripslashes($new_midname);
		$new_firstname = stripslashes($new_firstname);

		if($new_midname) {
		echo "
			<option value=\"$new_tech_uid\">$new_lastname, $new_firstname $new_midname </option>
			";}
		else {
		echo "
			<option value=\"$new_tech_uid\">$new_lastname, $new_firstname</option>
			";}	
		
		
		
		}
echo "
	</select>
	</td>
	</tr>
	<tr colspan=\"2\" align=center><td>
	<b>Please enter your username and password:</b></td>
	</tr>
	<tr>
		<td>Username: <input type=\"text\" name=\"u_entered\" size=\"9\" maxlength=\"9\"></td>
		<td>Password: <input type=\"PASSWORD\" name=\"p_entered\" size=\"9\" maxlength=\"9\"></td>
	</tr>
<p align = 'center'>If you forgot your password, go to

 

 <a href=\"pwd_searchnamereset.php\" target=\"myNewWin\" onClick=\"sendme()\"    
  ONMOUSEOVER=\"this.style.color='red'\" ONMOUSEOUT=\"this.style.color='blue'\">
  Reset Username/Password</a>.
  
 
 
 </p>	
	<tr>
	<td align = center colspan=2>
	<input type = \"hidden\" name = \"tech_uid\" value = \"$new_tech_uid\">
	<INPUT type=\"submit\" value =\"Select Staff/Tech/Design\"></td>
	</tr>
	</table>
</form>	
";	

			if(empty($new_lastname)) {
			echo "<H3 align = 'center'>No Match Found:'; 
            
            
            
            <a href=\"tech_searchlastname.php\">Please try again</a> or use the other Last Name search.</H3>";
			};

echo "
</BODY>
</HTML>
";
?>