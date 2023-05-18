<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="../public/assets/css/loginstyles.css" rel="stylesheet"> -->
    <link href="../public/assets/js/dash.js">
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8RfWJYEZwBq0evQ9yRSI8fzAwBu2Q76s&callback=initMap" type="text/javascript"></script>
    <style>
        #map {
            height: 50vh;
            margin-bottom: 10px;
            display: none;
            border: 1px solid black;
        }

        #show {
            display: none;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #35363A;
            color: white;
            overflow: hidden;
        }

        .container {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        #loginform {
            width: 70%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: left;
            align-content: center;
            margin: auto auto;
            padding: 50px 50px 80px 50px;
            border-radius: 15px;
            background-color: white;
            color: black;
        }


        h1 {
            font-size: 28px;
            margin-top: 0;
        }

        .nav {
            margin-bottom: 20px;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        li {
            margin-right: 20px;
        }

        a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        a.active {
            color: #E14761;
        }

        /* Form styling */
        .form {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        #buttoncontainer {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        /* .cancelbutton {
            background-color: #ccc;
            color: #fff;
            border: none;
        }

        .loginbutton {
            background-color: #E14761;
            color: #fff;
            border: none;
        } */

        /* Page content styling */
        .container .page {
            display: none;
            width: 100%;
        }

        .container .page.active {
            display: block;
        }

        .loginbutton {
            width: 150px;
            height: 35px;
            border-radius: 10px;
            border: 0px;
            background-color: #E14761;
            color: #e0e0e0;
        }

        .cancelbutton {
            width: 150px;
            height: 35px;
            border-radius: 10px;
            border: 2px solid #E14761;
            background-color: white;
            color: #E14761;
        }

        */
    </style>
    <title>Signup</title>
</head>

<body>
    <!-- <h1>Using the map to obtain the location data</h1>
    <br />
    <div id="map"></div>

    <button id="showMe" class="btn" onclick="getLocation()">Get current Location</button>
    <br>
    <br>
    <label for="address">Enter Address:</label>
    <input type="text" name="address" id="address" required>
    <button type="button" onclick="getLocationFromAddress()">Get Location</button>
    <br>
    <br>

    <form method="POST">
        <input type='hidden' name='lat' id='lat'>
        <input type='hidden' name='lng' id='long'>
        <button type='submit' name='submit' onclick='saveLocation()'>Save Location</button>
    </form>

    <div id="mapss" style="height: 400px; width: 100%;"></div> -->


    <div class='container'>
        <!-- <div id='logo-side'><img id='logolarge' src='../public/assets/images/logo2.png'></div> -->
        <div id="loginform">
            <h1>Using the map to obtain the location</h1>
            <!-- Navigation menu -->
            <nav class="nav">
                <ul>
                    <li><a href="#home" class="active">Use the current location</a></li>
                    <li><a href="#about">Use the address</a></li>

                </ul>
            </nav>

            <!-- Page content -->
            <div class="container">
                <div class="page active" id="home">
                    <h2>Use the current location</h2>
                    <div id="map"></div>
                    <button id="showMe" class="btn" onclick="getLocation()">Get current Location</button>
                    <!-- <div id="mapss" style="height: 200px; width: 100%;"></div> -->
                </div>

                <div class="page" id="about">
                    <h1>Enter you address</h1>
                    <label for="address">Enter Address:</label>
                    <input type="text" name="address" id="address" required>
                    <button type="button" onclick="getLocationFromAddress()">Get Location</button>
                    <div id="mapss" style="height: 300px; width: 100%;"></div>
                </div>
            </div>
            <div id="buttoncontainer">
                <form method="POST">
                    <input type='hidden' name='lat' id='lat'>
                    <input type='hidden' name='lng' id='long'>
                    <button type='submit' class="loginbutton" name='submit' onclick='saveLocation()'>Save Location</button>
                    <button type="reset" class="cancelbutton">Reset</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        var pages = document.querySelectorAll('.page');
        var links = document.querySelectorAll('.nav a');

        for (var i = 0; i < links.length; i++) {
            links[i].addEventListener('click', function(e) {
                e.preventDefault();
                var target = this.getAttribute('href').replace('#', '');

                for (var j = 0; j < pages.length; j++) {
                    pages[j].classList.remove('active');
                }

                document.getElementById(target).classList.add('active');

                for (var k = 0; k < links.length; k++) {
                    links[k].classList.remove('active');
                }

                this.classList.add('active');
            });
        }
        const mapArea = document.getElementById('map');
        const actionBtn = document.getElementById('showMe');
        const locationsAvailable = document.getElementById('locationList');
        const __KEY = 'AIzaSyD8RfWJYEZwBq0evQ9yRSI8fzAwBu2Q76s';
        let Gmap;
        let Gmarker;

        actionBtn.addEventListener('click', e => {
            actionBtn.style.display = "none";
            document.getElementById('show').style.display = "block";
            getLocation();
        });

        getLocation = () => {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(displayLocation, showError, options);
            } else {
                // handle error when geolocation is not supported
                console.log("Geolocation is not supported");
            }
        }

        showError = (error) => {
            mapArea.style.display = "block"
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    mapArea.innerHTML = "You denied the request for your location."
                    break;
                case error.POSITION_UNAVAILABLE:
                    mapArea.innerHTML = "Your Location information is unavailable."
                    break;
                case error.TIMEOUT:
                    mapArea.innerHTML = "Your request timed out. Please try again"
                    break;
                case error.UNKNOWN_ERROR:
                    mapArea.innerHTML = "An unknown error occurred please try again after some time."
                    break;
            }
        }

        const options = {
            enableHighAccuracy: true
        }

        displayLocation = (position) => {
            const lat = position.coords.latitude;
            const lng = position.coords.longitude;
            // const lat = 6.8482244;
            // const lng = 79.9486568;
            console.log(`Your current location is: ${lat}, ${lng}`);
            document.getElementById('lat').value = lat;
            document.getElementById('long').value = lng;
            const latlng = {
                lat,
                lng
            }
            showMap1(latlng);
            createMarker1(latlng);
            mapArea.style.display = "block";
        }

        showMap1 = (latlng) => {
            let mapOptions = {
                center: latlng,
                zoom: 17
            };
            Gmap = new google.maps.Map(mapArea, mapOptions);
        }

        createMarker1 = (latlng) => {
            let markerOptions = {
                position: latlng,
                map: Gmap,
                // animation: google.maps.Animation.BOUNCE,
                clickable: true,
                draggable: true
            };
            Gmarker = new google.maps.Marker(markerOptions);
        }


        getMap = () => {
            document.getElementById('map').style.display = "block";
        }

        let map2;
        let marker;

        function getLocationFromAddress() {
            const geocoder = new google.maps.Geocoder();
            const address = document.getElementById('address').value;
            geocoder.geocode({
                'address': address
            }, function(results, status) {
                if (status == 'OK') {
                    const lat = results[0].geometry.location.lat();
                    const lng = results[0].geometry.location.lng();
                    document.getElementById('lat').value = lat;
                    document.getElementById('long').value = lng;
                    showMap2({
                        lat,
                        lng
                    });
                    createMarker2({
                        lat,
                        lng
                    });
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }

        function showMap2(latlng) {
            map2 = new google.maps.Map(document.getElementById('mapss'), {
                center: latlng,
                zoom: 15
            });
        }

        function createMarker2(latlng) {
            marker = new google.maps.Marker({
                position: latlng,
                map: map2,
                draggable: true
            });
        }

        function updateMarkerPosition(latLng) {
            document.getElementById('lat').value = latLng.lat();
            document.getElementById('long').value = latLng.lng();
        }

        google.maps.event.addListener(marker, 'dragend', function() {
            updateMarkerPosition(marker.getPosition());
        });


        function saveLocation() {
            const lat = document.getElementById('lat').value;
            const lng = document.getElementById('long').value;

            // You can now save the latitude and longitude to your database using AJAX or any other method you prefer
        }
    </script>
</body>

</html>