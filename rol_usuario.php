<?php 
 include_once './seguridad.php'
?>
<?php if ($_SESSION['rol']==1)
session_unset();
session_destroy();

?>

<h1>perro</h1>
<p>Se ha autetificado usted como: 
    <?php echo $_SESSION['email'];?> a la hora UNX: <?php echo $_SESSION['email'];?> con éxito<p>


    <a href="logout.php">Cerrar Sesión</a>