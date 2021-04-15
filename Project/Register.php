<?php
//NEED
  session_start();
   $_SESSION['loggedin'] = false;
  $_SESSION['message'] = "";

  $db_conn = mysqli_connect("localhost", "root", "", "my_first_database");


  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($db_conn,$_POST['name']);
    $email = mysqli_real_escape_string($db_conn,$_POST['email']);
    $password = $_POST['password'];
    //$hash = password_hash($password);
    $sql = "SELECT * FROM user_ WHERE email = '$email' ";
    $result = mysqli_query($db_conn, $sql);
    if (mysqli_num_rows($result) == 0) {
      if ($_POST['password'] == $_POST['confirmation']) {

        $sql = "INSERT INTO user_ (name, email, password)"
                . "VALUES ('$name','$email','$password')";

        if (mysqli_query($db_conn,$sql) === true) {
          $_SESSION['name'] = $name;
          $_SESSION['email'] = $email;
          $_SESSION['loggedin'] = true;
          $_SESSION['message'] = "Succesful!! Added $name to the database";
          header("location: Main.php");
        }
        else {
          $_SESSION['message'] = "Whoops.. Could not add.";
        }
      }
      else {
        $_SESSION['message'] = "Passwords don't match!!";
      }
    }
    else {
      $_SESSION['message'] = "Email $email already exists :p";
    }
  }

?>


<!DOCTYPE HTML>
<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register Page</title>

        <style>

                * {
                  box-sizing: border-box;
                }

                body {
                  background-color: #8A817C;
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  flex-flow: column;
                  background-repeat: no-repeat;
                  background-position: 0% 25%;
                  background-size: cover;
                }
                header {
                  height: 8em;
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
      <h1>Create An Account</h1>
        <form id = "reg" action = "Register.php" method = "POST">
         <p><?= $_SESSION['message'] ?></p>
            <p>
                <label for ="name">Name:</label>
                <input type = "text" id="name" name ="name" placeholder="Name" maxlength="50"  title="Atleast a number" required>
            </p>
            <p>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email" required>
            </p>
            <p>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password"  placeholder="Passowrd" required>
            </p>
            <p>
                <label for="confirmation">Confirmation:</label>
                <input type="password" id="confirmation" name="confirmation" placeholder="Confirm Passowrd" maxlength="50" required>
            </p>
            <input class="bttn" type="submit" value="Register">
        </form>
    </div>
</body>
</html>
