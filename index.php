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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hibur+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/css.css">
    <!-- SCRIPTS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/4.0.0/jquery.min.js" integrity="sha512-YuCuk5nNmVIUfKROKeV3fpZZ5Vt9vsnq8nExr5JwEJc2r1YDVmDfujcq373eHIzjqdxwCzoKpxngIaAdRUyg3A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>

<body>
    <div class="login">
        <form action="">
            <div class="text-center">
                <img src="images/logo.png" width="150" class="img-fluid mb-2" alt="Logo">
                <h1 class="hibur-mono-regular">Formulário de Login</h1>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Informe seu E-mail">
                            <label for="email">Entre com o seu E-mail</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Informe sua Senha">
                        <label for="password">Entre com a sua Senha</label>
                    </div>
                </div>
                <button class="btn btn-form mt-3" id="click_login">Entrar</button>
            </div>
        </form>
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
                    window.location.href = 'projeto/';
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