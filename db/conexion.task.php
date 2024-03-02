<?php
// Datos de conexión a la base de datos
$servername = "localhost"; // Nombre del servidor (usualmente localhost)
$username = "root"; // Nombre de usuario de MySQL
$password = ""; // Contraseña de MySQL
$database = "crud"; // Nombre de la base de datos a la que deseas conectarte

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $database);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
} else {
    echo "Conexión exitosa";
}

// Cerrar la conexión (opcional, PHP lo hace automáticamente al finalizar el script)
//$conn->close();
?>
