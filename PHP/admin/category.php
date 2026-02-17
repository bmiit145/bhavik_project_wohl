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
    <!-- <title>Dashboard - Chameleon Admin - Modern Bootstrap 4 WebApp & Dashboard HTML Template + UI Kit</title> -->
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

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- jQiery Validation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/pages/dashboard-ecommerce.css">
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
                <li class="active"><a href="category.php"><i class="ft-box"></i><span class="menu-title" data-i18n="">Category</span></a>
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
                <div class="column">
                    <div class="d-flex justify-content-between">
                        <h2 class="text-uppercase">Category Details</h2>

                        <div class="d-flex justify-content-end">
                            <form class="">
                                <div class="position-relative has-icon-right full-width">
                                    <input class="form-control" id="search" type="text" placeholder="Search here...">
                                </div>
                            </form>
                        </div>
                        <button type="button" class="btn mr-1 mb-1 ml-1 btn-primary btn-sm" data-toggle="modal" data-target="#addcategory" data-whatever="@fat">Add Category</button>
                    </div>
                    <div class="col-12 mb-1">
                        <table id="tabledata" class="table align-middle mb-0 bg-white">
                            <thead class="bg-light">
                                <tr>
                                    <th>No</th>
                                    <th>Category Name</th>
                                    <th>Created On</th>
                                    <th>Actions</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <?php
                            $query = $conn->query("SELECT * FROM tbl_category");
                            // $cname = $conn-> query("SELECT cname FROM tbl_category");
                            ?>

                            <tbody>
                                <?php
                                $serial = 1;
                                while ($fetch = $query->fetch_array()) {
                                ?>
                                    <tr>
                                        <td>
                                            <p class="fw-normal mb-1"><?php echo $serial++ ?></p>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-left">
                                                <div class="ms-3">
                                                    <p class="fw-bold mb-1"><?php echo  $fetch['cname']; ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="fw-normal mb-1"><?php echo  $fetch['added_date']; ?></p>
                                        </td>
                                        <td>
                                            <a href="#"
                                               class="table-link danger delete-button"
                                               data-href="category.php?delCat=<?php echo $fetch['categoryid']; ?>"
                                               data-type="Category">
                                               <span class="fa-stack">
                                                   <i class="fa fa-square fa-stack-2x"></i>
                                                   <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                               </span>
                                            </a>
                                        </td>
                                        <td></td>
                                    </tr>
                                <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Enter Category Name</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="#" method="POST" id="addcategory_form">
                                        <div class="form-group">
                                            <label for="category" class="col-form-label">Category Name:</label>
                                            <input type="text" class="form-control" id="category" name="category" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <!-- <input type="submit" name="register" value="Send OTP" class="btn btn-primary" data-toggle="modal" data-whatever="@fat"> -->
                                            <input type="submit" name="addcategory" value="Add Category" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php


                if (isset($_POST['addcategory'])) {
                    $category = $_POST['category'];
                    $cate = "INSERT INTO tbl_category (cname,added_date) VALUES ('$category',now())";
                    $cat1 = mysqli_query($conn, $cate);
                    if ($cat1) {
                        echo "<script>toastr.success('Category added Successfully')</script>";
                        echo "<script>location.href='category.php'</script>";
                    } else {
                        echo "error:" . $conn->error;
                        echo "<script>toastr.error('Category not Adding Failed!  Try Again!')</script>";
                        echo "<script>location.href='category.php'</script>";
                    }
                }
                ?>

                <div class="column">
                    <div class="d-flex justify-content-between">
                        <h2 class="text-uppercase">Sub-Category Details </h2>
                        <div class="d-flex justify-content-end">
                            <form class="">
                                <div class="position-relative has-icon-right full-width">
                                    <input class="form-control" id="search" type="text" placeholder="Search here...">
                                </div>
                            </form>
                        </div>
                        <button type="button" class="btn mr-1 mb-1 ml-1 btn-primary btn-sm" data-toggle="modal" data-target="#addsubcategory" data-whatever="@fat">Add Sub Category</button>
                    </div>



                    <div class="col-12 mb-1">
                        <table class="table align-middle mb-0 bg-white">
                            <thead class="bg-light">
                                <tr>
                                    <th>No</th>
                                    <th>Sub-Category Name</th>
                                    <th>Category Name</th>
                                    <th>Created On</th>
                                    <th>Actions</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <!-- selection of subcategory -->
                            <?php

                            $id = 0;
                            $sql = "SELECT tbl_category.cname
                            FROM tbl_category
                            INNER JOIN tbl_subcategory
                            ON tbl_subcategory.categoryid=tbl_category.categoryid;";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $Cname = $row['cname'];
                            }

                            $query = $conn->query("SELECT * FROM tbl_subcategory");

                            ?>
                            <tbody>
                                <?php
                                $serial = 1;
                                while ($fetch = $query->fetch_array()) {
                                    if ($result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                        // $Cname = $row['cname'];
                                    }

                                ?>

                                    <tr>
                                        <td>
                                            <p class="fw-normal mb-1"><?php echo $serial++ ?></p>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-left">
                                                <div class="ms-3">
                                                    <p class="fw-bold mb-1"><?php echo  $fetch['sname']; ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php
                                            $cid = $fetch['categoryid'];
                                            $category_name = "SELECT * FROM tbl_category WHERE categoryid = $cid";
                                            $cname_result = $conn->query($category_name);
                                            if (mysqli_num_rows($cname_result) > 0) {
                                                $cname_row = mysqli_fetch_array($cname_result);
                                                $cname = $cname_row["cname"];
                                            }
                                            ?>
                                            <p class="fw-bold mb-1"><?php echo  $cname; ?></p>
                                        </td>
                                        <td>
                                            <p class="fw-normal mb-1"><?php echo  $fetch['added_date']; ?></p>
                                        </td>
                                        <td>
                                            <a href="#"
                                               class="table-link danger delete-button"
                                               data-href="category.php?delSubcat=<?php echo $fetch['subcategoryid']; ?>"
                                               data-type="Sub-Category">
                                                   <span class="fa-stack">
                                                       <i class="fa fa-square fa-stack-2x"></i>
                                                       <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                                   </span>
                                            </a>
                                        </td>
                                        <td></td>
                                    </tr>
                                <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                </div>



                <div class="row">
                    <div class="modal fade" id="addsubcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Enter Sub-Category Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="#" method="POST" id="addsubcategory_form">
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="validationTooltip01">Category:</label>
                                                <select class="custom-select custom-select-lg mb-3" id="subcat" name="state">
                                                    <?php
                                                    $sql = "SELECT * FROM tbl_category";
                                                    $result = mysqli_query($conn, $sql);
                                                    echo "<option value=''>-- Select a Category --</option>";
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<option class='' value='" . $row['categoryid'] . "'>" . $row['cname'] . "</option>";
                                                    }

                                                    ?>
                                                </select>
                                                <input type="text" name="catid" id="catid" class="btn btn-primary" hidden>
                                                <?php if (isset($_POST["catid"])) {
                                                    $cateId = $_POST['catid'];
                                                } ?>
                                                <script>
                                                    $("#subcat").change(function() {
                                                        var stateId = $(this).val();

                                                        if (stateId === "") {} else {
                                                            document.querySelector("#addsubcategory_form input[id='catid']").value = stateId;
                                                        }
                                                    });
                                                </script>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="subcategory" class="col-form-label">Sub-Category Name:</label>
                                                <input type="text" class="form-control" id="subcategory" name="subcategory" required>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <!-- <input type="submit" name="register" value="Send OTP" class="btn btn-primary" data-toggle="modal" data-whatever="@fat"> -->
                                            <input type="submit" name="addsubcategory" value="Add Sub-Category" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="column">
                    <div class="d-flex justify-content-between">
                        <h2 class="text-uppercase">Brand Details</h2>

                        <div class="d-flex justify-content-end">
                            <form class="">
                                <div class="position-relative has-icon-right full-width">
                                    <input class="form-control" id="search" type="text" placeholder="Search here...">
                                </div>
                            </form>
                        </div>
                        <button type="button" class="btn mr-1 mb-1 ml-1 btn-primary btn-sm" data-toggle="modal" data-target="#addbrand" data-whatever="@fat">Add Brand</button>
                    </div>
                    <div class="col-12 mb-1">
                        <table class="table align-middle mb-0 bg-white">
                            <thead class="bg-light">
                                <tr>
                                    <th>No</th>
                                    <th>Brand Name</th>
                                    <th>Created On</th>
                                    <th>Actions</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <?php

                            $query = $conn->query("SELECT * FROM tbl_brand");
                            // $cname = $conn-> query("SELECT cname FROM tbl_category");
                            ?>

                            <tbody>
                                <?php
                                while ($fetch = $query->fetch_array()) {
                                ?>
                                    <tr>
                                        <td>
                                            <p class="fw-normal mb-1"><?php echo  $fetch['id']; ?></p>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-left">
                                                <div class="ms-3">
                                                    <p class="fw-bold mb-1"><?php echo  $fetch['brand_name']; ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="fw-normal mb-1"><?php echo  $fetch['added_on']; ?></p>
                                        </td>
                                        <td>
                                            <a href="#"
                                               class="table-link danger delete-button"
                                               data-href="category.php?delBrand=<?php echo $fetch['id']; ?>"
                                               data-type="Brand">
                                                   <span class="fa-stack">
                                                       <i class="fa fa-square fa-stack-2x"></i>
                                                       <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                                   </span>
                                            </a>
                                        </td>
                                        <td></td>
                                    </tr>
                                <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="modal fade" id="addbrand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Enter Brand Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="#" method="POST" id="addbrand_form">
                                        <div class="form-group">
                                            <label for="brand" class="col-form-label">Brand Name:</label>
                                            <input type="text" class="form-control" id="brand" name="brand" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <!-- <input type="submit" name="register" value="Send OTP" class="btn btn-primary" data-toggle="modal" data-whatever="@fat"> -->
                                            <input type="submit" name="addbrand" value="Add Brand" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php

                if (isset($_POST['addbrand'])) {
                    $category = $_POST['brand'];
                    $cate = "INSERT INTO tbl_brand (brand_name,added_on) VALUES ('$category',now())";
                    $cat1 = mysqli_query($conn, $cate);
                    if ($cat1) {
                        echo "<script>toastr.success('Brand added Successfully')</script>";
                        echo "<script>location.href='category.php'</script>";
                    } else {
                        echo "error:" . $conn->error;
                        echo "<script>toastr.error('Brand not Adding Failed!  Try Again!')</script>";
                        echo "<script>location.href='category.php'</script>";
                    }
                }
                ?>

                <div class="column">
                    <div class="d-flex justify-content-between">
                        <h2 class="text-uppercase">Unit Details</h2>

                        <div class="d-flex justify-content-end">
                            <form class="">
                                <div class="position-relative has-icon-right full-width">
                                    <input class="form-control" id="search" type="text" placeholder="Search here...">
                                </div>
                            </form>
                        </div>
                        <button type="button" class="btn mr-1 mb-1 ml-1 btn-primary btn-sm" data-toggle="modal" data-target="#addunit" data-whatever="@fat">Add Unit</button>
                    </div>
                    <div class="col-12 mb-1">
                        <table class="table align-middle mb-0 bg-white">
                            <thead class="bg-light">
                            <tr>
                                <th>No</th>
                                <th>Unit</th>
                                <th>Created On</th>
                                <th>Actions</th>
                                <th></th>
                            </tr>
                            </thead>

                            <?php
                            $query = $conn->query("SELECT * FROM tbl_unit");
                            ?>

                            <tbody>
                            <?php
                            $serial = 1;
                            while ($fetch = $query->fetch_array()) {
                                ?>
                                <tr>
                                    <td>
                                        <p class="fw-normal mb-1"><?php echo $serial++ ?></p>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-left">
                                            <div class="ms-3">
                                                <p class="fw-bold mb-1"><?php echo $fetch['unit_name']; ?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1"><?php echo $fetch['added_on']; ?></p>
                                    </td>
                                    <td>
                                        <a href="#"
                                           class="table-link danger delete-button"
                                           data-href="category.php?delUnit=<?php echo $fetch['unit_id']; ?>"
                                           data-type="Unit">
                                   <span class="fa-stack">
                                       <i class="fa fa-square fa-stack-2x"></i>
                                       <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                   </span>
                                        </a>

                                    </td>
                                    <td></td>
                                </tr>
                            <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="modal fade" id="addunit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Enter Unit Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="#" method="POST" id="addunit_form">
                                        <div class="form-group">
                                            <label for="unit_name" class="col-form-label">Unit Name :</label>
                                            <input type="text" class="form-control" id="unit_name" name="unit_name" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <input type="submit" name="addunit" value="Add Unit" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                if (isset($_POST['addunit'])) {
                    $unit_name = trim($_POST['unit_name']);

                    // Check if unit already exists (case-insensitive)
                    $check_query = "SELECT 1 FROM tbl_unit WHERE LOWER(unit_name) = LOWER('$unit_name') LIMIT 1";
                    $check_result = mysqli_query($conn, $check_query);

                    if (mysqli_num_rows($check_result) > 0) {
                        echo "<script>toastr.error('Unit already exists!')</script>";
                        echo "<script>location.href='category.php'</script>";
                    } else {
                        // Insert new unit with added_on column
                        $insert_query = "INSERT INTO tbl_unit (unit_name, added_on) VALUES ('$unit_name', NOW())";
                        $result = mysqli_query($conn, $insert_query);
                        if ($result) {
                            echo "<script>toastr.success('Unit added successfully')</script>";
                            echo "<script>location.href='category.php'</script>";
                        } else {
                            echo "error:" . $conn->error;
                            echo "<script>toastr.error('Failed to add unit! Try again.')</script>";
                            echo "<script>location.href='category.php'</script>";
                        }
                    }
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
<!--    Delete Model -->
    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteLabel">Confirm Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to permanently delete this item?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a href="#" id="confirmDeleteBtn" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>

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

<!--    Delete Script-->
    <script>
        $(document).ready(function(){
            $('.delete-button').on('click', function(e){
                e.preventDefault();
                var deleteUrl = $(this).data('href');
                var type = $(this).data('type') || 'item';

                // Optionally, customize modal text based on type
                $('#confirmDeleteModal .modal-body').text('Are you sure you want to permanently delete this ' + type + '?');

                $('#confirmDeleteBtn').attr('href', deleteUrl);
                $('#confirmDeleteModal').modal('show');
            });
        });
    </script>
    <script>
        // category Selection
        $("#cat").change(function() {
            var catid = $(this).val();
            if (catid === "") {
                $("#subcat").html("<option value=''>-- Select Category First --</option>");
                $("#subcat").prop("disabled", true);
            } else {
                $.ajax({
                    type: "POST",
                    url: "product.php",
                    data: {
                        categoryid: catid
                    },
                    success: function(response) {
                        $("#subcat").prop("disabled", false);
                        $("#subcat").html(response);
                    },
                });
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            // Initialize DataTable on your table
            var dataTable = $('#tableData').DataTable({
                "paging": true,
                "pageLength": 10,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>

</body>

</html>

<!--Delete PHP -->
<?php

// Delete Category
if (isset($_GET['delCat'])) {
    $catid = intval($_GET['delCat']);

    // Check for references in subcategory and products
    $checkSubcat = mysqli_query($conn, "SELECT COUNT(*) AS count FROM tbl_subcategory WHERE categoryid='$catid'");
    $subcatCount = mysqli_fetch_assoc($checkSubcat)['count'];

    $checkProducts = mysqli_query($conn, "SELECT COUNT(*) AS count FROM tbl_products WHERE categoryid='$catid'");
    $productCount = mysqli_fetch_assoc($checkProducts)['count'];

    if ($subcatCount > 0 || $productCount > 0) {
        echo "<script>alert('Cannot delete category. There are subcategories or products linked to this category.');</script>";
        echo "<script>window.location.href='category.php';</script>";
    } else {
        $query = mysqli_query($conn, "DELETE FROM tbl_category WHERE categoryid='$catid'");
        if ($query) {
            echo "<script>alert('Category deleted successfully');</script>";
            echo "<script>window.location.href='category.php';</script>";
        } else {
            echo "<script>alert('Error deleting category. Please try again.');</script>";
            echo "<script>window.location.href='category.php';</script>";
        }
    }
}

// Delete Subcategory with check for linked products
if (isset($_GET['delSubcat'])) {
    $subcatid = intval($_GET['delSubcat']);

    // Check if any products are linked to this subcategory
    $checkQuery = "SELECT COUNT(*) as count FROM tbl_products WHERE subcategoryid = $subcatid";
    $checkResult = $conn->query($checkQuery);
    $row = $checkResult->fetch_assoc();

    if ($row['count'] > 0) {
        // Cannot delete because linked products exist
        echo "<script>alert('Cannot delete this subcategory because it is associated with existing products.'); window.location.href='category.php';</script>";
        exit();
    }

    // Proceed to delete if no linked products
    $deleteQuery = "DELETE FROM tbl_subcategory WHERE subcategoryid = $subcatid";
    if ($conn->query($deleteQuery)) {
        echo "<script>alert('Subcategory deleted successfully.'); window.location.href='category.php';</script>";
        exit();
    } else {
        echo "<script>alert('Failed to delete subcategory.'); window.location.href='category.php';</script>";
        exit();
    }
}

// Delete Brand
if (isset($_GET['delBrand'])) {
    $braid = intval($_GET['delBrand']);

    // Check for products linked to this brand
    $checkProducts = mysqli_query($conn, "SELECT COUNT(*) AS count FROM tbl_products WHERE brandid='$braid'");
    $productCount = mysqli_fetch_assoc($checkProducts)['count'];

    if ($productCount > 0) {
        // Cannot delete brand due to existing product references
        echo "<script>alert('Cannot delete brand. There are products linked to this brand.');</script>";
        echo "<script>window.location.href='category.php';</script>";
    } else {
        // Safe to delete brand
        $query = mysqli_query($conn, "DELETE FROM tbl_brand WHERE id='$braid'");
        if ($query) {
            echo "<script>alert('Brand deleted successfully.');</script>";
            echo "<script>window.location.href='category.php';</script>";
        } else {
            echo "<script>alert('Error deleting brand. Please try again.');</script>";
            echo "<script>window.location.href='category.php';</script>";
        }
    }
}

// Delete Unit
if (isset($_GET['delUnit'])) {
    $unitId = intval($_GET['delUnit']);

    // Check if this unit is used in product variants
    $checkVariants = mysqli_query($conn, "SELECT COUNT(*) AS count FROM tbl_product_variant WHERE unit_id = '$unitId'");
    $variantCount = mysqli_fetch_assoc($checkVariants)['count'];

    if ($variantCount > 0) {
        // Prevent deletion and show alert
        echo "<script>alert('Cannot delete unit. There are product variants linked to this unit.');</script>";
        echo "<script>window.location.href='category.php';</script>";
    } else {
        // Safe to delete unit
        $deleteQuery = mysqli_query($conn, "DELETE FROM tbl_unit WHERE unit_id = '$unitId'");
        if ($deleteQuery) {
            echo "<script>alert('Unit deleted successfully.');</script>";
            echo "<script>window.location.href='category.php';</script>";
        } else {
            echo "<script>alert('Failed to delete unit. Please try again.');</script>";
            echo "<script>window.location.href='category.php';</script>";
        }
    }
}
?>

<?php

if (isset($_POST['addsubcategory'])) {
    $subcategory = $_POST['subcategory'];
    $subcate = "INSERT INTO tbl_subcategory (sname,categoryid,added_date) VALUES ('$subcategory','$cateId',now())";
    // echo $subcate;
    $subcat1 =  mysqli_query($conn, $subcate);
    if ($subcat1) {
        echo "<script>toastr.success('Sub Category added Successfully ')</script>";
        echo "<script>location.href='category.php'</script>";
    } else {
        echo "error:" . $conn->error;
        echo "<script>toastr.error('Sub Category not Adding Failed!  Try Again! ')</script>";
        echo "<script>location.href='category.php'</script>";
    }
}

?>

<?php
#sub category Selection
if (isset($catid)) {
    $sql = "SELECT * FROM tbl_subcategory WHERE categoryid = $catid";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<option value=''>-- Select a Subcategory --</option>";
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['subcategoryid'] . "'>" . $row['sname'] . "</option>";
        }
    } else {
        echo "<option value=''>-- No Categories Found --</option>";
    }
}
?>