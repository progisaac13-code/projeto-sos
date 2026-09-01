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

        <style>
            .imagem-zoom {
                width: 200px;
                cursor: zoom-in;
            }

            .modal-zoom {
                display: none;
                position: fixed;
                z-index: 9999;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.8);

                justify-content: center;
                align-items: center;
            }

            .modal-zoom img {
                max-width: 90%;
                max-height: 90%;
                object-fit: contain;
            }

            .fechar {
                position: absolute;
                top: 20px;
                right: 35px;
                color: white;
                font-size: 40px;
                cursor: pointer;
            }
        </style>

        <div class="card" style="width: 18rem;">
            <div class="d-flex flex-wrap justify-content-between">
                <small class="text-dark">#<?= $id ?></small>
                <i class="fa-solid fa-recycle text-danger mb-3" style="cursos: pointer" onclick="recycle(<?php echo $id ?>, <?php echo $id_equipamento ?>)"></i>
            </div>
            <img src="<?php echo $caminho . $arquivo ?>" alt="" class="card-img-top imagem-zoom" width="150" onclick="abrirZomm(this)">

            <div id="modalZoom" class="modal-zoom" onclick="fecharZoom()">
                <span class="fechar">&times;</span>
                <img id="imagemAmpliada">
            </div>
        </div>
<?php
    }
}
?>

<script>
    function abrirZoom(imagem) {
        document.getElementById("imagemAmpliada").src = imagem.src;
        document.getElementById("modalZoom").style.display = "flex";
    }

    function fecharZoom() {
        document.getElementById("modalZoom").style.display = "none";
    }
</script>