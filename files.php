<?php

$files_post = $_FILES['file'];

$files = array();
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


?>