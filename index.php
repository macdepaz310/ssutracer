<?php
  session_start();

  if( isset($_SESSION['currentUser']) ){
    header('Location: userhomepage.php');
  }

  require 'DBconnect/database.php';

  if(!empty($_POST['email']) && !empty($_POST['pwd'])):

    $records = $conn->prepare('SELECT p.respondentID, p.email_address, p.password FROM personalinfo_tbl as p WHERE p.email_address = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if(count($results) > 0 && password_verify($_POST['pwd'], $results['password']) ){
      $_SESSION['currentUser'] = $results['email_address'];
      $message = 'Succesfuly logged in';
    header('Refresh: 5; url=userhomepage.php');
  }
   else {
    $message = 'Incorrect Email OR Password';
    print_r($results);
  }

endif;
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="charts/css/default.css">
  <link rel="stylesheet" href="styles.css">
    <title></title>
    <style>
    body {position: relative;}
    .container-fluid {margin: 0; padding: 0;background-color: none;}
    .active-hover {border-bottom: 2px solid yellow;}
    @media screen and (min-width: 768px) { a.mob-brand {display: none;} ul.navbar-right li.rightnav a {display: none;} a.mob-brand {display: block;}}
    #mob-brand {display:none;}
    @media screen and (max-width: 769px) {
      a.pc-brand {display: none;}
      #mob-brand {display: block;}
    }

    .login-box {border: 2px solid black; }
    .text-default-color {color: #777;}
    .h3 {text-align:center;margin-top:0px;}
    </style>
  </head>
 <body data-spy="scroll" data-target=".navbar" data-offset="50">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <div class="container">
             <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
               </button>
               <a href="#" class="navbar-brand pc-brand">Web-Based SSU Employment Tracer For 2013-2017 BSIS And BSIT Graduates</a>
               <a href="#" class="navbar-brand" id="mob-brand" style="">SSU TRACER</a>
             </div>
             <div>
             <div class="collapse navbar-collapse" id="myNavbar">
               <ul class="nav navbar-nav navbar-right">
                 <li class="rightnav"><a href="#" data-toggle="modal" data-target="#login"><span class="glyphicon glyphicon-log-in"> Log-In </span></a></li>
                 <li class="rightnav"><a href="register.php"><span class="glyphicon glyphicon-cloud"> Sign-Up </span></a></li>
                 <li><a href="#">About</a></li>
               </ul>
             </div>
           </div>
        </div>
        </div>
    </nav>
              <!-- Modal for log in -->
              <div class="modal fade" role="dialog" id="login">
                        <div class="modal-dialog">
                           <!--content-->
                              <div class="modal-content" style="background-color:#f2f2f4;">
                                <div class="modal-header" style="background-color:blue;">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title" style="background-color:blue;">Enter your Account</h4>
                                </div>
                                <div class="modal-body">
                                  <?php if(!empty($message)): ?>
                                    <p><?= $message ?></p>
                                      <?php endif; ?>
                                        <!-- FORM FOR USER LOG IN -->
                                            <form class="form-horizontal" action="index.php" method="post">
                                              <div class="form-group">
                                                  <label for="email" class="col-sm-2 control-label">Email</label>
                                                  <div class="col-sm-10">
                                                      <input type="email" name="email" class="form-control" placeholder="example@gmail.com"  autofocus required>
                                                        </div>
                                                          </div>
                                                            <div class="form-group">
                                                              <label for="password" class="col-sm-2 control-label">Password</label>
                                                                <div class="col-sm-10">
                                                                  <input type="password" name="pwd" class="form-control" placeholder="Password" max="20" min="8" required>
                                                                    </div>
                                                                  </div>
                                                                <div class="form-group">
                                                            <div class="col-sm-offset-2 col-sm-10">
                                                        <input type="submit" class="btn btn-primary" name="" value="Log In">
                                                    </div>
                                                 </div>
                                             </form>
                                           </div>
                                        <div class="modal-footer">
                                      <!--<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>-->
                                  </div>
                              </div>
                          </div>
                      </div>
<div class="container-fluid">
  <div class="container">
      <h1>&nbsp;</h1>
      <div class="col-sm-3 well">
          <p><?php if(!empty($message)): ?>
                                    <p><?= $message ?></p>
                                      <?php endif; ?></p>
        <h3 class="h3 text-default-color"><b>Log In</b></h3>
        <form class="form-horizontal" action="index.php" method="post">
            <input type="email" name="email" class="form-control" placeholder="example@gmail.com" required><br>
            <input type="password" name="pwd" class="form-control" placeholder="password" max="20" min="8" required><br>
            <input type="submit" class="btn btn-primary" name="submit" value="Submit"><br>
        </form>
        <h5 class="text-default-color"><i>Create An Account?</i></h5>
        <a href="register.php" class="btn btn-primary form-control">Sign Up</a>
        </form>
    </div>
    <div class="col-sm-9">
                <canvas id="ISchartQuestion1"></canvas>
    </div>
  </div>
    <!-- <div class="img-center img-home">
        <img id="User_homepage" src="sample.png" alt="Sample Images" class="img-responsive" width="100%" />
      </div> -->
    </div>
    <!--IS GRAPH -->
    <!-- <div class="container-fluid">
    <div id="information_system" class="container well">
                <div class="col-sm-12 chart-container">
                  <canvas id="ISchartQuestion5"></canvas>
                </div>
              </div>
              </div> -->
      <!-- IT GRAPH -->
      <!-- <div id="information_technology" class="container">
                      <div class="col-sm-12 chart-container">
            <canvas id="ITchartQuestion5"></canvas>
            </div>
          </div> -->
<script
			  src="https://code.jquery.com/jquery-2.2.0.min.js"
			  integrity="sha256-ihAoc6M/JPfrIiIeayPE9xjin4UWjsx2mjW/rtmxLM4="
			  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script>
<script src="/charts/js/chartPieceLabel.js"></script>
<script src="charts/js/BSIScharts/BSISQ1chart.js"></script>
<!--<script src="charts/js/BSITcharts/BSITQ5chart.js"></script>-->
<!-- END OF GRAPH -->
<!-- <div class="container-fluid">
  <div class="col-sm-12">
      <p style="font-size:30px;font-family:verdana;text-align:center;">
        Make Us Proud and Let The World Who We Are!
      </p>
          <ul class="pager">
              <li><a href="#" data-toggle="modal" data-target="#login">Log In</a></li>
              <li><a href="#" data-toggle="modal" data-target="#signup">Sign Up</a></li>
          </ul>
  </div>
</div> -->
<footer>
<!--  <div class="container-fluid">-->
<!--  <div class="container">-->
<!--      <div class="col-sm-12">-->
<!--        <ul class="nav ">-->
<!--          <li class="active"><a href="userhomepage.php"><h2>SSU Tracer</h2><p>&copy; 2017 Samar State University Information System and Information Technology Tracer</p></a></li>-->
<!--        </ul>-->
<!--      </div>-->
<!--      </div>-->
<!--</div>-->
</footer>

  </body>
</html>
