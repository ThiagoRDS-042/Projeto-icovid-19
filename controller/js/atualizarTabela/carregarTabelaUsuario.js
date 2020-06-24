var body = document.querySelector('body')

body.onload = function carregarTabela() {
    $.ajax({
        url: '../../controller/usuario/tabelaUsuarios.php',
        type: 'POST',
        dataType: 'html',
        data: {
            "filtrar": filtro.val()
        },
        success: function(msg) {
            $("#table").html(msg);
        }
    });
}