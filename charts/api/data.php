<?php
header('Content-Type: application/json');

//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'myscore');

//connecting to db
$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$conn){
  die("Connection Failed:" . $conn->error);
}

//query to get data from table
$sql = sprintf("SELECT teamname, teammatch, score FROM teamscore ORDER BY teammatch");

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
