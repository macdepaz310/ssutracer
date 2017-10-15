<?php
session_start();

 require 'DBconnect/database.php';

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
    <title></title>
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
 .font-white {color: #f2f2f4}
 .margin {padding-top: 30px;}
  </style>
  <body>
    <div class="page-header text-center bgcolor">
        <h2>Information System and Information Technology Tracer System</h2>
        <p>Batch 2013-2017</p>
    </div>

    <nav class="navbar-primary navcolor">
      <div class="container">
        <div class="navbar-header">
          <a href="#" class="navbar-brand"><img src="pic/logoname.png" class="img-responsive" alt="" width="250" /></a>
        </div>
          <ul class="nav navbar-nav">
            <li style="background-color:#f2f2f4;"><a href="userhomepage.php">Home</a></li>
            <li><a href="surveyQuestion/surveyQ1.php" class="font-white">Take a Survey</a></li>
            <li><a href="blog.html" class="font-white">Post Blog</a></li>
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
      <?php else: echo "YOU MUST LOG IN TO VISIT THE PAGE, REDIRECTING IN A MOMENT";
             header('Refresh: 0.1; url=index.php');?>
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
<div class="col-sm-9 margin" style="background-color: #f2f2f4;height:800px;">
  <div class="row">
  <div class="col-sm-6 well">
    <h1 class="text-center">Bachelor of Science in Information System</h1>
    <input type="button" class="btn btn-primary" name="name" value="INFORMATION SYSTEM">
  </div>
  <div class="col-sm-6 well">
    <h1 class="text-center">Bachelor of Science in Information Technology</h1>
  </div>
  </div>
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
