<?php
include("../admin11/session.inc");

$sel_actor = $_POST['sel_actor'];

	if ((!$sel_actor)) {
	header("rec_change2.php");
	echo "no input";
	exit;
}

?>

<!-- <DOCTYPE HTML PUBLIC "-//W3C/DTD HTML 3.2//EN"> -->
<HTML>
<HEAD>
<TITLE>Change RECIEPTS TABLE</TITLE>
<link rel="stylesheet" href="/ActorEntry11/actors.css" type="text/css">
</HEAD>
<BODY BACKGROUND="/bk10a.gif">

<?php
//add code to get select bar with reciept names


$sql = "SELECT rec_uid, actor_ID, item, amount, actor_uid, lastname, firstname
		FROM rec11, actor11
		WHERE actor_ID = $sel_actor
		AND actor_ID = actor_uid";



include("../Comm/connect.inc");

$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.$sel_actor");

//html for logo and strawhat banner
	include("../styles/banner.inc");

echo "
<H2 align = \"center\">Select the Receipt to Change. Actor: ($sel_actor).</H2>
<FORM method=\"POST\" action=\"rec_change3.php\">


<table align = \"center\" cellspacing=5 cellpadding=5>

<tr>
<td align=right><strong>Select Receipt</strong><td>
<td valign = top>
<select name=\"sel_record\">
<option value=\"\"> -- Select Receipt -- </option>
";

	while ($row = mysql_fetch_array($sql_result) ) {
		$rec_uid = $row["rec_uid"];
		$new_actor_ID = $row["actor_ID"];
		$new_lastname = stripslashes($row["lastname"]);
		$new_firstname = stripslashes($row["firstname"]);
		$new_item = $row["item"];
		$new_amount = $row["amount"];
				
		echo "
			<option value=\"$rec_uid\">$new_actor_ID-$rec_uid, $new_lastname, $new_firstname: $new_item, $new_amount</option>
		";
		}

		echo " <P>$rec_uid</p>
	</select>
	</td>
	</tr>
	
	<tr>
	<td align = center colspan=2><INPUT type=\"submit\" value =\"Change Reciept\"></td>
	</tr>
	
	</table>
</form>	
";
?>

</BODY>
</HTML>