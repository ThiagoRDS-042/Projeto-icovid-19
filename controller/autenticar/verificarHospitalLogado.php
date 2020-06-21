<?php
if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['hospitalID']) AND !isset($_SESSION['emailHospital']) AND !isset($_SESSION['senhaHospital'])){
header('location:../pages/login.php');

}

?>