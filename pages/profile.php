<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../pages/login.php"); // Redirigir a login si no está autenticado
    exit();
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

// Obtener detalles del usuario
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM usuarios WHERE id_usuario='$user_id'";
$result = $conn->query($sql);

// Verificar si el usuario existe
if ($result && $result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
} else {
    // Manejo de error si no se encuentra el usuario
    $_SESSION['mensaje'] = "No se encontró el usuario.";
    header("Location: ../../pages/login.php");
    exit();
}

// Mostrar detalles del usuario
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil de Usuario</title>
</head>
<body>
    <h1>Perfil de Usuario</h1>
    <p><strong>ID:</strong> <?php echo htmlspecialchars($usuario['id_usuario']); ?></p>
    <p><strong>Nombre:</strong> <?php echo htmlspecialchars($usuario['nombre']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($usuario['email']); ?></p>
    <!-- Agrega más campos según lo necesario -->
    
</body>
</html>

<?php
// Cerrar la conexión después de mostrar los detalles
$conn->close();
?>