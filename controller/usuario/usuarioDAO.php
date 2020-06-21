<?php
require_once('../../controller/banco/conexao.php');
require_once('../../controller/exibirMsg/exibirMsg.php');

if (isset($_POST['salvar']) AND $_POST['nome'] != null AND $_POST['email'] != null AND $_POST['senha'] != null AND $_POST['dataNascimento'] != null AND $_POST['nSus'] != null AND $_POST['telefone1'] != null AND $_POST['endereco'] != null AND $_POST['bairro'] != null AND $_POST['n'] != null AND $_POST['cidade'] != null AND $_POST['estado'] != null AND $_POST['inlineRadioOptions'] != null AND $_POST['inlineRadioOptions1'] != null AND $_POST['inlineRadioOptions2'] != null AND $_POST['inlineRadioOptions3'] != null AND $_POST['inlineRadioOptions4'] != null AND $_POST['inlineRadioOptions5'] != null AND $_POST['inlineRadioOptions6'] != null AND $_POST['inlineRadioOptions7'] != null AND $_POST['inlineRadioOptions8'] != null AND $_POST['inlineRadioOptions9'] != null AND $_POST['inlineRadioOptions10'] != null AND $_POST['inlineRadioOptions11'] != null) {

    $email = $_POST['email'];
    $numSus = $_POST['nSus'];

    $emailValidoUsuario = $conexao->query("SELECT * FROM usuario WHERE emailUsuario = '$email'");
    $emailValido = $conexao->query("SELECT * FROM hospital WHERE emailHospital = '$email'");
    $numSusValido = $conexao->query("SELECT * FROM usuario WHERE numSus = '$numSus'");

    if($emailValido->num_rows <= 0 AND $emailValidoUsuario->num_rows <= 0 AND $numSusValido->num_rows <= 0 AND strpos($email, '@') AND strlen($numSus) == 15){

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
        //pegando os campos passados
        $porcentagem = 0;
        $contadoDoentes = $_POST['inlineRadioOptions'];
        $dorGarganta = $_POST['inlineRadioOptions1'];
        $dorCabeca = $_POST['inlineRadioOptions2'];
        $doencaCronicas = $_POST['inlineRadioOptions3'];
        $dorPeito = $_POST['inlineRadioOptions4'];
        $tosseSeca = $_POST['inlineRadioOptions5'];
        $cansaco = $_POST['inlineRadioOptions6'];
        $febre = $_POST['inlineRadioOptions7'];
        $viagem = $_POST['inlineRadioOptions8'];
        $perdaFala = $_POST['inlineRadioOptions9'];
        $faltaAr = $_POST['inlineRadioOptions10'];
        $coriza = $_POST['inlineRadioOptions11'];

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
        if ($doencaCronicas == 1) {
            $porcentagem += 3;
        }
        if ($dorPeito == 1) {
            $porcentagem += 3;
        }    
        if ($tosseSeca ==1 ) {
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
        $conexao->query("INSERT INTO sintomas(contatoDoentes, dorGarganta, dorCabeca, doencasCronicas, dorPeito, tosseSeca, cansaco, febre, viagemRecente, perdaFala, faltaAr, coriza, porcentagem, usuario) VALUES ('$contadoDoentes', '$dorGarganta', '$dorCabeca', '$doencaCronicas', '$dorPeito', '$tosseSeca', '$cansaco', '$febre', '$viagem', '$perdaFala', '$faltaAr', '$coriza', '$porcentagem', '$id')") or die($conexao->error);

        exibirMsg("Cadastro bem Sucedido!", "success");
        header("location:../../view/usuario/cadastroUsuario.php");
    }else{
        exibirMsg("E-mail ou Nº do SUS Inválido!", "danger");
        header("location:../../view/usuario/cadastroUsuario.php");
    }
}else{
    exibirMsg("Preencha Todos os Campos Obrigatórios!", "warning");
    header("location:../../view/usuario/cadastroUsuario.php");

}
?>
