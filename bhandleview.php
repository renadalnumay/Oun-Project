
<?php
session_start();
include("connection.php") ;

$errors=array();


    if(isset($_POST['delete'])){
        $id = $_GET["national_ID"];
       $query = mysqli_query($con,"DELETE FROM babysitter WHERE `national_ID` =$id;");
        header("Location:index.php");
    }
    if(isset($_POST['edit'])){ 
header("Location:editbaby.php");
    }//////////////////////////////

    if(isset($_POST['save'])){
        $id = $_GET["national_ID"];
        
        $username = $_POST['sitter_name'];
$email = $_POST['user_email'];
$nationalid = $_POST['ID'];

$password1 = mysqli_real_escape_string($con , $_POST['user_password']);
//$password2 = mysqli_real_escape_string($con ,$_POST['repeatedPassword']);

$phone = $_POST['phone'];
$city = $_POST['City'];
$bio = $_POST['bio'];

// all img info ------
if( isset($_FILES['image'])){ 
$image=$_FILES['image'];
$imgName=$_FILES['image']['name'];
$imgTmpName=$_FILES['image']['tmp_name'];

$upload_directory="images/"; //to move ir to this file
$TargetPath=time().$imgName;

if(move_uploaded_file($imgTmpName, $upload_directory.$TargetPath)){    
 //$result = mysqli_query($con, $QueryInsertFile);
  }

}// is set


/*if ($password1 !== $password2) {
    header("Location: editbaby.php?error=Passwords do not match , please try again!");
    exit;
    array_push($errors , "Passwords do not match");
}*/

//check db for existing parent with the same email 
$emailcheck_query = "SELECT * FROM babysitter WHERE email = '$email' AND national_ID !='$id' ";
$result = mysqli_query($con, $emailcheck_query);

if (mysqli_num_rows($result) > 0) {
    array_push($errors , "Email already exists");
    header("location: editbaby.php?error=Email already existed, please try again!");
}
//phone number validation 

if(!preg_match('/^[0-9]{10}+$/', $phone)) {
    header("Location: editbaby.php?error=Phone number is invalid, please try again!");
    exit;
    array_push($errors , "Phone number is invalid");
    }
//email syntax validation 
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: editbaby.php?error=Invalid Email syntax, please try again!");
    exit;
    array_push($errors , "Phone number is invalid");
}


//check db for existing parent with the same phone 
$phonecheck_query = "SELECT * FROM babysitter WHERE phoneNo = '$phone'";
$result = mysqli_query($con, $phonecheck_query);

if (mysqli_num_rows($result) > 0) {
    array_push($errors , "Phone number already exists");
    header("location: editbaby.php?error=The phone number already existed, please try again!");
}

if( ! isset($_FILES['image']['name']) || empty($_FILES['image']['name']) ){ 
    $TargetPath="prpic.png";
}
//start updating the profile
if(count($errors)==0){
    $password = md5($password1); //encrypting password by using md5()
    //update query
    //district='$district',street='$street',bulidingNo='$buildingNo'
    $query = "UPDATE babysitter SET sitter_image='$TargetPath' , name='$username' ,email='$email', password='$password',city='$city',phoneNo='$phone' WHERE national_ID=$id  " ;
    mysqli_query($con , $query);
    header("Location:BabysitterProfile.php");
}
        
     }

    
    
    ?>