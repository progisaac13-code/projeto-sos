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
        <div class="card" style="width: 18rem;">
            <div class="d-flex flex-wrap justify-content-between">
                <small class="text-dark">#<?= $id ?></small>
                <i class="fa-solid fa-recycle text-danger mb-3" onclick="recycle(<?php echo $id ?>, <?php echo $id_equipamento ?>)"></i>
            </div>
            <img src="<?php echo $caminho . $arquivo ?>" alt="" class="card-img-top" width="250">
        </div>
<?php
    }
}
