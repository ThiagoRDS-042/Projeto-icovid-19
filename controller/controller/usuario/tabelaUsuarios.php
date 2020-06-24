<?php
require_once('../../controller/banco/conexao.php');
require_once('../../controller/exibirMsg/notificacao.php');

$filtro = $_POST['filtrar'];
if ($filtro != null) {
    if (strpos($filtro, '@')) {
        $emailUsuarios = $conexao->query("SELECT * FROM usuario INNER JOIN sintomas ON usuario.usuarioID = sintomas.usuario and emailUsuario like '%$filtro%' ORDER BY porcentagem DESC");
        $tabela = $emailUsuarios;
    } else if (strpos($filtro, '/') and strlen($filtro) == 10) {
        $data = $filtro;
        $filtro = $data[6] . $data[7] . $data[8] . $data[9] . "-" . $data[3] . $data[4] . "-" . $data[0] . $data[1];
        $dataEnvio = $conexao->query("SELECT * FROM usuario INNER JOIN sintomas ON usuario.usuarioID = sintomas.usuario and dataEnvio like '%$filtro%' ORDER BY porcentagem DESC");
        $tabela = $dataEnvio;
    } else if (strlen($filtro) <= 3 and is_numeric($filtro)) {
        $filtro =  2020 - $filtro;
        $dataNascimento = $conexao->query("SELECT * FROM usuario INNER JOIN sintomas ON usuario.usuarioID = sintomas.usuario and dataNascimento like '%$filtro%' ORDER BY porcentagem DESC");
        $tabela = $dataNascimento;
    } else {
        $nomeUsuarios = $conexao->query("SELECT * FROM usuario INNER JOIN sintomas ON usuario.usuarioID = sintomas.usuario and nomeUsuario like '%$filtro%' ORDER BY porcentagem DESC");
        $tabela = $nomeUsuarios;
    }
} else {
    $usuarios =  $conexao->query("SELECT * FROM usuario INNER JOIN sintomas ON usuario.usuarioID = sintomas.usuario ORDER BY porcentagem DESC");
    $tabela = $usuarios;
}

if ($tabela->num_rows > 0) :
?>
    <link rel="stylesheet" href="/projeto-icovid-19/view/css/hospital/tabela.css">

    <div class="container">
        <h1 class="row justify-content-center topicoTabela">Usuários Cadastrados</h1>
        <div id="tabela">
            <div class="d-flex justify-content-center">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><b class="row justify-content-center">Nome</b></th>
                            <th><b class="row justify-content-center">E-mail</b></th>
                            <th><b class="row justify-content-center">Idade</b></th>
                            <th><b class="row justify-content-center">Data de Envio</b></th>
                            <th><b class="row justify-content-center">Porcetagem de Risco</b></th>
                            <th><b class="row justify-content-center">Relatório</b></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while ($row = $tabela->fetch_assoc()) :
                            $data = $row['dataNascimento'];
                            $ano = $data[0] . $data[1] . $data[2] . $data[3];
                            $idade =  2020 - $ano;
                            $data = $row['dataEnvio'];
                            $dataEnvio = $data[8] . $data[9] . "/" . $data[5] . $data[6] . "/" . $data[0] . $data[1] . $data[2] . $data[3];
                        ?>
                            <tr>
                                <td><span class="row justify-content-center"><?php echo $row['nomeUsuario']; ?></span></td>
                                <td><span class="row justify-content-center"><?php echo $row['emailUsuario']; ?></span></td>
                                <td><span class="row justify-content-center"><?php echo $idade . ' anos'; ?></span></td>
                                <td><span class="row justify-content-center"><?php echo $dataEnvio; ?></span></td>
                                <td><span class="row justify-content-center"><?php echo $row['porcentagem'] . "%"; ?></span></td>
                                <td><a class="row justify-content-center" target="blank" href="../hospital/relatorio.php?exibir=<?php echo $row['usuarioID'] ?>"><img src="../imagens/relatorio.png" alt="Icone de Relatório"></a></td>
                            </tr>
                        <?php
                        endwhile;
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
        <p>Relação de Usuarios</p>
    </div>

<?php else : ?>
    <div class="msg">
        <h1 class="d-flex justify-content-center topicoTabela">Ops! :(</h1>
        <p class="d-flex justify-content-center"><?php echo "Nenhum resultado encontrado para: $filtro"; ?></p>
    </div>
<?php endif; ?>