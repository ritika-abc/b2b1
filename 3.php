<?php



include "config.php"; // Assuming this file connects to your database ($con)

// Check if connection to database was successful
if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
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
// foreach
$count1 = 0;
foreach ($categories as $category => $subcategories) {
?>
        <div class="container-fluid margin m-auto my-5 " style="width: 98%;">
                <div class="row cat_container ">
                        <div class="col-12 border py-3 px-3  bg-white rounded shadow-lg">
                                <a href="category.php?cat_id=<?php echo $subcategories[0]['cat_id'] ?>">
                                        <h4 class=""><?php echo $category ?></h4>
                                </a>
                                <div class="row mt-3">
                                        <div class="col-12 col-md-12">
                                                <div class="row">
                                                        <!-- sub cat -->

                                                        <?php $count = 0;
                                                        foreach ($subcategories as $subcategory) { ?>
                                                                <div class="col-12 col-md-6 col-lg-3 my-3">
                                                                        <div class="card cat_responsive_cards p-3">
                                                                                <a href="sub-cat.php?sub_id=<?php echo  $subcategory['sub_id'] ?>" class="text-decoration-none" style="color: black !important;">
                                                                                        <p class="pb-0 fs-6   w-100 overflow-hidden"><?php echo $subcategory['sub_cat_name'] ?></p>
                                                                                </a>
                                                                                <div class="row">
                                                                                        <div class="col-7">
                                                                                                <!-- inner cat -->
                                                                                                <?php
                                                                                                $count2 = 0;
                                                                                                foreach ($subcategory['inner_categories'] as $innercategory) {
                                                                                                ?>
                                                                                                        <p class=" p-0 my-1 d-block"><a href="product.php?inner_cat_id=<?php echo $innercategory['inner_cat_id'] ?>" class="text-decoration-none p-0 m-0">
                                                                                                                        <?php echo $innercategory['inner_cat_name'] ?></a></p>
                                                                                                        <!-- end -->
                                                                                                <?php $count2++;
                                                                                                        if ($count2 >= 3) {
                                                                                                                break;
                                                                                                        };
                                                                                                } ?>

                                                                                        </div>
                                                                                        <div class="col-5 align-self-end ">
                                                                                                <img src="./admin/extra_image/316170-1.jpg" class="rounded" height="auto" width="100%" alt="">
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        <?php $count++;
                                                                if ($count >= 8) {
                                                                        break;
                                                                };
                                                        } ?>
                                                        <!-- sub cat end -->
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
<?php $count1++;
        if ($count1 >= 4) {
                break;
        };
} ?>