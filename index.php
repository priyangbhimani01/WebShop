<?php include 'navbar.php'; ?>
<!DOCTYPE html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="mystyle.css" type="text/css">

        <script>
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

                document.body.style.setProperty('background-image', "url('https://img.freepik.com/premium-photo/grocery-store-with-shelves-vegetables-berries-generative-ai_438099-16120.jpg')");
           


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

                document.body.style.setProperty('background-image', "url('https://t3.ftcdn.net/jpg/03/11/27/96/360_F_311279691_wfNvKEXKX3cyYFsZ7OttC2C5xkf8Y2BL.jpg')");
            }
        </script>
    </head>

    <body class="withbg">
        <?php
        $text1 = "Your one-stop online shop. From fresh produce and household staples to cooking essentials, 
                    we're the service that always delivers. To your door, and within minutes.Shop now";
        ?>
        
        <div class="main_body">

            <div class="text_heading">
                <h2>
                    Groceries <br>delivered<br>in minutes
                </h2>
            </div>
            <div class="text_desc">
                <h2>
                    <?php echo $text1 ?>
                </h2>
            </div>

            <a href="category.php?category=Snacks" style="text-decoration: none;">
                <div class="shop_btn">
                    Shop
                </div>
            </a>

        </div>

        </table>
    </body>
</html>