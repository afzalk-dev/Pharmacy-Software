<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// sanitize $_GET variables
$_GET   = filter_input_array(INPUT_GET, 513);        

// sanitize $_POST variables
$_POST  = filter_input_array(INPUT_POST, 513);
    
    session_start();
    include $_SERVER['DOCUMENT_ROOT'] . "constant/connect.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/functions/mlmfunctions.php";
    //include $_SERVER['DOCUMENT_ROOT'] . "/functions/functions.php";
    function testinput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $response = array();

    $query = "SELECT product_id, product_name FROM products";
    $result = mysqli_query($connect, $query);

    if (!$result) {
        $response['error'] = mysqli_error($connect);
    } else {
        while ($row = mysqli_fetch_array($result)) {
            $response['options'][] = array(
                'product_id' => $row['product_id'],
                'product_name' => $row['product_name']
            );
        }
    }

    header('Content-Type: application/json');
    echo json_encode($response);
?>