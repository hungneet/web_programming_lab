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
$itemsPerPage = isset($_GET['itemsPerPage']) ? $_GET['itemsPerPage'] : 10;

// Get the current page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $itemsPerPage;

// SQL query to fetch data with search conditions and pagination
$sql = "SELECT * FROM products 
        WHERE productName LIKE '%$searchQuery%' OR productID = '$searchQuery'
        LIMIT $offset, $itemsPerPage";

$result = $conn->query($sql);

if ($result !== false) {
    // Display the results in a table with product name links
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
            echo '<td><a href="index.php?page=product_details&id=' . $row['productID'] . '">' . $row['productName'] . '</a></td>';
            echo '<td>' . $row['price'] . '</td>';
            echo '<td>' . $row['quantity'] . '</td>';
            echo '</tr>';
        }

        echo '</tbody>
        </table>';
    } else {
        echo "No products found with the given search criteria.";
    }

    // Pagination
    $sql = "SELECT COUNT(*) AS total FROM products 
            WHERE productName LIKE '%$searchQuery%' OR productID = '$searchQuery'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $totalItems = $row['total'];
    $totalPages = ceil($totalItems / $itemsPerPage);

    echo '<div class="pagination">';
    for ($i = 1; $i <= $totalPages; $i++) {
        echo '<a href="javascript:void(0);" onclick="changePage(' . $i . ')" class="pagination-btn ' . ($page == $i ? 'active' : '') . '">' . $i . '</a>';
    }
    echo '</div>';
} else {
    echo "Error executing the query: " . $conn->error;
}

$conn->close();
?>