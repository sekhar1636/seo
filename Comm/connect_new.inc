<?php

//create connection

//connection - remote
$connection = mysql_connect("localhost", "strawh5", "strawh5_phpb1") or die ("Couldn't connect to server.");

//select database - remote
$db = mysql_select_db("strawh5_phpb1", $connection) or die("Couldn't select database.");
//------------------------------end of database options

?>