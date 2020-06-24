var cnes = $('#cnes');

cnes.keyup(function buscar() {
    $.ajax({
        url: '../../controller/hospital/campoValido.php',
        type: 'POST',
        dataType: 'html',
        data: {
            "cnes": cnes.val()
        },
        success: function(msg) {
            $("#verificarCnes").html(msg);
        }
    });
});