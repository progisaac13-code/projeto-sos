<?php 
require_once("../../database/conexao.php");

$nome = $_POST['nome'] ?? null;
$telefone = $_POST['telefone'] ?? null;
$endereco = $_POST['endereco'] ?? null;

$query = $pdo->query("INSERT INTO clientes (nome, telefone, enredeco, image, equipamentos) VALUES ('$nome', '$telefone', '$endereco', 'icon-user.jpg', '0')");
if ($query) {
    echo "Cliente adicionado com sucesso.";
} else {
    echo "Erro ao adicionar cliente.";
}

?>