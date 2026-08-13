<?php 
require_once("../../database/conexao.php");
require_once('../functions/functions.php');

$id = $_POST['id'] ?? '';
$nome = $_POST['nome'] ?? null;
$telefone = $_POST['telefone'] ?? null;
$endereco = $_POST['endereco'] ?? null;
$cpf = $_POST['cpf'] ?? null;

$query = $pdo->query("SELECT * FROM clientes WHERE id_cliente = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) == 0) {
    if (!(validar_cpf($cpf))) {
        echo "CPF inválido! Por favor, tente Novamente.";
        exit;
    }
    
    $cpf = preg_replace('/[^0-9]/', '', $cpf);
    
    $query_cpf = $pdo->query("SELECT * FROM clientes WHERE cpf = '$cpf'");
    $res_cpf = $query_cpf->fetchAll(PDO::FETCH_ASSOC);
    if (count($res_cpf) > 0) {
        echo "CPF Já Cadastrado! Por favor, tente novamente.";
        exit;
    }
    
    $query = $pdo->query("INSERT INTO clientes (nome, cpf, telefone, enredeco, equipamentos) VALUES ('$nome', '$cpf', '$telefone', '$endereco', '0')");
    if ($query) {
        echo "Cliente adicionado com sucesso.";
    } else {
        echo "Erro ao adicionar cliente.";
    }
} else {
    $query = $pdo->query("UPDATE clientes SET nome = '$nome', cpf = '$cpf', telefone = '$telefone', enredeco = '$endereco' WHERE id_cliente = '$id'");
    echo "Clientes Editado com Sucesso!";
}


?>