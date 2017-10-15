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
 ?>
<!DOCTYPE html>
<html>
  <head>
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
  </style>
  <body>
    <div class="page-header text-center bgcolor">
        <h2>Information System and Information Technology Tracer System</h2>
        <p>Batch 2013-2017</p>
    </div>

    <nav class="navbar-primary navcolor ">
      <div class="container-fluid">
        <div class="navbar-header">
          <a href="#" class="navbar-brand"><img src="pic/logoname.png" class="img-responsive" alt="" width="250" /></a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="" class="font-white" data-toggle="modal" data-target="#login">Home</a></li>
          <li style="background-color:#f2f2f4;"><a href="#" data-toggle="modal" data-target="#login">Take a Survey</a></li>
          <li><a href="blog.html" class="font-white" data-toggle="modal" data-target="#login">Post Blog</a></li>
          <li class="droppdown"><a class="dropdown-toggle font-white" data-toggle="dropdown" href="#">Chart <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="infosystemchart.html" class="font-white" class="font-white" data-toggle="modal" data-target="#login">BS Information System</a></li>
                <li><a href="infotechnologychart.html" class="font-white" class="font-white" data-toggle="modal" data-target="#login">BS Information Technology</a></li>
          </li>
        </ul>
          <li><a class="font-white" href="#" data-toggle="modal" data-target="#login">Help</a></li>
          <li><a class="font-white" href="#" data-toggle="modal" data-target="#login">Policy</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php" class="font-white" data-toggle="modal" data-target="#login"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
        </ul>
    </div>
</nav>
<div class="container-fluid">
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
  <?php else: echo "YOU MUST LOG IN TO VISIT THE PAGE, REDIRECTING IN A MOMENT";
         header('Refresh: ; url=index.php');?>
           <?php endif; ?>
  </div>
    <div class="col-sm-12">
      <div class="">
          <p class="text-uppercase  ">Student Information</p>
          <p>Age</p><br>
          <p>Gender</p><br>
          <p>Status</p><br>
          <p>Address</p><br>
          <p>Job Position</p><br>
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

      echo "<h2>Question No 2:</h2>";
    echo "<table style='border: none;' class='table'>";
    echo "<br>";
    echo "<tr><th></th></tr>";

    class TableRows extends RecursiveIteratorIterator {
       function __construct($it) {
           parent::__construct($it, self::LEAVES_ONLY);
       }

       function current() {
           return "<td style='width:150px;border:none;font-size:20px;'>" . parent::current(). "</td>";
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
       $stmt = $conn->prepare("SELECT questionText FROM question_tbl where questionID=2");
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
    $QID = 2; //question number base from database

    if(isset($_POST['submit'])):
      $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
      $stmt = $con->prepare($sql);
      $stmt->bindParam(':QID', $QID);
      $stmt->bindParam(':rid', $rid);
      $stmt->bindParam(':answerText', $_POST['ans']);
      if($stmt->execute() ):
        header('Refresh:0.2; url= ../surveyQuestion/surveyQ3.php');
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
        <form class="form-horizontal" action="surveyQ2.php" method="post">
          <div class="radio">
              <label for=""><input type="radio" name="ans" value="Regular" required>Regular</label>
          </div>
          <div class="radio">
              <label for=""><input type="radio" name="ans" value="Casual" required>Casual</label>
          </div>
          <div class="radio">
              <label for=""><input type="radio" name="ans" value="Temporary" required>Temporary</label>
          </div>
          <div class="radio">
              <label for=""><input type="radio" name="ans" value="Contractual" required>Contractual</label>
          </div>
          <div class="radio">
              <label for=""><input type="radio" name="ans" value="Self-Employed" required>Self-Employed</label>
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
<footer>
  <p>F</p>
  <p>O</p>
  <p>0</p>
  <p>T</p>
  <p>E</p>
  <p>R</p>
  <br>
  <p>H</p>
  <p>E</p>
  <p>R</p>
  <p>E</p>
</footer>
  </body>
</html>
