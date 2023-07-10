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
       $user_data = check_loginBabysitter($con);
$BabytId= $user_data['national_ID'];
$BabyName= $user_data['name'];



?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="images/logo.png" >
<!--import google fonts & stars-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="styleB.css" >
<link rel="stylesheet" href="footer.css" >
<link rel="stylesheet" href="currentBabycss.css">
<link rel="stylesheet" href="preCards.css">
<link rel="stylesheet" href="mytitles.css">


<title>Home</title>

</head>

<body class="curbody">
    <header>
        <a href="#" class="logo"><img src="images/logo.png" alt="logo icon"></a>
        <nav class="navbar">
        <ul> 
        <li>    <a onclick="window.history.back()" style="pointer:cursor;"> < Back </a> </li>
        <li><a href="currentBaby.php"> Home </a></li>

        <li> <a href="#"> Menu </a>
            <ul class="inner"> <!-- your menu here\\\\\\-->
                
         <li class="first"><a href="JobRequest.php"> Job Requests </a></li>
                
         <li><a href="OfferList.php"> Offers </a></li>
         <li><a href="myReviews.php"> rate & reviews </a></li>
    </ul>

        <li> <a href="#"> Settings </a>
        <ul class="inner">
            
        <li class="first"><a href="BabysitterProfile.php"> view profile</a></li>
            
        <li><a href="signout.php"> Sign out </a></li>
            
        </ul>
        
        </li>
        
        </ul>
        </nav>
        </header>
<!--welocme page-->
<div class="welcome glow" >
    <?php 
    echo "<h1 style='color: rgb(41, 33, 78);'>Welcome Back, ".$BabyName." </h1>"
    ?>
    </div>
    
<h1 class="mytitlew"> Your upcoming jobs </h1>

    <!--  upcoming jobs CODE -->
    <?php
    /*$query = "SELECT *
    FROM offer
    WHERE babysitter_id = $BabytId && 'status'='a'";
    $result = $con->query($query);
    $element = $result->fetch_assoc();*/
?>

<?php
// Check connection
$offers= getCurrentoffers();
$no=0;
if( mysqli_num_rows($offers) > 0)
{
    $no=1;
    foreach( $offers as $element )
    { 
        if($element['status']=='a' && $element['babysitter_id']== $BabytId){
            $no=2;
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

} 
}else{ 
    echo "<br><br><br>
    <p style='font-size:20px;'>You don't have current jobs..</\p>
     <br><br><br>"; 
}
if($no == 1){ 
    echo "<br><br><br>
    <p style='font-size:20px;'>You don't have current jobs..</\p>
     <br><br><br>"; 
}
$con->close();
?>


            


<!--links-->
<div class="link">
<a href="previous.php">view previous jobs</a> <!-- styl.css-->
</div>

<!-- button <a class="button" href="#">Job Requests</a> -->






<!-- Fotter-->
<footer class="footer-distributed">

<div class="footer-left">
<div>
<img class="logo" src="./images/logo.png" alt="Ouun">
</div>

<p class="footer-links">
<a href="currentBaby.php" class="link-1">Home</a>
<!--<a href="index.html/aboutus">About</a>-->
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

