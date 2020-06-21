<?php
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['usuarioID']) AND !isset($_SESSION['emailUsuario']) AND !isset($_SESSION['senhaUsuario'])){
header('location:../pages/login.php');

}

?>