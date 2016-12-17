<?php
include("../session.inc");
?>


<?php

echo "
<HTML>
<HEAD>
<TITLE>2012 StrawHat Physical Attributes Search</TITLE>
<link rel=\"stylesheet\" href=\"/styles/members.css\" type=\"text/css\">
</HEAD>
<BODY BACKGROUND=\"../../graphics03/Bk10a.GIF\">
<H3><center>
    Search Physical Attributes: 
  </center></H3>
<form name=\"phys_search\" method=\"post\" action=\"/Members11/Actors/phys_allsearch1.php\">
  <table width=\"88%\" border=\"1\" align=\"center\">
    <tr> 
      <td><b>Gender: </b> 
        <select name=\"gender\" size=\"1\">
          <option selected>Select</option>
		  <option value=\"F\">Female</option>
          <option value=\"M\">Male</option>
        </select>
      </td>
      <td><b>Height: </b> 
        <select name=\"height\" size=\"1\">
          <option selected>Select</option>
		  <option>4.6 - 4.11</option>
          <option>5 - 5.6</option>
          <option>5.7 - 5.11</option>
          <option>6 - 6.6</option>

        </select>
      </td>
      <td width=\"28%\"><b>Weight:</b> 
        <select name=\"weight\" size=\"1\">
          <option selected>Select</option>
		  <option>Up to 110 lbs</option>
          <option>111 to 130 lbs</option>
          <option>131 to 150 lbs</option>
          <option>151 to 170 lbs</option>
          <option>171 to 195 lbs</option>
          <option>196 lbs &amp; over</option>
        </select>
      </td>
      <td width=\"26%\"><b>Hair:</b> 
        <select name=\"hair\" size=\"1\">
          <option selected value=\"\">Select</option>
		  <option value=\"AU\">Auburn</option>
          <option value=\"BK\">Black</option>
          <option value=\"BL\">Blonde</option>
          <option value=\"DB\">Dark Brown</option>
          <option value=\"GY\">Grey</option>
          <option value=\"LB\">Light Brown</option>
          <option value=\"BD\">No Hair</option>
          <option value=\"RD\">Red</option>
          <option >White</option>
        </select>
      </td>
    </tr>
    <tr> 
      <td><b>Eye Color: </b> 
        <select name=\"eye\" size=\"1\">
          <option selected value=\"\">Select</option>
		  <option value=\"BK\">Black</option>
          <option value=\"BL\">Blue</option>
          <option value=\"BR\">Brown</option>
          <option value=\"GR\">Green</option>
          <option value=\"HZ\">Hazel</option>
        </select><br><br>
        <b>Age Range:</b> 
        <select name=\"age_range\" size=\"1\">
		  <option selected value=\"\">Select</option>
		  <option value=\"16\">Under 16</option>
          <option value=\"20\">16-20</option>
          <option value=\"25\">21-25</option>
          <option value=\"30\">26-30</option>
          <option value=\"35\">31-35</option>
          <option value=\"40\">36-40</option>
          <option value=\"41\">40-over</option>
        </select>
        <BR>
      </td>
      <td colspan=\"3\"><b>Role Type: </b> <BR>
        <input type=\"checkbox\" name=\"nativeam\" value=\"Na\">
        Native American 
        <input type=\"checkbox\" name=\"asian\" value=\"As\">
        Asian 
        <input type=\"checkbox\" name=\"white\" value=\"Ca\">
        Caucasian 
        <input type=\"checkbox\" name=\"black\" value=\"Af\">
        African American<BR>
        <input type=\"checkbox\" name=\"hispanic\" value=\"Hi\">
        Hispanic 
        <input type=\"checkbox\" name=\"eeurope\" value=\"Ea\">
        East European 
        <input type=\"checkbox\" name=\"mideast\" value=\"Mi\">
        Middle Eastern 
        <input type=\"checkbox\" name=\"indian\" value=\"In\">
        Indian </td>
    </tr>
    <tr> 
      <td colspan=\"4\"> 
        <div align=\"center\"> 
          <input type=\"submit\" value=\"Search\" name=\"submit\">
         </div>
      </td>
    </tr>
  </table>

</form>
<p>Use this search to find actors that have particular physical attributes. Select one attribute
for each category.</p>
<p><center>
  </center></p>

<p>The resulting search will show results in the selection bar, where you can 
  view their profiles, pictures and resumes.
</p>
</form>		
		
</BODY>
</HTML>
";