<?php
include 'includes/session_setup.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['beat_id'])) {
    
    $beat_id = filter_input(INPUT_POST, 'beat_id', FILTER_VALIDATE_INT);
    
    if ($beat_id !== false && $beat_id > 0) {

        $key = array_search($beat_id, $_SESSION['cart']);
    
        if ($key !== false) {
            unset($_SESSION['cart'][$key]);
    
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            
            header('Content-Type: application/json');
            echo json_encode([
                'success' => true, 
                'message' => 'Beat removed successfully.',
                'count' => count($_SESSION['cart'])
            ]);
            exit;
        }
    }
}

header('Content-Type: application/json');
http_response_code(400);
echo json_encode([
    'success' => false, 
    'message' => 'Invalid request or Beat ID not found in cart.'
]);
?>