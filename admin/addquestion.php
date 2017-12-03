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
    <h5><?php if(!empty($message)): ?></h5>
      <p><?= $message ?></p>
    <?php endif; ?>
    <h1>ADD QUESTION to the Survey</h1>
    <form class="" action="addquestion.php" method="post">
      <input type="text" name="addquestions" value="" required>
      <input type="submit" name="" value="Add">
    </form>
  </body>
</html>

<?php
//all the records in the question table
echo "<table style='border: solid 1px black;'>";
 echo "<tr><th>QID</th><th>SurveyQuestion</th><th>Possible Answer</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}



try {
    require '../DBconnect/database.php';
    $stmt = $conn->prepare("SELECT questionID, questionText FROM question_tbl");
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
