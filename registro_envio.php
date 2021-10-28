<?php 
session_start();
$rol="1";
$usuario =$_SESSION['usuario'];
$pass =$_SESSION['pass'] ;
$us= $_SESSION['usbase'];
$ps= $_SESSION['pswbase'];
$rols= $_SESSION['rolbase']; 
if ($usuario == $us && $pass == $ps &&  $rol == $rols)
{
include_once "encabezado.php" ;

    
include_once "./config/base_de_datos.php";
$sentenciae = $base_de_datos->query("select tipo_campana, tipo_plantilla from envio");
$envio = $sentenciae->fetchAll(PDO::FETCH_OBJ);
?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1>Agregar</h1>
		
        <form action="./model/insertar_envio.php" method="POST">
         <!-- form-group -->
			
            <label for="documento">Campaña</label>
                                
                    <input type="hidden" name="campana" value="<?php echo $paraCampana->campana; ?>">
                   
                     <div class="form-group">
                       
                        <select name="campana" id = "campana" class="form-control"> 
                        <?php
                        
                        include_once './config/base_de_datos.php';
                        $query = "select id_campana, nombre_campana from campana";
                            $data = $base_de_datos->prepare($query);    // Prepare query for execution
                            $data->execute();// Execute (run) the query
                        
                            while($row=$data->fetch(PDO::FETCH_ASSOC)){
                                echo '<option value="'.$row['id_campana'].'">'.$row['nombre_campana'].'</option>';
                                //print_r($row); 
                            }
                            
                        ?>
                        </select>	
                 
                        <label for="documento">Plantilla</label>
                                
                                <input type="hidden" name="plantilla" value="<?php echo $paraPlantilla->plantilla; ?>">
                               
                                 <div class="form-group">
                                   
                                    <select name="plantilla" id = "plantilla" class="form-control"> 
                                    <?php
                                    
                                    include_once './config/base_de_datos.php';
                                    $query = "select id_plantilla, titulo from plantilla";
                                        $data = $base_de_datos->prepare($query);    // Prepare query for execution
                                        $data->execute();// Execute (run) the query
                                    
                                        while($row=$data->fetch(PDO::FETCH_ASSOC)){
                                            echo '<option value="'.$row['id_plantilla'].'">'.$row['titulo'].'</option>';
                                            //print_r($row); 
                                        }
                                        
                                    ?>
                                    </select>	
                   
            <!-- form-group -->
            </div>
			
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="plantillas.php" class="btn btn-warning">Ver todas</a>
		</form>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
    <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="login.html">Logout</a>
    </div>
</div>
</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>
<?php
}else{
    echo "fail";
    header ('Location: index.php');
  
}
?>