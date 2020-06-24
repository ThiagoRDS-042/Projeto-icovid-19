<?php
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['hospitalID'])){
    unset($_SESSION['hospitalID']);
    unset($_SESSION['emailHospital']);
    unset($_SESSION['senhaHospital']);
    unset($_SESSION['nomeHospital']);
}else{
    unset($_SESSION['usuarioID']);
    unset($_SESSION['emailUsuario']);
    unset($_SESSION['senhaUsuario']);
    unset($_SESSION['nomeUsuario']);
}
header('location:../../view/pages/login.php');

?>