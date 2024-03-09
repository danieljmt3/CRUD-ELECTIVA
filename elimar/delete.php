<?php
// Conexión a la base de datosaaa
$conexion = new mysqli("localhost", "usuario", "contraseña", "nombre_base_de_datos");

// Verifica la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtiene el ID de la tarea a borrar
$id_tarea = $_GET['id'];

// Elimina la tarea de la base de datos
$sql = "DELETE FROM tareas WHERE id=$id_tarea";
if ($conexion->query($sql) === TRUE) {
    header('Location: index.php'); // Redirige de nuevo a la página principal
} else {
    echo "Error al borrar tarea: " . $conexion->error;
}

// Cierra la conexión
$conexion->close();
?>