<?php
/*
CRUD con PostgreSQL y PHP
@author parzibyte [parzibyte.me/blog]
@date 2019-06-17

================================
Este archivo elimina un dato por ID sin
pedir confirmación. El ID viene de la URL
================================
*/
if (!isset($_GET["id"])) {
    exit();
}

$id = $_GET["id"];
include_once "./config/base_de_datos.php";
$sentenciaP = $base_de_datos->prepare("DELETE FROM plantilla WHERE id_plantilla = ?;");
$resultadoP = $sentenciaP->execute([$id]);
if ($resultadoP === true) {
    header("Location: Location: http://localhost:8080/sparkpost/plantillas.php");
} else {
    echo "Algo salió mal";
}
