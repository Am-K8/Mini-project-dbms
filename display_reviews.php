
<!DOCTYPE html>
<html lang="en">
<head>
    
<style>
 body {
  background-color: #000000;
  font-family: Arial, sans-serif;
}

/* Review Container */
.review-container {
  background-color: #fff;
  border: 2px solid #ffca18;
  border-radius: 10px;
  padding: 20px;
  margin: 20px auto;
  width: 80%;
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
}

/* Review Title */
.review-title {
  font-size: 24px;
  font-weight: bold;
  color: #ffca18;
  margin-bottom: 10px;
}

/* Review Information */
.review-info {
  font-size: 16px;
  color: #333;
}

/* Review Name */
.review-name {
  font-weight: bold;
}

/* Review Rating */
.review-rating {
  color: #ffca18;
}

/* Review Text */
.review-text {
  font-size: 18px;
  color: #333;
  margin: 10px 0;
}

/* Footer */
.footer {
  background-color: #000000;
  text-align: center;
  color: #fff;
  font-size: 14px;
    padding: 10px 0; /* Add some vertical padding */
    font-size: 14px;
    width: 100%; /* Make the width 100% of the viewport */
    /* Keep the footer fixed at the bottom */
    bottom: 0;
}

</style>
</head>
<body>
    <div class="review-container">
        <p class="review-title">Product Reviews</p>
        <?php
// Establish a database connection
$conn = mysqli_connect("localhost", "root", "", "product_reviews");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve reviews from the database
$sql = "SELECT * FROM reviews";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<strong>Name:</strong> " . $row['name'] . "<br>";
        echo "<strong>Rating:</strong> " . $row['rating'] . " stars<br>";
        echo "<strong>Review:</strong> " . $row['review'] . "<br><br>";
    }
} else {
    echo "No reviews yet.";
}

mysqli_close($conn);
?>
    </div>

    <div class="footer">
    <p>&copy; 2023 Tech Clover. All rights reserved.</p>
    </div>
</body>
</html>





