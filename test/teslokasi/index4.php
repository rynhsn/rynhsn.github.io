<!DOCTYPE html>
<html>

<body>

    <h1>My First Google Map</h1>

    <div id="googleMap" style="width:100%;height:400px;"></div>

    <script>
        function initMap() {
            var mapProp = {
                center: new google.maps.LatLng(-6.1747, 106.827),
                zoom: 5,
            };
            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGanuNK5V8CuPFd_Nodxe1MwsXmnB8uuY&callback=initMap"></script>


</body>

</html>