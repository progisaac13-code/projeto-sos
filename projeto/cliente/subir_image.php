<?php 
require_once("../../database/conexao.php");
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["imagem"])) {
    
    $arquivo = $_FILES["imagem"];
    $id_cliente = $_FILES['fotoClienteId'];

    // Verifica se houve erro no upload
    if ($arquivo["error"] !== UPLOAD_ERR_OK) {
        die("Erro no upload do arquivo.");
    }

    // Valida se realmente é uma imagem
    $tiposPermitidos = ["image/jpeg", "image/png", "image/webp"];
    $tipoArquivo = mime_content_type($arquivo["tmp_name"]);

    if (!in_array($tipoArquivo, $tiposPermitidos)) {
        die("Tipo de arquivo não permitido. Envie apenas imagens.");
    }

    // Limite de tamanho (exemplo: 5MB)
    $tamanhoMaximo = 5 * 1024 * 1024;
    if ($arquivo["size"] > $tamanhoMaximo) {
        die("Arquivo muito grande. Máximo permitido: 5MB.");
    }

    // Pasta de destino
    $pastaDestino = "../image/upload/";
    if (!is_dir($pastaDestino)) {
        mkdir($pastaDestino, 0755, true);
    }

    // Gera um nome único para evitar sobrescrever arquivos
    $extensao = pathinfo($arquivo["name"], PATHINFO_EXTENSION);
    $nomeUnico = uniqid("img_", true) . "." . $extensao;
    $caminhoCompleto = $pastaDestino . $nomeUnico;

    // Move o arquivo da pasta temporária para a pasta de destino
    if (move_uploaded_file($arquivo["tmp_name"], $caminhoCompleto)) {

        // Salva as informações no banco de dados
        $pdo->query("UPDATE clientes SET image = '$nomeUnico' WHERE id_cliente = '$id_cliente'");
        echo "Upload realizado com sucesso!<br>";
    } else {
        echo "Erro ao mover o arquivo para a pasta de destino.";
    }
}
