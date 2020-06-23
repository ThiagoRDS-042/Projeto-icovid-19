var numSus = $('#numSus');

numSus.keyup(function buscar() {
    $.ajax({
        url: '../../controller/usuario/campoValido.php',
        type: 'POST',
        dataType: 'html',
        data: {
            "numSus": numSus.val()
        },
        success: function(msg) {
            $("#verificarNumSus").html(msg);
        }
    });
});