<?php include_once "encabezado.php" ?>

    <!-- End of Topbar -->

   

    <!-- Begin Page Content -->
    <div class="container-fluid">
    <h1>Cargar</h1>
        <div class="row">
  <div class="col-md-12 offset-md-3">
  <form action="imagen.php" method="post" enctype="multipart/form-data" id="filesForm">
    <div class="col-md-4 col-md-offset-4">
        <input class="form-control" type="file" id="file" name="file[]" multiple>
        <button type="button" onclick="subir()" class="btn btn-primary form-control" >Cargar</button>
    </div>
</form>
  </div>
</div>

        <!-- Page Heading -->
        <h1>Agregar</h1>
		<form action="insertar_plantilla.php" method="POST">
         <!-- form-group -->
			<div class="form-group">
				<label for="titulo">Titulo</label>
				<input required name="titulo" type="text" id="titulo" placeholder="titulo " class="form-control">
			</div>
			<div class="form-group">
				<label for="mensaje">Asunto</label>
				<input required name="asunto" type="text" id="asunto" placeholder="Asunto" class="form-control">
			</div>
            <div class="form-group">
				<label for="mensaje">Mensaje</label>
				<textarea required name="mensaje" type="text" id="mensaje" placeholder="Mensaje" class="form-control"></textarea>
			</div>
            <!--IMagen
            <div class="form-group">
				<label for="documento">Documento</label>
				<input required name="documento" type="text" id="documento" placeholder="documento" class="form-control">
			</div>-->
            <label for="documento">Documento</label>
                                
                    <input type="hidden" name="nombre" value="<?php echo $paraPlantilla->nombre; ?>">
                   
                     <div class="form-group">
                       
                        <select name="nombre" id = "nombre" class="form-control"> 
                        <?php
                        
                        include_once './config/base_de_datos.php';
                        $query = "select id_imagen, nombre from cargarimg";
                            $data = $base_de_datos->prepare($query);    // Prepare query for execution
                            $data->execute();// Execute (run) the query
                        
                            while($row=$data->fetch(PDO::FETCH_ASSOC)){
                                echo '<option value="'.$row['nombre'].'">'.$row['nombre'].'</option>';
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
<script type="text/javascript">

    function subir()
    {

        var Form = new FormData($('#filesForm')[0]);
        $.ajax({

            url: "imagen.php",
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
</body>

</html>