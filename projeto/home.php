<style>
    header {
        display: none;
    }
    nav {
        background: linear-gradient(165deg, #26436Ea5, #6e94caa5);
    } nav a {
        font-size: 18px !important;
    }

    body {
        background: linear-gradient(rgba(0, 0, 0, .2), rgba(0, 0, 0, .2)), url('image/ilustracao-clientes.png');
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        height: 100vh;
    }

    .clientes {
        background: linear-gradient(rgba(0, 0, 0, .2), rgba(0, 0, 0, .2));
        backdrop-filter: blur(3px);
        padding: 20px 20px 400px 20px;
        color: white;
    }

    .clientes h2 {
        font-size: 42px;
        font-weight: 800;
    }

    p {
        font-family: 'Arial', sans-serif;
        font-size: 18px;
    }

    span {
        font-size: 60px;
        font-weight: bold;
    }

    .equipamentos {
        padding: 0px 20px 380px 20px;
    }
</style>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active text-white" aria-current="page" href="index.php">
                    <i class="fa-solid fa-house"></i>    
                    Home
                </a>
                <a class="nav-link text-white" href="index.php?pag=equipamentos">
                    <i class="fa-solid fa-hammer"></i>
                    Equiamentos
                </a>
                <a class="nav-link text-white" href="index.php?pag=clientes">
                    <i class="fa-solid fa-people-group"></i>
                    Clientes
                </a>
            </div>
        </div>
    </div>
</nav>
<section class="d-flex flex-wrap align-items-center">
    <div class="w-50 clientes">
        <h2 class="hibur-mono-regular">Total de Clientes</h2>
        <p>Acompanhe o número total de clientes cadastrados no sistema.</p>
        <hr>
        <span id="clientes" class="hibur-mono-regular"></span>
    </div>
    <div class="w-50 equipamentos">
        <h2 class="hibur-mono-regular">Equipamentos Cadastratos</h2>
        <p>Visualize a quantidade de equipamentos cadastrados no sistema</p>
        <hr>
        <span id="equipamentos" class="hibur-mono-regular"></span>
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