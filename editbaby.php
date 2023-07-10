<?php
session_start() ;
include("connection.php");

include("functions.php");
$user_data = check_loginBabysitter($con);

$errors = array() ;

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="styleB.css">
        <link rel="stylesheet" href="BabyProfile.css">
        <link rel="stylesheet" href="footer.css">
        <link rel="icon" type="image/png" href="logo.png" >
        <!--<link rel="stylesheet" href="mytitles.css"> -->

        <!--import google fonts & stars-->
        
        <title>My Profile</title>
        <style>
          .error {
            background : #F2DEDE;
            color : #A94442;
            padding:10px;
            width : 95%;
            border-radius:5px;
                  }
        </style>
    </head>


    <body>
        <header>
            <a href="#" class="logo"><img src="images/logo.png" alt="logo icon"></a>
            <nav class="navbar">
            <ul> 
            <li>    <a onclick="window.history.back()" style="pointer:cursor;"> < Back </a> </li>
            <li><a href="currentBaby.html"> Home </a></li>
    
            <li> <a href="#"> Menu </a>
                <ul class="inner"> <!-- your menu here\\\\\\-->
                    
             <li class="first"><a href="JobRequest.php"> Job Requests </a></li>
                    
             <li><a href="OfferList.php"> Offers </a></li>
             <li><a href="myReviews.php"> rate & reviews </a></li>
        </ul>
    
            <li> <a href="#"> Settings </a>
            <ul class="inner">
                
            <li class="first"><a href="BabysitterProfile.php"> view profile</a></li>
                
            <li><a href="index.html"> Sign out </a></li>
                
            </ul>
            
            </li>
            
            </ul>
            </nav>
            </header>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <form action="bhandleview.php?national_ID=<?php echo $user_data['national_ID']?>" method="post" enctype="multipart/form-data">
        <h1>My Profile</h1>
        <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p> <?php } ?> 
        <fieldset>
          <legend><span class="number">1</span>Personal Info</legend>
          <label for="name" >Baby sitter FullName</label >
          <input type="text" id="name" name="sitter_name" value="<?php echo $user_data['name'] ?> " required>
          <label for="ID" >ID</label >
            <input type="text" id="ID" name="ID" value="<?php echo $user_data['national_ID'] ?> " required>
          <label for="phone">Phone number</label>
          <input type="tel" id="phone" name="phone" value="<?php echo $user_data['phoneNo'] ?> " required>
          <label for="City" >City</label>
          <input type="text" id="City" name="City" value="<?php echo $user_data['city'] ?> " required>
          
          <label for="mail" >Email</label>
          <input type="email" id="mail" name="user_email" value="<?php echo $user_data['email'] ?> "  required>
          
          <label for="password" >Password </label>
          <input type="password" id="password" name="user_password" value="<?php echo $user_data['password'] ?> " required>
          
          <label>BabySitter Gender</label>
          <label class="light" ><?php echo $user_data['gender'] ?> </label>
          <!--<label type="radio" id="male" value="male" name="user_gender" required ><label for="male" class="light" >Male </label><br>
          <input type="radio" id="female" value="female" name="user_gender" required ><label for="female" class="light">Female</label> -->
          <label for="age">BabySitter age</label>
        <input type="text" id="age" name="age" value="<?php echo $user_data['age'] ?>" required>
        <label for="image">Profile image </label>
        <?php
         echo "<img src='images/".$user_data['sitter_image']."' alt='img'>" ;
         ?>
            <input type="file" name="image" id="image"  >
        
        </fieldset>
        
        <fieldset>
          <legend><span class="number">2</span>Bio</legend>
          <label for="bio" >Any additional Info you want to add?</label>
          <textarea id="bio" name="bio" placeholder="<?php echo $user_data['bio'] ?> " required ></textarea> 
        </fieldset>
        <button name="save" type="submit" >Save Changes</button> 
    <div class="danger"><button type="submit" name="delete">Delete Account</button></div>
      </form>
      <footer class="footer-distributed">

        <div class="footer-left">

            <img class="logo" src="images/logo.png" alt="Ouun">

            <p class="footer-links">
                <a href="currentBaby.html" class="link-1">Home</a>
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