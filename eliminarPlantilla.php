 
<?php
 //include_once './seguridad.php';
 
if (!isset($_GET["id"])) {
    exit();
}

$id = $_GET["id"];
include_once "./config/base_de_datos.php";
        
   $sentencia = $base_de_datos->query("SELECT  plantilla.id_plantilla,
   campana.id_campana,envio.id_envio ,envio.tipo_campana,envio.tipo_plantilla 
   FROM public.plantilla, campana, envio
   where plantilla.id_plantilla=$id and envio.tipo_plantilla = $id");
   $plantilla = $sentencia->fetchAll(PDO::FETCH_OBJ);   
   
   if($plantilla != null){ ?>

    <script>

    var x = confirm('!No es posible eliminar!');
    if(x){
        window.location.replace(" plantillas.php");
    }else{
        window.location.replace("plantillas.php");
    }
    </script>

   
<?php
} else {


$sentencia = $base_de_datos->prepare("DELETE FROM plantilla WHERE id_plantilla = ?;");
$resultado = $sentencia->execute([$id]);
if ($resultado === true) {
    header("Location: plantillas.php");
} else {
    echo "Algo salió mal";
} 
 } ?>