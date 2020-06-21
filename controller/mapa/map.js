function initMap() {

    var options = {
        zoom: 18,
        center: {
            lat: -6.402462,
            lng: -38.859601
        }
    }

    var map = new google.maps.Map(document.getElementById('map'), options);

    var markes = [{
        coords: {
            lat: -6.402462,
            lng: -38.859601
        },
        content: '<p>texto de minha preferencia1!</p>'
    }, {
        coords: {
            lat: -6.401812,
            lng: -38.861382
        },
        content: '<p>texto de minha preferencia2!</p>'
    }];

    for (const mark of markes) {
        addMark(mark);
    }

    function addMark(props) {
        var marca = new google.maps.Marker({
            position: props.coords,
            map: map,
            icon: props.iconImage,
            content: props.content
        });

        var infoWindow = new google.maps.InfoWindow({
            content: props.content
        });

        marca.addListener('click', function() {
            infoWindow.open(map, marca);
        });
    }

}