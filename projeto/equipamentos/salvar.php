
<?php
require_once "../../database/conexao.php";

$nome = $_POST['nome'];
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$id_cliente = $_POST['id_cliente'];
$problema = $_POST['problema'];
$mao_obra = $_POST['mao_obra'];
$valor_pecas = $_POST['valor_pecas'];
$servico = $_POST['servico'];
$status = $_POST['status'];
$data_entrega = $_POST['data_entrega'];
$data_entrada  = $_POST['data_entrada'];
$obs = $_POST['obs'];
$valor_total = $_POST['valor_total'];

if ($data_entrada == '' || $data_entrega == '') {
    echo "Selecione um data de Entrada/Entrega.";
    exit;
}

if ($id_cliente == 0) {
    echo "Selecione um Cliente.";
    exit;
}

$pdo->query("INSERT INTO equipamentos (tipo_equipamento, marca, modelo, problema_relatado, id_cliente, valor_mao_obra, valor_pecas, valor_total, status, servico, data_entrada, data_entrega, observacoes) VALUES ('$nome', '$marca', '$modelo', '$problema', '$id_cliente', '$mao_obra', '$valor_pecas', '$valor_total', '$status','$servico', '$data_entrada', '$data_entrega', '$obs')");

echo "Salvo com Sucesso";
?>