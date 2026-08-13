<?php 
require_once("../../database/conexao.php");

$id = $_POST['id'] ?? null;

$query = $pdo->query("DELETE FROM clientes WHERE id_cliente = '$id'");
if ($query) {
    echo "Cliente excluído com sucesso.";
} else {
    echo "Erro ao excluir cliente.";
}
?>