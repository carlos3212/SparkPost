

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Página de envío</title> 
</head>
<body>
<h1>Envío de variables a otra página.</h1>
<?php  
$a="Hola, ";
$b="bienvenido a mi página";
echo "Enviar las siguientes variables:<br/>";
echo "\$a = $a <br/>";
echo "\$b = $b <br/>";
?>
<p>Pulsar el siguiente enlace</p>
<?php  
echo "<a href='destino.php?a=$a&b=$b'>Enviar variables</a>";
?>
</body>
</html>

