<?php
//actor_searchlastname1.php

//if (!$sel_record) {
//	header("Location: http://localhost/Members04/actors04/actor_searchlastname.php");
//	exit;
//	}

//create connection
$connection = mysql_connect("127.0.0.1", "JayServer", "wombat") or die ("Couldn't connect to server.");

//select database
$db = mysql_select_db("mydata", $connection) or die("Couldn't select database.");

//SQL statement to select record
//$sql = "SELECT * FROM actor WHERE actor_uid = $uid"";

/*
$sql = "SELECT * 
FROM actor, physical
WHERE actor.actor_uid = \"$sel_record\"
and actor.actor_uid = physical.phys_uid
";
*/


$sql = "SELECT *
FROM actor, physical, skills, roles
WHERE actor.actor_uid = \"$uid\"
and actor.actor_uid = physical.phys_uid
and physical.phys_uid = skills.skills_uid
and skills.skills_uid = roles.roles_uid
";



//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


if (!$sql_result) {
	echo "<P>Couldn't get record!</P>";
	} else {
	

//fetch row and assign to variables
$row = mysql_fetch_array($sql_result);
$actor_uid = $row["actor_uid"];
$lastname = $row["lastname"];
$firstname = $row["firstname"];
$midname = $row["midname"];
$date_entered = $row["date_entered"];
$region = $row["region"];
$phone = $row["phone"];
$email = $row["email"];
$large_city = $row["large_city"];
$apprentice = $row["apprentice"];
$intern = $row["intern"];
$availfor = $row["availfor"];
$availto = $row["availto"];
$h_or_serv = $row["h_or_serv"];
$pix_link = $row["pix_link"];
$resume_link = $row["resume_link"];
$gender = $row["gender"];
$singing = $row["singing"];
$u_none = $row["u_none"];
$u_sag = $row["u_sag"];
$u_aftra = $row["u_aftra"];
$u_agva = $row["u_agva"];
$u_emc = $row["u_emc"];
$u_agma = $row["u_agma"];
//physical
$height = $row["height"];
$weight = $row["weight"];
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
//roles
$show1 = $row["show1"];
$show2 = $row["show2"];
$show3 = $row["show3"];
$show4 = $row["show4"];
$show5 = $row["show5"];
$role1 = $row["role1"];
$role2 = $row["role2"];
$role3 = $row["role3"];
$role4 = $row["role4"];
$role5 = $row["role5"];
$thea1 = $row["thea1"];
$thea2 = $row["thea2"];
$thea3 = $row["thea3"];
$thea4 = $row["thea4"];
$thea5 = $row["thea5"];
$school = $row["school"];
echo "
<HTML> 
  <HEAD> 
	 <TITLE>$lastname, $firstname</TITLE><LINK REL=\"STYLESHEET\" HREF=\"members.css\"> 
  </HEAD> 
  <BODY>
<IMG SRC=\"../../graphics03/strawcasting.jpg\" WIDTH=\"400\" HEIGHT=\"45\"
	 BORDER=\"0\" ALIGN=\"BOTTOM\"><IMG SRC=\"/Members04/Actors04/ActorPix/$pix_link\" ALIGN=\"RIGHT\" BORDER=\"0\"> 
<TABLE CELLPADDING=\"3\" CELLSPACING=\"3\" WIDTH=\"65%\"> 
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\" HEIGHT=\"33\" WIDTH=\"107\"><B>Name:</B></TD> 
		  <TD VALIGN=\"TOP\" HEIGHT=\"33\" colspan=\"2\"><B><font size=\"+2\">$firstname $midname $lastname</font></B></TD> 
		</tr>
		<tr>
		  <td colspan=\"3\"><FONT SIZE=\"-1\"><I>
			  <B><center>Hair: </B>$hair * <B>Eyes: </B>$eye * <B>Ht: </B>$height<br><B>Wt: </B>$weight * <B>Age Range: </B>$age_range
			  <BR><b>Types: </B>
			  $nativeam $asian $white $black $hispanic $eeurope $mideast $indian</center>
			  </center></I></FONT>
		  </td>
		 </tr>
		<tr>
			<td colspan=\"3\" bgcolor=\"#CC3300\"><HR></td>
		</tr>
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\" WIDTH=\"107\"><B> Phone:</B><BR>$phone</TD> 
		  <TD colspan=\"2\" VALIGN=\"TOP\" WIDTH=\"101\"><B>E-mail:</B><BR><a href=\"mailto:$email\">$email</a></TD> 
		</TR> 
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\"><B>Will consider: </B></td>
          <TD VALIGN=\"TOP\" colspan=\"2\"> 		
";
		if($intern=="Y" && $apprentice=="Y") {
			echo "Apprenticeship and Internship";
		   }
		else if($intern=="Y") {
			echo "Internship"; 
		   }
		else if($intern=="Y") {
			echo "Apprenticeship"; 
		   }
		else {
			echo "None"; 
		   }
echo "  </TD> 
        </TR> 
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\" WIDTH=\"107\"><B>Applied as:</B>
";		  
		  if($singing=="Y"){
		  	echo "Singing Audition";
		  }
		  else {
		  	echo "Non-Singing Audition";
		  }
echo "		  
		  </TD>
    	  
		  <TD VALIGN=\"TOP\" WIDTH=\"101\"><B>Range:</B><BR>$vocal</TD> 
		  <TD VALIGN=\"TOP\" ALIGN=\"CENTER\"><A HREF=\"/Members04/Actors04/ActorRes/$resume_link\" >CLICK HERE FOR FULL RESUME</A></TD> 
		</TR> 

		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\" WIDTH=\"107\"><B>Location:</B><BR>$large_city<BR>$region</TD> 
		  <TD VALIGN=\"TOP\" WIDTH=\"101\"><B>Unions:</B><BR>$u_none $u_sag $u_aftra $u_agva $u_emc $u_agma</TD> 
		  <TD VALIGN=\"TOP\"><B>Available:</B><BR>$availfor - $availto</TD> 
		</TR> 
";
/*
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\" WIDTH=\"107\" height=\"27\">$large_city<BR>$region</TD> 
		  <TD VALIGN=\"TOP\" WIDTH=\"101\" height=\"27\">$u_none $u_sag $u_aftra $u_agva $u_emc $u_agma</TD> 
		  <TD VALIGN=\"TOP\" height=\"27\">$availfor - $availto</TD> 
		</TR> 
*/
echo "
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\" WIDTH=\"107\"><B>Role</B></TD> 
		  <TD VALIGN=\"TOP\" WIDTH=\"101\"><B>Show</B></TD> 
		  <TD VALIGN=\"TOP\"><B>Theatre</B></TD> 
		</TR> 
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\" WIDTH=\"107\">$role1</TD> 
		  <TD VALIGN=\"TOP\" WIDTH=\"101\">$show1</TD> 
		  <TD VALIGN=\"TOP\">$thea1</TD> 
		</TR> 
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\" WIDTH=\"107\">$role2</TD> 
		  <TD VALIGN=\"TOP\" WIDTH=\"101\">$show2</TD> 
		  <TD VALIGN=\"TOP\">$thea2</TD> 
		</TR> 
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\" WIDTH=\"107\">$role3</TD> 
		  <TD VALIGN=\"TOP\" WIDTH=\"101\">$show3</TD> 
		  <TD VALIGN=\"TOP\">$thea3</TD> 
		</TR> 
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\" WIDTH=\"107\">$role4</TD> 
		  <TD VALIGN=\"TOP\" WIDTH=\"101\">$show4</TD> 
		  <TD VALIGN=\"TOP\">$thea4</TD> 
		</TR> 
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\" WIDTH=\"107\">$role5</TD> 
		  <TD VALIGN=\"TOP\" WIDTH=\"101\">$show5</TD> 
		  <TD VALIGN=\"TOP\">$thea5</TD> 
		</TR> 

		<tr>
			<td colspan=\"3\" bgcolor=\"#CC3300\"><HR></td>
		</tr>

";
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
		if($arrayskills[$index] > 4) {
			$count++;
			}
	}
//if count is zero there is no data and the row will not be echoed
	if($count>0) {

	echo "		
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\" WIDTH=\"107\"><B>Dance:</B></TD> 
		  <TD COLSPAN=\"2\" VALIGN=\"TOP\" WIDTH=\"233\"> ";

	for($index=0; $index<6; $index++) {
		if($arrayskills[$index] > 4) {
			echo $arraynames[$index];
			echo " ";
			}
	
	}
echo "</TD></TR>";
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
		if($arrayskills[$index] > 4) {
			$count++;
			}
	}
//if count is zero there is no data and the row will not be echoed
	if($count>0) {

	echo "		
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\" WIDTH=\"107\"><B>Instruments:</B></TD> 
		  <TD COLSPAN=\"2\" VALIGN=\"TOP\" WIDTH=\"233\"> ";

	for($index=0; $index<12; $index++) {
		if($arrayskills[$index] > 4) {
			echo $arraynames[$index];
			echo " ";
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

//testing to see if there is any data	
	for($index=0; $index<6; $index++) {
		if($arrayskills[$index] == 3) {
			$count++;
			}
	}
//if count is zero there is no data and the row will not be echoed
	if($count>0) {

	echo "		
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\" WIDTH=\"107\"><B>Technical Skills:</B></TD> 
		  <TD COLSPAN=\"2\" VALIGN=\"TOP\" WIDTH=\"233\"> ";

	for($index=0; $index<6; $index++) {
		if($arrayskills[$index] == "3") {
			echo $arraynames[$index];
			echo " ";
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
	$count=0;


//testing to see if there is any data	
	for($index=0; $index<6; $index++) {
		if($arrayskills[$index]!="") {
			$count++;
			}
	}
//if count is zero there is no data and the row will not be echoed
	if($count>0) {

	echo "		
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\" WIDTH=\"107\"><B>Other Skills:</B></TD> 
		  <TD COLSPAN=\"2\" VALIGN=\"TOP\" WIDTH=\"233\"> 
    	  $acrobatics $juggling $puppetry $asl $painting $combat  
		  </TD> 
		</TR>";
	}

echo "
		 
		<TR VALIGN=\"TOP\"> 
		  <TD VALIGN=\"TOP\" WIDTH=\"107\"><B>Schools:</B></TD> 
		  <TD COLSPAN=\"2\" VALIGN=\"TOP\" WIDTH=\"233\">$school</TD> 
		</TR> 
	 </TABLE>
</BODY>
</HTML>
";
}
?>