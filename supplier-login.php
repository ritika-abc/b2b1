<?php

// 
session_start();
// echo "<script>alert(' " . $_SESSION["otp"] ." ')</script>";
 
include "admin/config.php";





if (isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $password = $_POST['password'];
    // $user_role = $_POST['user_role'];
   
    

    $result = mysqli_query($con, "select * 
     from `user` WHERE user_name='$user_name' and user_email='$user_email' and password='$password'");
    //  while($row=mysqli_fetch_array($result)){
    //   $user_name = $row['user_name'];
    //  }
    $user_matched = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    if ($user_matched > 0) {
        $_SESSION['user_name'] = $user_name;
        $_SESSION['user_email'] = $user_email;
        $_SESSION['password'] = $password;
        $_SESSION['user_id'] =  $row['user_id'];

        
        
        
              
      //  echo "<script>alert('welcome')</script>";
      header("location:./register-user");
    } else {
      echo "<script>alert('not match')</script>";

    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page  </title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

  <!-- Custom CSS -->
  <style>
    body {
      background-color: #f8f9fa;
    }
    .login-container {
      max-width: 400px;
      margin: 100px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
      animation: slideUp 0.5s ease;
    }
    @keyframes slideUp {
      from {
        transform: translateY(20px);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="login-container">
      <h2 class="text-center">Login </h2>
      <!-- <p class="mt-3 text-success fw-bold ">?php echo ($_SESSION["otp"] == "") ? 'verification First': " OTP verification successful. You can now proceed with Login."; ?></p> -->
      <p class="mt-3 text-success   text-capitalize">If You Are Not Verified Please Register First.</p>
      <form method="post">
        <!-- <p >OTP verification successful. You can now proceed with Login.</p> -->
        <div class="form-group mt-3">
          <label for="username">Username </label>
          <input type="text" name="user_name" class="form-control mt-2" id="username" placeholder="Enter username">
        </div>
        <div class="form-group mt-3">
          <label for="email">Enter Your Email</label>
          <input type="email" name="user_email" class="form-control mt-2" id="email" placeholder="Enter Your Email">
          <input type="hidden" class="form-control" name="user_role">

        </div>
        <div class="form-group mt-3">
          <label for="email">Enter Your Password</label>
          <input type="password" name="password" class="form-control mt-2" id="password" placeholder="Enter Your Password">
        

        </div>
        <!-- <div class="form-group mt-3">
          
          <input type="hidden" name="otp" class="form-control mt-2" id="email" placeholder="Enter Your Email" value="?php echo $_SESSION['otp'] ?>">
        </div> -->
        <button type="submit" name="submit" class="btn btn-primary btn-block mt-3 w-100" >Login</button>
        <a  href="logout.php"  class="btn btn-danger fw-bold w-100 py-2 mt-3">logout</a>
<!-- <a href="./free-register-user/index.php"></a> -->
      </form>
    </div>
  </div>
  <!-- Bootstrap JS -->
  <script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
