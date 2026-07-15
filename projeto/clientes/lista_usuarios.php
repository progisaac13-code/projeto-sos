<?php
require_once("../../database/conexao.php");

$query = $pdo->query("SELECT * FROM clientes order by id_cliente desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {

    ?>
    <div class="text-center">
        <button class="btn btn-primary p-3 w-50 mb-3" onclick="$('#adicionarCliente').modal('show')">+ Novo Cliente</button>

    </div>
    <?php
    for ($i = 0; $i < count($res); $i++) {
        foreach ($res[$i] as $key => $value) {
        }
        $id_cliente = $res[$i]['id_cliente'];
        $imagem = $res[$i]['image'];
        $nome = $res[$i]['nome'];
        $telefone = $res[$i]['telefone'];
        $endereco = $res[$i]['enredeco'];
        $equipamentos = $res[$i]['equipamentos'];

        $urlMapa = "https://maps.google.com/maps?q=" . urlencode($endereco) . "&output=embed";


?>
        <div class="d-flex flex-wrap justify-content-center mb-4">
            <div class="col-md-3">
                <div class="card" style="width: 450px;">
                    <img src="image/<?php echo $imagem; ?>" class="card-img-top" alt="...">
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
                        <a href="#" onclick="$('#foto').modal('show')" class="px-2">
                            <i class="fa-solid fa-file-image" title="Adicionar/Alterar Imagem"></i>
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
} else {
    echo '<p>Nenhum usuário encontrado.</p>';
}
