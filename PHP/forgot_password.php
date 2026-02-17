<?php
require 'include/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="output.css">
    <title>Login</title>
    <link rel="icon" href="../img/logo.png" type="image/x-icon">

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
    <section class="border-black/80 border-4 my-24 mx-[27.5rem]">
        <div class="items-center justify-center bg-white px-4 py-10 sm:px-6 sm:py-16 lg:px-10">
            <div class="xl:mx-auto xl:w-full xl:max-w-sm 2xl:max-w-md">
                <!-- <div class="mb-2">
                    <svg width="50" height="56" viewBox="0 0 50 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M23.2732 0.2528C20.8078 1.18964 2.12023 12.2346 1.08477 13.3686C0 14.552 0 14.7493 0 27.7665C0 39.6496 0.0986153 41.1289 0.83823 42.0164C2.12023 43.5449 23.2239 55.4774 24.6538 55.5267C25.9358 55.576 46.1027 44.3832 48.2229 42.4602C49.3077 41.474 49.3077 41.3261 49.3077 27.8158C49.3077 14.3055 49.3077 14.1576 48.2229 13.1714C46.6451 11.7415 27.1192 0.450027 25.64 0.104874C24.9497 -0.0923538 23.9142 0.00625992 23.2732 0.2528ZM20.2161 21.8989C20.2161 22.4906 18.9835 23.8219 17.0111 25.3997C15.2361 26.7803 13.8061 27.9637 13.8061 28.0623C13.8061 28.1116 15.2361 29.0978 16.9618 30.2319C18.6876 31.3659 20.2655 32.6479 20.4134 33.0917C20.8078 34.0286 19.871 35.2119 18.8355 35.2119C17.8001 35.2119 9.0233 29.3936 8.67815 28.5061C8.333 27.6186 9.36846 26.5338 14.3485 22.885C17.6521 20.4196 18.4904 20.0252 19.2793 20.4196C19.7724 20.7155 20.2161 21.3565 20.2161 21.8989ZM25.6893 27.6679C23.4211 34.9161 23.0267 35.7543 22.1391 34.8668C21.7447 34.4723 22.1391 32.6479 23.6677 27.9637C26.2317 20.321 26.5275 19.6307 27.2671 20.3703C27.6123 20.7155 27.1685 22.7864 25.6893 27.6679ZM36.0932 23.2302C40.6788 26.2379 41.3198 27.0269 40.3337 28.1609C39.1503 29.5909 31.6555 35.2119 30.9159 35.2119C29.9298 35.2119 28.9436 33.8806 29.2394 33.0424C29.3874 32.6479 30.9652 31.218 32.7403 29.8867L35.9946 27.4706L32.5431 25.1532C30.6201 23.9205 29.0915 22.7371 29.0915 22.5892C29.0915 21.7509 30.2256 20.4196 30.9159 20.4196C31.3597 20.4196 33.6771 21.7016 36.0932 23.2302Z" fill="black"></path>
                    </svg>
                </div> -->
                <h2 class="text-center text-xl font-bold leading-tight text-black">
                    Forgot Password? Don't worry, we got you!
                </h2>

                <div class="items-center justify-center mx-20">
                    <form action="" method="POST" id="forgot_password_form" class="mt-8">
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
                                        New Password
                                    </label>
                                </div>
                                <div class="mt-2">
                                    <input class="flex h-10 w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50" name="password" type="password" placeholder="New Password" id="password" />
                                </div>
                            </div>

                            <!-- confirm password -->
                            <div>
                                <div class="flex items-center justify-between">
                                    <label for="confirm New password" class="text-base font-medium text-gray-900">
                                        Confirm New Password
                                    </label>
                                </div>
                                <div class="mt-2">
                                    <input class="flex h-10 w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50" name="confpassword" type="password" placeholder="Confirm New Password" id="confpassword" />
                                </div>
                            </div>

                            <!-- change password button -->
                            <div>
                                <input type="submit" name="change_password" value="Change Password Now" class="inline-flex w-full items-center justify-center rounded-md bg-black px-3.5 py-2.5 font-semibold leading-7 text-white hover:bg-black/80 cursor-pointer">
                            </div>

                        </div>
                    </form>
                    <!-- <div class="mt-3 space-y-3">
                        <button type="button" class="relative inline-flex w-full items-center justify-center rounded-md border border-gray-400 bg-white px-3.5 py-2.5 font-semibold text-gray-700 transition-all duration-200 hover:bg-gray-100 hover:text-black focus:bg-gray-100 focus:text-black focus:outline-none">
                            <span class="mr-2 inline-block">
                                <svg class="h-6 w-6 text-rose-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M20.283 10.356h-8.327v3.451h4.792c-.446 2.193-2.313 3.453-4.792 3.453a5.27 5.27 0 0 1-5.279-5.28 5.27 5.27 0 0 1 5.279-5.279c1.259 0 2.397.447 3.29 1.178l2.6-2.599c-1.584-1.381-3.615-2.233-5.89-2.233a8.908 8.908 0 0 0-8.934 8.934 8.907 8.907 0 0 0 8.934 8.934c4.467 0 8.529-3.249 8.529-8.934 0-.528-.081-1.097-.202-1.625z"></path>
                                </svg>
                            </span>
                            Sign up with Google
                        </button>
                        <button type="button" class="relative inline-flex w-full items-center justify-center rounded-md border border-gray-400 bg-white px-3.5 py-2.5 font-semibold text-gray-700 transition-all duration-200 hover:bg-gray-100 hover:text-black focus:bg-gray-100 focus:text-black focus:outline-none">
                            <span class="mr-2 inline-block">
                                <svg class="h-6 w-6 text-[#2563EB]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M13.397 20.997v-8.196h2.765l.411-3.209h-3.176V7.548c0-.926.258-1.56 1.587-1.56h1.684V3.127A22.336 22.336 0 0 0 14.201 3c-2.444 0-4.122 1.492-4.122 4.231v2.355H7.332v3.209h2.753v8.202h3.312z"></path>
                                </svg>
                            </span>
                            Sign up with Facebook
                        </button>
                    </div> -->
                </div>
            </div>
        </div>
    </section>

    <script>
        // From Validate
        $('#forgot_password_form').validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,

                },
                confpassword: {
                    required: true,
                    equalTo: "#password"
                }
            },
            messages: {
                email: {
                    required: "Please Enter Email"
                },
                password: {
                    required: "Please Enter Password"
                },
                confpassword: {
                    required: "Please Enter Confirm Password",
                    equalTo: "Password and Confirm Password do not matched!"
                }
            }
        })
    </script>
</body>
<?php
if (isset($_POST['change_password'])) {


    $email = $_POST['email'];

    $emailquery = "select * from tbluser where email='$email'";
    $query = mysqli_query($conn, $emailquery);

    $emailcount = mysqli_num_rows($query);

    if ($emailcount) {
        $password = $_POST['password'];
        $confpassword = $_POST['confpassword'];
        // $encpass = password_hash($password, PASSWORD_BCRYPT);

        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['confpassword'] = $confpassword;
        echo "<script>
        toastr.success('Verification code sent to $email... ')
        </script>";
        include 'pass_mail.php';

        echo "<script>location.href='forgot_password_otp.php'</script>";
    } else {
        echo "<script>toastr.error</script>('Email Not Found')</script>";
        echo "<script>location.href='forgot_password.php'</script>";
    }
}
?>

</html> 