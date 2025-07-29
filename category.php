<?php
include 'navbar.php';

// Load JSON file and decode it into an associative array
$jsonData = file_get_contents('product.json');
$products = json_decode($jsonData, true);

if (isset($_GET["category"]) ) {
    $cid = $_GET["category"];
    $clist = [];

    // Find the category items 
    foreach ($products['products'] as $item) {

        if ($item['category'] == $cid) {

            // Check if the subcategory exists in $clist, otherwise initialize
            if (!isset($clist[$item['subcategory']])) {
                $clist[$item['subcategory']] = array();
            }
            // Add the item to the appropriate subcategory
            array_push($clist[$item['subcategory']], $item);

        }    
    }

    // Handle category empty
    if (count($clist) === 0) {
        echo "<h1>Category Empty</h1>";
        exit;
    }
} else {
    echo "<h1>Invalid Category Name</h1>";
    exit;
}
?>


<!DOCTYPE html>
    <head>
        <title>Category</title>
        <link rel="stylesheet" href="mystyle.css" type="text/css">
    </head>

    <body class="login">

    
        <ul>

            <?php 
                foreach($clist as $subcategory => $items){
                    echo("<li>");
                    echo "<h4>" . $subcategory . "</h4>";
                    echo(" <div class=\"categories_product_container\">");

                    foreach($items as $item){ ?>

<div id="p<?php echo $item['pid'] ?>">
<a href="product.php?pid=<?php echo $item['pid']; ?>">

                            <div class="list_card">
                                <img class="product_card_image" src="<?php echo $item['imagepath'] ?>"  width="150px" height="150px">
                                <div class="list_card_text_container">
                                    <div class="list_card_price_text">
                                        <p id="card_price" style="display: inline; font-size: medium; "><?php echo $item['price'] ?></p>
                                        <div class="categories_add_to_list_container"> 
                                            <p>Add</p>
                                            <a onclick="decrement('p<?php echo $item['pid'] ?>')"><img src="https://icons.iconarchive.com/icons/fa-team/fontawesome/256/FontAwesome-Circle-Minus-icon.png" height="12px" width="12px"></a>
                                            <p id="p<?php echo $item['pid'] ?>count" style="display: inline;">0</p>
                                            <a onclick="increment('p<?php echo $item['pid'] ?>')"><img src="https://icons.iconarchive.com/icons/fa-team/fontawesome/256/FontAwesome-Circle-Plus-icon.png" height="12px" width="12px"></a>    
                                        </div>
                                    </div>
                                    <p style="font-weight: bold;"><?php echo $item['name'] ?></p>
                                    
                                </div>
                                
                            </div>
                            
                        </a>
                        </div>
                     <?php
                    }
                    echo("</div");
                    echo("</li>");
                    
                }
            
            
            
            ?>




            <li>
                <h4>Favourites</h4>

                <div id="fav" class="categories_product_container">


                   <!-- List added dynamically here -->
                </div>      
                            
                       
            </li>

            <p id="totalPriceOutput" style="font-weight: bold; font-size: 16px; margin-top: 5px;"></p>
            <button onclick="resetFields()" class="shop_btn" >Reset</button>
            
        </ul>
        
       
        

        <script>




            function increment(product){
                var count_id = product +"count";
                var number = parseInt(document.getElementById(count_id).innerHTML);
                document.getElementById(count_id).innerHTML = number+1;
                if(number==0){
                    //not in the list, add new
                    addProductFav(product);
                }else{
                    //update count
                    removeProductFav(product);
                    addProductFav(product);
                }
                calculateTotalPrice();
            }

            function decrement(product){
                var count_id = product +"count";
                var number = parseInt(document.getElementById(count_id).innerHTML);
                if(number==0){
                    //no product to remove
                    return;
                }
                if(number==1){
                    //only one added in list, simply remove
                    removeProductFav(product);
                    document.getElementById(count_id).innerHTML = number-1;
                    return;
                }

                //else remove and add again to update the count
                document.getElementById(count_id).innerHTML = number-1;
                removeProductFav(product);
                addProductFav(product);
                
                calculateTotalPrice();
        
            }

            function removeProductFav(product){
                let fav_div = document.getElementById('fav');
                let item = fav_div.querySelector('#'+product);
                fav_div.removeChild(item);
            }

            function addProductFav(product){
                let fav_div = document.getElementById('fav');
                const item = document.getElementById(product).cloneNode(true);
                fav_div.appendChild(item);
            }


            function nightMode(){
                document.getElementById('img_day').style.display = 'none';
                document.getElementById('img_dark').style.display = 'block';

                const root = document.querySelector(':root');
                root.style.setProperty('--c1', '#0E0B16');
                root.style.setProperty('--c4', '#E7DFDD');
                root.style.setProperty('--c5white', 'white');
                root.style.setProperty('--c6black', 'black');
                root.style.setProperty('--c3', '#4717F6');
                root.style.setProperty('--c2', '#A239CA');

            


            }

            function dayMode(){
                document.getElementById('img_dark').style.display = 'none';
                document.getElementById('img_day').style.display = 'block';

                const root = document.querySelector(':root');
                root.style.setProperty('--c1', 'white');
                root.style.setProperty('--c4', '#efefef');
                root.style.setProperty('--c5white', 'black');
                root.style.setProperty('--c6black', 'white');
                root.style.setProperty('--c3', '#caebf2');
                root.style.setProperty('--c2', '#caebf2');

           }


           function calculateTotalPrice() {
                let fav_div = document.getElementById('fav');
                let items = fav_div.querySelectorAll('.list_card'); 
                let total = 0;

                items.forEach(item => {
                let countId = item.parentElement.id + "count"; 
                let count = parseInt(document.getElementById(countId).innerHTML);
                let priceText = item.querySelector('#card_price').innerHTML; 
                let price = parseFloat(priceText.replace('$', '').replace(',', '.')); 
                total += count * price; 
                });

                const taxRate = 0.19; 
                let totalWithTax = total + (total * taxRate);

                // Display the total price
                document.getElementById('totalPriceOutput').innerHTML = `
                    Total Price without tax: $${total.toFixed(2)} <br>
                    Total Price with tax: $${totalWithTax.toFixed(2)}
                `;

                return totalWithTax;
            }




            function resetFields() {
                const favDiv = document.getElementById("fav");
                let items = favDiv.querySelectorAll('.list_card'); 


                // Changing quantity back to zero

                items.forEach(item => {
                    let countId = item.parentElement.id + "count"; 
                    document.getElementById(countId).innerHTML = '0';
                });
                
                // Clear all items in the favourites section
                document.getElementById("fav").innerHTML = "";

                const priceOutput = document.getElementById("totalPriceOutput");
                priceOutput.innerHTML = "No items in list";

                // Optionally, show a notification to the user
                alert("Favourites and total price have been reset.");
            }

            
        </script>
    </body>
</html>


