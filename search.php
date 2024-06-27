<?php
// Include your database connection file
include('config.php');

if(isset($_POST['query'])) {
    $search = $_POST['query'];

    // Perform SQL query to fetch matching results
    $sql = "SELECT * FROM `category` WHERE cat_name LIKE '%$search%'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo '<option>' . $row['cat_name'] . '</option>';
        }
    } else {
        echo '<option>No results found</option>';
    }
}
?>
