<?php
class Authenticator {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function login($email, $password) {
        try {
            // Seleccionar el usuario por su email y contraseña
            $stmt = $this->conn->prepare('SELECT * FROM users WHERE email = :email AND password = :password AND active = 1');
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verificar si el usuario existe y está activo
            if ($user) {
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['idUser'] = $user['idUser'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['lastname'] = $user['lastname'];
                $_SESSION['phone'] = $user['phone'];
                $_SESSION['dateRegister'] = $user['dateRegister'];
                $_SESSION['role'] = $user['role'];
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            // Manejar la excepción (registrar, mostrar mensaje, etc.)
            error_log($e->getMessage());
            return false;
        }
    }
}
?>
