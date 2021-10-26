    <?php
    /*

    Este archivo se encarga de conectar a la base de datos
    y traer un objeto PDO


    */
    $contraseña = "Siempre.1";
    $usuario = "carlos";
    $nombreBaseDeDatos = "postgres";
    # Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto
    $rutaServidor = "127.0.0.1";
    $puerto = "5432";
    try {
        $base_de_datos = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDeDatos", $usuario, $contraseña);
        $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo "Ocurrió un error con la base de datos: " . $e->getMessage();
    }
