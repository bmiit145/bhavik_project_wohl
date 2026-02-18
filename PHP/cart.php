<?php include 'header.php';

// Ensure user is logged in
if (!isset($_SESSION['id'])) {
    echo '<div class="alert alert-danger alert-dismissible mt-2">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <center><strong>Please Log In to the Website</strong></center>
          </div>';
    exit;
}

$uid = $_SESSION['id'];

// Remove cart item on delete
if (isset($_GET['id'])) {
    $cid = intval($_GET['id']);
    $conn->query("DELETE FROM `tbl_cart` WHERE id = $cid AND user_id = $uid");
}

$sql = "SELECT 
            c.id, c.quantity, 
            p.name, p.img1, 
            v.variant_quantity, v.price, v.stock, 
            u.unit_name
        FROM tbl_cart c
        JOIN tbl_products p ON c.product_id = p.product_id
        JOIN tbl_product_variant v ON c.variant_id = v.variant_id
        JOIN tbl_unit u ON v.unit_id = u.unit_id
        WHERE c.user_id = $uid";
$cartproducts = $conn->query($sql);
$grand_total = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wohl Reactions | Premium Skincare & Grooming</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="../css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Ion Icon Fonts-->
    <link rel="stylesheet" href="css/ionicons.min.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!-- Flexslider  -->
    <link rel="stylesheet" href="css/flexslider.css">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <!-- Date Picker -->
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <!-- Flaticons  -->
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class="colorlib-loader"></div>

    <div id="page">
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p class="bread"><span><a href="index.php">Home</a></span> / <span>Cart</span></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row row-pb-lg">
                <div class="col-md-12">
                    <div class="product-name d-flex">
                        <div class="one-fourth text-left px-4"><span>Product Details</span></div>
                        <div class="one-eight text-center"><span>Variant</span></div>
                        <div class="one-eight text-center"><span>Price</span></div>
                        <div class="one-eight text-center"><span>Quantity</span></div>
                        <div class="one-eight text-center"><span>Total</span></div>
                        <div class="one-eight text-center px-4"><span>Remove</span></div>
                    </div>

                    <?php while ($row = $cartproducts->fetch_assoc()): ?>
                        <div class="product-cart d-flex">
                            <div class="one-fourth">
                                <div class="product-img">
                                    <img src="./admin/<?php echo htmlspecialchars($row['img1']); ?>" alt="" width="100px">
                                </div>
                                <div class="display-tc">
                                    <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                                </div>
                            </div>
                            <div class="one-eight text-center">
                                <div class="display-tc">
                                    <span><?php echo $row['variant_quantity'] . ' ' . $row['unit_name']; ?></span>
                                </div>
                            </div>
                            <div class="one-eight text-center">
                                <div class="display-tc">
                                    <span class="price"><?php echo number_format($row['price'], 2); ?></span>
                                </div>
                            </div>
                            <div class="one-eight text-center">
                                <div class="display-tc">
                                    <a href="update_qty_minus.php?id=<?php echo $row['id']; ?>"><button type="button"><i class="icon-minus"></i></button></a>
                                    &nbsp;&nbsp;<?php echo $row['quantity']; ?>&nbsp;&nbsp;
                                    <a href="update_qty_plus.php?id=<?php echo $row['id']; ?>"><button type="button"><i class="icon-plus2"></i></button></a>
                                </div>
                            </div>
                            <?php $subtotal = $row['price'] * $row['quantity']; ?>
                            <div class="one-eight text-center">
                                <div class="display-tc">
                                    <span class="price"><?php echo number_format($subtotal, 2); ?></span>
                                </div>
                            </div>
                            <div class="one-eight text-center">
                                <div class="display-tc">
                                    <a href="cart.php?id=<?php echo $row['id']; ?>" class="closed">X</a>
                                </div>
                            </div>
                        </div>
                        <?php $grand_total += $subtotal; ?>
                    <?php endwhile; ?>
                </div>
            </div>

            <div class="row row-pb-lg">
                <div class="col-md-12">
                    <div class="total-wrap">
                        <div class="row">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6 text-center">
                                <div class="total">
                                    <div class="grand-total">
                                        <p><span><strong>Subtotal :</strong></span> <span><?php echo number_format($grand_total, 2); ?></span></p>
                                    </div>
                                    <hr>
                                    <div class="grand-total">
                                        <p><span><strong>Total Amount:</strong></span> <span><?php echo number_format($grand_total, 2); ?></span></p>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-12 text-center">
                                    <p><a href="index.php" class="btn btn-secondary"><i class="icon-shopping-cart"></i> &nbsp;Continue Purchasing</a></p>
                                </div>
                                <div class="col-md-12 text-center">
                                    <p><a href="check-out.php" class="btn btn-success"><i class="icon-shopping-cart"></i>&nbsp;Proceed To Checkout</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'footer.php'; ?>

        <div class="gototop js-top">
            <a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
        </div>
        <!-- Addd or Minus Cart quantity -->

        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
        <!-- popper -->
        <script src="js/popper.min.js"></script>
        <!-- bootstrap 4.1 -->
        <script src="js/bootstrap.min.js"></script>
        <!-- jQuery easing -->
        <script src="js/jquery.easing.1.3.js"></script>
        <!-- Waypoints -->
        <script src="js/jquery.waypoints.min.js"></script>
        <!-- Flexslider -->
        <script src="js/jquery.flexslider-min.js"></script>
        <!-- Owl carousel -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- Magnific Popup -->
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/magnific-popup-options.js"></script>
        <!-- Date Picker -->
        <script src="js/bootstrap-datepicker.js"></script>
        <!-- Stellar Parallax -->
        <script src="js/jquery.stellar.min.js"></script>
        <!-- Main -->
        <script src="js/main.js"></script>

</body>

</html>