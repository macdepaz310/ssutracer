<?php
session_start();
// include database connection
include "DBconnect/database.php";

if ( isset($_SESSION['currentUser'])){

  $records = $conn->prepare('SELECT respondentID, email_address, password, personal_image FROM personalinfo_tbl WHERE email_address = :id');
  $records->bindParam(':id', $_SESSION['currentUser']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $user = NULL;

  if( count($results) > 0) {
    $user = $results;
    $rid = $user['respondentID'];
   }
  }
?>
<?php

$dbhost        = "localhost";

$dbname        = "u226789853_trcr";

$dbuser        = "root";

$dbpass        = "";

// database connection

$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);

// select the image
$query = "SELECT personal_image FROM personalinfo_tbl WHERE respondentID=".$_GET['respondentID'];
$stmt = $conn->prepare( $query );
$stmt->execute();

// bind the id of the image you want to select
$stmt->bindColumn(1, $personal_image, PDO::PARAM_LOB);

$stmt->fetch(PDO::FETCH_BOUND);
header("Content-Type: image/jpg");

echo $personal_image;
//
// // to verify if a record is found
// $num = $stmt->rowCount();
//
// if( $num ){
//     // if found
//     $row = $stmt->fetch(PDO::FETCH_ASSOC);
//
//     // specify header with content type,
//     // you can do header("Content-type: image/jpg"); for jpg,
//     // header("Content-type: image/gif"); for gif, etc.
//     header("Content-type: image/jpg");
//
//     //display the image data
//     print $row['data'];
//     exit;
// }else{
//     //if no image found with the given id,
//     //load/query your default image here
// }
?>
