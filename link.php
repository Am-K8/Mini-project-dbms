
<?php

require('connect.php');
session_start();
include('conn.php');
include('common_function.php');

if (isset($_POST['confirm_button'])) {
    // Query the database to retrieve the "link" column
    $link_query = "SELECT `link` FROM `products`";
    $result = mysqli_query($con, $link_query);

    if ($result) {
        // Fetch and display the "link" column data
        while ($row = mysqli_fetch_assoc($result)) {
            $link = $row['link'];
            echo "<a href='$link'>$link</a><br>";
        }
    } else {
        echo "Error fetching data from the database.";
    }
}

?>







