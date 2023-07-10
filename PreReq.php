<?php 
    session_start();

    include("connection.php");
    include("functions.php");
    
    /*if(!isset($_SESSION['email']))
	   header("Location: index.php?error=Please Sign In again!");
    else
    <?php 
        echo "<img src='images/".$parentpic."' alt='Baby Sitter's profile picture'>"
        ?> //getting imgs! works fine
    {*/
$user_data = check_loginParent($con);
$parentId= $user_data['parent_id'];
$parentName= $user_data['name'];

?>

<!DOCTYPE html>
<html>
    <head>

        <!-- <link rel="stylesheet" href="mystyle.css"> -->

        <link rel="stylesheet" href="footer.css">
        <link rel="stylesheet" href="styleB.css">
        <link rel="stylesheet" href="fonts.css">
        <link rel="stylesheet" href="prepage.css">
        <link rel="stylesheet" href="preCards.css">
        <link rel="stylesheet" href="mytitels.css">
        <title>Previous Jobs</title>

      
    </head>

    <body>
        <!-- header!-->
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
                <div class="first">
            <li><a href="parentprofile.php"> view profile</a></li>
                </div>
            <li><a href="index.php"> Sign out </a></li>
                
            </ul>
            
            </li>
            
            </ul>
            </nav>
        </header>

    <div class="mytitle"><h1>Previous Bookings</h1></div>

     
    <?php
// Check connection
$Bookings= geprevtBookings();

if( mysqli_num_rows($Bookings) > 0)
{
   // $no=1;
    foreach( $Bookings as $element )
    { 
        $anID=$element['booking_id'];
       // if($element['status']=='a' ){
          //  $no=2;
echo " <!-- #########################################-->
<div class='card'> 
   <img src='images/".$element['sitter_image']."' alt='Baby Sitter's profile picture'>
   <h1 class='name' > ".$element['name']."</h1>
   <p class='title'>
       <span>No. of Kids:</span>
       <span>".$element['numOfKids']."</span><br>
       <span>Kid's Name:</span>
       <span>".$element['kid_name']."</span><br>
       <span>Age:</span>
       <span>".$element['kid_age']."</span><br>
       <span>Type of service:</span> 
       <span>".$element['service_type']."</span>
     
   </p>
   <br>
   <a  class='lin' href='bsreview.php?booking_id=".$anID."'>Review & Rate</a>
   <div class='desc'>
   <div class='info'>
   <h2><span>Date</span><small>".$element['date']."</small></h2>
   <h2><span>".$element['price']."</span><small>SR/hour</small></h2>
   <h2><!--<a href='#'> --><span>Time</span><small>".$element['start_time']."-".$element['end_time']."</small></h2>
   </div>
   </div> <!-- dec card-->
   <!-- -->
   </div> <!-- end card-->
";}

} else{ 
    echo "<br><br><br>
    <p style='font-size:20px;'>You don't have previous bookings..</\p>
     <br><br><br>"; 
}
/*if($no == 1){ 
    echo "<br><br><br>
    <p style='font-size:20px;'>You don't have previous bookings..</\p>
     <br><br><br>"; 
}*/
$con->close();
?>

        <!-- start cards first one -->
        <!---
        <div class="card"> 
            <img src="images/sophie.jpg" alt="Baby SItter's profile picture">
            <h1 class="name" > Sohpie </h1>
            <p class="title">
                -->
       <!--
                <span>Riyadh</span>
                <span>Saudi Arabia</span><br>
                <span class="type">Type of service:</span> 
                <span class="type">baby sitting</span>
              </p>
            <br>
            --->
            <!--
            <a  class="lin" href="bsreview.php">Review & Rate</a>
            <div class="desc">
            <div class="info">
            <h2><span>Date</span><small>02-02-2020</small></h2>
            <h2><span>200</span><small>SR/hour</small></h2>
            -->
            <!--<h2>--><!--<a href="#"> --><!--<span>Time</span><small>12:00pm-5:00pm</small></h2>-->
            <!--   
            </div>
            </div> <dec card -->
            <!-- -->
            <!--
            </div>  end card-->
           
       

                
<footer class="footer-distributed">

    <div class="footer-left">
        <div>
            <img class="logo" src="images/logo.png"Ouun">
        </div>

        <p class="footer-links">
            <a href="mprofile.php" class="link-1">Home</a>
           <!-- <a href="#">About</a> --> 
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

<!-- Fotter-->


</html>
