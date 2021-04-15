<?php
session_start();
$db_conn = mysqli_connect("localhost", "root", "", "my_first_database");

if (isset($_POST['subMM'])) {
  $content = $_POST['con'];
  $qid = $_SESSION['qid'];
  $uid = $_SESSION['uid'];
  $name = $_SESSION['name'];
  $sqlA = "INSERT INTO answers (qid,uid, uname, content) VALUES('$qid', '$uid', '$name', '$content')";
  if( mysqli_query($db_conn, $sqlA) == true ) {
    header("location: Main.php");
  }
}

 ?>
