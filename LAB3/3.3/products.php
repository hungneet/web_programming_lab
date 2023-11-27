<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>

<body>
    <h1>Products</h1>

    <!-- Search Form -->
    <form id="searchForm">
        <div class="input-group mb-4">
            <input type="text" class="form-control" placeholder="Search by Name or ID" name="query" id="query">
            <button type="button" class="btn btn-primary" onclick="searchProducts()">Search</button>
        </div>
    </form>

    <!-- Table to display search results -->
    <div id="searchResults"></div>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- JavaScript for handling form submission and updating table -->
    <script>
    function searchProducts() {
        var query = $("#query").val();

        // AJAX request to fetch search results
        $.ajax({
            url: "search_products.php", // Create a separate PHP file for handling the search logic
            method: "GET",
            data: {
                query: query
            },
            success: function(data) {
                $("#searchResults").html(data); // Update the content of the div with search results
            },
            error: function(error) {
                console.error("Error fetching search results: " + error);
            }
        });
    }
    </script>

</body>

</html>