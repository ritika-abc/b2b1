<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="assets/css/megadrop.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/vendor/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendor/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
    <script src="assets/vendor/OwlCarousel2-2.3.4/docs/assets/vendors/jquery.min.js"></script>

    <script src="assets/vendor/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
    <style>
        body {
            background-color: #fdfdfd !important;
            font-family: "Roboto", sans-serif;
        }
    </style>
</head>

<body>



    <?php
    include "config.php";
    $select = "SELECT * from `category`";
    $qu = mysqli_query($con, $select);
    $s_no = 1;
    while ($row = mysqli_fetch_array($qu)) {
        $cat_id = $row['cat_id'];

    ?>
   
        <div class="container-fluid margin m-auto my-5 " style="width: 98%;">
            <div class="row cat_container ">
                <div class="col-12 border py-3 px-3  bg-white rounded shadow-lg">

                  <a href="2.php?cat_id=<?php echo $row['cat_id'] ?>"> <h4><?php echo $row['cat_name'] ?></h4></a>
                    <div class="row mt-3">
                        <div class="col-12 col-md-3">
                            <div class="hover_image">
                                <img src="./admin/<?php echo $row['cat_long_image'] ?>" height="350px" style="object-fit:cover" width="100%" alt="">
                            </div>
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="row">
                                <?php
                                include "config.php";
                                $select1 = "SELECT * from `sub_cat` where `cat_id`='$cat_id'";
                                $qu1 = mysqli_query($con, $select1);
                                $s_no = 1;
                                while ($row1 = mysqli_fetch_array($qu1)) {
                                    $sub_id = $row1['sub_id'];

                                ?>
                                    <div class="col-4">
                                        <div class="card p-3">
                                            <p class="pb-0"><?php echo $row1['sub_cat_name'] ?></p>
                                            <div class="row">
                                                <div class="col-7">
                                                    <?php
                                                    include "config.php";
                                                    $select1 = "SELECT * from `inner_cat` where `sub_id`='$sub_id' limit 5";
                                                    $qu1 = mysqli_query($con, $select1);
                                                    $s_no = 1;
                                                    while ($row2 = mysqli_fetch_array($qu1)) {

                                                    ?>
                                                        <p class=" p-0 m-0 d-block"><a href="" class="text-decoration-none p-0 m-0">
                                                                <?php echo $row2['inner_cat_name'] ?></a></p>
                                                    <?php   } ?>
                                                </div>
                                                <div class="col-5 align-self-end ">
                                                    <img src="./admin/<?php echo $row1['sub_cat_image'] ?>" class="rounded" height="auto" width="100%" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 7
                    }
                }
            })
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>