<?php
include("session.inc");
?>

<?php
//otherskills_search.php 2012

echo "
<HTML>
<HEAD>
<TITLE>Actor Search by Other Skills</TITLE>
<link rel=\"stylesheet\" href=\"/styles/members.css\" type=\"text/css\">
</HEAD>
<BODY BACKGROUND=\"../../graphics03/Bk10a.GIF\">
<script src=\"navbar.js\"></script>
<H3 align = \"center\">Indicate Other Skills to be Searched:</H3>

<form name=\"form1\" method=\"post\" action=\"/Members11/Actors/otherskills_search1.php\">

<table width=\"60%\" border=\"0\" align=\"center\">
  <tr>
    <td><font size=\"3\">
      <input type=\"checkbox\" name=\"acrobatics\" value=\"A\">
      Acrobatics / Gymnastics </font></td>
    <td><font size=\"3\"> 
      <input type=\"checkbox\" name=\"juggling\" value=\"J\">
      Juggling</font></td>
    <td><font size=\"3\">
      <input type=\"checkbox\" name=\"puppetry\" value=\"P\">
      Puppetry</font></td>
  </tr>
  <tr>
    <td><font size=\"3\">
      <input type=\"checkbox\" name=\"asl\" value=\"A\">
      ASL </font></td>
    <td><font size=\"3\">
      <input type=\"checkbox\" name=\"painting\" value=\"P\">
      Painting </font></td>
    <td><font size=\"3\">
      <input type=\"checkbox\" name=\"combat\" value=\"S\">
      Stage Combat </font></td>
  </tr>
  
  <tr>
    <td><font size=\"3\">
      <input type=\"checkbox\" name=\"shakes\" value=\"S\">
      Shakespeare </font></td>
    <td><font size=\"3\">
      <input type=\"checkbox\" name=\"cabaret\" value=\"C\">
      Cabaret </font></td>
    <td><font size=\"3\">
      <input type=\"checkbox\" name=\"improv\" value=\"I\">
      Improv </font></td>
  </tr>
  
  <tr>
    <td><font size=\"3\">
      <input type=\"checkbox\" name=\"mime\" value=\"M\">
      Mime </font></td>
    <td><font size=\"3\">
      <input type=\"checkbox\" name=\"standup\" value=\"S\">
      Standup Comedy </font></td>
    <td>&nbsp</td>
  </tr>
  
    <tr> 
      <td colspan=\"3\"><center>
        <input type=\"submit\" value=\"Select\" name=\"submit\">
        <input type=\"reset\" value=\"Clear\" name=\"reset\">
      </center></td>
    </tr>
  </tr>
</table>

</form>
<p align = \"center\">Use this search to find actors that have special skills. 
Check at least one or more categories of interest. 
</p>
	
</BODY>
</HTML>
";

?>