 
<?php

// 
session_start();
ob_start();
include "config.php";

if (isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $user_email = $_POST['user_email'];

    $result = mysqli_query($con, "select * 
     from `user` WHERE user_name='$user_name' and password='$password' and user_email='$user_email'");
    $user_matched = mysqli_num_rows($result);
    if ($user_matched > 0) {
        $_SESSION['password'] = $password;
        $_SESSION['user_name'] = $user_name;
        
              
        // header("location:register-user.php");
        echo "<script> alert('Welcome !!!!') </script>";

    } else {
        echo "<script>alert('Not Matched !!!!')</script>";
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../admin/gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>WEB2EXPORT -login user</title>
 
    <style>
        body{
            /* background-image: url('bg.jpg'); */
            /* height: 100vh; */
            width: 100%;
            background: #091f53;
            background-size: cover;
            overflow: hidden;
        }
    </style>
</head>

<body>
  
    <div class="container_box   " style="margin-top: 6rem;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11 col-lg-4 form_box py-5 shadow-lg rounded" style="background-color: white;">
                    <form action="" method="post">
                        <div class="w-50 m-auto  ">
                            <img src="../admin/logo/logo.jpg" height="auto" width="100%" alt="">
                        </div>
                        <h3 class="mt-4 text-center  h5">Login Here <span class="text-success">FREE</span></h3>
                        <hr>
                        <div class="row text-capitalize">
                            <div class="col-12  my-2">
                                <input type="text" placeholder="Enter Your Name " name="user_name" class="form-control">
                            </div>
                            <div class="col-12  my-2">
                                <input type="email" placeholder="Enter Your Email " name="user_email" class="form-control">
                            </div>
                            <div class="col-12   my-2">
                                <input type="password" name="password" placeholder="Enter Your Password" class="form-control">
                            </div>
                            <div class="col-12   mt-4">
                                <input type="submit" name="submit" class="submit_btn w-100 py-2 btn btn-success">
                            </div>
                            <div class="col-12   mt-4">
                                <a href="index.php" class=" text-dark fw-bold text-decoration-none d-block">Don't have an account? <span class="text-primary ">Sign up</span></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>