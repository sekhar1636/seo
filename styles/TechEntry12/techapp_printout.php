<?php
//techapp_printout.php
$print_uid = $_POST['print_uid'];

include("../Comm/connect.inc");


$sql = "SELECT *
FROM techies11, techroles11, techapp11, techpwd11
WHERE techies11.tech_uid = \"$print_uid\"
and techies11.tech_uid = techroles11.techroles_uid
and techroles11.techroles_uid = techapp11.techapp_uid
and techapp11.techapp_uid = techpwd11.pass_uid
";



//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


if (!$sql_result) {
	echo "<P>Couldn't get record!</P>";
	exit;
	} else {
	

//fetch row and assign to variables
//techies table
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

//techapp table
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

//Dates Available
$availfor = $row["availfor"];
$availto = $row["availto"];


//techpwd password table
$username = $row["username"];
$pass = $row["pass"];

//techie roles
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

//addtional references added 1/1/08!!
$ref1 = $row["ref1"];
$ref2 = $row["ref2"];
$ref3 = $row["ref3"];

$co1 = $row["co1"];
$co2 = $row["co2"];
$co3 = $row["co3"];

$tel1 = $row["tel1"];
$tel2 = $row["tel2"];
$tel3 = $row["tel3"];

$email1 = $row["email1"];
$email2 = $row["email2"];
$email3 = $row["email3"];



//using stripslashes
//techapp table
$under21 = stripslashes(trim($under21));
$salary = stripslashes(trim($salary));

//techies table
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

//PARSING PHONES: proftel, tel1, tel2, tel3
//parse contact phone
//areacode
$p_areacode = substr($phone, 0, 3);
//prefix
$p_phone1 = substr($phone, 3, 3);
//last 4 numbers
$p_phone2 = substr($phone, 6, 4);




//tech parse proftel
//get area code
$areacode = substr($proftel, 0, 3);
//prefix
$phone1 = substr($proftel, 3, 3);
//last 4 numbers
$phone2 = substr($proftel, 6, 4);

//parse reference phone 1/1/08
$areacodea = substr($tel1, 0, 3);
//prefix
$phone1a = substr($tel1, 3, 3);
//last 4 numbers
$phone1b = substr($tel1, 6, 4);

$areacodeb = substr($tel2, 0, 3);
//prefix
$phone2a = substr($tel2, 3, 3);
//last 4 numbers
$phone2b = substr($tel2, 6, 4);

$areacodec = substr($tel3, 0, 3);
//prefix
$phone3a = substr($tel3, 3, 3);
//last 4 numbers
$phone3b = substr($tel3, 6, 4);



//tech stripslashes
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
//added 1/1/08
$ref1 = htmlspecialchars(stripslashes($ref1));
$ref2 = htmlspecialchars(stripslashes($ref2));
$ref3 = htmlspecialchars(stripslashes($ref3));

$co1 = htmlspecialchars(stripslashes($co1));
$co2 = htmlspecialchars(stripslashes($co2));
$co3 = htmlspecialchars(stripslashes($co3));

$tel1 = htmlspecialchars(stripslashes($tel1));
$tel2 = htmlspecialchars(stripslashes($tel2));
$tel3 = htmlspecialchars(stripslashes($tel3));

$email1 = htmlspecialchars(stripslashes($email1));
$email2 = htmlspecialchars(stripslashes($email2));
$email3 = htmlspecialchars(stripslashes($email3));

/*new table code*/
/*START ECHO OF TECH PRINTOUT*/
echo "
<html>
<head>
<title>StrawHat Staff Tech Design Printout 2011</title>
<link rel=\"stylesheet\" href=\"printout.css\" type=\"text/css\">
</head>
<body>
";
include("banner.inc");

echo "



<table width=\"90%\" border=\"0\" align = \"center\">
	<tr>
	<td align = \"center\" colspan = \"2\"> 
	<FORM method=\"POST\" action= \"/TechEntry11/profile_change/changes.php\">
	<input type = \"hidden\" name = \"tech_uid\" value = \"$tech_uid\">
	<INPUT type=\"submit\" value =\"Back to Application\">
	</FORM>	
	</td>
	
	<td align = \"center\">
	<FORM method=\"\" action=\"/index.php\">
	<input type=\"submit\" value=\"Finished with Application\" name=\"endentry\">
	</form>
	</td>
	
	
	</tr>	
</table>
";

$today = date("m.d.y");
echo "
<p class=\"title\" align=\"center\"><b>Printout of Staff Tech Design</b>  <BR>Today's Date: $today.&nbsp &nbsp
  Username: $username&nbsp&nbsp&nbsp ID Number: ($print_uid)
  </P>
  
<table width=\"90%\" border=\"0\" align = \"center\">
    <tr> 
      <td><b>Name:</b> $firstname $midname $lastname</td>
      <td><b>Email:</b> $email</td>
    <tr>
    
    <tr>
      <td><b>Address:</b> $address</td>
      <td><b>Phone:</b> ($h_or_serv) $p_areacode-$p_phone1-$p_phone2 </td>
	</tr>  
      
      
";

echo "
	<tr>
	<td><b>City:</b> $city</td>
	<td><b>Nearest Large City:</b>
";

	if ($largecity == "NA") {
	echo "Large City Shown<td><b>Region:</b>";		
	}
	else echo"
      
      $largecity</td>
</tr>

<tr>
	<td><b>State:</b> $state&nbsp; &nbsp; <b>Zip</b>: $zip</td>     


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
		case $region == "S":
			echo "South";
			break;
		case $region == "SE":
			echo "Southeast";
			break;
		case $region == "SW":
			echo "Southwest";
			break;
  	}
echo "  			  
	  
	  </td>
	 </tr>

      
      <tr> 
      	<td><b>Website 1:</b> $url1</td>
      	<td><b>Website 2:</b> $url2</td>
    </tr>
  </table>
<BR>
";  
  
//tech application  
echo " 
<table width=\"90%\" border=\"0\" align = \"center\">
    	
    <tr>
    	<td>
    	<b>Primary Position:</b> $job1
    	</td>
    	
    	<td><b>Secondary Position:</b> $job2
    	</td>
    </tr>
    
    <tr>
    	
    	<td><b>Other Position: </b>
		";
		
if (empty($other)) {
		echo "NA</td>"; }
else {
		echo "$other</td>";
}
	echo "
	<td>
	<b>Job In?</b> ";
		
		if($jobin == "Y") {
			echo "Yes";
		}
		else {echo "No";
		}


echo "
    	
    	<b>Salary:</b> $salary
</td>
    </tr>
";



//parse availto, availfrom dates

/*Parse availfor*/
$mo = substr($availfor, 5,2);
$day = substr($availfor, 8,2);
$year = substr($availfor, 0, 4);


echo "

	<tr>
		<td colspan=\"2\">
			<b>Available from:</b> $mo-$day-$year;			
			to
";

/*Parse availTO*/
$mo = substr($availto, 5,2);
$day = substr($availto, 8,2);
$year = substr($availto, 0, 4);

echo "$mo-$day-$year

	</td>
	</tr>


    <tr>
    	<td><b>Age if under 21:</b>
";
    	
	if ($under21 == 0) {
	    echo "NA";}
	else {		
	    echo "$under21";}	    	
    	
echo "
    	</td>
 		<td></td>   
    	</tr>
    
    <tr>
    	<td colspan = \"2\">
    	<BR>	
    	<b>Areas of significant experience:</b> 
";
	if(!empty($accomp) ) {        
        echo "Accompanist, ";}
    if(!empty($admin) ) {        
        echo "Administration, ";}
	if(!empty($boxoffice) ) {        
        echo "Box Office, ";}
	if(!empty($carp) ) {        
        echo "Carpentry, ";}
	if(!empty($choreo) ) {        
        echo "Choreography, ";}
	    if(!empty($company) ) {        
        echo "Company Management, ";}	    	
	if(!empty($costume) ) {        
        echo "Costume Design, ";}
	    if(!empty($direct) ) {        
        echo "Director, ";}	
	if(!empty($elec) ) {        
        echo "Electrics, ";}	
    if(!empty($graphics) ) {        
        echo "Graphics, ";}	
    if(!empty($house) ) {        
        echo "House Management, ";}	
    if(!empty($lights) ) {        
        echo "Lighting Design, ";}	
    if(!empty($music) ) {        
        echo "Music Director, ";}	
    if(!empty($photo) ) {        
        echo "Photography, ";}	
    if(!empty($props) ) {        
        echo "Props, ";}	
    if(!empty($pr) ) {        
        echo "Publicity, ";}	
    if(!empty($runcrew) ) {        
        echo "Running Crew, ";}	
    if(!empty($scenic) ) {        
        echo "Scenic Artist, ";}	
    if(!empty($setdesign) ) {        
        echo "Set Design, ";}
	if(!empty($sew) ) {        
        echo "Sewing/Wardrobe, ";}
    if(!empty($sound) ) {        
        echo "Sound, ";}	
    if(!empty($stagem) ) {        
        echo "Stage Management, ";}	
	if(!empty($td) ) {        
        echo "Technical Director, ";}
	if(!empty($video) ) {        
        echo "Video";}	
        			

    	
echo "    	
    	</td>
    </tr>
    	
</table>
";

/***WORK HISTORY***/
echo "
  <table width=\"90%\" border=\"0\" align=\"center\">
    <tr> 
      <th align=\"left\">Shows</th>
      <th align=\"left\">Roles</th>
      <th align=\"left\">Theatre</th>
      <th align=\"left\">Director</th>
    </tr>
    <tr> 
      <td>$show1</td>
      <td>$role1</td>
      <td>$thea1</td>
      <td>$dir1</td>
      
    </tr>
	
    <tr> 
      <td>$show2</td>
      <td>$role2</td>
      <td>$thea2</td>
        <td>$dir2</td>
    </tr>
	
    <tr> 
      <td>$show3</td>
      <td>$role3</td>
      <td>$thea3</td>
        <td>$dir3</td>
    </tr>
	
    <tr> 
      <td>$show4</td>
      <td>$role4</td>
      <td>$thea4</td>
        <td>$dir4</td>
    </tr>

	<tr> 
      <td>$show5</td>
      <td>$role5</td>
      <td>$thea5</td>
        <td>$dir5</td>
    </tr>  
    <tr>
    
    <tr> 
      <td>$show6</td>
      <td>$role6</td>
      <td>$thea6</td>
        <td>$dir6</td>
    </tr>  
    <tr>
    
    <tr> 
      <td>$show7</td>
      <td>$role7</td>
      <td>$thea7</td>
        <td>$dir7</td>
    </tr>  
    <tr>
    
    <tr> 
      <td>$show8</td>
      <td>$role8</td>
      <td>$thea8</td>
        <td>$dir8</td>
    </tr>  
    <tr>
    
    <tr> 
      <td>$show9</td>
      <td>$role9</td>
      <td>$thea9</td>
        <td>$dir9</td>
    </tr>  
    <tr>
    
    <tr> 
      <td>$show10</td>
      <td>$role10</td>
      <td>$thea10</td>
        <td>$dir10</td>
    </tr>  
    
    <tr>   
    <td>
    <b>School:</b> $school
    </td>
    <td>
    <b>Prof:</b> $prof
    </td>
    <td>
    <b>Tel:</b> $areacode-$phone1-$phone2
    </td>
    <td>
    <b>Email:</b> $profemail
    </td>
    </tr>
    
    <tr>   
    <td>
    <b>Name:</b> $ref1
    </td>
    <td>
    <b>Position:</b> $co1
    </td>
    <td>
    <b>Tel:</b> $areacodea-$phone1a-$phone1b
    </td>
    <td>
    <b>Email:</b> $email1
    </td>
    </tr>
    
    
    <tr>   
    <td>
    <b>Name:</b> $ref2
    </td>
    <td>
    <b>Position:</b> $co2
    </td>
    <td>
    <b>Tel:</b> $areacodeb-$phone2a-$phone2b
    </td>
    <td>
    <b>Email:</b> $email2
    </td>
    </tr>
    
    
    <tr>   
    <td>
    <b>Name:</b> $ref3
    </td>
    <td>
    <b>Position:</b> $co3
    </td>
    <td>
    <b>Tel:</b> $areacodec-$phone3a-$phone3b
    </td>
    <td>
    <b>Email:</b> $email3
    </td>
    </tr>

  </table>
  <BR>

<table width=\"90%\" border=\"0\" align = \"center\">
  <tr> 
    <td colspan=\"2\" class=\"finep\">I certify that I have read the accompanying instructions fully and that 
    the information in this application is truthfull and correct. I understand that StrawHat 
    Auditions is not to be held responsible for any errors of omissions in the publication or 
    reproduction of the materials I have supplied, nor are they liable for any damages arising 
    out of or connected to the use or inability to use their web site, www.strawhat-auditions.com. 
    I understand that StrawHat Auditions is not a licensed booking agent or manager, nor is it 
    engaged in any way in the operation of a talent or employement agency. I do not expect Strawhat 
    to obtain employment for me, but only to make the physical arrangements to facilitate meeting potential theatrical employers. 	Any employment related transactions are solely 
    between me and a theatrical employer with no commission or management fee due or payable to 
    Strawhat Auditions.<BR>
    <BR>
    Date: _________________Acknowledged by______________________________________________</td>
  </tr>
</table>
  
  

</body>
";
}