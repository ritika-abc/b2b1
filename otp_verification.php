<?php
session_start();
// if (!isset($_SESSION["user_email"])) {
//     header("Location:supplier-register.php");
// }
// if ($_SESSION["user_email"] == $_SESSION["user_email"] ) {
//     header("location:supplier-register.php");
// }
// Database connection parameters
include_once "./admin/config.php";


// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Handle form submission
if (isset($_POST['submit'])) {
    // Retrieve OTP entered by the user
    $entered_otp = $_POST["otp"];

    // Retrieve stored OTP from session
    $stored_otp = $_SESSION["otp"];

    // Check if entered OTP matches stored OTP
    if ($entered_otp == $stored_otp) {
        // OTP is correct
        header("location:supplier-login.php");
        echo "<script>alert('OTP verification successful. You can now proceed with registration.')</script>";

        // Here you can perform further actions like setting a flag in the database indicating OTP verification is successful, or redirecting the user to another page.
    } else {
        // OTP is incorrect
        echo "<script>alert('OTP verification failed. Please try again.')</script>";

        
    }
}
?>









<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Web 2 Export</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <style>
        body {
            background-color: rgb(10 30 51) !important;
        }
    </style>
</head>

<body>



    <!-- Form -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-6 ">
                <div class="box_container text-capitalize bg-white rounded shadow-lg  border   ">
                    <div class="otp_box_top   text-white px-3 py-2 " style="background-color:rgb(203 202 200) !important">
                        <div class="d-flex">
                            <img src="message.png" height="50px" width="50px" class="mt-3" alt="">
                            <div class="mx-3">
                                <h5>verify Your Email Address</h5>
                                <p class="">for the better experience</p>
                            </div>
                        </div>
                    </div>
                    <div class="otp_body p-4">
                        <!-- <h6>please enter OTP</h6> -->
                        <P>sent VIA sms on your email address</P>
                        <hr>
                        <!-- <form action="" method="post" class=" d-flex border">
                            <div class="row">
                                <div class="col-3">
                                    <label for="" class="text-dark">OTP</label>
                                </div>
                                <div class="col-9 border">
                                    <input type="text" name="otp" class="form-control" placeholder="XXXX">
                                    <input type="submit" class="btn mt-4 w-100 btn-danger px-3 py-2" name="submit" value="Verify">
                                </div>
                            </div>
                        </form> -->
                        <form method="post" action="">
                            <label for="otp">Enter OTP:</label><br>
                            <input type="text" id="otp" name="otp" required><br><br>
                            <input type="submit" name="submit" class="btn btn-success" value="Verify OTP">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Plugins JS File -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>




</html>