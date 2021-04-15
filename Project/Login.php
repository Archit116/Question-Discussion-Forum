<?php
//NEED
  session_start();
   $_SESSION['loggedin'] = false;
  $_SESSION['message'] = "";

  $db_conn = mysqli_connect("localhost", "root", "", "my_first_database");



      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $email = mysqli_real_escape_string($db_conn, $email);
        $password = mysqli_real_escape_string($db_conn, $password);

        $checkP = "SELECT * FROM user_ WHERE password = '$password'";
        $checkE = "SELECT * FROM user_ WHERE email = '$email'";
        $sql = "SELECT * FROM user_ WHERE email = '$email' AND password = '$password'";

        $result = mysqli_query($db_conn, $sql);
        $resultP = mysqli_query($db_conn, $checkP);
        $resultE = mysqli_query($db_conn, $checkE);

        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $rowP = mysqli_fetch_array($resultP, MYSQLI_ASSOC);
        $rowE = mysqli_fetch_array($resultE, MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);
        $countP = mysqli_num_rows($resultP);
        $countE = mysqli_num_rows($resultE);


      $_SESSION['message'] = "";
              if ($countE >= 1) {
                if ($countP >= 1) {
                  if ($count == 1)
                  {
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $email;

                      $_SESSION['uid'] = $row['uid'];
                      $_SESSION['message'] = "Login Succesful!!";
                      $_SESSION['loggedin'] = true;
                      header("location: Main.php");
                  }
                  else{
                      //echo "<h1> Login failed. Invalid username or password.</h1>";
                      $_SESSION['message'] = "Invalid username or passwod. Try Again.";
                  }
                }
                else {
                  $_SESSION['message'] = "Unauthorized access.";
                }
              }
              else {
                $_SESSION['message'] = "User is not registered";
              }


      }



?>


<!DOCTYPE HTML>
<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        
        <style>

        * {
          box-sizing: border-box;
        }

        header {
          height: 8em;
        }

        body {
          background-color: #8A817C;
          display: flex;
          justify-content: center;
          align-items: center;
          flex-flow: column;
        }

               .box{
                 color: #8A817C;
                 display: flex;
                 flex-direction: column;
                 justify-content: center;
                 align-items: center;
                   background-color: #F4F3EE;
                   border: 2px solid white;
                   width: 55%;
                   border-radius: 40px;
                   text-align: center;
                   transition: 1.3s;
                   padding: 2em;
               }

               .box:hover {
                   box-shadow: 0px 0px 15px 0px white;
                   transition: 1.3s;
               }

               label {
                   width: 6em;
                   display: inline-block;
                   text-align: right;
                   margin-right: 2em;
               }

               .bttn {
                   width: 6em;
                   height: 2em;

               }
               .bttn:hover {
                 color: white;
                 background-color: brown;
                 cursor: pointer;
               }
               .pf {
                 color: #F4F3EE;
               }

               @media only screen and (max-width: 350px) {
                 input {
                   width: 6em;
                 }
               }


        </style>
    </head>
<body>
  <header></header>
    <div class = "box">
        <h1>LOGIN</h1>
        <form id = "reg" action = "Login.php" method = "POST">
           <p><?= $_SESSION['message'] ?></p>
            <p>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email" required>
            </p>
            <p>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="password" required>
            </p>
            <input class="bttn" type="submit" value="Login">
        </form>
    </div>
    <p class='pf'>
      Do not have an account?
    </p>
    <a href="Register.php"><input class="bttn" type="submit" value="Register"></a>
</body>
</html>
