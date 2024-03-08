<?php

/**
 * 
 * ESTA FUNCION SE ENCARGA DE GUARDAR LOS DATOS EN LA BASE DE DATOS
 * 
 * @param: CONEXION A BASE DE DATOS $conexion
 */
function guardarTarea($conexion) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = mysqli_real_escape_string($conexion, $_POST['titulo']);
        $description = mysqli_real_escape_string($conexion, $_POST['descripcion']);
        $sql = "INSERT INTO tareas (titulo, descripcion ) VALUES ('$title', '$description')";
        $response = array();
        if (mysqli_query($conexion, $sql)) {
            $response['status'] = 'success';
            $response['message'] = 'La tarea se ha guardado exitosamente.';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error: ' . $sql . '<br>' . mysqli_error($conexion);
        }
        echo json_encode($response);
    }
    mysqli_close($conexion);
}

/**
 * 
 * ESTA FUNCION SE ENCARGA DE LISTAR
 * 
 * @param: CONEXION A BASE DE DATOS $conexion
 */
function obtenerListaTareas($conexion) {
 
    // Consulta SQL para obtener la lista de tareas
    $consulta = "SELECT id, titulo, descripcion FROM tareas";
    $resultado = $conexion->query($consulta);

    // Verifica si se obtuvieron resultados
    if ($resultado->num_rows > 0) {
        // Arreglo para almacenar las tareas
        $tareas = array();

        // Itera sobre cada fila de resultados
        while ($fila = $resultado->fetch_assoc()) {
            // Agrega la tarea a la lista
            $tareas[] = $fila;
        }

        // Cierra la conexión
        $conexion->close();

        // Devuelve la lista de tareas en formato JSON
        echo json_encode($tareas);
    } else {
        // Si no se encontraron tareas, devuelve un JSON vacío
        echo json_encode(array());
    }
}



?>