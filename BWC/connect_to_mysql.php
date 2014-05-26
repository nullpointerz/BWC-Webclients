<?php
//author William Bergendahl
//this file is reused in all the other php files and contains the neccesary database information needed for the script to connect to the database.
$con=mysql_connect("localhost", "root", "" ); //sets host, username and password
if (!$con) { die('could not connect: ' .mysql_error()); }
mysql_select_db("BWC", $con);  //selects database
?>