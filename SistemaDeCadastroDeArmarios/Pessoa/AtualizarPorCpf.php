<?php
include('..\conexaoCRUD.php');
$conexao=new conexaoCRUD;
$CPF=$_POST['CPF'];

$novosDados = array(
    'nome' => $_POST['nome'],
    'sobrenome' => $_POST['sobrenome'],
    'telefone' => $_POST['telefone'],
    'email' => $_POST['email'],
    'endereco' => $_POST['endereco']
);
if ($_POST['nome']!= "" && $_POST['sobrenome'] != "" && $_POST['CPF'] != "" &&  $_POST['telefone'] != "" && $_POST['endereco'] != "" && $_POST['email'] != ""){
    $conexao->updateComCpf($CPF, $novosDados);
    header("Location: EditarCadastroPessoa1.php?verifica=0");
    exit;
}else{
    header("Location: EditarCadastroPessoa1.php?verifica=1");
    exit;
}

?>