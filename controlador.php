

<?php
$email = $_POST['email'];
$pass = $_POST['pass'];


include_once "./conexion.php";
$sentencial = $base_de_datos->query("select email, password, rol, usuario from login
Where email = '$email' and password = '$pass' ");
$login = $sentencial->fetchAll(PDO::FETCH_OBJ);

foreach($login as $login ){ 

    
    
    if ($login -> email ===  $email && $login-> rol == 1){
        session_start();
        $_SESSION['email']= $login -> email ;
        $_SESSION['rol']= $login -> rol ;
        $_SESSION['usuario']= $login -> usuario ;
        $_SESSION['tiempo']=time();
        header("Location: datos.php");
        
    }
 
    if ($login -> email === $email && $login-> rol == 2){
        session_start();
        $_SESSION['email']= $login -> email ;
        $_SESSION['rol']= $login -> rol ;
        $_SESSION['tiempo']=time();
        header("Location: rol_usuario.php");
    }
    if($login === false){
        header("Location: index.php");
    }
    

}

 
?>
