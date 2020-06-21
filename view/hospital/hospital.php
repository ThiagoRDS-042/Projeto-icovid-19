<?php
require_once('../../controller/autenticar/verificarHospitalLogado.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    require_once('../head.php');
    ?>
    <link rel="stylesheet" href="../css/hospital/hospital.css">
    <title>Home Page Hospital</title>
</head>

<body>
    <?php
    require_once('navHospital.php');
    require_once('../../controller/usuario/tabelaUsuarios.php');
    ?>

    <main>
        <?php 
        require_once('../../controller/exibirMsg/notificacao.php');
        ?>
        <div class="d-flex justify-content-center">
            <h1><?php echo "Olá " . $_SESSION['nomeHospital'] . ", seja bem Vindo ao IcóVid-19!"; ?></h1>
        </div>
        <?php
        tabelaUsuarios();
        ?>
        <div class="container">
            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Idade</th>
                            <th>Data de Envio</th>
                            <th>Porcetagem</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while ($row = $listaUsuarios->fetch_assoc()) :
                            $data = $row['dataNascimento'];
                            $ano = $data[0] . $data[1] . $data[2] . $data[3];
                            $idade =  2020 - $ano;
                            $data = $row['dataEnvio'];
                            $dataEnvio = $data['8'] . $data['9'] . "/" . $data['5'] . $data['6'] . "/" . $data['0'] . $data['1'] . $data['2'] . $data['3'];
                        ?>
                            <tr>
                                <td><?php echo $row['nomeUsuario']; ?></td>
                                <td><?php echo $row['emailUsuario']; ?></td>
                                <td><?php echo $idade . ' anos'; ?></td>
                                <td><?php echo $dataEnvio; ?></td>
                                <td><?php echo $row['porcentagem'] . "%"; ?></td>
                                <td>
                                    Relatório
                                </td>
                            </tr>
                        <?php
                        endwhile;
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </main>

    <?php
    require_once('../footer.php');
    ?>
</body>

</html>