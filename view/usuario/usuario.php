<?php
require_once('../../controller/autenticar/verificarUsuarioLogado.php');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    require_once('../head.php');
    ?>
    <title>Home Page Usuário</title>
</head>

<body>
    <?php
    echo "Olá ". $_SESSION['nomeUsuario']. ", seja bem Vindo!";
    
    ?>

    

</body>

</html>