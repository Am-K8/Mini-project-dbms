<?php
 require('connect.php');
 session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="icon" href="css/clover.png">

    <style>
    footer {
      background-color: #8ee000;
      color: #0000d;
      padding: 30px 0;
      text-align: center;
      position: absolute;
      bottom: 0;
      width: 100%;
    }

    .footer-content {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }

    .about-section, .contact-section {
      flex: 1;
      margin: 0 20px;
      text-align: center;
    }

    .about-section h3, .contact-section h3 {
      font-size: 20px;
    }
  </style>

  </head>

  <body>
        <div class="form">
            <h2 style="text-align:center; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">SIGN-UP</h2>
            <form method="POST" action="login_regiseller.php">
                <div class="error-text">Error</div>
                <div class="grid-details">
                    <div class="input">
                        <label>First Name</label>
                        <input type="text" name="fname"placeholder="First Name" required pattern="[a-zA-Z'-'\s']*">
                    </div>
                    <div class="input">
                        <label>Last Name</label>
                        <input type="text" name="lname"placeholder="Last Name" required pattern="[a-zA-Z'-'\s']*">
                    </div>
                </div>
                <div class="input">
                    <label>Email</label>
                    <input type="email" name="email"placeholder="Enter Your Email" required>
                </div>
                <div class="input">
                    <label>Phone</label>
                    <input type="phone" name="phone"placeholder="Phone Number" required pattern="[0-9]{10}" oninvalid="this.setCustomValidity('Enter 10 Digits Number')" oninput="this.setCustomValidity('')">
                </div>
                <div class="grid-details">
                    <div class="input">
                        <label>Password</label>
                        <input type="password" name="password"placeholder="Password" required pattern="[0-9]{4}" oninvalid="this.setCustomValidity('Enter 4 Digits Password')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="input">
                        <label>Confirm Password</label>
                        <input type="password" name="cpass"placeholder="Confirm Password" required >
                    </div>
                  </div>  
                 <div class="profile-img">
                   <div class="file-upload">
                     <input type="file" id="image-preview" name="image" class="file-input" required oninvalid="this.setCustomValidity('Select an Image')" oninput="this.setCustomValidity('')">
                     <i class="fas fa-user-edit"></i>
                   </div>
                 </div>   
                 <div class="submit">
                   <input type="submit" value="Signup Now" class="button"  name="register">
                   
                 </div>

            </form>
        <div class="link">Already Signed up? <a href="login.php">Login Now</a></div> 
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>  
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