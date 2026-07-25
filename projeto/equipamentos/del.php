<?php
require_once("../../database/conexao.php");
$id = $_POST['id'];

$pdo->query("DELETE FROM equipamentos WHERE id_equipamento = '$id'");

echo "Excluído!";