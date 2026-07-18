<?php
require_once("../../database/conexao.php");

$query = $pdo->query("SELECT * FROM equipamentos ORDER BY id_equipamento DESC");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    echo "Olá, Mundo!";
} else {
    echo "<p>Equipamentos não existentes!";
}