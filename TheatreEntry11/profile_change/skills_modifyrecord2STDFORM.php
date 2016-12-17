<?php
//Theatre Application: skills_modifyrecord2.php

$thea_uid = $_POST['thea_uid'];


//$skills_uid = $thea_uid;
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

//121506 check to make sure roles exist
/*SQL statement to check if uid exists in module;
otherwise insert uid into module. */

/*if needed, insert skills_uid*/
$sql_insert_skills = "INSERT INTO theaskills12 (skills_uid) VALUES ('$thea_uid')";
    	
	
include("../../Comm/connect.inc");


/*execute SQL query for checking if roles_uid exists*/

	if (mysql_query($sql_insert_skills,$connection)) {
		echo "Record Inserted";
	}
include("../../Comm/connect.inc");

//SQL statement to select record
$sql = "SELECT * FROM theaskills12 WHERE skills_uid = \"$thea_uid\"";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query: Select Record and Connect.");


if (!$sql_result) {
	echo "<P>Couldn't get record!</P>";
	} else {
	

//fetch row and assign to variables
$row = mysql_fetch_array($sql_result);
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
$re_other2= $row["re_other2"]; 



echo "
<form name=\"form1\" method=\"post\" action=\"skills_modifyrecord3.php\">
<input type = \"hidden\" name = \"skills_uid\" value = \"$skills_uid\">
";

echo "

<P>The following information is used in your Theatre Profile and Job Listing on our web site. PLEASE submit this form as soon as possible and fax to us at 203-254-8572 or mail to the address above. You can also scan the forms and email to us at 
info@strawhat-auditions.com.</p>

<P>To recruit the largest number of technical candidates post your job listing as soon as possible. You can modify as your needs 
change. In addition, please mail a one page description of your theatre, season and any details you wish us to provide. This should be camera ready, cleanly typed and printed, preferably on letterhead or similar presention. The description should be mailed or emailed as a pdf for reproduction.</P>

  <P>Please check each area in which you currently anticipate hiring for the season. Use the <b>Remarks</b> space to indicate particular information, such as <i>Assistant Only</i>, or <i>May also operate lighting board when box office closed</i>. Create a list of positions at your theatre to be posted on our site.  Please note AEA or non-AEA requirements. Music Directors candidates are expected to 
be able to accompany and/or conduct from the piano.</p>
";
?>




<table width="75%" border="1" cellspacing="1" cellpadding="1">
  <tr> 
    <td colspan="4">
      <div align="center">STAFF/TECHNICAL/DESIGN General Information</div>
    </td>
    <td width="3%">&nbsp;</td>
  </tr>
  <tr> 
    <td width="28%">Total number openings</td>
    <td width="22%">Staff:
      <form name="form3" method="post" action="">
        <input type="text" name="std_staff" size="3" maxlength="3">
      </form>
    </td>
    <td width="25%">Interns:
      <form name="form4" method="post" action="">
        <input type="text" name="std_interns" size="3" maxlength="3">
      </form>
    </td>
    <td width="22%">Apprentices: 
      <form name="form5" method="post" action="">
        <input type="text" name="std_apprentice" size="3" maxlength="3">
      </form>
    </td>
    <td width="3%">&nbsp;</td>
  </tr>
  <tr> 
    <td width="28%">Approximate Contract Dates</td>
    <td width="22%">From:</td>
    <td width="25%">To:</td>
    <td width="22%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
  </tr>
  <tr> 
    <td width="28%">Housing</td>
    <td colspan="3"> 
      <form name="form1" method="post" action="">
        <input type="checkbox" name="checkbox" value="checkbox">
        Provided All 
        <input type="checkbox" name="checkbox2" value="checkbox">
        Provided for Some 
        <input type="checkbox" name="checkbox3" value="checkbox">
        Subsidized 
        <input type="checkbox" name="checkbox4" value="checkbox">
        Negotiable 
      </form>
    </td>
    <td width="3%">&nbsp;</td>
  </tr>
  <tr> 
    <td width="28%">Meals</td>
    <td colspan="3"> 
      <form name="form2" method="post" action="">
        <input type="checkbox" name="checkbox5" value="checkbox">
        All Provided 
        <input type="checkbox" name="checkbox6" value="checkbox">
        Some Provided 
        <input type="checkbox" name="checkbox7" value="checkbox">
        Kitchen Facilities Available 
        <input type="checkbox" name="checkbox8" value="checkbox">
        Subsidized 
      </form>
    </td>
    <td width="3%">&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="4"> 
      <div align="center"><b>General Salary Range:</b></div>
    </td>
    <td width="3%">&nbsp;</td>
  </tr>
  <tr> 
    <td width="28%">Staff:</td>
    <td width="22%">From: XX per XX</td>
    <td width="25%">To: XX per XX</td>
    <td width="22%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
  </tr>
  <tr> 
    <td width="28%">Designers</td>
    <td width="22%">From: XX per XX</td>
    <td width="25%">To: XX per XX</td>
    <td width="22%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
  </tr>
  <tr> 
    <td width="28%">Interns</td>
    <td width="22%">From: XX per XX</td>
    <td colspan="2">X Unpaid X EMC X Room X Board</td>
    <td width="3%">&nbsp;</td>
  </tr>
  <tr> 
    <td width="28%">Apprentices</td>
    <td width="22%">From: XX per XX</td>
    <td colspan="2">X Unpaid X EMC X Room X Board</td>
    <td width="3%">&nbsp;</td>
  </tr>

</table>



<?php
echo "
  <table width=\"65%\" border=\"1\" align=\"center\">

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
        Administration</td>
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
        Box Office</td>
		
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
        Carpentry</td>
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
      <input type=\"text\" name=\"re_choreo\" maxlength=\"75\" size=\"75\" value=\"$choreo\" >      
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
    <input type=\"text\" name=\"re_costume\" maxlength=\"75\" size=\"75\" value=\"$costume\" >             
    </td>
</tr>

<tr>
<td>    
";
	if(!empty($director) ) {
	  	echo "<input type=\"checkbox\" name=\"director\" value=\"Director\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"director\" value=\"Director\">";}	
echo "
        Director</font></td>
        
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
        <input type=\"text\" name=\"re_house\" maxlength=\"75\" size=\"75\" value=\"$house\" >
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
        <input type=\"text\" name=\"re_electrics\" maxlength=\"75\" size=\"75\" value=\"$electrics\" >
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
        <input type=\"text\" name=\"re_musicdir\" maxlength=\"75\" size=\"75\" value=\"$musicdir\" >
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
        <input type=\"text\" name=\"re_photo\" maxlength=\"75\" size=\"75\" value=\"$photo\" >
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
        <input type=\"text\" name=\"re_props\" maxlength=\"75\" size=\"75\" value=\"$props\" >
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
        Scenic</td>
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
        <input type=\"text\" name=\"re_other1\" maxlength=\"75\" size=\"75\" value=\"$other1\" >
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
        <input type=\"text\" name=\"re_other2\" maxlength=\"75\" size=\"75\" value=\"$other2\" >
</td>
</tr>      
";


echo "
      &nbsp</font>
</td>
</tr>    
    

    <tr> 
      <td colspan=\"6\" align = \"center\"> 
        <input type=\"submit\" value=\"Change Record\" name=\"submit\">
      </td>

    </tr>
  </table>
  
</FORM>
</BODY>
</HTML>
";
}
?>