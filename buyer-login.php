<?php

// 
session_start();
// ob_start();
include "config.php";

if (isset($_POST['submit'])) {
    $buyer_email = $_POST['buyer_email'];
    $buyer_name = $_POST['buyer_name'];
    $bla = $_POST['bla'];

    $result = mysqli_query($con, "select * 
     from buyer WHERE buyer_email='$buyer_email' and buyer_name='$buyer_name' ");
    $user_matched = mysqli_num_rows($result);
    if ($user_matched > 0) {
        $_SESSION['buyer_email'] = $buyer_email;
        
              
      
    } else {
        echo "not matched !!!!";
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buyer login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

  <div class="row">
    <div class="col-12  ">
        <form action="" method="post" class="border p-5 w-75 m-auto text-capitalize">
            <label for=""> user buyer_email</label>
            <input type="text" class="form-control" name="buyer_email">
            <label for="" class="mt-3"> buyer_name</label>
            <input type="text" class="form-control" name="buyer_name">
            

            <input type="submit" name="submit" class="btn btn-danger mt-3">
            
        </form>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>