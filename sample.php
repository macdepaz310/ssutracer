<?php
session_start();
$server ='localhost';
$username = 'root';
$password = '';
$database = 'ssutracer';

try{
    $con = new PDO("mysql:host=$server;dbname=$database;", $username, $password);

}catch(PDOException $e){
  die("Connection Failed:" . $e->getmessage());
}
if ( isset($_SESSION['currentUser'])){

  $records = $con->prepare('SELECT respondentID, email_address, password FROM personalinfo_tbl WHERE email_address = :id');
  $records->bindParam(':id', $_SESSION['currentUser']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $user = NULL;

  if( count($results) > 0) {
    $user = $results;
    $rid = $user['respondentID'];
     echo $user['email_address']." is logged in";
   }
  }
$QID = 1;

if(isset($_POST['submit'])):
  $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
  $stmt = $con->prepare($sql);
  $stmt->bindParam(':QID', $QID);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':answerText', $_POST['q1']);
  if($stmt->execute() ):
    header('Refresh:0.2; url= index.php');
  else:
    echo "sorry";
  endif;
endif;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ResponseToQuestion</title>

    <form class="" action="sample.php" method="post">
      Yes<input type="radio" name="q1" value="yes">
      No<input type="radio" name="q1" value="no">
      <!-- <input type="submit" name="yes" value="Yes">
      <input type="submit" name="no" value="No"> -->
      <input type="submit" name="submit" value="">

    </form>
  </head>
  <body>

  </body>
</html>
