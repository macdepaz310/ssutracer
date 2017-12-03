<?php
session_start();

 require 'DBconnect/database.php';

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
    <title>Employment Tracer: Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <style>
  body {}
 .nav-tabs {border-color: #f2f2f4;}
 .img, span {display: block;margin: 0 auto;}
 .post {height: auto;}
 .page-header, h2 {margin-bottom: 0;margin-top: 0;padding-top: 10px;color: ;}
 .bgcolor {background-color: ;}
 .navcolor {background-color: #368cbf;border-bottom: 1px solid #f0ea62;}
 .font-white {color: #f2f2f4;}
 .margin {padding-top: 30px;}
 footer {background-color:#00133f;}
 .tab-content {background-color: white;}
  </style>
  <body>
    <div class="page-header text-center bgcolor">
        <h2>Web-Based SSU Employment Tracer For 2013-2017 BSIS And BSIT Graduates</h2>
    </div>

    <nav class="navbar-primary navcolor">
      <div class="container">
        <div class="navbar-header">
          <a href="index.php" class="navbar-brand"><img src="pic/logoname.png" class="img-responsive" alt="" width="250" /></a>
        </div>
          <ul class="nav navbar-nav">
            <li style="background-color:#f2f2f4;"><a href="userhomepage.php">Home</a></li>
            <li><a href="surveyQuestion/surveyQ1.php" target="_blank" class="font-white">Take a Survey</a></li>
            <li><a href="blog.php" class="font-white">Post Blog</a></li>
            <li class="droppdown"><a class="dropdown-toggle font-white" data-toggle="dropdown" href="">Chart <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="userchart/BSISResultCharts.php">BS Information System</a></li>
                  <li><a href="userchart/BSITResultCharts.php">BS Information Technology</a></li>
                </ul>
            </li>
            <li><a href="#" class="font-white">Help</a></li>
            <li><a href="#" class="font-white">Policy</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
              <li><a href="logout.php" class="font-white"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
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
        <p class="text-center">
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
<div class="col-sm-9 margin" style="background-color: #f2f2f4;height:800px;">
    <ul class="nav nav-tabs">
       <li class="active"><a data-toggle="tab" href="#bsis">BS Inforation System</a></li>
       <li><a data-toggle="tab" href="#bsit">BS Information Technology</a></li>
    </ul>
    <div class="tab-content well">
      <div id="bsis" class="tab-pane fade in active">
            <h1>Bachelor of Science in Information System</h1>
            <div class="chart-container-fluid">
                <canvas id="ISchartQuestion5"></canvas>
              </div>
      </div>
      <div id="bsit" class="tab-pane fade">
            <h1>Bachelor of Science in Information Technology</h1>
            <div class="chart-container-fluid">
              <canvas id="ITchartQuestion5"></canvas>
            </div>
      </div>
    </div>
  </div>
</div>
  </div>

    </div>
</div>
<script src="charts/js/jquery.min.js"></script>
<script src="charts/js/Chart.min.js"></script>
<script src="charts/js/chartPieceLabel.js"></script>

<script src="charts/js/BSIScharts/BSISQ5chart.js"></script>
<script src="charts/js/BSITcharts/BSITQ5chart.js"></script>

<footer>
<div class="container-fluid">
  <nav class="navbar">
<div class="container">
    <div class="col-sm-3">
      <ul class="nav ">
        <li class="active"><a href="#"><h2>Tracer Program</h2></a></li>
          <li><a href="https://www.facebook.com/profile.php?id=100008170755849">Facebook Page</a></li>
      </ul>
    </div>
    <div class="container">
        <div class="col-sm-3">
          <ul class="nav ">
            <li><a href="#">About</a></li>
            <li><a href="#">Facts</a></li>
            <li><a href="#">Help</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul>
        </div>
            <div class="col-sm-3">
              <ul class="nav ">
                <li><a href="#">Account</a></li>
                <li><a href="#">Policy</a></li>
                <li><a href="#">Privacy</a></li>
                <li><a href="#">Security</a></li>
              </ul>
            </div>
                <div class="col-sm-3">
                  <ul class="nav ">
                    <li><a href="#">Question</a></li>
                    <li><a href="#">Recommendation</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Log Out</a></li>
                  </ul>
                </div>
</div>
</nav>
</div>
</footer>

  </body>
</html>
