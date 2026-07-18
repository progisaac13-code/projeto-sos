<?php
require_once("../../database/conexao.php");

$view = $_POST['view'] ?? 'list'; // Obtém o valor do parâmetro 'view' enviado via AJAX, padrão é 'list'
?>

<div class="d-flex flex-wrap align-items-center">
    <div class="col-md-3 mx-2">
        <input type="text" name="pesquisa_cliente" id="pesquisa_cliente" class="form-control" placeholder="Pesquisar Cliente">
    </div>
    <div class="col-md-3">
        <i class="fa-solid fa-table"title="Exibição em Blocos" style="font-size: 18px; color: gray; cursor: pointer;" title="Tabela de Clientes" onclick="buscarListaUsuarios('table')"></i>
        <i class="fa-solid fa-list" title="Exibição em Tabela" style="font-size: 18px; color: gray; cursor: pointer;" title="Lista de Clientes" onclick="buscarListaUsuarios('list')"></i>
        <i class="fa-solid fa-plus" title="Adicionar Cliente" style="font-size: 18px; color: gray; cursor: pointer;" title="Lista de Clientes" onclick="$('#adicionarCliente').modal('show')"></i>
    </div>
</div>

<?php
$query = $pdo->query("SELECT * FROM clientes order by id_cliente desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    if ($view === 'list') {
        // Código para exibir a tabela de clientes
?>
        <table id="myTable" class="table table-striped table-bordered display">
            <thead>
                <tr>
                    <th width="500">Incrição - Nome</th>
                    <th width="200">Telefone</th>
                    <th width="300">Endereço</th>
                    <th width="200">Equipamentos</th>
                    <th width="150">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < count($res); $i++) {
                    foreach ($res[$i] as $key => $value) {
                    }
                    $random_inc = $res[$i]['codigo_entrada'];
                    $id_cliente = $res[$i]['id_cliente'];
                    $nome = $res[$i]['nome'];
                    $telefone = $res[$i]['telefone'];
                    $endereco = $res[$i]['enredeco'];
                    $equipamentos = $res[$i]['equipamentos'];

                    $cod = "#" . $random_inc;

                ?>
                    <tr>
                        <td><?php echo $cod . " - " . $nome; ?></td>
                        <td><?php echo $telefone; ?></td>
                        <td><?php echo $endereco; ?></td>
                        <td><?php echo $equipamentos . " Equipamentos"; ?></td>
                        <td>
                            <a href="#" onclick="deletarCliente(<?php echo $id_cliente ?>)" class="list-icons">
                                <i class="fa-solid fa-trash-can" title="Excluir Cliente"></i>
                            </a>
                            <a href="#" onclick="abrirModal(<?php echo $id_cliente; ?>)" class="list-icons">
                                <i class="fa-solid fa-pen" title="Editar Dados"></i>
                            </a>
                            <a href="tel:<?php echo $telefone; ?>" class="list-icons">
                                <i class="fa-solid fa-phone" title="Telefonar"></i>
                            </a>
                            <a href="https://wa.me/<?php echo str_replace([' ', '-'], ['', ''], $telefone); ?>" target="_blank" class="list-icons">
                                <i class="fa-brands fa-whatsapp" title="WhatsApp"></i>
                            </a>
                            <a href="index.php?pag=clientes&locate=<?php echo "$random_inc"; ?>" class="list-icons">
                                <i class="fa-solid fa-map" title="Visualizar Localização"></i>
                            </a>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php
    } else {
        for ($i = 0; $i < count($res); $i++) {
            foreach ($res[$i] as $key => $value) {
            }
            $id_cliente = $res[$i]['id_cliente'];
            $nome = $res[$i]['nome'];
            $telefone = $res[$i]['telefone'];
            $endereco = $res[$i]['enredeco'];
            $equipamentos = $res[$i]['equipamentos'];

            $urlMapa = "https://maps.google.com/maps?q=" . urlencode($endereco) . "&output=embed";


        ?>
            <div class="d-flex flex-wrap justify-content-center mb-4">
                <div class="col-md-3">
                    <div class="card" style="width: 450px;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $nome; ?></h5>
                            <p class="card-text">Telefone: <?php echo $telefone; ?></p>
                            <p class="card-text">Endereço: <?php echo $endereco; ?></p>
                            <p class="card-text">Equipamentos em seu Nome: <?php echo $equipamentos; ?></p>
                        </div>
                        <div class="d-flex flex-wrap justify-content-center">
                            <a href="#" onclick="deletarCliente(<?php echo $id_cliente ?>)" class="px-2">
                                <i class="fa-solid fa-trash-can" title="Excluir Cliente"></i>
                            </a>
                            <a href="#" onclick="abrirModal(<?php echo $id_cliente; ?>)" class="px-2">
                                <i class="fa-solid fa-pen" title="Editar Dados"></i>
                            </a>
                            <a href="tel:<?php echo $telefone; ?>" class="px-2" class="px-2">
                                <i class="fa-solid fa-phone" title="Telefonar"></i>
                            </a>
                            <a href="https://wa.me/<?php echo str_replace([' ', '-'], ['', ''], $telefone); ?>" target="_blank" class="px-2">
                                <i class="fa-brands fa-whatsapp" title="WhatsApp"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <iframe
                        width="1000"
                        height="550"
                        frameborder="0"
                        style="border:0"
                        src="<?php echo $urlMapa; ?>"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
<?php
        }
    }
} else {
    echo '<p>Nenhum usuário encontrado.</p>';
}
