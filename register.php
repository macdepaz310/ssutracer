<?php
session_start();

if( isset($_SESSION['currentUser']) ){
  header('Location: indexhomepage.php');
}
  require 'DBconnect/database.php';

  $message = '';

  if(!empty($_POST['batch']) && !empty($_POST['course']) && !empty($_POST['first_n']) && !empty($_POST['middle_i']) && !empty($_POST['last_n']) && !empty($_POST['gender']) && !empty($_POST['bd']) && !empty($_POST['civil']) && !empty($_POST['address']) && !empty($_POST['contact']) && !empty($_POST['email']) && !empty($_POST['pwd'])):

    if($_POST['pwd'] != $_POST['repwd']){
      header("Location: login.html");
      die('Failed');
    }

    $sql = "INSERT INTO personalinfo_tbl (yearBatch, first_name, middle_initial, last_name, gender, birthdate, civil_status, course, address, contact_number, email_address, password) VALUES (:batch, :first_n,:middle_i,:last_n,:gender,:bd,:civil,:course,:address,:contact,:email,:pwd)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':batch', $_POST['batch']);
    $stmt->bindParam(':first_n', $_POST['first_n']);
    $stmt->bindParam(':middle_i', $_POST['middle_i']);
    $stmt->bindParam(':last_n', $_POST['last_n']);
    $stmt->bindParam(':gender', $_POST['gender']);
    $stmt->bindParam(':bd', $_POST['bd']);
    $stmt->bindParam(':civil', $_POST['civil']);
    $stmt->bindParam(':course', $_POST['course']);
    $stmt->bindParam(':address', $_POST['address']);
    $stmt->bindParam(':contact', $_POST['contact']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':pwd',password_hash($_POST['pwd'], PASSWORD_BCRYPT));

    if($stmt->execute() ):
      $message = 'Successfully Created New User';
    else:
        $message = 'sorry';

      endif;
    endif;
 ?>
<!--
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Employment Tracer</title>
  </head>
  <body>
    <a href="login.php">login</a>

<h1>FROMS</h1>
<h5><?php if(!empty($message)): ?></h5>
  <p><?= $message ?></p>
<?php endif; ?>
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
      <option value="BSIT">Bachelor of Science in Information Technology</option>
      <option value="BSIS">Bachelor of Science in Information System</option>
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
  </body>
</html> -->
