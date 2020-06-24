var botao = document.querySelectorAll('.botaoRelatorio');
var msg;

botao.forEach(buton => {
    buton.onclick = function fechar() {
        window.close();
        msg = "Notificação Enviada Com Sucesso!";
        alert(msg);
    }
});