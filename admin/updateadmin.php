<?php
//adding a question to the survey
    require '../DBconnect/database.php';

    $message = '';
    if(!empty($_POST['addquestions'])):

      $sql = "INSERT INTO question_tbl (questionText) VALUES (:addquestions)";

      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':addquestions', $_POST['addquestions']);

      if($stmt->execute() ):
        $message = 'Added Successfully';
      else :
        $message = 'Sorry, We got a Problem Contact Developers PLEASE';

    endif;
  endif;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="updateadmin.php" method="post">
      <input type="text" name="addquestions" value="" required>
      <input type="submit" name="" value="Add">
    </form>


  </body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ssutracer";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT questionText FROM question_tbl";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo  " Question: " . $row["questionText"]. "<br><input type='submit' value='Add possible answer'><br><input type='text'><br><br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
