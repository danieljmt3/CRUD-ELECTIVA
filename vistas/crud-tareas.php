<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas CRUD</title>
    <link rel="stylesheet" href="../public/estilos/index.css">
</head>

<body>
    <section>
        <div class="formulario">
            <form>
                <input class="title" type="text" name="titulo" id="titulo" placeholder="Ingresa el titulo de la tarea">
                <input class="description" type="text" name="descripcion" id="descripcion" placeholder="Agrega una descripcion">
                <div class="cont-btn">
                    <button type="submit">Agregar + </button>
                </div>
            </form>
        </div>
        <div class="tasks">
        <div class="task">
                <p>pasear al perro</p>
                <div class="cont-actions">
                    <button type="button">Completar</button>
                    <form action="../controladores/controller.task.edit.php" method="GET">
                        <input type="hidden" name="id"  value="1">
                        <input type="submit">
                    </form>
                    
                </div>
            </div>
        </div>
    </section>

    <script src="../public/javascript/index.js"></script>
    <script src="../public/javascript/listar.task.js"></script>
</body>

</html>