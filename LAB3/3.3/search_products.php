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

// Determine whether to fetch data in XML format
$fetchXml = isset($_GET['fetchXml']) ? $_GET['fetchXml'] : false;

if ($fetchXml) {
    // SQL query to fetch all data from the "products" table in XML format
    $sql = "SELECT * FROM products FOR XML AUTO, ELEMENTS, ROOT('products')";
} else {
    // SQL query to fetch data from the "products" table with search conditions
    $sql = "SELECT * FROM products WHERE productName LIKE '%$searchQuery%' OR productID = '$searchQuery'";
}

$result = $conn->query($sql);

if ($result !== false) {
    if ($fetchXml) {
        // Fetch the XML data as a string and output it
        $xmlData = $result->fetch_row()[0];
        header('Content-Type: application/xml');
        echo $xmlData;
    } else {
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
    }
} else {
    echo "Error executing the query: " . $conn->error;
}

$conn->close();
?>