<?php 
require_once '../../database/conexao.php';

$query = $pdo->query("SELECT * FROM clientes;");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_clientes = count($res);
echo $total_clientes;
?>