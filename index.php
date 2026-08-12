<?php
require_once 'database/conexao.php';
@session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto SOS</title>
    <!-- LINKS -->
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/css.css">
    <!-- SCRIPTS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/4.0.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="text-center my-5">
        <img src="images/logo.png" width="150" class="img-fluid mb-2" alt="Logo">
        <h1 class="hibur-mono-regular">Projeto SOS</h1>
    </div>
    <div class="row">
        <div class="col-md-6 login">
            <h1>Log-in </h1>
            <form method="post">
                <div class="form-group">
                    <div class="form-floating">
                        <input type="text" name="email" id="email" placeholder="Informe seu E-mail" placeholder="Informe seu E-mail" class="form-control" required>
                        <label for="email">Informe seu E-mail</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-floating">
                        <input type="password" name="password" id="password" placeholder="Informe sua Senha" class="form-control" required>
                        <label for="password">Informe sua Senha</label>
                    </div>
                </div>
                <div class="">
                    <div class="btn btn-primary py-2 fs-5" id="click_login">Login</div>
                </div>
            </form>
        </div>
        <div class="col-md-6 cadastro">
            <form method="post">
                <h1><?= $_SESSION['nome'] ?></h1>
                <div class="form-group">
                    <div class="form-floating">
                        <input type="text" name="nome" id="nome" placeholder="Informe seu nome" class="form-control">
                        <label for="nome">Insira seu Nome</label>        
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-floating">
                        <input type="text" name="funcao" id="funcao" class="form-control" placeholder="Sua função...">
                        <label for="funcao">Informe sua função</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-floating">
                                <input type="email" name="cademail" id="cademail" class="form-control" placeholder="Insira seu email">
                                <label for="cademail">Informe seu Email</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-floating">
                                <input type="password" name="senha" id="senha" class="form-control" placeholder="Informe sua Senha">
                                <label for="senha">Senha</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="btn btn-primary py-2" id="singup">Cadastrar-se</div>
                </div>
            </form>
        </div>
    </div>
</body>

<!-- Modal -->
<div class="modal fade" id="modalMensage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Atenção!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <img src="images/alert.png" alt="Atenção!" width="200" class="img-fluid">
                </div>
                <p id="mensage"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="btnClose" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

</html>

<script>
    $('#singup').click(function() {
        var nome = $('#nome').val();
        var funcao = $('#funcao').val();
        var email = $('#cademail').val();
        var senha = $('#senha').val();

        $.ajax({
            url: 'cadastrar.php',
            method: 'post',
            data: {nome: nome, funcao: funcao, email: email, senha: senha},
            success: function(res) {
                if (res === "Sucesso!") {
                    window.location.href = 'projeto/index.php?pag=home';
                } else {
                    $('#mensage').text(res);
                    $('#btnClose').text('Tentar Novamente');
                    $('#modalMensage').modal('show');
                }
            }
        })
    })

    $('#click_login').click(function(e) {
        e.preventDefault();
        var email = $('#email').val();
        var password = $('#password').val();

        $.ajax({
            url: 'login.php',
            type: 'POST',
            data: {
                email: email,
                password: password
            },
            success: function(response) {
                if (response === 'success') {
                    window.location.href = 'projeto/index.php?pag=home';
                } else {
                    $('#mensage').text(response);
                    $('#btnClose').text('Tentar Novamente');
                    $('#modalMensage').modal('show');
                }
            },
            error: function() {
                alert('Ocorreu um erro ao processar sua solicitação. Tente novamente mais tarde.');
            }
        });
    });
</script>