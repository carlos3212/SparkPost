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
?>

<?php

#Salir si alguno de los datos no está presente
if (
    !isset($_POST["titulo"]) ||
    !isset($_POST["mensaje"]) ||
    !isset($_POST["id"])
) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "../config/base_de_datos.php";
$id = $_POST["id"];
$titulo = $_POST["titulo"];
$asunto = $_POST["asunto"];
$mensaje = $_POST["mensaje"];

$sentencia = $base_de_datos->prepare("UPDATE plantilla SET titulo = ?, asunto = ? , mensaje = ? WHERE id = ?;");
$resultado = $sentencia->execute([$titulo, $asunto,$mensaje, $id]); # Pasar en el mismo orden de los ?
if ($resultado === true) {
    header("Location: ../plantillas.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario";
}
