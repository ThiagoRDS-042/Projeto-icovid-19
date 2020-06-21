<?php
require_once('../../controller/banco/conexao.php');

if (isset($_POST['email'])) {

    $email = $_POST['email'];

    $usuario = $conexao->query("SELECT * FROM usuario WHERE emailUsuario = '$email'");
    $hospital = $conexao->query("SELECT * FROM hospital WHERE emailHospital = '$email'");

    if ($usuario->num_rows > 0) {
        echo '<font color= "red">E-mail Inválido!</font>';
    }else if($hospital->num_rows > 0){
        echo '<font color= "red">E-mail Inválido!</font>';
    } else if($email == null){
        echo '<font color= "red">E-mail Inválido!</font>';
    } else if (!strpos($email, '@')) {
        echo '<font color= "yellow">Valide com: "@".</font>';
    } else {
        echo '<font color= "black">E-mail Válido!</font>';
    }
}

if (isset($_POST['numSus'])) {

    $numSus = $_POST['numSus'];

    $usuario = $conexao->query("SELECT * FROM usuario WHERE numSus = '$numSus'");

    if ($usuario->num_rows > 0) {
        echo '<font color= "red">Nº do SUS Inválido!</font>';
    }else if(strlen($numSus) == 15){
        echo '<font color= "black">Nº do SUS Válido!</font>';
    } else {
        echo '<font color= "red">Deve Conter 15 Digitos!</font>';
    }
}

?>