<?php
@session_start();
require_once('../../database/conexao.php');

$query = $pdo->query("SELECT * FROM clientes ORDER BY id_cliente DESC");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    ?>
    <table id="myTable" class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Equipamento(s)</th>
            </tr>
        </thead>
    <?php
    for ($i = 0; $i < count($res); $i++) {
        $nome = $res[$i]['nome'];
        $cpf = $res[$i]['cpf'];
        $telefone = $res[$i]['telefone'];
        $endereco = $res[$i]['enredeco'];

        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        $query_eq = $pdo->query("SELECT * FROM equipamentos WHERE id_cliente = '$_SESSION[id]'");
        $res_eq = $query_eq->fetchAll(PDO::FETCH_ASSOC);
        $tot_eq = count($res_eq);

        ?>
        <tbody>
            <tr>
                <td><?= $nome ?></td>
                <td><?= $cpf ?></td>
                <td><?= $telefone ?></td>
                <td><?= $endereco ?></td>
                <td><?= $tot_eq ?></td>
            </tr>
        </tbody>
        <?php
    }
    ?>
    </table>
    <?php
}else {
    echo "Sem Dados para Exibir!";
}