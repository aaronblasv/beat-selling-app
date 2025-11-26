<?php
include 'includes/session_setup.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['beat_id'])) {
    
    $beat_id = filter_input(INPUT_POST, 'beat_id', FILTER_VALIDATE_INT);
    
    if ($beat_id !== false && $beat_id > 0) {
        
        if (!in_array($beat_id, $_SESSION['cart'])) {
            $_SESSION['cart'][] = $beat_id;
        }
        
        header('Content-Type: application/json');
        echo json_encode([
            'success' => true, 
            'message' => 'Beat added to cart!', 
            'count' => count($_SESSION['cart'])
        ]);
        exit;
        
    }
}

header('Content-Type: application/json');
http_response_code(400);
echo json_encode([
    'success' => false, 
    'message' => 'Invalid request or Beat ID missing.'
]);
?>