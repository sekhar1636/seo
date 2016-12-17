<?php
include("../admin11/session.inc");

?>

<html>
<head>
<title>StrawHat Admin Menu</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../styles/members.css" type="text/css">
</head>

<body>
<form name="receipt" method="post" action="rec_delete2.php">
  <table border="1" height="193" align="center" width="750">
    <tr> 
      <td><img src="../graphics03/straw99.gif" width="127" height="97"></td>
      <td> 
        <h1>DELETE RECEIPTS</h1>
      </td>
    </tr>
    <tr> 
      <td><b>Enter Actor ID: 
        <input name="sel_actor" tabindex="1" maxlength="4" size="5">
        <INPUT type="submit" value ="Select">
        </b></td>
      <td><a href="admin_menu.php">Back to Admin Menu</a>
      </td>  
    </tr>
  </table>
  </form>
</body>
</html>
