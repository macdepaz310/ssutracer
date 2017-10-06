<?php
  session_start();

  if( isset($_SESSION['currentUser']) ){
    header('Location: index.php');
  }

  require 'DBconnect/database.php';

  if(!empty($_POST['email']) && !empty($_POST['pwd'])):

    $records = $conn->prepare('SELECT respondentID, email_address, password FROM personalinfo_tbl WHERE email_address = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if(count($results) > 0 && password_verify($_POST['pwd'], $results['password']) ){
      $_SESSION['currentUser'] = $results['email_address'];
      $message = 'Succesfuly logged in';
    header('Refresh: 1; url=index.php');
  } else {
    $message = 'Sorry';
  }

endif;
 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>log in page</title>
  </head>
  <body>
    <h1>log in</h1>
    <?php if(!empty($message)): ?>
      <p><?= $message ?></p>
    <?php endif; ?>
    <form class="" action="login.php" method="post">
      <input type="email" name="email" placeholder="Email@example.com" autofocus required>
      <input type="password" name="pwd" placeholder="password" required>
      <input type="submit" name="" value="Log In">
    </form>
  </body>
</html>
