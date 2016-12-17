<?php
$ballet = $_POST['ballet'];
$mus_thea = $_POST['mus_thea'];
$ballroom = $_POST['ballroom'];
$tap = $_POST['tap'];
$swing = $_POST['swing'];
$jazz = $_POST['jazz'];
$gender = $_POST['gender'];


include("session.inc");
?>

<?php
//DANCE12REMOTE



//----------------function to test for chars----------------

function test_char($data)
{
if (preg_match("[0-9]", $data) ) {
	echo"<P><B>Please enter a number greater than zero. Characters are not valid.</B></P>";
	echo "<p><a href=\"dance_search.php\">Back</a></p>";
	exit;
	}
}

//-------------------------------------------

echo "
<HTML>
<HEAD>
<TITLE>StrawHat Search for Dancers</TITLE>
<link rel=\"stylesheet\" href=\"/styles/members.css\" type=\"text/css\">
";

include("open_window.inc");

echo "
</HEAD>
<BODY BACKGROUND=\"../../graphics03/Bk10a.GIF\"><script src=\"navbar.js\"></script>
";

//create connection
include("../../Comm/connect.inc");


//new search for dance. Excluding Theatres 4447

//zero searches not included, keep greater than/equal number or years
//8/14/13 took out AND actor_uid != \"7392\" out of search

$sql_dance_start ="SELECT skills11.skills_uid , actor11.actor_uid, actor11.lastname, actor11.firstname, actor11.midname, actor11.pix_link,
actor11.resume_link, skills11.ballet, skills11.mus_thea, skills11.ballroom, skills11.tap, skills11.swing, skills11.jazz, 
physical11.phys_uid, physical11.gender, rec11.actor_ID, rec11.item 
FROM actor11, skills11, physical11, rec11
WHERE physical11.phys_uid = actor11.actor_uid 
AND actor11.actor_uid = rec11.actor_ID
AND rec11.actor_ID = skills11.skills_uid
AND rec11.item = \"AR\" 
AND physical11.gender = \"$gender\" ";

if ($ballet) {
	$ballet_p = " AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID 
	AND skills11.ballet >= \"$ballet\" ";
	}
else {
	$ballet_p = "";
	} 


if ($mus_thea) {
	$mus_thea_p = " AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID 
	AND skills11.mus_thea >= \"$mus_thea\" ";
	}
else {
	$mus_thea_p = "";
	}


if ($ballroom) {
	$ballroom_p = " AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID 
	AND skills11.ballroom >= \"$ballroom\" ";
	}
else {
	$ballroom_p = "";
	}


if ($tap) {
	$tap_p = " AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID 
	AND skills11.tap >= \"$tap\" ";
	}
else {
	$tap_p = "";
	}


if ($swing) {
	$swing_p = " AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID 
	AND skills11.swing >= \"$swing\" ";
	}
else {
	$swing_p = "";
	}
	
if ($jazz) {
	$jazz_p = " AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID 
	AND skills11.jazz >= \"$jazz\" ";
	}
else {
	$jazz_p = "";
	}

// end query statement
$sql_dance_end = " AND item = \"AR\"
ORDER BY actor11.lastname ASC";

//concatenate the strings
$sql = $sql_dance_start . $ballet_p . $mus_thea_p . $ballroom_p . $tap_p . $swing_p . $jazz_p . $sql_dance_end;
	
//test for all zeros, warn
	if (!$ballet && !$mus_thea && !$ballroom && !$tap
		&& !$swing && !$jazz) {
	echo "<p><b>Please enter number of years studied  (greater than zero in at least one category).</b></p>";
	echo "<p><a href=\"dance_search.php\">Back</a></p>";
	exit;
}

//test for chars
test_char($ballet);
test_char($mus_thea);
test_char($ballroom);
test_char($tap);
test_char($swing);
test_char($jazz);

//-------------end of chars testing

	//execute SQL query and get result
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute dance query.");


echo "

<P align = \"center\">Please note: when you select a profile to review, it will open in a new window</p>

<table cellspacing=5 cellpadding=5 align = \"center\">
<tr>
<td align=\"center\">

<H2>Search Results for Dancers:</H2>

<b>Selected:</b> ";

if($ballet) {echo "<b>Ballet($ballet),</b> ";}
if($mus_thea) {echo "<b>Musical Thea($mus_thea),</b> ";}
if($ballroom) {echo "<b>Ballroom($ballroom),</b> ";}
if($tap) {echo "<b>Tap($tap)</b>,</b> ";}
if($swing) {echo "<b>Swing($swing)</b>, ";}
if($jazz) {echo "<b>Jazz($jazz),</b> ";}

echo "
    </td>
	</tr>
	</table>

";

echo "

	<table width = \"70%\" border=0 align=\"center\" cellspacing=5 cellpadding=5>
	<tr>
		<td align=\"center\"><u>Pix</u></td>
		<td align=\"left\"><u>Name</u></td>
		<td align=\"center\"><u>Ballet</u></td>
		<td align=\"center\"><u>Musical Thea</u></td>
		<td align=\"center\"><u>Ballroom</u></td>
		<td align=\"center\"><u>Tap</u></td>
		<td align=\"center\"><u>Swing</u></td>
		<td align=\"center\"><u>Jazz</u></td>
		<td align=\"center\"><u><Profile</u></td>
	</tr>
";

$count = 0;
//execute SQL query and get result

$sql_result = mysql_query($sql,$connection) or die("Couldn't execute input query.");


//format results by row, reset array

	while($row = mysql_fetch_array($sql_result) ) {
	$actor_uid = $row["actor_uid"];
	$lastname = stripslashes($row["lastname"]);
	$firstname = stripslashes($row["firstname"]);
	$midname = stripslashes($row["midname"]);
	$pix_link = $row["pix_link"];
	$ballet = $row["ballet"];
	$mus_thea = $row["mus_thea"];
	$ballroom = $row["ballroom"];
	$tap = $row["tap"];
	$swing = $row["swing"];
	$jazz = $row["jazz"];
	$new_item = $row["item"];
	$count++;

	if(empty($lastname)) {
			echo "<H2>No Match Found: Please try again.</H2>";
			exit();
	}

	else {

//format results under the contol
//format results by row, reset array


	echo "
	<tr>
			<td><IMG width=\"65px\" SRC=\"ActorPix/$pix_link\"></td>
			<td><b>$lastname, $firstname $midname</b>
            <form name=\"form1\" method=\"post\" action=\"actor_searchlastname1.php\" target=\"myNewWin\">
    <input type=\"hidden\" name=\"sel_record\" value=\"$actor_uid\">
    <input type=\"submit\" value=\"Select Profile\" name=\"submit\" target = \"myNewWin\" onClick=\"sendme()\">
    </form>
            
            </td>
			<td align=\"center\">Ballet($ballet)</td>
			<td align=\"center\">Musical Thea($mus_thea)</td>
			<td align=\"center\">Ballroom($ballroom)</td>
			<td align=\"center\">Tap($tap)</td>
			<td align=\"center\">Swing($swing)</td>											
			<td align=\"center\">Jazz($jazz)</td>
			<td>
";
/*   11/7/13 MOVED PROFILE BUTTON BELOW PIX     
	<form name=\"form1\" method=\"post\" action=\"actor_searchlastname1.php\" target=\"myNewWin\">
	<input type=\"hidden\" name=\"sel_record\" value=\"$actor_uid\">
	<input type=\"submit\" value=\"Select Profile\" name=\"submit\" target = \"myNewWin\" onClick=\"sendme()\">
	</form></td>
*/

echo "			
		  </tr>


";
	}
}

echo "</table>;";

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