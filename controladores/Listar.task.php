<?php
// Función para obtener la lista de tareas desde la base de datos y devolver un JSON
require '../crud/Conexion.php';
require './controller.task.php';
obtenerListaTareas($conexion);
?>

