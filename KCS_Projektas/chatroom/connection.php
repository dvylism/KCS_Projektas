<?php

$servername = "localhost";
$username = "projektas";
$password = "qwerasdf1";
try {
    $con = new PDO("mysql:host=$servername;dbname=chatroomdb", $username, $password);
    // set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "Connected successfully";
    }
catch(PDOException $e)
   {
   echo "Connection failed: " . $e->getMessage();
   }

function formatDate($date){
	return date('g:i a', strtotime($date));
}
?>
