
<?php

require("connection.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email,$reset_token)
{
    require('PHPMailer/PHPMailer.php');
    require('PHPMailer/SMTP.php');
    require('PHPMailer/Exception.php');

    $mail = new PHPMailer(true);

    try {
        //Server setting               
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'princessofthieves18@gmail.com';                     //SMTP username
        $mail->Password   = 'rfthudftlhlalneq';                                //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('princessofthieves18@gmail.com', 'Tech-Clover');
        
        $mail->addAddress($_POST["email"]);   //Add a recipient
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Password Rest Link From TechClover';
        $mail->Body    = "We got a reset password request from you!<br>
        Click the link below: <br>
        <a href = 'http://localhost/project/MODULE1/updatepassword.php?email=$email&reset_token=$reset_token'>Reset Password</a>";
    
        $mail->send();
        return true;
    } 
    catch (Exception $e) {
        return false;
    }
}

if(isset($_POST['send-reset-link']))
{
    $query = "SELECT * FROM `registered_user` WHERE `email`='$_POST[email]'";
    $result = mysqli_query($con,$query);
    if($result)
    {
        if(mysqli_num_rows($result)==1)
        {
            $_GET['reset_token'] = bin2hex(random_bytes(16));
            date_default_timezone_set('Asia/kolkata');
            $date = date("Y-m-d");
            $rtoken =  $_GET['reset_token'];
            $query = "UPDATE `registered_user` SET `resettoken`='$rtoken',`resettokenexpire`='$date' WHERE `email`='$_POST[email]' "  ;
            if(mysqli_query($con,$query) && sendMail($_POST['email'],$_GET['reset_token']))
            {
                echo"
                    <script>
                        alert('Password Reset Link Sent to mail');
                        window.location.href = 'home.php';
                    </script>
                ";
            }
            else
            {
                echo"
                     <script>
                        alert('Server Down Try Again Later');
                        window.location.href = 'home.php';
                    </script>
                ";

            }
        }
        else
        {
            echo"
                <script>
                    alert('Email Not Found');
                    window.location.href = 'home.php';
                </script>
            ";
        }
    }

    else
    {
        echo"
          <script>
                alert('cannot run query');
                window.location.href = 'index.php';
          </script>
        ";
    }
    
}


?>
