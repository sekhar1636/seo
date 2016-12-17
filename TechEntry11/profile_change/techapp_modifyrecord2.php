<?php
//FOR STAFF TECH DESIGN MODIFY WORK RECORD!!
$tech_uid = $_POST['tech_uid'];

if (!$tech_uid) {
	echo "No tech_uid";

	exit;
	}

?>

<html>
<head>
<title>Strawhat Staff/Tech/Design Information</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link rel="stylesheet" href="actors.css" type="text/css">
</head>
<body>
<script language="JavaScript" type="text/javascript">

<!--
function validateForm(tech)
{
	if(!validateFirstname(tech.firstname.value) )
		{
			tech.firstname.focus();
			return false;
		}

	else if(!validateLastname(tech.lastname.value) )
		{
			tech.lastname.focus();
			return false;
		}
	
	else if(!validateAddress(tech.address.value) )
		{
			tech.address.focus();
			return false;
		}

	else if(!validateCity(tech.city.value) )
		{
			tech.city.focus();
			return false;
		}

	else if(!validateState(tech.state.value) )
		{
			tech.state.focus();
			return false;
		}

	else if(!validateZip(tech.zip.value) )
		{
			tech.zip.focus();
			return false;
		}

	else if(!validateEmail(tech.email.value) )
		{
			tech.email.focus();
			return false;
		}
	else if(!validatePhone(tech.phone.value) )
		{
			tech.phone.focus();
			return false;
		}
	else if(!validateLargeCity(tech.largecity.value) )
		{
			tech.largecity.focus();
			return false;
		}
}

//supporting functions
function validateFirstname(firstname)
{
	if(isBlank(firstname) )
		{
			alert("Enter Your First Name please!");
			return false;
		}
	//if everythings okay, then
	return true;
}

function validateLastname(lastname)
{
	if(isBlank(lastname) )
		{
			alert("Enter Your Last Name please!");
			return false;
		}
	//if everythings okay, then
	return true;
}

function validateAddress(address)
{
	if(isBlank(address) )
		{
			alert("Enter Your Address please!");
			return false;
		}
	//if everythings okay, then
	return true;
}

function validateCity(city)
{
	if(isBlank(city) )
		{
			alert("Enter Your City please!");
			return false;
		}
	//if everythings okay, then
	return true;
}

function validateState(state)
{
	if(isBlank(state) )
		{
			alert("Enter Your State please!");
			return false;
		}
	//if everythings okay, then
	return true;
}

function validateZip(zip)
{
	if(isBlank(zip) )
		{
			alert("Enter Your Zip please!");
			return false;
		}
	//if everythings okay, then
	return true;
}


function validateEmail(email)
{
	if(isBlank(email) )
		{
			alert("Enter Your Email please!");
			return false;
		}
	//if everythings okay, then
	return true;
}

function validatePhone(phone)
{
	if(isBlank(phone) )
		{
			alert("Enter Your Phone please!");
			return false;
		}
	//if everythings okay, then
	return true;
}

function validateLargeCity(largecity)
{
	if(isBlank(largecity) )
		{
			alert("Enter Your Nearest Large City please!");
			return false;
		}
	//if everythings okay, then
	return true;
}

function isBlank(testStr)
	{
	
//test for 0 length	
		if(testStr.length == 0)
			return true;

//test for all blank spaces
		for(var i=0; i<=testStr.length; i++)
				if(testStr.charAt(i) != " ")
					return false;
					
				return true;
	}


//end JS script hide -->
</script>

<?php
include("banner.inc");

if (!$tech_uid) {
	echo "No tech_uid found (techapp.modifyrecord2), if the error persists contact StrawHat Auditions";
	exit;
	}

//121506 check to make sure roles exist
/*SQL statement to check if uid exists in module;
otherwise insert uid into module. */

/*if needed, insert audition_uid*/
$sql_insert_techapp = "INSERT INTO techapp11 (techapp_uid) VALUES ('$tech_uid')";	
	
include("../../Comm/connect.inc");


/*execute SQL query for checking if roles_uid exists*/

	if (mysql_query($sql_insert_techapp,$connection)) {
		echo "Record Inserted";
	}


//SQL statement to select record
$sql = "SELECT * FROM techapp11 WHERE techapp_uid = \"$tech_uid\"";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");

if (!$sql_result) {
	echo "<P>Couldn't get record!</P>";
	} else {
	

//fetch row and assign to variables
$row = mysql_fetch_array($sql_result);
$techapp_uid = $row["techapp_uid"];
$availfor = $row["availfor"];
$availto = $row["availto"];
$job1 = $row["job1"];
$job2 = $row["job2"];
$other = $row["other"];
$salary = $row["salary"];
$jobin = $row["jobin"];
$under21 = $row["under21"];
$accomp = $row["accomp"];
$admin = $row["admin"];
$boxoffice = $row["boxoffice"];
$carp = $row["carp"];
$choreo = $row["choreo"];
$costume = $row["costume"];
$sew = $row["sew"];
$td = $row["td"];
$graphics = $row["graphics"];
$house = $row["house"];
$lights = $row["lights"];
$elec = $row["elec"];
$direct = $row["direct"];
$music = $row["music"];
$photo = $row["photo"];
$video = $row["video"];
$props = $row["props"];
$pr = $row["pr"];
$runcrew = $row["runcrew"];
$scenic = $row["scenic"];
$setdesign = $row["setdesign"];
$sound = $row["sound"];
$stagem = $row["stagem"];
$company = $row["company"];

//trim slashes
$under21 = stripslashes(trim($under21));
$salary = stripslashes(trim($salary));

//get first, lastname

//SQL statement to select record
$sql = "SELECT tech_uid, lastname, firstname 
FROM techies11 WHERE tech_uid = $tech_uid";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


if (!$tech_uid) {
	echo "<P>Couldn't get record!</P>";
	exit;
	}

	else {
	

//fetch row and assign to variables
$row = mysql_fetch_array($sql_result);
$tech_uid = $row["tech_uid"];
$lastname = $row["lastname"];
$firstname = $row["firstname"];

//parse
$firstname = htmlspecialchars(stripslashes($firstname));
$lastname = htmlspecialchars(stripslashes($lastname));

	}


echo "
<table align=\"center\">
    <tr>
    <td align = \"center\"> 
    <FORM method=\"POST\" action= \"/TechEntry11/profile_change/changes.php\">
    <input type = \"hidden\" name = \"tech_uid\" value = \"$tech_uid\">
    <INPUT type=\"submit\" value =\"Back to Change Application Menu\">
    </FORM>    
    </td>
</table>
";

echo "

<h3 align = \"center\">Update your Staff Tech Design application for <u><i>$firstname $lastname</i></u>.<BR> 
When you are finished, click Update Record</h3>
<FORM name=\"tech\" ONSUBMIT=\"return validateForm()\" method = \"POST\" action = \"techapp_modifyrecord3.php\">
<input type = \"hidden\" name = \"tech_uid\" value = \"$tech_uid\">
  <table width=\"65%\" border=\"1\" cellspacing=\"1\" cellpadding=\"1\" align=\"center\">
    <tr> 
      <td colspan=\"3\"><b><i>Staff Tech Design Application Info</i></b></td>
    </tr>
    <tr> 
      <td height=\"22\" width=\"36%\">Availability From:</td>
";      


/*Parse availfor*/
$mo = substr($availfor, 5,2);
$day = substr($availfor, 8,2);
$year = substr($availfor, 0,4);

$datefrom_month = $mo;

/*...............AVAILABLE (FROM)...........*/
	 echo " 
	 <td height=\"22\" colspan=\"2\">
	 &nbsp Month	
	 <select name=\"datefrom_month\">
	 ";
	 
 
	 
	  if($datefrom_month == "01") {
	  	echo "<option value=\"01\" selected>January</option>"; }
		else {echo "<option value=\"01\">January</option>";} 

	  if($datefrom_month == "02") {
	  	echo "<option selected value=\"02\">February</option>"; }
		else {echo "<option value=\"02\">February</option>";}
	  
	  if($datefrom_month == "03") {
	  	echo "<option value=\"03\" selected>March</option>"; }
		else {echo "<option value=\"03\">March</option>";} 

		if($datefrom_month == "04") {
	  	echo "<option selected value=\"04\">April</option>"; }
		else {echo "<option value=\"04\">April</option>";}
	  
	  if($datefrom_month == "05") {
	  	echo "<option value=\"05\" selected>May</option>"; }
		else {echo "<option value=\"05\">May</option>";} 

	  if($datefrom_month == "06") {
	  	echo "<option selected value=\"06\">June</option>"; }
		else {echo "<option value=\"06\">June</option>";}
	  
	  if($datefrom_month == "07") {
	  	echo "<option value=\"07\" selected>July</option>"; }
		else {echo "<option value=\"07\">July</option>";} 
		
		if($datefrom_month == "08") {
	  	echo "<option value=\"08\" selected>August</option>"; }
		else {echo "<option value=\"08\">August</option>";} 

	  if($datefrom_month == "09") {
	  	echo "<option selected value=\"09\">September</option>"; }
		else {echo "<option value=\"09\">September</option>";}
	  
	  if($datefrom_month == "10") {
	  	echo "<option value=\"10\" selected>October</option>"; }
		else {echo "<option value=\"10\">October</option>";} 

		if($datefrom_month == "11") {
	  	echo "<option selected value=\"11\">November</option>"; }
		else {echo "<option value=\"11\">November</option>";}
	  
	  if($datefrom_month == "12") {
	  	echo "<option value=\"12\" selected>December</option>"; }
		else {echo "<option value=\"12\">December</option>";} 

		echo "</select>";
          
//-----------------------end section--------------------------		
		
/*Parse availfor*/
$datefrom_day = $day;

echo "&nbsp Day ";

/*...................DATEFROM_DAY (FROM).........*/

	  echo "<select name=\"datefrom_day\">";

	  if($datefrom_day == "01") {
	  	echo "<option value=\"01\" selected>1</option>"; }
		else {echo "<option value=\"01\">1</option>";} 

	  if($datefrom_day == "02") {
	  	echo "<option selected value=\"02\">2</option>"; }
		else {echo "<option value=\"02\">2</option>";}
	  
	  if($datefrom_day == "03") {
	  	echo "<option value=\"03\" selected>3</option>"; }
		else {echo "<option value=\"03\">3</option>";} 

		if($datefrom_day == "04") {
	  	echo "<option selected value=\"04\">4</option>"; }
		else {echo "<option value=\"04\">4</option>";}
	  
	  if($datefrom_day == "05") {
	  	echo "<option value=\"05\" selected>5</option>"; }
		else {echo "<option value=\"05\">5</option>";} 

	  if($datefrom_day == "06") {
	  	echo "<option selected value=\"06\">6</option>"; }
		else {echo "<option value=\"06\">6</option>";}
	  
	  if($datefrom_day == "07") {
	  	echo "<option value=\"07\" selected>7</option>"; }
		else {echo "<option value=\"07\">7</option>";} 

	  if($datefrom_day == "08") {
	  	echo "<option value=\"08\" selected>8</option>"; }
		else {echo "<option value=\"08\">8</option>";} 

	  if($datefrom_day == "09") {
	  	echo "<option value=\"09\" selected>9</option>"; }
		else {echo "<option value=\"09\">9</option>";} 

	  if($datefrom_day == "10") {
	  	echo "<option selected value=\"10\">10</option>"; }
		else {echo "<option value=\"10\">10</option>";}
	  
	  if($datefrom_day == "11") {
	  	echo "<option value=\"11\" selected>11</option>"; }
		else {echo "<option value=\"11\">11</option>";} 

		if($datefrom_day == "12") {
	  	echo "<option selected value=\"12\">12</option>"; }
		else {echo "<option value=\"12\">12</option>";}
	  
	  if($datefrom_day == "13") {
	  	echo "<option value=\"13\" selected>13</option>"; }
		else {echo "<option value=\"13\">13</option>";} 

	  if($datefrom_day == "14") {
	  	echo "<option selected value=\"14\">14</option>"; }
		else {echo "<option value=\"14\">14</option>";}
	  
	  if($datefrom_day == "15") {
	  	echo "<option value=\"15\" selected>15</option>"; }
		else {echo "<option value=\"15\">15</option>";} 

	  if($datefrom_day == "16") {
	  	echo "<option value=\"16\" selected>16</option>"; }
		else {echo "<option value=\"16\">16</option>";} 
		
	  if($datefrom_day == "17") {
	  	echo "<option value=\"17\" selected>17</option>"; }
		else {echo "<option value=\"17\">17</option>";} 

	  if($datefrom_day == "18") {
	  	echo "<option selected value=\"18\">18</option>"; }
		else {echo "<option value=\"18\">18</option>";}
	  
	  if($datefrom_day == "19") {
	  	echo "<option selected value=\"19\">19</option>"; }
		else {echo "<option value=\"19\">19</option>";}
	  
	  if($datefrom_day == "20") {
	  	echo "<option value=\"20\" selected>20</option>"; }
		else {echo "<option value=\"20\">20</option>";} 

	  if($datefrom_day == "21") {
	  	echo "<option selected value=\"21\">21</option>"; }
		else {echo "<option value=\"21\">21</option>";}
	  
	  if($datefrom_day == "22") {
	  	echo "<option value=\"22\" selected>22</option>"; }
		else {echo "<option value=\"22\">22</option>";} 

	  if($datefrom_day == "23") {
	  	echo "<option value=\"23\" selected>23</option>"; }
		else {echo "<option value=\"23\">23</option>";} 

	  if($datefrom_day == "24") {
	  	echo "<option value=\"24\" selected>24</option>"; }
		else {echo "<option value=\"24\">24</option>";} 

	  if($datefrom_day == "25") {
	  	echo "<option selected value=\"25\">25</option>"; }
		else {echo "<option value=\"25\">25</option>";}
	  
	  if($datefrom_day == "26") {
	  	echo "<option value=\"26\" selected>26</option>"; }
		else {echo "<option value=\"26\">26</option>";} 

		if($datefrom_day == "27") {
	  	echo "<option selected value=\"27\">27</option>"; }
		else {echo "<option value=\"27\">27</option>";}
	  
	  if($datefrom_day == "28") {
	  	echo "<option value=\"28\" selected>28</option>"; }
		else {echo "<option value=\"28\">28</option>";} 

	  if($datefrom_day == "29") {
	  	echo "<option selected value=\"29\">29</option>"; }
		else {echo "<option value=\"29\">29</option>";}
	  
	  if($datefrom_day == "30") {
	  	echo "<option value=\"30\" selected>15</option>"; }
		else {echo "<option value=\"30\">30</option>";} 

	  if($datefrom_day == "31") {
	  	echo "<option value=\"31\" selected>31</option>"; }
		else {echo "<option value=\"31\">31</option>";} 
	
		
		echo "</select>";
//end of datefrom_day---------------------------------------------


/*..........datefrom_year ...............*/
//9/25/07 to get bugs out!
//include("dateform_year.php");


/*Parse availfor*/
$datefrom_year = $year;

echo "&nbsp Year ";

	echo "<select name=\"datefrom_year\">";	  

	if($datefrom_year == "2017") {
	  	echo "<option selected value=\"2017\">2017</option>"; }
		else {echo "<option value=\"2017\">2017</option>";}

	if($datefrom_year == "2018") {
	  	echo "<option selected value=\"2018\">2018</option>"; }
		else {echo "<option value=\"2018\">2018</option>";}

    if($datefrom_year == "2019") {
          echo "<option selected value=\"2019\">201</option>"; }
        else {echo "<option value=\"2019\">2019</option>";}    
        
	echo "</select>	  
            
      </td>
    </tr>
    <tr> 
      <td height=\"22\" width=\"36%\">Availability To:</td>
       ";

/*Parse availto*/
$mo = substr($availto, 5,2);
$day = substr($availto, 8,2);
$year = substr($availto, 0,4);

$dateto_month = $mo;

/*...............AVAILABLE TO...........*/

echo "
	 <td height=\"22\" colspan=\"2\">
	 &nbsp Month
	 <select name=\"dateto_month\">
	 ";


	 echo "&nbsp Month";
	 
	  if($dateto_month == "01") {
	  	echo "<option value=\"01\" selected>January</option>"; }
		else {echo "<option value=\"01\">January</option>";} 

	  if($dateto_month == "02") {
	  	echo "<option selected value=\"02\">February</option>"; }
		else {echo "<option value=\"02\">February</option>";}
	  
	  if($dateto_month == "03") {
	  	echo "<option value=\"03\" selected>March</option>"; }
		else {echo "<option value=\"03\">March</option>";} 

		if($dateto_month == "04") {
	  	echo "<option selected value=\"04\">April</option>"; }
		else {echo "<option value=\"04\">April</option>";}
	  
	  if($dateto_month == "05") {
	  	echo "<option value=\"05\" selected>May</option>"; }
		else {echo "<option value=\"05\">May</option>";} 

	  if($dateto_month == "06") {
	  	echo "<option selected value=\"06\">June</option>"; }
		else {echo "<option value=\"06\">June</option>";}
	  
	  if($dateto_month == "07") {
	  	echo "<option value=\"07\" selected>July</option>"; }
		else {echo "<option value=\"07\">July</option>";} 
		
		if($dateto_month == "08") {
	  	echo "<option value=\"08\" selected>August</option>"; }
		else {echo "<option value=\"08\">August</option>";} 

	  if($dateto_month == "09") {
	  	echo "<option selected value=\"09\">September</option>"; }
		else {echo "<option value=\"09\">September</option>";}
	  
	  if($dateto_month == "10") {
	  	echo "<option value=\"10\" selected>October</option>"; }
		else {echo "<option value=\"10\">October</option>";} 

		if($dateto_month == "11") {
	  	echo "<option selected value=\"11\">November</option>"; }
		else {echo "<option value=\"11\">November</option>";}
	  
	  if($dateto_month == "12") {
	  	echo "<option value=\"12\" selected>December</option>"; }
		else {echo "<option value=\"12\">December</option>";} 

		echo "</select>";
          
//-----------------------end section--------------------------	

echo "&nbsp Day ";   


/*Parse availfor*/
$dateto_day = $day;
/*...................dateto_day (TO).........*/

	  echo "<select name=\"dateto_day\">";

	  if($dateto_day == "01") {
	  	echo "<option value=\"01\" selected>1</option>"; }
		else {echo "<option value=\"01\">1</option>";} 

	  if($dateto_day == "02") {
	  	echo "<option selected value=\"02\">2</option>"; }
		else {echo "<option value=\"02\">2</option>";}
	  
	  if($dateto_day == "03") {
	  	echo "<option value=\"03\" selected>3</option>"; }
		else {echo "<option value=\"03\">3</option>";} 

		if($dateto_day == "04") {
	  	echo "<option selected value=\"04\">4</option>"; }
		else {echo "<option value=\"04\">4</option>";}
	  
	  if($dateto_day == "05") {
	  	echo "<option value=\"05\" selected>5</option>"; }
		else {echo "<option value=\"05\">5</option>";} 

	  if($dateto_day == "06") {
	  	echo "<option selected value=\"06\">6</option>"; }
		else {echo "<option value=\"06\">6</option>";}
	  
	  if($dateto_day == "07") {
	  	echo "<option value=\"07\" selected>7</option>"; }
		else {echo "<option value=\"07\">7</option>";} 

	  if($dateto_day == "08") {
	  	echo "<option value=\"08\" selected>8</option>"; }
		else {echo "<option value=\"08\">8</option>";} 

	  if($dateto_day == "09") {
	  	echo "<option value=\"09\" selected>9</option>"; }
		else {echo "<option value=\"09\">9</option>";} 

	  if($dateto_day == "10") {
	  	echo "<option selected value=\"10\">10</option>"; }
		else {echo "<option value=\"10\">10</option>";}
	  
	  if($dateto_day == "11") {
	  	echo "<option value=\"11\" selected>11</option>"; }
		else {echo "<option value=\"11\">11</option>";} 

		if($dateto_day == "12") {
	  	echo "<option selected value=\"12\">12</option>"; }
		else {echo "<option value=\"12\">12</option>";}
	  
	  if($dateto_day == "13") {
	  	echo "<option value=\"13\" selected>13</option>"; }
		else {echo "<option value=\"13\">13</option>";} 

	  if($dateto_day == "14") {
	  	echo "<option selected value=\"14\">14</option>"; }
		else {echo "<option value=\"14\">14</option>";}
	  
	  if($dateto_day == "15") {
	  	echo "<option value=\"15\" selected>15</option>"; }
		else {echo "<option value=\"15\">15</option>";} 

	  if($dateto_day == "16") {
	  	echo "<option value=\"16\" selected>16</option>"; }
		else {echo "<option value=\"16\">16</option>";} 
		
	  if($dateto_day == "17") {
	  	echo "<option value=\"17\" selected>17</option>"; }
		else {echo "<option value=\"17\">17</option>";} 

	  if($dateto_day == "18") {
	  	echo "<option selected value=\"18\">18</option>"; }
		else {echo "<option value=\"18\">18</option>";}
	  
	  if($dateto_day == "19") {
	  	echo "<option selected value=\"19\">19</option>"; }
		else {echo "<option value=\"19\">19</option>";}
	  
	  if($dateto_day == "20") {
	  	echo "<option value=\"20\" selected>20</option>"; }
		else {echo "<option value=\"20\">20</option>";} 

	  if($dateto_day == "21") {
	  	echo "<option selected value=\"21\">21</option>"; }
		else {echo "<option value=\"21\">21</option>";}
	  
	  if($dateto_day == "22") {
	  	echo "<option value=\"22\" selected>22</option>"; }
		else {echo "<option value=\"22\">22</option>";} 

	  if($dateto_day == "23") {
	  	echo "<option value=\"23\" selected>23</option>"; }
		else {echo "<option value=\"23\">23</option>";} 

	  if($dateto_day == "24") {
	  	echo "<option value=\"24\" selected>24</option>"; }
		else {echo "<option value=\"24\">24</option>";} 

	  if($dateto_day == "25") {
	  	echo "<option selected value=\"25\">25</option>"; }
		else {echo "<option value=\"25\">25</option>";}
	  
	  if($dateto_day == "26") {
	  	echo "<option value=\"26\" selected>26</option>"; }
		else {echo "<option value=\"26\">26</option>";} 

		if($dateto_day == "27") {
	  	echo "<option selected value=\"27\">27</option>"; }
		else {echo "<option value=\"27\">27</option>";}
	  
	  if($dateto_day == "28") {
	  	echo "<option value=\"28\" selected>28</option>"; }
		else {echo "<option value=\"28\">28</option>";} 

	  if($dateto_day == "29") {
	  	echo "<option selected value=\"29\">29</option>"; }
		else {echo "<option value=\"29\">29</option>";}
	  
	  if($dateto_day == "30") {
	  	echo "<option value=\"30\" selected>15</option>"; }
		else {echo "<option value=\"30\">30</option>";} 

	  if($dateto_day == "31") {
	  	echo "<option value=\"31\" selected>31</option>"; }
		else {echo "<option value=\"31\">31</option>";} 
	
		
		echo "</select>";
//end of dateto_day---------------------------------------------

echo "&nbsp Year";
/*..........dateto_year (TO)...............*/
//9/25/07 to get bugs out!
//include("dateform_year.php");


/*Parse availfor*/
$dateto_year = $year;

	echo "<select name=\"dateto_year\">";	  
	

	if($dateto_year == "2018") {
	  	echo "<option selected value=\"2018\">2018</option>"; }
		else {echo "<option value=\"2018\">2018</option>";}

	if($dateto_year == "2019") {
	  	echo "<option selected value=\"2019\">2019</option>"; }
		else {echo "<option value=\"2019\">2019</option>";}	
		
		
	echo "</select>";	  
    
    
    
    
    
 echo "   
    <tr> 
      <td height=\"20\" width=\"36%\">Primary Position Sought: </td>
      <td height=\"20\" width=\"30%\"> 
        <select name=\"job1\" size=\"1\">
";     
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
		else {echo "<option value=\"Box Office\">Box Office</option>";}
	  
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
      <td height=\"20\" width=\"34%\">Age if under 21 
        <input type=\"text\" name=\"under21\" value = \"$under21\" size=\"2\" maxlength=\"2\">
        <br>
        Would you job in: <select name=\"jobin\" size=\"1\">
";        
        if($jobin == "Y") {
	  	echo "<option value=\"Y\" selected>Yes</option>"; }
		else {echo "<option value=\"Y\">Yes</option>";}
        
        if($jobin == "N") {
	  	echo "<option value=\"N\" selected>No</option>"; }
		else {echo "<option value=\"N\">No</option>";}
echo " 
		</select>       
        </td>
    </tr>
    <tr> 
      <td height=\"20\" width=\"36%\">Secondary Position Sought:</td>
      <td height=\"20\" width=\"30%\"> 
        <select name=\"job2\" size=\"1\">

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
		else {echo "<option value=\"Box Office\">Box Office</option>";}
	  
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
      <td height=\"20\" width=\"34%\">Minimum weekly salary:
		
        <input type=\"text\" name=\"salary\" value=\"$salary\" size=\"4\" maxlength=\"4\"></td>
    </tr>
    <tr>
    	<td colspan = \"3\">
    	If you selected \"Other\" in Secondary Position, please describe: 
    	<input type=\"text\" name=\"other\" value=\"$other\" size=\"30\" maxlength=\"30\"></td>
       </td>
    </tr>   
  </table>
  <BR>
  
  <table width=\"65%\" border=\"1\" cellspacing=\"1\" cellpadding=\"1\" align=\"center\">
    <tr> 
      <td colspan=\"3\"><b><i>Please check all areas of significant training and 
        related experience:</i></b></td>
    </tr>
    <tr> 
      <td>
";      
      if(!empty($accomp) ) {
	  	echo "<input type=\"checkbox\" name=\"accomp\" value=\"AC\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"accomp\" value=\"AC\">";}
echo "Accompanist</td><td>";
		
      if(!empty($graphics) ) {
	  	echo "<input type=\"checkbox\" name=\"graphics\" value=\"GR\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"graphics\" value=\"GR\">";}
echo "Graphics</td><td>";

		if(!empty($props) ) {
	  	echo "<input type=\"checkbox\" name=\"props\" value=\"PP\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"props\" value=\"PP\">";}	

echo "Props</td><td> </tr> 
		<tr> <td>";		

      if(!empty($admin) ) {
	  	echo "<input type=\"checkbox\" name=\"admin\" value=\"AD\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"admin\" value=\"AD\">";}	
echo "Administration</td><td>";
		
		if(!empty($house) ) {
	  	echo "<input type=\"checkbox\" name=\"house\" value=\"HM\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"house\" value=\"HM\">";}	
echo "House Management</td><td>";		

		if(!empty($pr) ) {
	  	echo "<input type=\"checkbox\" name=\"pr\" value=\"PR\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"pr\" value=\"PR\">";}	

echo "Publicity</td><td> </tr> 
		<tr> <td>";	

       if(!empty($boxoffice) ) {
	  	echo "<input type=\"checkbox\" name=\"boxoffice\" value=\"BO\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"boxoffice\" value=\"BO\">";}	
echo "Box Office</td><td>";		

        if(!empty($lights) ) {
	  	echo "<input type=\"checkbox\" name=\"lights\" value=\"LD\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"lights\" value=\"LD\">";}	
echo "Lighting Design</td><td>";		

		if(!empty($runcrew) ) {
	  	echo "<input type=\"checkbox\" name=\"runcrew\" value=\"RC\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"runcrew\" value=\"RC\">";}	
echo "Running Crew</td><td> </tr> 
		<tr> <td>";	

if(!empty($carp) ) {
	  	echo "<input type=\"checkbox\" name=\"carp\" value=\"CA\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"carp\" value=\"CA\">";}	
echo "Carpentry</td><td>";		

		if(!empty($elec) ) {
	  	echo "<input type=\"checkbox\" name=\"elec\" value=\"EL\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"elec\" value=\"EL\">";}	
echo "Electrics</td><td>";				
		
		if(!empty($scenic) ) {
	  	echo "<input type=\"checkbox\" name=\"scenic\" value=\"SA\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"scenic\" value=\"SA\">";}	
echo "Scenic Artist</td><td> </tr> 
		<tr> <td>";	

if(!empty($choreo) ) {
	  	echo "<input type=\"checkbox\" name=\"choreo\" value=\"CH\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"choreo\" value=\"CH\">";}	
echo "Choreography</td><td>";				

		if(!empty($direct) ) {
	  	echo "<input type=\"checkbox\" name=\"direct\" value=\"DR\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"direct\" value=\"DR\">";}	
echo "Director</td><td>";				

		if(!empty($setdesign) ) {
	  	echo "<input type=\"checkbox\" name=\"setdesign\" value=\"SD\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"setdesign\" value=\"SD\">";}	
echo "Set Design</td><td> </tr> 
		<tr> <td>";	

if(!empty($costume) ) {
	  	echo "<input type=\"checkbox\" name=\"costume\" value=\"CD\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"costume\" value=\"CD\">";}	
echo "Costume Design</td><td>";				

		if(!empty($music) ) {
	  	echo "<input type=\"checkbox\" name=\"music\" value=\"MD\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"music\" value=\"MD\">";}	
echo "Musical Director</td><td>";				

		if(!empty($sound) ) {
	  	echo "<input type=\"checkbox\" name=\"sound\" value=\"SD\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"sound\" value=\"SD\">";}	
echo "Sound</td><td> </tr> 
		<tr> <td>";	

		if(!empty($sew) ) {
	  	echo "<input type=\"checkbox\" name=\"sew\" value=\"SW\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"sew\" value=\"SW\">";}	
echo "Sewing</td><td>";				

		if(!empty($photo) ) {
	  	echo "<input type=\"checkbox\" name=\"photo\" value=\"PH\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"photo\" value=\"PH\">";}	
echo "Photography</td><td>";				
		
		if(!empty($stagem) ) {
	  	echo "<input type=\"checkbox\" name=\"stagem\" value=\"SM\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"stagem\" value=\"SM\">";}	
 
echo"Stage Management</td><td> </tr> 
		<tr> <td>";	
		
		if(!empty($td) ) {
	  	echo "<input type=\"checkbox\" name=\"td\" value=\"TD\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"td\" value=\"TD\">";}	
echo "Technical Director</td><td>";				

		if(!empty($video) ) {
	  	echo "<input type=\"checkbox\" name=\"video\" value=\"VD\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"video\" value=\"VD\">";}	
echo "Video</td><td>";				

		if(!empty($company) ) {
	  	echo "<input type=\"checkbox\" name=\"company\" value=\"CM\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"company\" value=\"CM\">";}	
echo "Company Management</td><td> </tr>
  </table>

  <div align=\"center\"> 
          <input type=\"submit\" value=\"Update Record\" name=\"submit\">
          
        </div>


</form>

</body>
</html>
";
}
?>