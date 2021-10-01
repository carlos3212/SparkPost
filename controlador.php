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

$_SESSION["login_ok"] = "identificado";

// Enviamos al usuario a una de las paginas protegidas

echo "<script type=\"text/javascript\">    
window.location=\"pruebitas.php\";  
</script> ";


} 
if ($login -> email ===  $email & $login-> password  === $pass & $login-> rol == 2) 
{ 
    $_SESSIONU["login_ok"] = "identificado2";


// Enviamos al usuario a una de las paginas protegidas
echo "<script type=\"text/javascript\">    
window.location=\"rol_usuario.php\";  
</script> ";

} 

else 
{ 
  
    echo "<script type=\"text/javascript\">    
    window.location=\"index.php\";  
    </script> ";
}
} 
?> 


