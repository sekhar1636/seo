<?php
//techapp_modifyrecord3.php
$tech_uid = $_POST['tech_uid'];
//$availfor= $_POST['availfor'];
//$availto = $_POST['availto'];
$salary = $_POST['salary'];
$jobin = $_POST['jobin'];
$under21 = $_POST['under21'];
$job1 = $_POST['job1'];
$job2 = $_POST['job2'];
$other = $_POST['other'];
$accomp = $_POST['accomp'];
$admin = $_POST['admin'];
$boxoffice = $_POST['boxoffice'];
$carp = $_POST['carp'];
$choreo = $_POST['choreo'];
$costume = $_POST['costume'];
$sew = $_POST['sew'];
$td = $_POST['td'];
$graphics = $_POST['graphics'];
$house = $_POST['house'];
$lights = $_POST['lights'];
$elec = $_POST['elec'];
$direct = $_POST['direct'];
$music = $_POST['music'];
$photo = $_POST['photo'];
$video = $_POST['video'];
$props = $_POST['props'];
$pr = $_POST['pr'];
$runcrew = $_POST['runcrew'];
$scenic = $_POST['scenic'];
$sound = $_POST['sound'];
$stagem = $_POST['stagem'];
$company = $_POST['company'];
$setdesign = $_POST['setdesign'];

//date fields
$datefrom_month = $_POST['datefrom_month'];
$datefrom_day = $_POST['datefrom_day'];
$datefrom_year = $_POST['datefrom_year'];

$dateto_month = $_POST['dateto_month'];
$dateto_day = $_POST['dateto_day'];
$dateto_year = $_POST['dateto_year'];

echo"
<HTML>
<HEAD>
<TITLE>StrawHat Updated Staff Tech Design Information</TITLE>
<link rel=\"stylesheet\" href=\"actors.css\" type=\"text/css\">
</HEAD>
<BODY>
";
include("banner.inc");

if (!$tech_uid) {
	echo "No tech_uid";

	exit;
	}

//prevent job1 and job2 from both selecting other
if($job1 == "Other" && $job2 == "Other"){
	echo "<p>If you are selecting Other in the Primary Position Sought, do not select Other in the Secondary Position; instead go back and leave the Secondary Position blank.</p>";
	exit();
}

//prevent job1 and job2 from being the same
if($job1 == $job2){
	echo "<p>Your Primary and Secondary Positions are the same; please go back and select a different Secondary Position, or leave it blank.</p>";
	exit();
}
	
include("../../Comm/connect.inc");

//variables for edit review only


/*parse values for selected checkboxes
supress error msg by using isset() to test is variable exists - 
variables from checkboxes are not forwarded unless checked -
assign to those not checked to avoid errors and notices
---------------------------------------------------------*/
if(!isset($accomp)) {
	$accomp = NULL;
}
if (!isset($admin)){
	$admin = NULL;
}
if(!isset($boxoffice)) {
	$boxoffice = NULL;
}
if(!isset($carp)) {
	$carp = NULL;
}
if(!isset($choreo)) {
	$choreo = NULL;
}
if(!isset($costume)) {
	$costume = NULL;
}

if(!isset($sew)) {
	$sew = NULL;
}
if(!isset($td)) {
	$td = NULL;
}
if(!isset($graphics)) {
	$graphics = NULL;
}
if(!isset($house)) {
	$house = NULL;
}
if(!isset($lights)) {
	$lights = NULL;
}

if(!isset($elec)) {
	$elec = NULL;
}
if(!isset($direct)) {
	$direct = NULL;
}
if(!isset($music)) {
	$music = NULL;
}
if(!isset($photo)) {
	$photo = NULL;
}
if(!isset($video)) {
	$video = NULL;
}

if(!isset($props)) {
	$props = NULL;
}
if(!isset($pr)) {
	$pr = NULL;
}
if(!isset($runcrew)) {
	$runcrew = NULL;
}
if(!isset($scenic)) {
	$scenic = NULL;
}

if(!isset($setdesign)) {
	$setdesign = NULL;
}

if(!isset($sound)) {
	$sound = NULL;
}
if(!isset($stagem)) {
	$stagem = NULL;
}
if(!isset($company)) {
	$company = NULL;
}

//parse availto, availfrom dates
$availfor = $datefrom_year . "-" . $datefrom_month . "-" . $datefrom_day;
$availto = $dateto_year . "-" . $dateto_month . "-" .  $dateto_day;


//trim and slashes
$under21 = addslashes(trim($under21));
$salary = addslashes(trim($salary));
$other = addslashes(trim($other));

//parse confirmation to show any illegal characters
$vunder21 = htmlspecialchars($under21);
$vsalary = htmlspecialchars($salary);
$vother = htmlspecialchars($other);

//SQL statement to update record
$sql = "UPDATE techapp11 SET techapp_uid = \"$tech_uid\",
availfor=\"$availfor\",
availto=\"$availto\",
salary=\"$salary\",
jobin=\"$jobin\",
under21 = \"$under21\",
job1 = \"$job1\",
job2 = \"$job2\",
other = \"$other\",
accomp = \"$accomp\",
admin = \"$admin\",
boxoffice = \"$boxoffice\",
carp = \"$carp\",
choreo = \"$choreo\",
costume = \"$costume\",
sew = \"$sew\",
td = \"$td\",
graphics = \"$graphics\",
house = \"$house\",
lights = \"$lights\",
elec = \"$elec\",
direct = \"$direct\",
music = \"$music\",
photo = \"$photo\",
video = \"$video\",
props = \"$props\",
pr = \"$pr\",
runcrew = \"$runcrew\",
scenic = \"$scenic\",
sound = \"$sound\",
stagem = \"$stagem\",
company = \"$company\",
setdesign = \"$setdesign\"
WHERE techapp_uid = \"$tech_uid\"
 ";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute techapp modify record query.");


if (!$tech_uid) {
	echo "<P>Couldn't update record!</P>";
	exit; 
	} else {

	
echo "	

<h3 align = \"center\">You have made these changes:</h3>

<FORM method = \"POST\" action = \"changes.php\">
<input type = \"hidden\" name = \"tech_uid\" value = \"$tech_uid\">
";

echo "
<table align=\"center\">
    <tr>
    <td> 
    <FORM method=\"POST\" action= \"/TechEntry11/profile_change/changes.php\">
    <input type = \"hidden\" name = \"tech_uid\" value = \"$tech_uid\">
    <INPUT type=\"submit\" value =\"Back to Change Application Menu\">
    </FORM>    
    </td>
    </tr>    
</table>
";



echo "
<BR>
  <table width=\"65%\" border=\"1\" align=\"center\">
    	
    <tr>
    	<td>
    	<b>Primary Position:</b> $job1
    	</td>
    	
    	<td><b>Secondary Position:</b> $job2
    	</td>
    </tr>
    
    <tr>
    	<td></td>
    	<td><b>Other Position:</b> $vother</td>
    </tr>
    
    <tr>
    	<td><b>Available from:</b> $datefrom_month / $datefrom_day / $datefrom_year
    	</td>
    	
    	<td><b>Available to:</b> $dateto_month / $dateto_day / $dateto_year
    	</td>
    </tr>
    
    <tr>
    	<td>Age if under 21: $vunder21
    	</td>
    	
    	<td><b>Job In?</b> ";
		
		if($jobin == "Y") {
			echo "Yes";
		}
		else {echo "No";
		}


echo "
    	
    	<b>Salary:</b> $vsalary
    	</td>
    </tr>
    
    <tr>
    	<td colspan = \"2\"><b>Areas of significant experience:</b> 
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
        echo "Choreographer, ";}        
    if(!empty($company) ) {        
        echo "Company Management";}	    
	if(!empty($costume) ) {        
        echo "Costume Design, ";}
    if(!empty($elec) ) {        
        echo "Electrics, ";}
    if(!empty($direct) ) {        
        echo "Director, ";}	        	
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
        echo "Video, ";}	        
    
    	
echo "    	
    	</td>
    </tr>
    <tr> 
      <td colspan=\"2\"> 
        <div align=\"center\"> 
          <input type=\"submit\" value=\"Done\" name=\"submit\">
        </div>
      </td>
    </tr>
    
    	
</table>




  </FORM>
</BODY>
</HTML>
";
}
?>