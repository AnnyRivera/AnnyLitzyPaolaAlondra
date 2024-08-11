<?php 
session_start();

// Si ya hay una sesión activa, redirigir al usuario a la página de inicio
if (isset($_SESSION['idUser'])) {
    header("Location: inicio.php");
    exit();
}

require_once('connection/dbconnection.php'); // Incluye el archivo de conexión a la base de datos
require_once('includes/Authenticator.php'); // Asegúrate de que la ruta sea correcta

if (isset($_POST['loginUser'])) {
    try {
        $database = new Database();
        $db = $database->getConnection();
        $authenticator = new Authenticator($db);
        
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($authenticator->login($email, $password)) {
            // Redirigir al usuario a la página correcta basada en su rol
            if ($_SESSION['role'] === 'admin') {
                header("Location: admin.php");
            } else {
                header("Location: inicio.php");
            }
            exit();
        } else {
            echo '<script>
            Swal.fire({
                icon: "question",
                position: "center",
                title: "Correo electrónico o contraseña incorrecta",
                html: "<font color=grey><strong>Verifique sus datos de acceso</font>",
                showConfirmButton: true,
                allowOutsideClick: false,
                confirmButtonText: "Aceptar"
                   }).then(function(result){
                      if(result.value){                   
                      window.location = "login.php";
                   }
             });
            </script>';
            exit();
        }
    } catch (Exception $e) {
        error_log($e->getMessage());
        echo '<script>
        Swal.fire({
            icon: "error",
            position: "center",
            title: "Error del servidor",
            html: "<font color=grey><strong>Intente nuevamente más tarde</font>",
            showConfirmButton: true,
            allowOutsideClick: false,
            confirmButtonText: "Aceptar"
               }).then(function(result){
                  if(result.value){                   
                  window.location = "login.php";
               }
         });
        </script>';
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4 lokas</title>
    <!--Manda a llamar los css de bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/bootstrap-utilities.css">
    <link rel="stylesheet" href="css/bootstrap-grid.rtl.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.css">
    <!--Manda a llamar el css de index-->
    <link rel="stylesheet" href="css/index.css">
    <!--Manda a llamar el script de bootstrap-->
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.esm.js"></script>
    <!--CDN de iconos de bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--CDN de SweetAlert2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--API de reCAPTCHA-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
    <h3 class="mb-0 text-center">Iniciar sesión <i>🧡</i></h3>
    <br>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <hr>
                <form method="post" name="formLogin" id="formLogin">
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="inputEmail" name="email" aria-describedby="emailHelp" placeholder="Ingrese su correo electrónico" required>
                    </div>

                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Ingrese su contraseña" required>
                    </div>

                    <div class="g-recaptcha mb-3" data-sitekey="6LcPgOcpAAAAALd4y20EdFOP2K1giEvOJ3wrcd7Z"></div>

                    <div class="d-grid gap-2">
                        <button type="submit" name="loginUser" id="loginUser" class="btn btn-outline-primary">Iniciar sesión</button>
                    </div>
                    <br>
                    <div class="d-flex flex-column align-items-center">
                        <a href="forgetpassword.php" class="text-primary text-decoration-none">¿No recuerdas tu contraseña? Haz clic aquí!</a>
                    </div> 
                    <center>
                        <a href="index.php" style="color:#FD65E0; font-family:fantasy">Regresar a inicio</a>
                    </center>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
