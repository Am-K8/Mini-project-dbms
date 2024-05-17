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
    <title>Tech-Clover Cart Details</title>
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
  <h2>TECH-CLOVER SHOPPING CART</h2>
 

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

<div class="container">
 <div class="row">
 <form method="post" action="">
  <table class="table table-bordered"style="border: 2px solid #000;">
   <thead>
    <tr>
     <th>Product Title</th>
     <th>Product Image</th>
     <th>Total Price</th>
     <th>Remove</th>
     <th>Operations</th>
    
    </tr>
   </thead>
   <tbody>

   <?php
     global $con;
     $get_ip_add= getIPAddress();  
     $total_price=0;
     $cart_query="Select * from `cart` where ip_address='$get_ip_add'";
     $cart_result=mysqli_query($con,$cart_query);
     while($row=mysqli_fetch_array($cart_result)) {  
        $product_id=$row['product_id'];
        $select_products="Select * from `products` where product_id='$product_id'";
        $result_products=mysqli_query($con,$select_products);
        while($row_product_price=mysqli_fetch_array($result_products)) {
         $product_price=array($row_product_price['product_price']);
         $price_table=$row_product_price['product_price'];
         $product_title=$row_product_price['product_title'];
         $product_image1=$row_product_price['product_image1'];
         $product_values=array_sum($product_price);
         $total_price+=$product_values;  
   
   ?>
     <tr>
      <td><?php echo $product_title?></td>
      <td><img src="product_images/<?php echo $product_image1?>" width="150" height="100" alt="" class="cart_img"></td>

      <td><?php echo $price_table?>/-</td>
      <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
      <td>
     
       <input type="submit" value="Remove" class="bg-secondary px-3 py-2 mx-3" name="remove_cart">
<!--<button class="bg-secondary px-3 py-2">Remove</button>-->
        
      </td>
     </tr>
     <?php
    }
   }
  ?> 
   </tbody>
  </table>
  </form>

  <div class="d-flex">
   <h4 class="px-4">Total Price:<strong class="text-dark">       <td><?php echo $total_price?>/-</td>
</strong></h4>
   <a href="index.php"><button class="bg-secondary px-3 py-2 mx-2">Continue Shopping</button></a>
   <a href="checkout.php"><button class="bg-secondary px-3 py-2">Checkout</button></a>
  </div>
 </div>
</div>

<?php
function removecart(){
  global $con;
  if(isset($_POST['remove_cart'])){
    foreach($_POST['removeitem'] as $remove_id){
      echo $remove_id;
      $delete_query="Delete from `cart` where product_id=$remove_id";
      $delete_result=mysqli_query($con,$delete_query);
      if($delete_result)
      {
        echo "<script>
        alert('Item Removed From The Cart!');
        window.open('cart.php','_self')</script>";
    }
}
}
}
echo $remove_item=removecart();
?>

<!-- footer -->
<br><br>
<div class="bg-dark text-white text-center p-2">
    <p>&copy; 2023 Tech Clover. All rights reserved.</p>
</div>
  </div>



  

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</body>
</html>