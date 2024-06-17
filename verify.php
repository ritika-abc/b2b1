<?php
session_start();

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
        echo "OTP verification successful. You can now proceed with registration.";
        // Here you can perform further actions like setting a flag in the database indicating OTP verification is successful, or redirecting the user to another page.
    } else {
        // OTP is incorrect
        echo "OTP verification failed. Please try again.";
    }
}
?>
<!-- <script></script> -->