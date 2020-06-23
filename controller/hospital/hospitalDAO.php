<?php
require_once('../../controller/banco/conexao.php');
require_once('../../controller/exibirMsg/exibirMsg.php');

if (isset($_POST['salvar']) and $_POST['nome'] != null and $_POST['email'] != null and $_POST['senha'] != null and $_POST['telefone'] != null and $_POST['cnes'] != null and $_POST['endereco'] != null and $_POST['bairro'] != null and $_POST['n'] != null and $_POST['cidade'] != null and $_POST['estado'] != null) {

    $email = $_POST['email'];
    $cnes = $_POST['cnes'];

    $emailValidoHospital = $conexao->query("SELECT * FROM hospital WHERE emailHospital = '$email'");
    $emailValido = $conexao->query("SELECT * FROM usuario WHERE emailUsuario = '$email'");
    $cnesValido = $conexao->query("SELECT * FROM hospital WHERE cnes = '$cnes'");

    if ($emailValido->num_rows <= 0 and $emailValidoHospital->num_rows <= 0 and $cnesValido->num_rows <= 0 and strpos($email, '@') and strlen($cnes) == 7) {

        //pegando os campos passados
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);
        $telefone = $_POST['telefone'];
        $cnes = $_POST['cnes'];

        //salvando hospital
        $conexao->query("INSERT INTO hospital(nomeHospital, emailHospital, senhaHospital, telefone, cnes) VALUES ('$nome', '$email', '$senha', '$telefone', '$cnes')") or die($conexao->error);

        //pegando do BD o id maximo
        $hospital = $conexao->query("SELECT MAX(hospitalID) FROM hospital") or die($conexao->error);
        $hospital = $hospital->fetch_array();
        $id =  $hospital[0];

        //salvando endereço
        //pegando os campos passados
        $endereco = $_POST['endereco'];
        $bairro = $_POST['bairro'];
        $num = $_POST['n'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];

        //salvando enderecoHospital
        $conexao->query("INSERT INTO endereco_hospital(endereco, bairro, num, cidade, estado, hospital) VALUES ('$endereco', '$bairro', '$num', '$cidade', '$estado', '$id')") or die($conexao->error);

        exibirMsg("Cadastro bem Sucedido!", "success");
        header("location:../../view/hospital/cadastroHospital.php");
    } else {
        exibirMsg("E-mail ou CNES Inválido!", "danger");
        header("location:../../view/hospital/cadastroHospital.php");
    }
} else if (isset($_GET['excluir'])) {

    $id = $_GET['excluir'];
    $conexao->query("DELETE FROM hospital WHERE hospitalID = '$id'") or die($conexao->error);
    exibirMsg("Conta Excluida com Sucesso!", "success");
    require_once('../../controller/autenticar/sair.php');
} else if (isset($_POST['editar']) and $_POST['senha'] == null) {

    exibirMsg("Atualização Falhou, Por Favor não se Esqueça de Preencher o Campo de Senha!", "danger");
    header("location:../../view/hospital/hospital.php");
} else if (isset($_POST['editar'])) {
    $id = $_POST['id'];
    $nomeHospital = $_POST['nome'];
    $emailHospital = $_POST['email'];
    $senhaHospital = md5($_POST['senha']);
    $cnes = $_POST['cnes'];
    $telefone = $_POST['telefone'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];
    $num = $_POST['n'];

    $conexao->query("UPDATE hospital SET nomeHospital = '$nomeHospital', emailHospital = '$emailHospital', senhaHospital = '$senhaHospital', cnes = '$cnes', telefone = '$telefone' WHERE hospitalID = '$id'") or die($conexao->error);
    $conexao->query("UPDATE endereco_hospital SET endereco = '$endereco', cidade = '$cidade', num = '$num', estado = '$estado', bairro = '$bairro' WHERE hospital = '$id'") or die($conexao->error);
    exibirMsg("Atualizado com Sucesso!", "success");
    header("location:../../view/hospital/hospital.php");
} else {
    exibirMsg("Preencha Todos os Campos Obrigatórios!", "warning");
    header("location:../../view/hospital/cadastroHospital.php");
}
?>