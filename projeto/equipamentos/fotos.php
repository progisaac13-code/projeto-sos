<?php

require_once("../../database/conexao.php");

$id_equipamento = $_POST['id'];

$query  = $pdo->query("SELECT * FROM imagens_equipamentos WHERE id_equipamento = '$id_equipamento'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {

    for ($i = 0; $i < count($res); $i++) {
        $id = $res[$i]["id_img"];
        $caminho = 'image/equipamentos/';
        $arquivo = $res[$i]['nome'];
?>
        <img src="<?php echo $caminho . $arquivo ?>" alt="" class="img-fluid zoom" width="150" data-bs-toggle="modal" data-bs-target="#modalZoom" onclick="abrirZoom('<?php echo $caminho . $arquivo ?>')">
<?php
    }
}
?>