<?php
require_once('../banco/conexao.php');
require_once('../../controller/exibirMsg/exibirMsg.php');


if(isset($_POST['autenticar']) AND $_POST['email'] != null AND $_POST['senha'] != null){
    $email = $_POST['email'];
    $senha =md5($_POST['senha']);

    $usuario = $conexao->query("SELECT * FROM usuario WHERE emailUsuario = '$email' AND senhaUsuario= '$senha'") or die($conexao->error);
    $hospital = $conexao->query("SELECT * FROM hospital WHERE emailHospital = '$email' AND senhaHospital = '$senha'") or die($conexao->error);
    
    if($usuario ->num_rows > 0){
        $usuario = $usuario->fetch_assoc();
        if(!isset($_SESSION)){
            session_start();
        }
        $_SESSION['usuarioID'] = $usuario['usuarioID'];
        $_SESSION['emailUsuario'] = $usuario['emailUsuario'];
        $_SESSION['senhaUsuario'] = $usuario['senhaUsuario'];
        $_SESSION['nomeUsuario'] = $usuario['nomeUsuario'];
        header("location:../../view/usuario/usuario.php");
    }else if($hospital ->num_rows > 0){
        $hospital = $hospital->fetch_assoc();
        if(!isset($_SESSION)){
            session_start();
        }
        $_SESSION['hospitalID'] = $hospital['hospitalID'];
        $_SESSION['emailHospital'] = $hospital['emailHospital'];
        $_SESSION['senhaHospital'] = $hospital['senhaHospital'];
        $_SESSION['nomeHospital'] = $hospital['nomeHospital'];
        header("location:../../view/hospital/hospital.php");
    }else{
        exibirMsg("Dados Inválidos!", "danger");
        header("location:../../view/pages/login.php");

    }
}else{
    exibirMsg("Preencha Todos os Campos!", "warning");
    header("location:../../view/pages/login.php");
}


?>