<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Maps Current Location</title>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
        #info {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Google Maps Current Location with Address</h1>
    <div id="map"></div>
    <div id="info"></div>

    <script>
        let map, infoWindow, geocoder;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: -34.397, lng: 150.644 },
                zoom: 15
            });

            infoWindow = new google.maps.InfoWindow();
            geocoder = new google.maps.Geocoder();

            // Try HTML5 geolocation to get the user's current location.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        };

                        infoWindow.setPosition(pos);
                        infoWindow.setContent("Location found.");
                        infoWindow.open(map);
                        map.setCenter(pos);

                        // Get address based on current location
                        geocodeLatLng(geocoder, pos);
                    },
                    () => {
                        handleLocationError(true, infoWindow, map.getCenter());
                    }
                );
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(
                browserHasGeolocation
                    ? "Error: The Geolocation service failed."
                    : "Error: Your browser doesn't support geolocation."
            );
            infoWindow.open(map);
        }

        function geocodeLatLng(geocoder, pos) {
            geocoder.geocode({ location: pos }, (results, status) => {
                if (status === "OK") {
                    if (results[0]) {
                        const address = results[0].formatted_address;
                        const lat = pos.lat;
                        const lng = pos.lng;
                        document.getElementById("info").innerHTML = `
                            <p><strong>Address:</strong> ${address}</p>
                            <p><strong>Latitude:</strong> ${lat}</p>
                            <p><strong>Longitude:</strong> ${lng}</p>
                        `;
                    } else {
                        window.alert("No results found");
                    }
                } else {
                    window.alert("Geocoder failed due to: " + status);
                }
            });
        }
    </script>

    <!-- Replace YOUR_API_KEY with your actual Google Maps API key -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdAZ4F5lMXVLUIq2boas2zeElRdXVBVbc&callback=initMap"></script>
</body>
</html>
