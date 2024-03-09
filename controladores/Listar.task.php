<?php
// Función para obtener la lista de tareas desde la base de datos y devolver un JSON
require '../db/conexion.task.php';
require './controller.task.php';
obtenerListaTareas($conn);
?>

