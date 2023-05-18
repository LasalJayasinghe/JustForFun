//This div will display Google map
const mapArea = document.getElementById('map');

//This button will set everything into motion when clicked
const actionBtn = document.getElementById('showMe');

//This will display all the available addresses returned by Google's Geocode Api
const locationsAvailable = document.getElementById('locationList');

const __KEY = 'AIzaSyD8RfWJYEZwBq0evQ9yRSI8fzAwBu2Q76s';

let Gmap;
let Gmarker;

//Now we listen for a click event on our button
actionBtn.addEventListener('click', e => {
  // hide the button 
  actionBtn.style.display = "none";
  document.getElementById('show').style.display = "block";
  // call Materialize toast to update user 
  //M.toast({ html: 'fetching your current location', classes: 'rounded' });
  // get the user's position
  getLocation();
});

//This function will get the user's current position
getLocation = () => {
    // check if user's browser supports Navigator.geolocation
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(displayLocation, showError, options);
    } else {
     // M.toast({ html: "Sorry, your browser does not support this feature... Please Update your Browser to enjoy it", classes: "rounded" });
     pass;
    }
}

// Displays the different error messages
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
//Makes sure location accuracy is high
const options = {
    enableHighAccuracy: true
}

displayLocation = (position) => {
    const lat = position.coords.latitude;
    const lng = position.coords.longitude;
    //print the user's location to the console
    console.log(`Your current location is: ${lat}, ${lng}`);
    document.getElementById('lat').innerHTML = lat;
    document.getElementById('long').innerHTML = lng;
    const latlng = { lat, lng }
    showMap(latlng);
    createMarker(latlng);
    mapArea.style.display = "block";
}

showMap = (latlng) => {
    let mapOptions = {
      center: latlng,
      zoom: 17
    };
    Gmap = new google.maps.Map(mapArea, mapOptions);
}

createMarker = (latlng) => {
    let markerOptions = {
      position: latlng,
      map: Gmap,
      animation: google.maps.Animation.BOUNCE,
      clickable: true
    };
    Gmarker = new google.maps.Marker(markerOptions);
}


function saveLocation() {
  const lat = document.getElementById('lat').value;
  const lng = document.getElementById('long').value;

  // You can now save the latitude and longitude to your database using AJAX or any other method you prefer
}