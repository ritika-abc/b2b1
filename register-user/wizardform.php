<?php
// session_start();

// if (!isset($_SESSION["password"])) {
//     header("Location:index.php");
// }
?>
<?php


include_once "include/header.php";

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
                            <div class="col-12">
                                <button class="section my-2 text-capitalize   btn btn-primary px-4  border disabled  rounded-pill ">Company details</button>
                            </div>
                            <form class="form-horizontal form-label-left bg-white p-3 rounded">
                                <div class="row text-capitalize mb-3">
                                    <div class="col-12 col-lg-3 mt-2">company name</div>
                                    <div class="col-12 col-lg-9">
                                        <input type="text" class="form-control" placeholder="Company Name*">
                                    </div>
                                </div>
                                <div class="row text-capitalize mb-3">
                                    <div class="col-12 col-lg-3 mt-2">Primay Business*</div>
                                    <div class="col-12 col-lg-9">
                                        <input type="text" class="form-control" placeholder="Primay Business*">
                                    </div>
                                </div>
                                <div class="row text-capitalize mb-3">
                                    <div class="col-12 col-lg-3 mt-2">Website</div>
                                    <div class="col-12 col-lg-9">
                                        <input type="text" class="form-control" placeholder="Website*">
                                    </div>
                                </div>
                                <div class="row text-capitalize mb-3">
                                    <div class="col-12 col-lg-3 mt-2">company address*</div>
                                    <div class="col-12 col-lg-9">
                                        <textarea name="" rows="3" class="form-control" id=""></textarea>
                                    </div>
                                </div>
                                <div class="row text-capitalize mb-3">
                                    <div class="col-12 col-lg-3 mt-2">select state*</div>
                                    <div class="col-12 col-lg-9">
                                        <select name="" class="form-control py-2" size="" id="">
                                            <option value="">----- SELECT-----</option>
                                            <option value="">Delhi</option>
                                            <option value="">Delhi</option>
                                            <option value="">Delhi</option>
                                            <option value="">Delhi</option>
                                            <option value="">Delhi</option>
                                            <option value="">Delhi</option>
                                            <option value="">Delhi</option>
                                            <option value="">Delhi</option>
                                            <option value="">Delhi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row text-capitalize mb-3">
                                    <div class="col-12 col-lg-3 mt-2">select city*</div>
                                    <div class="col-12 col-lg-9">
                                        <select name="" class="form-control py-2" size="" id="">
                                            <option value="">----- SELECT-----</option>
                                            <option value="">Delhi</option>
                                            <option value="">Delhi</option>
                                            <option value="">Delhi</option>
                                            <option value="">Delhi</option>
                                            <option value="">Delhi</option>
                                            <option value="">Delhi</option>
                                            <option value="">Delhi</option>
                                            <option value="">Delhi</option>
                                            <option value="">Delhi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row text-capitalize mb-3">
                                    <div class="col-12 col-lg-3 mt-2">pincode*</div>
                                    <div class="col-12 col-lg-9">
                                        <input type="text" placeholder="Pincode*" class="form-control">
                                        <input type="text" value="Submit" class="btn btn-danger mt-3">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="step-22">
                            <div class="col-12">
                                <button class="section my-2 text-capitalize   btn btn-primary px-4  border disabled  rounded-pill ">Product & services</button>
                            </div>
                            <form class="form-horizontal form-label-left mt-3">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12  ">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2>Product image </h2>
                                                <!-- <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#">Settings 1</a>
                                                            <a class="dropdown-item" href="#">Settings 2</a>
                                                        </div>
                                                    </li>
                                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                    </li>
                                                </ul> -->
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">

                                                <form action="form_upload.html" class="dropzone">
                                                    <input type="file" class="w-100 form-control py-5">
                                                    <input type="text" placeholder="Enter Product/Service Name" class="form-control my-3">
                                                    <input type="submit" name="submit" class="btn btn-danger px-3 mt-3 w-25">
                                                </form>

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
                            <form class="bg-white p-3 my-3">

                                <input type="text" placeholder="Enter Your GST" class="form-control my-3">
                                <input type="submit" name="submit" class="btn btn-danger px-3 mt-3 w-25">
                            </form>
                        </div>
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