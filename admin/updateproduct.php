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
    <link rel="apple-touch-icon" href="theme-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="theme-assets/images/ico/favicon.ico">
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
    <!-- Datatable JS -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <!-- Datatable CSS -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.jqueryui.min.css" integrity="sha512-x2AeaPQ8YOMtmWeicVYULhggwMf73vuodGL7GwzRyrPDjOUSABKU7Rw9c3WNFRua9/BvX/ED1IK3VTSsISF6TQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />

    <!-- jQuery library file -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js">
    </script>

    <!-- Datatable plugin JS library file -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
    </script>
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
<!--                <li class=" nav-item"><a href="stock.php"><i class="ft-box"></i><span class="menu-title" data-i18n="">Stock</span></a>-->
<!--                </li>-->
                <li class=" active"><a href="product.php"><i class="ft-maximize"></i><span class="menu-title" data-i18n="">Product</span></a>
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
            <div class="content-body">


                <div class="d-flex justify-content-between">
                    <h1>Update Product Details</h1>

                    <?php

                    if (isset($_GET['id'])) {
                        $pid = $_GET['id'];
                        $query = $conn->query("SELECT * FROM tbl_products where product_id=$pid");
                    }

                    ?>
                </div>
                <?php
                while ($row = $query->fetch_assoc()) {
                ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="category" class="col-form-label">Product name :</label>
                            <input type="hidden" name="pid" value="  <?php echo $row['product_id'] ?>">

                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="category" class="col-form-label">Description :</label>
                            <input type="text" class="form-control" id="description" name="description" value="<?php echo $row['description']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="category" class="col-form-label">Model No :</label>
                            <input type="text" class="form-control" id="modelno" name="modelno" value="<?php echo $row['model_no']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="category" class="col-form-label">price :</label>
                            <input type="text" class="form-control" id="price" name="price" value="<?php echo $row['price']; ?>" required>
                        </div>


                        <a href="product.php"><button type="button" class="btn btn-secondary">Close</button></a>

                        <input type="submit" name="updateproduct" value="Update Product" class="btn btn-primary">

                    </form>
                <?php
                }
                ?>

            </div>
        </div>
    </div>

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

<?php

if (isset($_GET['id'])) {
    $pid = $_GET['id'];
    if (isset($_POST['updateproduct'])) {

        $pname = $_POST['name'];
        $modelno = $_POST['modelno'];
        $description = $_POST['description'];
        $price = $_POST['price'];


        $query = "UPDATE tbl_products SET name='$pname', description='$description', model_no='$modelno', price=' $price' WHERE product_id='$pid'  ";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {

            echo "<script>location.href='product.php'</script>";
        } else {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
}


?>