<?php 

try {
    $pdo = new PDO("mysql:host=localhost;dbname=projeto_sos;port=3306", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>