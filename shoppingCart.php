<?php
session_start();

// Define tax rate (e.g., 10%)
$taxRate = 0.10;

// Clear the cart if the "Clear Cart" button is clicked
if (isset($_POST['clear_cart'])) {
    unset($_SESSION['cart']);
    echo "<h1>Your shopping cart has been cleared!</h1>";
}

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<h1>Your shopping cart is empty!</h1>";
} else {
    echo "<h1>Your Shopping Cart</h1>";
    echo "<ul>";
    
    $totalPrice = 0; // Total price without tax
    foreach ($_SESSION['cart'] as $productId => $product) {
        // Ensure the product is an array and contains valid data
        if (is_array($product)) {
            echo "<li>";
            // Display product image, name, price, and quantity
            echo "<img src='" . htmlspecialchars($product['imagepath']) . "' alt='" . htmlspecialchars($product['name']) . "' width='50'>";
            echo "<p>Product: " . htmlspecialchars($product['name']) . "</p>";

            // Remove the dollar sign and convert the price to a float
            $numericPrice = floatval(str_replace('$', '', $product['price']));

            // Display the price with the dollar sign and two decimal places
            echo "<p>Price: $" . number_format($numericPrice, 2) . "</p>"; // Format as float with two decimals

            // Display the quantity
            echo "<p>Quantity: " . (int)$product['quantity'] . "</p>";

            // Calculate the total price for this product
            $totalProductPrice = $numericPrice * (int)$product['quantity'];
            echo "<p>Total: $" . number_format($totalProductPrice, 2) . "</p>"; // Format total price with two decimals
            echo "</li>";

            // Accumulate the total cart price (without tax)
            $totalPrice += $totalProductPrice;
        } else {
            // Handle invalid data in the cart
            echo "<p>Invalid data for product ID: $productId</p>";
        }
    }
    echo "</ul>";

    // Calculate the total price with tax
    $totalPriceWithTax = $totalPrice * (1 + $taxRate);

    // Display the total price of all items in the cart without tax
    echo "<h3>Total Price (without tax): $" . number_format($totalPrice, 2) . "</h3>";

    // Display the total price of all items in the cart with tax
    echo "<h3>Total Price (with tax): $" . number_format($totalPriceWithTax, 2) . "</h3>";
}
?>

<!-- "Clear Cart" Button -->
<form method="POST" action="">
    <button type="submit" name="clear_cart" onclick="return confirm('Are you sure you want to clear the cart?')">Clear Cart</button>
</form>

<!-- Back to shopping link -->
<a href="index.php">Back to Shopping</a>
