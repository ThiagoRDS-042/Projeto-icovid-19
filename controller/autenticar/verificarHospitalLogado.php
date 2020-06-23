<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['hospitalID']) and !isset($_SESSION['emailHospital']) and !isset($_SESSION['senhaHospital'])) {
    header('location:../pages/login.php');
}
?>