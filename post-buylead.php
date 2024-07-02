<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
           
            <div class="col-12 p-3 rounded py-4" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);">
             
                <h4 class="text-white py-5">POST YOUR BUY REQUIREMENT</h4>
            
            <form action="" method="post">
                    <div class="row  text-capitalize">
                        <div class="col-12 col-md-6 col-lg-4 my-3 ">
                            <label for="" class="text-white mb-2 fw-bold fs-6">Buyer Name</label>
                            <input type="text" require name="name" class="form-control">
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 my-3">
                            <label for="" class="text-white mb-2 fw-bold fs-6">Buyer Number</label>
                            <input type="text" require name="number" class="form-control">
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 my-3">
                            <label for="" class="text-white mb-2 fw-bold fs-6">Buyer email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 my-3">
                            <label for="" class="text-white mb-2 fw-bold fs-6">Product Name</label>
                            <input type="text" name="pro_name" class="form-control">
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 my-3">
                            <label for="" class="text-white mb-2 fw-bold fs-6">Product QTY</label>
                            <input type="text" name="qty" class="form-control">
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 my-3">
                            <label for="" class="text-white mb-2 fw-bold fs-6">Product Unit</label>
                            <input type="text" name="unit" class="form-control">
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 my-3">
                            <label for="" class="text-white mb-2 fw-bold fs-6">City</label>
                            <input type="text" name="city" class="form-control">
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 my-3">
                            <label for="" class="text-white mb-2 fw-bold fs-6">state Name</label>
                            <input type="text" name="state" class="form-control">
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 my-3">
                            <label for="" class="text-white mb-2 fw-bold fs-6">country Name</label>
                            <input type="text" name="country" class="form-control">
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 my-3">
                            <label for="" class="text-white mb-2 fw-bold fs-6">Zip code / pin code</label>
                            <input type="text" name="pin_code" class="form-control">
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 my-3">
                            <label for="" class="text-white mb-2 fw-bold fs-6">Product Type</label>
                            <select name="product_type" class="form-control" id="">
                                <option value=""> ----select ----</option>
                                <option value="re-selling">re-selling</option>
                                <option value="self use">self use</option>
                            </select>
                        </div>
                    </div>
                    <input type="submit" name="submit" class="mt-3 btn btn-danger w-25">
                    <input type="reset" name="submit" class="mt-3 btn btn-primary ">
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>


<?php
// Database connection
include_once "config.php";

if (isset($_POST['submit'])) {
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    // Initialize variables from form data
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $pro_name = $_POST['pro_name'];
    $qty = $_POST['qty'];
    $unit = $_POST['unit'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $pin_code = $_POST['pin_code'];
    $product_type = $_POST['product_type'];

    // SQL query to insert data into database
    $sql = "INSERT INTO `requirement` (`name`, `number`, `email`, `pro_name`, `qty`, `unit`, `city`, `state`, `country`, `pin_code`, `product_type`)
        VALUES ('$name', '$number', '$email', '$pro_name', '$qty', '$unit', '$city', '$state', '$country', '$pin_code', '$product_type')";

    // Execute SQL query
    if (mysqli_query($con, $sql)) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    // Close database connection
    mysqli_close($con);
}
?>