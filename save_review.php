<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];

    // Establish a database connection
    $conn = mysqli_connect("localhost", "root", "", "product_reviews");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Insert the review into the database
    $sql = "INSERT INTO reviews (name, rating, review) VALUES ('$name', $rating, '$review')";

    if (mysqli_query($conn, $sql)) {
     echo "
     <script>
      alert('Thank you for review!');
      window.open('index.php', '_self')
   
     </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
