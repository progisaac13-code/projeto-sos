<?php
require_once('../../database/conexao.php');

$id = $_POST['id'];
$status = $_POST['status'];

$pdo->query("UPDATE equipamentos SET status = '$status' WHERE id = '$id'");

echo "Status Atualizado";