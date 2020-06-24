var botao = $('#filtrar');
var filtro = $('#filtro');

botao.click(function atualizarTabela() {
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
});