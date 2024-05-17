

<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="css\clover.png">
    <style>
     body {
    font-family: Arial, sans-serif;
    text-align: center;
}

.review-form {
    background-color: #aef;
    padding: 20px;
    border: 1px solid #000000;
    margin: 20px auto;
    max-width: 1000px;
    border-radius: 7px;
}

input, select, textarea {
    width: 100%;
    padding: 10px;
    margin: 40px 0;
}

button {
    background-color:  #000000;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.reviews {
    max-width: 400px;
    margin: 20px auto;
    text-align: left;
}

.review {
    border: 1px solid #000000;
    padding: 10px;
    margin: 10px 0;
}
    </style>
</head>
<body>
<h1 style="color: lightgray;">Product Review</h1>

    <div class="review-form">
        <form action="save_review.php" method="post">
            <input type="text" name="name" placeholder="Product Name" required>
            <select name="rating">
                <option value="5">5 Stars</option>
                <option value="4">4 Stars</option>
                <option value="3">3 Stars</option>
                <option value="2">2 Stars</option>
                <option value="1">1 Star</option>
            </select>
            <textarea name="review" placeholder="Write your review..." required></textarea>
            <button type="submit">Submit Review</button>
        </form>
    </div>
    <div class="reviews">
      
        <?php include("display_reviews.php"); ?>
    </div>


    <script>
    
    document.addEventListener('DOMContentLoaded', function() {
    const submitButton = document.getElementById('submit-button');
    const reviewsContainer = document.getElementById('reviews');

    submitButton.addEventListener('click', function() {
        const name = document.getElementById('name').value;
        const rating = document.getElementById('rating').value;
        const reviewText = document.getElementById('review').value;

        if (name && rating && reviewText) {
            // Create a new review element
            const reviewElement = document.createElement('div');
            reviewElement.className = 'review';
            reviewElement.innerHTML = `
                <strong>${name}</strong> gave it ${rating} stars:<br>
                ${reviewText}
            `;

            // Append the review to the reviews container
            reviewsContainer.appendChild(reviewElement);

            // Clear the input fields
            document.getElementById('name').value = '';
            document.getElementById('rating').value = '5';
            document.getElementById('review').value = '';
        } else {
            alert('Please fill out all fields before submitting your review.');
        }
    });
});
</script>


</body>
</html>