<?php
//TECH MODIFY PORTFOLIO
$tech_uid = $_POST['tech_uid'];

$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$title1 = $_POST['title1'];
$title2 = $_POST['title2'];
$title3 = $_POST['title3'];
$comment1 = $_POST['comment1'];
$comment2 = $_POST['comment2'];
$comment3 = $_POST['comment3'];
$type1 = $_POST['type1'];
$type2 = $_POST['type2'];
$type3 = $_POST['type3'];
$port_link1 = $_POST['port_link1'];
$port_link2 = $_POST['port_link2'];
$port_link3 = $_POST['port_link3'];
$portfolio = $_POST['portfolio'];




if (!$tech_uid) {
	echo("Can't see tech_uid");
	exit;
	}
	
//check for duplicate names - how to do without checking your existing name as duplicate?	
	

include("../../Comm/connect.inc");

//add variables to show actual data entry on confirmation
//system on remote uses stripslashes differently than local

$vtitle1 = htmlspecialchars(stripslashes($title1));
$vtitle2 = htmlspecialchars(stripslashes($title2));
$vtitle3 = htmlspecialchars(stripslashes($title3));

$vcomment1 = htmlspecialchars(stripslashes($comment1));
$vcomment2 = htmlspecialchars(stripslashes($comment2));
$vcomment3 = htmlspecialchars(stripslashes($comment3));

$vtype1 = $type1;
$vtype2 = $type2;
$vtype3 = $type3;

//trim and addslashes for data insert
$title1 = addslashes(trim($title1));
$title2 = addslashes(trim($title2));
$title3 = addslashes(trim($title3));

$comment1 = addslashes(trim($comment1));
$comment2 = addslashes(trim($comment2));
$comment3 = addslashes(trim($comment3));

//parse portfolio links
//type1
/*
if($type1 == "A") {
	$port_link1 = strtolower($lastname) . "_" . strtolower($firstname) . "1" . ".mp3";
}
elseif($type1 == "V") {
	$port_link1 = strtolower($lastname) . "_" . strtolower($firstname) . "1" . ".wmv";
}
elseif ($type1 == "P") {
	$port_link1 = strtolower($lastname) . "_" . strtolower($firstname) . "1" . ".jpg";
}
else {$port_link1 = "";
}
*/

/*
//typed2
if($type2 == "A") {
	$port_link2 = strtolower($lastname) . "_" . strtolower($firstname) . "2" . ".mp3";
}
elseif($type2 == "V") {
	$port_link2 = strtolower($lastname) . "_" . strtolower($firstname) . "2" .  ".wmv";
}
elseif ($type2 == "P") {
	$port_link2 = strtolower($lastname) . "_" . strtolower($firstname) . "2" . ".jpg";
}
else {$port_link2 = ""; 
}
*/

/*
//typed3
if($type3 == "A") {
	$port_link3 = strtolower($lastname) . "_" . strtolower($firstname) . "3" . ".mp3"; 
}
elseif($type3 == "V") {
	$port_link3 = strtolower($lastname) . "_" . strtolower($firstname) . "3" . ".wmv";
}
elseif ($type3 == "P") {
	$port_link3 = strtolower($lastname) . "_" . strtolower($firstname) . "3" . ".jpg";
}

else {$port_link3 = "";
}
*/

//SQL statement to update record

$sql = "UPDATE techies11 SET tech_uid = \"$tech_uid\",
title1=\"$title1\",
title2=\"$title2\",
title3=\"$title3\",
comment1 = \"$comment1\", 
comment2 = \"$comment2\",
comment3 = \"$comment3\",
type1 = \"$type1\",
type2 = \"$type2\",
type3 = \"$type3\",
port_link1 = \"$port_link1\",
port_link2 = \"$port_link2\",
port_link3 = \"$port_link3\",
portfolio = \"$portfolio\"
WHERE tech_uid = \"$tech_uid\"
 ";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");

if (!$sql_result) {

	echo "<P>Couldn't get record!</P>";

	} else {

	

//strip slashes for confirmation view
echo "

<HTML>
<HEAD>
<TITLE>Strawhat Staff Tech Design Portfolio</TITLE>
<link rel=\"stylesheet\" href=\"actors.css\" type=\"text/css\">
</HEAD>
<BODY>
";
include("banner.inc");	


echo "
<table align=\"center\">
    <tr>
    <td align = \"center\"> 
    <FORM method=\"POST\" action= \"/TechEntry11/profile_change/changes.php\">
    <input type = \"hidden\" name = \"tech_uid\" value = \"$tech_uid\">
    <INPUT type=\"submit\" value =\"Back to Change Application Menu\">
    </FORM>    
    </td>
    </tr>    
</table>
";



echo "	


<h2 align = \"center\">Portfolio Updates:</h2>
<FORM method = \"POST\" action = \"changes.php\">
<input type = \"hidden\" name = \"tech_uid\" value = \"$tech_uid\">

<table width=\"65%\" border=\"0\" align = \"center\">
    <tr> 
      <td><b>Title 1:</b> $vtitle1</td>
      <td><b>Type: </b>
";


	switch ($vtype1) {
  		case $vtype1 == "A":
			echo "Audio";
			break;
		case $vtype1 == "P":
			echo "Picture";
			break;
		case $vtype1 == "V":
			echo "Video";
			break;
        case $vtype1 == "F":
            echo "Pdf";
            break;    
		default: $vtype1 == "N";
			echo "None";
			break;
  	}
      
echo "      
</td>
      <td><b>Comments:</b> $vcomment1</td>
    </tr>
    
    <tr> 
      <td><b>Title 2:</b> $vtitle2</td>
      <td><b>Type: </b>
";

	switch ($vtype2) {
  		case $vtype2 == "A":
			echo "Audio";
			break;
		case $vtype2 == "P":
			echo "Picture";
			break;
		case $vtype2 == "V":
			echo "Video";
			break;
        case $vtype2 == "F":
            echo "Pdf";
            break;    
		default: $vtype2 == "N";
			echo "None";
			break;
  	}
      
echo "      
</td>
      <td><b>Comments:</b> $vcomment2</td>
    </tr>
    
     <tr> 
      <td><b>Title 3:</b> $vtitle3</td>
      <td><b>Type: </b>
";

	switch ($vtype3) {
  		case $vtype3 == "A":
			echo "Audio";
			break;
		case $vtype3 == "P":
			echo "Picture";
			break;
		case $vtype3 == "V":
			echo "Video";
			break;
		case $vtype3 == "F":
            echo "Pdf";
            break;
        default: $vtype3 == "N";
			echo "None";
			break;
  	}
echo "
</td>
      <td><b>Comments:</b> $vcomment3</td>
    </tr>
</table>

<table width=\"65%\" border=\"0\" align = \"center\">    
<tr>
<td>
<BR><BR>

<B>Port Link1:</B> $port_link1<BR>
<B>Port Link2:</B> $port_link2<BR>
<B>Port Link3:</B> $port_link3
</td>     
</tr>    
    
</table>
";
if($portfolio == "Y") {
	echo "<p align = \"center\">Portfolio Is Turned On and will appear on your Tech Profile</p>";
}

else {echo "<p align = \"center\">Portfolio Is Turned Off and will Not appear on your Tech Profile</p>";
}



echo "
<p align = \"center\"><INPUT type=\"submit\" value =\"Done\">  </p>
</FORM>
</BODY>
</HTML>
";
}
?>