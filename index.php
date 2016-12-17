<!DOCTYPE HTML PUBLIC "-//SoftQuad//DTD HoTMetaL PRO 5.0::19980907::extensions to HTML 4.0//EN" "hmpro5.dtd">

<HTML>
  <HEAD> 
<?php

//code for rotating pix
$pix = array(

//surflight (2)
//"graphics03/srflt_kismet.jpg",
//"graphics03/srflt_joseph.jpg",

//forestburgh (10)
//"graphics03/singing.jpg",
"graphics03/frst_cats.jpg",
"graphics03/frst_cats2.jpg",
"graphics03/frst_footloose2.jpg",
"graphics03/frst_footloose3.jpg",
"graphics03/frst_footloose4.jpg",
"graphics03/frst_oklahoma.jpg",
"graphics03/frst_funnygrl.jpg",
"graphics03/frst_legal1.jpg",
"graphics03/frst_wsstory1.jpg",
//"graphics03/frst_wsstory2.jpg", PIX TOO NARROW FOR LANDSCAPE, REMOVE
"graphics03/frst_9to5.jpg",


//gretna (3)
//A/O/11/28/14 gretna_grease DOES NOT WORK!
//"graphics03/gretna_greasel.jpg", 
//"graphics03/gretna_grease2.jpg",
"graphics03/gretna_grease3.jpg",
"graphics03/gretna_grease4.jpg",
"graphics03/gretna_grease5.jpg",

//infinity (3)      
"graphics03/infin_dames.jpg",
"graphics03/infin_sisters.jpg",
"graphics03/infin_slm1.jpg",
//"graphics03/infin_slm2.jpg", Pix infin _slm2.jpg to tall for index.php

//interlakes (5)
"graphics03/lakes_annie1.jpg",
"graphics03/lakes_shook1.jpg",
//"graphics03/lakes_shook2.jpg", MOVE TO PORTRAIT
"graphics03/lakes_hair1.jpg",
"graphics03/lakes_hair2.jpg",
"graphics03/lakes_hair3.jpg",

//oceans (6)
"graphics03/oceans_7Brides1.jpg",
"graphics03/oceans_7Brides2.jpg",
//"graphics03/oceans_7Brides3.jpg",
"graphics03/oceans_7Brides4.jpg",
"graphics03/oceans_7Brides5.jpg",
"graphics03/oceans_7Brides6.jpg",
"graphics03/oceans_Cats.jpg",

//shawnee (5)
"graphics03/shawnee_plaid1.jpg",
"graphics03/shawnee_plaid2.jpg",
"graphics03/shawnee_plaid3.jpg",
"graphics03/shawnee_plaid4.jpg",
"graphics03/shawnee_ringfire1.jpg",
//"graphics03/shawnee_ringfire2.jpg", move to square carousel

//weathervane (4)
"graphics03/WVT_LaCage.jpg",
"graphics03/WVT_Witch_01.jpg",
"graphics03/WVT2014_Memphis.jpg",
"graphics03/Patchwork2014.jpg",

//woodstock (7) 
"graphics03/woodstock_fiddler01.jpg",
"graphics03/woodstock_tommy01.jpg",
"graphics03/woodstock_tommy02.jpg",

//more pix/txt from folder Pix_Landscap 09/25/15
"graphics03/woodstock_chitty.jpg",
"graphics03/woodstock_chitty_02.jpg",
//"graphics03/woodstock_chitty_03.jpg",
"graphics03/woodstock_chitty_04.jpg",
"graphics03/woodstock_Spring_01.jpg",
//"graphics03/woodstock_Spring_02.jpg",  


);
   
$text = array(
   
   //surflight (2)
  // "graphics03/srflt_kismet.txt",
  // "graphics03/srflt_joseph.txt",

   //forestburgh (10)
  // "graphics03/singing.txt",
   "graphics03/frst_cats.txt",
   "graphics03/frst_cats2.txt",
   "graphics03/frst_footloose2.txt",
   "graphics03/frst_footloose3.txt",
   "graphics03/frst_footloose4.txt",
   "graphics03/frst_oklahoma.txt",
   "graphics03/frst_funnygrl.txt",
   "graphics03/frst_legal1.txt",
   "graphics03/frst_wsstory1.txt",
   //"graphics03/frst_wsstory2.txt",  PIX TOO NARROW FOR FIRST PAGE INDEX
   "graphics03/frst_9to5.txt",
   
   
//gretna (3), gretna_grease1 DOES NOT WORK A/O 11/28/14
    //"graphics03/gretna_greasel.txt",
    //"graphics03/gretna_grease2.txt",
    "graphics03/gretna_grease3.txt",
    "graphics03/gretna_grease4.txt",
    "graphics03/gretna_grease5.txt",
    
//infinity (3)      
    "graphics03/infin_dames.txt",
    "graphics03/infin_sisters.txt",
    "graphics03/infin_slm1.txt",
    //"graphics03/infin_slm2.txt", PIX TOO TALL FOR INDEX PAGE

//interlakes (5)
    "graphics03/lakes_annie1.txt",
    "graphics03/lakes_shook1.txt",
    //"graphics03/lakes_shook2.txt", MOVE TO PORTRAIT PIX
    "graphics03/lakes_hair1.txt",
    "graphics03/lakes_hair2.txt",
    "graphics03/lakes_hair3.txt",   
   
//oceans (6)
    "graphics03/oceans_7Brides1.txt",
    "graphics03/oceans_7Brides2.txt",
    //"graphics03/oceans_7Brides3.txt",
    "graphics03/oceans_7Brides4.txt",
    "graphics03/oceans_7Brides5.txt",
    "graphics03/oceans_7Brides6.txt",
    "graphics03/oceans_Cats.txt",
    
   
//shawnee (5)
   "graphics03/shawnee_plaid1.txt",
   "graphics03/shawnee_plaid2.txt",
   "graphics03/shawnee_plaid3.txt",
   "graphics03/shawnee_plaid4.txt",
   "graphics03/shawnee_ringfire1.txt",
   //"graphics03/shawnee_ringfire2.txt",

//weathervane (4)
   "graphics03/wvt_lacage.txt",
   "graphics03/WVT_Witch_01.txt",
   "graphics03/WVT2014_Memphis.txt",
   "graphics03/Patchwork2014.txt",
   
//woodstock (9)  
   "graphics03/woodstock_fiddler01.txt",
   "graphics03/woodstock_tommy01.txt",
   "graphics03/woodstock_tommy02.txt",

   //additional pix from woodstock 092515  
   "graphics03/woodstock_chitty.txt",
   "graphics03/woodstock_chitty_02.txt",
  // "graphics03/woodstock_chitty_03.txt",
   "graphics03/woodstock_chitty_04.txt",
   "graphics03/woodstock_Spring_01.txt",
  // "graphics03/woodstock_Spring_02.txt",  
   
   );   
   
$pixCnt = rand(0,42);
?>

<TITLE>StrawHat Auditions: Non Equity Auditions</TITLE>

	 <META NAME="description"
	 CONTENT="StrawHat Auditions, Non-Equity Auditions for Summer Stock and Regional Theaters">
	 <META NAME="keywords"

	  CONTENT="Strawhat, StrawHat, non-equity, non-equity auditions, auditions, summer stock theaters, regional theaters, theatres, theaters, internships, apprentices, jobs, employment, set design, costume design, lighting design, carpenters, designers, sewers, painters, actors, actressess, technical, techies">

<link rel="stylesheet" href="straw1.css" type="text/css">

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-35492583-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</HEAD>

<!--

Strawhat, StrawHat, non-equity, non-equity auditions, auditions, summer stock theaters, regional theaters, theatres, theaters, internships, apprentices, jobs, employment, set design, costume design, lighting design, carpenters, designers, sewers, painters, actors, actressess, technical, techies -->

<BODY BACKGROUND="graphics03/Bk10a.GIF">

<TABLE WIDTH="844" align="center">
  <TR VALIGN="TOP"> 
    <TD ROWSPAN="6" WIDTH="174" VALIGN="TOP"> 

      <p><IMG SRC="graphics03/straw99.gif" ALT="StrawHat Auditions for Actors and Staff, Tech, Design." BORDER="0" WIDTH="127" HEIGHT="97"> 
      
      <BR>
      <font color="#FF0000" size="-1"><i><b>Click the mask to get to home page!</b></i></font></p>
      
<!-- STARTING MENU ON LEFT SIDE-->
      <p align="center">
       
      <A HREF="who.htm" ONMOUSEOVER="this.style.color='red'" ONMOUSEOUT="this.style.color='blue'">Intro</A>
        <BR>
		<BR>

        <A HREF="actorap.htm" ONMOUSEOVER="this.style.color='red'" ONMOUSEOUT="this.style.color='blue'">
        Performers
        </A> 
        <BR>
        <BR>

        <A HREF="tekrap.htm" ONMOUSEOVER="this.style.color='red'" ONMOUSEOUT="this.style.color='blue'">
        Staff/Tech</A> 
        <BR>
        <BR>


        <A HREF="/newtheater.htm" ONMOUSEOVER="this.style.color='red'" ONMOUSEOUT="this.style.color='blue'">
        Producers</A> 
        <BR>
        <BR>

       
        <A HREF="Members11/member_entrya.php" ONMOUSEOVER="this.style.color='red'" ONMOUSEOUT="this.style.color='blue'">      
        Members</A>                
        <BR>        
        <BR>        

                 
        <A HREF="app_faqs.htm" ONMOUSEOVER="this.style.color='red'" ONMOUSEOUT="this.style.color='blue'">
        FAQ's</A>
        <BR>
        <BR>
        
        
<!--        <A HREF="new.htm" ONMOUSEOVER="this.style.color='red' ONMOUSEOUT="this.style.color='blue'">
        New</A>
        <BR>
        <BR>        
-->

        <A HREF="younger.htm" ONMOUSEOVER="this.style.color='red'" ONMOUSEOUT="this.style.color='blue'">Younger</A>
        <BR>
        <BR>

        <A HREF="contact.htm" ONMOUSEOVER="this.style.color='red'"

			 ONMOUSEOUT="this.style.color='blue'">Contact</A>
        <BR>
        <BR>     
 <!--
        <A HREF="mailto:info@strawhat-auditions.com">
        Email Us!
        </A>
                 
        <BR>
        <BR>     

-->
        
        </p>        
 
        
        <A HREF="https://www.facebook.com/TheStrawHatAuditions" 
        target=\"myNewWin\" onClick=\"sendme()/> 
        <IMG SRC="graphics03/facebook-icon.jpg" ALT="Like Us on Facebook!" BORDER="0" WIDTH="127" HEIGHT="97">
        <BR>
        </A>
        
        
        <p align="center"><b>Site last updated: 11/4/16.</b>
        </A>
        
        <br>
        
        
        <font face="Arial" size="-1">
        <b>Applications available November 15.</b>
        </font>
        </p>
        
        <font face="Arial" size="-2">All contents are the property of StrawHat 
        Theatrical Services, LLC; Copyright &copy; 1998.</font> 
        </p>
    </TD>

<!-- next column     width="900" height="405"-->
    
	<TD COLSPAN="2" VALIGN="center" height="66"><IMG SRC="graphics/strawhat_banner17.jpg"

    ALT="StrawHat Auditions for Actors and Staff, Tech, Design." WIDTH="590" HEIGHT="125" BORDER="0" ALIGN="LEFT"
    HSPACE="0"> </TD>
  </TR>

  <TR VALIGN="TOP"> 
    <TD COLSPAN="2" VALIGN="TOP" ALIGN="CENTER" bgcolor="#CCCCCC" height="80" BORDER="1">
     
        <p align="center">
        <font face="Arial, Helvetica, sans-serif", size="+2"> </font> 
        <font color="BLACK" size = +2>  <b><i> "OUR THIRTY-NINTH ANNIVERSARY!" </i></b></font>
        <img src="/graphics/2017DatesBANNERsmall.jpg" border="0" alt="2017">     
        <br>
        </p>
                
        <p align="center">
        <font face="Arial, Helvetica, sans-serif", size="+2" color="WHITE">        

        <!--<b>New Actor Applications are closed.-->            
        <!--As of February 10, 2016</b>&nbsp<=-->
        </font>
        
        
        
        <b>
        <font face="Arial, Helvetica, sans-serif", size="+1" color = "BLACK">
        
        Actors, Singers, Dancers, Musicians, Staff, Tech, Design... All 3 Days!
        
        </font>
        </b>                                                
        </p>
        
<!--
        <BR>
        
        <font size="+1">        
        <b><i>Actor, Tech and Theatre Applications Are Closed!
        <BR>
        Thank you all who participated in another great 'hat'!        
        </i>
        </b>
        </font>
        <!--
        <BR>
        <B>Members Area is Open.</B>        
        </P>
-->
        
  
<!--
        <p align="center"><font size="+2"><b>HAPPY NEW YEAR, WELCOME 2015!</B></font>
-->
<!--
        <P>
        <BR>
        <font size="+2"><B>Complete Actor Applications must be in our mailbox no later that 
        Wednesday, January 7th to be considered!</B></font>        
        </P> 
-->
        <!--There are still slots available, but will go fast. -->
        
     
<!--   
      <p align="center"> <font face="Arial, Helvetica, sans-serif", size="+2"> 
        <font color="#FF6666"> <b>OUR THIRTY-NINTH ANNIVERSARY!</b></font>
        </p>
                
        <p><font size="+2" color="#FFFFFF"><b>The 2015 StrawHat Auditions <br>
        will be held Saturday, February 15th through<br>
        Monday, February 17th in NYC!</b></font>
        </p>
        
        <p><b> THIS IS A TEST SITE. 
        <BR>Go to www.strawhat-auditions.com to register for the Strawhats!</b></p>
-->        
        
<!--    use this code when time to send message on actor lists ---
        <p><font size="+1">
        <b>ACTOR AUDITION LISTS <u><b>by last name</b></u> and <u><b>time</b></u> are posted in the Members Area at Actor Search.</b></font>
        </p>
--- end of code --->
        
<!-- <p align="center"><font size="+2">HAPPY NEW YEAR and all the best for 2013!</font></P> -->
        
<!--<P align="center"> <b>As of 1/5/13, ACTOR APPLICATIONS ARE CLOSED.</P> -->
            
<!--use this code when time to send message on staff tech profiles, resumes, etc  --->

        
        <table align = "center" width="90%">
 <!--       
        <tr>
        <td align = "left">
        <font size = "3">
        <b><i>1/26/15: With the historic storm on the way, we may lose phone and power in our offices. We'll return calls and emails as soon as possible.</i>        
        </font>
        </td>
        </tr>
-->        
        
<!--        
        <tr>
        <td align = "left">
        <font size = "2">
        <b>1/22/15: Actors:</b> be sure your application information is up to date. We use these to create the directory of auditioning actors and all of the searches.        
        </font>
        </td>
        </tr>
-->        
        
<!-- 
        </tr>
        <tr>
        <td align = "left">
        <font size="2">
<!--
        <b>2/3/15: Staff Tech:</b> <b>Applications and Portfolio Materials will be open up to Februrary, <B>Friday the 13th (Hmm...)</b>.
        
        Confirm that your profile is complete 
        and your resume is linked to your page. 
        There is no fee to post photos, video or audio to your application. 
        Please email your materials to info@strawhat-auditions.com.</font>
        </td>
        </tr>
        
        <tr>
        <td>
        <font size = "2"><b>2/3/15: Theatres: APPLICATIONS FOR THEATRES ARE OPEN...</b> send your application (or go online) and email your theatre description sheets.</font> 
-->        
        </td>
        </tr>
        </table>
        
        <!--<BR>All resumes, videos, portfolios, etc. will be up shortly!      -->
        
              
    <table>
     


  <TR VALIGN="TOP"> 

    <TD VALIGN="TOP" WIDTH="431" ALIGN = "CENTER"> 

      <?php



echo "<IMG SRC=\"$pix[$pixCnt]\"></TD>";
?>

      <div align="left"></div>

    <TD WIDTH="223" ROWSPAN="6" VALIGN="TOP"



		  STYLE="font-family: Arial; font-size: 12pt"> 

      <p align="center"><B><I><FONT FACE="Arial" SIZE="+1" COLOR="#FF0033">
      Welcome to The StrawHat Auditions!</FONT></I></b></p>
      <p align="left"> "With StrawHats taking place in the most artistically prominent 
      city in the country, it's truly 'one-stop shopping' for serious and gifted 
      actors and technicians"
      </p>

      <blockquote>
        <p><B><font size="-1">Scott LaFeber</font></B><font size="-1">, Emerson 
          College BFA Musical Theatre Faculty, Director.</font></p>
      </blockquote>

    </TD>
  </TR>

  <TR> 
    <TD VALIGN="TOP" WIDTH="431">
     

<?php    
include($text[$pixCnt]);    
?>    
    </TD>
  </TR>

</TABLE>
</BODY>
</HTML>