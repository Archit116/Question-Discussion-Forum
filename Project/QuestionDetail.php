<?php
//NEED
session_start();
$db_conn = new mysqli('localhost', 'root', '', 'my_first_database');
if (isset($_SESSION['loggedin'])) {
  $qid = $_SESSION['qid'];
}
else {
  $qid = $_POST['sub'];
}
if (isset($_POST['submitA'])) {
  $content = $_POST['cont'];
  $qid = $_SESSION['qid'];
  $uid = $_SESSION['uid'];
  $name = $_SESSION['name'];
  $sqlA = "INSERT INTO answers (qid,uid, uname, content) VALUES('$qid', '$uid', '$name', '$content')";
  $resultA = mysqli_query($db_conn, $sqlA);
}
?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
    body {
      background-color: var(--bgbg);
      display: flex;
      flex-flow: column;
    }
    header {
      padding: 0.3em;
      margin: 0 2em;
    }
    header a {
      text-decoration: none;
      font-size: x-large;
      color: var(--colcol);
    }

    header a:hover {
      text-shadow: ;
      color: yellow ;
    }
    .Q {
      width: 95%;
      display: flex;
      flex-direction: column;
      margin: 2em auto;
      background-color: var(--colcol);
      border-radius: 10px;
    }

    #btn {
      margin-top: 1.5em;
      margin-bottom: 1.5em;
      margin-left: 3em;
    }


    .sp {
      border: 2px solid black;
      padding: 0.5em;
      margin-left: 1em;
      font-size: small;
      border-radius: 20px;
    }
    .n {
      padding: 1em;
      width: 6em;
    }
    .t {
      margin-left: 1em;
      font-size: smaller;
      color: gray;
    }
    .pic {
      height:9px;
      width:9px;
    }
    .cont {
      font-weight: bolder;
      font-size: larger;
      margin-left: 1rem;
    }
    .cont2 {
      font-weight: bold;
      margin-left: 1em;
    }


            .space {
              border: 2px solid black;
              padding: 0.5em;
              margin-left: 1em;
              font-size: medium;
              text-align:center;
              border-radius: 20px;
              text-transform: capitalize;
            }

            .name {
              background-color: #FFCBA4;
              text-align:center;
              border-radius: 10px;
              padding: 0.5em;
              margin-left: 1em;
              text-transform: capitalize;
              width: 6em;
            }
            .time {

              margin: 0 1em;
              font-size: smaller;
              color: gray;
              text-align:jusstify;
            }

            .title {
              font-size: large;
              font-weight: bolder;
            }




            .aBox2 {
              width: 85%;
              padding:2em;
              background-color: var(--colcol2);
              margin: 2em auto;
              border-radius: 20px;
              display: flex;
              flex-direction: column;
            }

            .conta {
              display: flex;
              flex-flow:row;
              justify-content: flex-start;
              align-items: baseline;
              flex-grow: 3;
            }

            .abox23 {
              width: 85%;
              padding:2em;
              background-color: var(--colcol2);
              margin: 2em auto;
              border-radius: 20px;
              display: flex;
              align-items: baseline;
              flex-direction: row;
            }

            .subtle {
              color: gray;
              font-family: monospace;
              font-size: x-large;
            }

            #f {
              background-color: var(--colcol2);
              display: flex;
              flex-flow: column;
              border-radius:20px;
              justify-content: center;
              align-items: center;
            }





    :root {
      --colcol: #F4F3EE;
      --bgbg: #8A817C;
      --colcol2: #FDF8F5;
    }
    @media only screen and ( (max-width: 340px) {
      .title {
        font-size: small;
      }
      .content {
        font-size: smaller;
      }
      .name {
        width: 4em;
      }
    }

    @media only screen and (min-width: 341px) and (max-width: 439px) {
      .subtle {
        font-size: medium;
      }
      .abox23 {
        flex-flow: column;
      }
      .conta {
        flex-flow: column;
      }
    }


    </style>
</head>
<body>
  <script>

function myFunction(qid) {

    $.ajax ({
      type: 'POST',
      url: 'insert.php',
      data : {qid: qid},
      success: function(data) {
        document.getElementById('vote'+qid).innerHTML = "Upvotes(" + data + ")";
         if (document.getElementById("swtch"+qid).src == "http://localhost/up.png") {
           document.getElementById("swtch"+qid).src = "http://localhost/down.png";
         }
         else {
           document.getElementById("swtch"+qid).src = "up.png";
         }
      }
  });
}

function del(qid) {
  $.ajax ({
    type: 'POST',
    url: 'del.php',
    data : {qid: qid},
    success: function(data) {
      window.location.replace("Main.php");
    }
});
}
function delA(aid) {
  $.ajax ({
    type: 'POST',
    url: 'delA.php',
    data : {aid: aid},
    success: function(data) {
      window.location.replace("QuestionDetail.php");
    }
});
}

function edit(id) {
  document.getElementById('f').style.display = "flex";
  document.getElementById(id).style.display = "none";

}

function write1() {
  document.getElementById('c').style.display = "none";
  document.getElementById('h').style.display = "flex";
}


</script>
  <header>
    <a href='Main.php'> <p> back </p> </a>
  </header>

<?php
if (isset($_SESSION['loggedin'])) {
  in();
}

else {
  out();
}

  ?>

</body>
  </html>

  <?php

function in() {

  $id = $_SESSION['qid'];
  $db_conn = new mysqli('localhost', 'root', '', 'my_first_database');

  $sql = "SELECT * FROM questions WHERE qid = '$id' ORDER BY time DESC";
  $result = mysqli_query($db_conn, $sql);
  $count = mysqli_num_rows($result);
  $row = mysqli_fetch_array($result);
  $time = $row['time'];
  $timeT = explode("-",$time);
  $timee = $timeT[2]."-".$timeT[1]."-".$timeT[0];

  $sqlUP = "SELECT * FROM upvote WHERE qid='$id'";
  $resultUP = mysqli_query($db_conn, $sqlUP);
  $countUP = mysqli_num_rows($resultUP);

  $sqlAns = "SELECT * FROM answers WHERE qid = '$id' ORDER BY time";
  $resultAns = mysqli_query($db_conn, $sqlAns);
  $countAns = mysqli_num_rows($resultAns);




    echo "<div id='$id'  class = 'Q'>
  <label>  <button id='btn' onclick=\"myFunction($id)\"> <img class = 'pic' src='up.png'> </button> <label id='vote" .$id ."' class='btn'>Upvotes(" . $countUP . ") </label>";
    if (isset($_SESSION['loggedin'])) {
      if ($row['creatorid'] == $_SESSION['uid']) {
        echo "<button onclick='edit($id)'><label>Edit</label></button> &nbsp;
              <button onclick='del($id)'><label>Delete</label></button>";
      }
    }
    echo "<br><label class = 'sp'>" . $row['space'] . "</label><br> <br>
    <label class = 'n'>" . $row['creator_name'] . "</label>
    <label class = 't'>Posted on " . $timee . "</label>
    <p class = 'cont'>" . $row['title'] . "</p>
    <p class = 'cont2'>" . $row['content'] . "</p>
    <br></div>";

    echo "<div style='display:none;' id='f'><form action='new.php' method='POST'>
    <p>Title</p>
    <input type=\"text\" name ='title' value='". $row['title'] ."'> <p>Space</p>
    <input type=\"radio\" id=\"alg\" name=\"space\" value=\"Algorithm\" required>
    <label for=\"alg\">Algorithm</label>  &nbsp;&nbsp;&nbsp;
    <input type=\"radio\" id=\"ml\" name=\"space\" value=\"Machine_learning\" required>
    <label for=\"ml\">Machine Learning</label> &nbsp;&nbsp;&nbsp;
    <input type=\"radio\" id=\"sys\" name=\"space\" value=\"System\" required>
    <label for=\"sys\">System</label>  &nbsp;&nbsp;&nbsp;
    <input type=\"radio\" id=\"js\" name=\"space\" value=\"JavaScript\" required>
    <label for=\"sys\">JavaScript </label>
    <br><br>
    <label> Content </label>
    <br>
    <textarea id=\"txt\" name=\"content\" rows=\"4\" placeholder='". $row['content'] ."' cols=\"50\" required></textarea>
    <br><br>
    <input type=\"submit\" name='sub' value=\"sub\">
    </form></div>";


    while ($ans = mysqli_fetch_array($resultAns)) {
      $id = $ans['aid'];
      $time = $ans['time'];
      $timeT = explode("-",$time);
      $timee = $timeT[2]."-".$timeT[1]."-".$timeT[0];

      echo "<div id='a' class='aBox2 ansDis". $id. "'>
      <div class='conta'><label class = 'name'>" . $ans['uname'] . "</label>
      <label class = 'time'>" . $timee . "</label>";
      if ($ans['uid'] == $_SESSION['uid']) {
        echo "<button onclick='delA($i)'><label id='r'>Delete</label></button>";
      }
      echo "</div>";
      echo "<br><p class='contt'>" . $ans['content'] . "</p>
      </div>";

    }

      if (isset($_SESSION['loggedin'])) {

        echo "<div id='c' class='aBox23 ansDis". $id. "'>
        <label class = 'name'>" . $_SESSION['name'] . "</label>
      <a onclick='write1()'> <label class='subtle'> Post your Answer</label> </a>
        </div>";

        echo "<div id='h' style='display: none; flex-flow:column;justify-content:center;align-items:center; background-color:#FDF8F5;'>
        <label style='font-size:large;'> ".$_SESSION['name']."</label>
        <form name='fo' action='QuestionDetail.php' method='POST'><br>
        <textarea name= 'cont' value = 'cont' required> This is answer. </textarea> <br> <br>
        <button name='submitA' value='SubmitA' type='submit'>Submit</button> &nbsp;&nbsp;
        <button type='cancel' name='cancel' value='cancel'>Cancel</button>
        </form>
        </div>";
      }



}


function out() {
  $db_conn = new mysqli('localhost', 'root', '', 'my_first_database');
$id = $_POST['sub'];

  $sql = "SELECT * FROM questions WHERE qid = '$id'";
  $result = mysqli_query($db_conn, $sql);
  $count = mysqli_num_rows($result);
  $row = mysqli_fetch_array($result);



      $sqlUP = "SELECT * FROM upvote WHERE qid='$id'";
      $resultUP = mysqli_query($db_conn, $sqlUP);
      $countUP = mysqli_num_rows($resultUP);


      $sqlAns = "SELECT * FROM answers WHERE qid = '$id'";
      $resultAns = mysqli_query($db_conn, $sqlAns);
      $countAns = mysqli_num_rows($resultAns);

      $time = $row['time'];
      $timeT = explode("-",$time);
      $timee = $timeT[2]."-".$timeT[1]."-".$timeT[0];


      echo "<div id='$id'  class = 'Q'>
    <label>  <button id='btn' onclick=\"myFunction($id)\"> <img class = 'pic' src='up.png'> </button> <label id='vote" .$id ."' class='btn'>Upvotes(" . $countUP . ") </label>";
      if (isset($_SESSION['loggedin'])) {
        if ($row['creatorid'] == $_SESSION['uid']) {
          echo "<button onclick='edit($id)'><label>Edit</label></button> &nbsp;
                <button onclick='del($id)'><label>Delete</label></button>";
        }
      }
      echo "<br><label class = 'sp'>" . $row['space'] . "</label><br> <br>
      <label class = 'n'>" . $row['creator_name'] . "</label>
      <label class = 't'>Posted on " . $timee . "</label>
      <p class = 'cont'>" . $row['title'] . "</p>
      <p class = 'cont2'>" . $row['content'] . "</p>
      <br></div>";

      echo "<div style='display:none;' id='f'><form action='new.php' method='POST'>
      <p>Title</p>
      <input type=\"text\" name ='title' value='". $row['title'] ."'> <p>Space</p>
      <input type=\"radio\" id=\"alg\" name=\"space\" value=\"Algorithm\" required>
      <label for=\"alg\">Algorithm</label>  &nbsp;&nbsp;&nbsp;
      <input type=\"radio\" id=\"ml\" name=\"space\" value=\"Machine_learning\" required>
      <label for=\"ml\">Machine Learning</label> &nbsp;&nbsp;&nbsp;
      <input type=\"radio\" id=\"sys\" name=\"space\" value=\"System\" required>
      <label for=\"sys\">System</label>  &nbsp;&nbsp;&nbsp;
      <input type=\"radio\" id=\"js\" name=\"space\" value=\"JavaScript\" required>
      <label for=\"sys\">JavaScript </label>
      <br><br>
      <label> Content </label>
      <br>
      <textarea id=\"txt\" name=\"content\" rows=\"4\" placeholder='". $row['content'] ."' cols=\"50\" required></textarea>
      <br><br>
      <input type=\"submit\" name='sub' value=\"sub\">
      </form></div>";


      while ($ans = mysqli_fetch_array($resultAns)) {
        $id = $ans['aid'];
        $time = $ans['time'];
        $timeT = explode("-",$time);
        $timee = $timeT[2]."-".$timeT[1]."-".$timeT[0];

        echo "<div id='a' class='aBox2 ansDis". $id. "'>
        <div class='conta'><label class = 'name'>" . $ans['uname'] . "</label>
        <label class = 'time'>" . $timee . "</label>";

        echo "</div>";
        echo "<br><p class='contt'>" . $ans['content'] . "</p>
        </div>";

      }
  }


   ?>
