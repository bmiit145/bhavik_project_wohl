<?php
require '../include/db_conn.php';

if (isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']);

    // Fetch product info
    $stmt = $conn->prepare("SELECT * FROM tbl_products WHERE product_id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $prod_result = $stmt->get_result();
    $product = $prod_result->fetch_assoc();

    // Fetch variants
    $stmt2 = $conn->prepare("SELECT * FROM tbl_product_variant WHERE product_id = ?");
    $stmt2->bind_param("i", $product_id);
    $stmt2->execute();
    $var_result = $stmt2->get_result();
    $variants = [];
    while ($row = $var_result->fetch_assoc()) {
        $variants[] = $row;
    }

    echo json_encode([
        'product' => $product,
        'variants' => $variants
    ]);
}
?>