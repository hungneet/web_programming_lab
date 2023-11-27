<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>WELCOME TO OUR SHOP</h1>
    <p1> You can use the map to found your way to our shop location</p1>
    <div id="googleMap" style="width:100%;height:500px;"></div>


    <script>
        function myMap() {
            var mapProp = {
                center: new google.maps.LatLng(10.772531770502043, 106.6580202952014),
                zoom: 18,
            };
            var myCenter = new google.maps.LatLng(10.772531770502043, 106.6580202952014);
            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
            var marker = new google.maps.Marker({
                position: myCenter,
                animation: google.maps.Animation.BOUNCE
            });

            marker.setMap(map);
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA66KwUrjxcFG5u0exynlJ45CrbrNe3hEc&callback=myMap">
    </script>
</body>

</html>