<?php
require_once('../../controller/banco/conexao.php');

if (isset($_POST['email'])) {

    $email = $_POST['email'];

    $usuario = $conexao->query("SELECT * FROM usuario WHERE emailUsuario = '$email'");
    $hospital = $conexao->query("SELECT * FROM hospital WHERE emailHospital = '$email'");


    if ($hospital->num_rows > 0) {
        echo '<font color= "#A61243"><b>E-mail Inválido!</b></font>';
    }else if($usuario->num_rows > 0){
        echo '<font color= "#A61243"><b>E-mail Inválido!</b></font>';
    } else if($email == null){
        echo '<font color= "#A61243"><b>E-mail Inválido!</b></font>';
    } else if (!strpos($email, '@')) {
        echo'<font color= "yellow"><b>Valide com: "@".</b></font>';
    } else {
        echo '<font color= "#181285"><b>E-mail Válido!</b></font>';
    }
}

if (isset($_POST['cnes'])) {

    $cnes = $_POST['cnes'];

    $hospital = $conexao->query("SELECT * FROM hospital WHERE cnes = '$cnes'");

    if ($hospital->num_rows > 0) {
        echo '<font color= "#A61243"><b>CNES Inválido!</b></font>';
    }else if(strlen($cnes) == 7){
        echo '<font color= "#181285"><strong>CNES Válido!</b></font>';
    } else {
        echo '<font color= "#A61243"><b>O Campo Deve Conter 7 Digitos!</b></font>';
    }
}

?>