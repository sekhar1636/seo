<?php



//	if (!$sel_record) {
//	echo die ("Couldn't find record");
//  	header("Location: http://localhost/Members09/admin_test/Tech/techie_portfolio.php");
// 	exit;
//	}



//create connection
include("../../../Comm/connect.inc");



//---------------------------------create sql statement

$sql = "SELECT tech_uid, techapp_uid, lastname, firstname,
		job1, job2, other, resume_link, portfolio, audio_link, 
		title1, title2, title3
		FROM techies09, techapp09
		WHERE tech_uid = \"$sel_record\"";

//execute SQL query and get result	

$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");



if (!$sql_result) {

	echo "<P>Couldn't get record!</P>";

	} 

	else {

//fetch row and assign to variables

$row = mysql_fetch_array($sql_result);

$tech_uid = $row["tech_uid"];

$techapp_uid = $row["techapp_uid"];

$lastname = $row["lastname"];

$firstname = $row["firstname"];

$job1 = $row["job1"];

$job2 = $row["job2"];

$other = $row["other"];

$resume_link = $row["resume_link"];

$portfolio = $row["portfolio"];

$audio_link = $row["audio_link"];

$title1 = $row["title1"];

$title2 = $row["title2"];

$title3 = $row["title3"];



//make if statement to hold either link to image or link to mp3



if($portfolio == 'Y') {

//parse strings into jpg links

$link1 = strtolower($lastname . "_" . $firstname . "1" . "." . "jpg");

$link2 = strtolower($lastname . "_" . $firstname . "2" . "." . "jpg");

$link3 = strtolower($lastname . "_" . $firstname . "3" . "." . "jpg");

}



if($portfolio == 'Y' && $audio_link == 'Y') {

//parse strings into mp3 links

$link1 = strtolower($lastname . "_" . $firstname . "1" . "." . "mp3");

$link2 = strtolower($lastname . "_" . $firstname . "2" . "." . "mp3");

$link3 = strtolower($lastname . "_" . $firstname . "3" . "." . "mp3");

}



echo "

<HTML>

<HEAD>

<TITLE>2009 Staff Tech Design Portfolio</TITLE>

<link rel=\"stylesheet\" href=\"portfolio.css\" type=\"text/css\">



</HEAD>

<BODY>

<FORM method = \"POST\" action = \"techie_portfolio3.php\">

<table width=\"90%\" border=\"0\" cellspacing=\"1\" cellpadding=\"1\" align=\"center\">

  <tr> 

    <td><font size=\"+1\">$firstname $lastname</td>

    <td><a href=\"/Members09/Tech/tech_resume/$resume_link\">Click here for resume</a></td>   

  </tr>

  <tr colspan=\"2\">

	<td>$job1";

	

	if($job2) {

		echo ", $job2";

		}

	if($other) {

		echo ", $other";

		}

echo "</td>

  </tr>

";



if($portfolio=='Y' && $audio_link == 'Y') {

echo "



  <tr>

    <td colspan=\"2\"><A HREF=\"#\" ONCLICK=\"window.open('http://switchboard.real.com/links/?btn=en/dwnld_88x31_anim', 'real', 'resizable=yes,width=500,height=500')\"><IMG SRC=\"http://logo.real.com/en/dwnld_88x31_anim.gif\" WIDTH=\"88\"HEIGHT=\"31\" BORDER=\"0\" ALT=\"DownloadPlayer\" VSPACE=\"7\"></A><BR>StrawHat recommends using Realplayer1 for our mp3 downloads.</td>

  </tr>

  

	<tr> 

    	<td width = \"25%\"><img src=\"record1.gif\"></td>

  		<td><a href=\"/Members09/Tech/tech_pics/$link1\">$title1</a></td>

	</tr>

  	<tr> 

     	<td width = \"25%\"><img src=\"record1.gif\"></td>

		<td><a href=\"/Members09/Tech/tech_pics/$link2\">$title2</a></td>

  	</tr>

  <tr> 

    	<td width = \"25%\"><img src=\"record1.gif\"></td>

		<td><a href=\"/Members09/Tech/tech_pics/$link3\">$title3</a></td>

  </tr>

</table>



</FORM>

</BODY>

</HTML>

";	

	}

//else do as audio

	else {

echo "

  <tr> 

    <td colspan=2 width = \"25%\"><img src=\"/Members09/Tech/tech_pics/$link1\"></td>

	<td colspan=2>$title1</td>

  </tr>

  <tr> 

    <td colspan=2 width = \"25%\"><img src=\"/Members09/Tech/tech_pics/$link2\"></td>

	<td colspan=2>$title2</td>

  </tr>

  

  <tr> 

    <td colspan=2 width = \"25%\"><img src=\"/Members09/Tech/tech_pics/$link3\"></td>

	<td colspan=2>$title3</td>

  </tr>

</table>



</FORM>

</BODY>

</HTML>

";

	}

}

?>