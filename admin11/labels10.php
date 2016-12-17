<?php
//include("session.inc");
?>

<?php
//local LABELS program to update sched11


echo "

<HTML>
<HEAD>
<TITLE>StrawHat 2012 Labels Program</TITLE>
<link rel=\"stylesheet\" href=\"Members/members.css\" type=\"text/css\">
</HEAD>
<BODY>
";

//create connection
include("../Comm/connect.inc");


//---------------------------------create sql statement
$sql ="SELECT actor_uid, skills_uid, audition_uid, actor_ID,
lastname, firstname, midname,
intern, apprentice, availfor, availto,
set_design, lights, costume, stagem, box_office, props,
ballet, jazz,
perc, sax, banjo, piano, drums, cello, clarinet, trombone, flute, trumpet,
violin, guitar,
item
FROM actor11, skills11, audition11, rec11
WHERE actor_uid = audition_uid
AND audition_uid = skills_uid
AND skills_uid = actor_ID
AND item = \"AA\"
";

//execute SQL query and get result

$sql_result = mysql_query($sql, $connection) or die("Couldn't execute query.");
//set counter
$count = 0;

//get each AA, test value and update label

	while($row = mysql_fetch_array($sql_result) ) {
	$actor_uid = $row["actor_uid"];
	$lastname = $row["lastname"];
	$firstname = $row["firstname"];
	$apprentice = $row["apprentice"];
	$intern = $row["intern"];
	$availfor = $row["availfor"];
	$availto = $row["availto"];
	$set_design = $row["set_design"];
	$lights = $row["lights"];
	$box_office = $row["box_office"];
	$stagem = $row["stagem"];
	$costume = $row["costume"];
	$props = $row["props"];
	$ballet = $row["ballet"];
	$jazz = $row["jazz"];
	$perc = $row["perc"];
	$sax = $row["sax"];
	$banjo = $row["banjo"];
	$piano = $row["piano"];
	$drums = $row["drums"];
	$cello = $row["cello"];
	$clarinet = $row["clarinet"];
	$trombone = $row["trombone"];
	$flute = $row["flute"];
	$trumpet = $row["trumpet"];
	$violin = $row["violin"];
	$guitar = $row["guitar"];

//establish string for label update
$label = "";

if ($apprentice == "Y") {
		$label = $label . "A";

	}

if ($intern == "Y") {
		$label = $label . "I";
	}

if($set_design == "3") {
		$label = $label . "S";
	}

if ($lights == "3" ) {
		$label = $label . "L";
		 
	}

if ($box_office == "3") {
		$label = $label . "B";
	}

if ($stagem == "3") {
		$label = $label . "M";
	}
		
if ($costume == "3") {
		$label = $label . "C";
	}
		
if ($props == "3") {
		$label = $label . "P";
	}
//dancers
if ($ballet >= "10" && $jazz >= "10") {
		$label = $label . "D"; 
}
//musical instruments

if($perc >="10" || $sax >= "10" || $banjo >= "10"
	|| $piano >= "10" || $drums >="10" || $cello >= "10"
	|| $clarinet >= "10" || $trombone >= "10" || $flute >= "10"
	|| $trumpet >= "10" || $violin >= "10" || $guitar >= "10") {
		$label = $label . "&";
	}

/*Parse availfor* for sched11 and LABELS*/
$mo = substr($availfor, 5,2);
$day = substr($availfor, 8,2);
$year = substr($availfor, 0,4);
$label_availfor = $mo . "-" . $day . "-" . $year;	

$mo = substr($availto, 5,2);
$day = substr($availto, 8,2);
$year = substr($availto, 0,4);
$label_availto = $mo . "-" . $day . "-" . $year;	


//final sql string for Update
$sql_label = "UPDATE sched11 
SET 
label = \"$label\",
availfor = \"$label_availfor\",
availto = \"$label_availto\"
WHERE sched_uid = \"$actor_uid\" 
";

//execute SQL query and get result

$sql_result_label = mysql_query($sql_label,$connection) or die("Couldn't execute label update.");
//successful update
	$count++;	
echo "<p>$lastname, $firstname: $label, $label_availfor - $label_availto</p>";

	
}

echo "<P>Total records processed: $count</p>
</BODY>
</HTML>
";
?>