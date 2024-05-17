<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="icon" href="css\clover.png">

    <!-- Add Leaflet CSS and JavaScript from a CDN -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <!-- Add Leaflet plugins for additional features -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-fullscreen@1.6.2/dist/leaflet.fullscreen.css" />
    <script src="https://unpkg.com/leaflet-fullscreen@1.6.2/dist/Leaflet.fullscreen.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>

    <style>
        /* Style for the map container */
        #map {
            width: 100%;
            height: 400px;
        }
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    color: #333;
    margin: 0;
    padding: 0;
}

/* Style the header section */
header {
    background-color: #76D275; /* A greenish color */
    color: #fff; /* White text */
    text-align: center;
    padding: 30px 0;
    font-size: 24px;
}

/* Style the main content section */
main {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0px 0px 5px #888888;
    border-radius: 5px;
}

/* Style section headings */
h2 {
    color: #333; /* Dark gray */
    text-align:center;
}

/* Style paragraph text */
p {
    line-height: 1.5;
}

/* Style footer section */
footer {
    background-color: #333; /* Dark gray */
    color: #fff;
    text-align: center;
    padding: 10px 0;
}

/* Hyperlink styles */
a {
    color: #76D275; /* Green */
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

/* Header styles */
header {
    background-color: #76D275;
    color: white;
    text-align: center;
    padding: 10px 0;
}

header h1 {
    font-size: 24px;
    font-weight: bold;
}

/* Navigation styles */
nav {
    background-color: #76D275;
    text-align: center;
    padding: 10px 0;
}

nav a {
    color: white;
    text-decoration: none;
    margin: 0 10px;
    font-weight: bold;
}

/* Main content styles */
main {
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    background-color: white;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

section {
    margin-bottom: 20px;
    padding: 20px;
    border: 1px solid #e6e6e6;
    background-color: #fff;
}

h2 {
    font-size: 20px;
    margin-bottom: 10px;
}

/* Map styles */
#map {
    width: 100%;
    height: 400px;
}

/* Footer styles */
.footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 10px 0;
}

/* Responsive styles (adjust as needed) */
@media (max-width: 768px) {
    main {
        padding: 10px;
    }
}
    </style>
</head>
<body>
    <header>
    <h1>About Tech Clover</h1>
    </header>
    <main>
        <section>
            <h2>Our Head Office</h2>
            <div id="map"></div>
        </section>
        
        <section>
            <h2>Our Story</h2>
            <p>Welcome to Tech Clover, your one-stop destination for all things technology and gadgets. We are a passionate team of tech enthusiasts who love exploring the latest trends, innovations, and products in the tech world. Our journey began with a shared fascination for how technology is shaping our lives, and we wanted to share our insights and discoveries with the world.</p>
            <p>From in-depth product reviews and tutorials to expert guides and the latest tech news, Tech Clover is committed to providing you with the knowledge and information you need to make informed decisions about your tech purchases.</p>
            <p>We believe that technology should be accessible and understandable to everyone. That's why we strive to simplify complex topics and make them accessible to tech enthusiasts of all levels, from beginners to experts.</p>
        </section>
        <section>
            <h2>Our Mission</h2>
            <p>Our mission at Tech Clover is to inspire and empower individuals to embrace and make the most of technology in their daily lives. We aim to demystify tech jargon, help you choose the right products, and guide you on how to use them effectively.</p>
            <p>We are committed to providing unbiased and accurate information. We do not endorse or promote any specific brand or product; our goal is to help you find what suits your unique needs and preferences.</p>
        </section>
        <section>
            <h2>Contact Us</h2>
            <p>If you have any questions, feedback, or suggestions, we'd love to hear from you. Feel free to reach out to our team by contacting us at <a href="mailto:contact@techclover.com">contact@techclover.com</a>.</p>
        </section>
           
        </section>
    </main>

    <script>
        var map = L.map('map').setView([15.4286, 73.9829], 13); // Set the coordinates for "GEC, Goa" and zoom level

        // Add a tile layer from a provider like OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        // Add a marker at the "GEC, Goa" location with a popup
        var marker = L.marker([15.4286, 73.9829]).addTo(map);
        marker.bindPopup("GEC, Goa").openPopup();

        // Draw a polygon and a polyline to highlight areas and routes
        var polygon = L.polygon([
            [15.4286, 73.9829],
            [15.4296, 73.9839],
            [15.4289, 73.9848]
        ]).addTo(map);

        var polyline = L.polyline([
            [15.4286, 73.9829],
            [15.4296, 73.9839],
            [15.4289, 73.9848]
        ]).addTo(map);

        
    </script>
    <br><br>

    <footer>
        <p>&copy; 2023 Tech Clover. All rights reserved.</p>
    </footer>
  
</body>
</html>