<?php

ob_start();
include_once "include/header.php";


?>

<?php
include "config.php";

$pro_id = $_GET['pro_id'];

$sql = "SELECT * FROM `product` WHERE `pro_id`='$pro_id'";
$query = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($query)) {
    # to select all the data
    $product_name = $row['product_name'];
    $price = $row['price'];

    $product_description = $row['product_description'];
    $company_name = $row['company_name'];
    $moq = $row['moq'];

    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];

}

?>

<?php


if (isset($_POST['submit'])) {

    $pro_id = $_GET['pro_id'];


    $product_name = $_POST['product_name'];
    $price = $_POST['price'];

    $product_description = $_POST['product_description'];
    $company_name = $_POST['company_name'];
    $moq = $_POST['moq'];

 
    $product_image1 = $_FILES["product_image1"]["name"];
    $fld1 = "product-image/" . $product_image1;   
    move_uploaded_file($_FILES["product_image1"]['tmp_name'], $fld1);
   
    // image 2
    $product_image2 = $_FILES["product_image2"]["name"];
    $fld2 = "product-image/" . $product_image2;    
    move_uploaded_file($_FILES["product_image2"]['tmp_name'], $fld2);




    // image 3
    $product_image3 = $_FILES["product_image3"]["name"];
    $fld3 = "product-image/" . $product_image3;    
    move_uploaded_file($_FILES["product_image3"]['tmp_name'], $fld3);





    if ($product_image1 == ""  || $product_image2 == "" || $product_image3 == "") {
        $sql1 = "UPDATE `product` SET 
        `product_name`='$product_name',
        `price`='$price',
        `product_description`='$product_description',
        `company_name`='$company_name',        
        `moq`='$moq'       
        WHERE `pro_id`='$pro_id'";




        $query1 = mysqli_query($con, $sql1) or die("not working");
        // The die() function prints a message and exits the current script
        if ($query1) {
            header("location:view-product.php");
        }
    } else {
        $sql1 = "UPDATE `product` SET 
        `product_name`='$product_name',
        `price`='$price',
        `product_description`='$product_description',
        `company_name`='$company_name',       
        `moq`='$moq',
        `product_image1`='$fld1',
        `product_image2`='$fld2',      
        `product_image3`='$fld3'      
        WHERE `pro_id`='$pro_id'";
        $query1 = mysqli_query($con, $sql1) or die("dgdgdfgdfg");
        // The die() function prints a message and exits the current script
        if ($query1) {
            header("location:view-product.php");
        }
    }
}
?>
<!-- page content -->
<div class="right_col  text-capitalize bg-white" role="main">
    <!-- top tiles -->
    <h3 class="my-3">please update user / supplier information</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12 col-md-4 my-3 text-capitalize">
                <label for="">product_name</label>
                <input type="text" name="product_name" value="<?php echo $product_name ?>" class="form-control mt-1">
            </div>
            <div class="col-12 col-md-4 my-3 text-capitalize">
                <label for="">price</label>
                <input type="text" name="price" value="<?php echo $price ?>" class="form-control mt-1">
            </div>

            <div class="col-12 col-md-4 my-3 text-capitalize">
                <label for="">company_name</label>
                <input type="text" name="company_name" value="<?php echo $company_name ?>" class="form-control mt-1">
            </div>

            <div class="col-12 col-md-4 my-3 text-capitalize">
                <label for="">moq</label>
                <input type="text" name="moq" value="<?php echo $moq ?>" class="form-control mt-1">
            </div>
            <div class="col-12 col-md-12 my-3 text-capitalize">
                <label for="">product_description</label>
                <textarea name="product_description" class="form-control" rows="5" id=""><?php echo $product_description ?></textarea>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-4">
                <img src="<?php echo $product_image1 ?>" height="200px" width="100%" class="my-2" alt=""> <br>
                <label for="">product image 1</label> <br>
                <input type="file" value="<?php echo $product_image1 ?>" class="form-control" name="product_image1">
            </div>
            <div class="col-4">
                <img src="<?php echo $product_image2 ?>" height="200px" width="100%" class="my-2" alt=""> <br>
                <label for="">product image 2</label> <br>
                <input type="file" value="<?php echo $product_image2 ?>" class="form-control" name="product_image2">
            </div>
            <div class="col-4">
                <img src="<?php echo $product_image3 ?>" height="200px" width="100%" class="my-2" alt=""> <br>
                <label for="">product image 3</label> <br>
                <input type="file" value="<?php echo $product_image3 ?>" class="form-control" name="product_image3">
            </div>
           
        </div>
        <input type="submit" class="btn btn-success mt-4" name="submit">
    </form>
</div>
<br />
</div>




<!-- /page content -->
<?php
include_once "include/footer.php";
ob_end_flush();
?>