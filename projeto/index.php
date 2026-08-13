<?php
require_once '../database/conexao.php';
@session_start();
if (!isset($_SESSION['id'])) {
    header('Location: ../index.php');
    exit();
}

$active = 'active';

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/4.0.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="../dataTable/DataTables/datatables.min.js"></script>
    <!-- LINKS -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../dataTable/DataTables/datatables.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-clients.css">
    <link rel="stylesheet" href="css/style-equipamentos.css">

</head>

<body>
    <div class="d-flex flex-wrap">
        <div>
            <div class="d-flex flex-column flex-shrink-0 bg-body-tertiary" style="width: 6.5rem; height: 100vh">
                <a href="index.php" class="d-block p-3 link-body-emphasis text-decoration-none" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
                    <img src="../images/logo.png" width="80" alt="">
                    <span class="visually-hidden">Icon-only</span>
                </a>
                <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link <?= ($pag == '') ? 'active' : '' ?> py-3 border-bottom rounded-0" aria-current="page" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Home" data-bs-original-title="Home">
                            <i class="fa-solid fa-house"></i>
                        </a>
                    </li>
                    <li title="Clientes">
                        <a href="index.php?pag=cliente" class="nav-link <?= ($pag == 'cliente') ? 'active' : '' ?> py-3 border-bottom rounded-0" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Clientes" data-bs-original-title="Clientes">
                            <i class="fa-solid fa-users"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link <?= ($pag == 'equipamentos') ? 'active' : '' ?> py-3 border-bottom rounded-0" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Orders" data-bs-original-title="Orders">
                            <i class="fa-solid fa-hammer"></i>
                        </a>
                    </li>
                </ul>
                <div class="dropdown border-top">
                    <a href="#" class="d-flex align-items-center justify-content-center p-3 link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="24" height="24" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small shadow">
                        <li><a class="dropdown-item" href="../exit.php">Sair</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main-content">
            <?php
            if ($pag === 'home') {
                include 'home.php';
            } elseif ($pag === 'cliente') {
                include 'cliente.php';
            } else if ($pag === 'equipamentos') {
                include 'equipamentos.php';
            } else {
                include 'home.php';
            }
            ?>

        </div>
    </div>
    <div class="pag">
    </div>
</body>

<div class="modal fade" id="modalMensage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Atenção!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <img src="../images/alert.png" alt="Atenção!" width="200" class="img-fluid">
                </div>
                <p id="mensage"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="btnClose" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script>
    
</script>

</html>