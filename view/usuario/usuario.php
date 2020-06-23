<?php
require_once('../../controller/autenticar/verificarUsuarioLogado.php');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    require_once('../head.php');
    ?>
    <link rel="stylesheet" href="../css/usuario/usuario.css">
    <title>Home Page Usuário</title>
</head>

<body>
    <?php
    require_once('navUsuario.php');
    ?>
    <main>
        <?php
        require_once('../../controller/exibirMsg/notificacao.php');
        ?>
        <div class="d-flex justify-content-center">
            <h1><?php echo "Olá " . $_SESSION['nomeUsuario'] . ", seja bem Vindo ao IcóVid-19!"; ?></h1>
        </div>
    </main>
</body>

</html>