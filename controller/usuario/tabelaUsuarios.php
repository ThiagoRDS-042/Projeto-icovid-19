<?php
require_once('../../controller/banco/conexao.php');

$listaUsuarios;

function tabelaUsuarios(){
    global $conexao, $listaUsuarios;

    $listaUsuarios = $conexao->query("SELECT usuario.nomeUsuario, usuario.emailUsuario, usuario.dataNascimento, sintomas.porcentagem, sintomas.dataEnvio  FROM usuario INNER JOIN sintomas ON usuario.usuarioID = sintomas.usuario ORDER BY (sintomas.porcentagem) DESC") or die ($conexao->error);

}

?>