<?php
require '../include/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Panel - Orders</title>
    <!-- Required CSS links (Update according to your assets) -->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/app-lite.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/pages/dashboard-ecommerce.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">


</head>
<body class="vertical-layout vertical-menu 2-columns menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">
<?php include '../admin/navbar.php'; ?>

<!-- Sidebar -->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true" data-img="theme-assets/images/backgrounds/02.jpg">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="#"><img class="brand-logo" src="theme-assets/images/logo/logo.png" alt="Logo"/><h3 class="brand-text">Wohl Reactions</h3></a>
            </li>
            <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
    </div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item"><a href="index.php"><i class="ft-home"></i><span class="menu-title">Dashboard</span></a></li>
            <li class="nav-item"><a href="customer.php"><i class="ft-user"></i><span class="menu-title">Customer</span></a></li>
            <li class="nav-item"><a href="category.php"><i class="ft-box"></i><span class="menu-title">Category</span></a></li>
            <li class="nav-item"><a href="product.php"><i class="ft-maximize"></i><span class="menu-title">Product</span></a></li>
            <li class="active"><a href="order.php"><i class="ft-bookmark"></i><span class="menu-title">Order</span></a></li>
        </ul>
    </div>
    <div class="navigation-background"></div>
</div>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body"><br>
            <h1>Order Details</h1><br>
            <div class="row">
                <div class="table-responsive">
                    <table class="table align-middle mb-0 bg-white" id="tableID">
                    <thead class="bg-light">
                    <tr>
                        <th>#</th>
                        <th>Order #</th>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Contact No</th>
                        <th>Address</th>
                        <th>Amount</th>
                        <th>Payment Date</th>
                        <th>Status</th>
                        <th>Invoice</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    $sql = "SELECT 
           o.id,
           o.order_number, 
           o.amount, 
           o.payment_date, 
           o.status, 
           o.address, 
           o.contact_no,
           o.payer_email, 
           u.fullname, 
           u.email AS user_email 
        FROM tbl_order o
        LEFT JOIN tbl_user u ON o.user_id = u.id
        ORDER BY o.payment_date DESC";
                    $result = $conn->query($sql);
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>{$i}</td>";
                            echo "<td>{$row['order_number']}</td>";
                            echo "<td>".htmlspecialchars($row['fullname'])."</td>";
                            echo "<td>".htmlspecialchars($row['user_email'])."</td>";
                            echo "<td>".htmlspecialchars($row['contact_no'])."</td>";
                            echo "<td>".htmlspecialchars($row['address'])."</td>";
                            echo "<td>{$row['amount']}</td>";
                            echo "<td>{$row['payment_date']}</td>";
                            echo "<td>{$row['status']}</td>";
                            echo "<td><a href='/invoice.php?order_id={$row['id']}' target='_blank'><i class='ft-eye'></i></a></td>";
                            echo "</tr>";
                            $i++;
                        }
                    } else {
                        echo "<tr><td colspan='9'>No orders found.</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
        <span class="float-md-left d-block d-md-inline-block">2023 &copy; Copyright <a class="text-bold-800 grey darken-2" href="../admin/index.php">Wohl Reactions</a></span>
        <ul class="list-inline float-md-right d-block d-md-inline-blockd-none d-lg-block mb-0">
            <li class="list-inline-item"><a class="my-1" href="#"> Support</a></li>
        </ul>
    </div>
</footer>
<!-- JS scripts as needed -->
<script src="theme-assets/vendors/js/vendors.min.js"></script>
<script src="theme-assets/vendors/js/charts/chartist.min.js"></script>
<script src="theme-assets/js/core/app-menu-lite.js"></script>
<script src="theme-assets/js/core/app-lite.js"></script>
<script src="theme-assets/js/scripts/pages/dashboard-lite.js"></script>

<!-- jQuery (needed for DataTables) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>


<script>
    $(document).ready(function() {
        $('#tableID').DataTable({
            dom: 'Bfrtip',  // Show buttons
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            pageLength: 10,
            order: [[ 1, "desc" ]], // Order by Order # descending
            responsive: true
        });
    });
</script>
</body>
</html>