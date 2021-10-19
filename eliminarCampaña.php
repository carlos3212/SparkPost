 
<?php
 //include_once './seguridad.php';
 
if (!isset($_GET["id"]) ) {
    exit();
}

$id = $_GET["id"];
include_once "./config/base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM campana WHERE id_campana = ?;");
$resultado = $sentencia->execute([$id]);
if ($resultado === true) {
    header("Location: Location: http://localhost:8080/sparkpost/campañas.php");
} else {
    echo "Algo salió mal";
}
