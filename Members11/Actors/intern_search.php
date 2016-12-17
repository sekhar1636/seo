<?php
include("session.inc");

?>

<?php
//intern_search.php 2012
//fix session to work and include navbar.inc

echo "
<HTML>
<HEAD>
<TITLE>StrawHat Search by Apprentice/Intern and Technical Skills</TITLE>
<link rel=\"stylesheet\" href=\"/styles/members.css\" type=\"text/css\">
</HEAD>
<BODY BACKGROUND=\"../../graphics03/Bk10a.GIF\"><script src=\"navbar.js\"></script>
<H3><center>Search Apprentice/Intern and Technical Skills:</center></H3>
<form name=\"form1\" method=\"post\" action=\"/Members11/Actors/intern_search1.php\">
  <table width=500 border=\"0\" align=\"center\">
    <tr> 
      <td colspan=\"6\"> 
        <div align=\"center\">Apprentice   
          <select name=\"apprentice\" size=\"1\">
          <option selected></option>  
          <option>Y</option>
            <option>N</option>
          </select>
          Intern  
          <select name=\"intern\" size=\"1\">
            <option selected></option>  
          	<option>Y</option>
            <option>N</option>
          </select>
          </div>
      </td>
    </tr>
    <tr> 
      <td width=\"54\"></td>
      <td width=\"54\"></td>
      <td colspan=\"3\" width=\"135\"></td>
    </tr>
    <tr> 
      <td colspan=\"6\">&nbsp;</td>
    </tr>
    <tr> 
      <td width=\"54\">Set</td>
      <td width=\"54\"> 
        <select name=\"set_design\" size=\"1\">
          <option selected>0</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
        </select>
        </td>
      <td width=\"54\">Lights </td>
      <td width=\"54\"> 
        <select name=\"lights\" size=\"1\">
          <option selected>0</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
        </select>
        </td>
      <td width=\"54\">Costume </td>
      <td width=\"54\"> 
        <select name=\"costume\" size=\"1\">
          <option selected>0</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
        </select>
        </td>
    </tr>
    <tr> 
      <td width=\"54\">SM </td>
      <td width=\"54\"> 
        <select name=\"stagem\" size=\"1\">
          <option selected>0</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
        </select>
        </td>
      <td width=\"54\">Box Office </td>
      <td width=\"54\"> 
        <select name=\"box_office\" size=\"1\">
          <option selected>0</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
        </select>
        </td>
      <td width=\"54\">Props </td>
      <td width=\"54\"> 
        <select name=\"props\" size=\"1\">
          <option selected>0</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
        </select>
        </td>
    </tr>
    <tr> 
      <td colspan=\"6\">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan=\"6\"> 
        <div align=\"center\"> 
          <input type=\"submit\" value=\"Search Actors\" name=\submit\>
          <input type=\"reset\" value=\"Clear\" name=\reset\>
        </div>
      </td>
    </tr>
  </table>

</form size = >

<table align = \"center\" width = \"80%\">
<tr> 
<td>
<p>Use this search to find actors that have are interested in Apprenticeships or Internships 
and/or search for specific technical theater skills. Check either Apprenticeships or Internships (or both or none!) and
select at least one or more technical categories of interest. Technical skills are rated:</p>
</td>
</tr>
</table>

<P align = \"center\">Little or none=0; Adequate=1; Good=2; Excellent=3.</P>

<p align = \"center\">The search returns technical skils that are equal to or greater than the indicated skill level.</p>

</BODY>
</HTML>
";

?>