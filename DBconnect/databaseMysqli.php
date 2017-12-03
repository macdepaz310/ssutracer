<?php
$dbHost     = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName     = 'u226789853_trcr';

//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if($db->connect_error){
    die("Connection failed: " . $db->connect_error);
}
 ?>
