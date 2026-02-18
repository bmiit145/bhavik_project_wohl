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

<!--    Font awasome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/js/all.min.js" integrity="sha512-6BTOlkauINO65nLhXhthZMtepgJSghyimIalb+crKRPhvhmsCdnIuGcVbR5/aQY2A+260iC1OPy1oCdB6pSSwQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Theme style  -->
    <link rel="stylesheet" href="css/style.css">

    <style>
        * {
            box-sizing: border-box;
        }

        .details-card {
            width: 80%;
            margin: auto;
        }


        .description-container {
            position: relative;
            /* height: 900px; */
        }

        .main-description1 {
            position: absolute;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .main-description h3 {
            font-size: 2rem;
        }

        .add-inputs,
        .add-inputs input {
            float: left;
            margin-right: 10px;
            margin-bottom: 2px;
        }

        .add-inputs button {
            border-radius: 0;
        }

        .add-inputs input {
            height: 48px;
            width: 65px;
            border-radius: 0;
        }


        .product-title {
            font-size: 1.1rem;
            font-weight: bold;
        }

        .product-price {
            font-size: 1.8rem;
        }

        .social-list {
            padding: 0;
            list-style: none;
        }

        .social-list li {
            float: left;
            padding: 6px 8px;
            margin-right: 12px;
        }

        .social-list li a {
            color: black;
            font-size: 2rem;
        }

        .social-list li a i {
            font-size: 2rem;
        }
    </style>

</head>

<body>

    <div class="colorlib-loader"></div>

    <div id="page">
        <?php
        include 'header.php';

        if (isset($_GET['id'])) {
            $pid = intval($_GET['id']); // sanitize input
        } else {
            echo "Product not found.";
            exit;
        }

        // Fetch product
        $product_query = $conn->prepare("SELECT * FROM tbl_products WHERE product_id = ? AND status = 1");
        $product_query->bind_param("i", $pid);
        $product_query->execute();
        $product_result = $product_query->get_result();
        $product = $product_result->fetch_assoc();

        if (!$product) {
            echo "Product not found.";
            exit;
        }

        // Fetch variants
        $variant_query = $conn->prepare("SELECT pv.*, u.unit_name FROM tbl_product_variant pv
                                 LEFT JOIN tbl_unit u ON pv.unit_id = u.unit_id
                                 WHERE pv.product_id = ?");
        $variant_query->bind_param("i", $pid);
        $variant_query->execute();
        $variants = $variant_query->get_result();

        ?>




        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p class="bread"><span><a href="index.php">Home</a></span> / <span>Product Details</span></p>
                    </div>
                </div>
            </div>
        </div>

            <div class="container">
                <div id="cart-message"></div>
                    <div class="container my-5">
                        <div class="card details-card p-0">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <img class="img-fluid details-img" src="https://source.unsplash.com/5Tm4YRqnNcM" alt="">
                                    <img class="img-fluid details-img" src="./admin/<?php echo $product['img1']; ?>" class="img-fluid">
                                </div>
                                <!-- Description & Cart/Form column -->
                                <div class="col-md-6 col-sm-12 description-container p-5">
                                    <div class="main-description">
                                        <p class="product-category mb-0"><?= htmlspecialchars($product['category'] ?? '') ?></p>
                                        <h3><?= htmlspecialchars($product['name']) ?></h3>
                                        <hr>

                                        <!-- Insert Enhanced PHP Form Here -->
                                        <form method="post" class="cartform">
                                            <?php
                                            $lowestPrice = null;
                                            $lowestVariantId = null;
                                            $allVariants = [];

                                            if ($variants) {
                                                $variants->data_seek(0);
                                                while ($v = $variants->fetch_assoc()) {
                                                    $allVariants[] = $v;
                                                    if ($lowestPrice === null || $v['price'] < $lowestPrice) {
                                                        $lowestPrice = $v['price'];
                                                        $lowestVariantId = $v['variant_id'];
                                                    }
                                                }
                                            }
                                            ?>

                                            <!-- Variant Selection -->
                                            <div class="form-group">
                                                <label class="font-weight-bold">Choose Variant:</label>
                                                <div id="variant-buttons" class="btn-group btn-group-toggle w-100 mb-2" data-toggle="buttons" role="group">
                                                    <?php foreach ($allVariants as $v):
                                                        $active = ($v['variant_id'] === $lowestVariantId) ? 'active' : '';
                                                        ?>
                                                        <label class="btn btn-outline-primary <?= $active ?>"
                                                               data-variant-id="<?= htmlspecialchars($v['variant_id']) ?>"
                                                               data-price="<?= htmlspecialchars($v['price']) ?>"
                                                               data-stock="<?= htmlspecialchars($v['stock']) ?>"
                                                               title="Available: <?= (int)$v['stock'] ?>">
                                                            <input type="radio"
                                                                   name="variant_radio"
                                                                   autocomplete="off"
                                                                <?= $active ? 'checked' : '' ?> >
                                                            <?= htmlspecialchars($v['variant_quantity'] . ' ' . $v['unit_name']) ?>
                                                        </label>
                                                    <?php endforeach; ?>
                                                </div>

                                                <input type="hidden" id="selected-variant" name="variant" value="<?= $lowestVariantId ?>">
                                                <input type="hidden" id="selected-price" name="price" value="<?= $lowestPrice ?>">
                                            </div>

                                            <!-- Display Price -->
                                            <div id="display-price" class="alert alert-info py-2 mb-3">
                                                <strong>Price: ₹<?= number_format($lowestPrice, 2) ?></strong>
                                            </div>

                                            <!-- Quantity Selection -->
                                            <div class="input-group mb-3" style="max-width: 200px;">
                                                <button type="button" class="btn btn-outline-secondary" id="minus" aria-label="Decrease quantity">
                                                    <i class="icon-minus2"></i>
                                                </button>
                                                <input type="number" id="qty" name="quantity" class="form-control text-center"
                                                       value="1" min="1" max="100" aria-label="Quantity">
                                                <button type="button" class="btn btn-outline-secondary" id="add" aria-label="Increase quantity">
                                                    <i class="icon-plus2"></i>
                                                </button>
                                            </div>

                                            <!-- Hidden Product Info -->
                                            <input type="hidden" class="productid" value="<?= htmlspecialchars($product['product_id']); ?>">
                                            <input type="hidden" class="name" value="<?= htmlspecialchars($product['name']); ?>">
                                            <input type="hidden" class="img1" value="<?= htmlspecialchars($product['img1']); ?>">

                                            <!-- Action Buttons -->
                                            <div class="d-flex gap-2 mb-3">
                                                <button class="btn btn-success btn-addtocart flex-fill" id="addtocart" type="submit" name="add_to_cart">
                                                    <i class="fa fa-shopping-cart"></i> Add to Cart
                                                </button>
                                                <button type="button" class="btn btn-outline-danger btn-addtowishlist" id="addtowishlist" title="Add to Wishlist">
                                                    <i class="fa fa-heart"></i>
                                                </button>
                                            </div>
                                        </form>
                                        <!-- End Enhanced Cart Form -->

                                        <hr>
                                        <p class="product-title mt-4 mb-1">About this product</p>
                                        <p class="product-description mb-4">
                                            <?= htmlspecialchars($product['description'] ?? "No description available.") ?>
                                        </p>
                                        <hr>
                                        <p class="product-title mt-4 mb-1">Share this product</p>
                                        <ul class="social-list">
                                            <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa-brands fa-square-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End row -->
                        </div>
                    </div>

<!--                <div class="row">-->
<!--                    <div class="col-sm-12">-->
<!--                        <div class="row">-->
<!--                            <div class="col-md-12 pills">-->
<!--                                <div class="bd-example bd-example-tabs">-->
<!--                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">-->
<!---->
<!--                                        <li class="nav-item">-->
<!--                                            <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Description</a>-->
<!--                                        </li>-->
<!---->
<!---->
<!--                                    </ul>-->
<!---->
<!--                                    <div class="tab-content" id="pills-tabContent">-->
<!--                                        <div class="tab-pane border fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">-->
<!--                                            <p>-->
<!--                                                --><?php //echo $product['description'] ?>
<!--                                            </p>-->
<!---->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

            </div>
    </div>
    <?php include 'footer.php'; ?>
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
    </div>

    <script>
        $(document).ready(function() {
            // Variant button click handler
            $('#variant-buttons label').click(function() {
                $('#variant-buttons label').removeClass('active');
                $(this).addClass('active');
                var price = $(this).data('price');
                var variantId = $(this).data('variant-id');
                $('#selected-variant').val(variantId);
                $('#selected-price').val(price);
                $('#display-price').html('<strong>Price: ₹' + price + '</strong>');
            });

            $('#variant-buttons input[type=radio]').change(function() {
                console.log("Done")
                var $label = $(this).closest('label');
                var price = $label.data('price');
                var variantId = $label.data('variant-id');
                $('#selected-variant').val(variantId);
                $('#selected-price').val(price);
                $('#display-price').html('<strong>Price: ₹' + price + '</strong>');
            });


            // Quantity increment/decrement buttons remain the same
            $('#add').click(function(e) {
                e.preventDefault();
                var quantity = parseInt($('#qty').val());
                quantity++;
                $('#qty').val(quantity);
            });
            $('#minus').click(function(e) {
                e.preventDefault();
                var quantity = parseInt($('#qty').val());
                if (quantity > 1) {
                    quantity--;
                }
                $('#qty').val(quantity);
            });

            // Modify Add to Cart button handler to use new selected variant and price
            $("#addtocart").click(function() {
                var $form = $(this).closest(".cartform");
                var productid = $form.find(".productid").val();
                var variant = $('#selected-variant').val();
                var quantity = $('#qty').val();
                var action = 'add_to_cart';

                $.ajax({
                    type: "POST",
                    url: "add_to_cart.php",
                    data: {
                        productid: productid,
                        variant: variant,
                        quantity:quantity,
                        action: action,
                    },
                    success: function(response) {
                        $("#cart-message").html(response);
                    }
                });
            });

            // Wishlist button handler
            $("#addtowishlist").click(function() {
                var $form = $(this).closest(".cartform");
                var productid = $(this).data("productid");
                var productid = $form.find(".productid").val();
                var size = $("#size").val();
                var color = $("#color").val();
                // var size = $form.find("#size").val();
                // var color = $from.find("#color").val();
                // Get the selected quantity

                $.ajax({
                    type: "POST",
                    url: "add_to_wishlist.php", // Create a new PHP file to handle the cart update
                    data: {
                        productid: productid,
                        // action: action,
                    },
                    success: function(response) {
                        console.log(response)
                        // Display the cart message in the designated container
                        $("#cart-message").html(response);
                    }
                });
            });

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
    <!-- <script>
		function myFunction() {
		   var element = document.body;
		   element.classList.toggle("dark-mode");
		}
		</script> -->
</body>

</html>