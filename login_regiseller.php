<?php

require('connect.php');
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
    $mail->Body    = "Hello Seller, d Riyal TECH-LOVER!!
    Click on the link below to verify the email address  
    <a href='http://localhost/project/module1/verifysel.php?email=$email&v_code=$v_code'> Verify </a>";
    
   
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
  $user_exist_query = "SELECT * FROM `user` WHERE  `email`='$_POST[email]'";
  $result = mysqli_query($con, $user_exist_query);


  if ($result) {
    if (mysqli_num_rows($result) == 1) { //if registered
      $result_fetch = mysqli_fetch_assoc($result);
      if($result_fetch['is_verified']==1)
      {
      if (password_verify($_POST['password'], $result_fetch['password'])) 
      { //correct password
          $_SESSION['logged_in']=true;
          $_SESSION['username']=$result_fetch['fname'];
          header("location:ind.php");
      } else { //incorrect password
        echo "
        <script>
        alert('Incorrect Password!');
        window.location.href='register.php';
       </script>";
      }
    }
    else
    {
      echo "
      <script>
     alert('Email not verified!');
     window.location.href='register.php';
    </script>";
    }
    } else { //not registered
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
  $user_exist_query = "SELECT * FROM `user` WHERE  `email`='$_POST[email]'";
  $result = mysqli_query($con, $user_exist_query);

  if ($result) {
    if (mysqli_num_rows($result) > 0) { //email or username already taken
      $result_fetch = mysqli_fetch_assoc($result);
      if ($result_fetch['email'] == $_POST['email']) { //username already taken error
        echo "
        <script>
        alert('$result_fetch[email] -Email Already Registered !!!!');
        window.location.href='home.php';
       </script>";
      } 
     } else { //if user name or email not taken
      $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
      $ps=$_POST['password'];
      $cp=$_POST['cpass'];
      if($ps===$cp)
      {
      //$cpass = password_hash($_POST[cpass], PASSWORD_BCRYPT);
     //password hasing
      $v_code=bin2hex(random_bytes(16));//verification code
      $random_ID=rand(time(),10000000);
      //data insert
      $query = "INSERT INTO `user`(`unique_ID`,`fname`, `lname`, `email`, `phone`, `password`, `verification_code`, `is_verified`) VALUES (($random_ID),'$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[phone]','$password','$v_code','0')";

      if (mysqli_query($con, $query)&& sendMail($_POST['email'],$v_code)) {
        //if data inserted into db successfullyyy
        echo "
    <script>
     alert('Registration Successful!!Check Your Email for Verification!');
     window.location.href='home.php';
    </script>";
      } else {
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