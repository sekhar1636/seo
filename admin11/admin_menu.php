<?php
session_start();
$_SESSION['sess_var'] = rand(1,10000);
?>    

<?php
echo "
<html>
<head>
<title>StrawHat Admin Menu</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
<link rel=\"stylesheet\" href=\"../styles/members.css\" type=\"text/css\">
</head>

<body>
<table width=\"75%\" border=\"0\" align=\"center\">
  <tr>
    <td><img src=\"../graphics03/straw99.gif\" width=\"127\" height=\"97\"></td>
    <td>
      <h1>StrawHat Administration Menu</h1>
      <a href=\"http://www.strawhat-auditions.com\">Back to StrawHat-Auditions</a> 
      
    </td>
  </tr>
</table>

<BR>

<table width=\"76%\" border=\"1\" height=\"193\" align=\"center\">
  <tr> 
    <td colspan=\"2\"><b>ADMINISTRATION MENU (Using the default database tables 
      that are emptied every year and reused)</b></td>
  </tr>
  <tr> 
    <td width=\"33%\"> 
      <div align=\"center\"><b>Tech Functions</b></div>
    </td>
    <td width=\"33%\"> 
      <div align=\"center\"><b>Actor Functions</b></div>
    </td>
  </tr>
  <tr> 
    <td width=\"33%\" height=\"116\"> 
      <ul>
        <li><a href=\"../TechEntry11/add_tech.htm\">Add techie to database</a> 
        <li><a href=\"../admin11/Tech/techie_modifyrecord.php\">Change techie files</a> 
        <li><a href=\"/Members11/Tech/techie_searchlastname.php\">Display list of techies by lastname</a> 
        <li><a href=\"/Members11/Tech/techie_searchcat.php\">Display list of techies by category</a> 
        <li><a href=\"/Members11/Tech/techie_portfolio.php\">Display list of portfolios</a> 
      </ul>
    </td>
    <td width=\"33%\" height=\"116\"> 
      <ul>
        <li> <a href=\"/Members11/member_entrya.php\"><font color=\"#FF0000\">Members Area</font></a>
        <li><a href=\"../admin11/actor_adminentry.php\"><font color=\"#FF0000\">Change Actor</font></a> 
        <li><a href=\"/admin11/rec.php\">Add Receipts</a> 
        <li><a href=\"/admin11/rec_change.php\">Change Reciepts</a> 
        <li><a href=\"/admin11/rec_delete.php\">Delete Reciepts</a> 
        <li><a href=\"/admin11/labels11.php\">Update Sched Table for Labels</a>
        <li><a href=\"/admin11/sched11_update.php\">Sched11 Update Table</a> 
      </ul>
    </td>
  </tr>
</table>


<BR>

<table width=\"76%\" border=\"1\" height=\"193\" align=\"center\">
  <tr> 
    <td width=\"33%\"> 
      <div align=\"center\"><b>Theatre Functions</b></div>
    </td>
    
    <td width=\"33%\"> 
      <div align=\"center\"><b>Misc Functions</b></div>
    </td>
  </tr>
  
  <tr>   
    <td width=\"33%\" height=\"144\"> 
      <ul>
        <li><a href=\"../TheatreEntry11/add_theatre.htm\">Add theatre to database</a> 
        <li><a href=\"/admin11/Theatre/theatre_modifyrecord.php\">Change theatre files</a> 
        <li><a href=\"/Members11/Theatres/theatres_searchname.php\">List of theatres</a>
         
      </ul>
    </td>
    
    <td width=\"33%\" height=\"144\"> 
      <ul>
        <li>TBA
        <li>TBA 
        <li>TBA
        <li>TBA
        <li>TBA
        <li>TBA
      </ul>
    </td>
  </tr>
</table>
";
?>