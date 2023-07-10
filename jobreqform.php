<!DOCTYPE html>
<head>
<title>Job Request </title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styleB.css">
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
  
  button {
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
  button:hover{
  background-color: rgb(72, 56, 133);
      border-color: rgb(72, 56, 133);
    fill: rgb(72, 56, 133); } 
  button:focus {
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

  .error {
            background : #F2DEDE;
            color : #A94442;
            padding:10px;
            width : 95%;
            border-radius:5px;
                  }


</style>

<!--import google fonts -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css" >
<link rel="stylesheet" href="footer.css" >
</head>
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
            
        <li><a href="signout.php"> Sign out </a></li>
            
        </ul>
        
        </li>
        
        </ul>
        </nav>

    </header>
   
<form action="jobform.php" method="post">
    <form action="next.php" method="post" enctype="multipart/form-data">
    <?php if (isset($_GET['error'])) { ?>

        <p class="error"><?php echo $_GET['error']; ?></p> <?php } ?> 
    <h1>  Fill in the required information </h1>
    <fieldset>
      
        <label for="job">Number of kids :</label>
        <div class="custom-select">
        <select name = "numOfKids" required >
            <option value="1" selected>1 </option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4" >4</option>
            </select><div>

      <label for="name" >Kid/s FullName :</label >
      <input type="text" id="name" name="kid_name"  required>
      <label for="name" >Kid/s Age :</label>
      <input type="text" id="name" name="kid_age" required >
      
      <label>Type of service :</label>
      <input type="radio" id="babysitting" value="babysitting" name="service" checked><label for="babysitting" class="light">Babysitting</label>
      <input type="radio" id="tutoring" value="tutoring" name="service" required><label for="tutoring" class="light" required>Tutoring</label>
      <input type="radio" id="cooking" value="cooking" name="service" ><label for="cooking" class="light">Cooking</label>
     <br>
     <br>
      <label for="name" >Date :</label>
      <input type="date" id="date" name="date" min= "2022-11-09"  required >
Duration:
      <label for="name" >from</label>
      <input type="time" id="duration" name="duration1"  required >

      <label for="name" >to</label>
      <input type="time" id="duration" name="duration2"  required >
    
    <fieldset>
      
    <button type="submit" style="cursor:pointer;">Post Request</button>
         

</body>
</html>