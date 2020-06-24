<?php
require_once('../../controller/banco/conexao.php');

if (isset($_POST['email'])) {

    $email = $_POST['email'];

    $usuario = $conexao->query("SELECT * FROM usuario WHERE emailUsuario = '$email'");
    $hospital = $conexao->query("SELECT * FROM hospital WHERE emailHospital = '$email'");

    if ($usuario->num_rows > 0) {
        echo '<font color= "#A61243"><b>E-mail Inválido!</b></font>';
    }else if($hospital->num_rows > 0){
        echo '<font color= "#A61243"><b>E-mail Inválido!</b></font>';
    } else if($email == null){
        echo '<font color= "#A61243"><b>E-mail Inválido!</b></font>';
    } else if (!strpos($email, '@')) {
        echo '<font color= "yellow"><b>Valide com: "@".</b></font>';
    } else {
        echo '<font color= "#181285"><b>E-mail Válido!</b></font>';
    }
}

if (isset($_POST['numSus'])) {

    $numSus = $_POST['numSus'];

    $usuario = $conexao->query("SELECT * FROM usuario WHERE numSus = '$numSus'");

    if ($usuario->num_rows > 0) {
        echo '<font color= "#A61243"><b>Nº do SUS Inválido!</b></font>';
    }else if(strlen($numSus) == 15){
        echo '<font color= "#181285"><b>Nº do SUS Válido!</b></font>';
    } else {
        echo '<font color= "#A61243"><b>O Campo Deve Conter 15 Digitos!</></font>';
    }
}

?>