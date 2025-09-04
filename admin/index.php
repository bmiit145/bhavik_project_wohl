<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords" content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>Admin Panel</title>
    <link rel="apple-touch-icon" href="theme-assets/images/logo/logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="theme-assets/images/logo/logo.png">
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
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
</head>

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">

    <!-- fixed-top-->
    <?php
    include '../admin/navbar.php';
    ?>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="theme-assets/images/backgrounds/02.jpg">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="#"><img class="brand-logo" alt="Wohl Reactions" src="theme-assets/images/logo/logo.png" />
                        <h3 class="brand-text">Wohl Reactions</h3>
                    </a></li>
                <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
            </ul>
        </div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="active"><a href="index.php"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
                </li>
                <li class=" nav-item"><a href="customer.php"><i class="ft-user"></i><span class="menu-title" data-i18n="">Customer</span></a>
                </li>
                <li class=" nav-item"><a href="category.php"><i class="ft-box"></i><span class="menu-title" data-i18n="">Category</span></a>
                </li>
<!--                <li class=" nav-item"><a href="stock.php"><i class="ft-box"></i><span class="menu-title" data-i18n="">Stock</span></a>-->
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
            <br>
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="row">
                    <?php
                    $query = $conn->query('SELECT * From tbl_user');
                    $totalemp = mysqli_num_rows($query);
                    $query1 = $conn->query('SELECT * From tbl_user where role="customer"');
                    $totalcust = mysqli_num_rows($query1);
                    $query2 = $conn->query('SELECT * From tbl_products');
                    $totalprod = mysqli_num_rows($query2);
                    $query3 = $conn->query('SELECT * From tbl_order');
                    $totalorder = mysqli_num_rows($query3);
                    ?>
                    <div class="col-xl-3 col-lg-6 col-md-12">
                        <a href="#">
                            <div class="card pull-up ecom-card-1 bg-white">
                                <div class="card-content ecom-card2 height-180">
                                    <h5 class="text-muted danger position-absolute p-2 font-large-1">Users</h5>
                                    <div>
                                        <i class="ft-user danger font-large-2 float-right p-1"></i>
                                    </div>
                                    <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3  ">
                                        <div>
                                            <br>
                                            <h1 class="text-center danger  p-2 font-large-2"><?php echo $totalemp;  ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12">
                        <a href="../admin/customer.php">
                            <div class="card pull-up ecom-card-1 bg-white">
                                <div class="card-content ecom-card2 height-180">
                                    <h5 class="text-muted info position-absolute p-2 font-large-1">Customers</h5>
                                    <div>
                                        <i class="ft-user info font-large-2 float-right p-1"></i>
                                    </div>
                                    <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3">
                                        <div>
                                            <br>
                                            <h1 class="text-center info  p-2 font-large-2"><?php echo $totalcust;  ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-12">
                        <a href="../admin/order.php">
                            <div class="card pull-up ecom-card-1 bg-white">
                                <div class="card-content ecom-card2 height-180">
                                    <h5 class="text-muted warning position-absolute p-2 font-large-1">Orders</h5>
                                    <div>
                                        <i class="ft-shopping-cart warning font-large-2 float-right p-1"></i>
                                    </div>
                                    <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3">
                                        <div>
                                            <br>
                                            <h1 class="text-center warning  p-2 font-large-2"><?php echo $totalorder;  ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12">
                        <a href="../admin/product.php">
                            <div class="card pull-up ecom-card-1 bg-white">
                                <div class="card-content ecom-card2 height-180">
                                    <h5 class="text-muted success  position-absolute p-2 font-large-1">Products</h5>
                                    <div>
                                        <i class="ft-box success  font-large-2 float-right p-1"></i>
                                    </div>
                                    <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3  ">
                                        <div>
                                            <br>
                                            <h1 class="text-center success  p-2 font-large-2"><?php echo $totalprod;  ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>




                


              

            </div>

        </div>

    </div>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


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