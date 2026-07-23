<?php
date_default_timezone_set("America/Sao_Paulo");
require_once("../../database/conexao.php");

$query = $pdo->query("SELECT * FROM equipamentos ORDER BY id_equipamento DESC");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
?>
    <table class="table">
        <thead>
            <tr>
                <th>Código</th>
                <th>Equipamento</th>
                <th>Valor: (R$)</th>
                <th>Data de Fabricação</th>
                <th>Manutenções</th>
                <th>Observações</th>
            </tr>
        </thead>

        <?php
        for ($i = 0; $i < count($res); $i++) {
            foreach ($res[$i] as $key => $value) {
            }
            $id_cliente = $res[$i]["id_cliente"];
            $nome = $res[$i]["equipamento"];

            $valor = $res[$i]['valor'];
            $valor = number_format($valor, 2, ',', '');

            $codigo = $res[$i]["codigo_eq"];
            $fabricacao = $res[$i]["fabricacao"];
            $manutencao = $res[$i]['manutencao'];
            $obs = $res[$i]['obs'];

            $query_cli = $pdo->query("SELECT * FROM clientes WHERE id_cliente = '$id_cliente'");
            $res_cli = $query_cli->fetchAll(PDO::FETCH_ASSOC);

            $cliente = $res_cli[0]['nome']
        ?>
            <tbody>
                <tr>
                    <td><?= $codigo ?></td>
                    <td><small style="font-size: 12px"><?= $cliente ?></small> | <?= $nome ?></td>
                    <td><?= $valor ?></td>
                    <td><?= date('d/m/Y', strtotime($fabricacao)) ?></td>
                    <td><?= $manutencao ?></td>
                    <td><?= mb_strimwidth($obs, 0, 15, "..."); ?></td>
                </tr>
            </tbody>
        <?php
        }
        ?>
    </table>
<?php
} else {
    echo "<p>Equipamentos não existentes!";
}
