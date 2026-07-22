
<?php
require_once "../../database/conexao.php";

$nome = $_POST['nome'];
$valor = $_POST['valor'];
$fabricacao = $_POST['fabricacao'];
$id_clientes = $_POST['id_cliente'];
$manutencao = $_POST['manutencao'];
$obs = $_POST['obs'];
$cod = $_POST['cod'];

$pdo->query("UPDATE equipamentos SET equipamento = '$nome', valor = '$valor', fabricacao = '$fabricacao', id_cliente = '$id_clientes', manutencao = '$manutencao', obs = '$obs' WHERE codigo_eq = '$cod'");

echo "Pronto!";
?>