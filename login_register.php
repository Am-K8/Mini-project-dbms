<?php

require('connection.php');
session_start();

//for login
if (isset($_POST['login'])) {
  $user_exist_query = "SELECT * FROM `registered_user` WHERE `username`='$_POST[email_username]' OR `email`='$_POST[email_username]'";
  $result = mysqli_query($con, $user_exist_query);


  if ($result) {
    if (mysqli_num_rows($result) == 1) { //if registered
      $result_fetch = mysqli_fetch_assoc($result);
      if (password_verify($_POST['password'], $result_fetch['passsword'])) 
      { //correct password
          $_SESSION['logged_in']=true;
          $_SESSION['username']=$result_fetch['username'];
          header("location:home.php");
      } else { //incorrect password
        echo "
        <script>
        alert('Incorrect Password!');
        window.location.href='home.php';
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
    } else { //if user name or email not taken
      $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
      $query = "INSERT INTO `registered_user`(`full_name`, `username`, `email`, `passsword`) VALUES ('$_POST[fullname]','$_POST[username]','$_POST[email]','$password')";
      if (mysqli_query($con, $query)) {
        //if data inserted into db successfullyyy
        echo "
    <script>
     alert('Registration Successful!!');
     window.location.href='home.php';
    </script>";
      } else {
        //if data cannot b inserted into db
        echo "
    <script>
     alert('Cannot Run Query');
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