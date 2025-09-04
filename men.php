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
                        <p class="bread"><span><a href="index.php">Home</a></span> / <span>Men's</span></p>
                    </div>
                </div>
            </div>
        </div>

        <?php
        // Fetch products with their lowest variant price
        $sql = "
    SELECT p.product_id, p.name, p.img1, MIN(v.price) AS lowest_price
    FROM tbl_products p
    LEFT JOIN tbl_product_variant v ON p.product_id = v.product_id
    WHERE p.status = 1 AND p.categoryid = 1
    GROUP BY p.product_id
";

        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        ?>

        <div class="colorlib-featured">
            <div class="container">
                <div class="row">
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <div class="col-lg-3 mb-4 text-center">
                            <div class="product-entry border">
                                <a href="shopping.php?id=<?php echo $row['product_id'] ?>" class="prod-img">
                                    <img src="./admin/<?php echo $row['img1'] ?>" width="250px" alt="<?php echo $row['name']; ?>">
                                </a>
                                <div class="desc">
                                    <h2>
                                        <a href="shopping.php?id=<?php echo $row['product_id'] ?>">
                                            <?php echo $row['name']; ?>
                                        </a>
                                    </h2>
                                    <span class="price">&#8377;<?php echo $row['lowest_price']; ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>

        <?php include 'footer.php'; ?>
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
    </div>

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