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
   $stmt = $conn->prepare("SELECT questionText FROM question_tbl where questionID=8");
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
$QID = 8; //question number base from database
if(isset($_POST['submit']) && !empty($_POST['ans'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans']);
  if($stmt->execute() ):
     header('Refresh: 5; url= ../survey/question9.php');
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
     header('Refresh: 5; url= ../survey/question9.php');
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
     header('Refresh: 5; url= ../survey/question9.php');
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
     header('Refresh: 5; url= ../survey/question9.php');
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
     header('Refresh: 5; url= ../survey/question9.php');
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
     header('Refresh: 5; url= ../survey/question9.php');
  else:
    echo "sorry";
  endif;
endif;
if(isset($_POST['submit']) && !empty($_POST['ans6'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans6']);
  if($stmt->execute() ):
     header('Refresh: 5; url= ../survey/question9.php');
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
    <form class="" action="question8.php" method="post">
      <input type="checkbox" name="ans" value="Advanced or further study">Advanced or further study <br>
        <input type="checkbox" name="ans1" value="Family concern and decided not to find a job">Family concern and decided not to find a job <br>
      <input type="checkbox" name="ans2" value="Health-related reason">Health-related reason <br>
      <input type="checkbox" name="ans3" value="Lack of work experience">Lack of work experience <br>
      <input type="checkbox" name="ans4" value="No job opportunity">No job opportunity<br>
      <input type="checkbox" name="ans5" value="did not look for a job">Did not look for a job <br>
      <input type="checkbox" name="ans6" value="other reason(s)">other reason(s) <br>
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
