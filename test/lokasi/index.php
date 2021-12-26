<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tanamapa</title>

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

                        <form action="data.php" method="post">
                            <div class="row">
                            <div class="col">
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Lat</span>
                                    </div>
                                    <input type="text" class="form-control rounded-0" id="lat" value="" name="lat">
                                </div>
                            </div>

                            <div class="col">
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Lng</span>
                                    </div>
                                    <input type="text" class="form-control rounded-0" id="lng" value="" name="lng">
                                </div>
                            </div>

                            <div class="col">
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Ele</span>
                                    </div>
                                    <input type="text" class="form-control rounded-0" id="elv" value="" name="elv">
                                </div>
                            </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm rounded-0">Submit</button>
                        </form>
                    </div>
                </div> 
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="myJs.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGanuNK5V8CuPFd_Nodxe1MwsXmnB8uuY&callback=initMap&libraries=&v=weekly" defer></script>
</body>

</html>