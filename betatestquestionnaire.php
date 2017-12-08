<?php
  session_start();
  require 'DBconnect/database.php';

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
require 'DBconnect/database.php';
if(isset($_POST['submit']) && $_POST['rating']):
  $sql = "INSERT INTO betatest_rating_tbl (beta_respondent_id, rating) VALUES (:rid, :rating)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':rating', $_POST['rating']);
  if($stmt->execute()):
    header('Refresh:0.2; url= ../survey/#');
  else:
    echo "sorry";
  endif;
endif;
//Effecient-start
if(isset($_POST['submit']) && $_POST['rating1']):
  $sql = "INSERT INTO betatest_rating_tbl (beta_respondent_id, rating) VALUES (:rid, :rating)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':rating', $_POST['rating1']);
  if($stmt->execute()):
    header('Refresh:0.2; url= ../survey/#');
  else:
    echo "sorry";
  endif;
endif;

if(isset($_POST['submit']) && $_POST['rating2']):
  $sql = "INSERT INTO betatest_rating_tbl (beta_respondent_id, rating) VALUES (:rid, :rating)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':rating', $_POST['rating2']);
  if($stmt->execute()):
    header('Refresh:0.2; url= ../survey/#');
  else:
    echo "sorry";
  endif;
endif;

if(isset($_POST['submit']) && $_POST['rating3']):
  $sql = "INSERT INTO betatest_rating_tbl (beta_respondent_id, rating) VALUES (:rid, :rating)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':rating', $_POST['rating3']);
  if($stmt->execute()):
    header('Refresh:0.2; url= ../survey/#');
  else:
    echo "sorry";
  endif;
endif;

if(isset($_POST['submit']) && $_POST['rating4']):
  $sql = "INSERT INTO betatest_rating_tbl (beta_respondent_id, rating) VALUES (:rid, :rating)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':rating', $_POST['rating4']);
  if($stmt->execute()):
    header('Refresh:0.2; url= ../survey/#');
  else:
    echo "sorry";
  endif;
endif; //Effecient-end

//Speed-start
if(isset($_POST['submit']) && $_POST['rating5']):
  $sql = "INSERT INTO betatest_rating_tbl (beta_respondent_id, rating) VALUES (:rid, :rating)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':rating', $_POST['rating5']);
  if($stmt->execute()):
    header('Refresh:0.2; url= ../survey/#');
  else:
    echo "sorry";
  endif;
endif;

if(isset($_POST['submit']) && $_POST['rating6']):
  $sql = "INSERT INTO betatest_rating_tbl (beta_respondent_id, rating) VALUES (:rid, :rating)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':rating', $_POST['rating6']);
  if($stmt->execute()):
    header('Refresh:0.2; url= ../survey/#');
  else:
    echo "sorry";
  endif;
endif;

if(isset($_POST['submit']) && $_POST['rating7']):
  $sql = "INSERT INTO betatest_rating_tbl (beta_respondent_id, rating) VALUES (:rid, :rating)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':rating', $_POST['rating7']);
  if($stmt->execute()):
    header('Refresh:0.2; url= ../survey/#');
  else:
    echo "sorry";
  endif;
endif;

if(isset($_POST['submit']) && $_POST['rating8']):
  $sql = "INSERT INTO betatest_rating_tbl (beta_respondent_id, rating) VALUES (:rid, :rating)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':rating', $_POST['rating8']);
  if($stmt->execute()):
    header('Refresh:0.2; url= ../survey/#');
  else:
    echo "sorry";
  endif;
endif;

if(isset($_POST['submit']) && $_POST['rating9']):
  $sql = "INSERT INTO betatest_rating_tbl (beta_respondent_id, rating) VALUES (:rid, :rating)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':rating', $_POST['rating9']);
  if($stmt->execute()):
    header('Refresh:0.2; url= ../survey/#');
  else:
    echo "sorry";
  endif;
endif;//speed-end

//accuracy-start
//Speed-start
if(isset($_POST['submit']) && $_POST['rating10']):
  $sql = "INSERT INTO betatest_rating_tbl (beta_respondent_id, rating) VALUES (:rid, :rating)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':rating', $_POST['rating10']);
  if($stmt->execute()):
    header('Refresh:0.2; url= ../survey/#');
  else:
    echo "sorry";
  endif;
endif;

if(isset($_POST['submit']) && $_POST['rating11']):
  $sql = "INSERT INTO betatest_rating_tbl (beta_respondent_id, rating) VALUES (:rid, :rating)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':rating', $_POST['rating11']);
  if($stmt->execute()):
    header('Refresh:0.2; url= ../survey/#');
  else:
    echo "sorry";
  endif;
endif;

if(isset($_POST['submit']) && $_POST['rating12']):
  $sql = "INSERT INTO betatest_rating_tbl (beta_respondent_id, rating) VALUES (:rid, :rating)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':rating', $_POST['rating12']);
  if($stmt->execute()):
    header('Refresh:0.2; url= ../survey/#');
  else:
    echo "sorry";
  endif;
endif;

if(isset($_POST['submit']) && $_POST['rating13']):
  $sql = "INSERT INTO betatest_rating_tbl (beta_respondent_id, rating) VALUES (:rid, :rating)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':rating', $_POST['rating13']);
  if($stmt->execute()):
    header('Refresh:0.2; url= ../survey/#');
  else:
    echo "sorry";
  endif;
endif;

if(isset($_POST['submit']) && $_POST['rating14']):
  $sql = "INSERT INTO betatest_rating_tbl (beta_respondent_id, rating) VALUES (:rid, :rating)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':rating', $_POST['rating14']);
  if($stmt->execute()):
    header('Refresh:0.2; url= ../survey/#');
  else:
    echo "sorry";
  endif;
endif;//accuracy-end
//realiability-start
if(isset($_POST['submit']) && $_POST['rating15']):
  $sql = "INSERT INTO betatest_rating_tbl (beta_respondent_id, rating) VALUES (:rid, :rating)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':rating', $_POST['rating15']);
  if($stmt->execute()):
    header('Refresh:0.2; url= ../survey/#');
  else:
    echo "sorry";
  endif;
endif;

if(isset($_POST['submit']) && $_POST['rating16']):
  $sql = "INSERT INTO betatest_rating_tbl (beta_respondent_id, rating) VALUES (:rid, :rating)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':rating', $_POST['rating16']);
  if($stmt->execute()):
    header('Refresh:0.2; url= ../survey/#');
  else:
    echo "sorry";
  endif;
endif;

if(isset($_POST['submit']) && $_POST['rating17']):
  $sql = "INSERT INTO betatest_rating_tbl (beta_respondent_id, rating) VALUES (:rid, :rating)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':rating', $_POST['rating17']);
  if($stmt->execute()):
    header('Refresh:0.2; url= ../survey/#');
  else:
    echo "sorry";
  endif;
endif;

if(isset($_POST['submit']) && $_POST['rating18']):
  $sql = "INSERT INTO betatest_rating_tbl (beta_respondent_id, rating) VALUES (:rid, :rating)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':rating', $_POST['rating18']);
  if($stmt->execute()):
    header('Refresh:0.2; url= ../survey/#');
  else:
    echo "sorry";
  endif;
endif;

if(isset($_POST['submit']) && $_POST['rating19']):
  $sql = "INSERT INTO betatest_rating_tbl (beta_respondent_id, rating) VALUES (:rid, :rating)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':rating', $_POST['rating19']);
  if($stmt->execute()):
    header('Refresh:0.2; url= ../survey/#');
  else:
    echo "sorry";
  endif;
endif;//realiability-end

//Security-start
if(isset($_POST['submit']) && $_POST['rating20']):
  $sql = "INSERT INTO betatest_rating_tbl (beta_respondent_id, rating) VALUES (:rid, :rating)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':rating', $_POST['rating20']);
  if($stmt->execute()):
    header('Refresh:0.2; url= ../survey/#');
  else:
    echo "sorry";
  endif;
endif;

if(isset($_POST['submit']) && $_POST['rating21']):
  $sql = "INSERT INTO betatest_rating_tbl (beta_respondent_id, rating) VALUES (:rid, :rating)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':rating', $_POST['rating21']);
  if($stmt->execute()):
    header('Refresh:0.2; url= ../survey/#');
  else:
    echo "sorry";
  endif;
endif;

if(isset($_POST['submit']) && $_POST['rating22']):
  $sql = "INSERT INTO betatest_rating_tbl (beta_respondent_id, rating) VALUES (:rid, :rating)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':rating', $_POST['rating22']);
  if($stmt->execute()):
    header('Refresh:0.2; url= ../survey/#');
  else:
    echo "sorry";
  endif;
endif;

if(isset($_POST['submit']) && $_POST['rating23']):
  $sql = "INSERT INTO betatest_rating_tbl (beta_respondent_id, rating) VALUES (:rid, :rating)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':rating', $_POST['rating23']);
  if($stmt->execute()):
    header('Refresh:0.2; url= ../survey/#');
  else:
    echo "sorry";
  endif;
endif;

if(isset($_POST['submit']) && $_POST['rating24']):
  $sql = "INSERT INTO betatest_rating_tbl (beta_respondent_id, rating) VALUES (:rid, :rating)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':rid', $rid);
  $stmt->bindParam(':rating', $_POST['rating24']);
  if($stmt->execute()):
    header('Refresh:0.2; url= userhomepage.php?ThankYOU');
  else:
    echo "sorry";
  endif;
endif;//security-end
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Survey Page</title>
    <style media="screen">
      table, tr, th, td{border: 1px solid black; border-collapse: collapse;}
    </style>
  </head>
  <body>
    <h4>Part II- Evaluation of the <u>WEB-BASED SSU EMPLOYMENT TRACER FOR 2013-2017 BSIT AND BSIS GRADUATES</u> in terms of Efficiency, Speed, Reliability, Accuracy and Security.</h4>

      <pre>Direction: Please provide needed information below by putting check in each blank item.
        5-Highly Efficient (HE)
        4-Efficient (E)
        3-Fair (F)
        2-Poor (P)
        1-Undecided(U)
      </pre>
    <form class="" action="betatestquestionnaire.php" method="post">
      <table>
        <tr><th>Efficiency</th>
        <td>HE</td>
        <td>E</td>
        <td>F</td>
        <td>P</td>
        <td>U</td>
        </tr>
          <tr>
            <td>1. The system can collect survey.</td>
            <td><input type="radio" name="rating" value="Efficient1_HE" required></td>
            <td><input type="radio" name="rating" value="Efficient1_E" required></td>
            <td><input type="radio" name="rating" value="Efficient1_F" required></td>
            <td><input type="radio" name="rating" value="Efficient1_P" required></td>
            <td><input type="radio" name="rating" value="Efficient1_U" required></td>
          </tr>
          <tr>
            <td>2. The system can create a report chart for the survey.</td>
            <td><input type="radio" name="rating1" value="Efficient2_HE" required></td>
            <td><input type="radio" name="rating1" value="Efficient2_E" required></td>
            <td><input type="radio" name="rating1" value="Efficient2_F" required></td>
            <td><input type="radio" name="rating1" value="Efficient2_P" required></td>
            <td><input type="radio" name="rating1" value="Efficient2_U" required></td>
          </tr>
          <tr>
            <td>3. The system is accessible online.</td>
            <td><input type="radio" name="rating2" value="Efficient3_HE" required></td>
            <td><input type="radio" name="rating2" value="Efficient3_E" required></td>
            <td><input type="radio" name="rating2" value="Efficient3_F" required></td>
            <td><input type="radio" name="rating2" value="Efficient3_P" required></td>
            <td><input type="radio" name="rating2" value="Efficient3_U" required></td>
          </tr>
          <tr>
            <td>4. The system makes the work easier than manual process.</td>
            <td><input type="radio" name="rating3" value="Efficient4_HE" required></td>
            <td><input type="radio" name="rating3" value="Efficient4_E" required></td>
            <td><input type="radio" name="rating3" value="Efficient4_F" required></td>
            <td><input type="radio" name="rating3" value="Efficient4_P" required></td>
            <td><input type="radio" name="rating3" value="Efficient4_U" required></td>
          </tr>
          <tr>
            <td>5. The user can provide feedback to the system.</td>
            <td><input type="radio" name="rating4" value="Efficient5_HE" required></td>
            <td><input type="radio" name="rating4" value="Efficient5_E" required></td>
            <td><input type="radio" name="rating4" value="Efficient5_F" required></td>
            <td><input type="radio" name="rating4" value="Efficient5_P" required></td>
            <td><input type="radio" name="rating4" value="Efficient5_U" required></td>
          </tr>
      </table>

      <table>
        <tr><th>Speed</th>
        <td>HE</td>
        <td>E</td>
        <td>F</td>
        <td>P</td>
        <td>U</td>
        </tr>
          <tr>
            <td>1. The system provide  fast survey result.</td>
            <td><input type="radio" name="rating5" value="Speed1_HE" required></td>
            <td><input type="radio" name="rating5" value="Speed1_E" required></td>
            <td><input type="radio" name="rating5" value="Speed1_F" required></td>
            <td><input type="radio" name="rating5" value="Speed1_P" required></td>
            <td><input type="radio" name="rating5" value="Speed1_U" required></td>
          </tr>
          <tr>
            <td>2. The system depends of the data/internet speed.</td>
            <td><input type="radio" name="rating6" value="Speed2_HE" required></td>
            <td><input type="radio" name="rating6" value="Speed2_E" required></td>
            <td><input type="radio" name="rating6" value="Speed2_F" required></td>
            <td><input type="radio" name="rating6" value="Speed2_P" required></td>
            <td><input type="radio" name="rating6" value="Speed2_U" required></td>
          </tr>
          <tr>
            <td>3. The functions of the system works fast.</td>
            <td><input type="radio" name="rating7" value="Speed3_HE" required></td>
            <td><input type="radio" name="rating7" value="Speed3_E" required></td>
            <td><input type="radio" name="rating7" value="Speed3_F" required></td>
            <td><input type="radio" name="rating7" value="Speed3_P" required></td>
            <td><input type="radio" name="rating7" value="Speed3_U" required></td>
          </tr>
          <tr>
            <td>4. The system works smoothly. </td>
            <td><input type="radio" name="rating8" value="Speed4_HE" required></td>
            <td><input type="radio" name="rating8" value="Speed4_E" required></td>
            <td><input type="radio" name="rating8" value="Speed4_F" required></td>
            <td><input type="radio" name="rating8" value="Speed4_P" required></td>
            <td><input type="radio" name="rating8" value="Speed4_U" required></td>
          </tr>
          <tr>
            <td>5.  The result of the respondent automatically updated.</td>
            <td><input type="radio" name="rating9" value="Speed5_HE" required></td>
            <td><input type="radio" name="rating9" value="Speed5_E" required></td>
            <td><input type="radio" name="rating9" value="Speed5_F" required></td>
            <td><input type="radio" name="rating9" value="Speed5_P" required></td>
            <td><input type="radio" name="rating9" value="Speed5_U" required></td>
          </tr>
      </table>


            <table>
              <tr><th>Accuracy</th>
              <td>HE</td>
              <td>E</td>
              <td>F</td>
              <td>P</td>
              <td>U</td>
              </tr>
                <tr>
                  <td>1. The system can generate chart reports.</td>
                  <td><input type="radio" name="rating10" value="Accuracy1_HE" required></td>
                  <td><input type="radio" name="rating10" value="Accuracy1_E" required></td>
                  <td><input type="radio" name="rating10" value="Accuracy1_F" required></td>
                  <td><input type="radio" name="rating10" value="Accuracy1_P" required></td>
                  <td><input type="radio" name="rating10" value="Accuracy1_U" required></td>
                </tr>
                <tr>
                  <td>2. The system depends of the data/internet speed.</td>
                  <td><input type="radio" name="rating11" value="Accuracy2_HE" required></td>
                  <td><input type="radio" name="rating11" value="Accuracy2_E" required></td>
                  <td><input type="radio" name="rating11" value="Accuracy2_F" required></td>
                  <td><input type="radio" name="rating11" value="Accuracy2_P" required></td>
                  <td><input type="radio" name="rating11" value="Accuracy2_U" required></td>
                </tr>
                <tr>
                  <td>3. The system is accurate according to the users answers to the survey.</td>
                  <td><input type="radio" name="rating12" value="Accuracy3_HE" required></td>
                  <td><input type="radio" name="rating12" value="Accuracy3_E" required></td>
                  <td><input type="radio" name="rating12" value="Accuracy3_F" required></td>
                  <td><input type="radio" name="rating12" value="Accuracy3_P" required></td>
                  <td><input type="radio" name="rating12" value="Accuracy3_U" required></td>
                </tr>
                <tr>
                  <td>4.The system provides questions according to their answers.  </td>
                  <td><input type="radio" name="rating13" value="Accuracy4_HE" required></td>
                  <td><input type="radio" name="rating13" value="Accuracy4_E" required></td>
                  <td><input type="radio" name="rating13" value="Accuracy4_F" required></td>
                  <td><input type="radio" name="rating13" value="Accuracy4_P" required></td>
                  <td><input type="radio" name="rating13" value="Accuracy4_U" required></td>
                </tr>
                <tr>
                  <td>5.The users personal information is displayed according to their inputs.</td>
                  <td><input type="radio" name="rating14" value="Accuracy5_HE" required></td>
                  <td><input type="radio" name="rating14" value="Accuracy5_E" required></td>
                  <td><input type="radio" name="rating14" value="Accuracy5_F" required></td>
                  <td><input type="radio" name="rating14" value="Accuracy5_P" required></td>
                  <td><input type="radio" name="rating14" value="Accuracy5_U" required></td>
                </tr>
            </table>

            <table>
              <tr><th>Reliability</th>
              <td>HE</td>
              <td>E</td>
              <td>F</td>
              <td>P</td>
              <td>U</td>
              </tr>
                <tr>
                  <td>1. The system provides information about graduates.</td>
                  <td><input type="radio" name="rating15" value="Reliability1_HE" required></td>
                  <td><input type="radio" name="rating15" value="Reliability1_E" required></td>
                  <td><input type="radio" name="rating15" value="Reliability1_F" required></td>
                  <td><input type="radio" name="rating15" value="Reliability1_P" required></td>
                  <td><input type="radio" name="rating15" value="Reliability1_U" required></td>
                </tr>
                <tr>
                  <td>2. The system is working properly.</td>
                  <td><input type="radio" name="rating16" value="Reliability2_HE" required></td>
                  <td><input type="radio" name="rating16" value="Reliability2_E" required></td>
                  <td><input type="radio" name="rating16" value="Reliability2_F" required></td>
                  <td><input type="radio" name="rating16" value="Reliability2_P" required></td>
                  <td><input type="radio" name="rating16" value="Reliability2_U" required></td>
                </tr>
                <tr>
                  <td>3.The system can produce survey result.</td>
                  <td><input type="radio" name="rating17" value="Reliability3_HE" required></td>
                  <td><input type="radio" name="rating17" value="Reliability3_E" required></td>
                  <td><input type="radio" name="rating17" value="Reliability3_F" required></td>
                  <td><input type="radio" name="rating17" value="Reliability3_P" required></td>
                  <td><input type="radio" name="rating17" value="Reliability3_U" required></td>
                </tr>
                <tr>
                  <td>4.The user can  take the survey using data/internet.</td>
                  <td><input type="radio" name="rating18" value="Reliability4_HE" required></td>
                  <td><input type="radio" name="rating18" value="Reliability4_E" required></td>
                  <td><input type="radio" name="rating18" value="Reliability4_F" required></td>
                  <td><input type="radio" name="rating18" value="Reliability4_P" required></td>
                  <td><input type="radio" name="rating18" value="Reliability4_U" required></td>
                </tr>
                <tr>
                  <td>5.The system can show chart as a result of the survey.</td>
                  <td><input type="radio" name="rating19" value="Reliability5_HE" required></td>
                  <td><input type="radio" name="rating19" value="Reliability5_E" required></td>
                  <td><input type="radio" name="rating19" value="Reliability5_F" required></td>
                  <td><input type="radio" name="rating19" value="Reliability5_P" required></td>
                  <td><input type="radio" name="rating19" value="Reliability5_U" required></td>
                </tr>
            </table>

            <table>
              <tr><th>Security</th>
              <td>HE</td>
              <td>E</td>
              <td>F</td>
              <td>P</td>
              <td>U</td>
              </tr>
                <tr>
                  <td>1. Database is secured using password.</td>
                  <td><input type="radio" name="rating20" value="Security1_HE" required></td>
                  <td><input type="radio" name="rating20" value="Security1_E" required></td>
                  <td><input type="radio" name="rating20" value="Security1_F" required></td>
                  <td><input type="radio" name="rating20" value="Security1_P" required></td>
                  <td><input type="radio" name="rating20" value="Security1_U" required></td>
                </tr>
                <tr>
                  <td>2. The users can update only their logged in profile with their password.</td>
                  <td><input type="radio" name="rating21" value="Security2_HE" required></td>
                  <td><input type="radio" name="rating21" value="Security2_E" required></td>
                  <td><input type="radio" name="rating21" value="Security2_F" required></td>
                  <td><input type="radio" name="rating21" value="Security2_P" required></td>
                  <td><input type="radio" name="rating21" value="Security2_U" required></td>
                </tr>
                <tr>
                  <td>3.Confidential answer is not shown to the users.</td>
                  <td><input type="radio" name="rating22" value="Security3_HE" required></td>
                  <td><input type="radio" name="rating22" value="Security3_E" required></td>
                  <td><input type="radio" name="rating22" value="Security3_F" required></td>
                  <td><input type="radio" name="rating22" value="Security3_P" required></td>
                  <td><input type="radio" name="rating22" value="Security3_U" required></td>
                </tr>
                <tr>
                  <td>4.The system files and folders is only accessible by developers and permitted faculties.</td>
                  <td><input type="radio" name="rating23" value="Security4_HE" required></td>
                  <td><input type="radio" name="rating23" value="Security4_E" required></td>
                  <td><input type="radio" name="rating23" value="Security4_F" required></td>
                  <td><input type="radio" name="rating23" value="Security4_P" required></td>
                  <td><input type="radio" name="rating23" value="Security4_U" required></td>
                </tr>
                <tr>
                  <td>5.The site is secured by installing SSL to the domain.</td>
                  <td><input type="radio" name="rating24" value="Security5_HE" required></td>
                  <td><input type="radio" name="rating24" value="Security5_E" required></td>
                  <td><input type="radio" name="rating24" value="Security5_F" required></td>
                  <td><input type="radio" name="rating24" value="Security5_P" required></td>
                  <td><input type="radio" name="rating24" value="Security5_U" required></td>
                </tr>
            </table>
      <input type="submit" name="submit" value="Submit Rating">

    </form>
    <?php if (!empty($user)): ?>
    <br>WELCOME <?= $user['email_address']; ?>
    <br> You Logged In! <br>
    <a href="logout.php">logout?</a>
  <?php else: echo "YOU MUST LOG IN TO VISIT THE PAGE, REDIRECTING IN A MOMENT";
         header('Refresh: 3; url=index.php');?>
    please  log in or register <br>
    <a href="login.php">log in</a> or
    <a href="register.php">Reg</a>

  <?php endif; ?>
  </body>
</html>
