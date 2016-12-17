<?php
//skills_modifyrecord2.php
$actor_uid = $_POST['actor_uid'];
echo "
<HTML>
<HEAD>
<TITLE>Strawhat Update Skills Information</TITLE>
<link rel=\"stylesheet\" href=\"actors.css\" type=\"text/css\">
</HEAD>
<body>
";
include("banner.inc");

echo "
<table align=\"center\" width = \"40%\">
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
	echo "No actor_uid found (skills.modifyrecord2), if the error persists contact StrawHat Auditions";
	exit;
	}

//121506 check to make sure roles exist
/*SQL statement to check if uid exists in module;
otherwise insert uid into module. */

/*if needed, insert skills_uid*/
$sql_insert_skills = "INSERT INTO skills11 (skills_uid) VALUES ('$actor_uid')";	
	
include("../../Comm/connect.inc");


/*execute SQL query for checking if roles_uid exists*/

	if (mysql_query($sql_insert_skills,$connection)) {
		echo "Record Inserted";
	}
include("../../Comm/connect.inc");

//SQL statement to select record
$sql = "SELECT * FROM skills11 WHERE skills_uid = \"$actor_uid\"";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query: connect.");


if (!$sql_result) {
	echo "<P>Couldn't get record!</P>";
	} else {
	

//fetch row and assign to variables
$row = mysql_fetch_array($sql_result);
$skills_uid = $row["skills_uid"];
$vocal = $row["vocal"];
$ballet = $row["ballet"];
$mus_thea = $row["mus_thea"];
$ballroom = $row["ballroom"];
$tap = $row["tap"];
$swing = $row["swing"];
$jazz = $row["jazz"];
$perc = $row["perc"];
$bass = $row["bass"]; 
$sax = $row["sax"];
$banjo = $row["banjo"];
$piano = $row["piano"];
$drums = $row["drums"];
$cello = $row["cello"];
$clarinet = $row["clarinet"];
$trombone = $row["trombone"];
$trumpet = $row["trumpet"];
$flute = $row["flute"];
$violin = $row["violin"];
$guitar = $row["guitar"];
$set_design = $row["set_design"];
$lights = $row["lights"];
$costume = $row["costume"];
$stagem = $row["stagem"];
$box_office = $row["box_office"];
$props = $row["props"];
$acrobatics = $row["acrobatics"];
$juggling = $row["juggling"];
$puppetry = $row["puppetry"];
$asl = $row["asl"];
$painting = $row["painting"];
$combat = $row["combat"];
$shakes = $row["shakes"];
$cabaret = $row["cabaret"];
$improv = $row["improv"];
$mime = $row["mime"];
$standup = $row["standup"];



echo "
<form name=\"form1\" method=\"post\" action=\"skills_modifyrecord3.php\">
<input type = \"hidden\" name = \"skills_uid\" value = \"$actor_uid\">
  <table width=\"67%\" border=\"1\" align=\"center\">
    <tr> 
      <td colspan=\"6\" bgcolor=\"#FFFF66\"> 
        <div align=\"center\"><b>Update your Skills information here:</b></div>
      </td>
    </tr>
    <tr> 
      <td colspan=\"6\" align=\"center\"> 
        <b>Voice Range</b>: 
        <select name=\"vocal\">
";
		if($vocal == "Not Indicated") {
	  	echo "<option selected value=\"\">Not Indicated</option>"; }
		else {echo "<option value=\"\">Not Indicated</option>";}		
              
		if($vocal == "A") {
	  	echo "<option selected value=\"A\">Alto</option>"; }
		else {echo "<option value=\"A\">Alto</option>";}
		
		if($vocal == "B") {
	  	echo "<option selected value=\"B\">Baritone</option>"; }
		else {echo "<option value=\"B\">Baritone</option>";}		

		if($vocal == "BR") {
	  	echo "<option selected value=\"BR\">Bass-Baritone</option>"; }
		else {echo "<option value=\"BR\">Bass-Baritone</option>";}		

		if($vocal == "MS") {
	  	echo "<option selected value=\"MS\">Mezzo Soprano</option>"; }
		else {echo "<option value=\"MS\">Mezzo Soprano</option>";}		
        
		if($vocal == "S") {
	  	echo "<option selected value=\"S\">Soprano</option>"; }
		else {echo "<option value=\"S\">Soprano</option>";}		
      
		if($vocal == "T") {
	  	echo "<option selected value=\"T\">Tenor</option>"; }
		else {echo "<option value=\"T\">Tenor</option>";}		
        
echo "
        </select>
        <font color=\"#400040\"></font></td>
    </tr>
	
    <tr> 
      <td colspan=\"3\"> 
        <div align=\"center\"><b>Dance (number of years)</b></div>
      </td>
      <td colspan=\"3\"> 
        <div align=\"left\"><b>Instrumental (# of years studied)</b></div>
      </td>
    </tr>
    <tr> 
      <td colspan=\"3\">
	    Ballet:
        <input type=\"text\" name=\"ballet\" maxlength=\"2\" size=\"2\" value=\"$ballet\">

        Ballroom:
        <input type=\"text\" name=\"ballroom\" maxlength=\"2\" size=\"2\" value=\"$ballroom\">
              
		Jazz: 
        <input type=\"text\" name=\"jazz\" maxlength=\"2\" size=\"2\" value=\"$jazz\">

        <BR>
        
        Musical Theatre:
        <input type=\"text\" name=\"mus_thea\" maxlength=\"2\" size=\"2\" value=\"$mus_thea\">
          
        Swing:
        <input type=\"text\" name=\"swing\" maxlength=\"2\" size=\"2\" value=\"$swing\">
        
        Tap:
        <input type=\"text\" name=\"tap\" maxlength=\"2\" size=\"2\" value=\"$tap\" >

        </td>

  
	  <td colspan=\"3\">
        Bass:
        <input type=\"text\" name=\"bass\" maxlength=\"2\" size=\"2\" value=\"$bass\">
        
        Banjo:	  
        <input type=\"text\" name=\"banjo\" maxlength=\"2\" size=\"2\" value=\"$banjo\">

		Cello
		<input type=\"text\" name=\"cello\" maxlength=\"2\" size=\"2\" value=\"$cello\">

        Clarinet:
		<input type=\"text\" name=\"clarinet\" maxlength=\"2\" size=\"2\" value=\"$clarinet\">
<BR>        
		Drums:  
        <input type=\"text\" name=\"drums\" maxlength=\"2\" size=\"2\" value=\"$drums\">

		Flute:
		<input type=\"text\" name=\"flute\" maxlength=\"2\" size=\"2\" value=\"$flute\">
		
		Guitar:
		<input type=\"text\" name=\"guitar\" maxlength=\"2\" size=\"2\" value=\"$guitar\">
		
		Percussion:
		<input type=\"text\" name=\"perc\" maxlength=\"2\" size=\"2\" value=\"$perc\">
<BR>
		Piano/Keys:
		<input type=\"text\" name=\"piano\" maxlength=\"2\" size=\"2\" value=\"$piano\">

		Sax:          	
		<input type=\"text\" name=\"sax\" maxlength=\"2\" size=\"2\" value=\"$sax\">
        
		Trombome:
		<input type=\"text\" name=\"trombone\" maxlength=\"2\" size=\"2\" value=\"$trombone\">
        
		Trumpet:
		<input type=\"text\" name=\"trumpet\" maxlength=\"2\" size=\"2\" value=\"$trumpet\">
        
		
		Violin:
        <input type=\"text\" name=\"violin\" maxlength=\"2\" size=\"2\" value=\"$violin\">
        </td>

    </tr>
    <tr> 
      <td colspan=\"6\" bgcolor=\"#FFFF66\"> <div align=\"center\"><b>Other Skills: </b><i>Select skills you are proficient in.</i></div></td>
    </tr>
	
    
	<tr> 
	<!--
      <td colspan=\"1\" rowspan=\"3\"> 
        <div align=\"center\"><b>Other Skills</b></div>
        <div align=\"center\"><i>Select skills you are proficient in.</i></div>
      </td> --> 
 
      <td width = 15%>
";
	if(!empty($acrobatics) ) {
	  	echo "<input type=\"checkbox\" name=\"acrobatics\" value=\"Acrobatics \/ Gymnastics\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"acrobatics\" value=\"Acrobatics / Gymnastics\" >";}	
echo "
        Acrobatics, Gymnastics</td>
      
	  <td width = 15%> 
";
	if(!empty($juggling) ) {
	  	echo "<input type=\"checkbox\" name=\"juggling\" value=\"Juggling\" checked >"; }
		else {echo "<input type=\"checkbox\" name=\"juggling\" value=\"Juggling\">";}	
echo "
        Juggling</td>
		
      <td width = 15%>  
";
	if(!empty($puppetry) ) {
	  	echo "<input type=\"checkbox\" name=\"puppetry\" value=\"Puppetry\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"puppetry\" value=\"Puppetry\">";}	
echo "
        Puppetry
		</td>        
     
      <td width = 15%>
";
	if(!empty($asl) ) {
	  	echo "<input type=\"checkbox\" name=\"asl\" value=\"ASL\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"asl\" value=\"ASL\">";}	
echo "
        ASL</td>
		
      <td width = 15%>
";
	if(!empty($painting) ) {
	  	echo "<input type=\"checkbox\" name=\"painting\" value=\"Painting\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"painting\" value=\"Painting\">";}	
echo "        
        Painting</td>
		
      <td width = 15%>

";
	if(!empty($combat) ) {
	  	echo "<input type=\"checkbox\" name=\"combat\" value=\"Stage Combat\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"combat\" value=\"Stage Combat\">";}	
echo "
        Stage Combat</td>
</tr>
<tr>
      <td width = 15%>
";
	if(!empty($shakes) ) {
	  	echo "<input type=\"checkbox\" name=\"shakes\" value=\"Shakespeare\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"shakes\" value=\"Shakespeare\">";}	
echo "
        Shakespeare
		</td>
      
	  <td width = 15%>
";
	if(!empty($cabaret) ) {
	  	echo "<input type=\"checkbox\" name=\"cabaret\" value=\"Cabaret\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"cabaret\" value=\"Cabaret\">";}	
echo "        
        Cabaret
		</td>
		
	<td width = 15%>       

";
	if(!empty($improv) ) {
	  	echo "<input type=\"checkbox\" name=\"improv\" value=\"Improv\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"improv\" value=\"Improv\">";}	
echo "
        Improv</font></td>
        



      <td width = 15%>
";
	if(!empty($mime) ) {
	  	echo "<input type=\"checkbox\" name=\"mime\" value=\"Mime\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"mime\" value=\"Mime\">";}	
echo "
        Mime
		</td>
      <td width = 15%> 
";
	if(!empty($standup) ) {
	  	echo "<input type=\"checkbox\" name=\"standup\" value=\"Standup\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"standup\" value=\"Standup\">";}	
echo "        
        Standup</td>
        
      <td width = 15%> 

";

echo "
      &nbsp</font></td>
</tr>    
    
    <tr> 
      <td colspan=\"6\" bgcolor=\"#FFFF66\">
	  <div align=\"center\"><b>Technical Theatre Skills: Rate 0 for None; 1 for Beginning, 2 for Good, 3 For Excellent. </b></div></td>
         
	</tr>
    <tr> 
      <td width = 15%>Set Construction
        <select name=\"set_design\" size=\"1\">
";
		if($set_design == "0") {
	  	echo "<option selected>0</option>"; }
		else {echo "<option>0</option>";}

		if($set_design == "1") {
	  	echo "<option selected>1</option>"; }
		else {echo "<option>1</option>";}

		if($set_design == "2") {
	  	echo "<option selected>2</option>"; }
		else {echo "<option>2</option>";}				

		if($set_design == "3") {
	  	echo "<option selected>3</option>"; }
		else {echo "<option>3</option>";}

echo "  </select>
        </td>
		
      <td width = 15%>Lights 
        <select name=\"lights\" size=\"1\">
";
		if($lights == "0") {
	  	echo "<option selected>0</option>"; }
		else {echo "<option>0</option>";}

		if($lights == "1") {
	  	echo "<option selected>1</option>"; }
		else {echo "<option>1</option>";}

		if($lights == "2") {
	  	echo "<option selected>2</option>"; }
		else {echo "<option>2</option>";}

		if($lights == "3") {
	  	echo "<option selected>3</option>"; }
		else {echo "<option>3</option>";}		
echo "
        </select>
        </td>
      
	  <td width = 15%>Costume 
        <select name=\"costume\" size=\"1\">
";
		if($costume == "0") {
	  	echo "<option selected>0</option>"; }
		else {echo "<option>0</option>";}		

		if($costume == "1") {
	  	echo "<option selected>1</option>"; }
		else {echo "<option>1</option>";}		

		if($costume == "2") {
	  	echo "<option selected>2</option>"; }
		else {echo "<option>2</option>";}		

		if($costume == "3") {
	  	echo "<option selected>3</option>"; }
		else {echo "<option>3</option>";}		
echo "
        </select>
        </td>
    
     
      <td width = 15%>Stage Manager 
        <select name=\"stagem\" size=\"1\">
";
		if($stagem == "0") {
	  	echo "<option selected>0</option>"; }
		else {echo "<option>0</option>";}		

		if($stagem == "1") {
	  	echo "<option selected>1</option>"; }
		else {echo "<option>1</option>";}		

		if($stagem == "2") {
	  	echo "<option selected>2</option>"; }
		else {echo "<option>2</option>";}		

		if($stagem == "3") {
	  	echo "<option selected>3</option>"; }
		else {echo "<option>3</option>";}		
echo "
        </select>
        </td>



      <td width = 15%>Box Office 
        <select name=\"box_office\" size=\"1\">
";
		if($box_office == "0") {
	  	echo "<option selected>0</option>"; }
		else {echo "<option>0</option>";}

		if($box_office == "1") {
	  	echo "<option selected>1</option>"; }
		else {echo "<option>1</option>";}

		if($box_office == "2") {
	  	echo "<option selected>2</option>"; }
		else {echo "<option>2</option>";}

		if($box_office == "3") {
	  	echo "<option selected>3</option>"; }
		else {echo "<option>3</option>";}
echo "
        </select>
        </td>
     
     
	  <td width = 15%>Props 
        <select name=\"props\" size=\"1\">
";
		if($props == "0") {
	  	echo "<option selected>0</option>"; }
		else {echo "<option>0</option>";}

		if($props == "1") {
	  	echo "<option selected>1</option>"; }
		else {echo "<option>1</option>";}

		if($props == "2") {
	  	echo "<option selected>2</option>"; }
		else {echo "<option>2</option>";}

		if($props == "3") {
	  	echo "<option selected>3</option>"; }
		else {echo "<option>3</option>";}
echo "
        </select>
        </td>
</tr>	
<tr>	

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