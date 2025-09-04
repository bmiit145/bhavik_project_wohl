<?php
session_start();
require './include/db_conn.php';

// Only process if the handler sends Razorpay payment ID (payment done)
if (
    isset($_POST['pay_id'], $_POST['fname'], $_POST['lname'], $_POST['email'],
        $_POST['contact'], $_POST['address'], $_POST['amount'])
) {
    if (!isset($_SESSION['id'])) {
        echo json_encode(['success'=>false, 'msg'=>'User not logged in']);
        exit;
    }
    $user_id = $_SESSION['id'];
    $pay_id = $_POST['pay_id'];
    $amount = $_POST['amount'];
    $status = "paid";
    $payer_email = $_POST['email'];
    $contact_no = $_POST['contact'];
    $address = $_POST['address'];

    // Generate unique order_number here
    $order_number = "ORD" . time() . rand(1000,9999);

    // Insert order
    $stmt = $conn->prepare("INSERT INTO tbl_order
        (`user_id`, `order_number`, `amount`, `transaction_id`, `payer_email`, `contact_no`, `address`, `payment_date`, `status`)
        VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), ?)");
    $stmt->bind_param("isdsssss", $user_id, $order_number, $amount, $pay_id, $payer_email, $contact_no, $address, $status);
    $stmt->execute();
    $order_id = $stmt->insert_id;

    // Insert items from tbl_cart to tbl_order_items (same as before)
    $cart_query = $conn->prepare("SELECT product_id, variant_id, quantity FROM tbl_cart WHERE user_id = ?");
    $cart_query->bind_param("i", $user_id);
    $cart_query->execute();
    $cart_result = $cart_query->get_result();
    while ($row = $cart_result->fetch_assoc()) {
        $variant_sql = $conn->prepare("SELECT variant_quantity, unit_id, price FROM tbl_product_variant WHERE variant_id = ?");
        $variant_sql->bind_param("i", $row['variant_id']);
        $variant_sql->execute();
        $variant_data = $variant_sql->get_result()->fetch_assoc();
        $order_item_stmt = $conn->prepare("INSERT INTO tbl_order_items
            (order_id, product_id, variant_quantity, variant_unit_id, price, quantity)
            VALUES (?, ?, ?, ?, ?, ?)");
        $order_item_stmt->bind_param("iididi", $order_id, $row['product_id'],
            $variant_data['variant_quantity'], $variant_data['unit_id'], $variant_data['price'], $row['quantity']
        );
        $order_item_stmt->execute();
        $order_item_stmt->close();
    }
    // Clear cart
    $del_cart = $conn->prepare("DELETE FROM tbl_cart WHERE user_id = ?");
    $del_cart->bind_param("i", $user_id);
    $del_cart->execute();

    // Return success with order_id for invoice
    echo json_encode(['success'=>true, 'order_id'=>$order_id]);
} else {
    echo json_encode(['success'=>false, 'msg'=>'Invalid parameters']);
}
?>