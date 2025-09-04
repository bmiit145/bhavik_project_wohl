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
    <style>
        .order {
            text-align: center;
            color: skyblue;
            font-family: 'Courier New', Courier, monospace;
            font-size: 70px;
        }

        .email {
            text-align: center;
            color: black;
            font-family: 'Courier New', Courier, monospace;
            font-size: 40px;
        }
    </style>
</head>

<body>

    <div class="colorlib-loader"></div>

    <div id="page">
        <?php include 'header.php';

        $order_id = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;
        if (!$order_id) {
            echo "<div class='alert alert-danger'>Order not found.</div>";
            exit;
        }

        if (isset($_SESSION['id'])) {
            $user_id = $_SESSION['id'];
        }

        ?>





        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p class="bread"><span><a href="index.php">Home</a></span> / <span>Place Order</span></p>
                    </div>
                </div>
            </div>
        </div>



        <div id="page">


            <!-- <div class="colorlib-product"> -->
            <div class="container">


                <div class="row row-pb-lg">
                    <div class="col-sm-10 offset-md-1">


                        <p class="email">Thank You For Visiting Us</p>
                        <center>
                            <a target="_blank" href="invoice.php?order_id=<?php echo $order_id; ?>">
                                <button type="button" class="btn btn-primary">
                                    <i class="la la-download"></i>Invoice
                                </button>
                            </a>
                        </center>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="contact-wrap">
                            <h3>Give Feedback Here</h3>
                            <form action="" class="contact-form" method="post">
                                <div class="row">

                                    <div class="w-100"></div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="feedback">Feedback :</label>
                                            <textarea name="feedback" id="feedback" cols="30" rows="10" class="form-control" placeholder="Say something about us" required></textarea>
                                        </div>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="submit" value="Send Feedback" name="givefeeback" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <?php

                if (isset($_POST['givefeeback'])) {
                    $feedback = $_POST['feedback'];
                    $insert_feedback = $conn->query("INSERT INTO tbl_feedback (feedback, user_id) values ('$feedback','$user_id')");
                    if ($insert_feedback) {
                        echo "<script>location.href='index.php';</script>";
                    } else {
                        echo "<script>location.href='place_order.php';</script>";
                    }
                }

                ?>


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