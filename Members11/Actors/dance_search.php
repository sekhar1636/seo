<?php
include("../session.inc");
?>


<?php
//dance_search.php 2012

echo "
<HTML>
<HEAD>
<TITLE>Strawhat Dance Search</TITLE>
<link rel=\"stylesheet\" href=\"/styles/members.css\" type=\"text/css\">
<HEAD>
<BODY BACKGROUND=\"../../graphics03/Bk10a.GIF\"><script src=\"navbar.js\"></script>

<form name=\"form1\" method=\"post\" action=\"/Members11/Actors/dance_search1.php\">
<BR>

<table width=\"55%\" border=\"0\" align=\"center\">
  <tr> 
    <td colspan=\"3\" align = \"center\"><H3>Dancer Search by Category and Gender</H3>
    <p><u>Select the Number of Years Studied in each category:</u></p>
  </tr>
  <tr> 
    <td>Ballet: 
      <input type=\"text\" name=\"ballet\" size=\"2\" maxlength=\"2\" value=\"0\">
    </td>
    <td>Musical Thea: 
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
  
  <tr> 
    <td>Gender: 
      <select name=\"gender\" size=\"1\">
        <option selected>F</option>
        <option>M</option>
      </select>
    </td>
    <td> 
      <div align=\"center\">
        <INPUT type=\"submit\" value =\"Select Dancers\">
        <INPUT type=\"reset\" value =\"Clear\">	  
      </div>
    </td>
  </tr>
  
  <tr>
  	<td colspan=\"3\">
    <br>
  	<p>Use this search to find male or female dancers that have studied a minimum number of years.
Enter the minimum number of years studied in at least one or more categories.  

The resulting search will show  a table of all dancers selected,
and their training in each category.
</p>
<td>
<tr>
</table>
</form>

	
</BODY>
</HTML>
";

?>