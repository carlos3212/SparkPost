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
include_once "encabezado.php";

?>

                  <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
					<!-- Base de datos -->
					<form action="ver_envio.php" method="POST">
                    
			<input type="hidden" name="id_envio" value="<?php echo $paraPlantilla->id_envio; ?>">
           
         	<div class="form-group">
				<label for="mensaje"> <h3>  ID Envio </h3></label>
                <select name="id_envio" id = "id_envio" class="form-control"> 
<?php

include_once './config/base_de_datos.php';
$query = "select id_envio,tipo_plantilla, tipo_campana from envio";
    $data = $base_de_datos->prepare($query);    // Prepare query for execution
    $data->execute();// Execute (run) the query

    while($row=$data->fetch(PDO::FETCH_ASSOC)){
        echo '<option value="'.$row['id_envio'].'">'.$row['id_envio'].'</option>';
        //print_r($row); 
    }
    
?>
 </select>	
            </div>
           
			<button type="submit" class="btn btn-success">ENVIAR</button>
            
                    
             </div>
             
                <!-- /.container-fluid -->
              

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span> &copy; SIDEVOX</span>
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