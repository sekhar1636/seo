<?php
include("session.inc");
$sel_record = $_POST['../sel_record'];
//include("session_noNavBar.inc");

//<?php
$thea_uid = $_POST['sel_record'];


include("../../Comm/connect.inc");

//SQL statement to select record
$sql = "SELECT * FROM theatre11 WHERE thea_uid = $thea_uid";

//execute SQL query and get result    
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");

if (!$sql_result) {
    echo "<P>Couldn't get record!</P>";
    exit;
    }

    else {
    

//fetch row and assign to variables
$row = mysql_fetch_array($sql_result);
$thea_uid = $row["thea_uid"];
$lastname = $row["lastname"];
$firstname = $row["firstname"];
$midname = $row["midname"];
$date_entered = $row["date_entered"];
$company = $row["company"];
$address = $row["address"];
$city = $row["city"];
$state = $row["state"];
$zip = $row["zip"];
$region = $row["region"];
$phone = $row["phone"];
$fax = $row["fax"];
$email = $row["email"];
$largecity = $row["largecity"];
$h_or_serv = $row["h_or_serv"];
$url1 = $row["url1"];
$url2 = $row["url2"];
$rep1 = $row["rep1"];
$rep2 = $row["rep2"];
$rep3 = $row["rep3"];
$rep4 = $row["rep4"];
$rep5 = $row["rep5"];
$title1 = $row["title1"];
$title2 = $row["title2"];
$title3 = $row["title3"];
$title4 = $row["title4"];
$title5 = $row["title5"];
$nonmusical = $row["nonmusical"];
$dancers = $row["dancers"];
$sat = $row["sat"];
$sun = $row["sun"];
$mon = $row["mon"];

$lastname = htmlspecialchars(stripslashes($lastname));
$firstname = htmlspecialchars(stripslashes($firstname));
$midname = htmlspecialchars(stripslashes($midname));
$address = htmlspecialchars(stripslashes($address));
$company = htmlspecialchars(stripslashes($company));
$city = htmlspecialchars(stripslashes($city));
//$state = htmlspecialchars(stripslashes($state));
$zip = htmlspecialchars(stripslashes($zip));
$phone = htmlspecialchars(stripslashes($phone));
//$fax = htmlspecialchars(stripslashes($fax));
$email = htmlspecialchars(stripslashes($email));
//$largecity = htmlspecialchars(stripslashes($largecity));
$url1 = htmlspecialchars(stripslashes($url1));
$url2 = htmlspecialchars(stripslashes($url2));
//$rep1 = htmlspecialchars(stripslashes($rep1));
//$title1 = htmlspecialchars(stripslashes($title1));



//$lastname = htmlspecialchars($lastname);

//parse phone number
$areacode = substr($phone, 0,3);
$phone1 = substr($phone, 3,3);
$phone2 = substr($phone, 6,4);

//parse fax number
$fareacode = substr($fax, 0,3);
$fphone1 = substr($fax, 3,3);
$fphone2 = substr($fax, 6,4);

}

echo "
<html>
<head>
<title align = \"center\">StrawHat Theatre Information</title>
<link rel=\"stylesheet\" href=\"/styles/members.css\" type=\"text/css\">

</head>
<body>


";
?>
<!--
<script language="JavaScript" type="text/javascript">

function validateForm(theatre)
{
    if(!validateFirstname(theatre.firstname.value) )
        {
            theatre.firstname.focus();
            return false;
        }

    else if(!validateLastname(theatre.lastname.value) )
        {
            theatre.lastname.focus();
            return false;
        }
    
    else if(!validateAddress(theatre.address.value) )
        {
            theatre.address.focus();
            return false;
        }

     else if(!validateAddress(theatre.company.value) )
        {
            theatre.company.focus();
            return false;
        }   
        
    else if(!validateCity(theatre.city.value) )
        {
            theatre.city.focus();
            return false;
        }

    else if(!validateState(theatre.state.value) )
        {
            theatre.state.focus();
            return false;
        }

    else if(!validateZip(theatre.zip.value) )
        {
            theatre.zip.focus();
            return false;
        }

    else if(!validateEmail(theatre.email.value) )
        {
            theatre.email.focus();
            return false;
        }
    else if(!validatePhone(theatre.phone.value) )
        {
            theatre.phone.focus();
            return false;
        }
        
    else if(!validateLargeCity(theatre.largecity.value) )
        {
            theatre.largecity.focus();
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

function validateCompany(company)
{
    if(isBlank(company) )
        {
            alert("Enter Your Company Name please!");
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

function validatePhone(areacode)
{
    if(isBlank(areacode) )
        {
            alert("Enter Your Area Code please!");
            return false;
        }
    //if everythings okay, then
    return true;
}

function validatePhone(phone1)
{
    if(isBlank(phone1) )
        {
            alert("Enter Your Phone please!");
            return false;
        }
    //if everythings okay, then
    return true;
}

function validatePhone(phone2)
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


//end JS script hide
</script> -->


<?php

/*include("banner.inc");
*/
echo "
<table align=\"center\">
  
    <tr>
";    
/*    <td align = \"center\"> 
    <FORM method=\"POST\" action= \"/TheatreEntry11/profile_change/changes.php\">
    <input type = \"hidden\" name = \"thea_uid\" value = \"$thea_uid\">
    <INPUT type=\"submit\" value =\"Back to Change Theatre Application Menu\">
    </FORM>    
    </td>
*/
 echo "   
    <td align = \"center\">
    <FORM method=\"\" action=\"/index.php\">
    <input type=\"submit\" value=\"Back to Home Page\" name=\"endentry\">
    </FORM>
    </td>
    </tr>    
</table>
";




echo "
<h2 align = \"center\">Theatre Information for $company:</h2>
<FORM name=\"theatre\" ONSUBMIT=\"return validateForm(theatre)\" method=\"POST\" action=\"thea_modifyrecord3.php\">
<input type = \"hidden\" name = \"thea_uid\" value = \"$thea_uid\">

  <table width=\"72%\" border=\"0\" align=\"center\">

    <tr> 
      <td width=\"49%\">
      
      <b>Theatre Representative</b><br>
      <b>First Name: </b>$firstname
        <br>
        <b>Middle: </b>$middle       
        <br>
        <b>Last Name:</b> $lastname 
        
        <br><b>Fax: </b>$fareacode - $fphone1 - $phone2        
      </td>
      
      <!--
      <td colspan=\"2\" width=\"51%\">
      -->
      <td>  
        <b>Theatre:</b> $company
        <br>
        <b>Address:</b> $address
        <br>
        <b>City:</b> $city
        <br>
        <b>State</b>: $state        
        <br>
        <b>Zip:</b> $zip
        
        </td>
    </tr>
    
    <tr> 
      <td width=\"49%\">
      <b>Phone:</b> $areacode - $phone1 - $phone2 
      </td>
      
      <td width=\"51%\"><b>Nearest Largest City (if not already shown): $largecity
      </td>
    </tr>
    
    <tr> 
      <td width=\"49%\"><b>Email:</b> $email 
      </td>
        
      <td colspan=\"3\" width=\"51%\"><b>Region:</b> $region 
        ";

      
          
      
          
echo "
          
      </td>
    </tr>
    <tr> 
      <td width=\"55%\"> 
        <div align=\"left\"><b>Website 1:</b> $url 
          
          <br>
          Website 2:</b> $url2 
          
          </div>
      </td>
      <td>
       
        <div align=\"left\">&lt;== Your website address is limited to 65 characters. If you have any problems, let us know at info@strawhat-auditions.com</div>
                  
      </td>
    </tr>
</table>
";
?>

<!--
<P align = "center"><b>New York City Schedule (Subject to Modification)</b></p>
<div align="center">
  <table width="54%" border="1" cellpadding="1">
    <tr> 
      <td width="28%"><b>2013 Dates</b> </td>
      <td width="43%"> 
        <div align="center"><b>Auditions</b></div>
      </td>
      <td width="29%">Dance Call</td>
    </tr>
    <tr> 
      <td width="28%">Saturday, Feb 16</td>
      <td width="43%">10:00 - 1:00 pm AND 2:00 - 6:00 pm</td>
      <td width="29%">7:00 - 8:30 pm</td>
    </tr>
    <tr> 
      <td width="28%">Sunday, Feb 17</td>
      <td width="43%">10:00 - 1:00 pm AND 2:00 - 6:00 pm</td>
      <td width="29%">7:00 - 8:30 pm</td>
    </tr>
    <tr> 
      <td width="28%">Monday Feb 18</td>
      <td width="43%">10:00 - 1:00 pm AND 3:00 - 6:00 pm</td>
      <td width="29%">7:00 - 8:30 pm</td>
    </tr>
    <tr> 
      <td colspan="3"> 
        <div align="center"><i>Monday Feb 18: Dancers Who Sing Call: 2:00 - 3:00 
          pm</i></div>
      </td>
    </tr>
  </table>
</div>
-->
<?php
echo "
<BR>

 <table width=\"60%\" border=\"1\" align=\"center\">
<tr>
 <td>Are you casting non-musical performers this year?</td>
<td>

<select name=\"nonmusical\" size=\"1\">
        ";        
        
        if($nonmusical == "Y") {
          echo "
          <option value=\"Y\" selected>Yes</option> "; }
        else {echo "
          <option value = \"Y\">Yes</option>";}
      
      if($nonmusical == "N") {
          echo "
          <option value = \"N\" selected>No</option>"; }
        else {echo "
          <option value = \"N\">No</option>";}
      
      if($nonmusical == "C") {
          echo "
          <option value = \"C\" selected>Not Certain</option>"; }
        else {echo "
          <option value = \"C\">Not Certain</option>";}
echo "
          
        </select>
</td>
</tr> 
 
<tr> 
<td>Are you casting Dancers this season?</td>
<td>

<select name=\"dancers\" size=\"1\">
        ";        
        
        if($dancers == "Y") {
          echo "
          <option value=\"Y\" selected>Yes</option> "; }
        else {echo "
          <option value = \"Y\">Yes</option>";}
      
      if($dancers == "N") {
          echo "
          <option value = \"N\" selected>No</option>"; }
      else {echo "
          <option value = \"N\">No</option>";}
          
      if($dancers == "C") {
          echo "
          <option value = \"C\" selected>Not Certain</option>"; }
      else {echo "
          <option value = \"C\">Not Certain</option>";}    
          
echo "
          
        </select>

</td>
</tr>

<tr>
<td>If you will not attend all 3 days, which days will you be present?</td>

<td>  
";
    if(!empty($sat) ) {
          echo "<input type=\"checkbox\" name=\"sat\" value=\"sat\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"sat\" value=\"sat\">";}    
        
echo "
        Saturday    
";

if(!empty($sun) ) {
          echo "<input type=\"checkbox\" name=\"sun\" value=\"sun\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"sun\" value=\"sun\">";}    
        
echo "
        Sunday    
";

if(!empty($mon) ) {
          echo "<input type=\"checkbox\" name=\"mon\" value=\"mon\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"mon\" value=\"mon\">";}    
        
echo "
        Monday    
";


echo "
</td>
</tr>
</table>

<h2 align = \"center\">Representatives who will attend StrawHat: (List up to 5 Reps)</h2>    
<!-- table for reps -->   
    <table width=\"65%\" border=\"1\" align=\"center\">
    <tr>
   <td><b>Name</b></td>       
   <td><b>Title</b></td>
   </tr> 
    
   <tr>     
   <td><input type=\"text\" name=\"rep1\" maxlength=\"50\" size=\"50\" value=\"$rep1\"></td>
   <td><input type=\"text\" name=\"title1\" maxlength=\"50\" size=\"50\" value=\"$title1\"></td> 
   </tr>      
   
   <tr>
   <td><input type=\"text\" name=\"rep2\" maxlength=\"50\" size=\"50\" value=\"$rep2\"></td>
   <td><input type=\"text\" name=\"title2\" maxlength=\"50\" size=\"50\" value=\"$title2\"></td> 
   </tr>       
   
   <tr>
   <td><input type=\"text\" name=\"rep3\" maxlength=\"50\" size=\"50\" value=\"$rep3\"></td>
   <td><input type=\"text\" name=\"title3\" maxlength=\"50\" size=\"50\" value=\"$title3\"></td> 
   </tr>
   
   <tr>
   <td><input type=\"text\" name=\"rep4\" maxlength=\"50\" size=\"50\" value=\"$rep4\"></td>
   <td><input type=\"text\" name=\"title4\" maxlength=\"50\" size=\"50\" value=\"$title4\"></td> 
   </tr>
   
   <tr>
   <td><input type=\"text\" name=\"rep5\" maxlength=\"50\" size=\"50\" value=\"$rep5\"></td>
   <td><input type=\"text\" name=\"title5\" maxlength=\"50\" size=\"50\" value=\"$title5\"></td> 
   </tr>
    
  </table>

</form>

</body>
</html>
";

?>