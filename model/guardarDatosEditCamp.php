<?php
/*
CRUD con PostgreSQL y PHP
@author parzibyte [parzibyte.me/blog]
@date 2019-06-17

================================
Este archivo guarda los datos del formulario
en donde se editan
================================
*/



#Salir si alguno de los datos no está presente
if (
    
    !isset($_POST["nombre"]) 
    
) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...
include_once "../config/base_de_datos.php";
$id_usuario = $_POST["id"];
echo $id_usuario;
$nombre = $_POST["nombre"];
echo $nombre;

$sentencia = $base_de_datos->prepare("UPDATE campana SET nombre_campana=? WHERE id_campana = $id_usuario;");
$resultado = $sentencia->execute([$nombre]); # Pasar en el mismo orden de los ?
if ($resultado === true) {
    header("Location: ../campañas.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario";
}