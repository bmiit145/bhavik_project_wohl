<?php
include './include/connection.php';

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $query = $conn->query("SELECT * FROM tbl_user WHERE email = '$email' ");
    $fetch = $query->fetch_array();
    $id = $fetch['id'];


    $_SESSION['id'] = $id;
    if (isset($_SESSION['user_cart'])) {
        $cart = $_SESSION['user_cart'];

        // $count= $conn->query("SELECT * FROM tbl_cart_item where cart_id=$id");
        //     $cart_item=mysqli_num_rows($count);
    }
    // echo $id;

} else {
    // echo "<script>location.href='login.php'</script>";
}

// $user_id = $_SESSION['id'];
// echo "<h1>$user_id</h1>";


// Fetch top 3 categories from database (ordered by latest added or your desired order)
$cat_sql = "SELECT categoryid, cname FROM tbl_category ORDER BY added_date DESC LIMIT 3";
$cat_result = $conn->query($cat_sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wohl Reactions</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jQuery Validation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
        <nav class="colorlib-nav" role="navigation">
            <div class="top-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-7 col-md-9">
                            <div id="colorlib-logo"><a href="index.php">Wohl Reactions</a></div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-left menu-1">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="shop.php">Shop</a></li>
<!--                                <li class="has-dropdown">-->
<!--                                    <a href="men.php">Men's</a>-->
<!--                                </li>-->
<!--                                <li><a href="women.php">Women's</a></li>-->
<!--                                <li><a href="kid.php">Kid's</a></li>-->
                                <?php
                                if ($cat_result && $cat_result->num_rows > 0) {
                                    while ($cat = $cat_result->fetch_assoc()) {
                                        // Assuming you have pages like category.php?category=ID or men.php replaced by category.php with param
                                        echo '<li><a href="shop.php?category=' . intval($cat['categoryid']) . '">' . htmlspecialchars($cat['cname']) . '</a></li>';
                                    }
                                }
                                ?>
                                <li><a href="about.php">About</a></li>
                                <li><a href="contact.php">Contact</a></li>
                                <?php
                                if (isset($_SESSION['email'])) {

                                    echo '<li><a href="profile.php?id=' . $id . '">Profile</a></li>';
                                }
                                ?>
                                <li class="cart"><a href="cart.php?id='.$id.'"><i class="icon-shopping-cart"></i> Cart<span id="cart-item" class="text-muted info"></span></a></li>
                                <?php
                                if (!isset($_SESSION['email'])) {
                                    echo '<li class="cart"><a href="login.php"><i class="icon-login"></i>Login</a></li>';
                                } else {
                                    echo '<li class="cart"><a href="wishlist.php"><i class="icon-heart"></i></a></li>';
                                    // echo "<li class='cart'><a href=''><i class='icon-logput'>" . $fetch['fullname'] . "</i></a></li>";
                                    // echo "<ul>";
                                    echo '<li class="cart"><a href="logout.php"><i class="icon-logput"></i>Logout</a></li>';
                                    // echo "</ul>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="sale">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 offset-sm-2 text-center">
                            <div class="row">
                                <div class="owl-carousel2">
                                    <div class="item">
                                        <div class="col">
                                            <h3><a href="cart.php">25% off (Almost) Everything! Use Code: Summer Sale</a></h3>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="col">
                                            <h3><a href="cart.php">Our biggest sale yet 50% off all summer shoes</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </nav>
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
    <!-- Login form  -->
    </body>

</html>