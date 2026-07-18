<?php
require_once("../../database/conexao.php");

$pdo->query("INSERT INTO equipamentos SET equipamento = 'Novo Equipamento', codigo_eq = '1', valor = 'R$0,00';");

$query = $pdo->query("SELECT * FROM equipamentos ORDER BY id_equipamento DESC");
$res = $query->fetchAll(PDO::FETCH_ASSOC);

$id = $res[0]["id_equipamento"];
$codigo_eq = random_int(1,999) . random_int(1,999) . random_int(1,999) . $id;

$pdo->query("UPDATE equipamentos SET codigo_eq = '$codigo_eq' WHERE id_equipamento = '$id'");

echo $codigo_eq;
?>