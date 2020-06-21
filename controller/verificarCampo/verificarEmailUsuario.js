var email = $('#email');

email.keyup(function buscar() {
    $.ajax({
        url: '../../controller/usuario/campoValido.php',
        type: 'POST',
        dataType: 'html',
        data: {
            "email": email.val()
        },
        success: function(data) {
            $("#verificarEmail").html(data);
        }
    });
});