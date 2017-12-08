<?php
  session_start();
  require '../DBconnect/database.php';

  if ( isset($_SESSION['currentUser'])){

    $records = $conn->prepare('SELECT respondentID, email_address, password FROM personalinfo_tbl WHERE email_address = :id');
    $records->bindParam(':id', $_SESSION['currentUser']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = NULL;

    if( count($results) > 0) {
      $user = $results;
      $rid = $user['respondentID'];

    }
  }
  $msg = '';
  ?>
<?php
//question 1 start
  require '../DBconnect/database.php';
  $QID = 1; //question number base from database
  if(isset($_POST['submit'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans1']);
    if($stmt->execute()):
      header('Refresh: 0.5; url= #');
    else:
      echo "sorry";
    endif;
  endif;
//question 1 ends
//question 2 start
$QID = 2; //question number base from database
if(isset($_POST['submit'])):
  $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':QID', $QID);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':answerText', $_POST['ans2']);
  if($stmt->execute()):
    header('Refresh: 0.5; url= #');
  else:
    echo "sorry";
  endif;
endif;
//question 2 ends
//question 3 start
$QID = 3; //question number base from database
if(isset($_POST['submit'])):
  $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':QID', $QID);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':answerText', $_POST['ans3']);
  if($stmt->execute()):
    header('Refresh: 0.5; url= #');
  else:
    echo "sorry";
  endif;
endif;
//question 3 ends
//question 4 start
$QID = 4; //question number base from database
if(isset($_POST['submit'])):
  $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':QID', $QID);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':answerText', $_POST['ans4']);
  if($stmt->execute()):
    header('Refresh: 0.5; url= #');
  else:
    echo "sorry";
  endif;
endif;
//question 4 ends
//question 5 start
$QID = 5; //question number base from database

if(isset($_POST['submit'])):
  $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':QID', $QID);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':answerText', $_POST['ans5']);
  if($stmt->execute() ):
    header('Refresh: 0.5; url= #');
  else:
    echo "sorry";
  endif;
endif;
//question 5 ends
//question 6 start
$QID = 6; //question number base from database

if(isset($_POST['submit'])):
  $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':QID', $QID);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':answerText', $_POST['ans6']);
  if($stmt->execute() ):
    header('Refresh: 0.5; url= #');
  else:
    echo "sorry";
  endif;
endif;
//question 6 ends
//question 7 start
$QID = 7; //question number base from database

if(isset($_POST['submit'])):
  $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':QID', $QID);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':answerText', $_POST['ans7']);
  if($stmt->execute()):
    header('Refresh: 0.5; url= #');
  else:
    echo "sorry";
  endif;
endif;
//question 7 ends
//question 8 start
$QID = 8; //question number base from database
if(isset($_POST['submit']) && !empty($_POST['ans8'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans8']);
  if($stmt->execute() ):
     header('Refresh: 0.5; url= #');
  else:
    echo "sorry";
  endif;
endif;
if(isset($_POST['submit']) && !empty($_POST['ans8-1'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans8-1']);
  if($stmt->execute() ):
    header('Refresh: 0.5; url= #');
  else:
    echo "sorry";
  endif;
endif;
if(isset($_POST['submit']) && !empty($_POST['ans8-2'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans8-2']);
  if($stmt->execute() ):
     header('Refresh: 0.5; url= #');
  else:
    echo "sorry";
  endif;
endif;
if(isset($_POST['submit']) && !empty($_POST['ans8-3'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans8-3']);
  if($stmt->execute() ):
     header('Refresh: 0.5; url= #');
  else:
    echo "sorry";
  endif;
endif;
if(isset($_POST['submit']) && !empty($_POST['ans8-4'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans8-4']);
  if($stmt->execute() ):
     header('Refresh: 0.5; url= #');
  else:
    echo "sorry";
  endif;
endif;
if(isset($_POST['submit']) && !empty($_POST['ans8-5'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans8-5']);
  if($stmt->execute() ):
     header('Refresh: 0.5; url= #');
  else:
    echo "sorry";
  endif;
endif;
if(isset($_POST['submit']) && !empty($_POST['ans8-6'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans8-6']);
  if($stmt->execute() ):
     header('Refresh: 0.5; url= #');
  else:
    echo "sorry";
  endif;
endif;
//question 8 ends
//question 9 start
$QID = 9; //question number base from database

if(isset($_POST['submit'])):
  $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':QID', $QID);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':answerText', $_POST['ans9']);
  if($stmt->execute() ):
    header('Refresh:0.2; url= #');
  else:
    echo "sorry";
  endif;
endif;
//question 9 ends
//question 10 start
$QID = 10; //question number base from database

if(isset($_POST['submit'])):
  $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':QID', $QID);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':answerText', $_POST['ans10']);
  if($stmt->execute() ):
    header('Refresh: 0.2; url= #');
  else:
    echo "sorry";
  endif;
endif;
//question 10 ends
//question 11 start
$QID = 11; //question number base from database

if(isset($_POST['submit'])):
  $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':QID', $QID);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':answerText', $_POST['ans']);
  if($stmt->execute() ):
    header('Refresh: 0.2; url= #');
  else:
    echo "sorry";
  endif;
endif;
//question 11 ends
//question 12 start
$QID = 12; //question number base from database

if(isset($_POST['submit'])):
  $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':QID', $QID);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':answerText', $_POST['ans12']);
  if($stmt->execute() ):
    header('Refresh:0.2; url= #');
  else:
    echo "sorry";
  endif;
endif;
//question 12 ends
//question 13 start
$QID = 13; //question number base from database
if(isset($_POST['submit']) && !empty($_POST['ans13'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans13']);
  if($stmt->execute() ):
     header('Refresh: 0.2; url= #');
  else:
    echo "sorry";
  endif;
endif;
if(isset($_POST['submit']) && !empty($_POST['ans13-1'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans13-1']);
  if($stmt->execute() ):
     header('Refresh: 0.2; url= #');
  else:
    echo "sorry";
  endif;
endif;
if(isset($_POST['submit']) && !empty($_POST['ans13-2'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans13-2']);
  if($stmt->execute() ):
     header('Refresh: 0.2; url= #');
  else:
    echo "sorry";
  endif;
endif;
if(isset($_POST['submit']) && !empty($_POST['ans13-3'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans13-3']);
  if($stmt->execute() ):
     header('Refresh: 0.2; url= #');
  else:
    echo "sorry";
  endif;
endif;
if(isset($_POST['submit']) && !empty($_POST['ans13-4'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans13-4']);
  if($stmt->execute() ):
     header('Refresh: 0.2; url= #');
  else:
    echo "sorry";
  endif;
endif;
if(isset($_POST['submit']) && !empty($_POST['ans13-5'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans13-5']);
  if($stmt->execute() ):
     header('Refresh: 0.2; url= #');
  else:
    echo "sorry";
  endif;
endif;
if(isset($_POST['submit']) && !empty($_POST['ans13-6'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans13-6']);
  if($stmt->execute() ):
     header('Refresh: 0.2; url= #');
  else:
    echo "sorry";
  endif;
endif;
if(isset($_POST['submit']) && !empty($_POST['ans13-7'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans13-7']);
  if($stmt->execute() ):
     header('Refresh: 0.2; url= #');
  else:
    echo "sorry";
  endif;
endif;
//question 13 ends
//question 14 start
$QID = 14; //question number base from database
if(isset($_POST['submit']) && !empty($_POST['ans14'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans14']);
  if($stmt->execute() ):
     header('Refresh: 0.2; url= #');
  else:
    echo "sorry";
  endif;
endif;
if(isset($_POST['submit']) && !empty($_POST['ans14-1'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans14-1']);
  if($stmt->execute() ):
     header('Refresh: 0.2; url= #');
  else:
    echo "sorry";
  endif;
endif;
if(isset($_POST['submit']) && !empty($_POST['ans14-2'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans14-2']);
  if($stmt->execute() ):
     header('Refresh: 0.2; url= #');
  else:
    echo "sorry";
  endif;
endif;
if(isset($_POST['submit']) && !empty($_POST['ans14-3'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans14-3']);
  if($stmt->execute() ):
     header('Refresh: 0.2; url= #');
  else:
    echo "sorry";
  endif;
endif;
if(isset($_POST['submit']) && !empty($_POST['ans14-4'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans14-4']);
  if($stmt->execute() ):
     header('Refresh: 0.2; url= #');
  else:
    echo "sorry";
  endif;
endif;

//question 14 ends
//question 15 start
$QID = 15; //question number base from database
if(isset($_POST['submit']) && !empty($_POST['ans15'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans15']);
  if($stmt->execute() ):
     header('Refresh: 0.2; url= #');
  else:
    echo "sorry";
  endif;
endif;
if(isset($_POST['submit']) && !empty($_POST['ans15-1'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans15-1']);
  if($stmt->execute() ):
     header('Refresh: 0.2; url= #');
  else:
    echo "sorry";
  endif;
endif;
if(isset($_POST['submit']) && !empty($_POST['ans15-2'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans15-2']);
  if($stmt->execute() ):
     header('Refresh: 0.2; url= #');
  else:
    echo "sorry";
  endif;
endif;
if(isset($_POST['submit']) && !empty($_POST['ans15-3'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans15-3']);
  if($stmt->execute() ):
     header('Refresh: 0.2; url= #');
  else:
    echo "sorry";
  endif;
endif;
if(isset($_POST['submit']) && !empty($_POST['ans15-4'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans15-4']);
  if($stmt->execute() ):
     header('Refresh: 0.2; url= #');
  else:
    echo "sorry";
  endif;
endif;

//question 15 ends
//question 16 start
$QID = 16; //question number base from database

if(isset($_POST['submit'])):
  $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':QID', $QID);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':answerText', $_POST['ans16']);
  if($stmt->execute() ):
    header('Refresh:0.2; url= #');
  else:
    echo "sorry";
  endif;
endif;
//question 16 ends
//question 17 start
$QID = 17; //question number base from database

if(isset($_POST['submit'])):
  $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':QID', $QID);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':answerText', $_POST['ans17']);
  if($stmt->execute() ):
    header('Refresh:0.2; url= #');
  else:
    echo "sorry";
  endif;
endif;
//question 17 ends
//question 18 start
$QID = 18; //question number base from database
if(isset($_POST['submit']) && !empty($_POST['ans18'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans18']);
  if($stmt->execute() ):
     header('Refresh: 0.2; url= #');
  else:
    echo "sorry";
  endif;
endif;
if(isset($_POST['submit']) && !empty($_POST['ans18-1'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans18-1']);
  if($stmt->execute() ):
     header('Refresh: 0.2; url= #');
  else:
    echo "sorry";
  endif;
endif;
if(isset($_POST['submit']) && !empty($_POST['ans18-2'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans18-2']);
  if($stmt->execute() ):
     header('Refresh: 0.2; url= #');
  else:
    echo "sorry";
  endif;
endif;
if(isset($_POST['submit']) && !empty($_POST['ans18-3'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans18-3']);
  if($stmt->execute() ):
     header('Refresh: 0.2; url= #');
  else:
    echo "sorry";
  endif;
endif;
if(isset($_POST['submit']) && !empty($_POST['ans18-4'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans18-4']);
  if($stmt->execute() ):
     header('Refresh: 0.2; url= #');
  else:
    echo "sorry";
  endif;
endif;
if(isset($_POST['submit']) && !empty($_POST['ans18-5'])):
    $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':QID', $QID);
    $stmt->bindParam(':rid', $rid);
    $stmt->bindParam(':answerText', $_POST['ans18-5']);
  if($stmt->execute() ):
     header('Refresh: 0.2; url= #');
  else:
    echo "sorry";
  endif;
endif;
//question 18 ends
//question 19 start
$QID = 19; //question number base from database

if(isset($_POST['submit'])):
  $sql = "INSERT INTO answer_tbl (question_ID, respondent_ID, answerText) VALUES (:QID, :rid, :answerText)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':QID', $QID);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':answerText', $_POST['ans19']);
  if($stmt->execute() ):
    header('Refresh: 0.2; url= ../feedback.php');
  else:
    echo "sorry";
  endif;
endif;
//question 19 ends


 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Survey Section</title>
  </head>
  <body>

    <form class="form-horizontal" action="#" method="post">
      <!-- question 1 start-->
      <h4>Are you currently employed?</h4>
        <div class="radio">
          <label for="yes"><input type="radio" id="yes" name="ans1" value="yes" required>Yes</label>
        </div>
        <div class="radio">
          <label for="no"><input type="radio" id="no" name="ans1" value="no" required>No</label>
        </div><br>
        <!-- question 1 end-->

        <!-- question 8 start -->
        <h4>Please state the reason(s) why you are not yet employed. You may choose more than one answer.</h4>
        <div class="checkbox">
        <label for="Family"> <input type="checkbox" id="Family" name="ans8" value="Family concern and decided not to find a job">Family concern and decided not to find a job </label><br>
          <label for="Advanced"><input type="checkbox" id="Advanced" name="ans8-1" value="Advanced or further study" >Advanced or further study</label>
        </div>
        <div class="checkbox">
          <label for="Health"><input type="checkbox" id="Health" name="ans8-2" value="Health-related reason" >Health-related reason</label>
        </div>
        <div class="checkbox">
          <label for="Lack"><input type="checkbox" id="Lack" name="ans8-3" value="Lack of work experience" >Lack of work experience</label>
        </div>
        <div class="checkbox">
          <label for="Nojob"><input type="checkbox" id="Nojob" name="ans8-4" value="No job opportunity" >No job opportunity</label>
        </div>
        <div class="checkbox">
          <label for="did"><input type="checkbox" id="did" name="ans8-5" value="did not look for a job" >Did not look for a job</label>
        </div>
        <div class="checkbox">
          <label for="other"><input type="checkbox" id="other" name="ans8-6" value="other reason(s)" >other reason(s)</label>
        </div><br>

        <!-- question 8 end -->
        <!-- question 2 start -->
        <h4>Employment Status?</h4>
        <div class="radio">
          <br><label for="regular"><input type="radio" id="regular" name="ans2" value="Regular" required>Regular</label>
        </div>
        <div class="radio">
          <label for="casual"><input type="radio" id="casual" name="ans2" value="Casual" required>Casual</label>
        </div>
        <div class="radio">
          <label for="Temporary"><input type="radio" id="Temporary" name="ans2" value="Temporary" required>Temporary</label>
        </div>
        <div class="radio">
          <label for="Contractual"><input type="radio" id="Contractual" name="ans2" value="Contractual" required>Contractual</label>
        </div>
        <div class="radio">
          <label for="Self-Employed"><input type="radio" id="Self-Employed" name="ans2" value="Self-Employed" required>Self-Employed</label>
        </div>
        <!-- question2 end -->
        <!-- question 9 start -->
        <h4>If self-employed, from whom did you get start-up capital for your business operation(s)?</h4>
        <div class="radio">
          <label for="Parents"><input type="radio" id="Parents" name="ans9" value="Parents" required>Parents</label>
        </div>
        <div class="radio">
          <label for="Friend/Relatives"><input type="radio" id="Friend/Relatives" name="ans9" value="Friend/Relatives" required>Friend/Relatives</label>
        </div>
        <div class="radio">
          <label for="Government Program"><input type="radio" id="Government Program" name="ans9" value="Government Program" required>Government Program</label>
        </div>
        <div class="radio">
          <label for="Financial Institution"><input type="radio" id="Financial Institution" name="ans9" value="Financial Institution" required>Financial Institution</label>
        </div><br>

        <!-- question 9 end -->
        <!-- question 10 start -->
        <h4>Present Occupation?</h4>
        <div class="radio">
          <label for="q10" >Ex.(Ex. Grade school teacher, Electrical Engineer, Self-employed)</label>
            <input type="text" name="ans10" id="q10" class="form-control" required autofocus>
        </div><br>
        <!-- question 10 end -->
        <!-- question 19 start -->
        <h4>Name of Company or Organization and Address.</h4>
        <div class="radio">
          <label for="q19">(Ex. Samar State University, Arteche Blvd., Guindapunan Catbalogan City, Samar)</label>
          <input type="text" id="q19" class="form-control" name="ans19" required autofocus>
        </div><br>
        <!-- question 19 end -->
        <!-- question 11 start -->
        <h4>Classification of company/organization?</h4>
        <div class="radio">
          <label for="Computer/IT"><input type="radio" id="Computer/IT" name="ans11" value="Computer/IT" required>Computer/IT</label>
        </div>
        <div class="radio">
          <label for="Agriculture, Hunting and Forestry"><input type="radio" id="Agriculture, Hunting and Forestry" name="ans11" value="Agriculture, Hunting and Forestry" required>Agriculture, Hunting and Forestry</label>
        </div>
        <div class="radio">
          <label for="Fishing"><input type="radio" id="Fishing" name="ans11" value="Fishing" required>Fishing</label>
        </div>
        <div class="radio">
          <label for="Mining and Quarrying"><input type="radio" id="Mining and Quarrying" name="ans11" value="Mining and Quarrying" required>Mining and Quarrying</label>
        </div>
        <div class="radio">
          <label for="Electricity, Gas and Water Supply"><input type="radio" id="Electricity, Gas and Water Supply" name="ans11" value="Electricity, Gas and Water Supply" required>Electricity, Gas and Water Supply</label>
        </div>
        <div class="radio">
          <label for="Construction"><input type="radio" id="Construction" name="ans11" value="Construction" required>Construction</label>
        </div>
        <div class="radio">
          <label for="Hotel and Restaurants"><input type="radio" id="Hotel and Restaurants" name="ans11" value="Hotel and Restaurants" required>Hotel and Restaurants</label>
        </div>
        <div class="radio">
          <label for="Transport; Storage and Communication"><input type="radio" id="Transport; Storage and Communication" name="ans11" value="Transport; Storage and Communication" required>Transport; Storage and Communication</label>
        </div>
        <div class="radio">
          <label for="Financial Meditation"><input type="radio" id="Financial Meditation" name="ans11" value="Financial Meditation" required>Financial Meditation</label>
        </div>
        <div class="radio">
          <label for="Real Estate; Renting and Allied Business Activities"><input type="radio" id="Real Estate; Renting and Allied Business Activities" name="ans11" value="Real Estate; Renting and Allied Business Activities" required>Real Estate; Renting and Allied Business Activities</label>
        </div>
        <div class="radio">
          <label for="Public Administration and Defense; Compulsory Social Security"><input type="radio" id="Public Administration and Defense; Compulsory Social Security" name="ans11" value="Public Administration and Defense; Compulsory Social Security" required>Public Administration and Defense; Compulsory Social Security</label>
        </div>
        <div class="radio">
          <label for="Education"><input type="radio" id="Education" name="ans11" value="Education" required>Education</label>
        </div>
        <div class="radio">
          <label for="Health and Social Work"><input type="radio" id="Health and Social Work" name="ans11" value="Health and Social Work" required>Health and Social Work</label>
        </div>
        <div class="radio">
          <label for="Other Community; Social and Personal Service Activities"><input type="radio" id="Other Community; Social and Personal Service Activities" name="ans11" value="Other Community; Social and Personal Service Activities" required>Other Community; Social and Personal Service Activities</label>
        </div>
        <div class="radio">
          <label for="Private Household with employed persons"><input type="radio" id="Private Household with employed persons" name="ans11" value="Private Household with employed persons" required>Private Household with employed persons</label>
        </div>
        <div class="radio">
          <label for="Extra Territorial Organization and Bodies"><input type="radio" id="Extra Territorial Organization and Bodies" name="ans11" value="Extra Territorial Organization and Bodies" required>Extra Territorial Organization and Bodies</label>
        </div>
        <div class="radio">
          <label for="Wholesale and Retail Trade"><input type="radio" id="Wholesale and Retail Trade" name="ans11" value="Wholesale and Retail Trade; repair of motor vehicles, motor cycles, and personal
        and household goods" required>Wholesale and Retail Trade; repair of motor vehicles, motor cycles, and personal
        and household goods</label>
        </div><br>
        <!-- question 11 end -->
        <!-- question 12 start -->
        <h4>Is this your first job/self-employment after college?</h4>
        <div class="radio">
          <label for="yes12"><input type="radio" id="yes12" name="ans12" value="Yes" required>Yes</label>
        </div>
        <div class="radio">
          <label for="no12"><input type="radio" id="no12" name="ans12" value="No" required>No</label>
        </div><br>

        <!-- question 12 end -->

        <!-- question 13 start -->
        <h4>What are your reason for staying on the job? You may check more than one.</h4>
        <div class="checkbox">
          <label for="Salaries and Benefits"><input type="checkbox" id="Salaries and Benefits" name="ans13" value="Salaries and Benefits" >Salaries and Benefits</label>
        </div>
        <div class="checkbox">
          <label for="Career Challenge"><input type="checkbox" id="Career Challenge" name="ans13-1" value="Career Challenge" >Career Challenge</label>
        </div>
        <div class="checkbox">
          <label for="Related to Special Skill"><input type="checkbox" id="Related to Special Skill" name="ans13-2" value="Related to Special Skill" >Related to Special Skill</label>
        </div>
        <div class="checkbox">
          <label for="Related to Course or Program of Study"><input type="checkbox" id="Related to Course or Program of Study" name="ans13-3" value="Related to Course or Program of Study" >Related to Course or Program of Study</label>
        </div>
        <div class="checkbox">
          <label for="Proximity to Residence"><input type="checkbox" id="Proximity to Residence" name="ans13-4" value="Proximity to Residence" >Proximity to Residence</label>
        </div>
        <div class="checkbox">
          <label for="Peer Influence"><input type="checkbox" id="Peer Influence" name="ans13-5" value="Peer Influence" >Peer Influence</label>
        </div>
        <div class="checkbox">
          <label for="Family Influence"><input type="checkbox" id="Family Influence" name="ans13-5" value="Family Influence" >Family Influence</label>
        </div>
        <div class="checkbox">
          <label for="other reason(s)"><input type="checkbox" id="other reason(s)" name="ans13-6" value="other reason(s)" >other reason(s)</label>
        </div><br>

        <!-- question 13 end -->
        <!-- question 7 start -->
        <h4>Does your work related with your course taken in college?</h4>
        <div class="radio">
          <label for="yes7"><input type="radio" id="yes7" name="ans7" value="yes" required>Yes</label>
        </div>
        <div class="radio">
          <label for="no7"><input type="radio" id="no7" name="ans7" value="no" required>No</label>
        </div><br>
        <!-- question 7 end -->

          <!-- question 14 start -->
          <h4>What were the reason for accepting/engaging the job?</h4>
          <div class="checkbox">
            <label for="Salaries14"><input type="checkbox" id="Salaries14" name="ans14" value="Salaries and Benefits" >Salaries and Benefits</label>
          </div>
          <div class="checkbox">
            <label for="Career14"><input type="checkbox" id="Career14" name="ans14-1" value="Career Challenge" >Career Challenge</label>
          </div>
          <div class="checkbox">
            <label for="Related14"><input type="checkbox" id="Related14" name="ans14-2" value="Related to Course or Program of Study" >Related to Course or Program of Study</label>
          </div>
          <div class="checkbox">
            <label for="Proximity14"><input type="checkbox" id="Proximity14" name="ans14-3" value="Proximity to Residence" >Proximity to Residence</label>
          </div>
          <div class="checkbox">
            <label for="other14"><input type="checkbox" id="other14" name="ans14-4" value="other reason(s)" >other reason(s)</label>
          </div><br>

          <!-- question 14 end -->
          <!-- question 15 start -->
          <h4>What were the reason(s) for changing job or self-employment venture?</h4>
          <div class="checkbox">
            <label for="Salaries15"><input type="checkbox" id="Salaries15" name="ans15" value="Salaries and Benefits" >Salaries and Benefits</label>
          </div>
          <div class="checkbox">
            <label for="Career15"><input type="checkbox" id="Career15" name="ans15-1" value="Career Challenge" >Career Challenge</label>
          </div>
          <div class="checkbox">
            <label for="Related15"><input type="checkbox" id="Related15" name="ans15-2" value="Related to Course or Program of Study" >Related to Course or Program of Study</label>
          </div>
          <div class="checkbox">
            <label for="Proximity15"><input type="checkbox" id="Proximity15" name="ans15-3" value="Proximity to Residence" >Proximity to Residence</label>
          </div>
          <div class="checkbox">
            <label for="other15"><input type="checkbox" id="other15" name="ans15-4" value="other reason(s)" >other reason(s)</label>
          </div><br>

          <!-- question 15 end -->
          <!-- question 16 start -->
          <h4>How long did you stay in your first job?</h4>
          <div class="radio">
            <label for="Less than a month"><input type="radio" id="Less than a month" name="ans16" value="Less than a month" required>Less than a month</label>
          </div>
          <div class="radio">
            <label for="1 to 7 months"><input type="radio" id="1 to 7 months" name="ans16" value="1 to 7 months" required>1 to 7 months</label>
          </div>
          <div class="radio">
            <label for="7 to 11 months"><input type="radio" id="7 to 11 months" name="ans16" value="7 to 11 months" required>7 to 11 months</label>
          </div>
          <div class="radio">
            <label for="1 year to less than 2 years"><input type="radio" id="1 year to less than 2 years" name="ans16" value="1 year to less than 2 years" required>1 year to less than 2 years</label>
          </div>
          <div class="radio">
            <label for="2 years to less than 3 years"><input type="radio" id="2 years to less than 3 years" name="ans16" value="2 years to less than 3 years" required>2 years to less than 3 years</label>
          </div>
          <div class="radio">
            <label for="3 years to less than 5 years"><input type="radio" id="3 years to less than 5 years" name="ans16" value="3 years to less than 5 years" required>3 years to less than 5 years</label>
          </div><br>
          <!-- question 16 end -->
          <!-- question 4 start -->
          <h4>How did you land your first job?</h4>
          <div class="radio">
            <br><label for="walkInApplicant"><input type="radio" id="walkInApplicant" name="ans4" value="walkInApplicant" required>Walk In Applicant</label>
          </div>
          <div class="radio">
            <label for="responseToAdvertisement"><input type="radio" id="responseToAdvertisement" name="ans4" value="responseToAdvertisement" required>Response To Advertisement</label>
          </div>
          <div class="radio">
            <label for="recommendedBySomeone"><input type="radio" id="recommendedBySomeone" name="ans4" value="recommendedBySomeone" required>Recommended By Someone</label>
          </div>
          <div class="radio">
            <label for="familyBusiness"><input type="radio" id="familyBusiness" name="ans4" value="familyBusiness" required>Family Business</label>
          </div>
          <div class="radio">
            <label for="arrangeBytheSchoolOrJobPlacementOffer"><input type="radio" id="arrangeBytheSchoolOrJobPlacementOffer" name="ans4" value="arrangeBytheSchoolOrJobPlacementOffer" required>Arrange by the school or job placement offer</label>
          </div>
          <div class="radio">
            <label for="jobFairOrPublicEmploymentServiceOffice"><input type="radio" id="jobFairOrPublicEmploymentServiceOffice" name="ans4" value="jobFairOrPublicEmploymentServiceOffice" required>Job Fair or public employement service office</label>
          <!-- question 4 end -->

        <!-- question 5 start -->
        <h4>How long did it take you to land your first job?</h4>
        <div class="radio">
          <br><label for="1-5mos"><input type="radio" id="1-5mos" name="ans5" value="1-5mos" required>1-5months</label>
        </div>
        <div class="radio">
          <label for="5-11mos"><input type="radio" id="5-11mos" name="ans5" value="5-11mos" required>5-11months</label>
        </div>
        <div class="radio">
          <label for="1-2years"><input type="radio" id="1-2years" name="ans5" value="1-2years" required>1-2years</label>
        </div>
        <div class="radio">
          <label for="2-3years"><input type="radio" id="2-3years" name="ans5" value="2-3years" required>2-3years</label>
        </div>
        <div class="radio">
          <label for="3-5years"><input type="radio" id="3-5years" name="ans5" value="3-5years" required>3-5years</label>
        </div>

        <!-- question 5 end -->
        <!-- question 6 start -->
        <h4>Job level position?</h4>
        <div class="radio">
          <br><label for="rank/clerical"><input type="radio" id="rank/clerical" name="ans6" value="rank/clerical" required>Rank/Clerical</label>
        </div>
        <div class="radio">
          <label for="professional/advisory"><input type="radio" id="professional/advisory" name="ans6" value="professional/advisory" required>Professional/Advisory</label>
        </div>
        <div class="radio">
          <label for="managerial/executive"><input type="radio" id="managerial/executive" name="ans6" value="managerial/executive" required>Managerial/Executive</label>
        </div>
        <div class="radio">
          <label for="self-employed"><input type="radio" id="self-employed" name="ans6" value="self-employed" required>Self-Employed</label>
        </div> <br>

        <!-- question 6 end -->

        <!-- question 3 start -->
        <h4>What is your initial gross monthly income in your first job after college?</h4>
        <div class="radio">
          <br><label for="8,000"><input type="radio" id="8,000" name="ans3" value="8,000 below" required>8,000 Below</label>
        </div>
        <div class="radio">
          <label for="8,000-15,000"><input type="radio" id="8,000-15,000" name="ans3" value="8,000-15,000" required>8,000-15,000</label>
        </div>
        <div class="radio">
          <label for="15,000-25,000"><input type="radio" id="15,000-25,000" name="ans3" value="15,000-25,000" required>15,000-25,000</label>
        </div>
        <div class="radio">
          <label for="25,000"><input type="radio" id="25,000" name="ans3" value="25,000 above" required>25,000 Above</label>
        </div>
        <!-- question 3 end -->

        <!-- question 17 start -->
        <h4>Was the curriculum you had in college relevant to your job?</h4>
        <div class="radio">
          <label for="yes17"><input type="radio" id="yes17" name="ans17" value="Yes" required>Yes</label>
        </div>
        <div class="radio">
          <label for="no17"><input type="radio" id="no17" name="ans17" value="No" required>No</label>
        </div><br>
        <!-- question 17 end -->
        <!-- question 18 start -->
        <h4>What competencies learned in college did you find very useful in your job?</h4>
        <div class="checkbox">
          <label for="Communication skills"><input type="checkbox" id="Communication skills" name="ans18" value="Communication skills" >Communication skills</label>
        </div>
        <div class="checkbox">
          <label for="Human Relation skills"><input type="checkbox" id="Human Relation skills" name="ans18-1" value="Career Challenge" >Human Relation skills</label>
        </div>
        <div class="checkbox">
          <label for="Entrepreneurial skills"><input type="checkbox" id="Entrepreneurial skills" name="ans18-2" value="Entrepreneurial skills" >Entrepreneurial skills</label>
        </div>
        <div class="checkbox">
          <label for="Information Technology skills"><input type="checkbox" id="Information Technology skills" name="ans18-3" value="Information Technology skills" >Information Technology skills</label>
        </div>
        <div class="checkbox">
          <label for="Problem-solving skills"><input type="checkbox" id="Problem-solving skills" name="ans18-4" value="Problem-solving skills" >Problem-solving skills</label>
        </div>
        <div class="checkbox">
          <label for="other reason(s)"><input type="checkbox" id="other reason(s)" name="ans18-5" value="other reason(s)" >other reason(s)</label>
        </div><br>
        <!-- question 18 end -->

        <input type="submit" name="submit" class="btn btn-success" value="Next">


    </form>

  </body>
</html>
