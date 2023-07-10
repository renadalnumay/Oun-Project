
<?php
include 'connection.php';
//include 'functions.php';
session_start();

//if( ! $con = mysqli_connect(DBHOST , DBUSER , DBPWD , DBNAME)){ die("failed to connect!");}


//$booking_id =1;
if (isset($_GET['booking_id'])) {
$bookingid = $_GET['booking_id'];
}else{
 $bookingid=1;   
}

if (!isset($_POST['rate']))
$rate = 0;
else {

if($_POST['rate'] == 5) {
    $rate =5;
}if($_POST['rate'] == 4) {
    $rate =4;
} else if($_POST['rate'] == 3) {
    $rate = 3;
} else if($_POST['rate'] == 2) {
    $rate  = 2;
} else if($_POST['rate'] == 1) {
    $rate = 1;
}
}

if (isset($_POST['review']))
$review = $_POST['review'];

$query = "UPDATE `bookings` SET `review`='$review',`rating`='$rate' WHERE booking_id='$bookingid'"; //works if its 1

$result = mysqli_query($con,$query );

if ( !$result) 
header("location: mprofile.php? failed to query");

header("location: mprofile.php?");
exit();


//}
//if (mysqli_num_rows($result) > 0) {
    //echo $_GET['booking_id'];

    mysqli_close($con);



/*switch $answer {
                case "add":
                //Check if guess is right and echo
                break;
                case "substract":
                //Check if guess is right and echo
                break;
                case "multiply":
                //Check if guess is right and echo
                break; 
                case "divide":
                //Check if guess is right and echo
                break;
              };
              */

?>