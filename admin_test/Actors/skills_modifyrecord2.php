<?php
//skills_modifyrecord2.php 2005

if (!$sel_record) {
	header("Location: http://localhost/Members05/admin_test/actors/skills_modifyrecord.php");
	exit;
	}
//for remote site
//if (!$sel_record) {
//	header("Location: http://www.strawhat-auditions.com/Members05/admin_test/actors/skills_modifyrecord.php");
//	exit; }

//create connection
$connection = mysql_connect("127.0.0.1", "JayServer", "wombat") or die ("Couldn't connect to server.");

//select database
$db = mysql_select_db("mydata", $connection) or die("Couldn't select database.");

//SQL statement to select record
$sql = "SELECT * FROM skills05 WHERE skills_uid = \"$sel_record\"";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


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

if ($skills_uid != $sel_record) {
	echo "<P><B>Warning:</B> UID not equal to Actor UID. Check databases.</p>";
	}

echo "
<html>
<head>
<title>Modify 2005 Skills Record</title>
<link rel=\"stylesheet\" href=\"/Members05/admin_test/members.css\" type=\"text/css\">
</head>

<body bgcolor=\"#FFFFFF\" text=\"#000000\" background=\"/Members05/admin_test/Bk10a.GIF\">
<h1>StrawHat 2005 Actor Database: Modify Skills Record</h1>
<form name=\"form1\" method=\"post\" action=\"skills_modifyrecord3.php\">

  <table width=\"94%\" border=\"1\" align=\"center\">
    <tr> 
      <td colspan=\"5\" bgcolor=\"#FFFF66\"> 
        <div align=\"center\"><b>Skills: (skills table)</b></div>
      </td>
    </tr>
    <tr> 
      <td colspan=\"4\"> 
        <div align=\"left\"><b>skills_uid:</b> 
          <input type=\"text\" name=\"skills_uid\" size=\"5\" value=\"$skills_uid\">
        </div>
      </td>
      <td width=\"33%\"><b>Voice Range</b>: 
        <select name=\"vocal\">
";
		if($vocal == "Not Indicated") {
	  	echo "<option selected>Not Indicated</option>"; }
		else {echo "<option>Not Indicated</option>";}		
              
		if($vocal == "Alto") {
	  	echo "<option selected>Alto</option>"; }
		else {echo "<option>Alto</option>";}
		
		if($vocal == "Baritone") {
	  	echo "<option selected>Baritone</option>"; }
		else {echo "<option>Baritone</option>";}		

		if($vocal == "Bass-Baritone") {
	  	echo "<option selected>Bass-Baritone</option>"; }
		else {echo "<option>Bass-Baritone</option>";}		

		if($vocal == "Mezzo-Soprano") {
	  	echo "<option selected>Mezzo Soprano</option>"; }
		else {echo "<option>Mezzo Soprano</option>";}		
        
		if($vocal == "Soprano") {
	  	echo "<option selected>Soprano</option>"; }
		else {echo "<option>Soprano</option>";}		
      
		if($vocal == "Tenor") {
	  	echo "<option selected>Tenor</option>"; }
		else {echo "<option>Tenor</option>";}		
        
echo "
        </select>
        <font color=\"#400040\"></font></td>
    </tr>
    <tr> 
      <td width=\"37%\"> 
        <div align=\"center\"><b>Dance (number of years)</b></div>
      </td>
      <td colspan=\"4\"> 
        <div align=\"left\"><b>Instrumental (# of years studied)</b></div>
      </td>
    </tr>
    <tr> 
      <td height=\"40\" width=\"37%\"><font size=\"-1\"> 
        <input type=\"text\" name=\"ballet\" maxlength=\"2\" size=\"2\" value=\"$ballet\">
        Ballet </font><font size=\"-1\"> 
        <input type=\"text\" name=\"mus_thea\" maxlength=\"2\" size=\"2\" value=\"$mus_thea\">
        Musical </font><font size=\"-1\"> 
        <input type=\"text\" name=\"ballroom\" maxlength=\"2\" size=\"2\" value=\"$ballroom\">
        Ballroom <br>
        </font><font size=\"-1\"> 
        <input type=\"text\" name=\"tap\" maxlength=\"2\" size=\"2\" value=\"$tap\" >
        Tap </font><font size=\"-1\"> 
        <input type=\"text\" name=\"swing\" maxlength=\"2\" size=\"2\" value=\"$swing\">
        Swing </font><font size=\"-1\"> 
        <input type=\"text\" name=\"jazz\" maxlength=\"2\" size=\"2\" value=\"$jazz\">
        Jazz </font><font size=\"-1\"> <BR>
        </font></td>
      <td colspan=\"4\" height=\"40\"><font size=\"-1\"> 
        <input type=\"text\" name=\"banjo\" maxlength=\"2\" size=\"2\" value=\"$banjo\">
        Banjo </font><font size=\"-1\"> 
		<input type=\"text\" name=\"perc\" maxlength=\"2\" size=\"2\" value=\"$perc\">
        Perc </font><font size=\"-1\"> 
        <input type=\"text\" name=\"drums\" maxlength=\"2\" size=\"2\" value=\"$drums\">
        Drums </font><font size=\"-1\"> 
		<input type=\"text\" name=\"trombone\" maxlength=\"2\" size=\"2\" value=\"$trombone\">
        Trombone </font><font size=\"-1\"> <BR>
		<input type=\"text\" name=\"cello\" maxlength=\"2\" size=\"2\" value=\"$cello\">
        Cello </font><font size=\"-1\"> 
		<input type=\"text\" name=\"flute\" maxlength=\"2\" size=\"2\" value=\"$flute\">
        Flute </font><font size=\"-1\">
		<input type=\"text\" name=\"piano\" maxlength=\"2\" size=\"2\" value=\"$piano\">
        Piano/Keys </font><font size=\"-1\"> 
		<input type=\"text\" name=\"trumpet\" maxlength=\"2\" size=\"2\" value=\"$trumpet\">
        Trumpet </font><font size=\"-1\"><BR>
		<input type=\"text\" name=\"clarinet\" maxlength=\"2\" size=\"2\" value=\"$clarinet\">
        Clarinet </font><font size=\"-1\"> 
		<input type=\"text\" name=\"guitar\" maxlength=\"2\" size=\"2\" value=\"$guitar\">
        Guitar </font><font size=\"-1\"> 
		<input type=\"text\" name=\"sax\" maxlength=\"2\" size=\"2\" value=\"$sax\">
        Sax </font><font size=\"-1\"> 
        <input type=\"text\" name=\"violin\" maxlength=\"2\" size=\"2\" value=\"$violin\">
        Violin </font><font size=\"-1\"></font></td>
    </tr>
    <tr> 
      <td colspan=\"5\" bgcolor=\"black\">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan=\"2\" rowspan=\"2\"> 
        <div align=\"center\"><b>Other Skills</b></div>
        <div align=\"center\"></div>
      </td>
      <td width=\"13%\"> <font size=\"-1\"> 
";
	if(!empty($acrobatics) ) {
	  	echo "<input type=\"checkbox\" name=\"acrobatics\" value=\"Acrobatics / Gymnastics\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"acrobatics\" value=\"Acrobatics / Gymnastics\" >";}	
echo "
        Acrobatics / Gymnastics </font></td>
      <td width=\"7%\"> <font size=\"-1\"> 
";
	if(!empty($juggling) ) {
	  	echo "<input type=\"checkbox\" name=\"juggling\" value=\"Juggling\" checked >"; }
		else {echo "<input type=\"checkbox\" name=\"juggling\" value=\"Juggling\">";}	
echo "
        Juggling</font></td>
      <td width=\"33%\"> <font size=\"-1\"> 
";
	if(!empty($puppetry) ) {
	  	echo "<input type=\"checkbox\" name=\"puppetry\" value=\"Puppetry\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"puppetry\" value=\"Puppetry\">";}	
echo "
        Puppetry</font></td>
    </tr>
    <tr> 
      <td width=\"13%\"> <font size=\"-1\"> 
";
	if(!empty($asl) ) {
	  	echo "<input type=\"checkbox\" name=\"asl\" value=\"ASL\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"asl\" value=\"ASL\">";}	
echo "
        ASL</font></td>
      <td width=\"7%\"> <font size=\"-1\"> 
";
	if(!empty($painting) ) {
	  	echo "<input type=\"checkbox\" name=\"painting\" value=\"Painting\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"painting\" value=\"Painting\">";}	
echo "        
        Painting </font></td>
      <td width=\"33%\"> <font size=\"-1\"> 

";
	if(!empty($combat) ) {
	  	echo "<input type=\"checkbox\" name=\"combat\" value=\"Stage Combat\" checked>"; }
		else {echo "<input type=\"checkbox\" name=\"combat\" value=\"Stage Combat\">";}	
echo "
        Stage Combat</font></td>
    </tr>
    <tr> 
      <td colspan=\"5\" bgcolor=\"black\">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan=\"2\" rowspan=\"2\"> 
        <div align=\"center\"><b>Technical Theatre Skills</b></div>
      </td>
      <td width=\"13%\"><font size=\"-1\">Set 
        <select name=\"set_design\" size=\"1\">
";
		if($set == "0") {
	  	echo "<option selected>0</option>"; }
		else {echo "<option>0</option>";}

		if($set == "1") {
	  	echo "<option selected>1</option>"; }
		else {echo "<option>1</option>";}

		if($set == "2") {
	  	echo "<option selected>2</option>"; }
		else {echo "<option>2</option>";}				

		if($set == "3") {
	  	echo "<option selected>3</option>"; }
		else {echo "<option>3</option>";}

echo "  </select>
        </font></td>
      <td width=\"7%\"><font size=\"-1\">Lights 
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
        </font></td>
      <td width=\"33%\"><font size=\"-1\">Costume 
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
        </font></td>
    </tr>
    <tr> 
      <td width=\"13%\"><font size=\"-1\">SM 
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
        </font></td>
      <td width=\"7%\"><font size=\"-1\">Box Office 
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
        </font></td>
      <td width=\"33%\"><font size=\"-1\">Props 
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
        </font></td>
    </tr>
    <tr> 
      <td colspan=\"3\"> 
        <input type=\"submit\" value=\"Change Record\" name=\"submit\">
      </td>
      <td colspan=\"2\"> 
        <div align=\"center\"><a href=\"/Members05/admin_test/admin_menu05.htm\">Back 
          to Main Menu</a></div>
      </td>
    </tr>
  </table>
  
</FORM>
</BODY>
</HTML>
";
}
?>