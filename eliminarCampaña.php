 
<?php
 //include_once './seguridad.php';
 
if (!isset($_GET["id"]) ) {
    exit();
}

$id = $_GET["id"];
include_once "./config/base_de_datos.php";

$sentencia = $base_de_datos->query("SELECT campana.id_campana,envio.id_envio ,envio.tipo_campana 
FROM public. campana, envio
where campana.id_campana=$id and envio.tipo_campana = $id");
$camapna = $sentencia->fetchAll(PDO::FETCH_OBJ);  

if ($camapna != null) {?>
    <script>
 
    var x = confirm('!No es posible eliminar!');
    if(x){
        window.location.replace(" campañas.php");
    }else{
        window.location.replace("campañas.php");
    }
    </script>
    

<?php
} else {
    $sentencia = $base_de_datos->prepare("DELETE FROM campana WHERE id_campana = ?;");
    $resultado = $sentencia->execute([$id]);
    if ($resultado === true) {
        header("Location:./campañas.php");
    } else {
        echo "Algo salió mal";
    }
 } ?>