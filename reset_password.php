<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Restablece tu Contraseña </title>
    <!--Manda a llamar los css de bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/bootstrap-utilities.css">
    <link rel="stylesheet" href="css/bootstrap-grid.rtl.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.css">
    <!--Manda a llamar el css de index-->
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/registration.css">
    <!--Manda a llamar el script de bootstrap-->
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.esm.js"></script>
    <!--CDN de iconos de bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--CDN de SweetAlert2-->
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
    <nav class="navbar navbar-expand-sm navbar-dark bg-pink sticky-top ">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"> 
            <h2>
            <span class="text-white">4</span>
            <span class="text-primary">Nenis</span> 🧡
            </h2>
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
          <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Inicio</a>
              </li>
            </ul>
            
          </div>
        </div>
       
      </nav>
       <!-- End Navbar -->

       <!-- Formulario de restablecimiento de contraseña -->
       <?php
       if (isset($_GET['email']) && isset($_GET['token'])) {
           $email = $_GET['email'];
           $token = $_GET['token'];
       ?>
           <div class="container mt-5">
               <div class="row justify-content-center">
                   <div class="col-md-6">
                       <h3 class="text-center">Restablecer Contraseña</h3>
                       <hr>
                       <form action="process_reset_password.php" method="POST" id="formRegistration" name="formRegistration">
                           <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
                           <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
                           <div class="mb-3">
                               <label for="password">Nueva Contraseña:</label>
                               <input type="password" name="password" id="password" class="form-control" required>
                           </div>
                           <div class="mb-3">
                               <label for="confirm_password">Confirmar Nueva Contraseña:</label>
                               <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                           </div>
                           <div class="d-grid gap-2">
                               <button type="submit" class="btn btn-outline-primary">Restablecer Contraseña</button>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
           <script>
           document.getElementById("formRegistration").addEventListener("submit", function(event){
               event.preventDefault(); // Prevenir el envío del formulario
              
               let password = document.getElementById("password").value;
               let confirmPassword = document.getElementById("confirm_password").value;
               
               if (!password || !confirmPassword) {
                   // No es necesario mostrar una alerta, simplemente evitamos el envío del formulario
                   return;
               } else if (password !== confirmPassword) {
                   Swal.fire({
                       icon: 'error',
                       title: 'Contraseñas no coinciden',
                       text: 'Las contraseñas ingresadas no coinciden.',
                   });
               } else {
                   // Si las contraseñas coinciden, enviar el formulario
                   document.getElementById("formRegistration").submit();
               }
           });
           </script>
       <?php
       } else {
           echo "Parámetros inválidos.";
       }
       ?>
       <!-- End Formulario de restablecimiento de contraseña -->

    
</body>
</html>
