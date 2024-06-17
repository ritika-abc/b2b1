<?php
// image is a logo

include_once "include/header.php";

// form 1

include "config.php";
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
}

$sql = "SELECT* FROM `user` WHERE `user_id`='$user_id'";
$query = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($query)) {
    # to select all the data


    $user_phone = $row['user_phone'];
    $company_name = $row['company_name'];
    $company_address = $row['company_address'];
    $user_website = $row['user_website'];
    $state = $row['state'];
    $city = $row['city'];
    $pincode = $row['pincode'];
    $gst = $row['gst'];
    $iec_code = $row['iec_code'];
    $type = $row['type'];
    $product_name = $row['product_name'];
    $image = $row['image'];
}

?>
<?php

//  update
include "config.php";
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
}
if (isset($_POST['submit'])) {


    $user_phone = $_POST['user_phone'];
    $company_name = $_POST['company_name'];
    $company_address = $_POST['company_address'];
    $user_website = $_POST['user_website'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $gst = $_POST['gst'];
    $iec_code = $_POST['iec_code'];
    $type = $_POST['type'];
    $product_name = $_POST['product_name'];

    // image
    //  $_FILES is a super global variable which can be used to upload files
    $image = $_FILES["image"]["name"];
    $fld1 = "logo/" . $image;
    // $fld2 = "upload/" . $image;
    move_uploaded_file($_FILES["image"]['tmp_name'], $fld1);

    if ($image == "") {
        $sql1 = "UPDATE `user` SET   `user_phone`='$user_phone',`company_name`='$company_name',`company_address`='$company_address',`user_website`='$user_website',`state`='$state',`city`='$city',`pincode`='$pincode',`product_name`='$product_name',`gst`='$gst',`iec_code`='$iec_code',`type`='$type' WHERE  `user_id`='$user_id'";
        $query1 = mysqli_query($con, $sql1) or die("Quiry fail !");
    } else {
        $sql1 = "UPDATE `user` SET   `user_phone`='$user_phone',`company_name`='$company_name',`company_address`='$company_address',`user_website`='$user_website',`state`='$state',`city`='$city',`pincode`='$pincode',`product_name`='$product_name',`gst`='$gst',`iec_code`='$iec_code',`type`='$type',`image`='$fld1' WHERE  `user_id`='$user_id'";
        $query1 = mysqli_query($con, $sql1) or die("dgdgdfgdfg");
        // The die() function prints a message and exits the current script
        // if ($query) {
        //     header("location:index.php");
        // }
    }
}
?>




<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12 col-lg-4 mb-5">
                    <?php include_once "profile.php" ?>
                </div>
                <div class="col-12 col-lg-8 text-capitalize ">
                    <!-- <button class="section my-2 text-capitalize   btn btn-light px-4  border disabled  rounded-pill ">create account</button>
                    <button class="section my-2 text-capitalize   btn btn-light px-4  border disabled  rounded-pill ">Company Details</button>
                    <button class="section my-2 text-capitalize   btn btn-light px-4  disabled border  rounded-pill ">add GST</button> -->

                    <!-- Tabs -->
                    <?php

                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div id="wizard_verticle" class="form_wizard wizard_verticle">
                            <ul class="list-unstyled wizard_steps">
                                <li>
                                    <a href="#step-11">
                                        <span class="step_no">1</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-22">
                                        <span class="step_no">2</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-33">
                                        <span class="step_no">3</span>
                                    </a>
                                </li>
                            </ul>

                            <div id="step-11">
                                <!-- <h2 class="StepTitle">Step 1 Content</h2> -->
                                <!-- <button class="section my-2   btn btn-primary px-4 disabled  rounded-pill">Company Details</button> -->
                                <div class="">
                                    <button class="section my-2 text-capitalize   btn btn-primary px-4  border disabled  rounded-pill ">Edit Your Profile</button>

                                    <div class="bg-white p-4 rounded">
                                        <div class="row text-capitalize mb-3">
                                            <div class="col-12 col-lg-3 mt-2">Your Website</div>
                                            <div class="col-12 col-lg-9">
                                                <input type="text" name="user_website" value="<?php echo $user_website; ?>" class="form-control" placeholder="Website*">
                                            </div>
                                        </div>

                                        <div class="row text-capitalize mb-3">
                                            <div class="col-12 col-lg-3 mt-2">Primary Business*</div>
                                            <div class="col-12 col-lg-9">
                                                <select name="type" class="form-control py-2" size="" id="">
                                                    <option value="">----- Select Primary Business -----</option>
                                                    <option value="exporter" <?php if($type == 'exporter') echo "selected"; ?>>Exporter</option>
                                                    <option value="supplier" <?php if($type == 'supplier') echo "selected"; ?>>Supplier</option>
                                                    <option value="Manufacturer" <?php if($type == 'manufacturer') echo "selected"; ?>>Manufacturer</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row text-capitalize mb-3">
                                            <div class="col-12 col-lg-3 mt-2">select state*</div>
                                            <div class="col-12 col-lg-9">
                                                <select name="state" class="form-control py-2" size="" id="">
                                                    <option value="">----- SELECT-----</option>
                                                    <option value="Andhra Pradesh" <?php if ($state == 'Andhra Pradesh') echo "selected"; ?>>Andhra Pradesh</option>
                                                    <option value="Arunachal Pradesh" <?php if ($state == 'Arunachal Pradesh') echo "selected"; ?>>Arunachal Pradesh</option>
                                                    <option value="Assam" <?php if ($state == 'Assam') echo "selected"; ?>>Assam</option>
                                                    <option value="Bihar" <?php if ($state == 'Bihar') echo "selected"; ?>>Bihar</option>
                                                    <option value="Chhattisgarh" <?php if ($state == 'Chhattisgarh') echo "selected"; ?>>Chhattisgarh</option>
                                                    <option value="Goa" <?php if ($state == 'Goa') echo "selected"; ?>>Goa</option>
                                                    <option value="Gujarat" <?php if ($state == 'Gujarat') echo "selected"; ?>>Gujarat</option>
                                                    <option value="Haryana" <?php if ($state == 'Haryana') echo "selected"; ?>>Haryana</option>
                                                    <option value="Himachal Pradesh" <?php if ($state == 'Himachal Pradesh') echo "selected"; ?>>Himachal Pradesh</option>
                                                    <option value="Jharkhand" <?php if ($state == 'Jharkhand') echo "selected"; ?>>Jharkhand</option>
                                                    <option value="Karnataka" <?php if ($state == 'Karnataka') echo "selected"; ?>>Karnataka</option>
                                                    <option value="Kerala" <?php if ($state == 'Kerala') echo "selected"; ?>>Kerala</option>
                                                    <option value="Madhya Pradesh" <?php if ($state == 'Madhya Pradesh') echo "selected"; ?>>Madhya Pradesh</option>
                                                    <option value="Maharashtra" <?php if ($state == 'Maharashtra') echo "selected"; ?>>Maharashtra</option>
                                                    <option value="Manipur" <?php if ($state == 'Manipur') echo "selected"; ?>>Manipur</option>
                                                    <option value="Meghalaya" <?php if ($state == 'Meghalaya') echo "selected"; ?>>Meghalaya</option>
                                                    <option value="Mizoram" <?php if ($state == 'Mizoram') echo "selected"; ?>>Mizoram</option>
                                                    <option value="Nagaland" <?php if ($state == 'Nagaland') echo "selected"; ?>>Nagaland</option>
                                                    <option value="Odisha" <?php if ($state == 'Odisha') echo "selected"; ?>>Odisha</option>
                                                    <option value="Punjab" <?php if ($state == 'Punjab') echo "selected"; ?>>Punjab</option>
                                                    <option value="Rajasthan" <?php if ($state == 'Rajasthan') echo "selected"; ?>>Rajasthan</option>
                                                    <option value="Sikkim" <?php if ($state == 'Sikkim') echo "selected"; ?>>Sikkim</option>
                                                    <option value="Tamil Nadu" <?php if ($state == 'Tamil Nadu') echo "selected"; ?>>Tamil Nadu</option>
                                                    <option value="Telangana" <?php if ($state == 'Telangana') echo "selected"; ?>>Telangana</option>
                                                    <option value="Tripura" <?php if ($state == 'Tripura') echo "selected"; ?>>Tripura</option>
                                                    <option value="Uttar Pradesh" <?php if ($state == 'Uttar Pradesh') echo "selected"; ?>>Uttar Pradesh</option>
                                                    <option value="Uttarakhand" <?php if ($state == 'Uttarakhand') echo "selected"; ?>>Uttarakhand</option>
                                                    <option value="West Bengal" <?php if ($state == 'West Bengal') echo "selected"; ?>>West Bengal</option>
                                                    <option value="Andaman and Nicobar Islands" <?php if ($state == 'Andaman and Nicobar Islands') echo "selected"; ?>>Andaman and Nicobar Islands</option>
                                                    <option value="Dadra and Nagar Haveli and Daman and Diu" <?php if ($state == 'Dadra and Nagar Haveli and Daman and Diu') echo "selected"; ?>>Dadra and Nagar Haveli and Daman and Diu</option>
                                                    <option value="Chandigarh" <?php if ($state == 'Chandigarh') echo "selected"; ?>>Chandigarh</option>
                                                    <option value="Jammu and Kashmir" <?php if ($state == 'Jammu and Kashmir') echo "selected"; ?>>Jammu and Kashmirh</option>
                                                    <option value="Ladakh" <?php if ($state == 'Ladakh') echo "selected"; ?>>Ladakh</option>
                                                    <option value="Lakshadweep" <?php if ($state == 'Lakshadweep') echo "selected"; ?>>Lakshadweep</option>
                                                    <option value="Puducherry" <?php if ($state == 'Puducherry') echo "selected"; ?>>Puducherry</option>
                                                    <option value="Delhi" <?php if ($state == 'Delhi') echo "selected"; ?>>Delhi</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row text-capitalize mb-3">
                                            <div class="col-12 col-lg-3 mt-2">select city*</div>
                                            <div class="col-12 col-lg-9">
                                                <select name="city" class="form-control py-2" size="" id="">
                                                    <option value="">----- SELECT-----</option>
                                                    <option value="any city">Delhi</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row text-capitalize mb-3">
                                            <div class="col-12 col-lg-3 mt-2">pincode*</div>
                                            <div class="col-12 col-lg-9">
                                                <input type="text" value="<?php echo $pincode; ?>" name="pincode" placeholder="Pincode*" class="form-control">
                                                <!-- <input type="submit" value="Submit" name="submit_1" class="btn btn-danger mt-3"> -->
                                            </div>
                                        </div>
                                        <div class="row text-capitalize mb-3">
                                            <div class="col-12 col-lg-3 mt-2">Phone Number*</div>
                                            <div class="col-12 col-lg-9">
                                                <input type="text" value="<?php echo $user_phone; ?>" name="user_phone" placeholder="Number" class="form-control">
                                                <!-- <input type="submit" value="Submit" name="submit_1" class="btn btn-danger mt-3"> -->
                                            </div>
                                        </div>
                                        <div class="row text-capitalize mb-3">
                                            <div class="col-12 col-lg-3 mt-2">Company Name*</div>
                                            <div class="col-12 col-lg-9">
                                                <input type="text" value="<?php echo $company_name; ?>" name="company_name" placeholder="company name" class="form-control">
                                                <!-- <input type="submit" value="Submit" name="submit_1" class="btn btn-danger mt-3"> -->
                                            </div>
                                        </div>
                                        <div class="row text-capitalize mb-3">
                                            <div class="col-12 col-lg-3 mt-2">Company Address*</div>
                                            <div class="col-12 col-lg-9">
                                                <input type="text" value="<?php echo $company_address; ?>" name="company_address" placeholder="company Address" class="form-control">
                                                <!-- <input type="submit" value="Submit" name="submit_1" class="btn btn-danger mt-3"> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- subbmit 2 start here  -->
                            <div id="step-22">
                                <div class="col-12">
                                    <button class="section my-2 text-capitalize   btn btn-primary px-4  border disabled  rounded-pill ">Company's Logo </button>
                                </div>
                                <form class="form-horizontal form-label-left mt-3">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12  ">
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Company's Logo </h2>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <input type="file" name="image" value="<?php echo $image; ?>" class="w-100 form-control py-5">
                                                    <label for="" class="my-3">Service name / Product name</label>
                                                    <input type="text" name="product_name" value="<?php echo $product_name; ?>" placeholder="Enter Product / Service Name" class="form-control ">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="step-33">
                                <div class="col-12">
                                    <button class="section my-2 text-capitalize   btn btn-primary px-4  border disabled  rounded-pill ">GST Details</button>
                                </div>
                                <div class="bg-white p-3 my-3">
                                    <label for="" class="mt-3">GST Details</label>
                                    <input type="text" name="gst" value="<?php echo $gst; ?>" placeholder="Enter Your GST" class="form-control ">
                                    <label for="" class="mt-3">IEC Details</label>

                                    <input type="text" name="iec_code" value="<?php echo $iec_code; ?>" placeholder="Enter Your IEC Code" class="form-control  ">
                                    <input type="submit" name="submit" class="btn btn-danger px-3 mt-3 w-25">
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php ?>
                </div>
              
                <!-- End SmartWizard Content -->
            </div>
        </div>
    </div>
</div>
<br />
</div>




<!-- /page content -->
<?php
include_once "include/footer.php";
?>