/**
 * Created by abrar on 4/10/2016.
 */
function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 43.7285, lng: -79.6079},
        zoom: 15
    });

    var infowindow = new google.maps.InfoWindow();
    var service = new google.maps.places.PlacesService(map);

    service.getDetails({
        placeId: 'ChIJiZJaJK07K4gRlB3OIEg3fWo'
    }, function(place, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
            var marker = new google.maps.Marker({
                map: map,
                position: place.geometry.location
            });
            google.maps.event.addListener(marker, 'click', function() {
                infowindow.setContent('<div><strong>' + place.name + '</strong><br>'
                    + '<br>' +
                    place.formatted_address + '</div>');
                infowindow.open(map, this);
            });
        }
    });
}