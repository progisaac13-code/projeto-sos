<?php 
require_once("../../database/conexao.php");

$nome = $_POST['nome'] ?? null;
$telefone = $_POST['telefone'] ?? null;
$endereco = $_POST['endereco'] ?? null;
$codigo_entrada = uniqid(); // Gera um código de entrada único

$query = $pdo->query("INSERT INTO clientes (codigo_entrada, nome, telefone, enredeco, equipamentos) VALUES ('$codigo_entrada', '$nome', '$telefone', '$endereco', '0')");
if ($query) {
    echo "Cliente adicionado com sucesso.";
} else {
    echo "Erro ao adicionar cliente.";
}

?>