<?php
$tech_uid = $_POST['tech_uid'];

/*if (!$sel_record) {
	echo "No sel_record";

	exit;
	}
*/

include("../../Comm/connect.inc");


//SQL statement to select record
$sql = "SELECT * FROM techies11 WHERE tech_uid = $tech_uid";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


if (!$sql_result) {
	echo "<P>Couldn't get record!</P>";
	exit;
	}

	else {
	

//fetch row and assign to variables
$row = mysql_fetch_array($sql_result);
$tech_uid = $row["tech_uid"];
$lastname = $row["lastname"];
$firstname = $row["firstname"];
$midname = $row["midname"];
$date_entered = $row["date_entered"];
$address = $row["address"];
$city = $row["city"];
$state = $row["state"];
$zip = $row["zip"];
$region = $row["region"];
$phone = $row["phone"];
$email = $row["email"];
$largecity = $row["largecity"];
$h_or_serv = $row["h_or_serv"];
$url1 = $row["url1"];
$url2 = $row["url2"];

$lastname = htmlspecialchars(stripslashes($lastname));
$firstname = htmlspecialchars(stripslashes($firstname));
$midname = htmlspecialchars(stripslashes($midname));
$address = htmlspecialchars(stripslashes($address));
$city = htmlspecialchars(stripslashes($city));
$state = htmlspecialchars(stripslashes($state));
$zip = htmlspecialchars(stripslashes($zip));
$phone = htmlspecialchars(stripslashes($phone));
$email = htmlspecialchars(stripslashes($email));
$largecity = htmlspecialchars(stripslashes($largecity));
$url1 = htmlspecialchars(stripslashes($url1));
$url2 = htmlspecialchars(stripslashes($url2));


//parse phone number
$areacode = substr($phone, 0,3);
$phone1 = substr($phone, 3,3);
$phone2 = substr($phone, 6,4);

}
echo "
<html>
<head>
<title>StrawHat Update Staff Tech Design Information</title>
<link rel=\"stylesheet\" href=\"actors.css\" type=\"text/css\">
</head>
<body>
";
?>

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
	else if(!validateAreaCode(tech.areacode.value) )
		{
			tech.areacode.focus();
			return false;
		}

	else if(!validatePhone1(tech.phone1.value) )
		{
			tech.phone1.focus();
			return false;
		}

	else if(!validatePhone2(tech.phone2.value) )
		{
			tech.phone2.focus();
			return false;
		}		
	else if(!validateEmail(tech.email.value) )
		{
			tech.email.focus();
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

function validateAreaCode(areacode)
{
	if(isBlank(areacode) )
		{
			alert("Enter Your Area Code please!");
			return false;
		}
	//if everythings okay, then
	return true;
}

function validatePhone1(phone1)
{
	if(isBlank(phone1) )
		{
			alert("Enter Your Phone please!");
			return false;
		}
	//if everythings okay, then
	return true;
}

function validatePhone2(phone2)
{
	if(isBlank(phone2) )
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

echo "
<table align=\"center\">
    <tr>
    <td align = \"center\"> 
    <FORM method=\"POST\" action= \"/TechEntry11/profile_change/changes.php\">
    <input type = \"hidden\" name = \"tech_uid\" value = \"$tech_uid\">
    <INPUT type=\"submit\" value =\"Back to Change Application Menu\">
    </FORM>            
    </td>
    </tr>    
</table>
";



echo "


<h2 align = 'center'>Update your Staff Tech Design Information here:</h2>
<form name=\"tech\" ONSUBMIT=\"return validateForm(tech)\" method=\"POST\" action=\"tech_modifyrecord3.php\">
<input type = \"hidden\" name = \"tech_uid\" value = \"$tech_uid\">

  <table width=\"82%\" border=\"0\" align=\"center\">
    <tr> 
      <td colspan=\"4\"> 
        <div align=\"left\"><b><i>Staff/Tech/Design Information</i></b></div>
      </td>
    </tr>
    <tr> 
      <td width=\"49%\"><b>First Name:</b> 
        <input type=\"text\" name=\"firstname\" maxlength=\"30\" size=\"30\" value=\"$firstname\">
        <br>
        <b>Middle:</b> 
        <input type=\"text\" name=\"midname\" maxlength=\"20\" size=\"22\" value=\"$midname\">
        <br>
        <b>Last Name:</b> 
        <input type=\"text\" name=\"lastname\" size=\"30\" maxlength=\"30\" value=\"$lastname\">
      </td>
      <td colspan=\"2\" width=\"51%\"><b>Address: 
        <input type=\"text\" name=\"address\" maxlength=\"50\" size=\"50\" value=\"$address\">
        <br>
        City: 
        <input name=\"city\" size=\"30\" type=\"text\" maxlength=\"20\" value=\"$city\">
        <br>
        State: 
        <select name=\"state\" size=\"1\">
";

	if($state == "AL") {
	  	echo "
          <option value=\"AL\" selected>AL</option> "; }
	else {echo "
          <option value = \"AL\">AL</option>";}
	if($state == "AK") {
	  	echo "
          <option value=\"AK\" selected>AK</option> "; }
	else {echo "
          <option value = \"AK\">AK</option>";}
	if($state == "AR") {
	  	echo "
          <option value=\"AR\" selected>AR</option> "; }
	else {echo "
          <option value = \"AR\">AR</option>";}
	if($state == "AZ") {
	  	echo "
          <option value=\"AZ\" selected>AZ</option> "; }
	else {echo "
          <option value = \"AZ\">AZ</option>";}
	if($state == "CA") {
	  	echo "
          <option value=\"CA\" selected>CA</option> "; }
	else {echo "
          <option value = \"CA\">CA</option>";}
	if($state == "CO") {
	  	echo "
          <option value=\"CO\" selected>CO</option>"; }
	else {echo "
          <option value = \"CO\">CO</option>";}
	if($state == "CT") {
	  	echo "
          <option value=\"CT\" selected>CT</option>"; }
	else {echo "
          <option value = \"CT\">CT</option>";}
	if($state == "DC") {
	  	echo "
          <option value=\"DC\" selected>DC</option> "; }
	else {echo "
          <option value = \"DC\">DC</option>";}
	if($state == "DE") {
	  	echo "
          <option value=\"DE\" selected >DE</option> "; }
	else {echo "
          <option value = \"DE\">DE</option>";}
	if($state == "FL") {
	  	echo "
          <option value=\"FL\" selected >FL</option> "; }
	else {echo "
          <option value = \"FL\">FL</option>";}
	if($state == "GA") {
	  	echo "
          <option value=\"GA\" selected>GA</option> "; }
	else {echo "
          <option value = \"GA\">GA</option>";}
	if($state == "HI") {
	  	echo "
          <option value=\"HI\" selected>HI</option> "; }
	else {echo "
          <option value = \"HI\">HI</option>";}
	if($state == "IA") {
	  	echo "
          <option value=\"IA\" selected>IA</option> "; }
	else {echo "
          <option value = \"IA\">IA</option>";}
	if($state == "ID") {
	  	echo "
          <option value=\"ID\" selected>ID</option> "; }
	else {echo "
          <option value = \"ID\">ID</option>";}
	if($state == "IL") {
	  	echo "
          <option value=\"IL\" selected>IL</option> "; }
	else {echo "
          <option value = \"IL\">IL</option>";}
	if($state == "IN") {
	  	echo "
          <option value=\"IN\" selected>IN</option> "; }
	else {echo "
          <option value = \"IN\">IN</option>";}
	if($state == "KS") {
	  	echo "
          <option value=\"KS\" selected>KS</option> "; }
	else {echo "
          <option value = \"KS\">KS</option>";}
	if($state == "KY") {
	  	echo "
          <option value=\"KY\" selected>KY</option> "; }
	else {echo "
          <option value = \"KY\">KY</option>";}
	if($state == "LA") {
	  	echo "
          <option value=\"LA\" selected>LA</option> "; }
	else {echo "
          <option value = \"LA\">LA</option>";}
	if($state == "MA") {
	  	echo "
          <option value=\"MA\" selected>MA</option> "; }
	else {echo "
          <option value = \"MA\">MA</option>";}
	if($state == "MD") {
	  	echo "
          <option value=\"MD\" selected>MD</option> "; }
	else {echo "
          <option value = \"MD\">MD</option>";}
	if($state == "ME") {
	  	echo "
          <option value=\"ME\" selected>ME</option> "; }
	else {echo "
          <option value = \"ME\">ME</option>";}
	if($state == "MI") {
	  	echo "
          <option value=\"MI\" selected>MI</option> "; }
	else {echo "
          <option value = \"MI\">MI</option>";}
	if($state == "MN") {
	  	echo "
          <option value=\"MN\" selected>MN</option> "; }
	else {echo "
          <option value = \"MN\">MN</option>";}
	if($state == "MO") {
	  	echo "
          <option value=\"MO\" selected>MO</option> "; }
	else {echo "
          <option value = \"MO\">MO</option>";}
	if($state == "MS") {
	  	echo "
          <option value=\"MS\" selected>MS</option> "; }
	else {echo "
          <option value = \"MS\">MS</option>";}
	if($state == "MT") {
	  	echo "
          <option value=\"MT\" selected>MT</option> "; }
	else {echo "
          <option value = \"MT\">MT</option>";}
	if($state == "NC") {
	  	echo "
          <option value=\"NC\" selected>NC</option> "; }
	else {echo "
          <option value = \"NC\">NC</option>";}
	if($state == "ND") {
	  	echo "
          <option value=\"ND\" selected>ND</option> "; }
	else {echo "
          <option value = \"ND\">ND</option>";}
	if($state == "NE") {
	  	echo "
          <option value=\"NE\" selected>NE</option> "; }
	else {echo "
          <option value = \"NE\">NE</option>";}
	if($state == "NH") {
	  	echo "
          <option value=\"NH\" selected>NH</option> "; }
	else {echo "
          <option value = \"NH\">NH</option>";}
	if($state == "NJ") {
	  	echo "
          <option value=\"NJ\" selected>NJ</option> "; }
	else {echo "
          <option value = \"NJ\">NJ</option>";}
	if($state == "NM") {
	  	echo "
          <option value=\"NM\" selected>NM</option> "; }
	else {echo "
          <option value = \"NM\">NM</option>";}
	if($state == "NY") {
	  	echo "
          <option value=\"NY\" selected>NY</option> "; }
	else {echo "
          <option value = \"NY\">NY</option>";}
	if($state == "NV") {
	  	echo "
          <option value=\"NV\" selected>NV</option> "; }
	else {echo "
          <option value = \"NV\">NV</option>";}
	if($state == "OH") {
	  	echo "
          <option value=\"OH\" selected>OH</option> "; }
	else {echo "
          <option value = \"OH\">OH</option>";}
	if($state == "OK") {
	  	echo "
          <option value=\"OK\" selected>OK</option> "; }
	else {echo "
          <option value = \"OK\">OK</option>";}
	if($state == "OR") {
	  	echo "
          <option value=\"OR\" selected>OR</option> "; }
	else {echo "
          <option value = \"OR\">OR</option>";}
	if($state == "PA") {
	  	echo "
          <option value=\"PA\" selected>PA</option> "; }
	else {echo "
          <option value = \"PA\">PA</option>";}
	if($state == "PR") {
	  	echo "
          <option value=\"PR\" selected>PR</option> "; }
	else {echo "
          <option value = \"PR\">PR</option>";}
	if($state == "RI") {
	  	echo "
          <option value=\"RI\" selected>RI</option> "; }
	else {echo "
          <option value = \"RI\">RI</option>";}
	if($state == "SC") {
	  	echo "
          <option value=\"SC\" selected>SC</option> "; }
	else {echo "
          <option value = \"SC\">SC</option>";}
	if($state == "SD") {
	  	echo "
          <option value=\"SD\" selected>SD</option> "; }
	else {echo "
          <option value = \"SD\">SD</option>";}
	if($state == "TN") {
	  	echo "
          <option value=\"TN\" selected>TN</option> "; }
	else {echo "
          <option value = \"TN\">TN</option>";}
	if($state == "TX") {
	  	echo "
          <option value=\"TX\" selected>TX</option> "; }
	else {echo "
          <option value = \"TX\">TX</option>";}
	if($state == "UT") {
	  	echo "
          <option value=\"UT\" selected>UT</option> "; }
	else {echo "
          <option value = \"UT\">UT</option>";}
	if($state == "VA") {
	  	echo "
          <option value=\"VA\" selected>VA</option> "; }
	else {echo "
          <option value = \"VA\">VA</option>";}
	if($state == "VT") {
	  	echo "
          <option value=\"VT\" selected>VT</option> "; }
	else {echo "
          <option value = \"VT\">VT</option>";}
	if($state == "WA") {
	  	echo "
          <option value=\"WA\" selected>WA</option> "; }
	else {echo "
          <option value = \"WA\">WA</option>";}
	if($state == "WI") {
	  	echo "
          <option value=\"WI\" selected>WI</option> "; }
	else {echo "
          <option value = \"WI\">WI</option>";}
	if($state == "WV") {
	  	echo "
          <option value=\"WV\" selected>WV</option> "; }
	else {echo "
          <option value = \"WV\">WV</option>";}
		if($state == "WY") {
	  	echo "
          <option value=\"WY\" selected>WY</option> "; }
	else {echo "
          <option value = \"WY\">WY</option>";}
	
	echo "
	
        </select>
        
        <br>
        Zip: 
        <input type=\"text\" name=\"zip\" maxlength=\"10\" size=\"10\" value=\"$zip\">
        </b> </td>
    </tr>
    <tr> 
      <td width=\"49%\"><b>Phone:</b>
        <input type=\"text\" name=\"areacode\" size=\"3\" maxlength=\"3\" value=\"$areacode\">
        <input type=\"text\" name=\"phone1\" size=\"3\" maxlength=\"3\" value = \"$phone1\">
        <input type=\"text\" name=\"phone2\" maxlength=\"4\" size=\"4\" value = \"$phone2\">
        <BR>
        <b>(H)ome, (S)ervice, (C)ell, (O)ffice </b> 
        <select name=\"h_or_serv\" size=\"1\">
        ";		
		
		if($h_or_serv == "H") {
	  	echo "
          <option value=\"H\" selected>Home</option> "; }
		else {echo "
          <option value = \"H\">Home</option>";}
	  
	  if($h_or_serv == "S") {
	  	echo "
          <option value = \"S\" selected>Service</option>"; }
		else {echo "
          <option value = \"S\">Service</option>";}
	  
	  if($h_or_serv == "C") {
	  	echo "
          <option value = \"C\" selected>Cell</option>"; }
		else {echo "
          <option value = \"C\">Cell</option>";}
          
      if($h_or_serv == "O") {
          echo "
          <option value = \"O\" selected>Office</option>"; }
        else {echo "
          <option value = \"O\">Office</option>";}
          
          
echo "
          
        </select>
        <b> </b></td>
      <td colspan=\"3\" width=\"51%\"><b>Nearest Largest City: 
          <select name=\"largecity\" size=\"1\">
      <option selected value=\"NA\">Large City Shown</option>
		";
          
   	  if($largecity == "Albuquerque") {
	  	echo "
          <option selected value=\"Albuquerque\">Albuquerque</option>"; }
		else {echo "
          <option value=\"Albuquerque\">Albuquerque</option>";}

	  if($largecity == "Anchorage") {
	  	echo "
          <option selected value=\"Anchorage\">Anchorage</option>"; }
		else {echo "
          <option value=\"Anchorage\">Anchorage</option>";}
        
   	  if($largecity == "Atlanta") {
	  	echo "
          <option selected value=\"Atlanta\">Atlanta</option>"; }
		else {echo "
          <option value=\"Atlanta\">Atlanta</option>";}

	  if($largecity == "Baltimore") {
	  	echo "
          <option selected value=\"Baltimore\">Baltimore</option>"; }
		else {echo "
          <option value=\"Baltimore\">Baltimore</option>";}

      if($largecity == "Billings") {
	  	echo "
          <option selected value=\"Billings\">Billings</option>"; }
		else {echo "
          <option value=\"Billings\">Billings</option>";}
        
      if($largecity == "Birmingham") {
	  	echo "
          <option selected value=\"Birmingham\">Birmingham</option>"; }
		else {echo "
          <option value=\"Birmingham\">Birmingham</option>";}
        
      if($largecity == "Boise") {
	  	echo "
          <option selected value=\"Boise\">Boise</option>"; }
		else {echo "
          <option value=\"Boise\">Boise</option>";}

      if($largecity == "Boston") {
	  	echo "
          <option selected value=\"Boston\">Boston</option>"; }
		else {echo "
          <option value=\"Boston\">Boston</option>";}
          
      if($largecity == "Bridgeport") {
	  	echo "
          <option selected value=\"Bridgeport\">Bridgeport</option>"; }
		else {echo "
          <option value=\"Bridgeport\">Bridgeport</option>";}
          
      if($largecity == "Burlington") {
	  	echo "
          <option selected value=\"Burlington\">Burlington</option>"; }
	  	
		else {echo "
          <option value=\"Burlington\">Burlington</option>";}

      if($largecity == "Charleston") {
	  	echo "
          <option selected value=\"Charleston\">Charleston</option>"; }
		else {echo "
          <option value=\"Charleston\">Charleston</option>";}

	  if($largecity == "Charlotte") {
	  	echo "
          <option selected value=\"Charlotte\">Charlotte</option>"; }
		else {echo "
          <option value=\"Charlotte\">Charlotte</option>";}

      if($largecity == "Cheyenne") {
	  	echo "
          <option selected value=\"Cheyenne\">Cheyenne</option>"; }
		else {echo "
          <option value=\"Cheyenne\">Cheyenne</option>";}          
         
	  if($largecity == "Chicago") {
	  	echo "
          <option selected value=\"Chicago\">Chicago</option>"; }
		else {echo "
          <option value=\"Chicago\">Chicago</option>";}
          
      if($largecity == "Columbia") {
	  	echo "
          <option selected value=\"Columbia\">Columbia</option>"; }
		else {echo "
          <option value=\"Columbia\">Columbia</option>";}          
         
	  if($largecity == "Columbus") {
	  	echo "
          <option selected value=\"Columbus\">Columbus</option>"; }
		else {echo "
          <option value=\"Columbus\">Columbus</option>";}
          
      if($largecity == "Denver") {
	  	echo "
          <option selected value=\"Denver\">Denver</option>"; }
		else {echo "
          <option value=\"Denver\">Denver</option>";}          

	  if($largecity == "Detroit") {
	  	echo "
          <option selected value=\"Detroit\">Detroit</option>"; }
		else {echo "
          <option value=\"Detroit\">Detroit</option>";}
          
      if($largecity == "Des Moines") {
	  	echo "
          <option selected value=\"Des Moines\">Des Moines</option>"; }
		else {echo "
          <option value=\"Des Moines\">Des Moines</option>";}          
          
	  if($largecity == "Fargo") {
	  	echo "
          <option selected value=\"Detroit\">Fargo</option>"; }
		else {echo "
          <option value=\"Fargo\">Fargo</option>";}
          
      if($largecity == "Honolulu") {
	  	echo "
          <option selected value=\"Honolulu\">Honolulu</option>"; }
		else {echo "
          <option value=\"Honolulu\">Honolulu</option>";}          
          
	  if($largecity == "Houston") {
	  	echo "
          <option selected value=\"Houston\">Houston</option>"; }
		else {echo "
          <option value=\"Houston\">Houston</option>";}
          
      if($largecity == "Indianapolis") {
	  	echo "
          <option selected value=\"Indianapolis\">Indianapolis</option>"; }
		else {echo "
          <option value=\"Indianapolis\">Indianapolis</option>";}          

	  if($largecity == "Jackson") {
	  	echo "
          <option selected value=\"Jackson\">Jackson</option>"; }
		else {echo "
          <option value=\"Jackson\">Jackson</option>";}
          
      if($largecity == "Jacksonville") {
	  	echo "
          <option selected value=\"Jacksonville\">Jacksonville</option>"; }
		else {echo "
          <option value=\"Jacksonville\">Jacksonville</option>";}          
          
	  if($largecity == "Lewiston") {
	  	echo "
          <option selected value=\"Lewiston\">Lewiston</option>"; }
		else {echo "
          <option value=\"Lewiston\">Lewiston</option>";}
          
      if($largecity == "Little Rock") {
	  	echo "
          <option selected value=\"Little Rock\">Little Rock</option>"; }
		else {echo "
          <option value=\"Little Rock\">Little Rock</option>";}          

      if($largecity == "Los Angeles") {
	  	echo "
          <option selected value=\"Los Angeles\">Los Angeles</option>"; }
		else {echo "
          <option value=\"Los Angeles\">Los Angeles</option>";}
          
      if($largecity == "Louisville") {
	  	echo "
          <option selected value=\"Louisville\">Louisville</option>"; }
		else {echo "
          <option value=\"Louisville\">Louisville</option>";} 
		
      if($largecity == "Louisville") {
	  	echo "
          <option selected value=\"Louisville\">Louisville</option>"; }
		else {echo "
          <option value=\"Louisville\">Louisville</option>";}          

      if($largecity == "Minneapolis") {
	  	echo "
          <option selected value=\"Minneapolis\">Minneapolis</option>"; }
		else {echo "
          <option value=\"Minneapolis\">Minneapolis</option>";}
          
      if($largecity == "Manchester") {
	  	echo "
          <option selected value=\"Manchester\">Manchester</option>"; }
		else {echo "
          <option value=\"Manchester\">Manchester</option>";}          

      if($largecity == "Memphis") {
	  	echo "
          <option selected value=\"Memphis\">Memphis</option>"; }
		else {echo "
          <option value=\"Memphis\">Memphis</option>";}
          
      if($largecity == "Milwaukee") {
	  	echo "
          <option selected value=\"Milwaukee\">Milwaukee</option>"; }
		else {echo "
          <option value=\"Milwaukee\">Milwaukee</option>";}          
          
      if($largecity == "Newark") {
	  	echo "
          <option selected value=\"Newark\">Newark</option>"; }
		else {echo "
          <option value=\"Newark\">Newark</option>";}
          
      if($largecity == "New Orleans") {
	  	echo "
          <option selected value=\"New Orleans\">New Orleans</option>"; }
		else {echo "
          <option value=\"New Orleans\">New Orleans</option>";}                    
          
      if($largecity == "New York City") {
	  	echo "
          <option selected value=\"New York City\">New York City</option>"; }
		else {echo "
          <option value=\"New York City\">New York City</option>";}
          
      if($largecity == "Oklahoma City") {
	  	echo "
          <option selected value=\"Oklahoma City\">Oklahoma City</option>"; }
		else {echo "
          <option value=\"Oklahoma City\">Oklahoma City</option>";}                    

      if($largecity == "Omaha") {
	  	echo "
          <option selected value=\"Omaha\">Omaha</option>"; }
		else {echo "
          <option value=\"Omaha\">Omaha</option>";}
          
      if($largecity == "Phoenix") {
	  	echo "
          <option selected value=\"Phoenix\">Phoenix</option>"; }
		else {echo "
          <option value=\"Phoenix\">Phoenix</option>";}                    
          
      if($largecity == "Philadelphia") {
	  	echo "
          <option selected value=\"Philadelphia\">Philadelphia</option>"; }
		else {echo "
          <option value=\"Philadelphia\">Philadelphia</option>";}
          
      if($largecity == "Portland") {
	  	echo "
          <option selected value=\"Portland\">Portland</option>"; }
		else {echo "
          <option value=\"Portland\">Portland</option>";}                    
          
      if($largecity == "Providence") {
	  	echo "
          <option selected value=\"Providence\">Providence</option>"; }
		else {echo "
          <option value=\"Providence\">Providence</option>";}
          
      if($largecity == "Salt Lake City") {
	  	echo "
          <option selected value=\"Salt Lake City\">Salt Lake City</option>"; }
		else {echo "
          <option value=\"Salt Lake City\">Salt Lake City</option>";}                    

      if($largecity == "Seattle") {
	  	echo "
          <option selected value=\"Seattle\">Seattle</option>"; }
		else {echo "
          <option value=\"Seattle\">Seattle</option>";}
          
      if($largecity == "Sioux Falls") {
	  	echo "
          <option selected value=\"Sioux Falls\">Sioux Falls</option>"; }
		else {echo "
          <option value=\"Sioux Falls\">Sioux Falls</option>";}                    
          
      if($largecity == "Virginia Beach") {
	  	echo "
          <option selected value=\"Virginia Beach\">Virginia Beach</option>"; }
		else {echo "
          <option value=\"Virginia Beach\">Virginia Beach</option>";}
          
      if($largecity == "Wichita") {
	  	echo "
          <option selected value=\"Wichita\">Wichita</option>"; }
		else {echo "
          <option value=\"Wichita\">Wichita</option>";}                    

      if($largecity == "Wilmington") {
	  	echo "
          <option selected value=\"Wilmington\">Wilmington</option>"; }
		else {echo "
          <option value=\"Wilmington\">Wilmington</option>";}                   

	echo "
          
        </select>
		
		
		</td>
    </tr>
    <tr> 
      <td width=\"49%\"><b>Email 
        <input type=\"text\" name=\"email\" maxlength=\"50\" size=\"50\" value=\"$email\">
        </b> </td>
        
      <td colspan=\"3\" width=\"51%\"><b>Region:</b> 
        <select name=\"region\" size=\"1\">
		";

	  if($region == "MW") {
	  	echo "
          <option selected value=\"MW\">Midwest</option> "; }
		else {echo "
          <option value=\"MW\">Midwest</option>";}
	  
	  if($region == "NE") {
	  	echo "
          <option selected value=\"NE\">Northeast</option>"; }
		else {echo "
          <option value=\"NE\">Northeast</option>";}
	  
	  if($region == "NW") {
	  	echo "
          <option selected value=\"NW\">Northwest</option>"; }
		else {echo "
          <option value=\"NW\">Northwest</option>";}

	  if($region == "S") {
	  	echo "
          <option selected value=\"S\">South</option>"; }
		else {echo "
          <option value=\"S\">South</option>";}

      if($region == "SE") {
          echo "
          <option selected value=\"SE\">Southeast</option>"; }
        else {echo "
            
          <option value=\"SE\">Southeast</option>";}

      if($region == "SW") {
          echo "
          <option selected value=\"SW\">Southwest</option>"; }
        else {echo "
          <option value=\"SW\">Southwest</option>
          ";}

          
      if($region == "W") {
          echo "
          <option selected value=\"W\">West</option>"; }
        else {echo "
          <option value=\"W\">West</option>";}          

echo "
          
        </select>
      </td>
    </tr>
    <tr> 
      <td width=\"49%\"> 
        <div align=\"left\"><b>Website 1: (Enter Complete URL.)</b> 
          <input type=\"text\" name=\"url1\" size=\"75\" maxlength=\"100\" value=\"$url1\">
          <br>
          <b>Website 2: (Enter Enter Complete URL.)</b> 
          <input type=\"text\" name=\"url2\" size=\"75\" maxlength=\"100\" value=\"$url2\">
          <b> </b></div>
      </td>
      <td colspan=\"3\" width=\"51%\"> 
        <div align=\"left\">&lt;== Your website and/or other outside sites that show your work. Links will be available on your profile.</div>
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

</form>

</body>
</html>
";

?>