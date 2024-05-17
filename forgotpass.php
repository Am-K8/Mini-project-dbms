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
    
  </head>

  <body>
        <div class="form">
            <h2 style="text-align:center; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Reset Password</h2>
            <form method="POST" action="forgotpasswordseller.php">
                <div class="error-text">Error</div>
               
                <div class="input">
                    <label>Email</label>
                    <input type="email" name="email"placeholder="Enter Your Email" required>
                </div>
                  
                 <div class="submit">
                   <input type="submit" value="Send Link" class="reset-btn" name="send-reset-link">
                 </div>

                 
            </form>
      
           
      </div>

        

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