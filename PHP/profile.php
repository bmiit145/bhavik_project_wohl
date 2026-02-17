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
        <?php include 'header.php';

        if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
        }


        $stmt = $conn->prepare("SELECT * FROM tbl_user where id=$id");
        $stmt->execute();
        $result = $stmt->get_result();

        ?>



        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p class="bread"><span><a href="index.php">Home</a></span> / <span>Profile</span></p>
                    </div>
                </div>
            </div>
        </div>


        <!-- <div id="colorlib-contact"> -->
        <div class="container">

            <div class="row">
                <div class="col-md-6">
                    <div class="contact-wrap">
                        <h3>Update Your Personal Details</h3>
                        <?php
                        while ($row = $result->fetch_assoc()) :
                        ?>
                            <form action="" method="post" class="contact-form">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="fname">Full Name</label>
                                            <input type="text" id="name" class="form-control" name="name" value="<?php echo $row['fullname']; ?>">
                                        </div>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" class="form-control" id="email" value="<?php echo $row['email']; ?>">
                                        </div>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="subject">Conatct No</label>
                                            <input type="tel" id="contact" name="contact" class="form-control" value="<?php echo $row['contact_no']; ?>">
                                        </div>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="message">State </label>
                                            <select class="custom-select custom-select-lg mb-2" name="state" id="state">
                                                <?php
                                                $sql = "SELECT * FROM tblstate";
                                                $result = mysqli_query($conn, $sql);
                                                // echo "<option value=''>-- Select a State --</option>";
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $selected = $selected_state == $row['sid'] ? 'selected' : '';
                                                    $sid = $city["city"];
                                                    echo "<option class='' value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                                }
                                                $stateId = $_POST['sid'];
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="message">City</label>
                                            <select class="custom-select custom-select-lg mb-2" name="city" id="city" disabled>
                                                <?php
                                                $sql = "SELECT * FROM tblcity";
                                                $result = mysqli_query($conn, $sql);
                                                echo "<option value=''>-- Select a Category --</option>";
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<option class='' value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                                }
                                                $catid = $_POST['categoryid'];
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="submit" name="update" value="Update Details" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- <div class="col-sm-6"> -->
                    <!-- <div class="owl-carousel"> -->

                    <div class="item">
                        <div class="product-entry border">
                            <a href="#" class="prod-img">
                                <img src="./images/profile.png" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <!-- </div> -->

                    <!-- </div> -->
                </div>
            </div>
        </div>
        <!-- </div> -->
        <?php include 'footer.php'; ?>
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
    </div>

    <script>
        // City Selection
        $("#state").change(function() {
            var stateId = $(this).val();
            if (stateId === "") {
                $("#city").html("<option value=''>-- Select State First --</option>");
                $("#city").prop("disabled", true);
            } else {
                $.ajax({
                    type: "POST",
                    url: "registration.php",
                    data: {
                        sid: stateId
                    },
                    success: function(response) {
                        $("#city").prop("disabled", false);
                        $("#city").html(response);
                    },
                });
            }
        });

        // Form Validation
        $("#registration_form").validate({
            rules: {
                'name': {
                    required: true,
                },
                'email': {
                    required: true,
                    email: true,
                },
                'password': {
                    required: true,
                },
                'confpassword': {
                    required: true,
                    equalTo: "#password",
                },
                'contact': {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10,
                },
                'gender': {
                    required: true,
                },
                // 'gender': {
                //     require_from_group: [1,'.gender']
                // },
                'state': {
                    required: true,
                },
                'city': {
                    required: true,
                },
                'otp': {
                    required: true,
                    number: true,
                    minlength: 6,
                    maxlength: 6,
                },
            },
            messeges: {
                'name': {
                    required: "Please Enter Name",
                },
                'email': {
                    required: "Please Enter Email",
                    email: "Please Enter Valid Email",
                },
                'password': {
                    required: "Please Enter Password",
                },
                'confpassword': {
                    required: "Please Enter Confirm Password",
                    equalTo: "Password not match",
                },
                'contact': {
                    required: "Please Enter Contact Number",
                    number: "Please Enter Valid Contact Number",
                    minlength: "Please Enter 10 Digit Contact Number",
                    maxlength: "Please Enter 10 Digit Contact Number",
                },
                'gender': {
                    required: "Please Select Geneder",
                },
                // 'gender':{
                //     require_from_group: "Please Select Gender",
                // },
                'state': {
                    required: "Please Select State",
                },
                'city': {
                    required: "Please Select City",
                },
                'otp': {
                    required: "Please Enter OTP",
                    number: "Please Enter Valid OTP",
                    minlength: "Please Enter 6 Digit OTP",
                    maxlength: "Please Enter 6 Digit OTP",
                },
            }
        })
    </script>
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

<?php
// City Selection
if (isset($stateId)) {
    $sql = "SELECT * FROM tblcity WHERE sid = $stateId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<option value=''>-- Select a City --</option>";
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
        }
    } else {
        echo "<option value=''>-- No Cities Found --</option>";
    }
}
?>

<?php

// require '../includes/conn.php';
if (isset($_POST['update'])) {
    // print_r($_POST);
    //  exit;

    $fname = $_POST['name'];
    // $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['contact'];
    $cityid = $_POST['city'];

    $update = "UPDATE tbl_user SET fullname='$fname', email='$email', contact_no='$phone', city='$cityid' where id=$id";
    $result = mysqli_query($conn, $update);
    if ($result) {
        echo "<script>toastr.sucess('Update Profile  Successfully Completed!')</script>";
        echo "<script>location.href='index.php'</script>";
    } else {
        echo "error:" . $conn->error;
        echo "<script>toastr.error('Update Profile  Failed!  Try Again!')</script>";
    }
}

?>