<?php

require '../include/connection.php';

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
    <title>Admin Panel</title>
    <link rel="apple-touch-icon" href="theme-assets/images/logo/logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="theme-assets/images/logo/logo.png">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords" content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">

    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/vendors/css/charts/chartist.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN CHAMELEON  CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/app-lite.css">
    <!-- END CHAMELEON  CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/pages/dashboard-ecommerce.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.4.4/cjs/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">

    <?php
    include '../admin/navbar.php';
    ?>


    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="theme-assets/images/backgrounds/02.jpg">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="#"><img class="brand-logo" alt="Chameleon admin logo" src="theme-assets/images/logo/logo.png" />
                        <h3 class="brand-text">Wohl Reactions</h3>
                    </a></li>
                <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
            </ul>
        </div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item"><a href="index.php"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
                </li>
                <li class=" nav-item"><a href="customer.php"><i class="ft-user"></i><span class="menu-title" data-i18n="">Customer</span></a>
                </li>
                <li class=" nav-item"><a href="category.php"><i class="ft-box"></i><span class="menu-title" data-i18n="">Category</span></a>
                </li>
<!--                <li class="active"><a href="stock.php"><i class="ft-box"></i><span class="menu-title" data-i18n="">Stock</span></a>-->
<!--                </li>-->
                <li class=" nav-item"><a href="product.php"><i class="ft-maximize"></i><span class="menu-title" data-i18n="">Product</span></a>
                </li>
                <li class=" nav-item"><a href="order.php"><i class="ft-bookmark"></i><span class="menu-title" data-i18n="">Order</span></a>
                </li>
            </ul>
        </div>
        <div class="navigation-background"></div>
    </div>

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <br>
                <div class="d-flex justify-content-between">
                    <h1>Stock Details</h1>

                    <!-- <a target="_blank" href="report.php"> -->

                    <button type="button" class="btn mr-1 mb-1 ml-1 btn-primary btn-sm" onclick="window.print();"><i class="la la-download"> Stock Report</i></button>
                    <!-- </a> -->

                </div>

                <div class="row">
                    <table class="table align-middle mb-0 bg-white" id="tableID">
                        <thead class="bg-light">
                            <tr>
                                <!-- <th>Id</th> -->
                                <th>Image</th>

                                <th>Product Name</th>
                                <th></th>

                                <th>Stock</th>
                                <!-- <th>Added On</th> -->
                                <th></th>

                                <th>Stock In</th>
                                <th>Stock Out</th>
                            </tr>
                        </thead>
                        <?php
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $delete = $conn->query("DELETE  FROM `tbl_stock` where productid=$id");
                        }



                        $query = $conn->query("SELECT tbl_stock.id, tbl_stock.stock,tbl_products.product_id,tbl_products.name,tbl_products.price,tbl_products.img1 FROM tbl_stock inner join tbl_products on tbl_products.product_id = tbl_stock.productid");


                        ?>
                        <tbody>
                            <?php
                            while ($fetch = $query->fetch_array()) {
                                // $sid=;
                            ?>

                                <tr>
                                    <!-- <td class="stock_id"><?php echo $fetch['product_id'] ?></td> -->


                                    <td><img class="img-polaroid" src="<?php echo $fetch['img1'] ?>" height="70px" width="80px"></td>
                                    <!-- <td></td> -->
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <p class="text-muted mb-0"><?php echo $fetch['name']; ?></p>
                                        </div>
                                    </td>
                                    <td></td>

                                    <td>
                                        <div class="d-flex align-items-center">
                                            <p class="text-muted mb-0"><?php echo $fetch['stock']; ?></p>
                                        </div>
                                    </td>

                                    <td></td>

                                    <td>
                                        <a href="stockin.php?id=<?php echo $fetch['id'] ?>">
                                            <button class='btn btn-success'><i class='icon-plus-sign icon-white'></i> Stock In</button></a>
                                    </td>
                                    <td>
                                        <a href="stockout.php?id=<?php echo $fetch['id'] ?>">
                                            <button class='btn btn-danger'><i class='icon-minus-sign icon-white'></i> Stock Out</button></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>






            </div>
        </div>
    </div>


    <!-- <script>
        $(document).ready(function() {
            $('.stockin').click(function(e) {
                e.preventDefault();
                var stock_id = $(this).closest('tr').find('.stock_id').text();
                console.log(stock_id);
                $.ajax({
                    type: "POST",
                    url: "stockin.php",
                    data: {
                        'checking_edit_btn': true,
                        'stock_id': stock_id,
                    },
                    success: function(response) {
                        console.log(response);
                        // $('#stockin').model('show');
                    }
                });

            });
        });
    </script> -->




    <?php

    if (isset($_POST['stockin'])) {

        $sid = $_POST['stock_id'];

        $result = $conn->query("SELECT * FROM `tbl_stock` WHERE id='$sid'");
        $row = $result->fetch_array();

        $old_stck = $row['stock'];
        $new_stck = $_POST['new_stck'];
        $total = $old_stck + $new_stck;

        $que = $conn->query("UPDATE `tbl_stock` SET `stock` = '$total' WHERE `id`='$sid'");
        echo "<script>window.location = 'stock.php'</script>";
        //header("Location:admin_football.php");
    }

    ?>

    <footer class="footer footer-static footer-light navbar-border navbar-shadow">
        <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">2023 &copy; Copyright <a class="text-bold-800 grey darken-2" href="../admin/index.php" target="_blank">Wohl Reactions </a></span>
            <ul class="list-inline float-md-right d-block d-md-inline-blockd-none d-lg-block mb-0">
                <li class="list-inline-item"><a class="my-1" href="#" target="_blank"> Support</a></li>
            </ul>
        </div>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="theme-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="theme-assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN CHAMELEON  JS-->
    <script src="theme-assets/js/core/app-menu-lite.js" type="text/javascript"></script>
    <script src="theme-assets/js/core/app-lite.js" type="text/javascript"></script>
    <!-- END CHAMELEON  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="theme-assets/js/scripts/pages/dashboard-lite.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
</body>

</html>