<?php
include_once "../config/base_de_datos.php";
$titulo = $_POST["titulo"];
$asunto = $_POST["asunto"];
$mensaje = $_POST["mensaje"];
$documento = $_POST["nombre"];

$rutaImagen = __DIR__ . "/$documento";
$contenidoBinario = file_get_contents($rutaImagen);
$imagenComoBase64 = base64_encode($contenidoBinario);
echo $rutaImagen;
echo $imagenComoBase64;
?>