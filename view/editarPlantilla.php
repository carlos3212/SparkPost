<?php
/*
CRUD con PostgreSQL y PHP
@author parzibyte [parzibyte.me/blog]
@date 2019-06-17

================================
Este archivo muestra un formulario llenado automáticamente
(a partir del ID pasado por la URL) para editar
================================
 */

if (!isset($_GET["id"])) {
    exit();
}

$id = $_GET["id"];
include_once "../config/base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id, titulo, asunto, mensaje FROM plantilla WHERE id = ?;");
$sentencia->execute([$id]);
$plantilla = $sentencia->fetchObject();
if (!$plantilla) {
    #No existe
    echo "¡No existe alguna plantilla con ese ID!";
    exit();
}

#Si la plantilla existe, se ejecuta esta parte del código
?>
<?php include_once "encabezado.php"?>
<div class="row">
	<div class="col-12">
		<h1>Editar</h1>
		<form action="../model/guararDatosEditadosPlantilla.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $plantilla->id; ?>">
			<div class="form-group">
				<label for="titulo">Titulo</label>
				<input value="<?php echo $plantilla->titulo; ?> "required name="titulo" type="text" id="titulo" placeholder="titulo " class="form-control">
			</div>
			<div class="form-group">
				<label for="mensaje">Asunto</label>
				<input value="<?php echo $plantilla->asunto; ?> "required name="asunto" type="text" id="asunto" placeholder="Asunto" class="form-control">
			</div>
            <div class="form-group">
				<label for="mensaje">Mensaje</label>
				<input value="<?php echo $plantilla->mensaje; ?> "required name="mensaje" type="text" id="mensaje" placeholder="Mensaje" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./listarPlantilla.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php include_once "pie.php"?>