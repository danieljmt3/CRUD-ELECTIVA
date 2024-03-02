<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tareas</title>
</head>
<body>
    <h2>Lista de Tareas</h2>
    <form method="post">
        <input type="text" name="task" placeholder="Agregar nueva tarea" required>
        <button type="submit" name="addTask">Agregar</button>
    </form>

    <ul>
        <?php
        session_start();
        
        // Inicializar la lista de tareas si no existe
        if (!isset($_SESSION['tasks'])) {
            $_SESSION['tasks'] = [];
        }

        // Agregar tarea
        if (isset($_POST['addTask'])) {
            $task = $_POST['task'];
            array_push($_SESSION['tasks'], $task);
        }

        // Borrar tarea
        if (isset($_POST['deleteTask'])) {
            $index = $_POST['index'];
            unset($_SESSION['tasks'][$index]);
            $_SESSION['tasks'] = array_values($_SESSION['tasks']); // Reindexar el array
        }

        // Mostrar tareas
        foreach ($_SESSION['tasks'] as $index => $task) {
            echo "<li>$task 
                    <form method='post' style='display:inline;'>
                        <input type='hidden' name='index' value='$index'>
                        <button type='submit' name='deleteTask'>Borrar</button>
                    </form>
                </li>";
        }
        ?>
    </ul>
</body>
</html>
