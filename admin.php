<?php include 'navbar.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="mystyle.css" type="text/css">
    <link rel="stylesheet" href="table.css" type="text/css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <title>Admin</title>
    <script src="product.js"></script>
</head>
<body class="login">

    <?php 
        $data = file_get_contents('orders.json');
        $orders = json_decode($data, true);
    ?>

    <h1 style="margin:10px">Orders</h1>

    <ul>
        <li>
             <h4>New</h4> 
             <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Produuct ID</th>
                        <th>User ID</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 


                        foreach($orders as $item){ 
                            if($item['state'] == "new"){

                                echo "<tr>";
                                echo "<td>" . $item['orderid'] . "</td>";
                                echo "<td>" . $item['productid'] . "</td>";
                                echo "<td>" . $item['userid'] . "</td>";
                                echo "<td>" . $item['total'] . "</td>";
                                echo "<td>" . $item['method'] . "</td>";
                                echo "<td>" . $item['address'] . "</td>";
                                echo "<td> <img src=\"https://www.iconarchive.com/download/i103471/paomedia/small-n-flat/sign-check.1024.png\" widht=\"30 \" height=\"30 \" onclick=\"newaccept(" . $item['orderid'] . ")\"/>  <img src=\"https://cdn-icons-png.flaticon.com/512/9759/9759080.png\" widht=\"30 \" height=\"30 \" onclick=\"newreject(" . $item['orderid'] . ")\"/> </td>";
                                echo "</tr>";
                            }


                        } 
                    ?>
                    

                </tbody>

             </table>
        </li>

        <li>
             <h4>In Process</h4> 

             <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Produuct ID</th>
                        <th>User ID</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th>Address</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 


                        foreach($orders as $item){ 
                            if($item['state'] == "processing"){

                                echo "<tr>";
                                echo "<td>" . $item['orderid'] . "</td>";
                                echo "<td>" . $item['productid'] . "</td>";
                                echo "<td>" . $item['userid'] . "</td>";
                                echo "<td>" . $item['total'] . "</td>";
                                echo "<td>" . $item['method'] . "</td>";
                                echo "<td>" . $item['address'] . "</td>";
                                echo "<td> <img src=\"https://www.iconarchive.com/download/i103471/paomedia/small-n-flat/sign-check.1024.png\" widht=\"30 \" height=\"30 \" onclick=\"processaccept(" . $item['orderid'] . ")\"/> </td>";
                                echo "</tr>";
                            }


                        } 
                    ?>
                    

                </tbody>

             </table>
        </li>

        <li>
             <h4>Rejected</h4> 

             <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Produuct ID</th>
                        <th>User ID</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th>Address</th>
                        <th>Reason</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 


                        foreach($orders as $item){ 
                            if($item['state'] == "rejected"){

                                echo "<tr>";
                                echo "<td>" . $item['orderid'] . "</td>";
                                echo "<td>" . $item['productid'] . "</td>";
                                echo "<td>" . $item['userid'] . "</td>";
                                echo "<td>" . $item['total'] . "</td>";
                                echo "<td>" . $item['method'] . "</td>";
                                echo "<td>" . $item['address'] . "</td>";
                                echo "<td>" . $item['rejected_reason'] . "</td>";
                                echo "</tr>";
                            }


                        } 
                    ?>
                    

                </tbody>

             </table>
        </li>

        <li>
             <h4>Finished</h4> 

             <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Produuct ID</th>
                        <th>User ID</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 


                        foreach($orders as $item){ 
                            if($item['state'] == "finish"){

                                echo "<tr>";
                                echo "<td>" . $item['orderid'] . "</td>";
                                echo "<td>" . $item['productid'] . "</td>";
                                echo "<td>" . $item['userid'] . "</td>";
                                echo "<td>" . $item['total'] . "</td>";
                                echo "<td>" . $item['method'] . "</td>";
                                echo "<td>" . $item['address'] . "</td>";
                                echo "</tr>";
                            }


                        } 
                    ?>
                    

                </tbody>

             </table>
        </li>

    </ul>

   <h1 style="margin:10px;">Users </h1>


    <div style="margin:50px">

        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Block/Unblock</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $user_data = file_get_contents('users.json');
                    $users = json_decode($user_data, true);
                    foreach($users as $item){ 
                            echo "<tr>";
                            echo "<td>" . $item['userid'] . "</td>";
                            echo "<td>" . $item['username'] . "</td>";
                            echo "<td>" . $item['password'] . "</td>";
                            echo "<td>" . $item['role'] . "</td>";
                            if($item['status'] == "active"){
                                echo "<td> <img src=\"https://cdn4.iconfinder.com/data/icons/basic-ui-roundcon-vol-2-line-color/64/blocked-2-512.png\" widht=\"30 \" height=\"30 \" onclick=\"blockuser(" . $item['userid'] . ")\"/> </td>";
                            }elseif($item['status'] == "block"){
                                echo "<td> <img src=\"https://www.iconarchive.com/download/i103471/paomedia/small-n-flat/sign-check.1024.png\" widht=\"30 \" height=\"30 \" onclick=\"unblockuser(" . $item['userid'] . ")\"/> </td>";
                            }
                            echo "</tr>";

                    } 
                ?>
                        

                    </tbody>

        </table>
    </div>




    <script>
        function newaccept(oid) {
            
            $.ajax({
                type: "POST",
                url: 'functions.php',
                data: {
                    action:'new',
                    order:oid
                },
                success:function(data) {
                    alert(data);
                    console.log("The ajax request succeeded!");
                    console.log("The result is: ");
                    console.dir(data);
                }
            });
            location.reload();
        }

        function newreject(oid){
            $.ajax({
                type: "POST",
                url: 'functions.php',
                data: {
                    action:'reject',
                    order:oid
                },
                success:function(data) {
                    alert(data);
                    console.log("The ajax request succeeded!");
                    console.log("The result is: ");
                    console.dir(data);
                }
            });
            location.reload();
        }

        function processaccept(oid){
            $.ajax({
                type: "POST",
                url: 'functions.php',
                data: {
                    action:'process',
                    order:oid
                },
                success:function(data) {
                    alert(data);
                    console.log("The ajax request succeeded!");
                    console.log("The result is: ");
                    console.dir(data);
                }
            });
            location.reload();
        }

        function blockuser(uid){
            $.ajax({
                type: "POST",
                url: 'functions.php',
                data: {
                    action:'block',
                    user:uid
                },
                success:function(data) {
                    alert(data);
                    console.log("The ajax request succeeded!");
                    console.log("The result is: ");
                    console.dir(data);
                }
            });
            location.reload();
        }

        function unblockuser(uid){
            $.ajax({
                type: "POST",
                url: 'functions.php',
                data: {
                    action:'unblock',
                    user:uid
                },
                success:function(data) {
                    alert(data);
                    console.log("The ajax request succeeded!");
                    console.log("The result is: ");
                    console.dir(data);
                }
            });
            location.reload();
        }



    </script>


    
</body>
</html>