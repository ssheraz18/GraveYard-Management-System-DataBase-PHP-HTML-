<?php
 if(isset($_POST['email']))
{


$email = $_POST['email'];
$user_password = $_POST['psw'];


$server = 'localhost';
$username = 'root';
$db_password = '';

// Connect to the database
$conn = mysqli_connect($server,$username,$db_password);

// Check if a user with the entered email address exists
$query = "SELECT * FROM `db`.`registerin` WHERE email = '$email'";//aal tuples in $query
$result = mysqli_query($conn, $query);//connect query and mysql so all values will be in result $query will go in mysql

if (mysqli_num_rows($result) > 0) {//if any value in result result could be empty if no email matched in database
  // Retrieve the password for the user
  $user = mysqli_fetch_assoc($result);//used to fetch all attributes in $user
  $stored_password = $user['password']; // select attribute or column 'password'

  // Compare the entered password with the stored password
  if (password_verify($user_password, $stored_password)) {// to verify password
    // The email and password combination is correct
    echo "Login successful";
  }
  else {
    // The entered password is incorrect
    echo "Incorrect password";
  }
}
else {
  // The entered email address is not registered
  echo "Email address not found";
}


//Close the database connection
mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>

<style>
   
    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
    }
    
    .hero-image {
  background-image: url("https://images.unsplash.com/photo-1573217968560-05cbc6f683e4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8Z3JhdmV5YXJkfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=600&q=60");
  background-color: #cccccc;
  height: 100vh;
  width: 50%;
  background-position:center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
  float: left;
}
    
    .hero-text {
        text-align: center;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: rgb(12, 9, 9);
    }
   
    form {
        border: 3px solid #f1f1f1;
        height: 100vh;
        width: 50%;
        float: right;
        box-sizing: border-box;
        padding: 20px;
    }

    /* Full-width inputs */
    input[type=text], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    /* Set a style for all buttons */
    button {
        background-color: #1f8d1f;
        color: rgb(255, 255, 255);
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    /* Add a hover effect for buttons */
    button:hover {
        opacity: 0.8;
    }

    /* Extra style for the cancel button (red) */
    .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
    }

    /* Center the avatar image inside this container */
    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
    }

    /* Add padding to containers */
    .container {
        padding: 16px;
    }

    /* The "Forgot password" text */
    span.psw {
        float: right;
        padding-top: 16px;
    }
    

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }
        .cancelbtn {
            width: 100%;
        }
        
    }
    body {
  background-image: url('https://images.unsplash.com/photo-1573217968560-05cbc6f683e4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8Z3JhdmV5YXJkfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=600&q=60"');
  background-repeat: no-repeat;
}
</style>

    </style>

    <body>
        <h1 style="left: auto;">
             Sign up
        </h1>
     
    <form action="signin.php" method="post">
        

        
        
          <div class="container">
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>
        



            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>



        
            <button type="submit">Login</button>
            <label>
              <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
          </div>
        
          <div class="container" style="background-color:#f1f1f1">
            <button type="button" class="cancelbtn">

                <a href="home.html" class="btnback">cancel</a>
        


            </button>
            <span class="psw">Forgot <a href="#">password?</a></span>
          </div>


    </form>
    
    
    
    </body>
</html>