<?php
$tech_uid = $_POST['tech_uid'];

//TECH MODIFY PORTFOLIO

include("../../Comm/connect.inc");


//SQL statement to select record
$sql = "SELECT tech_uid, lastname, firstname, 
title1, title2, title3, 
type1, type2, type3, 
comment1, comment2, comment3,
port_link1, port_link2, port_link3, portfolio
FROM techies11 WHERE tech_uid = $tech_uid";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");


if (!$tech_uid) {
	echo "<P>Couldn't get record!</P>";
	exit;
	}

	else {
	

//fetch row and assign to variables
$row = mysql_fetch_array($sql_result);
$tech_uid = $row["tech_uid"];
$lastname = $row["lastname"];
$firstname = $row["firstname"];
$title1 = $row["title1"];
$title2 = $row["title2"];
$title3 = $row["title3"];
$comment1 = $row["comment1"];
$comment2 = $row["comment2"];
$comment3 = $row["comment3"];
$type1 = $row["type1"];
$type2 = $row["type2"];
$type3 = $row["type3"];
$port_link1 = $row["port_link1"];
$port_link2 = $row["port_link2"];
$port_link3 = $row["port_link3"];
$portfolio = $row["portfolio"];

//parse records
$title1 = htmlspecialchars(stripslashes($title1));
$title2 = htmlspecialchars(stripslashes($title2));
$title3 = htmlspecialchars(stripslashes($title3));

$comment1 = htmlspecialchars(stripslashes($comment1));
$comment2 = htmlspecialchars(stripslashes($comment2));
$comment3 = htmlspecialchars(stripslashes($comment3));
	}
echo "


<html>
<head>
<title>StrawHat Auditions Staff Tech Design Portfolios</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
<link rel=\"stylesheet\" href=\"actors.css\" type=\"text/css\">
</head>

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
<h2 align = \"center\">StrawHat Staff, Tech Design: Portfolio Entry for $firstname $lastname</h2>
<form name=\"form1\" method=\"post\" action=\"tech_modifyportfolio2.php\">
<input type = \"hidden\" name = \"tech_uid\" value = \"$tech_uid\">
<input type = \"hidden\" name = \"lastname\" value = \"$lastname\">
<input type = \"hidden\" name = \"firstname\" value = \"$firstname\">


<table width=\"75%\" border=\"0\" align = \"center\">
    <tr> 
      <td colspan=\"4\" height=\"21\"><b>PORTFOLIO ENTRIES: Consisting of Audio, Pictures 
        and or Video (limited to 3 entries)</b></td>
    </tr>
    <tr> 
      <td width=\"8%\" height=\"21\"><b>Title</b></td>
      <td width=\"30%\" height=\"21\">&nbsp;</td>
      <td width=\"20%\" height=\"21\"></td>
      <td width=\"42%\" height=\"21\"><b>Comments</b></td>
    </tr>
    <tr> 
      <td width=\"18%\"><b>1</b></td>
      <td width=\"30%\"> 
        <input type=\"text\" name=\"title1\" size=\"50\" maxlength=\"50\" value = \"$title1\">
      </td>
      <td width=\"20%\"> 
        <div align=\"center\"> 
          <select name=\"type1\">
";

        if($type1 == "A") {
	  	echo "
          <option value=\"A\" selected>Audio</option> "; }
		else {echo "
          <option value = \"A\">Audio</option>";}

		if($type1 == "P") {
	  	echo "
          <option value=\"P\" selected>Picture</option> "; }
		else {echo "
          <option value = \"P\">Picture</option>";}

		if($type1 == "V") {
	  	echo "
          <option value=\"V\" selected>Video</option> "; }
		else {echo "
          <option value = \"V\">Video</option>";}
		
        if($type1 == "F") {
          echo "
          <option value=\"F\" selected>Pdf</option> "; }
        else {echo "
          <option value = \"F\">Pdf</option>";}
		
        if($type1 == "N") {
	  	echo "
          <option value=\"N\" selected>None</option> "; }
		else {echo "
          <option value = \"N\">None</option>";}
		
		
echo "
       </select>
        </div>
      </td> 
      <td width=\"42%\"> 
        <input type=\"text\" name=\"comment1\" size=\"75\" maxlength=\"75\" value = \"$comment1\">
      </td>
    </tr>
    
    <tr> 
      <td width=\"8%\"><b>2</b></td>
      <td width=\"30%\"> 
        <input type=\"text\" name=\"title2\" size=\"50\" maxlength=\"50\" value = \"$title2\">
      </td>
      <td width=\"20%\"> 
        <div align=\"center\"> 
          <select name=\"type2\">
";

        if($type2 == "A") {
	  	echo "
          <option value=\"A\" selected>Audio</option> "; }
		else {echo "
          <option value = \"A\">Audio</option>";}

		if($type2 == "P") {
	  	echo "
          <option value=\"P\" selected>Picture</option> "; }
		else {echo "
          <option value = \"P\">Picture</option>";}

		if($type2 == "V") {
	  	echo "
          <option value=\"V\" selected>Video</option> "; }
		else {echo "
          <option value = \"V\">Video</option>";}

        if($type2 == "F") {
          echo "
          <option value=\"F\" selected>Pdf</option> "; }
        else {echo "
          <option value = \"F\">Pdf</option>";}

		if($type2 == "N") {
	  	echo "
          <option value=\"N\" selected>None</option> "; }
		else {echo "
          <option value = \"N\">None</option>";}
		
echo "
          </select>
        </div>
      </td>
      <td width=\"42%\"> 
        <input type=\"text\" name=\"comment2\" size=\"75\" maxlength=\"75\" value = \"$comment2\">
      </td>
    </tr>
    
    <tr> 
      <td width=\"8%\"><b>3</b></td>
      <td width=\"30%\"> 
        <input type=\"text\" name=\"title3\" size=\"50\" maxlength=\"50\" value = \"$title3\">
      </td>
      <td width=\"20%\"> 
        <div align=\"center\"> 
          <select name=\"type3\">
";
		if($type3 == "A") {
	  	echo "
          <option value=\"A\" selected>Audio</option> "; }
		else {echo "
          <option value = \"A\">Audio</option>";}

		if($type3 == "P") {
	  	echo "
          <option value=\"P\" selected>Picture</option> "; }
		else {echo "
          <option value = \"P\">Picture</option>";}

		if($type3 == "V") {
	  	echo "
          <option value=\"V\" selected>Video</option> "; }
		else {echo "
          <option value = \"V\">Video</option>";}

        if($type3 == "F") {
          echo "
          <option value=\"F\" selected>Pdf</option> "; }
        else {echo "
          <option value = \"F\">Pdf</option>";}

		
		if($type3 == "N") {
	  	echo "
          <option value=\"N\" selected>None</option> "; }
		else {echo "
          <option value = \"N\">None</option>";}
		
		

echo "

          </select>
        </div>
      </td>
      <td width=\"42%\"> 
        <input type=\"text\" name=\"comment3\" size=\"75\" maxlength=\"75\" value = \"$comment3\">   
      </td>
    </tr>   

<tr>
 <td colspan = \"4\">   
<BR>
 <p><B>Enter your links here:</B></p>
Link (1): <input type=\"text\" name=\"port_link1\" size=\"100\" maxlength=\"100\" value = \"$port_link1\"><BR> 
Link (2): <input type=\"text\" name=\"port_link2\" size=\"100\" maxlength=\"100\" value = \"$port_link2\"><BR>
Link (3): <input type=\"text\" name=\"port_link3\" size=\"100\" maxlength=\"100\" value = \"$port_link3\"><BR>

</td>        
</tr><    
    	<td colspan = \"4\"><BR>Turn Your Portfolio On/Off:  <select name=\"portfolio\">";


		if($portfolio == "Y") {
	  	echo "
          <option value=\"Y\" selected>On</option> "; }
		else {echo "
          <option value = \"Y\">On</option>";}

		if($portfolio == "N") {
	  	echo "
          <option value=\"N\" selected>Off</option> "; }
		else {echo "
          <option value = \"N\">Off</option>";}
    	
echo "    	
	</select>
    	</td>
    

    <tr align = \"center\"> 
      <td colspan=\"4\"> 
        <input type=\"submit\" value=\"Update Record\" name=\"submit\">

      </td>
    </tr>
    <tr>
    <BR> 
      <td colspan=\"4\" align = \"center\">Note: Titles and Comments are limited to 100 characters.
      <BR> 
      
<!--        There is a $20 fee for posting portfolios.</td> -->
    </tr>
  </table>
</form>
</body>
</html>
";
?>