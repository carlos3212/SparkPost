<?php
include_once'config/base_de_datos.php';

$nombreimg = $_POST['nombre'];

$rutaImagen = __DIR__ . "/$nombreimg";
$contenidoBinario = file_get_contents($rutaImagen);
$nombre = base64_encode($contenidoBinario);

echo $nombre;

$sentencia = $base_de_datos->prepare("INSERT INTO imagen (archivo) VALUES decode(?,'base64')");
$resultado = $sentencia->execute([$nombreimg]); # Pasar en el mismo orden de los ?

  
?>