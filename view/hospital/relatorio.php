<!DOCTYPE html>
<html lang="pr-br">

<head>
    <meta charset="UTF-8">
    <?php
    require_once('../../view/head.php');
    require_once('../../controller/autenticar/verificarHospitalLogado.php');
    ?>
    <link rel="stylesheet" href="../css/hospital/relatorio.css">
    <title>Relatório</title>
</head>

<body>

    <?php
    require_once("../../controller/usuario/usuarioDAO.php");
    if (isset($_GET['exibir'])) {
        exibirDadosUsuarios();
        $row = $dadosUsuarios->fetch_assoc();
        $row2 = $dadosTelefone->fetch_assoc();
    }
    ?>

    <div class="infoBotoes">
        <img src="../imagens/infoBotoes.png" alt="">
    </div>
    <script src="../../controller/js/fecharRelatorio/fecharRelatorio.js"></script>

    <main>
        <div>
            <h1 class="row justify-content-center">Relatório</h1>
        </div>
        <div class="infoPessoais">
            <div class="nome">
                <h2>Nome: </h2>
                <p><?php echo $row['nomeUsuario']; ?></p>
            </div>

            <div class="email">
                <h2>E-mail:</h2>
                <p><?php echo $row['emailUsuario']; ?></p>

            </div>

            <div class="info">
                <div class="telefone">
                    <h2>Telefone: </h2>
                    <p><?php echo $row2['telefone']; ?></p>
                </div>

                <div class="idade">
                    <h2>Idade:</h2>
                    <?php
                    $data = $row['dataNascimento'];
                    $ano = $data[0] . $data[1] . $data[2] . $data[3];
                    $idade =  2020 - $ano;
                    ?>
                    <p><?php echo $idade . " anos"; ?></p>
                </div>
            </div>
        </div>

        <h1 class="row justify-content-center">Endereço</h1>
        <div class="endereco">
            <div class="blocoEsquerdo">
                <div>
                    <h2>Bairro: </h2>
                    <p><?php echo $row2['bairro']; ?></p>
                </div>

                <div>
                    <h2>Cidade:</h2>
                    <p><?php echo $row2['cidade']; ?></p>

                </div>
            </div>

            <div class="blocoDireito">
                <div>
                    <h2>Número: </h2>
                    <p><?php echo $row2['num']; ?></p>
                </div>
            </div>

            <div class="blocoCentral">
                <div>
                    <h2>Rua: </h2>
                    <p><?php echo $row2['endereco']; ?></p>
                </div>
                <div>
                    <h2>Estado:</h2>
                    <p><?php echo $row2['estado']; ?></p>

                </div>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>
                        <h1 class="row justify-content-center sintomas">Sintomas</h1>
                    </th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <?php if ($row['febre'] == 1) : ?>
                        <td><span class="row justify-content-center">Febre</span></td>
                    <?php endif; ?>
                </tr>

                <tr>
                    <?php if ($row['dorCabeca'] == 1) : ?>
                        <td><span class="row justify-content-center">Dor de Cabeça</span></td>
                    <?php endif; ?>
                </tr>

                <tr>
                    <?php if ($row['dorGarganta'] == 1) : ?>
                        <td><span class="row justify-content-center">Dor de Garganta</span></td>
                    <?php endif; ?>
                </tr>

                <tr>
                    <?php if ($row['dorPeito'] == 1) : ?>
                        <td><span class="row justify-content-center">Dor no Peito</span></td>
                    <?php endif; ?>
                </tr>

                <tr>
                    <?php if ($row['cansaco'] == 1) : ?>
                        <td><span class="row justify-content-center">Cançaso</span></td>
                    <?php endif; ?>
                </tr>

                <tr>
                    <?php if ($row['tosseSeca'] == 1) : ?>
                        <td><span class="row justify-content-center">Tosse Seca</span></td>
                    <?php endif; ?>
                </tr>

                <tr>
                    <?php if ($row['perdaFala'] == 1) : ?>
                        <td><span class="row justify-content-center">Perda Fala</span></td>
                    <?php endif; ?>
                </tr>

                <tr>
                    <?php if ($row['faltaAr'] == 1) : ?>
                        <td><span class="row justify-content-center">Faltar de Ar</span></td>
                    <?php endif; ?>
                </tr>

                <tr>
                    <?php if ($row['coriza'] == 1) : ?>
                        <td><span class="row justify-content-center">Coriza</span></td>
                    <?php endif; ?>
                </tr>

            </tbody>
        </table>

        <div class="obs">
            <p>OBS: O usuário <?php echo $row['nomeUsuario']; ?> também declarou ter
                <?php if ($row['doencasCronicas'] == 1 and $row['viagemRecente'] == 1 and $row['contatoDoentes'] == 1) : ?>
                    algum tipo de doença crônica, de ter viajado(a) recentemente e de ter tido contato com doentes da covid-19.
                <?php elseif ($row['doencasCronicas'] == 1 and $row['viagemRecente'] == 1) : ?>
                    algum tipo de doença crônica e de ter viajado(a) recentemente.
                <?php elseif ($row['doencasCronicas'] == 1 and $row['contatoDoentes'] == 1) : ?>
                    algum tipo de doença crônica e de ter tido contato com doentes da covid-19.
                <?php elseif ($row['contatoDoentes'] == 1 and $row['viagemRecente'] == 1) : ?>
                    tido contato com doentes da covid-19 e de ter algum tipo de doença crônica.
                <?php elseif ($row['contatoDoentes'] == 1) : ?>
                    tido contato com doentes da covid-19.
                <?php elseif ($row['viagemRecente'] == 1) : ?>
                    viajado(a) Recentemente.
                <?php else : ?>
                    algum tipo de doença crônica.
                <?php endif; ?>
            </p>
        </div>
        <div class="inline-group verde">
            <a href="../../controller/usuario/usuarioDAO.php?usuarioID=<?php echo $row['usuarioID'] ?>&hospitalID=<?php echo $_SESSION['hospitalID'] ?>&notificacao=Pouco Urgente"><button type="button" class="btn btn-success botaoRelatorio">Verde</button></a>
        </div>

        <div class="inline-group vermelho">
            <a href="../../controller/usuario/usuarioDAO.php?usuarioID=<?php echo $row['usuarioID'] ?>&hospitalID=<?php echo $_SESSION['hospitalID'] ?>&notificacao=Emergencia"><button type="button" class="btn btn-danger botaoRelatorio">Vermelho</button></a>
        </div>

        <div class="inline-group amarelo">
            <a href="../../controller/usuario/usuarioDAO.php?usuarioID=<?php echo $row['usuarioID'] ?>&hospitalID=<?php echo $_SESSION['hospitalID'] ?>&notificacao=Urgente"><button type="button" class="btn btn-warning botaoRelatorio">Amarelo</button></a>
        </div>

        <div class="inline-group laranja">
            <a href="../../controller/usuario/usuarioDAO.php?usuarioID=<?php echo $row['usuarioID'] ?>&hospitalID=<?php echo $_SESSION['hospitalID'] ?>&notificacao=Muito Urgente"><button type="button" class="btn botaoRelatorio">Laranja</button></a>
        </div>

    </main>

<script src="../../controller/js/fecharRelatorio/fecharRelatorio.js"></script>
</body>

</html>