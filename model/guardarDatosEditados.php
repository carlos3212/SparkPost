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
    !isset($_POST["nombre"]) ||
    !isset($_POST["correo"]) ||
    !isset($_POST["id"])
) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "../config/base_de_datos.php";
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];

$sentencia = $base_de_datos->prepare("UPDATE usuarios SET nombre = ?, correo = ? WHERE id = ?;");
$resultado = $sentencia->execute([$nombre, $correo, $id]); # Pasar en el mismo orden de los ?
if ($resultado === true) {
    header("Location: http://localhost:8080/sparkpost/view/listar.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario";
}
