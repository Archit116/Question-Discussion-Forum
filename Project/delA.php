<?php
//NEED
$aid=$_POST["aid"];
session_start();
$db_conn = mysqli_connect("localhost", "root", "", "my_first_database");

$remove = "DELETE FROM answers WHERE aid = $aid";
$result = mysqli_query($db_conn, $remove);

 ?>
