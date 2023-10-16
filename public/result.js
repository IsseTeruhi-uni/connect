function initMap() {
    // Drawing map
    var mapElement = document.getElementById("map");

    // Geolocation API and get user location
    if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var userLocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            // Map option
            var mapOptions = {
                zoom: 13, // level of zoom
                center: userLocation // user center
            };

            var map = new google.maps.Map(mapElement, mapOptions);

            // making marker
            var marker = new google.maps.Marker({
                position: userLocation,
                map: map,
                title: 'Your Location'
            });
        });
    } else {

        console.error("Geolocation is not supported by your browser.");
    }
}

window.onload = function () {
    initMap();
};