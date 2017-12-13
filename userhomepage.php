<?php
session_start();

 require 'DBconnect/database.php';

 if ( isset($_SESSION['currentUser'])){

    $records = $conn->prepare("SELECT respondentID, email_address, CONCAT(first_name,' ',middle_initial,'. ',last_name) AS Fullname, course, yearBatch, gender, civil_status, birthdate, address, password FROM personalinfo_tbl WHERE email_address = :id");
   $records->bindParam(':id', $_SESSION['currentUser']);
   $records->execute();
   $resultss = $records->fetch(PDO::FETCH_ASSOC);

   $users = NULL;


   if( count($resultss) > 0) {
     $users = $resultss;
     $ridd = $users;
   }
 }else{
   header('Location: index.php');
 }
$msg = '';

 ?>

<!DOCTYPE html>
<html>
<head>
<title>SSU Tracer</title>
<link rel="shortcut icon" href="https://www.ssutracer.xyz/favicon.ico" type="images/x-icon">
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
li a:hover {border-bottom: 1px solid yellow;}
.text-capitalize {text-transform: capitalize;}
</style>
</head>
<body>
<div class="container-fluid" style="background-color:#777;color:#fff;">
<div class="container">
<h4 class="text-justify">Web-Based SSU Employment Tracer For 2013-2017 BSIS And BSIT Graduates</h4>
</div>
</div>
<nav class="navbar navbar-default" data-spy="affix" data-offset-top="197">
<div class="container-fluid">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a href="userhomepage.php" class="navbar-brand">SSU Tracer</a>
</div>
<div>
<div class="collapse navbar-collapse" id="myNavbar">
<ul class="nav navbar-nav">
<li><a href="#" data-toggle="modal" data-target="#survey">Take A Survey</a></li>
<li><a href="#">Charts</a></li>
<li><a href="feedback.php">Feedback</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
<li><a href="profile-information.php"><span class="glyphicon glyphicon-user"> My Profile</span></a></li>
<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> Log-Out </span></a></li>
</ul>
</div>
<!-- survey modat -->
<div class="modal fade" role="dialog" id="survey">
          <div class="modal-dialog">
             <!--content-->
                <div class="modal-content ">
                  <div class="modal-header well">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <p class="text-warning">Note: Read First Before Continuing.</p>
                  </div>
                  <div class="modal-body">
                          <!-- FORM FOR USER LOG IN -->
                              <form class="form-horizontal" action="deleteSurvey.php" method="post">
                                <p>1. If this is your <b class="bg-warning">FIRST TIME</b> to survey please proceed..</p>
                                <p class="text-justify;">2. If <b class="bg-warning">NOT,</b></danger> all data that you put last survey will be <b>DELETED</b> and <b>UPDATE</b> if you want to proceed...</p>
                                <p>3. You can't <b class="bg-warning">VISIT</b> other web pages unless you <b class="bg-warning">FINISH</b> all the survey question.</p>
                                <input type="submit" class="btn btn-primary" name="submit" value="Continue">
                               </form>
                             </div>
                          <div class="modal-footer well">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end survey modal -->
</div>
</div>
</div>
</nav>
<div class="container">
<div class="col-sm-9">
  <div class="well">
    <div class="row">
      <div class="col-sm-6">
        <div class="thumbnail">
          <a href=""><img src="profits(3).png" alt="" />
            <div class="caption">
              <p class="text-center">BS Information System</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="thumbnail">
          <a href=""><img src="growth(2).png" alt="" />
            <div class="caption">
              <p class="text-center">BS Information System</p>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-sm-3">
  <div class="well">
          <?php
             require 'DBconnect/database.php';
                if ( isset($_SESSION['currentUser'])){
                 $records = $conn->prepare("SELECT respondentID, email_address, CONCAT(first_name,' ',middle_initial,'. ',last_name) AS Fullname, course, yearBatch, gender, civil_status, birthdate, address, password FROM personalinfo_tbl WHERE email_address = :id");
                 $records->bindParam(':id', $_SESSION['currentUser']);
                 $records->execute();
                 $results = $records->fetch(PDO::FETCH_ASSOC);
                 $user = NULL;
                  if( count($results) > 0) {
                     $userid = $results;
                     $rid = $userid['email_address'];
                      }
                    }
                //  $msg = '';
                 ?>
          <?php
            include_once 'DBconnect/databaseMysqli.php';
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
                        echo "<img class='img-rounded' src='uploads/profile".$id.".jpg?'".mt_rand()." style='width:100%;'>";
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
                 <p><?php if (!empty($ridd)): ?>
  <p class="text-capitalize"> <?= $ridd['Fullname']; ?></p>
<p class="text-capitalize">Course: <?= $ridd['course'] ?></p>
<p class="text-capitalize">Batch: <?= $ridd['yearBatch'] ?></p>
<a href="betatest-online.php">Evaulation of the System</a></p><br>
<?php else:echo"You must logged in";?>
<?php endif; ?>

</div>
</div>
</div>

<hr>

<footer class="container">
<h2>SSU Tracer</h2><p>&copy; 2017 Samar State University Information System and Information Technology Tracer</p>
</footer>
</body>
</html>
