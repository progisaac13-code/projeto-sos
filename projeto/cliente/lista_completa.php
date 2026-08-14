<?php
@session_start();
require_once('../../database/conexao.php');
require_once('../../database/config.php');

$query = $pdo->query("SELECT * FROM clientes ORDER BY id_cliente DESC");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<script>
    const t1 = new DataTable('.t1', {});
</script>
<table class="table t1 table-striped-columns">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Equipamento(s)</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (count($res) > 0) {
            for ($i = 0; $i < count($res); $i++) {
                $id = $res[$i]['id_cliente'];
                $nome = $res[$i]['nome'];
                $cpf = $res[$i]['cpf'];
                $telefone = $res[$i]['telefone'];
                $endereco = $res[$i]['enredeco'];
                $foto = $res[$i]['foto'] ?? 'icon-user.jpg';

                $cpf = preg_replace('/[^0-9]/', '', $cpf);
                $telefone = preg_replace('/[^0-9]/', '', $telefone);

                $query_eq = $pdo->query("SELECT * FROM equipamentos WHERE id_cliente = '$_SESSION[id]'");
                $res_eq = $query_eq->fetchAll(PDO::FETCH_ASSOC);
                $tot_eq = count($res_eq);

        ?>
                <tr>
                    <td><img src="image/clientes/<?= $foto ?>" width="30" alt="Foto do Cliente" class="rounded text-center"></td>
                    <td><?= $nome ?></td>
                    <td><?= $cpf ?></td>
                    <td><?= $telefone ?></td>
                    <td><?= $endereco ?></td>
                    <td><?= $tot_eq ?></td>
                    <td>
                        <a href="" onclick="maps(<?= $id ?>)" title="Vizualizar Localização"><i class="fa-regular fa-map icon-op"></i></a>
                        <a href="" onclick="excluir('<?= $id ?>')" title="Excluir Cliente"><i class="fa-solid fa-trash icon-op"></i></a>
                        <a href="" onclick="editar('<?= $id ?>', '<?= $nome ?>', '<?= $cpf ?>', '<?= $telefone ?>', '<?= $endereco ?>', '<?= $foto ?>')" title="Editar Cliente"><i class="fa-solid fa-pen-to-square icon-op"></i></a>
                        <a href="https://wa.me/<?= $telefone ?>?text=<?= urlencode(WHATSAPP_MENSAGEM) ?>" target="_blank" title="WHatsApp"><i class="fa-brands fa-whatsapp icon-op"></i></a>
                        <a href="tel:<?= $telefone ?>" title="Ligar"><i class="fa-solid fa-phone icon-op"></i></a>
                    </td>
                </tr>
        <?php
            }
        } else {
            echo "Sem Dados para Exibir!";
        }
        ?>
    </tbody>
</table>