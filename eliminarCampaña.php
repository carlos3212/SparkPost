



<?php
   include_once './seguridad.php';


if ($_SESSION['rol']==2)
   session_unset();
   session_destroy();

if (!isset($_GET["id"]) && ($_SESSION['rol']==1)) {
    exit();
}

$id = $_GET["id"];
include_once "./config/base_de_datos.php";
$sentenciaP = $base_de_datos->prepare("DELETE FROM campana WHERE id_campana = ?;");
$resultadoP = $sentenciaP->execute([$id]);
if ($resultadoP === true) {
    header("Location: http://localhost:8080/sparkpost/campa%C3%B1as.php");
} else {
    echo "Algo salió mal";
}
