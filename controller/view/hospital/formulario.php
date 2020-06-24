<link rel="stylesheet" href="/projeto-icovid-19/view/css/hospital/formulario.css">

<?php
require_once('../../controller/hospital/consultar.php');
if (!isset($_SESSION)) {
    session_start();
}
require_once('../../controller/exibirMsg/notificacao.php');
?>

<div class="container">

    <div class="cadastro">
        <form action="../../controller/hospital/hospitalDAO.php" method="POST">
            <span>Preencha Todos os Campos Obrigatórios(*)</span>
            <?php if ($id != "") : ?>
                <h1 class="row justify-content-center">Atualizar Dados</h1>
            <?php else : ?>
                <h1 class="row justify-content-center">Cadastro de Hospital</h1>
            <?php endif; ?>

            <input type="hidden" name="id" value="<?php echo $id ?>">

            <div class="form-group text-input style-input">
                <label for="telefone">CNES*</label>
                <input type="text" class="form-control" name="cnes" id="cnes" value="<?php echo $cnes  ?>">
                <div id="verificarCnes"></div>
            </div>

            <div class="form-group text-input">
                <label for="nome">Nome*</label>
                <input type="text" class="form-control" name="nome" value="<?php echo $nomeHospital  ?>">
            </div>

            <div class="form-group text-input">
                <label for="telefone">Telefone*</label>
                <input type="text" class="form-control" name="telefone" value="<?php echo $telefone  ?>">
            </div>

            <div class="form-group text-input style-input">
                <label for="exampleInputPassword1">Senha*</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="senha" <?php if ($id != "") : ?> placeholder="Confirme sua Senha" <?php endif; ?>>
            </div>

            <div class="form-group text-input">
                <label for="exampleInputEmail1">E-mail*</label>
                <input type="text" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?php echo $emailHospital  ?>">
                <div id="verificarEmail"></div>
            </div>

            <div class="form-group text-input style-input">
                <label for="n">Nº*</label>
                <input type="text" class="form-control" name="n" value="<?php echo $num  ?>">
            </div>

            <div class="form-group text-input">
                <label for="endereco">Endereço*</label>
                <input type="text" class="form-control" name="endereco" value="<?php echo $endereco  ?>">
            </div>

            <div class="form-group text-input">
                <label for="bairro">Bairro*</label>
                <input type="text" class="form-control" name="bairro" value="<?php echo $bairro  ?>">
            </div>

            <div class="form-group text-input style-input">
                <label for="estado">Estado*</label>
                <input type="text" class="form-control" name="estado" value="<?php echo $estado  ?>">
            </div>

            <div class="form-group text-input">
                <label for="cidade">Cidade*</label>
                <input type="text" class="form-control" name="cidade" value="<?php echo $cidade  ?>">
            </div>
            <div class="form-group">
                <?php if ($id != "") : ?>
                    <button type="submit" class="btn btn-primary botao" name="editar">Atualizar</button>
                <?php else : ?>
                    <button type="submit" class="btn btn-primary botao" name="salvar">Salvar</button>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="../../controller/js/verificarCampo/verificarEmailHospital.js"></script>
<script src="../../controller/js/verificarCampo/verificarCnes.js"></script>