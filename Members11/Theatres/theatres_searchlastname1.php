<?php
include("session.inc");
$sel_record = $_POST['sel_record'];
//include("session_noNavBar.inc");

//<?php
$thea_uid = $_POST['sel_record'];
$perf_uid = $_POST['sel_record'];
$skills_uid = $_POST['sel_record'];
//$thea_descrip = $_POST['thea_descrip'];
//echo "$thea_uid, $perf_uid, $skills_uid, $thea_descrip";

include("../../Comm/connect.inc");

/*-------------------------------------------------------------------*/
//SQL statement to select records from theatre11
$sql = "SELECT * FROM theatre11 WHERE thea_uid = $thea_uid";

//SQL statement to select all from theaperf11
$sql_theaperf = "SELECT * FROM theaperf11 WHERE perf_uid = \"$thea_uid\"";

//SQL statement to select record THEASKILLS12
$sql_theaskills = "SELECT * FROM theaskills12 WHERE skills_uid = \"$thea_uid\"";

/*--------------------------------------------------------------------*/

//execute SQL query and get result for theatres    
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute theatre query: theatre11");

//execute SQL query and get result for theaperf11    
$sql_result_theaperf = mysql_query($sql_theaperf,$connection) or die("Couldn't execute theatre query: theaperf.");

//execute SQL query and get result    
$sql_result_theaskills = mysql_query($sql_theaskills,$connection) or die("Couldn't execute query: theaskills.");



if (!$sql_result) {
    echo "<P>Couldn't get theatre record!</P>";
    exit;    
    }
    
//execute SQL query and get result for theatres        
if (!$sql_result_theaperf) {
    echo "<P>Couldn't get theatre performer record!</P>";
    exit;    
    }
    
//execute SQL query and get result for theaskills        
if (!$sql_result_theaskills) {
    echo "<P>Couldn't get theaskills record!</P>";
    exit;    
    }

    
    
    else {
    
//fetch row and assign to variables for THEATRE
$row = mysql_fetch_array($sql_result);
$thea_uid = $row["thea_uid"];
$lastname = $row["lastname"];
$firstname = $row["firstname"];
$midname = $row["midname"];
$thea_descrip = $row["thea_descrip"];
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
$web_only = $row["web_only"];

//fetch row and assign to variables for THEATREPERF
//fetch row and assign l variables, use perf uid?
$row = mysql_fetch_array($sql_result_theaperf);
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
$actmeals_neg = $row["actmeals_neg"];

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

//THEATRE SKILLS fetch row and assign to variables
$row = mysql_fetch_array($sql_result_theaskills);
$skills_uid = $row["skills_uid"];
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
$other1 = $row["other1"]; 
$other2= $row["other2"]; 
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
$staff_num = $row["staff_num"];
$interns_num = $row["interns_num"];
$app_num = $row["app_num"];
$house_all = $row["house_all"];
$house_some = $row["house_some"];
$house_sub = $row["house_sub"];
$house_neg = $row["house_neg"];
$meals_all = $row["meals_all"];
$meals_some = $row["meals_some"];
$meals_kit = $row["meals_kit"];
$meals_sub= $row["meals_sub"];
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






//trim, strip and htmlspec for THEATRE
$lastname = htmlspecialchars(stripslashes(trim($lastname)));
$firstname = htmlspecialchars(stripslashes($firstname));
$midname = htmlspecialchars(stripslashes($midname));
$address = htmlspecialchars(stripslashes($address));
$company = htmlspecialchars(stripslashes($company));
$city = htmlspecialchars(stripslashes($city));
$zip = htmlspecialchars(stripslashes($zip));
$phone = htmlspecialchars(stripslashes($phone));
//$fax = htmlspecialchars(stripslashes($fax));
$email = htmlspecialchars(stripslashes($email));
$url1 = htmlspecialchars(stripslashes($url1));
$url2 = htmlspecialchars(stripslashes($url2));
$rep1 = htmlspecialchars(stripslashes(trim($rep1)));
$rep2 = htmlspecialchars(stripslashes(trim($rep2)));
$rep3 = htmlspecialchars(stripslashes(trim($rep3)));
$rep4 = htmlspecialchars(stripslashes(trim($rep4)));
$rep5 = htmlspecialchars(stripslashes(trim($rep5)));
$title1 = htmlspecialchars(stripslashes(trim($title1)));
$title2 = htmlspecialchars(stripslashes(trim($title2)));
$title3 = htmlspecialchars(stripslashes(trim($title3)));
$title4 = htmlspecialchars(stripslashes(trim($title4)));
$title5 = htmlspecialchars(stripslashes(trim($title5)));

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

<body>


";
?>


<?php

/*include("banner.inc");
*/
/*
echo "
<table align=\"center\">
  
    <tr>
";    
    <td align = \"center\"> 
    <FORM method=\"POST\" action= \"/TheatreEntry11/profile_change/changes.php\">
    <input type = \"hidden\" name = \"thea_uid\" value = \"$thea_uid\">
    <INPUT type=\"submit\" value =\"Back to Change Theatre Application Menu\">
    </FORM>    
    </td>



 echo "   
    <td align = \"center\">
    <FORM method=\"\" action=\"/index.php\">
    <input type=\"submit\" value=\"Back to Home Page\" name=\"endentry\">
    </FORM>
    </td>
    </tr>    
</table>
";
*/



echo "
<h2 align = \"center\">Theatre Information for $company</h2>
";

if (!empty($thea_descrip)){
echo "
<P align = \"center\">

<A HREF=\"/Members11/Theatres/Descrips/$thea_descrip\" target=\"RecordViewer\" onClick=\"sendme()\">CLICK FOR THEATRE DESCRIPTION</a>

</p>"; 
}

//<FORM name=\"theatre\" ONSUBMIT=\"return validateForm(theatre)\" method=\"POST\" action=\"thea_modifyrecord3.php\">
echo "
<input type = \"hidden\" name = \"thea_uid\" value = \"$thea_uid\">

  <table width=\"65%\" border=\"0\" align=\"center\">

    <tr> 
      <td width=\"49%\">
      
      <b>Theatre Representative</b><br>
      <b>First Name: </b>$firstname
        <br>
        <b>Middle: </b>$midname       
        <br>
        <b>Last Name:</b> $lastname 
        
        <br><b>Fax: </b>$fareacode - $fphone1 - $fphone2        
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
        
      <td colspan=\"3\" width=\"51%\"><b>Region: </b>  
        ";
      if($region == "NE") echo "Northeast";
      elseif($region == "MW") echo "Midwest";
      elseif ($region == "SW") echo "Southwest";  
      elseif ($region == "SE") echo "Southeast";
      elseif ($region == "S") echo "South";
      elseif ($region == "NW") echo "Northwest";
          
echo "
          
      </td>
    </tr>
    <tr> 
      <td width=\"55%\"> 
        <div align=\"left\"><b>Website 1:</b> $url1 
          
          <br>
          <b>Website 2:</b> $url2 
          
          </div>
      </td>
      <td>
       
        <div align=\"left\">&lt;== Your website address is limited to 65 characters. If you have any problems, let us know at info@strawhat-auditions.com</div>
                  
      </td>
    </tr>
    <tr>
    <td><B>Additional Information:</B> </td>
    <td>Other Information</td>
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

 <table width=\"50%\" border=\"1\" align=\"center\">
<tr>
<td>Do you accept video submissions?<td>
"; 
      if($vid_submission = "Y") echo "Yes";
      elseif($vid_submission = "N") echo "No";
      elseif ($vid_submission = "M") echo "Maybe";   
  
 echo "
 <tr>
 <td>Are you casting non-musical performers this year?</td>

 <td>
";

      if($nonmusical = "Y") echo "Yes";
      elseif($nonmusical = "N") echo "No";
      elseif ($nonmusical = "C") echo "Not Certain";  

echo "
</td>
</tr> 
 
<tr> 
<td>Are you casting Dancers this season?</td>
<td>
";
      if($dancers = "Y") echo "Yes";
      elseif($dancers = "N") echo "No";
      elseif ($dancers = "C") echo "Not Certain";  

echo "
</td>
</tr>

<tr>
<td>Which days will you be present?</td>

<td>  
";
    if(!empty($sat) ) {
          echo "Saturday, "; }
        else {echo "- ";}    
        
    if(!empty($sun) ) {
          echo "Sunday, "; }
        else {echo "- ";}    
        
    if(!empty($mon) ) {
          echo "Monday, "; }
        else {echo "- "; }
        
    if(!empty($web_only) ) {
          echo " (Web Only)"; }
        else {echo "- "; }
            
        

echo "
</td>
</tr>
</table>


<!-- table for reps -->   
    <table width=\"65%\" border=\"1\" align=\"center\">
    
    <tr> <!--color background was  bgcolor=\"#FFFF66\" -->
    <td colspan=\"2\"> 
        <h2 align = \"center\">Representatives who will attend StrawHat: (List up to 5 Reps)</h2>    
      </td>
    </tr>
    
    <BR>
    
    <tr>
   <td width=\"50%\"><b>Name</b></td>       
   <td width=\"50%\"><b>Title</b></td>
   </tr> 
";

if(!empty($rep1) ) {    
    echo "
   <tr>";        
   echo "<td>"; if(!empty($rep1) ) {echo "$rep1"; } else {echo "-";} echo "</td>";       
   echo "<td>"; if(!empty($title1) ) {echo "$title1"; } else {echo "-";} echo "</td>";   
   echo "</tr>";      
   }
   
if(!empty($rep2) ) {    
    echo "
    <tr>";   
   echo "<td>"; if(!empty($rep2) ) {echo "$rep2"; } else {echo "-";} echo "</td>";       
   echo "<td>"; if(!empty($title2) ) {echo "$title2"; } else {echo "-";} echo "</td>";   
   echo "</tr>";      
   }

if(!empty($rep3) ) {    
    echo "
    <tr>";   
   echo "<td>"; if(!empty($rep3) ) {echo "$rep3"; } else {echo "-";} echo "</td>";       
   echo "<td>"; if(!empty($title3) ) {echo "$title3"; } else {echo "-";} echo "</td>";   
   echo "</tr>";      
   }

if(!empty($rep4) ) {    
    echo "
    <tr>";   
   echo "<td>"; if(!empty($rep4) ) {echo "$rep4"; } else {echo "-";} echo "</td>";       
   echo "<td>"; if(!empty($title4) ) {echo "$title4"; } else {echo "-";} echo "</td>";   
   echo "</tr>";      
   } 
if(!empty($rep5) ) {    
    echo "
    <tr>";      
   echo "<td>"; if(!empty($rep5) ) {echo "$rep5"; } else {echo "-";} echo "</td>";       
   echo "<td>"; if(!empty($title5) ) {echo "$title5"; } else {echo "-";} echo "</td>";   
   echo "</tr>";      
   }
   echo " 
  </table>
";
/*</form>*/

//beginning of the performer data




//<form name=\"perfs\" ONSUBMIT=\"return validateForm(perfs)\" method=\"POST\" action=\"perfs_modifyrecord3.php\">
echo "
<input type = \"hidden\" name = \"perf_uid\" value = \"$thea_uid\">

<div align=\"center\">
  <table width=\"65%\" border=\"1\" cellspacing=\"1\" cellpadding=\"1\">  
    <tr>
    <!-- background  for Performer was  bgcolor=\"#FFFF66\" --> 
      <td colspan=\"2\"> 
        <div align=\"center\"><H2>PERFORMERS</H2></div>
      </td>
    </tr>
    
    <tr> 
      <td width=\"19%\"><b>Approximate Contract Dates</b></td>
      <td width=\"81%\">
      &nbsp; &nbsp;<b>--FROM:--</b>&nbsp; &nbsp; 
";    
/*DATES FOR ACTORS*/
/*Parse availfor*/
$mo = substr($act_availfor, 5,2);
$day = substr($act_availfor, 8,2);
$year = substr($act_availfor, 0,4);

$datefrom_month = $mo;  
$datefrom_day = $day;      
$datefrom_year = $year;

echo "$datefrom_month - $datefrom_day - $datefrom_year";

echo  "&nbsp; &nbsp;<b>--TO:--</b>&nbsp; &nbsp;";   

/*Parse availto*/
$mo = substr($act_availto, 5,2);
$day = substr($act_availto, 8,2);
$year = substr($act_availto, 0,4);

$dateto_month = $mo;
$dateto_day = $day;
$dateto_year = $year;
     

echo "$dateto_month - $dateto_day - $dateto_year";   



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
      <td width=\"81%\">Equity: $eq_num. Non-Equity: $noneq_num        
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
          echo "Provided All";}
        else {echo "-";}    

        if(!empty($acthouse_some) ) {
          echo "Provided for Some";}
        else {echo "-";}

        if(!empty($acthouse_sub) ) {
          echo "Subsidized"; }
        else {echo "-";}

        if(!empty($acthouse_neg) ) {
          echo "Negotiable"; }
        else {echo "-";}
         
echo "        

 </td>
    </tr>
    <tr> 
      <td width=\"19%\">Actor Meals</td>
      <td width=\"81%\"> 
";
//ACTING MEALS checkboxs
      if(!empty($actmeals_all) ) {
          echo "All Provided"; }
        else {echo "-";}    

        if(!empty($actmeals_some) ) {
          echo "Some Provided"; }
        else {echo "-";}

        if(!empty($actmeals_kit) ) {
          echo "Kitchen Facilities Available"; }
        else {echo "-";}

        if(!empty($actmeals_sub) ) {
          echo "Subsidized"; }
        else {echo "-";}

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
      <td width=\"81%\">Company: $int_co. Interns: $int_int. Apprentices: $int_app</td>
    </tr>
        
    <tr> 
      <td width=\"19%\">Interns Housing</td>
      <td width=\"81%\">
";
//Interns housing checkboxs
      if(!empty($inthouse_all) ) {
          echo "Provided All"; }
        else {echo "-";}    
      if(!empty($inthouse_some) ) {
          echo "Provided for Some "; }
        else {echo "-";}
      if(!empty($inthouse_sub) ) {
          echo "Subsidized"; }
        else {echo "-";}
      if(!empty($inthouse_neg) ) {
          echo "Negotiable"; }
        else {echo "-";}
         
echo "        
      
    </tr>
    <tr> 
      <td width=\"19%\">Intern Meals</td>
      <td width=\"81%\"> 
";
//Interns Meals checkboxs
      if(!empty($intmeals_all) ) {
          echo "All Provided"; }
        else {echo "-";}    
      if(!empty($intmeals_some) ) {
          echo "Some Provided"; }
        else {echo "-";}
      if(!empty($intmeals_kit) ) {
          echo "Kitchen Facilites Available "; }
        else {echo "-";}
      if(!empty($intmeals_sub) ) {
          echo "Subsidized"; }
        else {echo "-";}
         
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
   
    <tr> 
      <td width=\"19%\">Housing</td>
      <td width=\"81%\"> 
";
//Apprentice HOUSING checkboxs
      if(!empty($apphouse_all) ) {
          echo "All Provided"; }
        else {echo "-";}    
      if(!empty($apphouse_some) ) {
          echo "Provided for Some "; }
        else {echo "-";}
      if(!empty($apphouse_sub) ) {
          echo "Subsidized"; }
        else {echo "-";}
      if(!empty($apphouse_neg) ) {
          echo "Negotiable"; }
        else {echo "-";}
         
echo "        
        </td>
    </tr>
    <tr> 
      <td width=\"19%\">Meals</td>
      <td width=\"81%\">
";
//Music Meals checkboxs
      if(!empty($appmeals_all) ) {
          echo "All Provided"; }
        else {echo "-";}    
      if(!empty($appmeals_some) ) {
          echo "Some Provided "; }
        else {echo "-";}
      if(!empty($appmeals_kit) ) {
          echo "Kitchen Facilites Available "; }
        else {echo "-";}
      if(!empty($appmeals_sub) ) {
          echo "Subsidized"; }
        else {echo "-";}
         
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
      <td width=\"81%\">Musicians: $music_co.  Instruments: $music_inst 
      </td>
    </tr>

    <tr> 
      <td width=\"19%\">Housing</td>      
      <td width=\"81%\">
";
//MUSIC HOUSING checkboxs
      if(!empty($musichouse_all) ) {
          echo "All Provided"; }
        else {echo "-";}    
      if(!empty($musichouse_some) ) {
          echo "Some Provided"; }
        else {echo "-";}
      if(!empty($musichouse_sub) ) {
          echo "Subsidized"; }
        else {echo "-";}
      if(!empty($musichouse_neg) ) {
          echo "Negotiable"; }
        else {echo "-";}
         
echo "        
      
      </td>
    </tr>
    <tr> 
      <td width=\"19%\">Meals</td>
      <td width=\"81%\">
";
//MUSIC MEALS checkboxs
      if(!empty($musicmeals_all) ) {
          echo "All Provided"; }
        else {echo "-";}    
      if(!empty($musicmeals_some) ) {
          echo "Some Provided"; }
        else {echo "-";}
      if(!empty($musicmeals_kit) ) {
          echo "Kitchen Facilities Available"; }
        else {echo "-";}
      if(!empty($musicmeals_sub) ) {
          echo "Subsidized"; }
        else {echo "-";}
         
echo "

    </tr>
    <tr> 
      <td width=\"19%\">&nbsp;</td>
      <td width=\"81%\">&nbsp;</td>
    </tr>
  </table>
  <BR>
  
  <table border = \"1\" width=\"65%\">
  <tr>  <!-- was  bgcolor=\"#FFFF66\" background -->
      <td colspan=\"3\"> 
        <div align=\"center\"><H2>Performer General Salary Range:</H2></div>
      </td>
    </tr>
    <tr> 
      <td width=\"200\"><b>Non Equity Acting Co:</b></td>
      <td width=\"350\">From $: $noneq1 per $noneq_per1.

      </td>
      <td width=\"381\">To $: $noneq2 per $noneq_per2.        
      </td>
    </tr>
    <tr> 
      <td width=\"219\"><b>Interns</b></td>
      <td width=\"397\">From $: $interns1 per $interns_per1
      </td>
      <td width=\"381\">
      
";
      if(!empty($interns_unpaid) ) {
          echo "Unpaid"; }
        else {echo "-";}    
      if(!empty($interns_emc) ) {
          echo "EMC"; }
        else {echo "-";}
      if(!empty($interns_room) ) {
          echo "Room"; }
        else {echo "-";}
      if(!empty($interns_board) ) {
          echo "Board"; }
        else {echo "-";}
                
                     
echo " 
      </td>
    </tr>
    <tr> 
      <td width=\"219\"><b>Apprentices</b></td>
      <td width=\"397\">From $: $app1 per $app_per1
      </td>
      <td> 

";
      if(!empty($app_unpaid) ) {
          echo "Unpaid"; }
        else {echo "-";}    
      if(!empty($app_emc) ) {
          echo "EMC"; }
        else {echo "-";}
      if(!empty($app_room) ) {
          echo "Room"; }
        else {echo "-";}
      if(!empty($app_board) ) {
          echo "Board"; }
        else {echo "-";}
         
echo "        
        </td>
    </tr>
    <tr> 
      <td width=\"219\"><b>Musicians</b></td>
      <td width=\"397\">From $: $music1 per $music_per1 
      </td>
      <td> 
      
";
      if(!empty($music_unpaid) ) {
          echo "Unpaid"; }
        else {echo "-";}    
      if(!empty($music_emc) ) {
          echo "EMC"; }
        else {echo "-";}
      if(!empty($music_room) ) {
          echo "Room,"; }
        else {echo "-";}
      if(!empty($music_board) ) {
          echo "Board"; }
        else {echo "-";}
         
echo "        
        </td>
    </tr>
";    
/*
<tr> 
      <td colspan=\"3\" align = \"center\"> 
        <input type=\"submit\" value=\"Enter and Review Changes\" name=\"submit\">
      </td>
</tr>
*/
echo "    
  </table>
  
</div>
";
//</FORM>

/*THEATRESKILLS----------------------------------------------------------------------------------*/

echo "
";
//<form name=\"skills\" ONSUBMIT=\"return validateForm(skills)\" method=\"POST\" action=\"skills_modifyrecord3.php\">
echo "
<input type = \"hidden\" name = \"skills_uid\" value = \"$skills_uid\">
";

?>
 
 <?php
echo "      
<div align=\"center\">
  <table width=\"65%\" border=\"1\" cellspacing=\"1\" cellpadding=\"1\" align=\"center\" height=\"466\">
    <tr align = \"center\"> <!-- was background color bgcolor=\"#FFFF66\" -->
      <td colspan=\"3\"> 
        <H3>STAFF, TECHNICAL, DESIGN General Information</H3>
      </td>
    </tr>
    <tr> 
      <td width=\"219\"><b>Total number openings</b></td>
      <td colspan=\"2\">Staff: $staff_num. Interns: $interns_num. Apprentices: $app_num.
        
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

$dateto_month = $mo;
$dateto_day = $day;
$dateto_year = $year;


echo "$datefrom_month - $datefrom_day - $datefrom_year";

//echo  "&nbsp; &nbsp;<b>--TO:--</b>&nbsp; &nbsp;";   

/*Parse availto*/

$mo = substr($act_availto, 5,2);
$day = substr($act_availto, 8,2);
$year = substr($act_availto, 0,4);

/*
$datefrom_month = $mo;
$datefrom_day = $day;
$datefrom_year = $year;
*/
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
$dateto_day = $day;
$dateto_year = $year;

echo "$dateto_month - $dateto_day - $dateto_year";   
      
echo "      
      </td>
    </tr>
    <tr> 
      <td width=\"219\"><b>Housing</b></td>
      <td colspan=\"2\"> 
";
      if(!empty($house_all) ) {
          echo "Provided All"; }
        else {echo "-";}    

        if(!empty($house_some) ) {
          echo "Provided for Some "; }
        else {echo "-";}

        if(!empty($house_sub) ) {
          echo "Subsidized"; }
        else {echo "-";}

        if(!empty($house_neg) ) {
          echo "Negotiable"; }
        else {echo "-";}
         
echo "        
        </td>
    
    </tr>
    <tr> 
      <td width=\"219\"><b>Meals</b></td>
      <td colspan=\"2\">
";
      if(!empty($meals_all) ) {
          echo "Provided All"; }
        else {echo "-";}    

      if(!empty($meals_some) ) {
          echo "Some Provided"; }
        else {echo "-";}    

        if(!empty($meals_kit) ) {
          echo "Kitchen Facilities Available "; }
        else {echo "-";}       

        if(!empty($meals_sub) ) {
          echo "Subsidized"; }
        else {echo "-";}       

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
      <td width=\"397\">From $: $staff1 per $staff_per1.
";        

            
echo "
      </td>
      <td width=\"381\">To$: $staff2 per $staff_per2
        
";        
        
echo "  
      </td>
    </tr>
    <tr> 
      <td width=\"219\"><b>Designers</b></td>
      <td width=\"397\">From $: $design1 per $design_per1.        
";        

 echo "
      </td>
      <td width=\"381\">To$: $design2 per $design_per2.
        
";        
                     
echo "
      </td>
    </tr>
    <tr> 
      <td width=\"219\"><b>Interns</b></td>
      <td width=\"397\">From $: $intern1 per $intern_per1.
        
";        
                     
echo " 
      </td>
      <td colspan=\"2\" width=\"381\"> 

";
      if(!empty($intern_unpaid) ) {
          echo "Unpaid"; }
        else {echo "-";}    

        if(!empty($intern_emc) ) {
          echo "EMC"; }
        else {echo "-";}

        if(!empty($intern_room) ) {
          echo "Room"; }
        else {echo "-";}

        if(!empty($intern_board) ) {
          echo "Board"; }
        else {echo "-";}
         
echo "        
        </td>
    </tr>
    <tr> 
      <td width=\"219\"><b>Apprentices</b></td>
      <td width=\"397\">From $: $apprentice1 per $apprentice_per1.
";      

        
echo "
      </td>
      <td colspan=\"2\" width=\"381\"> 
      
";
      if(!empty($app_unpaid) ) {
          echo "Unpaid"; }
        else {echo "-";}    
       
        if(!empty($app_emc) ) {
          echo "EMC"; }
        else {echo "-";}

        if(!empty($app_room) ) {
          echo "Room"; }
        else {echo "-";}

        if(!empty($app_board) ) {
          echo "Board"; }
        else {echo "-";}
         
echo "        
        </td>
    </tr>
  </table>
</div>
";


echo "
  <table width=\"65%\" border=\"1\" align=\"center\">

    <tr> 
      <td> <div align=\"center\"><b>Job Posting:</b></div></td> <!-- was background bgcolor=\"#FFFF66\"-->
      <td> <div align=\"center\"><b>Remarks:</b></div></td> <!-- was background bgcolor=\"#FFFF66\"-->
    </tr>
    
    
";
    if(!empty($interns) ) {
          echo "
          <tr><td>Acting/Tech Interns</td>
          <td>- $re_interns</td>
          </tr>";
        }

    if(!empty($accomp) ) {
          echo "
          <tr><td>Accompanist</td>
          <td>- $re_accomp</td>
          </tr>";
          }        
            
    if(!empty($admin) ) {
          echo "
          <tr><td>Administration</td>
          <td>-$re_admin</td>
          </tr>";
          }        

if(!empty($boxoffice) ) {
          echo "
          <tr><td>Box Office</td>
          <td>-$re_boxoffice</td>
          </tr>";
          }        

if(!empty($carpentry) ) {
          echo "
          <tr><td>Carpentry</td>
          <td>-$re_carpentry</td>
          </tr>";
          }        

if(!empty($choreo) ) {
          echo "
          <tr><td>Choreographer</td>
          <td>-$re_choreo</td>
          </tr>";
          }        

if(!empty($costume) ) {
          echo "
          <tr><td>Costume Design</td>
          <td>-$re_costume</td>
          </tr>";
          }        

if(!empty($director) ) {
          echo "
          <tr><td>Director</td>
          <td>-$re_director</td>
          </tr>";
          }        

if(!empty($sewing) ) {
          echo "
          <tr><td>Sewing</td>
          <td>-$re_sewing</td>
          </tr>";
          }        
          
if(!empty($graphics) ) {
          echo "
          <tr><td>Graphics</td>
          <td>-$re_graphics</td>
          </tr>";
          }        

if(!empty($house) ) {
          echo "
          <tr><td>House Management</td>
          <td>-$re_house</td>
          </tr>";
          }        

if(!empty($lights) ) {
          echo "
          <tr><td>Lighting Design</td>
          <td>-$re_lights</td>
          </tr>";
          }        

if(!empty($electrics) ) {
          echo "
          <tr><td>Electrics</td>
          <td>-$re_electrics</td>
          </tr>";
          }        

if(!empty($musicdir) ) {
          echo "
          <tr><td>Music Director</td>
          <td>-$re_musicdir</td>
          </tr>";
          }        

if(!empty($photo) ) {
          echo "
          <tr><td>Photography</td>
          <td>-$re_photo</td>
          </tr>";
          }        

if(!empty($prod_interns) ) {
          echo "
          <tr><td>Production Interns</td>
          <td>-$re_prod_interns</td>
          </tr>";
          }        

if(!empty($props) ) {
          echo "
          <tr><td>Properties</td>
          <td>-$re_props</td>
          </tr>";
          }        

if(!empty($publicity) ) {
          echo "
          <tr><td>Publicity</td>
          <td>-$re_publicity</td>
          </tr>";
          }        

if(!empty($scenic) ) {
          echo "
          <tr><td>Scenic Artist</td>
          <td>-$re_scenic</td>
          </tr>";
          }        

if(!empty($sets) ) {
          echo "
          <tr><td>Set Design</td>
          <td>-$re_sets</td>
          </tr>";
          }        

if(!empty($sound) ) {
          echo "
          <tr><td>Sound</td>
          <td>-$re_sound</td>
          </tr>";
          }        
          
if(!empty($sm) ) {
          echo "
          <tr><td>Stage Management</td>
          <td>-$re_sm</td>
          </tr>";
          }        

if(!empty($td) ) {
          echo "
          <tr><td>Technical Direction</td>
          <td>-$re_td</td>
          </tr>";
          }        

if(!empty($other1) ) {
          echo "
          <tr><td>Other (1)</td>
          <td>-$re_other1</td>
          </tr>";
          }        

if(!empty($other2) ) {
          echo "
          <tr><td>Other (2)</td>
          <td>-$re_other2</td>
          </tr>";
          }        

echo "
      &nbsp</font>
</td>
</tr>    
";    
/*
    <tr> 
      <td colspan=\"6\" align = \"center\"> 
        <input type=\"submit\" value=\"Enter and Review Changes\" name=\"submit\">
      </td>

    </tr>
*/
echo "  
  </table>
";  

//</FORM>
echo "
</body>
</html>
";

?>