<?php
include "../db/conexion.task.php";
//Condicional donde recibe el id mediante get y muestra los datos en el formulario de actualización
if($_SERVER['REQUEST_METHOD']==='GET'){
    $id= $_GET["id"];
    $crudsito="SELECT * FROM `tareas` where ID=$id";
    $hacercrud= mysqli_query($conn,$crudsito);
    while($crudd= mysqli_fetch_array($hacercrud)){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Editar tarea</title>
</head>
<body>
    <div class="contenedor">
        <div class="fila">



            <div class="tabla">
                <table class="tablita">

                <thead class="cabeza">
                </thead>

                <tbody>
                        <div class="cont">
                        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                            <div class="texto">
                            <input type="hidden" class="txt" value="<?php echo $crudd['id']?>" name="id">
                            <p>NOMBRE</p>
                            </div>
                            <div class="texto">
                            <input type="text" class="txt" value="<?php echo $crudd['titulo']?>" name="nom">
                            </div>
 
                            <div class="texto">
                            <P>DESCRIPCION</P>
                            <input type="text" class="txt" value="<?php echo $crudd['descripcion']?>" name="descripcion">
                            </div>
                            <div class="texto">
                            <p>ESTADO</p>
                            <input type="checkbox" class="check" value="<?php echo ($crudd['estado']==1)? 'checked':'' ?>" name="estado">
                            </div>
                            <input type="submit" class="btact" value="Editar">
                        </form>
                        </div>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    }//condicional para actualizar los datos
}else if($_SERVER['REQUEST_METHOD']=== 'POST'){//se hace la petición mediante post
    $ide= $_POST['id'];
    $nom= $_POST['nom'];
    $desc= $_POST['descripcion'];
    $estado= isset($_POST['estado'])?1:0;
    $actuali= mysqli_query($conn,"UPDATE `tareas` SET `titulo` = '$nom', `descripcion` = '$desc', `estado` = '$estado' WHERE `id` = '$ide'")
    or die("error al actualizar");
    echo'deberia redireccionar';
    
    mysqli_close($conn);
    header('Location: http://localhost/codigos/CRUD-ELECTIVA/vistas/crud-tareas.php');

    
}

