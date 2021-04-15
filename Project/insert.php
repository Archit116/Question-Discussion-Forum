<?php
//NEED
$qid=$_POST["qid"];
session_start();
$db_conn = new mysqli('localhost', 'root', '', 'my_first_database');
$str="";
if (isset($_SESSION['loggedin'])) {
  $uid = $_SESSION['uid'];

  $checkQuery = "SELECT * FROM upvote WHERE qid = '$qid' AND uid = '$uid'";
  $check = mysqli_query($db_conn, $checkQuery);
  if (mysqli_num_rows($check) == 0) {
    $sql = "INSERT INTO upvote (qid, uid)
            VALUES ('$qid','$uid');";
            mysqli_query($db_conn,$sql);
            $str="voted";
  }
  else {
    $remove = "DELETE FROM upvote WHERE qid='$qid' AND uid='$uid'";
    mysqli_query($db_conn,$remove);
    $str="";
  }

  $sqlUP = "SELECT * FROM upvote WHERE qid='$qid'";
  $resultUP = mysqli_query($db_conn, $sqlUP);
  $countUP = mysqli_num_rows($resultUP);

  echo $countUP." ". $str;
}

else {
  echo "Please log in";
}

?>
