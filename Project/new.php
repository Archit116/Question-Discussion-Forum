<?php
session_start();
$db_conn = mysqli_connect("localhost", "root", "", "my_first_database");

if (isset($_POST['sub'])) {
  $space = $_POST['space'];
  $title = $_POST['title'];
  $content = $_POST['content'];
  $qid = $_SESSION['qid'];
  $sql = "UPDATE questions
    SET space='$space', title='$title', content='$content'
    WHERE qid = '$qid'";
    if (mysqli_query($db_conn, $sql) == true) {
      header("location: QuestionDetail.php");
    }
}
?>
