<!-- products.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
</head>
<body>
    <h2>Products:</h2>
    <ul>
        <?php
        // Connect to MySQL database using MySQLi
$mysqli = new mysqli('localhost', 'root', '', 'b2b_new_project');

// Check connection
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}
        // Validate and sanitize input
        $inner_category_id = isset($_GET['inner_category_id']) ? intval($_GET['inner_category_id']) : 0;

        // Query to fetch products based on inner_category_id
        $sql = "SELECT * FROM product WHERE inner_category_id = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('i', $inner_category_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo '<li>' . $row['product_name'] . ' - $' . number_format($row['product_price'], 2) . '</li>';
        }

        // Close statement
        $stmt->close();

        // Close connection
        $mysqli->close();
        ?>
    </ul>
</body>
</html>
