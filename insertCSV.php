<?php
include_once'config/base_de_datos.php';

$nombre = $_POST['nombre'];


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
    // Recorremos el archivo completo:
     while( feof($archivo) == false )
     {
         $aDatos = fgetcsv( $archivo, 100, ",");
        echo "Nombre: ".$aDatos[0]."<br />";
        echo "Apellido: ".$aDatos[1]."<br />";
        echo "Correo: ".$aDatos[2]."<br />";
        echo "--------------------------<br />";
        $sentencia = $base_de_datos->prepare("INSERT INTO usuarios (nombre, apellido, correo) VALUES (?, ?, ?)");
        $resultado = $sentencia->execute([$aDatos[0], $aDatos[1], $aDatos[2]]); # Pasar en el mismo orden de los ?
        
    }
    fclose( $archivo );
?>