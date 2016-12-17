<?php

//create connection
//----------------------------------connection - local
//$connection = mysql_connect("127.0.0.1", "JayServer", "wombat") or die ("Couldn't connect to server.");

//connection - remote
$connection = mysql_connect("db2.thebook.com", "strawhat", "sFM2hvnG3jAv4N") or die ("Couldn't connect to server.");

//-------------------------------select database - local
//$db = mysql_select_db("mydata", $connection) or die("Couldn't select database.");

//select database - remote
$db = mysql_select_db("strawhat_auditions", $connection) or die("Couldn't select database.");
//------------------------------end of database options

?>