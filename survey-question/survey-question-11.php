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
    <title>SSU Trace: Survey Question 11</title>
    <link rel="icon" href="../favicon.png" type="images/png">
    <script type = "text/javascript" >
     function preventBack(){window.history.forward();}
      setTimeout("preventBack()", 0);
      window.onunload=function(){null};
  </script>
    <meta charset="utf-8">
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
                 <li class="active"><a href="survey-question-11.php">Take A Survey</a></li>
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
       $stmt = $conn->prepare("SELECT questionText FROM question_tbl where questionID=11");
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
    $QID = 11; //question number base from database

    if(isset($_POST['submit'])):
      $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
      $stmt = $con->prepare($sql);
      $stmt->bindParam(':QID', $QID);
      $stmt->bindParam(':rid', $rid);
      $stmt->bindParam(':answerText', $_POST['ans']);
      if($stmt->execute() ):
        header('Refresh: 0.2; url= ../survey-question/survey-question-12.php');
      else:
        echo "sorry";
      endif;
    endif;
    ?>
    <form class="form-horizontal" action="survey-question-11.php" method="post">
      <div class="radio">
        <label for="Computer/IT"><input type="radio" id="Computer/IT" name="ans" value="Computer/IT" required>Computer/IT</label>
      </div>
      <div class="radio">
        <label for="Agriculture, Hunting and Forestry"><input type="radio" id="Agriculture, Hunting and Forestry" name="ans" value="Agriculture, Hunting and Forestry" required>Agriculture, Hunting and Forestry</label>
      </div>
      <div class="radio">
        <label for="Fishing"><input type="radio" id="Fishing" name="ans" value="Fishing" required>Fishing</label>
      </div>
      <div class="radio">
        <label for="Mining and Quarrying"><input type="radio" id="Mining and Quarrying" name="ans" value="Mining and Quarrying" required>Mining and Quarrying</label>
      </div>
      <div class="radio">
        <label for="Electricity, Gas and Water Supply"><input type="radio" id="Electricity, Gas and Water Supply" name="ans" value="Electricity, Gas and Water Supply" required>Electricity, Gas and Water Supply</label>
      </div>
      <div class="radio">
        <label for="Construction"><input type="radio" id="Construction" name="ans" value="Construction" required>Construction</label>
      </div>
      <div class="radio">
        <label for="Hotel and Restaurants"><input type="radio" id="Hotel and Restaurants" name="ans" value="Hotel and Restaurants" required>Hotel and Restaurants</label>
      </div>
      <div class="radio">
        <label for="Transport; Storage and Communication"><input type="radio" id="Transport; Storage and Communication" name="ans" value="Transport; Storage and Communication" required>Transport; Storage and Communication</label>
      </div>
      <div class="radio">
        <label for="Financial Meditation"><input type="radio" id="Financial Meditation" name="ans" value="Financial Meditation" required>Financial Meditation</label>
      </div>
      <div class="radio">
        <label for="Real Estate; Renting and Allied Business Activities"><input type="radio" id="Real Estate; Renting and Allied Business Activities" name="ans" value="Real Estate; Renting and Allied Business Activities" required>Real Estate; Renting and Allied Business Activities</label>
      </div>
      <div class="radio">
        <label for="Public Administration and Defense; Compulsory Social Security"><input type="radio" id="Public Administration and Defense; Compulsory Social Security" name="ans" value="Public Administration and Defense; Compulsory Social Security" required>Public Administration and Defense; Compulsory Social Security</label>
      </div>
      <div class="radio">
        <label for="Education"><input type="radio" id="Education" name="ans" value="Education" required>Education</label>
      </div>
      <div class="radio">
        <label for="Health and Social Work"><input type="radio" id="Health and Social Work" name="ans" value="Health and Social Work" required>Health and Social Work</label>
      </div>
      <div class="radio">
        <label for="Other Community; Social and Personal Service Activities"><input type="radio" id="Other Community; Social and Personal Service Activities" name="ans" value="Other Community; Social and Personal Service Activities" required>Other Community; Social and Personal Service Activities</label>
      </div>
      <div class="radio">
        <label for="Private Household with employed persons"><input type="radio" id="Private Household with employed persons" name="ans" value="Private Household with employed persons" required>Private Household with employed persons</label>
      </div>
      <div class="radio">
        <label for="Extra Territorial Organization and Bodies"><input type="radio" id="Extra Territorial Organization and Bodies" name="ans" value="Extra Territorial Organization and Bodies" required>Extra Territorial Organization and Bodies</label>
      </div>
      <div class="radio">
        <label for="Wholesale and Retail Trade"><input type="radio" id="Wholesale and Retail Trade" name="ans" value="Wholesale and Retail Trade; repair of motor vehicles, motor cycles, and personal
  and household goods" required>Wholesale and Retail Trade; repair of motor vehicles, motor cycles, and personal
and household goods</label>
      </div><br>
      <input type="submit" name="submit" class="btn btn-success" value="Next">
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
