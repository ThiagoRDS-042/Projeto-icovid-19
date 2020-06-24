<?php
require_once('../../controller/banco/conexao.php');
require_once("../../controller/exibirMsg/exibirMsg.php");
$dadosTelefone;
$dadosUsuarios;


if (isset($_POST['salvar']) and $_POST['nome'] != null and $_POST['email'] != null and $_POST['senha'] != null and $_POST['dataNascimento'] != null and $_POST['nSus'] != null and $_POST['telefone1'] != null and $_POST['endereco'] != null and $_POST['bairro'] != null and $_POST['n'] != null and $_POST['cidade'] != null and $_POST['estado'] != null and $_POST['inlineRadioOptions'] != null and $_POST['inlineRadioOptions1'] != null and $_POST['inlineRadioOptions2'] != null and $_POST['inlineRadioOptions3'] != null and $_POST['inlineRadioOptions4'] != null and $_POST['inlineRadioOptions5'] != null and $_POST['inlineRadioOptions6'] != null and $_POST['inlineRadioOptions7'] != null and $_POST['inlineRadioOptions8'] != null and $_POST['inlineRadioOptions9'] != null and $_POST['inlineRadioOptions10'] != null and $_POST['inlineRadioOptions11'] != null) {

    //pegando os campos passados
    $porcentagem = 0;
    $contadoDoentes = $_POST['inlineRadioOptions'];
    $dorGarganta = $_POST['inlineRadioOptions1'];
    $dorCabeca = $_POST['inlineRadioOptions2'];
    $doencasCronicas = $_POST['inlineRadioOptions3'];
    $dorPeito = $_POST['inlineRadioOptions4'];
    $tosseSeca = $_POST['inlineRadioOptions5'];
    $cansaco = $_POST['inlineRadioOptions6'];
    $febre = $_POST['inlineRadioOptions7'];
    $viagem = $_POST['inlineRadioOptions8'];
    $perdaFala = $_POST['inlineRadioOptions9'];
    $faltaAr = $_POST['inlineRadioOptions10'];
    $coriza = $_POST['inlineRadioOptions11'];

    if ($contadoDoentes == 1 or $dorGarganta == 1 or $dorCabeca == 1 or $doencasCronicas == 1 or $dorPeito == 1 or $tosseSeca == 1 or $cansaco == 1 or $febre == 1 or $viagem == 1 or $perdaFala == 1 or $faltaAr == 1 or $coriza == 1) {


        $email = $_POST['email'];
        $numSus = $_POST['nSus'];

        $emailValidoUsuario = $conexao->query("SELECT * FROM usuario WHERE emailUsuario = '$email'");
        $emailValido = $conexao->query("SELECT * FROM hospital WHERE emailHospital = '$email'");
        $numSusValido = $conexao->query("SELECT * FROM usuario WHERE numSus = '$numSus'");

        if ($emailValido->num_rows <= 0 and $emailValidoUsuario->num_rows <= 0 and $numSusValido->num_rows <= 0 and strpos($email, '@') and strlen($numSus) == 15) {

            //pegando os campos passados
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = md5($_POST['senha']);
            $dataNascimento = $_POST['dataNascimento'];
            $numSus = $_POST['nSus'];

            //salvando usuario
            $conexao->query("INSERT INTO usuario(nomeUsuario, emailUsuario, senhaUsuario, dataNascimento, numSus) VALUES ('$nome', '$email', '$senha', '$dataNascimento', '$numSus')") or die($conexao->error);

            //pegando do BD o id maximo
            $usuario = $conexao->query("SELECT MAX(usuarioID) FROM usuario") or die($conexao->error);
            $usuario = $usuario->fetch_array();
            $id =  $usuario[0];

            //salvando telefone
            //pegando os campos passados
            $fone1 = $_POST['telefone1'];
            //salvando telefoneUsuario
            $conexao->query("INSERT INTO telefone_usuario(telefone, usuario) VALUES ('$fone1', '$id')") or die($conexao->error);

            if ($_POST['telefone2'] != null) {
                //pegando os campos passados
                $fone2 = $_POST['telefone2'];
                //salvando telefoneUsuario
                $conexao->query("INSERT INTO telefone_usuario(telefone, usuario) VALUES ('$fone2', '$id')") or die($conexao->error);
            }

            //salvando endereço
            //pegando os campos passados
            $endereco = $_POST['endereco'];
            $bairro = $_POST['bairro'];
            $num = $_POST['n'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];

            //salvando enderecoUsuario
            $conexao->query("INSERT INTO endereco_usuario(endereco, bairro, num, cidade, estado, usuario) VALUES ('$endereco', '$bairro', '$num', '$cidade', '$estado', '$id')") or die($conexao->error);

            //salvando sintomas
            //entrando com valores da porcetagem de acorde com os pesos de cada um
            if ($contadoDoentes == 1) {
                $porcentagem += 20;
            }
            if ($dorGarganta == 1) {
                $porcentagem += 3;
            }
            if ($dorCabeca == 1) {
                $porcentagem += 3;
            }
            if ($doencasCronicas == 1) {
                $porcentagem += 3;
            }
            if ($dorPeito == 1) {
                $porcentagem += 3;
            }
            if ($tosseSeca == 1) {
                $porcentagem += 15;
            }
            if ($cansaco == 1) {
                $porcentagem += 15;
            }
            if ($febre == 1) {
                $porcentagem += 15;
            }
            if ($viagem == 1) {
                $porcentagem += 3;
            }
            if ($perdaFala == 1) {
                $porcentagem += 3;
            }
            if ($faltaAr == 1) {
                $porcentagem += 10;
            }
            if ($coriza == 1) {
                $porcentagem += 3;
            }

            //salvando sintomas
            $conexao->query("INSERT INTO sintomas(contatoDoentes, dorGarganta, dorCabeca, doencasCronicas, dorPeito, tosseSeca, cansaco, febre, viagemRecente, perdaFala, faltaAr, coriza, porcentagem, usuario) VALUES ('$contadoDoentes', '$dorGarganta', '$dorCabeca', '$doencasCronicas', '$dorPeito', '$tosseSeca', '$cansaco', '$febre', '$viagem', '$perdaFala', '$faltaAr', '$coriza', '$porcentagem', '$id')") or die($conexao->error);

            exibirMsg("Cadastro bem Sucedido!", "success");
            header("location:../../view/usuario/cadastroUsuario.php");
        } else {
            exibirMsg("E-mail ou Nº do SUS Inválido!", "danger");
            header("location:../../view/usuario/cadastroUsuario.php");
        }
    } else {
        exibirMsg("Falha ao Salvar Formulário, Tenha Certeza de Marcar 'sim' em pelo menos um dos Campos!", "danger");
        header("location:../../view/usuario/cadastroUsuario.php");
    }
} else if (isset($_GET['excluir'])) {
    $id = $_GET['excluir'];
    $conexao->query("DELETE FROM usuario WHERE usuarioID = '$id'") or die($conexao->error);
    exibirMsg("Conta Excluida com Sucesso!", "success");
    require_once('../../controller/autenticar/sair.php');
} else if (isset($_POST['editar'])  and ($_POST['nome'] == null or $_POST['email'] == null or $_POST['nSus'] == null or $_POST['telefone1'] == null or $_POST['dataNascimento'] == null or $_POST['endereco'] == null or $_POST['bairro'] == null or $_POST['n'] == null or $_POST['cidade'] == null or $_POST['estado'] == null or $_POST['inlineRadioOptions'] == null or $_POST['inlineRadioOptions1'] == null or $_POST['inlineRadioOptions2'] == null or $_POST['inlineRadioOptions3'] == null or $_POST['inlineRadioOptions4'] == null or $_POST['inlineRadioOptions5'] == null or $_POST['inlineRadioOptions6'] == null or $_POST['inlineRadioOptions7'] == null or $_POST['inlineRadioOptions8'] == null or $_POST['inlineRadioOptions9'] == null or $_POST['inlineRadioOptions10'] == null or $_POST['inlineRadioOptions11'] == null)) {
    exibirMsg("Preencha Todos os Campos Obrigatórios!", "danger");
    header("location:../../view/usuario/usuario.php");
} else if (isset($_POST['editar']) and $_POST['senha'] == null) {
    exibirMsg("Atualização Falhou, Por Favor não se Esqueça de Preencher o Campo de Senha!", "danger");
    header("location:../../view/usuario/usuario.php");
} else if (isset($_POST['editar'])) {

    $porcentagem = 0;
    $contadoDoentes = $_POST['inlineRadioOptions'];
    $dorGarganta = $_POST['inlineRadioOptions1'];
    $dorCabeca = $_POST['inlineRadioOptions2'];
    $doencasCronicas = $_POST['inlineRadioOptions3'];
    $dorPeito = $_POST['inlineRadioOptions4'];
    $tosseSeca = $_POST['inlineRadioOptions5'];
    $cansaco = $_POST['inlineRadioOptions6'];
    $febre = $_POST['inlineRadioOptions7'];
    $viagem = $_POST['inlineRadioOptions8'];
    $perdaFala = $_POST['inlineRadioOptions9'];
    $faltaAr = $_POST['inlineRadioOptions10'];
    $coriza = $_POST['inlineRadioOptions11'];

    if ($contadoDoentes == 0 and $dorCabeca == 0 and  $dorGarganta == 0 and $dorPeito == 0 and $faltaAr == 0 and $febre == 0 and $doencasCronicas == 0 and $tosseSeca == 0 and $viagem == 0 and $coriza == 0 and $cansaco == 0 and $perdaFala == 0) {
        exibirMsg("Falha ao Salvar Formulário, Tenha Certeza de Marcar 'sim' em pelo menos um dos Campos!", "danger");
        header("location:../../view/usuario/Usuario.php");
    } else {

        $id = $_POST['id'];
        $nomeUsuario = $_POST['nome'];
        $emailUsuario = $_POST['email'];
        $senhaUsuario = md5($_POST['senha']);
        $numSus = $_POST['nSus'];
        $dataNascimento = $_POST['dataNascimento'];

        $telefone1 = $_POST['telefone1'];
        $telefone2 = $_POST['telefone2'];

        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $endereco = $_POST['endereco'];
        $num = $_POST['n'];

        if ($contadoDoentes == 1) {
            $porcentagem += 20;
        }
        if ($dorGarganta == 1) {
            $porcentagem += 3;
        }
        if ($dorCabeca == 1) {
            $porcentagem += 3;
        }
        if ($doencasCronicas == 1) {
            $porcentagem += 3;
        }
        if ($dorPeito == 1) {
            $porcentagem += 3;
        }
        if ($tosseSeca == 1) {
            $porcentagem += 15;
        }
        if ($cansaco == 1) {
            $porcentagem += 15;
        }
        if ($febre == 1) {
            $porcentagem += 15;
        }
        if ($viagem == 1) {
            $porcentagem += 3;
        }
        if ($perdaFala == 1) {
            $porcentagem += 3;
        }
        if ($faltaAr == 1) {
            $porcentagem += 10;
        }
        if ($coriza == 1) {
            $porcentagem += 3;
        }

        $conexao->query("UPDATE usuario SET nomeUsuario = '$nomeUsuario', emailUsuario = '$emailUsuario', senhaUsuario = '$senhaUsuario', numSus = '$numSus' WHERE usuarioID = '$id'") or die($conexao->error);
        $conexao->query("UPDATE endereco_usuario SET endereco = '$endereco', cidade = '$cidade', num = '$num', estado = '$estado', bairro = '$bairro' WHERE usuario = '$id'") or die($conexao->error);

        $telefoneUsuario = $conexao->query("SELECT * FROM telefone_usuario WHERE usuario = '$id'") or die($conexao->error);
        if ($telefoneUsuario->num_rows == 2 and $telefone2 != null) {

            $conexao->query("UPDATE telefone_usuario SET telefone = '$telefone1' WHERE usuario = '$id'") or die($conexao->error);
            $conexao->query("UPDATE telefone_usuario SET telefone = '$telefone2' WHERE usuario = '$id' ORDER BY telefoneUsuarioID DESC LIMIT 1") or die($conexao->error);
        } else if ($telefoneUsuario->num_rows == 2 and $telefone2 == null) {
            $conexao->query("UPDATE telefone_usuario SET telefone = '$telefone1' WHERE usuario = '$id'") or die($conexao->error);
            $conexao->query("DELETE FROM telefone_usuario WHERE usuario = '$id' ORDER BY telefoneUsuarioID DESC LIMIT 1") or die($conexao->error);
        } else if ($telefoneUsuario->num_rows == 1 and $telefone2 != null) {
            $conexao->query("UPDATE telefone_usuario SET telefone = '$telefone1' WHERE usuario = '$id'") or die($conexao->error);
            $conexao->query("INSERT INTO telefone_usuario(telefone, usuario) VALUES ('$telefone2', '$id')") or die($conexao->error);
        } else {
            $conexao->query("UPDATE telefone_usuario SET telefone = '$telefone1' WHERE usuario = '$id'") or die($conexao->error);
        }

        $conexao->query("UPDATE sintomas SET contatoDoentes = '$contadoDoentes', dorCabeca = '$dorCabeca', dorGarganta = '$dorGarganta', febre = '$febre', coriza = '$coriza', doencasCronicas = '$doencasCronicas', tosseSeca = '$tosseSeca', dorPeito = '$dorPeito', viagemRecente  = '$viagem', cansaco  = '$cansaco', perdaFala  = '$perdaFala', faltaAr  = '$faltaAr', porcentagem = '$porcentagem'  WHERE usuario = '$id'") or die($conexao->error);

        exibirMsg("Atualizado com Sucesso!", "success");
        header("location:../../view/usuario/usuario.php");
    }
} else if (isset($_GET['exibir'])) {
    function exibirDadosUsuarios()
    {
        global $dadosUsuarios, $conexao, $dadosTelefone;
        $id = $_GET['exibir'];
        $dadosUsuarios = $conexao->query("SELECT * FROM usuario INNER JOIN sintomas ON usuario.usuarioID = '$id' and sintomas.usuario = usuario.usuarioID") or die($conexao->error);
        $dadosTelefone = $conexao->query("SELECT * FROM telefone_usuario INNER JOIN endereco_usuario ON telefone_usuario.usuario = '$id' and telefone_usuario.usuario = endereco_usuario.usuario") or die($conexao->error);
    }
} else if (isset($_GET['notificacao'])) {
    $msg = $_GET['notificacao'];
    $msg = $conexao->query("SELECT * FROM notificacao WHERE notificacao = '$msg'");
    $msg = $msg->fetch_assoc();
    $msg = $msg['notificacaoID'];
    $usuarioID = $_GET['usuarioID'];
    $hospitalID = $_GET['hospitalID'];
    $notificacao = $conexao->query("SELECT * FROM notificacao_status WHERE usuario = '$usuarioID' and hospital = '$hospitalID'") or die($conexao->error);
    if ($notificacao->num_rows > 0) {
        $conexao->query("UPDATE notificacao_status SET notificacao = '$msg' WHERE usuario = '$usuarioID' and hospital = '$hospitalID'") or die($conexao->error);
    } else {
        $conexao->query("INSERT INTO notificacao_status (notificacao, usuario, hospital) VALUES ('$msg', '$usuarioID', '$hospitalID')") or die($conexao->error);
    }
}else{
    exibirMsg("Preencha todos os Campos Obrigatórios!", "danger");
        header("location:../../view/usuario/cadastroUsuario.php");
}
?>