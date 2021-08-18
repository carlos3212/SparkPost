<?php
//Parametros envio mensaje por id

/*
CRUD con PostgreSQL y PHP
@author parzibyte [parzibyte.me/blog]
@date 2019-06-17

================================
Este archivo muestra un formulario llenado automáticamente
(a partir del ID pasado por la URL) para editar
================================
 */


?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Conexión de PHP con PostgreSQL usando PDO">
    <meta name="author" content="Parzibyte">
    <title>Conexión PostgreSQL y PHP </title>
    <!-- Cargar el CSS de Boostrap-->
    <link href="./view/bootstrap.min.css" rel="stylesheet">
    <!-- Cargar estilos propios -->
    
</head>

<div class="row">
	<div class="col-8">
		<h1>  Elige la plantilla a enviar</h1>
		<form action="sparkpost.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $paraPlantilla->id; ?>">
			
            <div class="form-group">
				<label for="mensaje"> <h3> - ID Plantilla </h3></label>
				<input required name="id" type="text" id="id" placeholder="Id" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">ENVIAR</button>
			
		</form>
	</div>
</div>

