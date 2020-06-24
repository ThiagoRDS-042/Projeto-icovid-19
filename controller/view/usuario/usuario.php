<?php
require_once('../../controller/autenticar/verificarUsuarioLogado.php');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    require_once("../../controller/hospital/tabelaHospitais.php");
    exibirHospitais();
    require_once('../head.php');
    ?>
    <link rel="stylesheet" href="../css/usuario/usuario.css">
    <link rel="stylesheet" href="../css/usuario/tabela.css">
    <title>Home Page Usuário</title>
</head>

<body>
    <?php
    require_once('navUsuario.php');
    ?>
    
    <main>
        <div class="d-flex justify-content-center">
            <h1><?php echo "Olá " . $_SESSION['nomeUsuario'] . ", seja bem Vindo ao IcóVid-19!"; ?></h1>
        </div>


        <h1 class="d-flex justify-content-center topicoTabela">Notificações</h1>
        <div id="tabela">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><b class="row justify-content-center">Nome</b></th>
                        <th><b class="row justify-content-center">Email</b></th>
                        <th><b class="row justify-content-center">Telefone</b></th>
                        <th><b class="row justify-content-center">Notificação</b></th>
                    </tr>
                </thead>
                <?php while ($row = $notificacoes->fetch_assoc()) :  ?>
                    <tbody>

                        <td><span class="row justify-content-center"><?php echo $row['nomeHospital'] ?></span></td>
                        <td><span class="row justify-content-center"><?php echo $row['emailHospital'] ?></span></td>
                        <td><span class="row justify-content-center"><?php echo $row['telefone'] ?></span></td>
                        <?php if ($row['notificacao'] == "Emergencia") : ?>
                            <td><span class="row justify-content-center">Caso Grave, Risco de Morte, Necessario Atendimento Imediato, Por Favor Procure Atendimento o mais rapido possivel.</span></td>
                        <?php elseif ($row['notificacao'] == "Muito Urgente") : ?>
                            <td><span class="row justify-content-center">Caso Grave e Risco significativo de Morte, Caso não seja Contatado dentro de duas hora, Por Favor Procure Atendimento o mais rapido possivel.</span></td>
                        <?php elseif ($row['notificacao'] == "Urgente") : ?>
                            <td><span class="row justify-content-center">Caso de gravidade moderada, necessario atendimento medico, Procure Atendimento o mais breve.</span></td>
                        <?php else : ?>
                            <td><span class="row justify-content-center">Caso de atendimento preferencial nas unidades de atenção basica.</span></td>
                        <?php endif; ?>
                    <?php endwhile; ?>
                    </tbody>
            </table>
        </div>
    </main>
    <?php
    require_once('../footer.php');
    ?>
</body>

</html>