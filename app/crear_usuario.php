<?php
// Configuración de conexión a la base de datos
$servidor = 'localhost';
$usuario = 'root';
$password = '';
$base_datos = 'sisinventario'; // Cambiado a 'sisinventario'

// Crear conexión
$conn = new mysqli($servidor, $usuario, $password, $base_datos);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verificar si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $id_rol = $_POST['id_rol']; // Asegúrate de que el rol exista en la tabla roles
    $id_negocio = $_POST['id_negocio']; // Asegúrate de que el negocio exista en la tabla negocio

    // Proteger contra inyección SQL
    $nombre = $conn->real_escape_string($nombre);
    $email = $conn->real_escape_string($email);
    $passwordHash = password_hash($password, PASSWORD_DEFAULT); // Hashear la contraseña
    $id_rol = (int)$id_rol; // Convertir a entero
    $id_negocio = (int)$id_negocio; // Convertir a entero

    // Insertar el nuevo usuario
    $sql = "INSERT INTO usuarios (nombre, email, password, id_rol, id_negocio) VALUES ('$nombre', '$email', '$passwordHash', $id_rol, $id_negocio)";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario creado exitosamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!-- Formulario HTML para crear usuario -->
<form method="POST" action="">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    
    <label for="id_rol">ID Rol:</label>
    <select name="id_rol" required>
        <?php
        $result = $conn->query("SELECT id_rol, nombre_rol FROM roles");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['id_rol']}'>{$row['nombre_rol']}</option>";
        }
        ?>
    </select>
    
    <label for="id_negocio">ID Negocio:</label>
    <select name="id_negocio" required>
        <?php
        $result = $conn->query("SELECT id_negocio, nombre_negocio FROM negocio");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['id_negocio']}'>{$row['nombre_negocio']}</option>";
        }
        ?>
    </select>
    
    <button type="submit">Crear Usuario</button>
</form>
</body>
</html>
