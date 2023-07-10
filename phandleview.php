<?php
session_start();
include("connection.php") ;

$errors=array();


    if(isset($_POST['delete'])){
        $id = $_GET["parent_id"];
        $query = mysqli_query($con,"DELETE FROM parent WHERE `parent_id` =$id;");
        header("Location:index.php");
    }
    if(isset($_POST['edit'])){ 
header("Location:editparent.php");
    } /////////////////////////

    if(isset($_POST['save'])){
        $id = $_GET["parent_id"];
        
        $username = $_POST['parentname'];
$email = $_POST['userEmail'];

$password1 = mysqli_real_escape_string($con , $_POST['userPassword']);
//$password2 = mysqli_real_escape_string($con ,$_POST['repeatedPassword']);

$phone = $_POST['phone'];
$city = $_POST['city'];
$district = $_POST['district'];
$street = $_POST['street'];
$buildingNo = $_POST['BuildingNo'];
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
    header("Location: editparent.php?error=Passwords do not match , please try again!");
    exit;
    array_push($errors , "Passwords do not match");
}*/

//check db for existing parent with the same email 
$emailcheck_query = "SELECT * FROM parent WHERE email = '$email' AND parent_id !='$id'";
$result = mysqli_query($con, $emailcheck_query);

if (mysqli_num_rows($result) > 0) {
    array_push($errors , "Email already exists");
    header("location: editparent.php?error=Email already existed, please try again!");
}
//phone number validation 

if(!preg_match('/^[0-9]{10}+$/', $phone)) {
    header("Location: editparent.php?error=Phone number is invalid, please try again!");
    exit;
    array_push($errors , "Phone number is invalid");
    }
//email syntax validation 
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: editparent.php?error=Invalid Email syntax, please try again!");
    exit;
    array_push($errors , "Phone number is invalid");
}


//check db for existing parent with the same phone 
$phonecheck_query = "SELECT * FROM parent WHERE phoneNo = '$phone'";
$result = mysqli_query($con, $phonecheck_query);

if (mysqli_num_rows($result) > 0) {
    array_push($errors , "Phone number already exists");
    header("location: editparent.php?error=The phone number already existed, please try again!");
}

if( ! isset($_FILES['image']['name']) || empty($_FILES['image']['name']) ){ 
    $TargetPath="prpic.png";
}
//start updating the profile
if(count($errors)==0){
    $password = md5($password1); //encrypting password by using md5()
    //update query
    $query = "UPDATE parent SET parent_image='$TargetPath' , name='$username' ,email='$email', password='$password',city='$city',district='$district',street='$street',buildingNo='$buildingNo',phoneNo='$phone' WHERE parent_id=$id  " ;
    mysqli_query($con , $query);
    header("Location:parentprofile.php");
}
        
     }

    
    
    ?>