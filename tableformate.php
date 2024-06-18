<?php
include "config.php"; // Assuming this file connects to your database ($con)

$select = "SELECT 
            c.cat_name, 
            s.sub_cat_name, 
            i.inner_cat_name, 
            m.micro_name,
            p.product_name
        FROM 
            category c
        LEFT JOIN 
            sub_cat s ON c.cat_id = s.cat_id
        LEFT JOIN 
            inner_cat i ON s.sub_id = i.sub_id
        LEFT JOIN 
            micro m ON i.inner_cat_id = m.inner_cat_id
        LEFT JOIN 
            product p ON m.micro_id = p.micro_id";

$result = mysqli_query($con, $select);

$categories = array(); // Array to store categories and their subcategories and inner categories

while ($row = mysqli_fetch_array($result)) {
    $cat_name = $row['cat_name'];
    $sub_cat_name = $row['sub_cat_name'];
    $inner_cat_name = $row['inner_cat_name'];

    // Store subcategories and inner categories grouped by categories and subcategories
    if (!isset($categories[$cat_name][$sub_cat_name])) {
        $categories[$cat_name][$sub_cat_name] = array();
    }
    $categories[$cat_name][$sub_cat_name][] = $inner_cat_name;
}

// Display the categories, subcategories, and inner categories in a table format
echo '<table border="1">
        <tr>
            <th>Category</th>
            <th>Subcategory</th>
            <th>Inner Category</th>
        </tr>';

foreach ($categories as $category => $subcategories) {
    $categoryRowCount = 0;
    foreach ($subcategories as $subcategory => $innercategories) {
        $subcategoryRowCount = 0;
        foreach ($innercategories as $innercategory) {
            echo '<tr>';
            if ($categoryRowCount == 0 && $subcategoryRowCount == 0) {
                echo '<td rowspan="7">' . $category . '</td>';
            }
            if ($subcategoryRowCount == 0) {
                echo '<td rowspan="4">' . $subcategory . '</td>';
            }
            echo '<td>' . $innercategory . '</td>';
            echo '</tr>';
            $subcategoryRowCount++;
        }
        // Add empty rows if there are less than 4 inner categories
        for ($i = $subcategoryRowCount; $i < 4; $i++) {
            echo '<tr><td></td><td></td></tr>';
        }
        $categoryRowCount++;
    }
    // Add empty rows if there are less than 7 subcategories
    for ($i = $categoryRowCount; $i < 7; $i++) {
        echo '<tr><td></td><td></td><td></td></tr>';
    }
}

echo '</table>';

mysqli_close($con); // Close the database connection



?>

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
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/vendor/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            /* background-color: #f0f1f2 !important; */
            font-family: "Roboto", sans-serif;
        }
    </style>
</head>

<body>
<?php
include "config.php"; // Assuming this file connects to your database ($con)

$select = "SELECT 
            c.cat_name, 
            s.sub_cat_name, 
            i.inner_cat_name, 
            m.micro_name,
            p.product_name
        FROM 
            category c
        LEFT JOIN 
            sub_cat s ON c.cat_id = s.cat_id
        LEFT JOIN 
            inner_cat i ON s.sub_id = i.sub_id
        LEFT JOIN 
            micro m ON i.inner_cat_id = m.inner_cat_id
        LEFT JOIN 
            product p ON m.micro_id = p.micro_id";

$result = mysqli_query($con, $select);

$categories = array(); // Array to store categories and their subcategories and inner categories

while ($row = mysqli_fetch_array($result)) {
    $cat_name = $row['cat_name'];
    $sub_cat_name = $row['sub_cat_name'];
    $inner_cat_name = $row['inner_cat_name'];

    // Store subcategories and inner categories grouped by categories and subcategories
    if (!isset($categories[$cat_name][$sub_cat_name])) {
        $categories[$cat_name][$sub_cat_name] = array();
    }
    $categories[$cat_name][$sub_cat_name][] = $inner_cat_name;
}

// Display the categories, subcategories, and inner categories in a card format
 
echo '<div class="card-container row">';

foreach ($categories as $category => $subcategories) {
    echo '<div class="category-card col-12 border">';
    echo '<h3>' . $category . '</h3>';

    foreach ($subcategories as $subcategory => $innercategories) {
        echo '<div class="subcategory">';
        echo '<h4>' . $subcategory . '</h4>';

        foreach ($innercategories as $innercategory) {
            echo '<div class="inner-category">';
            echo $innercategory;
            echo '</div>';
        }

        echo '</div>'; // Close subcategory div
    }

    echo '</div>'; // Close category-card div
}

echo '</div>'; // Close card-container div

mysqli_close($con); // Close the database connection
?>
