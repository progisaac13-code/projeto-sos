<style>
    header {
        display: none;
    } body {
        background: linear-gradient(rgba(0, 0, 0, .2), rgba(0, 0, 0, .2)), url('image/ilustracao-clientes.png');
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        height: 100vh;
    } .clientes {
        background: linear-gradient(rgba(0, 0, 0, .2), rgba(0, 0, 0, .2));
        backdrop-filter: blur(3px);
        padding: 20px 20px 400px 20px;
        color: white;
    } .clientes h2 {
        font-size: 42px;
        font-weight: 800;   
    } p {
        font-family: 'Arial', sans-serif;
        font-size: 18px;
    } span {
        font-size: 60px;
        font-weight: bold;
    }
</style>    
<section class="d-flex flex-wrap align-items-center">
    <div class="w-50 clientes">
        <h2 class="hibur-mono-regular">Total de Clientes</h2>
        <p>Acompanhe o número total de clientes cadastrados no sistema.</p>
        <hr>
        <span id="clientes" class="hibur-mono-regular"></span>
    </div>
    <div class="w-50">

    </div>
</section>
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