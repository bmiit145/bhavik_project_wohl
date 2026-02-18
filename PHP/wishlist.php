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
        <?php include 'header.php'; ?>
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p class="bread"><span><a href="index.php">Home</a></span> / <span>Wishlist</span></p>
                    </div>
                </div>
            </div>
        </div>


        <div class="colorlib-product">
            <div class="container">
                <div class="row row-pb-lg">
                    <div class="col-md-12">
                        <div class="product-name d-flex">
                            <div class="one-forth text-left px-4">
                                <?php
                                // $user_id = $_SESSION['id'];
                                // echo $user_id;
                                ?>
                                <span>Product Details</span>
                            </div>
                            <div class="one-eight text-center">
                                <span>Brand</span>
                            </div>

                            <div class="one-eight text-center">
                                <span></span>
                            </div>

                            <div class="one-eight text-center">
                                <span>Remove</span>
                            </div>
                            <div class="one-eight text-center px-4">
                                <span></span>
                            </div>
                        </div>


                        <?php
                        if (isset($_SESSION['email'])) {
                            $email = $_SESSION['email'];
                            if (isset($_SESSION['id'])) {
                                $id = $_SESSION['id'];
                            }

                            if (isset($_GET['id'])) {
                                $cid = $_GET['id'];
                                $delete = $conn->query("DELETE  FROM `tbl_wishlist` where id=$cid");
                            }


                            // if (isset($_SESSION['id'])) {
                            // $id = $_SESSION['id'];
                            // }

                            // if (isset($_GET['id'])) {
                            // $cid = $_GET['id'];
                            // $delete = $conn->query("DELETE FROM `tbl_cart_item` where id=$cid");
                            // }

                            $cartproducts = $conn->query("SELECT tbl_wishlist.id, tbl_products.name,tbl_products.brandid, tbl_products.description,tbl_products.img1 FROM tbl_wishlist inner join tbl_products on tbl_products.product_id = tbl_wishlist.product_id where user_id=$id");
                            $grand_total = 0;

                        ?>
                            <?php
                            while ($row = $cartproducts->fetch_assoc()) :
                            ?>
                                <div class="product-cart d-flex">

                                    <div class="one-forth">
                                        <div class="product-img">
                                            <img src="./admin/<?php echo $row['img1'] ?>" alt="" width="100px">
                                        </div>
                                        <div class="display-tc">
                                            <h3><?php echo $row['name'];
                                                ?></h3>
                                        </div>
                                    </div>
                                    <?php

                                    $bid = $row['brandid'];
                                    $brand_name = "SELECT * FROM tbl_brand WHERE id = $bid";
                                    $bname_result = $conn->query($brand_name);
                                    if (mysqli_num_rows($bname_result) > 0) {
                                        $bname_row = mysqli_fetch_array($bname_result);
                                        $bname = $bname_row["brand_name"];
                                    }
                                    ?>

                                    <div class="one-eight text-center">
                                        <div class="display-tc">
                                            <span class="price"><?php echo $bname;
                                                                ?></span>
                                        </div>
                                    </div>


                                    <div class="one-eight text-center">
                                        <div class="display-tc">
                                            <span class="price"></span>
                                        </div>
                                    </div>
                                    <div class="one-eight text-center">
                                        <div class="display-tc">
                                            <a href="wishlist.php?id=<?php echo $row['id'] ?>" class="closed"></a>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile; ?>
                    </div>
                </div>



                <?php include 'footer.php'; ?>
            </div>

            <div class="gototop js-top">
                <a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
            </div>
            <!-- Addd or Minus Cart quantity -->
            <script>
                $(document).ready(function() {
                    $('.qty-plus, .qty-minus').on('click', function() {
                        var productId = $(this).data('product-id');
                        var action = $(this).hasClass('qty-plus') ? 'add' : 'remove';
                        var quantityInput = $('#qty' + productId);

                        if (action === 'add') {
                            quantityInput.val(parseInt(quantityInput.val()) + 1);


                        } else {
                            var newQuantity = parseInt(quantityInput.val()) - 1;
                            quantityInput.val(Math.max(newQuantity, 1));
                        }

                        // Call the updateCart function here to update the cart using AJAX
                        updateCart(productId, quantityInput.val(), action);
                    });

                    function updateCart(productId, quantity, action) {
                        $.ajax({
                            type: "POST",
                            url: "update.php",
                            data: {
                                product_id: productId,
                                quantity: quantity,
                                action: action
                            },
                            success: function(response) {
                                // Update the cart display or perform any other actions based on the response
                                console.log(response);
                            }
                        });
                    }
                });
            </script>
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
<?php
                        } else {
                            echo '<div class="alert alert-danger alert-dismissible mt-2">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
   <center> <strong>Please Log In to the Website</strong></center>
  </div>';
                        }
?>