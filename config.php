<?php
    /****** Database Details *********/
    $host      = "localhost"; 
    $user      = "root"; 
    $pass      = ""; 
    $database  = "mikiry";
    $con       = mysql_connect($host,$user,$pass);

    if (!$con) {
        die('Could not connect: ' . mysql_error());
    }

    mysql_select_db($database,$con);  
    /*******************************/
?>