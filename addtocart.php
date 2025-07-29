<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Load product data from the JSON file
$jsonData = file_get_contents('products.json');
$products = json_decode($jsonData, true);

// Get product ID from the request
$data = json_decode(file_get_contents('php://input'), true);
$productId = $data['id'];

// Search for the product in the JSON data
$product = null;
foreach ($products as $item) {
    if ($item['pid'] == $productId) {
        $product = $item;
        break;
    }
}

if ($product) {
    // Check if the product is already in the cart
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity'] += 1;
    } else {
        // Add product to cart with a quantity of 1
        $_SESSION['cart'][$productId] = $product;
        $_SESSION['cart'][$productId]['quantity'] = 1;
    }

    // Return cart count
    echo json_encode(['cartCount' => count($_SESSION['cart'])]);
} else {
    echo json_encode(['error' => 'Product not found']);
}
?>
