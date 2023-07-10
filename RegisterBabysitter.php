<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="images/logo.png" href="images/logo.png" >
        <link rel="stylesheet" href="RegisterHeader.css">
        <link rel="stylesheet" href="Registerforms.css">
        <link rel="stylesheet" href="footer.css">
        <title> Register</title>
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
            <div>
                <img class="logo" src="images/logo.png" alt="Ouun">
            </div>
        </header>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
      <form action="babysitterReg.php" method="post" enctype="multipart/form-data">
        <h1>Register</h1>
        <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p> <?php } ?> 
        
        <fieldset>
          <legend><span class="number">1</span>Personal Info</legend>
          <label for="name" >Baby sitter FullName *</label >
          <input type="text" id="name" name="sitter_name" required >
          <label for="ID" >ID *</label >
            <input type="text" id="ID" name="ID" >
          <label for="phone" >Phone number *</label>
          <input type="tel" id="phone" name="phone" required >
          <label for="City" >City *</label>
          <input type="text" id="City" name="City" required>
          
          <label for="mail" >Email *</label>
          <input type="email" id="mail" name="user_email" required >
          
          <label for="password" >Password *</label>
          <input type="password" id="password" name="user_password" required>
          <label for="re_password" >Confirm Password *</label>
          <input type="password" id="re_password" name="repeatedPassword" required >
          
          <label>BabySitter Gender *</label>
          <input type="radio" id="male" value="male" name="user_gender" required><label for="male" class="light" >Male</label><br>
          <input type="radio" id="female" value="female" name="user_gender"><label for="female" class="light">Female</label>
          <label for="age">BabySitter age *</label>
        <input type="text" id="age" name="age" required>
        <label for="image" >Profile image </label>
            <input type="file" name="image" id="image"  >
        
        </fieldset>
        
        <fieldset>
          <legend><span class="number">2</span>Bio</legend>
          <label for="bio" >Any additional Info you want to add?</label>
          <textarea id="bio" name="bio" placeholder=" Enter your major , skills , languages spoken , years of experience and skills"></textarea> 
        </fieldset>
        <button type="submit">Register</button>
      </form>
       <footer class="footer-distributed">

        <div class="footer-left">

            <img class="logo" src="images/logo.png" alt="Ouun">

            <p class="footer-links">
                <a href="index.html" class="link-1">Home</a>
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