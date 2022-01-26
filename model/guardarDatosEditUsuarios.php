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
    !isset($_POST["email"]) ||
    !isset($_POST["rol"]) 
    
) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...
include_once "../config/base_de_datos.php";
$id = $_POST["id"];
echo $id;
$email = $_POST["email"];
echo $email;
$password = $_POST["password"];
echo $password;
$rol = $_POST["rol"];
echo $rol;
$usuario = $_POST["usuario"];
echo $usuario;
$sentencia = $base_de_datos->prepare("UPDATE registro SET email=?, password=?, rol=?, usuario=? WHERE id = $id;");
$resultado = $sentencia->execute([$email, $password ,$rol,$usuario]); # Pasar en el mismo orden de los ?
if ($resultado === true) {
    header("Location: ../datos_login.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario";
}