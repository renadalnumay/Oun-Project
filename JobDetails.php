<?php
session_start();

include("connection.php");
include("functions.php");
$user_data = check_loginBabysitter($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="icon" type="images/png" href="images/logo.png" >
 <!--import google fonts & stars-->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="styleB.css" >
 <link rel="stylesheet" href="footer.css" >
 <link rel="stylesheet" href="JobDetails.css">
 <title>Job Details </title>
 
<body>
</head>

<body>

    <!-- HEADER CODE -->

    <header>
        <a href="#" class="logo"><img src="images/logo.png" alt="logo icon"></a>
        <nav class="navbar">
        <ul> 
        <li>    <a onclick="window.history.back()" style="pointer:cursor;"> < Back </a> </li>
        <li><a href="currentBaby.html"> Home </a></li>

        <li> <a href="#"> Menu </a>
            <ul class="inner"> <!-- your menu here\\\\\\-->
         <li class="first"><a href="JobRequest.html"> Job Requests </a></li>
         <li><a href="OfferList.html"> Offers </a></li>
         <li><a href="myReviews.html"> rate & reviews </a></li>
    </ul>

        <li> <a href="#"> Settings </a>
        <ul class="inner">
        <li class="first"><a href="BabysitterProfile.html"> view profile</a></li>
        <li><a href="index.html"> Sign out </a></li>
            
        </ul>
        
        </li>
        
        </ul>
        </nav>
        </header>

 <!-- FOOTER CODE -->

    <footer class="footer-distributed">

        <div class="footer-left">
    
            <img class="logo" src="images/logo.png" alt="Oun">
    
            <p class="footer-links">
                <a href="currentBaby.html" class="link-1">Home</a>
                <!--<a href="#">About</a>-->
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

    <!-- JOB DETAILS CODE -->
<?php
    $reqId = $_GET['request_id'];
    $query = "SELECT *
    FROM request
    INNER JOIN parent ON request.parent_id=parent.parent_id
    WHERE request_id = $reqId;";
    $result = $con->query($query);
    $this_request = $result->fetch_assoc();
?>
<h1 class="mytitle"> Job Request Details</h1>
  <div class= "card">
  <?php echo "<img src='images/".$this_request['parent_image']."' alt='parent profile picture' class =img>" ;?> 
    <p class ="name" > <?php echo $this_request['name']; ?> </p>
 
<div class="container">
    <div class="det"> 
        <p class="mylabel">Number of kids </p> 
        <p><?php echo $this_request['numOfKids']; ?></p>
    </div>

    <div class="det"> 
        <p class="mylabel">Kid's full name</p> 
        <p><?php echo $this_request['kid_name']; ?></p> 
    </div>

    <div class="det"> 
        <p class="mylabel">Age</p> 
        <p><?php echo $this_request['kid_age']; ?></p>
    </div>

    <div class="det">
         <p class="mylabel">Type of service</p> 
        <p><?php echo $this_request['service_type']; ?></p>
    </div>

    <div class="det">
         <p class="mylabel">Duration</p> 
         <p><?php echo $this_request['start_time']; ?> - <?php echo $this_request['end_time']; ?></p>
        </div>

    <div class="det"> 
        <p class="mylabel">Date</p> 
        <p><?php echo $this_request['date']; ?></p>
    </div>
</div>


<form action="sendOffer.php" method='get'>
    <input type="text" class="text" name="price" placeholder="SR/hour">
    <input type="hidden" name="id" value="<?php echo $reqId; ?>">
    <input type="hidden" name="start_time" value="<?php echo $this_request["start_time"]; ?>">
    <input type="hidden" name="end_time" value="<?php echo $this_request["end_time"]; ?>">
    <input type="hidden" name="date" value="<?php echo $this_request["date"];; ?>">
    <input name="sent" class= "btn" type="submit" value="Send Offer " onclick="return alert('your price offer has been sent to the parent!');">  
</form>
</div>

</body>

</html>