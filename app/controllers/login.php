<?php
session_start(); // Inicia la sesión

// Conexión a la base de datos
$servidor = 'localhost';
$usuario = 'root';
$password = '';
$base_datos = 'sisinventario';

$conn = new mysqli($servidor, $usuario, $password, $base_datos);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verificar si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Proteger contra inyección SQL
    $email = $conn->real_escape_string($email);
    
    // Consultar el usuario
    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
        
        // Verificar la contraseña
        if (password_verify($password, $usuario['password'])) {
            // Autenticación exitosa
            $_SESSION['user_id'] = $usuario['id_usuario'];
            $_SESSION['nombre'] = $usuario['nombre'];
            
            echo "Inicio de sesión exitoso. Bienvenido " . $_SESSION['nombre'];
            // Redireccionar a otra página si lo deseas
            // header('Location: dashboard.php');
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "No se encontró un usuario con ese email.";
    }
}
?>
