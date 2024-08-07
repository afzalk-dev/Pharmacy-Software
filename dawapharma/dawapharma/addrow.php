<?php
require_once 'constant/pdo.php';
if (isset($_GET['action'])) {

    switch ($_GET['action']) {
        case 'getMedicineOptions':
            // Connect to database and retrieve medicine options
            // $pdo (assuming prepared statement connection)
            $stmt = $pdo->prepare("SELECT product_id, product_name FROM product");
            $stmt->execute();
            $options = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Return options as JSON
            echo json_encode($options);
            break;
        default:
            // Handle other actions if needed
            break;
    }
}
?>
