<?php
require_once('../database/conexao.php');
@session_start();
?>

<div class="">
    <div class="lista-usuarios"></div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Função para buscar a lista de usuários
        function buscarListaUsuarios() {
            $.ajax({
                url: 'clientes/lista_usuarios.php', // Arquivo PHP que retorna a lista de usuários
                method: 'POST',
                success: function(data) {
                    // Atualiza o conteúdo da div com a lista de usuários
                    $('.lista-usuarios').html(data);
                },
                error: function(xhr, status, error) {
                    console.error('Erro ao buscar lista de usuários:', error);
                }
            });
        }

        // Chama a função para buscar a lista de usuários ao carregar a página
        buscarListaUsuarios();
    });

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
                        buscarListaUsuarios();
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
</script>