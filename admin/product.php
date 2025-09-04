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
                <div class="row">
                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-min-width mr-1 mb-1" data-toggle="modal" data-target="#addproduct" data-whatever="@fat"><i class="ft ft-box"></i> Add Product</button>
                    </div>
                </div>
                <div class="row">
                    <div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Enter Product Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="#" method="POST" id="addproduct_form" enctype="multipart/form-data">
                                        <input type="hidden" id="edit_product_id" name="edit_product_id" value="">
                                        <div class="form-row">
                                            <!-- Category -->
                                            <label for="cat">Category :</label>
                                            <select class="custom-select custom-select-lg mb-2" id="cat" name="cat">
                                                <?php
                                                $sql = "SELECT * FROM tbl_category";
                                                $result = mysqli_query($conn, $sql);
                                                echo "<option value=''>-- Select a Category --</option>";
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<option value='" . $row['categoryid'] . "'>" . $row['cname'] . "</option>";
                                                }
                                                ?>
                                            </select>

                                            <!-- Sub-Category -->
                                            <label for="subcat">Sub-Category :</label>
                                            <select class="custom-select custom-select-lg mb-2" id="subcat" name="subcat" disabled>
                                                <option>Select Sub-Category</option>
                                            </select>

                                            <!-- Brand -->
                                            <label for="brand">Brand :</label>
                                            <select class="custom-select custom-select-lg mb-2" id="brand" name="brand">
                                                <?php
                                                $sql = "SELECT * FROM tbl_brand";
                                                $result = mysqli_query($conn, $sql);
                                                echo "<option value=''>-- Select a Brand --</option>";
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<option value='" . $row['id'] . "'>" . $row['brand_name'] . "</option>";
                                                }
                                                ?>
                                            </select>

                                            <!-- Product Basic Fields -->
                                            <div class="col-md-6 mb-3">
                                                <label for="pname" class="col-form-label">Product Name :</label>
                                                <input type="text" class="form-control" id="pname" name="pname" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="modelno" class="col-form-label">Model No :</label>
                                                <input type="text" class="form-control" id="modelno" name="modelno" required>
                                            </div>

                                            <!-- Description -->
                                            <div class="col-md-12 mb-3">
                                                <label for="productDescription" class="col-form-label">Product Description :</label>
                                                <textarea id="productDescription" name="productdescription" class="form-control" rows="4" required></textarea>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="file1" class="col-form-label">Image-1 Upload Here :</label>
                                                <input type="file" class="form-control" id="file1" name="file1">
                                                <input type="hidden" id="old_img1" name="old_img1">
                                                <img id="file1_preview" src="" alt="Product Image Preview" style="max-width:150px; margin-top:10px; display:none;">
                                            </div>

                                            <!-- Variant Group -->
                                            <div id="variantRepeater">
                                                <div class="variant-group d-flex mb-2">
                                                    <input type="number" step="1" name="variant_quantity[]" class="form-control mr-2" placeholder="Quantity" required>
                                                    <select name="variant_unit[]" class="custom-select mr-2" required>
                                                        <option value="">Select Unit</option>
                                                        <?php $units = $conn->query("SELECT * FROM tbl_unit");
                                                        while($unit = $units->fetch_assoc())
                                                        { echo "<option value='{$unit['unit_id']}'>{$unit['unit_name']}</option>"; } ?>
                                                    </select>
                                                    <input type="number" step="0.01" name="variant_price[]" class="form-control mr-2" placeholder="Price" required>
                                                    <input type="number" name="variant_stock[]" class="form-control mr-2" placeholder="Stock" min="0" required>
                                                    <button type="button" class="btn btn-danger btn-sm removeVariant">−</button>
                                                </div>
                                            </div>
                                            <!-- Add variant button -->
                                            <button type="button" id="addVariant" class="btn btn-primary btn-sm mb-3">+ Add Variant</button>

                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <input type="submit" name="addproduct" value="Add Product" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>

                                <script>
                                    $(document).ready(function(){
                                        function toggleRemoveButtons() {
                                            const variantCount = $('.variant-group').length;
                                            if(variantCount === 1) {
                                                $('.variant-group .removeVariant').prop('disabled', true);
                                            } else {
                                                $('.variant-group .removeVariant').prop('disabled', false);
                                            }
                                        }

                                        toggleRemoveButtons();

                                        $("#addVariant").click(function(){
                                            console.log("Add Variant Clicked");
                                            const variantGroup = `<div class="variant-group d-flex mb-2">
      <input type="number" step="0.01" name="variant_quantity[]" class="form-control mr-2" placeholder="Quantity" required>
      <select name="variant_unit[]" class="custom-select mr-2" required>
        <option value="">Select Unit</option>
        <?php
                                            $units = $conn->query("SELECT * FROM tbl_unit");
                                            while($unit = $units->fetch_assoc()){
                                                echo "<option value='{$unit['unit_id']}'>{$unit['unit_name']}</option>";
                                            }
                                            ?>
      </select>
        <input type="number" step="0.01" name="variant_price[]" class="form-control mr-2" placeholder="Price" required>
      <input type="number" name="variant_stock[]" class="form-control mr-2" placeholder="Stock" min="0" required>
      <button type="button" class="btn btn-danger btn-sm removeVariant">−</button>
    </div>`;
                                            $("#variantRepeater").append(variantGroup);
                                            toggleRemoveButtons();
                                        });

                                        $(document).on("click", ".removeVariant", function(){
                                            $(this).closest(".variant-group").remove();
                                            toggleRemoveButtons();
                                        });
                                    });

                                // Sub category Selection
                                    $(document).ready(function() {
                                        $("#cat").change(function() {
                                            var catid = $(this).val();
                                            if (catid === "") {
                                                $("#subcat").html("<option>Select Category First</option>");
                                                $("#subcat").prop("disabled", true);
                                            } else {
                                                $.ajax({
                                                    url: "fetch_subcategories.php",  // You need to create this file
                                                    type: "POST",
                                                    data: { categoryid: catid },
                                                    success: function(data) {
                                                        $("#subcat").html(data);
                                                        $("#subcat").prop("disabled", false);

                                                        $(document).trigger('subcategoriesLoaded');

                                                    },
                                                    error: function() {
                                                        $("#subcat").html("<option>Error loading subcategories</option>");
                                                    }
                                                });
                                            }
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
<!--            Show Product Table -->
                <div class="row">
                    <table class="table align-middle mb-0 bg-white" id="tableID">
                        <thead class="bg-light">
                            <tr>
                                <th>Image</th>
                                <th>Name</th>

                                <th>Brand Name</th>
                                <th>Category</th>
                                <th>Total Variant</th>
                                <th>Added On</th>
                                <th>Toggle</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <?php
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $delete = $conn->query("DELETE  FROM `tbl_products` where product_id=$id");
                        }



                        $fetchQuery = "SELECT p.*, (SELECT COUNT(*) FROM tbl_product_variant v WHERE v.product_id = p.product_id) AS variant_count
                                       FROM tbl_products p
                                       ORDER BY product_id DESC;";
                        $query = $conn->query($fetchQuery);


                        ?>
                        <tbody>
                            <?php
                            while ($fetch = $query->fetch_array()) {
                            ?>

                                <tr>
                                    <td><img class="img-polaroid" src="<?php echo $fetch['img1'] ?>" height="70px" width="80px"></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <p class="text-muted mb-0"><?php echo $fetch['name']; ?></p>
                                        </div>
                                    </td>


                                    <td>
                                        <div class="d-flex align-items-center">
                                            <?php
                                            // $bid = $fetch['brandid'];
                                            // $brand_name = $conn->query("SELECT * FROM tbl_brand where id = $bid");
                                            // $brandname_result=$conn->query($brand_name);
                                            // if(mysqli_num_rows($brandname_result)> 0) {
                                            //    $brandname_row=mysqli_fetch_array($brandname_result);
                                            //    $bname = $brandname_row["brand_name"];
                                            // }

                                            $bid = $fetch['brandid'];
                                            $brand_name = "SELECT * FROM tbl_brand WHERE id = $bid";
                                            $bname_result = $conn->query($brand_name);
                                            if (mysqli_num_rows($bname_result) > 0) {
                                                $bname_row = mysqli_fetch_array($bname_result);
                                                $bname = $bname_row["brand_name"];
                                            }
                                            ?>

                                            <p class="text-muted mb-0"><?php echo $bname; ?></p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <?php
                                            $cid = $fetch['categoryid'];
                                            $category_name = "SELECT * FROM tbl_category WHERE categoryid = $cid";
                                            $cname_result = $conn->query($category_name);
                                            if (mysqli_num_rows($cname_result) > 0) {
                                                $cname_row = mysqli_fetch_array($cname_result);
                                                $cname = $cname_row["cname"];
                                            }
                                            ?>
                                            <p class="text-muted mb-0"><?php echo $cname ?></p>
                                        </div>
                                    </td>
<!--                                    Total Variant -->
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <p class="text-muted mb-0">
                                                <?php echo $fetch['variant_count']; ?>
                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <p class="text-muted mb-0"><?php echo $fetch['added_on']; ?></p>
                                        </div>
                                    </td>

                                    <td>
                                        <?php
                                        if ($fetch['status'] == "1")

                                            // if a course is active i.e. status is 1 
                                            // the toggle button must be able to deactivate 
                                            // we echo the hyperlink to the page "deactivate.php" 
                                            // in order to make it look like a button 
                                            // we use the appropriate css 
                                            // red-deactivate 
                                            // green- activate 
                                            echo
                                            "<a href=deactivate.php?id=" . $fetch['product_id'] . " <span class='badge badge-danger rounded-pill d-inline'>Deactivate</span></a>";
                                        else
                                            echo
                                            "<a href=activate.php?id=" . $fetch['product_id'] . " <span class='badge badge-success rounded-pill d-inline'>Activate</span></a>";
                                        ?>
                                    </td>
                                    <td>
                                        <a href="#" class="table-link edit-product-btn" data-id="<?php echo $fetch['product_id']; ?>">
                                            <span class="fa-stack editbutton">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
<!--                                        <a href="product.php?action=delete&id=--><?php //echo $fetch['product_id']; ?><!--" class="table-link danger" onclick="return confirm('Are you sure you want to permanently delete this product?');">-->
<!--                                            <span class="fa-stack">-->
<!--                                                <i class="fa fa-square fa-stack-2x"></i>-->
<!--                                                <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>-->
<!--                                            </span>-->
<!--                                        </a>-->

                                        <a href="#" class="table-link danger delete-product" data-id="<?php echo $fetch['product_id']; ?>">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>

                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
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
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteLabel">Confirm Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to permanently delete this product?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a href="#" class="btn btn-danger" id="confirmDeleteBtn">Delete</a>
                </div>
            </div>
        </div>
    </div>

<!--    Delete Script-->
    <script>
        $(document).ready(function(){
            $('.delete-product').on('click', function(e){
                e.preventDefault();
                var productId = $(this).data('id');
                var deleteUrl = 'product.php?action=delete&id=' + productId;
                $('#confirmDeleteBtn').attr('href', deleteUrl);
                $('#confirmDeleteModal').modal('show');
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.edit-product-btn').click(function(e) {
                e.preventDefault();
                var productId = $(this).data('id');

                $.ajax({
                    url: 'fetch_product.php',  // Create this PHP file to return product JSON data
                    type: 'POST',
                    data: { product_id: productId },
                    success: function(response) {
                        var data = JSON.parse(response);

                        // Populate modal fields
                        $('#addproduct_form #pname').val(data.product.name);
                        $('#addproduct_form #modelno').val(data.product.model_no);
                        $('#addproduct_form #productDescription').val(data.product.description);
                        $('#addproduct_form #brand').val(data.product.brandid);
                         $('#addproduct_form #cat').val(data.product.categoryid).trigger('change');

                        $(document).one('subcategoriesLoaded', function () {
                            $('#addproduct_form #subcat')
                                .val(data.product.subcategoryid)
                                .prop('disabled', false);
                        });
                        // Set hidden product id for update context
                        $('#addproduct_form #edit_product_id').val(productId);

                        // Image preview & hidden input
                        if (data.product.img1) {
                            $('#file1_preview').attr('src', data.product.img1).show();
                            $('#old_img1').val(data.product.img1);
                        } else {
                            $('#file1_preview').hide();
                            $('#old_img1').val('');
                        }

                        // Clear variants container
                        $('#variantRepeater').empty();

                        // Populate variants dynamically
                        $.each(data.variants, function(i, variant) {
                            var variantGroup =
                                '<div class="variant-group d-flex mb-2">' +
                                '<input type="number" step="1" name="variant_quantity[]" class="form-control mr-2" placeholder="Quantity" required value="' + variant.variant_quantity + '">' +
                                '<select name="variant_unit[]" class="custom-select mr-2" required>' +
                                '<option value="">Select Unit</option>' +
                                `<?php
                                $units = $conn->query("SELECT * FROM tbl_unit");
                                while($unit = $units->fetch_assoc()) {
                                echo "<option value='{$unit['unit_id']}'";
                                ?>` + (variant.unit_id == <?php echo $unit['unit_id']; ?> ? ' selected' : '') + `<?php
                                echo ">{$unit['unit_name']}</option>";
                                }
                                ?>` +
                            '</select>' +  // populate options below
                                '<input type="number" step="0.01" name="variant_price[]" class="form-control mr-2" placeholder="Price" required value="' + variant.price + '">' +
                                '<input type="number" name="variant_stock[]" class="form-control mr-2" placeholder="Stock" min="0" required value="' + variant.stock + '">' +
                                '<button type="button" class="btn btn-danger btn-sm removeVariant">−</button>' +
                                '</div>';

                            $('#variantRepeater').append(variantGroup);
                        });

                        // Show modal
                        $('#addproduct').modal('show');

                    },
                    error: function() {
                        alert('Failed to fetch product details');
                    }
                });
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
<!--    reser add product model-->
    <script>
        $('#addproduct').on('show.bs.modal', function (e) {
            // Clear all input fields except buttons
            $(this).find('form')[0].reset();

            //Clear a Image preview
            $(this).find('#old_img1').val("");
            $(this).find('#file1_preview').src("");


            // Clear the variant repeater container and add a fresh one variant group
            const variantRepeater = $(this).find('#variantRepeater');
            variantRepeater.empty();

            const variantGroup = `<div class="variant-group d-flex mb-2">
        <input type="number" step="1" name="variant_quantity[]" class="form-control mr-2" placeholder="Quantity" required>
        <select name="variant_unit[]" class="custom-select mr-2" required>
            <option value="">Select Unit</option>
            <?php
            $units = $conn->query("SELECT * FROM tbl_unit");
            while($unit = $units->fetch_assoc()){
                echo "<option value='{$unit['unit_id']}'>{$unit['unit_name']}</option>";
            }
            ?>
        </select>
        <input type="number" step="0.01" name="variant_price[]" class="form-control mr-2" placeholder="Price" required>
        <input type="number" name="variant_stock[]" class="form-control mr-2" placeholder="Stock" min="0" required>
        <button type="button" class="btn btn-danger btn-sm removeVariant">−</button>
    </div>`;

            variantRepeater.append(variantGroup);

            // Disable remove button on single variant group
            $(this).find('.variant-group .removeVariant').prop('disabled', true);
        });
    </script>


    <script>
        $(document).ready(function() {
            // Initialize DataTable on your table
            var dataTable = $('#tableID').DataTable({
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
#sub category Selection
if (isset($catid)) {
    $sql = "SELECT * FROM tbl_subcategory WHERE categoryid = $catid";
    $result_subcat = $conn->query($sql);

    if ($result_subcat->num_rows > 0) {
        echo "<option value=''>-- Select a Subcategory --</option>";
        while ($row = $result_subcat->fetch_assoc()) {
            echo "<option value='" . $row['subcategoryid'] . "'>" . $row['sname'] . "</option>";
        }
    } else {
        echo "<option value=''>-- No Categories Found --</option>";
    }
}
?>

<?php
#Add-Product Code
if (isset($_POST['addproduct'])) {
if (isset($_POST['edit_product_id']) && !empty($_POST['edit_product_id'])) {
    // Update existing product and variants
    $productId = intval($_POST['edit_product_id']);
    $category = intval($_POST['cat']);
    $subcategory = intval($_POST['subcat']);
    $brand = intval($_POST['brand']);
    $pname = $conn->real_escape_string($_POST['pname']);
    $modelno = $conn->real_escape_string($_POST['modelno']);
    $description = $conn->real_escape_string($_POST['productdescription']);

    // Handle image upload if new image provided
    $imagePath = null;
    if (isset($_FILES['file1']) && $_FILES['file1']['error'] == UPLOAD_ERR_OK) {
        $imageName = basename($_FILES['file1']['name']);
        $imageTmpName = $_FILES['file1']['tmp_name'];
        $datePrefix = date('Ymd') . '_' . uniqid() . '_';
        $newFileName = $datePrefix . $imageName;
        $targetedDir = 'uploads/products/';
        if (!file_exists($targetedDir)) {
            mkdir($targetedDir, 0755, true);
        }
        $imagePath = $targetedDir . $newFileName;
        if (!move_uploaded_file($imageTmpName, $imagePath)) {
            die("Failed to upload new image.");
        }
    }

    // Update tbl_products - image only if new provided
    if ($imagePath) {
        $stmt = $conn->prepare("UPDATE tbl_products SET name=?, description=?, model_no=?, img1=?, brandid=?, categoryid=?, subcategoryid=? WHERE product_id=?");
        $stmt->bind_param("ssssiiii", $pname, $description, $modelno, $imagePath, $brand, $category, $subcategory, $productId);
    } else {
        $stmt = $conn->prepare("UPDATE tbl_products SET name=?, description=?, model_no=?, brandid=?, categoryid=?, subcategoryid=? WHERE product_id=?");
        $stmt->bind_param("sssiiii", $pname, $description, $modelno, $brand, $category, $subcategory, $productId);
    }

    if (!$stmt->execute()) {
        die("Failed to update product: " . $stmt->error);
    }
    $stmt->close();

    // Delete existing variants
    $delStmt = $conn->prepare("DELETE FROM tbl_product_variant WHERE product_id = ?");
    $delStmt->bind_param("i", $productId);
    $delStmt->execute();
    $delStmt->close();

    // Insert new variants
    $quantities = $_POST['variant_quantity'];
    $prices = $_POST['variant_price'];
    $units = $_POST['variant_unit'];
    $stocks = $_POST['variant_stock'];

    $variantStmt = $conn->prepare("INSERT INTO tbl_product_variant (product_id, variant_quantity, price, unit_id, stock) VALUES (?, ?, ?, ?, ?)");
    if (!$variantStmt) {
        die("Prepare variant failed: " . $conn->error);
    }

    for ($i = 0; $i < count($quantities); $i++) {
        $qty = floatval($quantities[$i]);
        $price = floatval($prices[$i]);
        $unitId = intval($units[$i]);
        $stock = intval($stocks[$i]);

        $variantStmt->bind_param("iddii", $productId, $qty, $price, $unitId, $stock);
        if (!$variantStmt->execute()) {
            die("Failed to insert variant: " . $variantStmt->error);
        }
    }
    $variantStmt->close();

    echo "<script>alert('Product updated successfully!'); window.location.href='product.php';</script>";
} else {
    $category = intval($_POST['cat']);
    $subcategory = intval($_POST['subcat']);
    $brand = intval($_POST['brand']);
    $pname = $conn->real_escape_string($_POST['pname']);
    $modelno = $conn->real_escape_string($_POST['modelno']);
    $description = $conn->real_escape_string($_POST['productdescription']);

    $imageName = $_FILES['file1']['name'];
    $originalName = basename($_FILES['file1']['name']);
    $imageTmpName = $_FILES['file1']['tmp_name'];

    // Generate unique prefix with date and a random number
    $datePrefix = date('Ymd') . '_' . uniqid() . '_';
    // Combine to form new filename
    $newFileName = $datePrefix . $originalName;

    $targetedDir = 'uploads/products/';
    if (!file_exists($targetedDir)) {
        mkdir($targetedDir, 0755, true);  // true to allow recursive creation
    }
    $imagePath = $targetedDir . $newFileName;

    if (move_uploaded_file($imageTmpName, $imagePath)) {
        // Insert product
        $stmt = $conn->prepare("INSERT INTO tbl_products (name, description, model_no, img1, brandid, categoryid, subcategoryid, added_on, status) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(),1)");
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param('ssssiii', $pname, $description, $modelno, $imagePath, $brand, $category, $subcategory);
//        if (!$stmt->execute()) {
//            die("Execute failed: " . $stmt->error);
//        }

        if ($stmt->execute()) {
            $productId = $stmt->insert_id;

            // Insert variants
            $quantities = $_POST['variant_quantity'];
            $units = $_POST['variant_unit'];
            $stocks = $_POST['variant_stock'];
            $variantPrices = $_POST['variant_price'];

            $variantStmt = $conn->prepare("INSERT INTO tbl_product_variant (product_id, variant_quantity,price, unit_id, stock) VALUES (?, ?, ?,?, ?)");
            if (!$variantStmt) {
                die("Prepare variant failed: " . $conn->error);
            }

            for ($i = 0; $i < count($quantities); $i++) {
                $qty = floatval($quantities[$i]);
                $price = floatval($variantPrices[$i]);
                $unitId = intval($units[$i]);
                $stock = intval($stocks[$i]);

                $variantStmt->bind_param('iddii', $productId, $qty, $price, $unitId, $stock);
                if (!$variantStmt->execute()) {
                    die("Execute variant failed: " . $variantStmt->error);
                }
            }
            $variantStmt->close();


            echo "<script>alert('Product added successfully with variants.'); location.href='product.php';</script>";

        } else {
            echo "<script>alert('Failed to insert product: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Failed to upload image.');</script>";
    }
    }
}
?>

<!--// delete product-->
<?php
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
$id = intval($_GET['id']); // Sanitize input

// Delete related stock records first
$conn->query("DELETE FROM tbl_stock WHERE productid = $id");

// Then delete the product
$delete = $conn->query("DELETE FROM tbl_products WHERE product_id = $id");

if ($delete) {
echo "<script>alert('Product deleted successfully.'); window.location.href='product.php';</script>";
} else {
$error = $conn->error;
echo "<script>alert('Failed to delete the product. SQL Error: $error'); window.location.href='product.php';</script>";
}
exit();
}
?>
