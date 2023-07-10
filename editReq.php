<?php 
session_start();
include("connection.php");
include("functions.php");

$user_data = check_loginParent($con);
$myID = $user_data['parent_id'];

$reqID = $_GET['request_id'];

?>

<!DOCTYPE html>
<head>
<title>Edit Request </title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="logo.png" href="images/logo.png" >
<style>
form {
    max-width: 300px;
    margin: 10px auto;
    margin-top: 15%;
    padding: 10px 40px;
    background: #ffff;
    border-radius: 8px;
  }
  
  h1 {
    margin: 0 0 30px 0;
    text-align: center;
    color: rgb(41, 33, 78); ;
  }
  
  input[type="text"],
  input[type="password"],
  input[type="date"],
  input[type="datetime"],
  input[type="email"],
  input[type="number"],
  input[type="search"],
  input[type="tel"],
  input[type="time"],
  input[type="url"],
  textarea,
  select {
    background: rgba(255,255,255,0.1);
    border: none;
    font-size: 16px;
    height: auto;
    margin: 0;
    outline: 0;
    padding: 15px;
    width: 100%;
    background-color: #e8eeef;
    color: #8a97a0;
    box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
    margin-bottom: 30px;
  }
  
  input[type="radio"],
  input[type="checkbox"] {
    margin: 0 4px 8px 0;
  }
  
  select {
    padding: 6px;
    height: 32px;
    border-radius: 2px;
  }
  
  .button {
    padding: 19px 39px 18px 39px;
    font-family: 'Optima', sans-serif;
    color: #FFF;
    background-color: rgb(41, 33, 78);
    font-size: 18px;
    text-align: center;
    border-radius: 12px;
    width: 100%;
    border: 1px solid rgb(41, 33, 78);
    border-width: 1px 1px 3px;
    box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
    margin-bottom: 10px;
  }
  .button:hover{
  background-color: rgb(72, 56, 133);
      border-color: rgb(72, 56, 133);
    fill: rgb(72, 56, 133);
    cursor: pointer;
 } 
  .button:focus {
      color: #ffffff;
  }
  .button2 {
    background:rgb(153, 152, 152); 
    padding: 19px 39px 18px 39px;
    font-family: 'Optima', sans-serif;
    color: #FFF;
    font-size: 18px;
    text-align: center;
    border-radius: 12px;
    width: 84%;
    border-width: 1px 1px 3px;
    box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
    margin-bottom: 10px;
    display: inline-block;
  }
  .button2:hover{
  background-color: grey;
    fill: rgb(72, 56, 133);
    cursor: pointer;
 } 
  .button2:focus {
      color: #ffffff;
  }
  
  
  fieldset {
    margin-bottom: 30px;
    border: none;
  }
  
  legend {
    font-size: 1.4em;
    margin-bottom: 10px;
  }
  
  label {
    display: block;
    margin-bottom: 8px;
  }
  
  label.light {
    font-weight: 300;
    display: inline;
  }
  
  .number {
    background-color: rgb(41, 33, 78);
    color: #fff;
    height: 30px;
    width: 30px;
    display: inline-block;
    font-size: 0.8em;
    margin-right: 4px;
    line-height: 30px;
    text-align: center;
    text-shadow: 0 1px 0 rgba(255,255,255,0.2);
    border-radius: 100%;
  }
  
  @media screen and (min-width: 480px) {
  
    form {
      max-width: 480px;
    }
  
  }




</style>

<!--import google fonts -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css" >
<link rel="stylesheet" href="footer.css" >
</head>
<body> 

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


<?php
$query = "SELECT *
FROM request
WHERE request.request_id = $reqID AND
request.request_id NOT IN (SELECT bookings.request_id FROM bookings);";

$pendingRequests = mysqli_query($con , $query);
 if( mysqli_num_rows($pendingRequests) > 0)
 {
    while ($row = mysqli_fetch_assoc($pendingRequests)) 
    {
      //r
 ?>  

<form action="DoneEdit.php?request_id=<?php echo $row['request_id'];?>" method="post">
<form action="next.php" method="post" enctype="multipart/form-data">
    <h1>  Edit Request </h1>
    
    <fieldset>
      
        <label for="job">Number of kids :</label>
        <div class="custom-select">
        <select name = "numOfKids" required >
            <option value="1" <?php if($row['numOfKids']==1) echo "selected"; ?>>1 </option>
            <option value="2" <?php if($row['numOfKids']==2) echo "selected"; ?>>2</option>
            <option value="3" <?php if($row['numOfKids']==3) echo "selected"; ?>>3</option>
            <option value="4" <?php if($row['numOfKids']==4) echo "selected"; ?>>4</option>
            </select><div>

      <label for="name" >Kid/s FullName :</label >
      <input type="text" id="name" name="kid_name" value="<?php echo $row['kid_name']; ?>" required>
      <label for="name" >Kid/s Age :</label>
      <input type="text" id="name" name="kid_age" value="<?php echo $row['kid_age']; ?>" required >
      
      <label>Type of service :</label>
      <input type="radio" id="babysitting" value="babysitting" name="service" <?php if($row['service_type']=='babysitting') echo "checked"; ?>><label for="babysitting" class="light">Babysitting</label>
      <input type="radio" id="tutoring" value="tutoring" name="service" required <?php if($row['service_type']=='tutoring') echo "checked"; ?>><label for="tutoring" class="light" required>Tutoring</label>
      <input type="radio" id="cooking" value="cooking" name="service" <?php if($row['service_type']=='cooking') echo "checked"; ?>><label for="cooking" class="light">Cooking</label>
     <br>
     <br>
      <label for="name" >Date :  ( Current date set to  <?php echo $row['date']?>)</label>
      <!--<input type="text" placeholder="<?php echo $row['date']; ?>"
        onfocus="(this.type='date')"
        onblur="(this.type='text')" name="date">-->
      <input type="date" id="date" name="date" min= "2022-11-08" value="<?php //echo $row['date']; ?>"  required > 
      Duration: 
      <label for="name" >from</label>
      <!--<input type="text" placeholder="<?php //echo $row['start_time']; ?>"
        onfocus="(this.type='time')"
        onblur="(this.type='text')" name="duration1">-->
      <input type="time" id="duration" name="duration1" value="<?php echo $row['start_time']; ?>"  required >

      <label for="name" >to</label> 
      <!--<input type="text" placeholder="<?php //echo $row['end_time']; ?>"
        onfocus="(this.type='time')"
        onblur="(this.type='text')" name="duration2">-->
      <input type="time" id="duration" name="duration2"  value="<?php echo $row['end_time']; ?>" required >
    
    <fieldset>
      <?php } }?>

    <button class= "button" type="submit" name="done">Done</button>
   <a href="parentRequests.php" class= "button2" name="cancel" >Cancel</a>
    </form>
    </form>
<!--footer

<footer class="footer-distributed" >

<div class="footer-left">
    <div>
        <img class="logo" src="./images/logo.png" alt="Ouun">
    </div>

    <p class="footer-links">
        <a href="mprofile.php" class="link-1">Home</a>
       <!--  <a href="#">About</a> --><!--
        <a href="mailto:support@Ouun.com">Contact</a>
    </p>

    <p class="footer-company-name">Oun © 2022</p>
</div>

<div class="footer-center" style="display:inline-block;">

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
    
    </body>
    
</html>