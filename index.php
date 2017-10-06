<?php
  session_start();

  if( isset($_SESSION['currentUser']) ){
    header('Location: indexhomepage.php');
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
    header('Refresh: 1; url=indexhomepage.php');
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
  <link rel="stylesheet" href="style.css" media="screen" title="no title" charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
.nav-tabs {
  width: 100%;
}
.modal-header, h4, .close {
     background-color: #5cb85c;
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
   background-color: black;
 }
 img.center {
   display: block;
   margin-left: auto;
   margin-right: auto;
 }
</style>
</head>
<body>
<div class="container-fluid margin">
    <header>
        <img src="pic/logoname.png" class="img-responsive"alt="" />
     </header>
        <nav class="navbar navbar-primary">
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
              <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
            </div>
        </li>
        <li style="margin-left:20px;" class="nav navbar-nav navbar-right"><a href="#" data-toggle="modal" data-target="#login"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
                    <div class="modal fade" role="dialog" id="login">
                        <div class="modal-dialog">
                           <!--content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Enter your Account</h4>
                                </div>
                                <div class="modal-body">
                                  <?php if(!empty($message)): ?>
                                    <p><?= $message ?></p>
                                  <?php endif; ?>
                                  <!-- FORM FOR USER LOG IN -->
                                  <form class="" action="index.php" method="post">
                                    <input type="email" name="email" placeholder="Email@example.com" autofocus required>
                                    <input type="password" name="pwd" placeholder="Password" required>
                                    <input type="submit" name="" value="Log In">
                                  </form>
                                </div>
                                <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                        </div>
                    </div>
        <li style="margin-left:20px;" class="nav navbar-nav navbar-right"><a href="#" data-toggle="modal" data-target="#signup"><span class="glyphicon glyphicon-user"></span> Sign UP</a></li>
                  <div class="modal fade" role="dialog" id="signup">
                      <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Registration or Sign Up</h4>
                            </div>
                            <div class="modal-body">
                              <?php if(!empty($message)): ?>
                                <p><?= $message ?></p>
                              <?php endif; ?>
                              <!-- FORM FOR USER REGISTRATION -->
                              <form class="" action="register.php" method="post">
                                <ul>
                                <li>
                                <select class="" name="batch" required>
                                  <option disabled selected value="">YearBatch</option>
                                  <option value="2013">Batch 2013</option>
                                  <option value="2014">Batch 2014</option>
                                  <option value="2015">Batch 2015</option>
                                  <option value="2016">Batch 2016</option>
                                  <option value="2017">Batch 2017</option>
                                </select>
                                </li>
                                <li>
                                <select class="" name="course" required>
                                  <option disabled selected value="">Course</option>
                                  <option value="BSIT">BS in Information Technology</option>
                                  <option value="BSIS">BS in Information System</option>
                                </select>
                              </li>

                                <li><input type="text" name="first_n" placeholder="First Name" required></li>
                                <li><input type="text" name="middle_i" placeholder="Middle Initial" maxlength="1" required></li>
                                <li><input type="text" name="last_n" placeholder="Last Name" required></li>
                                <li><input type="radio" name="gender" value="Male" required>Male</li>
                                <li><input type="radio" name="gender" value="Female" required>Female</li>
                                <li><input type="date" name="bd" value="" placeholder="Birth Date" min="1700-01-01" max="2010-12-31/" required></li>
                                <li><select class="" name="civil" required>
                                    <option disabled selected value="">Civil Status</option>
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="separated">Separated</option>
                                    <option value="widowed">Widowed</option>
                                </select></li>
                                <li><input type="text" name="address" placeholder="Address" required></li>
                                <li><input type="number" name="contact" placeholder="Contact Number" required></li>
                                <li><input type="email" name="email" placeholder="Email address" required></li>
                                <li><input type="password" name="pwd" placeholder="Password" required></li>
                                <li><input type="password" name="repwd" placeholder="Verify Password" required></li>

                                <li><input type="submit" name="" value="submit"></li>
                              </ul>
                              </form>
                            </div>
                            <div class="modal-footer">
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
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
<div class="col-sm-12 well">
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
    <div class="col-sm-12 well">
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
