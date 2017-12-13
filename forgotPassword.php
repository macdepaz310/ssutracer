<?php
  if (isset($_POST['forgotPass'])) {
    require ('DBconnect/databaseMysqli.php');
    $connection = $db;

    $email = $connection->real_escape_string($_POST["email"]);

    $data = $connection->query("SELECT respondentID FROM personalinfo_tbl WHERE email_address='$email' ");

    if($data->num_rows >0){
      $str = "0123456789teamTalksmackimjakevincessutracer";
      $str = str_shuffle($str);
      $str = substr($str, 0,10);

      $url = "https://www.ssutracer.xyz/resetPassword.php?token=$str&email=$email";
      $teamemail = "teamtalks_mac@ssutracer.xyz\r\n";

       mail($email, "Reset Password", "To reset you password please visit this: $url", "From: $teamemail");

      $connection->query("UPDATE personalinfo_tbl SET token='$str' where email_address='$email'");
      header('Refresh: 2; url=forgotPassword.php');
      echo "Please check your email!";

    }else {
      echo "Please check your inputs OR email do not exist in the system";
    }
  }

 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Forgot Password</title>
  </head>
  <body>
    <form class="" action="forgotPassword.php" method="post">
      <input type="email" name="email" value="" placeholder="Email" required><br>
      <input type="submit" name="forgotPass" value="Request Password">
    </form>
  </body>
</html>
