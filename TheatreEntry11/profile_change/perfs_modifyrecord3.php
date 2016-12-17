<?php
//based on skills_modifyrecord3.php 2012
$perf_uid = $_POST['perf_uid'];
$eq_num = $_POST['eq_num'];
$noneq_num = $_POST['noneq_num'];
$act_availfor = $_POST['act_availfor'];
$act_availto = $_POST['act_availto'];
$acthouse_all = $_POST['acthouse_all'];
$acthouse_some = $_POST['acthouse_some'];
$acthouse_sub = $_POST['acthouse_sub'];
$acthouse_neg = $_POST['acthouse_neg'];
$actmeals_all = $_POST['actmeals_all'];
$actmeals_some = $_POST['actmeals_some'];
$actmeals_kit = $_POST['actmeals_kit'];
$actmeals_sub = $_POST['actmeals_sub'];

$int_co = $_POST['int_co'];
$int_int = $_POST['int_int'];
$int_app = $_POST['int_app'];
//$int_availfor = $_POST['int_availfor'];
//$int_availto = $_POST['int_availto'];
$inthouse_all = $_POST['inthouse_all'];
$inthouse_some = $_POST['inthouse_some'];
$inthouse_sub = $_POST['inthouse_sub'];
$inthouse_neg = $_POST['inthouse_neg'];
$intmeals_all = $_POST['intmeals_all'];
$intmeals_some = $_POST['intmeals_some'];
$intmeals_kit = $_POST['intmeals_kit'];
$intmeals_sub = $_POST['intmeals_sub'];

//$app_availto = $_POST['app_availto'];
//$app_availfor = $_POST['intmeals_neg'];
$apphouse_all = $_POST['apphouse_all'];
$apphouse_some = $_POST['apphouse_some'];
$apphouse_sub = $_POST['apphouse_sub'];
$apphouse_neg = $_POST['apphouse_neg'];
$appmeals_all = $_POST['appmeals_all'];
$appmeals_some = $_POST['appmeals_some'];
$appmeals_kit = $_POST['appmeals_kit'];
$appmeals_sub = $_POST['appmeals_sub'];

//$music_availfor = $_POST['music_availfor'];
//$music_availto = $_POST['music_availto'];
$music_co = $_POST['music_co'];
$musichouse_all = $_POST['musichouse_all'];
$musichouse_some = $_POST['musichouse_some'];
$musichouse_sub = $_POST['musichouse_sub'];
$musichouse_neg = $_POST['musichouse_neg'];
$musicmeals_all = $_POST['musicmeals_all'];
$musicmeals_some = $_POST['musicmeals_some'];
$musicmeals_kit = $_POST['musicmeals_kit'];
$musicmeals_sub = $_POST['musicmeals_sub'];

$noneq1 = $_POST['noneq1'];
$noneq_per1 = $_POST['noneq_per1'];
$noneq2 = $_POST['noneq2'];
$noneq_per2 = $_POST['noneq_per2'];

$interns1 = $_POST['interns1'];
$interns_per1 = $_POST['interns_per1'];
$interns_unpaid = $_POST['interns_unpaid'];
$interns_emc = $_POST['interns_emc'];
$interns_room = $_POST['interns_room'];
$interns_board = $_POST['interns_board'];

$app_co = $_POST['app_co'];
$app1 = $_POST['app1'];
$app_per1 = $_POST['app_per1'];
$app_unpaid = $_POST['app_unpaid'];
$app_emc = $_POST['app_emc'];
$app_room = $_POST['app_room'];
$app_board = $_POST['app_board'];

$music1 = $_POST['music1'];
$music_per1 = $_POST['music_per1'];
$music_unpaid = $_POST['music_unpaid'];
$music_emc = $_POST['music_emc'];
$music_room = $_POST['music_room'];
$music_board = $_POST['music_board'];
$music_inst= $_POST['music_inst'];

//dates for season
$datefrom_day = $_POST['datefrom_day'];
$datefrom_month = $_POST['datefrom_month'];
$datefrom_year = $_POST['datefrom_year'];
$dateto_day = $_POST['dateto_day'];
$dateto_month = $_POST['dateto_month'];
$dateto_year = $_POST['dateto_year'];

/*
$availfor = $_POST['availfor'];
$availto = $_POST['availto'];

//dates
$datefrom_day = $_POST['datefrom_day'];
$datefrom_month = $_POST['datefrom_month'];
$datefrom_year = $_POST['datefrom_year'];

$dateto_day = $_POST['dateto_day'];
$dateto_month = $_POST['dateto_month'];
$dateto_year = $_POST['dateto_year'];
*/
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

//actors parse availto, availfrom dates
$act_availfor = $datefrom_year . "-" . $datefrom_month . "-" . $datefrom_day;
$act_availto = $dateto_year . "-" . $dateto_month . "-" .  $dateto_day;

//SQL statement to update record
$sql = "UPDATE theaperf11 SET perf_uid = \"$perf_uid\",
eq_num=\"$eq_num\",
noneq_num=\"$noneq_num\",
int_co=\"$int_co\",
int_int=\"$int_int\",
int_app=\"$int_app\",
music_co=\"$music_co\",
app_co=\"$app_co\",

acthouse_all=\"$acthouse_all\",
acthouse_some=\"$acthouse_some\",
acthouse_sub=\"$acthouse_sub\",
acthouse_neg=\"$acthouse_neg\",
actmeals_all=\"$actmeals_all\",
actmeals_some=\"$actmeals_some\",
actmeals_kit=\"$actmeals_kit\",
actmeals_sub=\"$actmeals_sub\",

inthouse_all=\"$inthouse_all\",
inthouse_some=\"$inthouse_some\",
inthouse_sub=\"$inthouse_sub\",
inthouse_neg=\"$inthouse_neg\",
intmeals_all=\"$intmeals_all\",
intmeals_some=\"$intmeals_some\",
intmeals_kit=\"$intmeals_kit\",
intmeals_sub=\"$intmeals_sub\",

apphouse_all=\"$apphouse_all\",
apphouse_some=\"$apphouse_some\",
apphouse_sub=\"$apphouse_sub\",
apphouse_neg=\"$apphouse_neg\",
appmeals_all=\"$appmeals_all\",
appmeals_some=\"$appmeals_some\",
appmeals_kit=\"$appmeals_kit\",
appmeals_sub=\"$appmeals_sub\",

musichouse_all=\"$musichouse_all\",
musichouse_some=\"$musichouse_some\",
musichouse_sub=\"$musichouse_sub\",
musichouse_neg=\"$musichouse_neg\",
musicmeals_all=\"$musicmeals_all\",
musicmeals_some=\"$musicmeals_some\",
musicmeals_kit=\"$musicmeals_kit\",
musicmeals_sub=\"$musicmeals_sub\",

noneq1=\"$noneq1\",
noneq_per1=\"$noneq_per1\",
noneq2=\"$noneq2\",
noneq_per2=\"$noneq_per2\",

interns1=\"$interns1\",
interns_per1=\"$interns_per1\",
interns_unpaid=\"$interns_unpaid\",
interns_emc=\"$interns_emc\",
interns_room=\"$interns_room\",
interns_board=\"$interns_board\",

app1=\"$app1\",
app_per1=\"$app_per1\",
app_unpaid=\"$app_unpaid\",
app_emc=\"$app_emc\",
app_room=\"$app_room\",
app_board=\"$app_board\",

music1=\"$music1\",
music_per1=\"$music_per1\",
music_unpaid=\"$music_unpaid\",
music_emc=\"$music_emc\",
music_room=\"$music_room\",
music_board=\"$music_board\",
music_inst=\"$music_inst\",

act_availfor=\"$act_availfor\",
act_availto=\"$act_availto\"

WHERE perf_uid = \"$perf_uid\"
";

//execute SQL  and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute Update Skills query.");


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

//<input type = \"hidden\" name = \"sel_record\" value = \"$skills_uid\">
//old code for using hidden variable
	
echo "
	
<h1 align = 'center'>You have made these changes:</h1>
<FORM method = \"POST\" action = \"changes.php\">
<input type = \"hidden\" name = \"thea_uid\" value = \"$perf_uid\">
";


//confirming data from perfs_modifyrecord2
echo"


<div align=\"center\">
  <table width=\"75%\" border=\"1\" cellspacing=\"1\" cellpadding=\"1\">
    <tr bgcolor=\"#FFFF66\"> 
      <td colspan=\"2\"> 
        <div align=\"center\"><H2>PERFORMERS</H2></div>
      </td>
    </tr>
    
    <tr> 
    <td colspan =\"2\" align = \"center\"><b>Approximate Contract Dates: </b>
    <b>From:</b> $datefrom_month-$datefrom_day-$datefrom_year     
    <b>To:</b> $dateto_month-$dateto_day-$dateto_year</td>
    </tr>
    
    <tr> 
      <td width=\"19%\"><b>Acting Company</b></td>
      <td width=\"81%\">&nbsp; </td>
    </tr>
    <tr> 
      <td width=\"19%\">Total number of openings:</td>
      <td width=\"81%\">Equity: $eq_num. Non-Equity: $noneq_num.</td> 
    </tr>
";
/*    
    <tr> 
      <td width=\"19%\">Approximate Contract Dates</td>
    <td width=\"81%\">From: $act_availfor.($datefrom_month-$datefrom_day-$datefrom_year)  To: $act_availto.($dateto_month-$dateto_day-$dateto_year)</td>
    </tr>
*/
echo "
    <tr> 
      <td width=\"19%\">Actor Housing</td>
      <td width=\"81%\">
      
";
//ACTING COMPANY CHECKBOXES
        
      if(!empty($acthouse_all) ) {              
          echo "Provided All, ";}  
                  
        if(!empty($acthouse_some) ) {
          echo "Provided for Some, ";}
          
        if(!empty($acthouse_sub) ) {
          echo "Subsidized , ";}
        
        if(!empty($acthouse_neg) ) {
          echo "Negotiable";}
                   
echo "        

 </td>
    
    </tr>
    <tr> 
      <td width=\"19%\">Actor Meals</td>
      <td width=\"81%\"> 
";
//ACTOMG MEALS checkboxs
      if(!empty($actmeals_all) ) {
          echo "Provided All, "; }
          
        if(!empty($actmeals_some) ) {
          echo "Provided for Some, "; }
        
        if(!empty($actmeals_kit) ) {
          echo "Kitchen Facilities Available, "; }
        
        if(!empty($actmeals_sub) ) {
          echo "Subsidized"; }
          
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
      <td width=\"81%\">Company: $int_co.  
        
        Interns: $int_int. 
        
        Apprentices: $int_app. 
        
      </td>
    </tr>
";
/*    
    <tr> 
      <td width=\"19%\">Approximate Contract Dates</td>
      <td width=\"81%\">From: 
        <input type=\"text\" name=\"int_availfor\" size=\"10\" maxlength=\"10\" value=\"$int_availfor\">
        To: 
        <input type=\"text\" name=\"int_availto\" size=\"10\" maxlength=\"10\" value=\"$int_availfor\">
      </td>
    </tr>
*/
echo "    
    <tr> 
      <td width=\"19%\">Interns Housing</td>
      <td width=\"81%\">
";
//Interns housing checkboxs
      if(!empty($inthouse_all) ) {
          echo "Provided All, "; }
        
        if(!empty($inthouse_some) ) {
          echo "Provided for Some, "; }
        
        if(!empty($inthouse_sub) ) {
          echo "Subsidized,  "; }
        
        if(!empty($inthouse_neg) ) {
          echo "Negotiable"; }
        
         
echo "        
      
    </tr>
    <tr> 
      <td width=\"19%\">Intern Meals</td>
      <td width=\"81%\"> 
";
//Interns Meals checkboxs
      if(!empty($intmeals_all) ) {
          echo "All Provided, "; }
          
        if(!empty($intmeals_some) ) {
          echo "Some Provided, "; }
        
        if(!empty($intmeals_kit) ) {
          echo "Kitchen Facilites Available, "; }
        
        if(!empty($intmeals_sub) ) {
          echo "Subsidized"; }
         
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
      <td width=\"81%\">Apprentices: $app_co         
      </td>
    </tr>
";    
/*    
    <tr> 
      <td width=\"19%\">Approximate Contract Dates</td>
      <td width=\"81%\">From: 
        <input type=\"text\" name=\"app_availfor\" size=\"10\" maxlength=\"3\" value=\"$app_availfor\">
        To: 
        <input type=\"text\" name=\"app_availto\" size=\"10\" maxlength=\"3\" value=\"$app_availto\">
      </td>
    </tr>
*/

echo "    
    <tr> 
      <td width=\"19%\">Housing</td>
      <td width=\"81%\"> 
";
//Apprentice HOUSING checkboxs
      if(!empty($apphouse_all) ) {
          echo "Provided for All, "; }
                
        if(!empty($apphouse_some) ) {
          echo "Provided for Some, "; }

        if(!empty($apphouse_sub) ) {
          echo "Subsidized, "; }
        
        if(!empty($apphouse_neg) ) {
          echo "Negotiable"; }
                 
echo "        
        </td>
    </tr>
    <tr> 
      <td width=\"19%\">Meals</td>
      <td width=\"81%\">
";
//Apprentice Meals checkboxs
      if(!empty($appmeals_all) ) {
          echo "All Provided ,"; }
        
        if(!empty($appmeals_some) ) {
          echo "Some Provided, "; }
        
        if(!empty($appmeals_kit) ) {
          echo "Kitchen Facilites Available, "; }
          
        if(!empty($appmeals_sub) ) {
          echo "Subsidized"; }        
         
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
      <td width=\"81%\">Musicians: $music_co. 
        
        Instruments: $music_inst 
        
      </td>
    </tr>
";
/*    
    <tr> 
      <td width=\"19%\">Approximate Contract Dates</td>
      <td width=\"81%\">From: 
        <input type=\"text\" name=\"music_availfor\" size=\"10\" maxlength=\"10\" value=\"$music_availfor\">
        To: 
        <input type=\"text\" name=\"music_availto\" size=\"10\" maxlength=\"10\" value=\"$music_availto\">
      </td>
    </tr>
*/
echo "    
    <tr> 
      <td width=\"19%\">Housing</td>      
      <td width=\"81%\">
";
//MUSIC HOUSING checkboxs
      if(!empty($musichouse_all) ) {
          echo "All Provided, "; }
       
        if(!empty($musichouse_some) ) {
          echo "Some Provided, "; }
        
        if(!empty($musichouse_sub) ) {
          echo "Subsidized, "; }
          
        if(!empty($musichouse_neg) ) {
          echo "Negotiable"; }
                
echo "        
      
      </td>
    </tr>
    <tr> 
      <td width=\"19%\">Meals</td>
      <td width=\"81%\">
";
//MUSIC MEALS checkboxs
      if(!empty($musicmeals_all) ) {
          echo "All Provided, "; }

        if(!empty($musicmeals_some) ) {
          echo "Some Provided, "; }
        
        if(!empty($musicmeals_kit) ) {
          echo "Kitchen Facilities Available, "; }

        if(!empty($musicmeals_sub) ) {
          echo "Subsidized"; }
        
         
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
      <td width=\"350\">From: $$noneq1 per $noneq_per1.
        
        
";         
/*
        <select name=\"noneq_per1\">
        

     if($noneq_per1 == "Week") {
          echo "<option selected value=\"Week\">Week</option>"; }
        else {echo "<option value=\"Week\">Week</option>";}
        
      if($noneq_per1 == "Month") {
          echo "<option selected value=\"Month\">Month</option>"; }
        else {echo "<option value=\"Month\">Month</option>";}
                  
      if($noneq_per1 == "Season") {
          echo "<option selected value=\"Season\">Season</option>"; }
        else {echo "<option value=\"Season\">Season</option>";}
        
      if($noneq_per1 == "Other") {
          echo "<option selected value=\"Other\">Other</option>"; }
        else {echo "<option value=\"Other\">Other</option>";}       
            
   </select>
*/
echo " 
      </td>
      <td width=\"381\">To: $$noneq2 per $noneq_per2.
        
        
        
";
/*
<select name=\"noneq_per2\">       
      if($noneq_per2 == "Week") {.
          echo "<option selected value=\"Week\">Week</option>"; }
        else {echo "<option value=\"Week\">Week</option>";}
      if($noneq_per2 == "Month") {
          echo "<option selected value=\"Month\">Month</option>"; }
        else {echo "<option value=\"Month\">Month</option>";}          
      if($noneq_per2 == "Season") {
          echo "<option selected value=\"Season\">Season</option>"; }
        else {echo "<option value=\"Season\">Season</option>";}
      if($noneq_per2 == "Other") {
          echo "<option selected value=\"Other\">Other</option>"; }
        else {echo "<option value=\"Other\">Other</option>";}

</select>  */      
echo "    

      </td>
    </tr>
    <tr> 
      <td width=\"219\"><b>Interns</b></td>
      <td width=\"397\">From: $$interns1 per $interns_per1.
                
"; 
     /*
      if($interns_per1 == "Week") {
          echo "Week"; }
      
      if(interns_per1 == "Month") {
          echo "Month"; }
                
      if(interns_per1 == "Season") {
          echo "Season"; }
        
      if(interns_per1 == "Other") {
          echo "Other"; }

*/

          
 echo "
      </td>
      <td width=\"381\">
      
";

      if(!empty($interns_unpaid) ) {
          echo "Unpaid, "; }
        
        if(!empty($interns_emc) ) {
          echo "EMC, "; }
        
        if(!empty($interns_room) ) {
          echo "Room, "; }
          
        if(!empty($interns_board) ) {
          echo "Board"; }

                     
echo "  </select>
      </td>
    </tr>
    <tr> 
      <td width=\"219\"><b>Apprentices</b></td>
      <td width=\"397\">From: $$app1 per $app_per1
        
";        
/*        <select name=\"app_per1\">
        
        if($app_per1 == "Week") {
          echo "<option selected value=\"Week\">Week</option>"; }
        else {echo "<option value=\"Week\">Week</option>";}
        
        if($app_per1 == "Month") {
          echo "<option selected value=\"Month\">Month</option>"; }
        else {echo "<option value=\"Month\">Month</option>";}          
        
        if($app_per1 == "Season") {
          echo "<option selected value=\"Season\">Season</option>"; }
        else {echo "<option value=\"Season\">Season</option>";}
        
        if($app_per1 == "Other") {
          echo "<option selected value=\"Other\">Other</option>"; }
        else {echo "<option value=\"Other\">Other</option>";}
</select>        
*/                     
echo "    
      </td>
      <td> 

";
      if(!empty($app_unpaid) ) {
          echo "Unpaid, "; }
        
        if(!empty($app_emc) ) {
          echo "EMC, "; }
        
        if(!empty($app_room) ) {
          echo "Room, "; }

        if(!empty($app_board) ) {
          echo "Board"; }
         
echo "        
        </td>
    </tr>
    <tr> 
      <td width=\"219\"><b>Musicians</b></td>
      <td width=\"397\">From: $$music1 per $music_per1.
      
        
";      
/*        <select name=\"music_per1\">
        if($music_per1 == "Week") {
          echo "<option selected value=\"Week\">Week</option>"; }
        else {echo "<option value=\"Week\">Week</option>";}
        if($music_per1 == "Month") {
          echo "<option selected value=\"Month\">Month</option>"; }
        else {echo "<option value=\"Month\">Month</option>";}          
        if($music_per1 == "Season") {
          echo "<option selected value=\"Season\">Season</option>"; }
        else {echo "<option value=\"Season\">Season</option>";}             
        if($music_per1 == "Other") {
          echo "<option selected value=\"Other\">Other</option>"; }
        else {echo "<option value=\"Other\">Other</option>";}             

 </select>*/        

 echo "  
      </td>
      <td> 
      
";
      if(!empty($music_unpaid) ) {
          echo "Unpaid, "; }

        if(!empty($music_emc) ) {
          echo "EMC, "; }

        if(!empty($music_room) ) {
          echo "Room, "; }

        if(!empty($music_board) ) {
          echo "Board"; }

         
echo "        
        </td>
    </tr>
    
<tr> 
      <td colspan=\"3\" align = \"center\"> 
        <input type=\"submit\" value=\"Done, Return to Main Menu\" name=\"submit\">
      </td>
</tr>    
  </table>
  
</div>
";



           
echo "    	
   
</FORM>
</BODY>
</HTML>
";
}
?>