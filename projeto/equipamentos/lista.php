<?php
require_once("../../database/conexao.php");
require_once('../functions/functions.php');
$query = $pdo->query("SELECT * FROM equipamentos");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<script>
    const t3 = new DataTable('.t3', {});
</script>
<table class="table t3">
    <thead>
        <tr>
            <th>Tipo/Marca</th>
            <th>Modelo</th>
            <th>Problema</th>
            <th>Cliente</th>
            <th>Serviço</th>
            <th>Status</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (count($res) > 0) {
            for ($i = 0; $i < count($res); $i++) {
                $id_equipamento = $res[$i]['id'];
                $id_cliente = $res[$i]['id_cliente'];
                $nome = $res[$i]['tipo_equipamento'];
                $marca = $res[$i]['marca'];
                $modelo = $res[$i]['modelo'];
                $problema = $res[$i]['problema_relatado'];
                $servico = $res[$i]['servico'];
                $mao_obra = $res[$i]['valor_mao_obra'];
                $valor_pecas = $res[$i]['valor_pecas'];
                $valor_total = $res[$i]['valor_total'];
                $status = $res[$i]['status'];

                $data_entrada = $res[$i]['data_entrada'];
                $data_previsao = $res[$i]['data_previsao'];
                $data_conclusao = $res[$i]['data_conclusao'];
                $data_entrega = $res[$i]['data_entrega'];
                $obs = $res[$i]['observacoes'];


                $entrada = explode(' ', $data_entrada);
                $entrega = explode(' ', $data_entrega);

                $query_cli = $pdo->query("SELECT * FROM clientes WHERE id_cliente = '$id_cliente'");
                $res_cli = $query_cli->fetchAll(PDO::FETCH_ASSOC);
                $cliente = $res_cli[0]['nome'];

                switch ($status) {
                    case 'Aguardando diagnóstico':
                        $background = '#64748B';
                        break;
                    case 'Em diagnóstico':
                        $background = '#3B82F6';
                        break;
                    case 'Aguardando aprovação':
                        $background = '#F59E0B';
                        break;
                    case 'Aguardando peça':
                        $background = '#F97316';
                        break;
                    case 'Em conserto':
                        $background = '#8B5CF6';
                        break;
                    case 'Em teste':
                        $background = '#06B6D4';
                        break;
                    case 'Pronto para entrega':
                        $background = '#22C55E';
                        break;
                    case 'Entregue':
                        $background = '#15803D';
                        break;
                    case 'Cancelado':
                        $background = '#EF4444';
                        break;
                    default:
                        $background = '#000';
                        break;
                }

                $mao_format = number_format($mao_obra, 2, ',');
                $pecas_format = number_format($valor_pecas, 2, ',');

        ?>
                <tr>
                    <td><?= $nome . " - " . $marca ?></td>
                    <td><?= $modelo ?></td>
                    <td><?= $problema ?></td>
                    <td><?= $cliente ?></td>
                    <td><?= $servico ?></td>
                    <td style="background-color: <?= $background ?>;"><?= $status ?></td>
                    <td class="d-flex flex-wrap gap-1">
                        <a href="" onclick="excluir(<?= $id_equipamento ?>)" title="Excluir Equipamento"><i class="fa-solid fa-trash"></i></a>
                        <a href="" onclick="editar(<?= $id_equipamento ?>, '<?= $nome ?>', '<?= $marca ?>', '<?= $modelo ?>', '<?= $problema ?>', '<?= $id_cliente ?>', '<?= $servico ?>', '<?= $status ?>', '<?= $mao_obra ?>', <?= $valor_pecas ?>, '<?= $valor_total ?>', '<?= $entrega[0] ?>', '<?= $entrada[0] ?>', '<?= $obs ?>')"><i class="fa-solid fa-file-pen"></i></a>
                        <a href="" onclick="more(<?= $id_equipamento ?>, '<?= $nome ?>', '<?= $modelo ?>', '<?= $marca ?>', '<?= $cliente ?>', '<?= $mao_format ?>', '<?= $pecas_format ?>')" title="Mais Informações"><i class="fa-solid fa-ellipsis"></i></a>
                        <div class="dropdown">
                            <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="Atualizar Status">
                                <i class="fa-solid fa-signal"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li style="padding: 2px 5px;" onclick="enviar_status(<?= $id_equipamento ?>, 'Aguardando diagnóstico')" ><a style="border-left: 4px solid #64748B;" class="dropdown-item" href="#">Aguardando diagnóstico</a></li>
                                <li style="padding: 2px 5px;" onclick="enviar_status(<?= $id_equipamento ?>, 'Em diagnóstico')" ><a style="border-left: 4px solid #3B82F6;" class="dropdown-item" href="#">Em diagnóstico</a></li>
                                <li style="padding: 2px 5px;" onclick="enviar_status(<?= $id_equipamento ?>, 'Aguardando aprovação')" ><a style="border-left: 4px solid #F59E0B;" class="dropdown-item" href="#">Aguardando aprovação</a></li>
                                <li style="padding: 2px 5px;" onclick="enviar_status(<?= $id_equipamento ?>, 'Aguardando peça')" ><a style="border-left: 4px solid #F97316;" class="dropdown-item" href="#">Aguardando peça</a></li>
                                <li style="padding: 2px 5px;" onclick="enviar_status(<?= $id_equipamento ?>, 'Em conserto')" ><a style="border-left: 4px solid #8B5CF6;" class="dropdown-item" href="#">Em conserto</a></li>
                                <li style="padding: 2px 5px;" onclick="enviar_status(<?= $id_equipamento ?>, 'Em teste')" ><a style="border-left: 4px solid #06B6D4;" class="dropdown-item" href="#">Em teste</a></li>
                                <li style="padding: 2px 5px;" onclick="enviar_status(<?= $id_equipamento ?>, 'Pronto para entrega')" ><a style="border-left: 4px solid #22C55E;" class="dropdown-item" href="#">Pronto para entrega</a></li>
                                <li style="padding: 2px 5px;" onclick="enviar_status(<?= $id_equipamento ?>, 'Entregue')" ><a style="border-left: 4px solid #15803D;" class="dropdown-item" href="#">Entregue</a></li>
                                <li style="padding: 2px 5px;" onclick="enviar_status(<?= $id_equipamento ?>, 'Cancelado')" ><a style="border-left: 4px solid #EF4444;" class="dropdown-item" href="#">Cancelado</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php
            }
        } else {
            ?>
            <tr>
                <td>
                    Sem Dados!
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>