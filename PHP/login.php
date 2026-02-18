<?php
require 'include/connection.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- CSS -->
    <link rel="stylesheet" href="output.css">
    <title>Login</title>
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
        .error {
            color: red;
        }

        .backtohome {
            margin: 10px;
        }

        .heading {
            color: black;
            font-weight: bolder;
            text-align: center;
            font-size: 40px;
        }
    </style>
</head>

<body>
    <div class="colorlib-loader"></div>


    <a href="index.php">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 backtohome">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
        </svg> </a>
        <a href="index.php">

<p class="heading">
    Wohl Reactions | Premium Skincare & Grooming
</p>
</a>

    <!--<section class="flex items-center justify-center rounded-md bg-black/80 py-3 px-[35.5rem]">-->
    <section class="border-black/80 border-4 my-24 mx-10 md:mx-24 xl:mx-[27.5rem]">

        <div class="items-center justify-center bg-white px-4 py-10 sm:px-6 sm:py-16 lg:px-10">
            <div class="lg:mx-auto lg:w-full lg:max-w-sm 2xl:max-w-md">

                <h2 class="text-center text-2xl font-bold leading-tight text-black">
                    Sign in to account
                </h2>
                <form action="" method="POST" name="login_form" id="login_form" class="mt-8">
                    <div class="space-y-5">
                        <!-- email -->
                        <div>
                            <label for="email" class="text-base font-medium text-gray-900">
                                Email address
                            </label>
                            <div class="mt-2">
                                <input class="flex h-10 w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50" name="email" type="email" placeholder="Email" id="email" />
                            </div>
                        </div>

                        <!-- password -->
                        <div>
                            <div class="flex items-center justify-between">
                                <label for="password" class="text-base font-medium text-gray-900">
                                    Password
                                </label>
                            </div>
                            <div class="mt-2">
                                <input class="flex h-10 w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50" name="password" type="password" placeholder="Password" id="password" />
                            </div>
                        </div>

                        <!-- forgot password -->
                        <div class="items-center justify-center text-center">
                            <p class="mt-2 text-base text-gray-600">
                                Forgot Password? Don't worry
                                <a href="forgot_password.php" title="" class="font-medium text-black transition-all duration-200 hover:underline">
                                    Click here
                                </a>
                            </p>
                        </div>

                        <!-- Sign in button -->
                        <div>
                            <input type="submit" name="login" value="Sign in" class="inline-flex w-full items-center justify-center rounded-md bg-black px-3.5 py-2.5 font-semibold leading-7 text-white hover:bg-black/80 cursor-pointer">
                        </div>

                        <div class="items-center justify-center text-center">
                            <p class="mt-2 text-base text-gray-600">
                                Don't have an account?
                                <a href="registration.php" title="" class="font-medium text-black transition-all duration-200 hover:underline">
                                    Sign up
                                </a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script>
        // Form Validate
        $('#login_form').validate({
            rules: {
                'email': {
                    required: true,
                    email: true,
                },
                'password': {
                    required: true,
                }
            },
            messages: {
                'email': {
                    required: "Please Enter Email"
                },
                'password': {
                    required: "Please Enter Password"
                },
            }
        })
    </script>

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
</body>

</html>

<?php
// Login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // password decryption
    $fetch = "SELECT * FROM tbl_user WHERE email = '$email'";
    $result = mysqli_query($conn, $fetch);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $encpass = password_verify($password, $row['password']);


        if ($password != "" && $password != "") {
            $fetch_role = "SELECT role FROM tbl_user WHERE email = '$email' AND password = '$encpass'";
            $result_role = mysqli_query($conn, $fetch);
            $role = mysqli_fetch_assoc($result);
            if (mysqli_num_rows($result_role) > 0) {
                while ($row_role = mysqli_fetch_assoc($result_role)) {
                    $role = $row_role['role'];
                }
            }
        }

        // $login = "SELECT * FROM tbluser WHERE email = '$email' AND password = '$encpass' AND role = '$role'";
        // $result_login = mysqli_query($conn, $login);
        // $row = mysqli_fetch_array($result_login);
        if ($row['email'] == $email && $row['password'] == $encpass && $row['role'] == $role) {
            if ($role == "0") {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                echo "<script> location.href = './admin/index.php'</script>";
            } 
            else {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                echo "<script> location.href = 'index.php'</script>";
            }
        } else {
            echo "<script> toastr.error('Invalid email or password')</script>";
        }
    } else {
        echo "<script>toastr.error('Oops! Credantials does\'t Matched!')</script>";
        // echo "<script> alert('Email not Found!')</script>";
    }
}
?>