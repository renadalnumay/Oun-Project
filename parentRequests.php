<?php 
session_start();
include("connection.php");
include("functions.php");

$user_data = check_loginParent($con);
$myID = $user_data['parent_id'];
?>
<!DOCTYPE html>
<html lang = "en">
<head>
  
<meta charset="UTF-8">
<link rel="stylesheet" href="footer.css">
<link rel="stylesheet" href="styleB.css">
<link rel="stylesheet" href="stylePages.css">
<link rel="stylesheet" href="parentrequests.css">
<link rel="stylesheet" href="mytitels.css">
<meta name="viewport" content="width=device-width , initial-scale=1">
<link rel="icon" type="images/png"  href="images/logo.png">
<meta name="viewport" content="width=device-width , intial-scale=1">
<title> My Pending Requests </title>

<style>

 .btn1 {
  outline:none;
  background :rgb(41, 33, 78);
  color: white;
  /* 20px */
  margin-top:0px;
  border:none;
  height:30px;
  width:60%;
  font-size:16px;
   /* 30px */
  border-radius:12px;
  margin-left: 0px;
  }

.btn2{
  outline:none;
  background : rgb(152, 33, 33);
  /* 20px */
  margin-top:7px;
  border:none;
  height:25px;
  width:25%;
  color:white;
  font-size:16px;
   /* 30px */
  border-radius:12px; 
  left: 40px;
  margin-left: -200px;
}
.btn1:hover{
    background-color: rgb(72, 56, 133) ;
    border-color: rgb(72, 56, 133);
    fill: rgb(72, 56, 133);
    transition: all 400ms linear;
    cursor: pointer;
}
.btn2:hover{
    background-color: rgb(195, 42, 42);;    
    border-color: rgb(195, 42, 42);;
    fill: rgb(195, 42, 42);;
    transition: all 400ms linear;
    cursor: pointer;
}

    </style>
</head>
<!--header-->
<body>
<header>
       
    <a href="#" class="logo"><img src="images/logo.png" alt="logo icon"></a>
    <nav class="navbar">
    <ul> 
    <li>    <a onclick="window.history.back()" style="pointer:cursor;"> < Back </a> </li>

    <li><a href="mprofile.php"> Home </a></li>

    <li> <a href="#"> Menu </a>
        <ul class="inner"> <!-- your menu here\\\\\\-->
     <li class="first"><a href="parentrequests.php"> My Pending Requests </a></li>
     <li><a href="viewOffers.php"> Babysitter Offers </a></li></ul>

    <li> <a href="#"> Settings </a>
    <ul class="inner">
        
    <li class="first"><a href="parentprofile.php"> view profile</a></li>
       
    <li><a href="index.php"> Sign out </a></li>
        
    </ul>
    
    </li>
    </ul>
    </nav>

</header>


 <!-- REQUESTS CODE-->
 <br><br><br><br>
 <br><br><br><br> 
 <br><br><br><br>
 <br><br><br><br>
 



 <h1 class="mytitle"> My Pending Requests </h1> 
<?php 

 $query = "SELECT *
 FROM request
 WHERE request.parent_id = $myID AND
 request.request_id NOT IN (SELECT bookings.request_id FROM bookings);";

 $pendingRequests = mysqli_query($con , $query);

 if( mysqli_num_rows($pendingRequests) > 0)
 {
    while ($row = mysqli_fetch_assoc($pendingRequests)) 
    {
 ?>  
      <div class="container" style = "display: contents;">
       <div class= "card" >
       <?php $_GET['request_id'] = $row['request_id']; ?>
       <a href="deleteReq.php?request_id=<?php echo $_GET['request_id'];?>">
           <input class="btn2" type="button" value="Delete" style = "text-align:center;" onclick="return confirm('Are you sure you want to delete your request?');"  >
          </a>

       <p class ="name" > Request </p>
       <div class="desc">

       <p class="num"> <b>Number of kids:</b> <?php echo $row['numOfKids']; ?> </p>
       <br>
        <p class="num"> <b>kid name:</b> <?php echo $row['kid_name']; ?> </p>
        <br>
        <p class="age"> <b>Age:</b> <?php echo $row['kid_age']; ?> </p>
        <br>
        <p class="service"><b>Type of service:</b> <?php echo $row['service_type']; ?></p>
        <br>
        <p class="service"><b>Date:</b> <?php echo $row['date']; ?></p>
        <br>
        <p class="service"><b>Duration:</b> <?php echo $row['start_time']." - ".$row['end_time'];?></p>

       <!-- <div class="btn" style = "display:contents;">-->

           <a href="editReq.php?request_id=<?php echo $_GET['request_id'];?>">
           <input class="btn1" type="button" value="Edit" style = "text-align:center;"> </a>

           
    <!-- </div>-->

 
        </div>
     </div>
<?php
    }
  }
    else 
    {echo "<h2> You have no pending requests </h2>"; }

?>
<!--footer-->

<footer class="footer-distributed">

<div class="footer-left">
    <div>
        <img class="logo" src="./images/logo.png" alt="Ouun">
    </div>

    <p class="footer-links">
        <a href="mprofile.php" class="link-1">Home</a>
       <!--  <a href="#">About</a> -->
        <a href="mailto:support@Ouun.com">Contact</a>
    </p>

    <p class="footer-company-name">Oun © 2022</p>
</div>

<div class="footer-center">

    <div>
        <i class="fa fa-map-marker"></i>
        <p><span>12534 AlOlaya st.</span> Riyadh , Saudi Arabia</p>
    </div>

    <div>
        <i class="fa fa-phone"></i>
        <p>+9669200000834</p>
    </div>

    <div>
        <i class="fa fa-envelope"></i>
        <p><a href="mailto:support@Ouun.com">support@Oun.com</a></p>
    </div>

</div>

<div class="footer-right">

    <p class="footer-company-about">
        <span>About us</span>
        Oun is an online platform that helps mothers find babysitters anytime and anywhere.
    </p>

</div>

</footer>
</body>

</html>
