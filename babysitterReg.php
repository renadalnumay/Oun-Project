<?php
session_start();


$errors = array();

//database connection
$con = mysqli_connect("127.0.0.1","root","","oun");

if(mysqli_connect_errno())
    die("Fail to connect to database: " . mysqli_connect_error());
    
$username = $_POST['sitter_name'];
$nationalid = $_POST['ID'];
$phone = $_POST['phone'];
$city = $_POST['City'];
$email = $_POST['user_email'];

$password1 = mysqli_real_escape_string($con , $_POST['user_password']);
$password2 = mysqli_real_escape_string($con ,$_POST['repeatedPassword']);


$gender = $_POST['user_gender'];
$age = $_POST['age'];
//$BabySitterimage = $_POST['image'];
$bio = $_POST['bio'];

// all img info ------
if( isset($_FILES['image'])){ 
    $image=$_FILES['image'];
    $imgName=$_FILES['image']['name'];
    $imgTmpName=$_FILES['image']['tmp_name']; 

 $upload_directory="images/"; //to move ir to this file
    $TargetPath=time().$imgName;

    if(move_uploaded_file($imgTmpName, $upload_directory.$TargetPath)){    
        $QueryInsertFile="INSERT INTO parent (`parent_image`) VALUES ('$TargetPath')"; //but didnt sent.
       // $result = mysqli_query($con, $QueryInsertFile); 
     }
}// is set

if ($password1 !== $password2) {
    header("Location: RegisterBabysitter.php?error=Passwords do not match");
    exit();
    array_push($errors , "Passwords do not match");
}

if( ! isset($_FILES['image']['name']) || empty($_FILES['image']['name']) ){ 
    $TargetPath="prpic.png";
}

//check db for existing parent with the same email 
$idcheck_query = "SELECT * FROM babysitter WHERE national_ID = '$nationalid'";
$result1 = mysqli_query($con, $idcheck_query);

$emailcheck_query1 = "SELECT * FROM parent WHERE email = '$email'";
$emailcheck_query = "SELECT * FROM babysitter WHERE email = '$email'";
$result2 = mysqli_query($con, $emailcheck_query);
$result3 = mysqli_query($con, $emailcheck_query1);



if ((mysqli_num_rows($result2) > 0) || (mysqli_num_rows($result3) > 0)) {
    array_push($errors , "Account with this email already exists");
    header("location: RegisterBabysitter.php?error=Account with this email already exists, please try again!");
}
if (mysqli_num_rows($result1) > 0) {
    array_push($errors , "National ID already existed");
    header("location: RegisterBabysitter.php?error=National ID already existed, please try again!");
}
/*
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("RegisterBabysitter.php?error=EMAIL syntax is wrong");
    exit();
}
*/

//check db for existing parent with the same phone 
$phonecheck_query = "SELECT * FROM babysitter WHERE phoneNo = '$phone'";
$result = mysqli_query($con, $phonecheck_query);

if (mysqli_num_rows($result) > 0) {
    array_push($errors , "Phone number already existed");
    header("location: RegisterBabysitter.php?error=Phone number already existed, please try again!");
}


//phone number validation 
if(!preg_match('/^[0-9]{10}+$/', $phone)) {
    header("Location: RegisterBabysitter.php?error=Invalid phone number, please try again!");
    exit;
    array_push($errors , "Phone number is invalid");
    }


//National ID number validation 
if(!preg_match('/^[0-9]{10}+$/', $nationalid)) {
    header("Location: RegisterBabysitter.php?error=Invalid National ID number, please try again!");
    exit;
    array_push($errors , "National ID number is invalid");
    }

//email syntax validation 
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: RegisterBabysitter.php?error=Invalid Email syntax, please try again!");
    exit;
    array_push($errors , "Phone number is invalid");
}


// Start Registering
if (count($errors) == 0) {
    $password = md5($password1); //encrypting password by using md5()
    $query = "INSERT INTO babysitter (`name`, `national_ID`,`password`,`email`,`city`,`bio`,`gender`,`phoneNo`, `age` , `sitter_image`) VALUES ('$username', '$nationalid', '$password', '$email', '$city', '$bio', '$gender', '$phone' , '$age', '$TargetPath' )";
    $result = mysqli_query($con, $query);
    $affected = mysqli_affected_rows($con);

    if ($affected == -1) {
        header("location: RegisterBabysitter.php?error=Wrong Email/Password");
        exit();
    } else {
        $_SESSION['sitter_name'] = $username;
        $_SESSION['ID'] = $nationalid;
        $_SESSION['success'] = "YOU REGISTERED IN SUCCESSFULLY";
        $_SESSION['sitter_image'] = $TargetPath;

        header("Location: currentBaby.php");
        exit();
    }
} 
?>