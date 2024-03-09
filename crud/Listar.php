<?php
include_once('conexion.task.php');

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // ID de la tarea que deseas obtener
    $tarea_id = 1;

    // Consulta para obtener una tarea específica por ID
    $stmt = $conn->prepare("SELECT ID, Name, Description, Status, Date FROM tareas WHERE ID = :id");
    $stmt->bindParam(':id', $tarea_id);
    $stmt->execute();

    // Mostrar el resultado
    $row = $stmt->fetchAll();
    echo "ID: " . $row['ID'] . "<br>";
    echo "Nombre: " . $row['Name'] . "<br>";
    echo "Descripción: " . $row['Description'] . "<br>";
    echo "Estado: " . $row['Status'] . "<br>";
    echo "Fecha: " . $row['Date'] . "<br>";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión
$conn = null;
?>
