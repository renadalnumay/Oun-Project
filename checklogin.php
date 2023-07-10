<?php
session_start();
// require_once() function can be used to include a PHP file in another one, when you may need to include the called file more than once. If it is found that the file has already been included, calling script is going to ignore further inclusions.
$con = mysqli_connect("127.0.0.1","root","","oun");

//intialising variables

$email = $_POST['user_email'];
$password = md5( $_POST['user_password']);

//account exists query
$emQueryp = "SELECT * FROM parent WHERE email='$email'";
$emQuerybs = "SELECT * FROM babysitter WHERE email='$email'";

$emResultp = mysqli_query($con, $emQueryp);
$emResultbs = mysqli_query($con, $emQuerybs);

//check account existence 
if (mysqli_num_rows($emResultp)== 0 && mysqli_num_rows($emResultbs) == 0)
   {  
     mysqli_close($con);
     header("Location:login.php?error= There is no account registered with this email");
    }

//matching query
$queryp = "SELECT * FROM parent WHERE email='$email' AND password='$password'";
$querybs = "SELECT * FROM babysitter WHERE email='$email' AND password='$password'";

$resultp = mysqli_query($con, $queryp);
$resultbs = mysqli_query($con, $querybs);


if (mysqli_num_rows($resultp) > 0) {
    $_SESSION['email'] = $email;
    mysqli_close($con);
    header("Location: mprofile.php");
}elseif(mysqli_num_rows($resultbs) > 0)
     {
        $_SESSION['email'] = $email;
         mysqli_close($con);        
        header("Location: currentBaby.php");
    }
  else 
  {
  mysqli_close($con);
  header("Location:login.php?error= Email and Password do not match");
    }
?>