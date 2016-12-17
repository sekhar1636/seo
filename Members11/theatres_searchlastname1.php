<?php
$sel_record = $_POST['sel_record'];
include("session_noNavBar.inc");

//set up banner and navbar
//include("navbar.inc");

//techie_searchlastname1.php



if (!$sel_record) {

	header("Location: http://localhost/Members11/Tech/techie_searchlastname.php");
	echo " No sel_record";
	exit;

	}

$sql_test = "SELECT * FROM techroles11
WHERE techroles_uid = \"$sel_record\"
";
	
$sql = "SELECT *
FROM techies11, techapp11, techroles11
WHERE techies11.tech_uid = \"$sel_record\"
AND techies11.tech_uid = techapp11.techapp_uid
AND techapp11.techapp_uid = techroles11.techroles_uid
";

include("../../Comm/connect.inc");


//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query: $sel_record.");

if (!$sql_result) {
	echo "<P>Couldn't get record!</P>";
	} else {


//fetch row and assign to variables

$row = mysql_fetch_array($sql_result);
//techies
$tech_uid = $row["tech_uid"];
$lastname = htmlspecialchars(stripslashes($row["lastname"]));
$firstname = htmlspecialchars(stripslashes($row["firstname"]));
$midname = htmlspecialchars(stripslashes($row["midname"]));
$region = $row["region"];
$phone = htmlspecialchars(stripslashes($row["phone"]));
$email = htmlspecialchars(stripslashes($row["email"]));
$large_city = stripslashes($row["largecity"]);
$h_or_serv = $row["h_or_serv"];
$resume_link = $row["resume_link"];
$url1 = htmlspecialchars(stripslashes($row["url1"]));
$url2 = htmlspecialchars(stripslashes($row["url2"]));
$portfolio = $row["portfolio"];

//techapp
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

//tech roles, pull in info
//fetch row and assign to variables
$techroles_uid = $row["techroles_uid"];
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

//portfolio info
$title1 = $row["title1"];
$title2 = $row["title2"];
$title3 = $row["title3"];

$type1 = $row["type1"];
$type2 = $row["type2"];
$type3 = $row["type3"];

$port_link1 = $row["port_link1"];
$port_link2 = $row["port_link2"];
$port_link3 = $row["port_link3"];

$comment1 = $row["comment1"];
$comment2 = $row["comment2"];
$comment3 = $row["comment3"];


//tech roles
//stripslashes, htmspecialchars
//trim slashes
$under21 = stripslashes(trim($under21));
$salary = stripslashes(trim($salary));

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
//$role1 = htmlspecialchars(stripslashes($role1));
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
//added 1/1/09
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

//portfolio info
$title1 = htmlspecialchars(stripslashes($title1));
$title2 = htmlspecialchars(stripslashes($title2));
$title3 = htmlspecialchars(stripslashes($title3));

$comment1 = htmlspecialchars(stripslashes($comment1));
$comment2 = htmlspecialchars(stripslashes($comment2));
$comment3 = htmlspecialchars(stripslashes($comment3));

echo "

<HTML> 
  <HEAD> 
	 <TITLE>StrawHat Staff Tech Design Search: $lastname, $firstname: $job1</TITLE>
	 <link rel=\"stylesheet\" href=\"techie.css\" type=\"text/css\">
	 <meta name=\"googlebot\" content=\"noindex\">	 
  </HEAD>
  
  <SCRIPT LANGUAGE=\"Javascript\" TYPE=\"text/javascript\">
<!-- 

function open_window(url) {
var NEW_WIN = null;
NEW_WIN = window.open
(\"\", \"RecordViewer\",
toolbar=\"no\",
directories=\"no\",
status=\"no\",
scrollbars=\"yes\",
resizable=\"yes\",
menubar=\"no\");

NEW_WIN.location.href = url;
NEW_WIN.focus();
}

function sendme() { 
window.open(\"\",\"myNewWin\",
resize=\"yes\",
scrollbars=\"yes\",
toolbar=\"no\"); 

var a = window.setTimeout(\"document.form1.submit();\",\"500\"); 
myNewWin.focus();

} 
-->
</script>	 
  
   
  <BODY BACKGROUND=\"/graphics03/Bk10a.GIF\">
  <script src=\"navbar.js\"></script>
  

  ";



echo "<H1 align = \"center\">$firstname $midname $lastname: $job1</H1>
";

if($portfolio == "Y") {
echo "

<table border = \"0\" align = \"center\" width=\"900px\">
	<tr>
		<td align = \"center\" width = \"300px\">
";		
//picture
if($type1 == "P") {
	echo "<IMG SRC=\"../Tech/tech_media/$port_link1\" ALT=\"Portfolio Picture 1\">
";		
}

//video
if($type1 == "V") {
	
	echo "<IMG SRC=\"../Tech/record.gif\" ALT=\"*\">
	<A HREF = \"../Tech/tech_media/$port_link1\" ALT=\"Video Link\"><b><u><font face=\"Arial, Helvetica, sans-serif\"><font size=\"+1\">VIDEO 1</font></font></u></b></A>
	<IMG SRC=\"../Tech/record1.gif\" ALT=\"*\">
";		
}

//audio
if($type1 == "A") {
	
	echo "<IMG SRC=\"../Tech/record.gif\" ALT=\"*\">
	<A HREF = \"../Tech/tech_media/$port_link1\" ALT=\"Audio Link\"><b><u><font face=\"Arial, Helvetica, sans-serif\"><font size=\"+1\">AUDIO 1</font></font></u></b></A>
	<IMG SRC=\"../Tech/record1.gif\" ALT=\"*\">
";		
}


echo "
		</td>
		<td align = \"center\" width = \"300px\">
		
";		
//picture 2
if($type2 == "P") {
	echo "<IMG SRC=\"../Tech/tech_media/$port_link2\" ALT=\"Portfolio Picture 2\">
";		
}

//video
if($type2 == "V") {
	
	echo "<IMG SRC=\"../Tech/record.gif\" ALT=\"*\">
	<A HREF = \"../Tech/tech_media/$port_link2\" ALT=\"Video Link\"><b><u><font face=\"Arial, Helvetica, sans-serif\"><font size=\"+1\">VIDEO 2</font></font></u></b></A>
	<IMG SRC=\"../Tech/record1.gif\" ALT=\"*\">
";		
}

//audio
if($type2 == "A") {
	
	echo "<IMG SRC=\"../Tech/record.gif\" ALT=\"*\">
	<A HREF = \"../Tech/tech_media/$port_link2\" ALT=\"Audio Link\"><b><u><font face=\"Arial, Helvetica, sans-serif\"><font size=\"+1\">AUDIO 2</font></font></u></b></A>
	<IMG SRC=\"../Tech/record1.gif\" ALT=\"*\">
";		
}

echo "
		</td>
		<td align = \"center\" width = \"300px\">
";		

//picture 3
if($type3 == "P") {
	echo "<IMG SRC=\"../Tech/tech_media/$port_link3\" ALT=\"Portfolio Picture 3\">
";		
}

//video 3
if($type3 == "V") {
	
	echo "<IMG SRC=\"../Tech/record.gif\" ALT=\"*\">
	<A HREF = \"../Tech/tech_media/$port_link3\" ALT=\"Video Link\"><b><u><font face=\"Arial, Helvetica, sans-serif\"><font size=\"+1\">VIDEO 3</font></font></u></b></A>
	<IMG SRC=\"../Tech/record1.gif\" ALT=\"*\">
";		
}

//audio 3
if($type3 == "A") {
	
	echo "<IMG SRC=\"../Tech/record.gif\" ALT=\"*\">
	<A HREF = \"../Tech/tech_media/$port_link3\" ALT=\"Audio Link\"><b><u><font face=\"Arial, Helvetica, sans-serif\"><font size=\"+1\">AUDIO 3</font></font></u></b></A>
	<IMG SRC=\"../Tech/record1.gif\" ALT=\"*\">
";		
}



echo "		
		</td>
	</tr>

	<tr>
		<td align = \"center\">
";		
//second row for titles
//picture
if($type1 == "P") {
	echo "<p align = \"center\"><b>$title1</b></p>
";		
}
//video
if($type1 == "V") {
	echo "<p align = \"center\"><b>$title1</b></p>
";		
}

//audio
if($type1 == "A") {
	echo "<p align = \"center\"><b>$title1</b></p>
";		
}



echo "
		</td>
		<td>
		
";		

if($type2 == "P") {
	echo "<p align = \"center\"><b>$title2</b></p>
			
";
}

//video
if($type2 == "V") {
	echo "<p align = \"center\"><b>$title2</b></p>
";		
}

//audio
if($type2 == "A") {
	echo "<p align = \"center\"><b>$title2</b></p>
";		
}



echo "
		</td>
		<td>
";		

if($type3 == "P") {
	echo "<p align = \"center\"><b>$title3</b></p>
			
	";
}
	
//video
if($type3 == "V") {
	echo "<p align = \"center\"><b>$title3</b></p>
";		
}	

//audio
if($type3 == "A") {
	echo "<p align = \"center\"><b>$title3</b></p>
";		
}	

	
echo "</td>
	</tr>
";

//third row for comments

echo "		
		</td>
	</tr>

	<tr>
		<td align = \"center\">
";		

if($type1 == "P") {
	echo "
	<p align = \"center\">$comment1</p>		
";
}

if($type1 == "V") {
	echo "
	<p align = \"center\">$comment1</p>		
";
}

if($type1 == "A") {
	echo "
	<p align = \"center\">$comment1</p>		
";
}

echo "
		</td>
		<td>
		
";		

if($type2 == "P") {
	echo "
	<p align = \"center\">$comment2</p>		
";
}

if($type2 == "V") {
	echo "
	<p align = \"center\">$comment2</p>		
";
}

if($type2 == "A") {
	echo "
	<p align = \"center\">$comment2</p>		
";
}

echo "
		</td>
		<td>
";		

if($type3 == "P") {
	echo "
	<p align = \"center\">$comment3</p>		
	";
}
	
if($type3 == "V") {
	echo "
	<p align = \"center\">$comment3</p>		
";
}

if($type3 == "A") {
	echo "
	<p align = \"center\">$comment3</p>	
";
}

	
echo "</td>
	</tr>
";
echo "
</table> ";
}





echo "
<TABLE CELLPADDING=\"3\" CELLSPACING=\"3\" WIDTH=\"85%\" border = \"0\" align = \"center\"> 

<tr>
			<td colspan=\"4\" bgcolor=\"#CC3300\"><HR></td>
		</tr>

		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\" WIDTH=\"107\"><B> Phone:</B><BR>
";
	//parse phone number

	$areacode = substr($phone, 0,3);
	$phone1 = substr($phone, 3,3);
	$phone2 = substr($phone, 6,4);
			  
echo " $areacode-$phone1-$phone2		  
		 </TD> 
		  <TD VALIGN=\"TOP\" WIDTH=\"101\"><B>E-mail:</B><BR><a href=\"mailto:$email\">$email</a></TD> 
		  <TD><B>Available:
";

/*Parse availfor*/
$mo = substr($availfor, 5,2);
$day = substr($availfor, 8,2);
$year = substr($availfor, 0, 4);

echo "$mo-$day-$year";

echo "
to
";
/*Parse availTO*/
/*Parse availfor*/
$mo = substr($availto, 5,2);
$day = substr($availto, 8,2);
$year = substr($availto, 0, 4);

echo "$mo-$day-$year";


echo "<BR>
		<a href = \"/Members11/Tech/tech_resume/$resume_link\" target=\"RecordViewer\" onClick=\"sendme()\">Link to Resume</a>
		  </TD>
		  <td>&nbsp</td
		  </TR> 

		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\"><B>Primary Position:</B><br>$job1</td>
          <TD VALIGN=\"TOP\"><B>Secondary Position:</B><br>$job2</td>	 		
		  <TD VALIGN=\"TOP\">
		  ";

		if(!$other){
			echo "&nbsp</td>";}
			else { echo "
			<B>Other Position:</B><br>$other</td>";} 
			
			
		  
echo "		<td>&nbsp</td>
			</tr>

		<tr>
			<td>Job In:
";
			if($jobin == "Y") {
				echo "Yes";}
			else { echo "No";}
echo "		
			</td>
			<td>
			Minimum Weekly Salary:
			";
			if($salary == 0){
				echo "No Entry";}
				else {
					echo "$$salary";}
			echo "</td> 
			<td>
			";
			if($under21 == 0) {
				echo "&nbsp</td>";}
				else {echo "Age if under 21: $under21";}
			echo "</td>
			<td>&nbsp</td>
		</tr>
		";
if($url1) {
			echo "
		<tr>
			<td colspan = \"4\">Websites:
			<a href = \"$url\" target=\"RecordViewer\" onClick=\"sendme()\">Link to Website 1</a><BR> 
			</td>
		</tr>
		";}

if($url2) {
			echo "
		<tr>	
			<td colspan = \"4\">Websites: 
			<a href = \"$url2\" target=\"RecordViewer\" onClick=\"sendme()\">Link to Website 2</a> 
			</td>
		</tr>
		";}		
		
		
echo "			
		<tr>
			<td colspan = \"4\">
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
	if(!empty($costume) ) {        
        echo "Costume Design, ";}
    if(!empty($sew) ) {        
        echo "Sewing/Wardrobe, ";}
    if(!empty($td) ) {        
        echo "Technical Director, ";}	
        	
    if(!empty($graphics) ) {        
        echo "Graphics, ";}	
    if(!empty($house) ) {        
        echo "House Management, ";}	
    if(!empty($lights) ) {        
        echo "Lighting Design, ";}	
    if(!empty($elec) ) {        
        echo "Electrics, ";}	
    if(!empty($direct) ) {        
        echo "Director, ";}	
    if(!empty($music) ) {        
        echo "Music Director, ";}	
    if(!empty($photo) ) {        
        echo "Photography, ";}	
    if(!empty($video) ) {        
        echo "Video, ";}	
        
    if(!empty($props) ) {        
        echo "Props, ";}	
    if(!empty($pr) ) {        
        echo "Publicity, ";}	
    if(!empty($runcrew) ) {        
        echo "Running Crew, ";}	
    if(!empty($scenic) ) {        
        echo "Scenic Artist, ";}	
    if(!empty($set) ) {        
        echo "Set Design, ";}	
    if(!empty($sound) ) {        
        echo "Sound, ";}	
    if(!empty($stagem) ) {        
        echo "Stage Management, ";}	
    if(!empty($company) ) {        
        echo "Company Management";}	    
echo "</td>
	</tr>


		";

	if(!$role1 && !$role2 && !$role3 && !$role4 && !$role5 && 
			!$role6 && !$role7 && !$role8 && !$role9 && !$role10) {
				echo "<TR><td colspan = \"4\"><p>No Job Profile Entered</p></td></tr>
			";}
		else {		
		echo "		
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\"><B>Job</B></TD> 
		  <TD VALIGN=\"TOP\"><B>Show</B></TD> 
		  <TD VALIGN=\"TOP\"><B>Theatre/Company</B></TD>
		  <TD VALIGN=\"TOP\"><B>Dir/Choreo/Other</B></TD> 
		</TR> 
		";
		if($role1 && $show1 && $thea1) { echo "
		  <TR VALIGN=\"TOP\">
		  <TD VALIGN=\"TOP\">$role1</TD> 
		  <TD VALIGN=\"TOP\">$show1</TD> 
		  <TD VALIGN=\"TOP\">$thea1</TD>
		  <TD VALIGN=\"TOP\">$dir1</TD>
		</TR> 
		";}
		
		if($role2 && $show2 && $thea2) echo "
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\">$role2</TD> 
		  <TD VALIGN=\"TOP\">$show2</TD> 
		  <TD VALIGN=\"TOP\">$thea2</TD>
		  <TD VALIGN=\"TOP\">$dir2</TD> 
		</TR> 
		";
		
		if($role3 && $show3 && $thea3) echo "
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\">$role3</TD> 
		  <TD VALIGN=\"TOP\">$show3</TD> 
		  <TD VALIGN=\"TOP\">$thea3</TD>
		  <TD VALIGN=\"TOP\">$dir3</TD> 
		</TR> 
		";
		
		if($role4 && $show4 && $thea4) echo "
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\">$role4</TD> 
		  <TD VALIGN=\"TOP\">$show4</TD> 
		  <TD VALIGN=\"TOP\">$thea4</TD>
		  <TD VALIGN=\"TOP\">$dir4</TD> 
		</TR> 
		";
		
		if($role5 && $show5 && $thea5) echo "
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\">$role5</TD> 
		  <TD VALIGN=\"TOP\">$show5</TD> 
		  <TD VALIGN=\"TOP\">$thea5</TD> 
		</TR>
		";
		
		if($role6 && $show6 && $thea6) echo " 
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\">$role6</TD> 
		  <TD VALIGN=\"TOP\">$show6</TD> 
		  <TD VALIGN=\"TOP\">$thea6</TD>
		  <TD VALIGN=\"TOP\">$dir6</TD> 
		</TR> 
		";
		
		if($role7 && $show7 && $thea7) echo "
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\">$role7</TD> 
		  <TD VALIGN=\"TOP\">$show7</TD> 
		  <TD VALIGN=\"TOP\">$thea7</TD>
		  <TD VALIGN=\"TOP\">$dir7</TD> 
		</TR>
		";

		if($role8 && $show8 && $thea8) echo "
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\">$role8</TD> 
		  <TD VALIGN=\"TOP\">$show8</TD> 
		  <TD VALIGN=\"TOP\">$thea8</TD>
		  <TD VALIGN=\"TOP\">$dir8</TD> 
		</TR>
		";

		if($role9 && $show9 && $thea9) echo "
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\">$role9</TD> 
		  <TD VALIGN=\"TOP\">$show9</TD> 
		  <TD VALIGN=\"TOP\">$thea9</TD>
		  <TD VALIGN=\"TOP\">$dir9</TD>
		</TR>
		";

		if($role10 && $show10 && $thea10) echo "
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\">$role10</TD> 
		  <TD VALIGN=\"TOP\">$show10</TD> 
		  <TD VALIGN=\"TOP\">$thea10</TD>
		  <TD VALIGN=\"TOP\">$dir10</TD> 
		</TR>
		";
		} 

//parse proftel
//get area code
$areacode = substr($proftel, 0, 3);
//prefix
$phone1 = substr($proftel, 3, 3);
//last 4 numbers
$phone2 = substr($proftel, 6, 4);

//parse reference phone 1/1/09
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
		
		
		
    if($school && $prof && $profemail) {
    	echo "
    <tr>
    	<td colspan = \"4\">
    	<p align=\"center\"><b>School Recommendation</b></p>
    	</td>
    </tr>
    	
	<tr>   
    	<td>
    	<b>School:</b> $school
    	</td>
    	
    	<td>
    		<b>Prof:</b> $prof
    	</td>
    
    	<td>
    		<b>Tel:</b>
    		
    	 $areacode-$phone1-$phone2
    	</td>
    
    	<td>
    		<b>Email:</b> $profemail
    	</td>
    </tr>";}
    	else {
    		echo "<tr><td colspan = \"4\"><p>No School Reference Entered</p></td></tr>";
    	}
    	
    if($ref1 && $co1 && $email1) {
    	echo "
    <tr>
    	<td colspan = \"4\"><p align = \"center\"><b>Professional References</b></p></td>
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
    ";}
    
    if($ref2 && $co2 && $email2) {
    echo "
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
    ";}
    
    if($ref3 && $co3 && $email3) {
    echo "
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
 ";}
echo "
 </table>   
 
</BODY>
</HTML>
";
}
?>