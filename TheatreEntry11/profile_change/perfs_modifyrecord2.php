<?php
//Theatre Performers Application: based on skills_modifyrecord2.php

$thea_uid = $_POST['thea_uid'];
//assign thea to perf uid
//$perf_uid = $thea_uid;


//$skills_uid = $thea_uid;
//echo "skills_uid: $skills_uid";

echo "
<HTML>
<HEAD>
<TITLE>Strawhat Update Theatre Performers Information</TITLE>
<link rel=\"stylesheet\" href=\"theatre.css\" type=\"text/css\">
</HEAD>
</body>
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
//beginning of new section
if (!$thea_uid) {
    echo "No thea_uid found (perf_modifyrecord2) in Theatre Application, if the error persists contact StrawHat Auditions";
    exit;
    }
    
    
include("../../Comm/connect.inc");

//SQL statement to select all from theaperf11
$sql = "SELECT * FROM theaperf11 WHERE perf_uid = \"$thea_uid\"";

//execute SQL query and get result    
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query: Select Record and Connect.");


if (!$sql_result) {
    echo "<P>Couldn't get record!</P>";
    } else {
    

//fetch row and assign l variables, use perf uid?
$row = mysql_fetch_array($sql_result);
$perf_uid = $row["perf_uid"];
$eq_num = $row["eq_num"];
$noneq_num = $row["noneq_num"];
$act_availfor = $row["act_availfor"];
$act_availto = $row["act_availto"];
$acthouse_all = $row["acthouse_all"];
$acthouse_some = $row["acthouse_some"];
$acthouse_sub = $row["acthouse_sub"];
$acthouse_neg = $row["acthouse_neg"];
$actmeals_all = $row["actmeals_all"];
$actmeals_some = $row["actmeals_some"];
$actmeals_kit = $row["actmeals_kit"];
$actmeals_sub = $row["actmeals_sub"];
// wrong label 8/30/13.$actmeals_neg = $row["actmeals_neg"];

$int_co = $row["int_co"];
$int_int = $row["int_int"];
$int_app = $row["int_app"];
$int_availfor = $row["int_availfor"];
$int_availto = $row["int_availto"];
$inthouse_all = $row["inthouse_all"];
$inthouse_some = $row["inthouse_some"];
$inthouse_sub = $row["inthouse_sub"];
$inthouse_neg = $row["inthouse_neg"];
$intmeals_all = $row["intmeals_all"];
$intmeals_some = $row["intmeals_some"];
$intmeals_kit = $row["intmeals_kit"];
$intmeals_sub = $row["intmeals_sub"];

$app_co = $row["app_co"];
$app_availto = $row["app_availto"];
$app_availfor = $row["app_availfor"];
$apphouse_all = $row["apphouse_all"];
$apphouse_some = $row["apphouse_some"];
$apphouse_sub = $row["apphouse_sub"];
$apphouse_neg = $row["apphouse_neg"];
$appmeals_all = $row["appmeals_all"];
$appmeals_some = $row["appmeals_some"];
$appmeals_kit = $row["appmeals_kit"];
$appmeals_sub = $row["appmeals_sub"];

$music_co = $row["music_co"];
//$music_availfor = $row["music_availfor"];
//$music_availto = $row["music_availto"];
$musichouse_all = $row["musichouse_all"];
$musichouse_some = $row["musichouse_some"];
$musichouse_sub = $row["musichouse_sub"];
$musichouse_neg = $row["musichouse_neg"];

$musicmeals_all = $row["musicmeals_all"];
$musicmeals_some = $row["musicmeals_some"];
$musicmeals_kit = $row["musicmeals_kit"];
$musicmeals_sub = $row["musicmeals_sub"];

$noneq1 = $row["noneq1"];
$noneq_per1 = $row["noneq_per1"];
$noneq2 = $row["noneq2"];
$noneq_per2 = $row["noneq_per2"];


$music1 = $row["music1"];
$music_per1 = $row["music_per1"];
$music_unpaid = $row["music_unpaid"];
$music_emc = $row["music_emc"];
$music_room = $row["music_room"];
$music_board = $row["music_board"];
$music_inst = $row["music_inst"];

$interns1 = $row["interns1"];
$interns_per1 = $row["interns_per1"];
$interns_unpaid = $row["interns_unpaid"];
$interns_emc = $row["interns_emc"];
$interns_room = $row["interns_room"];
$interns_board = $row["interns_board"];

$app1 = $row["app1"];
$app_per1 = $row["app_per1"];
$app_unpaid = $row["app_unpaid"];
$app_emc = $row["app_emc"];
$app_room = $row["app_room"];
$app_board = $row["app_board"];


echo "

<form name=\"perfs\" ONSUBMIT=\"return validateForm(perfs)\" method=\"POST\" action=\"perfs_modifyrecord3.php\">
<input type = \"hidden\" name = \"perf_uid\" value = \"$thea_uid\">

<div align=\"center\">
  <table width=\"75%\" border=\"1\" cellspacing=\"1\" cellpadding=\"1\">
    <tr bgcolor=\"#FFFF66\"> 
      <td colspan=\"2\"> 
        <div align=\"center\"><H2>PERFORMERS</H2></div>
      </td>
    </tr>
    
    <tr> 
      <td width=\"19%\"><b>Approximate Contract Dates</b></td>
      <td width=\"81%\">
      <b>--FROM:--</b> 
";    
/*DATES FOR ACTORS*/
/*Parse availfor*/
$mo = substr($act_availfor, 5,2);
$day = substr($act_availfor, 8,2);
$year = substr($act_availfor, 0,4);

$datefrom_month = $mo;  
      
      /*...............AVAILABLE (FROM)...........*/
      
     echo "<select name=\"datefrom_month\">";
     
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

    
    echo "</select>"; 
    
            
//END OF DATE FROM DAY, MONTH, YEAR

echo  "<b>--TO:--</b>";   

/*Parse availto*/
$mo = substr($act_availto, 5,2);
$day = substr($act_availto, 8,2);
$year = substr($act_availto, 0,4);

$dateto_month = $mo;


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
          echo "<option selected value=\"2018\">2018</option>"; }
        else {echo "<option value=\"2018\">2018</option>";}

    
    echo "</select>";      





//END of ACTOR DATE TO DAY, MONTH, YEAR
echo "
      </td>
    </tr>
    <tr> 
    
    
    <tr> 
      <td width=\"19%\"><b>Acting Company</b></td>
      <td width=\"81%\">&nbsp; </td>
    </tr>
    <tr> 
      <td width=\"19%\">Total number of openings:</td>
      <td width=\"81%\">Equity 
        <input type=\"text\" name=\"eq_num\" size=\"3\" maxlength=\"3\" value=\"$eq_num\">
        Non-Equity 
        <input type=\"text\" name=\"noneq_num\" size=\"3\" maxlength=\"3\" value=\"$noneq_num\">
      </td>
    </tr>
";   
echo "
    <tr> 
      <td width=\"19%\">Actor Housing</td>
      <td width=\"81%\">
      
";
//ACTING COMPANY CHECKBOXES
      if(!empty($acthouse_all) ) {
          echo "<input type=\"checkbox\" name=\"acthouse_all\" value=\"all\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"acthouse_all\" value=\"all\">";}    
echo "    
        Provided All
";        
        if(!empty($acthouse_some) ) {
          echo "<input type=\"checkbox\" name=\"acthouse_some\" value=\"som\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"acthouse_some\" value=\"som\" >";}
echo "           
        Provided for Some 
";
        if(!empty($acthouse_sub) ) {
          echo "<input type=\"checkbox\" name=\"acthouse_sub\" value=\"sub\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"acthouse_sub\" value=\"sub\" >";}
echo "        
        Subsidized 
";        
        if(!empty($acthouse_neg) ) {
          echo "<input type=\"checkbox\" name=\"acthouse_neg\" value=\"neg\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"acthouse_neg\" value=\"neg\" >";}
echo "        
        Negotiable
";
         
echo "        

 </td>
    </tr>
    <tr> 
      <td width=\"19%\">Actor Meals</td>
      <td width=\"81%\"> 
";
//ACTING MEALS checkboxs
      if(!empty($actmeals_all) ) {
          echo "<input type=\"checkbox\" name=\"actmeals_all\" value=\"all\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"actmeals_all\" value=\"all\">";}    
echo "    
        All Provided
";        
        if(!empty($actmeals_some) ) {
          echo "<input type=\"checkbox\" name=\"actmeals_some\" value=\"som\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"actmeals_some\" value=\"som\" >";}
echo "           
        Some Provided
";

        if(!empty($actmeals_kit) ) {
          echo "<input type=\"checkbox\" name=\"actmeals_kit\" value=\"kit\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"actmeals_kit\" value=\"kit\" >";}
echo "           
        Kitchen Facilities Available 
";
        if(!empty($actmeals_sub) ) {
          echo "<input type=\"checkbox\" name=\"actmeals_sub\" value=\"sub\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"actmeals_sub\" value=\"sub\" >";}
echo "        
        Subsidized 
";        


echo "        
      
      </td>
    </tr>
    <tr> 
      <td width=\"19%\">&nbsp;</td>
      <td width=\"81%\">&nbsp;</td>
    </tr>
    <tr> 
      <td width=\"19%\"><b>Interns</b></td>
      <td width=\"81%\">&nbsp;</td>
    </tr>
    <tr> 
      <td width=\"19%\">Total number of openings</td>
      <td width=\"81%\">";
        
        //Company <input type=\"text\" name=\"int_co\" size=\"3\" maxlength=\"10\" value=\"$int_co\">
        echo "
        Interns 
        <input type=\"text\" name=\"int_int\" size=\"3\" maxlength=\"10\" value=\"$int_int\">
        ";
        
        
        //Apprentices <input type=\"text\" name=\"int_app\" size=\"3\" maxlength=\"10\" value=\"$int_app\">
      echo "
      </td>
    </tr>
        
    <tr> 
      <td width=\"19%\">Interns Housing</td>
      <td width=\"81%\">
";
//Interns housing checkboxs
      if(!empty($inthouse_all) ) {
          echo "<input type=\"checkbox\" name=\"inthouse_all\" value=\"all\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"inthouse_all\" value=\"all\">";}    
echo "    
        Provided All
";        
        if(!empty($inthouse_some) ) {
          echo "<input type=\"checkbox\" name=\"inthouse_some\" value=\"som\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"inthouse_some\" value=\"som\" >";}
echo "           
        Provided for Some 
";
        if(!empty($inthouse_sub) ) {
          echo "<input type=\"checkbox\" name=\"inthouse_sub\" value=\"sub\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"inthouse_sub\" value=\"sub\" >";}
echo "        
        Subsidized 
";        
        if(!empty($inthouse_neg) ) {
          echo "<input type=\"checkbox\" name=\"inthouse_neg\" value=\"neg\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"inthouse_neg\" value=\"neg\" >";}
echo "        
        Negotiable
";
         
echo "        
      
    </tr>
    <tr> 
      <td width=\"19%\">Intern Meals</td>
      <td width=\"81%\"> 
";
//Interns Meals checkboxs
      if(!empty($intmeals_all) ) {
          echo "<input type=\"checkbox\" name=\"intmeals_all\" value=\"all\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"intmeals_all\" value=\"all\">";}    
echo "    
        All Provided
";        
        if(!empty($intmeals_some) ) {
          echo "<input type=\"checkbox\" name=\"intmeals_some\" value=\"som\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"intmeals_some\" value=\"som\" >";}
echo "           
        Some Provided 
";
        if(!empty($intmeals_kit) ) {
          echo "<input type=\"checkbox\" name=\"intmeals_kit\" value=\"kit\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"intmeals_kit\" value=\"kit\" >";}
echo "        
        Kitchen Facilites Available 
";        
        if(!empty($intmeals_sub) ) {
          echo "<input type=\"checkbox\" name=\"intmeals_sub\" value=\"sub\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"intmeals_sub\" value=\"sub\" >";}
echo "        
        Subsidized
";
         
echo "        
      
      </td>
    </tr>
    <tr> 
      <td width=\"19%\">&nbsp;</td>
      <td width=\"81%\">&nbsp;</td>
    </tr>
    <tr> 
      <td width=\"19%\"><b>Apprentices</b></td>
      <td width=\"81%\">&nbsp;</td>
    </tr>
    <tr> 
      <td width=\"19%\">Total number of openings</td>
      <td width=\"81%\">Apprentices 
        <input type=\"text\" name=\"app_co\" size=\"10\" maxlength=\"3\" value=\"$app_co\">
      </td>
    </tr>
   
    <tr> 
      <td width=\"19%\">Housing</td>
      <td width=\"81%\"> 
";
//Apprentice HOUSING checkboxs
      if(!empty($apphouse_all) ) {
          echo "<input type=\"checkbox\" name=\"apphouse_all\" value=\"all\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"apphouse_all\" value=\"all\">";}    
echo "    
        All Provided
";        
        if(!empty($apphouse_some) ) {
          echo "<input type=\"checkbox\" name=\"apphouse_some\" value=\"som\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"apphouse_some\" value=\"som\" >";}
echo "           
        Provided for Some 
";
        if(!empty($apphouse_sub) ) {
          echo "<input type=\"checkbox\" name=\"apphouse_sub\" value=\"sub\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"apphouse_sub\" value=\"sub\" >";}
echo "        
        Subsidized
";        
        if(!empty($apphouse_neg) ) {
          echo "<input type=\"checkbox\" name=\"apphouse_neg\" value=\"neg\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"apphouse_neg\" value=\"neg\" >";}
echo "        
        Negotiable
";
         
echo "        
        </td>
    </tr>
    <tr> 
      <td width=\"19%\">Meals</td>
      <td width=\"81%\">
";
//Music Meals checkboxs
      if(!empty($appmeals_all) ) {
          echo "<input type=\"checkbox\" name=\"appmeals_all\" value=\"all\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"appmeals_all\" value=\"all\">";}    
echo "    
        All Provided
";        
        if(!empty($appmeals_some) ) {
          echo "<input type=\"checkbox\" name=\"appmeals_some\" value=\"som\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"appmeals_some\" value=\"som\" >";}
echo "           
        Some Provided 
";
        if(!empty($appmeals_kit) ) {
          echo "<input type=\"checkbox\" name=\"appmeals_kit\" value=\"kit\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"appmeals_kit\" value=\"kit\" >";}
echo "        
        Kitchen Facilites Available 
";        
        if(!empty($appmeals_sub) ) {
          echo "<input type=\"checkbox\" name=\"appmeals_sub\" value=\"sub\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"appmeals_sub\" value=\"sub\" >";}
echo "        
        Subsidized
";
         
echo "        
      
       </td>
    </tr>
    <tr> 
      <td width=\"19%\">&nbsp;</td>
      <td width=\"81%\">&nbsp;</td>
    </tr>
    <tr> 
      <td width=\"19%\"><b>Musicians</b></td>
      <td width=\"81%\">&nbsp;</td>
    </tr>
    <tr> 
      <td width=\"19%\">Total number of openings</td>
      <td width=\"81%\">Musicians 
        <input type=\"text\" name=\"music_co\" size=\"10\" maxlength=\"3\" value=\"$music_co\">
        Instruments 
        <input type=\"text\" name=\"music_inst\" size=\"75\" maxlength=\"75\" value=\"$music_inst\">
      </td>
    </tr>

    <tr> 
      <td width=\"19%\">Housing</td>      
      <td width=\"81%\">
";
//MUSIC HOUSING checkboxs
      if(!empty($musichouse_all) ) {
          echo "<input type=\"checkbox\" name=\"musichouse_all\" value=\"all\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"musichouse_all\" value=\"all\">";}    
echo "    
        All Provided
";        
        if(!empty($musichouse_some) ) {
          echo "<input type=\"checkbox\" name=\"musichouse_some\" value=\"som\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"musichouse_some\" value=\"som\" >";}
echo "           
        Some Provided 
";
        if(!empty($musichouse_sub) ) {
          echo "<input type=\"checkbox\" name=\"musichouse_sub\" value=\"sub\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"musichouse_sub\" value=\"sub\" >";}
echo "        
        Subsidized 
";        
        if(!empty($musichouse_neg) ) {
          echo "<input type=\"checkbox\" name=\"musichouse_neg\" value=\"neg\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"musichouse_neg\" value=\"neg\" >";}
echo "        
        Negotiable
";
         
echo "        
      
      </td>
    </tr>
    <tr> 
      <td width=\"19%\">Meals</td>
      <td width=\"81%\">
";
//MUSIC MEALS checkboxs
      if(!empty($musicmeals_all) ) {
          echo "<input type=\"checkbox\" name=\"musicmeals_all\" value=\"all\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"musicmeals_all\" value=\"all\">";}    
echo "    
        All Provided
";        
        if(!empty($musicmeals_some) ) {
          echo "<input type=\"checkbox\" name=\"musicmeals_some\" value=\"som\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"musicmeals_some\" value=\"som\" >";}
echo "           
        Some Provided 
";
        if(!empty($musicmeals_kit) ) {
          echo "<input type=\"checkbox\" name=\"musicmeals_kit\" value=\"kit\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"musicmeals_kit\" value=\"kit\" >";}
echo "        
        Kitchen Facilities Available 
";        
        if(!empty($musicmeals_sub) ) {
          echo "<input type=\"checkbox\" name=\"musicmeals_sub\" value=\"sub\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"musicmeals_sub\" value=\"sub\" >";}
echo "        
        Subsidized
";
         
echo "

    </tr>
    <tr> 
      <td width=\"19%\">&nbsp;</td>
      <td width=\"81%\">&nbsp;</td>
    </tr>
  </table>
  <BR>
  
  <table border = \"1\">
  <tr> 
      <td colspan=\"3\"> 
        <div align=\"center\"><b>Performer General Salary Range:</b></div>
      </td>
    </tr>
    <tr> 
      <td width=\"200\"><b>Non Equity Acting Co:</b></td>
      <td width=\"350\">From $: 
        <input type=\"text\" name=\"noneq1\" size=\"6\"; maxlength=\"6\" value=\"$noneq1\">  
        per 
        <select name=\"noneq_per1\">
";        

      if($noneq_per1 == "Week") {
          echo "<option selected value=\"Week\">Week</option>"; }
        else {echo "<option value=\"Week\">Week</option>";}
        
      if($noneq_per1 == "Month") {
          echo "<option selected value=\"Month\">Month</option>"; }
        else {echo "<option value=\"Month\">Month</option>";} 
                 
      if($noneq_per1 == "Season") {
          echo "<option selected value=\"Season\">Season</option>"; }
        else {echo "<option value=\"Season\">Season</option>";}
        
      if($noneq_per1 == "Show") {
          echo "<option selected value=\"Show\">Show</option>"; }
          else {echo "<option value=\"Show\">Show</option>";}          
        
      if($noneq_per1 == "Other") {
          echo "<option selected value=\"Other\">Other</option>"; }
        else {echo "<option value=\"Other\">Other</option>";}        
            
echo "    </select>
      </td>
      <td width=\"381\">To$: 
        <input type=\"text\" name=\"noneq2\" size=\"6\"; maxlength=\"6\" value=\"$noneq2\">
        per 
        
        <select name=\"noneq_per2\">
";        
      if($noneq_per2 == "Week") {
          echo "<option selected value=\"Week\">Week</option>"; }
        else {echo "<option value=\"Week\">Week</option>";}
        
      if($noneq_per2 == "Month") {
          echo "<option selected value=\"Month\">Month</option>"; }
        else {echo "<option value=\"Month\">Month</option>";} 
                 
      if($noneq_per2 == "Season") {
          echo "<option selected value=\"Season\">Season</option>"; }
        else {echo "<option value=\"Season\">Season</option>";}
        
        if($noneq_per2 == "Show") {
          echo "<option selected value=\"Show\">Show</option>"; }
          else {echo "<option value=\"Show\">Show</option>";}        
        
      if($noneq_per2 == "Other") {
          echo "<option selected value=\"Other\">Other</option>"; }
        else {echo "<option value=\"Other\">Other</option>";}

        
echo "    </select>
      </td>
    </tr>
    <tr> 
      <td width=\"219\"><b>Interns</b></td>
      <td width=\"397\">From $: 
        <input type=\"text\" name=\"interns1\" size=\"6\" maxlength=\"6\" value=\"$interns1\">
        per 
        <select name=\"interns_per1\">
";        
      if($interns_per1 == "Week") {
          echo "<option selected value=\"Week\">Week</option>"; }
        else {echo "<option value=\"Week\">Week</option>";}
        
      if($interns_per1 == "Month") {
          echo "<option selected value=\"Month\">Month</option>"; }
        else {echo "<option value=\"Month\">Month</option>";}
                  
      if($interns_per1 == "Season") {
          echo "<option selected value=\"Season\">Season</option>"; }
        else {echo "<option value=\"Season\">Season</option>";}
        
      if($interns_per1 == "Show") {
          echo "<option selected value=\"Show\">Show</option>"; }
          else {echo "<option value=\"Show\">Show</option>";}          
            
      if($interns_per1 == "Other") {
          echo "<option selected value=\"Other\">Other</option>"; }
        else {echo "<option value=\"Other\">Other</option>";}    


          
 echo " </select>
      </td>
      <td width=\"381\">
      
";
      if(!empty($interns_unpaid) ) {
          echo "<input type=\"checkbox\" name=\"interns_unpaid\" value=\"Unpaid\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"interns_unpaid\" value=\"Unpaid\">";}    
echo "    
        Unpaid
";        
        if(!empty($interns_emc) ) {
          echo "<input type=\"checkbox\" name=\"interns_emc\" value=\"EMC\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"interns_emc\" value=\"EMC\" >";}
echo "           
        EMC 
";
        if(!empty($interns_room) ) {
          echo "<input type=\"checkbox\" name=\"interns_room\" value=\"Room\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"interns_room\" value=\"Room\" >";}
echo "        
        Room 
";        
        if(!empty($interns_board) ) {
          echo "<input type=\"checkbox\" name=\"interns_board\" value=\"Board\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"interns_board\" value=\"Board\" >";}
echo "        
        Board
";
                
                     
echo "  </select>
      </td>
    </tr>
    <tr> 
      <td width=\"219\"><b>Apprentices</b></td>
      <td width=\"397\">From $: 
        <input type=\"text\" name=\"app1\" size=\"6\" maxlength=\"6\" value=\"$app1\">
        per 
        <select name=\"app_per1\">
";        
        if($app_per1 == "Week") {
          echo "<option selected value=\"Week\">Week</option>"; }
        else {echo "<option value=\"Week\">Week</option>";}
        
        if($app_per1 == "Month") {
          echo "<option selected value=\"Month\">Month</option>"; }
        else {echo "<option value=\"Month\">Month</option>";}          
        
        if($app_per1 == "Season") {
          echo "<option selected value=\"Season\">Season</option>"; }
        else {echo "<option value=\"Season\">Season</option>";}
        
        if($app_per1 == "Show") {
          echo "<option selected value=\"Show\">Show</option>"; }
          else {echo "<option value=\"Show\">Show</option>";}        
        
        if($app_per1 == "Other") {
          echo "<option selected value=\"Other\">Other</option>"; }
        else {echo "<option value=\"Other\">Other</option>";}
        
                     
echo "    </select>
      </td>
      <td> 

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
    <tr> 
      <td width=\"219\"><b>Musicians</b></td>
      <td width=\"397\">From $: 
        <input type=\"text\" name=\"music1\" size=\"6\" maxlength=\"6\" value=\"$music1\">
        per 
        <select name=\"music_per1\">
";      if($music_per1 == "Week") {
          echo "<option selected value=\"Week\">Week</option>"; }
        else {echo "<option value=\"Week\">Week</option>";}
        
        if($music_per1 == "Month") {
          echo "<option selected value=\"Month\">Month</option>"; }
        else {echo "<option value=\"Month\">Month</option>";}          
        
        if($music_per1 == "Season") {
          echo "<option selected value=\"Season\">Season</option>"; }
        else {echo "<option value=\"Season\">Season</option>";}
        
        if($music_per1 == "Show") {
          echo "<option selected value=\"Show\">Show</option>"; }
          else {echo "<option value=\"Show\">Show</option>";}                     
        
        if($music_per1 == "Other") {
          echo "<option selected value=\"Other\">Other</option>"; }
        else {echo "<option value=\"Other\">Other</option>";}             

        
echo "   </select>
      </td>
      <td> 
      
";
      if(!empty($music_unpaid) ) {
          echo "<input type=\"checkbox\" name=\"music_unpaid\" value=\"Unpaid\" checked>"; }
        else {echo "<input type=\"checkbox\" name=\"music_unpaid\" value=\"Unpaid\">";}    
echo "    
        Unpaid
";        
        if(!empty($music_emc) ) {
          echo "<input type=\"checkbox\" name=\"music_emc\" value=\"EMC\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"music_emc\" value=\"EMC\" >";}
echo "           
        EMC 
";
        if(!empty($music_room) ) {
          echo "<input type=\"checkbox\" name=\"music_room\" value=\"Room\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"music_room\" value=\"Room\" >";}
echo "        
        Room 
";        
        if(!empty($music_board) ) {
          echo "<input type=\"checkbox\" name=\"music_board\" value=\"Board\" checked >"; }
        else {echo "<input type=\"checkbox\" name=\"music_board\" value=\"Board\" >";}
echo "        
        Board
";
         
echo "        
        </td>
    </tr>
    
<tr> 
      <td colspan=\"3\" align = \"center\"> 
        <input type=\"submit\" value=\"Enter and Review Changes\" name=\"submit\">
      </td>
</tr>    
  </table>
  
</div>
</FORM>
</body>
</html>
";
}
?>