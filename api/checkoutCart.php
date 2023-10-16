<?php
session_start();

include '../includes/dbConnection.php';

$db = new DbConnect();

$con = $db->connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user_id and total from the form's input fields
    $user_id = $_POST['user_id'];
    $total = $_POST['total'];
    $name = $_POST['name'];

    if ($total > 0) {
        // Fetch the cart details for the given user_id
        $sql = "SELECT * FROM cart WHERE user_id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $cartItems = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        $cartQty = count($cartItems);

        // Create a new order record in the orders table
        $sql = "INSERT INTO orders(`user_id`, `name`, `quantity`, `paid_amount`) VALUES (?, ?,?,?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("isii", $user_id, $name, $cartQty, $total);
        $stmt->execute();
        $order_id = $con->insert_id; // get the order id

        // Using the order id, save cart details into the order_items table
        foreach ($cartItems as $item) {
            $sql = "INSERT INTO order_items(order_id, vehicle_id, quantity, amount) VALUES (?, ?, ?, ?)";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("iiid", $order_id, $item['vehicle_id'], $item['quantity'], $item['total_price']);
            $stmt->execute();
        }

        // Clear the cart for the given user_id
        $sql = "DELETE FROM cart WHERE user_id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        $_SESSION['success'] = "Order placed successfully. Thank you for choosing Elite Auto Enclave";
    } else {
        $_SESSION['error'] = "Something went wrong, At least add an item in you cart";
    }

    // Maybe redirect the user to a thank you page or display a success message
    header("Location: ../home/cart.php");
}
?>