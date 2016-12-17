<?php
//phys_addrecord1a.php

if (!$sel_record) {
	header("Location: http://localhost/Members05/admin_test/actors/physical_modifyrecord.php");
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
//<input type = \"hidden\" name = \"uid\" value = \"$phys_uid\"> - not needed!!!
$row = mysql_fetch_array($sql_result);
$phys_uid = $row["actor_uid"];

echo "
<HTML>
<HEAD>
<TITLE>2005 Add Physical Record</TITLE>
<link rel=\"stylesheet\" href=\"/Members05/admin_test/members.css\" type=\"text/css\">
</HEAD>
<BODY>
<h1>Add a 2005 Physical Table</h1>
<FORM method = \"POST\" action = \"phys_addrecord2a.php\">

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
          <option>4.6 - 4.11</option>
          <option selected>5 - 5.6</option>
          <option>5.7 - 5.11</option>
          <option>6 - 6.6</option>
        </select>
      </td>
      <td width=\"28%\"><b>Weight:</b> 
        <select name=\"weight\" size=\"1\">
          <option>Up to 110 lbs</option>
          <option>111 to 130 lbs</option>
          <option selected>131 to 150 lbs</option>
          <option>151 to 170 lbs</option>
          <option>171 to 195 lbs</option>
          <option>Over 195 lbs</option>
        </select>
      </td>
      <td width=\"26%\"><b>Hair:</b> 
        <select name=\"hair\" size=\"1\">
          <option>Auburn</option>
          <option>Black</option>
          <option>Blonde</option>
          <option>Dark Brown</option>
          <option>Grey</option>
          <option selected>Light Brown</option>
		  <option>No Hair</option>
          <option>Red</option>
          <option>White</option>
        </select>
      </td>
    </tr>
    <tr> 
      <td><b>Eye Color: </b> 
        <select name=\"eye\" size=\"1\">
          <option>Black</option>
          <option>Blue</option>
          <option selected>Brown</option>
          <option>Green</option>
          <option>Hazel</option>
        </select>
        <BR>
        <b>Age Range:</b> 
        <select name=\"age_range\" size=\"1\">
          <option>16-20</option>
          <option selected>21-25</option>
          <option>26-30</option>
          <option>31-35</option>
          <option>36-40</option>
          <option>Over 40</option>
        </select>
        <BR>
      </td>
      <td colspan=\"3\"><b>Role Type: </b> <BR>
        <input type=\"checkbox\" name=\"nativeam\" value=\"Native American\">
        Native American 
        <input type=\"checkbox\" name=\"asian\" value=\"Asian\">
        Asian 
        <input type=\"checkbox\" name=\"white\" value=\"Caucasian\" checked>
        Caucasian 
        <input type=\"checkbox\" name=\"black\" value=\"African-American\">
        African American<BR>
        <input type=\"checkbox\" name=\"hispanic\" value=\"Hispanic\">
        Hispanic 
        <input type=\"checkbox\" name=\"eeurope\" value=\"East European\">
        East European 
        <input type=\"checkbox\" name=\"mideast\" value=\"Middle Eastern\">
        Middle Eastern 
        <input type=\"checkbox\" name=\"indian\" value=\"Indian\">
        Indian </td>
    </tr>
    <tr> 
      <td colspan=\"4\"> 
        <div align=\"center\"> 
          <input type=\"submit\" value=\"Add Record\" name=\"submit\">
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

</FORM>
</BODY>
</HTML>
";
}
?>