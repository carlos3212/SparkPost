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
$sentencia = $base_de_datos->prepare("SELECT id_plantilla, titulo, asunto, mensaje, documento FROM plantilla WHERE id_plantilla = '$id_usuario';");
$sentencia->execute();
$usuario = $sentencia->fetchObject();


#Si la usuario existe, se ejecuta esta parte del código
?>
<?php include_once "encabezado.php"?>
<div class="row">
	<div class="col-12">
		<h1>Editar</h1>
		<form action="./model/guardarDatosEditPlan.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $usuario->id_plantilla; ?>">
			
			<div class="form-group">
				<label for="nombre">Titulo</label>
				<input value="<?php echo $usuario->titulo; ?>" required name="titulo" type="text" id="titulo" placeholder="titulo" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Asunto</label>
				<input value="<?php echo $usuario->asunto; ?>" required name="asunto" type="text" id="asunto" placeholder="asunto" class="form-control">
			</div>
			<div class="form-group">
				<label for="correo">Mensaje</label>
				<input value="<?php echo $usuario->mensaje; ?>" required name="mensaje" type="text" id="mensaje" placeholder="mensaje" class="form-control">
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