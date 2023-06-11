<?php
include('../conexaoCRUD.php');
$conexao = new conexaoCRUD;
$cpf = $_POST['CPF'];
if ($conexao->buscarPorCpf($cpf)) {
    
    header("Location: Erro.php?verifica=0");
    exit;
} else {
    header("Location: Erro.php?verifica=1");
    exit;
}
?>