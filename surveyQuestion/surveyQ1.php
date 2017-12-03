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
    <title>Employment Tracer: Question</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <style media="screen">
  .nav-tabs {border-color: #f2f2f4;}
  .img, span {display: block;margin: 0 auto;}
  .post {height: auto;}
  .page-header, h2 {margin-bottom: 0;margin-top: 0;padding-top: 10px;color: ;}
  .bgcolor {background-color: ;}
  .navcolor {background-color: #368cbf;border-bottom: 1px solid #f0ea62;}
  .font-white {color: #f2f2f4}
  .margin {padding-top: 30px;}
  .bg-white {background-color: white;}
  footer {background-color:#00133f;}

  </style>
  <body>
    <div class="page-header text-center bgcolor">
        <h2>Web-Based SSU Employment Tracer For 2013-2017 BSIS And BSIT Graduates</h2>
    </div>

    <nav class="navbar-primary navcolor ">
      <div class="container">
        <div class="navbar-header">
          <a href="../userhomepage.php" class="navbar-brand"><img src="pic/logoname.png" class="img-responsive" alt="" width="250" /></a>
        </div>
          <ul class="nav navbar-nav">
            <li><a href="../userhomepage.php" class="font-white">Home</a></li>
            <li style="background-color:#f2f2f4;"><a href="../surveyQuestion/surveyQ1.php">Take a Survey</a></li>
            <li><a href="../blog.php" class="font-white">Post Blog</a></li>
            <li class="droppdown"><a class="dropdown-toggle font-white" data-toggle="dropdown" href="#">Chart <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="../userchart/BSISResultCharts.php" class="font-white" class="font-white">BS Information System</a></li>
                  <li><a href="../userchart/BSISResultCharts.php" class="font-white" class="font-white">BS Information Technology</a></li>
            </li>
          </ul>
            <li><a class="font-white" href="#">Help</a></li>
            <li><a class="font-white" href="#">Policy</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
              <li><a href="../logout.php" class="font-white"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
          </ul>
      </div>
</nav>
<div class="container">
  <div class="row">
  <div class="col-sm-3  margin">
    <div class="col-sm-12">
      <p class="text-center">
        My Profile
      </p>
        <img src="pic/jake.jpg" alt="" class="img img-circle img-responsive img-thumbnail"  width="100"/>
        <?php if (!empty($user)): ?>
        <br>WELCOME <?= $user['email_address']; ?>
      </p>
  </div>
  <div class="col-sm-12">
    <div class="">

        <p class="text-uppercase  ">Student Information</p>
        <p>Name: <?= $user['Fullname'] ?></p><br>
        <p>Course: <?= $user['course'] ?></p><br>
        <p>Batch: <?= $user['yearBatch'] ?></p><br>
        <p>Gender: <?= $user['gender'] ?></p><br>
        <p>Civil Status: <?= $user['civil_status'] ?></p><br>
        <p>Birthday: <?= $user['birthdate'] ?></p><br>
        <p>Address: <?= $user['address'] ?></p><br>
        <br>
      <?php else: echo "YOU MUST LOG IN TO VISIT THE PAGE, REDIRECTING IN A MOMENT";
      header('Refresh: 0.1; url=index.php');?>
    <?php endif; ?>
      </div>
  </div>
</div>
<div class="col-sm-9" style="background-color: #f2f2f4;">
  <div class="">
    <h1>Survey Test Questions:</h1>
    <p class="text-danger"><i>Note: Input or Select Only  The Right Information Given Below. </i></p>
  </div>
</div>
<div class="well col-sm-9 bg-white">
  <div class="table-responsive">
    <?php

      echo "<h2>Question No 1:</h2>";
    echo "<table style='border: none;' class='table'>";
    echo "<br>";
    echo "<tr><th></th></tr>";

    class TableRows extends RecursiveIteratorIterator {
       function __construct($it) {
           parent::__construct($it, self::LEAVES_ONLY);
       }

       function current() {
           return "<td style='width:500px;border:none;font-size:20px;'>" . parent::current(). "</td>";
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
       $stmt = $conn->prepare("SELECT questionText FROM question_tbl where questionID=1");
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
       }
      }
    $QID = 1; //question number base from database

    if(isset($_POST['submit'])):
      $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
      $stmt = $con->prepare($sql);
      $stmt->bindParam(':QID', $QID);
      $stmt->bindParam(':rid', $rid);
      $stmt->bindParam(':answerText', $_POST['ans']);
      if($stmt->execute() && $_POST['ans']=='yes' ):
        header('Refresh:0.2; url= ../surveyQuestion/surveyQ2.php');
      elseif($stmt->execute() && $_POST['ans']=='no' ):
          header('Refresh:0.2; url= ../survey/endsurvey.php');
      else:
        echo "Please select the correct answer.";
      endif;
    endif;
    ?>
      <form class="form-horizontal" action="surveyQ1.php" method="post">
              <div class="radio">
                  <label for=""><input type="radio" name="ans" value="yes"> Yes</label>
              </div>
              <div class="radio">
                  <label for=""><input type="radio" name="ans" value="no"> No</label>
              </div>
              <br>
              <input type="submit" class="btn btn-md btn-success" name="submit" value="NEXT">
            </form>
     </div>
  </div>
</div>
<div class="modal fade" role="dialog" id="login">
    <div class="modal-dialog">
       <!--content-->
          <div class="modal-content" style="background-color:#f2f2f4;">
            <div class="modal-header" style="background-color:red;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" style="background-color:red;"></h4>
            </div>
            <div class="modal-body">
                  <h1 class="text-danger">Warning!!! You need to Finish the Survey</h1>
                       </div>
                    <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
  </div>
  </div>
  <footer>
    <div class="container-fluid">
      <nav class="navbar margin">
    <div class="container">
        <div class="col-sm-3">
          <ul class="nav ">
            <li class="active"><a href="#"><h2>Tracer Program</h2></a></li>
          </ul>
        </div>
        <div class="container">
            <div class="col-sm-3">
              <ul class="nav ">
                <li><a href="../underconstruction.html">About</a></li>
                <li><a href="../underconstruction.html">Facts</a></li>
                <li><a href="../underconstruction.html">Help</a></li>
                <li><a href="../underconstruction.html">Contact Us</a></li>
              </ul>
            </div>
                <div class="col-sm-3">
                  <ul class="nav ">
                    <li><a href="../underconstruction.html">About</a></li>
                    <li><a href="../underconstruction.html">Facts</a></li>
                    <li><a href="../underconstruction.html">Help</a></li>
                    <li><a href="../underconstruction.html">Contact Us</a></li>
                  </ul>
                </div>
                    <div class="col-sm-3">
                      <ul class="nav ">
                        <li><a href="../underconstruction.html">About</a></li>
                        <li><a href="../underconstruction.html">Facts</a></li>
                        <li><a href="../underconstruction.html">Help</a></li>
                        <li><a href="../underconstruction.html">Contact Us</a></li>
                      </ul>
                    </div>
    </div>
    </nav>
    </div>
</footer>
  </body>
</html>
