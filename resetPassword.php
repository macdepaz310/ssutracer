<?php
    if (isset($_GET["email"]) && isset($_GET["token"])) {
      require 'DBconnect/databaseMysqli.php';
      $connection = $db;

      $email = $connection->real_escape_string($_GET["email"]);
      $token = $connection->real_escape_string($_GET["token"]);

      $data = $connection->query("SELECT respondentID FROM personalinfo_tbl where email_address='$email' AND token='$token' ");

      if ($data->num_rows > 0){
        $str = "0123456789teamtalksmackimjakevincessutracer";
        $str = str_shuffle($str);
        $str = substr($str, 0, 15);

        $password = password_hash($str, PASSWORD_BCRYPT);

        $connection->query("UPDATE personalinfo_tbl SET password='$password', token='' where email_address='$email'");

        $teamemail = "ssuteamtalks@ssutracer.xyz\r\n";

         mail($email, "New Password", "This is you new password: $str", "From: $teamemail");

      }else{
        echo "Please check you link!";
      }
    }else {
      header('Location: index.php');
      exit();
    }

 ?>
