<?php
require_once('../../controller/banco/conexao.php');

if (isset($_POST['email'])) {

    $email = $_POST['email'];

    $usuario = $conexao->query("SELECT * FROM usuario WHERE emailUsuario = '$email'");
    $hospital = $conexao->query("SELECT * FROM hospital WHERE emailHospital = '$email'");


    if ($hospital->num_rows > 0) {
        echo '<font color= "red">E-mail Inválido!</font>';
    }else if($usuario->num_rows > 0){
        echo '<font color= "red">E-mail Inválido!</font>';
    } else if($email == null){
        echo '<font color= "red">E-mail Inválido!</font>';
    } else if (!strpos($email, '@')) {
        echo'<font color= "yellow">Valide com: "@".</font>';
    } else {
        echo '<font color= "black">E-mail Válido!</font>';
    }
}

if (isset($_POST['cnes'])) {

    $cnes = $_POST['cnes'];

    $hospital = $conexao->query("SELECT * FROM hospital WHERE cnes = '$cnes'");

    if ($hospital->num_rows > 0) {
        echo '<font color= "red">CNES Inválido!</font>';
    }else if(strlen($cnes) == 7){
        echo '<font color= "black">CNES Válido!</font>';
    } else {
        echo '<font color= "red">Deve Conter 7 Digitos!</font>';
    }
}

?>