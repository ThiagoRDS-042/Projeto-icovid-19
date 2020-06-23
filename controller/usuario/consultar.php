<?php
require_once('../../controller/banco/conexao.php');
$id = "";
$nomeUsuario = "";
$emailUsuario = "";
$numSus = "";
$dataNascimento = "";
$telefone1 = "";
$telefone2 = "";
$bairro = "";
$cidade = "";
$estado = "";
$endereco = "";
$num = "";

if (isset($_GET['consultar'])) {
    $id = $_GET['consultar'];
    $usuario = $conexao->query("SELECT * FROM usuario WHERE usuarioID = '$id'") or die($conexao->error);
    $enderecoUsuario = $conexao->query("SELECT * FROM endereco_usuario WHERE usuario = '$id'") or die($conexao->error);
    $telefoneUsuario = $conexao->query("SELECT * FROM telefone_usuario WHERE usuario = '$id'") or die($conexao->error);

    if ($usuario->num_rows == 1 and $enderecoUsuario->num_rows == 1 and ($telefoneUsuario->num_rows == 2 or $telefoneUsuario->num_rows == 1)) {
        $usuario = $usuario->fetch_array();
        $enderecoUsuario = $enderecoUsuario->fetch_array();
        $telefone1 = $telefoneUsuario;
        $telefone1 = $telefone1->fetch_array();

        $id = $usuario['usuarioID'];
        $nomeUsuario = $usuario['nomeUsuario'];
        $emailUsuario = $usuario['emailUsuario'];
        $numSus = $usuario['numSus'];
        $dataNascimento = $usuario['dataNascimento'];

        $bairro = $enderecoUsuario['bairro'];
        $cidade = $enderecoUsuario['cidade'];
        $estado = $enderecoUsuario['estado'];
        $endereco = $enderecoUsuario['endereco'];
        $num = $enderecoUsuario['num'];

        $telefone1 = $telefone1['telefone'];
        while($fone = $telefoneUsuario->fetch_array()){
            $telefone2 = $fone['telefone'];
        }
        
    }
}
?>