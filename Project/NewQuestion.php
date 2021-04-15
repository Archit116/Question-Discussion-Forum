<?php
//NEED
session_start();
if (!isset($_SESSION['loggedin'])) {
  header("loaction: Main.php");
}

$_SESSION['message'] = "";
$db_conn = mysqli_connect("localhost", "root", "", "my_first_database");
$creatorid = $_SESSION['uid'];
$creatorName = $_SESSION['name'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $title = mysqli_real_escape_string($db_conn,$_POST['title']);
  $space = mysqli_real_escape_string($db_conn,$_POST['space']);
  $content = mysqli_real_escape_string($db_conn,$_POST['content']);

  $sql = "INSERT INTO questions (title, space, content,creatorid, creator_name) VALUES ('$title', '$space', '$content','$creatorid', '$creatorName')";

  if (mysqli_query($db_conn,$sql) == true) {
    $_SESSION['message'] = "Question Added";
    header("location: Main.php");
  }
  else {
    $_SESSION['message'] = "Whoops... Error";
  }

}
?>
<html>
<head>

  <title>New Questions Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
  * {
    box-sizing: border-box;
  }

  body {
    display: flex;
    flex-flow: column;
    justify-content: center;
    align-items: center;
    background-color: var(--bgbg);
  }
  header {
    padding: 0.3em;
    margin: 0 2em;
    float:left
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

  .b {
    display:flex;
    flex-flow: column;
    background-color: var(--colcol);
    padding: 1em;
    border-radius: 20px;
    border: 2px solid white;
    width:65%;
  }

  .b:hover{
    box-shadow: 0px 0px 15px 0px white;
    transition: 1s;
  }

  #bt:hover {
    color: var(--colcol);
    background-color: brown;
    cursor: pointer;
  }
  :root {
    --colcol: #F4F3EE;
    --bgbg: #8A817C;
    --colcol2: #FDF8F5;
  }
  .ff {
    display: flex;
    flex-flow: column;
  }
  .ff2 {
    display: flex;
    flex-flow: row;
    justify-content: space-around;
  }

  @media only screen and (max-width: 350px) {
    input {

    }
    .ff2 {
      flex-flow:column;
    }
  }

  @media only screen and (min-width: 351px) (max-width: 650px){
    input {
      width:10em;
    }
  }
  </style>

</head>
<body>
  <header>
    <a href = "Main.php"> <p> back </p> </a>
  </header>

  <div class="b">
    <h1>Ask Your Question</h1>

    <form action="NewQuestion.php" method="POST" class="ff">
      <p>Title</p>
      <input type="text" name="title" required>
      <p>Space</p>
      <span class="ff2" ><input type="radio" id="alg" name="space" value="Algorithm" required>
      <label for="alg">Algorithm</label>
      <input type="radio" id="ml" name="space" value="Machine_learning" required>
      <label for="ml">Machine Learning</label>
      <input type="radio" id="sys" name="space" value="System" required>
      <label for="sys">System</label>
      <input type="radio" id="js" name="space" value="JavaScript" required>
      <label for="sys">JavaScript </label></span>
      <br><br>
      <label> Content </label>
      <br>
      <textarea id="txt" name="content"  placeholder="Enter Question" required></textarea>
      <br><br>
    <span>  <input id="bt" type="submit" value="submit" name="submit"> </span>
    </form>
  </div>
</body>
</html>
