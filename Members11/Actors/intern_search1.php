<?php
$apprentice = $_POST['apprentice'];
$intern = $_POST['intern'];
$set_design = $_POST['set_design'];
$lights = $_POST['lights'];
$costume = $_POST['costume'];
$stagem = $_POST['stagem'];
$box_office = $_POST['box_office'];
$props = $_POST['props'];

include("session.inc");
?>

<?php
//Intern12remote

echo "

<HTML>
<HEAD>
<TITLE>StrawHat Apprentices & Interns w/Tech Skills</TITLE>
<link rel=\"stylesheet\" href=\"/styles/members.css\" type=\"text/css\">
";

include("open_window.inc");

echo "
</HEAD>
<BODY BACKGROUND=\"../../graphics03/Bk10a.GIF\"><script src=\"navbar.js\"></script>
";

//create connection
include("../../Comm/connect.inc");

//---------------------------------create sql statement, no Theatres 3987 localhst 092611
$sqlA ="SELECT skills_uid, actor_uid, audition_uid, actor_ID, pix_link,
lastname, firstname, midname,
intern, apprentice,
set_design, lights, costume, stagem, box_office, props, item

FROM actor11, skills11, audition11, rec11
WHERE actor_uid = audition_uid
AND audition_uid = skills_uid
AND skills_uid = actor_ID
AND item = \"AR\"
";

/*8/10/13 Take out references to individual actors in the code, use admin AR, etc to not show in search
AND actor_uid != \"6001\"
AND actor_uid != \"7392\"
*/

//sql strings
$sql_app = "AND audition11.apprentice = \"$apprentice\" ";
$sql_intern = "AND audition11.intern = \"$intern\" ";
$sql_SD = "AND skills11.set_design >= \"$set_design\" ";
$sql_lights = "AND skills11.lights >= \"$lights\" ";
$sql_costume = "AND skills11.costume >= \"$costume\" "; 
$sql_stagem = "AND skills11.stagem >= \"$stagem\" ";
$sql_box_office = "AND skills11.box_office >= \"$box_office\" ";
$sql_props = "AND skills11.props >= \"$props\" ";
$sql_B = "ORDER BY actor11.lastname ASC";

//put strings together

$sql = $sqlA;
if($apprentice) {$sql = $sql . $sql_app;}
if($intern) {$sql=  $sql . $sql_intern;}
if($set_design > 0){$sql = $sql . $sql_SD;}
if($lights > 0) {$sql = $sql . $sql_lights;}
if($costume > 0) {$sql = $sql . $sql_costume;}
if($stagem > 0) {$sql = $sql . $sql_stagem;}
if($box_office > 0) {$sql = $sql . $sql_box_office;}
if($props > 0) {$sql = $sql . $sql_props;}
$sql = $sql . $sql_B;

//done with $sql strings

//execute SQL query and get result

$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");

/* get count of records ------------------------------------------

$sql_countall = "SELECT COUNT(*) FROM actor11";



//resulting count

$sql_countresult = mysql_query($sql_countall,$connection) or die("Couldn't execute query.");



//assign variable to count result

$count1 = mysql_result($sql_countresult,0);

//---------------------------------------------------------------

*/

if(!$apprentice && !$intern && !$set_design && !$lights && !$costume && !$stagem && !$box_office && !$props) 
{
	echo "<p>Please make at least one selection from the Apprentice/Intern and Technical Skills Menu<p>";
		exit();
};

echo "

<P align = \"center\">Please note: when you select a profile to review, it will open in a new window</p>

<table cellspacing=5 cellpadding=5 align = \"center\">
<tr>
<td align=\"center\">
<H2>Actor Interns/Apprentices with Technical Skills:</H2>Selected: ";

if($apprentice) {echo "Apprentice, ";}
if($intern) {echo "Intern, ";}
if($set_design) {echo "Set Design($set_design), ";}
if($lights) {echo "Lights($lights), ";}
if($costume) {echo "Costumes($costume), ";}
if($stagem) {echo "Stage Management($stagem), ";}
if($box_office) {echo "Box Office($box_office), ";}
if($props) {echo "Props($props)";}

// end 1st start table
/*new code below 8/10/13*/
echo "

</td>
	</tr>
	</table>
";
//start new table

echo "


	<table width = \"65%\" border=\"0\" align=\"center\">
	<tr>
		<td align=\"left\"><B>Pix</B></td>
		<td align=\"left\"><B>Name</B></td>
		
        <!--
        <td align=\"left\"><B>Go To</B></td>
		changed 11/3/2013
        -->
        
		<!--Removing extra information on search
		<th align=\"center\">Lighting</th>
		<th align=\"center\">Costumes</th>
		<th align=\"center\">SM</th>
		<th align=\"center\">Box Office</th>
		<th align=\"center\">Props</th>
		-->
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

	$count++;

	echo " 
	<tr>
			<td align=\"left\"><IMG width=65 SRC=\"ActorPix/$pix_link\"></td>
			<td align =\"left\"><b>$lastname, $firstname $midname</b>
            
            <form name=\"form1\" method=\"post\" action=\"actor_searchlastname1.php\" target=\"myNewWin\" >
            <input type=\"hidden\" name=\"sel_record\" value=\"$actor_uid\">
            <input type=\"submit\" value=\"Select Profile\" name=\"submit\" onClick=\"sendme()\">
            </form>

                        
            </td>
			
			<!--Removing extra information on search
			<td align=\"center\">$set_design</td>			
			<td align=\"center\">$lights</td>
			<td align=\"center\">$costumes</td>
			<td align=\"center\">$stagem</td>
			<td align=\"center\">$box_office</td>										
			<td align=\"center\">$props</td>
			-->

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


	if(!$count) {echo "<p align = \"left\">No Match Found, please modify your search selections</p>";
	}
	else {
	echo "
<HR>
	<p align = \"center\">Total Number of Records: $count</p>";	
	}
	echo "
</BODY>
</HTML>
";
?>