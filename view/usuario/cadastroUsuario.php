<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    require_once('../head.php');
    ?>
    <link rel="stylesheet" href="../css/usuario/cadastroUsuario.css">
    <title>Cadastro de Usuário</title>
</head>

<body>
    <?php
    require_once('../nav.php');
    if (!isset($_SESSION)) {
        session_start();
    }
    ?>

    <main>
        <?php if (isset($_SESSION['mensagem'])) : ?>
            <div class="alert alert-<?php echo $_SESSION['tipo_msg'] ?> d-flex justify-content-center">
                <?php
                echo $_SESSION['mensagem'];
                unset($_SESSION['mensagem']);
                ?>
            </div>
        <?php endif; ?>
        <div class="container">
            <div id="mostrar">
                <div class="cadastro">
                    <form action="../../controller/usuario/usuarioDAO.php" method="POST">
                        <span>Preencha Todos os Campos Obrigatórios(*)</span>
                        <div class="sumir">
                            <h1>Cadastro de Usuário</h1>

                            <div class="form-group text-input style-input">
                                <label for="sus">Nº do SUS*</label>
                                <input type="text" class="form-control" name="nSus" id="numSus">
                                <div id="verificarNumSus"></div>
                            </div>

                            <div class="form-group text-input">
                                <label for="nome">Nome*</label>
                                <input type="text" class="form-control" name="nome">
                            </div>

                            <div class="form-group text-input">
                                <label for="telefone">Data de Nascimento*</label>
                                <input type="date" class="form-control" name="dataNascimento">
                            </div>

                            <div class="form-group text-input style-input">
                                <label for="telefone">Telefone</label>
                                <input type="text" class="form-control" name="telefone2">
                            </div>

                            <div class="form-group text-input">
                                <label for="telefone">Telefone*</label>
                                <input type="text" class="form-control" name="telefone1">
                            </div>

                            <div class="form-group text-input style-input">
                                <label for="exampleInputPassword1">Senha*</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="senha">
                            </div>

                            <div class="form-group text-input">
                                <label for="exampleInputEmail1">E-mail*</label>
                                <input type="text" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                                <div id="verificarEmail"></div>
                            </div>

                            <div class="form-group text-input style-input">
                                <label for="n">Nº*</label>
                                <input type="text" class="form-control" name="n">
                            </div>

                            <div class="form-group text-input">
                                <label for="endereco">Endereço*</label>
                                <input type="text" class="form-control" name="endereco">
                            </div>

                            <div class="form-group text-input">
                                <label for="bairro">Bairro*</label>
                                <input type="text" class="form-control" name="bairro">
                            </div>

                            <div class="form-group text-input style-input">
                                <label for="estado">Estado*</label>
                                <input type="text" class="form-control" name="estado">
                            </div>

                            <div class="form-group text-input">
                                <label for="cidade">Cidade*</label>
                                <input type="text" class="form-control" name="cidade">
                            </div>
                        </div>

                        <a href="#mostrar" class="visualizar"><img src="../imagens/seta_branca_direita.png" alt="Imagem de uma Seta">Avançar</a>

                        <div class="exibir">
                            <h1>Sintomas</h1>
                            <div class="container">

                                <div class="direita">

                                    <label for="ViagemRecente">Viagem Recente:*</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions8" id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Sim</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions8" id="inlineRadio2" value="0">
                                        <label class="form-check-label" for="inlineRadio2">Não</label>
                                    </div>

                                    <label for="perdaDaFala">Perda da Fala:*</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions9" id="inlineRadio3" value="1">
                                        <label class="form-check-label" for="inlineRadio3">Sim</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions9" id="inlineRadio4" value="0">
                                        <label class="form-check-label" for="inlineRadio4">Não</label>
                                    </div>

                                    <label for="ContatoComDoentes">Falta de Ar:*</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions10" id="inlineRadio5" value="1">
                                        <label class="form-check-label" for="inlineRadio5">Sim</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions10" id="inlineRadio6" value="0">
                                        <label class="form-check-label" for="inlineRadio6">Não</label>
                                    </div>

                                    <label for="coriza">Coriza:*</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions11" id="inlineRadio7" value="1">
                                        <label class="form-check-label" for="inlineRadio7">Sim</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions11" id="inlineRadio8" value="0">
                                        <label class="form-check-label" for="inlineRadio8">Não</label>
                                    </div>
                                </div>

                                <div class="esquerda">

                                    <label for="faltaDeAr">Contato com Doentes:*</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio9" value="1">
                                        <label class="form-check-label" for="inlineRadio9">Sim</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio10" value="0">
                                        <label class="form-check-label" for="inlineRadio10">Não</label>
                                    </div>

                                    <label for="dorDeGarganta">Dor de Garganta:*</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="inlineRadio11" value="1">
                                        <label class="form-check-label" for="inlineRadio11">Sim</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="inlineRadio12" value="0">
                                        <label class="form-check-label" for="inlineRadio12">Não</label>
                                    </div>

                                    <label for="dorDeCabeca">Dor de Cabeça:*</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio13" value="1">
                                        <label class="form-check-label" for="inlineRadio13">Sim</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio14" value="0">
                                        <label class="form-check-label" for="inlineRadi14">Não</label>
                                    </div>

                                    <label for="dorDeCabeca">Doenças Crônicas:*</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions3" id="inlineRadio15" value="1">
                                        <label class="form-check-label" for="inlineRadio15">Sim</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions3" id="inlineRadio16" value="0">
                                        <label class="form-check-label" for="inlineRadio16">Não</label>
                                    </div>
                                </div>

                                <div class="central">

                                    <label for="dorNoPeito">Dor no Peito:*</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions4" id="inlineRadio17" value="1">
                                        <label class="form-check-label" for="inlineRadio17">Sim</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions4" id="inlineRadio18" value="0">
                                        <label class="form-check-label" for="inlineRadio18">Não</label>
                                    </div>

                                    <label for="tosseSeca">Tosse Seca:*</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions5" id="inlineRadio19" value="1">
                                        <label class="form-check-label" for="inlineRadio19">Sim</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions5" id="inlineRadio20" value="0">
                                        <label class="form-check-label" for="inlineRadio20">Não</label>
                                    </div>

                                    <label for="cansaco">Cansaço:*</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions6" id="inlineRadio21" value="1">
                                        <label class="form-check-label" for="inlineRadio21">Sim</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions6" id="inlineRadio22" value="0">
                                        <label class="form-check-label" for="inlineRadio22">Não</label>
                                    </div>

                                    <label for="febre">Febre:*</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions7" id="inlineRadi23" value="1">
                                        <label class="form-check-label" for="inlineRadio23">Sim</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions7" id="inlineRadio24" value="0">
                                        <label class="form-check-label" for="inlineRadio24">Não</label>
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="finalizar btn btn-primary" name="salvar">Finalizar</button>
                            <a href="#" class="esconder"><img src="../imagens/seta_branca_esquerda.png" alt="Imagem de uma Seta">Voltar</a>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>

    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script src="../../controller/verificarCampo/verificarEmailUsuario.js"></script>
    <script src="../../controller/verificarCampo/verificarNumSus.js"></script>
    <?php
    require_once('../footer.php');
    ?>
</body>

</html>