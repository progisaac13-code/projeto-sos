
<?php
require_once "../../database/conexao.php";

$nome = $_POST['nome'];
$valor = $_POST['valor'];
$fabricacao = $_POST['fabricacao'];
$manutencao = $_POST['manutencao'];
$obs = $_POST['obs'];
$cod = $_POST['cod'];

$pdo->query("UPDATE equipamentos SET equipamento = '$nome', valor = '$valor', fabricacao = '$fabricacao', manutencao = '$manutencao', obs = '$obs' WHERE id_equipamento = '$cod'");

echo "Pronto!";
?>