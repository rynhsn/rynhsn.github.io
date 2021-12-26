<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <p id="output"></p>


    <script>
        var obj, lat, lng, accur;
        var output = document.getElementById("output");

        var url = "https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyDGanuNK5V8CuPFd_Nodxe1MwsXmnB8uuY";

        var xhr = new XMLHttpRequest();
        xhr.open("POST", url);

        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.setRequestHeader("Content-Length", "0");

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // console.log(xhr.status);
                // console.log(xhr.responseText);

                obj = JSON.parse(xhr.responseText);
                console.log(xhr);

                lat = obj.location.lat;
                lng = obj.location.lng;
                accur = obj.accuracy;
            }

            output.innerHTML = lat + ', ' + lng + ', ' + accur;
        };

        xhr.send();
    </script>
</body>

</html>