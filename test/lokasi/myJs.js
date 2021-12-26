var map, infoWindow, geocoder, elevation, marker, accuracyStatus, pos;
var output = document.getElementById('output');
var lat = document.getElementById('lat');
var lng = document.getElementById('lng');
var elv = document.getElementById('elv');

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 7,
        center: {
            lat: 0.3439242,
            lng: 102.3072246
        }
    });

    infowindow = new google.maps.InfoWindow();
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
                // console.log(position)
                if (position.coords.accuracy < 2000) {
                    accuracyStatus = '<strong style="color:green;"><span class="glyphicon glyphicon-ok"></span>Akurasi : ' + position.coords.accuracy.toFixed(2) + ' m(Bagus) </strong>';
                } else {
                    accuracyStatus = '<strong style="color: red;"><span class="glyphicon glyphicon-warning-sign "></span>Akurasi : ' + position.coords.accuracy.toFixed(2) + ' m (Lemah)</strong>';
                }

                console.log("Coordinate OK");
                // console.log(position);

                pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                };

                geocoder = new google.maps.Geocoder();
                elevation = new google.maps.ElevationService();

                geocoder.geocode({
                    'latLng': pos
                }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        map.setZoom(18);
                        map.setCenter(pos);
                        marker = new google.maps.Marker({
                            position: pos,
                            map: map,
                            animation: google.maps.Animation.BOUNCE,
                        });

                        var infowindowText = '<div class="text-center"><strong>Posisi Saat Ini</strong> </br>' + results[4].formatted_address + '</br> Lat: ' + pos.lat.toFixed(5) + ' | Long: ' + pos.lng.toFixed(5) + ' </br>' + accuracyStatus + '</div>';
                        infowindow.setContent(infowindowText);
                        infowindow.open(map, marker);
                        marker.addListener('click', function () {
                            infowindow.open(map, marker);
                        });
                        output.innerHTML = results[1].formatted_address + '</br> Latitude: <span id="latitude">' + pos.lat.toFixed(5) + '</br></span>Longitude: <span id="longitude"> ' + pos.lng.toFixed(5) + ' </span>';
                    }
                });

                //Menampilkan nilai ke value input html
                lat.value = pos.lat.toFixed(5);
                lng.value = pos.lng.toFixed(5);

                elevation.getElevationForLocations({
                        locations: [pos],
                    }).then(({
                        results
                    }) => {
                        infowindow.setPosition(pos);
                        // Retrieve the first result
                        // console.log(results);
                        if (results[0]) {
                            // Open the infowindow indicating the elevation at the clicked position.
                            // console.log(results[0].elevation);
                            console.log("Elevation OK");
                            elv.value = results[0].elevation.toFixed(3);
                        } else {
                            console.log("No results found");
                        }
                    })
                    .catch((e) =>
                        console.log("Elevation service failed due to: " + e)
                    );


            },
            function () {
                handleLocationError(true, infoWindow, map.getCenter());
            });
    } else {
        handleLocationError(false, infoWindow, map.getCenter());
    }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        '<span class="alert alert-danger">Error: The Geolocation service failed.</span>' :
        '<span class="alert alert-danger">Error: Your browser does`not support geolocation. < /span>');
    infoWindow.open(map);
}