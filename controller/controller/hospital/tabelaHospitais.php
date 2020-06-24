<?php
require_once("../../controller/banco/conexao.php");
$notificacoes;

function exibirHospitais(){
    global $conexao, $notificacoes;
    $usuarioID = $_SESSION['usuarioID'];
    $notificacoes = $conexao->query("SELECT * FROM notificacao_status INNER JOIN hospital INNER JOIN notificacao ON notificacao_status.usuario = '$usuarioID' and notificacao_status.hospital = hospital.hospitalID and notificacao.notificacaoID = notificacao_status.notificacao") or die ($conexao->error);

}
?>