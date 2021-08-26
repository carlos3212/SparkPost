<?php
/*
CRUD con PostgreSQL y PHP
@author parzibyte [parzibyte.me/blog]
@date 2019-06-17

================================
Este archivo muestra un formulario que
se envía a insertar.php, el cual guardará
los datos
================================
*/
?>
<?php include_once "encabezado.php" ?>
<div class="row">
	<div class="col-12">
		<h1>Agregar</h1>
		<form action="../model/insertarPlantilla.php" method="POST">
			<div class="form-group">
				<label for="titulo">Titulo</label>
				<input required name="titulo" type="text" id="titulo" placeholder="titulo " class="form-control">
			</div>
			<div class="form-group">
				<label for="mensaje">Asunto</label>
				<input required name="asunto" type="text" id="asunto" placeholder="Asunto" class="form-control">
			</div>
            <div class="form-group">
				<label for="mensaje">Mensaje</label>
				<input required name="mensaje" type="text" id="mensaje" placeholder="Mensaje" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./listar.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>
</div>

<?php include_once "pie.php" ?>