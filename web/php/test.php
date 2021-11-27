<?php

 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = '';
 $db = "user_regs";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 echo "Connected Successfully";


   
?>