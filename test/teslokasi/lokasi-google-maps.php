<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">


    <style>
        html {
            position: relative;
            height: 100%;
        }

        body {
            margin-top: 10px;
        }

        #map {
            margin-top: 0px;
            width: 100%;
            height: 400px;
            border-radius: 10px
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-dark">
                    <div class="card-header text-white text-center">
                        <h4>Mengambil Posisi User Menggunakan Google Maps Api Geolocation</h4>
                    </div>
                    <div class="card-body">
                        <div id="map"></div>
                        <p class="card-text text-white" id="output"></p>
                    </div>
                </div> 
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGanuNK5V8CuPFd_Nodxe1MwsXmnB8uuY&callback=initMap&libraries=&v=weekly" defer></script>

    <script>
        var obj, lat, lng, accur, map, infoWindow, geocoder, marker, accuracyStatus;
        var output = document.getElementById("output");

        var url = "https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyDGanuNK5V8CuPFd_Nodxe1MwsXmnB8uuY";

        var xhr = new XMLHttpRequest();
        xhr.open("POST", url);

        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.setRequestHeader("Content-Length", "0");

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 7,
                center: {
                    lat: 0.3439242,
                    lng: 102.3072246
                }
            });

            infowindow = new google.maps.InfoWindow();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    obj = JSON.parse(xhr.responseText);

                    lat = obj.location.lat;
                    lng = obj.location.lng;
                    accur = obj.accuracy;

                    if (accur < 2000) {
                        accuracyStatus = '<strong style="color:green;"><span class="glyphicon glyphicon-ok"></span>Akurasi : ' + accur.toFixed(2) + ' m(Bagus) </strong>';
                    } else {
                        accuracyStatus = '<strong style="color: red;"><span class="glyphicon glyphicon-warning-sign "></span>Akurasi : ' + accur.toFixed(2) + ' m (Lemah)</strong>';
                    }

                    var pos = {
                        lat: lat,
                        lng: lng,
                    };

                    geocoder = new google.maps.Geocoder();
                    geocoder.geocode({
                        'latLng': pos
                    }, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            map.setZoom(15);
                            map.setCenter(pos);
                            marker = new google.maps.Marker({
                                position: pos,
                                map: map,
                                animation: google.maps.Animation.BOUNCE,
                            });

                            var infowindowText = '<div class="text-center"><strong>Posisi Saat Ini</strong> </br>' + results[4].formatted_address + '</br> Lat: ' + pos.lat.toFixed(5) + ' | Long: ' + pos.lng.toFixed(5) + ' </br>' + accuracyStatus + '</div>';
                            infowindow.setContent(infowindowText);
                            infowindow.open(map, marker);
                            marker.addListener('click', function() {
                                infowindow.open(map, marker);
                            });
                            // console.log(results)
                            output.innerHTML = results[1].formatted_address + '</br> Latitude: <span id="latitude">' + pos.lat + ' </span>Longitude: <span id="longitude"> ' + pos.lng + ' </span>';
                        }
                    });
                }

            };

            xhr.send();
        }
    </script>
</body>

</html>