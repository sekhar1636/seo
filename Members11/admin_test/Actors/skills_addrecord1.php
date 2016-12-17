<?php
//skills_addrecord1.php

if (!$sel_record) {
	header("Location: http://localhost/Members05/admin_test/actors/add_skills04.php");
	exit;
	}

//create connection
$connection = mysql_connect("127.0.0.1", "JayServer", "wombat") or die ("Couldn't connect to server.");

//select database
$db = mysql_select_db("mydata", $connection) or die("Couldn't select database.");

//SQL statement to select record
$sql = "SELECT actor_uid FROM actor05 WHERE actor_uid = \"$sel_record\"";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


if (!$sql_result) {
	echo "<P>Couldn't get record!</P>";
	} else {
	

//fetch row and assign to variables
$row = mysql_fetch_array($sql_result);
$skills_uid = $row["actor_uid"];


echo "
<html>
<head>
<title>Add 2005 Skills Record</title>
<link rel=\"stylesheet\" href=\"/Members05/admin_test/members.css\" type=\"text/css\">
</head>

<body bgcolor=\"#FFFFFF\" text=\"#000000\" background=\"/Members04/admin_test/Bk10a.GIF\">
<h1>StrawHat 2005 Actor Database: Add Skills Record</h1>
<form name=\"form1\" method=\"post\" action=\"skills_addrecord2.php\">

  <table width=\"94%\" border=\"1\" align=\"center\">
    <tr> 
      <td colspan=\"5\" bgcolor=\"#FFFF66\"> 
        <div align=\"center\"><b>Skills: (skills table) Do Not Modify UID!</b></div>
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
          <option>Not Indicated</option>
          <option>Alto</option>
          <option>Bass-Baritone</option>
          <option>Baritone</option>
          <option>Mezzo-Soprano</option>
          <option>Soprano</option>
		  <option>Tenor</option>
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
        <input type=\"text\" name=\"ballet\" maxlength=\"2\" size=\"2\" value=\"0\">
        Ballet </font><font size=\"-1\"> 
        <input type=\"text\" name=\"mus_thea\" maxlength=\"2\" size=\"2\" value=\"0\">
        Musical </font><font size=\"-1\"> 
        <input type=\"text\" name=\"ballroom\" maxlength=\"2\" size=\"2\" value=\"0\">
        Ballroom <br>
        </font><font size=\"-1\"> 
        <input type=\"text\" name=\"tap\" maxlength=\"2\" size=\"2\" value=\"0\">
        Tap </font><font size=\"-1\"> 
        <input type=\"text\" name=\"swing\" maxlength=\"2\" size=\"2\" value=\"0\">
        Swing </font><font size=\"-1\"> 
        <input type=\"text\" name=\"jazz\" maxlength=\"2\" size=\"2\" value=\"0\">
        Jazz </font><font size=\"-1\"> <BR>
        </font></td>
      <td colspan=\"4\" height=\"40\"><font size=\"-1\"> 
        <input type=\"text\" name=\"banjo\" maxlength=\"2\" size=\"2\" value=\"0\">
        Banjo </font><font size=\"-1\"> 
		<input type=\"text\" name=\"drums\" maxlength=\"2\" size=\"2\" value=\"0\">
        Drums </font><font size=\"-1\"> 
		<input type=\"text\" name=\"perc\" maxlength=\"2\" size=\"2\" value=\"0\">
        Perc </font><font size=\"-1\"> 
        <input type=\"text\" name=\"trombone\" maxlength=\"2\" size=\"2\" value=\"0\">
        Trombone </font><font size=\"-1\"> <BR>
		<input type=\"text\" name=\"cello\" maxlength=\"2\" size=\"2\" value=\"0\">
        Cello </font><font size=\"-1\"> 
		<input type=\"text\" name=\"flute\" maxlength=\"2\" size=\"2\" value=\"0\">
        Flute </font><font size=\"-1\">
		<input type=\"text\" name=\"piano\" maxlength=\"2\" size=\"2\" value=\"0\">
        Piano/Keys </font><font size=\"-1\">  
		<input type=\"text\" name=\"trumpet\" maxlength=\"2\" size=\"2\" value=\"0\">
        Trumpet </font><font size=\"-1\"></font><font size=\"-1\"><BR>
		<input type=\"text\" name=\"clarinet\" maxlength=\"2\" size=\"2\" value=\"0\">
        Clarinet </font><font size=\"-1\"> 
		<input type=\"text\" name=\"guitar\" maxlength=\"2\" size=\"2\" value=\"0\">
        Guitar </font><font size=\"-1\">
		<input type=\"text\" name=\"sax\" maxlength=\"2\" size=\"2\" value=\"0\">
        Sax </font><font size=\"-1\"> 
        <input type=\"text\" name=\"violin\" maxlength=\"2\" size=\"2\" value=\"0\">
        Violin 
		</font></td>
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
        <input type=\"checkbox\" name=\"acrobatics\" value=\"Acrobatics / Gymnastics\">
        Acrobatics / Gymnastics </font></td>
      <td width=\"7%\"> <font size=\"-1\"> 
        <input type=\"checkbox\" name=\"juggling\" value=\"Juggling\">
        Juggling</font></td>
      <td width=\"33%\"> <font size=\"-1\"> 
        <input type=\"checkbox\" name=\"puppetry\" value=\"Puppetry\">
        Puppetry</font></td>
    </tr>
    <tr> 
      <td width=\"13%\"> <font size=\"-1\"> 
        <input type=\"checkbox\" name=\"asl\" value=\"ASL\">
        ASL</font></td>
      <td width=\"7%\"> <font size=\"-1\"> 
        <input type=\"checkbox\" name=\"painting\" value=\"Painting\">
        Painting </font></td>
      <td width=\"33%\"> <font size=\"-1\"> 
        <input type=\"checkbox\" name=\"combat\" value=\"Stage Combat\">
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
          <option selected>0</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
        </select>
        </font></td>
      <td width=\"7%\"><font size=\"-1\">Lights 
        <select name=\"lights\" size=\"1\">
          <option selected>0</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
        </select>
        </font></td>
      <td width=\"33%\"><font size=\"-1\">Costume 
        <select name=\"costume\" size=\"1\">
          <option selected>0</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
        </select>
        </font></td>
    </tr>
    <tr> 
      <td width=\"13%\"><font size=\"-1\">SM 
        <select name=\"stagem\" size=\"1\">
          <option selected>0</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
        </select>
        </font></td>
      <td width=\"7%\"><font size=\"-1\">Box Office 
        <select name=\"box_office\" size=\"1\">
          <option selected>0</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
        </select>
        </font></td>
      <td width=\"33%\"><font size=\"-1\">Props 
        <select name=\"props\" size=\"1\">
          <option selected>0</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
        </select>
        </font></td>
    </tr>
    <tr> 
      <td colspan=\"3\"> 
        <input type=\"submit\" value=\"Add Record\" name=\"submit\">
        <input type=\"reset\" value=\"Clear Form\" name=\"reset\">
      </td>
      <td colspan=\"2\"> 
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