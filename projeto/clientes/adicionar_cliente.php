<?php 
require_once("../../database/conexao.php");

$nome = $_POST['nome'] ?? null;
$telefone = $_POST['telefone'] ?? null;
$endereco = $_POST['endereco'] ?? null;
$codigo_entrada = uniqid(); // Gera um código de entrada único

$query = $pdo->query("INSERT INTO clientes (nome, telefone, enredeco, image, equipamentos, codigo_entrada) VALUES ('$nome', '$telefone', '$endereco', 'icon-user.jpg', '0', '$codigo_entrada')");
if ($query) {
    echo "Cliente adicionado com sucesso.";
} else {
    echo "Erro ao adicionar cliente.";
}

?>