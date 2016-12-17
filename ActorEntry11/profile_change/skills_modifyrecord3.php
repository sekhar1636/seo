<?php
//skills_modifyrecord3.php 2012

$skills_uid = $_POST['skills_uid'];
$acrobatics = $_POST['acrobatics'];
$asl = $_POST['asl'];
$ballet = $_POST['ballet'];
$ballroom = $_POST['ballroom'];
$banjo = $_POST['banjo'];
$bass = $_POST['bass'];
$box_office = $_POST['box_office'];
$cabaret = $_POST['cabaret'];
$cello = $_POST['cello'];
$clarinet = $_POST['clarinet'];
$combat = $_POST['combat'];
$costume = $_POST['costume'];
$drums = $_POST['drums'];
$flute = $_POST['flute'];
$guitar = $_POST['guitar'];
$improv = $_POST['improv'];
$jazz = $_POST['jazz'];
$juggling = $_POST['juggling'];
$lights = $_POST['lights'];
$mime = $_POST['mime'];
$mus_thea = $_POST['mus_thea'];
$painting = $_POST['painting'];
$perc = $_POST['perc'];
$piano = $_POST['piano'];
$props = $_POST['props'];
$puppetry = $_POST['puppetry'];
$sax = $_POST['sax'];
$set_design = $_POST['set_design'];
$shakes = $_POST['shakes'];
$stagem = $_POST['stagem'];
$standup = $_POST['standup'];
$swing = $_POST['swing'];
$tap = $_POST['tap'];
$trombone = $_POST['trombone'];
$trumpet = $_POST['trumpet'];
$violin = $_POST['violin'];
$vocal = $_POST['vocal'];

include("../../Comm/connect.inc");

/*parse values for selected checkboxes
supress error msg by using isset() to test is variable exists - 
variables from checkboxes are not forwarded unless checked -
assign to those not checked to avoid errors and notices
---------------------------------------------------------*/

if(!isset($acrobatics)) {
	$acrobatics = NULL;
}
if (!isset($asl)){
	$asl = NULL;
}
if(!isset($juggling)) {
	$juggling = NULL;
}
if(!isset($painting)) {
	$painting = NULL;
}
if(!isset($puppetry)) {
	$puppetry = NULL;
}
if(!isset($combat)) {
	$combat = NULL;
}

if(!isset($shakes)) {
	$shakes = NULL;
}

if(!isset($cabaret)) {
	$cabaret = NULL;
}

if(!isset($improv)) {
	$improv = NULL;
}

if(!isset($mime)) {
	$mime = NULL;
}

if(!isset($standup)) {
	$standup = NULL;
}

//SQL statement to update record
$sql = "UPDATE skills11 SET skills_uid = \"$skills_uid\",
vocal=\"$vocal\",
ballet=\"$ballet\",
mus_thea=\"$mus_thea\",
ballroom=\"$ballroom\",
tap=\"$tap\",
swing=\"$swing\",
jazz=\"$jazz\",
perc=\"$perc\",
sax=\"$sax\",
banjo=\"$banjo\",
bass=\"$bass\",
piano=\"$piano\",
drums=\"$drums\",
cello=\"$cello\",
clarinet=\"$clarinet\",
trombone=\"$trombone\",
trumpet=\"$trumpet\",
flute=\"$flute\",
violin=\"$violin\",
guitar=\"$guitar\",
set_design=\"$set_design\",
lights=\"$lights\",
costume=\"$costume\",
stagem=\"$stagem\",
box_office=\"$box_office\",
props=\"$props\",
acrobatics=\"$acrobatics\",
juggling=\"$juggling\",
puppetry=\"$puppetry\",
asl = \"$asl\",
painting=\"$painting\",
combat=\"$combat\",
shakes = \"$shakes\",
cabaret = \"$cabaret\",
improv = \"$improv\",
mime = \"$mime\",
standup = \"$standup\"

WHERE skills_uid = \"$skills_uid\"
";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


if (!$sql_result) {
	echo "<P>Couldn't update record!</P>";
	} else {				


echo "
<HTML>
<HEAD>
<TITLE>StrawHat Updated Skills Record</TITLE>
<link rel=\"stylesheet\" href=\"members.css\" type=\"text/css\">
</HEAD>
<BODY>
";

include("banner.inc");

//<input type = \"hidden\" name = \"sel_record\" value = \"$skills_uid\">
//old code for using hidden variable
	
echo "	
<h1 align = \"center\">You have made these changes:</h1>
<FORM method = \"POST\" action = \"changes.php\">
<input type = \"hidden\" name = \"actor_uid\" value = \"$skills_uid\">



<table cellspacing=\"5\" cellpadding=\"5\" width = \"65%\" align = \"center\" border = \"1\">

	<tr>
	<td valign=top><strong>Vocal</strong></td>
	<td valign=top>
";
	switch($vocal) {
	case "":
		echo ("Not Indicated");
		break;	
	case "S":
		echo("Soprano");
		break;
	case "A":
		echo("Alto");
		break;
	case "MS":
		echo("Mezzo Soprano");
		break;
	case "T":
		echo("Tenor");
		break;
	case "B":
		echo("Baritone");
		break;
	default:
		echo("Bass-Baritone");
	}
echo "	

	</td>
	<td valign=top></td>
	<td valign=top></td>
	</tr>

	<tr>
	<td valign=top><strong>Dance:</strong></td>
	<td valign=top>Ballet: $ballet, Musical Thea: $mus_thea, Ballroom: $ballroom, Tap: $tap,
		Swing: $swing, Jazz: $jazz</td>
	<td valign=top><strong>Instruments:</strong></td>
	<td valign=top>Banjo: $banjo, Bass: $bass, Cello: $cello, Clarinet: $clarinet, Drums: $drums, Flute: $flute, Guitar: $guitar,           Percussion: $perc, Piano: $piano, Sax: $sax, Trombone: $trombone, Trumpet: $trumpet, Violin: $violin, </td>
	</tr>

	<tr>
	<td valign=top><strong>Other:</strong></td>
	<td valign=top>
";	
    if(isset($acrobatics)){
        echo "Acrobatics, ";
    }
    if(isset($asl)){
        echo "American Sign Language, ";
    }
    if(isset($cabaret)){
        echo "Cabaret, ";
    }
    if(isset($combat)){
        echo "Stage Combat, ";
    }
    if(isset($improv)){
        echo "Improv, ";
    }
	if(isset($juggling)){
		echo "Juggling, ";
	}	
    if(isset($mime)){
        echo " Mime, ";
    }
    if(isset($painting)){
        echo "Painting, ";
    }
	if(isset($puppetry)){
		echo "Puppetry, ";
	}
	if(isset($shakes)){
		echo "Shakespeare, ";
	}
	if(isset($standup)){
		echo "Standup";
	}
echo "	
	</td>
	<td valign=top><strong>Technical Skills: </strong></td>
	<td valign=top>
    
    Box Office: $box_office, 
    Costumes: $costume,     
    Lighting: $lights, 
    Props: $props,
    Set Construction: $set_design, 
    SM: $stagem,
	
    </td>
	</tr>
	
</table>
<P align = \"center\"><INPUT type=\"submit\" value =\"Done\">   
</FORM>
</BODY>
</HTML>
";
}
?>