<!doctype html>
<html lang="es">
<!--
CRUD con PostgreSQL y PHP
@author parzibyte [parzibyte.me/blog]
@date 2019-06-17

================================
Este archivo define un encabezado que es
incluido y reutilizado por otros archivos
================================


  Plantilla inicial de Bootstrap 4
  @author parzibyte
  Visita: parzibyte.me/blog
-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Conexión de PHP con PostgreSQL usando PDO">
    <meta name="author" content="Parzibyte">
    <title>Conexión PostgreSQL y PHP </title>
    <!-- Cargar el CSS de Boostrap-->
    <link href="./bootstrap.min.css" rel="stylesheet">
    <!-- Cargar estilos propios -->
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <!-- Definición del menú -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        
        Conexión PostgreSQL y PHP 
        </a>
        <div class="collapse navbar-collapse" id="miNavbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./listar.php">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./listarPlantilla.php">Plantilla</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="./formulario.php">Agregar Usuario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./formularioPlantilla.php">Agregar Plantilla</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Termina la definición del menú -->
    <main role="main" class="container">
        