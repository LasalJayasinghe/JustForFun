<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find fuel</title>
    <link href = "<?=ROOT?>/assets/css/ffstyles.css" rel = "stylesheet">
    <style>
        #find_fuel{
            color: #E14761;
        }
        </style>
</head>

<body>
    
    <div id="nav-placeholder"><?php $this->view('includes/nav',$data);?></div>
    
    <?php if(!Auth::logged_in()):?>
        <h3>Login as customer to access the customer features</h3>
        <?php redirect('home');?>
        <?php endif;?>
    
    <div class="container">
        <div id="map-layer"></div>
    </div>

    <?php $DAResult = $data['DAResult']; ?>
    <script
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8RfWJYEZwBq0evQ9yRSI8fzAwBu2Q76s&callback=initMap" async defer>
	</script>

    <script>
        var map;

        function initMap() {
            var mapLayer = document.getElementById("map-layer");
            var centerCoordinates = new google.maps.LatLng(6.9100, 79.8800);
            var defaultOptions = { center: centerCoordinates, zoom: 13.5, mapId: "87d201cbfce9533d"}

            map = new google.maps.Map(mapLayer, defaultOptions);
            var DAResult = <?php echo json_encode($data['DAResult']); ?>;
        
            addMarkers(DAResult);

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    var userIcon = "<?=ROOT?>/assets/images/userloc.svg"; // Your user location marker icon

                    // Create a marker for the user's location
                    var userMarker = new google.maps.Marker({
                        position: pos,
                        map: map,
                        icon: {url:userIcon, labelOrigin: new google.maps.Point(43, 18)},
                        title: "You are here"
                    });

                    // Center the map on the user's location
                    map.setCenter(pos);
                }, function() {
                    handleLocationError(true, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, map.getCenter());
            }
        }

        function handleLocationError(browserHasGeolocation, pos) {
            alert(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
        }

        function addMarkers(DAResult) {
            for (var i = 0; i < DAResult.length; i++) {
                var station = DAResult[i];
                var latitude = parseFloat(station["lat"]);
                var longitude = parseFloat(station["lng"]);
                var icon = station["account_status"] = 0 ? "<?=ROOT?>/assets/images/darklocation.svg" : "<?=ROOT?>/assets/images/redlocation.svg";

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(latitude, longitude),
                    map: map,
                    icon: {url:icon, labelOrigin: new google.maps.Point(43, 18)},
                    title: station["location"]
                });

                var contentString = '<div id="content">' +
                    '<div id="siteNotice">' +
                    '</div>' +
                    '<h2 id="firstHeading" class="firstHeading">' + station["name"] + '</h2>' +
                    '<div id="bodyContent">' +
                    '<p><b>Petrol 92 Balance: </b>' + station["petrol92_bal"] + '</p>' +
                    '<p><b>Petrol 95 Balance: </b>' + station["petrol95_bal"] + '</p>' +
                    '<p><b>Auto Diesel Balance: </b>' + station["dieselauto_bal"] + '</p>' +
                    '<p><b>Super Diesel Balance: </b>' + station["dieselsuper_bal"] + '</p>' +
                    '<a href="https://www.google.com/maps/dir/?api=1&destination=' + station["lat"] + ',' + station["lng"] + '" target="_blank">Get Directions</a>' +
                    '</div>' +
                    '</div>';

                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });

                // Using an IIFE to bind the current state of `marker` and `infowindow`
                (function(marker, infowindow) {
                    marker.addListener('click', function() {
                        infowindow.open(map, marker);
                    });
                })(marker, infowindow);
            }
        }
        </script>

    </body>
</html>