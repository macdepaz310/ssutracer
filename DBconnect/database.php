<?php
$server ='localhost';
$username = 'root';
$password = '';
$database = 'u226789853_trcr';

try{
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);

}catch(PDOException $e){
  die("Connection Failed:" . $e->getmessage());
}
 ?>
