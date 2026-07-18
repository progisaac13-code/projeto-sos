<?= 
require_once "../../database/conexao.php";

$query = $pdo->query("SELECT * FROM equipamentos ORDER BY id_equipamento DESC");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id = $res[0]["id_equipamento"];

$pdo->query("DELETE FROM equipamentos WHERE id_equipamento = '$id'");

echo "Excluído com Sucesso";

?>