<?php

include('..\conexaoCRUD.php');

$conexao=new conexaoCRUD;

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$CPF=$_POST['CPF'];
$telefone=$_POST['telefone'];
$endereco=$_POST['endereco'];
$email=$_POST['email'];

if ($nome != "" && $sobrenome != "" && $CPF != "" && $telefone != "" && $endereco != "" && $email != ""){
    $conexao->inserirNoBanco($nome, $sobrenome, $CPF, $telefone, $endereco, $email);
    header("Location: CadastroPessoa.php?verifica=0");
    exit;
}else{
    header("Location: CadastroPessoa.php?verifica=1");
    exit;
}

?>
