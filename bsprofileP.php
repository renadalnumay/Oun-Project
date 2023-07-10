<?php
session_start();
include("connection.php");
$id = $_GET['babysitter_id'] ;
$query = "SELECT * FROM babysitter WHERE national_ID='$id'" ;
$result = mysqli_query($con , $query) ;
?><?php
$babysitdata = mysqli_fetch_assoc($result) ;

?>


<!DOCTYPE html >
<html lang="en">
<head>
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="images/png" href="images/logo.png" >
<!--import google fonts & stars-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="styleB.css" >
<link rel="stylesheet" href="footer.css" >
<link rel="stylesheet" href="headerp.css" >
<link rel="stylesheet" href="viewbsprofile.css" >

<title>Babysitter profile </title>


</head>
<body> 
   <!--header -->

<header>
       
    <a href="#" class="logo"><img src="images/logo.png" alt="logo icon"></a>
    <nav class="navbar">
    <ul> 
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

<!--profile card -->
  <div class="card"> 
  <?php echo" <img src='images/".$babysitdata['sitter_image']."' alt='Baby Sitters profile picture'>" ?>
   
    <h1 class="name" > <?php echo $babysitdata['name']?> </h1>
    <p class="title"><?php echo $babysitdata['city']?></p>
    
    <div class="desc">
      <p> 
        <ul >
        <li> Age: <?php echo $babysitdata['age']?> </li>
        <li>Gender: <?php echo$babysitdata['gender']?></li>
        <li>Phone number: <?php echo "0".$babysitdata['phoneNo']?></li>
        <li>Bio: <?php echo$babysitdata['bio']?></li>
      </ul>
     
     
     <form  action=  "https://wa.me/<?php echo$babysitdata['phoneNo'];?>"> <input  class="btn" type="submit" value="Contact"></form>
   <!-- <button class="btn"><a href="mailto:anny212@gmail.com">Contact</a></button>--> 
<br> <hr>
   
     <p class="reviews" style="font-size:15px; text-decoration: underline;"><a href="checkbsreview.php?national_ID=<?php echo $babysitdata['national_ID']?>"><?php echo $babysitdata['name']?> 's Reviews</a></p>
    </div>
  </div>

  <!--footer -->
  <footer class="footer-distributed">

    <div class="footer-left">

        <img class="logo" src="images/logo.png" alt="Ouun">

        <p class="footer-links">
            <a href="#index.php" class="link-1">Home</a>
           <!--<a href="#">About</a> --> 
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
*/