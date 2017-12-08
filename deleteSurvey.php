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
     $rid = $user['respondentID'];
       }
 }

 try {

   if(isset($_POST['submit'])){
   // sql to delete a record
    $sql = "DELETE FROM answer_tbl WHERE respondent_ID='$rid'";

   // use exec() because no results are returned
    $conn->exec($sql);
    header('Refresh:0.2; url=survey-question-1.php?SurveyDeleteSuccessfuly');

    echo "Record deleted successfully";
   }
   }
catch(PDOException $e)
   {
   echo $sql . "<br>" . $e->getMessage();
   }

$conn = null;
?>
