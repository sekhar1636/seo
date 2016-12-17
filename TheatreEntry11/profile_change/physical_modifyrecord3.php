<?php
//physical_modifyrecord3.php
$phys_uid = $_POST['phys_uid']; 
//$ht = $_POST['ht'];
$feet= $_POST['feet'];
$inches= $_POST['inches'];
$wt = $_POST['wt']; 
$eye = $_POST['eye']; 
$hair = $_POST['hair']; 
$gender = $_POST['gender']; 
$age_range = $_POST['age_range']; 
$nativeam = $_POST['nativeam']; 
$asian = $_POST['asian']; 
$white = $_POST['white'];
$black = $_POST['black'];
$hispanic = $_POST['hispanic'];
$eeurope = $_POST['eeurope'];
$mideast = $_POST['mideast'];
$indian = $_POST['indian'];
$under21 = $_POST['under21'];
$suitdress = $_POST['suitdress'];
$chestbust = $_POST['chestbust'];
$waist = $_POST['waist'];




echo "
<HTML>
<HEAD>
<TITLE>Strawhat Modify Physical Information</TITLE>
<link rel=\"stylesheet\" href=\"actors.css\" type=\"text/css\">
</HEAD>
<body>
";
include("banner.inc");


if (!$phys_uid) {
	echo "No actor_uid found (physical.modifyrecord2), if the error persists contact StrawHat Auditions";
	exit;
	}

	
//121506 check to make sure physical table exists
/*SQL statement to check if uid exists in module;
otherwise insert uid into module. */

/*if needed, insert phys_uid*/
$sql_insert_phys = "INSERT INTO physical11 (phys_uid) VALUES ('$phys_uid')";	

//11/3/07 check that wt field is entered, all fields numeric?
if($wt == "") {
	
	exit("<p>Please enter your weight; use the back button to return to the application.</p>");
}	

if(ereg("\d", $wt) ){
	exit("<p>Please enter your weight; do not use letters and use the back button to return to the application.</p>");
}


include("../../Comm/connect.inc");


/*execute SQL query for checking if roles_uid exists*/

	if (mysql_query($sql_insert_phys,$connection)) {
		echo "Record Inserted";
	}
include("../../Comm/connect.inc");

//variables for edit review only
$vunder21 = $under21;
$vsuitdress = $suitdress;
$vchestbust = $chestbust;
$vwaist = $waist;


/*parse values for selected checkboxes
supress error msg by using isset() to test is variable exists - 
variables from checkboxes are not forwarded unless checked -
assign to those not checked to avoid errors and notices
---------------------------------------------------------*/

if(!isset($nativeam)) {
	$nativeam = NULL;
}
if (!isset($asian)){
	$asian = NULL;
}
if(!isset($white)) {
	$white = NULL;
}
if(!isset($black)) {
	$black = NULL;
}
if(!isset($hispanic)) {
	$hispanic = NULL;
}
if(!isset($eeurope)) {
	$eeurope = NULL;
}

if(!isset($mideast)) {
	$mideast = NULL;
}

if(!isset($indian)) {
	$indian = NULL;
}

if(!$nativeam && !$asian && !$white &&
	!$black && !$hispanic && !$eeurope &&
	!$mideast && !$indian ) 
	{
		echo"<p>Please select at least one Role Type. Use the backspace to return to the application.</p>";
		exit();
	}

//parse $feet, $inches to $ht
$ht = ($feet * 12) + $inches;

//trim and slashes
$under21 = addslashes(trim($under21));
$suitdress = addslashes(trim($suitdress));
$chestbust = addslashes(trim($chestbust));
$waist = addslashes(trim($waist));
$ht = addslashes(trim($ht));
$wt = addslashes(trim($wt));





//SQL statement to update record
$sql = "UPDATE physical11 SET 
ht=\"$ht\",
wt=\"$wt\",
eye=\"$eye\",
hair=\"$hair\",
gender=\"$gender\",
age_range=\"$age_range\",
nativeam=\"$nativeam\",
asian=\"$asian\",
white=\"$white\",
black=\"$black\",
hispanic=\"$hispanic\",
eeurope=\"$eeurope\",
mideast=\"$mideast\",
indian=\"$indian\",
under21=\"$under21\",
suitdress=\"$suitdress\",
chestbust=\"$chestbust\",
waist=\"$waist\"

WHERE phys_uid = \"$phys_uid\"
 ";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


if (!$sql_result) {
	echo "<P>Couldn't update record!</P>";
	} else {


	
echo "	

<h1>You have made these changes:</h1>
<FORM method = \"POST\" action = \"changes.php\">
<input type = \"hidden\" name = \"sel_record\" value = \"$phys_uid\">
<input type = \"hidden\" name = \"actor_uid\" value = \"$phys_uid\">

<table width=\"80%\" border=\"0\" align = \"center\">
    <tr>
      <td width><b>Gender:</b></td>
      <td width>
      ";
      
		if($gender == "F") {
			echo "Female";
		}
		if ($gender == "M") {
			echo "Male";
		}
		
      echo "</td>
      <td width><b>Height, Weight: </b></td>
      <td width>
      ";

//$feet = $ht/12;
//$inches = $ht % 12;      
      
		echo "$feet' $inches\", $wt lbs";
      	
echo "      	
      	
      </td>
    </tr>
    <tr> 
      <td width><b>Eye, Hair:</b></td>
      <td width>
      ";

	switch ($eye) {
		case $eye == "BK":
			echo "Black, ";
			break;
		case $eye == "BL":
			echo "Blue, ";
			break;
		case $eye == "BR":
			echo "Brown, ";
			break;			
		case $eye == "GR":
			echo "Green, ";
			break;			
		case $eye == "HZ":
			echo "Hazel, ";
			break;			
	}	
			
	switch ($hair) {
		case $hair == "AU":
			echo "Auburn";
			break;
		case $hair == "BK":
			echo "Black";
			break;
		case $hair == "BL":
			echo "Blonde";
			break;			
		case $hair == "DB":
			echo "Dark Brown";
			break;			
		case $hair == "GY":
			echo "Grey";
			break;			
		case $hair == "BD":
			echo "No Hair";
			break;			
		case $hair == "RD":
			echo "Red";
			break;			
		case $hair == "WT":
			echo "White";
			break;
		case $hair == "LB";
			echo "Light Brown";
			break;
	}
echo "	
	</td>
      <td width><b>Age Range:</b></td>
      <td width>
";

	switch ($age_range) {
		case $age_range == 16;
			echo "Under 16";
			break;
		case $age_range == 20;
			echo "16 to 20";
			break;
		case $age_range == 25;
			echo "21 to 25";
			break;
		case $age_range == 30;
			echo "26 to 30";
			break;
		case $age_range == 35;
			echo "31 to 35";
			break;
		case $age_range == 40;
			echo "36 to 40";
			break;
		case $age_range == 41;
			echo "Over 40";
			break;
	}
echo "      
      
      </td>
    </tr>

    <tr>
      <td width><b>Role Type:</b></td>
      <td colspan=\"3\">$nativeam $asian $white $black $hispanic $eeurope $mideast $indian</td>
    </tr>
";

echo "
    <tr> 
      <td colspan=\"4\"><b>Age if under 21: </b> 
";	  
	  if($vunder21) {
		echo "$vunder21<BR>";
	  }
	else {echo "NA<BR>";}


echo "</td> </tr>
		  
	  
	  <tr>
	  <td colspan=\"4\"><b>Suit Size:</b>
";     
		
	if($vsuitdress) {
		echo "Size: $vsuitdress";
	}
		 
echo "</td>
</tr>
";	

echo "
<tr>
	  <td colspan=\"4\"><b>Dress Size:</b>
";     
	
	if($vsuitdress) {
		echo "Size: $vsuitdress";
	}
echo "	
	</td>
	</tr>
	
      <tr>
	  <td colspan=\"4\"><b>Chest/Bust, Waist:</b> 
      ";

	if($vchestbust) {
		echo "Chest/Bust: $vchestbust, ";
	} 
	
	if($vwaist) {
		echo "Waist: $vwaist";
	}

echo "
	<td>
    </tr>
  </table>
<P align=\"center\"><INPUT type=\"submit\" value =\"Done\" >  
</FORM>
</BODY>
</HTML>
";
}
?>