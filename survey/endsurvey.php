<?php
  session_start();
  require '../DBconnect/database.php';

  if ( isset($_SESSION['currentUser'])){

    $records = $conn->prepare('SELECT respondentID, email_address, password FROM personalinfo_tbl WHERE email_address = :id');
    $records->bindParam(':id', $_SESSION['currentUser']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = NULL;

    if( count($results) > 0) {
      $user = $results;
    }
  }
  $msg = '';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Survey Page</title>
  </head>
  <body>
    <h1>THE SURVEY HAS ENDED</h1>
    <?php if (!empty($user)): ?>
    <br>WELCOME <?= $user['email_address']; ?>
    <br> You Logged In! <br>
    <a href="../logout.php">logout?</a>
  <?php else: echo "YOU MUST LOG IN TO VISIT THE PAGE, REDIRECTING IN A MOMENT";
         header('Refresh: 0.1; url=../index.php');?>

  <?php endif; ?>
  <br>
  <a href="../userhomepage.php">Back To Home</a>
  </body>
</html>
