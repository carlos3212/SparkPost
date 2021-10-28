<?php

session_start();
include_once "./conexion.php";

$usuario_form = $_POST['email'];
$pass_form = $_POST['pass'];

$_SESSION['rol1'] = "1";
$_SESSION['rol2'] = "2";
$_SESSION['usuario'] = $usuario_form;
$_SESSION['pass'] = $pass_form;
$_SESSION['rol'] = $rol_form;
$usuario = $_SESSION['usuario'];
$pass= $_SESSION['pass'];
$rol1= $_SESSION['rol1'];
$rol2= $_SESSION['rol2'];


$sentencial = $base_de_datos->query("select id, email  , password , rol, usuario from registro
where email = '$usuario' and password = '$pass'");
$logins = $sentencial->fetchAll(PDO::FETCH_OBJ);

if (empty($logins)) 
	{
    	echo 'El array SÍ está vacío';
        //header ('Location: index.php');
	}
	else{
	
	

 foreach($logins as $login){ 
        //echo $login->email;      
        //echo $login->password;
        //echo $login->rol;  
            if($usuario_form == $login->email && $pass_form == $login->password && $login->rol == $rol1)
              {  
                echo $_SESSION['usuario'] = $usuario;
                echo $_SESSION['pass'] = $pass;
                echo $_SESSION['rol1'] = $admin;
                
                echo $_SESSION['usbase'] = $login->email;
                echo $_SESSION['pswbase'] = $login->password;
                echo $_SESSION['rolbase'] = $login->rol;
                echo "valido rol 1";
                header ('Location: datos.php');    
                
                
                }
                elseif($usuario_form == $login->email && $pass_form == $login->password && $login->rol == $rol2){
                    echo $_SESSION['usuario'] = $usuario;
                    echo $_SESSION['pass'] = $pass;
                    echo $_SESSION['rol2'] = $user;
                    
                    echo $_SESSION['usbase'] = $login->email;
                    echo $_SESSION['pswbase'] = $login->password;
                    echo $_SESSION['rolbase2'] = $login->rol;
                                
                    
                       echo "valido rol 2";
                       header ('Location: rol_usuario.php');    
                        
                        
                        } 
            
 }
}
 

?>