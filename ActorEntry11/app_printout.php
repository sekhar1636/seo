<?php
//Actor app_printout.php
$print_uid = $_POST['print_uid'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$midname = $_POST['midname'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$date_entered = $_POST['date_entered'];
$region = $_POST['region'];
$phone = $_POST['phone'];
$h_or_serv = $_POST['h_or_serv'];
$email = $_POST['email'];
$largecity = $_POST['largecity'];
$pix_link = $_POST['pix_link'];
$resume_link = $_POST['resume_link'];
$url1 = $_POST['url1'];
$url2 = $_POST['url2'];

//password table
$username = $_POST['username'];
$pass = $_POST['pass'];

//audition table
$audition_2yr = $_POST['audition_2yr'];
$audition_lyr = $_POST['audition_lyr'];
$ever = $_POST['ever'];
$stock_lyr = $_POST['stock_lyr'];
$stock_lyrwhere = $_POST['stock_lyrwhere'];
$apply_lyr = $_POST['apply_lyr'];
$apprentice = $_POST['apprentice'];
$intern = $_POST['intern'];
$songThursMorn = $_POST['songThursMorn'];
$songThursAft = $_POST['songThursAft'];
$songFriMorn = $_POST['songFriMorn'];
$songFriAft = $_POST['songFriAft'];
$songSatMorn = $_POST['songSatMorn'];
$songSatAft = $_POST['songSatAft'];
$standby = $_POST['standby'];
$mononly = $_POST['mononly'];
$availfor = $_POST['availfor'];
$availto = $_POST['availto'];
$u_sag = $_POST['u_sag'];
$u_aftra = $_POST['u_aftra'];
$u_agva = $_POST['u_agva'];
$u_emc = $_POST['u_emc'];
$u_agma = $_POST['u_agma'];

//physical
//11/3/07 changed to ht, wt fields
$gender = $_POST['gender'];
$ht = $_POST['ht'];
$wt = $_POST['wt'];
$hair = $_POST['hair'];
$age_range = $_POST['age_range'];
$eye = $_POST['eye'];
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
//skills
$vocal = $_POST['vocal'];
$ballet = $_POST['ballet'];
$mus_thea = $_POST['mus_thea'];
$ballroom = $_POST['ballroom'];
$tap = $_POST['tap'];
$swing = $_POST['swing'];
$jazz = $_POST['jazz'];
$perc = $_POST['perc'];
$sax = $_POST['sax'];
$banjo = $_POST['banjo'];
$bass = $_POST['bass'];
$piano = $_POST['piano'];
$drums = $_POST['drums'];
$cello = $_POST['cello'];
$clarinet = $_POST['clarinet'];
$trombone = $_POST['trombone'];
$trumpet = $_POST['trumpet'];
$flute = $_POST['flute'];
$violin = $_POST['violin'];
$guitar = $_POST['guitar'];
//technical
$set_design = $_POST['set_design'];
$lights = $_POST['lights'];
$costume = $_POST['costume'];
$stagem = $_POST['stagem'];
$box_office = $_POST['box_office'];
$props = $_POST['props'];
//other skills
$acrobatics = $_POST['acrobatics'];
$juggling = $_POST['juggling'];
$puppetry = $_POST['puppetry'];
$asl = $_POST['asl'];
$painting = $_POST['painting'];
$combat = $_POST['combat'];
//11/3/07 added shakespeare, cabararet, mime, standup, improv
$shakes = $_POST['shakes'];
$cabaret = $_POST['cabaret'];
$improv = $_POST['improv'];
$mime = $_POST['mime'];
$standup = $_POST['standup'];



//roles
$show1 = $_POST['show1'];
$show2 = $_POST['show2'];
$show3 = $_POST['show3'];
$show4 = $_POST['show4'];
$show5 = $_POST['show5'];
$show6 = $_POST['show6'];
$show7 = $_POST['show7'];
$show8 = $_POST['show8'];
$show9 = $_POST['show9'];
$show10 = $_POST['show10'];

$role1 = $_POST['role1'];
$role2 = $_POST['role2'];
$role3 = $_POST['role3'];
$role4 = $_POST['role4'];
$role5 = $_POST['role5'];
$role6 = $_POST['role6'];
$role7 = $_POST['role7'];
$role8 = $_POST['role8'];
$role9 = $_POST['role9'];
$role10 = $_POST['role10'];

$thea1 = $_POST['thea1'];
$thea2 = $_POST['thea2'];
$thea3 = $_POST['thea3'];
$thea4 = $_POST['thea4'];
$thea5 = $_POST['thea5'];
$thea6 = $_POST['thea6'];
$thea7 = $_POST['thea7'];
$thea8 = $_POST['thea8'];
$thea9 = $_POST['thea9'];
$thea10 = $_POST['thea10'];

$dir1 = $_POST['dir1'];
$dir2 = $_POST['dir2'];
$dir3 = $_POST['dir3'];
$dir4 = $_POST['dir4'];
$dir5 = $_POST['dir5'];
$dir6 = $_POST['dir6'];
$dir7 = $_POST['dir7'];
$dir8 = $_POST['dir8'];
$dir9 = $_POST['dir9'];
$dir10 = $_POST['dir10'];

$school = $_POST['school'];
$prof = $_POST['prof'];
$proftel = $_POST['proftel'];
$profemail = $_POST['profemail'];







include("../Comm/connect.inc");


$sql = "SELECT *
FROM actor11, audition11, physical11, skills11, roles11, pwd11
WHERE actor11.actor_uid = \"$print_uid\"
and actor11.actor_uid = audition11.audition_uid
and audition11.audition_uid = physical11.phys_uid
and physical11.phys_uid = skills11.skills_uid
and skills11.skills_uid = roles11.roles_uid
and roles11.roles_uid = pwd11.pass_uid
";



//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


if (!$sql_result) {
	echo "<P>Couldn't get record!</P>";
	exit;
	} else {
	

//fetch row and assign to variables
$row = mysql_fetch_array($sql_result);
//actor table
$actor_uid = $row["actor_uid"];
$lastname = $row["lastname"];
$firstname = $row["firstname"];
$midname = $row["midname"];
$address = $row["address"];
$city = $row["city"];
$state = $row["state"];
$zip = $row["zip"];
$date_entered = $row["date_entered"];
$region = $row["region"];
$phone = $row["phone"];
$h_or_serv = $row["h_or_serv"];
$email = $row["email"];
$largecity = $row["largecity"];
$pix_link = $row["pix_link"];
$resume_link = $row["resume_link"];
$url1 = $row["url1"];
$url2 = $row["url2"];

//password table
$username = $row["username"];
$pass = $row["pass"];

//audition table
$audition_2yr = $row["audition_2yr"];
$audition_lyr = $row["audition_lyr"];
$ever = $row["ever"];
$stock_lyr = $row["stock_lyr"];
$stock_lyrwhere = $row["stock_lyrwhere"];
$apply_lyr = $row["apply_lyr"];
$apprentice = $row["apprentice"];
$intern = $row["intern"];
$songThursMorn = $row["songThursMorn"];
$songThursAft = $row["songThursAft"];
$songFriMorn = $row["songFriMorn"];
$songFriAft = $row["songFriAft"];
$songSatMorn = $row["songSatMorn"];
$songSatAft = $row["songSatAft"];
$standby = $row["standby"];
$mononly = $row["mononly"];
$availfor = $row["availfor"];
$availto = $row["availto"];
$u_sag = $row["u_sag"];
$u_aftra = $row["u_aftra"];
$u_agva = $row["u_agva"];
$u_emc = $row["u_emc"];
$u_agma = $row["u_agma"];

//physical
//11/3/07 changed to ht, wt fields
$gender = $row["gender"];
$ht = $row["ht"];
$wt = $row["wt"];
$hair = $row["hair"];
$age_range = $row["age_range"];
$eye = $row["eye"];
$nativeam = $row["nativeam"];
$asian = $row["asian"];
$white = $row["white"];
$black = $row["black"];
$hispanic = $row["hispanic"];
$eeurope = $row["eeurope"];
$mideast = $row["mideast"];
$indian = $row["indian"];
$under21 = $row["under21"];
$suitdress = $row["suitdress"];
$chestbust = $row["chestbust"];
$waist = $row["waist"];
//skills
$vocal = $row["vocal"];
$ballet = $row["ballet"];
$mus_thea = $row["mus_thea"];
$ballroom = $row["ballroom"];
$tap = $row["tap"];
$swing = $row["swing"];
$jazz = $row["jazz"];
$perc = $row["perc"];
$sax = $row["sax"];
$banjo = $row["banjo"];
$bass = $row["bass"];
$piano = $row["piano"];
$drums = $row["drums"];
$cello = $row["cello"];
$clarinet = $row["clarinet"];
$trombone = $row["trombone"];
$trumpet = $row["trumpet"];
$flute = $row["flute"];
$violin = $row["violin"];
$guitar = $row["guitar"];
//technical
$set_design = $row["set_design"];
$lights = $row["lights"];
$costume = $row["costume"];
$stagem = $row["stagem"];
$box_office = $row["box_office"];
$props = $row["props"];
//other skills
$acrobatics = $row["acrobatics"];
$juggling = $row["juggling"];
$puppetry = $row["puppetry"];
$asl = $row["asl"];
$painting = $row["painting"];
$combat = $row["combat"];
//11/3/07 added shakespeare, cabararet, mime, standup, improv
$shakes = $row["shakes"];
$cabaret = $row["cabaret"];
$improv = $row["improv"];
$mime = $row["mime"];
$standup = $row["standup"];

//roles
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

//using stripslashes
$lastname = stripslashes($lastname);
$firstname = stripslashes($firstname);
$midname = stripslashes($midname);
$address = stripslashes($address);
$city = stripslashes($city);
$state = stripslashes($state);
$zip = stripslashes($zip);
$phone = stripslashes($phone);
$email = stripslashes($email);
$largecity = stripslashes($largecity);

$username = stripslashes($username);
$stock_lyrwhere = stripslashes($stock_lyrwhere);
$ever = stripslashes($ever);
$under21 = stripslashes($under21);
$suitdress = stripslashes($suitdress);
$chestbust = stripslashes($chestbust);
$waist = stripslashes($waist);

$show1 = stripslashes($show1);
$show2 = stripslashes($show2);
$show3 = stripslashes($show3);
$show4 = stripslashes($show4);
$show5 = stripslashes($show5);
$show6 = stripslashes($show6);
$show7 = stripslashes($show7);
$show8 = stripslashes($show8);
$show9 = stripslashes($show9);
$show10 = stripslashes($show10);

$role1 = stripslashes($role1);
$role2 = stripslashes($role2);
$role3 = stripslashes($role3);
$role4 = stripslashes($role4);
$role5 = stripslashes($role5);
$role6 = stripslashes($role6);
$role7 = stripslashes($role7);
$role8 = stripslashes($role8);
$role9 = stripslashes($role9);
$role10 = stripslashes($role10);

$thea1 = stripslashes($thea1);
$thea2 = stripslashes($thea2);
$thea3 = stripslashes($thea3);
$thea4 = stripslashes($thea4);
$thea5 = stripslashes($thea5);
$thea6 = stripslashes($thea6);
$thea7 = stripslashes($thea7);
$thea8 = stripslashes($thea8);
$thea9 = stripslashes($thea9);
$thea10 = stripslashes($thea10);

$dir1 = stripslashes($dir1);
$dir2 = stripslashes($dir2);
$dir3 = stripslashes($dir3);
$dir4 = stripslashes($dir4);
$dir5 = stripslashes($dir5);
$dir6 = stripslashes($dir6);
$dir7 = stripslashes($dir7);
$dir8 = stripslashes($dir8);
$dir9 = stripslashes($dir9);
$dir10 = stripslashes($dir10);

$school = stripslashes($school);
$prof = stripslashes($prof);
$proftel = stripslashes($proftel);
$profemail = stripslashes($profemail);

/*new table code*/
echo "
<html>
<head>
<title>StrawHat Application Printout</title>
<link rel=\"stylesheet\" href=\"printout.css\" type=\"text/css\">
</head>
<body>
";
include("banner.inc");

echo "

<table align=\"center\" width=\"75%\">
	<tr>
	<td align = \"center\" width = \"30%\"  rowspan = \"2\"> 
	<FORM method=\"POST\" action= \"/ActorEntry11/profile_change/changes.php\">
	<input type = \"hidden\" name = \"actor_uid\" value = \"$actor_uid\">
	<INPUT type=\"submit\" value =\"Back to Change Application Menu\">
	</FORM>	
	</td>

	
	<td align = \"center\" width = \"30%\"> 
	<FORM method=\"\" action=\"/index.php\">
	<input type=\"submit\" value=\"Leave Application (No Changes Recorded)\" name=\"endentry\">
	</form>
    </td>
	
    </tr>	
</table>
";

$today = date("m.d.y");

echo "
<table align=\"center\" width=\"75%\">
<tr>
<td>
<p class=\"title\" align=\"center\">
<b>Mail your application to: The StrawHat Auditions, 1771 Post Road East, #315, Westport, CT 06880.</b>  
<BR>Application Last Modified: $today.&nbsp &nbsp
  Username: $username &nbsp&nbsp&nbsp ID Number: ($print_uid)
  </P>
</tr>
</tr>
</table>

  
<table width=\"75%\" align=\"center\">
  <tr> 
    <th colspan=\"2\" align = \"left\">Contact and Audition Information</th>
    <th width=\"50%\" align = \"left\">Audition Preferences:</th>
  </tr>
  
  <tr> 
    <td colspan=\"2\"><u>Name</u>: $firstname $midname $lastname</td>
   ";
/* if song and monologue, show the following */ 

if($mononly == "N") {
echo "<td width=\"50%\"><u>Song and Monologue Audition</u></td>
	</tr>
  <tr> 
    <td colspan=\"2\"><u>Address</u>: $address</td>
    <td width=\"50%\"><u>Days</u>:
";
/* COMMENT: days of audition preference HOLD VALUE as Thurs, Fri, Sat regardless of actual calendar days!!! */
//parse audition days, note have to use existing field labels for table    
	if($songThursMorn){
		echo "Fri Morn, ";
	}    
    if($songThursAft){
		echo "Fri Afternoon, ";
	}
	if($songFriMorn){
		echo "Sat Morn, ";
	}
	if($songFriAft){
		echo "Sat Afternoon, ";
	}
    if($songSatMorn){
		echo "Sun Morn, ";
	}
	if($songSatAft){
		echo "Sun Afternoon";
	}
echo "    
    </td>
  </tr>
";
}

elseif ($mononly == "Y") {
echo "<td width=\"50%\"><u>Monologue Only Audition</u></td>;
	</tr>
  <tr> 
    <td colspan=\"2\"><u>Address</u>: $address</td>
    <td width=\"50%\"><u>Days</u>:
";

/* COMMENT: days of audition preference HOLD VALUE as Thurs, Fri, Sat regardless of actual calendar days!!! */
//parse audition days    
	if($songThursMorn){
		echo "Fri Morn, ";
	}    
    if($songThursAft){
		echo "Fri Afternoon, ";
	}
	if($songFriMorn){
		echo "Sat Morn, ";
	}
	if($songFriAft){
		echo "Sat Afternoon, ";
	}
    if($songSatMorn){
		echo "Sun Morn, ";
	}
	if($songSatAft){
		echo "Sun Afternoon";
	}
echo "    
    </td>
  </tr>
";
}

else {echo "<td width=\"50%\"><u>Dancers Who Sing</u></td>;
	</tr>
  <tr> 
    <td colspan=\"2\"><u>Address</u>:$address</td>
    <td width=\"50%\"><u>Days</u>: <b>Sunday Only, 1pm (teaching)</b></td>
    </tr>
";

}
    
echo "    
    
      <tr> 
    <td width=\"24%\"><u>City/State</u>: $city, $state</td>
    <td width=\"26%\"><u>Zip</u>: $zip</td>
    <td width=\"50%\"><u>Union Status:</u> $u_sag $u_aftra $u_agva $u_emc $u_agma</td>
  </tr>
  <tr> 
    <td width=\"24%\"><u>Phone:</u> ($h_or_serv)
";
//parse phone

$parsed_phone = substr($phone, 0,3) ."-" . substr($phone, 3,3) . "-" . substr($phone, 6,4 );
    
echo "    
    $parsed_phone</td>
    <td width=\"26%\"><u>Email:</u> $email</td>
    <td width=\"50%\"><u>Website 1:</u> $url1</td>
  </tr>
  <tr> 
    <td colspan=\"2\"><u>Nearest Large City</u>: $largecity</td>
    
    <td width=\"50%\"><u>Website 2:</u> $url2</td>
    
  </tr>
  <tr> 
    <td colspan=\"2\"><u>Region of the Country</u>: 
"
;
/*Parse Region*/
switch ($region) {
	case "MW":
        echo("Midwest");
        break;
    case "MA":
        echo("Mid-Atlantic");
        break;    
    case "NE":
		 echo ("Northeast");
		 break;
	default: 
        echo ("Northwest");
        break;    
    case "S":
        echo("South");
        break;
    case "SE":
		echo ("Southeast");
		break;
	case "SW":
		echo("Southwest");
		break;
	
	
	
}
 
echo "
</td>
    <td width=\"50%\">&nbsp;</td>
  </tr>
  <tr>
  	<td colspan = \"2\"><BR>
  	</td>
  </tr>
  
  
  <tr> 
    <th colspan=\"2\" align = \"left\">Did you?</th>
    <th width=\"50%\" align = \"left\">Would You Consider Accepting?</th>
  </tr>
  <tr> 
    <td colspan=\"2\"><u>Audition at StrawHat last year</u>? $audition_lyr. 2 years ago? $audition_2yr. Ever: $ever.</td>
    <td width=\"50%\"><u>An upaid apprentice position</u>?: $apprentice</td>
  </tr>
  <tr> 
    <td colspan=\"2\"><u>Apply for an audition last year</u>? $apply_lyr.</td>
    <td width=\"50%\"><u>An internship involving crew work and performing</u>? $intern.</td>
  </tr>
  <tr> 
    <td colspan=\"2\"><u>Do Summer Stock last year</u>? $stock_lyr. </td>
    <td width=\"50%\"><u>A standby appointment</u>? $standby.</td>
    
  </tr>
  <tr> 
    <td colspan=\"2\"><u>Where</u>? $stock_lyrwhere.</td>
     <td width=\"50%\"><u>Employment Availability from:</u>
";     


/*Parse availfor*/
$mo = substr($availfor, 5,2);
$day = substr($availfor, 8,2);
$year = substr($availfor, 0, 4);

echo "<b>$mo-$day-$year</b>";

echo "
<b>to</b>
";
/*Parse availTO*/
/*Parse availfor*/
$mo = substr($availto, 5,2);
$day = substr($availto, 8,2);
$year = substr($availto, 0, 4);

echo "<b>$mo-$day-$year</b>";

echo "

</td>

  
  
</table>
<BR>
<table width=\"75%\" align = \"center\">
  <tr> 
    <th colspan=\"2\" height=\"19\" align = \"left\">Physical Details</th>
    <th colspan=\"2\" height=\"19\" align = \"left\">Skills</th>
  </tr>
  <tr> 
    <td width=\"23%\"><u>Gender</u>: $gender.</td>
    <td width=\"27%\"><u>Age Range</u>:
";
/*Parse Age Range*/
switch ($age_range) {
	case "16":
		 echo ("Under 16");
		 break;
	case "20":
		 echo ("16-20");
		 break;
	case "25":
		echo ("21-25");
		break;
	case "30":
		echo("26-30");
		break;
	case "35":
		echo("31-35");
		break;
	case "40":
		echo("36-40");
		break;
	default: 
		echo ("Over 41");
		break;	
}	    
    
echo ".</td>
    <td colspan=\"2\"><u>Voice Range</u>: 
";
/*Parse Vocal Range*/
switch ($vocal) {
	case "S":
		 echo ("Soprano");
		 break;
	case "MS":
		echo ("Mezzo Soprano");
		break;
	case "A":
		echo("Alto");
		break;
	case "T":
		echo("Tenor");
		break;
	case "B":
		echo("Baritone");
		break;
	case "BR":
		echo("Bass Baritone");
		break;
	default: 
		echo ("");
		break;	
}
echo ".</td>
  </tr>
  <tr> 
    <td width=\"23%\"><u>Height</u>: 
";
/*Parse height
--11/05/07 parse to feet, inches
*/


$inches = $ht % 12;
$feet = ($ht - $inches) / 12;

echo "$feet' $inches\"";
    
echo".</td>
    <td width=\"27%\"><u>Weight</u>: 
";

echo "$wt";    
    
    echo ".</td>
    <td colspan=\"2\"><u>Dance</u>: 
";
/*------------DANCE
*/

	$arrayskills[0]=$ballet;
	$arrayskills[1]=$mus_thea;
	$arrayskills[2]=$ballroom;
	$arrayskills[3]=$tap;
	$arrayskills[4]=$swing;
	$arrayskills[5]=$jazz;

	$count=0;

	$arraynames[0]="Ballet";
	$arraynames[1]="Musical Theatre";
	$arraynames[2]="Ballroom";	
	$arraynames[3]="Tap";	
	$arraynames[4]="Swing";
	$arraynames[5]="Jazz";

//testing to see if there is any data	
	for($index=0; $index<6; $index++) {
		if($arrayskills[$index] > 0) {
			$count++;
			}
	}
//if count is zero there is no data and the row will not be echoed
	if($count>0) {

	for($index=0; $index<6; $index++) {
		if($arrayskills[$index] > 0) {
			echo $arraynames[$index];
			echo "($arrayskills[$index]) ";
			}
	
	}
}
echo "

    </td>
  </tr>
  <tr> 
    <td width=\"23%\"><u>Hair Color</u>:
";
/* parse hair */

switch ($hair) {
	case "AU":
		 echo ("Auburn");
		 break;
	case "DB":
		echo ("Dark Brown");
		break;
	case "BK":
		echo("Black");
		break;
	case "RD":
		echo("Red");
		break;
	case "BL":
		echo("Blonde");
		break;
	case "GY":
		echo("Grey");
		break;
	case "WT":
		echo("White");
		break;
	case "BD":
		echo ("No Hair");
		break;
	default: 
		echo ("Light Brown");
		break;	
}	

echo "
</td>
    <td width=\"27%\"><u>Eye Color</u>:
";
/*Parse Eye*/
switch ($eye) {
	case "BK":
		 echo ("Black");
		 break;
	case "HZ":
		echo ("Hazel");
		break;
	case "BL":
		echo("Blue");
		break;
	case "GR":
		echo("Green");
		break;
	case "BD":
		echo ("No Hair");
		break;
	default: 
		echo ("Brown");
		break;	
}	
  

echo "
</td>
    
    
    
    
    
    <td colspan=\"2\"><u>Instruments</u>: 

";    
/*------------INSTRUMENTAL
*/

	$arrayskills[0]=$banjo;
	$arrayskills[1]=$drums;
	$arrayskills[2]=$perc;
	$arrayskills[3]=$trombone;
	$arrayskills[4]=$cello;
	$arrayskills[5]=$flute;
	$arrayskills[6]=$piano;
	$arrayskills[7]=$trumpet;
	$arrayskills[8]=$clarinet;
	$arrayskills[9]=$guitar;
	$arrayskills[10]=$sax;
	$arrayskills[11]=$violin;
    $arrayskills[12]=$bass;

	$count=0;

	$arraynames[0]="Banjo";
	$arraynames[1]="Drums";
	$arraynames[2]="Percussion";	
	$arraynames[3]="Trombone";	
	$arraynames[4]="Cello";
	$arraynames[5]="Flute";
	$arraynames[6]="Piano";
	$arraynames[7]="Trumpet";
	$arraynames[8]="Clarinet";	
	$arraynames[9]="Guitar";	
	$arraynames[10]="Saxophone";
	$arraynames[11]="Violin";
    $arraynames[12]="Bass";

//testing to see if there is any data	
	for($index=0; $index<13; $index++) {
		if($arrayskills[$index] > 0) {
			$count++;
			}
	}
//if count is zero there is no data and the row will not be echoed
	if($count>0) {

	for($index=0; $index<13; $index++) {
		if($arrayskills[$index] > 0) {
			echo $arraynames[$index];
			echo "($arrayskills[$index]) ";
			}
	
	}
	}
echo "    
   
    </td>
  </tr>
  <tr> 
    <td colspan=\"2\"><u>Role Type</u>:
";
/*Parse Role Type
*/
       
	$arrayskills[0]=$nativeam;
	$arrayskills[1]=$asian;
	$arrayskills[2]=$white;
	$arrayskills[3]=$black;
	$arrayskills[4]=$hispanic;
	$arrayskills[5]=$eeurope;
	$arrayskills[6]=$mideast;
	$arrayskills[7]=$indian;
	$count=0;


	$arraynames[0]="Native American";
	$arraynames[1]="Asian";
	$arraynames[2]="White";	
	$arraynames[3]="Black";	
	$arraynames[4]="Hispanic";
	$arraynames[5]="Eastern European";
	$arraynames[6]="Middle Eastern";
	$arraynames[7]="Indian";
	

	
//testing to see if there is any data	
	for($index=0; $index<8; $index++) {
		if($arrayskills[$index] !="") {
			$count++;
			}
	}
//if count is zero there is no data and the row will not be echoed

	if($count>0) {

	for($index=0; $index<8; $index++) {
		if($arrayskills[$index] !="") {
			echo $arraynames[$index];
			echo ", ";
			}
	
	}
}	
echo "
 
    
    </td>
    <td colspan=\"2\"><u>Other Skills</u>:
";

/*------------OTHER SKILLS
include otherskills.php to include row if actor has other skills
		include("otherskills.php") - still to be tested
*/

	$arrayskills[0]=$acrobatics;
	$arrayskills[1]=$juggling;
	$arrayskills[2]=$puppetry;
	$arrayskills[3]=$asl;
	$arrayskills[4]=$painting;
	$arrayskills[5]=$combat;
	$arrayskills[6]=$shakes;
	$arrayskills[7]=$cabaret;
	$arrayskills[8]=$improv;
	$arrayskills[9]=$mime;
	$arrayskills[10]=$standup;
	$count=0;

	$arraynames[0]="Acrobatics";
	$arraynames[1]="Juggling";
	$arraynames[2]="Puppetry";	
	$arraynames[3]="ASL";	
	$arraynames[4]="Painting";
	$arraynames[5]="Combat";
	$arraynames[6]="Shakespeare";
	$arraynames[7]="Cabaret";
	$arraynames[8]="Improv";
	$arraynames[9]="Mime";
	$arraynames[10]="Standup";

//testing to see if there is any data	
	for($index=0; $index<11; $index++) {
		if($arrayskills[$index] !="") {
			$count++;
			}
	}
//if count is zero there is no data and the row will not be echoed
	if($count>0) {

	for($index=0; $index<11; $index++) {
		if($arrayskills[$index] !="") {
			echo $arraynames[$index];
			echo ", ";
			}
	
	}
	}	
echo "
    
    </td>
  </tr>
  <tr> 
    <td width=\"23%\"><u>Age if under 21</u>: $under21</td>
    <td width=\"27%\"><u>Suit/Dress Size</u>: $suitdress</td>
    <td colspan=\"2\"><u>Technical Theatre</u>:
";
    
/*------------TECHNICAL SKILLS
*/

	$arrayskills[0]=$set_design;
	$arrayskills[1]=$lights;
	$arrayskills[2]=$costume;
	$arrayskills[3]=$stagem;
	$arrayskills[4]=$box_office;
	$arrayskills[5]=$props;
	$count=0;

	$arraynames[0]="Set Construction";
	$arraynames[1]="Lighting";
	$arraynames[2]="Costuming";	
	$arraynames[3]="Stage Management";	
	$arraynames[4]="Box Office";
	$arraynames[5]="Properties";

//testing to see if there is any data	
	for($index=0; $index<6; $index++) {
		if($arrayskills[$index] > 0) {
			$count++;
			}
	}
//if count is zero there is no data and the row will not be echoed
	if($count>0) {

	for($index=0; $index<6; $index++) {
		if($arrayskills[$index] > 0) {
			echo $arraynames[$index];
			echo "($arrayskills[$index]) ";
			}
	
	}
}

echo "
        
    
    </td>
  </tr>
  <tr> 
    <td width=\"23%\"><u>Chest/Bust Size</u>: $chestbust</td>
    <td width=\"27%\"><u>Waist</u>: $waist</td>
    <td width=\"14%\">&nbsp;</td>
    <td width=\"36%\">&nbsp;</td>
  </tr>
</table>
<BR>
<table width=\"75%\" bordercolor=\"#000000\" border=\"0\" align=\"center\">
  <tr> 
    <th align = \"left\"> 
      Shows
    </th>
    <th align = \"left\"> 
      Roles
    </th>
    <th align = \"left\"> 
      Theatre
    </th>
    <th align = \"left\"> 
      Director/Other
    </th>
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
    <td>$show6</td>
    <td>$role6</td>
    <td>$thea6</td>
    <td>$dir6</td>
  </tr>
  <tr> 
    <td>$show7</td>
    <td>$role7</td>
    <td>$thea7</td>
    <td>$dir7</td>
  </tr>
  <tr> 
    <td>$show8</td>
    <td>$role8</td>
    <td>$thea8</td>
    <td>$dir8</td>
  </tr>
  <tr> 
    <td>$show9</td>
    <td>$role9</td>
    <td>$thea9</td>
    <td>$dir9</td>
  </tr>
  <tr> 
    <td>$show10</td>
    <td>$role10</td>
    <td>$thea10</td>
    <td>$dir10</td>
  </tr>
 
  <tr> 
    <td>Last Acting School: $school</td>
    <td>Prof: $prof</td>
    <td>Tel: $proftel</td>
    <td>Email: $profemail</td>
  </tr>

</table>
";
?> 
<table width="65%" border="1" align = "center">
  <tr> 
    <td colspan="2" height="50"> 
      <div align="center">
      <font face="Arial, Helvetica, sans-serif">
      <b>
      <font size="4">Checklist for complete application:<br>
        (NOTE: Please check the boxes below 
        to confirm you have everything!)</font>
        <br>
        
        <font size="5">
        <b>Checks payable to StrawHat Auditions</b>
        </font>
        </div>
    </td>
  </tr>
  
  <tr> 
    <td width="94%"><font face="Arial, Helvetica, sans-serif"><b><font size="3">One </b> 
      Copy of your 8x10 Headshot and Resume stapled back to back.</font></td>
    <td width="6%" height="22"> <font face="Arial, Helvetica, sans-serif"> 
      <input type="checkbox" name="checkbox" value="checkbox">
      </font></td>
  </tr>
  <tr> 
    <td width="94%"><font face="Arial, Helvetica, sans-serif"><b><font size="3">One </b>Application Check 
      for $40 (Please sign your check!) This fee is non-refundable.</font></td>
    <td width="6%"> <font face="Arial, Helvetica, sans-serif"> 
      <input type="checkbox" name="checkbox2" value="checkbox">
      </font></td>
  </tr>
  <tr> 
    <td width="94%"><font face="Arial, Helvetica, sans-serif"><b><font size="3">One </b>Audition Check   
      for $55 (Please sign your check!)</font></td>
    <td width="6%"> <font face="Arial, Helvetica, sans-serif"> 
      <input type="checkbox" name="checkbox3" value="checkbox">
      </font></td>
  </tr>
  <tr> 
    <td width="94%"><font face="Arial, Helvetica, sans-serif"><b><font size="3">TWO</b> Self-Addressed 
      Business Envelopes with postage (Forever Stamp recommended)</font></td>
    <td width="6%"> <font face="Arial, Helvetica, sans-serif"> 
      <input type="checkbox" name="checkbox4" value="checkbox">
      </font></td>
  </tr>
  <tr>
    <td width="94%"><font face="Arial, Helvetica, sans-serif"><font size="3"><b>Printout</b> of 
      your application. (Sign and date to show you have read the disclaimer)</font></td>
    <td width="6%"><font face="Arial, Helvetica, sans-serif">
      <input type="checkbox" name="checkbox5" value="checkbox">
      </font></td>
</tr>

<tr>
    <td width="94%"><font face="Arial, Helvetica, sans-serif"><font size="3"><b>DID YOU EMAIL</b> your headshot 
      (jpg only) and resume (pdf only)</font></td>
    <td width="6%"><font face="Arial, Helvetica, sans-serif">
      <input type="checkbox" name="checkbox5" value="checkbox">
      </font></td>  
</tr>

</table>


<?php
echo "
<BR>
  
<table width=\"70%\" align = \"center\">
  <tr> 
    <td colspan=\"2\">
    <font size = \"2\">I certify that I have read the accompanying instructions fully and that 
    the information in this application is truthful and correct. I understand that StrawHat 
    Auditions is not to be held responsible for any errors of omissions in the publication or 
    reproduction of the materials I have supplied, nor are they liable for any damages arising 
    out of or connected to the use or inability to use their web site, www.strawhat-auditions.com. 
    I understand that StrawHat Auditions is not a licensed booking agent or manager, nor is it 
    engaged in any way in the operation of a talent or employment agency. I do not expect StrawHat 
    to obtain employment for me, but only to make the physical arrangements to facilitate my 
    audition for potential theatrical employers. Any employment related transactions are solely 
    between me and a theatrical employer with no commission or management fee due or payable to 
    StrawHat Auditions.</font>
    <BR>
    <BR>
    Date: ________________________  <br><br><br>
    Acknowledged by______________________________________________</td>
    </font>
  </tr>
</table>


</body>
</html>

";
	}
?>
