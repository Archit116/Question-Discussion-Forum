<?php
//NEED
$qid=$_POST["qid"];

session_start();
$db_conn = new mysqli('localhost', 'root', '', 'my_first_database');
$_SESSION['qid'] = $qid;

echo $_SESSION['qid'];
?>
