<?php
include("session.inc");

?>

<?php
//intern_search.php 2012
//fix session to work and include navbar.inc

echo "
<HTML>
<HEAD>
<TITLE>StrawHat Advanced Search for Actors</TITLE>
<link rel=\"stylesheet\" href=\"/styles/members.css\" type=\"text/css\">
</HEAD>
<BODY BACKGROUND=\"../../graphics03/Bk10a.GIF\"><script src=\"navbar.js\"></script>

<form name=\"form1\" method=\"post\" action=\"/Members11/Actors/advanced_actor_search_YesAAA.php\">
<BR>

<table width = \"55%\" align = \"center\">
<tr>
<td width = \"50%\">

<p align = \"center\">To use the <B>COMBINED SEARCH</B> start from the top and move from top to bottom. <B>(updated 2/21/17)</B></P>

<p><b><font size = \"4\">If you are searching for Actors Who Have an Audition:</font></b></P>

<P>Select <B><U>Actors Who Have an Audition</U></B>. Then select any combo of Audition Type, Day or Hour... OR, just choose one of the three and add on from there.";
/*
 Add Audition Types to search for Singer, Non Singer, Dancer and Standby.  Search by Gender, Vocal Range and Role Type. Select Actors will work as Apprentices and/or Interns using their Technical Skills. Finally, select Actors who have skills as Dancers, Musicians and Other Skills.
 */
echo " 
 
 </P>

<P><b><font size = \"4\">If you are searching for All Actors:</font></b></P>

<p>Select <B>All Actors Search</B>, which combines Actors that have an audition with Actors that did not get an audition. <B>IMPORTANT:</b> Set Audition Type, Day and Hour to <B>No Selection</B>. Everthing else is the same as other searches.
</P>
<BR>

</td>
</tr>
</table>
";
/*PHYSICAL TABLE"; */
echo "

<!-- PHYSICAL TABLE --->  
  <table width=\"55%\" border=\"1\" align=\"center\">
  <tr> 
    <td colspan=\"4\" align = \"center\"><H3>Combined Search: Make Your Selections Below:</H3>
    </td>
  </tr>
";

//START Section for AA Actors or AR Actors (AA vs AR)
echo "

<tr> 
      <td colspan=\"3\" align=\"center\"> 
        <b>SELECT Actors Who Have An Audition OR All Actors Search.</b>:
        <BR>
<BR align = \"center\"><B>Important! Be sure you are picking the right selection:</B></br><BR>
        
        <select name=\"audition_yes_no\" size=\"1\">        
";          

//was part of selected
//<option selected value=\"N\"><B>No Selection? Review Auditioning Actors or All Actors</B></option>
          
echo "          
         
          
          <option value=\"Y\" $audition_yes_no=\"Y\">Actors Who Have an Audition</option>
          <option value=\"N\" $audition_yes_no=\"N\">All Actors Search</option>                            
          </select>
          
          

";

echo "

</td>
      </tr>      
";
/*END OF SELECTION AA VS AR ACTORFS*/



/* Adding Gender selection */

// start of Audition Type, Day, 

echo "
<tr>
      <td colspan=\"1\" align=\"center\"> 
        <b>Audition Type<BR> 
        <font size = \"1\">(For Actors That Have an Audition)</font></b>: 
        <select name=\"type\" size=\"1\">
        
          <option selected value=\"\">No Selection</option>          
          <option value=\"S\">Singing Audition</option>
          <option value=\"NS\">Non Singing Audition</option>
          <option value=\"D\">Dancer Audition</option>
          <option value=\"SB\">Standby Audition</option>
        </select>          
</td>


 
      <td colspan=\"1\" align=\"center\"> 
        <b>Audition Day<BR> 
        <font size = \"1\">(For Actors That Have an Audition)</font></b>:
        <select name=\"day\" size=\"1\">
<!-- 2016 database WAS  SAT SUN, MON, now used for 2017 TESTING-->        
          <option selected value=\"\">No Selection</option>          
          <option value=\"Fri\">Friday</option>
          <option value=\"Sat\">Saturday</option>
          <option value=\"Sun\">Sunday</option>
        </select>          
      </td>
";
/* remove until compete search 3/9/14 */
echo "
<td align=\"center\"> 
        <b>Audition Hour<BR>
        <font size = \"1\">(For Actors That Have an Audition)</font></b>:
        
        <select name=\"hour\" size=\"1\">        
          <option selected value=\"\">No Selection</option>          
          <option value=\"10\">10</option>
          <option value=\"11\">11</option>
          <option value=\"12\">12</option>
          
          <option value=\"2\">2</option>
          <option value=\"3\">3</option>
          <option value=\"4\">4</option>
          <option value=\"5\">5</option>          
        </select>          
</td>
";

echo "
</tr>
</TABLE>
";


echo "<!--
<BR>


<BR>
<table width=\"55%\" border=\"1\" align=\"center\">
<tr>
        <td colspan=\"3\" align=\"center\">
        <font size = \"4\"><b>Limit Results:</b></font>
        <BR>
        <B>Offset:</B>
        <input type=\"text\" name=\"offset_start\" size=\"3\" maxlength=\"3\" value=\"0\">
        <B>Results:</B>
        <input type=\"text\" name=\"num_of_results\" size=\"3\" maxlength=\"3\" value=\"0\">           <BR>
        <font size = \"2\"><b>Offset and results are set at '0'. Change the offset and  number of results you want.
        
         </b>
         </font>  
        </td>
</tr>
</TABLE>
-->
<BR>        


";        


//start of Gender Selection Code
//<option value=\"M\">Male</option> used below
/*
echo "
<BR>
<table width=\"55%\" border=\"1\" align=\"center\">
<tr>
        <td colspan=\"3\" align=\"center\">
        <font size = \"4\"><b>Non-Singers That Did not Get an Audition: </b></font> 
        <select name=\"non-singer\" size=\"1\">
          <option selected value=\"\">No Selection</option>
          <option value=\"Y\">Yes</option>
          <option value=\"N\">No</option>
        </select>
        </td>
</tr>
</TABLE>
<BR>        
";
*/

echo"
<table width=\"55%\" border=\"1\" align=\"center\">

<tr> 
      <td colspan=\"3\" align=\"center\"> 
        <font size = \"4\"><b>Audition Type</b></font> 

        <select name=\"mononly\" size=\"1\">        
          <option selected value=\"\">No Selection</option>          
          <option value=\"N\">Singing Audition</option>
          <option value=\"Y\">Non Singing Audition</option>
          <option value=\"D\">Dancer Audition</option>          
        </select>          
        </td>
</tr>
</table>



<BR>
<table width=\"55%\" border=\"1\" align=\"center\">
<tr> 
        <td colspan=\"3\" align=\"center\">
        <font size = \"4\"><b>Gender: </b></font> 
        <select name=\"gender\" size=\"1\">
          <option selected value=\"\">No Selection</option>
          <option value=\"F\">Female</option>
          <option value=\"M\">Male</option>
        </select>
        </td>
</tr>
</table>
";



echo "
<BR>
<table width=\"55%\" border=\"1\" align=\"center\">
<tr> 
      <td colspan=\"3\" align=\"center\"> 
        <font size = \"4\"><b>Voice Range</b></font>: 

        <select name=\"vocal\" size=\"1\">                
          <option selected value=\"\">No Selection</option>          
          <option value=\"S\">Soprano</option>
          <option value=\"MS\">Mezzo-Soprano</option>
          <option value=\"A\">Alto</option>
          <option value=\"T\">Tenor</option>
          <option value=\"B\">Baritone</option>
          <option value=\"BR\">Bass-Baritone</option>          
        </select>          
</td>
</tr>
</table>            
<BR>      ";      
//END of Vocal Selection



//START Section for AA Actors or AR Actors (AA vs AR)
//Audition Type
//can use mononly or type
//mononly uses N = Singing, Y = NonSinging, D = Dancer
//type uses S(singer), NS(nonsinger), D(dancer) and SB(standby)      

echo "

<table width=\"55%\" border=\"1\" align=\"center\">
<tr> 
      <td colspan=\"3\" align=\"center\"> 
        <font size = \"4\"><b>Age Range:</b></font> 
                                                                     
        <select name=\"age_range\" size=\"1\">
";        
      if($age_range == "0") {
      
          echo "<option selected value=\"\">0</option>"; }
        else {echo "<option value=\"0\">No Selection</option>";}        

      if($age_range == "16") {
          echo "<option selected value=\"16\">Under 16</option>"; }
        else {echo "<option value=\"16\">Under 16</option>";}

      if($age_range == "20") {
          echo "<option selected value=\"20\">16-20</option>"; }
        else {echo "<option value=\"20\">16-20</option>";}

      if($age_range == "25") {
          echo "<option selected value=\"25\">21-25</option>"; }
        else {echo "<option value=\"25\">21-25</option>";}

      if($age_range == "30") {
          echo "<option selected value=\"30\">26-30</option>"; }
        else {echo "<option value=\"30\">26-30</option>";}

      if($age_range == "35") {
          echo "<option selected value=\"35\">31-35</option>"; }
        else {echo "<option value=\"35\">31-35</option>";}

      if($age_range == "40") {
          echo "<option selected value=\"40\">36-40</option>"; }
        else {echo "<option value=\"40\">36-40</option>";}

      if($age_range == "41") {
          echo "<option selected value=\"41\">Over 40</option>"; }
        else {echo "<option value=\"41\">Over 40</option>";}        
echo "
        </select>        
        </td>

        
        
<!-START OF HEIGHT TO(1)  -->
      <td align = \"center\";>
      <center><font size = \"4\"><b>Height</b></font>
      <font size = \"2\"><b>(feet/inches):</b></font>
      <BR>
";

//parse feet, inches

$inches_from = $ht%12;               //echo" inches_from: $inches_from";
$feet_from = ($ht - $inches)/12;     //echo"feet_from: $feet_from";

echo "<font size = \"2\"><b>From:</b></font>";

echo "<select name=\"feet\" size=\"1\" value=\"$feet\">
";    
      if($feet == "0") {
          echo "<option selected value=\"0\">0</option>"; }
        else {echo "<option value=\"0\">0</option>";}

      if($feet == "3") {
          echo "<option selected value=\"3\">3</option>"; }
        else {echo "<option value=\"3\">3</option>";}
      if($feet == "4") {
          echo "<option selected value=\"4\">4</option>"; }
        else {echo "<option value=\"4\">4</option>";}
      if($feet == "5") {
          echo "<option selected value=\"5\">5</option>"; }
        else {echo "<option value=\"5\">5</option>";}
      if($feet == "6") {
          echo "<option selected value=\"6\">6</option>"; }
        else {echo "<option value=\"6\">6</option>";}
      if($feet == "7") {
          echo "<option selected value=\"7\">7</option>"; }
        else {echo "<option value=\"7\">7</option>";}
        
      
echo "
</select>      
";      


echo "
      <select name=\"inches\" size=\"1\" value=\"$inches\">
";      
      if($inches == "0") {
          echo "<option selected value=\"0\">0</option>"; }
        else {echo "<option value=\"0\">0</option>";}
 
      if($inches == "1") {
          echo "<option selected value=\"1\">1</option>"; }
        else {echo "<option value=\"1\">1</option>";}
      if($inches == "2") {
          echo "<option selected value=\"2\">2</option>"; }
        else {echo "<option value=\"2\">2</option>";}
      if($inches == "3") {
          echo "<option selected value=\"3\">3</option>"; }
        else {echo "<option value=\"3\">3</option>";}
      if($inches == "4") {
          echo "<option selected value=\"4\">4</option>"; }
        else {echo "<option value=\"4\">4</option>";}
      if($inches == "5") {
          echo "<option selected value=\"5\">5</option>"; }
        else {echo "<option value=\"5\">5</option>";}
      if($inches == "6") {
          echo "<option selected value=\"6\">6</option>"; }
        else {echo "<option value=\"6\">6</option>";}
      if($inches == "7") {
          echo "<option selected value=\"7\">7</option>"; }
        else {echo "<option value=\"7\">7</option>";}
      if($inches == "8") {
          echo "<option selected value=\"8\">8</option>"; }
        else {echo "<option value=\"8\">8</option>";}
      if($inches == "9") {
          echo "<option selected value=\"9\">9</option>"; }
        else {echo "<option value=\"9\">9</option>";}
      if($inches == "10") {
          echo "<option selected value=\"10\">10</option>"; }
        else {echo "<option value=\"10\">10</option>";}
      if($inches == "11") {
          echo "<option selected value=\"11\">11</option>"; }
        else {echo "<option value=\"11\">11</option>";}

      echo "
    </select>
";
//      </td>


      
//HEIGHT TO  

echo "
      <!-- <td> -->

<!--      <font size = \"3\"><b>Height Range</b></font> -->
<!--      <font size = \"2\"><b>Feet(1) to (Feet(2):</b></font> -->
      ";

//NOT GOING TO USE THIS PARSING FEET, INCHES FOR THE FROM RANGE
      
//parse feet, inches
//$inches2 = $ht%12; 
//$feet2 = ($ht2 - $inches2)/12;

//echo "<font size = \"2\"><b>&nbsp To: &nbsp</b></font>";

/*
echo " <select name=\"feet2\" size=\"1\" value=\"$feet\">
";    
      if($feet2 == "0") {
          echo "<option selected value=\"0\">0</option>"; }
        else {echo "<option value=\"0\">0</option>";}

      if($feet2 == "3") {
          echo "<option selected value=\"3\">3</option>"; }
        else {echo "<option value=\"3\">3</option>";}
      if($feet2 == "4") {
          echo "<option selected value=\"4\">4</option>"; }
        else {echo "<option value=\"4\">4</option>";}
      if($feet2 == "5") {
          echo "<option selected value=\"5\">5</option>"; }
        else {echo "<option value=\"5\">5</option>";}
      if($feet2 == "6") {
          echo "<option selected value=\"6\">6</option>"; }
        else {echo "<option value=\"6\">6</option>";}
      if($feet2 == "7") {
          echo "<option selected value=\"7\">7</option>"; }
        else {echo "<option value=\"7\">7</option>";}
      
      
echo "
</select>      
";      
//echo "<font size = \"2\"><b>(inches):</b></font>
echo "<select name=\"inches2\" size=\"1\" value=\"$inches\">
";      
      if($inches2 == "0") {
          echo "<option selected value=\"0\">0</option>"; }
        else {echo "<option value=\"0\">0</option>";}
      if($inches2 == "1") {
          echo "<option selected value=\"1\">1</option>"; }
        else {echo "<option value=\"1\">1</option>";}
      if($inches2 == "2") {
          echo "<option selected value=\"2\">2</option>"; }
        else {echo "<option value=\"2\">2</option>";}
      if($inches2 == "3") {
          echo "<option selected value=\"3\">3</option>"; }
        else {echo "<option value=\"3\">3</option>";}
      if($inches2 == "4") {
          echo "<option selected value=\"4\">4</option>"; }
        else {echo "<option value=\"4\">4</option>";}
      if($inches2 == "5") {
          echo "<option selected value=\"5\">5</option>"; }
        else {echo "<option value=\"5\">5</option>";}
      if($inches2 == "6") {
          echo "<option selected value=\"6\">6</option>"; }
        else {echo "<option value=\"6\">6</option>";}
      if($inches2 == "7") {
          echo "<option selected value=\"7\">7</option>"; }
        else {echo "<option value=\"7\">7</option>";}
      if($inches2 == "8") {
          echo "<option selected value=\"8\">8</option>"; }
        else {echo "<option value=\"8\">8</option>";}
      if($inches2 == "9") {
          echo "<option selected value=\"9\">9</option>"; }
        else {echo "<option value=\"9\">9</option>";}
      if($inches2 == "10") {
          echo "<option selected value=\"10\">10</option>"; }
        else {echo "<option value=\"10\">10</option>";}
      if($inches2 == "11") {
          echo "<option selected value=\"11\">11</option>"; }
        else {echo "<option value=\"11\">11</option>";}

      echo "
    </select>
*/
echo "    
      </td>
</tr>




</TABLE>";



/*
may need another slot
echo "
<BR>
<table width=\"55%\" border=\"1\" align=\"center\">
      <td colspan=\"3\" align=\"center\"> 
        <font size = \"4\"><b>Height1, Age1</b></font> 
</td>
</tr>
</TABLE>";
*/




//AVAILABILITY
//availfor to availto
echo "
<BR>
<table width=\"55%\" border=\"1\" align=\"center\">
<tr> 
      <td colspan=\"3\" align=\"center\"> 
      <font size = \"4\"><B>Availability</font</B>
      <font size = \"2\"><B>(From - To)</B> 
      <BR>

        <b>Month From:</b>           
";


/*Parse availfor*/
$mo = substr($availfor, 5,2);
$day = substr($availfor, 8,2);
$year = substr($availfor, 0,4);

$datefrom_month = $mo;

/*...............AVAILABLE (FROM)...........*/
     echo "<select name=\"datefrom_month\">";

//empty selection 
      if($datefrom_month == "0") {
          echo "<option value=\"0\" selected>0</option>"; }
        else {echo "<option value=\"0\">No Selection</option>";} 
 
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
          
//-----------------------end month--------------------------        
        
echo "        &nbsp &nbsp Day";



/*Parse availfor*/
$datefrom_day = $day;

/*...................DATEFROM_DAY (FROM).........*/
/*NS is for NO SELECTION*/

//First selection is empty

      echo "<select name=\"datefrom_day\">";

      if($datefrom_day == "0") {
          echo "<option value=\"0\" selected>0</option>"; }
        else {echo "<option value=\"0\">0</option>";}                
        
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
//as of 4/3/2016, KEEP OLD DATA
    echo "<select name=\"datefrom_year\">";      
    
//Empty selection
    if($datefrom_year == "0") {
          echo "<option selected value=\"0\">0</option>"; }
        else {echo "<option value=\"0\">0</option>";} 

    if($datefrom_year == "2016") {
          echo "<option selected value=\"2016\">2016</option>"; }
        else {echo "<option value=\"2016\">2016</option>";} 

    if($datefrom_year == "2017") {
          echo "<option selected value=\"2017\">2017</option>"; }
        else {echo "<option value=\"2017\">2017</option>";}

    if($datefrom_year == "2018") {
          echo "<option selected value=\"2018\">2018</option>"; }
        else {echo "<option value=\"2018\">2018</option>";}



    echo "</select>";      
            
      
            
echo "            
        </div>

";

//echo "START OF THE EMPLOYMENT TO SECTION";

echo "
     
        <b>To:</b>
       ";

/*Parse availto*/
$mo = substr($availto, 5,2);
$day = substr($availto, 8,2);
$year = substr($availto, 0,4);

$dateto_month = $mo;

/*...............AVAILABLE TO...........*/
     echo "<select name=\"dateto_month\">";
//Empty dateto_month          
     
      if($dateto_month == "0") {
          echo "<option value=\"0\" selected>0</option>"; }
        else {echo "<option value=\"0\">0</option>";} 

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
//Add emtpy selection

      echo "<select name=\"dateto_day\">";

      if($dateto_day == "0") {
          echo "<option value=\"0\" selected>0</option>"; }
        else {echo "<option value=\"0\">0</option>";} 

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
// keep 2015 - 2016 until next HAT!!
//first selection is empty

    echo "<select name=\"dateto_year\">";      

//empty selection    
    if($dateto_year == "0") {
          echo "<option selected value=\"0\">0</option>"; }
        else {echo "<option value=\"0\">\"0\">0</option>";}
         
    if($dateto_year == "2016") {
          echo "<option selected value=\"2016\">2016</option>"; }
        else {echo "<option value=\"2016\">2016</option>";}

    if($dateto_year == "2016") {
          echo "<option selected value=\"2017\">2017</option>"; }
        else {echo "<option value=\"2017\">2017</option>";}

    if($dateto_year == "2017") {
          echo "<option selected value=\"2018\">2018</option>"; }
        else {echo "<option value=\"2018\">2018</option>";}
        
/*    
    if($dateto_year == "2015") {
          echo "<option selected value=\"2015\">2015</option>"; }
        else {echo "<option value=\"2015\">2015</option>";}

    if($dateto_year == "2016") {
          echo "<option selected value=\"2016\">2016</option>"; }
        else {echo "<option value=\"2016\">2016</option>";}

    if($dateto_year == "2017") {
          echo "<option selected value=\"2017\">2017</option>"; }
        else {echo "<option value=\"2017\">2017</option>";}
*/

    echo "</select>";      
echo "
</TD>
</TR>
</TABLE>    
";


echo "
<BR>
<table width=\"55%\" border=\"1\" align=\"center\">
<tr>              
      <td colspan=\"3\" align=\"center\">
      <font size = \"4\"><b>Role Type: </b></font> 
       <BR>
       
        <input type=\"checkbox\" name=\"nativeam\" value=\"Na\">
        Native American 
        <input type=\"checkbox\" name=\"asian\" value=\"As\">
        Asian 
        <input type=\"checkbox\" name=\"white\" value=\"Ca\">
        Caucasian 
        <input type=\"checkbox\" name=\"black\" value=\"Af\">
        African American<BR>
        <input type=\"checkbox\" name=\"hispanic\" value=\"Hi\">
        Hispanic 
        <input type=\"checkbox\" name=\"eeurope\" value=\"Ea\">
        East European 
        <input type=\"checkbox\" name=\"mideast\" value=\"Mi\">
        Middle Eastern 
        <input type=\"checkbox\" name=\"indian\" value=\"In\">
        Indian 
        <B>
        </td>
</tr>
";
//take out extra select, clear buttons
/*
    <tr> 
      <td colspan=\"4\"> 
        <div align=\"center\">
        <input type=\"submit\" value=\"Select\" name=\"submit\">
        <input type=\"reset\" value=\"Clear\" name=\"reset\">    
         </div>
      </td>
    </tr>
*/
echo "
  </table>
<BR>

<!-- INTERN/APPRENTICE TABLE -->
<table width=55% border=\"1\" align=\"center\">
<tr> 
    <td colspan=\"6\" align = \"center\"><center>
    <font size = \"4\"><B>Apprentice/Intern and Technical Skills:</font></center></B>
    
    <B>Select (1)Beginning, (2) Good and (3)Excellent</B>    
    </td>
    
</tr>

    <tr> 
      <td colspan=\"6\"> 
        <div align=\"center\">Apprentice   
          <select name=\"apprentice\" size=\"1\">
          <option selected></option>  
          <option>Y</option>
            <option>N</option>
          </select>
          Intern  
          <select name=\"intern\" size=\"1\">
            <option selected></option>  
          	<option>Y</option>
            <option>N</option>
          </select>
          </div>
      </td>      
    </tr>
    
<!--    
    <tr> 
      <td colspan=\"6\">&nbsp;</td>
    </tr>
-->    
    <tr> 
      <td width=\"54\">Set</td>
      <td width=\"54\"> 
        <select name=\"set_design\" size=\"1\">
          <option selected>0</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
        </select>
        </td>
      <td width=\"54\">Lights </td>
      <td width=\"54\"> 
        <select name=\"lights\" size=\"1\">
          <option selected>0</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
        </select>
        </td>
      <td width=\"54\">Costume </td>
      <td width=\"54\"> 
        <select name=\"costume\" size=\"1\">
          <option selected>0</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
        </select>
        </td>
    </tr>
    <tr> 
      <td width=\"54\">SM </td>
      <td width=\"54\"> 
        <select name=\"stagem\" size=\"1\">
          <option selected>0</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
        </select>
        </td>
      <td width=\"54\">Box Office </td>
      <td width=\"54\"> 
        <select name=\"box_office\" size=\"1\">
          <option selected>0</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
        </select>
        </td>
      <td width=\"54\">Props </td>
      <td width=\"54\"> 
        <select name=\"props\" size=\"1\">
          <option selected>0</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
        </select>
        </td>
    </tr>
<!--   
    <tr> 
      <td colspan=\"6\">&nbsp;</td>
    </tr>
-->
    ";    
//removing extra select, clear buttons
/*
    <tr> 
      <td colspan=\"6\"> 
        <div align=\"center\"> 
          <input type=\"submit\" value=\"Search\" name=\submit\>
          <input type=\"reset\" value=\"Clear\" name=\reset\>
        </div>
      </td>
    </tr>
*/
echo "    
  </table>
  
<!--- DANCERS TABLE --->  
<BR>
<table width=\"55%\" border=\"1\" align=\"center\">
  <tr> 
    <td colspan=\"3\" align = \"center\">
    <font size = \"4\"><B>Dancers by Category</B></font><BR>
    <B>Select the Number of Years Studied in each Category:</B>
    </td>
  </tr>
  <tr> 
    <td>Ballet: 
      <input type=\"text\" name=\"ballet\" size=\"2\" maxlength=\"2\" value=\"0\">
    </td>
    <td>Musical Theatre: 
      <input type=\"text\" name=\"mus_thea\" size=\"2\" maxlength=\"2\" value=\"0\">
    </td>
    <td>Ballroom: 
      <input type=\"text\" name=\"ballroom\" size=\"2\" maxlength=\"2\" value=\"0\">
    </td>
  </tr>
  
  <tr> 
    <td>Tap: 
      <input type=\"text\" name=\"tap\" size=\"2\" maxlength=\"2\" value=\"0\">
    </td>
    <td>Swing: 
      <input type=\"text\" name=\"swing\" size=\"2\" maxlength=\"2\" value=\"0\">
    </td>
    <td>Jazz: 
      <input type=\"text\" name=\"jazz\" size=\"2\" maxlength=\"2\" value=\"0\">
    </td>
  </tr>
  
";
/* remove extra select, clear buttons
  <tr>   
    <td> 
      <div align=\"center\">
        <INPUT type=\"submit\" value =\"Select\">
        <INPUT type=\"reset\" value =\"Clear\">      
      </div>
    </td>
  </tr>
*/

echo "  
<!--
  <tr>
      <td colspan=\"3\">
Enter the minimum number of years studied in at least one or more categories.  
</td>
</tr>
-->

</table>

<br>

<!-- INSTRUMENTAL TABLE -->
<table width=\"55%\" border=\"1\" align=\"center\"> 
  <tr> 
    <td colspan=\"4\" align = \"center\"><font size = \"4\"><B>Instruments</font></B>
    <BR>
    <B>Select the Number of Years Studied in each Category: </B>
    </td>
  </tr>

  <tr> 
    <td>Banjo: 
      <input type=\"text\" name=\"banjo\" size=\"2\" maxlength=\"2\" value=\"0\">
    </td>
    <td>Drums: 
      <input type=\"text\" name=\"drums\" size=\"2\" maxlength=\"2\" value=\"0\">
    </td>
    <td>Percussion: 
      <input type=\"text\" name=\"perc\" size=\"2\" maxlength=\"2\" value=\"0\">
    </td>
    <td>Trombone: 
      <input type=\"text\" name=\"trombone\" size=\"2\" maxlength=\"2\" value=\"0\">
    </td>
  </tr>
  <tr> 
    <td>Cello: 
      <input type=\"text\" name=\"cello\" size=\"2\" maxlength=\"2\" value=\"0\">
    </td>    
    <td>Flute: 
      <input type=\"text\" name=\"flute\" size=\"2\" maxlength=\"2\" value=\"0\">
    </td>
    <td>Piano: 
      <input type=\"text\" name=\"piano\" size=\"2\" maxlength=\"2\" value=\"0\">
    </td>
    <td>Trumpet: 
      <input type=\"text\" name=\"trumpet\" size=\"2\" maxlength=\"2\" value=\"0\">
    </td>
  </tr>
  <tr>
    <tr> 
    <td>Clarinet: 
      <input type=\"text\" name=\"clarinet\" size=\"2\" maxlength=\"2\" value=\"0\">
    </td>    
    <td>Guitar: 
      <input type=\"text\" name=\"guitar\" size=\"2\" maxlength=\"2\" value=\"0\">
    </td>
    <td>Saxophone: 
      <input type=\"text\" name=\"sax\" size=\"2\" maxlength=\"2\" value=\"0\">
    </td>
    <td>Violin: 
      <input type=\"text\" name=\"violin\" size=\"2\" maxlength=\"2\" value=\"0\">
    </td>
  </tr>
";
  /*  remove select and clear
    <tr> 
     <td colspan=\"4\"> 
      <div align=\"center\">
        <INPUT type=\"submit\" value =\"Select\">
          <INPUT type=\"reset\" value =\"Clear\">
      </div>
    </td>
  </tr>
*/
echo "  
  </table>

<BR> 
<!-- OTHER SKILLS TABLE -->  
<table width=\"55%\" border=\"1\" align=\"center\">

   <tr> 
    <td colspan=\"3\" align = \"center\"><font size = \"4\"><b>Other Skills</B></font><BR>
    <B>Select Skills Below:</B>
    </td>
  </tr>

  <tr>
    <td><font size=\"3\"><input type=\"checkbox\" name=\"acrobatics\" value=\"A\">Acrobatics / Gymnastics </font></td>
    <td><font size=\"3\"><input type=\"checkbox\" name=\"juggling\" value=\"J\">Juggling</font></td>
    <td><font size=\"3\"><input type=\"checkbox\" name=\"puppetry\" value=\"P\">Puppetry</font></td>
  </tr>
  
  <tr>
    <td><font size=\"3\"><input type=\"checkbox\" name=\"asl\" value=\"A\">ASL </font></td>
    <td><font size=\"3\"><input type=\"checkbox\" name=\"painting\" value=\"P\">Painting </font></td>
    <td><font size=\"3\"><input type=\"checkbox\" name=\"combat\" value=\"S\">Stage Combat </font></td>
  </tr>
  
  <tr>
    <td><font size=\"3\"><input type=\"checkbox\" name=\"shakes\" value=\"S\">Shakespeare </font></td>
    <td><font size=\"3\"><input type=\"checkbox\" name=\"cabaret\" value=\"C\">Cabaret </font></td>
    <td><font size=\"3\"><input type=\"checkbox\" name=\"improv\" value=\"I\">Improv </font></td>
  </tr>
  
  <tr>
    <td><font size=\"3\"><input type=\"checkbox\" name=\"mime\" value=\"M\">Mime </font></td>
    <td><font size=\"3\"><input type=\"checkbox\" name=\"standup\" value=\"S\">Standup Comedy </font></td>
    <td>&nbsp</td>
  </tr>
  
    <tr> 
      <td colspan=\"3\"><center>
        <input type=\"submit\" value=\"Select\" name=\"submit\">
        <input type=\"reset\" value=\"Clear\" name=\"reset\">
      </center></td>
    </tr>
  </tr>
</table>

";
/*
<!-- PHYSICAL TABLE --->  
  <table width=\"55%\" border=\"1\" align=\"center\">
  <tr> 
    <td colspan=\"4\" align = \"center\"><H3>Physical Attributes</H3>
    <H5>Select Skills Below:</H5>
    </td>
  </tr>
";
/*Remove Gender, etc  
    <tr> 
      <td><b>Gender: </b> 
        <select name=\"gender\" size=\"1\">
          <option selected value=\"\">Select</option>
          <option value=\"F\">Female</option>
          <option value=\"M\">Male</option>
        </select>
      </td>
*/
/*
echo "<table width=\"55%\" border=\"1\" align=\"center\">      
      <td><b>HeightA: </b> 
        <select name=\"height\" size=\"1\">
          <option selected value=\"\">Select</option>
          <option>4.6 - 4.11</option>
          <option>5 - 5.6</option>
          <option>5.7 - 5.11</option>
          <option>6 - 6.6</option>
        </select>
      </td>
";
*/
/*
echo "      
      <td width=\"28%\"><b>Weight:</b> 
        <select name=\"weight\" size=\"1\">
        <option selected value=\"\">Select</option>
          <option>Up to 110 lbs</option>
          <option>111 to 130 lbs</option>
          <option>131 to 150 lbs</option>
          <option>151 to 170 lbs</option>
          <option>171 to 195 lbs</option>
          <option>196 lbs &amp; over</option>
        </select>
      </td>
";
/*
      <td width=\"26%\"><b>Hair:</b> 
        <select name=\"hair\" size=\"1\">
          <option selected value=\"\">Select</option>
          <option value=\"AU\">Auburn</option>
          <option value=\"BK\">Black</option>
          <option value=\"BL\">Blonde</option>
          <option value=\"DB\">Dark Brown</option>
          <option value=\"GY\">Grey</option>
          <option value=\"LB\">Light Brown</option>
          <option value=\"BD\">No Hair</option>
          <option value=\"RD\">Red</option>
          <option >White</option>
        </select>
      </td>

echo "
    </tr>
</table>
    
";



/*remove Height, Weight, Hair, Eye Color, Age Range 
from Physical Selection */
/*

        <td><b>Gender: </b> 
        <select name=\"gender\" size=\"1\">
          <option selected value=\"\">Select</option>
          <option value=\"F\">Female</option>
          <option value=\"M\">Male</option>
        </select>
      </td>
";
/*remove Height, Weight, Hair, Eye Color, Age Range 
from Physical Selection */
/*
      <td><b>Eye Color: </b> 
        <select name=\"eye\" size=\"1\">
          <option selected value=\"\">Select</option>
          <option value=\"BK\">Black</option>
          <option value=\"BL\">Blue</option>
          <option value=\"BR\">Brown</option>
          <option value=\"GR\">Green</option>
          <option value=\"HZ\">Hazel</option>
        </select><br><br>
        
        <b>Age Range:</b> 
        <select name=\"age_range\" size=\"1\">
          <option selected value=\"\">Select</option>
          <option value=\"16\">Under 16</option>
          <option value=\"20\">16-20</option>
          <option value=\"25\">21-25</option>
          <option value=\"30\">26-30</option>
          <option value=\"35\">31-35</option>
          <option value=\"40\">36-40</option>
          <option value=\"41\">40-over</option>
        </select>
        <BR>
      </td>
*/
/*
echo "

      <td><b>Gender: </b> 
        <select name=\"gender\" size=\"1\">
          <option selected value=\"\">Select</option>
          <option value=\"F\">Female</option>
          <option value=\"M\">Male</option>
        </select>
      </td>
              
      <td colspan=\"3\"><b>Role Type: </b> <BR>
        <input type=\"checkbox\" name=\"nativeam\" value=\"Na\">
        Native American 
        <input type=\"checkbox\" name=\"asian\" value=\"As\">
        Asian 
        <input type=\"checkbox\" name=\"white\" value=\"Ca\">
        Caucasian 
        <input type=\"checkbox\" name=\"black\" value=\"Af\">
        African American<BR>
        <input type=\"checkbox\" name=\"hispanic\" value=\"Hi\">
        Hispanic 
        <input type=\"checkbox\" name=\"eeurope\" value=\"Ea\">
        East European 
        <input type=\"checkbox\" name=\"mideast\" value=\"Mi\">
        Middle Eastern 
        <input type=\"checkbox\" name=\"indian\" value=\"In\">
        Indian </td>
    </tr>
    <tr> 
      <td colspan=\"4\"> 
        <div align=\"center\">
        <input type=\"submit\" value=\"Select\" name=\"submit\">
        <input type=\"reset\" value=\"Clear\" name=\"reset\">    
         </div>
      </td>
    </tr>
  </table>
  
  */
echo "
</form>
";
/*
<table align = \"center\" width = \"80%\">
<tr> 
<td>
</table>
*/

echo "
<table width = \"55%\" align = \"center\">
<TR>
<TD>
<P>Play with the searches to get the optimum results. You can combine any number of variables in the search. Please note a few tips:

<ul>
<li> The more variables searched, the lower the number of results.</li>
<li> For searches noted in years, try using a lower number; if too high, use a higher number.</li>
<li>For physical searches in role type, choose one per search.</li>
<li>When you have made your selections, use the select button at the end of the page.</li> 
</ul>

<p align = \"center\">These searches are for the use of our members. If you have any suggestions, please let us know!</p>
</TD>
</tr>
</TABLE>
";

echo " 
</BODY>
</HTML>
";

?>