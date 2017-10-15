<?php
  session_start();

  if( isset($_SESSION['currentUser']) ){
    header('Location: userhomepage.php');
  }

  require 'DBconnect/database.php';

  if(!empty($_POST['email']) && !empty($_POST['pwd'])):

    $records = $conn->prepare('SELECT respondentID, email_address, password FROM personalinfo_tbl WHERE email_address = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if(count($results) > 0 && password_verify($_POST['pwd'], $results['password']) ){
      $_SESSION['currentUser'] = $results['email_address'];
      $message = 'Succesfuly logged in';
    header('Refresh: 1; url=userhomepage.html');
  } else {
    $message = 'Incorrect Email OR Password';
  }

endif;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style/style.css">

<style>
.nav-tabs {
  width: 100%;
}
.modal-header, h4, .close {
     background-color: black;
     color:white !important;
     text-align: center;
     font-size: 30px;
 }
 .modal-footer, .page-header {
     background-color: #f9f9f9;
 }
 .margin {
   margin: 0;
   padding: 0;
 }
 header {
   background-color: white;
 }
 img.center {
   display: block;
   margin-left: auto;
   margin-right: auto;
 }
 .navcolor {background-color: #368cbf;border-bottom: 10px solid #f0ea62;}
 .font-white {color: white;}
.page-header, h2 {margin-bottom: 0;margin-top: 0;padding-top: 10px;color: ;}
.nav-tabs {
   border: none;
 }
</style>
</head>
<body data-toggle="modal" data-target="#login">
  <div class="page-header text-center">
      <h2>Information System and Information Technology Tracer System</h2>
      <p class="text-center">Batch 2013-2017</p>
  </div>
<div class="container-fluid margin">
        <nav class="navbar navbar-primary navcolor font-white">
          <div class="container-fluid navbar-collapse">
            <ul class="nav nav-tabs navbar-nav">
            <li>
              <div id="myBurger" class="burger">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                  <a href="#">About</a>
                    <a href="#">Facts</a>
                  <a href="#">Results</a>
              <a href="#">Feature</a>
            </div>
          <div id="cmain">
        <span style="font-size:24px;cursor:pointer" onclick="openNav()">&#9776;</span>
      </div>
    </li>
      <li style="margin-left:0px;float:right;" class="nav navbar-nav navbar-right"><a href="#" class="navcolor font-white" data-toggle="modal" data-target="#signup"><span class="glyphicon glyphicon-user"></span> Sign UP</a></li>
        <li style="margin-left:0px;float:right;" class="nav navbar-nav navbar-right"><a href="#" class="navcolor font-white" data-toggle="modal" data-target="#login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
              <!-- Modal for Log In   -->
                    <div class="modal fade" role="dialog" id="login">
                        <div class="modal-dialog">
                           <!--content-->
                              <div class="modal-content" style="background-color:#f2f2f4;">
                                <div class="modal-header" style="background-color:blue;">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title" style="background-color:blue;">Enter your Account</h4>
                                </div>
                                <div class="modal-body">

                                           </div>
                                        <div class="modal-footer">
                                          <a href="index.php" class="btn btn-default"><h1>Yes</h1></a>
                                      <!--<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>-->
                                  </div>
                              </div>
                          </div>
                      </div>
              <!-- Modal for sign up   -->
                  <div class="modal fade" role="dialog" id="signup">
                      <div class="modal-dialog">
                          <div class="modal-content" style="background-color:#f2f2f4;">
                            <div class="modal-header" style="background-color:blue;">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title" style="background-color:blue;">Registration or Sign Up</h4>
                                </div>
                                  <div class="modal-body">
                                    <?php if(!empty($message)): ?>
                                      <p><?= $message ?></p>
                                        <?php endif; ?>
                                          <!-- FORM FOR USER REGISTRATION -->
                                            <form class="form-horizontal" action="register.php" method="post" role="form">
                                              <div class="form-group">
                                                <label for="sel1" class="col-sm-3 control-label">Year Batch</label>
                                                    <div class="col-sm-9">
                                                      <select class="form-control" id="sel1" name="batch" required>
                                                        <option disabled selected value="">Year Batch</option>
                                                        <option value="2013">Batch 2013</option>
                                                        <option value="2014">Batch 2014</option>
                                                        <option value="2015">Batch 2015</option>
                                                        <option value="2016">Batch 2016</option>
                                                        <option value="2017">Batch 2017</option>
                                                      </select>
                                                    </div>
                                                  </div>
                                                <div class="form-group">
                                                    <label for="sel1" class="col-sm-3 control-label">Course</label>
                                                       <div class="col-sm-9">
                                                          <select class="form-control" id="sel1" name="course" required>
                                                             <option disabled selected value="">Course</option>
                                                           <option value="BSIT">BS in Information Technology</option>
                                                         <option value="BSIS">BS in Information System</option>
                                                      </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="col-sm-3 control-label">First Name</label>
                                                      <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="first_n" placeholder="First Name" required>
                                                  </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="col-sm-3 control-label">Last Name</label>
                                                      <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="last_n" placeholder="Last Name" required>
                                                  </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="col-sm-3 control-label">Middle Name</label>
                                                      <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="middle_i" placeholder="Middle Initial" maxlength="1" required>
                                                  </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="col-sm-3 control-label">Gender</label>
                                                      <div class="col-sm-9">
                                                          <div class="radio">
                                                              <label><input type="radio" name="gender" value="Male" required>Male</label>
                                                          </div>
                                                          <div class="radio">
                                                              <label><input type="radio" name="gender" value="Female" required>Female</label>
                                                          </div>
                                                     </div>
                                                </div>
                                                <div class="form-group">
                                                  <label for="" class="col-sm-3 control-label">Birthdate</label>
                                                      <div class="col-sm-9">
                                                        <input type="date" class="form-control" name="bd" value="" placeholder="Birth Date" min="1700-01-01" max="2010-12-31/" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                  <label for="cs" class="col-sm-3 control-label">Civil Status</label>
                                                      <div class="col-sm-9">
                                                        <select class="form-control" name="civil" required>
                                                            <option disabled selected value="">Civil Status</option>
                                                              <option value="single">Single</option>
                                                                <option value="married">Married</option>
                                                                <option value="separated">Separated</option>
                                                            <option value="widowed">Widowed</option>
                                                        </select>
                                                      </div>
                                                </div>
                                                <div class="form-group">
                                                  <label for="" class="col-sm-3 control-label">Address</label>
                                                      <div class="col-sm-9">
                                                          <input type="text" class="form-control" name="address" placeholder="Address" required>
                                                      </div>
                                                </div>
                                                <div class="form-group">
                                                  <label for="" class="col-sm-3 control-label">Contact No.</label>
                                                      <div class="col-sm-9">
                                                          <input type="number" class="form-control" name="contact" placeholder="Contact Number" required>
                                                      </div>
                                                </div>
                                                <div class="form-group">
                                                  <label for="" class="col-sm-3 control-label">Email Address</label>
                                                      <div class="col-sm-9">
                                                          <input type="email" class="form-control" name="email" placeholder="Email address" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                  <label for="" class="col-sm-3 control-label">Password</label>
                                                      <div class="col-sm-9">
                                                          <input type="password" class="form-control" name="pwd" placeholder="Password" max="20" min="8" required>
                                                      </div>
                                                </div>
                                                <div class="form-group">
                                                  <label for="" class="col-sm-3 control-label">Confirm</label>
                                                      <div class="col-sm-9">
                                                          <input type="password" class="form-control" name="repwd" placeholder="Verify Password" max="20" min="8" required>
                                                      </div>
                                                </div>
                                                <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                        <input type="submit" class="form-control btn btn-primary" name="" value="submit">
                                    </div>
                                 </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                        <!--<button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>-->
                      </div>
                  </div>
                </div>
              </div>
            </ul>
          </div>
        </nav>
        <script>
        function openNav() {
            document.getElementById("myBurger").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
            document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
        }

        function closeNav() {
            document.getElementById("myBurger").style.width = "0";
            document.getElementById("main").style.marginLeft= "0";
            document.body.style.backgroundColor = "white";
        }
        </script>
<!--center information-->
<div class="col-sm-12">
          <a href="#">
              <img src="pic/SHAKE.png" alt="" class="img-responsive center" width="500" /></a>
                      <p style="text-align:center;font-family:verdana;">Hands Shakes</p>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-6 well">
      <h3>Information System</h3>
      <a href="#">
          <img src="pic/it.jpg" alt="" class="img-responsive center" width="500" /></a>
                  <p style="text-align:center;font-family:verdana;">Business Analyst</p>
    </div>
    <div class="col-sm-6 well">
      <h3>Information technology</h3>
      <a href="#">
          <img src="pic/is.jpg" alt="" class="img-responsive center" width="500" /></a>
                  <p style="text-align:center;font-family:verdana;">Database Administrator</p>
    </div>
    <div class="col-sm-12">
        <p style="font-size:30px;font-family:verdana;text-align:center;">
          Make Us Proud and Let The World Who We Are!
        </p>
            <ul class="pager">
                <li><a href="#" data-toggle="modal" data-target="#login">Log In</a></li>
                <li><a href="#" data-toggle="modal" data-target="#signup">Sign Up</a></li>
            </ul>
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
