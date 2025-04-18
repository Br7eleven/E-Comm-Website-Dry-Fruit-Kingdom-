window.addEventListener('load', function() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        document.getElementById('locationDisplay').innerText = "Geolocation is not supported by this browser.";
    }
});

function showPosition(position) {
    var lat = position.coords.latitude;
    var lon = position.coords.longitude;
    var locationDisplay = document.getElementById('locationDisplay');
    locationDisplay.innerText = "Latitude: " + lat + "°, Longitude: " + lon + "°";
    initMap(lat, lon);
}

function showError(error) {
    var locationDisplay = document.getElementById('locationDisplay');
    switch(error.code) {
        case error.PERMISSION_DENIED:
            locationDisplay.innerText = "User denied the request for Geolocation.";
            break;
        case error.POSITION_UNAVAILABLE:
            locationDisplay.innerText = "Location information is unavailable.";
            break;
        case error.TIMEOUT:
            locationDisplay.innerText = "The request to get user location timed out.";
            break;
        case error.UNKNOWN_ERROR:
            locationDisplay.innerText = "An unknown error occurred.";
            break;
    }
}

function initMap(lat, lon) {
    var userLocation = { lat: lat, lng: lon };
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 14,
        center: userLocation
    });
    var marker = new google.maps.Marker({
        position: userLocation,
        map: map
    });
}
