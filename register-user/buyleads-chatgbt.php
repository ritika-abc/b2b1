<?php
// Connect to your database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "yourDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assume user is authenticated and their ID is stored in $user_id

// Check if user has reached their monthly limit
$user_id = 1; // Example user ID
$limit = 20; // Monthly limit
$month = date('m'); // Current month

$sql = "SELECT COUNT(*) AS total_leads FROM buy_lead_access WHERE user_id = $user_id AND MONTH(accessed_at) = $month";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_leads = $row['total_leads'];

if ($total_leads >= $limit) {
    echo "You have reached your monthly limit of $limit buy leads.";
    exit;
}

// If user hasn't reached their limit, allow access to buy leads

// Record the access of buy lead
$sql = "INSERT INTO buy_lead_access (user_id, accessed_at) VALUES ($user_id, NOW())";
if ($conn->query($sql) === TRUE) {
    echo "Buy lead access recorded successfully.";
} else {
    echo "Error recording buy lead access: " . $conn->error;
}

// Close connection
$conn->close();
?>
