<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="/new_b2b/assets/css/megadrop.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/vendor/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendor/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
    <script src="assets/vendor/OwlCarousel2-2.3.4/docs/assets/vendors/jquery.min.js"></script>
    <link rel="stylesheet" href="./assets/css/new-style.css">
    <script src="assets/vendor/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
    <style>
        body {
            background-color: #fdfdfd !important;
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

    <?php
    include "config.php"; // Assuming this file connects to your database ($con)

    // Check if connection to database was successful
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if ($_GET['state_name']) {
        echo $state_name = $_GET['state_name'];
    }

    $select = "SELECT 
            c.cat_name, c.cat_id,
            s.sub_id, s.sub_cat_name, s.sub_cat_image,
            GROUP_CONCAT(CONCAT_WS(':', i.inner_cat_id, i.inner_cat_name) SEPARATOR '|') AS inner_categories
        FROM 
            category c
        LEFT JOIN 
            sub_cat s ON c.cat_id = s.cat_id
        LEFT JOIN 
            inner_cat i ON s.sub_id = i.sub_id
        GROUP BY 
            c.cat_id, s.sub_id";

    $result = mysqli_query($con, $select);

    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }

    $categories = array(); // Array to store categories and their subcategories

    while ($row = mysqli_fetch_array($result)) {
        $cat_name = $row['cat_name'];
        $cat_id = $row['cat_id'];
        $sub_id = $row['sub_id'];
        $sub_cat_name = $row['sub_cat_name'];
        $sub_cat_image = $row['sub_cat_image']; // Fetch sub_cat_image
        $inner_categories_raw = explode('|', $row['inner_categories']); // Convert string to array

        $inner_categories = array();
        foreach ($inner_categories_raw as $inner_cat_string) {
            list($inner_cat_id, $inner_cat_name) = explode(':', $inner_cat_string);
            $inner_categories[] = array(
                'inner_cat_id' => $inner_cat_id,
                'inner_cat_name' => $inner_cat_name
            );
        }

        // Store subcategories and inner categories grouped by categories and subcategories
        if (!isset($categories[$cat_name])) {
            $categories[$cat_name] = array();
        }

        $categories[$cat_name][] = array(
            'cat_id' => $cat_id,
            'sub_id' => $sub_id,
            'sub_cat_name' => $sub_cat_name,
            'sub_cat_image' => $sub_cat_image,
            'inner_categories' => $inner_categories
        );
    }

    // Display the categories, subcategories, and inner categories in the desired format
    echo '<div class="container ">';
     
    foreach ($categories as $category => $subcategories) {
        echo '<div class="row my-5 border-bottom border-danger border-3 py-3 shadow-lg rounded ">';
        echo '<div class="col-12">';
        echo '<h4><a class="text-dark" href="category.php?cat_id=' . $subcategories[0]['cat_id'] . '">' . $category . '</a></h4>';

        echo '<div class="row">';
        foreach ($subcategories as $subcategory) {
            echo '<div class="col-12 col-md-6 my-3 col-lg-3  ">';
            echo '<div class="shadow-lg p-3">';

            // Display subcategory image
            if (!empty($subcategory['sub_cat_image'])) {
                echo '<div class="text-center mb-3 responsive_image"> <img src="/new_b2b/admin/' . $subcategory['sub_cat_image'] . '" alt="' . $subcategory['sub_cat_name'] . '" class="img_responsive rounded text-center"></div>';
            }

            echo '<p><a class="text-dark" href="sub-cat.php?sub_id=' . $subcategory['sub_id'] ."&state_name=" .$state_name .  '">' . $subcategory['sub_cat_name'] . '</a></p>';
            echo "<hr>";
            echo '<ul style=" " class="  ">';
            
            foreach ($subcategory['inner_categories'] as $innercategory) {
                echo '<li><small><a href="product.php?inner_cat_id=' . $innercategory['inner_cat_id'] ."&state_name=" .$state_name . '">' . $innercategory['inner_cat_name'] . '</a></small></li>';
                 
            }
            echo '</ul>';

            echo '</div>'; // Close shadow-lg
            echo '</div>'; // Close col-3
        }
        echo '</div>'; // Close row for subcategories

        echo '</div>'; // Close col-12
        echo '</div>'; // Close row for category
        
    }
    echo '</div>'; // Close container

    mysqli_close($con); // Close the database connection
    ?>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>