<?php 
require_once("../../database/conexao.php");
require_once('../functions/functions.php');

$nome = $_POST['nome'] ?? null;
$telefone = $_POST['telefone'] ?? null;
$endereco = $_POST['endereco'] ?? null;
$cpf = $_POST['cpf'] ?? null;

if (!(validar_cpf($cpf))) {
    echo "CPF inválido! Por favor, tente Novamente.";
    exit;
}

$query = $pdo->query("INSERT INTO clientes (nome, cpf, telefone, enredeco, equipamentos) VALUES ('$nome', '$cpf', '$telefone', '$endereco', '0')");
if ($query) {
    echo "Cliente adicionado com sucesso.";
} else {
    echo "Erro ao adicionar cliente.";
}

?>