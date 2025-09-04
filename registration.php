<?php
require 'include/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="output.css">
    <title>Registation</title>
    <link rel="icon" href="../img/logo.png" type="image/x-icon">

    <style>
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

<body><a href="index.php">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 backtohome">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
        </svg> </a>
    <a href="index.php">

        <p class="heading">
            Wohl Reactions | Premium Skincare & Grooming
        </p>
    </a>
    <!--<section class="flex items-center justify-center rounded-md bg-black/80 py-3 px-[35.5rem]">-->
    <section class="border-black/80 border-4 mx-[35.5rem] my-5">

        <div class="items-center justify-center bg-white px-4 py-10 sm:px-6 sm:py-16 lg:px-10">
            <div class="xl:mx-auto xl:w-full xl:max-w-sm 2xl:max-w-md">

                <h2 class="text-center text-2xl font-bold leading-tight text-black">
                    Sign up to create account
                </h2>

                <form action="" method="POST" id="registration_form" class="mt-8">
                    <div class="space-y-5">
                        <!-- name -->
                        <div>
                            <label for="name" class="text-base font-medium text-gray-900">
                                Full Name
                            </label>
                            <div class="mt-2">
                                <input class="flex h-10 w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50" name="name" type="text" placeholder="Full Name" id="name" />
                            </div>
                        </div>

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

                        <!-- confirm password -->
                        <div>
                            <div class="flex items-center justify-between">
                                <label for="confirm password" class="text-base font-medium text-gray-900">
                                    Confirm Password
                                </label>
                            </div>
                            <div class="mt-2">
                                <input class="flex h-10 w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50" name="confpassword" type="password" placeholder="Confirm Password" id="confpassword" />
                            </div>
                        </div>

                        <!-- contact number -->
                        <div>
                            <label for="contact" class="text-base font-medium text-gray-900">
                                Contact Number
                            </label>
                            <div class="mt-2">
                                <input class="flex h-10 w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50" name="contact" type="tel" placeholder="Contact Number" id="contact" />
                            </div>
                        </div>

                        <!-- gender -->
                        <div>
                            <label for="gender" class="text-base font-medium text-gray-900">
                                Gender
                            </label>
                            <div class="mt-2 flex space-x-16 justify-center">
                                <div>
                                    <input class="gender cursor-pointer disabled:cursor-not-allowed disabled:opacity-50 w-10" type="radio" name="gender" value="male" id="gender" /> Male
                                </div>
                                <div>
                                    <input class="gender cursor-pointer disabled:cursor-not-allowed disabled:opacity-50 w-10" type="radio" name="gender" value="female" id="gender" /> Female
                                </div>
                                <div>
                                    <input class="gender cursor-pointer disabled:cursor-not-allowed disabled:opacity-50 w-10" type="radio" name="gender" value="other" id="gender" /> Other
                                </div>
                            </div>
                            <label id="gender-error" class="error" for="gender"></label>
                        </div>

                        <!-- state & city -->
                        <div class="flex space-x-8">
                            <div class="state">
                                <label for="state" class="text-base font-medium text-gray-900">
                                    State
                                </label>
                                <div class="mt-2">
                                    <select class="cursor-pointer  disabled:cursor-not-allowed disabled:opacity-50 w-52 rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1" name="state" id="state">
                                        <?php
                                        $sql = "SELECT * FROM tblstate";
                                        $result = mysqli_query($conn, $sql);
                                        echo "<option value=''>-- Select a State --</option>";
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option class='' value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                        }
                                        $stateId = $_POST['sid'];
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="city">
                                <label for="city" class="text-base font-medium text-gray-900">
                                    City
                                </label>
                                <div class="mt-2">
                                    <select class="cursor-pointer  disabled:cursor-not-allowed disabled:opacity-50 w-52 rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1" name="city" id="city" disabled>
                                        <option value="">-- Select State First --</option>
                                    </select>
                                </div>
                            </div>
                        </div>



                        <!-- sign up button -->
                        <div>
                            <input type="submit" name="register" value="Sign up" class="inline-flex w-full items-center justify-center rounded-md bg-black px-3.5 py-2.5 font-semibold leading-7 text-white hover:bg-black/80 cursor-pointer">
                        </div>

                        <div class=" justify-center mx-20">
                            <p class="mt-2 text-base text-gray-600">
                                Already have an account?
                                <a href="login.php" title="" class="font-medium text-black transition-all duration-200 hover:underline">
                                    Sign In
                                </a>
                            </p>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
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
// Customer Registration
if (isset($_POST['register'])) {
    // include 'mail_config.php';
    $email = $_POST['email'];
    $check_email = "SELECT * FROM tbl_user WHERE email = '$email'";
    $result_email = mysqli_query($conn, $check_email);
    if (mysqli_num_rows($result_email) > 0) {
        echo "<script>toastr.error('Email already Exist..!')</script>";
        return false;
    } else {

        $email = $_POST['email'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $confpassword = $_POST['confpassword'];
        // $encpass = password_hash($password, PASSWORD_DEFAULT);
        $city = $_POST['city'];
        $contact = $_POST['contact'];
        $gender = $_POST['gender'];
        $role = "customer";

        // Setting Session Variables
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['confpassword'] = $confpassword;
        $_SESSION['city'] = $city;
        $_SESSION['contact'] = $contact;
        $_SESSION['gender'] = $gender;

        include 'mail_config.php';
        echo "<script>toastr.success('OTP Sent Successfully on $email.....!')</script>";
        echo "<script>location.href='registration_otp.php'</script>";
    }
}
?>