<?php
include("../admin11/session.inc");
?>


<html>
<head>
<title>StrawHat Receipts Menu</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../styles/members.css" type="text/css">
</head>

<body background="../graphics03/Bk10a.GIF">
<form name="receipt" method="post" action="reca.php">
  <table border="1" height="193" align="center" width="750">
    <tr>
    
    <td><img src="../graphics03/straw99.gif" width="127" height="97">
    </td>
    <td>
        <h1>STRAWHAT RECEIPTS ENTRY FOR ACTORS</h1>
    </td>
  
  </tr>

  <tr> 
      <td><a href="admin_menu.php">Back to Admin Menu</a></td>
      <td></td> 
  </tr>
  <tr> 
      <td>UID: 
        <input type="text" name="actor_ID" tabindex="1">
    </td>
	  <td>Check Number: &nbsp; 
        <input type="text" name="check_no" maxlength="9" tabindex="2">
        <br>
        <br>
        Type of Payment: 
        <select name="item" tabindex="3">
          <option value="AR">Actor Registration</option>
          <option value="AA">Actor Audition</option>
          <option value="AC">Actor Change Audition</option>
          <option value="AB">Actor Bounced Check</option>
<!--      <option value="TR">Thea Registration</option>
          <option value="TC">Thea Callback Rm</option>
          <option value="TP">Thea Piano</option>
          <option value="BK">Audition Books</option>
          <option value="PT">Tech Portfolio</option>
          <option value="MT">Tech Music File</option>
          <option value="OT">Other</option> 
A/O 11/12/15 THE ITEMS BLANKED OUT ARE FOR THEATRE AND TECH RECIEPTS          
-->          
        </select>
        &nbsp;Other Amount: 
        <input type="text" name="other_amt" maxlength="9" size="9" tabindex="4">
        <br>
        <br>
        Memo: 
        <input type="text" name="memo" maxlength="30" size="30" tabindex="5">
      </td>
  </tr>
  <tr>
  	<td colspan = "2"><b>Enter Transaction: 
        <INPUT type="submit" value ="Input Reciept" tabindex="6">
        </b>
  	</td>
    
  </tr>
</table>
  </form>
</body>
</html>
