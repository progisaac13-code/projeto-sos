<?= 
require_once "../../database/conexao.php";

$nome = $_POST['nome'];
$valor = $_POST['valor'];
$fabricacao = $_POST['fabricacao'];
$id_clientes = $_POST['id_clientes'];
$manutencao = $_POST['manutencao'];
$obs = $_POST['obs'];
$cod = $_POST['cod'];


$query = $pdo->query("UPDATE equipamentos SET nome = '$nome', valor = '$valor', fabricacao = '$fabricacao', id_cliente = '$id_clientes', manutencao = '$manutencao', obs = '$obs' WHERE codigo_eq = '$cod'");

echo "Pronto!";
?>