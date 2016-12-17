<?php
//aud_modifyrecord3
$audition_uid = $_POST['audition_uid'];
$audition_2yr = $_POST['audition_2yr'];
$audition_lyr = $_POST['audition_lyr'];
$ever = $_POST['ever'];
$stock_lyr = $_POST['stock_lyr'];
$stock_lyrwhere = $_POST['stock_lyrwhere'];
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
$apply_lyr = $_POST['apply_lyr'];
$u_emc = $_POST['u_emc'];
$u_sag = $_POST['u_sag'];
$u_aftra = $_POST['u_aftra'];
$u_agma = $_POST['u_agma'];
$u_agva = $_POST['u_agva'];
//$availfor = $_POST['availfor'];                 echo "$availfor<BR>";
//$availto = $_POST['availto'];                   echo "$availto<BR>";

//dates
$datefrom_day = $_POST['datefrom_day'];
$datefrom_month = $_POST['datefrom_month'];
$datefrom_year = $_POST['datefrom_year'];

$dateto_day = $_POST['dateto_day'];
$dateto_month = $_POST['dateto_month'];
$dateto_year = $_POST['dateto_year'];

//parse availto, availfrom dates
$availfor = $datefrom_year . "-" . $datefrom_month . "-" . $datefrom_day;
$availto = $dateto_year . "-" . $dateto_month . "-" .  $dateto_day;



include("../../Comm/connect.inc");

//variables for edit review only
$vever = stripslashes($ever);
$vstock_lyrwhere = stripslashes($stock_lyrwhere);

/*parse values for selected checkboxes
supress error msg by using isset() to test is variable exists - 
variables from checkboxes are not forwarded unless checked -
assign to those not checked to avoid errors and notices
---------------------------------------------------------*/
if(!isset($songThursMorn)) {
	$songThursMorn = NULL;
}
if (!isset($songThursAft)){
	$songThursAft = NULL;
}
if(!isset($songFriMorn)) {
	$songFriMorn = NULL;
}
if(!isset($songFriAft)) {
	$songFriAft = NULL;
}
if(!isset($songSatMorn)) {
	$songSatMorn = NULL;
}
if(!isset($songSatAft)) {
	$songSatAft = NULL;
}

if(!isset($u_emc)) {
	$u_emc = NULL;
}
if(!isset($u_sag)) {
	$u_sag = NULL;
}
if(!isset($u_aftra)) {
	$u_aftra = NULL;
}
if(!isset($u_agva)) {
	$u_agva = NULL;
}
if(!isset($u_agma)) {
	$u_agma = NULL;
}

//parse availto, availfrom dates
$availfor = $datefrom_year . "-" . $datefrom_month . "-" . $datefrom_day;
$availto = $dateto_year . "-" . $dateto_month . "-" .  $dateto_day;



/*check to see that at least one day was selected.*/
if(!isset($songThursMorn) &&
!isset($songThursAft) &&
!isset($songFriMorn) &&
!isset($songFriAft) &&
!isset($songSatMorn) &&
!isset($songSatAft) ) {
echo"
<HTML>
<HEAD>
<TITLE>StrawHat Updated Audition Information</TITLE>
<link rel=\"stylesheet\" href=\"actors.css\" type=\"text/css\">
</HEAD>
<BODY>
";
include("banner.inc");
echo "

<h2>Select at least one Audition Day. Use Back Button on your browser to select a day.</h2>
</BODY>
</HTML>
";

exit;
}


//trim and slashes
$ever = addslashes(trim($ever));
$stock_lyrwhere = addslashes(trim($stock_lyrwhere));


//SQL statement to update record
$sql = "UPDATE audition11 SET 
audition_2yr=\"$audition_2yr\",
audition_lyr=\"$audition_lyr\",
ever=\"$ever\",
stock_lyr=\"$stock_lyr\",
stock_lyrwhere=\"$stock_lyrwhere\",
apprentice=\"$apprentice\",
intern=\"$intern\",
songThursMorn=\"$songThursMorn\",
songThursAft=\"$songThursAft\",
songFriMorn=\"$songFriMorn\",
songFriAft=\"$songFriAft\",
songSatMorn=\"$songSatMorn\",
songSatAft=\"$songSatAft\",
standby=\"$standby\",
mononly=\"$mononly\",
apply_lyr=\"$apply_lyr\",
u_emc=\"$u_emc\",
u_sag=\"$u_sag\",
u_aftra=\"$u_aftra\",
u_agma=\"$u_agma\",
u_agva=\"$u_agva\",
availfor=\"$availfor\",
availto=\"$availto\"
WHERE audition_uid = \"$audition_uid\"
 ";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


if (!$audition_uid) {
	echo "<P>Couldn't update record!</P>";
	exit; 
	} else {

		
echo "
<HTML>
<HEAD>
<TITLE>StrawHat Updated Audition Information</TITLE>
<link rel=\"stylesheet\" href=\"actors.css\" type=\"text/css\">
</HEAD>
<BODY>
";
include("banner.inc");
	
echo "	

<h1 align = \"center\">You have made these changes:</h1>
<FORM method = \"POST\" action = \"changes.php\">
<input type = \"hidden\" name = \"sel_record\" value = \"$audition_uid\">
<input type = \"hidden\" name = \"actor_uid\" value = \"$audition_uid\">



  <table width=\"68%\" border=\"1\" align=\"center\">
    <tr> 
      <td colspan=\"3\" bgcolor=\"#99FFCC\"> 
        <div align=\"center\"><b>Audition Information</b></div>
      </td>
    </tr>
    <tr> 
      <td colspan=\"2\"><b>Did you audition at StrawHat last year?</b>&nbsp;
";		
		if($audition_lyr == "Y") {
	  	echo "Yes"; }
		else {echo "No";}

echo "		
      <b>(2) years ago?</b>&nbsp;
";
		if($audition_2yr == "Y") {
	  	echo "Yes"; }
		else {echo "No";}
echo "

	  <b>Ever:</b> $vever</td>
    </tr>
    <tr> 
      <td colspan=\"2\"><b>Did you apply for an audition last year?</b>&nbsp;
";		
		if($apply_lyr == "Y") {
	  	echo "Yes"; }
		else {echo "No";}
echo "        
      </td>
    </tr>
    <tr> 
      <td height=\"39\"><b>Did you do Summer Stock last year.</b> 
";		
		if($stock_lyr == "Y") {
	  	echo "Yes"; }
		else {echo "No";}
echo "
        <b>Where:</b> $vstock_lyrwhere 
      </td>
      <td rowspan=\"2\"><i><b>Audition Preference:</b></i><br>
";
	if ($mononly == "N") {
		echo "Song and Monologue Audition";}
		elseif ($mononly == "Y") {echo "Monologue Only";}
      	else {echo "Dancers Only Audition";}
      	
echo "      
      </td>
    </tr>
    <tr> 
      <td><b>Would you consider accepting an unpaid apprentice position?</b> 
";		
		if($apprentice == "Y") {
	  	echo "Yes"; }
		else {echo "No";}

echo "        
      </td>
    </tr>
    <tr> 
      <td><b>An internship involving crew work as well as performing?</b> 
";		
		if($intern == "Y") {
	  	echo "Yes"; }
		else {echo "No";}

echo "        
      </td>
      <td width=\"33%\"> 
        <div align=\"left\"><b>Audition Days</b></div>
      </td>
    </tr>
    <tr> 
      <td><b>Will you accept a standby appointment:</b>&nbsp; 
";		
		if($standby == "Y") {
	  	echo "Yes"; }
		else {echo "No";}

echo "
      </td>
      <td rowspan=\"3\">
";
	if(!empty($songThursMorn) ) {        
        echo "Fri Morning<br>";}

	if(!empty($songThursAft) ) {        
        echo "Fri Afternoon<br>"; }

	if(!empty($songFriMorn) ) {        
        echo "Sat Morning<br>"; }

	if(!empty($songFriAft) ) {        
        echo "Sat Afternoon<br>"; }

	if(!empty($songSatMorn) ) {        
        echo "Sun Morning<br>"; }
  
	if(!empty($songSatAft) ) {        
        echo "Sun Afternoon<br>"; }

echo "  
        </td>
    </tr>
    <tr> 
      <td> 
        <div align=\"center\"><b>Union Status</b><BR>
";          
        if(!empty($u_emc) ) {        
        echo "EMC "; }
        else {echo ""; }

	if(!empty($u_sag) ) {        
        echo "SAG "; }
        else {echo ""; }

    if(!empty($u_aftra) ) {        
        echo "AFTRA "; }
        else {echo ""; }

        if(!empty($u_agva) ) {        
        echo "AGVA "; }
        else {echo ""; }

     if(!empty($u_agma) ) {        
        echo "AGMA"; }
        else {echo ""; }
echo "
      </td>
    </tr>
    <tr> 
      <td> 
        <div align=\"center\"><b>Availability</b><b> From:</b> 
";		

//parse date
echo " $datefrom_month / $datefrom_day / $datefrom_year";
/*
if($availfor == "N") {
	  	echo "Now";}

	  if($availfor == "A") {
	  	echo "April"; }
	  
	  if($availfor == "M") {
	  	echo "May"; }

	  if($availfor == "Jn") {
	  	echo "June"; }
	  
	  if($availfor == "Jl") {
	  	echo "July"; }

	  if($availfor == "Au") {
	  	echo "August"; }
	  
	  if($availfor == "S") {
	  	echo "September"; }
	  
*/	  	
echo "        
          <b>To:</b> 
";

//parse date
//parse date
echo " $dateto_month / $dateto_day / $dateto_year";
/*

	  if($availto == "O") {
	  	echo "Open"; }

	  if($availto == "A") {
	  	echo "April"; }
	  
	  if($availto == "M") {
	  	echo "May"; }

		if($availto == "Jn") {
	  	echo "June"; }
	  
	  if($availto == "Jl") {
	  	echo "July"; }

	  if($availto == "Au") {
	  	echo "August"; }
	  
	  if($availto == "S") {
	  	echo "September"; }

	  if($availto == "B") {
	  	echo "Beyond September"; }
*/
	  echo "
        </div>
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