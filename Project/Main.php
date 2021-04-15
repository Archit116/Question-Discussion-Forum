<?php
//NEED
session_start();
$db_conn = mysqli_connect("localhost", "root", "", "my_first_database");
if (isset($_SESSION['loggedin'])) {
$emaile = $_SESSION['email'];
$sqle = "SELECT uid FROM user_ WHERE email = '$emaile'";
$resulte = mysqli_query($db_conn, $sqle);
$rowe = mysqli_fetch_array($resulte, MYSQLI_ASSOC);
$_SESSION['uid'] = $rowe['uid'];
}
$_SESSION['sort'] = "";

if (isset($_POST['subMM'])) {
  $content = $_POST['con'];
  $qid = $_SESSION['qid'];
  $uid = $_SESSION['uid'];
  $name = $_SESSION['name'];
  $sqlA = "INSERT INTO answers (qid, uid, uname, content) VALUES('$qid', '$uid', '$name', '$content')";
  $resultA = mysqli_query($db_conn, $sqlA);
}
?>
<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Main Page</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <style>


        *{box-sizing: border-box;}

        body {
        margin: 0;
        background-color: var(--bgbg);
        }

        nav {
            width: 100%;
            background-color: #4F4846;
            display: flex;
            flex-flow: row;
            justify-content: space-around;
            align-items: center;
        }

        #reg {
          margin-top: 0.9em;
        }

        nav a {
          text-decoration: none;
          color: white;
          font-size: larger;
        }
        nav a:hover {
          color: red;
        }

        .right a{
          color: white;
        }

        #ss {
          width: 20em;
        }
        #logo {
          height: 4.5em;
          width: 10em;
        }
/*respnosve */



        .container {
          display: flex;
          flex-direction: row;
          flex-wrap: nowrap;
        }

        .menu {
          background-color: var(--bgbg);
          width: 26%;
          display: flex;
          flex-direction: column;
          align-items:flex-start;

        }

        .menu form{
            width: 50%;
            background-color: var(--bgbg);
        }

        .menu form button {
          margin-right: 2em;
          margin-top:2em;
          font-size: 100%;
          background-color: var(--bgbg);
          cursor: pointer;
          border: 0;
          color: white;
          padding: 0;
        }

        .main {
            background-color: var(--bgbg);
            width: 100%;
        }

        .box {
          height: 4em;
          margin-top: 1.5em;
          margin-bottom: 0;

        }

        .box span {
          border: 2px solid white;
          float: right;
          color: white;
          font-size: large;
          margin-right: 2em;
          margin-top: 1em;
          border-radius: 20px;
          padding: 0.3em;
        }
        .box span:hover {
          background-color: var(--colcol);
          color: var(--bgbg);
          font-weight: bolder;
        }


        .question {
          width: 95%;
          margin: 2em auto;
          padding: 1em;
          background-color: var(--colcol);
          border-radius: 10px;
          transition: 1s;
        }
        .question:hover {
          box-shadow: 0px 0px 15px 0px white;
          transition: 1s;
        }

        #nm {
          font-family: sans-serif;
          font-size: larger;
        }
        a{
          text-decoration: none;
          color: black;
        }
        #subt {
          color: gray;
          font-family: monospace;
          font-size: x-large;
        }

        #dontBut {
          font-size: 100%;
          background-color: var(--colcol);
          cursor: pointer;
          border: 0;
          padding: 0;
        }

        .questionBox {
           width: 95%;
           margin: 1em auto;
           background-color: var(--colcol);
           border-radius: 10px;
           padding: 2em;
           display: flex;
           flex-flow: column;
           transition: 1s;
         }
         .questionBox:hover {
           box-shadow: 0px 0px 15px 0px white;
           transition: 1s;
         }


         .contain {
           display: flex;
           flex-flow: row;
           margin-bottom: 2em;
         }



         .vitem {
           display: flex;
           flex-flow: column;
           justify-content: space-around;
           padding-right: 0em;
         }
         .oitem {
           display: flex;
           flex-flow: column;
           margin: 2em;
           justify-content: flex-start;
           margin-left: 3em;
         }


         .buttons {
           display: flex;
           flex-flow: row;
           justify-content: flex-start;
           align-items: stretch;
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
          margin-left: 1em;
          font-size: smaller;
          color: gray;
          text-align:jusstify;
        }

        .title {
          font-size: large;
          font-weight: bolder;
        }

        .pic {
          height:10px;
          width:10px;
        }



        .aBox {
          width: 90%;
          padding:2em;
          background-color: var(--colcol2);
          margin: auto;
          margin-top: 2em;
          display: none;
          border-radius: 20px;
          transition: 1s;
        }
        .abox:hover {
          box-shadow: 0px 0px 15px 0px pink;
          transition: 1s;
        }
        .aBox2 {
          width: 90%;
          padding:2em;
          background-color: var(--colcol2);
          margin: 2em auto;
          border-radius: 20px;
        }

        .subtle {
          font-size: larger
          color:gray;
        }

:root {
  --colcol: #F4F3EE;
  --bgbg: #8A817C;
  --colcol2: #FDF8F5;
  --font-size: 16px;
  --line-height: 1.4;
  --lines-to-show: 3;
}

        /*SHOW MORE */
    .hideText {
        display: block;
        display: -webkit-box;
        height: var(--font-size)*var(--line-height)*var(--lines-to-show);
        margin: 0 auto;
        font-size: var(--font-size);
        line-height: var(--line-height);
        -webkit-line-clamp: var(--lines-to-show);
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }





        @media only screen and (max-width: 300px) {
          body {
            font-size:small ;
          }
          nav {
            justify-content: flex-start;
            align-items: center;
          }
          #logo {
            height: 3.5em;
            width: 4em;
          }
              nav a {
                font-size: smaller;
                margin: 0 0.5em;
              }
              #ss {
                width: 3em;
              }
              .contain {
                flex-flow: column;
              }
              .menu form button {
                font-size: 80%;
              }
              .box {
                font-size: small;
              }
              .container {

              }
              #nm, #subt{
                font-size: small;
              }
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
        @media only screen and (min-width: 301px) and (max-width: 439px) {
          body {
            font-size:small ;
          }
          nav {
            justify-content: flex-start;
            align-items: center;
          }
          #logo {
            height: 3.5em;
            width: 4em;
          }
              nav a {
                font-size: smaller;
                margin: 0 0.5em;
              }
              #ss {
                width: 5em;
              }
              .contain {
                flex-flow: column;
              }
              .menu form button {
                font-size: 80%;
              }
              .box {
                font-size: small;
              }
              .container {

              }
              #nm, #subt{
                font-size: small;
              }
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

        @media only screen and (min-width: 440px) and (max-width: 530px){
          nav {
            justify-content: flex-start;
            align-items: center;
          }
          #logo {
            height: 3.5em;
            width: 4em;
          }
              nav a {
                font-size: smaller;
                margin: 0 0.5em;
              }
              #ss {
                width: 10em;
              }
              .contain {
                flex-flow: column;
              }
              .menu form button {
                font-size: 80%;
              }
              .box {
                font-size: small;
              }
              .container {

              }
              #nm, #subt{
                font-size: small;
              }



        }

          @media screen and (min-width: 530px) and (max-width: 1080px) {
            nav {
              justify-content: flex-start;
              align-items: center;
            }
            #logo {
              height: 3.5em;
              width: 4em;
            }
                nav a {
                  font-size: smaller;
                  margin: 0 0.5em;
                }
                #ss {
                  width: 18em;
                }
                .contain {
                  flex-flow: column;
                }
                .menu form button {
                  font-size: 80%;
                }
                .box {
                  font-size: small;
                }
                .container {

                }
                #nm, #subt{
                  font-size: small;
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

  function deets(qid) {

    $.ajax ({
      type: 'POST',
      url: 'DetailLG.php',
      data : {qid: qid},
  });

  }

  function Foo(i) {
    $('.ansDis'+ i ).toggle();
/*
    var y = document.getElementsByClassName('ansDis'+i);
    if (y[i].style.display =="none") {
      y[i].style.display = "block";
    }
    else {
      y[i].style.display = "none";
    }

    alert(y[i].style.display);
*/





    //alert(i);

  }



  function hid(i) {
    document.getElementById('hid'+i).style.display="none";
    document.getElementById('vi'+i).style.display="flex";
  }

  function viewText(i) {
    alert(i);
    var x = document.getElementById("p"+i);
    x.classList.remove("hideText");
    document.getElementById('sh').style.display = "none";
  }




  function srch(str) {

    $.ajax ({
      type: 'POST',
      url: 'menuSearch.php',
      data : {str: str},
      success: function (data) {
        document.getElementsByClassName('questionBox').style.display="none";
      }

  });

}

  function hot() {

    alert("done");
  }


      </script>
        <nav>
              <span><a href="Main.php"><img id = 'logo' src="logo.png"/></a></span>
                <span><a href="Main.php">Home</a></span>
                <span><a href="Main.php" onclick="hot()">Hot</a></span>

                <span>
                   <form  id="reg" action= "Main.php" method="POST">
                   <input id="ss" type="text" name="search_" placeholder="Search"  required>
                   <input type="submit" name = "submit_search">
                  </form>
               </span>

                 <?php
                 if (isset($_SESSION['loggedin'])) {
                   echo "<span> <a class= 'right' href='Logout.php'>Log Out</a></span>";
                 }
                 else {
                   echo "<span class= \"right\"> <a href=\"Register.php\">Register</a></span>
                   <span class= \"right\"> <a href=\"Login.php\">Log In</a></span>";
                 }
                ?>
                </ul>
        </nav>
      <div class="container">
        <div class = "menu">
            <form action="" method="POST">
              <button name="algorithm" value="algorithm" type="submit"> Algorithm </button> <br>
              <button name="Machine Learning" value="Machine Learning" type="submit" > Machine Learning </button><br>
              <button name="system" value="system" type="submit"> System </button><br>
              <button name="javascript" value="javascript" type="submit"> JavaScript </button><br>
            </form>
        </div>
        <div  class = "main">

          <?php
          if (isset($_SESSION['loggedin'])) {
            echo    "<div class=\"box\">
                      <a href=\"NewQuestion.php\"><span>Ask a Question</span></a>
                    </div>
                    <div class=\"question\">
                      <p id='nm'>" . $_SESSION['name'] . "</p>
                      <a href='NewQuestion.php'><p id='subt'> What is your Question? </p> </a>
                    </div>";
          }


          if (isset($_POST['submit_search'])) {
            srchANDdest();
          }
          else if (isset($_POST['algorithm'])) {
            mainFilter("algorithm");
          }
          else if (isset($_POST['Machine_Learning'])) {
            mainFilter("Machine_Learning");
          }
          else if (isset($_POST['system'])) {
            mainFilter("system");
          }
          else if (isset($_POST['javascript'])) {
            mainFilter("javascript");
          }
          else {
            if ($_SESSION['sort'] == "hot") {
              hotDisp();
            }
            else {
              display();
            }
          }

           ?>
        </div>
      </div>
    </body>
</html>

<?php

function display() {
            //Normal Display
            $db_conn = mysqli_connect("localhost", "root", "", "my_first_database");
            $sql = "SELECT * FROM questions ORDER BY time DESC";
            $result = mysqli_query($db_conn, $sql);
            $count = mysqli_num_rows($result);

            while ($row = mysqli_fetch_array($result)) {

                $id = $row['qid'];


                $sqlUP = "SELECT * FROM upvote WHERE qid='$id'";
                $resultUP = mysqli_query($db_conn, $sqlUP);
                $countUP = mysqli_num_rows($resultUP);


                $sqlAns = "SELECT * FROM answers WHERE qid = '$id'";
                $resultAns = mysqli_query($db_conn, $sqlAns);
                $countAns = mysqli_num_rows($resultAns);

                $time = $row['time'];
                $timeT = explode("-",$time);
                $timee = $timeT[2]."-".$timeT[1]."-".$timeT[0];



                  echo "<div id='$id'  class ='questionBox'>
                  <div class='contain'>
                  <div class='vitem'>
                  <label class = 'space'>" . $row['space'] . "</label>
                  <label class = 'name'>" . $row['creator_name'] . "</label>
                  <label class = 'time'>" . $timee . "</label>
                  </div>

                  <div class = 'oitem'>";

                  if (isset($_SESSION['loggedin'])) {
                    echo "<p class = 'title'> <a href='QuestionDetail.php' onclick=\"deets($id)\"> " . $row['title'] . "</a></p>";
                  }
                  else {
                    echo "<form action ='QuestionDetail.php' method='POST'><button id='dontBut' name='sub' value='" . $id . "' type=\"submit\" ><p class= 'title'>". $row['title'] ." </p> </button></form>";
                  }

                echo "<p id='p".$id."' class = 'content hideText'>" . $row['content'] . "</p>";

                if (strlen($row['content']) >= 290 ) {
                  echo "<p id='sh'><button name='show' onclick='viewText(".$id.")' class='show'> Show More </button></p>";
                }


                echo "
                  </div>
                  </div>
                  <div class = buttons>
                  <span><button id='btn' onclick=\"myFunction($id)\"> <img id='swtch". $id ."' class = 'pic' src='up.png'> </button> <label id='vote" .$id ."' class='btn'>Upvotes(" . $countUP . ") </label>
                   <button id='btn' onclick=\"Foo($id)\">  <img class='pic' src='pencil.png'> </button> <label class='btm'>Answers(" . $countAns . ")</label></span>
                  </div>
                  </div>";

                  //Answers

                  while ($ans = mysqli_fetch_array($resultAns)) {
                    $time2 = $ans['time'];
                    $timeT2 = explode("-",$time);
                    $timee2 = $timeT2[2]."-".$timeT2[1]."-".$timeT2[0];

                    echo "<div class='aBox ansDis". $id. "'>
                    <label class = 'name'>" . $ans['uname'] . "</label>
                    <label class = 'time'>" . $timee2 . "</label><br>
                    <p id='" . $ans['aid'] . "' class='contt'>" . $ans['content'] . "</p>
                    </div>";
                  }

                  if (isset($_SESSION['loggedin'])) {
                    echo "<br><div id ='hid".$id."' class='aBox ansDis". $id. "'>
                    <label class = 'name'>" . $_SESSION['name'] . "</label>
                    <a onclick='hid(".$id.")'> <label id ='subt'>Post your Answer</label></a>
                    </div>";
                    echo "<div id='vi".$id."' style='display: none; flex-flow:column;justify-content:center;align-items:center; background-color:#FDF8F5;'>
                    <label style='font-size:large;'> ".$_SESSION['name']."</label>
                    <form name='fo' action='Main.php' method='POST'><br>
                    <textarea name= 'con' value = 'This' required> This is answer. </textarea> <br> <br>
                    <button name='subMM' value='Submit' type='submit'>Submit</button> &nbsp;&nbsp;
                    <button type='cancel' name='cancel' value='cancel'>Cancel</button>
                    </form>
                    </div>";
                  }
              }
            }


            function srchANDdest() {
              $db_conn = mysqli_connect("localhost", "root", "", "my_first_database");

              $sql = "SELECT * FROM questions";
              $result = mysqli_query($db_conn, $sql);
              $count = mysqli_num_rows($result);

              $row = mysqli_fetch_array($result);
              $id = $row['qid'];

                  $sqlUP = "SELECT * FROM upvote WHERE qid='$id'";
                  $resultUP = mysqli_query($db_conn, $sqlUP);
                  $countUP = mysqli_num_rows($resultUP);


                  $sqlAns = "SELECT * FROM answers WHERE qid = '$id'";
                  $resultAns = mysqli_query($db_conn, $sqlAns);
                  $countAns = mysqli_num_rows($resultAns);



                  if (isset($_POST['submit_search'])) {
                    $search = mysqli_real_escape_string($db_conn, $_POST['search_']);

                    $sqlS = "SELECT * FROM questions WHERE title LIKE '%$search%'";
                    $resultS = mysqli_query($db_conn, $sqlS);
                    $countS = mysqli_num_rows($resultS);

                    if ($countS > 0) {
                      while ($rowS = mysqli_fetch_array($resultS)) {

                        $time = $rowS['time'];
                        $timeT = explode("-",$time);
                        $timee = $timeT[2]."-".$timeT[1]."-".$timeT[0];

                        echo "<div id='$id'  class ='questionBox'>
                        <div class='contain'>
                        <div class='vitem'>
                        <label class = 'space'>" . $rowS['space'] . "</label>
                        <label class = 'name'>" . $rowS['creator_name'] . "</label>
                        <label class = 'time'>" . $timee . "</label>
                        </div>

                        <div class = 'oitem'>";

                        if (isset($_SESSION['loggedin'])) {
                          echo "<p class = 'title'> <a href='QuestionDetail.php' onclick=\"deets($id)\"> " . $rowS['title'] . "</a></p>";
                        }
                        else {
                          echo "<form action ='QuestionDetail.php' method='POST'><button id='dontBut' name='sub' value='" . $id . "' type=\"submit\" ><p class= 'title'>". $rowS['title'] ." </p> </button></form>";
                        }

                      echo "<p id='p".$id."' class = 'content hideText'>" . $rowS['content'] . "</p>";

                      if (strlen($rowS['content']) >= 290 ) {
                        echo "<p id='sh'><button name='show' onclick='viewText(".$id.")' class='show'> Show More </button></p>";
                      }


                      echo "
                        </div>
                        </div>
                        <div class = buttons>
                        <span><button id='btn' onclick=\"myFunction($id)\"> <img id='swtch". $id ."' class = 'pic' src='up.png'> </button> <label id='vote" .$id ."' class='btn'>Upvotes(" . $countUP . ") </label>
                         <button id='btn' onclick=\"Foo($id)\">  <img class='pic' src='pencil.png'> </button> <label class='btm'>Answers(" . $countAns . ")</label></span>
                        </div>
                        </div>";

                        //Answers

                        while ($ans = mysqli_fetch_array($resultAns)) {
                          $time2 = $ans['time'];
                          $timeT2 = explode("-",$time);
                          $timee2 = $timeT2[2]."-".$timeT2[1]."-".$timeT2[0];

                          echo "<div class='aBox ansDis". $id. "'>
                          <label class = 'name'>" . $ans['uname'] . "</label>
                          <label class = 'time'>" . $timee2 . "</label><br>
                          <p id='" . $ans['aid'] . "' class='contt'>" . $ans['content'] . "</p>
                          </div>";
                        }

                        if (isset($_SESSION['loggedin'])) {
                          echo "<br><div id ='hid".$id."' class='aBox ansDis". $id. "'>
                          <label class = 'name'>" . $_SESSION['name'] . "</label>
                          <a onclick='hid(".$id.")'> <label id ='subt'>Post your Answer</label></a>
                          </div>";
                          echo "<div id='vi".$id."' style='display: none'>
                          <label> ".$_SESSION['name']."</label> <br>
                          <form name='fo' action='Main.php' method='POST'>
                          <textarea name= 'con' value = 'This' required> This is answer. </textarea> <br>
                          <button name='subMM' value='Submit' type='submit'>Submit</button> &nbsp;&nbsp;
                          <button type='cancel' name='cancel' value='cancel'>Cancel</button>
                          </form>
                          </div>";
                        }

                    }

                  }

            }
            else {
              echo "<p style='color:white'> There are no results matching your search </p>";
            }
}


            function mainFilter($str) {
              $db_conn = mysqli_connect("localhost", "root", "", "my_first_database");

              $sql = "SELECT * FROM questions";
              $result = mysqli_query($db_conn, $sql);
              $count = mysqli_num_rows($result);

              $row = mysqli_fetch_array($result);
              $id = $row['qid'];

                  $sqlUP = "SELECT * FROM upvote WHERE qid='$id'";
                  $resultUP = mysqli_query($db_conn, $sqlUP);
                  $countUP = mysqli_num_rows($resultUP);


                  $sqlAns = "SELECT * FROM answers WHERE qid = '$id'";
                  $resultAns = mysqli_query($db_conn, $sqlAns);
                  $countAns = mysqli_num_rows($resultAns);


                    $sqlS = "SELECT * FROM questions WHERE space LIKE '%$str%'";
                    $resultS = mysqli_query($db_conn, $sqlS);
                    $countS = mysqli_num_rows($resultS);

                    if ($countS > 0) {
                      while ($rowS = mysqli_fetch_array($resultS)) {

                        $time = $rowS['time'];
                        $timeT = explode("-",$time);
                        $timee = $timeT[2]."-".$timeT[1]."-".$timeT[0];

                        echo "<div id='$id'  class ='questionBox'>
                        <div class='contain'>
                        <div class='vitem'>
                        <label class = 'space'>" . $rowS['space'] . "</label>
                        <label class = 'name'>" . $rowS['creator_name'] . "</label>
                        <label class = 'time'>" . $timee . "</label>
                        </div>

                        <div class = 'oitem'>";

                        if (isset($_SESSION['loggedin'])) {
                          echo "<p class = 'title'> <a href='QuestionDetail.php' onclick=\"deets($id)\"> " . $rowS['title'] . "</a></p>";
                        }
                        else {
                          echo "<form action ='QuestionDetail.php' method='POST'><button id='dontBut' name='sub' value='" . $id . "' type=\"submit\" ><p class= 'title'>". $rowS['title'] ." </p> </button></form>";
                        }

                      echo "<p id='p".$id."' class = 'content hideText'>" . $rowS['content'] . "</p>";

                      if (strlen($rowS['content']) >= 290 ) {
                        echo "<p id='sh'><button name='show' onclick='viewText(".$id.")' class='show'> Show More </button></p>";
                      }


                      echo "
                        </div>
                        </div>
                        <div class = buttons>
                        <span><button id='btn' onclick=\"myFunction($id)\"> <img id='swtch". $id ."' class = 'pic' src='up.png'> </button> <label id='vote" .$id ."' class='btn'>Upvotes(" . $countUP . ") </label>
                         <button id='btn' onclick=\"Foo($id)\">  <img class='pic' src='pencil.png'> </button> <label class='btm'>Answers(" . $countAns . ")</label></span>
                        </div>
                        </div>";

                        //Answers

                        while ($ans = mysqli_fetch_array($resultAns)) {
                          $time2 = $ans['time'];
                          $timeT2 = explode("-",$time);
                          $timee2 = $timeT2[2]."-".$timeT2[1]."-".$timeT2[0];

                          echo "<div class='aBox ansDis". $id. "'>
                          <label class = 'name'>" . $ans['uname'] . "</label>
                          <label class = 'time'>" . $timee2 . "</label><br>
                          <p id='" . $ans['aid'] . "' class='contt'>" . $ans['content'] . "</p>
                          </div>";
                        }

                        if (isset($_SESSION['loggedin'])) {
                          echo "<br><div id ='hid".$id."' class='aBox ansDis". $id. "'>
                          <label class = 'name'>" . $_SESSION['name'] . "</label>
                          <a onclick='hid(".$id.")'> <label id ='subt'>Post your Answer</label></a>
                          </div>";
                          echo "<div id='vi".$id."' style='display: none'>
                          <label> ".$_SESSION['name']."</label> <br>
                          <form name='fo' action='Main.php' method='POST'>
                          <textarea name= 'con' value = 'This' required> This is answer. </textarea> <br>
                          <button name='subMM' value='Submit' type='submit'>Submit</button> &nbsp;&nbsp;
                          <button type='cancel' name='cancel' value='cancel'>Cancel</button>
                          </form>
                          </div>";
                        }

                    }

            }
            else {
              echo "<p> There are no results matching your search </p>";
            }
}

            function hotDisp() {

              $db_conn = mysqli_connect("localhost", "root", "", "my_first_database");
              $sql = "SELECT * FROM questions ORDER BY time DESC";
              $result = mysqli_query($db_conn, $sql);
              $count = mysqli_num_rows($result);

              while ($row = mysqli_fetch_array($result)) {

                  $id = $row['qid'];


                  $sqlUP = "SELECT * FROM upvote WHERE qid='$id'";
                  $resultUP = mysqli_query($db_conn, $sqlUP);
                  $countUP = mysqli_num_rows($resultUP);


                  $sqlAns = "SELECT * FROM answers WHERE qid = '$id'";
                  $resultAns = mysqli_query($db_conn, $sqlAns);
                  $countAns = mysqli_num_rows($resultAns);

                  $time = $row['time'];
                  $timeT = explode("-",$time);
                  $timee = $timeT[2]."-".$timeT[1]."-".$timeT[0];



                    echo "<div id='$id'  class ='questionBox'>
                    <div class='vitem'>
                    <label class = 'space'>" . $row['space'] . "</label><br><br><br>
                    <label class = 'name'>" . $row['creator_name'] . "</label> <br><br>
                    <label class = 'time'>" . $timee . "</label><br>
                  <span>  <button id='btn' onclick=\"myFunction($id)\"> <img id='swtch". $id ."' class = 'pic' src='up.png'> </button> <label id='vote" .$id ."' class='btn'>Upvotes(" . $countUP . ") </label> <span>
                    </div>
                    <div class = 'oitem'>";

                    if (isset($_SESSION['loggedin'])) {
                      echo "<p class = 'title'> <a href='QuestionDetail.php' onclick=\"deets($id)\"> " . $row['title'] . "</a></p>";
                    }
                    else {
                      echo "<form action ='QuestionDetail.php' method='POST'><button name='sub' value='" . $id . "' type=\"submit\" ><p class= 'title'>". $row['title'] ." </p> </button></form>";
                    }





                  echo "<p class = 'content'>" . $row['content'] . "</p>
                    <br>

                <span>    <button id='btn' onclick=\"Foo($id)\">  <img class='pic' src='pencil.png'> </button> <label class='btm'>Answers(" . $countAns . ")</label> </span>
                    </div>
                    </div>";

                    while ($ans = mysqli_fetch_array($resultAns)) {
                      echo "<div class='aBox hide ansDis". $id. "'>
                      <label class = 'name'>" . $ans['uname'] . "</label>
                      <label class = 'time'>" . $ans['time'] . "</label><br>
                      <p class='contt'>" . $ans['content'] . "</p>
                      </div>";
                    }

                    if (isset($_SESSION['loggedin'])) {
                      echo "<br><div class='aBox ansDis". $id. "'>
                      <label class = 'name'>" . $_SESSION['name'] . "</label>
                      <label class='subtle'>Post your Answer</label>
                      </div>";
                    }

                }
            }




?>
