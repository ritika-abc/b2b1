<?php
session_start();

// Database connection parameters
include "admin/config.php";

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Generate OTP
function generateOTP() {
    $otp = rand(100000, 999999);
    return $otp;
}

// Send OTP via email
function sendOTP($email, $otp) {
    $to = $email;
    $subject = "Your OTP for registration";
    $message = "Your OTP is: " . $otp;
    $headers = "From: ritikamaheshonly@gmail.com";

    // Send email
    mail($to, $subject, $message, $headers);
}

// Handle form submission
if (isset($_POST['submit'])) {
    // Retrieve form data
    $user_name = $_POST["user_name"];
    $user_email = $_POST["user_email"];
    $user_phone = $_POST["user_phone"];
    $password = $_POST["password"];



 $sql = "SELECT  * from `user`  WHERE 
     `user_name`='$user_name' and `user_email`='$user_email' and `password`='$password'";

    $emailresult = mysqli_query($con, $sql);

    $user_matched = mysqli_num_rows($emailresult);
 if ($user_matched > 0) {
        echo "you have already registered !!";
        // $_SESSION['user_name'] = $user_name;
        // $_SESSION['user_email'] = $user_email;
    } else {
         // Generate and store OTP
    $otp = generateOTP();
    $_SESSION["otp"] = $otp;

    // Send OTP via email
    sendOTP($user_email, $otp);

    // Insert user data into database
    $sql = "INSERT INTO `user`(`user_name`,`user_email`, `user_phone`, `otp`,`password`) VALUES ('$user_name', '$user_email', '$user_phone', '$otp','$password')";
    if ($con->query($sql) === TRUE) {
        // Redirect to OTP verification page
        header("Location: otp_verification.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
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
        /* Custom CSS for positioning video background */
        #video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .container {
            position: relative;
            z-index: 1;
        }

        form {
            box-shadow: rgba(0, 0, 0, 0.15) 0px 15px 25px, rgba(0, 0, 0, 0.05) 0px 5px 10px;
            background-color: white;
            background-color: #000000c7;
            /* background-color: #00000080; */
        }

        input {
            background-color: transparent !important;
            color: white;
            border: none !important;
            border: 1px solid white !important;
            border-radius: 10px !important;
            color: white !important;
        }

        input::placeholder {
            color: white !important;
        }
    </style>
</head>

<body>


    <!-- Video Background -->
    <video src="export_new.mp4" autoplay muted loop id="video-background">

    </video>

    <!-- Form -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-7 col-lg-7 ">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="rounded shadow-lg p-5 text-white ">
                    <div class="logo text-center">
                        <img src="https://www.shutterstock.com/image-vector/illustration-graphic-design-express-logistic-260nw-2151557443.jpg" alt="just demo" height="100px" width="100px">
                    </div>
                    <p class="mt-3 fs-4 ">Register your Company FREE</p>
                    <div class="form-group my-4">
                        <!-- <label for="name " class="text-white mb-2">Your Name</label> -->
                        <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter your name">
                    </div>
                    <div class="form-group my-4">
                        <!-- <label for="email" class="text-white mb-2">Company Name</label> -->
                        <input type="text" class="form-control"  name="company_name"   placeholder="Enter your Company Name">
                    </div>
                    <div class="form-group my-4">
                        <!-- <label for="message" class="text-white mb-2">Number</label> -->
                        <input type="number" class="form-control"  name="user_phone" placeholder="Enter your Number">
                    </div>
                    <div class="form-group my-4">
                        <!-- <label for="message" class="text-white mb-2">Email Address</label> -->
                        <input type="text" class="form-control"  name="user_email" placeholder="Enter your Email">
                    </div>
                    <div class="form-group my-4">
                        <!-- <label for="message" class="text-white mb-2">Company City</label> -->
                        <input type="text" class="form-control"  name="company_address" placeholder="Enter Your Company Address">
                    </div>
                    <div class="form-group my-4">
                        <!-- <label for="message" class="text-white mb-2">Company City</label> -->
                        <input type="password" class="form-control"  name="password" placeholder="Enter Your Company Password">
                    </div>

                    <div class="row">
                        <div class="col-12 col-lg-6">
                               <button type="submit" name="submit" class="btn btn-danger fw-bold w-100 py-2 mt-3">Create Account</button>
                        </div>
                        <!-- <div class="col-12 col-lg-6">
                               <a  href="logout.php"  class="btn btn-danger fw-bold w-100 py-2 mt-3">logout</a>
                        </div> -->
                        <div class="col-12 col-lg-6">
                        <p class="text-end    pb-2 mt-4">Have an account? <a href="supplier-login.php"> Sign in now!</a></p>
                        </div>
                    </div>                   
                </form>
            </div>
        </div>
    </div>




 

    <!-- Plugins JS File -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>



<script>
    
</script>

</html>


 