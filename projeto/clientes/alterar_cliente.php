<?php 
require_once("../../database/conexao.php");

$id = $_POST['id'] ?? null;
$nome = $_POST['nome'] ?? null;
$telefone = $_POST['telefone'] ?? null;
$endereco = $_POST['endereco'] ?? null;

$query = $pdo->query("UPDATE clientes SET nome = '$nome', telefone = '$telefone', enredeco = '$endereco' WHERE id_cliente = $id");
echo "Cliente atualizado com sucesso.";
?>