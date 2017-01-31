<?php
$thea_uid = $_POST['thea_uid'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$midname = $_POST['midname'];
$date_entered = $_POST['date_entered'];
$company = $_POST['company'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$largecity = $_POST['largecity'];
$region = $_POST['region'];
$areacode = $_POST['areacode'];
$phone1 = $_POST['phone1'];
$phone2 = $_POST['phone2'];
$h_or_serv = $_POST['h_or_serv'];
$email = $_POST['email'];
$url1 = $_POST['url1'];
$url2 = $_POST['url2'];
$phone = $_POST['phone'];
$fax = $_POST['fax'];
$fareacode = $_POST['fareacode'];
$fphone1 = $_POST['fphone1'];
$fphone2 = $_POST['fphone2'];
$url1 = $_POST['url1'];
$url2 = $_POST['url2'];
$rep1 = $_POST['rep1'];
$rep2 = $_POST['rep2'];
$rep3 = $_POST['rep3'];
$rep4 = $_POST['rep4'];
$rep5 = $_POST['rep5'];
$title1 = $_POST['title1'];
$title2 = $_POST['title2'];
$title3 = $_POST['title3'];
$title4 = $_POST['title4'];
$title5 = $_POST['title5'];
$nonmusical = $_POST['nonmusical'];
$dancers = $_POST['dancers'];


//now 2017
$fri =  $_POST['fri'];
$sat =  $_POST['sat'];
$sun =  $_POST['sun'];

$web_only =  $_POST['web_only'];

//11/18/15 add vid_submission, where_submit_
$vid_submission =  $_POST['vid_submission'];
$where_submit = $_POST['where_submit']; 
$emc_points = $_POST['emc_points']; 

if (!$thea_uid) {
	echo("Can't see thea_uid");
	exit;
	}

	

//check for duplicate names - how to do without checking your existing name as duplicate?	

include("../../Comm/connect.inc");

//format strings to correct case
//1/16/07 take out, have to modify further
//$firstname = ucfirst(strtolower($firstname));
//$lastname = ucfirst(strtolower($lastname));
//$midname = ucfirst(strtolower($midname));
//$address = ucwords(strtolower($address));
//$city = ucwords(strtolower($city));
//$state = strtoupper($state);
//$email = strtolower($email);
//$largecity = ucwords(strtolower($largecity));



//parse phone
$phone = $areacode . $phone1 . $phone2;

//parse fax
$fax = $fareacode . $fphone1 . $fphone2;


//add variables to show actual data entry on confirmation
//system on remote uses stripslashes differently than local
$vcompany = stripslashes($company);
$vlastname = stripslashes($lastname);
$vfirstname = stripslashes($firstname);
$vmidname = stripslashes($midname);
$vaddress = stripslashes($address);
$vcity = stripslashes($city);
$vstate = stripslashes($state);
$vzip = stripslashes($zip);
$vphone = stripslashes($phone);
$vemail = stripslashes($email);
$vlargecity = stripslashes($largecity);
$vurl1 = stripslashes($url1);
$vurl2 = stripslashes($url2);



//trim and addslashes for data insert
$company = addslashes(trim($company));
$lastname = addslashes(trim($lastname));
$firstname = addslashes(trim($firstname));
$midname = addslashes(trim($midname));
$address = addslashes(trim($address ));
$city = addslashes(trim($city));
$state = addslashes(trim($state));
$zip = addslashes(trim($zip));
$phone = addslashes(trim($phone));
$email = addslashes(trim($email));
$largecity = addslashes(trim($largecity));
$url1 = addslashes(trim($url1));
$url2 = addslashes(trim($url2));
//$rep1 = htmlspecialchars(stripslashes($rep1));
//$title1 = htmlspecialchars(stripslashes($title1));

//SQL statement to update record



$sql = "UPDATE theatre11 SET thea_uid = \"$thea_uid\",
company=\"$company\",
lastname=\"$lastname\",
firstname=\"$firstname\",
midname=\"$midname\",
address=\"$address\",
city=\"$city\",
state=\"$state\",
zip=\"$zip\",
region=\"$region\",
phone=\"$phone\",
fax=\"$fax\",
email=\"$email\",
largecity=\"$largecity\",
h_or_serv=\"$h_or_serv\",
url1=\"$url1\",
url2=\"$url2\",
rep1=\"$rep1\",
rep2=\"$rep2\",
rep3=\"$rep3\",
rep4=\"$rep4\",
rep5=\"$rep5\",
title1=\"$title1\",
title2=\"$title2\",
title3=\"$title3\",
title4=\"$title4\",
title5=\"$title5\",
nonmusical=\"$nonmusical\",
dancers=\"$dancers\",
fri=\"$fri\",
sat=\"$sat\",
sun=\"$sun\",
web_only=\"$web_only\",
vid_submission=\"$vid_submission\",
emc_points=\"$emc_points\",
where_submit=\"$where_submit\"


WHERE thea_uid = \"$thea_uid\"
 ";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute Update Theatre Modification (modrecord 3 query).");

if (!$sql_result) {
	echo "<P>Couldn't get record!</P>";
	} else {

//strip slashes for confirmation view

echo "

<HTML>



<HEAD>

<TITLE>Strawhat Updated Theatre Representative Information</TITLE>
<link rel=\"stylesheet\" href=\"theatre.css\" type=\"text/css\">
</HEAD>
<BODY>
";

include("banner.inc");	

echo "	
<h2 align= 'center'>You have made these changes:</h2>
<FORM method = \"POST\" action = \"changes.php\">
<input type = \"hidden\" name = \"thea_uid\" value = \"$thea_uid\">

<table width=\"70%\" border=\"1\" align = \"center\">
    <tr> 
      <td><b>Name: </b> $vfirstname $vmidname $vlastname</td>
      <td><b>Company: </b>$vcompany</td> 
      <td><b>Address:</b></td>
      
      
    </tr>
    <tr> 

      <td><b>Email:</b> $vemail</td>
      <td><b>Phone (office/home/cell):</b> <BR>($h_or_serv) $areacode-$phone1-$phone2<br> 
      
      
      <b>Fax:</b> ($fareacode)-$fphone1-$fphone2
      </td>
      
      <td>
      $vaddress<BR>
      $vcity, $vstate, $vzip
      </td>
      
    </tr>

	<tr>
      <td><b>Nearest Large City:</b>
";

	if ($largecity == "NA") {
	echo "NA<td><b>Region:</b>";		
	}
	else echo"
      $vlargecity</td>
      <td><b>Region:</b> 

";      

  	switch ($region) {
  		case $region == "MW":
			echo "Midwest";
			break;
		case $region == "NE":
			echo "Northeast";
			break;
		case $region == "NW":
			echo "Northwest";
			break;
		case $region == "MA":
            echo "Mid-Atlantic";
            break;        
        case $region == "S":
			echo "South";
			break;
		case $region == "SE":
			echo "Southeast";
			break;
		case $region == "SW":
			echo "Southwest";
			break;
		case $region == "W":
			echo "West";
			break;       
  	}

  		

echo "  		   

      </td>

      

       <td><b>Website 1:</b> $vurl1<BR><b>Website 2:</b> $vurl2</td>

       

    </tr>

  </table>
  
  <BR>
  
<table width=\"70%\" border=\"1\" align=\"center\">
<tr>
 <td>Are you casting non-musical performers this year?</td>

 <td>

";        
        
        if($nonmusical == "Y") {
          echo "Yes"; }
      
      if($nonmusical == "N") {
          echo "No"; }
      
      if($nonmusical == "C") {
          echo "Not Certain"; }
echo"    
       
</td>
</tr> 
 
<tr> 
<td>Are you casting Dancers this season?</td>
<td>

";        
        
      if($dancers == "Y") {
          echo "Yes"; }
      
      if($dancers == "N") {
          echo "No";}
                    
      if($dancers == "C") {
          echo "Not Certain";}
          
echo "
          
 
</td>
</tr>

<tr>
<td>Which days will you be present?</td>

<td>  
";
    if(!empty($fri) ) {
          echo "Friday, "; }        

    if(!empty($sat) ) {
          echo "Saturday, "; }

if(!empty($sun) ) {
          echo "Sunday"; }

 if(!empty($web_only) ) {
          echo " Web Only"; }
         
          
echo "
</td>

<tr>
<td>Do you accept video submisions?
</td>

<td>
";
    if($vid_submission == 'Y') {
          echo "Yes"; }        

    if($vid_submission == 'N') {
          echo "No"; }        

    if($vid_submission == 'M') {
          echo "Maybe"; }        

echo "
</td>
</tr>

<tr>
<td>Where should submissions be sent?
</td>

<td>"; 

    if($where_submit) {
          echo "$where_submit"; }        
                    
echo "
</td>
</tr>

<tr>
<td>Do you offer EMC Points?
</td>

<td>
"; 

    if($emc_points == 'Y') {
          echo "Yes"; }        

    if($emc_points == 'N') {
          echo "No"; }        


echo "
</table>

<h2 align=\"center\">Representatives who will attend StrawHat: (List up to 5 Reps)</h2>    
<!-- table for reps -->   
    <table width=\"70%\" border=\"1\" align=\"center\">
    <tr>
   <td><b>Name</b></td>       
   <td><b>Title</b></td>
   </tr> 
";
    if($rep1){
    echo"
   <tr>     
   <td>$rep1</td>
   <td>$title1</td> 
   </tr>      
   ";
    }

    if($rep2){
    echo"   
   <tr>
   <td>$rep2</td>
   <td>$title2</td> 
   </tr>
   ";
    }

    if($rep3){
    echo"   
   <tr>
   <td>$rep3</td>
   <td>$title3</td> 
   </tr>
   ";
    }

    if($rep4){
    echo"      
   <tr>
   <td>$rep4</td>
   <td>$title4</td> 
   </tr>
   ";
    }
   
    if($rep5){
    echo"         
   <tr>
   <td>$rep5</td>
   <td>$title5</td> 
   </tr>
   ";
    }
   
echo "
</table>            
    

<p align = \"center\"><INPUT type=\"submit\" value =\"Done\">  </p>

</FORM>
</BODY>
</HTML>
";
}

?>