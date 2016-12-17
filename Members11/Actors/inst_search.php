<?php
include("session.inc");
?>

<?php
//inst_search.php 2012

echo "
<HTML>
<HEAD>
<TITLE>Actor Search by Musical Instruments</TITLE>
<link rel=\"stylesheet\" href=\"/styles/members.css\" type=\"text/css\">
</HEAD>

<BODY BACKGROUND=\"../../graphics03/Bk10a.GIF\"><script src=\"navbar.js\"></script>
<script src=\"navbar.js\"></script>

<H3 align = \"center\">Indicate Instrument Level to be Searched:</H3>
<form name=\"form1\" method=\"post\" action=\"/Members11/Actors/inst_search1a.php\">
<table width=\"65%\" border=\"0\" align=\"center\">
  <tr> 
    <td colspan=\"3\">Select Number of Years Studied:
  </tr>
  <tr> 
    <td>Banjo: 
      <input type=\"text\" name=\"banjo\" size=\"2\" maxlength=\"2\" value=\"0\">
    </td>
    <td>Drums: 
      <input type=\"text\" name=\"drums\" size=\"2\" maxlength=\"2\" value=\"0\">
    </td>
    <td>Percussion: 
      <input type=\"text\" name=\"perc\" size=\"2\" maxlength=\"2\" value=\"0\">
    </td>
	<td>Trombone: 
      <input type=\"text\" name=\"trombone\" size=\"2\" maxlength=\"2\" value=\"0\">
    </td>
  </tr>
  <tr> 
    <td>Cello: 
      <input type=\"text\" name=\"cello\" size=\"2\" maxlength=\"2\" value=\"0\">
    </td>	
	<td>Flute: 
      <input type=\"text\" name=\"flute\" size=\"2\" maxlength=\"2\" value=\"0\">
    </td>
    <td>Piano: 
      <input type=\"text\" name=\"piano\" size=\"2\" maxlength=\"2\" value=\"0\">
    </td>
    <td>Trumpet: 
      <input type=\"text\" name=\"trumpet\" size=\"2\" maxlength=\"2\" value=\"0\">
    </td>
  </tr>
  <tr>
    <tr> 
    <td>Clarinet: 
      <input type=\"text\" name=\"clarinet\" size=\"2\" maxlength=\"2\" value=\"0\">
    </td>	
	<td>Guitar: 
      <input type=\"text\" name=\"guitar\" size=\"2\" maxlength=\"2\" value=\"0\">
    </td>
    <td>Saxophone: 
      <input type=\"text\" name=\"sax\" size=\"2\" maxlength=\"2\" value=\"0\">
    </td>
    <td>Violin: 
      <input type=\"text\" name=\"violin\" size=\"2\" maxlength=\"2\" value=\"0\">
    </td>
  </tr>
    <tr> 
     <td colspan=\"4\"> 
      <div align=\"center\">
        <INPUT type=\"submit\" value =\"Select Actor/Musician\">
      	<INPUT type=\"reset\" value =\"Clear\">
	  </div>
    </td>
  </tr>
  </table>
</form>  
  
  
  

<table width=\"65%\" border=\"0\" align=\"center\">
<tr>
<td>
<p>Use this search to find actors that play one or more musical instruments. 
Enter the minimum number of years studied in at least one or more categories of interest.</p>



<P>
The resulting search will show results in the selection bar, where you can view their profiles, 
pictures and resumes, or a list which shows all instrumental experience and a link to their resumes.
</p>
</td>
</tr>
</table>
	
</BODY>
</HTML>
";

?>