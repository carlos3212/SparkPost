<?php 
session_start();
$rol="1";
$usuario =$_SESSION['usuario'];
$pass =$_SESSION['pass'] ;
$us= $_SESSION['usbase'];
$ps= $_SESSION['pswbase'];
$rols= $_SESSION['rolbase']; 
if ($usuario == $us && $pass == $ps &&  $rol == $rols)
{
	include_once "encabezado.php";
	include_once "./conexion.php";
	include_once "./config/base_de_datos.php";	





$id_usuario = $_GET["id"];
include_once "./config/base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id_usuario, nombre, apellido ,correo	 FROM usuarios WHERE id_usuario = '$id_usuario';");
$sentencia->execute();
$usuario = $sentencia->fetchObject();


#Si la usuario existe, se ejecuta esta parte del código
?>
<?php include_once "encabezado.php"?>
<div class="row">
	<div class="col-12">
		<h1>Editar</h1>
		<form action="./model/guardarDatosEditados.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $usuario->id_usuario; ?>">
			
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input value="<?php echo $usuario->nombre; ?>" required name="nombre" type="text" id="nombre" placeholder="Nombre de usuario" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Apellido</label>
				<input value="<?php echo $usuario->apellido; ?>" required name="apellido" type="text" id="apellido" placeholder="Apellido de usuario" class="form-control">
			</div>
			<div class="form-group">
				<label for="correo">correo</label>
				<input value="<?php echo $usuario->correo; ?>" required name="correo" type="text" id="correo" placeholder="Edad de usuario" class="form-control">
			</div>
			
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./datos.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php

}else{
    echo "fail";
    header ('Location: index.php');
  
}
?>