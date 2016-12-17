<?php
//physical_modifyrecord2.php 
$actor_uid = $_POST['actor_uid'];

echo "
<HTML>
<HEAD>
<TITLE>Strawhat Modify Skills Information</TITLE>
<link rel=\"stylesheet\" href=\"actors.css\" type=\"text/css\">
</HEAD>
<body>
";
include("banner.inc");

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
";



if (!$actor_uid) {
	echo "No actor_uid found (physical.modifyrecord2), if the error persists contact StrawHat Auditions";
	exit;
	}

//121506 check to make sure physical exist
/*SQL statement to check if uid exists in module;
otherwise insert uid into module. */

/*if needed, insert physical_uid*/
$sql_insert_physical = "INSERT INTO physical11 (phys_uid) VALUES ('$actor_uid')";	
	
include("../../Comm/connect.inc");


/*execute SQL query for checking if roles_uid exists*/

	if (mysql_query($sql_insert_physical,$connection)) {
		echo "Record Inserted";
	}

//SQL statement to select record 
$sql = "SELECT * FROM physical11 WHERE phys_uid = \"$actor_uid\"";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


if (!$sql_result) {
	echo "<P>Couldn't get record!</P>";
	} else {
	

//fetch row and assign to variables
$row = mysql_fetch_array($sql_result);
$phys_uid = $row["phys_uid"];
$ht = $row["ht"];
$wt = $row["wt"];
$eye = $row["eye"];
$hair = $row["hair"];
$age_range = $row["age_range"];
$type = $row["type"];
$nativeam = $row["nativeam"];
$asian = $row["asian"];
$white = $row["white"];
$black = $row["black"];
$hispanic = $row["hispanic"];
$eeurope = $row["eeurope"];
$mideast = $row["mideast"];
$indian = $row["indian"];
$gender = $row["gender"];
$under21 = $row["under21"];
$suitdress = $row["suitdress"];
$chestbust = $row["chestbust"];
$waist = $row["waist"];

//12/5/06 strips out characters, took out stripslashes
$under21 = htmlspecialchars(stripslashes($under21));
$suitdress = htmlspecialchars(stripslashes($suitdress));
$chestbust = htmlspecialchars(stripslashes($chestbust));
$waist = htmlspecialchars(stripslashes($waist));



echo "

<h1 align = \"center\">Update your Physical Attributes:</h1>
<FORM method = \"POST\" action = \"physical_modifyrecord3.php\">
<input type=\"hidden\" name=\"phys_uid\" value=\"$phys_uid\">  

<table width=\"65%\" border=\"1\" align=\"center\">
    <tr> 
      <td colspan=\"5\" bgcolor=\"#99FFCC\"> 
        <div align=\"center\"><b>Physical Details:</b></div>
      </td>
    </tr>
    <tr> 
      <td><b>Gender: </b><select name=\"gender\" size=\"1\">
";
	  if($gender == "F") {
	  	echo "<option selected value=\"F\">Female</option>"; }
		else {echo "<option value=\"F\">Female</option>";}
	  if($gender == "M") {
	  	echo "<option selected value=\"M\">Male</option>"; }
		else {echo "<option value=\"M\">Male</option>";}		
echo "    
      </td>
      <td><b>Height (feet/inches): </b>
      ";

//parse feet, inches

$inches = $ht%12; 
$feet = ($ht - $inches)/12;

echo " <select name=\"feet\" size=\"1\" value=\"$feet\">
";    
      if($feet == "3") {
	  	echo "<option selected value=\"3\">3</option>"; }
		else {echo "<option value=\"3\">3</option>";}
      if($feet == "4") {
	  	echo "<option selected value=\"4\">4</option>"; }
		else {echo "<option value=\"4\">4</option>";}
      if($feet == "5") {
	  	echo "<option selected value=\"5\">5</option>"; }
		else {echo "<option value=\"5\">5</option>";}
      if($feet == "6") {
	  	echo "<option selected value=\"6\">6</option>"; }
		else {echo "<option value=\"6\">6</option>";}
      if($feet == "7") {
	  	echo "<option selected value=\"7\">7</option>"; }
		else {echo "<option value=\"7\">7</option>";}
      
      
echo "
</select>      
";	  
echo "
      <select name=\"inches\" size=\"1\" value=\"$inches\">
";      
      if($inches == "0") {
	  	echo "<option selected value=\"0\">0</option>"; }
		else {echo "<option value=\"0\">0</option>";}
      if($inches == "1") {
	  	echo "<option selected value=\"1\">1</option>"; }
		else {echo "<option value=\"1\">1</option>";}
      if($inches == "2") {
	  	echo "<option selected value=\"2\">2</option>"; }
		else {echo "<option value=\"2\">2</option>";}
      if($inches == "3") {
	  	echo "<option selected value=\"3\">3</option>"; }
		else {echo "<option value=\"3\">3</option>";}
      if($inches == "4") {
	  	echo "<option selected value=\"4\">4</option>"; }
		else {echo "<option value=\"4\">4</option>";}
      if($inches == "5") {
	  	echo "<option selected value=\"5\">5</option>"; }
		else {echo "<option value=\"5\">5</option>";}
      if($inches == "6") {
	  	echo "<option selected value=\"6\">6</option>"; }
		else {echo "<option value=\"6\">6</option>";}
      if($inches == "7") {
	  	echo "<option selected value=\"7\">7</option>"; }
		else {echo "<option value=\"7\">7</option>";}
      if($inches == "8") {
	  	echo "<option selected value=\"8\">8</option>"; }
		else {echo "<option value=\"8\">8</option>";}
      if($inches == "9") {
	  	echo "<option selected value=\"9\">9</option>"; }
		else {echo "<option value=\"9\">9</option>";}
      if($inches == "10") {
	  	echo "<option selected value=\"10\">10</option>"; }
		else {echo "<option value=\"10\">10</option>";}
      if($inches == "11") {
	  	echo "<option selected value=\"11\">11</option>"; }
		else {echo "<option value=\"11\">11</option>";}

	  echo "
    </select>
      </td>
      <td><b>Weight (lbs):</b> 
	  <input type=\"text\" name=\"wt\" maxlength=\"3\" size=\"3\" value=\"$wt\">
     
";
echo "
        </select>
      </td>
      <td><b>Hair:</b> 
        <select name=\"hair\" size=\"1\" value=\"$hair\">
";

	  if($hair == "AU") {
	  	echo "<option selected value=\"AU\">Auburn</option>"; }
		else {echo "<option value=\"AU\">Auburn</option>";}
		
	  if($hair == "BK") {
	  	echo "<option selected value=\"BK\">Black</option>"; }
		else {echo "<option value=\"BK\">Black</option>";}

	  if($hair == "BL") {
	  	echo "<option selected value=\"BL\">Blonde</option>"; }
		else {echo "<option value=\"BL\">Blonde</option>";}

	  if($hair == "DB") {
	  	echo "<option selected value=\"DB\">Dark Brown</option>"; }
		else {echo "<option value=\"DB\">Dark Brown</option>";}

	  if($hair == "GY") {
	  	echo "<option selected value=\"GY\">Grey</option>"; }
		else {echo "<option value=\"GY\">Grey</option>";}

	  if($hair == "LB") {
	  	echo "<option selected value=\"LB\">Light Brown</option>"; }
		else {echo "<option value=\"LB\">Light Brown</option>";}

	  if($hair == "BD") {
	  	echo "<option selected value=\"BD\">No Hair</option>"; }
		else {echo "<option value=\"BD\">No Hair</option>";}

	  if($hair == "RD") {
	  	echo "<option selected value=\"RD\">Red</option>"; }
		else {echo "<option value=\"RD\">Red</option>";}		

	  if($hair == "WT") {
	  	echo "<option selected value=\"WT\">White</option>"; }
		else {echo "<option value=\"WT\">White</option>";}																
echo "
        </select>
      </td>
    </tr>
    <tr> 
      <td><b>Eye Color: </b> 
        <select name=\"eye\" size=\"1\">
";
	  if($eye == "BK") {
	  	echo "<option selected value=\"BK\">Black</option>"; }
		else {echo "<option value=\"BK\">Black</option>";}		

	  if($eye == "BL") {
	  	echo "<option selected value=\"BL\">Blue</option>"; }
		else {echo "<option value=\"BL\">Blue</option>";}
		
	  if($eye == "BR") {
	  	echo "<option selected value=\"BR\">Brown</option>"; }
		else {echo "<option value=\"BR\">Brown</option>";}

	  if($eye == "GR") {
	  	echo "<option selected value=\"GR\">Green</option>"; }
		else {echo "<option value=\"GR\">Green</option>";}

	  if($eye == "HZ") {
	  	echo "<option selected value=\"HZ\">Hazel</option>"; }
		else {echo "<option value=\"HZ\">Hazel</option>";}
echo "
        </select>
        <BR>
        <b>Age Range:</b> 
        <select name=\"age_range\" size=\"1\">
";
	  if($age_range == "16") {
	  	echo "<option selected value=\"16\">Under 16</option>"; }
		else {echo "<option value=\"16\">Under 16</option>";}

	  if($age_range == "20") {
	  	echo "<option selected value=\"20\">16-20</option>"; }
		else {echo "<option value=\"20\">16-20</option>";}

	  if($age_range == "25") {
	  	echo "<option selected value=\"25\">21-25</option>"; }
		else {echo "<option value=\"25\">21-25</option>";}

	  if($age_range == "30") {
	  	echo "<option selected value=\"30\">26-30</option>"; }
		else {echo "<option value=\"30\">26-30</option>";}

	  if($age_range == "35") {
	  	echo "<option selected value=\"35\">31-35</option>"; }
		else {echo "<option value=\"35\">31-35</option>";}

	  if($age_range == "40") {
	  	echo "<option selected value=\"40\">36-40</option>"; }
		else {echo "<option value=\"40\">36-40</option>";}

	  if($age_range == "41") {
	  	echo "<option selected value=\"41\">Over 40</option>"; }
		else {echo "<option value=\"41\">Over 40</option>";}		
echo "
        </select>
        <BR>
      </td>
      <td colspan=\"3\"><b>Role Type: </b> <BR>
";
	if(!empty($nativeam) ) {
	  	echo "<input type=\"checkbox\" name=\"nativeam\" value=\"Native American\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"nativeam\" value=\"Native American\" >";}	
echo "
        Native American 
";
	if(!empty($asian) ) {
	  	echo "<input type=\"checkbox\" name=\"asian\" value=\"Asian\" checked >"; }
		else {echo "<input type=\"checkbox\" name=\"asian\" value=\"Asian\">";}	
echo "
        Asian 
";
	if(!empty($white) ) {
	  	echo "<input type=\"checkbox\" name=\"white\" value=\"Caucasian\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"white\" value=\"Caucasian\">";}	
echo "
        Caucasian 
";
	if(!empty($black) ) {
	  	echo "<input type=\"checkbox\" name=\"black\" value=\"African-American\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"black\" value=\"African-American\">";}	
echo "
        African-American<BR> 
";
	if(!empty($hispanic) ) {
	  	echo "<input type=\"checkbox\" name=\"hispanic\" value=\"Hispanic\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"hispanic\" value=\"Hispanic\">";}	
echo "        
        Hispanic

";
	if(!empty($eeurope) ) {
	  	echo "<input type=\"checkbox\" name=\"eeurope\" value=\"East European\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"eeurope\" value=\"East European\">";}	
echo "
        East European
";
	if(!empty($mideast) ) {
	  	echo "<input type=\"checkbox\" name=\"mideast\" value=\"Middle Eastern\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"mideast\" value=\"Middle Eastern\">";}	
echo "
        Middle Eastern
";
	if(!empty($indian) ) {
	  	echo "<input type=\"checkbox\" name=\"indian\" value=\"Indian\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"indian\" value=\"Indian\">";}	
echo "		
		Indian</td>
    </tr>
    <tr>
    <td><b>Age if under 21: </b><input type=\"text\" name=\"under21\" maxlength=\"2\" size=\"2\" value=\"$under21\"></td>
    <td><b>Suit/Dress size: </b><input type=\"text\" name=\"suitdress\" maxlength=\"2\" size=\"2\" value=\"$suitdress\"></td>
    <td><b>Chest/Bust size: </b><input type=\"text\" name=\"chestbust\" maxlength=\"2\" size=\"2\" value=\"$chestbust\"></td>
    <td><b>Waist size: </b><input type=\"text\" name=\"waist\" maxlength=\"3\" size=\"3\" value=\"$waist\"></td>
    
    <tr> 
      <td colspan=\"4\"> 
        <div align=\"center\"> 
          <input type=\"submit\" value=\"Change Record\" name=\"submit\">
        
        </div>
      </td>
    </tr>
    
  </table>
";

echo "
</FORM>
</BODY>
</HTML>
";
}
?>