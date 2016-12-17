<?php
include("session.inc");

?>

<?php
//intern_search.php 2012
//fix session to work and include navbar.inc

echo "
<HTML>
<HEAD>
<TITLE>StrawHat Advanced Search for Actors</TITLE>
<link rel=\"stylesheet\" href=\"/styles/members.css\" type=\"text/css\">
</HEAD>
<BODY BACKGROUND=\"../../graphics03/Bk10a.GIF\"><script src=\"navbar.js\"></script>

<form name=\"form1\" method=\"post\" action=\"/Members11/Actors/advanced_actor_search1.php\">
<BR>

<table width = \"60%\" align = \"center\">
<tr>
<td>
<p>Use this <B>COMBINED SEARCH</B> to find actors by that have an array of attributes. The combined searches consist of:</P>

<P><b>Physical Attributes:</b> Gender, Vocal Types and Role Types.<BR>
<b>Apprentice/Interns with Technical Skills:</b> Rated (1)Begining, (2)Good and (3)Excellent.</BR>
<b>Dancers By Category:</b> Styles of Dance, rated by the number of years experience.</BR>
<b>Musical Instruments:</b> A list of instruments played, rated by the number of years experience.</BR>
<b>Other Skills:</b> including everything from Acrobatics to Standup Comedy.</P>

You can combine any number of variables in the search. Please note a few tips:
<ul>
<li> The more variables searched, the lower the number of results.</li>
<li> For searches noted in years, try using a lower number; if too high, use a higher number.</li>
<li>For physical searches in role type, choose one per search.</li>
<li>When you have made your selections, use any of the select buttons to see the results.</li> 
</ul>

These searches are for the use of our members. If you have any suggestions, please let us know!

</td>
</tr>
</table>
";
/*PHYSICAL TABLE"; */
echo "

<!-- PHYSICAL TABLE --->  
  <table width=\"55%\" border=\"1\" align=\"center\">
  <tr> 
    <td colspan=\"4\" align = \"center\"><H3>General Attributes</H3>
    <H5>Select Skills Below:</H5>
    </td>
  </tr>
";
/*Remove Gender, etc  
    <tr> 
      <td><b>Gender: </b> 
        <select name=\"gender\" size=\"1\">
          <option selected value=\"\">Select</option>
          <option value=\"F\">Female</option>
          <option value=\"M\">Male</option>
        </select>
      </td>
      <td><b>Height: </b> 
        <select name=\"height\" size=\"1\">
          <option selected value=\"\">Select</option>
          <option>4.6 - 4.11</option>
          <option>5 - 5.6</option>
          <option>5.7 - 5.11</option>
          <option>6 - 6.6</option>

        </select>
      </td>
      <td width=\"28%\"><b>Weight:</b> 
        <select name=\"weight\" size=\"1\">
        <option selected value=\"\">Select</option>
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
";
*/
/*remove Height, Weight, Hair, Eye Color, Age Range 
from Physical Selection */
/*

        <td><b>Gender: </b> 
        <select name=\"gender\" size=\"1\">
          <option selected value=\"\">Select</option>
          <option value=\"F\">Female</option>
          <option value=\"M\">Male</option>
        </select>
      </td>
";
/*remove Height, Weight, Hair, Eye Color, Age Range 
from Physical Selection */
/*
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
*/


/* Adding Gender selection */
echo "
<tr>
        <td colspan=\"3\" align=\"center\"
        ><b>Gender: </b> 
        <select name=\"gender\" size=\"1\">
          <option selected value=\"\">Select</option>
          <option value=\"F\">Female</option>
          <option value=\"M\">Male</option>
        </select>
        </td>
</tr>        
        ";        


echo "
<tr> 
      <td colspan=\"3\" align=\"center\"> 
        <b>Voice Range</b>: 
        <select name=\"vocal\" size=\"1\">
        
          <option selected value=\"\">Select</option>          
          <option value=\"S\">Soprano</option>
          <option value=\"MS\">Mezzo-Soprano</option>
          <option value=\"A\">Alto</option>
          <option value=\"T\">Tenor</option>
          <option value=\"B\">Baritone</option>
          <option value=\"BR\">Bass-Baritone</option>          
        </select>          
</td>
      </tr>
";      
/*Application Type: Mononly (N) for Monologue Only, (Y) Song, (D) Dancer  */

//Actors who Audition, No Audition      
echo "
<tr> 
      <td colspan=\"3\" align=\"center\"> 
        <b>Select Actors Who Have An Audition</b>: 
        <select name=\"audition_yes_no\" size=\"1\">
        
          <option selected value=\"\">Select</option>          
          <option value=\"Y\">Actors Who Have an Audition</option>
          <option value=\"N\">Actors That Did Not Get An Audition</option>
          
        </select>          
</td>
      </tr>
";





//Audition Type      
echo "
<tr> 
      <td colspan=\"3\" align=\"center\"> 
        <b>Audition Type</b>: 
        <select name=\"mononly\" size=\"1\">
        
          <option selected value=\"\">Select</option>          
          <option value=\"N\">Singing Audition</option>
          <option value=\"Y\">Non Singing Audition</option>
          <option value=\"D\">Dancer Audition</option>
        </select>          
</td>

<td colspan=\"3\" align=\"center\"> 
        <b>Audition Day</b>: 
        <select name=\"day\" size=\"1\">
        
          <option selected value=\"\">Select</option>          
          <option value=\"Sat\">Saturday</option>
          <option value=\"Sun\">Sunday</option>
          <option value=\"Mon\">Monday</option>
        </select>          
</td>

<td align=\"center\"> 
        <b>Audition Hour</b>: 
        <select name=\"hour\" size=\"1\">
        
          <option selected value=\"\">Select</option>          
          <option value=\"10\">10</option>
          <option value=\"11\">11</option>
          <option value=\"12\">12</option>
          <option value=\"1\">1</option>
          <option value=\"2\">2</option>
          <option value=\"3\">3</option>
          <option value=\"4\">4</option>
          <option value=\"5\">5</option>          
        </select>          




      </tr>
";


/* ROLE TYPE */
echo "

<tr>              
      <td colspan=\"3\" 
      
      align=\"center\">
      <b>Role Type: </b> 
       <BR>
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
        <input type=\"submit\" value=\"Select\" name=\"submit\">
        <input type=\"reset\" value=\"Clear\" name=\"reset\">    
         </div>
      </td>
    </tr>

  </table>
<BR>

<!-- INTERN/APPRENTICE TABLE -->
<table width=55% border=\"1\" align=\"center\">
<tr> 
    <td colspan=\"6\" align = \"center\"><H3><center>Apprentice/Intern and Technical Skills:</center></H3>
    <H5>Select (1)Beginning, (2) Good and (3)Excellent:</H5>
    </td>
    
</tr>

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
          <input type=\"submit\" value=\"Search\" name=\submit\>
          <input type=\"reset\" value=\"Clear\" name=\reset\>
        </div>
      </td>
    </tr>
  </table>
  
<!--- DANCERS TABLE --->  
<BR>
<table width=\"55%\" border=\"1\" align=\"center\">
  <tr> 
    <td colspan=\"3\" align = \"center\"><H3>Dancers by Category</H3>
    <H5>Select the Number of Years Studied in each category:</H5>
    </td>
  </tr>
  <tr> 
    <td>Ballet: 
      <input type=\"text\" name=\"ballet\" size=\"2\" maxlength=\"2\" value=\"0\">
    </td>
    <td>Musical Theatre: 
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
    <td>
    ";
    /*
    Gender: 
      <select name=\"gender\" size=\"1\">
        <option selected>F</option>
        <option>M</option>
      </select>
    */
    echo "
    </td>
    
    <td> 
      <div align=\"center\">
        <INPUT type=\"submit\" value =\"Select\">
        <INPUT type=\"reset\" value =\"Clear\">      
      </div>
    </td>
    <td>
    </td>
  </tr>
  
  <tr>
      <td colspan=\"3\">
Enter the minimum number of years studied in at least one or more categories.  
<td>
</tr>
</table>

<br>

<!-- INSTRUMENTAL TABLE -->
<table width=\"55%\" border=\"1\" align=\"center\"> 
  <tr> 
    <td colspan=\"4\" align = \"center\"><H3>Instruments</H3>
    <H5>Select the Number of Years Studied in each category:</H5>
    </td>
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
        <INPUT type=\"submit\" value =\"Select\">
          <INPUT type=\"reset\" value =\"Clear\">
      </div>
    </td>
  </tr>
  </table>

<BR> 
<!-- OTHER SKILLS TABLE -->  
<table width=\"55%\" border=\"1\" align=\"center\">

   <tr> 
    <td colspan=\"3\" align = \"center\"><H3>Other Skills</H3>
    <H5>Select Skills Below:</H5>
    </td>
  </tr>

  <tr>
    <td><font size=\"3\"><input type=\"checkbox\" name=\"acrobatics\" value=\"A\">Acrobatics / Gymnastics </font></td>
    <td><font size=\"3\"><input type=\"checkbox\" name=\"juggling\" value=\"J\">Juggling</font></td>
    <td><font size=\"3\"><input type=\"checkbox\" name=\"puppetry\" value=\"P\">Puppetry</font></td>
  </tr>
  
  <tr>
    <td><font size=\"3\"><input type=\"checkbox\" name=\"asl\" value=\"A\">ASL </font></td>
    <td><font size=\"3\"><input type=\"checkbox\" name=\"painting\" value=\"P\">Painting </font></td>
    <td><font size=\"3\"><input type=\"checkbox\" name=\"combat\" value=\"S\">Stage Combat </font></td>
  </tr>
  
  <tr>
    <td><font size=\"3\"><input type=\"checkbox\" name=\"shakes\" value=\"S\">Shakespeare </font></td>
    <td><font size=\"3\"><input type=\"checkbox\" name=\"cabaret\" value=\"C\">Cabaret </font></td>
    <td><font size=\"3\"><input type=\"checkbox\" name=\"improv\" value=\"I\">Improv </font></td>
  </tr>
  
  <tr>
    <td><font size=\"3\"><input type=\"checkbox\" name=\"mime\" value=\"M\">Mime </font></td>
    <td><font size=\"3\"><input type=\"checkbox\" name=\"standup\" value=\"S\">Standup Comedy </font></td>
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


<BR>
";
/*
<!-- PHYSICAL TABLE --->  
  <table width=\"55%\" border=\"1\" align=\"center\">
  <tr> 
    <td colspan=\"4\" align = \"center\"><H3>Physical Attributes</H3>
    <H5>Select Skills Below:</H5>
    </td>
  </tr>
";
/*Remove Gender, etc  
    <tr> 
      <td><b>Gender: </b> 
        <select name=\"gender\" size=\"1\">
          <option selected value=\"\">Select</option>
          <option value=\"F\">Female</option>
          <option value=\"M\">Male</option>
        </select>
      </td>
      <td><b>Height: </b> 
        <select name=\"height\" size=\"1\">
          <option selected value=\"\">Select</option>
          <option>4.6 - 4.11</option>
          <option>5 - 5.6</option>
          <option>5.7 - 5.11</option>
          <option>6 - 6.6</option>

        </select>
      </td>
      <td width=\"28%\"><b>Weight:</b> 
        <select name=\"weight\" size=\"1\">
        <option selected value=\"\">Select</option>
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
";
*/
/*remove Height, Weight, Hair, Eye Color, Age Range 
from Physical Selection */
/*

        <td><b>Gender: </b> 
        <select name=\"gender\" size=\"1\">
          <option selected value=\"\">Select</option>
          <option value=\"F\">Female</option>
          <option value=\"M\">Male</option>
        </select>
      </td>
";
/*remove Height, Weight, Hair, Eye Color, Age Range 
from Physical Selection */
/*
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
*/
/*
echo "

      <td><b>Gender: </b> 
        <select name=\"gender\" size=\"1\">
          <option selected value=\"\">Select</option>
          <option value=\"F\">Female</option>
          <option value=\"M\">Male</option>
        </select>
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
        <input type=\"submit\" value=\"Select\" name=\"submit\">
        <input type=\"reset\" value=\"Clear\" name=\"reset\">    
         </div>
      </td>
    </tr>
  </table>
  
  */
echo "
</form>
";
/*
<table align = \"center\" width = \"80%\">
<tr> 
<td>
</table>
*/

echo " 
</BODY>
</HTML>
";

?>