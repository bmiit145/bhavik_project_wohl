<?php

require './include/connection.php';
if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];


    // echo $user_id;



    if (isset($_POST['productid'])) {
        // $user_id = isset( $_SESSION['user_id'] ) ?  $_SESSION['user_id'] : 1;
        if (isset($_SESSION['id'])) {
            $user_id = $_SESSION['id'];
        }



        $pid = $_POST['productid'];

        // echo '<script>alert($pid);</script>';

        $check_prod = "SELECT * FROM tbl_wishlist WHERE product_id = $pid";

        $check_prod_result = mysqli_query($conn, $check_prod);
        if (mysqli_num_rows($check_prod_result) < 1) {
            $wishitem = "INSERT INTO tbl_wishlist (user_id, product_id, added_date) VALUES ('$user_id','$pid',now())";
            $wishitem_row = mysqli_query($conn, $wishitem);

            echo '<div class="alert alert-success alert-dismissible mt-2">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <center>   <strong>Item added to your Wishlist!</strong></center>
                            </div>';
        } else {
            echo '<div class="alert alert-success alert-dismissible mt-2">
                                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                                  <strong>Already added to your Wishlist!</strong>
                                </div>';
        }
        $response = "Product added to Wishlist successfully!";
    } else {
        $response = "Invalid request!";
    }
} else {
    echo '<div class="alert alert-danger alert-dismissible mt-2">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
   <center> <strong>Please Log In to the Website</strong></center>
  </div>';
}
