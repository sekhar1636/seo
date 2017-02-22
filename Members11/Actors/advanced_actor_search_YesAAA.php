<?php
//apprentice intern, adding dance, etc 1/1/2014
//use the audition_yes_no to include AA or AR actors

//1/3/2015 MAKE FIRST SECTION EXLUSIVE TO AA searches

include("session.inc");

$audition_yes_no = $_POST['audition_yes_no']; 
if ($audition_yes_no == "Y")
{
 //begining of YES to AA   
$apprentice = $_POST['apprentice'];
$intern = $_POST['intern'];
$set_design = $_POST['set_design'];
$lights = $_POST['lights'];
$costume = $_POST['costume'];
$stagem = $_POST['stagem'];
$box_office = $_POST['box_office'];
$props = $_POST['props'];
//dance
$ballet = $_POST['ballet'];
$mus_thea = $_POST['mus_thea'];
$ballroom = $_POST['ballroom'];
$tap = $_POST['tap'];
$swing = $_POST['swing'];
$jazz = $_POST['jazz'];
//instruments
$banjo = $_POST['banjo'];
$drums = $_POST['drums'];
$perc = $_POST['perc'];
$trombone = $_POST['trombone'];
$cello = $_POST['cello'];
$flute = $_POST['flute'];
$piano = $_POST['piano'];
$trumpet = $_POST['trumpet'];
$clarinet = $_POST['clarinet'];
$guitar = $_POST['guitar'];
$sax = $_POST['sax'];
$violin = $_POST['violin'];
//other skills
$acrobatics = $_POST['acrobatics'];
$juggling = $_POST['juggling'];
$puppetry = $_POST['puppetry'];
$asl = $_POST['asl'];
$painting = $_POST['painting'];
$combat = $_POST['combat'];
$shakes = $_POST['shakes'];
$cabaret = $_POST['cabaret'];
$improv = $_POST['improv'];
$mime = $_POST['mime'];
$standup = $_POST['standup'];
$vocal =  $_POST['vocal']; 

//physical
$gender = $_POST['gender']; 
$nativeam = $_POST['nativeam']; 
$asian = $_POST['asian'];
$black = $_POST['black'];
$hispanic = $_POST['hispanic'];
$eeurope = $_POST['eeurope'];
$mideast = $_POST['mideast'];
$indian = $_POST['indian'];
$white = $_POST['white'];



//audition info

//$mononly = $_POST['mononly'];   echo "Mononly: $mononly<BR>";
$day = $_POST['day'];   //echo "Day: $day<BR>";
$time = $_POST['time']; //echo "Time: $time<BR>";
$hour = $_POST['hour']; //echo "Hour: $hour<BR>";
$type = $_POST['type']; //echo "Type: $type<BR>";
$hour_time = $_POST['hour']; //echo "Hour Time: $hour_time<BR>";
if($hour){$hour_time = $hour;};
//echo "Hour Time: $hour_time<BR>";
//$standby = $_POST['standby']; echo "Standby: $type<BR>";
//end of post for Audition Yes

//include("session.inc");

echo "

<HTML>
<HEAD>
<TITLE>StrawHat Advanced Actor Search</TITLE>
<link rel=\"stylesheet\" href=\"/styles/members.css\" type=\"text/css\">
";

include("open_window.inc");

echo "
</HEAD>
<BODY BACKGROUND=\"../../graphics03/Bk10a.GIF\"><script src=\"navbar.js\"></script>
";

//create connection
include("../../Comm/connect.inc");

/*
//create sql statement, FOR AR actors
$sqlA ="SELECT *
FROM actor11, skills11, audition11, rec11, physical11
WHERE actor_uid = audition_uid
AND audition_uid = skills_uid
AND skills_uid = actor_ID
AND actor_ID = phys_uid
AND item = \"AR\" 

";
*/

/*...selecting actors who HAVE an audition
$sqlAA ="SELECT skills_uid, actor_uid, audition_uid, actor_ID, phys_uid, pix_link, sched_uid,
lastname, firstname, midname,
intern, apprentice,
set_design, lights, costume, stagem, box_office, props, item,
ballet, mus_thea, ballroom, tap, swing, jazz,
banjo, drums, perc, trombone, cello, flute, piano, trumpet, clarinet, guitar, sax, violin,
acrobatics, juggling, puppetry, asl, painting, combat, shakes, cabaret, improv, mime, standup, vocal,
gender, nativeam, asian, white, black, hispanic, eeurope, mideast, indian,
day, time, type, time, standby
*/



//SQL STATEMENTS FOR AA ACTORS
$sqlAA ="SELECT *
FROM actor11, skills11, audition11, rec11, physical11, sched11 
WHERE actor_uid = audition_uid
AND audition_uid = skills_uid
AND skills_uid = actor_ID
AND actor_ID = phys_uid
AND phys_uid = sched_uid
AND item = \"AA\"
";


$sql_app = "AND audition11.apprentice = \"$apprentice\" ";
$sql_intern = "AND audition11.intern = \"$intern\" ";
$sql_set_design = "AND skills11.set_design >= \"$set_design\" ";
$sql_lights = "AND skills11.lights >= \"$lights\" ";
$sql_costume = "AND skills11.costume >= \"$costume\" "; 
$sql_stagem = "AND skills11.stagem >= \"$stagem\" ";
$sql_box_office = "AND skills11.box_office >= \"$box_office\" ";
$sql_props = "AND skills11.props >= \"$props\" ";
//dance
$sql_ballet = "AND skills11.ballet >= \"$ballet\" ";
$sql_mus_thea = "AND skills11.mus_thea >= \"$mus_thea\" ";
$sql_ballroom = "AND skills11.ballroom >= \"$ballroom\" ";
$sql_swing = "AND skills11.swing >= \"$swing\" ";
$sql_jazz = "AND skills11.jazz >= \"$jazz\" ";
//instruments
$sql_banjo = "AND skills11.banjo >= \"$banjo\" ";
$sql_drums = "AND skills11.drums >= \"$drums\" ";
$sql_perc = "AND skills11.perc >= \"$perc\" ";
$sql_trombone = "AND skills11.trombone >= \"$trombone\" ";
$sql_cello = "AND skills11.cello >= \"$cello\" ";
$sql_flute = "AND skills11.flute >= \"$flute\" ";
$sql_piano = "AND skills11.piano >= \"$piano\" ";
$sql_trumpet = "AND skills11.trumpet >= \"$trumpet\" ";
$sql_clarinet = "AND skills11.clarinet >= \"$clarinet\" ";
$sql_guitar = "AND skills11.guitar >= \"$guitar\" ";
$sql_sax = "AND skills11.sax >= \"$sax\" ";
$sql_violin = "AND skills11.violin >= \"$violin\" ";
//other skills
$sql_acrobatics = "AND skills11.acrobatics = \"$acrobatics\" ";
$sql_juggling = "AND skills11.juggling = \"$juggling\" ";
$sql_puppetry = "AND skills11.puppetry = \"$puppetry\" ";
$sql_asl = "AND skills11.asl = \"$asl\" ";
$sql_painting = "AND skills11.painting = \"$painting\" ";
$sql_combat = "AND skills11.combat = \"$combat\" ";
$sql_shakes = "AND skills11.shakes = \"$shakes\" ";
$sql_cabaret = "AND skills11.cabaret = \"$cabaret\" ";
$sql_improv = "AND skills11.improv = \"$improv\" ";
$sql_mime = "AND skills11.mime = \"$mime\" ";
$sql_standup = "AND skills11.standup = \"$standup\" ";
$sql_vocal = "AND skills11.vocal = \"$vocal\" ";

//physical
$sql_gender = "AND physical11.gender = \"$gender\" ";
$sql_nativeam = "AND physical11.nativeam = \"$nativeam\" ";
$sql_asian = "AND physical11.asian = \"$asian\" ";
$sql_black = "AND physical11.black = \"$black\" ";
$sql_hispanic = "AND physical11.hispanic = \"$hispanic\" ";
$sql_eeurope = "AND physical11.eeurope = \"$eeurope\" ";
$sql_mideast = "AND physical11.mideast = \"$mideast\" ";
$sql_indian = "AND physical11.indian = \"$indian\" ";
$sql_white = "AND physical11.white = \"$white\" ";

//audition day , time and hour
//if($audition_yes_no == "Y")

$sql_day = "AND sched11.day = \"$day\" ";       
$sql_time = "AND sched11.time = \"$time\" ";    
$sql_hour_time = "AND sched11.hour_time = \"$hour_time\" "; 
$sql_hour = "AND sched11.hour = \"$hour\" ";    
$sql_type = "AND sched11.type = \"$type\" ";    
$sql_standby = "AND sched11.standby = \"$standby\" "; 

//audition mononly
//$sql_mononly = "AND audition11.mononly = \"$mononly\" ";


// WAS $sql_B = "ORDER BY actor11.lastname ASC";
$sql_B = "ORDER BY sched11.order_by_num";

//put strings together
//sqlA is the original search with AR; sqlAA is the new with AA



//ACTOR AA sql STATEMENTS
    
$sql = $sqlAA;

if($apprentice) {$sql = $sql . $sql_app;}
if($intern) {$sql = $sql . $sql_intern;}
if($set_design > 0){$sql = $sql . $sql_set_design;}
if($lights > 0) {$sql = $sql . $sql_lights;}
if($costume > 0) {$sql = $sql . $sql_costume;}
if($stagem > 0) {$sql = $sql . $sql_stagem;}
if($box_office > 0) {$sql = $sql . $sql_box_office;}
if($props > 0) {$sql = $sql . $sql_props;}
//dance strings
if($ballet > 0) {$sql = $sql . $sql_ballet;}
if($mus_thea > 0) {$sql = $sql . $sql_mus_thea;}
if($ballroom> 0) {$sql = $sql . $sql_ballroom;}
if($tap> 0) {$sql = $sql . $sql_tap;}
if($swing> 0) {$sql = $sql . $sql_swing;}
if($jazz> 0) {$sql = $sql . $sql_jazz;}
//instruments
if($banjo > 0) {$sql = $sql . $sql_banjo;}
if($drums > 0) {$sql = $sql . $sql_drums;}
if($perc> 0) {$sql = $sql . $sql_perc;}
if($trombone> 0) {$sql = $sql . $sql_trombone;}
if($cello > 0) {$sql = $sql . $sql_cello;}
if($flute > 0) {$sql = $sql . $sql_flute;}
if($piano > 0) {$sql = $sql . $sql_piano;}
if($trumpet > 0) {$sql = $sql . $sql_trumpet;}
if($clarinet > 0) {$sql = $sql . $sql_clarinet;}
if($guitar > 0) {$sql = $sql . $sql_guitar;}
if($sax > 0) {$sql = $sql . $sql_sax;}
if($violin > 0) {$sql = $sql . $sql_violin;}
//other skills
if($acrobatics) {$sql = $sql . $sql_acrobatics;}
if($juggling) {$sql = $sql . $sql_juggling;}
if($puppetry) {$sql = $sql . $sql_puppetry;}
if($asl) {$sql = $sql . $sql_asl;}
if($painting) {$sql = $sql . $sql_painting;}
if($combat) {$sql = $sql . $sql_combat;}
if($shakes) {$sql = $sql . $sql_shakes;}
if($cabaret) {$sql = $sql . $sql_cabaret;}
if($improv) {$sql = $sql . $sql_improv;}
if($mime) {$sql = $sql . $sql_mime;}
if($standup) {$sql = $sql . $sql_standup;}
if($vocal) {$sql = $sql . $sql_vocal;}

//physical 
if($gender) {$sql = $sql . $sql_gender;}
if($nativeam) {$sql = $sql . $sql_nativeam;}
if($asian) {$sql = $sql . $sql_asian;}
if($black) {$sql = $sql . $sql_black;}
if($hispanic) {$sql = $sql . $sql_hispanic;}
if($eeurope) {$sql = $sql . $sql_eeurope;}
if($mideast) {$sql = $sql . $sql_mideast;}
if($indian) {$sql = $sql . $sql_indian;}
if($white) {$sql = $sql . $sql_white;}


//audition
//if($mononly) {$sql = $sql . $sql_mononly;}

//SHOULD NOT WORK WITH NO AUDITION

//needed to get the day variable 2/27/16, should fix this!!!
if($day && $audition_yes_no == "Y") {$sql = $sql . $sql_day;}

//if($time  && $audition_yes_no == "Y") {$sql = $sql . $sql_time;}
//if($type  && $audition_yes_no == "Y") {$sql = $sql . $sql_type;}
//if($standby  && $audition_yes_no == "Y") {$sql = $sql . $sql_standby;}

//done with $sql strings

//echo "$hour, $hour_time<br>";

//echo "<BR>$hour_time, $hour<BR>";

//echo "TAKE OUT STRING AND sched11.hour_time<BR>";

//if($hour_time == $hour)
if($hour)
{$sql_B = " AND sched11.hour_time = '$hour' ORDER BY sched11.order_by_num";}

//standby
if($type == "SB")
{$sql_B = " AND sched11.type = '$type' ORDER BY sched11.order_by_num ASC";}

//singers
if($type == "S")
{$sql_B = " AND sched11.type = '$type' ORDER BY sched11.order_by_num";}

//dancers
else if($type == "D")
{$sql_B = " AND sched11.type = '$type' ORDER BY sched11.order_by_num";}

//non-singers
else if($type == "NS")
{$sql_B = " AND sched11.type = '$type' ORDER BY sched11.order_by_num";}


$sql = $sql . $sql_B;

//FINISHED QUERY!!!!!
//echo "$sql<BR>";


//done with $sql strings

//execute SQL query and get result

$sql_result = mysql_query($sql,$connection) or die("<BR>Couldn't execute Auditioning Actors query.");

//echo "HELLO AGAIN<BR>";
//echo "$sql_result<BR>";


/* get count of records ------------------------------------------*/
$sql_countall = "SELECT COUNT(*) FROM actor11";

//resulting count
$sql_countresult = mysql_query($sql_countall,$connection) or die("Couldn't execute query.");

//assign variable to count result
$count1 = mysql_result($sql_countresult,0);




//if nothing is set, select one thing
if(!$apprentice && !$intern && !$set_design && !$lights && !$costume && !$stagem && !$box_office && !$props
    && !$ballet && !$mus_thea && !$ballroom && !$tap && !$swing && !$jazz && !$banjo 
    && !$drums && !$perc && !$trombone && !$cello && !$flute && !$piano 
    && !$trumpet && !$clarinet && !$guitar && !$sax && !$violin    
    && !$shakes && !$cabaret && !$improv && !$mime && !$standup && !$acrobatics
    && !$juggling && !$puppetry && !$asl && !$painting && !$combat && !$gender && !$vocal && !$mononly
    && !$height && !$weight && !$eye && !$hair && !$age_range && !$nativeam && !$asian && !$white 
    && !$black && !$hispanic && !$eeurope && !$mideast && !$indian && !$under21
    && !audition_yes_no && !day && !type
    ) 
{
	echo "<p align = \"center\">Please make at least one selection from the Advanced Actor Search Menu<BR>";
    echo "<href = \"advanced_actor_search.php\">Go back to the Advanced Menu and try again.</a><p>;";
	exit();
};

echo "

<P align = \"center\">Please note: when you select a profile to review, it will open in a new window</p>

<table cellspacing=5 cellpadding=5 align = \"center\">
<tr>
<td align=\"center\">
<H2 align = \"center\">Actors That Did Get An Audition</H2>
";

//audition types
//if($mononly == 'N') {echo "Singing Audition, ";}
//elseif($mononly == 'Y') {echo "Monologue Only, ";}
//elseif($mononly == 'D') {echo "Dancer Audition, ";}



echo "
<a href=\"advanced_actor_search.php\">Back to Advanced Search Menu</a><BR>
";

if($apprentice) {echo "Apprentice($apprentice), ";}
if($intern) {echo "Intern($intern), ";}
if($set_design) {echo "Set Design($set_design), ";}
if($lights) {echo "Lights($lights), ";}
if($costume) {echo "Costumes($costume), ";}
if($stagem) {echo "Stage Management($stagem), ";}
if($box_office) {echo "Box Office($box_office), ";}
if($props) {echo "Props($props), ";}
//dance categories 1/1/2014
if($ballet) {echo "Ballet($ballet yrs), ";}
if($mus_thea) {echo "Musical Theatre($mus_thea yrs), ";}
if($ballroom) {echo "Ballroom($ballroom yrs), ";}
if($tap) {echo "Tap($tap yrs), ";}
if($swing) {echo "Swing($swing yrs), ";}
if($jazz) {echo "Jazz($jazz yrs), ";}
//instruments
if($banjo) {echo "Banjo($banjo yrs), ";}
if($drums) {echo "Drums($drums yrs), ";}
if($perc) {echo "Perc($perc yrs), ";}
if ($trombone) {echo "Trombone($trombone yrs), ";}
if($cello) {echo "Cello($cello yrs), ";}
if($flute) {echo "Flute($flute yrs), ";}
if($piano) {echo "Piano($piano yrs), ";}
if($trumpet) {echo "Trumpet($trumpet yrs), ";}
if($clarinet) {echo "Clarinet($clarinet yrs), ";}
if($guitar) {echo "Guitar($guitar yrs), ";}
if($sax) {echo "Sax($sax yrs), ";}
if($violin) {echo "Violin($violin yrs), ";}
//other skills
if($shakes) {echo "Shakespeare, ";}
if($cabaret) {echo "Cabaret, ";}
if($improv) {echo "Improv, ";}
if($mime) {echo "Mime, ";}
if($standup) {echo "Standup, ";}
if($acrobatics) {echo "Acrobatics, ";}
if($juggling) {echo "Juggling, ";}
if($puppetry) {echo "Puppetry, ";}
if($asl) {echo "ASL, ";}
if($painting) {echo "Painting, ";}
if($combat) {echo "Combat, ";}

if($vocal == 'S') {echo "Vocal(Soprano), ";}
elseif($vocal == 'MS') {echo "Vocal(Mezzo Soprano), ";}
elseif($vocal == 'A') {echo "Vocal(Alto), ";}
elseif($vocal == 'T') {echo "Vocal(Tenor), ";}
elseif($vocal == 'B') {echo "Vocal(Baritone), ";}
elseif($vocal == 'BR') {echo "Vocal(Bass-Baritione), ";}

//physical
if($gender == 'M') {echo "Male, ";}
elseif($gender == 'F') {echo "Female, ";}

//audition types
//if($mononly == 'N') {echo "Singing Audition, ";}
//elseif($mononly == 'Y') {echo "Monologue Only, ";}
//elseif($mononly == 'D') {echo "Dancer Audition, ";}

//if($audition_yes_no == 'Y'){echo ", ";}

//audition types with type used with sched11
if($type == 'S') {echo "Singing Audition, ";}
elseif($type == 'NS') {echo "Monologue Only, ";}
elseif($type == 'D') {echo "Dancer Audition, ";}
elseif($type == 'SB') {echo "Standby Audition, ";}

//audition day
if($audition_yes_no == "Y")
{ 
if($day == 'Fri') {echo "Friday, ";}
elseif($day == 'Sat') {echo "Saturday, ";}
elseif($day == 'Sun') {echo "Sunday, ";}

//audition hour
if($hour == '10') {echo "10am,";}
elseif($hour == '11') {echo "11am, ";}
elseif($hour == '12') {echo "12 Noon, ";}
elseif($hour == '1') {echo "1pm, ";}
elseif($hour == '2') {echo "2pm, ";}
elseif($hour == '3') {echo "3pm, ";}
elseif($hour == '4') {echo "4pm, ";}
elseif($hour == '5') {echo "5pm, ";}
}


//ROLE TYPES
if($nativeam) {echo "Native American, ";}
if($asian) {echo "Asian, ";}
if($black) {echo "African American, ";}
if($hispanic) {echo "Hispanic, ";}
if($eeurope) {echo "Eastern European, ";}
if($mideast) {echo "Middle Eastern, ";}
if($indian) {echo "Indian, ";}
if($white) {echo "White, ";}





/*new code below 8/10/13*/
echo "

</td>
	</tr>
	</table>
";
//start new table

echo "

    <table width = \"45%\" border=\"0\" align=\"center\">
    <tr>
        <td align=\"left\"><B>Pix</B></td>
        <td align=\"left\"><B>Name</B></td>
        <td align=\"left\"><B>Day/Time</B></td>
        
        
    </tr>
";


$count = 0;
//execute SQL query and get result
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute input query.");

//get results
	while($row = mysql_fetch_array($sql_result) ) {
	$actor_uid = $row["actor_uid"];
	$lastname = stripslashes($row["lastname"]);
	$firstname = stripslashes($row["firstname"]);
	$midname = stripslashes($row["midname"]);
	$pix_link = $row["pix_link"];
	$set_design = $row["set_design"];
	$lights = $row["lights"];
	$costumes = $row["costume"];
	$stagem = $row["stagem"];
	$box_office = $row["box_office"];
	$props = $row["props"];
//dance    
    $ballet = $row["ballet"];
    $mus_thea = $row["mus_thea"];
    $ballroom = $row["ballroom"];
    $tap = $row["tap"];
    $swing = $row["swing"];
    $jazz = $row["jazz"];
//instruments
    $banjo = $row["banjo"];
    $drums = $row["drums"];
    $perc = $row["perc"];
    $trombone = $row["trombone"];
    $cello = $row["cello"];
    $flute = $row["flute"];
    $piano = $row["piano"];
    $trumpet = $row["trumpet"];
    $clarinet = $row["clarinet"];
    $guitar = $row["guitar"];
    $sax = $row["sax"];
    $violin = $row["violin"];
//others skills
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
//physical
    $gender = $row["gender"];

    $nativeam = $row["nativeam"];
    $asian = $row["asian"];
    $black = $row["black"];
    $hispanic = $row["hispanic"];
    $eeurope = $row["eeurope"];
    $mideast = $row["mideast"];
    $indian = $row["indian"];
    $white = $row["white"];

//audition
    //$mononly = $row["mononly"];    echo "<BR>mononly, LINE 559: $mononly</BR>";
    $type = $row["type"];          //echo "$<BR>type $type<BR>";
    $time = $row["time"];          //echo "$<BR>time $time<BR>";
    

    $test_firstzero = substr($time, 0,1);
    //echo "First #: $test_firstzero <BR>";

//times from 1 - 9. IF  hour = substr($time), echo
if($type != "SB" && $test_firstzero == 0)     
    {
//    $time = substr($time, 1,4);        //echo"<BR>$time<BR>";
    $hour_time = substr($time, 0,1);   //echo "$hour_time<BR>";
//    echo "<B>$time<BR>"; 
    }

    
//times from 10 - 12. IF  hour = substr($time), echo    
if($type != "SB" && $test_firstzero == 1) 
    {
 //   $time = substr($time, 0,5);             //echo"$hour_time";
    $hour_time = substr($time, 0,2);        
//    echo "<B>$time<BR>"; 
    }            

    
    $day = $row["day"];             //echo "$day";
    $standby = $row["standby"];     //echo "$standby";

	$count++;

    
	echo " 
        
	<tr>";


    
    
    echo "    
	<td align=\"left\"><IMG width=\"65px\" SRC=\"ActorPix/$pix_link\"></td>
            <td align =\"left\"><b>$lastname, $firstname $midname</b></td>
            <td align =\"left\"><b>$day, 
            ";                
                
    $test_firstzero = substr($time, 0,1);
    //echo "First #: $test_firstzero <BR>";

//times from 1 - 9. IF  hour = substr($time), echo
if($type != "SB" && $test_firstzero == 0)     
    {
    $time = substr($time, 1,4);        //echo"<BR>$time<BR>";
    $hour_time = substr($time, 0,1);   //echo "<BR>$hour_time<BR>";
    echo "<B>$time<BR>"; 
    }

    
//times from 10 - 12. IF  hour = substr($time), echo    
if($type != "SB" && $test_firstzero == 1) 
    {
    $time = substr($time, 0,5);             //echo"<BR>$time<BR>";
    $hour_time = substr($time, 0,2);        //echo "<BR>$hour_time<BR>";
    echo "<B>$time<BR>"; 
    }            
            
if($type == "SB") 
    {
    echo "Standby: $standby";  
    }        
            
echo "
            
    <form name=\"form1\" method=\"post\" action=\"actor_searchlastname1.php\" target=\"myNewWin\" >
    <input type=\"hidden\" name=\"sel_record\" value=\"$actor_uid\">
    <input type=\"submit\" value=\"Select Profile\" name=\"submit\" onClick=\"sendme()\">
    </form>
                        
            </td>
			
			
<!-- 11/3/13 change code to have selection button under name
<td align =\"left\">			
<form name=\"form1\" method=\"post\" action=\"actor_searchlastname1.php\" target=\"myNewWin\" >
<input type=\"hidden\" name=\"sel_record\" value=\"$actor_uid\">
<input type=\"submit\" value=\"Select Profile\" name=\"submit\" onClick=\"sendme()\">
</form>
</td>
-->	
		  </tr>

";

	
	}
	
echo "
</table>
";
    }

	if(!$count) 
    {
    echo "<p align = \"center\">If No Match Found, please modify your search selections.</p>";
	}
	
    else 
    {
	echo "
<HR>
	<p align = \"center\">Total Number of Records: $count<BR>
    
    </p>";	
	}

	echo "
</BODY>
</HTML>
";



// beginning of the advanced search for NOAA actors ----------------------------------------------------------------/

$audition_yes_no = $_POST['audition_yes_no']; 
if ($audition_yes_no == "N")
{
/*-------------------------------------------------*/    
    //ACTORS THAT DID NOT GET AN AUDITION
//apprentice intern, adding dance, etc 1/1/2014
//new query for AR's??

$apprentice = $_POST['apprentice']; 
$intern = $_POST['intern'];
$set_design = $_POST['set_design'];
$lights = $_POST['lights'];
$costume = $_POST['costume'];
$stagem = $_POST['stagem'];
$box_office = $_POST['box_office'];
$props = $_POST['props'];

//dance
$ballet = $_POST['ballet'];
$mus_thea = $_POST['mus_thea'];
$ballroom = $_POST['ballroom'];
$tap = $_POST['tap'];
$swing = $_POST['swing'];
$jazz = $_POST['jazz'];

//instruments
$banjo = $_POST['banjo'];
$drums = $_POST['drums'];
$perc = $_POST['perc'];
$trombone = $_POST['trombone'];
$cello = $_POST['cello'];
$flute = $_POST['flute'];
$piano = $_POST['piano'];
$trumpet = $_POST['trumpet'];
$clarinet = $_POST['clarinet'];
$guitar = $_POST['guitar'];
$sax = $_POST['sax'];
$violin = $_POST['violin'];

//other skills
$acrobatics = $_POST['acrobatics'];
$juggling = $_POST['juggling'];
$puppetry = $_POST['puppetry'];
$asl = $_POST['asl'];
$painting = $_POST['painting'];
$combat = $_POST['combat'];
$shakes = $_POST['shakes'];
$cabaret = $_POST['cabaret'];
$improv = $_POST['improv'];
$mime = $_POST['mime'];
$standup = $_POST['standup'];
$vocal =  $_POST['vocal']; 

//physical
$gender = $_POST['gender'];
$age_range = $_POST['age_range'];
$ht = $_POST['ht'];


//roles
$nativeam = $_POST['nativeam'];
$asian = $_POST['asian'];
$black = $_POST['black'];
$hispanic = $_POST['hispanic'];
$eeurope = $_POST['eeurope'];
$mideast = $_POST['mideast'];
$indian = $_POST['indian']; 
$white = $_POST['white'];


//HEIGHT 1                                                                      
// Actors Height: feet, inches 
$feet = $_POST['feet'];             //echo"<BR>Feet: $feet</BR>";     
$inches = $_POST['inches'];         //echo"<BR>Inches: $inches</BR>";     

$new_ht = ($feet * 12) + $inches;   //echo "<BR>Height: $new_ht</BR>";

                                    //echo "<BR>new_ht: $new_ht</BR>";

//HEIGHT 2                                                                      
// Actors Height: feet, inches 
//$feet2 = $_POST['feet2'];             //echo"<BR>Feet2: $feet2</BR>";     
//$inches2 = $_POST['inches2'];         //echo"<BR>Inches2: $inches2</BR>";                                                 

//$new_ht2 = ($feet2 * 12) + $inches;   //echo "<BR>new_ht2: $new_ht2</BR>";
//$ht2 = $new_ht2;                      //echo "<BR>New Height2: $new_ht2</BR>";





//audition info
$mononly = $_POST['mononly'];   

//offset and limits
$offset_start = $_POST['offset_start'];     
$num_of_results = $_POST['num_of_results']; 


//availfor
$datefrom_month = $_POST['datefrom_month'];   //echo "$datefrom_month<BR>";
$datefrom_day = $_POST['datefrom_day'];       //echo "$datefrom_day<BR>";  
$datefrom_year = $_POST['datefrom_year'];     //echo "$datefrom_year<BR>";

//availto
$dateto_month = $_POST['dateto_month'];       //echo "$dateto_month<BR>";   
$dateto_day = $_POST['dateto_day'];           //echo "$dateto_day<BR>";
$dateto_year = $_POST['dateto_year'];         //echo "$dateto_year<BR>";       

//parse availto, availfrom dates
$availfor = $datefrom_year . "-" . $datefrom_month . "-" . $datefrom_day;   

//parse availto, availto dates
$availto = $dateto_year . "-" . $dateto_month . "-" .  $dateto_day;


//include("session.inc");

echo "

<HTML>
<HEAD>
<TITLE>StrawHat Advanced Actor Search</TITLE>
<link rel=\"stylesheet\" href=\"/styles/members.css\" type=\"text/css\">
";

include("open_window.inc");

echo "
</HEAD>
<BODY BACKGROUND=\"../../graphics03/Bk10a.GIF\"><script src=\"navbar.js\"></script>
";

//create connection
include("../../Comm/connect.inc");

/*create sql statement for AR actors*/
$sqlA ="SELECT * 
FROM actor11, audition11, rec11, skills11, physical11
WHERE actor_uid = audition_uid
AND audition_uid = skills_uid
AND skills_uid = actor_ID
AND actor_ID = phys_uid
AND item = \"AR\"
";

                                       
//$sqlRECTEST ="SELECT *
//FROM rec11
//WHERE actor_ID = \"actor_uid\"
//";



/*...selecting actors who HAVE an audition
$sqlAA ="SELECT skills_uid, actor_uid, audition_uid, actor_ID, phys_uid, pix_link, sched_uid,
lastname, firstname, midname,
intern, apprentice,
set_design, lights, costume, stagem, box_office, props, item,
ballet, mus_thea, ballroom, tap, swing, jazz,
banjo, drums, perc, trombone, cello, flute, piano, trumpet, clarinet, guitar, sax, violin,
acrobatics, juggling, puppetry, asl, painting, combat, shakes, cabaret, improv, mime, standup, vocal,
gender, nativeam, asian, white, black, hispanic, eeurope, mideast, indian,
day, time, type, time, standby
*/

/* for reference, difference with AR ACTORS
$sqlAA ="SELECT *
FROM actor11, skills11, audition11, rec11, physical11, sched11
WHERE actor_uid = audition_uid
AND audition_uid = skills_uid
AND skills_uid = actor_ID
AND actor_ID = phys_uid
AND phys_uid = sched_uid
AND item = \"AA\"
";
*/

//audition mononly
$sql_mononly = "AND audition11.mononly = \"$mononly\" ";
$sql_app = "AND audition11.apprentice = \"$apprentice\" ";
$sql_intern = "AND audition11.intern = \"$intern\" ";

//skills11
$sql_set_design = "AND skills11.set_design >= \"$set_design\" ";
$sql_lights = "AND skills11.lights >= \"$lights\" ";
$sql_costume = "AND skills11.costume >= \"$costume\" "; 
$sql_stagem = "AND skills11.stagem >= \"$stagem\" ";
$sql_box_office = "AND skills11.box_office >= \"$box_office\" ";
$sql_props = "AND skills11.props >= \"$props\" ";

//skills11/dance
$sql_ballet = "AND skills11.ballet >= \"$ballet\" ";
$sql_mus_thea = "AND skills11.mus_thea >= \"$mus_thea\" ";
$sql_ballroom = "AND skills11.ballroom >= \"$ballroom\" ";
$sql_swing = "AND skills11.swing >= \"$swing\" ";
$sql_jazz = "AND skills11.jazz >= \"$jazz\" ";

//skills11/instruments
$sql_banjo = "AND skills11.banjo >= \"$banjo\" ";
$sql_drums = "AND skills11.drums >= \"$drums\" ";
$sql_perc = "AND skills11.perc >= \"$perc\" ";
$sql_trombone = "AND skills11.trombone >= \"$trombone\" ";
$sql_cello = "AND skills11.cello >= \"$cello\" ";
$sql_flute = "AND skills11.flute >= \"$flute\" ";
$sql_piano = "AND skills11.piano >= \"$piano\" ";
$sql_trumpet = "AND skills11.trumpet >= \"$trumpet\" ";
$sql_clarinet = "AND skills11.clarinet >= \"$clarinet\" ";
$sql_guitar = "AND skills11.guitar >= \"$guitar\" ";
$sql_sax = "AND skills11.sax >= \"$sax\" ";
$sql_violin = "AND skills11.violin >= \"$violin\" ";

//other skills
$sql_acrobatics = "AND skills11.acrobatics = \"$acrobatics\" ";
$sql_juggling = "AND skills11.juggling = \"$juggling\" ";
$sql_puppetry = "AND skills11.puppetry = \"$puppetry\" ";
$sql_asl = "AND skills11.asl = \"$asl\" ";
$sql_painting = "AND skills11.painting = \"$painting\" ";
$sql_combat = "AND skills11.combat = \"$combat\" ";
$sql_shakes = "AND skills11.shakes = \"$shakes\" ";
$sql_cabaret = "AND skills11.cabaret = \"$cabaret\" ";
$sql_improv = "AND skills11.improv = \"$improv\" ";
$sql_mime = "AND skills11.mime = \"$mime\" ";
$sql_standup = "AND skills11.standup = \"$standup\" ";
$sql_vocal = "AND skills11.vocal = \"$vocal\" ";

//physical
$sql_gender = "AND physical11.gender = \"$gender\" ";
$sql_nativeam = "AND physical11.nativeam = \"$nativeam\" ";
$sql_asian = "AND physical11.asian = \"$asian\" ";
$sql_black = "AND physical11.black = \"$black\" ";
$sql_hispanic = "AND physical11.hispanic = \"$hispanic\" ";
$sql_eeurope = "AND physical11.eeurope = \"$eeurope\" ";
$sql_mideast = "AND physical11.mideast = \"$mideast\" ";
$sql_indian = "AND physical11.indian = \"$indian\" ";
$sql_white = "AND physical11.white = \"$white\" ";

//physical11/age_range
$sql_age_range = "AND physical11.age_range = \"$age_range\" ";

//height
$sql_new_ht = "AND physical11.ht = \"$new_ht\" ";

// IF THERE WAS A HEIGHT RANGE, YOU WOULD ESTABLISH 
//$sql_new_ht2 = "AND physical11.ht <= \"$new_ht2\" ";



//height - feet, inches
//$sql_feet = "AND physical11.feet = \"$feet\" ";
//$sql_inches = "AND physical11.inches = \"$inches\" ";
$sql_ht = "AND physical11.ht = \"$ht\" ";     //echo "$ht";

//Height variables $new_ht, $new_ht2
/*
if($new_ht > 0){
$sql_new_ht = "AND new_ht <= \"$new_ht\" ";}            

if($new_ht2 > 0){
$sql_new_ht2 = "AND new_ht2 >= \"$new_ht2\" ";}         
*/

if($availfor > 0){
$sql_availfor = "AND availfor <= \"$availfor\" ";}

if($availto > 0){
$sql_availto = "AND availto >= \"$availto\" ";}


//variables for offset and limit
$num_of_results;
$offset_start;

//Ending clause for for offest and num of results
if($offset_start > "0" || $num_of_results > "0" ){
$sql_B = "ORDER BY actor11.lastname ASC LIMIT $num_of_results OFFSET $offset_start";}


//Ending clause for no offset or num of results
elseif($offset_start == '0' && $num_of_results == '0' ){
$sql_B = "ORDER BY actor11.lastname ASC";}                          

//REMEMBVER, == EQUALS, = IS AN ASSIGNMENT!!!



//put strings together
//sqlA is the original search with AR; sqlAA is the new with AA


//if($audition_yes_no == "N")
//{
$sql = $sqlA;
//}
//else {$sql = $sqlAA;}

if($mononly) {$sql = $sql . $sql_mononly;}

if($apprentice) {$sql = $sql . $sql_app;}
if($intern) {$sql = $sql . $sql_intern;}
if($set_design > 0){$sql = $sql . $sql_set_design;}
if($lights > 0) {$sql = $sql . $sql_lights;}
if($costume > 0) {$sql = $sql . $sql_costume;}
if($stagem > 0) {$sql = $sql . $sql_stagem;}
if($box_office > 0) {$sql = $sql . $sql_box_office;}
if($props > 0) {$sql = $sql . $sql_props;}
//dance strings
if($ballet > 0) {$sql = $sql . $sql_ballet;}
if($mus_thea > 0) {$sql = $sql . $sql_mus_thea;}
if($ballroom > 0) {$sql = $sql . $sql_ballroom;}
if($tap > 0) {$sql = $sql . $sql_tap;}
if($swing > 0) {$sql = $sql . $sql_swing;}
if($jazz > 0) {$sql = $sql . $sql_jazz;}
//instruments
if($banjo > 0) {$sql = $sql . $sql_banjo;}
if($drums > 0) {$sql = $sql . $sql_drums;}
if($perc> 0) {$sql = $sql . $sql_perc;}
if($trombone > 0) {$sql = $sql . $sql_trombone;}
if($cello > 0) {$sql = $sql . $sql_cello;}
if($flute > 0) {$sql = $sql . $sql_flute;}
if($piano > 0) {$sql = $sql . $sql_piano;}
if($trumpet > 0) {$sql = $sql . $sql_trumpet;}
if($clarinet > 0) {$sql = $sql . $sql_clarinet;}
if($guitar > 0) {$sql = $sql . $sql_guitar;}
if($sax > 0) {$sql = $sql . $sql_sax;}
if($violin > 0) {$sql = $sql . $sql_violin;}
//other skills
if($acrobatics) {$sql = $sql . $sql_acrobatics;}
if($juggling) {$sql = $sql . $sql_juggling;}
if($puppetry) {$sql = $sql . $sql_puppetry;}
if($asl) {$sql = $sql . $sql_asl;}
if($painting) {$sql = $sql . $sql_painting;}
if($combat) {$sql = $sql . $sql_combat;}
if($shakes) {$sql = $sql . $sql_shakes;}
if($cabaret) {$sql = $sql . $sql_cabaret;}
if($improv) {$sql = $sql . $sql_improv;}
if($mime) {$sql = $sql . $sql_mime;}
if($standup) {$sql = $sql . $sql_standup;}
if($vocal) {$sql = $sql . $sql_vocal;}

//physical 
if($new_ht) {$sql = $sql . $sql_new_ht;}    
if($new_ht2) {$sql = $sql . $sql_new_ht2;}  

if($age_range) {$sql = $sql . $sql_age_range;}  

//availfor, availto
if($availfor) {$sql = $sql . $sql_availfor;} 
if($availto) {$sql = $sql . $sql_availto;}      


if($gender) {$sql = $sql . $sql_gender;}
if($nativeam) {$sql = $sql . $sql_nativeam;}
if($asian) {$sql = $sql . $sql_asian;}
if($black) {$sql = $sql . $sql_black;}
if($hispanic) {$sql = $sql . $sql_hispanic;}
if($eeurope) {$sql = $sql . $sql_eeurope;}
if($mideast) {$sql = $sql . $sql_mideast;}
if($indian) {$sql = $sql . $sql_indian;}
if($white) {$sql = $sql . $sql_white;}


// put the sql strings together
$sql = $sql . $sql_B;

//sql statement
//USE THE STATEMENT BELOW
//echo "<BR>$sql</BR>";


//testing
//echo "LINE 938: $sql";
//done with $sql strings
//execute SQL query and get result
//echo "<BR>LINE 866:$sql<BR>";

$sql_result = mysql_query($sql,$connection) or die("<BR>Couldn't execute Actor, Dance query.");


/* TESTING
$sqlRECTEST ="SELECT *
FROM rec11
WHERE actor_ID = \"232\"
";

$sql_resultRECTEST = mysql_query($sqlRECTEST,$connection) or die("<BR>Couldn't execute Actor, Dance query.");
//END OF TESTING

//get results
    while($row = mysql_fetch_array($sql_resultRECTEST) ) {
        $rec_uid = $row["rec_ID"];
        $actor_ID = $row["actor_ID"];
        $amount = $row["amount"];
        $check_no = $row["check_no"];
        $item = $row["item"];
    }

    echo"$rec_uid, $actor_uid, $amount, $item, $check_no";
*/    
    
/* get count of records ------------------------------------------
$sql_countall = "SELECT COUNT(*) FROM actor11";

//resulting count
$sql_countresult = mysql_query($sql_countall,$connection) or die("Couldn't execute query.");

//assign variable to count result
$count1 = mysql_result($sql_countresult,0);

*/
//if nothing is set, select one thing
if(!$apprentice && !$intern && !$set_design && !$lights && !$costume && !$stagem && !$box_office && !$props
    && !$ballet && !$mus_thea && !$ballroom && !$tap && !$swing && !$jazz && !$banjo 
    && !$drums && !$perc && !$trombone && !$cello && !$flute && !$piano 
    && !$trumpet && !$clarinet && !$guitar && !$sax && !$violin    
    && !$shakes && !$cabaret && !$improv && !$mime && !$standup && !$acrobatics
    && !$juggling && !$puppetry && !$asl && !$painting && !$combat && !$gender && !$vocal && !$mononly
    && !$height && !$weight && !$eye && !$hair && !$age_range && !$nativeam && !$asian && !$white 
    && !$black && !$hispanic && !$eeurope && !$mideast && !$indian && !$under21
    && !audition_yes_no && !day && !type
    ) 
{
    echo "<p align = \"center\">Please make at least one selection from the Advanced Actor Search Menu<BR>";
    echo "<href = \"advanced_actor_search.php\">Go back to the Advanced Menu and try again.
    </a><p>;";
    exit();
};

echo "

<P align = \"center\">Please note: when you select a profile to review, it will open in a new window</p>

<table cellspacing=5 cellpadding=5 align = \"center\">
<tr>
<td align=\"center\">
<H2 align = \"center\">All Actors Search (Audition and Applied)</H2>
<a href=\"advanced_actor_search.php\">Back to Advanced Search Menu</a><BR>
";

//Limits
if($offset_start)   {echo "Offset ($offset_start),";}
if($num_of_results) {echo "Results ($num_of_results), ";}

if($apprentice) {echo "Apprentice, ";}
if($intern) {echo "Intern, ";}
if($set_design) {echo "Set Design ($set_design), ";}
if($lights) {echo "Lights($lights), ";}
if($costume) {echo "Costumes($costume), ";}
if($stagem) {echo "Stage Management($stagem), ";}
if($box_office) {echo "Box Office($box_office), ";}
if($props) {echo "Props($props), ";}

//dance categories 1/1/2014
if($ballet) {echo "Ballet($ballet yrs), ";}
if($mus_thea) {echo "Musical Theatre($mus_thea yrs), ";}
if($ballroom) {echo "Ballroom($ballroom yrs), ";}
if($tap) {echo "Tap($tap yrs), ";}
if($swing) {echo "Swing($swing yrs), ";}
if($jazz) {echo "Jazz($jazz yrs), ";}

//instruments
if($banjo) {echo "Banjo($banjo yrs), ";}
if($drums) {echo "Drums($drums yrs), ";}
if($perc) {echo "Perc($perc yrs), ";}
if ($trombone) {echo "Trombone($trombone yrs), ";}
if($cello) {echo "Cello($cello yrs), ";}
if($flute) {echo "Flute($flute yrs), ";}
if($piano) {echo "Piano($piano yrs), ";}
if($trumpet) {echo "Trumpet($trumpet yrs), ";}
if($clarinet) {echo "Clarinet($clarinet yrs), ";}
if($guitar) {echo "Guitar($guitar yrs), ";}
if($sax) {echo "Sax($sax yrs), ";}
if($violin) {echo "Violin($violin yrs), ";}

//other skills
if($shakes) {echo "Shakespeare, ";}
if($cabaret) {echo "Cabaret, ";}
if($improv) {echo "Improv, ";}
if($mime) {echo "Mime, ";}
if($standup) {echo "Standup, ";}
if($acrobatics) {echo "Acrobatics, ";}
if($juggling) {echo "Juggling, ";}
if($puppetry) {echo "Puppetry, ";}
if($asl) {echo "ASL($asl), ";}
if($painting) {echo "Painting, ";}
if($combat) {echo "Combat, ";}

//can't use this  for AR actos
if($vocal == 'S') {echo "Soprano,&nbsp";}
elseif($vocal == 'MS') {echo "Mezzo Soprano,&nbsp";}
elseif($vocal == 'A') {echo "Vocal(Alto),&nbsp";}
elseif($vocal == 'T') {echo "Vocal(Tenor),&nbsp";}
elseif($vocal == 'B') {echo "Vocal(Baritone),&nbsp";}
elseif($vocal == 'BR') {echo "Vocal(Bass Baritone),&nbsp";}

//physical
if($gender == 'M') {echo "&nbspMale,&nbsp";}
elseif($gender == 'F') {echo "&nbspFemale,&nbsp";}


//height - feet
//if($feet == '0') {echo "0";}
if($feet == '3') {echo "3',";}
if($feet == '4') {echo "4',";}
if($feet == '5') {echo "5',";}
if($feet == '6') {echo "6',";}
if($feet == '7') {echo "7',";}

//inches - inches
//if($inches == '0') {echo "0";}
if($inches == '1') {echo "1'',";}
if($inches == '2') {echo "2'',";}
if($inches == '3') {echo "3'',";}
if($inches == '4') {echo "4'',";}
if($inches == '5') {echo "5'',";}
if($inches == '6') {echo "6'',";}
if($inches == '7') {echo "7'',";}
if($inches == '8') {echo "8'',";}
if($inches == '9') {echo "9'',";}
if($inches == '10') {echo "10'',";}
if($inches == '11') {echo "11'',";}

//physical

//if($datefor_month) {echo "$dateto_month/$dateto_day/$dateto_year ";}

if($datefrom_month) {echo "&nbsp$datefrom_month/";}
if($datefrom_day) {echo "$datefrom_day/";}
if($datefrom_year) {echo "$datefrom_year";}
echo "&nbsp";
if($dateto_month) {echo "&nbsp$dateto_month/";}
if($dateto_day) {echo "$dateto_day/";}
if($dateto_year) {echo "$dateto_year,";}

//physical, age_range        
if($age_range == '16') {echo "Age Range (Under 16),&nbsp";}
elseif($age_range == '20') {echo "Age Range (16-20),&nbsp";}
elseif($age_range == '25') {echo "Age Range (21-25),&nbsp";}
elseif($age_range == '30') {echo "Age Range (26-30),&nbsp";}
elseif($age_range == '35') {echo "Age Range (31-35),&nbsp";}
elseif($age_range == '40') {echo "Age Range (36-40),&nbsp";}
elseif($age_range == '41') {echo "Age Range (Over 40),&nbsp";}



//audition mononly types
if($mononly == 'N') {echo "Singing Audition, ";}
if($mononly == 'Y') {echo "Monologue Only, ";}
if($mononly == 'D') {echo "Dancer Audition, ";}

//audition day
/*
if($day == 'Sat') {echo "Saturday, ";}
elseif($day == 'Sun') {echo "Sunday, ";}
elseif($day == 'Mon') {echo "Monday, ";}
*/
//
//audition hour
/*
if($hour == '10') {echo "10am, ";}
elseif($hour == '11') {echo "11am";}
elseif($hour == '12') {echo "12 Noon";}
elseif($hour == '1') {echo "1pm";}
elseif($hour == '2') {echo "2pm";}
elseif($hour == '3') {echo "3pm";}
elseif($hour == '4') {echo "4pm";}
elseif($hour == '5') {echo "5pm";}
*/

//ROLE TYPES
if($nativeam) {echo "Native American, ";}
if($asian) {echo "Asian, ";}
if($black) {echo "African American, ";}
if($hispanic) {echo "Hispanic, ";}
if($eeurope) {echo "Eastern European, ";}
if($mideast) {echo "Middle Eastern, ";}
if($indian) {echo "Indian, ";}
if($white) {echo "White ";}

echo "
</td>
</tr>
</table>
";

//start new table

echo "
    <table width = \"45%\" border=\"0\" align=\"center\">
    <tr>
        <td align=\"left\"><B>Pix</B></td>
        <td align=\"left\"><B>Name</B></td>
        <td align=\"left\"><B>Profile</B></td>
    </tr>
";


$count = 0;
//execute SQL query and get result
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute input query.");

//get results
    while($row = mysql_fetch_array($sql_result) ) {
    $actor_uid = $row["actor_uid"];
    $actor_ID = $row["actor_ID"];
    $rec_uid = $row["rec_uid"];
    $item = $row["item"];
    $amount = $row["amount"];
    $lastname = stripslashes($row["lastname"]);
    $firstname = stripslashes($row["firstname"]);
    $midname = stripslashes($row["midname"]);
    $pix_link = $row["pix_link"];
    $set_design = $row["set_design"];
    $lights = $row["lights"];
    $costumes = $row["costume"];
    $stagem = $row["stagem"];
    $box_office = $row["box_office"];
    $props = $row["props"];
//dance    
    $ballet = $row["ballet"];
    $mus_thea = $row["mus_thea"];
    $ballroom = $row["ballroom"];
    $tap = $row["tap"];
    $swing = $row["swing"];
    $jazz = $row["jazz"];
//instruments
    $banjo = $row["banjo"];
    $drums = $row["drums"];
    $perc = $row["perc"];
    $trombone = $row["trombone"];
    $cello = $row["cello"];
    $flute = $row["flute"];
    $piano = $row["piano"];
    $trumpet = $row["trumpet"];
    $clarinet = $row["clarinet"];
    $guitar = $row["guitar"];
    $sax = $row["sax"];
    $violin = $row["violin"];
//others skills
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

//physical
    $gender = $row["gender"];
    
    $nativeam = $row["nativeam"];
    $asian = $row["asian"];
    $black = $row["black"];
    $hispanic = $row["hispanic"];
    $eeurope = $row["eeurope"];
    $mideast = $row["mideast"];
    $indian = $row["indian"];
    $white = $row["white"];

//audition
    $mononly = $row["mononly"];

    $count++;

    echo " 
        
    <tr>
    <td align=\"left\">
    <IMG width=\"65px\" SRC=\"ActorPix/$pix_link\">
    </td>
            <td align =\"left\"><b>$lastname, $firstname $midname</b></td>
            <td align =\"left\">
            ";                
/* DON'T NEED THIS CODE FOR AR ACTORS   
$test_firstzero = substr($time, 0,1);
    
//times from 1 - 9. IF  hour = substr($time), echo    
if($type != "SB" && $test_firstzero == 0) {
    $time = substr($time, 1,4);
    $hour_time = substr($time, 0,1);
    echo "<B>$time, $hour_time<BR>"; }

//times from 10 - 12. IF  hour = substr($time), echo
if($type != "SB" && $test_firstzero == 1) {
    $time = substr($time, 0,5);
    $hour_time = substr($time, 0,2);
    echo "<B>$time, $hour_time<BR>"; }            
            
if($type == "SB") {
    echo "Standby: $standby";}          
*/            
echo "
            
    <form name=\"form1\" method=\"post\" action=\"actor_searchlastname1.php\" target=\"myNewWin\" >
    <input type=\"hidden\" name=\"sel_record\" value=\"$actor_uid\">
    <input type=\"submit\" value=\"Select Profile\" name=\"submit\" onClick=\"sendme()\">
    </form>
                        
    </td>
            
            
<!-- 11/3/13 change code to have selection button under name
<td align =\"left\">            
<form name=\"form1\" method=\"post\" action=\"actor_searchlastname1.php\" target=\"myNewWin\" >
<input type=\"hidden\" name=\"sel_record\" value=\"$actor_uid\">
<input type=\"submit\" value=\"Select Profile\" name=\"submit\" onClick=\"sendme()\">
</form>
</td>
-->

    
</tr>

";

    
}
    
echo "
</table>


";

//echo "$count";

    if(!$count) 
    {
    echo "<p align = \"center\">No Match Found, please modify your search selections</p>";
    }
    
    else {        
    echo "<HR>
    <p align = \"center\">Total Number of Records: $count</p>";    
    }
    
    echo "
</BODY>
</HTML>
"
;}
?> 
