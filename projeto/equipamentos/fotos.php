<?php

require_once("../../database/conexao.php");

$id = $_POST['id'];

$query  = $pdo->query("SELECT * FROM imagens_equipamentos WHERE id_equipamento = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    for ($i = 0; $i < count($res); $i++) {
        $caminho = '../image/equipamentos/';
        $arquivo = $res[$i]['nome'];
        ?>
            <img src="<?php echo $caminho.$arquivo?>" alt="">
        <?php
    }
}