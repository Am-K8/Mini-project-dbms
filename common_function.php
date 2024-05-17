<?php
include('conn.php');

function getproducts()
{global $con;
 //condition isset
 if(!isset($_GET['category'])){
  if(!isset($_GET['brand'])){
 
 $select_brands = "SELECT * FROM `products` order by rand() limit 0,9";
 $result_brands = mysqli_query($con,$select_brands);
       while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $product_title=$row_data['product_title'];
        $product_id=$row_data['product_id'];
        $product_des=$row_data['product_description'];
        $product_k=$row_data['product_keywords'];
        $product_i=$row_data['product_image1'];
        $product_p=$row_data['product_price'];
        $cat_id=$row_data['category_id'];
        $b_id=$row_data['brand_id'];
        echo "<div class='col-md-4 mb-2'>
        <div class='card' >
        <img src='product_images/$product_i' class='card-img-top' alt='...'>
        <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>$product_des</p>
        <p class='card-text'>Price: $product_p /-</p>
        <a href='index.php?add_to_cart=$product_id' class='btn btn-dark'>Add to cart</a>
       
        <a href='product_details.php?product_id=$product_id' class='btn btn-light' style='background-color: #76D275; color: black;'>View More</a>
        </div>
        </div>
      </div>";
       }
  }      
}
}


function getbrands(){
 global $con;
 $select_brands = "SELECT * FROM `brands`";
  $result_brands = mysqli_query($con,$select_brands);
  
  // Check for query errors
  if (!$result_brands) {
      die("Query failed: " .mysqli_error($con));
  }
  
  // Fetch and display data
  while ($row_data = mysqli_fetch_assoc($result_brands)) {
    $brand_title=$row_data['brand_title'];
    $brand_id=$row_data['brand_id'];
      echo "<li class='nav-item'>
      <a class='nav-link text-center text-white' href='index.php?brand=$brand_id'>$brand_title</a>
    </li>";
  }
}



function getcategories(){
 global $con;
 $select_brands = "SELECT * FROM `categories`";
  $result_brands = mysqli_query($con,$select_brands);
  
  // Check for query errors
  if (!$result_brands) {
      die("Query failed: " .mysqli_error($con));
  }
  
  // Fetch and display data
  while ($row_data = mysqli_fetch_assoc($result_brands)) {
    $brand_title=$row_data['category_title'];
    $brand_id=$row_data['category_id'];
      echo "<li class='nav-item'>
      <a class='nav-link text-center text-white' href='index.php?category=$brand_id'>$brand_title</a>
    </li>";
  }
}

function getuniquecat()
{global $con;
 //condition isset
 if(isset($_GET['category'])){
 $category_id=$_GET['category'];
 $select_brands = "SELECT * FROM `products` where category_id=$category_id";
 $result_brands = mysqli_query($con,$select_brands);
 $number=mysqli_num_rows($result_brands);

 if($number== 0){
  echo"<h2 class='text-center text-danger'> NO STOCK! TT</h2>";
 }
       while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $product_title=$row_data['product_title'];
        $product_id=$row_data['product_id'];
        $product_des=$row_data['product_description'];
        $product_k=$row_data['product_keywords'];
        $product_i=$row_data['product_image1'];
        $product_p=$row_data['product_price'];
        $cat_id=$row_data['category_id'];
        $b_id=$row_data['brand_id'];
        echo "<div class='col-md-4 mb-2'>
        <div class='card' >
        <img src='product_images/$product_i' class='card-img-top' alt='...'>
        <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>$product_des</p>
        <p class='card-text'>Price: $product_p /-</p>
       <a href='index.php?add_to_cart=$product_id' class='btn btn-dark'>Add to cart</a>
       <a href='product_details.php?product_id=$product_id' class='btn btn-light' style='background-color: #76D275; color: black;'>View More</a>
        </div>
        </div>
      </div>";
       }
       
}
}

function getuniquebrands()
{global $con;
 //condition isset
 
  if(isset($_GET['brand'])){
   $category_id=$_GET['brand'];
 $select_brands = "SELECT * FROM `products`where brand_id=$category_id ";
 $result_brands = mysqli_query($con,$select_brands);
 $number=mysqli_num_rows($result_brands);

 if($number== 0){
  echo"<h2 class='text-center text-danger'> NO STOCK! TT</h2>";
 }
       while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $product_title=$row_data['product_title'];
        $product_id=$row_data['product_id'];
        $product_des=$row_data['product_description'];
        $product_k=$row_data['product_keywords'];
        $product_i=$row_data['product_image1'];
        $product_p=$row_data['product_price'];
        $cat_id=$row_data['category_id'];
        $b_id=$row_data['brand_id'];
        echo "<div class='col-md-4 mb-2'>
        <div class='card' >
        <img src='product_images/$product_i' class='card-img-top' alt='...'>
        <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>$product_des</p>
        <p class='card-text'>Price: $product_p /-</p>
        <a href='index.php?add_to_cart=$product_id' class='btn btn-dark'>Add to cart</a>
        <a href='product_details.php?product_id=$product_id' class='btn btn-light' style='background-color: #76D275; color: black;'>View More</a>
        </div>
        </div>
      </div>";
       }
  }      
}

function search(){
 global $con;
 
 //condition isset
 if (isset($_GET['search_dp'])){
  $search_dv=$_GET['search_data'];
 $search_query="SELECT * FROM `products` WHERE product_keywords like '%$search_dv%' ";
 $result_brands = mysqli_query($con, $search_query);
 $number=mysqli_num_rows($result_brands);

 if($number== 0){
  echo"<h2 class='text-center text-danger'> NOT FOUND! TT</h2>";
 }
       while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $product_title=$row_data['product_title'];
        $product_id=$row_data['product_id'];
        $product_des=$row_data['product_description'];
        $product_k=$row_data['product_keywords'];
        $product_i=$row_data['product_image1'];
        $product_p=$row_data['product_price'];
        $cat_id=$row_data['category_id'];
        $b_id=$row_data['brand_id'];
        echo "<div class='col-md-4 mb-2'>
        <div class='card' >
        <img src='product_images/$product_i' class='card-img-top' alt='...'>
        <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>$product_des</p>
        <p class='card-text'>Price: $product_p /-</p>
        <a href='index.php?add_to_cart=$product_id' class='btn btn-dark'>Add to cart</a>
        <a href='product_details.php?product_id=$product_id' class='btn btn-light' style='background-color: #76D275; color: black;'>View More</a>
        </div>
        </div>
      </div>";
       }
  }      
 }

 function cart(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $ip=getIPAddress(); 
    $get_product_id = $_GET['add_to_cart'];
    $search_query="SELECT * FROM `cart` WHERE product_id=$get_product_id and ip_address='$ip' ";
    $result_brands = mysqli_query($con, $search_query);
    $number=mysqli_num_rows($result_brands);

 if($number>0){
  echo"<script>
  alert('Item Already present in cart!');
   window.open('index.php', '_self')
 </script>";
 
 }else{
  $insert_query="insert into `cart` (product_id,quantity,ip_address) values($get_product_id,1,'$ip' )";
  $result=mysqli_query($con,$insert_query);
  if($result)
  {
    echo "
    <script>
     alert('Added to Cart!!');
     window.open('index.php', '_self')
    </script>";
  }
 }
}
 }


 function cart_item(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_product_id = $_GET['add_to_cart'];
    $search_query="SELECT * FROM `cart`";
    $result_brands = mysqli_query($con, $search_query);
    $number=mysqli_num_rows($result_brands) ;
 
 }else{
  global $con;
    $get_product_id = $_GET['add_to_cart'];
    $search_query="SELECT * FROM `cart`";
    $result_brands = mysqli_query($con, $search_query);
    $number=mysqli_num_rows($result_brands) ;
  $insert_query="insert into `cart` (product_id,quantity) values($get_product_id,1 )";
  $result=mysqli_query($con,$insert_query);
  $count_cart_items=mysqli_num_rows($result);
 }
 echo $count_cart_items;
}


function view_details()
 {
  global $con;
    //condition isset
    if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
     if(!isset($_GET['brand'])){
        $product_id=$_GET['product_id'];
    $select_brands = "SELECT * FROM `products`where product_id=$product_id";
    $result_brands = mysqli_query($con,$select_brands);
          while ($row_data = mysqli_fetch_assoc($result_brands)) {
           $product_title=$row_data['product_title'];
           $product_id=$row_data['product_id'];
           $product_des=$row_data['product_description'];
           $product_k=$row_data['product_keywords'];
           $product_i1=$row_data['product_image1'];
           $product_i2=$row_data['product_image2'];
           $product_i3=$row_data['product_image3'];
           $product_p=$row_data['product_price'];
           $cat_id=$row_data['category_id'];
           $b_id=$row_data['brand_id'];
           echo "<div class='col-md-4 mb-2'>
           <div class='card' >
           <img src='product_images/$product_i1' class='card-img-top' alt='$product_title'>
           <div class='card-body'>
           <h5 class='card-title'>$product_title</h5>
           <p class='card-text'>$product_des</p>
           <p class='card-text'>Price: $product_p /-</p>
           <a href='index.php?add_to_cart=$product_id' class='btn btn-dark'>Add to cart</a>
      
           <a href='index.php' class='btn btn-light' style='background-color: #76D275; color: black;'>Go Home</a>
           <a href='review.php' class='btn btn-light' style='background-color: #fff000; color: black; border:2;'>Reviews</a>
           </div>
           </div>
         </div>

         <div class'col-md-8'>
            <!--related cards-->
            <div class='row'>
                <div class='col-md-12'>
                    <h4 class='text-center mb-5'>Related Images</h4>
                </div>
                <div class='col-md-6'>
                    <img src='product_images/$product_i2' class='card-img-top' alt='$product_title'>
                </div>
                <div class='col-md-6'>
                    <img src='product_images/$product_i3' class='card-img-top' alt='$product_title'>
                </div>
            </div>

        </div>";
          }
     }      
   }
  }
 }

 function view_details1()
 {
  global $con;
    //condition isset
    if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
     if(!isset($_GET['brand'])){
        $product_id=$_GET['product_id'];
    $select_brands = "SELECT * FROM `products`where product_id=$product_id";
    $result_brands = mysqli_query($con,$select_brands);
          while ($row_data = mysqli_fetch_assoc($result_brands)) {
           $product_title=$row_data['product_title'];
           $product_id=$row_data['product_id'];
           $product_des=$row_data['product_description'];
           $product_k=$row_data['product_keywords'];
           $product_i1=$row_data['product_image1'];
           $product_i2=$row_data['product_image2'];
           $product_i3=$row_data['product_image3'];
           $product_p=$row_data['product_price'];
           $cat_id=$row_data['category_id'];
           $b_id=$row_data['brand_id'];
           echo "<div class='col-md-4 mb-2'>
           <div class='card' >
           <img src='product_images/$product_i1' class='card-img-top' alt='$product_title'>
           <div class='card-body'>
           <h5 class='card-title'>$product_title</h5>
           <p class='card-text'>$product_des</p>
           <p class='card-text'>Price: $product_p /-</p>
          
      
           <a href='index.php' class='btn btn-light' style='background-color: #76D275; color: black;'>Go Home</a>
           <a href='display_reviews.php' class='btn btn-light' style='background-color: #fff000; color: black; border:2;'>Reviews</a>
           </div>
           </div>
         </div>

         <div class'col-md-8'>
            <!--related cards-->
            <div class='row'>
                <div class='col-md-12'>
                    <h4 class='text-center mb-5'>Related Images</h4>
                </div>
                <div class='col-md-6'>
                    <img src='product_images/$product_i2' class='card-img-top' alt='$product_title'>
                </div>
                <div class='col-md-6'>
                    <img src='product_images/$product_i3' class='card-img-top' alt='$product_title'>
                </div>
            </div>

        </div>";
          }
     }      
   }
  }
 }
 
 function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  


function total_cart_price(){
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
      $product_values=array_sum($product_price);
      $total_price+=$product_values;  
}
}
echo $total_price;
}

function getproducts1()
{global $con;
 //condition isset
 if(!isset($_GET['category'])){
  if(!isset($_GET['brand'])){
 
 $select_brands = "SELECT * FROM `products` order by rand() limit 0,9";
 $result_brands = mysqli_query($con,$select_brands);
       while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $product_title=$row_data['product_title'];
        $product_id=$row_data['product_id'];
        $product_des=$row_data['product_description'];
        $product_k=$row_data['product_keywords'];
        $product_i=$row_data['product_image1'];
        $product_p=$row_data['product_price'];
        $cat_id=$row_data['category_id'];
        $b_id=$row_data['brand_id'];
        $payment=$row_data['payment'];
        echo "<div class='col-md-4 mb-2'>
        <div class='card' >
        <img src='product_images/$product_i' class='card-img-top' alt='...'>
        <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>$product_des</p>
        <p class='card-text'>Price: $product_p /-</p>
        <p class='card-text'>No. of buyers: $payment</p>
        <a href='products_.php?product_id=$product_id' class='btn btn-light' style='background-color: #76D275; color: black;'>View More</a>
       
        </div>
        </div>
      </div>";
       }
  }      
}
}
?>
