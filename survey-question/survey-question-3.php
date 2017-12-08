<?php
session_start();

 require '../DBconnect/database.php';

 if ( isset($_SESSION['currentUser'])){

    $records = $conn->prepare("SELECT respondentID, email_address, CONCAT(first_name,' ',middle_initial,'. ',last_name) AS Fullname, course, yearBatch, gender, civil_status, birthdate, address, password FROM personalinfo_tbl WHERE email_address = :id");
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
    <title>SSU Trace: Survey Question 3</title>
    <link rel="icon" href="../favicon.png" type="images/png">
    <meta charset="utf-8">
    <script type = "text/javascript" >
     function preventBack(){window.history.forward();}
      setTimeout("preventBack()", 0);
      window.onunload=function(){null};
  </script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="charts/css/default.css">
    <style>
    body {color: #777;}
    .container-fluid {margin: 0; padding: 0;}
    .affix {top: 0;width: 100%;z-index: 9999 !important;}
    .affix + .container-fluid {padding-top: 70px;}
li a:hover {border-bottom: 1px solid yellow;};
    </style>
  </head>
 <body>
   <div class="container-fluid" style="background-color:#777;color:#fff;height:65px;">
     <div class="container">
       <h2>Web-Based SSU Employment Tracer For 2013-2017 BSIS And BSIT Graduates</h2>
     </div>
   </div>
    <nav class="navbar navbar-default" data-spy="affix" data-offset-top="65">
        <div class="container-fluid">
          <div class="container">
             <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
               </button>
               <a href="#" onclick="document.getElementById('warning').style.display='block'" class="navbar-brand color">SSU Tracer</a>
             </div>

             <div>
             <div class="collapse navbar-collapse" id="myNavbar">
               <ul class="nav navbar-nav">
                 <li class="active"><a href="survey-question-3.php">Take A Survey</a></li>
                 <li><a href="#" onclick="document.getElementById('warning').style.display='block'">Charts</a></li>
                 <li><a href="#" onclick="document.getElementById('warning').style.display='block'">Feedback</a></li>
               </ul>
               <ul class="nav navbar-nav navbar-right">
                 <li><a href="#" onclick="document.getElementById('warning').style.display='block'"><span class="glyphicon glyphicon-user"> My Profile</span></a></li>
                 <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"> Log-Out </span></a></li>

               </ul>
             </div>
           </div>
        </div>
        </div>
    </nav>
  <div class="container" style="">
    <div class="col-sm-3">
     <?php
       require '../DBconnect/database.php';
          if ( isset($_SESSION['currentUser'])){
           $records = $conn->prepare("SELECT respondentID, email_address, CONCAT(first_name,' ',middle_initial,'. ',last_name) AS Fullname, course, yearBatch, gender, civil_status, birthdate, address, password FROM personalinfo_tbl WHERE email_address = :id");
           $records->bindParam(':id', $_SESSION['currentUser']);
           $records->execute();
           $results = $records->fetch(PDO::FETCH_ASSOC);
           $user = NULL;
             if( count($results) > 0) {
               $user = $results;
               $rid = $user['email_address'];
                 }
              }
           $msg = '';
           ?>
    <?php
      include_once '../DBconnect/databaseMysqli.php';
        $sql = "SELECT * from personalinfo_tbl where email_address='$rid'";
        $res = mysqli_query($db, $sql);
        if (mysqli_num_rows($res) > 0){
          while ($row = mysqli_fetch_assoc($res) ) {
            $id = $row['email_address'];
            $sqlImg = "SELECT * FROM personalinfo_tbl WHERE email_address = '$id'";
            $resImg = mysqli_query($db, $sqlImg);
            while ($rowImg = mysqli_fetch_assoc($resImg)) {
              echo "<div>"; //profileImage
                if ($rowImg['image_status'] == 0) {
                  echo "<img class='img-rounded' src='../uploads/profile".$id.".jpg?'".mt_rand()." style='width:100%;'>";
                }else {
                  echo "<img src='uploads/defaultprofile.png'>";
                }
              echo "</div>";
            }

          }
        }else {
          echo "there are no users yet!";
        }
       ?>
       <p class="text-capitalize"><?php if (!empty($user)): ?>
       <br><?= $user['Fullname']; ?></p>
     <p class="text-capitalize">Course: <?= $user['course'] ?></p>
     <p class="text-capitalize">Batch: <?= $user['yearBatch'] ?></p><br>
<?php else: echo "YOU MUST LOG IN TO VISIT THE PAGE, REDIRECTING IN A MOMENT";
header('Refresh: 0.1; url=index.php');?>
<?php endif; ?>
</div>
<!--   *******************************************************************************************survey  -->
<div class="col-sm-9">
  <h4 id="warning" style="display:none;" class="text-warning">Finish The Survey First Before Accessing Other Pages!</h4>
  <p><i>It takes a minute to finish a survey</i><//p>
    <h3></h3>
<div class="well">
  <div class="">
    <?php
    echo "<table style='border: none;'>";
    echo "<tr><th>Question:</th></tr>";

    class TableRows extends RecursiveIteratorIterator {
       function __construct($it) {
           parent::__construct($it, self::LEAVES_ONLY);
       }

       function current() {
           return "<td style='border:none;'>" . parent::current(). "</td>";
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
       $stmt = $conn->prepare("SELECT questionText FROM question_tbl where questionID=3");
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
    $QID = 3; //question number base from database

    if(isset($_POST['submit'])):
      $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
      $stmt = $con->prepare($sql);
      $stmt->bindParam(':QID', $QID);
      $stmt->bindParam(':rid', $rid);
      $stmt->bindParam(':answerText', $_POST['ans']);
      if($stmt->execute() ):
        header('Location: ../survey-question/survey-question-17.php');
      else:
        echo "sorry";
      endif;
    endif;
    ?>
    <form class="form-horizontal" action="survey-question-3.php" method="post">
        <div class="radio">
          <br><label for="8,000"><input type="radio" id="8,000" name="ans" value="8,000 below" required>8,000 Below</label>
        </div>
        <div class="radio">
          <label for="8,000-15,000"><input type="radio" id="8,000-15,000" name="ans" value="8,000-15,000" required>8,000-15,000</label>
        </div>
        <div class="radio">
          <label for="15,000-25,000"><input type="radio" id="15,000-25,000" name="ans" value="15,000-25,000" required>15,000-25,000</label>
        </div>
        <div class="radio">
          <label for="25,000"><input type="radio" id="25,000" name="ans" value="25,000 above" required>25,000 Above</label>
        </div>
      <br>  <input type="submit" name="submit" class="btn btn-success" value="Next">
      </div>
    </form>
  </div>
</div>
</div>
<!-- *****************************************************************************************end survey -->
  </div>

<script src="charts/js/jquery.min.js"></script>
<script src="charts/js/Chart.min.js"></script>
<script src="charts/js/chartPieceLabel.js"></script>
<script src="charts/js/BSIScharts/BSISQ5chart.js"></script>
<script src="charts/js/BSITcharts/BSITQ5chart.js"></script>
<!-- END OF GRAPH -->
<hr>
<footer class="container">
  <h2>SSU Tracer</h2><p>&copy; 2017 Samar State University Information System and Information Technology Tracer</p>
</footer>
  </body>
</html>
