<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX File Display</title>
</head>

<body>
    <div id="displayArea"></div>
    <script>
    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    var filePath = "file.txt";

    xhr.open("GET", filePath, true);

    xhr.onreadystatechange = function() {
        document.getElementById("displayArea").innerHTML = fileContent;

    };

    // Send the request to the server
    xhr.send();
    </script>
</body>

</html>