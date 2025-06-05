<?php
session_start();
if (!$_SESSION["access"]) {
    header("location: index.php?ans=login_denied");

}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css" rel="stylesheet">

</head>

<body style="position: relative; min-height: 100vh; margin: 0;">
    <div style="
        background-image: url('/background.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -2;
    "></div>

    <div style="
        background-color: rgba(255, 255, 255, 0.8); 
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
    "></div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="main.php">Sistema Mecanics</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" href="clientes.php">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="servicos.php">Servicos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="veiculos.php">Veiculos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ordens.php">Ordens</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="fotos.php">fotos</a>
                    </li>

                </ul>

                <div class="d-flex">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <?= $_SESSION['username'] ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item"
                                        href="editUser.php?Username=<?php echo $_SESSION["username"]; ?>">Alterar
                                        Dados</a></li>
                                <li><a class="dropdown-item btn btn-danger" href="exit.php" id="logoutButton">Sair</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </nav>


    <main class="container"></main>