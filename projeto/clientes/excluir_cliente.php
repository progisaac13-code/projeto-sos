<?php 
require_once("../../database/conexao.php");

$id = $_POST['id'] ?? null;

$query = $pdo->prepare("DELETE FROM clientes WHERE id_cliente = :id");
$query->bindParam(':id', $id, PDO::PARAM_INT);
if ($query->execute()) {
    echo "Cliente excluído com sucesso.";
} else {
    echo "Erro ao excluir cliente.";
}
?>