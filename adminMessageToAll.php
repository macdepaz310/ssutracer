<?php
  // if (isset($_POST['sendToAll'])) {
    require ('DBconnect/databaseMysqli.php');
    $connection = $db;

    $result = $connection->query("SELECT email_address from personalinfo_tbl");

    $data = array();
    foreach ($result as $row) {
      $data[] = $row;
    }
    // $data = explode(",", $data); 
    //free memory associated with result
    $result->close();

    //close Connection
    $connection->close();

    //print data or show
    print json_encode($data);

  // }
  // else {
  //     echo "ERROR! Somethings Wrong...! Contact Developer Team!";
  //   }

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tracer Admin</title>
  </head>
  <body>
    <form class="" action="adminMessageToAll.php" method="post">
    <!-- Subject:<input type="text" name="subject" value=""><br> -->
    <!-- Message:<input type="text" name="message" value=""> -->
    <!-- <input type="text" name="message" value=""> -->
    <!-- <input type="submit" name="sendToAll" value="Send"> -->
  </form>
  </body>
</html>
