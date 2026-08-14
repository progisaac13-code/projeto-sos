<?php
require_once("../../database/conexao.php");
$query = $pdo->query("SELECT * FROM equipamentos");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<script>
    const t3 = new DataTable('.t3', {});
</script>
<table class="table t3">
    <thead>
        <tr>
            <th>Tipo/Modelo</th>
            <th>Marca</th>
            <th>Problema</th>
            <th>Servico</th>
            <th>Status</th>
            <th>Data Entrega</th>
            <th>Data Conclusão</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (count($res) > 0) {
            for ($i = 0; $i < count($res); $i++) {
                $id_equipamento = $res[$i]['id'];
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
        
                ?>
                <tr>
                    <td><?= $nome . " - " . $modelo?></td>
                    <td><?= $marca ?></td>
                    <td><?= $problema ?></td>
                    <td><?= $servico ?></td>
                    <td><?= $status ?></td>
                    <td><?= $data_entrada ?></td>
                    <td><?= $data_conclusao ?></td>
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