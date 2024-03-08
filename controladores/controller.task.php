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


?>