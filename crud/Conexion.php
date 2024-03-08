<?php
$Servername="localhost";
$Database="crud";
$Username="root";
$Password="";
$conexion = mysqli_connect ($Servername,$Username,$Password, $Database);

if(mysqli_connect_error()){
    echo "No se pudo conectar ";
}


?>