
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
    <title>Login</title>
    <link rel="stylesheet" href="css/form.css">
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
            <h2 style="text-align:center; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">LOG-IN</h2>
            <form method="POST" action="login_regiseller.php">
                <div class="error-text">Error</div>
               
                <div class="input">
                    <label>Email</label>
                    <input type="email" name="email"placeholder="Enter Your Email" required>
                </div>
                
                <div class="grid-details">
                    <div class="input">
                        <label>Password</label>
                        <input type="password" name="password"placeholder="Password" required>
                    </div>
                    
                  </div>  
                   
                 <div class="submit">
                   <input type="submit" value="Login Now" class="button" name="login">
                 </div>
            </form>
        <div class="link">Forgot Password? <a href="forgotpass.php">Reset Password</a></div> 
        <div class="popup-container" id="forgot-popup">
        <div class="forgot popup">
        <form method="POST" action="forgotpassword.php">
        

      
      
      </div>
      </div>
      </div>
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
      
  </body>
</html>