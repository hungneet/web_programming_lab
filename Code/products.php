<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>

<body>
    <h1>Products</h1>

    <!-- Number of items per page dropdown -->
    <label for="itemsPerPage">Items per page:</label>
    <select id="itemsPerPage" onchange="searchProducts()">
        <option value="10">10</option>
        <option value="20">20</option>
        <option value="50">50</option>
        <!-- Add more options as needed -->
    </select>
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
        var itemsPerPage = $("#itemsPerPage").val();

        // AJAX request to fetch search results
        $.ajax({
            url: "search_products.php",
            method: "GET",
            data: {
                query: query,
                itemsPerPage: itemsPerPage
            },
            success: function(data) {
                $("#searchResults").html(data);
            },
            error: function(error) {
                console.error("Error fetching search results: " + error);
            }
        });
    }
    $(document).ready(function() {
        searchProducts(); // Load products on page load
    });

    function changePage(page) {
        var query = $("#query").val();
        var itemsPerPage = $("#itemsPerPage").val();

        // AJAX request to fetch search results
        $.ajax({
            url: "search_products.php",
            method: "GET",
            data: {
                query: query,
                itemsPerPage: itemsPerPage,
                page: page
            },
            success: function(data) {
                $("#searchResults").html(data);
            },
            error: function(error) {
                console.error("Error fetching search results: " + error);
            }
        });
    }


    function updateQueryStringParameter(uri, key, value) {
        var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
        var separator = uri.indexOf('?') !== -1 ? "&" : "?";
        if (uri.match(re)) {
            return uri.replace(re, '$1' + key + "=" + value + '$2');
        } else {
            return uri + separator + key + "=" + value;
        }
    }
    </script>
</body>

</html>