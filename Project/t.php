<?php
session_start();
$db_conn = mysqli_connect("localhost", "root", "", "my_first_database");
$sql = "SELECT * FROM questions ORDER BY time DESC";
$result = mysqli_query($db_conn, $sql);


while($row = mysqli_fetch_array($result)) {
  echo strlen($row['content']) . "\n";
}

 ?>
