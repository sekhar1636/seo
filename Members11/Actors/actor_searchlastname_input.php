<?php
$type_lastname = $_POST['type_lastname'];
include("session.inc");
?>


<?php
echo "
<HTML>
<HEAD>
<TITLE>StrawHat Search by Lastname Input</TITLE>
<link rel=\"stylesheet\" href=\"/styles/members.css\" type=\"text/css\">
";

include("open_window.inc");

echo "
</HEAD>


<BODY BACKGROUND=\"../../graphics03/Bk10a.GIF\"><script src=\"navbar.js\"></script>

";

include("../../Comm/connect.inc");

//---------------------------------create sql statement
//$type_lastname = trim($type_lastname);

//011310
//using addslashes twice to get correct result, do not know why!	
$type_lastname = addslashes(trim($type_lastname));
$type_lastname = addslashes($type_lastname);	


if(!$type_lastname) {
	echo "<H3>No Last Name was entered. Please go back to enter the Last Name.</H3>";
	exit;
	}


// search checks that actor has paid registration fee
// exclude jay actor and theatres from searches 1001, 2166 using code
// actor_uid != 4447, which is theatres login 
//01_29_13 remove this code WHERE actor_uid != 4447 AND
$sql = "SELECT actor_uid, lastname, firstname, midname, pix_link, actor_ID, item 
		FROM actor11, rec11 
		WHERE lastname LIKE '$type_lastname' AND
		actor11.actor_uid = rec11.actor_ID AND
		rec11.item = \"AR\"
		ORDER BY lastname ASC";


//execute SQL query and get result

$sql_result = mysql_query($sql,$connection) or die("Couldn't execute input query.");

echo "

<P align = \"center\">Please note: when you select a profile to review, it will open in a new window or tab.</p>

<table cellspacing=3 cellpadding=3 align = \"center\">
<tr>
<td align=\"center\"><h2>Search Results for Last Name:</h2>

";
//011310 take out, not needed
//$new_lastname = stripslashes($type_lastname);
//echo "Selected: $new_lastname";

echo "


</td>
	</tr>
	
</table>

<table width = \"40%\" border=0 align=\"center\">
	<tr>
		<th align=\"left\">Pix</th>
		<th align=\"left\">Name</th>
	</tr>
";


$count = 0;

$sql_result = mysql_query($sql,$connection) or die("Couldn't execute input query.");

	while($row = mysql_fetch_array($sql_result) ) {
	$actor_uid = $row["actor_uid"];
	$lastname = $row["lastname"];
	$firstname = $row["firstname"];
	$midname = $row["midname"];
	$pix_link = $row["pix_link"];
	$count++;



	if(empty($lastname)) {
			echo "<H2>No Match Found: Please try again.</H2>";
			exit();
	}
	
	else {



//format results 
$lastname = stripslashes($lastname);
$firstname = stripslashes($firstname);

	echo "
	<tr>
	
	<td align = \"left\"><IMG width=\"65\" SRC=\"ActorPix/$pix_link\"></td>
	<td align=\"left\"><b>$lastname, $firstname $midname</b>
	<form name=\"form1\" method=\"post\" action=\"actor_searchlastname1.php\" target=\"myNewWin\">
	<input type=\"hidden\" name=\"sel_record\" value=\"$actor_uid\">
	<input type=\"submit\" value=\"Select Profile\" name=\"submit\" onClick=\"sendme()\">
	</form>
	
	</td>
	";
// 11/15/11 onClick should be sendme(), target myNewWin
echo "	
		</tr>

		
		
";
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