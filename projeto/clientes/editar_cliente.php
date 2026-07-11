<?php 
require_once("../../database/conexao.php");

$id = $_POST['id'] ?? null;

$query = $pdo->query("SELECT * FROM clientes WHERE id_cliente = $id");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    $nome = $res[0]['nome'];
    $telefone = $res[0]['telefone'];
    $endereco = $res[0]['enredeco'];

    echo "$nome;$telefone;$endereco";
} else {
    echo json_encode(['error' => 'Cliente não encontrado.']);
}
?>