<?php

session_start();

include("connection.php");
include("functions.php");

$user_data = check_loginParent($con);
//initiaising 
$errors = array();

$parentID = $user_data['parent_id'] ;

$reqID = $_GET['request_id'];


$numOfKids = $_POST['numOfKids'];
$kid_name = $_POST['kid_name'];
$kid_age = $_POST['kid_age'];
$service = $_POST['service'];
$date = $_POST['date'];
$startTime = $_POST['duration1'];
$endTime = $_POST['duration2'];



// Start updating
$kid_age = settype($kid_age,"integer");
    $query = "UPDATE request 
    SET numOfKids = '$numOfKids' , kid_name = '$kid_name', kid_age = $kid_age , service_type = '$service' , date = '$date',
    start_time = '$startTime' , end_time = '$endTime'
    WHERE request.request_id = $reqID";

    $result = mysqli_query($con, $query);

    mysqli_close($con);
    Header( 'Location: parentRequests.php' );
 


?>