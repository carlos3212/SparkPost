<?php
/*
CRUD con PostgreSQL y PHP
@author parzibyte [parzibyte.me/blog]
@date 2019-06-17

================================
Este archivo lista todos los
datos de la tabla, obteniendo a
los mismos como un arreglo
================================
*/
?>
<?php
include_once "../config/base_de_datos.php";
$sentencia = $base_de_datos->query("select id, nombre, correo from usuarios");
$usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "encabezado.php" ?>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1>Listar con arreglo</h1>
		
		<br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>correo</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará
					Pd: no ignores las llaves de inicio y cierre {}
					-->
					<?php foreach($usuarios as $usuario){ ?>
						<tr>
							<td><?php echo $usuario->id ?></td>
							<td><?php echo $usuario->nombre ?></td>
							<td><?php echo $usuario->correo ?></td>
							<td><a class="btn btn-warning" href="<?php echo "editar.php?id=" . $usuario->id?>">Editar 📝</a></td>
							<td><a class="btn btn-danger" href="<?php  echo "eliminar.php?id=" . $usuario->id?>">Eliminar 🗑️</a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
