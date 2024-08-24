<?php
if (isset($_POST['signup_submit'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $psw = $_POST['password'];
  // $hashed_password = password_hash($psw, PASSWORD_DEFAULT);
  echo "<p align='left'> <font color=blue  size='6pt'>Welcome $username <br> Your email address is $email ";

  $server = 'localhost';
  $uname = 'root';
  $password = '';
  
  $conn = mysqli_connect($server, $uname, $password);

  if (!$conn) {
    die("Connection to this database failed" . mysqli_connect_error());
  }
  // echo "hello";
  $sql = "INSERT INTO `db`.`registerin`(`sid`, `username`, `email`, `password`, `date`) 
        VALUES (NULL,'$username','$email', '$psw', CURRENT_TIMESTAMP());";


  if ($conn->query($sql)) {
    echo "INSERTED";
  } else {
    echo "ERROR";
  }
 


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>seek coding</title>
  <link rel="stylesheet" href="regstyle.css">
  <!---we had linked our css file----->
</head>


<body>
  <form action="registerin.php" method="post">
    <div id="login-box">
      <div class="left">
        <h1>Register</h1>

        <input type="text" name="username" placeholder="Username" />
        <input type="email" name="email" placeholder="E-mail" />
        <input type="password" name="password" placeholder="Password" />

        <input type="submit" name="signup_submit" value="Sign me up" />
      </div>

      <div class="right">
        <span class="loginwith">Sign in with<br />social network</span>

        <button class="social-signin facebook"> <a href="https://www.facebook.com/login.php/" class="btnback">login with
            Facebook</a>


        </button>
        <button class="social-signin twitter"> <a
            href="https://twitter.com/i/flow/login?input_flow_data=%7B%22requested_variant%22%3A%22eyJsYW5nIjoiZW4ifQ%3D%3D%22%7D"
            class="btnback">login with Twitter</a>
        </button>
        <button class="social-signin google"><a
            href="https://accounts.google.com/v3/signin/identifier?dsh=S-318587521%3A1679155612899673&continue=https%3A%2F%2Fwww.google.com%3Fhl%3Den-US&ec=GAlA8wE&hl=en&flowName=GlifWebSignIn&flowEntry=AddSession"
            class="btnback">login with Google</a></button>
      </div>
      <div class="or">OR</div>
    </div>
  </form>
</body>

</html>