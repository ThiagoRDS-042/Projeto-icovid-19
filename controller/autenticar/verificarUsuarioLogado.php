<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['usuarioID']) and !isset($_SESSION['emailUsuario']) and !isset($_SESSION['senhaUsuario'])) {
    header('location:../pages/login.php');
}
?>