<?php
include_once 'config/base_de_datos.php';

$files_post = $_FILES['file'];
$file_count = count($files_post['name']);
$file_keys = array_keys($files_post);

for ($i=0; $i < $file_count; $i++) 
{ 
	foreach ($file_keys as $key) 
	{
		$files[$i][$key] = $files_post[$key][$i];
	}
}


foreach ($files as $fileID => $file)
{
	$fileContent = file_get_contents($file['tmp_name']);

	file_put_contents($file['name'], $fileContent);
}
$files = array();
//guardar base
$sentencia = $base_de_datos->prepare("INSERT INTO cargarcsv (nombre) VALUES (?)");
$resultado = $sentencia->execute([$file['name']]); # Pasar en el mismo orden de los ?
//

?>