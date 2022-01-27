 
<?php
 include_once './seguridad.php';
 
if (!isset($_GET["id"]) && ($_SESSION['rol'] )) {
    exit();
}

$id = $_GET["id"];
include_once "./config/base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM usuarios WHERE id_usuario = ?;");
$resultado = $sentencia->execute([$id]);
if ($resultado === true) {
    header("Location: Location: datos.php");
} else {
    echo "Algo salió mal";
}
