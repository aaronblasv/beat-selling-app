<?php
include 'includes/session_setup.php';
// 1. Load the database connection
include 'includes/config.php';

// 2. Fetch all beats from the 'beats' table
try {
    // Ordenar por ID de forma descendente (los últimos añadidos primero)
    $stmt = $pdo->query('SELECT id, titulo, genero, bpm, precio, url_muestra FROM beats ORDER BY id DESC'); 
    $beats = $stmt->fetchAll();
} catch (PDOException $e) {
    $error_message = "Error fetching beats: " . $e->getMessage();
    $beats = []; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beat Catalogue | Aaron's Store</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include 'includes/header.php'; ?>
    <main class="catalogue-container">

        <h2>Available Beats</h2>

        <?php if (isset($error_message)): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error_message); ?></p>
        <?php elseif (empty($beats)): ?>
            <p>No beats available yet. Check back soon!</p>
        <?php else: ?>
            
            <div class="beats-grid">
                <?php
                $playCounter=0;
                foreach ($beats as $beat):
                    $playCounter++;
                    $playID="playN".$playCounter;
                     ?>
                    
                    <div class="beat-card" id="beat-<?php echo $beat['id']; ?>">
                        <h3><?php echo htmlspecialchars($beat['titulo']); ?></h3>
                        
                        <div class="beat-details">
                            <p><strong>Genre:</strong> <?php echo htmlspecialchars($beat['genero']); ?></p>
                            <p><strong>BPM:</strong> <?php echo $beat['bpm']; ?></p>
                            <p class="price">$<?php echo number_format($beat['precio'], 2); ?></p>
                        </div>
                        <div id="wave-<?php echo $playID ?>" class="waveform" data-src="<?php echo htmlspecialchars($beat['url_muestra']); ?>"></div>




                        
                        <!-- <audio id="<?php echo $playID ?>" controls preload="none" class="beat-player">
                            <source src="<?php echo htmlspecialchars($beat['url_muestra']); ?>" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio> -->
                        
                        <button class="playButton" data-audio-id="<?php echo $playID ?>">
                            <img src="assets/img/play.png" alt="PLAY">
                        </button>

                        
                        <button class="add-to-cart-btn" data-beat-id="<?php echo $beat['id']; ?>">
                            Add to Cart
                        </button>
                    </div>
                <?php endforeach; ?>
            </div>

        <?php endif; ?>

    </main>

    <footer>
        </footer>
    
  <script type="module" src="assets/js/main.js"></script>
   
</body>
</html>