<?php session_start(); ?>
<?php


$email = $_POST['email'];
$pass = $_POST['pass'];



include_once "./conexion.php";
$sentencialog = $base_de_datos->query("select email, password, rol, usuario from registro
Where email = '$email' and password = '$pass' ");
$login = $sentencialog->fetchAll(PDO::FETCH_OBJ);

foreach($login as $login ){ 
if ($login -> email ===  $email && $login-> password  === $pass && $login-> rol == 1) 
{ 
// Creamos la variable de sesion que nos permitira el acceso a las demas paginas



// Enviamos al usuario a una de las paginas protegidas

header("location: datos.php");


} 
if ($login -> email ===  $email & $login-> password  === $pass & $login-> rol == 2) 
{ 
    
// Enviamos al usuario a una de las paginas protegidas
header("location: plantillas_usuario.php  ");

} 

else 
{ 
  
    echo "Datos incorrectos";
}
} 
?> 


