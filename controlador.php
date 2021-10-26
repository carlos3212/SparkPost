
<?php


  //Starting session
  session_start();
?>

<!DOCTYPE html>
<html>
  <body>
    <?php 
     $email_r = $_SESSION['email']= $_POST['email'];
     $pass_r = $_SESSION['pass']=$_POST['pass'];
     
     
    
    
     
     //header("location: prueba2.php");
     
     ?> 
     
  </body>
</html>





