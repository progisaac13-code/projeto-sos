<?php
require_once('../database/conexao.php');
@session_start();
if (isset($_GET['locate'])) {
    $locate = $_GET['locate'];
} 
?>

<div class="">
    <div class="lista-usuarios"></div>
</div>


<div class="modal fade" id="localizar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Cliente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <?php 
                $codigo_entrada = $_GET['locate'] ?? '';
                $query = $pdo->query("SELECT * FROM clientes WHERE codigo_entrada = '$codigo_entrada'");
                $res = $query->fetchAll(PDO::FETCH_ASSOC);
                if (count($res) > 0) {
                    $endereco = $res[0]['enredeco'];

                    $urlMapa = "https://maps.google.com/maps?q=" . urlencode($endereco) . "&output=embed";
                } else {
                    echo "<p>Cliente não encontrado.</p>";
                }
                ?>
            </div>
            <div class="modal-body">
                <iframe width="1000"
                        height="550"
                        frameborder="0"
                        style="border:0"
                        src="<?php echo $urlMapa; ?>"
                        allowfullscreen>
                </iframe>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="id_cliente" name="id_cliente">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close">Fechar</button>
                <button type="button" class="btn btn-primary" onclick="alterarCliente()">Salvar Alterações</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Cliente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome">
                        </div>
                        <div class="col-md-6">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" class="form-control" id="telefone" name="telefone">
                        </div>
                        <div class="col-md-6">
                            <label for="endereco" class="form-label">Endereço</label>
                            <input type="text" class="form-control" id="endereco" name="endereco">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="id_cliente" name="id_cliente">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close">Fechar</button>
                <button type="button" class="btn btn-primary" onclick="alterarCliente()">Salvar Alterações</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="adicionarCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar Cliente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome_cad" name="nome">
                        </div>
                        <div class="col-md-6">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" class="form-control" id="telefone_cad" name="telefone">
                        </div>
                        <div class="col-md-6">
                            <label for="endereco" class="form-label">Endereço</label>
                            <input type="text" class="form-control" id="endereco_cad" name="endereco">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="cadastrar">Cadastrar Cliente</button>
            </div>
        </div>
    </div>
</div>

<button type="button" class="d-none" data-bs-toggle="modal" data-bs-target="#modalEditar" id="open_modal">
    Launch demo modal
</button>



<script>
    var pag = "<?php echo $pag; ?>";
    var locate = "<?php echo $locate; ?>";
    $(document).ready(function() {
        if (locate) {
            // Se locate não estiver vazio, chama a função para abrir o modal
            $('#localizar').modal('show');
        }
    });
    // $('#formUpload').on('submit', function(e) {

    //     var target = document.getElementById('preview');
    //     var file = document.querySelector('#img').files[0];
    //     var reader = new FileReader();

    //     reader.onloadend = function() {
    //         target.src = reader.result;
    //     };

    //     if (file) {
    //         reader.readAsDataURL(file);
    //     } else {
    //         target.src = "";
    //     }

    //     e.preventDefault(); // impede o recarregamento da página

    //     var arquivo = $('#img')[0].files[0];

    //     if (!arquivo) {
    //         alert('Selecione uma imagem primeiro.');
    //         return;
    //     }

    //     var formData = new FormData();
    //     formData.append('imagem', arquivo);

    //     $.ajax({
    //         url: 'clientes/subir_image.php',
    //         method: 'POST',
    //         data: formData,
    //         contentType: false, // obrigatório: deixa o navegador definir o multipart/form-data
    //         processData: false, // obrigatório: impede o jQuery de converter o FormData em string
    //         success: function(data) {
    //             if (data.trim() === 'Imagem enviada com sucesso.') {
    //                 alert('Upload realizado com sucesso!');
    //                 buscarListaUsuarios(); // atualiza a lista, se necessário
    //             } else {
    //                 alert('Erro ao enviar imagem: ' + data);
    //             }
    //         },
    //         error: function(xhr, status, error) {
    //             console.error('Erro ao enviar imagem:', error);
    //         }
    //     });
    // });



    $(document).ready(function() {
        // Chama a função para buscar a lista de usuários ao carregar a página
        buscarListaUsuarios('list');
    });

    // Função para buscar a lista de usuários
    function buscarListaUsuarios(view) {
        $.ajax({
            url: 'clientes/lista_usuarios.php', // Arquivo PHP que retorna a lista de usuários
            method: 'POST',
            data: {
                view: view // Envia o parâmetro 'view' para o PHP
            },
            success: function(data) {
                // Atualiza o conteúdo da div com a lista de usuários
                $('.lista-usuarios').html(data);
            },
            error: function(xhr, status, error) {
                console.error('Erro ao buscar lista de usuários:', error);
            }
        });
    }

    function deletarCliente(id) {
        if (confirm('Tem certeza que deseja excluir este cliente?')) {
            $.ajax({
                url: 'clientes/excluir_cliente.php',
                method: 'POST',
                data: {
                    id: id
                },
                success: function(data) {
                    // Atualiza a lista de usuários após a exclusão
                    if (data.trim() === 'Cliente excluído com sucesso.') {
                        buscarListaUsuarios('list');
                    } else {
                        alert('Erro ao excluir cliente: ' + data);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Erro ao excluir cliente:', error);
                }
            });
        }
    }

    function abrirModal(id) {
        $.ajax({
            url: 'clientes/editar_cliente.php',
            method: 'POST',
            data: {
                id: id
            },
            success: function(data) {
                var [nome, telefone, endereco] = data.split(';');
                $('#nome').val(nome);
                $('#telefone').val(telefone);
                $('#endereco').val(endereco);
                $('#id_cliente').val(id);
                $('#open_modal').click();

            },
            error: function(xhr, status, error) {
                console.error('Erro ao buscar dados do cliente:', error);
            }
        })
    }

    function alterarCliente() {
        var id = $('#id_cliente').val();
        var nome = $('#nome').val();
        var telefone = $('#telefone').val();
        var endereco = $('#endereco').val();

        $.ajax({
            url: 'clientes/alterar_cliente.php',
            method: 'POST',
            data: {
                id: id,
                nome: nome,
                telefone: telefone,
                endereco: endereco
            },
            success: function(data) {
                if (data.trim() === 'Cliente atualizado com sucesso.') {
                    buscarListaUsuarios('list');
                    $("#close").click();
                } else {
                    alert('Erro ao atualizar cliente: ' + data);
                }
            },
            error: function(xhr, status, error) {
                console.error('Erro ao atualizar cliente:', error);
            }
        });
    }

    $('#cadastrar').click(function() {
        var nome = $('#nome_cad').val();
        var telefone = $('#telefone_cad').val();
        var endereco = $('#endereco_cad').val();

        $.ajax({
            url: 'clientes/adicionar_cliente.php',
            method: 'POST',
            data: {
                nome: nome,
                telefone: telefone,
                endereco: endereco
            },
            success: function(data) {
                if (data.trim() === 'Cliente adicionado com sucesso.') {
                    buscarListaUsuarios('list');
                    $('#adicionarCliente').modal('hide');
                    // Limpar os campos do formulário
                    $('#nome').val('');
                    $('#telefone').val('');
                    $('#endereco').val('');
                } else {
                    alert('Erro ao adicionar cliente: ' + data);
                }
            },
            error: function(xhr, status, error) {
                console.error('Erro ao adicionar cliente:', error);
            }
        });
    });

    $(document).ready(function() {
        $('#minhaTabela').DataTable();
    });
</script>