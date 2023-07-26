<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Arts Website</title>
    <style>
        /* Add your custom styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Styling for header, navigation, etc. */
        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }

        nav {
            display: flex;
            justify-content: center;
            background-color: #444;
            padding: 10px;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        /* Styling for main content sections */
        .section {
            padding: 40px;
            text-align: center;
        }

        .section h2 {
            margin-bottom: 20px;
        }

        /* Styling for artwork and artist cards */
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            max-width: 300px;
        }

        .card img {
            max-width: 100%;
            border-radius: 5px;
        }

        /* Styling for contact form */
        .contact-form {
            max-width: 400px;
            margin: 0 auto;
            text-align: left;
        }

        .contact-form label,
        .contact-form input,
        .contact-form textarea {
            display: block;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
        }

        .contact-form textarea {
            resize: vertical;
            height: 120px;
        }

        .contact-form button {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header>
        <h1>Your Arts Website</h1>
    </header>

    <nav>
        <a href="#featured-artworks">Featured Artworks</a>
        <a href="#artists">Artists</a>
        <a href="#events">Upcoming Events</a>
        <a href="#contact">Contact</a>
    </nav>

    <div class="section" id="featured-artworks">
        <h2>Featured Artworks</h2>
        <div class="card">
            <img src="/arts_images/pexels-steve-johnson-1509534.jpg" alt="Artwork 1">
            <h3>Artwork Title</h3>
            <p>Description of the artwork goes here.</p>
        </div>
        <div class="card">
            <img src="/arts_images/pexels-steve-johnson-1269968.jpg" alt="Artwork 2">
            <h3>Artwork Title</h3>
            <p>Description of the artwork goes here.</p>
        </div>
        <!-- Add more artwork cards as needed -->
    </div>

    <div class="section" id="artists">
        <h2>Featured Artists</h2>
        <div class="card">
            <img src="/arts_images/pexels-daian-gan-102127.jpg" alt="Artist 1">
            <h3>Artist Name</h3>
            <p>Bio of the artist goes here.</p>
        </div>
        <div class="card">
            <img src="/arts_images/pexels-daian-gan-102127.jpg" alt="Artist 2">
            <h3>Artist Name</h3>
            <p>Bio of the artist goes here.</p>
        </div>
        <!-- Add more artist cards as needed -->
    </div>

    <div class="section" id="events">
        <h2>Upcoming Events</h2>
        <div class="card">
            <h3>Event Title</h3>
            <p>Date, Time, and Location of the event.</p>
        </div>
        <div class="card">
            <h3>Event Title</h3>
            <p>Date, Time, and Location of the event.</p>
        </div>
        <!-- Add more event cards as needed -->
    </div>

    <div class="section" id="contact">
        <h2>Contact Us</h2>
        <div class="contact-form">
            <label for="name">Name:</label>
            <input type="text" id="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" required>

            <label for="message">Message:</label>
            <textarea id="message" required></textarea>

            <button type="submit">Send Message</button>
        </div>
    </div>
</body>

</html>