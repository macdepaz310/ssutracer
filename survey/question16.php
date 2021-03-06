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
echo "<table style='border: none;'>";
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
   $stmt = $conn->prepare("SELECT questionText FROM question_tbl where questionID=16");
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
$QID = 16; //question number base from database

if(isset($_POST['submit'])):
  $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
  $stmt = $con->prepare($sql);
  $stmt->bindParam(':QID', $QID);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':answerText', $_POST['ans']);
  if($stmt->execute() ):
    header('Refresh:0.2; url= ../survey/question4.php');
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
    <form class="" action="question16.php" method="post">
      <input type="radio" name="ans" value="Less than a month" required>Less than a month<br>
      <input type="radio" name="ans" value="1 to 7 months" required>1 to 7 months<br>
      <input type="radio" name="ans" value="7 to 11 months" required>7 to 11 months<br>
      <input type="radio" name="ans" value="1 year to less than 2 years" required>1 year to less than 2 years<br>
      <input type="radio" name="ans" value="2 years to less than 3 years" required>2 years to less than 3 years<br>
      <input type="radio" name="ans" value="3 years to less than 5 years" required>3 years to less than 5 years<br>

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
