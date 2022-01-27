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

include_once "config/base_de_datos.php";

$nombre = $_POST['nombre'];
$plantilla=$_POST['plantilla'];


    $archivo = fopen( "$nombre", "rb" );
    // Leer la primera línea:
     $aDatos = fgetcsv( $archivo, 100, ",");
    //print_r( $aDatos );
    echo "<br />";
    // Tras la lectura anterior, el puntero ha quedado en la segunda línea:
     $aDatos = fgetcsv( $archivo, 100, "," );
    //print( $aDatos );
    echo "<br />-------------------------------------<p />";
    // Volvemos a situar el puntero al principio del archivo:
    fseek($archivo, 0);
    //Recorremos el archivo completo:
     while( feof($archivo) == false )
     {
         $aDatos = fgetcsv( $archivo, 100, ",");
        echo "Nombre: ".$aDatos[0]."<br />";
        echo "Apellido: ".$aDatos[1]."<br />";
        echo "Correo: ".$aDatos[2]."<br />";
        echo "PLantilla: ".$plantilla."<br/>";
        echo "--------------------------<br />";
        $sentencia = $base_de_datos->prepare("INSERT INTO usuarios (nombre, apellido, correo,plantilla) VALUES (?, ?, ?, ?)");
        $resultado = $sentencia->execute([$aDatos[0], $aDatos[1], $aDatos[2],$plantilla]); # Pasar en el mismo orden de los ?
        
    }
  
    fclose( $archivo );

    if ($resultado === true) {
        # Redireccionar a la lista
        
        header("Location: ./datos.php");
    } else {
        echo "Algo salió mal. Por favor verifica que la tabla exista";
    }
  
}else{
    echo "fail";
    header ('Location: index.php');
  
}
    
?>