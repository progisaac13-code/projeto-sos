<?= 
require_once "../../database/conexao.php";

$nome = $_POST['nome'];
$valor = $_POST['valor'];
$fabricacao = $_POST['fabricacao'];
$id_clientes = $_POST['id_clientes'];
$manutencao = $_POST['manutencao'];
$obs = $_POST['obs'];


$query = $pdo->query("INSERT INTO equipamentos SET nome = '$nome', valor = '$valor', fabricacao = '$fabricacao', id_cliente = '$id_clientes', manutencao = '$manutencao', obs = '$obs'");
?>