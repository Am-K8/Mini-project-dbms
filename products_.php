<?php
 require('connection.php');
 session_start();
 include('conn.php');
 include('common_function.php');
 ?>
 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-commerce website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="css/clover.png">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/form1.css">
 
    
</head>

<body>
<header>
  <a href="home.php">
  <img src="css/clover.gif" height="50px" alt="descriptive text about img">
  </a>
  <h2>TECH-CLOVER SELLER SIDE</h2>
  <nav>
  <a href="index.php">STORE</a>
   <a href="#">SUPPORT</a>
   <a href="#">ABOUT</a>
  </nav>

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

<div class="container-fluid p-0" >
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #76D275;">

  <div class="container-fluid">
  
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
      
       
          <li class="nav-item">
          <a class="nav-link" href="cart.php" ><i class="fa-solid fa-cart-shopping">cart</i></sup></superscript></a>
          </li>
          
      </ul>
      <form class="d-flex" role="search" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <!--<button class="btn btn-outline-success" type="submit">Search</button>-->
        <input type="submit" value="Search" class="btn btn-outline-success" name="search_dp">
      </form>
    </div>
  </div>
</nav>

<!--navbar
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light">

        <div class="container-fluid">
        <img src="css/clover.gif" height="50px" alt="descriptive text about img">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Total Price: 100/-</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    -->
<!-- Second nav
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary" style="background-color: #76D275;">
<u1 class="navbar-nav me-auto">
  <li class="nav-item">
    <a class="nav-link" href="#">Welcome Guest</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="home.php">Login</a>
  </li>
</u1>
</nav>
 -->

<!--third nav -->
<div class="bg-light text-black text-center p-2">
    <h3> Clover Store</h3>
    <p>🍀 May you always be in CLOVER!</p>
</div>

<div class="row">
  <div class="col md-10">
    <!--products-->
    <div class="row">
        
        
    <!--fetching products -->
    <?php 
      view_details1();
      getuniquecat(); 
      getuniquebrands();
    ?>

      <!--row end-->
    </div>
          <!--column end-->
    </div>

    <!--side nav-->

    <!-- Brands -->
  <div class="col-md-2 mb-2 p-0"  style="background-color:#055; color: black; border: dark;">
  <u1 class="navbar-nav me-auto">
  <li class="nav-item bg-dark">
    <a class="nav-link text-center text-white" href="#" style="background-color:#76D275;" ><h3>TOP BRANDS</h3></a>
  </li>

  <?php
  
  getbrands();
?>
  
</u1>


  <!-- categories -->
  <u1 class="navbar-nav me-auto">
  <li class="nav-item bg-dark">
    <a class="nav-link text-center text-white" href="#" style="background-color:#76D275;" ><h3>Categories</h3></a>

    <?php
  getcategories();

?>

  </div>
 </u1>

</div>  

<!-- footer -->
<br><br>
<div class="bg-dark text-white text-center p-2">
    <p>&copy; 2023 Tech Clover. All rights reserved.</p>
</div>
  </div>



  

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</body>
</html>