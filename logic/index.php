<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select State</title>
</head>
<body>
    <h2>Select a State:</h2>
    <ul>
        <?php
        // Query to fetch states
        $mysqli = new mysqli('localhost', 'root', '', 'b2b_new_project');
        $sql = "SELECT * FROM states";
        $result = $mysqli->query($sql);

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo '<li><a href="inner_category.php?id=' . $row['id'] . '">' . $row['state_name'] . '</a></li>';
        }

        // Close connection
        $mysqli->close();
        ?>
    </ul>
</body>
</html>
