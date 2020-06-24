var email = $('#email');

email.keyup(function buscar() {
    $.ajax({
        url: '../../controller/hospital/campoValido.php',
        type: 'POST',
        dataType: 'html',
        data: {
            "email": email.val()
        },
        success: function(msg) {
            $("#verificarEmail").html(msg);
        }
    });
});