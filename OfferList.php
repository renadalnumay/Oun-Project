<?php

session_start();

include("connection.php");
include("functions.php");
$user_data = check_loginBabysitter($con);

//initiaising 
$errors = array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/logo.png" >
    <!--import google fonts & stars-->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- <link rel="stylesheet" href="mystyle.css"> -->

    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="styleB.css">
    <link rel="stylesheet" href="cardsOffer.css">
    <link rel="stylesheet" href="mytitles.css">

    <!-- Generated by https://smooth.ie/blogs/news/svg-wavey-transitions-between-sections
    -->
<title>My Offers' Status</title>
<style> 
.container {
  display: contents;
  width: 100%;
  grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
  grid-gap: 20px;
  align-items: stretch;
}

</style>
</head>

<body>

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
        
    <li><a href="index.php"> Sign out </a></li>
        
    </ul>
    
    </li>
    
    </ul>
    </nav>
    </header>

  <h1 class="mytitle"> My Offers' Status </h1>


  <!-- ##################### cards ###################-->
     <!-- ##################### cards ###################-->
     <?php 
 $offers = getOffers(); 
 if( mysqli_num_rows($offers) > 0)
{
    
    foreach( $offers as $element )
  {
    echo "<div class='container' >" ; 

    $thisID = $element['request_id'];
    $query = "Select parent.parent_id , parent_image , parent.name
    FROM offer
     INNER JOIN babysitter ON babysitter.national_id = offer.babysitter_id
     INNER JOIN request ON offer.request_id = request.request_id
     INNER JOIN parent ON request.parent_id = parent.parent_id
     WHERE request.request_id = $thisID ; ";

     $result = mysqli_query( $con , $query);
     while ($row = mysqli_fetch_assoc($result)) {
    if( $element['status'] == 'a')
   {
    ?>
     <div class="ccenter">
 
         <div class="card">
           <div class="additional">
         <div class="accept">
             <div class="user-card">
               <div class="Date center"> 
                 <?php echo $element['date'] ?>
              </div>
               <div class="offerstatus center">
                 Accepted   <!-- ## under the photo circle ##-->
               </div>
               
               <svg width="110" height="110" viewBox="0 0 250 250" xmlns="http://www.w3.org/2000/svg" role="img"  class="center">
                  <!-- aria-labelledby="title desc" caused an error in validator-->
                 <defs>
                   <clipPath id="scene">
                     <circle cx="125" cy="125" r="115"/>
                   </clipPath>
                   
                 </defs> <!-- important to make it circular-->
                 
                 <circle cx="125" cy="125" r="120" fill="rgba(0,0,0,0.15)" />
                 <g stroke="none" stroke-width="0" clip-path="url(#scene)"> <!-- #### circle photo #####-->
                  <image href="images/<?php echo $row['parent_image'];?>" width="250" height="260" /> <!-- the inner #### circle photo #####  -->
                 
                 </g>
               </svg>
             </div> <!-- user cards -->
     </div>
           </div> <!-- addit class -->
           <div class="general">
             <h1><?php echo $row['name']; ?></h1> <!-- white name-->
             <br>
             <p> 
              <div class="coords">
                <span>No. of Kids:</span>
                <span><?php echo $element['numOfKids']; ?></span>
              </div>
              <div class="coords">
                <span>Kid's Name:</span>
                <span><?php echo $element['kid_name']; ?></span>
              </div>
                 <div class="coords">
                     <span>Age:</span>
                     <span><?php echo $element['kid_age']; ?></span>
                   </div>
                   <div class="coords">
                     <span>Type of service:</span>
                     <span><?php echo $element['service_type']; ?></span>
                   </div>
 
             <div class="stats">
                       
                 <div>  
                   <div class="title">Duration</div>
                   <div class="valueDuration"><?php echo $element['start_time']; ?> - <?php echo $element['end_time']; ?></div>
                 </div>
                  
                 <div>
                   <div class="title">price</div>
                   <div class="value "><?php echo $element['price'];?> SR\hour</div>
                 </div>
 
               </div> <!-- state class -->
 
            </div>
          </div> <!-- endof card-->
      <?php 
 
      break;
      } 
      elseif($element['status'] == 'r'){
         ?>
         <!-- ################# seconed card #################-->
         <div class="card">
           <div class="additional">
         <div class="danger">
             <div class="user-card">
               <div class="Date center"> 
                 <?php echo $element['date']; ?>
              </div>
               <div class="offerstatus center">
                 Rejected   <!-- ## under the photo circle ##-->
               </div>
               
               <svg width="110" height="110" viewBox="0 0 250 250" xmlns="http://www.w3.org/2000/svg" role="img"  class="center">
                <!-- aria-labelledby="title desc" caused an error in validator-->
                  
                 
                 <circle cx="125" cy="125" r="120" fill="rgba(0,0,0,0.15)" />
                 <g stroke="none" stroke-width="0" clip-path="url(#scene)"> <!-- #### circle photo #####-->
                  <image href="images/<?php echo $row['parent_image']; ?>" width="250" height="260" />  <!-- the inner #### circle photo #####  -->
                 </g>
               </svg>
             </div> <!-- user cards -->
             
             <div class="more-info">
               <h1><?php echo $row['name']; ?></h1><!-- colored name-->
             </div> 
     </div>
           </div> <!-- add class -->
           <div class="general">
             <h1><?php echo $row['name']; ?></h1> <!-- white name-->
             <p> 
              <div class="coords">
                <span>No. of Kids:</span>
                <span>1<?php echo $element['numOfKids']; ?></span>
              </div>
              <div class="coords">
                <span>Kid's Name:</span>
                <span><?php echo $element['kid_name']; ?></span>
              </div>
                 <div class="coords">
                     <span>Age:</span>
                     <span><?php echo $element['kid_age']; ?></span>
                   </div>
                   <div class="coords">
                     <span>Type of service:</span>
                     <span><?php echo $element['service_type']; ?></span>
                   </div>
     

 
             <div class="stats">
                       
                 <div>  
                   <div class="title">Duration</div>
                   <div class="valueDuration"><?php echo $element['start_time']; ?> - <?php echo $element['end_time']; ?></div>
                 </div>
                  
                 <div>
                   <div class="title">price</div>
                   <div class="value "><?php echo $element['price']; ?> SR\hour</div>
                 </div>
 
               </div> <!-- state class -->
 
           </div>
         </div>
    <?php  break;
   } else{?>
       <!-- ################# third card #################-->
       <div class="card">
         <div class="additional">
       
           <div class="user-card">
             <div class="Date center"> 
             <?php echo $element['date']; ?>
            </div>
             <div class="offerstatus center">
               Pending   <!-- ## under the photo circle ##-->
             </div>
             
             <svg width="110" height="110" viewBox="0 0 250 250" xmlns="http://www.w3.org/2000/svg" role="img"  class="center">
              <!-- aria-labelledby="title desc" caused an error in validator-->
               
               <circle cx="125" cy="125" r="120" fill="rgba(0,0,0,0.15)" />
               <g stroke="none" stroke-width="0" clip-path="url(#scene)"> <!-- #### circle photo #####-->
                <image href="images/<?php echo $row['parent_image'];?>" width="250" height="260" /> <!-- the inner #### circle photo #####  -->
               </g>
             </svg>
           </div> <!-- user cards -->
           
           <div class="more-info">
             <h1><?php echo $row['name']; ?></h1><!-- colored name-->
           </div> 
   
         </div> <!-- add class -->
         <div class="general">
           <h1><?php echo $row['name']; ?></h1> <!-- white name-->
           <p> 
            <div class="coords">
              <span>No. of Kids:</span>
              <span><?php echo $element['numOfKids']; ?></span>
            </div>
            <div class="coords">
              <span>Kid's Name:</span>
              <span><?php echo $element['kid_name']; ?></span>
            </div>
               <div class="coords">
                   <span>Age:</span>
                   <span><?php echo $element['kid_age']; ?></span>
                 </div>
                 <div class="coords">
                   <span>Type of service:</span>
                   <span><?php echo $element['service_type']; ?></span>
                 </div>
   
 
           <div class="stats">
                     
               <div>  
                 <div class="title">Duration</div>
                 <div class="valueDuration"><?php echo $element['start_time']; ?> - <?php echo $element['end_time']; ?></div>
               </div>
                
               <div>
                 <div class="title">price</div>
                 <div class="value "><?php echo $element['price']; ?> SR\hour</div>
               </div>
 
             </div> <!-- state class -->
 
         </div>
       </div>
 
 
       </div>
   
       <?php
        
        break;}
  }
  echo "</div>";         

 }        

} else{
        echo "<h2> You haven't made any offers </h2>";
       }?>
         <!-- ##################### cards ###################-->
     <!-- ##################### cards ###################-->
    
<footer class="footer-distributed">

  <div class="footer-left">
  <div>
  <img class="logo" src="images/logo.png" alt="Ouun">
  </div>
  
  <p class="footer-links">
  <a href="currentBaby.php" class="link-1">Home</a>
<!--<a href="index.html/aboutus">About</a>-->  <a href="mailto:support@Ouun.com">Contact</a>
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

<!-- <footer class="footer-distributed">

  <div class="footer-left">

      <img class="logo" src="logo.png" alt="Ouun">

      <p class="footer-links">
          <a href="#" class="link-1">Home</a>
          <a href="#">About</a>
          <a href="mailto:support@Ouun.com">Contact</a>
      </p>

      <p class="footer-company-name">Oun © 2022</p>
  </div>

  <div class="footer-centter">

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

</footer> -->



  

</html>