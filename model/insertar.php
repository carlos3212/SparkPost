<?php
/*
CRUD con PostgreSQL y PHP
@author parzibyte [parzibyte.me/blog]
@date 2019-06-17

================================
Este archivo inserta los datos 
enviados a través de formulario.php
================================
*/
?>
<?php
#Salir si alguno de los datos no está presente
if (!isset($_POST["nombre"]) || !isset($_POST["correo"])) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "../config/base_de_datos.php";
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$campaña = $_POST["id_campaña"];
$plantilla = $_POST["id_plantilla"];

/*
Al incluir el archivo "base_de_datos.php", todas sus variables están
a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
copiado y pegado el código
 */
$sentencia = $base_de_datos->prepare("INSERT INTO usuarios (nombre, correo, tipo_campana, tipo_plantilla) VALUES (?, ?, ?, ?)");
$resultado = $sentencia->execute([$nombre, $correo, $campaña, $plantilla]); # Pasar en el mismo orden de los ?

#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar

if ($resultado === true) {
    # Redireccionar a la lista
	header("Location: http://localhost:8080/sparkpost/datos.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista";
}
