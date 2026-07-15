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
    <!-- LINKS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hibur+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/2.3.8/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-clients.css">
    <!-- SCRIPTS -->
    <link rel="stylesheet" href="//cdn.datatables.net/2.3.8/js/dataTables.min.js">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/4.0.0/jquery.min.js" integrity="sha512-YuCuk5nNmVIUfKROKeV3fpZZ5Vt9vsnq8nExr5JwEJc2r1YDVmDfujcq373eHIzjqdxwCzoKpxngIaAdRUyg3A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div class="container">
            <div class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                    <img src="../images/logo.png" width="70" class="img-fluid mb-2" alt="Logo">
                </a>
                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="?pag=home" class="nav-link" aria-current="page">Home</a></li>
                    <li class="nav-item"><a href="?pag=clientes" class="nav-link">Clientes</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Equipamentos</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Log Out</a></li>
                </ul>
            </div>
            <div class="b-example-divider"></div>
                <div class="details text-white">
                    <p>Nome do usuário: <?php echo $_SESSION['user_name']; ?> - Código de Entrada: <?php echo "#$" . $_SESSION['user_id'] . "#14FfXz"; ?></p>
                </div>
            </div>
        </div>
    </header>
    <div class="pag">
        <?php
            if ($pag === 'home') {
                include 'home.php';
            } elseif ($pag === 'clientes') {
                include 'clientes.php';
            } else {
                include 'home.php';
            }
        ?>
    </div>
</body>

</html>
<script>
    
    let table = new DataTable('#myTable');

</script>