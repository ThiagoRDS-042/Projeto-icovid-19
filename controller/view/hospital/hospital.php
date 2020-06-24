<?php
require_once('../../controller/autenticar/verificarHospitalLogado.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    require_once('../head.php');
    require_once('../../controller/exibirMsg/exibirMsg.php');
    ?>
    <link rel="stylesheet" href="../css/hospital/hospital.css">
    <title>Home Page Hospital</title>
</head>

<body>
    <?php
    require_once('navHospital.php');
    ?>

    <main>
        <div>
            <h1 class="d-flex justify-content-center"><?php echo "Olá " . $_SESSION['nomeHospital'] . ", seja bem Vindo ao IcóVid-19!"; ?></h1>
        </div>
        <div id="table"></div>
    </main>

    <?php
    require_once('../footer.php');
    ?>
    <script src="../../controller/js/atualizarTabela/atualizarTabelaUsuario.js"></script>
    <script src="../../controller/js/atualizarTabela/carregarTabelaUsuario.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</body>

</html>