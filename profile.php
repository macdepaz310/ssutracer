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
     $rid = $user['email_address'];
       }
 }
$msg = '';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
    <script
			  src="https://code.jquery.com/jquery-2.2.0.min.js"
			  integrity="sha256-ihAoc6M/JPfrIiIeayPE9xjin4UWjsx2mjW/rtmxLM4="
			  crossorigin="anonymous"></script>
  </head>
  <body>
    <h1>My Profile</h1>
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
                echo "<img src='uploads/profile".$id.".jpg?'".mt_rand()." style='height:150px; width:150px'>";
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
    <!-- add/upload profile image -->
      <form action="upload.php" method="post" enctype="multipart/form-data">
       Select image to upload:
       <input type="file" id="image" name="image" accept=".jpg"/>
       <input type="submit" name="submit" id="submit" value="UPLOAD"/>
     </form>
    <?php if (!empty($user)): ?>
    <!-- <br><?= $user['email_address']; ?> -->
  </p>
</div>
<div class="col-sm-12">
<div class="">
  <p class="text-uppercase  "></p>
  <p>Name: <?= $user['Fullname'] ?></p><br>
  <p>Course: <?= $user['course'] ?></p><br>
  <p>Batch: <?= $user['yearBatch'] ?></p><br>
  <p>Gender: <?= $user['gender'] ?></p><br>
  <p>Civil Status: <?= $user['civil_status'] ?></p><br>
  <p>Birthday: <?= $user['birthdate'] ?></p><br>
  <p>Address: <?= $user['address'] ?></p><br>
  <br>
<?php else: echo "YOU MUST LOG IN TO VISIT THE PAGE, REDIRECTING IN A MOMENT";
header('Refresh: 0.1; url=index.php');?>
<?php endif; ?>
<script>
$(document).ready(function(){
  $('#submit').click(function(){
      var image_name = $('#image').val();
      if(image_name == '')
      {
        alert("Please Select image");
        return false;
      }
      else {
        var extension = $('image').val().split('.').pop().toLowerCase();
        if(jQuery.inArray(extension, ['jpg',]) == -1)
        {
          alert('Invalid Image File');
          $('#image').val('');
          return false;
        }
      }
  });

});
</script>
  </body>
</html>
