<?php 
session_start();
include("connection.php");
include("functions.php");

$user_data = check_loginParent($con);


$offerID = $_GET['offer_id'];
$requestID = $_GET['request_id'];

$query = "update offer
set status = 'r'
where offer_id = $offerID ";

mysqli_query($con , $query);


mysqli_close($con);
header("location: viewoffers.php");