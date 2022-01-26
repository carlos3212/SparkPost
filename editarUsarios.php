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
$sentencia = $base_de_datos->prepare("SELECT id, email, password, rol, usuario FROM registro WHERE id = '$id_usuario';");
$sentencia->execute();
$usuario = $sentencia->fetchObject();


#Si la usuario existe, se ejecuta esta parte del código
?>
<?php include_once "encabezado.php"?>
<div class="row">
	<div class="col-12">
		<h1>Editar</h1>
		<form action="./model/guardarDatosEditUsuarios.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $usuario->id; ?>">
			
			<div class="form-group">
				<label for="nombre">Email</label>
				<input value="<?php echo $usuario->email; ?>" required name="email" type="text" id="email" placeholder="email" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Password</label>
				<input value="<?php echo $usuario->password; ?>" required name="password" type="text" id="password" placeholder="password" class="form-control">
			</div>
			<div class="form-group">
				<label for="correo">Rol</label>
				<input value="<?php echo $usuario->rol; ?>" required name="rol" type="text" id="rol" placeholder="rol" class="form-control">
			</div>
            <div class="form-group">
				<label for="correo">Usuario</label>
				<input value="<?php echo $usuario->usuario; ?>" required name="usuario" type="text" id="usuario" placeholder="usuario" class="form-control">
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