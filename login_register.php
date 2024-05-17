<?php

require('connection.php');
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function sendMail($email,$v_code)
{
  require ("PHPMailer\PHPMailer.php");
  require ("PHPMailer\SMTP.php");
  require ("PHPMailer\Exception.php");

  $mail = new PHPMailer(true);

  try 
  {
  
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'princessofthieves18@gmail.com';                     //SMTP username
    $mail->Password   = 'rfthudftlhlalneq';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if 


    $mail->setFrom('princessofthieves18@gmail.com', 'Tech-Clover');
    $mail->addAddress($_POST["email"]);     //Add a recipient
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email Verificationn from Tech-CLover';
    $mail->Body    = "Hello Fellow TECH-LOVER!!
    Click on the link below to verify the email address  
    <a href='http://localhost/project/MODULE1/verify.php?email=$email&v_code=$v_code'> Verify </a>";
    

    $mail->send();
    return true;
    } 
    catch (Exception $e)
     {
    return false;
    }

}

//for login
if (isset($_POST['login'])) {
  $user_exist_query = "SELECT * FROM `registered_user` WHERE `username`='$_POST[email_username]' OR `email`='$_POST[email_username]'";
  $result = mysqli_query($con, $user_exist_query);


  if ($result) {
    if (mysqli_num_rows($result) == 1) { //if registered
      $result_fetch = mysqli_fetch_assoc($result);
      if($result_fetch['is_verified']==1)
      {
      if (password_verify($_POST['password'], $result_fetch['passsword'])) 
      { //correct password
          $_SESSION['logged_in']=true;
          $_SESSION['username']=$result_fetch['username'];
          header("location:index.php");
      } else { //incorrect password
        echo "
        <script>
        alert('Incorrect Password!');
        window.location.href='home.php';
       </script>";
      }
    }
    else
    {
      echo "
      <script>
     alert('Email not verified!');
     window.location.href='home.php';
    </script>";
    }
    }
     else { //not registered
      echo "
      <script>
     alert('Email or Username not Registered!');
     window.location.href='home.php';
    </script>";
    }
  } else {
    echo "
    <script>
     alert('Cannot Run Query');
     window.location.href='home.php';
    </script>";
  }
}



//for registration
if (isset($_POST['register'])) {
  $user_exist_query = "SELECT * FROM `registered_user` WHERE `username`='$_POST[username]' OR `email`='$_POST[email]'";
  $result = mysqli_query($con, $user_exist_query);

  if ($result) {
    if (mysqli_num_rows($result) > 0) { //email or username already taken
      $result_fetch = mysqli_fetch_assoc($result);
      if ($result_fetch['username'] == $_POST['username']) { //username already taken error
        echo "
       <script>
        alert('$result_fetch[username] - Username Already Taken !!!!');
        window.location.href='home.php';
       </script>";
      } else { //email already taken error
        echo "
       <script>
        alert('$result_fetch[email] -Email Already Registered !!!!');
        window.location.href='home.php';
       </script>";
      }
    } 
    else
    { //if user name or email not taken
      $password = password_hash($_POST['password'], PASSWORD_BCRYPT);//password hasing
      $ps=$_POST['password'];
      $cp=$_POST['cpass'];
      if($ps===$cp){
      $v_code=bin2hex(random_bytes(16));//verification code
    //data insert
     $query="INSERT INTO `registered_user`(`full_name`, `username`, `email`, `passsword`, `verification_code`, `is_verified`)  VALUES ('$_POST[fullname]','$_POST[username]','$_POST[email]','$password','$v_code','0')";

      if (mysqli_query($con, $query) && sendMail($_POST['email'],$v_code)) {
        //if data inserted into db successfullyyy
        echo "
    <script>
     alert('Registration Successful!! Check Your Email for Verification!');
     window.location.href='home.php';
    </script>";
      }
       else
     {
        //if data cannot b inserted into db
        echo "
    <script>
     alert('Server Down');
     window.location.href='home.php';
    </script>";
      }
    }
    else
    {
      echo "
      <script>
     alert('Confirm Password not match!');
     window.location.href='home.php';
    </script>";
    }
  }
  } else {
    echo "
    <script>
     alert('Cannot Run Query');
     window.location.href='home.php';
    </script>";
  }

}



?>