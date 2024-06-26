<!-- inner_category.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select Inner Category</title>
</head>
<body>
    <h2>Select an Inner Category:</h2>
    <ul>
        <?php
        // Validate and sanitize input
        $mysqli = new mysqli('localhost', 'root', '', 'b2b_new_project');

        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

        // Query to fetch inner categories based on state_id
        $sql = "SELECT * FROM inner_cat WHERE inner_cat_id = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo '<li><a href="product.php?inner_cat_id=' . $row['inner_cat_id'] . '">' . $row['inner_cat_name'] . '</a></li>';
        }

        // Close statement
        $stmt->close();
        ?>
    </ul>
</body>
</html>
