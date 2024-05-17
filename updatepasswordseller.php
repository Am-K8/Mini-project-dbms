<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Update</title>
    <style>
        * {
             margin: 0;
             padding: 0;
             box-sizing: border-box;
             text-align: none;
             font-family: poppins;
          }

          form
          {
            position : absolute;
            top : 50%;
            left : 50%;
            transform: translate(-50%,-50%);
            background-color: #f8f0fb;
            width: 350px;
            border-radius: 5px;
            padding: 20px 25px 30px;
          }

          form h3
          {
            margin-bottom : 15px;
            color: #302c41;
          }

          form input
          {
            width: 100%;
            margin-bottom: 20px;
            background-color: transparent;
            border: none;
            border-bottom: 2px solid #082340;
            border-radius: 0;
            padding: 5px 0;
            font-weight: 550;
            font-size: 14px;
            outline: none;
          }

          form button
          {
            font-weight: 550;
            font-size: 15px;
            color:lavender;
            background-color:#302c41;
            padding: 4px 10px;
            border: none;
          }
    </style>
</head>
<body>

<?php

   require("connect.php");

   if(isset($_GET['email']) && isset($_GET['reset_token']))
   {
        //$rtoken = $_GET['reset_token'];
        date_default_timezone_set('Asia/kolkata');
        $date = date("Y-m-d");
        $query = "SELECT * FROM  `user` WHERE `email`='$_GET[email]' AND `resettoken`= '$_GET[reset_token]' AND `resettokenexpire`= '$date' ";
        $result = mysqli_query($con,$query);
        if($result)
        {
            if(mysqli_num_rows($result)==1)
            {
                echo"
                    <form method = 'POST'>
                        <h3>Create New Password</h3>
                        <input type = 'password' placeholder = 'New Passsword' name='Passsword'>
                        <button type = 'submit' name='updatepasssword'>UPDATE</button>
                        <input type = 'hidden' name='email' value='$_GET[email]'>
                    </form>
                
                ";
            }
            else
            {
                echo"
                    <script>
                        alert('Invalid or Expired Link');
                        window.location.href = 'index.php';
                    </script>
                ";
            }
        }
        else
        {
            echo"
                    <script>
                        alert('Server Down! Try Again later');
                        window.location.href = 'index.php';
                    </script>
                ";
        }
   }

?>

<?php 

   if(isset($_POST['updatepasssword']))
   {
        $pass = password_hash($_POST['Passsword'],PASSWORD_BCRYPT);
        $update = "UPDATE `user` SET `password`='$pass',`resettoken`= NULL,`resettokenexpire`= NULL WHERE `email`= '$_POST[email]'";
        if(mysqli_query($con,$update))
        {
            echo"
                    <script>
                        alert('Password Updated Successfully');
                        window.location.href = 'login.php';
                    </script>
                ";

        }

        else
        {
            echo"
                    <script>
                        alert('Password Reset Link Sent to mail');
                        window.location.href = 'index.php';
                    </script>
                ";
        }
   }

?>
</body>
</html>