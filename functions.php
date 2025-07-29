<?php
if(isset($_POST['action'])) {
    $action = $_POST['action'];

    // Order state update
    if ($action == 'new') {
        $orderId = $_POST['order'];
        $orders = json_decode(file_get_contents('orders.json'), true);
        
        foreach($orders as &$order) {
            if ($order['orderid'] == $orderId) {
                $order['state'] = 'processing';
                break;
            }
        }

        // Save updated orders
        file_put_contents('orders.json', json_encode($orders, JSON_PRETTY_PRINT));
        echo "Order " . $orderId . " is now in processing.";
    }
    
    if ($action == 'reject') {
        $orderId = $_POST['order'];
        $orders = json_decode(file_get_contents('orders.json'), true);
        
        foreach($orders as &$order) {
            if ($order['orderid'] == $orderId) {
                $order['state'] = 'rejected';
                $order['rejected_reason'] = "Not processed due to some reason"; // Example reason
                break;
            }
        }

        // Save updated orders
        file_put_contents('orders.json', json_encode($orders, JSON_PRETTY_PRINT));
        echo "Order " . $orderId . " has been rejected.";
    }

    if ($action == 'process') {
        $orderId = $_POST['order'];
        $orders = json_decode(file_get_contents('orders.json'), true);
        
        foreach($orders as &$order) {
            if ($order['orderid'] == $orderId) {
                $order['state'] = 'finish';
                break;
            }
        }

        // Save updated orders
        file_put_contents('orders.json', json_encode($orders, JSON_PRETTY_PRINT));
        echo "Order " . $orderId . " has been finished.";
    }

    // Block/Unblock user
    if ($action == 'block') {
        $userId = $_POST['user'];
        $users = json_decode(file_get_contents('users.json'), true);

        foreach($users as &$user) {
            if ($user['userid'] == $userId) {
                $user['status'] = 'block';
                break;
            }
        }

        // Save updated users
        file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));
        echo "User " . $userId . " has been blocked.";
    }

    if ($action == 'unblock') {
        $userId = $_POST['user'];
        $users = json_decode(file_get_contents('users.json'), true);

        foreach($users as &$user) {
            if ($user['userid'] == $userId) {
                $user['status'] = 'active';
                break;
            }
        }

        // Save updated users
        file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));
        echo "User " . $userId . " has been unblocked.";
    }
}
?>
