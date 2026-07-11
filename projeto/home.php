<div class="d-flex flex-wrap details-user">
    <div class="col-md-4 img-user">
        <p></p>
    </div>
    <div class="col-md-8 info-user">
        <h3></h3>
        <h2></h2>
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
                    $('.info-user h3').text('Total de Clientes Cadastrados');
                    $('.info-user h2').text(data);
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