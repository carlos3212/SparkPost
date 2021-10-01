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

echo $id_usuario;
#Salir si alguno de los datos no está presente
if (
    !isset($_POST["nombre"]) ||
    !isset($_POST["correo"]) 
    
) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "./config/base_de_datos.php";
$id_usuario = $_POST["id"];
echo $id_usuario;
$nombre = $_POST["nombre"];
echo $nombre;
$apellido = $_POST["apellido"];
echo $apellido;
$correo = $_POST["correo"];
echo $correo;
$sentencia = $base_de_datos->prepare("UPDATE usuarios SET nombre = '?', apellido = '?' , correo = '?' WHERE id_usuario = ?;");
$resultado = $sentencia->execute([$nombre, $apellido ,$correo, $id_usuario]); # Pasar en el mismo orden de los ?
if ($resultado === true) {
    header("Location: http://localhost:8080/sparkpost/datos.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario";
}