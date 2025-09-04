<?php

require './include/connection.php';

if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
    $product_id = intval($_POST['productid']);
    $variant_id = intval($_POST['variant']);
    $quantity = intval($_POST['quantity']);

    // Check existence
    $stmt = $conn->prepare("SELECT id, quantity FROM tbl_cart WHERE user_id = ? AND product_id = ? AND variant_id = ?");
    $stmt->bind_param("iii", $user_id, $product_id, $variant_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        // Update quantity
        $new_qty = $row['quantity'] + $quantity;
        $update = $conn->prepare("UPDATE tbl_cart SET quantity = ? WHERE id = ?");
        $update->bind_param("ii", $new_qty, $row['id']);
        $update->execute();
        echo "Updated cart quantity!";
    } else {
        // Insert new
        $insert = $conn->prepare("INSERT INTO tbl_cart (user_id, product_id, variant_id, quantity) VALUES (?, ?, ?, ?)");
        $insert->bind_param("iiii", $user_id, $product_id, $variant_id, $quantity);
        $insert->execute();
        echo "Added to cart!";
    }
}
else {
    echo '<div class="alert alert-danger alert-dismissible mt-2">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
   <center> <strong>Please Log In to the Website</strong></center>
  </div>';
}
