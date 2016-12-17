<?php


if (!$sel_record) {
	header("Location: http://localhost/Members05/admin_test/actors/actor_modifyrecord.php");
	exit;
	}

//create connection
$connection = mysql_connect("127.0.0.1", "JayServer", "wombat") or die ("Couldn't connect to server.");

//select database
$db = mysql_select_db("mydata", $connection) or die("Couldn't select database.");

//SQL statement to select record
$sql = "SELECT * FROM actor05 WHERE actor_uid = \"$sel_record\"";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


if (!$sql_result) {
	echo "<P>Couldn't get record!</P>";
	} else {
	

//fetch row and assign to variables
$row = mysql_fetch_array($sql_result);
$actor_uid = $row["actor_uid"];
$lastname = $row["lastname"];
$firstname = $row["firstname"];
$midname = $row["midname"];
$date_entered = $row["date_entered"];
$region = $row["region"];
$phone = $row["phone"];
$email = $row["email"];
$large_city = $row["large_city"];
$apprentice = $row["apprentice"];
$intern = $row["intern"];
$availfor = $row["availfor"];
$availto = $row["availto"];
$h_or_serv = $row["h_or_serv"];
$pix_link = $row["pix_link"];
$resume_link = $row["resume_link"];
$gender = $row["gender"];
$singing = $row["singing"];
$u_none = $row["u_none"];
$u_sag = $row["u_sag"];
$u_aftra = $row["u_aftra"];
$u_agva = $row["u_agva"];
$u_emc = $row["u_emc"];
$u_agma = $row["u_agma"];

echo "
<html>
<head>
<title>Change Actor Record</title>
<link rel=\"stylesheet\" href=\"/Members05/admin_test/members.css\" type=\"text/css\">
</head>

<body bgcolor=\"#FFFFFF\" text=\"#000000\">
<h1>StrawHat Actor 2005 Database: Change Record</h1>
<form name=\"form1\" method=\"post\" action=\"actor_modifyrecord3.php\">
  <table width=\"82%\" border=\"0\" align=\"center\">
    <tr bgcolor=\"#FF66CC\"> 
      <td colspan=\"5\"> 
        <div align=\"center\"><b>Change actor (table:actor) UID <input type=\"text\" name=\"actor_uid\" maxlength=\"4\" size=\"4\" value=\"$actor_uid\"></b></div>
      </td>
    </tr>
    <tr> 
      <td width=\"19%\"><b>First Name:</b><BR><b>Middle:</b></td>
      <td width=\"27%\"> 
        <input type=\"text\" name=\"firstname\" maxlength=\"30\" size=\"30\" value=\"$firstname\">
        <input type=\"text\" name=\"midname\" maxlength=\"30\" size=\"30\" value=\"$midname\">
	  </td>
      <td width=\"13%\"><b>Last Name:</b> </td>
      <td colspan=\"2\"> 
        <input type=\"text\" name=\"lastname\" size=\"30\" maxlength=\"30\" value=\"$lastname\">
      </td>
    </tr>
    <tr> 
      <td width=\"19%\"><b>Email</b></td>
      <td width=\"27%\"> 
        <input type=\"text\" name=\"email\" maxlength=\"50\" size=\"30\" value=\"$email\">
      </td>
      <td width=\"13%\"><b>Phone</b></td>
      <td width=\"18%\"> 
        <input type=\"text\" name=\"phone\" maxlength=\"20\" size=\"20\" value=\"$phone\">
      </td>
      <td width=\"23%\"><b>h/s</b> 
        <select name=\"h_or_serv\" size=\"1\">
";
	  if($h_or_serv == "H") {
	  	echo "<option selected>H</option>"; }
		else {echo "<option>H</option>";}
	  
	  if($h_or_serv == "S") {
	  	echo "<option value=\"S\" selected>S</option>"; }
		else {echo "<option>S</option>";}
	  
	  if($h_or_serv == "C") {
	  	echo "<option selected>C</option>"; }
		else {echo "<option>C</option>";}
echo "
        </select>
      </td>
    </tr>
    <tr> 
      <td width=\"19%\"> <b>Unpaid apprentice?</b> </td>
      <td width=\"27%\"> 
        <select name=\"apprentice\" size=\"1\">
";		
	  if($apprentice == "Y") {
	  	echo "<option value=\"Y\" selected>Y</option>"; }
		else {echo "<option value=\"Y\">Y</option>";}
	  
	  if($apprentice == "N") {
	  	echo "<option value=\"N\" selected>N</option>"; }
		else {echo "<option value=\"N\">N</option>";}
echo "
        </select>
      </td>
      <td width=\"13%\"><b>Gender</b></td>
      <td colspan=\"2\"> 
        <select name=\"gender\" size=\"1\">
";
	  if($gender == "F") {
	  	echo "<option value=\"F\" selected>F</option>"; }
		else {echo "<option value=\"F\">F</option>";}
	  
	  if($gender == "M") {
	  	echo "<option value=\"M\" selected>M</option>"; }
		else {echo "<option value=\"M\">M</option>";}
echo "				
        </select>
      </td>
    </tr>
    <tr> 
      <td width=\"19%\"> <b>Internship?</b> </td>
      <td width=\"27%\"> 
        <select name=\"intern\" size=\"1\">
";
	  if($intern == "Y") {
	  	echo "<option value=\"Y\" selected>Y</option>"; }
		else {echo "<option value=\"Y\">Y</option>";}
	  
	  if($intern == "N") {
	  	echo "<option value=\"N\" selected>N</option>"; }
		else {echo "<option value=\"N\">N</option>";}
echo "		
        </select>
      </td>
      <td width=\"13%\"><b>Singing </b></td>
      <td colspan=\"2\"> 
        <select name=\"singing\" size=\"1\">
";
	  if($singing == "Y") {
	  	echo "<option value=\"Y\" selected>Y</option>"; }
		else {echo "<option value=\"Y\">Y</option>";}
	  
	  if($singing == "N") {
	  	echo "<option value=\"N\" selected>N</option>"; }
		else {echo "<option value=\"N\">N</option>";}		
echo"
        </select>
      </td>
    </tr>
    <tr> 
      <td colspan=\"2\"> 
        <div align=\"center\"><b>Union Status</b> </div>
      </td>
      <td colspan=\"3\"> 
        <div align=\"center\"><b>Nearest Largest City: 
          <input name=\"large_city\" size=\"30\" type=\"text\" maxlength=\"20\" value=\"$large_city\">
          </b></div>
      </td>
    </tr>
    <tr> 
      <td colspan=\"2\"> 
        <div align=\"center\"> 
";
	if(!empty($u_none) ) {
	  	echo "<input type=\"checkbox\" name=\"u_none\" value=\"None\" checked>"; }
		else { echo "<input type=\"checkbox\" name=\"u_none\" value=\"None\" >"; }	
echo "
          <b>None</b> 
";
	if(!empty($u_emc) ) {
	  	echo "<input type=\"checkbox\" name=\"u_emc\" value=\"EMC\" checked>"; }
		else { echo "<input type=\"checkbox\" name=\"u_emc\" value=\"EMC\" >";}	
echo "
          <b>EMC</b> 
";
	if(!empty($u_sag) ) {
	  	echo "<input type=\"checkbox\" name=\"u_sag\" value=\"SAG\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"u_sag\" value=\"SAG\" >";}	
echo "
          <b> SAG </b> 
";
	if(!empty($u_aftra) ) {
	  	echo "<input type=\"checkbox\" name=\"u_aftra\" value=\"AFTRA\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"u_aftra\" value=\"AFTRA\" >";}	
echo "
          <b>AFTRA</b> <br>
";
	if(!empty($u_agva) ) {
	  	echo "<input type=\"checkbox\" name=\"u_agva\" value=\"AGVA\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"u_agva\" value=\"AGVA\" >";}	
echo " 
          <b>AGVA</b> 
";
	if(!empty($u_agma) ) {
	  	echo "<input type=\"checkbox\" name=\"u_agma\" value=\"AGMA\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"u_agma\" value=\"AGMA\" >";}	
echo "
          <b>AGMA</b> </div>
      </td>
      <td colspan=\"3\"> 
        <div align=\"center\"></div>
        <div align=\"center\"><b>Region:</b> 
          <select name=\"region\" size=\"1\">
";
	  if($region == "Midwest") {
	  	echo "<option value=\"Midwest\" selected>Midwest</option>"; }
		else {echo "<option value=\"Midwest\">Midwest</option>";}
	  
	  if($region == "Northeast") {
	  	echo "<option value=\"Northeast\" selected>Northeast</option>"; }
		else {echo "<option value=\"Northeast\">Northeast</option>";}
	  
	  if($region == "Northwest") {
	  	echo "<option value=\"Northwest\" selected>Northwest</option>"; }
		else {echo "<option value=\"Northwest\">Northwest</option>";}

	  if($region == "South") {
	  	echo "<option value=\"South\" selected>South</option>"; }
		else {echo "<option value=\"South\">South</option>";}

	  if($region == "Southeast") {
	  	echo "<option value=\"Southeast\" selected>Southeast</option>"; }
		else {echo "<option value=\"Southeast\">Southeast</option>";}

	  if($region == "Southwest") {
	  	echo "<option value=\"Southwest\" selected>Southwest</option>"; }
		else {echo "<option value=\"Southwest\">Southwest</option>";}
echo "
          </select>
        </div>
      </td>
    </tr>
    <tr> 
      <td width=\"19%\">&nbsp;</td>
      <td width=\"27%\"> </td>
      <td colspan=\"3\"> 
        <div align=\"center\"></div>
      </td>
    </tr>
    <tr> 
      <td width=\"19%\"><b>Availability</b><b> From:</b> </td>
      <td width=\"27%\"> 
        <select name=\"availfor\">
";
	  if($availfor == "") {
	  	echo "<option selected></option>"; }
		else {echo "<option></option>";}
	  
	  if($availfor == "Now") {
	  	echo "<option selected>Now</option>"; }
		else {echo "<option>Now</option>";}
		
	  if($availfor == "April") {
	  	echo "<option selected>April</option>"; }
		else {echo "<option>April</option>";}
		
	  if($availfor == "May") {
	  	echo "<option selected>May</option>"; }
		else {echo "<option>May</option>";}		

	  if($availfor == "June") {
	  	echo "<option selected>June</option>"; }
		else {echo "<option>June</option>";}

	  if($availfor == "July") {
	  	echo "<option selected>July</option>"; }
		else {echo "<option>July</option>";}

	  if($availfor == "August") {
	  	echo "<option selected>August</option>"; }
		else {echo "<option>August</option>";}
		
	  if($availfor == "September") {
	  	echo "<option selected>September</option>"; }
		else {echo "<option>September</option>";}
echo "		
        </select>
      </td>
      <td colspan=\"3\"><b>To:</b> 
        <select name=\"availto\">
";
	  if($availto == "") {
	  	echo "<option selected></option>"; }
		else {echo "<option></option>";}
	  
	  if($availto == "Open") {
	  	echo "<option selected>Open</option>"; }
		else {echo "<option>Open</option>";}
	  
	  if($availto == "July") {
	  	echo "<option selected>July</option>"; }
		else {echo "<option>July</option>";}
		
	  if($availto == "August") {
	  	echo "<option selected>August</option>"; }
		else {echo "<option>August</option>";}
		
	  if($availto == "September") {
	  	echo "<option selected>September</option>"; }
		else {echo "<option>September</option>";}		

	  if($availto == "After September") {
	  	echo "<option selected>After September</option>"; }
		else {echo "<option>After September</option>";}	
echo "
        </select>
      </td>
    </tr>
<tr>
 <td> </td>
 <td><b>Pic Link:</b> <input type=\"text\" name=\"pix_link\" maxlength=\"30\" size=\"30\" value=\"$pix_link\">
 <td><b>Resume Link: </b><input type=\"text\" name=\"resume_link\" maxlength=\"30\" size=\"30\" value=\"$resume_link\">
 <td colspan=\"2\">
</tr>

    <tr> 
      <td colspan=\"5\"> 
        <div align=\"center\"> 
          <input type=\"submit\" value=\"Change Record\" name=\"submit\">
        </div>
      </td>
    </tr>
    <tr>
      <td colspan=\"5\">
        <div align=\"center\"><a href=\"/Members05/admin_test/admin_menu05.htm\">Back 
          to Main Menu</a></div>
      </td>
    </tr>
  </table>
</form>

</body>
</html>
";
}
?>