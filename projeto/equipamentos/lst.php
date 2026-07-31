<?php
date_default_timezone_set("America/Sao_Paulo");
require_once("../../database/conexao.php");

$id_cliente = isset($_POST['id']) ? $_POST['id'] : "0";

if ($id_cliente == "0") {
    $query = $pdo->query("SELECT * FROM equipamentos ORDER BY id_equipamento DESC");
} else {
    $query = $pdo->query("SELECT * FROM equipamentos WHERE id_cliente = '$id_cliente'");
}
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
?>
    <table class="table">
        <thead>
            <tr>
                <th width="20">Código</th>
                <th width="280">Equipamento</th>
                <th width="20">(R$)</th>
                <th width="69">Fabricação</th>
                <th>Manutenções</th>
                <th>Observações</th>
                <th></th>
            </tr>
        </thead>

        <?php
        for ($i = 0; $i < count($res); $i++) {
            foreach ($res[$i] as $key => $value) {
            }
            $id_equipamento = $res[$i]["id_equipamento"];
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

            $cliente = $res_cli[0]['nome'];

            $query_fotos = $pdo->query("SELECT * FROM imagens_equipamentos WHERE id_equipamento = '$id_equipamento'");
            $res_fotos = $query_fotos->fetchAll(PDO::FETCH_ASSOC);
            $imagens = count($res_fotos);
            if ($imagens > 0) {
                $class_fotos = 'd-block';
            } else {
                $class_fotos = 'd-none';
            }
        ?>
            <tbody>
                <tr>
                    <td><?= $codigo ?></td>
                    <td><small style="font-size: 12px"><?= $cliente ?></small> | <?= $nome ?></td>
                    <td><?= $valor ?></td>
                    <td><?= date('d/m/Y', strtotime($fabricacao)) ?></td>
                    <td><?= $manutencao ?></td>
                    <td><?= mb_strimwidth($obs, 0, 15, "..."); ?></td>
                    <td>
                        <div class="d-flex flex-wrap gap-2 align-items-center">
                            <i class="fa-solid fa-trash" style="cursor: pointer; font-size: 20px;" title="Excluir Equipamento" onclick="del(<?= $id_equipamento ?>)"></i>
                            <i class="fa-solid fa-pen" style="cursor: pointer; font-size: 20px;" title="Editar Equipamento" onclick="edit('<?= $id_equipamento ?>', '<?= $nome ?>', '<?= $valor ?>', '<?= $fabricacao ?>', '<?= $manutencao ?>', '<?= $obs ?>')"></i>
                            <div class="dropdown">
                                <i class="fa-solid fa-camera position-relative" style="font-size:20px; cursor: pointer;" title="Fazer Upload" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 8px;">
                                        <?= $imagens ?>
                                        <span class="visually-hidden">unread messages</span>
                                    </span>
                                </i>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" onclick="upload(<?= $id_equipamento ?>)">Da Minha Galeria</a></li>
                                    <li><a class="dropdown-item" href="#">Tirar Foto</a></li>
                                </ul>
                            </div>
                            <i class="fa-regular fa-eye <?= $class_fotos ?>" style="cursor: pointer; font-size: 20px;" onclick="fotos(<?= $id_equipamento ?>)"></i>
                        </div>
                    </td>
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
