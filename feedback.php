<?php
session_start();
include_once 'DBconnect/database.php';

if ( isset($_SESSION['currentUser'])){

  $records = $conn->prepare('SELECT respondentID, email_address, password FROM personalinfo_tbl WHERE email_address = :id');
  $records->bindParam(':id', $_SESSION['currentUser']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $user = NULL;

  if( count($results) > 0) {
    $user = $results;
    $rid = $user['respondentID'];
   $message = '';
   }
  }
  if(isset($_POST['submit'])):
    $sql = "INSERT INTO feedback_tbl (fb_respondent_id, feedbacktext) VALUES (:rid, :feedbacktext)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':feedbacktext', $_POST['feedback']);
    if($stmt->execute()):
      header('Refresh:5; url=userhomepage.php?feedbacksuccess');
      $message = "Thank you for the feedback! The admin will take care of your message.";
      else:
      echo "sorry";
    endif;
  endif;

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Feedback</title>
  </head>
  <body>
    <form class="" action="feedback.php" method="post">
      Feedback <br/><textarea name="feedback" rows="8" cols="80"></textarea><br>
      <input type="submit" name="submit" value="Submit Feedback">
    </form>
    <?php if (!empty($user)): ?>
  <?php else: echo "YOU MUST LOG IN TO VISIT THE PAGE, REDIRECTING IN A MOMENT";
         header('Refresh: 0.9; url=index.php');?>
  <?php endif; ?>
  <?php if(!empty($message)): ?>
    <?= $message ?>
  <?php endif; ?>

  </body>
</html>
