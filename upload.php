<?php
session_start();
include_once 'DBconnect/databaseMysqli.php';

$id = $_SESSION['currentUser'];
  if (isset($_POST['submit'])){
    $file = $_FILES['image'];
    $fileName = $_FILES['image']['name'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $fileType = $_FILES['image']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
          if ($fileSize < 1000000) {
            $fileNameNew = "profile".$id.".".$fileActualExt;
            $fileDestination = 'uploads/'.$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
            $sql = "UPDATE personalinfo_tbl SET image_status = 0 where email_address='$id';";
            $result = mysqli_query($db, $sql);
            header("Location: profile.php?uploadsuccess");
          }else {
            echo "Your file is too big!";
          }
        }else {
          echo "There was an error uploading your file";
        }
    }else {
      echo "You cannot upload files of this type!";
    }
  }
 ?>
