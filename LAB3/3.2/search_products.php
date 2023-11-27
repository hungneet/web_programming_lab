<?php
$dbServer = 'localhost';
$dbUser = 'root';
$dbPassword = '123456';
$dbName = 'OnlineStore';

$conn = new mysqli($dbServer, $dbUser, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if a search query is provided
$searchQuery = isset($_GET['query']) ? $_GET['query'] : '';

// SQL query to fetch data from the "products" table with search conditions
$sql = "SELECT * FROM products WHERE productName LIKE '%$searchQuery%' OR productID = '$searchQuery'";

$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        echo '
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>
            <tbody>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<th scope="row">' . $row['productID'] . '</th>';
            echo '<td>' . $row['productName'] . '</td>';
            echo '<td>' . $row['price'] . '</td>';
            echo '<td>' . $row['quantity'] . '</td>';
            echo '</tr>';
        }

        echo '</tbody>
        </table>';
    } else {
        echo "No products found with the given search criteria.";
    }
} else {
    echo "Error executing the query: " . $conn->error;
}

$conn->close();
?>