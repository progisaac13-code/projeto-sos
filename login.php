<?php 

require_once 'database/conexao.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Process the login logic here
// For example, you might check the credentials against a database

$query = $pdo->query("SELECT * FROM usuario WHERE email = '$email'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    $pass = $res[0]['senha'];
    if (password_verify($password, $pass)) {
        // Password is correct

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['user_id'] = $res[0]['id_usuario'];
        $_SESSION['user_name'] = $res[0]['nome'];

        echo 'success';
    } else {
        // Password is incorrect
        echo 'E-mail ou senha incorretos.';
    }
}


?>