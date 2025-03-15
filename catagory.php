<?php
// Load the JSON file
$data = json_decode(file_get_contents('product.json'), true);

// Get the category from the URL (either snacks or drinks)
$category = isset($_GET['category']) ? $_GET['category'] : 'Snacks';

// Filter products by category
$filteredProducts = array_filter($data['products'], function($product) use ($category) {
    return strtolower($product['category']) == strtolower($category);
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ucfirst($category); ?></title>
    <link rel="stylesheet" href="mystyle.css" type="text/css">
</head>
<body class="login">

    <div class="navbar">
        <a href="index.php" id="nav_logo" ><b>TEAM5</b></a>
        <a href="registration.php">Register</a>
        <a href="login.php" style="border : 10px ">Login</a>
        <a href="about.php">About Us</a>
        <a href="category.php?category=snacks">Snacks</a>
        <a href="category.php?category=drinks">Drinks</a>
    </div>

    <ul>
        <?php foreach ($filteredProducts as $product): ?>
            <li>
                <h4><?php echo ucfirst($product['subcategory']); ?></h4>
                <div class="categories_product_container">
                    <div id="product<?php echo $product['pid']; ?>">
                        <a href="product.php?pid=<?php echo $product['pid']; ?>">
                            <div class="list_card">
                                <img class="product_card_image" src="<?php echo $product['imagepath']; ?>" width="150px" height="150px" alt="<?php echo $product['name']; ?>">
                                <div class="list_card_text_container">
                                    <div class="list_card_price_text">
                                        <p id="card_price" style="display: inline; font-size: medium;"><?php echo $product['price']; ?></p>
                                        <div class="categories_add_to_list_container">
                                            <p>Add</p>
                                            <a onclick="decrement('product<?php echo $product['pid']; ?>')"><img src="https://icons.iconarchive.com/icons/fa-team/fontawesome/256/FontAwesome-Circle-Minus-icon.png" height="12px" width="12px"></a>
                                            <p id="product<?php echo $product['pid']; ?>count" style="display: inline;">0</p>
                                            <a onclick="increment('product<?php echo $product['pid']; ?>')"><img src="https://icons.iconarchive.com/icons/fa-team/fontawesome/256/FontAwesome-Circle-Plus-icon.png" height="12px" width="12px"></a>
                                        </div>
                                    </div>
                                    <p style="font-weight: bold;"><?php echo $product['name']; ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>
