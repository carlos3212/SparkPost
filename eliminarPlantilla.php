 
<?php
 //include_once './seguridad.php';
 
if (!isset($_GET["id"])) {
    exit();
}

$id = $_GET["id"];
include_once "./config/base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM plantilla WHERE id_plantilla = ?;");
$resultado = $sentencia->execute([$id]);
if ($resultado === true) {
    header("Location: plantilla.php");
} else {
    echo "Algo salió mal";
}
