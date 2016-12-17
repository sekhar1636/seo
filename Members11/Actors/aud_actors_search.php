<?php
include("session.inc");

?>

<?php
//8/17/13 Using intern search to create aud_actors.php
//was intern_search.php 2012
//fix session to work and include navbar.inc

//8/17/13: USE THIS TO MAKE A AUDITIONING LIST OF ACTORS, GET RID OF PRINT.PDF


echo "
<HTML>
<HEAD>
<TITLE>StrawHat Search List of Auditioning Actors</TITLE>
<link rel=\"stylesheet\" href=\"/styles/members.css\" type=\"text/css\">
</HEAD>
<BODY BACKGROUND=\"../../graphics03/Bk10a.GIF\"><script src=\"navbar.js\"></script>
<H3><center>Search Auditioning Actors:</center></H3>

<form name=\"form1\" method=\"post\" action=\"/Members11/Actors/aud_actors_search1.php\">

  <table width=500 border=\"0\" align=\"center\">    
    <tr> 
      <td colspan=\"3\"> 
        <div align=\"center\">Audition Day<BR>   
          <select name=\"day\" size=\"1\">
          <option selected></option>  
          <option>Sat</option>
          <option>Sun</option>
          <option>Mon</option>  
          </select>
        </div>
       </td>
       
       <td>   
          Audition Type<BR>  
          <select name=\"type\" size=\"1\">
            <option selected></option>  
          	<option>S</option>
            <option>NS</option>
            <option>D</option>
            <option>SB</option>
          </select>
        </td>  
        
        <td>   
          Order by Time or Last Name<BR>  
          <select name=\"order\" size=\"1\">
            <option selected></option>  
              <option>Time</option>
            <option>Last Name</option>
          </select>
        </td>  
       </div>
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
  
</form>

<p>Use this search to find actors that have are interested in Apprenticeships or Internships 
and/or search for specific technical theater skills. Check either Apprenticeships or Internships (or both or none!) and
select at least one or more technical categories of interest. Technical skills are rated:</p>
<p><center>Little or none=0; Adequate=1; Good=2; Excellent=3.</center></p>

<P>The search returns technical skils that are equal to or greater than the indicated skill level</p>


</BODY>
</HTML>
";

?>