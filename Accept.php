<?php 
session_start();
include("connection.php");
include("functions.php");

$user_data = check_loginParent($con);

$offerID = $_GET['offer_id'];
$requestID = $_GET['request_id'];

$query = "update offer
set status = 'a'
where offer_id = $offerID ";

mysqli_query($con , $query);

$query2 = "insert into bookings
( request_id , offer_id )
Values( $requestID ,  $offerID);";

mysqli_query($con , $query2);


mysqli_close($con);
header("location: viewoffers.php");