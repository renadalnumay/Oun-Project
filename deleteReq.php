<html>
<?php 
session_start();
include("connection.php");
include("functions.php");

$user_data = check_loginParent($con);
$myID = $user_data['parent_id'];

$reqID = $_GET['request_id'];

$query1 = "Delete FROM offer WHERE request_id = $reqID;";
$result1 = mysqli_query($con , $query1);

$query2 = "Delete FROM request WHERE request_id = $reqID;";
$result2 = mysqli_query($con , $query2);

mysqli_close($con);

header("Location: parentRequests.php")
?>
</html>