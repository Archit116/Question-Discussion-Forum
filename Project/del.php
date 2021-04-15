<?php
//NEED
$qid=$_POST["qid"];
session_start();
$db_conn = mysqli_connect("localhost", "root", "", "my_first_database");

$remove = "DELETE FROM questions WHERE qid = $qid";
$result = mysqli_query($db_conn, $remove);

 ?>
