<?php
$actor_uid = $_POST['actor_uid'];

echo "
<HTML>
<HEAD>
<TITLE>Strawhat Modify Audition Information</TITLE>
<link rel=\"stylesheet\" href=\"actors.css\" type=\"text/css\">
</HEAD>
<body>
";
include("banner.inc");

echo "
<table align=\"center\">
	<tr>
	<td align = \"center\"> 
	<FORM method=\"POST\" action= \"/ActorEntry11/profile_change/changes.php\">
	<input type = \"hidden\" name = \"actor_uid\" value = \"$actor_uid\">
	<INPUT type=\"submit\" value =\"Back to Change Application Menu\">
	</FORM>	
	</td>

	
	<td align = \"center\">
	<FORM method=\"\" action=\"/index.php\">
	<input type=\"submit\" value=\"Leave Application (No Changes Recorded)\" name=\"endentry\">
	</form>
	</td>
	</tr>	
</table>
";

if (!$actor_uid) {
	echo "No actor_uid found (audition.modifyrecord2), if the error persists contact StrawHat Auditions";
	exit;
	}

//121506 check to make sure roles exist
/*SQL statement to check if uid exists in module;
otherwise insert uid into module. */

/*if needed, insert audition_uid*/
//$sql_insert_audition = "INSERT INTO audition11 (audition_uid) VALUES ('$actor_uid')";	
	
include("../../Comm/connect.inc");


/*execute SQL query for checking if roles_uid exists
does this automatically, do not need to check and print on site

	if (mysql_query($sql_insert_audition,$connection)) {
		echo "Record Inserted";
	}
*/

//SQL statement to select record
$sql = "SELECT * FROM audition11 WHERE audition_uid = \"$actor_uid\"";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


if (!$sql_result) {
	echo "<P>Couldn't get record!</P>";
	} else {
	

//fetch row and assign to variables
$row = mysql_fetch_array($sql_result);
$audition_uid = $row["audition_uid"];
$audition_2yr = $row["audition_2yr"];
$audition_lyr = $row["audition_lyr"];
$ever = $row["ever"];
$stock_lyr = $row["stock_lyr"];
$stock_lyrwhere = $row["stock_lyrwhere"];
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
$apply_lyr = $row["apply_lyr"];
$u_emc = $row["u_emc"];
$u_sag = $row["u_sag"];
$u_aftra = $row["u_aftra"];
$u_agva = $row["u_agva"];
$u_agma = $row["u_agma"];
$availfor = $row["availfor"];
$availto = $row["availto"];

//12/6/06 just use htmlspecialchars, take out stripslashes
$ever = htmlspecialchars($ever);
$stock_lyrwhere = htmlspecialchars($stock_lyrwhere);


echo "
<!-- <h1>Update your Audition Information:</h1> -->
<form name=\"form1\" method=\"post\" action=\"aud_modifyrecord3.php\">
<input type = \"hidden\" name = \"audition_uid\" value = \"$actor_uid\">

 <table width=\"88%\" border=\"1\" align=\"center\">
    <tr> 
      <td colspan=\"3\" bgcolor=\"#99FFCC\"> 
        <div align=\"center\"><b><h2>Update your Audition Information:</h2></b></div>
      </td>
    </tr>
    <tr> 
      <td colspan=\"2\">Did you audition at StrawHat last year? 
        <select name=\"audition_lyr\" tabindex=\"1\">
";		
		if($audition_lyr == "Y") {
	  	echo "<option selected value=\"Y\">Yes</option>"; }
		else {echo "<option value=\"Y\">Yes</option>";}
	  
	  if($audition_lyr == "N") {
	  	echo "<option value=\"N\" selected>No</option>"; }
		else {echo "<option value=\"N\">No</option>";} 

echo "		
		</select>
        (2) years ago?
        <select name=\"audition_2yr\" tabindex=\"2\">
";		
		if($audition_2yr == "Y") {
	  	echo "<option selected value=\"Y\">Yes</option>"; }
		else {echo "<option value=\"Y\">Yes</option>";}
	  
	  if($audition_2yr == "N") {
	  	echo "<option value=\"N\" selected>No</option>"; }
		else {echo "<option value=\"N\">No</option>";} 

echo "
        </select>
        Ever: 
        <input type=\"text\" name=\"ever\" maxlength=\"4\" size=\"5\" value=\"$ever\" tabindex=\"3\">
        (Enter the year of your last audition)</td>
    </tr>
    <tr>
      <td colspan=\"2\">Did you apply for an audition in last year? 
        <select name=\"apply_lyr\" tabindex=\"4\">
";		
		if($apply_lyr == "Y") {
	  	echo "<option selected value=\"Y\">Yes</option>"; }
		else {echo "<option value=\"Y\">Yes</option>";}
	  
	  if($apply_lyr == "N") {
	  	echo "<option value=\"N\" selected>No</option>"; }
		else {echo "<option value=\"N\">No</option>";} 

echo "        
        </select>
      </td>
    </tr>
    <tr> 
      <td height=\"39\">Did you do Summer Stock last year. 
        <select name=\"stock_lyr\" tabindex=\"5\">
";		
		if($stock_lyr == "Y") {
	  	echo "<option selected value=\"Y\">Yes</option>"; }
		else {echo "<option value=\"Y\">Yes</option>";}
	  
	  if($stock_lyr == "N") {
	  	echo "<option value=\"N\" selected>No</option>"; }
		else {echo "<option value=\"N\">No</option>";} 

echo "
        </select>
        Where: 
        <input type=\"text\" name=\"stock_lyrwhere\" size=\"31\" maxlength=\"30\" value=\"$stock_lyrwhere\" tabindex=\"6\">
      </td>
      <td rowspan=\"2\"><i><b>Audition Preference:</b></i> <font size=\"-1\">Please 
        check at least three time options (we reserve the right to schedule you 
        for any time slot marked)</font></td>
    </tr>
    <tr> 
      <td>Would you consider accepting an unpaid apprentice position?($apprentice) 
        <select name=\"apprentice\" tabindex=\"7\">
		
";		
		
		if($apprentice == "Y") {
	  	echo "<option selected value=\"Y\">Yes</option>"; }
		else {echo "<option value=\"Y\">Yes</option>";}
	  
	    if($apprentice == "N") {
	  	echo "<option value=\"N\" selected>No</option>"; }
		else {echo "<option value=\"N\">No</option>";} 

echo "        
        </select>
      </td>
    </tr>
    <tr> 
      <td>

		An internship involving crew work as well as performing ($intern)? 
        <select name=\"intern\" tabindex=\"8\">
";		
		if($intern == "Y") {
	  	echo "<option selected value=\"Y\">Yes</option>"; }
		else {echo "<option value=\"Y\">Yes</option>";}
	  
	  if($intern == "N") {
	  	echo "<option value=\"N\" selected>No</option>"; }
		else {echo "<option value=\"N\">No</option>";} 

echo "        

        </select>
      </td>
      <td width=\"33%\">
";
	
	  if($mononly == "N") {
	  	echo "<div align=\"left\">
	  	<input type=\"radio\" name=\"mononly\" value=\"N\" checked tabindex=\"15\"><b>Song & Monologue Audition OR <br>
        <input type=\"radio\" name=\"mononly\" value=\"Y\" tabindex=\"15\">Monologue Only Audition OR<br>
	  	<input type=\"radio\" name=\"mononly\" value=\"D\" tabindex=\"15\">Dancers Who Sing Audition (Monday Only)</b></div>"; 
	  }

	  	elseif ($mononly == "Y") { echo "<div align=\"left\">
	  	<input type=\"radio\" name=\"mononly\" value=\"N\" tabindex=\"15\"><b>Song & Monologue Audition OR <br>
        <input type=\"radio\" name=\"mononly\" value=\"Y\" checked tabindex=\"15\">Monologue Only Audition OR<br>
	  	<input type=\"radio\" name=\"mononly\" value=\"D\" tabindex=\"15\">Dancers Who Sing Audition (Monday Only)</b></div>"; 
	  	}
	  	
	  	else {echo "<div align=\"left\">
	  	<input type=\"radio\" name=\"mononly\" value=\"N\" tabindex=\"15\"><b>Song & Monologue Audtion OR<br>
        <input type=\"radio\" name=\"mononly\" value=\"Y\" tabindex=\"15\">Monologue Only Audition OR<BR>
	  	<input type=\"radio\" name=\"mononly\" value=\"D\" checked tabindex=\"15\">Dancers Who Sing Audition(Monday Only)</b></div>";
	  	 }
echo "<p>
	  	<a href = \"../audtyp2012.pdf\">Help: What are the different auditions?</a>
	  	</p>
	  	
	  	
		</td>
    </tr>
<tr>
	<td colspan = \"4\">
	<p>
	<font size = \"-1\"><b>Stand-by slots</b> are available, but are strictly limited. If you indicate that you will accept a stand-by appointment, you must be available for the entire day, as you will step in at short notice to take the place of a cancellation or \"no show\". Stand-bys who check in for the appointed audition will be guaranteed an audition and their pictures and resumes will appear in that day?s book. Only those applicants who are selected and invited will be allowed to come in on stand-by. Again, you will have an audition, but we cannot guarantee at what point in the day your opportunity will arise.</font>
</p>
	</td>
</tr>    
    
    <tr> 
      <td>Will you accept a standby appointment 
        <select name=\"standby\" tabindex=\"9\">
";		
		if($standby == "Y") {
	  	echo "<option selected value=\"Y\">Yes</option>"; }
		else {echo "<option value=\"Y\">Yes</option>";}
	  
	  if($standby == "N") {
	  	echo "<option value=\"N\" selected>No</option>"; }
		else {echo "<option value=\"N\">No</option>";} 

echo "
	
        </select>
      </td>
      <td width=\"33%\">Saturday Morning 
";
if(!empty($songThursMorn) ) {
	  	echo "<input type=\"checkbox\" name=\"songThursMorn\" value=\"TM\" checked tabindex=\"16\">"; }
		else {echo "<input type=\"checkbox\" name=\"songThursMorn\" value=\"TM\" tabindex=\"16\">";}	

echo "
      </td>
    </tr>
    <tr> 
      <td rowspan=\"3\"> 
        <div align=\"center\"><b>Union Status</b><BR>
";          
         
	if(!empty($u_emc) ) {        
        echo "<input type=\"checkbox\" name=\"u_emc\" value=\"EMC\" checked tabindex=\"10\">"; }
        else {echo "<input type=\"checkbox\" name=\"u_emc\" value=\"EMC\" tabindex=\"10\">"; }
echo "
          <b>EMC</b>
";
	if(!empty($u_sag) ) {        
        echo "<input type=\"checkbox\" name=\"u_sag\" value=\"SAG\" checked tabindex=\"11\">"; }
        else {echo "<input type=\"checkbox\" name=\"u_sag\" value=\"SAG\" tabindex=\"11\">"; }
echo "
           <b>SAG</b>
";
	if(!empty($u_aftra) ) {        
        echo "<input type=\"checkbox\" name=\"u_aftra\" value=\"AFTRA\" checked tabindex=\"12\">"; }
        else {echo "<input type=\"checkbox\" name=\"u_aftra\" value=\"AFTRA\" tabindex=\"12\">"; }
echo "
           <b>AFTRA</b> <br>
";
	if(!empty($u_agva) ) {        
        echo "<input type=\"checkbox\" name=\"u_agva\" value=\"AGVA\" checked tabindex=\"13\">"; }
        else {echo "<input type=\"checkbox\" name=\"u_agva\" value=\"AGVA\" tabindex=\"13\">"; }
echo "
          <b>AGVA</b>
";
	if(!empty($u_agma) ) {        
        echo "<input type=\"checkbox\" name=\"u_agma\" value=\"AGMA\" checked tabindex=\"14\">"; }
        else {echo "<input type=\"checkbox\" name=\"u_agma\" value=\"AGMA\" tabindex=\"14\">"; }
echo "
          <b>AGMA</b> </div>
      </td>
      <td width=\"33%\">Saturday Afternoon
";
	if(!empty($songThursAft) ) {        
        echo "<input type=\"checkbox\" name=\"songThursAft\" value=\"TA\" checked tabindex=\"17\">"; }
        else {echo "<input type=\"checkbox\" name=\"songThursAft\" value=\"TA\" tabindex=\"17\">"; }
echo "
      </td>
    </tr>
    <tr> 
      <td width=\"33%\">Sunday Morning 
";
	if(!empty($songFriMorn) ) {        
        echo "<input type=\"checkbox\" name=\"songFriMorn\" value=\"FM\" checked tabindex=\"18\">"; }
        else {echo "<input type=\"checkbox\" name=\"songFriMorn\" value=\"FM\" tabindex=\"18\">"; }
echo "
      </td>
    </tr>
    <tr> 
      <td width=\"33%\">Sunday Afternoon 
";
	if(!empty($songFriAft) ) {        
        echo "<input type=\"checkbox\" name=\"songFriAft\" value=\"FA\" checked tabindex=\"19\">"; }
        else {echo "<input type=\"checkbox\" name=\"songFriAft\" value=\"FA\" tabindex=\"19\">"; }
echo "
      </td>
    </tr>
    <tr> 
      <td> 
        <b>Availability From:</b> &nbsp &nbsp Month  
         
";


/*Parse availfor*/
$mo = substr($availfor, 5,2);
$day = substr($availfor, 8,2);
$year = substr($availfor, 0,4);

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
		
echo "		&nbsp &nbsp Day";



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
	
	if($datefrom_year == "2011") {
	  	echo "<option selected value=\"2011\">2011</option>"; }
		else {echo "<option value=\"2011\">2011</option>";} 

	if($datefrom_year == "2012") {
	  	echo "<option selected value=\"2012\">2012</option>"; }
		else {echo "<option value=\"2012\">2012</option>";}

	echo "</select>";	  
            
      
            
echo "            
        </div>
      </td>
      <td width=\"33%\">Monday Morning 
";
	if(!empty($songSatMorn) ) {        
        echo "<input type=\"checkbox\" name=\"songSatMorn\" value=\"SM\" checked tabindex=\"20\">"; }
        else {echo "<input type=\"checkbox\" name=\"songSatMorn\" value=\"SM\" tabindex=\"20\">"; }
echo "

      </td>
    </tr>
    <tr> 
      <td>
        <b>Availability To:</b> &nbsp &nbsp &nbsp &nbsp Month  
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
	
	if($dateto_year == "2011") {
	  	echo "<option  selected value=\"2011\">2011</option>"; }
		else {echo "<option value=\"2011\">2011</option>";} 

	if($dateto_year == "2012") {
	  	echo "<option selected value=\"2012\">2012</option>"; }
		else {echo "<option value=\"2012\">2012</option>";}

	if($dateto_year == "2013") {
	  	echo "<option selected value=\"2013\">2013</option>"; }
		else {echo "<option value=\"2013\">2013</option>";}

	echo "</select>";	  
		
echo "            
      </td>
      <td width=\"33%\">Monday Afternoon 
";
	if(!empty($songSatAft) ) {        
        echo "<input type=\"checkbox\" name=\"songSatAft\" value=\"SA\" checked tabindex=\"21\">"; }
        else {echo "<input type=\"checkbox\" name=\"songSatAft\" value=\"SA\" tabindex=\"21\">"; }
echo "
      </td>
    </tr>
    
    <tr> 
      <td colspan=\"2\"> 

        <div align=\"center\"> 
          <input type=\"submit\" value=\"Change Record\" name=\"submit\">
        
        </div>
      </td>
    </tr>
  </table>
</form>

</body>
</html>
";
}
?>