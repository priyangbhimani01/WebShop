<?php
include 'navbar.php';

// Load the JSON data
$jsonData = file_get_contents('product.json');
$products = json_decode($jsonData, true);

// Start the session to store cart and favorites
session_start();

// Initialize the cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (!isset($_SESSION['favorites'])) {
    $_SESSION['favorites'] = [];
}

// Retrieve the product ID from the query parameter
$productId = isset($_GET['pid']) ? $_GET['pid'] : null;

if ($productId === null) {
    echo "<h1>Product not found</h1>";
    exit;
}

// Find the product that matches the ID
$matchedProduct = null;
foreach ($products['products'] as $product) {
    if ($product['pid'] == $productId) {
        $matchedProduct = $product;
        break;
    }
}

// If product not found, display a message
if ($matchedProduct === null) {
    echo "<h1>Product not found</h1>";
    exit;
}

// Handle adding to cart
if (isset($_POST['addToCart'])) {
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1; // Get quantity input, default to 1

    // Convert price to float for calculations
    $price = floatval(str_replace('$', '', $matchedProduct['price']));
    
    // Check if product is already in the cart
    if (isset($_SESSION['cart'][$productId])) {
        // If the product is already in the cart, increase the quantity
        $_SESSION['cart'][$productId]['quantity'] += $quantity;
    } else {
        // Fetch product from JSON data and add it to the cart
        $_SESSION['cart'][$productId] = [
            'id' => $productId,
            'quantity' => $quantity, // Default quantity is 1
            'name' => $matchedProduct['name'],
            'price' => $price, // Store price as float
            'imagepath' => $matchedProduct['imagepath']
        ];
    }
    // Redirect to shopping cart page
    header("Location: shoppingcart.php");
    exit();
}

// Handle adding to favorites
if (isset($_POST['addToFavorites'])) {
    $price = floatval(str_replace('$', '', $matchedProduct['price'])); // Convert price to float
    $_SESSION['favorites'][$productId] = [
        'id' => $productId,
        'name' => $matchedProduct['name'],
        'price' => $price, // Store price as float
        'imagepath' => $matchedProduct['imagepath']
    ];
    header("Location: product.php?pid=$productId"); // Redirect back to the product page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="mystyle.css" type="text/css">
</head>
<body class="product">
    <header class="product">
        <h1>Product Details</h1>
    </header>

    <div class="product-container">
        <div class="product-item">
            <section class="product-img">
                <!-- Display product image -->
                <img src="<?php echo htmlspecialchars($matchedProduct['imagepath']); ?>" alt="<?php echo htmlspecialchars($matchedProduct['name']); ?>">
            </section>
            <section class="product-info">
                <h2><?php echo htmlspecialchars($matchedProduct['name']); ?></h2>
                <p><strong>Brand:</strong> <?php echo htmlspecialchars($matchedProduct['brand']); ?></p>
                <p><strong>Weight:</strong> <?php echo htmlspecialchars($matchedProduct['weight']); ?></p>
                <p><strong>Price:</strong> $<?php echo number_format(floatval(str_replace('$', '', $matchedProduct['price'])), 2); ?></p>
                <p><strong>Description:</strong> <?php echo htmlspecialchars($matchedProduct['description']); ?></p>
                <p><strong>Ingredients:</strong> <?php echo htmlspecialchars($matchedProduct['Ingredients']); ?></p>
                <p><strong>Allergy Information:</strong> <?php echo htmlspecialchars($matchedProduct['Allergy Information']); ?></p>

                <!-- Add to Cart form with quantity input -->
                <form action="product.php?pid=<?php echo $matchedProduct['pid']; ?>" method="POST">
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" required>
                    <button id="btnAddCart" type="submit" name="addToCart">Add to Cart</button>
                </form>

               
                
            </section>
        </div>
    </div>
</body>
</html>
