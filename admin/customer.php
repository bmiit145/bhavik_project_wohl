<?php

require '../include/connection.php';
date_default_timezone_set('Asia/Kolkata');
// $currentdate = date('d-m-Y h:i:s A', time());
$currentdate = date('d-m-Y');
$currentTime = date('h:i:s A', time());

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords" content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>Admin Panel</title>
    <link rel="apple-touch-icon" href="theme-assets/images/logo/logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="theme-assets/images/logo/logo.png">
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
    <style>
        table,
        td,
        th {
            border: 1px solid #ddd;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th {
            padding: 5px;
        }

        .heading {
            color: black;
            font-weight: bolder;
            text-align: center;
            font-size: 40px;
        }

        .pdate {
            text-align: right;
        }

        .print-container {
            visibility: hidden;
            position: absolute;
            left: 150px;
            top: 10px;
        }

        @media print {
            body * {
                visibility: hidden;
            }

            .print-container,
            .print-container * {
                visibility: visible;
            }
        }
    </style>
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
                <li class="active"><a href="customer.php"><i class="ft-user"></i><span class="menu-title" data-i18n="">Customer</span></a>
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
                <div class="d-flex justify-content-between">
                    <h1>Customer Details</h1>

                    <!-- <a target="_blank" href="report.php"> -->

                    <button type="button" class="btn mr-1 mb-1 ml-1 btn-primary btn-sm" onload="report();"><i class="la la-download"> Customer Report</i></button>
                    <!-- </a> -->
                    <script>
                        function report() {
                            <?php
                            include './admin/customer_report.php';
                            ?>
                        }
                    </script>
                </div>
                <br>
                <div class="row">
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>No</th>
                                <th>Name </th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>City</th>
                                <th>Registered Date</th>

                                <!-- <th>Status</th> -->
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <?php
                        // $id = 0;
                        // $sql = "SELECT tblcity.name
                        //  FROM tblcity
                        //  INNER JOIN tbluser
                        //  ON tbluser.cityid=tblcity.id;";
                        // $result = $conn->query($sql);


                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $delete = $conn->query("DELETE  FROM `tbl_user` where id=$id");
                        }
                        $i = 0;
                        $query = $conn->query("SELECT * FROM `tbl_user` where role='1'");

                        ?>
                        <tbody>
                            <?php
                            while ($fetch = $query->fetch_array()) {
                                $i++;
                                // if ($result->num_rows > 0) {
                                //     $row = $result->fetch_assoc();
                                //     $Cname = $row['name'];
                                // }
                            ?>
                                <tr>
                                    <td>
                                        <p class="text-muted mb-0"><?php echo $i ?></p>
                                    </td>

                                    <td>
                                        <p class="text-muted mb-0"><?php echo $fetch['fullname']; ?></p>
                                    </td>
                                    <td>
                                        <p class="text-muted mb-0"><?php echo $fetch['email']; ?></p>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1"><?php echo $fetch['gender']; ?></p>
                                    </td>
                                    <td>
                                        <?php
                                        $cid = $fetch['city'];
                                        $city_name = "SELECT * FROM tblcity WHERE id = $cid";
                                        $city_result = $conn->query($city_name);
                                        if (mysqli_num_rows($city_result) > 0) {
                                            $city_row = mysqli_fetch_array($city_result);
                                            $cname = $city_row["name"];
                                        }
                                        ?>
                                        <p class="fw-normal mb-1"><?php echo $cname; ?></p>
                                    </td>
                                    <td><?php echo $fetch['registered_date']; ?></td>

                                    <!-- <td>
                                        <span class="badge badge-success rounded-pill d-inline">Active</span>
                                    </td> -->
                                    <td>

                                        <a href="customer.php?id=<?php echo $fetch['id'] ?>" class="table-link danger ">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>




            </div>
        </div>
    </div>


    <footer class="footer footer-static footer-light navbar-border navbar-shadow">
        <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">2023 &copy; Copyright <a class="text-bold-800 grey darken-2" href="../admin/index.php" target="_blank">Wohl Reactions
                </a></span>
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

    <script>
        function printPage2() {
            // Assuming page2.php has a server-side script to initiate the print
            // You can use Ajax to call that script without opening page2.php
            $.ajax({
                url: 'report.php', // Assuming this is the URL of your server-side script
                type: 'GET',
                success: function() {
                    console.log('Print request sent successfully');
                },
                error: function() {
                    console.error('Failed to send print request');
                }
            });
        }
    </script>

    <!-- END PAGE LEVEL JS-->
</body>

</html>