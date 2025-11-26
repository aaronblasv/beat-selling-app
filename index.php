<?php

include 'includes/config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prodyoVny | Official Website</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="hero-section">
        <h1>Unleash Your Sound.</h1>
        <p>Exclusive, high-quality beats for your next project. Crafted by Aaron Blas.</p>
        
        <a href="catalogo.php" class="cta-button">
            Listen & Purchase Beats 🎧
        </a>
    </header>

    <main>
        <section id="featured-beats">
            <h2>Featured Beats</h2>
            <p>Ready to find your next hit? Check out our top three tracks:</p>
            <a href="catalogo.php" class="secondary-cta">View All 30+ Beats</a>
        </section>

        <section id="licensing-info">
            <h2>Licensing Made Simple</h2>
            <p>Affordable options: Basic (MP3), Premium (WAV/MP3), and Exclusive rights. Find the license that fits your budget and needs.</p>
        </section>

        <section id="contact">
            <h2>Got a Custom Project?</h2>
            <p>We are available for custom production and mixing services.</p>
            <a href="#" class="secondary-cta">Get in Touch</a>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> prodyoVny's Beat Store. All Rights Reserved.</p>
        </footer>

</body>
</html>