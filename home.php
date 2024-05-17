<?php
 require('connection.php');
 session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>user-Login and result verify</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="icon" href="css/clover.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
  </head>
<body style="background-color:#000000;">
<div class="background-image"></div>

 <header>
 <a href="home.php">
  <img src="css/clover.gif" height="50px" alt="descriptive text about img">
  </a>
  <h2>TECH-CLOVER</h2>
  <nav>
   
   <a href="register.php">DISTRIBUTION</a>
   <a href="chat_module/chat.php">SUPPORT</a>
   <a href="about_us.php">ABOUT</a>
  </nav>

  <?php
  if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
  {
    echo "
    <div class='user'>
      $_SESSION[username] -(‾◡◝)  <a href='logout.php'>LOGOUT</a>
      </div>
    ";
  }
  else
  {
    echo "
    <div class='sign-in-up'>
    <button type='button' onclick=\"popup('login-popup')\" >LOGIN</button>
    <button type='button' onclick=\"popup('register-popup')\">REGISTER</button>
  </div>
    ";
  }
  ?>
 </header>


 <div class="popup-container" id="login-popup">
  <div class="popup">
   <form method="POST" action="login_register.php">
    <h2>
     <span>USER LOGIN</span>
     <button type="reset" onclick="popup('login-popup')">X</button>
    </h2>
    <input type="text" placeholder="E-mail or Username" name="email_username" required>
    <input type="password" placeholder="Password" name="password" required>
    <button type="submit" class="login-btn" name="login">LOG-IN</button>
   </form>
   <div class ="forgot-btn">
      <button type= "button" onclick="forgotPopup()">Forgot Password?</button>
   </div>
  </div>
 </div>

 <div class="popup-container" id="register-popup">
  <div class="register popup">
   <form method="POST" action="login_register.php">
    <h2>
     <span>USER REGISTER</span>
     <button type="reset" onclick="popup('register-popup')">X</button>
    </h2>
    <input type="text" placeholder="Full Name" name="fullname" required pattern="[a-zA-Z'-'\s']*" oninvalid="this.setCustomValidity('Must only contain letters')" oninput="this.setCustomValidity('')">
    <input type="text" placeholder="Username" name="username" required>
    <input type="email" placeholder="E-mail" name="email" required>
    <input type="password" placeholder="Password" name="password" required pattern="[0-9]{4}" oninvalid="this.setCustomValidity('Enter 4 Digits Password')" oninput="this.setCustomValidity('')">
    <input type="password" placeholder="Confirm Password" name="cpass" required >
    <button type="submit" class="register-btn" name="register">REGISTER</button>
   </form>
  </div>
 </div>

 <div class="popup-container" id="forgot-popup">
  <div class="forgot popup">
   <form method="POST" action="forgotpassword.php">
    <h2>
     <span>RESET PASSWORD</span>
     <button type="reset" onclick="popup('forgot-popup')">X</button>
    </h2>
    <input type="text" placeholder="E-mail" name="email">
    <button type="submit" class="reset-btn" name="send-reset-link">SEND LINK</button>
   </form>
  </div>
 </div>

 <?php
  if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
  {
      echo "<h1 style='text-align:right; margin-top:200px; font-family:Copperplate; color:#ccc '> Oh, fellow TECH-LOVER - $_SESSION[username] &nbsp &nbsp &nbsp &nbsp <br>🍀 May you always be in CLOVER!&nbsp &nbsp &nbsp &nbsp  </h1>";
  }
 ?>

 <script>
  function popup(popup_name)
  {
    get_popup=document.getElementById(popup_name);
    if(get_popup.style.display=="flex")
    {
     get_popup.style.display="none";
    }
    else
    {
     get_popup.style.display="flex";
    }
  }
  function forgotPopup()
  {
    document.getElementById('login-popup').style.display = "none";
    document.getElementById('forgot-popup').style.display = "flex";
  }
 
 </script>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<footer>
    <div class="footer-content">
      <div class="about-section">
        <h3>About Us</h3>
        <p>Tech-Clover is your one-stop destination for the latest software tech products. We provide a wide range of cutting-edge software solutions and tech gadgets to cater to your needs.</p>
      </div>
      <div class="contact-section">
        <h3>Contact Us</h3>
        <p>Email: info@tech-clover.com</p>
        <p>Phone: +1-123-456-7890</p>
      </div>
    </div>
  </footer>



</body>
</html>