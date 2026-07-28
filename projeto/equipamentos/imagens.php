<?php
require_once('../../database/conexao.php');

$destino = "../image/equipamentos/";

$id_equipamento = $_POST['id_equipamento'];

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

    $pdo->query("INSERT INTO imagens_equipamentos SET id_equipamento = '$id_equipamento', nome = '$novoNome'");

    echo "Upload realizado com sucesso.";

}