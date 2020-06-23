<?php
if (!isset($_SESSION)) {
  session_start();
}
require_once('../../controller/autenticar/verificarHospitalLogado.php');
?>

<link rel="stylesheet" href="/projeto-icovid-19/view/css/navs.css">

<header>
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#"><img src="/projeto-icovid-19/view/imagens/logo.png" class="logo" alt="Logo do Site"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="hospital.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Configurações
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="atualizarDados.php?consultar=<?php echo $_SESSION['hospitalID'] ?>">Editar Dados</a>
            <a class="dropdown-item" href="../../controller/hospital/hospitalDAO.php?excluir=<?php echo $_SESSION['hospitalID'] ?>">Excluir Conta</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../../controller/autenticar/sair.php">Sair</a>
          </div>
        </li>
      </ul>
      <div class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" id="filtro" placeholder="Pesquise na Página" aria-label="Search">
        <button class="btn btn-primary navButton" id="filtrar">Pesquisar</button>
      </div>
    </div>
  </nav>
</header>