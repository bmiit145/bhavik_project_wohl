<?php

require './include/connection.php';
if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];


    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    $update_qty = $conn->query("UPDATE `tbl_cart` SET `quantity`= quantity - 1 WHERE id='$id'");

    if ($update_qty) {
        echo "<script>location.href='cart.php'</script>";
    }
}
