<?php
include('..\conexaoCRUD.php');

$CPF = $_GET['CPF'];
$conexao = new conexaoCRUD();

if ($conexao->excluirComCpf($CPF)) {
    header("Location: EditarCadastroPessoa1.php?verifica=3");
    exit;
} else {
    header("Location: EditarCadastroPessoa1.php?verifica=4");
    exit;
}
?>