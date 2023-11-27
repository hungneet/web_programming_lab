<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Products</h1>
    <?php
    $dbServer = 'localhost';
    $dbUser = 'root';
    $dbPassword = '123456';
    $dbName = 'OnlineStore';

    $conn = new mysqli($dbServer, $dbUser, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to fetch data from the "products" table
    $sql = "SELECT * FROM products";

    $result = $conn->query($sql);

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
        echo "No products found in the database.";
    }

    $conn->close();
    ?>

</body>

</html>