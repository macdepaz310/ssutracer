<?php
$db = mysqli_connect("localhost","root","","u226789853_trcr"); //keep your db name
$sql = "SELECT * FROM products WHERE id = $id";
$sth = $db->query($sql);
$result=mysqli_fetch_array($sth);
echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>';
 ?>
