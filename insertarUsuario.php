<?php include_once "encabezado.php" ?>
<!-- Content Wrapper -->
    
    <!-- End of Topbar -->

    <?php
include_once "./config/base_de_datos.php";
$sentencia = $base_de_datos->query("select id_usuario, nombre, correo from usuarios");
$usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1> Cargar Contacto </h1>
        <div class="row">
  <div class="col-md-12 offset-md-3">
  <form action="files.php" method="post" enctype="multipart/form-data" id="filesForm">
    <div class="col-md-4 col-md-offset-4">
        <input class="form-control" type="file" id="file" name="file[]" multiple>
        <button type="button" onclick="subir()" class="btn btn-primary form-control" >Cargar</button>
    </div>
</form>
  </div>
</div>
        <h1>Agregar Contacto</h1>
        <form action="insertCSV.php" method="POST">
                    
                    <input type="hidden" name="nombre" value="<?php echo $paraPlantilla->nombre; ?>">
                   
                     <div class="form-group">
                       
                        <select name="nombre" id = "nombre" class="form-control"> 
        <?php
        
        include_once './config/base_de_datos.php';
        $query = "select id, nombre from cargarcsv";
            $data = $base_de_datos->prepare($query);    // Prepare query for execution
            $data->execute();// Execute (run) the query
        
            while($row=$data->fetch(PDO::FETCH_ASSOC)){
                echo '<option value="'.$row['nombre'].'">'.$row['nombre'].'</option>';
                //print_r($row); 
            }
            
        ?>
         </select>	
                    </div>
                   
                    <button type="submit" class="btn btn-success">Guardar</button>
                    
                            
                     </div>
		
            <!--FOrmulario de registro-->
			<!--<form action="./model/insertar.php" method="POST"> 
                <div class="form-group">
				<label for="nombre">Nombre</label>
				<input required name="nombre" type="text" id="nombre" placeholder="Nombre de Usuario" class="form-control">
			</div>
			<div class="form-group">
				<label for="edad">Correo</label>
				<input required name="correo" type="text" id="correo" placeholder="Correo" class="form-control">
			</div>
           
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./listar.php" class="btn btn-warning">Ver todas</a> -->
            
                         
        

        
    </div>
    
   
    <!-- /.container-fluid -->
    
<script type="text/javascript">

    function subir()
    {

        var Form = new FormData($('#filesForm')[0]);
        $.ajax({

            url: "files.php",
            type: "post",
            data : Form,
            processData: false,
            contentType: false,
            success: function(data)
            {
              
                alert('Archivos Agregados!');
              

            }
        });
    }

</script>


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