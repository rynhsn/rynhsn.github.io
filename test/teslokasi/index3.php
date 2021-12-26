<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #map {
            height: 400px;
            /* The height is 400 pixels */
            width: 100%;
            /* The width is the width of the web page */
        }
    </style>

    <script>
        var x = document.getElementById("demo");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation tidak didukung oleh browser ini.";
            }
        }

        function showPosition(position) {
            x.innerHTML = "Latitude: " + position.coords.latitude +
                "<br>Longitude: " + position.coords.longitude +
                "<br><b>Lokasi Telah Aktif</b>";
        }

        function initMap() {
            // The location of Uluru
            const pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            // The map, centered at Uluru
            const map = new google.maps.Map(
                document.getElementById("map"), {
                    zoom: 4,
                    center: pos,
                }
            );

            // The marker, positioned at Uluru
            const marker = new google.maps.Marker({
                position: pos,
                map: map,
            });
            console.log(pos);
        }
    </script>
</head>

<body>
    <button type="button" onclick="getLocation()">Aktifkan Lokasi</button>
    <button type="button" onclick="initMap()">Aktifkan</button>
    <div id="map"></div>
    <p id="demo"></p>


</body>

</html>