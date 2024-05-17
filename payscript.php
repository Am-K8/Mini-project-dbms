<?php

 $apiKey = "rzp_test_E1ovMx2YahQq19";
 include('conn.php');
 include('common_function.php');

?>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>



<form action="" method="POST">
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $apiKey;?>" 
    data-amount="<?php echo $_POST['amount']*100;?>" 
    data-currency="INR"
    data-id="<?php echo 'OID'.rand(10,100).'END';?>"
    data-buttontext="Pay with Razorpay"
    data-name="Tech Clover"
    data-description="TechClover is the one-stop solution for Tech Products"
    data-image="css\clover.gif"
    data-prefill.name="<?php echo $_POST['name'];?>"
    data-prefill.email="<?php echo $_POST['emails'];?>"
    data-prefill.contact="<?php echo $_POST['mobile'];?>"
    data-theme.color="#F37254"
></script>

<input type="hidden" custom="Hidden Element" name="hidden"/>
</form>
<h1>Payment Confirmation</h1>

<form method="post" action="payscript.php">
        <button type="submit" name="confirm_payment" style="background-color: #043927; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Confirm Payment</button>
    </form>

    <form method="post" action="cart.php">
        <button type="submit" name="confirm_payment" style="background-color: #043927; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Go Back</button>
    </form>

<?php
if (isset($_POST['confirm_payment'])) {
    
    echo "
    <script>
     alert('Thank you for your payment.');
    </script>";

   
    global $con;

    // Query to select the "link" from the "products" table based on matching "product_id" in the "cart" table
    $query = "SELECT products.link
              FROM products,cart 
              WHERE products.product_id = cart.product_id";

    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<h2>Product Links:</h2>";

        while ($row = mysqli_fetch_assoc($result)) {
            $link = $row['link'];
            echo "<a href='$link'>$link</a><br>";
        }
    } else {
        echo "Error fetching data from the database.";
    }

    $query2 = "UPDATE `products` SET `payment`='1' ";
    $result2 = mysqli_query($con, $query2);
    global $con;

    // Get the user's IP address (You may want to use a more secure method for user identification)
    $get_ip_add = getIPAddress();
    $delete_query = "DELETE FROM `cart` WHERE ip_address = '$get_ip_add'";
    $delete_result = mysqli_query($con, $delete_query);
    echo "
    <script>
     alert('Access the product through the link provided below ^^.');
    </script>";
}
    
 else {
    // If the "Confirm Payment" button was not clicked, redirect back to the payment form.
    
    exit();
}


?>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #043927;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            text-align: center;
        }

        .button {
            background-color: #043927;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px;
            text-decoration: none;
        }

        .button:hover {
            background-color: #02641f;
        }
    </style>