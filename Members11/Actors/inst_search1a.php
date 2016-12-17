<?php
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


include("session.inc");
?>

<?php
//----------------function to test for chars----------------

function test_char($data)
{
if (preg_match("[0-9]", $data) ) {
	echo"<P><B>Please enter a number greater than zero. Characters are not valid.</B></P>";
	echo "<p><a href=\"inst_search.php\">Back</a></p>";
	exit;
	}
}

//-------------------------------------------

echo "
<HTML>
<HEAD>
<TITLE>Search Results: Actors Play Instruments</TITLE>
<link rel=\"stylesheet\" href=\"/styles/members.css\" type=\"text/css\">
";

include("open_window.inc");

echo "

</HEAD>
<BODY BACKGROUND=\"../../graphics03/Bk10a.GIF\"><script src=\"navbar.js\"></script>
";

//create connection
include("../../Comm/connect.inc");

//---------------------------------old instrument sql statement
$sql ="SELECT skills11.skills_uid , actor11.actor_uid, actor11.lastname, actor11.firstname, actor11.midname, actor11.pix_link,
skills11.banjo, skills11.drums, skills11.perc, skills11.trombone,
skills11.cello, skills11.flute, skills11.piano, skills11.trumpet,
skills11.clarinet, skills11.guitar, skills11.sax, skills11.violin,
rec11.actor_ID, rec11.item
FROM actor11, skills11, rec11

WHERE skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.banjo >= \"$banjo\"
AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.drums >= \"$drums\"
AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.perc >= \"$perc\"
AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.trombone >= \"$trombone\"
AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.cello >= \"$cello\"
AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.flute >= \"$flute\"
AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.piano >= \"$piano\"
AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.trumpet >= \"$trumpet\"
AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.clarinet >= \"$clarinet\"
AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.guitar >= \"$guitar\"
AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.sax >= \"$sax\"
AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.violin >= \"$violin\"
AND item = \"AR\"
ORDER BY actor11.lastname ASC";

//------------------------New Inst Search with concantenating strings
//---------------------------------New instrument sql statement, exclude Theatres 4447 11/24/10
$sql_inst_start ="SELECT skills11.skills_uid , actor11.actor_uid, actor11.lastname, actor11.firstname, actor11.midname, 
actor11.resume_link, actor11.pix_link,
skills11.banjo, skills11.drums, skills11.perc, skills11.trombone,
skills11.cello, skills11.flute, skills11.piano, skills11.trumpet,
skills11.clarinet, skills11.guitar, skills11.sax, skills11.violin,
rec11.actor_ID, rec11.item
FROM actor11, skills11, rec11
WHERE item = \"AR\" 
AND actor_uid != \"4447\"
";

if ($banjo) {
	$banjo_p = " AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID 
	AND skills11.banjo >= \"$banjo\" ";
}
else {
	$banjo_p = "";
} 

if($drums) {
	$drums_p = " AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.drums >= \"$drums\" ";
}
else {
		$drums_p = "";
}

if($perc) {
	$perc_p = " AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.perc >= \"$perc\" ";
}
else {
		$perc_p = "";
}

if($trombone) {
	$trombone_p = " AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.trombone >= \"$trombone\" ";
}
else {
		$trombone_p = "";
}

if($cello) {
	$cello_p = " AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.cello >= \"$cello\" ";
}
else {
	$cello_p = "";
}

if($flute) {
	$flute_p = " AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.flute >= \"$flute\" ";
}
else {
		$flute_p = "";
}

if($piano) {
	$piano_p = " AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.piano >= \"$piano\" ";
}
else {
		$piano_p = "";
}

if($trumpet) {
	$trumpet_p = " AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.trumpet >= \"$trumpet\" ";
}
else {
		$trumpet_p = "";
}

if($clarinet) {
	$clarinet_p = " AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.clarinet >= \"$clarinet\" ";
}
else {
		$clarinet_p = "";
}

if($guitar) {
	$guitar_p = " AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.guitar >= \"$guitar\" ";
}
else {
		$guitar_p = "";
}

if($sax) {
	$sax_p = " AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.sax >= \"$sax\" ";
}
else {
		$sax_p = "";
}

if($violin) {
	$violin_p = " AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.violin >= \"$violin\" ";
}
else {
		$violin_p = "";
}

$sql_inst_end = " ORDER BY actor11.lastname ASC";

//concatenate the strings

$sql = $sql_inst_start . $banjo_p . $drums_p . $perc_p . $trombone_p . $cello_p . $flute_p . $piano_p . $trumpet_p . $clarinet_p . $guitar_p . $sax_p . $violin_p . $sql_inst_end;

//execute SQL query and get result
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute input query.");

//test for all zeros, warn
	if (!$banjo && !$drums && !$perc && !$trombone
		&& !$cello && !$flute && !$piano && !$trumpet 
		&& !$clarinet && !$guitar && !$sax && !$violin) {
	echo "<p><b>Please enter number of years studied  (greater than zero in at least one category).</b></p>";

	echo "<p><a href=\"inst_search.php\">Back</a></p>";
	exit;
}

//test for chars
test_char($banjo);
test_char($drums);
test_char($perc);
test_char($trombone);
test_char($cello);
test_char($flute);
test_char($piano);
test_char($trumpet);
test_char($clarinet);
test_char($guitar);
test_char($sax);
test_char($violin);
test_char($banjo);
//-------------end of chars testing

echo "

<P align = \"center\">Please note: when you select a profile to review, it will open in a new window</p>

<table cellspacing=3 cellpadding=3 align = \"center\">
<tr>
<td align=\"center\"><h2>Search Results for Musical Instruments:</h2>
Selected: 
";

if($banjo) {echo "Banjo($banjo), ";}
if($drums) {echo "Drums($drums), ";}
if($perc) {echo "Percussion($perc), ";}
if($trombone) {echo "Trombone($trombone), ";}
if($cello) {echo "Cello($cello), ";}
if($flute) {echo "Flute($flute), ";}
if($piano) {echo "Piano($piano), ";}
if($trumpet) {echo "Trumpet($trumpet)";}
if($clarinet) {echo "Clarinet($clarinet)";}
if($guitar) {echo "Guitar($guitar)";}
if($sax) {echo "Saxophone($sax)";}
if($violin) {echo "Violin($violin)";}


echo "

</td>
	</tr>
	
</table>


	<table width = \"65%\" border=0 align=\"center\">
	<tr>
		<th align=\"center\">Pix</th>
		<th align=\"left\">Name</th>
		<th align=\"left\">Instruments</th>
	</tr>
";

$count = 0;

$sql_result = mysql_query($sql,$connection) or die("Couldn't execute input query.");

	while($row = mysql_fetch_array($sql_result) ) {
	$actor_uid = $row["actor_uid"];
	$lastname = stripslashes($row["lastname"]);
	$firstname = stripslashes($row["firstname"]);
	$midname = stripslashes($row["midname"]);
	$pix_link = $row["pix_link"];
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
	$count++;



	if(empty($lastname)) {
			echo "<H2>No Match Found: Please try again.</H2>";
			exit();
	}
	
	else {



//format results 

	echo "
	<tr>
	<td align = \"left\"><IMG width=\"65px\" SRC=\"ActorPix/$pix_link\"></td>
	<td align=\"left\"><b>$lastname, $firstname $midname</b>
    <BR>
    <form name=\"form1\" method=\"post\" action=\"actor_searchlastname1.php\" target=\"myNewWin\">
    <input type=\"hidden\" name=\"sel_record\" value=\"$actor_uid\">
    <input type=\"submit\" value=\"Select Profile\" name=\"submit\" onClick=\"sendme()\">
    </form>
    </td>
	
	<td align=\"left\">
";

//test if they are greater than zero - if so, print

	if($banjo) {		
		echo "Banjo:($banjo) ";
	}	

	if($drums) {		
		echo "Drums: ($drums) ";
	}	

	if($perc) {		
		echo "Perc:($perc) ";
	}	

	if($trombone) {		
		echo "Trombone:($trombone) ";
	}	

	if($cello) {		
		echo "Cello:($cello) ";
	}	

	if($flute) {		
		echo "Flute:($flute) ";
	}	

	if($piano) {		
		echo "Piano:($piano) ";
	}	

	if($trumpet) {		
		echo "Trumpet:($trumpet) ";
	}	

	if($clarinet) {		
		echo "Clarinet:($clarinet) ";
	}	

	if($guitar) {		
		echo "Guitar:($guitar) ";
	}	

	if($sax) {		
		echo "Sax:($sax) ";
	}	

	if($violin) {		
		echo "Violin:($violin) ";
	}	

/*
echo "	
		</td>
		<td>
			<form name=\"form1\" method=\"post\" action=\"actor_searchlastname1.php\" target=\"myNewWin\">
	<input type=\"hidden\" name=\"sel_record\" value=\"$actor_uid\">
	<input type=\"submit\" value=\"Select Profile\" name=\"submit\" onClick=\"sendme()\">
	</form></td>
		
		
";
*/
	}
}

echo "</table>";
if(!$count) {echo "<p align = \"center\">No Match Found, please modify your search selections</p>";
	}
	else {
	echo "<p align = \"center\">Total Number of Records: $count</p>";	
	}

echo " 

</BODY>
</HTML>
";

?>