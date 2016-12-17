<?php
//sched11_update2.php

//include("../admin11/session.inc");
include("admin_banner.inc");    
include("../Comm/connect.inc");



//$order_by_num = $_POST['order_by_num'];        
$sched_uid = $_POST['sched_uid'];              
$name = $_POST['name'];         
$time = $_POST['time'];            
$day = $_POST['day']; 
$type = $_POST['type'];
$standby = $_POST['standby'];
$label = $_POST['label'];
$availfor = $_POST['availfor'];
$availto = $_POST['availto'];
$comments = $_POST['comments'];
$callbacks = $_POST['callbacks'];


//trim, addslashes !!
$order_by_num = addslashes(trim($order_by_num));
$sched_uid = addslashes(trim($sched_uid));
$name = addslashes(trim($name));
$time = addslashes(trim($time));
$day = addslashes(trim($day));
$type = addslashes(trim($type));
$standby = addslashes(trim($standby));
$label = addslashes(trim($label));
$availfor = addslashes(trim($availfor));
$availto = addslashes(trim($availto));
$comments= addslashes(trim($comments));
$callbacks= addslashes(trim($callbacks));




/*
$sql_update = "UPDATE sched11 SET
order_by_num=\"$order_by_num\",
name=\"$name\",
time=\"$time\",
day=\"$day\",
type=\"$type\"'
standby=\"$standby\",
label=\"$label\",
availfor=\"$availfor\",
availto=\"$availto\",
comments=\"$comments\",
callbacks=\"$callbacks\"
WHERE sched_uid=\"$sched_uid\"
";
*/
$sql_update = "UPDATE sched11 SET
order_by_num=\"$order_by_num\",
name=\"$name\",
time=\"$time\",
day=\"$day\",
type=\"$type\"'
standby=\"$standby\",
label=\"$label\",
availfor=\"$availfor\",
availto=\"$availto\",
comments=\"$comments\",
callbacks=\"$callbacks\"
WHERE sched_uid=\"$sched_uid\"
";

 
//execute SQL query and get result    
$sql_update_result = mysql_query($sql_update, $connection) or 
die("Couldn't execute query sql_update.</B> If you see this message, try removing quotes or other special characters from your entries. If you still have trouble please contact us at StrawHat Auditions. Go to the Contact Page for info. 
Use your Back button on your browser to return to the previous form.");


if (!$sql_update_result) {
    echo "<P>Couldn't update record!</P>";
    } 

else {    

echo "
<HTML>
<HEAD>
<TITLE>Schedule 11 Update Information</TITLE>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
<link rel=\"stylesheet\" href=\"../styles/members.css\" type=\"text/css\">
</HEAD>


";
include("banner.inc");

echo "    
<body background=\"..\/graphics03/Bk10a.GIF\">

<h1 align = \"center\">Update your Sched11 Information:</h1>      
<h2 align = \"center\">You have made these changes: </h1>

  <table width=\"75%\" border=\"0\" align=\"center\">
    <tr> 
      <th align=\"left\"><Order_by_Num</th>
      <th align=\"left\">Sched_uid</th>
      <th align=\"left\">Name</th>
      <th align=\"left\">Time</th>
      <th align=\"left\">Standby</th>
      <th align=\"left\">Label</th>
      <th align=\"left\">Availfor</th>
      <th align=\"left\">Availto</th>
      <th align=\"left\">Callbacks</th>      
    </tr>
    
    <tr> 
      <td>$order_by_num</td>
      <td>$sched_uid</td>
      <td>$name</td>
      <td>$time</td>
      <td>$standby</td>
      <td>$label</td>
      <td>$availfor</td>
      <td>$availto</td>
      <td>$callbacks</td>      
    </tr>
</TABLE>    
    
<P align = \"center\"><INPUT type=\"submit\" value =\"Done\">     
</BODY>
</HTML>
";
}
?>