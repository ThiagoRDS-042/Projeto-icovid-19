<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once('../head.php');
    ?>
    <title>Login</title>
    <link rel="stylesheet" href="../css/pages/login.css">
</head>

<body>
    <?php
    require_once('../nav.php');
    if (!isset($_SESSION)) {
        session_start();
    }
    ?>

    <main>
        <?php
        require_once('../../controller/exibirMsg/notificacao.php');
        ?>

        <div class="container">
            <img src="../imagens/login.png" alt="Imagem de Login">
            <div class="login">
                <h1 class="row justify-content-center">Login</h1>
                <form action="../../controller/autenticar/autenticar.php" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">E-mail</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Senha</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="senha">
                    </div>
                    <button type="submit" class="btn btn-primary" name="autenticar">Login</button>
                </form>
            </div>
            <p class="cadastro"><a href="../usuario/cadastroUsuario.php">Cadastrar Usuário</a></p>
            <p class="cadastro hospital"><a href="../hospital/cadastroHospital.php">Cadastrar Hospital</a></p>
        </div>

    </main>
    <?php
    require_once('../footer.php');
    ?>
</body>

</html>