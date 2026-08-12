<?php
require_once 'database/conexao.php';
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
        <div class="col-md-5 login">
            <form method="post">
                <div class="form-group">
                    <div class="form-floating">
                        <input type="text" name="email" id="email" placeholder="Informe seu E-mail" placeholder="Informe seu E-mail" class="form-control">
                        <label for="email">Informe seu E-mail</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-floating">
                        <input type="password" name="password" id="password" placeholder="Informe sua Senha" class="form-control">
                        <label for="password">Informe sua Senha</label>
                    </div>
                </div>
                <div class="">
                    <div class="btn btn-dark w-100 py-2 fs-5" id="click_login">Login</div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<script>
    $('#click_login').click(function(e) {
        e.preventDefault();
        var email = $('#email').val();
        var password = $('#password').val();

        if (email === '' || password === '') {
            alert('Por favor, preencha todos os campos.');
            return;
        }

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
                    alert(response);
                }
            },
            error: function() {
                alert('Ocorreu um erro ao processar sua solicitação. Tente novamente mais tarde.');
            }
        });
    });
</script>