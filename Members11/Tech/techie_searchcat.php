<?php
include("session.inc");
?>

<html>
<head>
<title>StrawHat Search Tech by Category</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="/styles/members.css">
</head>

<BODY BACKGROUND="../../graphics03/Bk10a.GIF">
<script src="navbar.js"></script>
<h1 align = "center">StrawHat Search by Category</h1>

<form name="form1" method="post" action="techie_searchcat2.php">
  <table width="59%" border="0" align = "center">
    <tr> 
      <td width="39%" align = "right">Search Category:</td>
      <td width="61%"> 
        <select name="jobs" size="1">
          <option>Other</option>
          <option>Accompanist</option>
          <option>Administration</option>
          <option>Box Office</option>
          <option>Carpentry</option>
          <option>Choreographer</option>
          <option>Company Manager</option>
          <option>Costume Design</option>
          <option>Director</option>
          <option>Electrics</option>
          <option>Graphics</option>
          <option>House Management</option>
          <option>Lighting Design</option>
          <option>Master Carpenter</option>
          <option>Master Electrician</option>
          <option>Musical Director</option>
          <option>Photography</option>
          <option>Properties</option>
          <option>Publicity</option>
          <option>Running Crew</option>
          <option>Scenic Artist</option>
          <option>Set Design</option>
          <option>Sewing/Wardrobe</option>
          <option>Sound</option>
          <option>Stage Management</option>
          <option>Stage Management-AEA</option>
          <option>Technical Director</option>
          <option>Video</option>
        </select>
      </td>
    </tr>
    <tr> 
      <td colspan="2" align = "center"> 
        <input type="submit" value="Search" name="submit">
      </td>
    </tr>
  </table>
  <br>
</form>
</body>
</html>
