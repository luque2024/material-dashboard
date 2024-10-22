
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Conexión a la base de datos
$servidor = 'localhost';
$usuario = 'root';
$password = '';
$base_datos = 'sisinventario';

// Crear conexión usando mysqli
$conn = new mysqli($servidor, $usuario, $password, $base_datos);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Procesar el formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $conn->real_escape_string(trim($_POST['email']));
    $password = $_POST['password']; // La contraseña se mantiene sin escape

    // Consultar el usuario
    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql);

    // Verificar si el usuario existe
    if ($result && $result->num_rows > 0) {
        $usuario = $result->fetch_assoc();

        // Verificar la contraseña
        if (password_verify($password, $usuario['password'])) {
            // Autenticación exitosa
            $_SESSION['user_id'] = $usuario['id_usuario'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['mensaje'] = "Bienvenido al sistema, " . htmlspecialchars($_SESSION['nombre']) . "!"; 
          
            header("Location: ../../pages/dashboard.php");
            exit();
        } else {
            // Mensaje de error por contraseña incorrecta
            $_SESSION['mensaje'] = "Contraseña incorrecta. Por favor, intenta de nuevo.";
        }
    } else {
        // Mensaje de error por usuario no encontrado
        $_SESSION['mensaje'] = "No se encontró un usuario con ese email.";
    }

    // Redirigir a la página de inicio de sesión en caso de error
    header("Location: ../../pages/login.php"); // Cambia a la página de inicio de sesión
    exit();
}
?>
