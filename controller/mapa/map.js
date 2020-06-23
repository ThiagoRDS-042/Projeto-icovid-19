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
            lat: -6.404206,
            lng: -38.878133
        },
        iconImage: '/projeto-icovid-19/view/imagens/ubs.png',
        content: '<p>UBS Gama, HORÁRIO DE ATENDIMENTO DAS 07: 00 AS 11: 00 E DE 13: 00 A 16 </p>'
    }, {
        coords: {
            lat: -6.406934,
            lng: -38.862481
        },
        iconImage: '/projeto-icovid-19/view/imagens/hospitalRegional.png',
        content: '<p>Hospital Regional</p>'
    }, {
        coords: {
            lat: -6.406912,
            lng: -38.861391
        },
        iconImage: '/projeto-icovid-19/view/imagens/medi.png',
        content: '<p>CLINICA MEDI MEDICINA DIAGNÓSTICA, HORÁRIO 06:30 AS 11:30 E DE 13:00 AS 17:30 SEGUNDA A SEXTA E SÁBADO ATÉ 12:00.</p>'
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