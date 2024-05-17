<?php

$con=mysqli_connect("localhost","root","","seller");

if(mysqli_connect_error()){
 echo "<script>('Cannot connect to the database');</script>";
 exit();
}
?>