<?php include 'navbar.php'; ?>

<!DOCTYPE html>
    <head>
        <title>About Us</title>
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
            $text1 = "Welcome to Team5 Grocery! We are more than just a grocery store. 
                We are a team dedicated to serving our community with fresh, quality food at prices you will love. 
                Founded on the principles of trust, quality, and service, Team5 brings you a convenient and friendly shopping experience, both in-store and online. Thank you for choosing Team5 Grocery. 
                We are excited to be a part of your everyday life and honored to serve you!";
            $email = "test@gmail.com";
            $phone = "+49 00000000";
        ?>

        <div class="about_content">


            <h2>About Us <br></h2>

            <p> <?php echo $text1 ?> </p>

            <p> <b>Email : </b> <?php echo $email ?> </p>
            <p> <b>Phone : </b> <?php echo $phone ?> </p>

            

        </div>
    
    </body>
</html>