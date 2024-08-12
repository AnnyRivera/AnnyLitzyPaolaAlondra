<?php 
session_start();

// Si ya hay una sesión activa, redirigir al usuario a la página de inicio
if (isset($_SESSION['idUser'])) {
    header("Location: inicio.php");
    exit();
}
require_once('connection/dbconnection.php'); // Incluye el archivo de conexión a la base de datos

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña </title>
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
    <!-- Incluye los CSS de Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/bootstrap-utilities.css">
    <link rel="stylesheet" href="css/bootstrap-grid.rtl.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.css">
    <!-- Incluye el CSS personalizado -->
    <link rel="stylesheet" href="css/index.css">
    <!-- Incluye los scripts de Bootstrap -->
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.esm.js"></script>
    <!-- CDN de iconos de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- CDN de SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SBRY6REDRD"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-SBRY6REDRD');
    </script>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top ">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"> 
               
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Volver</a>
                    </li>
                </ul>
                <form class="d-flex">
                   
                </form>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Formulario de recuperación de contraseña -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center">Recuperar Contraseña</h2>
                <hr>
                <form method="post" action="process_recover.php" name="formRecover" id="formRecover">
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Ingrese su correo electrónico" required>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" name="recoverPassword" id="recoverPassword" class="btn btn-outline-primary">Enviar Enlace de Recuperación</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Formulario de recuperación de contraseña -->

    <!-- Footer -->
    <footer class="bg-dark text-light py-2 fixed-bottom">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-6">
                   
                </div>
                <div class="col-md-6 d-flex flex-column flex-md-row-reverse align-items-center">
                   
                </div>
            </div>
        </div>
    </footer>    
    <!-- End Footer -->
</body>
</html>
