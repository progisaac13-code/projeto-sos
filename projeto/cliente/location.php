<?php
require_once('../../database/conexao.php');

$id = $_POST['id'] ?? 0;

$query = $pdo->query("SELECT * FROM clientes WHERE id_cliente = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    $location = $res[0]['enredeco'];

    $urlMapa = "https://maps.google.com/maps?q=" . urlencode($location) . "&output=embed";

?>
    <iframe style="height: 100vh; width: 100%;"
        frameborder="0"
        style="border:0"
        src="<?php echo $urlMapa; ?>"
        allowfullscreen>
    </iframe>
<?php
}
