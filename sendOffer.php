<?php 
session_start();
include("connection.php");
include("functions.php");

$user_data = check_loginBabysitter($con);

$sitterId= $user_data['national_ID'];

$reqId = $_GET['id'];


if( isset($_GET["sent"]) && $_GET["price"]!="" )
$price= $_GET["price"];
$start = $_GET["start_time"];
$end = $_GET["end_time"];
$date = $_GET["date"];

//$co=conflict($start,$end,$sitterId , $date );
//if( mysqli_num_rows($co)==0 ){
$query = "INSERT INTO offer (babysitter_id, request_id, price, status)
VALUES ($sitterId , $reqId , $price ,'p') ";

$q=mysqli_query($con , $query);
mysqli_close($con);
Header( 'Location: JobRequest.php' );
/*}else{
   echo '<script type="text/javascript">';
    echo ' alert("You have conflect in your schedule!")';  //not showing an alert box.
    echo '</script>';
}*/

?>