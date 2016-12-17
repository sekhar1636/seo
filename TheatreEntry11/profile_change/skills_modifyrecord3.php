<?php
//Theatre Application using skills_modifyrecord3.php 2012
$skills_uid = $_POST['skills_uid'];
$interns = $_POST['interns'];
$accomp = $_POST['accomp'];
$admin = $_POST['admin']; 
$boxoffice = $_POST['boxoffice'];
$carpentry = $_POST['carpentry']; 
$choreo = $_POST['choreo']; 
$costume = $_POST['costume'];
$director = $_POST['director']; 
$electrics = $_POST['electrics']; 
$graphics = $_POST['graphics'];
$house = $_POST['house'];
$lights = $_POST['lights']; 
$musicdir = $_POST['musicdir']; 
$photo = $_POST['photo']; 
$prod_interns = $_POST['prod_interns']; 
$props = $_POST['props']; 
$publicity = $_POST['publicity']; 
$scenic = $_POST['scenic']; 
$sets = $_POST['sets'];
$sewing = $_POST['sewing']; 
$sound = $_POST['sound'];
$sm = $_POST['sm']; 
$td = $_POST['td']; 
$other1 = $_POST['other1']; 
$other2= $_POST['other2']; 

$re_interns = $_POST['re_interns']; 
$re_accomp = $_POST['re_accomp']; 
$re_admin = $_POST['re_admin']; 
$re_boxoffice = $_POST['re_boxoffice'];
$re_carpentry = $_POST['re_carpentry']; 
$re_choreo = $_POST['re_choreo']; 
$re_costume = $_POST['re_costume'];
$re_director = $_POST['re_director']; 
$re_electrics = $_POST['re_electrics']; 
$re_graphics = $_POST['re_graphics']; 
$re_house = $_POST['re_house']; 
$re_lights = $_POST['re_lights']; 
$re_musicdir = $_POST['re_musicdir']; 
$re_photo = $_POST['re_photo']; 
$re_prod_interns = $_POST['re_prod_interns']; 
$re_props = $_POST['re_props']; 
$re_publicity = $_POST['re_publicity']; 
$re_scenic = $_POST['re_scenic']; 
$re_sets = $_POST['re_sets'];
$re_sewing = $_POST['re_sewing']; 
$re_sound = $_POST['re_sound']; 
$re_sm = $_POST['re_sm']; 
$re_td = $_POST['re_td']; 
$re_other1 = $_POST['re_other1']; 
$re_other2= $_POST['re_other2'];
$staff_num = $_POST['staff_num'];
$interns_num = $_POST['interns_num'];
$app_num = $_POST['app_num'];

$house_all = $_POST['house_all'];
$house_some = $_POST['house_some'];
$house_sub = $_POST['house_sub'];
$house_neg = $_POST['house_neg'];

$meals_all = $_POST['meals_all'];
$meals_some = $_POST['meals_some'];
$meals_kit = $_POST['meals_kit'];
$meals_sub = $_POST['meals_sub'];

$staff1 = $_POST['staff1'];             
$staff_per1 = $_POST['staff_per1'];     
$staff2 = $_POST['staff2'];             
$staff_per2 = $_POST['staff_per2'];     

$design1 = $_POST['design1'];
$design_per1 = $_POST['design_per1'];

$design2 = $_POST['design2'];
$design_per2 = $_POST['design_per2'];

$intern1 = $_POST['intern1'];
$intern_per1 = $_POST['intern_per1'];

$apprentice1 = $_POST['apprentice1'];
$apprentice_per1 = $_POST['apprentice_per1'];
$app_unpaid = $_POST['app_unpaid'];
$app_emc = $_POST['app_emc'];
$app_room = $_POST['app_room'];
$app_board = $_POST['app_board'];

$intern_unpaid = $_POST['intern_unpaid'];
$intern_emc = $_POST['intern_emc'];
$intern_room = $_POST['intern_room'];
$intern_board = $_POST['intern_board'];

$availfor = $_POST['availfor'];
$availto = $_POST['availto'];

//dates
$datefrom_day = $_POST['datefrom_day'];
$datefrom_month = $_POST['datefrom_month'];
$datefrom_year = $_POST['datefrom_year'];

$dateto_day = $_POST['dateto_day'];
$dateto_month = $_POST['dateto_month'];
$dateto_year = $_POST['dateto_year'];

include("../../Comm/connect.inc");

/*parse values for selected checkboxes
supress error msg by using isset() to test is variable exists - 
variables from checkboxes are not forwarded unless checked -
assign to those not checked to avoid errors and notices
---------------------------------------------------------*/
/*
if(!isset($acrobatics)) {
	$acrobatics = NULL;
}
if (!isset($asl)){
	$asl = NULL;
}
if(!isset($juggling)) {
	$juggling = NULL;
}
if(!isset($painting)) {
	$painting = NULL;
}
if(!isset($puppetry)) {
	$puppetry = NULL;
}
if(!isset($combat)) {
	$combat = NULL;
}

if(!isset($shakes)) {
	$shakes = NULL;
}

if(!isset($cabaret)) {
	$cabaret = NULL;
}

if(!isset($improv)) {
	$improv = NULL;
}

if(!isset($mime)) {
	$mime = NULL;
}

if(!isset($standup)) {
	$standup = NULL;
}
*/

//parse availto, availfrom dates
$availfor = $datefrom_year . "-" . $datefrom_month . "-" . $datefrom_day;
$availto = $dateto_year . "-" . $dateto_month . "-" .  $dateto_day;

if (!$skills_uid) {
    echo("Can't see skills_uid");
    exit;
    }


//SQL statement to update record
$sql = "UPDATE theaskills12 SET skills_uid = \"$skills_uid\",
app_num = \"$app_num\",
interns_num = \"$interns_num\",
staff_num = \"$staff_num\",

interns = \"$interns\",
accomp=\"$accomp\",
admin=\"$admin\",
boxoffice=\"$boxoffice\",
carpentry=\"$carpentry\",
choreo=\"$choreo\",
costume=\"$costume\",
director=\"$director\",
electrics=\"$electrics\",
graphics=\"$graphics\",
house=\"$house\",
lights=\"$lights\",
musicdir=\"$musicdir\",
photo=\"$photo\",

prod_interns=\"$prod_interns\",
props=\"$props\",
publicity=\"$publicity\",
scenic=\"$scenic\",
sets=\"$sets\",
sewing=\"$sewing\",
sound=\"$sound\",
sm=\"$sm\",
td=\"$td\",


house_all = \"$house_all\",
house_some = \"$house_some\",
house_sub = \"$house_sub\",
house_neg = \"$house_neg\",

meals_all = \"$meals_all\",
meals_some = \"$meals_some\",
meals_kit = \"$meals_kit\",
meals_sub = \"$meals_sub\",

staff1 = \"$staff1\",
staff2 = \"$staff2\",

design1 = \"$design1\",
design_per1 = \"$design_per1\",

design2 = \"$design2\",
design_per2 = \"$design_per2\",

intern1 = \"$intern1\",
intern_per1 = \"$intern_per1\",

intern_unpaid = \"$intern_unpaid\",
intern_emc = \"$intern_emc\",
intern_room = \"$intern_room\",
intern_board = \"$intern_board\",

apprentice1 = \"$apprentice1\",
apprentice_per1 = \"$apprentice_per1\",

app_unpaid = \"$app_unpaid\",
app_emc = \"$app_emc\",
app_room = \"$app_room\",
app_board = \"$app_board\",


other1=\"$other1\",
other2=\"$other2\",

re_interns = \"$re_interns\",
re_accomp = \"$re_accomp\",
re_admin = \"$re_admin\",
re_boxoffice = \"$re_boxoffice\",
re_carpentry = \"$re_carpentry\",
re_choreo = \"$re_choreo\",
re_costume = \"$re_costume\",
re_director = \"$re_director\",
re_electrics = \"$re_electrics\",
re_graphics = \"$re_graphics\",
re_house = \"$re_house\",
re_lights = \"$re_lights\",
re_musicdir = \"$re_musicdir\",
re_photo = \"$re_photo\",
re_prod_interns = \"$re_prod_interns\",
re_props = \"$re_props\",
re_publicity = \"$re_publicity\",
re_scenic = \"$re_scenic\",
re_sets = \"$re_sets\",
re_sewing = \"$re_sewing\",
re_sound = \"$re_sound\",
re_sm = \"$re_sm\",
re_td = \"$re_td\",
re_other1 = \"$re_other1\",
re_other2 = \"$re_other2\",

availfor = \"$availfor\",
availto = \"$availto\"

WHERE skills_uid = \"$skills_uid\"
";

//execute SQL  and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute Update Skills query: skills_uid: $skills_uid");


if (!$sql_result) {
	echo "<P>Couldn't update record!</P>";
	} else {				


echo "
<HTML>
<HEAD>
<TITLE>StrawHat Updated Theatre Jobs/Skills Record</TITLE>
<link rel=\"stylesheet\" href=\"members.css\" type=\"text/css\">
</HEAD>
<BODY>
";

include("banner.inc");
/*
//<input type = \"hidden\" name = \"sel_record\" value = \"$skills_uid\">
//old code for using hidden variable

//execute SQL query and get result    
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


if (!$sql_result) {
    echo "<P>Couldn't update record!</P>";
    } else {

*/
	
echo "	
<h1 align = 'center'>You have made these changes:</h1>
<FORM method = \"POST\" action = \"changes.php\">
<input type = \"hidden\" name = \"thea_uid\" value = \"$skills_uid\">

<div align=\"center\">
  <table width=\"997\" border=\"1\" cellspacing=\"1\" cellpadding=\"1\" align=\"center\" height=\"466\">
    <tr bgcolor=\"#FFFF66\"> 
      <td colspan=\"3\"> 
        <div align=\"center\"><b>STAFF/TECHNICAL/DESIGN General Information</b></div>
      </td>
    </tr>
    <tr> 
      <td width=\"219\"><b>Total number openings</b></td>
      <td colspan=\"2\">Staff: $staff_num. Interns: $interns_num.  Apprentices: $app_num.
      </td>
    </tr>
    <tr> 
      <td width=\"219\"><b>Approximate Contract Dates</b></td>
      <td width=\"397\">
      <B>From:</B>
";


/*Parse availfor*/
$mo = substr($availfor, 5,2);
$day = substr($availfor, 8,2);
$year = substr($availfor, 0,4);

echo "$mo - $day - $year";


      
echo "      
      </td>
      
      <td width=\"381\">
      <B>To:</B>
      
";


/*Parse availto*/
$mo = substr($availto, 5,2);
$day = substr($availto, 8,2);
$year = substr($availto, 0,4);
$dateto_month = $mo;

echo "$mo - $day - $year";
      
echo "      
      </td>
    </tr>
    <tr> 
      <td width=\"219\"><b>Housing</b></td>
      <td colspan=\"2\"> 
";
      if(!empty($house_all) ) {
          echo "Provided All, ";}
        
        if(!empty($house_some) ) {
          echo "Provided for Some, ";}

        if(!empty($house_sub) ) {
          echo "Subsidized,  ";}

        if(!empty($house_neg) ) {
          echo "Negotiable,  ";}
         
echo "        
        </td>
    
    </tr>
    <tr> 
      <td width=\"219\"><b>Meals</b></td>
      <td colspan=\"2\">
";
      if(!empty($meals_all) ) {
          echo "All Provided,  ";}    

      if(!empty($meals_some) ) {
          echo "Provided for Some,  ";}    

        if(!empty($meals_kit) ) {
          echo "Kitchen Facilities,  ";}       

        if(!empty($meals_sub) ) {
          echo "Subsidized,  ";}       

echo "        
        </td>
    </tr>
    <tr> 
      <td colspan=\"3\"> 
        <div align=\"center\"><b>General Salary Range:</b></div>
      </td>
    </tr>
    <tr> 
      <td width=\"219\"><b>Staff:</b></td>
      <td width=\"397\">From: $ $staff1 per $staff_per1
";        

echo " 
      </td>
      <td width=\"381\">To: $ $staff2 per $staff_per2

      </td>
    </tr>
    <tr> 
      <td width=\"219\"><b>Designers</b></td>
      <td width=\"397\">From: $ $design1 per $design_per1
      </td>

      <td width=\"381\">To: $ $design2 per $design_per2        

      </td>
    </tr>
    <tr> 
      <td width=\"219\"><b>Interns</b></td>
      <td width=\"397\">From: $ $intern1 per $intern_per1        
      </td>
      
      <td colspan=\"2\" width=\"381\"> 

";
      if(!empty($intern_unpaid) ) {
          echo "Unpaid,  ";}    

        if(!empty($intern_emc) ) {
          echo "EMC,  ";}

        if(!empty($intern_room) ) {
          echo "Room,  ";}

        if(!empty($intern_board) ) {
          echo "Board,  ";}
         
echo "        
        </td>
    </tr>
    <tr> 
      <td width=\"219\"><b>Apprentices</b></td>
      <td width=\"397\">From: $ $apprentice1 per $apprentice_per1
      </td>
      
      <td colspan=\"2\" width=\"381\"> 
      
";
      if(!empty($app_unpaid) ) {
          echo "Unpaid,  ";}    

        if(!empty($app_emc) ) {
          echo "EMC,  ";}

        if(!empty($app_room) ) {
          echo "Room,  ";}

        if(!empty($app_board) ) {
          echo "Board,  ";}
         
echo "        
        </td>
    </tr>
  </table>
</div>
";


echo "
<BR>
<table cellspacing=\"5\" cellpadding=\"5\" align = \"center\" border=\"1\">

	<tr>
	<td valign=top width=\"250\"><strong>Position</strong></td>
	<td valign=top width=\"500\"><strong>Remarks</strong></td>
";

/*
	switch($vocal) {
	case "":
		echo ("Not Indicated");
		break;	
	case "S":
		echo("Soprano");
		break;
	case "A":
		echo("Alto");
		break;
	case "MS":
		echo("Mezzo Soprano");
		break;
	case "T":
		echo("Tenor");
		break;
	case "B":
		echo("Baritone");
		break;
	default:
		echo("Bass-Baritone");
	}
*/
/*
echo "	

	</td>
	<td valign=top></td>
	<td valign=top></td>
	</tr>
    
	<tr>
	<td valign=top><strong>Dance:</strong></td>
	<td valign=top>Ballet: $ballet, Musical Thea: $mus_thea, Ballroom: $ballroom, Tap: $tap,
		Swing: $swing, Jazz: $jazz</td>
	<td valign=top><strong>Instruments:</strong></td>
	<td valign=top>Percussion: $perc, Sax: $sax, Banjo: $banjo, Piano: $piano, Drums: $drums,
		Cello: $cello, Clarinet: $clarinet, Trombone: $trombone, Trumpet: $trumpet, Flute: $flute,
		Violin: $violin, Guitar: $guitar</td>
	</tr>

	<tr>
	<td valign=top><strong>Other:</strong></td>
	<td valign=top>
    
";
*/	
	if(isset($interns)){
		echo "
        <TR>
        <td>$interns</td>
        <td>$re_interns</td> 
        </TR>
        ";
	}
	if(isset($accomp)){
		echo "
        <tr>
        <td>$accomp</td>
        <td>$re_accomp</td>
        </tr> ";
	}	
	if(isset($admin)){
		echo "
        <tr>
        <td>$admin</td>
        <td>$re_admin</td>
        </tr> ";
	}
	if(isset($boxoffice)){
		echo "
        <tr>
        <td>$boxoffice</td> 
        <td>$re_boxoffice</td> 
        </tr>";
	}
	if(isset($carpentry)){
		echo "
        <tr>
        <td>$carpentry</td>
        <td>$re_carpentry</td>
        </tr>";
	}
	if(isset($choreo)){
		echo "
        <tr>
        <td>$choreo</td>
        <td>$re_choreo</td>
        </tr>";
	}
	if(isset($costume)){
		echo "
        <tr>
        <td>$costume</td>
        <td>$re_costume</td>
        </tr>";
	}
	if(isset($director)){
		echo "
        <tr>
        <td>$director</td>
        <td>$re_director</td>
        </tr>";
	}
	if(isset($sewing)){
		echo "
        <tr>
        <td>$sewing</td>
        <td>$re_sewing</td>
        </tr>";
	}
    
	if(isset($graphics)){
		echo "
        <tr>
        <td>$graphics</td>
        <td>$re_graphics</td>
        </tr>";
	}
    
	if(isset($house)){
		echo "
        <tr>
        <td>$house</td>
        <td>$re_house</td>
        </tr>";
	}
    
    if(isset($lights)){
        echo "
        <tr>
        <td>$lights</td>
        <td>$re_lights</td>
        </tr>";
    }
    
    if(isset($electrics)){
        echo "
        <tr>
        <td>$electrics</td>
        <td>$re_electrics</td>
        </tr>";
    }
    
    if(isset($musicdir)){
        echo "
        <tr>
        <td>$musicdir</td>
        <td>$re_musicdir</td>
        </tr>";
    }
    
    if(isset($photo)){
        echo "
        <tr>
        <td>$photo</td>
        <td>$re_photo</td>
        </tr>";
    }
    
    if(isset($prod_interns)){
        echo "
        <tr>
        <td>$prod_interns</td>
        <td>$re_prod_interns</td>
        </tr>";
    }

    if(isset($props)){
        echo "
        <tr>
        <td>$props</td>
        <td>$re_props</td>
        </tr>";
    }

    if(isset($publicity)){
        echo "
        <tr>
        <td>$publicity</td>
        <td>$re_publicity</td>
        </tr>";
    }
    
    if(isset($scenic)){
        echo "
        <tr>
        <td>$scenic</td>
        <td>$re_scenic</td>
        </tr>";
    }
    
    if(isset($sets)){
        echo "
        <tr>
        <td>$sets</td>
        <td>$re_sets</td>
        </tr>";
    }
    
    if(isset($sound)){
        echo "
        <tr>
        <td>$sound</td>
        <td>$re_sound</td>
        </tr>";
    }
    
    if(isset($sm)){
        echo "
        <tr>
        <td>$sm</td>
        <td>$re_sm</td>
        </tr>";
    }

    if(isset($td)){
        echo "
        <tr>
        <td>$td</td>
        <td>$re_td</td>
        </tr>";
    }

        if(isset($other1)){
        echo "
        <tr>
        <td>$other1</td>
        <td>$re_other1</td>
        </tr>";
    }

    if(isset($other2)){
        echo "
        <tr>
        <td>$other2</td>
        <td>$re_other2</td>
        </tr>";
    }
    
/*
	</td>
	<td valign=top><strong>Technical Skills: </strong></td>
	<td valign=top>Set Construction: $sets, Lighting: $lights, Costumes: $costume, SM: $sm,
		Box Office: $boxoffice, Props: $props</td>
	</tr>
*/    
    
echo "    	
</table>
<P align = \"center\"><INPUT type=\"submit\" value =\"Done, Return to Application Menu\">   
</FORM>
</BODY>
</HTML>
";
}
?>