<?php
ob_start();
include_once "include/header.php";
include "config.php";

if (isset($_GET['pro_id'])) {
    $pro_id = $_GET['pro_id'];

    $sql = "SELECT * FROM `product` WHERE `pro_id`='$pro_id'";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($query);

    $product_name = $row['product_name'];
    $price = $row['price'];
    $product_description = $row['product_description'];
    $company_name = $row['company_name'];
    $moq = $row['moq'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
    $company_logo = $row['company_logo'];
    $title = $row['title'];
    $company_experience = $row['company_experience'];
    $number = $row['number'];
    $iec = $row['iec'];
    $gst = $row['gst'];
    $website = $row['website'];
    $state_name = $row['state_name'];
    $city = $row['city'];
    $company_address = $row['company_address'];
}

if (isset($_POST['submit'])) {
    $pro_id = $_GET['pro_id'];

    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $product_description = $_POST['product_description'];
    $company_name = $_POST['company_name'];
    $moq = $_POST['moq'];
    $title = $_POST['title'];
    $company_experience = $_POST['company_experience'];
    $number = $_POST['number'];
    $iec = $_POST['iec'];
    $gst = $_POST['gst'];
    $website = $_POST['website'];
    $state_name = $_POST['state_name'];
    $city = $_POST['city'];
    $company_address = $_POST['company_address'];

    // Handle image uploads
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
    $company_logo = $row['company_logo'];

    if ($_FILES["product_image1"]["name"]) {
        $product_image1 = $_FILES["product_image1"]["name"];
        $fld1 = "product-image/" . $product_image1;
        move_uploaded_file($_FILES["product_image1"]["tmp_name"], $fld1);
    }

    if ($_FILES["product_image2"]["name"]) {
        $product_image2 = $_FILES["product_image2"]["name"];
        $fld2 = "product-image/" . $product_image2;
        move_uploaded_file($_FILES["product_image2"]["tmp_name"], $fld2);
    }

    if ($_FILES["product_image3"]["name"]) {
        $product_image3 = $_FILES["product_image3"]["name"];
        $fld3 = "product-image/" . $product_image3;
        move_uploaded_file($_FILES["product_image3"]["tmp_name"], $fld3);
    }

    if ($_FILES["company_logo"]["name"]) {
        $company_logo = $_FILES["company_logo"]["name"];
        $fld4 = "product-image/" . $company_logo;
        move_uploaded_file($_FILES["company_logo"]["tmp_name"], $fld4);
    }

    // Update query
    $sql = "UPDATE `product` SET 
            `product_name`='$product_name',
            `price`='$price',
            `product_description`='$product_description',
            `company_name`='$company_name',
            `moq`='$moq',
            `title`='$title',
            `company_experience`='$company_experience',
            `number`='$number',
            `iec`='$iec',
            `gst`='$gst',
            `website`='$website',            
            `state_name`='$state_name',
            `city`='$city',
            `company_address`='$company_address'";

    // Append image fields if they are updated
    if ($_FILES["product_image1"]["name"]) {
        $sql .= ", `product_image1`='$fld1'";
    }
    if ($_FILES["product_image2"]["name"]) {
        $sql .= ", `product_image2`='$fld2'";
    }
    if ($_FILES["product_image3"]["name"]) {
        $sql .= ", `product_image3`='$fld3'";
    }
    if ($_FILES["company_logo"]["name"]) {
        $sql .= ", `company_logo`='$fld4'";
    }

    $sql .= " WHERE `pro_id`='$pro_id'";

    $query1 = mysqli_query($con, $sql);

    if ($query1) {
        header("location:view-product.php");
        exit();
    } else {
        echo "Error updating product: " . mysqli_error($con);
    }
}
?>

<!-- page content -->
<div class="right_col text-capitalize bg-white" role="main">
    <!-- top tiles -->
    <h3 class="my-3">Update Product Information</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12 col-md-4 my-3 text-capitalize">
                <label for="">Product Name</label>
                <input type="text" name="product_name" value="<?php echo $product_name ?>" class="form-control mt-1">
            </div>
            <div class="col-12 col-md-4 my-3 text-capitalize">
                <label for="">Price</label>
                <input type="text" name="price" value="<?php echo $price ?>" class="form-control mt-1">
            </div>
            <div class="col-12 col-md-4 my-3 text-capitalize">
                <label for="">Company Name</label>
                <input type="text" name="company_name" value="<?php echo $company_name ?>" class="form-control mt-1">
            </div>
            <div class="col-12 col-md-4 my-3 text-capitalize">
                <label for="">MOQ</label>
                <input type="text" name="moq" value="<?php echo $moq ?>" class="form-control mt-1">
            </div>
            <div class="col-12 col-md-4 my-3 text-capitalize">
                <label for="">Title</label>
                <input type="text" name="title" value="<?php echo $title ?>" class="form-control mt-1">
            </div>
            <div class="col-12 col-md-4 my-3 text-capitalize">
                <label for="">Company Experience</label>
                <input type="text" name="company_experience" value="<?php echo $company_experience ?>" class="form-control mt-1">
            </div>
            <div class="col-12 col-md-4 my-3 text-capitalize">
                <label for="">Number</label>
                <input type="text" name="number" value="<?php echo $number ?>" class="form-control mt-1">
            </div>
            <div class="col-12 col-md-4 my-3 text-capitalize">
                <label for="">IEC</label>
                <input type="text" name="iec" value="<?php echo $iec ?>" class="form-control mt-1">
            </div>
            <div class="col-12 col-md-4 my-3 text-capitalize">
                <label for="">GST</label>
                <input type="text" name="gst" value="<?php echo $gst ?>" class="form-control mt-1">
            </div>
            <div class="col-12 col-md-4 my-3 text-capitalize">
                <label for="">Website</label>
                <input type="text" name="website" value="<?php echo $website ?>" class="form-control mt-1">
            </div>
            <div class="col-12 col-md-4 my-3 text-capitalize">
                <label for="">City</label>
                <input type="text" name="city" value="<?php echo $city ?>" class="form-control mt-1">
            </div>
            <div class="col-12 col-md-4 my-3 text-capitalize">
                <label for="">company address</label>
                <input type="text" name="company_address" value="<?php echo $company_address ?>" class="form-control mt-1">
            </div>

            <div class="col-12 col-lg-6 my-3 text-capitalize">
                <label for=""> add Category</label>
                <select name="cat_id" class="form-control" id="category-dropdown">
                    <option value="">------ Select Category -----</option>
                    <?php
                    $sel = "SELECT * FROM `category`";
                    $query = mysqli_query($con, $sel);
                    while ($row = mysqli_fetch_array($query)) {
                        // $cat_id = $row['cat_id'];
                    ?>
                        <option value="<?php echo $row['cat_id'] ?>" <?php if ($cat_id == $cat_id) echo "selected"; ?> class="text-capitalize"> <?php echo $row['cat_name']  ?> </option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-12 col-lg-6 my-2">
                <label for=""> add Sub Category</label>
                <select name="sub_id" class="form-control" id="sub-category-dropdown">
                    <option value="">------ Select Sub Category -----</option>
                    <?php
                    // $_SESSION['cat_id'] = $cat_id;

                    $sel = "SELECT * FROM `sub_cat` ";

                    $query = mysqli_query($con, $sel);
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <option value="<?php echo $row['sub_id'] ?>" class="text-capitalize"><?php echo $row['sub_cat_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-12 col-lg-6 my-2">
                <label for="">add micro Category</label>
                <select name="inner_cat_id" class="form-control" id="inner-category-dropdown">
                    <option value="">------ Select Inner Category -----</option>
                    <?php
                    $sel = "SELECT * FROM `inner_cat`";
                    $query = mysqli_query($con, $sel);
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <option value="<?php echo $row['inner_cat_id'] ?>" class="text-capitalize"><?php echo $row['inner_cat_name'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-12 col-lg-6 my-2">
                <label for="">add micro Category</label>
                <select name="micro_id" class="form-control" id="micro-category-dropdown">
                    <option value="">------ Select Micro Category -----</option>
                    <?php
                    $sel = "SELECT * FROM `micro`";
                    $query = mysqli_query($con, $sel);
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <option value="<?php echo $row['micro_id'] ?>" class="text-capitalize"><?php echo $row['micro_name'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-12 col-lg-6 my-2">
                <label for="">add state name </label>
                <div class="col-12 col-md-4 my-3 text-capitalize">
                    <label for="">states name</label>
                    <select name="state_name" class="form-control mt-1" id="">
                        <option value="">------------- select -------------</option>
                        <option value="Andhra Pradesh" <?php if ($state_name == 'Andhra Pradesh') echo 'selected'; ?>>Andhra Pradesh</option>
                        <option value="Arunachal Pradesh" <?php if ($state_name == 'Arunachal Pradesh') echo 'selected'; ?>>Arunachal Pradesh</option>
                        <option value="Assam" <?php if ($state_name == 'Assam') echo 'selected'; ?>>Assam</option>
                        <option value="Bihar" <?php if ($state_name == 'Bihar') echo 'selected'; ?>>Bihar</option>
                        <option value="Chhattisgarh" <?php if ($state_name == 'Chhattisgarh') echo 'selected'; ?>>Chhattisgarh</option>
                        <option value="Goa" <?php if ($state_name == 'Goa') echo 'selected'; ?>>Goa</option>
                        <option value="Gujarat" <?php if ($state_name == 'Gujarat') echo 'selected'; ?>>Gujarat</option>
                        <option value="Haryana" <?php if ($state_name == 'Haryana') echo 'selected'; ?>>Haryana</option>
                        <option value="Himachal Pradesh" <?php if ($state_name == 'Himachal Pradesh') echo 'selected'; ?>>Himachal Pradesh</option>
                        <option value="Jharkhand" <?php if ($state_name == 'Jharkhand') echo 'selected'; ?>>Jharkhand</option>
                        <option value="Karnataka" <?php if ($state_name == 'Karnataka') echo 'selected'; ?>>Karnataka</option>
                        <option value="Kerala" <?php if ($state_name == 'Kerala') echo 'selected'; ?>>Kerala</option>
                        <option value="Madhya Pradesh" <?php if ($state_name == 'Madhya Pradesh') echo 'selected'; ?>>Madhya Pradesh</option>
                        <option value="Maharashtra" <?php if ($state_name == 'Maharashtra') echo 'selected'; ?>>Maharashtra</option>
                        <option value="Manipur" <?php if ($state_name == 'Manipur') echo 'selected'; ?>>Manipur</option>
                        <option value="Meghalaya" <?php if ($state_name == 'Meghalaya') echo 'selected'; ?>>Meghalaya</option>
                        <option value="Mizoram" <?php if ($state_name == 'Mizoram') echo 'selected'; ?>>Mizoram</option>
                        <option value="Nagaland" <?php if ($state_name == 'Nagaland') echo 'selected'; ?>>Nagaland</option>
                        <option value="Odisha" <?php if ($state_name == 'Odisha') echo 'selected'; ?>>Odisha</option>
                        <option value="Punjab" <?php if ($state_name == 'Punjab') echo 'selected'; ?>>Punjab</option>
                        <option value="Rajasthan" <?php if ($state_name == 'Rajasthan') echo 'selected'; ?>>Rajasthan</option>
                        <option value="Sikkim" <?php if ($state_name == 'Sikkim') echo 'selected'; ?>>Sikkim</option>
                        <option value="Tamil Nadu" <?php if ($state_name == 'Tamil Nadu') echo 'selected'; ?>>Tamil Nadu</option>
                        <option value="Telangana" <?php if ($state_name == 'Telangana') echo 'selected'; ?>>Telangana</option>
                        <option value="Tripura" <?php if ($state_name == 'Tripura') echo 'selected'; ?>>Tripura</option>
                        <option value="Uttar Pradesh" <?php if ($state_name == 'Uttar Pradesh') echo 'selected'; ?>>Uttar Pradesh</option>
                        <option value="Uttarakhand" <?php if ($state_name == 'Uttarakhand') echo 'selected'; ?>>Uttarakhand</option>
                        <option value="West Bengal" <?php if ($state_name == 'West Bengal') echo 'selected'; ?>>West Bengal</option>
                        <option value="Andaman and Nicobar Islands" <?php if ($state_name == 'Andaman and Nicobar Islands') echo 'selected'; ?>>Andaman and Nicobar Islands</option>
                        <option value="Chandigarh" <?php if ($state_name == 'Chandigarh') echo 'selected'; ?>>Chandigarh</option>
                        <option value="Dadra and Nagar Haveli" <?php if ($state_name == 'Dadra and Nagar Haveli') echo 'selected'; ?>>Dadra and Nagar Haveli</option>
                        <option value="Daman and Diu" <?php if ($state_name == 'Daman and Diu') echo 'selected'; ?>>Daman and Diu</option>
                        <option value="Lakshadweep" <?php if ($state_name == 'Lakshadweep') echo 'selected'; ?>>Lakshadweep</option>
                        <option value="Delhi" <?php if ($state_name == 'Delhi') echo 'selected'; ?>>Delhi</option>
                        <option value="Puducherry" <?php if ($state_name == 'Puducherry') echo 'selected'; ?>>Puducherry</option>

                    </select>
                </div>
            </div>



            <div class="col-12 col-md-12 my-3 text-capitalize">
                <label for="">Product Description</label>
                <textarea name="product_description" class="form-control" rows="5"><?php echo $product_description ?></textarea>
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col-4">
                <img src="<?php echo $product_image1 ?>" height="200px" width="100%" class="my-2" alt="">
                <br>
                <label for="">Product Image 1</label>
                <br>
                <input type="file" class="form-control" name="product_image1">
            </div>
            <div class="col-4">
                <img src="<?php echo $product_image2 ?>" height="200px" width="100%" class="my-2" alt="">
                <br>
                <label for="">Product Image 2</label>
                <br>
                <input type="file" class="form-control" name="product_image2">
            </div>
            <div class="col-4">
                <img src="<?php echo $product_image3 ?>" height="200px" width="100%" class="my-2" alt="">
                <br>
                <label for="">Product Image 3</label>
                <br>
                <input type="file" class="form-control" name="product_image3">
            </div>
            <div class="col-4">
                <img src="<?php echo $company_logo ?>" height="200px" width="100%" class="my-2" alt="">
                <br>
                <label for="">Company Logo</label>
                <br>
                <input type="file" class="form-control" name="company_logo">
            </div>
        </div>
        <input type="submit" class="btn btn-success mt-4" name="submit" value="Update">
    </form>
</div>
<!-- /page content -->
<?php
include_once "include/footer.php";
ob_end_flush();
?>