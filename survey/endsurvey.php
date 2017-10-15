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
// echo "<table style='border: none;'>";
// echo "<tr><th>Question</th></tr>";
//
// class TableRows extends RecursiveIteratorIterator {
//    function __construct($it) {
//        parent::__construct($it, self::LEAVES_ONLY);
//    }
//
//    function current() {
//        return "<td style='width:150px;border:none;'>" . parent::current(). "</td>";
//    }
//
//    function beginChildren() {
//        echo "<tr>";
//    }
//
//    function endChildren() {
//        echo "</tr>" . "\n";
//    }
// }
//
//
//
// try {
//
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $stmt = $conn->prepare("SELECT questionText FROM question_tbl where questionID=6");
//    $stmt->execute();
//
//    // set the resulting array to associative
//    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
//        echo $v;
//    }
// }
// catch(PDOException $e) {
//    echo "Error: " . $e->getMessage();
// }
// $conn = null;
// echo "</table>";
// ?>
 <?php
// $server ='localhost';
// $username = 'root';
// $password = '';
// $database = 'ssutracer';
//
// try{
//     $con = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
//
// }catch(PDOException $e){
//   die("Connection Failed:" . $e->getmessage());
// }
// if ( isset($_SESSION['currentUser'])){
//
//   $records = $con->prepare('SELECT respondentID, email_address, password FROM personalinfo_tbl WHERE email_address = :id');
//   $records->bindParam(':id', $_SESSION['currentUser']);
//   $records->execute();
//   $results = $records->fetch(PDO::FETCH_ASSOC);
//
//   $user = NULL;
//
//   if( count($results) > 0) {
//     $user = $results;
//     $rid = $user['respondentID'];
//    }
//   }
// $QID = 6; //question number base from database
//
// if(isset($_POST['submit'])):
//   $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
//   $stmt = $con->prepare($sql);
//   $stmt->bindParam(':QID', $QID);
//   $stmt->bindParam(':rid', $rid);
//   $stmt->bindParam(':answerText', $_POST['ans']);
//   if($stmt->execute() ):
//     header('Refresh:0.2; url= ../survey/question7.php');
//   else:
//     echo "sorry";
//   endif;
// endif;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Survey Page</title>
  </head>
  <body>
    <h1>THE SURVEY HAS ENDED</h1>
    <!-- <form class="" action="question6.php" method="post">
      <input type="radio" name="ans" value="rank/clerical" required>Rank/Clerical<br>
      <input type="radio" name="ans" value="professional/advisory" required>Professional/Advisory<br>
      <input type="radio" name="ans" value="managerial/executive" required>Managerial/Executive<br>
      <input type="radio" name="ans" value="self-employed" required>Self-Employed<br>

      <input type="submit" name="submit" value="NEXT"> -->

    <!-- </form> -->
    <?php if (!empty($user)): ?>
    <br>WELCOME <?= $user['email_address']; ?>
    <br> You Logged In! <br>
    <a href="../logout.php">logout?</a>
  <?php else: echo "YOU MUST LOG IN TO VISIT THE PAGE, REDIRECTING IN A MOMENT";
         header('Refresh: 0.1; url=../index.php');?>
    please  log in or register <br>
    <a href="login.php">log in</a> or
    <a href="register.php">Reg</a>

  <?php endif; ?>
  </body>
</html>
