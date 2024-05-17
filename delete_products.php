<?php
include('conn.php');

if(isset($_POST['delete_brand'])) {
    $brand_title = $_POST['brand_title'];
    
    $select_query="Select *from `products` where product_title='$brand_title'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number> 0){
     
    // Delete data from the database
    $delete_query = "DELETE FROM `products` WHERE product_title = '$brand_title'";
    $result_delete = mysqli_query($con, $delete_query);

    if ($result_delete) {
        echo "<script>alert('Product Deleted Successfully!');</script>";
    } else {
        echo "<script>alert('Error deleting Product.');</script>";
    }
   } else {
    echo "<script>alert('No Such product is present.');</script>";
   
   }
}
?>

<?php
 require('connect.php');
 session_start();
 ?>
<?php
 include('conn.php');
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Seller side working</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
 <link rel="icon" href="css\clover.png">
 <link rel="stylesheet" href="css/form1.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
<style>
  .footer{
    position: relative;
    bottom:0;
  }
</style>



</head>
<body>
<header>
<a href="home.php">
  <img src="css/clover.gif" height="50px" alt="descriptive text about img">
  </a>
  <h2>TECH-CLOVER SELLER SIDE</h2>
  
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

<!-- nav 
<div class="container-fluid p-0">
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #8888;">
 <div class="container-fluid">
  <img src="css/clover.gif" height="60px" alt="descriptive text about img">
  <h2>  Tech-Clover Seller Side</h2>

  <nav class="navbar navbar-expand-lg">
   <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Welcome Guest</a>
      </li>
      
   </ul>
  </nav>
  </div>
  </nav>
-->

  <!--Secong nav-->
  <div class="bg-light text-black text-center p-2">
    <h3> Manage Details 🍀</h3>
</div>

<!--Third nav-->
<div class="row">
  <div class="col md-12  p-0 d-flex align-items-center"  style="background-color:#76D275; color: black; border: dark;">
   <div class="p-3">
  
   </div>
   <div class="button text-center">
    <button class="my-3"><a href="insert_product.php" class="nav-link text-dark bg-light my-1" >Insert Products</a> </button>
   <button><a href="index1.php" class="nav-link text-dark bg-light my-1" >View Products</a></button>
   <button><a href="ind.php?insert_category" class="nav-link text-dark bg-light my-1">Insert Categories</a></button>
 
   <button><a href="ind.php?insert_brand" class="nav-link text-dark bg-light my-1">Insert Brands</a></button>
   <button><a href="delete_products.php" class="nav-link text-dark bg-light my-1">Delete Products</a></button>
   <button><a href="delete_brands.php" class="nav-link text-dark bg-light my-1">Delete Brands</a></button>
   <button><a href="delete_categories.php" class="nav-link text-dark bg-light my-1">Delete Categories</a></button>
   <button><a href="delete_account.php" class="nav-link text-dark bg-light my-1">Delete Account</a></button>
   <button class="my-3"><a href="update_product.php" class="nav-link text-dark bg-light my-1" >Update Products</a> </button>
   
   </div>


  </div>
</div>



</div>

<!--4th nav-->
 <div class="container my-3" >
    <?php
      if(isset($_GET['insert_category'])) {
          include('insert_categories.php');
      }
    ?>
 </div>

 <div class="container my-5" >
    <?php
      if(isset($_GET['insert_brand'])) {
          include('insert_brands.php');
      }
    ?>
 </div>




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

<h2 class="text-center">Delete Products</h2>
<form action="" method="post" class="mb-2" style="width: 80%; margin: auto;">

<div class="input-group w-99 mb-2">
  <span class="input-group-text bg-secondary" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="brand_title" placeholder="Delete products" aria-label="Brands" aria-describedby="basic-addon1">
</div>

<div class="input-group w-8 mb-2 m-auto">
  
<input type="submit" class=" bg-secondary border-2 p-2 my-3" name="delete_brand" value="Delete products" aria-label="Username" aria-describedby="basic-addon1" class=bg-secondary>
  
</div>

</form> 
<br><br><br><br><br><br><br><br><br><br><br><br>
<div class="bg-dark text-white text-center p-2 footer">
    <p>&copy; 2023 Tech Clover. All rights reserved.</p>
</div>
  
</body>
</html>