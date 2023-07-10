
<?php
session_start();
include("connection.php");
include("functions.php");


$user_data = check_loginParent($con);
$parentId= $user_data['parent_id'];
$parentName= $user_data['name'];

$BabytId=$_GET['national_ID'];

/*function getBookings(){
  global $con;
  $query = "SELECT bookings.booking_id, bookings.review , bookings.rating , request.* , offer.offer_id , offer.babysitter_id , offer.price , offer.status
  FROM bookings 
   INNER JOIN request ON request.request_id = bookings.request_id
   INNER JOIN offer ON request.request_id = offer.request_id";
  return mysqli_query( $con  , $query);
} */


//change it to PrevgetPrevBookings()
//$booking = getPrevBookingsforID();
//babysitter_id


?>
<!DOCTYPE html>
<html>
    <head>
        <title> <?php  ?> Reviews </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="imaages/png" href="images/logo.png" >
        <!--import google fonts & stars-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="styleB.css" >
        <link rel="stylesheet" href="footer.css" >
        <link rel="stylesheet" href="myReviews.css">
    </head>


<body>

  <!-- HEADER CODE -->
  <header>
        <a href="#" class="logo"><img src="images/logo.png" alt="logo icon"></a>
        <nav class="navbar">
        <ul> 
        <li>    <a onclick="window.history.back()" style="pointer:cursor;"> < Back </a> </li>

        <li><a href="mprofile.html"> Home </a></li>

        <li> <a href="ViewOffer.html"> Bookings </a>

        <li> <a href="#"> Settings </a>
        <ul class="inner">
            
        <li class="first"><a href="parentprofile.html"> view profile</a></li>
            
        <li><a href="signout.php"> Sign out </a></li>
            
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

 <!-- STARS RATING CODE 
 <h1 class="mytitle"> My rating </h1> 
 <div class = "stars">
      <center>
      <span class="fa fa-star checked"></span>
      <span class="fa fa-star checked"></span>
      <span class="fa fa-star checked"></span>
      <span class="fa fa-star checked"></span>
      <span class="fa fa-star"></span>   
      </center>
    
    </div>  

-->
<?php $bookings = getPrevBookingsforID($BabytId);
/*$query = "SELECT parent.parent_id , parent_image , parent.name
        FROM offer
       INNER JOIN babysitter ON babysitter.national_id = offer.babysitter_id
       INNER JOIN request ON offer.request_id = request.request_id
       INNER JOIN parent ON request.parent_id = parent.parent_id
       WHERE    "

      $parentInfo =  mysqli_query( $con  , $query); */
      if ( mysqli_num_rows($bookings) > 0 )  {
     $count=0;
     $tot_rating=0;
     $ave_rating=0;
     $num =mysqli_num_rows($bookings);

       if ( mysqli_num_rows($bookings) > 0 )  {
        foreach( $bookings as $element ) { 
         $tot_rating += $element['rating'] ;
         $count++; 
        }}

        $ave_rating = $tot_rating / $num;   
        echo "<h1 class='mytitle'> My Rating <br>".$ave_rating."/5  </h1>" ;
        } else{
          echo "<h1 class='mytitle'> My Rating </h1> <br> <h2 style='text-align:center' > No rating yet </h2> " ;  
        }?>

     <h1 class="mytitle2"> My Reviews  </h1>  
     <div> 

<?php 
$bookings = getPrevBookingsforID($BabytId);
/*$query = "SELECT parent.parent_id , parent_image , parent.name
        FROM offer
       INNER JOIN babysitter ON babysitter.national_id = offer.babysitter_id
       INNER JOIN request ON offer.request_id = request.request_id
       INNER JOIN parent ON request.parent_id = parent.parent_id
       WHERE    "

      $parentInfo =  mysqli_query( $con  , $query); */
  
        ///echo "average =". $ave_rating ;

if ( mysqli_num_rows($bookings) > 0 )  {

  foreach( $bookings as $element ) { 
  echo "<div>
  <figure class='review'>
    <blockquote>". $element['review']."</blockquote>
    <div class='author'>
      <img src='images/". $element['parent_image']."' alt='sq-sample1'/>
      <br>
      <h4>". $element['name'] ."</h4>
    </div>
  </figure>
  </div>"
?>
  <?php } 

}

else {
  echo "<h2> There are no reviews yet </h2>";
}

?>
</div>




</body>
</html>


