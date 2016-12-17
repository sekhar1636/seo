<?php
echo "
<HTML>
<HEAD>
<TITLE>StrawHat Select Lastname for Password Change</TITLE>
<link rel=\"stylesheet\" href=\"actors.css\" type=\"text/css\">
</HEAD>
<BODY BACKGROUND=\"Bk10a.GIF\">
";
include("banner.inc");

include("../../ActorEntry11/connect.inc");

//---------------------------------create sql statement
//add code to get select bar with added names

trim($type_lastname);

if(!$type_lastname) {
	echo "<H3>No Last Name was entered. Please go back to enter the Last Name.</H3>";
	exit;
	}

$type_lastname = addslashes($type_lastname);	

$sql = "SELECT actor_uid, lastname, firstname, midname 
		FROM actor07 
		WHERE lastname LIKE '$type_lastname'
		ORDER BY lastname ASC";

//execute SQL query and get result

$sql_result = mysql_query($sql,$connection) or die("Couldn't execute input query.");

echo "

<H1>Select Lastname Search Results</H1>
<FORM method=\"POST\" action=\"pwd_change.php\">

<table cellspacing=5 cellpadding=5>
<tr>
<td align=right><strong>Actors by Lastname</strong><td>
<td valign = top>
<select name=\"sel_record\">
<option value=\"\"> -- Select Lastname -- </option>
";
	while ($row = mysql_fetch_array($sql_result) ) {
		$new_lastname = $row["lastname"];
		$new_actor_uid = $row["actor_uid"];
		$new_firstname = $row["firstname"];
		$new_midname = $row["midname"];

		echo "
			<option value=\"$new_actor_uid\">$new_lastname, $new_firstname $new_midname</option>
			";
		}
echo "
	</select>
	</td>
	</tr>
	<tr>
	<td align = center colspan=2>
	<INPUT type=\"submit\" value =\"Select Actor\"></td>
	</tr>
	</table>
</form>	
";	

			if(empty($new_lastname)) {
			echo "<H3>No Match Found: Please try again or use the other Last Name search.</H3>";
			};

echo "
</BODY>
</HTML>
";
?>