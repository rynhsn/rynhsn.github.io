<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <button type="button" onclick="getLocation()">Aktifkan Lokasi</button>
    <p id="demo"></p>
    <div id="mapholder"></div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGanuNK5V8CuPFd_Nodxe1MwsXmnB8uuY&libraries=&v=weekly" defer></script>

    <script>
        var x = document.getElementById("demo");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            lat = position.coords.latitude;
            lon = position.coords.longitude;
            accur = position.coords.accuracy;
            console.log(position)
            x.innerHTML = "Latitude: " + lat +
                "<br>Longitude: " + lon +
                "<br>Accuracy: " + accur;

            mapholder = document.getElementById('mapholder')
            mapholder.style.height = '500px';
            mapholder.style.width = '100%';

            latlon = new google.maps.LatLng(lat, lon)

            var myOptions = {
                center: latlon,
                zoom: 17,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }

            var map = new google.maps.Map(mapholder, myOptions);
            var marker = new google.maps.Marker({
                position: latlon,
                map: map,
            });

        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    x.innerHTML = "User denied the request for Geolocation."
                    break;
                case error.POSITION_UNAVAILABLE:
                    x.innerHTML = "Location information is unavailable."
                    break;
                case error.TIMEOUT:
                    x.innerHTML = "The request to get user location timed out."
                    break;
                case error.UNKNOWN_ERROR:
                    x.innerHTML = "An unknown error occurred."
                    break;
            }
        }
    </script>
</body>

</html>