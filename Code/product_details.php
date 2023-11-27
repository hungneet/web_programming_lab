<?php
// Include or require the file containing the database connection logic
require_once('db_connection.php'); 

// Check if a product ID is provided in the URL
$productId = isset($_GET['id']) ? $_GET['id'] : '';

// Validate and sanitize the product ID (to prevent SQL injection)
$productId = filter_var($productId, FILTER_SANITIZE_NUMBER_INT);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch details of the selected product
$sql = "SELECT * FROM products WHERE productID = '$productId'";

$result = $conn->query($sql);

if ($result !== false && $result->num_rows > 0) {
    // Fetch the details of the selected product
    $row = $result->fetch_assoc();

    // Display the details of the selected product
    echo '<h2>Product Details</h2>';
    echo '<p>ID: ' . $row['productID'] . '</p>';
    echo '<p>Name: ' . $row['productName'] . '</p>';
    echo '<p>Price: ' . $row['price'] . '</p>';
    echo '<p>Quantity: ' . $row['quantity'] . '</p>';
} else {
    echo "Product not found or invalid ID.";
}

// Close the database connection if needed
$conn->close();
?>