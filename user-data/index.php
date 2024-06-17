<?php



include "config.php";
if (isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $user_email = $_POST['user_email'];
    $user_phone = $_POST['user_phone'];
    $sql = "SELECT  * from `user`  WHERE 
     user_name='$user_name' and password='$password'and 
     user_email = '$user_email' ";

    $emailresult = mysqli_query($con, $sql);

    $user_matched = mysqli_num_rows($emailresult);
    if ($user_matched > 0) {
        echo "<script>alert('you have already registered !!')</script>";
    } else {
        $insrt = mysqli_query($con, "INSERT INTO 
        `user`(`user_name`, `password`,`user_email`,`user_phone`) VALUES
         ('$user_name','$password','$user_email','$user_phone')");

        if ($insrt) {
            header("location:login-user.php");
        }
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../admin/gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container_box">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11 col-lg-8 form_box py-5 shadow-lg">
                    <form action="" method="post">
                        <div class="w-50 m-auto  ">
                            <img src="../admin/logo/logo.jpg" height="auto" width="80%" alt="">
                        </div>
                        <h3 class="mt-4 text-center  h5">Register your Company <span class="text-success">FREE</span></h3>
                        <hr>
                        <div class="row text-capitalize">
                            <div class="col-12 col-lg-6 my-2">
                                <label>Full Name</label>
                                <input type="text" name="user_name" class="form-control">
                            </div>
                            <div class="col-12 col-lg-6 my-2">
                                <label>email</label>
                                <input type="email" name="user_email" class="form-control">
                            </div>
                            <div class="col-12 col-lg-6 my-2">
                                <label>number</label>
                                <input type="text" name="user_phone" class="form-control">
                            </div>
                            <div class="col-12 col-lg-6 my-2">
                                <label>password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="col-12   mt-3">
                                <input type="submit" name="submit" class="submit_btn py-2">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>