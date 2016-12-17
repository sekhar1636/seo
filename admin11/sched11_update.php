<?php
include("../admin11/session.inc");
//sched11_update.php
?>

<HTML>
<HEAD>
<TITLE>Schedule 11 Update Information</TITLE>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
<link rel="stylesheet" href="../styles/members.css" type="text/css">
</HEAD>

<body background="../graphics03/Bk10a.GIF">

<?php
include("admin_banner.inc");	
include("../Comm/connect.inc");


echo "<h1 align = \"center\">Update your Sched11 Information:</h1>";

//SQL statement to select record
$sql = "SELECT * FROM sched11";

//execute SQL query and get result	
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute query.");
//echo "$sql_result";

if (!$sql_result) {
	echo "<P>Couldn't get record!</P>";
	} else {
//fetch row and assign to variables
while($row = mysql_fetch_array($sql_result) ) {
$order_by_num = $row["order_by_num"];                     
$sched_uid = $row["sched_uid"];             
$name = $row["name"];                       
$time = $row["time"];                       
$day = $row["day"];                         
$type = $row["type"];                       
$standby = $row["standby"];                 
$label = $row["label"];                     
$availfor = $row["availfor"];               
$availto = $row["availto"];                
$comments = $row["comments"];               
$callbacks = $row["callbacks"];             


echo "
<FORM method = \"POST\" action = \"sched11_update2.php\">;
<input type=\"hidden\" name=\"sched_uid\" value=\"$sched_uid\">";

echo "
  <table width=\"90%\" border=\"0\" cellspacing=\"1\" cellpadding=\"1\" align=\"center\">
    <tr bgcolor=\"#FFCC00\"> 
      <td colspan=\"12\"> 
        <!-- <div align=\"center\"><b>Sched 11 update:</b></div> -->
      </td>
    </tr>
    <tr> 
      <td width=\"2%\"><b><u>order_by_num</u></b></td>
      <td width=\"2%\"><b><u>sched_uid</u></b></td>
      <td width=\"10%\"><b><u>name</u></b></td>
      <td width=\"5%\"><b><u>time</u></b></td>
      <td width=\"5%\"><b><u>day</u></b></td>
      <td width=\"5%\"><b><u>type</u></b></td>
      <td width=\"5%\"><b><u>standby</u></b></td>
      <td width=\"5%\"><b><u>label</u></b></td>
      <td width=\"5%\"><b><u>availfor</u></b></td>
      <td width=\"5%\"><b><u>availto</u></b></td>
      <td width=\"20%\"><b><u>comments</u></b></td>
      <td width=\"10%\"><b><u>callbacks</u></b></td>
    </tr>
    
    
    <tr> 
      <td width=\"2%\"> 
        <input type=\"text\" name=\"order_by_num\" size=\"4\" value=\"$order_by_num\">
      </td>
      
      <td width=\"2%\"> 
        <input type=\"text\" name=\"sched_uid\" size=\"4\" value=\"$sched_uid\">
      </td>
      
      <td width=\"10%\"> 
        <input type=\"text\" name=\"name\" size=\"25\" value=\"$name\">
      </td>
      
      <td width=\"5%\"> 
        <input type=\"text\" name=\"time\" size=\"10\" value=\"$time\">
      </td>
      
      <td width=\"5%\"> 
        <input type=\"text\" name=\"day\" size=\"3\" value=\"$day\">
      </td>
      
      <td width=\"5%\">  
        <input type=\"text\" name=\"type\" size=\"2\" value=\"$type\">
      </td>
      
      <td width=\"5%\">    
        <input type=\"text\" name=\"standby\" size=\"2\" value=\"$standby\">
      </td>
        
      <td width=\"5%\">      
        <input type=\"text\" name=\"label\" size=\"10\" value=\"$label\">
      </td>
      
      <td width=\"5%\">      
        <input type=\"text\" name=\"availfor\" size=\"10\" value=\"$availfor\">
      </td>
        
       <td width=\"5%\">       
        <input type=\"text\" name=\"availto\" size=\"10\" value=\"$availto\">
      </td>
      
      <td width=\"5%\">       
        <input type=\"text\" name=\"comments\" size=\"20\" value=\"$comments\">
      </td>
      
      <td width=\"5%\">       
        <input type=\"text\" name=\"callbacks\" size=\"10\" value=\"$callbacks\">
      </td>      
</tr>

<tr>
      <td colspan=\"10\">
      <BR> 
        <div align=\"center\">
          <input type=\"submit\" value=\"Change Record\" name=\"submit\">
      <BR>  
        </div>
      </td>
    </tr>
  </table>

</FORM>
</BODY>
</HTML>
";
    }
}
?>