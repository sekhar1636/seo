<?php
$day = $_POST['day'];
$type = $_POST['type'];
$order = $_POST['order'];
echo "Day: $day <BR>";
echo "Type: $type <BR>";
echo "Order: $order <BR>";

include("session.inc");
?>

<?php
//Intern12remote

echo "

<HTML>
<HEAD>
<TITLE>StrawHat Search List of Auditioning Actors</TITLE>
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
$sql ="SELECT sched_uid,  day, time, type, name, 
actor_uid, firstname, lastname, pix_link
FROM sched11, actor11
WHERE sched_uid = actor_uid  
AND type = \"$type\"
AND day = \"$day\"
";

//execute SQL query and get result
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute aud_actors query.");

/* get count of records ------------------------------------------
$sql_countall = "SELECT COUNT(*) FROM actor11";

//resulting count
$sql_countresult = mysql_query($sql_countall,$connection) or die("Couldn't execute query.");

//assign variable to count result
$count1 = mysql_result($sql_countresult,0);

//---------------------------------------------------------------
*/

if(!$day && !$type && !$order) {
	echo "<p>Please make at least one selection from Day, Type and Order Menus<p>";
		exit();
};

echo "

<P align = \"center\">Please note: when you select a profile to review, it will open in a new window</p>

<table cellspacing=5 cellpadding=5 align = \"center\">
<tr>
<td align=\"center\">
<H2>Auditioning Actors:</H2>";


echo "

</td>
	</tr>
	</table>
";
//start new table

echo "


	<table width = \"50%\"border=0 align=\"center\">
	<tr>
		<td align=\"left\"><B>Pix</B></td>
		<td align=\"left\"><B>Name</B></td>
		<td align=\"left\"><B>Day</B></td>
        <td align=\"left\"><B>Time</B></td>
        <td align=\"left\"><B>Type</B></td>
        <td align=\"left\"><B>Profile</B></td>
    </tr>

    ";		

$count = 0;

//execute SQL query and get result
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute input query.");

//get results
	while($row = mysql_fetch_array($sql_result) ) {
	$sched_uid = $row["sched_uid"];
	$firstname = stripslashes($row["firstname"]);
    $lastname = stripslashes($row["lastname"]);
	$day = stripslashes($row["day"]);
    $time  = stripslashes($row["time"]);
    $type  = stripslashes($row["type"]);
	$pix_link = $row["pix_link"];

	$count++;

    
	echo " 
    
	<tr>
			<td align=\"left\"><IMG width=65 SRC=\"ActorPix/$pix_link\"></td>
			<td align =\"left\"><b>$firstname $lastname</b></td>
			<td align=\"center\">$day</td>			
			<td align=\"center\">$time</td>
			<td align=\"center\">$type</td>
            
            <td align =\"left\">
            <form name=\"form1\" method=\"post\" action=\"actor_searchlastname1.php\" target=\"myNewWin\" >
            <input type=\"hidden\" name=\"sel_record\" value=\"$sched_uid\">
            <input type=\"submit\" value=\"Select Profile\" name=\"submit\" onClick=\"sendme()\">
            </form>
            </td>	
	</tr>

";
}
echo "</table>";

	if(!$count) {echo "<p align = \"center\"><b>No Match Found, please modify your search selections</b></p>";
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