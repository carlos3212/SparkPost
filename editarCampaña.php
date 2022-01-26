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
$sentencia = $base_de_datos->prepare("SELECT id_campana, nombre_campana	 FROM campana WHERE id_campana = '$id_usuario';");
$sentencia->execute();
$usuario = $sentencia->fetchObject();


#Si la usuario existe, se ejecuta esta parte del código
?>
<?php include_once "encabezado.php"?>
<div class="row">
	<div class="col-12">
		<h1>Editar</h1>
		<form action="./model/guardarDatosEditCamp.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $usuario->id_campana; ?>">
			
			<div class="form-group">
				<label for="nombre">Nombre Campaña</label>
				<input value="<?php echo $usuario->nombre_campana; ?>" required name="nombre" type="text" id="nombre" placeholder="Nombre de campaña" class="form-control">
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