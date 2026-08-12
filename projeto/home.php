<?php
@session_start();
?>
<div class="container">
    <h1>Olá, <?= $_SESSION['nome'] ?>. Alguns dados do Sistema pra você!</h1>
    <hr>
    <div class="info">
        <div class="clientes">
            <h3>CLIENTES</h3>
            <hr>
            <div>
                <p>Números Atualizados de Clientes:</p>
                <span id="clientes"></span>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Função para atualizar os dados do usuário
        function atualizarDadosUsuario() {
            $.ajax({
                url: 'home/detalhes_usuario.php', // Arquivo PHP que retorna os dados do usuário
                method: 'POST',
                success: function(data) {
                    // Atualiza os elementos HTML com os dados recebidos
                    $('#clientes').text(data);
                },
                error: function(xhr, status, error) {
                    console.error('Erro ao buscar dados do usuário:', error);
                }
            });
        }

        // Chama a função para atualizar os dados do usuário ao carregar a página
        atualizarDadosUsuario();
    });
</script>