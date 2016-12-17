<?php
//physical_modifyrecord2.php 2005

if (!$sel_record) {
	header("Location: http://localhost/Members05/admin_test/actors/physical_modifyrecord.php");
	exit;
	}

//create connection
$connection = mysql_connect("127.0.0.1", "JayServer", "wombat") or die ("Couldn't connect to server.");

//select database
$db = mysql_select_db("mydata", $connection) or die("Couldn't select database.");

//SQL statement to select record
$sql = "SELECT * FROM physical05 WHERE phys_uid = \"$sel_record\"";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


if (!$sql_result) {
	echo "<P>Couldn't get record!</P>";
	} else {
	

//fetch row and assign to variables
$row = mysql_fetch_array($sql_result);
$phys_uid = $row["phys_uid"];
$height = $row["height"];
$weight = $row["weight"];
$eye = $row["eye"];
$hair = $row["hair"];
$age_range = $row["age_range"];
$nativeam = $row["nativeam"];
$asian = $row["nativeam"];
$white = $row["white"];
$black = $row["black"];
$hispanic = $row["hispanic"];
$eeurope = $row["eeurope"];
$mideast = $row["mideast"];
$indian = $row["indian"];

if ($phys_uid != $sel_record) {
	echo "<P><B>Warning:</B> UID not equal to Actor UID. Check databases.</p>";
	}

echo "
<HTML>
<HEAD>
<TITLE>2005 Modify Physical Record</TITLE>
<link rel=\"stylesheet\" href=\"/Members05/admin_test/members.css\" type=\"text/css\">
</HEAD>
<BODY>
<h1>You have selected the following 2005 Physical Table to modify:</h1>
<FORM method = \"POST\" action = \"physical_modifyrecord3.php\">

  <table width=\"88%\" border=\"1\" align=\"center\">
    <tr> 
      <td colspan=\"5\" bgcolor=\"#99FFCC\"> 
        <div align=\"center\"><b>Physical Details: (physical table)</b></div>
      </td>
    </tr>
    <tr> 
      <td> <b>phys_uid</b> 
        <input type=\"text\" name=\"phys_uid\" maxlength=\"5\" size=\"5\" value=\"$phys_uid\">
      </td>
      <td><b>Height: </b> 
        <select name=\"height\" size=\"1\">
	  ";
	  if($height == "4.6 - 4.11") {
	  	echo "<option selected>4.6 - 4.11</option>"; }
		else {echo "<option>4.6 - 4.11</option>";}
	  
	  if($height == "5 - 5.6") {
	  	echo "<option selected>5 - 5.6</option>"; }
		else {echo "<option>5 - 5.6</option>";}
	  
	  if($height == "5.7 - 5.11") {
	  	echo "<option selected>5.7 - 5.11</option>"; }
		else {echo "<option>5.7 - 5.11</option>";}
		
	  if($height == "6 - 6.6") {
	  	echo "<option selected>6 - 6.6</option>"; }
		else {echo "<option>6 - 6.6</option>";}
echo "
    </select>
      </td>
      <td width=\"28%\"><b>Weight:</b> 
        <select name=\"weight\" size=\"1\">
";
	  if($weight == "") {
	  	echo "<option selected></option>"; }
		else {echo "<option></option>";}

	  if($weight == "Up to 110 lbs") {
	  	echo "<option selected>Up to 110 lbs</option>"; }
		else {echo "<option>Up to 110 lbs</option>";}

	  if($weight == "111 to 130 lbs") {
	  	echo "<option selected>111 to 130 lbs</option>"; }
		else {echo "<option>111 to 130 lbs</option>";}

	  if($weight == "131 to 150 lbs") {
	  	echo "<option selected>131 to 150 lbs</option>"; }
		else {echo "<option>131 to 150 lbs</option>";}

	  if($weight == "151 to 170 lbs") {
	  	echo "<option selected>151 to 170 lbs</option>"; }
		else {echo "<option>151 to 170 lbs</option>";}

	  if($weight == "171 to 195 lbs") {
	  	echo "<option selected>171 to 195 lbs</option>"; }
		else {echo "<option>171 to 195 lbs</option>";}

	  if($weight == "Over 195 lbs") {
	  	echo "<option selected>Over 195 lbs</option>"; }
		else {echo "<option>Over 195 lbs</option>";}
echo "
        </select>
      </td>
      <td width=\"26%\"><b>Hair:</b> 
        <select name=\"hair\" size=\"1\" value=\"$hair\">
";

	  if($hair == "Auburn") {
	  	echo "<option selected>Auburn</option>"; }
		else {echo "<option>Auburn</option>";}
		
	  if($hair == "Black") {
	  	echo "<option selected>Black</option>"; }
		else {echo "<option>Black</option>";}

	  if($hair == "Blonde") {
	  	echo "<option selected>Blonde</option>"; }
		else {echo "<option>Blonde</option>";}

	  if($hair == "Dark Brown") {
	  	echo "<option selected>Dark Brown</option>"; }
		else {echo "<option>Dark Brown</option>";}

	  if($hair == "Grey") {
	  	echo "<option selected>Grey</option>"; }
		else {echo "<option>Grey</option>";}

	  if($hair == "Light Brown") {
	  	echo "<option selected>Light Brown</option>"; }
		else {echo "<option>Light Brown</option>";}

	  if($hair == "No Hair") {
	  	echo "<option selected>No Hair</option>"; }
		else {echo "<option>No Hair</option>";}

	  if($hair == "Red") {
	  	echo "<option selected>Red</option>"; }
		else {echo "<option>Red</option>";}		

	  if($hair == "White") {
	  	echo "<option selected>White</option>"; }
		else {echo "<option>White</option>";}																
echo "
        </select>
      </td>
    </tr>
    <tr> 
      <td><b>Eye Color: </b> 
        <select name=\"eye\" size=\"1\">
";
	  if($eye == "Black") {
	  	echo "<option selected>Black</option>"; }
		else {echo "<option>Black</option>";}		

	  if($eye == "Blue") {
	  	echo "<option selected>Blue</option>"; }
		else {echo "<option>Blue</option>";}
		
	  if($eye == "Brown") {
	  	echo "<option selected>Brown</option>"; }
		else {echo "<option>Brown</option>";}

	  if($eye == "Green") {
	  	echo "<option selected>Green</option>"; }
		else {echo "<option>Green</option>";}

	  if($eye == "Hazel") {
	  	echo "<option selected>Hazel</option>"; }
		else {echo "<option>Hazel</option>";}
echo "
        </select>
        <BR>
        <b>Age Range:</b> 
        <select name=\"age_range\" size=\"1\">
";

	  if($age_range == "Under 16") {
	  	echo "<option selected>Under 16</option>"; }
		else {echo "<option>Under 16</option>";}

	  if($age_range == "16-20") {
	  	echo "<option selected>16-20</option>"; }
		else {echo "<option>16-20</option>";}

	  if($age_range == "21-25") {
	  	echo "<option selected>21-25</option>"; }
		else {echo "<option>21-25</option>";}

	  if($age_range == "26-30") {
	  	echo "<option selected>26-30</option>"; }
		else {echo "<option>26-30</option>";}

	  if($age_range == "31-35") {
	  	echo "<option selected>31-35</option>"; }
		else {echo "<option>31-35</option>";}

	  if($age_range == "36-40") {
	  	echo "<option selected>36-40</option>"; }
		else {echo "<option>36-40</option>";}

	  if($age_range == "Over 40") {
	  	echo "<option selected>Over 40</option>"; }
		else {echo "<option>Over 40</option>";}		
echo "
        </select>
        <BR>
      </td>
      <td colspan=\"3\"><b>Role Type: </b> <BR>
";
	if(!empty($nativeam) ) {
	  	echo "<input type=\"checkbox\" name=\"nativeam\" value=\"Native American\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"nativeam\" value=\"Native American\" >";}	
echo "
        Native American 
";
	if(!empty($asian) ) {
	  	echo "<input type=\"checkbox\" name=\"asian\" value=\"Asian\" checked >"; }
		else {echo "<input type=\"checkbox\" name=\"asian\" value=\"Asian\">";}	
echo "
        Asian 
";
	if(!empty($white) ) {
	  	echo "<input type=\"checkbox\" name=\"white\" value=\"Caucasian\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"white\" value=\"Caucasian\">";}	
echo "
        Caucasian 
";
	if(!empty($black) ) {
	  	echo "<input type=\"checkbox\" name=\"black\" value=\"African-American\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"black\" value=\"African-American\">";}	
echo "
        African-American<BR> 
";
	if(!empty($hispanic) ) {
	  	echo "<input type=\"checkbox\" name=\"hispanic\" value=\"Hispanic\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"hispanic\" value=\"Hispanic\">";}	
echo "        
        Hispanic

";
	if(!empty($eeurope) ) {
	  	echo "<input type=\"checkbox\" name=\"eeurope\" value=\"East European\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"eeurope\" value=\"East European\">";}	
echo "
        East European
";
	if(!empty($mideast) ) {
	  	echo "<input type=\"checkbox\" name=\"mideast\" value=\"Middle Eastern\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"mideast\" value=\"Middle Eastern\">";}	
echo "
        Middle Eastern
";
	if(!empty($indian) ) {
	  	echo "<input type=\"checkbox\" name=\"indian\" value=\"Indian\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"indian\" value=\"Indian\">";}	
echo "		
		Indian</td>
    </tr>
    <tr> 
      <td colspan=\"4\"> 
        <div align=\"center\"> 
          <input type=\"submit\" value=\"Change Record\" name=\"submit\">
          <input type=\"reset\" value=\"Clear Form\" name=\"reset\">
        </div>
      </td>
    </tr>
    <tr> 
      <td colspan=\"4\"> 
        <div align=\"center\"><a href=\"/Members05/admin_test/admin_menu05.htm\">Back 
          to Main Menu</a></div>
      </td>
    </tr>
  </table>
";

/*  <table width=\"88%\" border=\"1\" align=\"center\">
    <tr> 
      <td colspan=\"5\" bgcolor=\"#99FFCC\"> 
        <div align=\"center\"><b>Physical Details: (physical table)</b></div>
      </td>
    </tr>
    <tr> 
      <td> <b>phys_uid</b> 
        <input type=\"text\" name=\"phys_uid\" maxlength=\"5\" size=\"5\" value=\"$phys_uid\">
      </td>
      <td>&nbsp;</td>
      <td width=\"28%\"><b>Height: </b> 
        <select name=\"height\" size=\"1\">
	  ";
	  if($height == "4.6 - 4.11") {
	  	echo "<option selected>4.6 - 4.11</option>"; }
		else {echo "<option>4.6 - 4.11</option>";}
	  
	  if($height == "5 - 5.6") {
	  	echo "<option selected>5 - 5.6</option>"; }
		else {echo "<option>5 - 5.6</option>";}
	  
	  if($height == "5.7 - 5.11") {
	  	echo "<option selected>5.7 - 5.11</option>"; }
		else {echo "<option>5.7 - 5.11</option>";}
		
	  if($height == "6 - 6.6") {
	  	echo "<option selected>6 - 6.6</option>"; }
		else {echo "<option>6 - 6.6</option>";}
echo "
    </select>

      <td width=\"26%\"><b>Weight:</b> 
        <select name=\"weight\" size=\"1\">
";
	  if($weight == "") {
	  	echo "<option selected> </option>"; }
		else {echo "<option> </option>";}

	  if($weight == "Up to 110 lbs") {
	  	echo "<option selected>Up to 110 lbs</option>"; }
		else {echo "<option>Up to 110 lbs</option>";}

	  if($weight == "111 to 130 lbs") {
	  	echo "<option selected>111 to 130 lbs</option>"; }
		else {echo "<option>111 to 130 lbs</option>";}

	  if($weight == "131 to 150 lbs") {
	  	echo "<option selected>131 to 150 lbs</option>"; }
		else {echo "<option>131 to 150 lbs</option>";}

	  if($weight == "151 to 170 lbs") {
	  	echo "<option selected>151 to 170 lbs</option>"; }
		else {echo "<option>151 to 170 lbs</option>";}

	  if($weight == "171 to 195 lbs") {
	  	echo "<option selected>171 to 195 lbs</option>"; }
		else {echo "<option>171 to 195 lbs</option>";}

	  if($weight == "196 lbs &amp; over") {
	  	echo "<option selected>196 lbs &amp; over</option>"; }
		else {echo "<option>196 lbs &amp; over</option>";}
echo "
        </select>
      </td>
    </tr>
    <tr> 
      <td><b>Hair:</b> 
        <select name=\"hair\" size=\"1\" value=\"$hair\">
";

	  if($hair == "Auburn") {
	  	echo "<option selected>Auburn</option>"; }
		else {echo "<option>Auburn</option>";}
		
	  if($hair == "Black") {
	  	echo "<option selected>Black</option>"; }
		else {echo "<option>Black</option>";}

	  if($hair == "Blonde") {
	  	echo "<option selected>Blonde</option>"; }
		else {echo "<option>Blonde</option>";}

	  if($hair == "Dark Brown") {
	  	echo "<option selected>Dark Brown</option>"; }
		else {echo "<option>Dark Brown</option>";}

	  if($hair == "Grey") {
	  	echo "<option selected>Grey</option>"; }
		else {echo "<option>Grey</option>";}

	  if($hair == "Light Brown") {
	  	echo "<option selected>Light Brown</option>"; }
		else {echo "<option>Light Brown</option>";}

	  if($hair == "Red") {
	  	echo "<option selected>Red</option>"; }
		else {echo "<option>Red</option>";}		

	  if($hair == "White") {
	  	echo "<option selected>White</option>"; }
		else {echo "<option>White</option>";}																
echo "
        </select>
      </td>
      <td><b>Eye Color: </b> 
        <select name=\"eye\" size=\"1\">
";

	  if($eye == "Black") {
	  	echo "<option selected>Black</option>"; }
		else {echo "<option>Black</option>";}		

	  if($eye == "Blue") {
	  	echo "<option selected>Blue</option>"; }
		else {echo "<option>Blue</option>";}
		
	  if($eye == "Brown") {
	  	echo "<option selected>Brown</option>"; }
		else {echo "<option>Brown</option>";}

	  if($eye == "Green") {
	  	echo "<option selected>Green</option>"; }
		else {echo "<option>Green</option>";}

	  if($eye == "Hazel") {
	  	echo "<option selected>Hazel</option>"; }
		else {echo "<option>Hazel</option>";}
echo "
        </select>
      </td>
      <td width=\"28%\"><b>Age Range:</b> 
        <select name=\"age_range\" size=\"1\">
";

	  if($age_range == "16-20") {
	  	echo "<option selected>16-20</option>"; }
		else {echo "<option>16-20</option>";}

	  if($age_range == "21-25") {
	  	echo "<option selected>21-25</option>"; }
		else {echo "<option>21-25</option>";}

	  if($age_range == "26-30") {
	  	echo "<option selected>26-30</option>"; }
		else {echo "<option>26-30</option>";}

	  if($age_range == "31-35") {
	  	echo "<option selected>31-35</option>"; }
		else {echo "<option>31-35</option>";}

	  if($age_range == "36-40") {
	  	echo "<option selected>36-40</option>"; }
		else {echo "<option>36-40</option>";}

	  if($age_range == "41 &amp; over") {
	  	echo "<option selected>41 &amp; over</option>"; }
		else {echo "<option>41 &amp; over</option>";}		
echo "
        </select>
      </td>
      <td width=\"26%\"><b>Role Type:</b> 
        <select name=\"type\" size=\"1\">
";

	  if($type == "Asian") {
	  	echo "<option selected>Asian</option>"; }
		else {echo "<option>Asian</option>";}

	  if($type == "Caucasian") {
	  	echo "<option selected>Caucasian</option>"; }
		else {echo "<option>Caucasian</option>";}
		
	  if($type == "East European") {
	  	echo "<option selected>East European</option>"; }
		else {echo "<option>East European</option>";}
		
 	  if($type == "Hispanic") {
	  	echo "<option selected>Hispanic</option>"; }
		else {echo "<option>Hispanic</option>";}

	  if($type == "Indian") {
	  	echo "<option selected>Indian</option>"; }
		else {echo "<option>Indian</option>";}		
		
	  if($type == "Middle Eastern") {
	  	echo "<option selected>Middle Eastern</option>"; }
		else {echo "<option>Middle Eastern</option>";}

	  if($type == "Native American") {
	  	echo "<option selected>Native American</option>"; }
		else {echo "<option>Native American</option>";}


echo "
        </select>
      </td>
    </tr>
    <tr> 
      <td colspan=\"4\"> 
        <div align=\"center\">
          <input type=\"submit\" value=\"Change Record\" name=\"submit\">
        </div>
      </td>
    </tr>
    <tr> 
      <td colspan=\"4\">
        <div align=\"center\"><a href=\"/Members05/admin_test/admin_menu05.htm\">Back 
          to Main Menu</a></div>
      </td>
    </tr>
  </table>
*/
echo "
</FORM>
</BODY>
</HTML>
";
}
?>