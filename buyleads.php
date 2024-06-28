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
    <link rel="stylesheet" href="./assets/css/new-style.css">
    <script src="assets/vendor/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
    <style>
        body {
            background-color: #e9eaed;
            font-family: "Roboto", sans-serif;
        }

        a {
            text-decoration: none;
        }

        ul {
            list-style: none;
        }

        .responsive_image img {
            height: 200px;
            width: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>

    <!-- top nav start here -->
    <div class="top_nav">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="nav ">
                        <li class="nav-item"><a href="supplier-login.php" class="nav-link text-white btn "> <button class="btn btn-dark"> Login Supplier</button> </a></li>
                        <li class="nav-item   w-50"><a href="" class="nav-link text-white">
                                <marquee behavior="" direction="">Lorem, ipsum dolor sit amet consectetur adipisicing
                                    elit. Quisquam, et.</marquee>
                            </a></li>
                        <li class="nav-item ms-auto "><a href="" class="nav-link  text-white">345345345453</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                For Buyers
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                For Seller
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Buyleads</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <style>
        .live_search_buyleads input , .live_search_buyleads select {
            border: none;
        }
        .live_search_buyleads input:active , .live_search_buyleads select:active {
            border: none;
            /* outline: 2px solid red; */
        }
        .live_search_buyleads{
            border: 1px solid gray;
        }
    </style>

    <div class="container my-5">
        <div class="row">
            <div class="col-12 col-lg-4   ">
                <div class="bg-white p-3">
                    <h4>Country</h4>
                    <div class="live_search_buyleads">
                        <form class="">
                            <input type="text" class="p-1 ">
                            <select name="" id="" class="w-100 " style="outline: none;">
                                <option value="" class=" " > </option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-8">
                <div class="buyleads_box alert  border border-primary p-3 bg-white   ">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <h5>Looking for a4 size copy paper </h5>
                            <div class=" ">
                                <ul class="d-flex list-unstyled">
                                    <li cclass="nav-item"><small class="">Bangalore, Karnataka, India</small></li>
                                    <li cclass="nav-item "><small class="mx-4 text-primary fw-bold"> 2024-06-27</small></li>
                                </ul>
                            </div>
                            <p>I want to buy PVC L Shape Modular Kitchen. Kindly send me price and other details.</p>
                        </div>
                        <div class="col-12 col-lg-6 border-start border-3 border-primary">
                            <table class="table table-hover">
                                <tr>
                                    <th><small>Quantity</small></th>
                                    <td class="text-muted"><small>400 Piece</small></td>
                                </tr>
                                <tr>
                                    <th><small>Material</small></th>
                                    <td class="text-muted">PVC</td>
                                </tr>
                                <tr>
                                    <th><small>Appearance</small></th>
                                    <td class="text-muted">Modern</td>
                                </tr>
                                <tr>
                                    <th><small>Email</small></th>
                                    <td class="text-muted">...ea@gmail.com</td>
                                </tr>
                                <tr>
                                    <th><small>Number</small></th>
                                    <td class="text-muted">234234xxx</td>
                                </tr>
                                <tr>
                                    <th><small>Material</small></th>
                                    <td class="text-muted">Material</td>
                                </tr>
                            </table>
                            <a href="" class="btn btn-dark">Get Buyleads</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 20,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 6
                    }
                }
            })
        })
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>