<?php
require_once '../database/conexao.php';
@session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit();
}

$pag = '';
if (isset($_GET['pag'])) {
    $pag = $_GET['pag'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema SOS</title>
    <!-- SCRIPTS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.3.8/js/dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/4.0.0/jquery.min.js" integrity="sha512-YuCuk5nNmVIUfKROKeV3fpZZ5Vt9vsnq8nExr5JwEJc2r1YDVmDfujcq373eHIzjqdxwCzoKpxngIaAdRUyg3A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <!-- LINKS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.3.8/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hibur+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-clients.css">
</head>

<body>
    <header>
        <div class="d-flex flex-wrap justify-content-between">
            <div>
                <img src="../images/logo.png" width="80" alt="Logo">
            </div>
            <div>
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <div class="navbar-nav">
                                <a class="nav-link" aria-current="page" href="index.php">
                                    <i class="fa-solid fa-house"></i>
                                    Home
                                </a>
                                <a class="nav-link" href="index.php?pag=equipamentos">
                                    <i class="fa-solid fa-hammer"></i>
                                    Equiamentos
                                </a>
                                <a class="nav-link" href="index.php?pag=clientes">
                                    <i class="fa-solid fa-people-group"></i>
                                    Clientes
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <div class="pag">
        <?php
        if ($pag === 'home') {
            include 'home.php';
        } elseif ($pag === 'clientes') {
            include 'clientes.php';
        } else if ($pag === 'equipamentos') {
            include 'equipamentos.php';
        } else {
            include 'home.php';
        }
        ?>
    </div>
</body>

</html>