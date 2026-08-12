<?php
require_once('database/conexao.php');
@session_start();
$nome = $_POST['nome'];
$funcao = $_POST['funcao'];
$email = $_POST['email'];
$senha = $_POST['senha'];

if (strlen($senha) < 8) {
    echo "Senha Deve ser Superior a 8 Caracteres!";
    exit;
}

$password = password_hash($senha, PASSWORD_DEFAULT);

$pdo->query("INSERT INTO usuario SET nome = '$nome', funcao = '$funcao', email = '$email', senha = '$password'");

if (!($_SESSION['id'])) {
    $query = $pdo->query("SELECT * FROM usuario ORDER BY id_usuario DESC");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $id = $res[0]['id_usuario'];

    $_SESSION['id'] = $id;
    $_SESSION['nome'] = $nome;
    $_SESSION['email'] = $email;
}

echo "Sucesso!";