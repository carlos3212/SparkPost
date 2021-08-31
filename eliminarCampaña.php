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
$sentenciaP = $base_de_datos->prepare("DELETE FROM campana WHERE id_campana = ?;");
$resultadoP = $sentenciaP->execute([$id]);
if ($resultadoP === true) {
    header("Location: http://localhost:8080/sparkpost/campa%C3%B1as.php");
} else {
    echo "Algo salió mal";
}
