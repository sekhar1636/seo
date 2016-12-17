<?php
//Theatre Application: based on skills_modifyrecord2.php

$thea_uid = $_POST['thea_uid'];


$skills_uid = $thea_uid;
//echo "skills_uid: $skills_uid";

echo "
<HTML>
<HEAD>
<TITLE>Strawhat Update Theatre Jobs, Skills Information</TITLE>
<link rel=\"stylesheet\" href=\"theatre.css\" type=\"text/css\">
</HEAD>
<body>
";
include("banner.inc");

echo "
<table align=\"center\">
	<tr>
	<td align = \"center\"> 
	<FORM method=\"POST\" action= \"/TheatreEntry11/profile_change/changes.php\">
	<input type = \"hidden\" name = \"thea_uid\" value = \"$thea_uid\">
	<INPUT type=\"submit\" value =\"Back to Change Theatre Application Menu\">
	</FORM>	
	</td>

	
	<td align = \"center\">
	<FORM method=\"\" action=\"/index.php\">
	<input type=\"submit\" value=\"Leave Theatre Application (No Changes Recorded)\" name=\"endentry\">
	</form>
	</td>
	</tr>	
</table>
";



if (!$thea_uid) {
	echo "No thea_uid found (skills.modifyrecord2) in Theatre Application, if the error persists contact StrawHat Auditions";
	exit;
	}

//12/2/12 check to make sure skills exist
/*SQL statement to check if uid exists in module;
otherwise insert uid into module. */

/*if needed, insert skills_uid*/
//$sql_insert_skills = "INSERT INTO theaskills12 (skills_uid) VALUES ('$thea_uid')";
    	
	
//include("../../Comm/connect.inc");


/*execute SQL query for checking if roles_uid exists, don't echo Record Inserted*/

	//if (mysql_query($sql_insert_skills,$connection)) {
		//echo "RI";
	//}
    
include("../../Comm/connect.inc");

//SQL statement to select record THEASKILLS12
$sql = "SELECT * FROM theaskills12 WHERE skills_uid = \"$thea_uid\"";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query: Select Record Theaskills.");


if (!$sql_result) {
	echo "<P>Couldn't get record!</P>";
	} else {
	

//fetch row and assign to variables
$row = mysql_fetch_array($sql_result);
$skills_uid = $row["skills_uid"];

$staff_num = $row["staff_num"];
$interns_num = $row["interns_num"];
$app_num = $row["app_num"];

$interns = $row["interns"]; 
$accomp = $row["accomp"]; 
$admin = $row["admin"]; 
$boxoffice = $row["boxoffice"];
$carpentry = $row["carpentry"]; 
$choreo = $row["choreo"]; 
$costume = $row["costume"];
$director = $row["director"]; 
$electrics = $row["electrics"]; 
$graphics = $row["graphics"]; 
$house = $row["house"]; 
$lights = $row["lights"]; 
$musicdir = $row["musicdir"]; 
$photo = $row["photo"]; 
$prod_interns = $row["prod_interns"]; 
$props = $row["props"]; 
$publicity = $row["publicity"]; 
$scenic = $row["scenic"]; 
$sets = $row["sets"];
$sewing = $row["sewing"]; 
$sound = $row["sound"]; 
$sm = $row["sm"]; 
$td = $row["td"];

$house_all = $row["house_all"];
$house_some = $row["house_some"];
$house_sub = $row["house_sub"];
$house_neg = $row["house_neg"];

$meals_all = $row["meals_all"];
$meals_some = $row["meals_all"];
$meals_kit = $row["meals_all"];
$meals_sub= $row["meals_sub"];
 
$other1 = $row["other1"]; 
$other2= $row["other2"]; 

$staff1= $row["staff1"];
$staff_per1 = $row["staff_per1"];

$staff2 = $row["staff2"];
$staff_per2 = $row["staff_per2"];

$design1= $row["design1"];
$design_per1 = $row["design_per1"];

$design2 = $row["design2"];
$design_per2 = $row["design_per2"];

$intern1 = $row["intern1"];
$intern_per1 = $row["intern_per1"];

$apprentice1 = $row["apprentice1"];
$apprentice_per1 = $row["apprentice_per1"];

$intern_unpaid = $row["intern_unpaid"];
$intern_emc = $row["intern_emc"];
$intern_room = $row["intern_room"];
$intern_board = $row["intern_board"];

$app_unpaid = $row["app_unpaid"];
$app_emc = $row["app_emc"];
$app_room = $row["app_room"];
$app_board = $row["app_board"];

$availfor = $row["availfor"];
$availto= $row["availto"];

$re_interns = $row["re_interns"]; 
$re_accomp = $row["re_accomp"]; 
$re_admin = $row["re_admin"]; 
$re_boxoffice = $row["re_boxoffice"];
$re_carpentry = $row["re_carpentry"]; 
$re_choreo = $row["re_choreo"]; 
$re_costume = $row["re_costume"];
$re_director = $row["re_director"]; 
$re_electrics = $row["re_electrics"];
$re_graphics = $row["re_graphics"]; 
$re_house = $row["re_house"];
$re_lights = $row["re_lights"]; 
$re_musicdir = $row["re_musicdir"]; 
$re_photo = $row["re_photo"]; 
$re_prod_interns = $row["re_prod_interns"];
$re_props = $row["re_props"]; 
$re_publicity = $row["re_publicity"]; 
$re_scenic = $row["re_scenic"]; 
$re_sets = $row["re_sets"];
$re_sewing = $row["re_sewing"]; 
$re_sound = $row["re_sound"]; 
$re_sm = $row["re_sm"]; 
$re_td = $row["re_td"]; 
$re_other1 = $row["re_other1"]; 
$re_other2 = $row["re_other2"];



echo "
<TABLE width=\"80%\" align=\"center\">
<TD align = 'left'>
<P>Theatre Companies, please this form to create your Staff/Tech/Design Job Listing on our web site. To recruit the largest number of technical candidates, post your job listing as soon as possible. You can modify as your needs change.</P>

<P>Please check each area in which you currently anticipate hiring for the season. Use the <b>Remarks</b> space to indicate particular information, such as <i>Assistant Only</i>, or <i>May also operate lighting board when box office closed</i>. This creates a list of positions at your theatre as a resource for registered tech candidates.  Please note AEA or non-AEA requirements. Music Directors candidates are expected to be able to accompany and/or conduct from the piano.</p>

<P>In addition, please send us a one page description of your theatre, season and any details you wish us to provide. This should be camera ready, cleanly typed and printed, preferably on letterhead or similar presention. The description should be mailed or emailed as a pdf for reproduction.</P>
</td>
<table>
";

echo "
<form name=\"skills\" ONSUBMIT=\"return validateForm(skills)\" method=\"POST\" action=\"skills_modifyrecord3.php\">
<input type = \"hidden\" name = \"skills_uid\" value = \"$skills_uid\">
";

?>
 
 <?php
echo "      
<div align=\"center\">
  <table width=\"997\" border=\"1\" cellspacing=\"1\" cellpadding=\"1\" align=\"center\" height=\"466\">
    <tr bgcolor=\"#FFFF66\"> 
      <td colspan=\"3\"> 
        <div align=\"center\"><b>STAFF/TECHNICAL/DESIGN General Information</b></div>
      </td>
    </tr>
    <tr> 
      <td width=\"219\"><b>Total number openings</b></td>
      <td colspan=\"2\">Staff: 
        <input type=\"text\" name=\"staff_num\" size=\"3\" maxlength=\"3\" value=\"$staff_num\">
        Interns: 
        <input type=\"text\" name=\"interns_num\" size=\"3\" maxlength=\"3\" value = \"$interns_num\">
        Apprentices: 
        <input type=\"text\" name=\"app_num\" size=\"3\" maxlength=\"3\" value = \"$app_num\">
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

$datefrom_month = $mo;

/*...............AVAILABLE (FROM)...........*/
     echo "Month <select name=\"datefrom_month\">";
     
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
        
echo "        &nbsp &nbsp Day";



/*Parse availfor*/
$datefrom_day = $day;

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

echo "&nbsp &nbsp Year";

/*..........datefrom_year ...............*/

//9/25/07 to get bugs out!
//include("dateform_year.php");


/*Parse availfor*/
$datefrom_year = $year;

    echo "<select name=\"datefrom_year\">";      
    
    if($datefrom_year == "2017") {
          echo "<option selected value=\"2017\">2017</option>"; }
        else {echo "<option value=\"2017\">2017</option>";} 

    if($datefrom_year == "2018") {
          echo "<option selected value=\"2018\">2018</option>"; }
        else {echo "<option value=\"2018\">2018</option>";}
        
        if($datefrom_year == "2019") {
          echo "<option selected value=\"2019\">2019</option>"; }
        else {echo "<option value=\"2019\">2019</option>";}
        

    echo "</select>      
      
      </td>
      
      <td width=\"381\">
      <B>To:</B>
      
";


/*Parse availto*/
$mo = substr($availto, 5,2);
$day = substr($availto, 8,2);
$year = substr($availto, 0,4);
$dateto_month = $mo;

/*...............AVAILABLE TO...........*/
     echo "<select name=\"dateto_month\">";
     
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

echo "&nbsp &nbsp Day ";   


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

echo "&nbsp &nbsp Year";
/*..........dateto_year (TO)...............*/
//9/25/07 to get bugs out!
//include("dateform_year.php");


/*Parse availto*/
$dateto_year = $year;

    echo "<select name=\"dateto_year\">";      
    

    if($dateto_year == "2017") {
          echo "<option selected value=\"2017\">2017</option>"; }
        else {echo "<option value=\"2017\">2017</option>";}

    if($dateto_year == "2018") {
          echo "<option  selected value=\"2018\">2018</option>"; }
        else {echo "<option value=\"2018\">2018</option>";} 

    if($dateto_year == "2019") {
          echo "<option  selected value=\"2019\">2019</option>"; }
        else {echo "<option value=\"2019\">2019</option>";} 
    
        
    echo "</select>";      
      
      
      
echo "      
      </td>
    </tr>
    <tr> 
      <td width=\"219\"><b>Housing</b></td>
      <td colspan=\"2\"> 
";
      if(!empty($house_all) ) {
          echo "<input type=\"checkbox\" name=\"house_all\" value=\"all\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"house_all\" value=\"all\">";}    
echo "    
        Provided All
";        
        if(!empty($house_some) ) {
          echo "<input type=\"checkbox\" name=\"house_some\" value=\"som\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"house_some\" value=\"som\" >";}
echo "           
        Provided for Some 
";
        if(!empty($house_sub) ) {
          echo "<input type=\"checkbox\" name=\"house_sub\" value=\"sub\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"house_sub\" value=\"sub\" >";}
echo "        
        Subsidized 
";        
        if(!empty($house_neg) ) {
          echo "<input type=\"checkbox\" name=\"house_neg\" value=\"neg\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"house_neg\" value=\"neg\" >";}
echo "        
        Negotiable
";
         
echo "        
        </td>
    
    </tr>
    <tr> 
      <td width=\"219\"><b>Meals</b></td>
      <td colspan=\"2\">
";
      if(!empty($meals_all) ) {
          echo "<input type=\"checkbox\" name=\"meals_all\" value=\"all\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"meals_all\" value=\"all\">";}    
echo "    
        Provided All
";
      if(!empty($meals_some) ) {
          echo "<input type=\"checkbox\" name=\"meals_some\" value=\"som\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"meals_some\" value=\"som\">";}    
echo "    
        Some Provided
";
        if(!empty($meals_kit) ) {
          echo "<input type=\"checkbox\" name=\"meals_kit\" value=\"kit\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"meals_kit\" value=\"kit\" >";}       

echo "        
        Kitchen Facilities Available 
";

        if(!empty($meals_sub) ) {
          echo "<input type=\"checkbox\" name=\"meals_sub\" value=\"sub\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"meals_sub\" value=\"sub\" >";}       
echo "        
        Subsidized 
";

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
      <td width=\"397\">From $: 
        <input type=\"text\" name=\"staff1\" size=\"6\"; maxlength=\"6\" value=\"$staff1\">  
        per 
        <select name=\"staff_per1\">
";        

      if($staff_per1 == "Week") {
          echo "<option selected value=\"Week\">Week</option>"; }
        else {echo "<option value=\"Week\">Week</option>";}
      if($staff_per1 == "Month") {
          echo "<option selected value=\"Month\">Month</option>"; }
        else {echo "<option value=\"Month\">Month</option>";}          
      if($staff_per1 == "Season") {
          echo "<option selected value=\"Season\">Season</option>"; }
        else {echo "<option value=\"Season\">Season</option>";}
      if($staff_per1 == "Show") {
          echo "<option selected value=\"Show\">Show</option>"; }
          else {echo "<option value=\"Show\">Show</option>";}        
      if($staff_per1 == "Other") {
          echo "<option selected value=\"Other\">Other</option>"; }
          else {echo "<option value=\"Other\">Other</option>";}        
            
echo "    </select>
      </td>
      <td width=\"381\">To$: 
        <input type=\"text\" name=\"staff2\" size=\"6\"; maxlength=\"6\" value=\"$staff2\">
        per 
        
        <select name=\"staff_per2\">
";        
      if($staff_per2 == "Week") {
          echo "<option selected value=\"Week\">Week</option>"; }
        else {echo "<option value=\"Week\">Week</option>";}
      if($staff_per2 == "Month") {
          echo "<option selected value=\"Month\">Month</option>"; }
        else {echo "<option value=\"Month\">Month</option>";}          
      if($staff_per2 == "Season") {
          echo "<option selected value=\"Season\">Season</option>"; }
        else {echo "<option value=\"Season\">Season</option>";}
      if($staff_per2 == "Show") {
          echo "<option selected value=\"Show\">Show</option>"; }
          else {echo "<option value=\"Show\">Show</option>";}        
      if($staff_per2 == "Other") {
          echo "<option selected value=\"Other\">Other</option>"; }
        else {echo "<option value=\"Other\">Other</option>";}

        
echo "    </select>
      </td>
    </tr>
    <tr> 
      <td width=\"219\"><b>Designers</b></td>
      <td width=\"397\">From $: 
        <input type=\"text\" name=\"design1\" size=\"6\" maxlength=\"6\" value=\"$design1\">
        per 
        <select name=\"design_per1\">
";        
      if($design_per1 == "Week") {
          echo "<option selected value=\"Week\">Week</option>"; }
        else {echo "<option value=\"Week\">Week</option>";}
      if($design_per1 == "Month") {
          echo "<option selected value=\"Month\">Month</option>"; }
        else {echo "<option value=\"Month\">Month</option>";}          
      if($design_per1 == "Season") {
          echo "<option selected value=\"Season\">Season</option>"; }
        else {echo "<option value=\"Season\">Season</option>";}
      if($design_per1 == "Show") {
          echo "<option selected value=\"Show\">Show</option>"; }
          else {echo "<option value=\"Show\">Show</option>";}              
      if($design_per1 == "Other") {
          echo "<option selected value=\"Other\">Other</option>"; }
        else {echo "<option value=\"Other\">Other</option>";}    


          
 echo " </select>
      </td>
      <td width=\"381\">To$: 
        <input type=\"text\" name=\"design2\" size=\"6\" maxlength=\"6\" value=\"$design2\">
        per 
        <select name=\"design_per2\">
";        
        if($design_per2 == "Week") {
          echo "<option selected value=\"Week\">Week</option>"; }
        else {echo "<option value=\"Week\">Week</option>";}
        
        if($design_per2 == "Month") {
          echo "<option selected value=\"Month\">Month</option>"; }
        else {echo "<option value=\"Month\">Month</option>";}          
        
        if($design_per2 == "Season") {
          echo "<option selected value=\"Season\">Season</option>"; }
        else {echo "<option value=\"Season\">Season</option>";}
        
        if($design_per2 == "Show") {
          echo "<option selected value=\"Show\">Show</option>"; }
          else {echo "<option value=\"Show\">Show</option>";}        
        
        if($design_per2 == "Other") {
          echo "<option selected value=\"Other\">Other</option>"; }
        else {echo "<option value=\"Other\">Other</option>";}
                
                     
echo "  </select>
      </td>
    </tr>
    <tr> 
      <td width=\"219\"><b>Interns</b></td>
      <td width=\"397\">From $: 
        <input type=\"text\" name=\"intern1\" size=\"6\" maxlength=\"6\" value=\"$intern1\">
        per 
        <select name=\"intern_per1\">
";        
        if($intern_per1 == "Week") {
          echo "<option selected value=\"Week\">Week</option>"; }
        else {echo "<option value=\"Week\">Week</option>";}
        
        if($intern_per1 == "Month") {
          echo "<option selected value=\"Month\">Month</option>"; }
        else {echo "<option value=\"Month\">Month</option>";}          
        
        if($intern_per1 == "Season") {
          echo "<option selected value=\"Season\">Season</option>"; }  
        else {echo "<option value=\"Season\">Season</option>";}
        
        if($intern_per1 == "Show") {
          echo "<option selected value=\"Show\">Show</option>"; }
          else {echo "<option value=\"Show\">Show</option>";}        
        
        if($intern_per1 == "Other") {
          echo "<option selected value=\"Other\">Other</option>"; }
        else {echo "<option value=\"Other\">Other</option>";}
        
                     
echo "    </select>
      </td>
      <td colspan=\"2\" width=\"381\"> 

";
      if(!empty($intern_unpaid) ) {
          echo "<input type=\"checkbox\" name=\"intern_unpaid\" value=\"Unpaid\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"intern_unpaid\" value=\"Unpaid\">";}    
echo "    
        Unpaid
";        
        if(!empty($intern_emc) ) {
          echo "<input type=\"checkbox\" name=\"intern_emc\" value=\"EMC\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"intern_emc\" value=\"EMC\" >";}
echo "           
        EMC 
";
        if(!empty($intern_room) ) {
          echo "<input type=\"checkbox\" name=\"intern_room\" value=\"Room\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"intern_room\" value=\"Room\" >";}
echo "        
        Room 
";        
        if(!empty($intern_board) ) {
          echo "<input type=\"checkbox\" name=\"intern_board\" value=\"Board\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"intern_board\" value=\"Board\" >";}
echo "        
        Board
";
         
echo "        
        </td>
    </tr>
    <tr> 
      <td width=\"219\"><b>Apprentices</b></td>
      <td width=\"397\">From $: 
        <input type=\"text\" name=\"apprentice1\" size=\"6\" maxlength=\"6\" value=\"$apprentice1\">
        per 
        <select name=\"apprentice_per1\">
";      if($apprentice_per1 == "Week") {
          echo "<option selected value=\"Week\">Week</option>"; }
        else {echo "<option value=\"Week\">Week</option>";}
        if($apprentice_per1 == "Month") {
          echo "<option selected value=\"Month\">Month</option>"; }
        else {echo "<option value=\"Month\">Month</option>";}          
        if($apprentice_per1 == "Season") {
          echo "<option selected value=\"Season\">Season</option>"; }
        else {echo "<option value=\"Season\">Season</option>";}             
        if($apprentice_per1 == "Show") {
          echo "<option selected value=\"Show\">Show</option>"; }
        else {echo "<option value=\"Show\">Show</option>";}             
        if($apprentice_per1 == "Other") {
          echo "<option selected value=\"Other\">Other</option>"; }
        else {echo "<option value=\"Other\">Other</option>";}             

        
echo "   </select>
      </td>
      <td colspan=\"2\" width=\"381\"> 
      
";
      if(!empty($app_unpaid) ) {
          echo "<input type=\"checkbox\" name=\"app_unpaid\" value=\"Unpaid\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"app_unpaid\" value=\"Unpaid\">";}    
echo "    
        Unpaid
";        
        if(!empty($app_emc) ) {
          echo "<input type=\"checkbox\" name=\"app_emc\" value=\"EMC\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"app_emc\" value=\"EMC\" >";}
echo "           
        EMC 
";
        if(!empty($app_room) ) {
          echo "<input type=\"checkbox\" name=\"app_room\" value=\"Room\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"app_room\" value=\"Room\" >";}
echo "        
        Room 
";        
        if(!empty($app_board) ) {
          echo "<input type=\"checkbox\" name=\"app_board\" value=\"Board\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"app_board\" value=\"Board\" >";}
echo "        
        Board
";
         
echo "        
        </td>
    </tr>
  </table>
</div>
";


echo "
  <table width=\"55%\" border=\"1\" align=\"center\">

    <tr> 
      <td bgcolor=\"#FFFF66\"> <div align=\"center\"><b>Job Posting:</b></div></td>
      <td bgcolor=\"#FFFF66\"> <div align=\"center\"><b>Remarks:</b></div></td>

    </tr>
	
    
	<tr> 
          
      <td>
";
	if(!empty($interns) ) {
	  	echo "<input type=\"checkbox\" name=\"interns\" value=\"Acting/Tech Interns\" checked > "; }
		else {echo "<input type=\"checkbox\" name=\"interns\" value=\"Acting/Tech Interns\" >";}	
echo "
        Acting/Tech Interns
        </td>
        
        <td>     
         <input type=\"text\" name=\"re_interns\" maxlength=\"75\" size=\"75\" value=\"$re_interns\" >
        </td>
        </tr>

<tr>		
      <td>  
";
	if(!empty($accomp) ) {
	  	echo "<input type=\"checkbox\" name=\"accomp\" value=\"Accompanist\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"accomp\" value=\"Accompanist\">";}	
        
echo "
        Accompanist
		</td>                           
<td>
    <input type=\"text\" name=\"re_accomp\" maxlength=\"75\" size=\"75\" value=\"$re_accomp\" >
</td>
</tr>

<tr>
<td>                
";
	if(!empty($admin) ) {
	  	echo "<input type=\"checkbox\" name=\"admin\" value=\"Administration\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"admin\" value=\"Administration\">";}	
echo "
        Administration
</td>

<td>
    <input type=\"text\" name=\"re_admin\" maxlength=\"75\" size=\"75\" value=\"$re_admin\" >            
</td>		
</tr>

<tr>
<td>
";
	if(!empty($boxoffice) ) {
	  	echo "<input type=\"checkbox\" name=\"boxoffice\" value=\"Box Office\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"boxoffice\" value=\"Box Office\">";}	
echo "        
        Box Office
</td>
		
<td>
    <input type=\"text\" name=\"re_boxoffice\" maxlength=\"75\" size=\"75\" value=\"$re_boxoffice\" >
</td>
</tr>

<tr>
<td>                
";
	if(!empty($carpentry) ) {
	  	echo "<input type=\"checkbox\" name=\"carpentry\" value=\"Carpentry\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"carpentry\" value=\"Carpentry\">";}	
echo "
        Carpentry
</td>

<td>
    <input type=\"text\" name=\"re_carpentry\" maxlength=\"75\" size=\"75\" value=\"$re_carpentry\" >
</td>                
</tr>

<tr>
<td>
";
	if(!empty($choreo) ) {
	  	echo "<input type=\"checkbox\" name=\"choreo\" value=\"Choreographer\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"choreo\" value=\"Choreographer\">";}	
echo "
        Choreographer
</td>
      
<td>
      <input type=\"text\" name=\"re_choreo\" maxlength=\"75\" size=\"75\" value=\"$re_choreo\" >      
</td>
</tr>

<tr>
<td>      
";
	if(!empty($costume) ) {
	  	echo "<input type=\"checkbox\" name=\"costume\" value=\"Costume Design\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"costume\" value=\"Costume Design\">";}	
echo "        
        Costume Design
</td>
		
<td>
    <input type=\"text\" name=\"re_costume\" maxlength=\"75\" size=\"75\" value=\"$re_costume\" >             
</td>
</tr>

<tr>
<td>    
";
	if(!empty($director) ) {
	  	echo "<input type=\"checkbox\" name=\"director\" value=\"Director\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"director\" value=\"Director\">";}	
echo "
        Director</font>
</td>
        
<td>
      <input type=\"text\" name=\"re_director\" maxlength=\"75\" size=\"75\" value=\"$re_director\" >             
</td>
</tr>

<tr>
<td>     
";
	if(!empty($sewing) ) {
	  	echo "<input type=\"checkbox\" name=\"sewing\" value=\"Sewing\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"sewing\" value=\"Sewing\">";}	
echo "
        Sewing/Wardrobe
		</td>
<td>
        <input type=\"text\" name=\"re_sewing\" maxlength=\"75\" size=\"75\" value=\"$re_sewing\" >        
</tr>        
        
<tr>        
<td> 
";
	if(!empty($graphics) ) {
	  	echo "<input type=\"checkbox\" name=\"graphics\" value=\"Graphics\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"graphics\" value=\"Graphics\">";}	
echo "        
        Graphics</td>
<td> 
        <input type=\"text\" name=\"re_graphics\" maxlength=\"75\" size=\"75\" value=\"$re_graphics\" >
</td>
</tr>

<tr>
<td>        
";
    if(!empty($house) ) {
          echo "<input type=\"checkbox\" name=\"house\" value=\"House Management\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"house\" value=\"House Management\">";}    
echo "        
        House</td>
<td> 
        <input type=\"text\" name=\"re_house\" maxlength=\"75\" size=\"75\" value=\"$re_house\" >
</td>
</tr>

<tr>
<td>        
";
    if(!empty($lights) ) {
          echo "<input type=\"checkbox\" name=\"lights\" value=\"Lighting Design\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"lights\" value=\"Lighting Design\">";}    
echo "        
        Lights</td>
<td> 
        <input type=\"text\" name=\"re_lights\" maxlength=\"75\" size=\"75\" value=\"$re_lights\" >
</td>
</tr>

<tr>
<td>        
";
    if(!empty($electrics) ) {
          echo "<input type=\"checkbox\" name=\"electrics\" value=\"Electrics\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"electrics\" value=\"Electrics\">";}    
echo "        
        Electrics</td>
<td> 
        <input type=\"text\" name=\"re_electrics\" maxlength=\"75\" size=\"75\" value=\"$re_electrics\" >
</td>
</tr>

<tr>
<td>        
";
    if(!empty($musicdir) ) {
          echo "<input type=\"checkbox\" name=\"musicdir\" value=\"Music Director\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"musicdir\" value=\"Music Director\">";}    
echo "        
        Music Director</td>
<td> 
        <input type=\"text\" name=\"re_musicdir\" maxlength=\"75\" size=\"75\" value=\"$re_musicdir\" >
</td>
</tr>

<tr>
<td>        
";
    if(!empty($photo) ) {
          echo "<input type=\"checkbox\" name=\"photo\" value=\"Photography\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"photo\" value=\"Photography\">";}    
echo "        
        Photography</td>
<td> 
        <input type=\"text\" name=\"re_photo\" maxlength=\"75\" size=\"75\" value=\"$re_photo\" >
</td>
</tr>

<tr>
<td>        
";
    if(!empty($prod_interns) ) {
          echo "<input type=\"checkbox\" name=\"prod_interns\" value=\"Production Interns\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"prod_interns\" value=\"Production Interns\">";}    
echo "        
        Production Interns</td>
<td> 
        <input type=\"text\" name=\"re_prod_interns\" maxlength=\"75\" size=\"75\" value=\"$re_prod_interns\" >
</td>
</tr>

<tr>
<td>        
";
    if(!empty($props) ) {
          echo "<input type=\"checkbox\" name=\"props\" value=\"Properties\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"props\" value=\"Properties\">";}    
echo "        
        Properties</td>
<td> 
        <input type=\"text\" name=\"re_props\" maxlength=\"75\" size=\"75\" value=\"$re_props\" >
</td>
</tr>

<tr>
<td>        
";
    if(!empty($publicity) ) {
          echo "<input type=\"checkbox\" name=\"publicity\" value=\"Publicity\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"publicity\" value=\"Publicity\">";}    
echo "        
        Publicity</td>
<td> 
        <input type=\"text\" name=\"re_publicity\" maxlength=\"75\" size=\"75\" value=\"$re_publicity\" >
</td>
</tr>

<tr>
<td>        
";
    if(!empty($scenic) ) {
          echo "<input type=\"checkbox\" name=\"scenic\" value=\"Scenic Artist\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"scenic\" value=\"Scenic Artist\">";}    
echo "        
        Scenic Artist</td>
<td> 
        <input type=\"text\" name=\"re_scenic\" maxlength=\"75\" size=\"75\" value=\"$re_scenic\" >
</td>
</tr>

<tr>
<td>        
";
    if(!empty($sets) ) {
          echo "<input type=\"checkbox\" name=\"sets\" value=\"Set Design\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"sets\" value=\"Set Design\">";}    
echo "        
        Set Design</td>
<td> 
        <input type=\"text\" name=\"re_sets\" maxlength=\"75\" size=\"75\" value=\"$re_sets\" >
</td>
</tr>

<tr>
<td>        
";
    if(!empty($sound) ) {
          echo "<input type=\"checkbox\" name=\"sound\" value=\"Sound\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"sound\" value=\"Sound\">";}    
echo "        
        Sound</td>
<td> 
        <input type=\"text\" name=\"re_sound\" maxlength=\"75\" size=\"75\" value=\"$re_sound\" >
</td>
</tr>

<tr>
<td>        
";
    if(!empty($sm) ) {
          echo "<input type=\"checkbox\" name=\"sm\" value=\"Stage Management\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"sm\" value=\"Stage Management\">";}    
echo "        
        Stage Management</td>
<td> 
        <input type=\"text\" name=\"re_sm\" maxlength=\"75\" size=\"75\" value=\"$re_sm\" >
</td>
</tr>

<tr>
<td>        
";
    if(!empty($td) ) {
          echo "<input type=\"checkbox\" name=\"td\" value=\"Technical Direction\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"td\" value=\"Technical Direction\">";}    
echo "        
        Technical Direction</td>
<td> 
        <input type=\"text\" name=\"re_td\" maxlength=\"75\" size=\"75\" value=\"$re_td\" >
</td>
</tr>

<tr>
<td>        
";
    if(!empty($other1) ) {
          echo "<input type=\"checkbox\" name=\"other1\" value=\"Other (1)\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"other1\" value=\"Other (1)\">";}    
echo "        
        Other (1)</td>
<td> 
        <input type=\"text\" name=\"re_other1\" maxlength=\"75\" size=\"75\" value=\"$re_other1\" >
</td>
</tr>

<tr>
<td>        
";
    if(!empty($other2) ) {
          echo "<input type=\"checkbox\" name=\"other2\" value=\"Other (2)\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"other2\" value=\"Other (2)\">";}    
echo "        
        Other (2)</td>
<td> 
        <input type=\"text\" name=\"re_other2\" maxlength=\"75\" size=\"75\" value=\"$re_other2\" >
</td>
</tr>      
";


echo "
      &nbsp</font>
</td>
</tr>    
    

    <tr> 
      <td colspan=\"6\" align = \"center\"> 
        <input type=\"submit\" value=\"Enter and Review Changes\" name=\"submit\">
      </td>

    </tr>
  </table>
  
</FORM>
</BODY>
</HTML>
";
}
?>