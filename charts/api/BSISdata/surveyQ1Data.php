<?php
header('Content-Type: application/json;');
header('Access-Control-Allow-Origin: *');

//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'ssutracer');

//connecting to db
$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$conn){
  die("Connection Failed:" . $conn->error);
}

//query to get data from table
$sql = sprintf("SELECT answertext, count(answer_tbl.answerID) as count from answer_tbl, personalinfo_tbl where answer_tbl.question_id=1 && personalinfo_tbl.respondentID=answer_tbl.respondent_ID && personalinfo_tbl.course='BSIS' GROUP BY answer_tbl.answerText");

//exec SQL
$result = $conn->query($sql);

//loop through the returned data
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

//free memory associated with result
$result->close();

//close Connection
$conn->close();

//print data or show
print json_encode($data);
 ?>
