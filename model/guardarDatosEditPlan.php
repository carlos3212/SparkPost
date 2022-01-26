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
    !isset($_POST["id"]) ||
    !isset($_POST["titulo"]) 
    
) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...
include_once "../config/base_de_datos.php";
$id_usuario = $_POST["id"];
echo $id_usuario;
$titulo = $_POST["titulo"];
echo $titulo;
$asunto = $_POST["asunto"];
echo $asunto;
$mensaje = $_POST["mensaje"];
echo $mensaje;
$sentencia = $base_de_datos->prepare("UPDATE plantilla SET titulo=?, asunto=?, mensaje=? WHERE id_plantilla = $id_usuario;");
$resultado = $sentencia->execute([$titulo, $asunto ,$mensaje]); # Pasar en el mismo orden de los ?
if ($resultado === true) {
    header("Location: ../plantillas.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario";
}