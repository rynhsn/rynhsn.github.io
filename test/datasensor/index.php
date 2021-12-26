<!DOCTYPE html>
<html>

<body>

    <h2>Data Sensor</h2>

    <div>
        <p>pH Value : <span id="data"></span></p>
        <button type="button" onclick="getph()">Get Data</button>
        <p>Hardware Status : <span id="status"></span></p>
        <button type="button" onclick="cekstatus()">Cek Status</button>
    </div>

    <script>
        function getph() {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                var value = JSON.parse(xhttp.responseText);
                console.log(value);
                document.getElementById("data").innerHTML = value;
            }
            xhttp.open("GET", "http://iot.serangkota.go.id:8080/Dd68GbNOWP7yNiXdueBfU-EccxWU_gJF/get/V0");
            xhttp.send();
        }

        function cekstatus() {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                console.log(this.responseText);
                document.getElementById("status").innerHTML = this.responseText;
            }
            xhttp.open("GET", "http://iot.serangkota.go.id:8080/Dd68GbNOWP7yNiXdueBfU-EccxWU_gJF/isHardwareConnected");
            xhttp.send();
        }
    </script>

</body>

</html>