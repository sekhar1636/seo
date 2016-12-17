<?php
//skills_modifyrecord3.php 2012
$skills_uid = $_POST['skills_uid'];

$vocal = $_POST['vocal'];
$ballet = $_POST['ballet'];
$mus_thea = $_POST['mus_thea'];
$ballroom = $_POST['ballroom'];
$tap = $_POST['tap'];
$swing = $_POST['swing'];
$jazz = $_POST['jazz'];

$perc = $_POST['perc'];
$sax = $_POST['sax'];
$banjo = $_POST['banjo'];
$piano = $_POST['piano'];
$drums = $_POST['drums'];
$cello = $_POST['cello'];
$clarinet = $_POST['clarinet'];
$trombone = $_POST['trombone'];
$trumpet = $_POST['trumpet'];
$flute = $_POST['flute'];
$violin = $_POST['violin'];
$guitar = $_POST['guitar'];

$set_design = $_POST['set_design'];
$lights = $_POST['lights'];
$costume = $_POST['costume'];
$stagem = $_POST['stagem'];
$box_office = $_POST['box_office'];
$props = $_POST['props'];

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
<h1>You have made these changes:</h1>
<FORM method = \"POST\" action = \"changes.php\">
<input type = \"hidden\" name = \"actor_uid\" value = \"$skills_uid\">



<table cellspacing=\"5\" cellpadding=\"5\">

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
	<td valign=top>Percussion: $perc, Sax: $sax, Banjo: $banjo, Piano: $piano, Drums: $drums,
		Cello: $cello, Clarinet: $clarinet, Trombone: $trombone, Trumpet: $trumpet, Flute: $flute,
		Violin: $violin, Guitar: $guitar</td>
	</tr>

	<tr>
	<td valign=top><strong>Other:</strong></td>
	<td valign=top>
";	
	if(isset($acrobatics)){
		echo "Acrobatics, ";
	}
	if(isset($juggling)){
		echo "Juggling, ";
	}	
	if(isset($puppetry)){
		echo "Puppetry, ";
	}
	if(isset($asl)){
		echo "American Sign Language, ";
	}
	if(isset($painting)){
		echo "Painting, ";
	}
	if(isset($combat)){
		echo "Stage Combat, ";
	}
	if(isset($shakes)){
		echo "Shakespeare, ";
	}
	if(isset($cabaret)){
		echo "Cabaret, ";
	}
	if(isset($improv)){
		echo "Improv, ";
	}
	if(isset($mime)){
		echo " Mime, ";
	}
	if(isset($standup)){
		echo "Standup";
	}
echo "	
	</td>
	<td valign=top><strong>Technical Skills: </strong></td>
	<td valign=top>Set Construction: $set_design, Lighting: $lights, Costumes: $costume, SM: $stagem,
		Box Office: $box_office, Props: $props</td>
	</tr>
	
</table>
<P><INPUT type=\"submit\" value =\"Done\">   
</FORM>
</BODY>
</HTML>
";
}
?>