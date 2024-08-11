<?php
session_start();

// Verificar si el usuario está autenticado y tiene el rol de 'admin'
if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}


require_once('connection/dbconnection.php'); // Incluye el archivo de conexión a la base de datos

// Crear una instancia de la clase Database y obtener la conexión
$database = new Database();
$conn = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['updateUser'])) {
        $userId = $_POST['userId'];
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $active = isset($_POST['active']) ? 1 : 0; // Activar o desactivar

        $query = "UPDATE users SET name = :name, lastname = :lastname, phone = :phone, active = :active WHERE idUser = :userId";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':active', $active);
        $stmt->bindParam(':userId', $userId);

        if ($stmt->execute()) {
            echo '<script>
            Swal.fire({
                icon: "success",
                title: "Usuario actualizado",
                text: "Los detalles del usuario se han actualizado correctamente.",
                confirmButtonText: "Aceptar"
            });
            </script>';
        } else {
            echo '<script>
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "No se pudo actualizar el usuario.",
                confirmButtonText: "Aceptar"
            });
            </script>';
        }
    }
}

// Obtener la lista de usuarios
$query = "SELECT * FROM users";
$stmt = $conn->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="container mt-5">
    <h1>Panel de Administración</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Activo</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <form method="post">
                    <td><?php echo htmlspecialchars($user['idUser']); ?></td>
                    <td><input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required></td>
                    <td><input type="text" name="lastname" value="<?php echo htmlspecialchars($user['lastname']); ?>" required></td>
                    <td><input type="text" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" required></td>
                    <td>
                        <input type="checkbox" name="active" <?php echo $user['active'] ? 'checked' : ''; ?>>
                    </td>
                    <td>
                        <input type="hidden" name="userId" value="<?php echo htmlspecialchars($user['idUser']); ?>">
                        <button type="submit" name="updateUser" class="btn btn-primary">Actualizar</button>
                    </td>
                    <a href="logout.php">cerrar sesion admin</a>
                </form>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
