<?php
require_once('../../database/conexao.php');

$destino = "../image/equipamentos/";

if (!is_dir($destino)) {
    mkdir($destino, 0777, true);
}

if(isset($_FILES["foto"])){

    $arquivo = $_FILES["foto"];

    $extensao = strtolower(pathinfo($arquivo["name"], PATHINFO_EXTENSION));

    $permitidas = ["jpg","jpeg","png","gif","webp"];

    if(!in_array($extensao,$permitidas)){
        die("Formato inválido.");
    }

    $novoNome = uniqid().".".$extensao;

    move_uploaded_file(
        $arquivo["tmp_name"],
        $destino.$novoNome
    );

    echo "Upload realizado com sucesso.";

}