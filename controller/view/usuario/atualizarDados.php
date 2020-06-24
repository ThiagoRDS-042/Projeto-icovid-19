<?php
require_once('../../controller/autenticar/verificarUsuarioLogado.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    require_once('../head.php');
    require_once('../../controller/usuario/consultar.php');
    ?>
    <title>Atualizar Dados</title>
</head>

<body>
    <?php
    require_once('navUsuario.php');
    ?>

    <main>
        <?php
        require_once('formulario.php');
        ?>
    </main>

    <?php
    require_once('../footer.php');
    ?>

</body>

</html>