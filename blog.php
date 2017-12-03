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
    <title>Employment Tracer: Blog</title>
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
  </style>
  <body>
    <div class="page-header text-center">
      <h2>Web-Based SSU Employment Tracer For 2013-2017 BSIS And BSIT Graduates</h2>
    </div>
    <nav class="navbar-primary navcolor">
      <div class="container">
        <div class="navbar-header">
          <a href="userhomepage.php" class="navbar-brand"><img src="pic/logoname.png" class="img-responsive" alt="" width="250" /></a>
        </div>
          <ul class="nav navbar-nav">
            <li><a class="font-white" href="userhomepage.php">Home</a></li>
            <li><a class="font-white" href="surveyQuestion\surveyQ1.php">Take a Survey</a></li>
            <li style="background-color:#f2f2f4;"><a href="blog.php">Post Blog</a></li>
            <li class="droppdown"><a class="dropdown-toggle font-white" data-toggle="dropdown" href="#">Chart <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="userchart\BSISResultCharts.php">BS Information System</a></li>
                  <li><a href="userchart\BSITResultCharts.php">BS Information Technology</a></li>
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
<div class="col-sm-9 margin">
    <div class="well">
      <span>Micheal JakeBacuetes</span>
    <span class="text-info">Posted 11/12/17</span>
<div class="post" style="text-align: justify;background-color:white;">
<pre>
Hi Im micheal Jake Bacuetes
Who Wants A JOB??

Just Pm me Now!!
Urgent..
09501749400 call Me!
</pre>
            </div>
            <div class="post">
              <form class="form-horizontal" action="index.html" method="post">
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Comment</label>
                  <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="">
                  </div>
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="button" name="name" value="Submit"><br><br>
                        <a href="#">>>>>Reply......</a>
                    </div>
                </div>
              </form>
            </div>
        </div>
        <div class="well">
          <span class="text-info">Posted 11/09/16</span>
          <span>Mechelle Lopez Jayson</span>
                <div class="post" style="text-align: justify;background-color:white;">
    <pre>
    Hi Mechelle Lopez Jayson
    Who Wants A JOB for the position of Manager??

    Just Pm me Now!!
    Urgent..
    09501749400 call Me!
    </pre>
                </div>
                <div class="post">
                  <form class="form-horizontal" action="index.html" method="post">
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Comment</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" value="">
                        </div>
                        <div class="col-sm-offset-2 col-sm-10">
                          <input type="button" name="name" value="Submit"><br><br>
                          <a href="#">>>>>Reply......</a>
                        </div>
                    </div>
                  </form>
                </div>
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
              <li><a href="underconstruction.html">About</a></li>
              <li><a href="underconstruction.html">Facts</a></li>
              <li><a href="underconstruction.html">Help</a></li>
              <li><a href="underconstruction.html">Contact Us</a></li>
            </ul>
          </div>
              <div class="col-sm-3">
                <ul class="nav ">
                  <li><a href="underconstruction.html">About</a></li>
                  <li><a href="underconstruction.html">Facts</a></li>
                  <li><a href="underconstruction.html">Help</a></li>
                  <li><a href="underconstruction.html">Contact Us</a></li>
                </ul>
              </div>
                  <div class="col-sm-3">
                    <ul class="nav ">
                      <li><a href="underconstruction.html">About</a></li>
                      <li><a href="underconstruction.html">Facts</a></li>
                      <li><a href="underconstruction.html">Help</a></li>
                      <li><a href="underconstruction.html">Contact Us</a></li>
                    </ul>
                  </div>
  </div>
  </nav>
  </div>
</footer>

  </body>
</html>
