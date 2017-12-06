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
echo "<table style='border: none; width: 500px'>";
echo "<tr><th>Question</th></tr>";

class TableRows extends RecursiveIteratorIterator {
   function __construct($it) {
       parent::__construct($it, self::LEAVES_ONLY);
   }

   function current() {
       return "<td style='width:150px;border:none;'>" . parent::current(). "</td>";
   }

   function beginChildren() {
       echo "<tr>";
   }

   function endChildren() {
       echo "</tr>" . "\n";
   }
}



try {

   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $stmt = $conn->prepare("SELECT questionText FROM question_tbl where questionID=18");
   $stmt->execute();

   // set the resulting array to associative
   $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
   foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
       echo $v;
   }
}
catch(PDOException $e) {
   echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>
<?php
$server ='localhost';
$username = 'root';
$password = '';
$database = 'u226789853_trcr';

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
   }
  }
$QID = 18; //question number base from database
if(isset($_POST['submit']) && !empty($_POST['ans'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans']);
  if($stmt->execute() ):
     header('Refresh: 0.2; url= ../feedback.php');
  else:
    echo "sorry";
  endif;
endif;
if(isset($_POST['submit']) && !empty($_POST['ans1'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans1']);
  if($stmt->execute() ):
     header('Refresh: 0.2; url= ../feedback.php');
  else:
    echo "sorry";
  endif;
endif;
if(isset($_POST['submit']) && !empty($_POST['ans2'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans2']);
  if($stmt->execute() ):
     header('Refresh: 0.2; url= ../feedback.php');
  else:
    echo "sorry";
  endif;
endif;
if(isset($_POST['submit']) && !empty($_POST['ans3'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans3']);
  if($stmt->execute() ):
     header('Refresh: 0.2; url= ../feedback.php');
  else:
    echo "sorry";
  endif;
endif;
if(isset($_POST['submit']) && !empty($_POST['ans4'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans4']);
  if($stmt->execute() ):
     header('Refresh: 0.2; url= ../feedback.php');
  else:
    echo "sorry";
  endif;
endif;
if(isset($_POST['submit']) && !empty($_POST['ans5'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans5']);
  if($stmt->execute() ):
     header('Refresh: 0.2; url= ../feedback.php');
  else:
    echo "sorry";
  endif;
endif;

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Survey Page</title>
  </head>
  <body>
    <form class="" action="question18.php" method="post">
      <input type="checkbox" name="ans" value="Communication skills">Communication skills <br>
      <input type="checkbox" name="ans1" value="Human Relation skills">Human Relation skills <br>
      <input type="checkbox" name="ans2" value="Entrepreneurial skills">Entrepreneurial skills <br>
      <input type="checkbox" name="ans3" value="Information Technology skills">Information Technology skills <br>
      <input type="checkbox" name="ans4" value="Problem-solving skills">Problem-solving skills <br>
      <input type="checkbox" name="ans5" value="Critical Thinking skills">Critical Thinking skills <br>
      <input type="submit" name="submit" value="NEXT">
    </form>
    <?php if (!empty($user)): ?>
    <br>WELCOME <?= $user['email_address']; ?>
    <br> You Logged In! <br>
    <a href="logout.php">logout?</a>
  <?php else: echo "YOU MUST LOG IN TO VISIT THE PAGE, REDIRECTING IN A MOMENT";
         header('Refresh: 3; url=login.php');?>
    please  log in or register <br>
    <a href="login.php">log in</a> or
    <a href="register.php">Reg</a>

  <?php endif; ?>
  </body>
</html>
