<?php

//create connection

//connection - remote
$connection = mysql_connect("localhost", "strawhat", "J7c25s57Wombat") or die ("Couldn't connect to server.");

//select database - remote
$db = mysql_select_db("strawhat_straw2011", $connection) or die("Couldn't select database.");
//------------------------------end of database options

?>