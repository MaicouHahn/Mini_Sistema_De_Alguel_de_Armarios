<?php
include('..\conexaoCRUD.php');
$CPF = $_POST['CPF'];
$verifica = 0;

$conexao = new conexaoCRUD();
$buscaPorCpf = $conexao->buscarPorCpf($CPF);

if ($buscaPorCpf !== null) {

    $nome = $buscaPorCpf['nome'];
    $sobrenome = $buscaPorCpf['sobrenome'];
    $CPF = $buscaPorCpf['CPF'];
    $telefone = $buscaPorCpf['telefone'];
    $email = $buscaPorCpf['email'];
    $endereco = $buscaPorCpf['endereco'];
    header("Location: EditarCadastroPessoa2.php?verifica=$verifica&nome=$nome&sobrenome=$sobrenome&CPF=$CPF&telefone=$telefone&email=$email&endereco=$endereco");
    exit;
} else {
    $verifica = 1;
    header("Location: EditarCadastroPessoa1.php?verifica=$verifica");
    exit;
}

?>