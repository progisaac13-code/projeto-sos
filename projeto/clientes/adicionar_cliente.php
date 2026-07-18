<?php 
require_once("../../database/conexao.php");

$nome = $_POST['nome'] ?? null;
$telefone = $_POST['telefone'] ?? null;
$endereco = $_POST['endereco'] ?? null;
$cep = $_POST['cep'] ?? null;

$query = $pdo->query("INSERT INTO clientes (nome, telefone, enredeco, cep, equipamentos) VALUES ('$nome', '$telefone', '$endereco', '$cep' '0')");
if ($query) {
    $query = $pdo->query("SELECT id_cliente FROM clientes order by id_cliente desc;");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $id = $res[0]["id_cliente"];

    $cod = random_int(1, 999) . random_int(1, 999) . random_int(1, 999) . ".".$id;

    $pdo->query("UPDATE clientes SET codigo_entrada = '$cod' WHERE id_cliente = '$id'");
    echo "Cliente adicionado com sucesso.";
} else {
    echo "Erro ao adicionar cliente.";
}

?>