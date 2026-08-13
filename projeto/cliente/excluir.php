<?php 
require_once("../../database/conexao.php");

$id = $_POST['id'] ?? null;

$query = $pdo->query("SELECT * FROM equipamentos WHERE id_cliente = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    echo "Cliente tem Equipamentos Cadastrados! Tente novamente.";
    exit;
}

$pdo->query("DELETE FROM clientes WHERE id_cliente = '$id'");
echo "Cliente excluído com sucesso!";
?>