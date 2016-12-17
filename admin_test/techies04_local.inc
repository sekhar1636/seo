<?php
#techies04_local.inc
#connect to the remote server

//----------------------------------connection - local
$connection = mysql_connect("127.0.0.1", "JayServer", "wombat") or die ("Couldn't connect to server.");


//-------------------------------select database - local
$db = mysql_select_db("mydata", $connection) or die("Couldn't select database.");

?>