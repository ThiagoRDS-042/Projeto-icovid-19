<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('../../controller/autenticar/verificarUsuarioLogado.php');
?>

<link rel="stylesheet" href="../css/navs.css">

<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#"><img src="../imagens/logo.png" class="logo" alt="Logo do Site"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="usuario.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Configurações
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="atualizarDados.php?consultar=<?php echo $_SESSION['usuarioID'] ?>">Editar Dados</a>
                        <a class="dropdown-item" href="../../controller/usuario/usuarioDAO.php?excluir=<?php echo $_SESSION['usuarioID'] ?>">Excluir Conta</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../../controller/autenticar/sair.php">Sair</a>
                    </div>
                </li>
            </ul>
        </div>
        
    </nav>
</header>