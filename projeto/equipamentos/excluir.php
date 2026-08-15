<?php 

require_once("../../database/conexao.php");

$id = $_POST["id"];

// $query = $pdo->query("SELECT * FROM imagens_equipamentos WHERE id_img = '$id'");
// $res = $query->fetchAll(PDO::FETCH_ASSOC);
// $nome = $res[0]["nome"];
// unlink("../image/equipamentos/".$nome);
// $pdo->query("DELETE FROM imagens_equipamentos WHERE id_img = '$id'");
$pdo->query("DELETE FROM equipamentos WHERE id = '$id'");
echo "Excluído com Sucesso!";
