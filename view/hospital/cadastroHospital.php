<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    require_once('../head.php');
    ?>
    <title>Cadastro de Hospital2</title>
</head>

<body>
    <?php
    require_once('../nav.php');
    ?>

    <main>
        <?php
        require_once('formulario.php');
        ?>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../../controller/verificarCampo/verificarEmailHospital.js"></script>
    <script src="../../controller/verificarCampo/verificarCnes.js"></script>
    <?php
    require_once('../footer.php');
    ?>

</body>

</html>