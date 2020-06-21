<?php
require_once('../../controller/banco/conexao.php');
$id = "";
$nomeHospital = "";
$emailHospital = "";
$cnes = "";
$telefone = "";
$bairro = "";
$cidade = "";
$estado = "";
$endereco = "";
$num = "";

if (isset($_GET['consultar'])) {
    $id = $_GET['consultar'];
    $hospital = $conexao->query("SELECT * FROM hospital WHERE hospitalID = '$id'") or die($conexao->error);
    $enderecoHospital = $conexao->query("SELECT * FROM endereco_hospital WHERE hospital = '$id'") or die($conexao->error);

    if ($hospital->num_rows == 1 AND $enderecoHospital->num_rows == 1) {
        $hospital = $hospital->fetch_array();
        $enderecoHospital = $enderecoHospital->fetch_array();
        $id = $hospital['hospitalID'];
        $nomeHospital = $hospital['nomeHospital'];
        $emailHospital = $hospital['emailHospital'];
        $cnes = $hospital['cnes'];
        $telefone = $hospital['telefone'];
        $bairro = $enderecoHospital['bairro'];
        $cidade = $enderecoHospital['cidade'];
        $estado = $enderecoHospital['estado'];
        $endereco = $enderecoHospital['endereco'];
        $num = $enderecoHospital['num'];
    }

}
?>