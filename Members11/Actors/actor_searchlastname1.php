<?php
session_start();
//include("session.inc");

$sel_record = $_POST['sel_record'];
//$apprentice = $_POST['apprentice'];
//$intern = $_POST['intern'];

//include("session.inc");

if (!$sel_record) {

	header("Location: http://localhost/Members11/actors/actor_searchlastname.php");
	echo " No sel_record";
	exit;

	}



$sql = "SELECT *
FROM actor11, audition11, physical11, skills11, roles11
WHERE actor11.actor_uid = \"$sel_record\"
AND actor11.actor_uid = audition11.audition_uid
AND audition11.audition_uid = physical11.phys_uid
AND physical11.phys_uid = skills11.skills_uid
AND skills11.skills_uid = roles11.roles_uid
";

include("../../Comm/connect.inc");


//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


if (!$sql_result) {
	echo "<P>Couldn't get record!</P>";
	} else {


//fetch row and assign to variables

$row = mysql_fetch_array($sql_result);
//actor
$actor_uid = $row["actor_uid"];
$lastname = stripslashes($row["lastname"]);
$firstname = stripslashes($row["firstname"]);
$midname = stripslashes($row["midname"]);
$region = $row["region"];
$phone = $row["phone"];
$email = $row["email"];
$large_city = stripslashes($row["largecity"]);
$h_or_serv = $row["h_or_serv"];
$pix_link = $row["pix_link"];
$resume_link = $row["resume_link"];
$url1 = $row["url1"];
$url2 = $row["url2"];



//audition
$intern = $row["intern"];
$apprentice = $row["apprentice"];
$u_sag = $row["u_sag"];
$u_aftra = $row["u_aftra"];
$u_agva = $row["u_agva"];
$u_emc = $row["u_emc"];
$u_agma = $row["u_agma"];
$availfor = $row["availfor"];
$availto = $row["availto"];
$mononly = $row["mononly"];

//physical
$ht = $row["ht"];
$wt = $row["wt"];
$hair = $row["hair"];
$age_range = $row["age_range"];
$eye = $row["eye"];

$nativeam = $row["nativeam"];
$asian = $row["asian"];
$white = $row["white"];
$black = $row["black"];
$hispanic = $row["hispanic"];
$eeurope = $row["eeurope"];
$mideast = $row["mideast"];
$indian = $row["indian"];

//skills
$vocal = $row["vocal"];
$ballet = $row["ballet"];
$mus_thea = $row["mus_thea"];
$ballroom = $row["ballroom"];
$tap = $row["tap"];
$swing = $row["swing"];
$jazz = $row["jazz"];
$perc = $row["perc"];
$sax = $row["sax"];
$banjo = $row["banjo"];
$piano = $row["piano"];
$drums = $row["drums"];
$cello = $row["cello"];
$clarinet = $row["clarinet"];
$trombone = $row["trombone"];
$trumpet = $row["trumpet"];
$flute = $row["flute"];
$violin = $row["violin"];
$guitar = $row["guitar"];

//technical
$set_design = $row["set_design"];
$lights = $row["lights"];
$costume = $row["costume"];
$stagem = $row["stagem"];
$box_office = $row["box_office"];
$props = $row["props"];

//other skills
$acrobatics = $row["acrobatics"];
$juggling = $row["juggling"];
$puppetry = $row["puppetry"];
$asl = $row["asl"];
$painting = $row["painting"];
$combat = $row["combat"];
$shakes = $row["shakes"];
$cabaret = $row["cabaret"];
$improv = $row["improv"];
$mime = $row["mime"];
$standup = $row["standup"];

//roles
$show1 = stripslashes($row["show1"]);
$show2 = stripslashes($row["show2"]);
$show3 = stripslashes($row["show3"]);
$show4 = stripslashes($row["show4"]);
$show5 = stripslashes($row["show5"]);
$show6 = stripslashes($row["show6"]);
$show7 = stripslashes($row["show7"]);
$show8 = stripslashes($row["show8"]);
$show9 = stripslashes($row["show9"]);
$show10 = stripslashes($row["show10"]);

$role1 = stripslashes($row["role1"]);
$role2 = stripslashes($row["role2"]);
$role3 = stripslashes($row["role3"]);
$role4 = stripslashes($row["role4"]);
$role5 = stripslashes($row["role5"]);
$role6 = stripslashes($row["role6"]);
$role7 = stripslashes($row["role7"]);
$role8 = stripslashes($row["role8"]);
$role9 = stripslashes($row["role9"]);
$role10 = stripslashes($row["role10"]);

$thea1 = stripslashes($row["thea1"]);
$thea2 = stripslashes($row["thea2"]);
$thea3 = stripslashes($row["thea3"]);
$thea4 = stripslashes($row["thea4"]);
$thea5 = stripslashes($row["thea5"]);
$thea6 = stripslashes($row["thea6"]);
$thea7 = stripslashes($row["thea7"]);
$thea8 = stripslashes($row["thea8"]);
$thea9 = stripslashes($row["thea9"]);
$thea10 = stripslashes($row["thea10"]);

$dir1 = stripslashes($row["dir1"]);
$dir2 = stripslashes($row["dir2"]);
$dir3 = stripslashes($row["dir3"]);
$dir4 = stripslashes($row["dir4"]);
$dir5 = stripslashes($row["dir5"]);
$dir6 = stripslashes($row["dir6"]);
$dir7 = stripslashes($row["dir7"]);
$dir8 = stripslashes($row["dir8"]);
$dir9 = stripslashes($row["dir9"]);
$dir10 = stripslashes($row["dir10"]);

$school = stripslashes($row["school"]);

// assign actor_uid = sched_uid
$new_sched_uid = $actor_uid;
//echo "UIDS: $new_sched_uid";
//get sched11 info for labels
$sql_labels = "SELECT *
FROM sched11
WHERE sched_uid = \"$new_sched_uid\"
";

//execute SQL query and get result    
$sql_result_labels = mysql_query($sql_labels,$connection) or die("Couldn't execute label, sched11 query.");


if (!$sql_result_labels) {
    echo "<P>Couldn't get record!</P>";
    } else {


//fetch row and assign to variables

$row = mysql_fetch_array($sql_result_labels);
//sched11
$sched_uid = $row["sched_uid"];
$name = $row["name"];
$time = $row["time"];
$day = $row["day"];
$type = $row["type"];
$standby = $row["standby"];
$label = $row["label"];
    }
    
echo "

<HTML> 
  <HEAD> 
	 <TITLE>$lastname, $firstname</TITLE><LINK REL=\"STYLESHEET\" HREF=\"/styles/members.css\">
	 
	 
<SCRIPT LANGUAGE=\"Javascript\" TYPE=\"text/javascript\">
<!-- 

function open_window(url) {
var NEW_WIN = null;
NEW_WIN = window.open(\"\", \"RecordViewer\",
location=\"no\",
resizable=\"1\",
scrollbars=\"1\",
toolbar=\"0\",
width=\"400\",
); 

NEW_WIN.location.href = url;
NEW_WIN.focus();
}


function sendme() { 
window.open(\"\",\"myNewWin\",
resizable=\"1\",
scrollbars=\"1\",
toolbar=\"0\");
width=\"400\", 
myNewWin.focus();

var a = window.setTimeout(\"document.form1.submit();\",\"500\"); 
} 
-->
</script>	 
	 
	  
  </HEAD> 
  <BODY BACKGROUND=\"../../graphics03/Bk10a.GIF\"><script src=\"navbar.js\"></script>
  ";

//include ("banner.inc");  
  
echo "	 

<BR>

<TABLE CELLPADDING=\"2\" CELLSPACING=\"2\" WIDTH=\"80%\" align = \"center\"> 
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"LEFT\" HEIGHT=\"33\" colspan=\"3\"><center>
          <IMG SRC=\"../../graphics03/straw99.gif\" ALIGN=\"LEFT\" BORDER=\"0\"> 
          <BR>
          <H1><B><U>$firstname $midname $lastname</U></B></H1></center>
          <BR>
          </TD> 
		  
          <TD rowspan=\"7\">
";          


echo "<P align = \"right\"><font size=\"+1\">";
if($day == "Sat") 
    echo "<B>Saturday </B>";
elseif($day == "Sun")  
    echo "<B>Sunday </B>";
elseif($day == "Mon")  
    echo "<B>Monday </B>";
        
//echo "$time<BR>";

//echo "TIME: ";
//format time
//echo "$time<BR>";
//$first_time = substr($time, 0);


//echo "data time: $first_time<BR>";"


$test_firstzero = substr($time, 0,1);
//echo "First #: $test_firstzero <BR>";

if($type != "SB" && $test_firstzero == 0) {
    $time = substr($time, 1,4);
    echo "<B>$time<BR>"; }

if($type != "SB" && $test_firstzero == 1) {
    $time = substr($time, 0,5);
    echo "<B>$time<BR>"; }

/*
 else {$time = substr($time, 0,5); 
 echo "<B>$time<BR> ";}
*/       
    
//echo "Type: ";
if($type == "SB") 
    echo "<B>Standby $standby</B>";
elseif($type == "S")  
    echo "<B>Singer </B>";
elseif($type == "D")  
    echo "<B>Dancer </B>";
elseif($type == "NS")  
    echo "<B>Non-Singer </B>";
    
echo "<B> $label</B>";     
    
echo "</font></P>

          
          <IMG SRC=\"/Members11/Actors/ActorPix/$pix_link\" ALIGN=\"RIGHT\" BORDER=\"0\">
		  
          
          </td>
		  
		</tr>
		
		<tr>
		  <td colspan=\"3\"><FONT SIZE=\"-1\"><I>
";
include("parse.inc");	
	
	echo "
			  <center>
              <B>Hair: </B>$hair * 
              <B>Eyes: </B>$eye * 
              <B>Ht: </B>$feet, $inches *
              <B>Wt: </B>$wt lbs *
              <B>Age Range: </B>$age_range
";


echo "
<tr>
          <td colspan=\"3\"><FONT SIZE=\"-1\"><I>
";
		  
 echo "<center><b> Role Type: </b>";
 
 if($nativeam) {echo "Native American * ";}
 if($asian) {echo "Asian * ";}
 if($white) {echo "White * ";}
 if($black) {echo "Black * ";}
 if($hispanic) {echo "Hispanic * ";}
 if($eeurope) {echo "Eastern European * ";}
 if($mideast) {echo "Mideast * ";}
 if($indian) {echo "Indian * ";}

 
echo " 
</td>
</tr> 
 
 
 
              
              </center></I></FONT>
		  </td>
		 </tr>
         
		<tr>
			<td colspan=\"3\" bgcolor=\"#CC3300\"><HR></td>
		</tr>

		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\"><B> Phone:</B><BR>
";
	//parse phone number

	$areacode = substr($phone, 0,3);
	$phone1 = substr($phone, 3,3);
	$phone2 = substr($phone, 6,4);
			  
echo " $areacode-$phone1-$phone2		  
		 </TD> 
		 
		  <TD VALIGN=\"TOP\"><B>E-mail:</B><BR><a href=\"mailto:$email\">$email</a></TD>
		  <TD><B>Available:</B><BR> <U>$availfor to $availto</U></TD> 
          <!--was availfor_ps, availto_ps, why -->
		  </TR> 

		<TR VALIGN=\"TOP\"> 
		<TD VALIGN=\"TOP\"><B>Applied as:</B><BR>
";		  

		  if($mononly=="N"){
		  	echo "Singing Audition";
		  }
		  elseif ($mononly=="Y") {
		  	echo "Non-Singing Audition";
		  }
		  else {echo "Dancers Who Sing Audition";}
		  
		  

echo "		  
		  </TD>
		
		
		  <TD VALIGN=\"TOP\"><B>Will consider:</B>
		<BR>		
";

		if($intern=="Y" && $apprentice=="Y") {
			echo "Apprenticeship and Internship";
		   }
		else if($intern=="Y") {
			echo "Internship"; 
		   }

		else if($apprentice=="Y") {
			echo "Apprenticeship"; 
		   }

		else {
			echo "None"; 
		   }

echo "  </td>
		</TD>
        
		<TD VALIGN=\"TOP\" ALIGN=\"LEFT\">
        <A HREF=\"/Members11/Actors/ActorRes/$resume_link\" target=\"RecordViewer\" onClick=\"sendme()\">
        CLICK HERE <BR>FOR FULL RESUME</A>		
		</TD
        </TR> 

        <TR VALIGN=\"TOP\"> ";	
echo "		  
		 <TD VALIGN=\"TOP\"><B>Range:</B><BR>$vocal</TD> 
		 <TD VALIGN=\"TOP\" ><B>Unions:</B><BR>$u_sag $u_aftra $u_agva $u_emc $u_agma</TD>
		 <TD VALIGN=\"TOP\" ><b>Websites:</b>
         <br>
";         
         if($url1)
         {echo "
         <A HREF=\"http://$url1\" target=\"RecordViewer\" onClick=\"sendme()\">
        <font size = 3>Website 1 </font></A><font size = 2>($url1)</font>."; }
        
        if($url2)
         {echo " <BR>       
        <A HREF=\"http://$url2\" target=\"RecordViewer\" onClick=\"sendme()\">
        <font size = 3>Website 2 </A><font size = 2>($url2)</font>.";}
        
         echo "</td> 
		
        
        </TR> 

		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\"><B>Location:</B></TD> 
		  <TD VALIGN=\"TOP\" colspan=\"2\"><I><u>$large_city, $region</U></I></TD> 
		  </TR>
</TABLE> 
<br>
";

//ROLES TABLE
echo "
	<TABLE WIDTH=\"80%\" align = \"center\">
	
	<tr>
			<td colspan=\"4\" bgcolor=\"#CC3300\"><HR></td>
		</tr>
		
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\"><B>Role</B></TD> 
		  <TD VALIGN=\"TOP\"><B>Show</B></TD> 
		  <TD VALIGN=\"TOP\"><B>Theatre</B></TD>
		  <TD VALIGN=\"TOP\"><B>Dir/Choreo/Other</B></TD> 
		</TR> 

		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\">$role1</TD> 
		  <TD VALIGN=\"TOP\">$show1</TD> 
		  <TD VALIGN=\"TOP\">$thea1</TD>
		  <TD VALIGN=\"TOP\">$dir1</TD>
		</TR> 

		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\">$role2</TD> 
		  <TD VALIGN=\"TOP\">$show2</TD> 
		  <TD VALIGN=\"TOP\">$thea2</TD>
		  <TD VALIGN=\"TOP\">$dir2</TD> 
		</TR> 

		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\">$role3</TD> 
		  <TD VALIGN=\"TOP\">$show3</TD> 
		  <TD VALIGN=\"TOP\">$thea3</TD>
		  <TD VALIGN=\"TOP\">$dir3</TD> 
		</TR> 

		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\">$role4</TD> 
		  <TD VALIGN=\"TOP\">$show4</TD> 
		  <TD VALIGN=\"TOP\">$thea4</TD>
		  <TD VALIGN=\"TOP\">$dir4</TD> 
		</TR> 

		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\">$role5</TD> 
		  <TD VALIGN=\"TOP\">$show5</TD> 
		  <TD VALIGN=\"TOP\">$thea5</TD>
		  <TD VALIGN=\"TOP\">$dir5</TD>
		</TR> 

				<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\">$role6</TD> 
		  <TD VALIGN=\"TOP\">$show6</TD> 
		  <TD VALIGN=\"TOP\">$thea6</TD>
		  <TD VALIGN=\"TOP\">$dir6</TD> 
		</TR> 

		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\">$role7</TD> 
		  <TD VALIGN=\"TOP\">$show7</TD> 
		  <TD VALIGN=\"TOP\">$thea7</TD>
		  <TD VALIGN=\"TOP\">$dir7</TD> 
		</TR> 

		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\">$role8</TD> 
		  <TD VALIGN=\"TOP\">$show8</TD> 
		  <TD VALIGN=\"TOP\">$thea8</TD>
		  <TD VALIGN=\"TOP\">$dir8</TD> 
		</TR> 

		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\">$role9</TD> 
		  <TD VALIGN=\"TOP\">$show9</TD> 
		  <TD VALIGN=\"TOP\">$thea9</TD>
		  <TD VALIGN=\"TOP\">$dir9</TD>
		</TR> 

		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\">$role10</TD> 
		  <TD VALIGN=\"TOP\">$show10</TD> 
		  <TD VALIGN=\"TOP\">$thea10</TD>
		  <TD VALIGN=\"TOP\">$dir10</TD> 
		</TR> 
		
		<tr>
			<td colspan=\"4\" bgcolor=\"#CC3300\"><HR></td>
		</tr>
</TABLE>


";
//<br align=\"left\">

/*------------DANCE

*/



	$arrayskills[0]=$ballet;
	$arrayskills[1]=$mus_thea;
	$arrayskills[2]=$ballroom;
	$arrayskills[3]=$tap;
	$arrayskills[4]=$swing;
	$arrayskills[5]=$jazz;
	$count=0;

	$arraynames[0]="Ballet";
	$arraynames[1]="Musical Theatre";
	$arraynames[2]="Ballroom";	
	$arraynames[3]="Tap";	
	$arraynames[4]="Swing";
	$arraynames[5]="Jazz";

//testing to see if there is any data	

	for($index=0; $index<6; $index++) {
		if($arrayskills[$index] > 0) {
			$count++;
			}
	}


//if count is zero there is no data and the row will not be echoed
	if($count>0) {
	echo "		
	<TABLE WIDTH=\"80%\" align = \"center\">
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\" WIDTH = \"20%\"><B>Dance:</B>(yrs)</TD> 
		  <TD COLSPAN=\"3\" VALIGN=\"TOP\"> ";

	for($index=0; $index<6; $index++) {
		if($arrayskills[$index] > 0) {
			echo $arraynames[$index] . "(" . $arrayskills[$index] . ")";
			echo ", ";
			}
	}

	echo "</TD></TR>";
	}
	else {
	echo "<TABLE WIDTH=\"80%\" align = \"center\"> ";
	}


/*------------INSTRUMENTAL
*/

	$arrayskills[0]=$banjo;
	$arrayskills[1]=$drums;
	$arrayskills[2]=$perc;
	$arrayskills[3]=$trombone;
	$arrayskills[4]=$cello;
	$arrayskills[5]=$flute;
	$arrayskills[6]=$piano;
	$arrayskills[7]=$trumpet;
	$arrayskills[8]=$clarinet;
	$arrayskills[9]=$guitar;
	$arrayskills[10]=$sax;
	$arrayskills[11]=$violin;
	$count=0;

	$arraynames[0]="Banjo";
	$arraynames[1]="Drums";
	$arraynames[2]="Percussion";	
	$arraynames[3]="Trombone";	
	$arraynames[4]="Cello";
	$arraynames[5]="Flute";
	$arraynames[6]="Piano";
	$arraynames[7]="Trumpet";
	$arraynames[8]="Clarinet";	
	$arraynames[9]="Guitar";	
	$arraynames[10]="Saxophone";
	$arraynames[11]="Violin";

//testing to see if there is any data	

	for($index=0; $index<12; $index++) {
		if($arrayskills[$index] > 0) {
			$count++;
			}
	}

	
	
	
//if count is zero there is no data and the row will not be echoed

	if($count>0) {
	echo "		
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\" WIDTH = \"20%\"><B>Instruments:</B>(yrs)</TD> 
		  <TD COLSPAN=\"3\" VALIGN=\"TOP\"> ";

	for($index=0; $index<12; $index++) {
		if($arrayskills[$index] > 0) {
			echo $arraynames[$index] . "(" . $arrayskills[$index] . ")";
			echo ", ";
			}
	}

echo "</TD></TR>";
}



/*------------TECHNICAL SKILLS

*/
	$arrayskills[0]=$set_design;
	$arrayskills[1]=$lights;
	$arrayskills[2]=$costume;
	$arrayskills[3]=$stagem;
	$arrayskills[4]=$box_office;
	$arrayskills[5]=$props;
	$count=0;

	$arraynames[0]="Set Construction";
	$arraynames[1]="Lighting";
	$arraynames[2]="Costuming";	
	$arraynames[3]="Stage Management";	
	$arraynames[4]="Box Office";
	$arraynames[5]="Properties";

//testing to see if there is any data - was ==2 a/o 2/26/14	

	for($index=0; $index<6; $index++) {
		if($arrayskills[$index] > 0) {
			$count++;
			}

	}

//if count is zero there is no data and the row will not be echoed

	if($count>0) {
	echo "		
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\" WIDTH = \"20%\"><B>Technical Skills:</B>
          <BR>
          <font size=\"1\">Levels: Beginning (1), Good(2),<BR> 
          Excellent(3)</font>
          </TD> 
		  <TD COLSPAN=\"3\" VALIGN=\"TOP\"> ";

	for($index=0; $index<6; $index++) {
		if($arrayskills[$index] > "0") {
			echo $arraynames[$index];
			echo "(";
            echo ($arrayskills[$index]);
            echo ")";
            echo ", ";
			}
	}

echo "</TD></TR>";
}

/*------------OTHER SKILLS
include otherskills.php to include row if actor has other skills
		include("otherskills.php") - still to be tested

*/

	$arrayskills[0]=$acrobatics;
	$arrayskills[1]=$juggling;
	$arrayskills[2]=$puppetry;
	$arrayskills[3]=$asl;
	$arrayskills[4]=$painting;
	$arrayskills[5]=$combat;
	$arrayskills[6]=$shakes;
	$arrayskills[7]=$cabaret;
	$arrayskills[8]=$improv;
	$arrayskills[9]=$mime;
	$arrayskills[10]=$standup;

	$count=0;


//testing to see if there is any data	

	for($index=0; $index<11; $index++) {
		if($arrayskills[$index]!="") {
			$count++;
			}
	}

//if count is zero there is no data and the row will not be echoed

	if($count>0) {
	echo "		
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\" WIDTH = \"20%\"><B>Other Skills:</b><br>(proficient)</TD> 
		  <TD COLSPAN=\"3\" VALIGN=\"TOP\"> 
";
//parse abreviations

	if($acrobatics){
		echo "Acrobatics, ";
	}
	if($juggling){
		echo "Juggling, ";
	}	
	if($puppetry){
		echo "Puppetry, ";
	}
	if($asl){
		echo "American Sign Language, ";
	}
	if($painting){
		echo "Painting, ";
	}
	if($combat){
		echo "Stage Combat, ";
	}
	if($shakes){
		echo "Shakespeare, ";
	}
	if($cabaret){
		echo "Cabaret, ";
	}
	if($improv){
		echo "Improv, ";
	}
	if($mime){
		echo " Mime, ";
	}
	if($standup){
		echo "Standup";
	}
echo "		  
	  </TD> 
		</TR>";
	}

echo "
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\" WIDTH = \"20%\"><B>Schools:</B></TD> 
		  <TD COLSPAN=\"3\" VALIGN=\"TOP\">$school</TD> 
		</TR> 
	 </TABLE>
<BR>
<BR>
<BR>
</BODY>
</HTML>
";
}
?>