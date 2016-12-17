<?php


if (!$sel_record) {
	header("Location: http://localhost/admin11/Tech/techie_modifyrecord.php");
	exit;
	}


//create connection
include("../connect.inc");

//SQL statement to select record
$sql = "SELECT * FROM techies11 WHERE uid = \"$sel_record\"";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


if (!$sql_result) {
	echo "<P>Couldn't get record!</P>";
	} else {
	

//fetch row and assign to variables
$row = mysql_fetch_array($sql_result);
$uid = $row["uid"];
$lastname = $row["lastname"];
$firstname = $row["firstname"];
$job1 = $row["job1"];
$job2 = $row["job2"];
$other = $row["other"];
$resume = $row["resume"];
$entered = $row["entered"];
$portfolio = $row["portfolio"];
$title1 = $row["title1"];
$title2 = $row["title2"];
$title3 = $row["title3"];
$audio = $row["audio"];

//stripslashes
$lastname = htmlspecialchars(stripslashes($lastname));
$firstname = htmlspecialchars(stripslashes($firstname));
$other = htmlspecialchars(stripslashes($other));
$title1 = htmlspecialchars(stripslashes($title1));
$title2 = htmlspecialchars(stripslashes($title2));
$title3 = htmlspecialchars(stripslashes($title3));

echo "
<HTML>
<HEAD>
<TITLE>2011 Modify Tech Record</TITLE>
<link rel=\"stylesheet\" href=\"/Members11/admin_test/members.css\"
</HEAD>
<BODY>
<h1>You have selected the following Techie to modify:</h1>
<FORM method = \"POST\" action = \"techie_modifyrecord3.php\">


<table width=\"97%\" border=1>
  <tr>
  <td>Uid:</td>
  <td>
  <input type=\"text\" name=\"uid\" maxlength=4 size=4 value=\"$uid\">
    </td>
  <td>Entered:</td>
  <td>\"$entered\"</td>	
	
  <tr> 
    <td width=\"13%\">First Name:</td>
    <td width=\"32%\"> 
      <input type=\"text\" name=\"firstname\" maxlength=25 size=25 value=\"$firstname\">
    </td>
    <td width=\"14%\">Last Name: </td>
    <td width=\"41%\"> 
      <input type=\"text\" name=\"lastname\" size=25 maxlength=25 value=\"$lastname\">
    </td>
  </tr>
   <tr> 
    <td width=\"13%\">Job1:</td>
    <td width=\"41%\">
      <select name=\"job1\" size=1>
	  ";
	  if($job1 == "") {
	  	echo "<option value=\"\" selected></option>"; }
		else {echo "<option value=\"\"></option>";}
	  
	  if($job1 == "Other") {
	  	echo "<option value=\"Other\" selected>Other</option>"; }
		else {echo "<option value=\"Other\">Other</option>";}
	  
	  if($job1 == "Accompanist") {
	  	echo "<option value=\"Accompanist\" selected>Accompanist</option>"; }
		else {echo "<option value=\"Accompanist\">Accompanist</option>";}
	  
	  if($job1 == "Administration") {
	  	echo "<option value=\"Administration\" selected>Administration</option>"; }
		else {echo "<option value=\"Administration\">Administration</option>";}
	  
	  if($job1 == "Box Office") {
	  	echo "<option value=\"Box Office\" selected>Box Office</option>"; }
		else {echo "<option value=\"Box Office\">Other</option>";}
	  
  		if($job1 == "Carpentry") {
	  	echo "<option value=\"Carpentry\" selected>Carpentry</option>"; }
		else {echo "<option value=\"Carpentry\">Carpentry</option>";}
	  
	  if($job1 == "Choreographer") {
	  	echo "<option value=\"Choreographer\" selected>Choreographer</option>"; }
		else {echo "<option value=\"Choreographer\">Choreographer</option>";}

	  if($job1 == "Company Manager") {
	  	echo "<option value=\"Company Manager\" selected>Company Manager</option>"; }
		else {echo "<option value=\"Company Manager\">Company Manager</option>";}
	  	  
	  if($job1 == "Costume Design") {
	  	echo "<option value=\"Costume Design\" selected>Costume Design</option>"; }
		else {echo "<option value=\"Costume Design\">Costume Design</option>";}
	  
	  if($job1 == "Director") {
	  	echo "<option value=\"Director\" selected>Director</option>"; }
		else {echo "<option value=\"Director\">Director</option>";}
	
	if($job1 == "Electrics") {
	  	echo "<option value=\"Electrics\" selected>Electrics</option>"; }
		else {echo "<option value=\"Electrics\">Electrics</option>";}
	  
	  if($job1 == "Graphics") {
	  	echo "<option value=\"Graphics\" selected>Graphics</option>"; }
		else {echo "<option value=\"Graphics\">Graphics</option>";}
	  
	  if($job1 == "House Management") {
	  	echo "<option value=\"House Management\" selected>House Management</option>"; }
		else {echo "<option value=\"House Management\">House Management</option>";}
	
		if($job1 == "Lighting Design") {
	  	echo "<option value=\"Lighting Design\" selected>Lighting Design</option>"; }
		else {echo "<option value=\"Lighting Design\">Lighting Design</option>";}
	  
	  if($job1 == "Master Carpenter") {
	  	echo "<option value=\"Master Carpenter\" selected>Master Carpenter</option>"; }
		else {echo "<option value=\"Master Carpenter\">Master Carpenter</option>";}
	  
	  if($job1 == "Master Electrician") {
	  	echo "<option value=\"Master Electrician\" selected>Master Electrician</option>"; }
		else {echo "<option value=\"Master Electrician\">Master Electrician</option>";}
	  
	  if($job1 == "Musical Director") {
	  	echo "<option value=\"Musical Director\" selected>Musical Director</option>"; }
		else {echo "<option value=\"Musical Director\">Musical Director</option>";}
	  
	  if($job1 == "Photography") {
	  	echo "<option value=\"Photography\" selected>Photography</option>"; }
		else {echo "<option value=\"Photography\">Photography</option>";}
	
		if($job1 == "Properties") {
	  	echo "<option value=\"Properties\" selected>Properties</option>"; }
		else {echo "<option value=\"Properties\">Properties</option>";}
	  
	  if($job1 == "Publicity") {
	  	echo "<option value=\"Publicity\" selected>Publicity</option>"; }
		else {echo "<option value=\"Publicity\">Publicity</option>";}
	  
	  if($job1 == "Running Crew") {
	  	echo "<option value=\"Running Crew\" selected>Running Crew</option>"; }
		else {echo "<option value=\"Running Crew\">Running Crew</option>";}
 
	  if($job1 == "Scenic Artist") {
	  	echo "<option value=\"Scenic Artist\" selected>Scenic Artist</option>"; }
		else {echo "<option value=\"Scenic Artist\">Scenic Artist</option>";}
 
 	  if($job1 == "Set Design") {
	  	echo "<option value=\"Set Design\" selected>Set Design</option>"; }
		else {echo "<option value=\"Set Design\">Set Design</option>";}
	  
	  if($job1 == "Sound") {
	  	echo "<option value=\"Sound\" selected>Sound</option>"; }
		else {echo "<option value=\"Sound\">Sound</option>";}

	  if($job1 == "Sewing/Wardrobe") {
	  	echo "<option value=\"Sewing/Wardrobe\" selected>Sewing/Wardrobe</option>"; }
		else {echo "<option value=\"Sewing/Wardrobe\">Sewing/Wardrobe</option>";}
	  
	  if($job1 == "Stage Management") {
	  	echo "<option value=\"Stage Management\" selected>Stage Management</option>"; }
		else {echo "<option value=\"Stage Management\">Stage Management</option>";}
		
      if($job1 == "Stage Management-AEA") {
	  	echo "<option value=\"Stage Management-AEA\" selected>Stage Management-AEA</option>"; }
		else {echo "<option value=\"Stage Management-AEA\">Stage Management-AEA</option>";}
 
 	  if($job1 == "Technical Director") {
	  	echo "<option value=\"Technical Director\" selected>Technical Director</option>"; }
		else {echo "<option value=\"Technical Director\">Technical Director</option>";}
	  
	  if($job1 == "Video") {
	  	echo "<option value=\"Video\" selected>Video</option>"; }
		else {echo "<option value=\"Video\">Video</option>";}
 
 echo "
 
 
    </select>
    </td>
    <td>Portfolio:</td>
	<td><select name=\"portfolio\" size=1>
	
";
	if($portfolio == "N") {
	  	echo "<option value=\"N\" selected>N</option>"; }
		else {echo "<option value=\"N\">N</option>";}
	  
	  if($portfolio == "Y") {
	  	echo "<option value=\"Y\" selected>Y</option>"; }
		else {echo "<option value=\"Y\">Y</option>";}

echo "
		</select>
   </tr>
 
  <tr>
    <td width=\"13%\">Job2:</td>
    <td>
      <select name=\"job2\" size=1>
	  ";
	  
	  if($job2 == "") {
	  	echo "<option value=\"\" selected></option>"; }
		else {echo "<option value=\"\"></option>";}
	  
	  if($job2 == "Other") {
	  	echo "<option value=\"Other\" selected>Other</option>"; }
		else {echo "<option value=\"Other\">Other</option>";}
	  
	  if($job2 == "Accompanist") {
	  	echo "<option value=\"Accompanist\" selected>Accompanist</option>"; }
		else {echo "<option value=\"Accompanist\">Accompanist</option>";}
	  
	  if($job2 == "Administration") {
	  	echo "<option value=\"Administration\" selected>Administration</option>"; }
		else {echo "<option value=\"Administration\">Administration</option>";}
	  
	  if($job2 == "Box Office") {
	  	echo "<option value=\"Box Office\" selected>Box Office</option>"; }
		else {echo "<option value=\"Box Office\">Other</option>";}
	  
  		if($job2 == "Carpentry") {
	  	echo "<option value=\"Carpentry\" selected>Carpentry</option>"; }
		else {echo "<option value=\"Carpentry\">Carpentry</option>";}
	  
	  if($job2 == "Choreographer") {
	  	echo "<option value=\"Choreographer\" selected>Choreographer</option>"; }
		else {echo "<option value=\"Choreographer\">Choreographer</option>";}

	  if($job2 == "Company Manager") {
	  	echo "<option value=\"Company Manager\" selected>Company Manager</option>"; }
		else {echo "<option value=\"Company Manager\">Company Manager</option>";}

	  if($job2 == "Costume Design") {
	  	echo "<option value=\"Costume Design\" selected>Costume Design</option>"; }
		else {echo "<option value=\"Costume Design\">Costume Design</option>";}
	  
	  if($job2 == "Director") {
	  	echo "<option value=\"Director\" selected>Director</option>"; }
		else {echo "<option value=\"Director\">Director</option>";}
	
	if($job2 == "Electrics") {
	  	echo "<option value=\"Electrics\" selected>Electrics</option>"; }
		else {echo "<option value=\"Electrics\">Electrics</option>";}
	  
	  if($job2 == "Graphics") {
	  	echo "<option value=\"Graphics\" selected>Graphics</option>"; }
		else {echo "<option value=\"Graphics\">Graphics</option>";}
	  
	  if($job2 == "House Management") {
	  	echo "<option value=\"House Management\" selected>House Management</option>"; }
		else {echo "<option value=\"House Management\">House Management</option>";}
	
		if($job2 == "Lighting Design") {
	  	echo "<option value=\"Lighting Design\" selected>Lighting Design</option>"; }
		else {echo "<option value=\"Lighting Design\">Lighting Design</option>";}
	  
	  if($job2 == "Master Carpenter") {
	  	echo "<option value=\"Master Carpenter\" selected>Master Carpenter</option>"; }
		else {echo "<option value=\"Master Carpenter\">Master Carpenter</option>";}
	  
	  if($job2 == "Master Electrician") {
	  	echo "<option value=\"Master Electrician\" selected>Master Electrician</option>"; }
		else {echo "<option value=\"Master Electrician\">Master Electrician</option>";}

	  if($job2 == "Musical Director") {
	  	echo "<option value=\"Musical Director\" selected>Musical Director</option>"; }
		else {echo "<option value=\"Musical Director\">Musical Director</option>";}
	  
	  if($job2 == "Photography") {
	  	echo "<option value=\"Photography\" selected>Photography</option>"; }
		else {echo "<option value=\"Photography\">Photography</option>";}
	
		if($job2 == "Properties") {
	  	echo "<option value=\"Properties\" selected>Properties</option>"; }
		else {echo "<option value=\"Properties\">Properties</option>";}
	  
	  if($job2 == "Publicity") {
	  	echo "<option value=\"Publicity\" selected>Publicity</option>"; }
		else {echo "<option value=\"Publicity\">Publicity</option>";}
	  
	  if($job2 == "Running Crew") {
	  	echo "<option value=\"Running Crew\" selected>Running Crew</option>"; }
		else {echo "<option value=\"Running Crew\">Running Crew</option>";}
 
	  if($job2 == "Scenic Artist") {
	  	echo "<option value=\"Scenic Artist\" selected>Scenic Artist</option>"; }
		else {echo "<option value=\"Scenic Artist\">Scenic Artist</option>";}
 
 	  if($job2 == "Set Design") {
	  	echo "<option value=\"Set Design\" selected>Set Design</option>"; }
		else {echo "<option value=\"Set Design\">Set Design</option>";}
	  
	  if($job2 == "Sound") {
	  	echo "<option value=\"Sound\" selected>Sound</option>"; }
		else {echo "<option value=\"Sound\">Sound</option>";}

	  if($job2 == "Sewing/Wardrobe") {
	  	echo "<option value=\"Sewing/Wardrobe\" selected>Sewing/Wardrobe</option>"; }
		else {echo "<option value=\"Sewing/Wardrobe\">Sewing/Wardrobe</option>";}
	  
	  if($job2 == "Stage Management") {
	  	echo "<option value=\"Stage Management\" selected>Stage Management</option>"; }
		else {echo "<option value=\"Stage Management\">Stage Management</option>";}

	  if($job2 == "Stage Management-AEA") {
	  	echo "<option value=\"Stage Management-AEA\" selected>Stage Management-AEA</option>"; }
		else {echo "<option value=\"Stage Management-AEA\">Stage Management-AEA</option>";}

 
 	  if($job2 == "Technical Director") {
	  	echo "<option value=\"Technical Director\" selected>Technical Director</option>"; }
		else {echo "<option value=\"Technical Director\">Technical Director</option>";}
	  
	  if($job2 == "Video") {
	  	echo "<option value=\"Video\" selected>Video</option>"; }
		else {echo "<option value=\"Video\">Video</option>";}

echo "

      </select>
    </td>
    <td>Other:</td>
	<td><input type=\"text\" name=\"other\" size=30 value=\"$other\" maxlength=30></td>
  </tr>

  <tr> 
    <td>Resume:</td>
    <td>
      <input type=\"text\" name=\"resume\" size=50 value=\"$resume\" maxlength=50>
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  <td>Title1:</td>
  <td colspan=3><input type=\"text\" name=\"title1\" size=75 value=\"$title1\" maxlength=75></td>
  </tr>

  <tr>
  <td>Title2:</td>
  <td colspan=3><input type=\"text\" name=\"title2\" size=75 value=\"$title2\" maxlength=75></td>
  </tr>
  
  <tr>
  <td>Title3:</td>
  <td colspan=3><input type=\"text\" name=\"title3\" size=75 value=\"$title3\" maxlength=75></td>
  </tr>
  

  <tr>
  <td>Audio: </td>
  <td colspan=3><select name=\"audio\" size=1>
	
";
	if($audio == "N") {
	  	echo "<option value=\"N\" selected>N</option>"; }
		else {echo "<option value=\"N\">N</option>";}
	  
	  if($audio == "Y") {
	  	echo "<option value=\"Y\" selected>Y</option>"; }
		else {echo "<option value=\"Y\">Y</option>";}

echo "
		</select>
 

  <tr> 
    <td colspan=4> 
      <input type=\"submit\" value=\"Change Record\" name=\"submit\">
    </td>
  </tr>
</table>

  
</FORM>
</BODY>
</HTML>
";
}
?>